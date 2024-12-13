<?php
namespace App\Http\Controllers;
use Omnipay\Omnipay;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Srmklive\PayPal\Services\PayPal;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class OrderController extends Controller
{
       function calculateTotal()
    {
        $total_price = 0;
        $total_quantity = 0;

        foreach (Session::get('products') as $product) {
            $price = $product['price'];
            $quantity = $product['quantity'];

            $total_price = $total_price + ($price * $quantity);
            $total_quantity = $total_quantity + $quantity;
        }

        Session::put('total_price', $total_price);
        Session::put('total_price_w_coupon', $total_price);
        Session::put('total_quantity', $total_quantity);
         Session::put('discount_value', '');
    }

    public function addToCart(Request $request, Product $product)
    {

        $incomingFields = $request->validate([
            'productId' => 'required',
            'quantity' => 'required',
            'color' => 'required',
            'flower_type' => 'required',
        ]);

        $incomingFields['print_type'] = $request->input('print_type');
        $incomingFields['print_text'] = $request->input('print_text');
        $incomingFields['print_font'] = $request->input('print_font');
        $incomingFields['print_color'] = $request->input('print_color');
        $incomingFields['productform'] = $request->input('productform');
        

        if ($incomingFields['print_type'] == "picture") {
            $incomingField['print_image'] = $request['print_image'];
            $manager = new ImageManager(new Driver());
                     $dateString = date('Ymd');
                    $numbera = rand(100,100000);
            $filename = $request->file('print_image')->getClientOriginalName();
            $imageData = $manager->read($incomingField['print_image'])->encode();
            Storage::put('/public/personalizeImages/' . $filename, $imageData);

            $incomingField['print_image'] = $filename;
        } else {
            $incomingField['print_image'] = null;
        }


        $product = Product::find($incomingFields['productId']);


              //  if($incomingFields['productform'] == 'y'){
                  $sel_colors = '';
                     $eachcolor = json_decode($product->eachcolor_image);
                    foreach ($eachcolor as  $value) {
                      $sel_colors = $value;
                    }

              //  }
               // else{
                 //       $sel_colors = $product->images()->get()->value('name');
               // }


            

        $productInfo = [
            'id' => $product->id,
            'sku' => $product->SKU,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $incomingFields['quantity'],
            'color' => $incomingFields['color'],
        //    'image' => $product->images()->get()->value('name'),
            'image' => $sel_colors,
            'print_type' => $incomingFields['print_type'],
            'print_text' =>  $incomingFields['print_text'],
            'print_color' =>  $incomingFields['print_color'],
            'print_font' =>  $incomingFields['print_font'],
            'flower_type' => $incomingFields['flower_type'],
            'productform' => $incomingFields['productform'],

        ];

        $stripeContent = [
            [
                'price_data' => [
                    'product_data' => [
                        'name' => "Rose payment",
                    ],
                    'unit_amount' => 100 * Session::get('total_price'),
                    'currency' => 'USD',
                ],
                'quantity' =>  1,
            ]
        ];


/*
        if ($incomingFields['print_type'] == "picture") {

            $productInfo['print_image'] = $incomingFields['print_image'];
        } else {
            $productInfo['print_image'] = null;
        }
        */

        $request->session()->put('products' . "." . $product->SKU, $productInfo);
        $request->session()->put('line_items', $stripeContent);

        $this->calculateTotal();
        return redirect('/cart');
    }

    public function removeFromCart($sku)
    {
        $product = Product::where('SKU', $sku)->get();
        Session::forget('products.' . $product->value('SKU'));
        $this->calculateTotal();
        return back();

        //return response()->json([    'theHTML' => view('cart-item-only')->render()        ]);
    }

 
    public function showCheckout(Order $order)
    {
        //dd(Session::get('products'));
        $order = $order->find($order->id);
        if (Session::has('discount_code')) {
            $discount_code = Session::get('discount_code');
        } else {
            $discount_code = null;
        }

        if (Session::has('full_price')) {
            $full_price = Session::get('full_price');
        } else {
            $full_price = null;
        }

        $allFlowerTypes = array();
        $flowerTypes = Session::get('products');
        if ($flowerTypes != null) {
            foreach ($flowerTypes as $flowerType) {
                array_push($allFlowerTypes, $flowerType['flower_type']);
            }
        }

         $discount_value = Session::get('discount_value');
        if($discount_value == ''){
            
        }

        return view('checkout', [
            'order' => $order,
            'full_price' => $full_price,
            'discount_code' => $discount_code,
            'discount_value' => $discount_value,
            'allFlowerTypes' => $allFlowerTypes
        ]);
    }


    public function createOrder(Request $request, Order $order)
    {
        $incomingFields = [
            'total_price' => Session::get('total_price'),
            'is_paid' => false,
            'shipping_id' => '',
            'is_delivered' => false,
            'status' => "Pending",
        ];


        if (auth()->check()) {
            $incomingFields['user_email'] = auth()->user()->email;
        }

        $newOrder = $order->create($incomingFields);

        foreach (session('products') as $item) {
            $product = Product::find($item['id']);
            $newOrder->products()->attach($product, ['quantity' => $item['quantity']]);
        }

        $request->session()->put('orderId', $newOrder->id);

        return redirect('/cart/checkout/' . $newOrder->id);
    }

    public function resolveAccessToken()
    {
        $clientId = env('PAYPAL_SANDBOX_CLIENT_ID');
        $clientSecret = env('PAYPAL_SANDBOX_CLIENT_SECRET');
        $credentials = base64_encode("{$clientId}:{$clientSecret}");
        return "Basic {$credentials}";
    }

    public function decodeResponse($response)
    {
        return json_decode($response);
    }

    public function apiCreateOrder(Order $order)
    {
        $newOrder = $order->find(Session::get('orderId'));
        $createOrder = [
            'id' => Session::get('orderId'),
            'intent' => "CAPTURE",
            'payment_source' => uniqid(),
            'items' => Session::get('products'),
            'purchase_units' => [
                "reference_id" => "d9f8074",
                'amount' => [
                    'currency_code' => env('PAYMENT_CURRENCY'),
                    'value' => Session::get('total_price')
                ]
            ],
            "payment_source" => [
                "paypal" => [
                    "experience_context" => [
                        "payment_method_preference" => "IMMEDIATE_PAYMENT_REQUIRED",
                        "brand_name" => "EXAMPLE INC",
                        "locale" => "en-US",
                        "landing_page" => "/",
                        "shipping_preference" => "SET_PROVIDED_ADDRESS",
                        "user_action" => "PAY_NOW",
                        "return_url" => "/payment/success",
                        "cancel_url" => '/cart',
                    ]
                ]
            ],
            'currency' => env('PAYMENT_CURRENCY'),
            'description' => 'Order flower payment ' . Session::get('orderId'),
            'invoice_id' => $newOrder->id,
            'return_url' => url('/payment/success'),
            'cancel_url' => url('/cart')
        ];
        return response()->json($createOrder);
    }

    public function paymentConfirm(Request $request)
    {
        $response = $request->validate([
            'paymentToken' => 'required'
        ]);
        $paymentToken = $response['paymentToken'];

        $orderData = [];

        if ($request->input('paymentToken')) {
            $orderData = $response['paymentToken'];

            $order = Order::find(Session::get('orderId'));
            $order->update([
                'payment_method' => "Google Pay",
                'is_paid' => true,
                'paid_at' => Carbon::now()->toDateTimeString(),
                'status' => "Delivering",
            ]);

            Session::forget('orderId');
            Session::forget('products');
            Session::forget('total_quantity');
            Session::forget('total_price');
        } else {
            return "Payment is declined";
        }

        return response()->json(['id' => $order->id]);
    }


    public function showCartDetail()
    {
        return view('cart-detail');
    }

    public function showThanks()
    {
        return view('thankyou');
    }

   public function createship(){



$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://public-api.easyship.com/2024-09/shipping_rules",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'name' => 'Ship',
    'description' => 'Test shi desc',
    'priority' => 1,
    'recalculate_shipments' => true
  ]),
  CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "authorization: Bearer prod_fKzYks3oiIuwItPJatYkvR08+flOiSbAO+HoytjgYk0=",
    "content-type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

    }
}
