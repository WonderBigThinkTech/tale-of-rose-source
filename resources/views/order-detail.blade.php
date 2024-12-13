<x-layout>
    <main id="MainContent" class="main-content">


        @include('menu-mobile')

        <div class="DrawerOverlay"></div>
        <section id="account-layout">
            <h2 class="hide">AccountContent</h2>

            <!-- start account.liquid (TEMPLATE) -->
            <style>
                .account__content-wrapper {
                    margin-top: 35px;
                }

                .account__orders-title {
                    font-size: 25px;
                    text-align: center;
                    text-transform: uppercase;
                }

                .account__orders-table {
                    border-collapse: collapse;
                    max-width: 1174px;
                    width: 100%;
                    margin: 50px auto;
                }

                .account__orders-table-row {
                    cursor: pointer;
                }

                .account__orders-table th,
                .account__orders-table td,
                .account__address-table th,
                .account__address-table td {
                    padding: 14px;
                }

                .account__orders-table th,
                .account__address-table th {
                    background: #f6f6f6;
                    color: #252525;
                    font-size: 20px;
                    font-weight: 700;
                    text-transform: uppercase;
                }

                .account__orders-table td {
                    text-align: center;
                }

                tbody tr:nth-child(odd) {
                    background: #fcfcfc;
                }

                .account__order-financial-status-label {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 14px;
                    font-size: inherit;
                }

                .account__order-financial-status svg {
                    width: 22px;
                    height: 22px;
                    stroke: #00c371;
                }

                .account__order-name,
                .account__order-date,
                .account__address-table td {
                    color: #24272a;
                    font-size: 18px;
                }

                .account__order-financial-status,
                .account__order-fulfillment-status,
                .account__order-total-price {
                    color: #4f5459;
                    font-size: 19px;
                    font-weight: 700;
                }

                .account__no-orders-wrapper {
                    margin: 50px auto;
                    text-align: center;
                }

                .account__address-table {
                    border-collapse: collapse;
                    width: 518px;
                    max-width: 100%;
                    margin: 0 auto;
                }

                .account__address-table tr td:first-child {
                    min-width: 185px;
                }

                .account__customer-addresses-link {
                    margin: 20px 0 40px;
                    text-align: center;
                }

                .account__customer-addresses {
                    color: #8D8D8D;
                    font-size: 14px;
                }

                @media (max-width: 1019px) {
                    .account__content-wrapper {
                        margin-top: 20px;
                    }

                    .account__orders-title {
                        font-size: 20px;
                    }

                    .account__orders-table {
                        margin: 35px auto;
                    }

                    .account__orders-table th,
                    .account__orders-table td,
                    .account__address-table th,
                    .account__address-table td {
                        padding: 10px;
                    }

                    .account__orders-table th,
                    .account__address-table th,
                    .account__order-name,
                    .account__order-date,
                    .account__address-table td,
                    .account__order-financial-status,
                    .account__order-fulfillment-status,
                    .account__order-total-price {
                        font-size: 12px;
                    }

                    .account__no-orders-wrapper {
                        margin: 40px auto;
                    }

                    .account__address-table {
                        width: 100%;
                    }

                    .account__address-table tr td:first-child {
                        min-width: 114px;
                    }

                    .account__order-financial-status-label {
                        gap: 10px;
                    }

                    .account__order-financial-status svg {
                        width: 16px;
                        height: 16px;
                    }
                }

                @media (max-width: 767px) {
                    .account__orders-title {
                        font-size: 15px;
                    }

                    .account__orders-table {
                        margin: 25px auto;
                    }

                    .account__address-table th,
                    .account__address-table td {
                        font-size: 12px;
                    }

                    .account__orders-table th,
                    .account__order-name,
                    .account__order-date,
                    .account__order-financial-status,
                    .account__order-fulfillment-status,
                    .account__order-total-price {
                        font-size: 10px;
                    }

                    .account__orders-table th,
                    .account__orders-table td,
                    .account__address-table th,
                    .account__address-table td {
                        padding: 7px;
                    }

                    .account__no-orders-wrapper {
                        margin: 30px auto;
                    }

                    .account__address-table {
                        width: 335px;
                    }

                    .account__address-table tr td:first-child {
                        min-width: 132px;
                    }

                    .account__order-financial-status-label {
                        gap: 5px;
                    }

                    .account__order-financial-status svg {
                        width: 10px;
                        height: 10px;
                    }

                    .account__customer-addresses {
                        font-size: 12px;
                    }
                }
            </style>
            <div class="account__wrapper">
                <div class="account__container">
                    <div class="account__header-wrapper wrapper">

                        <div class="account__header-breadcrumb">
                            <!-- start breadcrumb.liquid (SNIPPET) -->
                            <div class="breadcrumbs" aria-label="breadcrumbs">

                                <a id="breadcrumbs__homepage" class="breadcrumbs__item breadcrumbs__link" href="/"
                                    title="Home">Home</a>
                                <span class="breadcrumbs__separator" aria-hidden="true"> <svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path d="M10 8L14 12L10 16" stroke="black" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>

                                <span class="breadcrumbs__item">Account</span>
                            </div>
                            <style scoped>
                                .breadcrumbs {
                                    display: block;
                                    margin-bottom: 5.9px;
                                    line-height: 1;
                                }

                                .breadcrumbs span {
                                    color: #999;
                                }

                                .breadcrumbs__item {
                                    font-size: var(--breadcrumbFontSize, 1rem);
                                    color: var(--breadcrumbtextcolor, #000);
                                    font-style: var(--breadcrumbtextstyle, normal);
                                    letter-spacing: 0.6px;
                                }

                                .breadcrumbs__link {
                                    color: var(--breadcrumbLinkColor, #000);
                                    font-weight: 500;
                                }

                                .breadcrumbs__separator {
                                    display: inline;
                                }

                                .breadcrumbs__separator svg {
                                    width: 18px;
                                    height: 16px;
                                    transform: scale(1.8);
                                    padding-top: 2.7px;
                                }

                                @media (max-width: 1019px) {
                                    .breadcrumbs__separator {
                                        margin-right: 2px;
                                    }

                                    .breadcrumbs__separator svg {
                                        width: 16px;
                                        height: 11px;
                                        padding-top: 0;
                                        transform: scale(2.3);
                                    }

                                    .breadcrumbs__item {
                                        font-size: var(--breadcrumbFontSizeTablet, 1rem);
                                        letter-spacing: 0;
                                    }
                                }

                                @media (max-width: 767px) {
                                    .breadcrumbs__item {
                                        font-size: var(--breadcrumbFontSizeMobile, 1rem);
                                    }

                                    .breadcrumbs__separator svg {
                                        width: 7px;
                                        height: 6px;
                                        padding-bottom: 0;
                                    }
                                }
                            </style>

                        </div>
                        <div class="account__header">

                            <div class="customer-form__logo-wrapper">
                                <a href="/"
                                    class="customer-form__logo-link"><!-- start responsive-image.liquid (SNIPPET) -->


                                    <img id="592744645" class="responsive-image" src="/storage/logo/logo.png"
                                        sizes="(max-width: 479px) 480px, (max-width: 767px) 768px, (max-width: 1019px) 1020px, (max-width: 1279px) 1280px"
                                        alt="Image" width="400" height="433"></a>
                            </div>

                            <style>
                                .customer-form__logo-wrapper {
                                    display: flex;
                                    margin: 0 auto;

                                    height: auto;
                                    width: 60px;

                                }

                                .customer-form__logo-wrapper img,
                                .customer-form__logo-wrapper svg {
                                    width: 100%;
                                    height: 100%;
                                }

                                @media (max-width: 1019px) {
                                    .customer-form__logo-wrapper {

                                        width: px;

                                    }
                                }

                                @media (max-width: 767px) {
                                    .customer-form__logo-wrapper {

                                        width: px;

                                    }
                                }
                            </style>


                            <h1 class="account__title">Order {{ $order->id }}</h1>



                            <div class="account__logout-modal-wrapper">
                                <div class="account__logout-modal--overlay logout-modal--toggle"></div>
                                <div class="account__logout-modal-content">
                                    <span class="account__logout-modal--close logout-modal--toggle">x</span>
                                    <div class="account__logout-modal">
                                        <svg fill="#ee404c" width="64px" height="64px" viewBox="0 0 1920 1920"
                                            xmlns="http://www.w3.org/2000/svg" stroke="#ee404c">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M960 0c530.193 0 960 429.807 960 960s-429.807 960-960 960S0 1490.193 0 960 429.807 0 960 0Zm-9.838 1342.685c-84.47 0-153.19 68.721-153.19 153.19 0 84.47 68.72 153.192 153.19 153.192s153.19-68.721 153.19-153.191-68.72-153.19-153.19-153.19ZM1153.658 320H746.667l99.118 898.623h208.755L1153.658 320Z"
                                                    fill-rule="evenodd"></path>
                                            </g>
                                        </svg>


                                        <h4 class="account__logout-modal-headline">Are you sure?</h4>

                                        <p class="account__logout-modal-message">Do you really want to logout?</p>

                                        <div class="account__logout-modal-button-wrapper">
                                            <form action="/account/logout" method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="account__logout-modal-button
                                                     logout-modal--cancel logout-modal--toggle">CANCEL</button>
                                                <button type="submit"
                                                    class="account__logout-modal-button logout-modal--logout">LOGOUT</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <style>
                            .account__header-breadcrumb .breadcrumbs {
                                padding: 15px 0;
                            }

                            .account__header .customer-form__logo-wrapper {
                                margin: 0;
                            }

                            .account__header {
                                width: 100%;
                            }

                            .account__title {
                                color: #000;
                                text-transform: uppercase;
                                font-size: 35px;
                                letter-spacing: -1px;
                            }

                            .account__header-links-wrapper {
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                                margin: 4px 0 9px;
                            }

                            .account__header-link {
                                color: #595959;
                                font-size: 16px;
                                text-decoration-line: underline;
                            }

                            .account__logout-link {
                                display: flex;
                                align-items: center;
                                gap: 10px;
                            }

                            .account__logout-link svg {
                                width: 20px;
                                height: 20px;
                            }

                            body.logout-modal--open {
                                overflow: hidden;
                            }

                            .account__logout-modal-wrapper {
                                width: 100%;
                                height: 100%;
                                position: fixed;
                                top: 0;
                                left: 0;
                                z-index: 2;
                                padding: 20px;

                                align-items: center;
                                justify-content: center;

                                display: none;
                                visibility: hidden;
                                opacity: 0;
                            }

                            .account__logout-modal-wrapper.logout-modal--open {
                                display: flex;
                                visibility: visible;
                                opacity: 1;
                            }

                            .account__logout-modal--overlay {
                                width: 100%;
                                height: 100%;
                                position: absolute;
                                top: 0;
                                left: 0;
                                background-color: #000;
                                opacity: 0.8;
                                visibility: visible;
                                display: block;
                                transition: ease 0.3s all;
                                z-index: 5;
                            }

                            .account__logout-modal-content {
                                width: 400px;
                                position: relative;
                                background: #FFF;
                                padding: 20px;
                                z-index: 10;
                            }

                            .account__logout-modal--close {
                                font-size: 20px;
                                position: absolute;
                                right: 3%;
                                top: 1%;
                                cursor: pointer;
                                color: #aeaeae;
                            }

                            .account__logout-modal {
                                text-align: center;
                            }

                            .account__logout-modal-headline {
                                margin-bottom: 15px;
                                font-size: 20px;
                            }

                            .account__logout-modal-message {
                                font-size: 16px;
                            }

                            .account__logout-modal-button-wrapper {
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                gap: 15px;
                                margin-top: 20px;
                            }

                            .account__logout-modal-button {
                                width: 35%;
                                padding: 8px;
                                border-radius: 5px;
                                overflow: hidden;
                                font-weight: 600;
                                color: #FFF;
                            }

                            .account__logout-modal-button.logout-modal--cancel {
                                background-color: #aeaeae;
                            }

                            .account__logout-modal-button.logout-modal--logout {
                                background: #ee404c;
                                width: 100px;
                            }

                            @media (max-width: 1019px) {
                                .account__header-breadcrumb .breadcrumbs {
                                    padding: 0 0 20px;
                                }

                                .account__title {
                                    font-size: 30px;
                                }

                                .account__logout-modal-headline {
                                    font-size: 18px;
                                }
                            }

                            @media (max-width: 767px) {
                                .account__header-breadcrumb .breadcrumbs {
                                    padding: 0 0 15px;
                                }

                                .account__title {
                                    font-size: 20px;
                                }

                                .account__header-link {
                                    font-size: 12px;
                                    gap: 5px;
                                }

                                .account__logout-link svg {
                                    width: 17px;
                                    height: 17px;
                                }
                            }
                        </style>

                        <script type="lazyload_int">
 $(document).ready( function(){
 $('a[href^="/account/logout"]').on("click", function(){
 $.ajax($(this).attr('href')).done(function(){
 window.location.href = "/account/login";
 });
 return false;
 });
 });

 $('.logout-modal--toggle').click(function(){
 $('.account__logout-modal-wrapper').toggleClass('logout-modal--open');
 $('account__logout-modal-wrapper').toggleClass('logout-modal--open');
 });
</script>
                    </div>

                    <div class="account__info-wrapper wrapper">

                        <div class="account__address-wrapper"><!-- start snippets/customer-address.liquid -->

                            {{-- zzz --}}
                            <div class="account__address-table"
                                style="width: 100%; text-align: center; margin-top: 30px;">
                                <div style="display: flex; justify-content: center;">
                                    <div style="display: flex; flex-direction: column; text-align: left;">
                                        <div>

                                            <h2>Shipping</h2>
                                            <p><strong>Name: </strong>
                                                {{ !$user->isEmpty() ? $user->value('firstName') . ' ' . $user->value('lastName') : 'None' }}
                                            </p>
                                            <p><strong>Email: </strong>
                                                {{ !$user->isEmpty() ? $user->value('email') : 'None' }}
                                            </p>
                                            <p>
                                                <strong>Address: </strong>
                                            <div>
                                                @if ($address->count() > 0)
                                                    {{ $address->value('company') .
                                                        ', ' .
                                                        $address->value('address1') .
                                                        ', ' .
                                                        $address->value('city') .
                                                        ', ' .
                                                        $address->value('postal') .
                                                        ', ' .
                                                        $address->value('country') }}
                                                @else
                                                    None
                                                @endif
                                            </div>
                                            </p>
                                            {{ $order->is_delivered ? 'Delivered at ' . $order->delivered_at : 'Not delivered' }}



                                            <div>
                                                <h2>Payment Method</h2>
                                                <p>
                                                    <strong>Method: </strong>
                                                    {{ $order->payment_method }}
                                                </p>
                                                {{ $order->is_paid ? 'Paid at ' . $order->paid_at : 'Not paid' }}
                                            </div>

                                        </div>

                                        <div>
                                            <h2>Order Items</h2>
                                            <ul class="cart-items__list">
                                                @foreach ($order->products()->get() as $item)
                                                    <li class="cart-items__line-item ">
                                                        <span class="cart-items__item-image-wrapper">


                                                            <img id="467931584"
                                                                class="responsive-image cart-items__item-image"
                                                                src="/storage/products/{{ $item->images()->value('name') }}"
                                                                srcset="/storage/products/{{ $item->images()->value('name') }}"
                                                                sizes="(max-width: 479px) 480px, (max-width: 767px) 768px, (max-width: 1019px) 1020px, (max-width: 1279px) 1280px"
                                                                alt="" width="0" height="50"></span>

                                                        <div class="cart-items__item-info-wrapper">
                                                            <div class="cart-items__item-details ">
                                                                <div class="cart-items__item-details-wrapper">
                                                                    <div class="cart-items__info-names">
                                                                        <h2 class="cart-items__item-title"
                                                                            style="font-size: 30px">
                                                                            <a href="/products/will-you-marry-me-acrylic-square-box-9-preserved-rose-stem"
                                                                                class="cart-items__item-link"
                                                                                title="Will you marry me? - Acrylic 
                                                                Square Box (9 Preserved Rose Stem)">
                                                                                {{ $item->name }}</a>
                                                                        </h2>

                                                                        <span
                                                                            class="cart-items__item-variant">{{ $item->colors()->value('name') }}


                                                                    </div>


                                                                </div>

                                                            </div>

                                                            <span class="cart-items__item-result">


                                                                <span class="cart-items__item-price"><span
                                                                        class="money"
                                                                        style="">${{ $item->price }}</span></span>



                                                            </span>
                                                        </div>
                                                    </li>
                                                @endforeach

                                            </ul>

                                        </div>
                                    </div>

                                    <div style="display: flex: flex-direction: column; ">
                                        <div>
                                            <div>
                                                <h2>Order Summary</h2>


                                                <div>
                                                    <Row>
                                                        <Col>Items</Col>
                                                        <Col>${{ $order->total_price }}</Col>
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
                                                        <Col>${{ $order->total_price }}</Col>
                                                    </Row>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script type="lazyload_int">
 jQuery(document).ready(function ($){
 $('.account__orders-table-row').click(function (){
 window.location = $(this).data('href');
 });
 });
</script>

            <limespot></limespot>
        </section>


    </main>
</x-layout>
