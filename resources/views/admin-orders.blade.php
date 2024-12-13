<x-layout>

    <main id="MainContent" class="main-content">





        @include('menu-mobile')



        <div class="DrawerOverlay"></div>

        <section id="account-layout">

            <h2 class="hide">AccountContent</h2>



            <!-- start account.liquid (TEMPLATE) -->

            @include('admin-bar', ['title' => 'Orders'])





            <div class="account__info-wrapper wrapper">



                <div class="account__address-wrapper"><!-- start snippets/customer-address.liquid -->





                    <table class="account__address-table" style="width: 100%; text-align: center; margin-top: 30px;">



                        <thead>

                            <tr>
                                <th>DATE OF ORDER</th>
                                <th>Order Number</th>
                                <th>Order Status</th>
                                <th>TOTAL PRICE</th>

                                

                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($orders as $order)

                                <tr>


                                    <td>{{date('d-m-Y', strtotime($order->created_at))}}</td>
                                    <td> <a href="/account/admin/orders/{{ $order->id }}">{{$order->id}}</a></td>
                                    <td>

                                            {{ $order->is_delivered ? 'Delivered' : 'To be Delivered' }}

                                        </td>                                    <td>{{ $order->total_price }}</td>




                                   

                                </tr>

                            @endforeach

                        </tbody>



                    </table>

                </div>

            </div>



            </div>

            </div>



@isset($address)

<style type="text/css">
    .poptoordershow {
        background: rgba(0, 0, 0, 0.5);position: fixed;top:0%;bottom: 0%;left: 0%;right: 0%;
        z-index: 9999;width: 100%;height: 100%;margin: 0 !important; max-width: 100% !important;
    }
    .poptoordershow > .account__address-wrapper{
        background: #fff;position: absolute;top:20%;bottom: 20%;left: 20%;right: 20%;
overflow:auto ;
.closebtn{display: block;text-align: right;}
    }
}
</style>
<div class="account__info-wrapper wrapper poptoordershow">



                        <div class="account__address-wrapper"><!-- start snippets/customer-address.liquid -->

            <a class="closebtn" href="/account/admin/orders/">Close</a>

                            {{-- zzz --}}

                            <div class="account__address-table"

                                style="width: 100%; text-align: center; margin-top: 30px;">

                                <div style="display: flex; justify-content: space-between; padding: 0 15px;  ">

                                    <div style="display: flex; text-align: left;   flex: 1 0 50%;">

                                        <div>


                                           <p><b>Order Number:  {{ $ordera['id'] }}</b></p>     
                                            <p>Name: {{ $userd['firstName'] }}</p>
                                            <p>

                                                Date of order: {{date('d-m-Y', strtotime($ordera['created_at']))}}
                                            </p>

                                          

                                               

                                           







                                           

                                                </div>

                                        </div>




                                   



                                    <div style=" flex: 1 0 50%; text-align: left;">

                                        <div>

                                            <div>


  Address:                                               @if ($address)

                                                    {{ $address->value('company') .

                                                        ', ' .

                                                        $address->value('address1') .

                                                        ', ' .

                                                        $address->value('city') .

                                                        ', ' .

                                                        $address->value('postal') .

                                                        ', ' .

                                                        $address->value('country') }}

                                               @endif
<p>
                                                Email: {{ $ordera['user_email'] }}
</p>

<p>    <strong>Payment Method: </strong>

                                                    {{ $ordera['payment_method'] }}
 {{ $ordera['is_paid'] ? 'Paid at ' . $ordera['paid_at'] : 'Not paid' }}

                                                </p>


                                                <p><b>Order Detail:</b></p>
                                            <ol class="cart-items__list" style="">
                                                @foreach ($pro_items as $item)

                                                    <li class="cart-items__line-item " style="padding: 0;display: list-item;">

                                                       


                                                       

                                                                        <h2 class="cart-items__item-title"

                                                                            style="font-size: 30px;text-align: left;">

                                                                            <a href="/products/will-you-marry-me-acrylic-square-box-9-preserved-rose-stem"

                                                                                class="cart-items__item-link"

                                                                                title="Will you marry me? - Acrylic 

                                                                Square Box (9 Preserved Rose Stem)">

                                                                                {{ $item[0]->name }}

                                                                            </a>
<span class="cart-items__item-price"><span

                                                                        class="money"
                                                                        style="">${{ $item[0]->price }}</span>
                                                                        </h2>







                                                                  

                                                    </li>

                                                @endforeach



                                            </ol>


                                                <div>

                                                    <Row>

                                                        <Col>Items</Col>

                                                        <Col>${{ $ordera['total_price'] }}</Col>

                                                    </Row>

                                                </div>

                                                <div>

                                                    <Row>

                                                        <Col>Shipping</Col>

                                                        <Col>$0.00</Col>

                                                    </Row>

                                                </div>

                                                <div>

                                                    <Row>

                                                        <Col>Tax</Col>

                                                        <Col>$0.00</Col>

                                                    </Row>

                                                </div>



                                                <div>

                                                    <Row>

                                                        <Col>Total</Col>

                                                        <Col>${{ $ordera['total_price'] }}</Col>

                                                    </Row>

                                                </div>



                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                
@endisset
            <script type="lazyload_int">

 jQuery(document).ready(function ($){

 });

</script>



            <limespot></limespot>

        </section>





    </main>

</x-layout>

