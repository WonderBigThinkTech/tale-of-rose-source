<x-layout>
    <main id="MainContent" class="main-content">


        @include('menu-mobile')

        <div class="DrawerOverlay"></div>
        <section id="addresses-layout">
            <h2 class="hide">AddressesContent</h2>

            <!-- start addresses.liquid (TEMPLATE) -->
            <style>
                .address__container-wrapper {
                    margin-bottom: 40px;
                }

                .address__container {
                    margin-top: 35px;
                }

                .address__title-wrapper {
                    width: 100%;
                    display: block;
                    clear: both;
                    text-align: center;
                }

                .address__title {
                    color: #000;
                    font-size: 25px;
                    line-height: 140%;
                    text-transform: uppercase;
                }

                .address__content-wrapper {
                    margin: 35px auto 0;
                    width: 1025px;
                    max-width: 100%;
                    display: flex;
                    flex-direction: column;
                    gap: 15px;
                }

                .address__content {
                    width: 100%;
                    background: #F9F9F9;
                    padding: 12px;
                }

                .address__content-headline {
                    text-align: center;
                    line-height: 1.2;
                    font-weight: 700;
                }

                .account__address-name {
                    color: #2C2C2C;
                    font-size: 25px;
                }

                .account__set-as-default {
                    color: #4D4C4C;
                    font-size: 20px;
                }

                .address__content-container,
                .address__edit-form {
                    width: 600px;
                    max-width: 100%;
                    margin: 20px auto 0;
                    padding: 10px;
                }

                .account__address-table {
                    width: 100%;
                }

                .account__address-table tr td:last-child {
                    text-align: right;
                }

                .account__address-table tr td {
                    color: #2C2C2C;
                    font-size: 20px;
                    line-height: 140%;
                }

                .address__divisor-line {
                    width: 100%;
                    height: 2px;
                    background: #D9D9D9;
                    margin: 15px 0;
                }

                .address__edit-form-button-wrapper,
                .address__buttons-wrapper {
                    display: flex;
                    gap: 20px;
                    align-items: center;
                    justify-content: center;
                }

                .address__edit-button {
                    display: flex;
                    padding: 8px 15px;
                    justify-content: center;
                    align-items: center;
                    background: #424242;
                    color: #FFF;
                    font-size: 16px;
                    font-weight: 600;
                    line-height: 140%;
                }

                .address__buttons-wrapper a {
                    color: #424242;
                    font-weight: 600;
                }

                .address__add-new-buttons-wrapper {
                    margin: 40px 0;
                }

                .address__add-new-button {
                    margin: 0 auto;
                    display: flex;
                    width: 348px;
                    max-width: 100%;
                    padding: 10px 20px;
                    justify-content: center;
                    align-items: center;
                    color: #FFF;
                    font-size: 20px;
                    font-weight: 700;
                    line-height: 140%;
                    background: #424242;
                }

                .address__edit-form-fieldset-wrapper {
                    display: flex;
                    align-items: center;
                    flex-wrap: wrap;
                    gap: 10px 2%;
                    margin-bottom: 30px;
                }

                .address__edit-form-fieldset {
                    width: 49%;
                    display: flex;
                    flex-direction: column;
                    padding: 8px;
                }

                .address_default_address-label,
                .address__edit-form-fieldset-label {
                    color: #424242;
                    font-size: 16px;
                    font-weight: 700;
                    line-height: 140%;
                }

                .customer-form__input {
                    padding: 8px;
                    border: 1px solid #2C2C2C;
                }

                .address__edit-form-fieldset-default-address {
                    width: 100%;
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    padding: 8px;
                }

                .address__edit-form-fieldset-default-address input[type="checkbox"] {
                    width: 22px;
                    height: 22px;
                    margin: 0;
                }

                .address__edit-form-button-wrapper {
                    display: flex;
                }

                .address__edit-form-update-button,
                .address__edit-form-new-button {
                    width: 155px;
                    max-width: 100%;
                    padding: 8px 15px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background: #26B522;
                    color: #FFF;
                    font-size: 16px;
                    font-weight: 700;
                    line-height: 140%;
                    border: none;
                    cursor: pointer;
                }

                .address__edit-form-cancel-button {
                    color: #424242;
                    font-size: 16px;
                    font-weight: 700;
                    line-height: 140%;
                    background: transparent;
                }

                .address__add-new-form {
                    width: 826px;
                    max-width: 100%;
                    margin: 20px auto 0;
                    padding: 10px;
                }

                .address__edit-form-new-button {
                    width: 166px;
                }

                .address__add-new-cancel-button {
                    color: #424242;
                    font-weight: 600;
                    font-size: 16px;
                    background: transparent;
                }

                body.modal-delete--open {
                    overflow: hidden;
                }

                .address__modal-delete-wrapper {
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

                .address__modal-delete-wrapper.modal-delete--open {
                    display: flex;
                    visibility: visible;
                    opacity: 1;
                }

                .address__modal-delete--overlay {
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

                .address__modal-delete-content {
                    width: 400px;
                    position: relative;
                    background: #FFF;
                    padding: 20px;
                    z-index: 10;
                }

                .address__modal-delete--close {
                    font-size: 20px;
                    position: absolute;
                    right: 3%;
                    top: 1%;
                    cursor: pointer;
                    color: #aeaeae;
                }

                .address__modal-delete {
                    text-align: center;
                }

                .address__modal-delete svg {
                    width: 60px;
                }

                .address__modal-delete-headline {
                    margin-bottom: 15px;
                    font-size: 20px;
                }

                .address__modal-delete-message {
                    font-size: 16px;
                }

                .address__modal-delete-button-wrapper {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    gap: 15px;
                    margin-top: 20px;
                }

                .address__modal-delete-button {
                    width: 35%;
                    padding: 8px;
                    border-radius: 5px;
                    overflow: hidden;
                    font-weight: 600;
                    color: #FFF;
                }

                .address__modal-delete-button.delete-button--cancel {
                    background-color: #aeaeae;
                }

                .address__modal-delete-button.delete-button--delete {
                    background: #ee404c;
                    width: 100px;
                }

                @media (max-width: 1019px) {
                    .address__container {
                        margin-top: 20px;
                    }

                    .address__title-wrapper {
                        margin-top: 20px;
                    }

                    .address__title {
                        font-size: 20px;
                    }

                    .address__content-wrapper {
                        width: 615px;
                        gap: 10px;
                    }

                    .address__content {
                        padding: 8px;
                    }

                    .account__address-name {
                        font-size: 16px;
                    }

                    .account__set-as-default {
                        font-size: 14px;
                    }

                    .account__address-table tr td {
                        font-size: 16px;
                    }

                    .address__edit-button,
                    .address__buttons-wrapper a {
                        font-size: 12px;
                    }

                    .address__add-new-button {
                        width: 245px;
                        font-size: 16px;
                    }

                    .address__content-container,
                    .address__edit-form {
                        width: 400px;
                        margin: 15px auto 0;
                    }

                    .address_default_address-label,
                    .address__edit-form-fieldset-label,
                    .customer-form__input,
                    .address_default_address-label {
                        font-size: 14px;
                    }

                    .address__edit-form-update-button,
                    .address__edit-form-new-button,
                    .address__add-new-cancel-button,
                    .address__edit-form-cancel-button {
                        font-size: 12px;
                    }

                    .address__edit-form-fieldset-default-address input[type="checkbox"] {
                        width: 16px;
                        height: 16px;
                    }

                    .address__add-new-buttons-wrapper {
                        margin: 25px 0;
                    }

                    .address__modal-delete-headline {
                        font-size: 18px;
                    }
                }

                @media (max-width: 767px) {
                    .address__container-wrapper {
                        margin-bottom: 20px;
                    }

                    .address__title {
                        font-size: 15px;
                    }

                    .address__content-wrapper {
                        margin: 15px auto 0;
                    }

                    .address__content-container,
                    .address__edit-form {
                        margin: 10px auto 0;
                    }

                    .account__address-table tr td {
                        font-size: 12px;
                    }

                    .address__add-new-buttons-wrapper {
                        margin: 20px 0;
                    }

                    .address__add-new-button {
                        font-size: 14px;
                    }
                }
            </style>
            <div class="address__wrapper wrapper">
                <div class="address__container-wrapper">

                    <div class="account__header-breadcrumb">
                        <!-- start breadcrumb.liquid (SNIPPET) -->
                        <div class="breadcrumbs" aria-label="breadcrumbs">

                            <a id="breadcrumbs__homepage" class="breadcrumbs__item breadcrumbs__link" href="/"
                                title="Home">Home</a>
                            <span class="breadcrumbs__separator" aria-hidden="true"> <svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path d="M10 8L14 12L10 16" stroke="black" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>

                            <span class="breadcrumbs__item">Addresses</span>
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


                                <img id="244132823" class="responsive-image"
                                    src="//speakingroses.com/cdn/shop/files/Favicon.svg?v=1700829289&width=50"
                                    srcset="//speakingroses.com/cdn/shop/files/Favicon.svg?v=1700829289&width=100 100w,//speakingroses.com/cdn/shop/files/Favicon.svg?v=1700829289&width=153 153w,//speakingroses.com/cdn/shop/files/Favicon.svg?v=1700829289&width=234 234w,//speakingroses.com/cdn/shop/files/Favicon.svg?v=1700829289&width=358 358w,//speakingroses.com/cdn/shop/files/Favicon.svg?v=1700829289&width=548 548w,"
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

                        <div class="account__header-links-wrapper"><a title="Account" id="id-account-return"
                                class="account__go-back-link account__header-link" href="/account">Return to Account
                                Details</a><a class="account__logout-link account__header-link logout-modal--toggle"
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
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M960 0c530.193 0 960 429.807 960 960s-429.807 960-960 960S0 1490.193 0 960 429.807 0 960 0Zm-9.838 1342.685c-84.47 0-153.19 68.721-153.19 153.19 0 84.47 68.72 153.192 153.19 153.192s153.19-68.721 153.19-153.191-68.72-153.19-153.19-153.19ZM1153.658 320H746.667l99.118 898.623h208.755L1153.658 320Z"
                                                fill-rule="evenodd"></path>
                                        </g>
                                    </svg>


                                    <h4 class="account__logout-modal-headline">Are you sure?</h4>

                                    <p class="account__logout-modal-message">Do you really want to logout?</p>

                                    <div class="account__logout-modal-button-wrapper">
                                        <button
                                            class="account__logout-modal-button logout-modal--cancel logout-modal--toggle">CANCEL</button>
                                        <a class="account__logout-modal-button logout-modal--logout"
                                            href="/account/logout">LOGOUT</a>
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

                    <div class="address__container">
                        <div class="address__title-wrapper">
                            <h2 class="address__title">Your Addresses</h2>
                        </div>
                        <div class="address__content-wrapper">
                            <div class="address__content">
                                <div class="address__content-container">
                                    <div class="address__content-headline">
                                        <h5 class="account__address-name"> {{ $firstName . ' ' . $lastName }} </h5>

                                        <p class="account__set-as-default">Default</p>

                                    </div>



                                    <table class="account__address-table">
                                        <tr>
                                            <td>Company:</td>
                                            <td>
                                                @if ($address != null)
                                                    {{ $address->company }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Phone:</td>
                                            <td>
                                                @if ($address != null)
                                                    {{ $address->phone }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Street:</td>
                                            <td>
                                                @if ($address != null)
                                                    {{ $address->address1 }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>City:</td>
                                            <td>
                                                @if ($address != null)
                                                    {{ $address->city }}
                                                @endif
                                            </td>
                                        </tr>
                                    </table>

                                    <div class="address__divisor-line"></div>

                                    <div class="address__buttons-wrapper">
                                        <button type="button" id="address-edit-toggle" class="address__edit-button"
                                            data-form-id="8943303196831">
                                            Edit
                                        </button>

                                        <a class="delete-modal--toggle" href="#"
                                            onclick="Shopify.CustomerAddress.destroy(8943303196831, &quot;Are you sure you wish to delete this address?&quot;);return false">Delete</a>
                                    </div>
                                </div>

                                <div id="AddressEditForm" class="hide address__edit-form">
                                    <form method="post"
                                        action="/account/addresses/{{ auth()->user()->id }}/{{ $address->id }}"
                                        id="address_form_8943303196831" accept-charset="UTF-8">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="form_type" value="customer_address" /><input
                                            type="hidden" name="utf8" value="✓" />

                                        <div class="address__edit-form-fieldset-wrapper">


                                            <div class="address__edit-form-fieldset">
                                                <label class="address__edit-form-fieldset-label"
                                                    for="company">Company</label>
                                                <input type="text" name="company" id="AddressCompany"
                                                    class="customer-form__input" value="{{ $address->company }}"
                                                    autocapitalize="words">
                                            </div>

                                            <div class="address__edit-form-fieldset">
                                                <label class="address__edit-form-fieldset-label"
                                                    for="address1">Address 1</label>
                                                <input type="text" name="address1" id="AddressAddress1"
                                                    class="customer-form__input" value="{{ $address->address1 }}"
                                                    autocapitalize="words">
                                            </div>

                                            <div class="address__edit-form-fieldset">
                                                <label class="address__edit-form-fieldset-label"
                                                    for="address2">Address 2</label>
                                                <input type="text" name="address2" id="AddressAddress2"
                                                    class="customer-form__input" value="{{ $address->address2 }}"
                                                    autocapitalize="words">
                                            </div>

                                            <div class="address__edit-form-fieldset">
                                                <label class="address__edit-form-fieldset-label"
                                                    for="city">City</label>
                                                <input type="text" name="city" id="AddressCity"
                                                    class="customer-form__input" value="{{ $address->city }}"
                                                    autocapitalize="words">
                                            </div>

                                            <div class="address__edit-form-fieldset">
                                                <label class="address__edit-form-fieldset-label"
                                                    for="country">Country</label>
                                                <select name="country" id="AddressCountry"
                                                    class="customer-form__input edit-country"
                                                    data-default="United States" required>
                                                    <option value="United States"
                                                        data-provinces="[[&quot;Alabama&quot;,&quot;Alabama&quot;],[&quot;Alaska&quot;,&quot;Alaska&quot;],[&quot;American Samoa&quot;,&quot;American Samoa&quot;],[&quot;Arizona&quot;,&quot;Arizona&quot;],[&quot;Arkansas&quot;,&quot;Arkansas&quot;],[&quot;Armed Forces Americas&quot;,&quot;Armed Forces Americas&quot;],[&quot;Armed Forces Europe&quot;,&quot;Armed Forces Europe&quot;],[&quot;Armed Forces Pacific&quot;,&quot;Armed Forces Pacific&quot;],[&quot;California&quot;,&quot;California&quot;],[&quot;Colorado&quot;,&quot;Colorado&quot;],[&quot;Connecticut&quot;,&quot;Connecticut&quot;],[&quot;Delaware&quot;,&quot;Delaware&quot;],[&quot;District of Columbia&quot;,&quot;Washington DC&quot;],[&quot;Federated States of Micronesia&quot;,&quot;Micronesia&quot;],[&quot;Florida&quot;,&quot;Florida&quot;],[&quot;Georgia&quot;,&quot;Georgia&quot;],[&quot;Guam&quot;,&quot;Guam&quot;],[&quot;Hawaii&quot;,&quot;Hawaii&quot;],[&quot;Idaho&quot;,&quot;Idaho&quot;],[&quot;Illinois&quot;,&quot;Illinois&quot;],[&quot;Indiana&quot;,&quot;Indiana&quot;],[&quot;Iowa&quot;,&quot;Iowa&quot;],[&quot;Kansas&quot;,&quot;Kansas&quot;],[&quot;Kentucky&quot;,&quot;Kentucky&quot;],[&quot;Louisiana&quot;,&quot;Louisiana&quot;],[&quot;Maine&quot;,&quot;Maine&quot;],[&quot;Marshall Islands&quot;,&quot;Marshall Islands&quot;],[&quot;Maryland&quot;,&quot;Maryland&quot;],[&quot;Massachusetts&quot;,&quot;Massachusetts&quot;],[&quot;Michigan&quot;,&quot;Michigan&quot;],[&quot;Minnesota&quot;,&quot;Minnesota&quot;],[&quot;Mississippi&quot;,&quot;Mississippi&quot;],[&quot;Missouri&quot;,&quot;Missouri&quot;],[&quot;Montana&quot;,&quot;Montana&quot;],[&quot;Nebraska&quot;,&quot;Nebraska&quot;],[&quot;Nevada&quot;,&quot;Nevada&quot;],[&quot;New Hampshire&quot;,&quot;New Hampshire&quot;],[&quot;New Jersey&quot;,&quot;New Jersey&quot;],[&quot;New Mexico&quot;,&quot;New Mexico&quot;],[&quot;New York&quot;,&quot;New York&quot;],[&quot;North Carolina&quot;,&quot;North Carolina&quot;],[&quot;North Dakota&quot;,&quot;North Dakota&quot;],[&quot;Northern Mariana Islands&quot;,&quot;Northern Mariana Islands&quot;],[&quot;Ohio&quot;,&quot;Ohio&quot;],[&quot;Oklahoma&quot;,&quot;Oklahoma&quot;],[&quot;Oregon&quot;,&quot;Oregon&quot;],[&quot;Palau&quot;,&quot;Palau&quot;],[&quot;Pennsylvania&quot;,&quot;Pennsylvania&quot;],[&quot;Puerto Rico&quot;,&quot;Puerto Rico&quot;],[&quot;Rhode Island&quot;,&quot;Rhode Island&quot;],[&quot;South Carolina&quot;,&quot;South Carolina&quot;],[&quot;South Dakota&quot;,&quot;South Dakota&quot;],[&quot;Tennessee&quot;,&quot;Tennessee&quot;],[&quot;Texas&quot;,&quot;Texas&quot;],[&quot;Utah&quot;,&quot;Utah&quot;],[&quot;Vermont&quot;,&quot;Vermont&quot;],[&quot;Virgin Islands&quot;,&quot;U.S. Virgin Islands&quot;],[&quot;Virginia&quot;,&quot;Virginia&quot;],[&quot;Washington&quot;,&quot;Washington&quot;],[&quot;West Virginia&quot;,&quot;West Virginia&quot;],[&quot;Wisconsin&quot;,&quot;Wisconsin&quot;],[&quot;Wyoming&quot;,&quot;Wyoming&quot;]]">
                                                        United States</option>
                                                </select>
                                            </div>

                                            <div class="address__edit-form-fieldset" style="display: none;">
                                                <label class="address__edit-form-fieldset-label"
                                                    for="address[province]">Province</label>
                                                <select name="address[province]" id="AddressProvince"
                                                    class="customer-form__input" data-default=""></select>
                                            </div>

                                            <div class="address__edit-form-fieldset">
                                                <label class="address__edit-form-fieldset-label"
                                                    for="postal">Postal/Zip Code</label>
                                                <input type="text" name="postal" id="AddressZip"
                                                    class="customer-form__input" value="{{ $address->postal }}"
                                                    autocapitalize="characters">
                                            </div>

                                            <div class="address__edit-form-fieldset">
                                                <label class="address__edit-form-fieldset-label"
                                                    for="phone">Phone</label>
                                                <input type="tel" name="phone" id="AddressPhone"
                                                    class="customer-form__input" value="{{ $address->phone }}"
                                                    pattern="[0-9\-]*">
                                            </div>

                                            <div class="address__edit-form-fieldset-default-address">
                                                <input type="checkbox" id="address_default_address_8943303196831"
                                                    name="default" value="1" />
                                                <label for="default">Set as default
                                                    address</label>
                                            </div>
                                        </div>

                                        <div class="address__divisor-line"></div>

                                        <div class="address__edit-form-button-wrapper">
                                            <input type="submit" id="editform-button"
                                                class="address__edit-form-update-button" name="update"
                                                value="Update Address">
                                            <button type="button" id="address-edit-cancel"
                                                class="address__edit-form-cancel-button" data-form-id="8943303196831">
                                                Cancel</button>
                                        </div><input type="hidden" name="_method" value="put" />
                                    </form>
                                </div>
                            </div>
                            <div class="address__modal-delete-wrapper">
                                <div class="address__modal-delete--overlay delete-modal--toggle"></div>
                                <div class="address__modal-delete-content">
                                    <span class="address__modal-delete--close delete-modal--toggle">x</span>
                                    <div class="address__modal-delete">
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


                                        <h4 class="address__modal-delete-headline">Are you sure?</h4>

                                        <p class="address__modal-delete-message">Do you really want to delete these
                                            address? This action cannot be undone.</p>

                                        <div class="address__modal-delete-button-wrapper">
                                            <button
                                                class="address__modal-delete-button delete-button--cancel delete-modal--toggle">CANCEL</button>
                                            <form
                                                action="/account/addresses/{{ auth()->user()->id }}/{{ $address->id }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="address__modal-delete-button delete-button--delete">
                                                    DELETE
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="address__add-new-buttons-wrapper">
                            <button type="button" id="address-new-toggle"
                                class="address__add-new-button--toggle address__add-new-button">Add a New
                                Address</button>
                        </div>

                        <div id="AddressNewForm" class="hide address__add-new-form">
                            <form method="post" action="/account/addresses/{{ auth()->user()->id }}"
                                id="address_form_new" accept-charset="UTF-8">
                                @csrf
                                <input type="hidden" name="form_type" value="customer_address" /><input
                                    type="hidden" name="utf8" value="✓" />
                                <div class="address__edit-form-fieldset-wrapper">


                                    <div class="address__edit-form-fieldset">
                                        <label class="address__edit-form-fieldset-label"
                                            for="company">Company</label>
                                        <input type="text" name="company" id="AddressCompanyNew"
                                            class="customer-form__input" placeholder="Company" value=""
                                            autocapitalize="words">
                                    </div>

                                    <div class="address__edit-form-fieldset">
                                        <label class="address__edit-form-fieldset-label" for="address1">Address
                                            1</label>
                                        <input type="text" name="address1" id="AddressAddress1New"
                                            class="customer-form__input" placeholder="Address 1" value=""
                                            autocapitalize="words">
                                    </div>

                                    <div class="address__edit-form-fieldset">
                                        <label class="address__edit-form-fieldset-label" for="address2">Address
                                            2</label>
                                        <input type="text" name="address2" id="AddressAddress2New"
                                            class="customer-form__input" placeholder="Address 2" value=""
                                            autocapitalize="words">
                                    </div>

                                    <div class="address__edit-form-fieldset">
                                        <label class="address__edit-form-fieldset-label" for="city">City</label>
                                        <input type="text" name="city" id="AddressCityNew"
                                            class="customer-form__input" placeholder="City" value=""
                                            autocapitalize="words">
                                    </div>

                                    <div class="address__edit-form-fieldset">
                                        <label class="address__edit-form-fieldset-label"
                                            for="country">Country</label>
                                        <select name="country" id="AddressCountryNew"
                                            class="customer-form__input select-country" data-default="" required>
                                            <option value="United States"
                                                data-provinces="[[&quot;Alabama&quot;,&quot;Alabama&quot;],[&quot;Alaska&quot;,&quot;Alaska&quot;],[&quot;American Samoa&quot;,&quot;American Samoa&quot;],[&quot;Arizona&quot;,&quot;Arizona&quot;],[&quot;Arkansas&quot;,&quot;Arkansas&quot;],[&quot;Armed Forces Americas&quot;,&quot;Armed Forces Americas&quot;],[&quot;Armed Forces Europe&quot;,&quot;Armed Forces Europe&quot;],[&quot;Armed Forces Pacific&quot;,&quot;Armed Forces Pacific&quot;],[&quot;California&quot;,&quot;California&quot;],[&quot;Colorado&quot;,&quot;Colorado&quot;],[&quot;Connecticut&quot;,&quot;Connecticut&quot;],[&quot;Delaware&quot;,&quot;Delaware&quot;],[&quot;District of Columbia&quot;,&quot;Washington DC&quot;],[&quot;Federated States of Micronesia&quot;,&quot;Micronesia&quot;],[&quot;Florida&quot;,&quot;Florida&quot;],[&quot;Georgia&quot;,&quot;Georgia&quot;],[&quot;Guam&quot;,&quot;Guam&quot;],[&quot;Hawaii&quot;,&quot;Hawaii&quot;],[&quot;Idaho&quot;,&quot;Idaho&quot;],[&quot;Illinois&quot;,&quot;Illinois&quot;],[&quot;Indiana&quot;,&quot;Indiana&quot;],[&quot;Iowa&quot;,&quot;Iowa&quot;],[&quot;Kansas&quot;,&quot;Kansas&quot;],[&quot;Kentucky&quot;,&quot;Kentucky&quot;],[&quot;Louisiana&quot;,&quot;Louisiana&quot;],[&quot;Maine&quot;,&quot;Maine&quot;],[&quot;Marshall Islands&quot;,&quot;Marshall Islands&quot;],[&quot;Maryland&quot;,&quot;Maryland&quot;],[&quot;Massachusetts&quot;,&quot;Massachusetts&quot;],[&quot;Michigan&quot;,&quot;Michigan&quot;],[&quot;Minnesota&quot;,&quot;Minnesota&quot;],[&quot;Mississippi&quot;,&quot;Mississippi&quot;],[&quot;Missouri&quot;,&quot;Missouri&quot;],[&quot;Montana&quot;,&quot;Montana&quot;],[&quot;Nebraska&quot;,&quot;Nebraska&quot;],[&quot;Nevada&quot;,&quot;Nevada&quot;],[&quot;New Hampshire&quot;,&quot;New Hampshire&quot;],[&quot;New Jersey&quot;,&quot;New Jersey&quot;],[&quot;New Mexico&quot;,&quot;New Mexico&quot;],[&quot;New York&quot;,&quot;New York&quot;],[&quot;North Carolina&quot;,&quot;North Carolina&quot;],[&quot;North Dakota&quot;,&quot;North Dakota&quot;],[&quot;Northern Mariana Islands&quot;,&quot;Northern Mariana Islands&quot;],[&quot;Ohio&quot;,&quot;Ohio&quot;],[&quot;Oklahoma&quot;,&quot;Oklahoma&quot;],[&quot;Oregon&quot;,&quot;Oregon&quot;],[&quot;Palau&quot;,&quot;Palau&quot;],[&quot;Pennsylvania&quot;,&quot;Pennsylvania&quot;],[&quot;Puerto Rico&quot;,&quot;Puerto Rico&quot;],[&quot;Rhode Island&quot;,&quot;Rhode Island&quot;],[&quot;South Carolina&quot;,&quot;South Carolina&quot;],[&quot;South Dakota&quot;,&quot;South Dakota&quot;],[&quot;Tennessee&quot;,&quot;Tennessee&quot;],[&quot;Texas&quot;,&quot;Texas&quot;],[&quot;Utah&quot;,&quot;Utah&quot;],[&quot;Vermont&quot;,&quot;Vermont&quot;],[&quot;Virgin Islands&quot;,&quot;U.S. Virgin Islands&quot;],[&quot;Virginia&quot;,&quot;Virginia&quot;],[&quot;Washington&quot;,&quot;Washington&quot;],[&quot;West Virginia&quot;,&quot;West Virginia&quot;],[&quot;Wisconsin&quot;,&quot;Wisconsin&quot;],[&quot;Wyoming&quot;,&quot;Wyoming&quot;]]">
                                                United States</option>
                                        </select>
                                    </div>

                                    <div class="address__edit-form-fieldset" style="display: none;">
                                        <label class="address__edit-form-fieldset-label"
                                            for="address[province]">Province</label>
                                        <select name="address[province]" id="AddressProvinceNew"
                                            class="customer-form__input" data-default=""></select>
                                    </div>

                                    <div class="address__edit-form-fieldset">
                                        <label class="address__edit-form-fieldset-label" for="postal">Postal/Zip
                                            Code</label>
                                        <input type="text" name="postal" id="AddressZipNew"
                                            class="customer-form__input" placeholder="Postal/Zip Code" value=""
                                            autocapitalize="characters">
                                    </div>

                                    <div class="address__edit-form-fieldset">
                                        <label class="address__edit-form-fieldset-label" for="phone">Phone</label>
                                        <input type="tel" name="phone" id="AddressPhoneNew"
                                            class="customer-form__input" placeholder="Phone" value=""
                                            pattern="[0-9\-]*">
                                    </div>

                                    <div class="address__edit-form-fieldset-default-address">
                                        <input type="checkbox" id="address_default_address_new" name="default"
                                            value=1 checked />
                                        <label for="default">Set as default address</label>
                                    </div>
                                </div>

                                <div class="address__edit-form-button-wrapper">
                                    <input id="address-new-send" type="submit" class="address__edit-form-new-button"
                                        name="addresses" value="Add Address">
                                    <button id="address-new-cancel" type="button"
                                        class="address__add-new-button--toggle address__add-new-cancel-button">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script type="lazyload_int">
 setTimeout(function(){
 document.querySelectorAll('.address__add-new-button--toggle').forEach(function(e){
 e.addEventListener('click', function(){
 var showFields = document.getElementById('AddressNewForm');
 showFields.classList.toggle('hide');

 const $adrrContent = $(this).closest('.address__add-new-buttons-wrapper').siblings('.address__content-wrapper');
 const $editForm = $adrrContent.find('#AddressEditForm');

 if (!$editForm.hasClass('hide')){
 $editForm.addClass('hide');
 }
 },{passive: true});
 });

 var selectCountry = $('.edit-country');
 selectCountry.each(function(i, elem){
 $(this).find('option[value="---"]').remove();
 var country = $(this).attr('data-default');
 $.each(elem.children, function(i, val){
 if($(val).text() == country){
 $(val).attr('selected', true);
 }
 });
 });

 $('.select-country, .edit-country').change(function(){
 var country = $(this).val();
 var provinces = $(this).children('option[value="' + country +'"]').attr('data-provinces');
 var provincesArray = JSON.parse(provinces);
 var provincesField = $(this).parent().parent().find('.addressProvince');

 provincesField.children().each(function(){
 $(this).remove();
 });

 showProvinces(provincesArray, provincesField);

 });

 $('.address__edit-form-cancel-button').click(function(){
 $(this).closest('.address__edit-form').addClass('hide');
 });

 $('.address__edit-button').click(function(){
 $(this).parent().parent().parent().find('.address__edit-form').toggleClass('hide');
 const $adrrContent = $(this).closest('.address__content');
 const $newAdrrContent = $(this).closest('.address__content-wrapper');
 const $siblingForm = $adrrContent.siblings().find('.address__edit-form');
 const $newAdrrForm = $newAdrrContent.siblings('.address__add-new-form');

 if (!$siblingForm.hasClass('hide')){
 $siblingForm.addClass('hide');
 }else if (!$newAdrrForm.hasClass('hide')){
 $newAdrrForm.addClass('hide');
 }

 var countryelem = $(this).parent().parent().find('.edit-country');
 var country = countryelem.attr('data-default');
 var provincesArray = countryelem.children('option[value="' + country + '"]').attr('data-provinces');
 provincesArray = JSON.parse(provincesArray);
 var provincesSelect = countryelem.parent().siblings('.field-province').children('select');

 if( provincesArray.lenght > 0){
 showProvinces(provincesArray, provincesSelect);
 }
 });

 function showProvinces(list, select){
 var country = select.attr('data-default');
 if(list.length > 0){
 select.parent().css('display', 'block');
 list.forEach(function(e, i){
 list[i] = list[i][1];
 });

 list.forEach(function(e, i){
 if(e == country){
 select.append('<option value="'+ e +'" selected>'+ e +'</option>');
 }else{
 select.append('<option value="'+ e +'">'+ e +'</option>');
 }
 });
 }else{
 select.attr('data-default', '');
 select.append('<option value="" selected></option>');
 select.parent().css('display', 'none');
 }
 }

 $('.delete-modal--toggle').click(function(){
 $('.address__modal-delete-wrapper').toggleClass('modal-delete--open');
 $('body').toggleClass('modal-delete--open');
 });

 $('.delete-button--delete').click(function(){
 const id = $(this).attr("data-id");
 Shopify.postLink('/account/addresses/'+id,{'parameters':{'_method': 'delete'}});
 })


 /* Modified contents of customer_area.js (global asset)*/
 Shopify.CustomerAddress ={
 toggleForm: function(id){
 var editEl = document.getElementById('EditAddress_'+id);
 editEl.style.display = editEl.style.display == 'none' ? '' : 'none';
 return false;
 },

 toggleNewForm: function(){
 var el = document.getElementById('AddAddress');
 el.style.display = el.style.display == 'none' ? '' : 'none';
 return false;
 },

 destroy: function(id, confirm_msg){
 $('.delete-button--delete').attr('data-id', id);
 }
 }
 });
</script>
            <limespot></limespot>
        </section>


    </main>
</x-layout>
