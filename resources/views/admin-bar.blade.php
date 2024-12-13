@if (session()->has('isAdmin'))

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

                        <span class="breadcrumbs__separator" aria-hidden="true"> <svg xmlns="http://www.w3.org/2000/svg"

                                width="24" height="24" viewBox="0 0 24 24" fill="none">

                                <path d="M10 8L14 12L10 16" stroke="black" stroke-width="2" stroke-linecap="round"

                                    stroke-linejoin="round" />

                            </svg>

                        </span>



                        <span class="breadcrumbs__item">Admin</span>

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





                            <img id="583621690" class="responsive-image" src="/storage/logo/logo.png" width="400"

                                height="433"></a>

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







                    <h1 class="account__title">{{ $title }}</h1>




@if(Route::current()->getName() != 'showadminorders') 

                    <div class="account__header-links-wrapper">



                        <ul style="list-style: none">

                            <h3

                                style="display: flex; justify-content: center; align-items: center; 

                                margin-bottom: 15px;">

                                Edit Home Page</h3>

                            <li>

                                <a class="account__header-link" href="/custom/home-banner">HOME BANNER

                                </a>

                            </li>

                            <li><a class="account__header-link" href="/custom/features">FEATURES </a>

                            </li>

                            <li><a class="account__header-link" href="/custom/highlights">HIGHLIGHTS</a>

                            </li>

                            <li><a class="account__header-link" href="/custom/reviews">REVIEWS </a>

                            </li>

                            <li><a class="account__header-link" href="/custom/faqs">FAQ </a>

                            </li>

                        </ul>



                        @if (session()->has('isAdmin'))

                            <ul style="list-style: none">

                                <li>

                                    <a class="account__header-link" href="/account/admin/users">Manage Users</a>

                                </li>

                                <li><a class="account__header-link" href="/admin/users/register">Create Sub

                                        Admin</a>

                                </li>

                            </ul>

                        @endif







                        <ul style="list-style: none; ">

                            <li>

                                <a class="account__header-link" href="/account/admin/products">Manage Products</a>

                            </li>

                            <li>

                                <a class="account__header-link" href="/account/admin/types">Manage Types</a>

                            </li>

                            <li>

                                <a class="account__header-link" href="/account/admin/sizes">Manage Sizes</a>

                            </li>

                            <li>

                                <a class="account__header-link" href="/account/admin/materials">Manage

                                    Materials</a>

                            </li>

                            <li>

                                <a class="account__header-link" href="/account/admin/shapes">Manage Shapes</a>

                            </li>

                            <li>

                                <a class="account__header-link" href="/account/admin/colors">Manage Colors</a>

                            </li>

                            <li>

                                <a class="account__header-link" href="/account/admin/events">Manage Events</a>

                            </li>

                            <li>

                                <a class="account__header-link" href="/account/admin/designs">Manage Designs</a>

                            </li>

                            <li>

                                <a class="account__header-link" href="/account/admin/fonts">Manage Fonts</a>

                            </li>

                            <li>

                                <a class="account__header-link" href="/account/admin/inks">Manage Inks</a>

                            </li>

                        </ul>





                        <ul style="list-style: none; ">

                            <li>

                                <a class="account__header-link" href="/account/admin/orders">Manage Orders</a>

                            </li>

                            <li>

                                <a class="account__header-link" href="/custom/discounts">Voucher</a>

                            </li>

                            <li>

                                <a class="account__header-link" href="/custom/shippings">Shipping Cost</a>

                            </li>

                        </ul>





                    </div>
@endif


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



                        .account__header-links-wrapper>ul {

                            display: flex;

                            flex-direction: column;

                            justify-content: center;

                            align-items: center;

                            margin: 20px 20px;

                            background: maroon;

                            width: 100%;

                            height: 300px;

                            border-radius: 20px;

                        }



                        .account__header-links-wrapper>ul>li>a {

                            color: white !important;

                            text-decoration: none;

                            font-size: 20px;

                        }



                        .account__header-links-wrapper>ul>li>a:hover {

                            text-decoration: underline;

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

 $('.logout-modal--toggle').click(function(){

 $('.account__logout-modal-wrapper').toggleClass('logout-modal--open');

 $('account__logout-modal-wrapper').toggleClass('logout-modal--open');

 });

</script>

                </div>

            </div>

        </div>

    </div>

@endif

