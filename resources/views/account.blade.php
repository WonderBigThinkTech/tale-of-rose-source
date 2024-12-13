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
                    padding: 24px;
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
                    font-size: 22px;
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
                        padding: 15px;
                    }

                    .account__orders-table th,
                    .account__address-table th,
                    .account__order-name,
                    .account__order-date,
                    .account__address-table td,
                    .account__order-financial-status,
                    .account__order-fulfillment-status,
                    .account__order-total-price {
                        font-size: 14px;
                    }

                    .account__no-orders-wrapper {
                        margin: 40px auto;
                    }

                    .account__address-table {
                        width: 320px;
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


                                    <img id="993367281" class="responsive-image" src="/storage/logo/logo.png"
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


                            <h1 class="account__title">My Account</h1>

                            <div class="account__header-links-wrapper">
                                <a class="account__header-link" href="#">Manage Subscriptions</a>
                                <a class="account__logout-link account__header-link logout-modal--toggle"
                                    href="#">Logout<!-- start icon-logout.liquid (SNIPPET) -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="22"
                                        viewBox="0 0 25 22" fill="none">
                                        <path
                                            d="M13.4472 7.17338C13.7066 7.17338 13.9554 7.07031 14.139 6.8869C14.3224 6.70339 14.4254 6.4546 14.4254 6.19519V2.93456C14.4254 2.15622 14.1162 1.40987 13.5659 0.859528C13.0156 0.309189 12.2692 0 11.4909 0H3.07519C2.29685 0 1.55049 0.309189 1.00015 0.859528C0.449814 1.40987 0.140625 2.15625 0.140625 2.93456V18.2595C0.140625 19.0378 0.449814 19.7842 1.00015 20.3345C1.55049 20.8849 2.29688 21.1941 3.07519 21.1941H11.4876H11.4875C12.2658 21.1941 13.0122 20.8849 13.5625 20.3345C14.1129 19.7842 14.4221 19.0378 14.4221 18.2595V15.3249C14.4221 14.9754 14.2357 14.6525 13.933 14.4778C13.6304 14.303 13.2575 14.303 12.9548 14.4778C12.6522 14.6525 12.4657 14.9754 12.4657 15.3249V18.2595C12.4657 18.5189 12.3626 18.7677 12.1792 18.9512C11.9958 19.1346 11.747 19.2377 11.4875 19.2377H3.07508C2.81567 19.2377 2.56678 19.1346 2.38337 18.9512C2.19996 18.7677 2.09689 18.5189 2.09689 18.2595V2.93456C2.09689 2.67516 2.19996 2.42637 2.38337 2.24285C2.56678 2.05944 2.81567 1.95638 3.07508 1.95638H11.4875H11.4874C11.7469 1.95638 11.9957 2.05944 12.1791 2.24285C12.3625 2.42636 12.4656 2.67515 12.4656 2.93456V6.19519C12.4656 6.45523 12.5692 6.70444 12.7533 6.88807C12.9375 7.07159 13.1871 7.17422 13.4471 7.17338H13.4472Z"
                                            fill="#595959" />
                                        <path
                                            d="M6.43695 10.76C6.43695 11.0194 6.54001 11.2682 6.72342 11.4517C6.90694 11.6352 7.15573 11.7382 7.41514 11.7382H20.8522L17.2264 15.3249H17.2265C16.9917 15.5729 16.9033 15.9252 16.9932 16.2547C17.083 16.5841 17.338 16.8428 17.6662 16.9373C17.9943 17.0318 18.3479 16.9483 18.5992 16.7172L23.9173 11.4578C24.1034 11.2739 24.2083 11.0232 24.2083 10.7616C24.2083 10.5 24.1034 10.2493 23.9173 10.0655L18.5992 4.81266C18.3479 4.58149 17.9943 4.49807 17.6662 4.59253C17.338 4.68699 17.083 4.94576 16.9932 5.27511C16.9033 5.60457 16.9917 5.95696 17.2265 6.20491L20.8523 9.79159H7.41524C7.15754 9.79159 6.91012 9.89328 6.72704 10.0747C6.54384 10.256 6.43961 10.5023 6.43706 10.76L6.43695 10.76Z"
                                            fill="#595959" />
                                    </svg>
                                </a>
                            </div>

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
                        @if ($orders->count() > 0)
                            <table class="account__address-table"
                                style="width: 100%; text-align: center; margin-top: 30px;">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>DATE</th>
                                        <th>TOTAL PRICE</th>
                                        <th>PAID</th>
                                        <th>DELIVERED</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>{{ $order->total_price }}</td>
                                            <td><button
                                                    style="color: white; background-color: green;
                                                width: 40px; height: 40px; border-radius: 5px; font-size: 22px;">
                                                    {{ $order->is_paid ? 'X' : 'O' }}
                                                </button></td>
                                            <td><button
                                                    style="color: white; background-color: green;
                                                width: 40px; height: 40px; border-radius: 5px; font-size: 22px;">
                                                    {{ $order->is_delivered ? 'X' : 'O' }}
                                                </button></td>

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        @else
                            <div class="account__no-orders-wrapper">
                                <p class="account__no-orders">You haven&#39;t placed any orders yet.</p>
                            </div>
                        @endif
                        <div class="account__address-wrapper"><!-- start snippets/customer-address.liquid -->

                            <table class="account__address-table">
                                <tr>
                                    <th colspan="2">Account Details</th>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>
                                        Tuan Ngoc
                                    </td>
                                </tr>
                                <tr>
                                    <td>Company</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Address 1</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Address 2</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>
                                        - , , United States
                                    </td>
                                </tr>
                            </table>
                            <div class="account__customer-addresses-link">
                                <a class="account__customer-addresses" title="Addresses" id="id-addresses"
                                    href="/account/addresses/{{ auth()->user()->id }}">View Addresses (1)
                                </a>
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
