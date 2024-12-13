<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Epmnzava\Crdb\Crdb;
use Omnipay\Common\CreditCard;
use Omnipay\Omnipay;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Omnipay\Common\Message\RedirectResponseInterface;
use Srmklive\PayPal\Facades\PayPal;
use Stripe\Stripe;



class PaymentController extends Controller
{
      


    public function makePayment(Order $order)
    {
        $gateway = $this->createPaypalGateway();

        $data = [];
        $data['items'] = Session::get('products');
        $data['invoice_id'] = $order->id;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['description'] = "Order payment";
        $data['return_url'] = url('/payment/success');
        $data['cancel_url'] = url('/cart');
        $data['amount'] = Session::get('total_price');
        $data['currency'] = env('PAYMENT_CURRENCY');


        try {
            $response = $gateway->purchase($data)->send();

            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                $response->getMessage();
            }
        } catch (\Throwable $error) {
            $error->getMessage();
        }

        //give a discount of 10% of the order amount
        //$data['shipping_discount'] = round((10 / 100) * $total, 2);

    }
/*
    public function successPayment(Request $request)
    {
        $orderData = [];


        if ($request->input('paymentId') && $request->input('PayerID')) {
          
           $gateway = $this->createPaypalGateway();
          
            $orderData = [
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ];
            $transaction = $gateway->completePurchase($orderData);
            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $orderData = $response->getData();

                $order = Order::find(Session::get('orderId'));
                $order->update([
                    'payment_method' => "PayPal",
                    'is_paid' => true,
                    'paid_at' => Carbon::now()->toDateTimeString(),
                    'status' => "Delivering",
                ]);

                Session::forget('orderId');
                Session::forget('products');
                Session::forget('total_quantity');
                Session::forget('total_price');
            } else {
                return $response->getMessage();
            }
        } else {
            return "Payment is declined";
        }

        return view('thankyou', ['id' => $orderData['cart']]);
    }
*/


 public function successPayment(Request $request, $session_id)
    {
                    




                $stripe = new \Stripe\StripeClient(env('STRIPE_APIKEY'));

$checkout_session = $stripe->checkout->sessions->retrieve($session_id, [
    'expand' => ['line_items'],
  ]);           $orderData = Session::get('orderId');

            if ($checkout_session['payment_status'] == 'paid') {
$adresses = Session::get('adresses');
/*Create ship*/

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://public-api.easyship.com/2024-09/shipments",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
     'origin_address' => [
        'line_1' => '3 Corrigan Place',
        'line_2' => 'Mill Park',
        'state' => 'Victoria',
        'city' => 'Victoria',
        'postal_code' => '3082',
        'country_alpha2' => 'AU',
        'contact_name' => 'Taleofroses',
        'company_name' => 'Taleofroses',
        'contact_phone' => '+9876543254',
        'contact_email' => 'weborders@taleofroses.com.au'
    ],
    'destination_address' => [
        'country_alpha2' => 'AU',
        'line_1' => $adresses['address1'],
        'line_2' => $adresses['address2'],
        'state' => $adresses['state'],
        'city' => $adresses['city'],
        'postal_code' => $adresses['postalCode'],
        'contact_name' => $adresses['firstName'],
        'company_name' => null,
        'contact_phone' => $adresses['phone'],
        'contact_email' => $adresses['email'],
    ],
    'regulatory_identifiers' => [
        'eori' => 'DE 123456789 12345',
        'ioss' => 'IM1234567890',
        'vat_number' => 'EU1234567890'
    ],
    'buyer_regulatory_identifiers' => [
        'ein' => '12-3456789',
        'vat_number' => 'EU1234567890',
        'ssn' => '123-45-6789'
    ],
    'incoterms' => 'DDU',
    'insurance' => [
        'is_insured' => false
    ],
    'order_data' => [
        'buyer_selected_courier_name' => 'Production',
        'platform_name' => 'Laravel plat_form',
        'order_created_at' => '2024-01-31T18:00:00Z'
    ],
    'courier_settings' => [
        'allow_fallback' => false,
        'apply_shipping_rules' => true
    ],
    'shipping_settings' => [
        'additional_services' => [
                'qr_code' => 'none'
        ],
        'units' => [
                'weight' => 'kg',
                'dimensions' => 'cm'
        ],
        'buy_label' => false,
        'buy_label_synchronous' => false,
        'printing_options' => [
                'format' => 'png',
                'label' => '4x6',
                'commercial_invoice' => 'A4',
                'packing_slip' => '4x6'
        ]
    ],
    'parcels' => [
        [
                'total_actual_weight' => 1,
                'box' => null,
                'items' => [
                                [
                                'description' => 'item',
                                'category' => null,
                                'hs_code' => '123456',
                                'contains_battery_pi966' => true,
                                'contains_battery_pi967' => true,
                                'contains_liquids' => true,
                                'sku' => 'sku',
                                'origin_country_alpha2' => 'HK',
                                'quantity' => 2,
                                'dimensions' => [
                                        'length' => 1,
                                        'width' => 2,
                                        'height' => 3
                                ],
                                'actual_weight' => 10,
                                'declared_currency' => 'AUD',
                                'declared_customs_value' => 20
                                ]
                ]
        ]
    ]
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
                  $getdata = json_decode($response);


                /**/


                        
                               
                                $order = Order::find(Session::get('orderId'));

                                $order->update([
                                    'payment_method' => "Stripe",
                                    'is_paid' => true,
                                    'shipping_id'=>$getdata->shipment->easyship_shipment_id,
                                    'paid_at' => date("Y-m-d h:i:s", $checkout_session['created']),
                                    'status' => "Delivering",
                                ]);

                                 Session::forget('adresses');
                                Session::forget('orderId');
                                Session::forget('products');
                                Session::forget('total_quantity');
                                Session::forget('total_price');
                            } 

                        }
         else {
            return "Payment is declined";
        }

        return view('thankyou', ['id' => $orderData,'shipping_id'=>$getdata->shipment->easyship_shipment_id]);
    }

    

    function createPaypalGateway()
    {
        $gateway = Omnipay::create('PayPal_Rest');

        $config = [
            'clientId' => env('PAYPAL_SANDBOX_CLIENT_ID', ''),
            'secret' => env('PAYPAL_SANDBOX_CLIENT_SECRET', ''),
            'token' => env('PAYPAL_SANDBOX_ACCESS_TOKEN'),
            'testMode' => true,
        ];
        return $gateway->initialize($config);
    }

    function createStripeGateway()
    {
        $gateway = Omnipay::create('Stripe');

        $config = [
            "apiKey" => env('STRIPE_APIKEY'),
            "stripeVersion" => env('STRIPE_VERSION')
        ];

        return $gateway->initialize($config);
    }

    public function stripePayment(Request $request, Order $order)
    {

        $adresses =[]; 
        $adresses['firstName'] = $request->input('firstName');
        $adresses['lastName'] = $request->input('lastName');
        $adresses['company'] = $request->input('company');
        $adresses['address1'] = $request->input('address1');
        $adresses['address2'] = $request->input('address2');
        $adresses['city'] = $request->input('city');
        $adresses['state'] = $request->input('state');
        $adresses['postalCode'] = $request->input('postalCode');
        $adresses['phone'] = $request->input('phone');
        $adresses['email'] = $request->input('email');
        Session::put('adresses', $adresses);
/*
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://public-api.easyship.com/2024-09/rates",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'origin_address' => [
        'line_1' => '3 Corrigan Place',
        'line_2' => 'Mill Park',
        'state' => 'Victoria',
        'city' => 'Victoria',
        'postal_code' => '3082',
        'country_alpha2' => 'AU',
        'contact_name' => 'Taleofroses',
        'company_name' => null,
        'contact_phone' => null,
        'contact_email' => 'dynabram@gmail.com'
    ],
    'destination_address' => [
        'country_alpha2' => 'AU',
        'line_1' => $address1,
        'line_2' => $address2,
        'state' => $state,
        'city' => $city,
        'postal_code' => $postalCode,
        'contact_name' => $firstName,
        'company_name' => null,
        'contact_phone' => null,
        'contact_email' => 'asd@asd.com'
    ],
    'incoterms' => 'DDU',
    'insurance' => [
        'is_insured' => false
    ],
    'courier_settings' => [
        'show_courier_logo_url' => false,
        'apply_shipping_rules' => true
    ],
    'shipping_settings' => [
        'units' => [
                'weight' => 'kg',
                'dimensions' => 'cm'
        ]
    ],
      'parcels' => [
        [
                'total_actual_weight' => 1,
                'box' => null,
                'items' => [
                                [
                                     'description' => 'item',
                                     'category' => 'fashion',
                                     'sku' => 'sku',
                                     'origin_country_alpha2' => 'HK',
                                     'quantity' => 2,
                                     'dimensions' => [
                                                'length' => 0.50,
                                                'width' => 2,
                                                'height' => 3
                                                ],
                                                'actual_weight' => 10,
                                                'declared_currency' => 'AUD',
                                                'declared_customs_value' => 20
                                ]
                ]
        ]
    ]
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

        die();

*/
        $stripe = new \Stripe\StripeClient(env('STRIPE_APIKEY'));
        //dd(Session::get('products'));
        $request->session()->put('line_items.0.price_data.unit_amount', 100 * round(Session::has('full_price') ?
            Session::get('full_price') : Session::get('total_price'), 2));

        $checkout_session =  $stripe->checkout->sessions->create([
            'success_url' => url('/payment/success/{CHECKOUT_SESSION_ID}'),
            'cancel_url' => url('/cart'),
            'payment_method_types' => ['link', 'card'],
            'line_items' => [
                '0' => Session::get('line_items')
            ],
            // 'line_items' =>  [
            //     [
            //         'price_data'  => [
            //             'product_data' => [
            //                 'name' => "Rose1",
            //             ],
            //             'unit_amount'  => 100 * Session::get('total_price'),
            //             'currency'     => 'USD',
            //         ],
            //         'quantity'    => 1
            //     ],
            // ],

            'mode' => 'payment',
            'allow_promotion_codes' => false
        ]);



        return redirect($checkout_session['url']);
    }
    // public function stripePayment2(Request $request, Order $order)
    // {
    //     $gateway = $this->createStripeGateway();

    //     $incomingFields = $request->validate([
    //         'number' => 'required',
    //     ])

    //     $card = [
    //         'number' => '4242424242424242',
    //         'name' => 'Zhang San',
    //         'exp_month' => '12',
    //         'exp_year' => '34',
    //         'cvv' => '567',
    //     ];

    //     $customer = [
    //         'id' => 1,
    //         'email' => 'test@example.com',
    //         'name' => 'Zhang San',
    //         // 'address' => [
    //         //     'line1' => '6aaa',
    //         //     'city' => 'aaa',
    //         //     'state' => 'aaa',
    //         //     'postal_code' => '12345',
    //         // ],
    //         // 'phone' => '02467895456',
    //         // 'metadata' => [
    //         //     'user_id' => 1,
    //         // ],

    //     ];

    //     $creditCard = new CreditCard($card);

    //     $data['invoice_id'] = $order->id;
    //     $data['description'] =
    //         "Order #{$data['invoice_id']} Invoice";
    //     $data['return_url'] = url('/payment/success');
    //     $data['cancel_url'] = url('/cart');
    //     $data['country'] = "United States";
    //     $data['amount'] = Session::get('total_price');
    //     $data['currency'] = env('PAYMENT_CURRENCY');
    //     $data['token'] = $creditCard;
    //     $data['source'] = $customer;
    //     $data['level3'] = [
    //         'line_items' => Session::get('products'),
    //         'merchant_reference' => "A012345",
    //     ];







    //     try {
    //         $response = $gateway->purchase($data)->send();
    //         dd($response);

    //         if ($response->isRedirect()) {
    //             $response->redirect();
    //         } else {
    //             $response->getMessage();
    //         }
    //     } catch (\Throwable $error) {
    //         $error->getMessage();
    //     }
    // }
}
