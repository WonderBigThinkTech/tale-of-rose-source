<x-layout>
    <main id="MainContent" class="main-content">


        <aside>
            <div id="shopify-section-menu-mobile" class="shopify-section mobile-menu">
                <!-- start menu-mobile.liquid (SECTION) -->
                <style scoped>
                    :root {
                        --vasta-background-menu-mobile: #ffffff;
                        --vasta-border-menu-mobile: #4e4e4e;
                        --vasta-search-text-color-mobile: #4e4e4e;
                        --vasta-font-color-menu-mobile: #000000;
                        --vasta-button-color-menu-mobile: #4e4e4e;
                        --vasta-button-icon-color-menu-mobile: #ffffff;
                    }

                    .mobile-menu {
                        margin-top: 0;
                    }

                    .js-drawer-open-left .DrawerOverlay {
                        visibility: visible;
                        opacity: 1;
                    }

                    .mobile-menu .klaviyo_submit_button {
                        height: 44px !important;
                        background-color: #000 !important;
                        color: #fff !important;
                    }

                    .js-drawer-open-left .sidenav--drawer-left {
                        -ms-transform: translateX(400px);
                        -webkit-transform: translateX(400px);
                        transform: translateX(400px);
                        overflow: auto;
                        z-index: 999;
                    }

                    .toggle--plus:before,
                    .toggle--minus:before {
                        height: 17px;
                        content: "";
                        width: 2px;
                        background-color: var(--vasta-font-color-menu-mobile, rgb(0, 0, 0));
                        top: 0;
                        left: 7px;
                        position: relative;
                        display: block;
                        transition: 0.4s transform ease-out;
                    }

                    .toggle--plus:after,
                    .toggle--minus:after {
                        width: 17px;
                        content: "";
                        height: 2px;
                        background-color: var(--vasta-font-color-menu-mobile, rgb(0, 0, 0));
                        position: relative;
                        display: block;
                        top: -10px;
                        left: 0;
                        transform: rotate(0);
                        transition: 0.4s transform ease-out;
                    }

                    .rotateVerticalLine:before,
                    .toggle--minus:before {
                        transform: rotate(270deg);
                    }

                    .rotateHorizontalLine:after {
                        transform: rotate(180deg);
                    }

                    .sidenav__icon {
                        background-color: transparent;
                        position: relative;
                        width: 19px;
                        height: 19px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    .sidenav {
                        display: flex;
                        flex-direction: column;
                        top: 0;
                        bottom: 0;
                        position: fixed;
                        -webkit-overflow-scrolling: touch;
                        color: var(--vasta-font-color-menu-mobile, #444);
                        background-color: var(--vasta-background-menu-mobile, #fff);
                        transition: all 400ms cubic-bezier(0.46, 0.01, 0.32, 1);
                        z-index: 99;
                    }

                    .sidenav svg {
                        width: 19px;
                        height: 19px;
                    }

                    .sidenav--drawer-left {
                        width: 400px;
                        left: -400px;
                        border-right: 1px solid var(--vasta-background-menu-mobile, #fff);
                        max-width: 85%;
                    }

                    .sidenav__header {
                        padding: 0 15px 5px;
                    }

                    .sidenav__top__wrapper {
                        position: relative;
                        display: flex;
                        padding: 12px 0;
                        width: 100%;
                        align-items: center;
                        justify-content: space-between;
                    }

                    .sidenav__title,
                    .sidenav__close {
                        font-size: 1.4rem;
                        color: var(--vasta-font-color-menu-mobile, #444);
                    }

                    .sidenav__close {
                        cursor: pointer;
                    }

                    .sidenav__close {
                        position: relative;
                        right: 0;
                        color: inherit;
                        background-color: transparent;
                        border: none;
                    }

                    .sidenav__close svg {
                        width: 20px;
                        height: 20px;
                    }

                    .sidenav__list {
                        width: 100%;
                    }

                    .sidenav__list__item {
                        width: 100%;
                        border-top: 1px solid #ccc;
                        display: flex;
                        flex-direction: column;
                        align-items: flex-start;
                        justify-content: center;
                        padding: 0 10px;
                    }

                    .sidenav__list--shop .sidenav__list__item:last-child {
                        border-bottom: 1px solid #ccc;
                    }

                    .list--child .sidenav__list__item {
                        border-top: unset;
                        padding: 0;
                    }

                    .sidenav__item {
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        width: 100%;
                    }

                    .sidenav__item__anchor,
                    .sidenav__shop__text__wrapper {
                        width: 100%;
                        padding: 12px 5px;
                        display: flex;
                        align-items: center;
                        justify-content: flex-start;
                        color: var(--vasta-font-color-menu-mobile, #444);
                    }

                    .sidenav__item__img {
                        width: 20px;
                        margin-right: 10px;
                    }

                    .sidenav .list--grandchild {
                        height: 0;
                        padding-left: 48px;
                        transition: 0.4s height ease-in-out;
                        overflow: hidden;
                    }

                    .sidenav .list--child {
                        display: block;
                        padding-left: 24px;
                        height: 0;
                        transition: 0.4s height ease-in-out;
                        overflow: hidden;
                    }

                    .sidenav__item__anchor svg {
                        margin-right: 7px;
                    }

                    .sidenav__item__anchor#mobile-menu-email svg path,
                    .sidenav__item__anchor#mobile-menu-tel svg path {
                        stroke: var(--vasta-font-color-menu-mobile, #000);
                    }

                    .sidenav__item__anchor#customer_login_link-menu-mobile svg,
                    .sidenav__item__anchor#customer_register_link-menu-mobile svg {
                        fill: var(--vasta-font-color-menu-mobile, #000);
                    }

                    .sidenav__footer {
                        padding: 12px 15px 0;
                    }

                    .sidenav__footer .news_letter_title {
                        text-align: center;
                        margin-bottom: 12px;
                        font-size: 16px;
                    }

                    .sidenav__footer input#k_id_email-menu-mobile {
                        width: 100%;
                        height: 44px;
                        font-size: 12px;
                    }

                    .sidenav__footer .klaviyo_field_group {
                        margin-right: 0;
                        width: 60%;
                    }

                    .sidenav__footer .klaviyo_form_actions {
                        width: 40%;
                    }

                    .sidenav__footer .klaviyo_field_group {
                        width: 60%;
                        padding: 0;
                    }

                    .sidenav__footer .klaviyo_condensed_float .klaviyo_field_group {
                        margin-right: unset;
                    }
                </style>

                <div id="NavDrawer" class="sidenav sidenav--drawer-left " data-section-type="menu-mobile">
                    <div class="sidenav__header">
                        <div class="sidenav__top__wrapper">
                            <h3 class="sidenav__title">MENU</h3>
                            <button id="id-icon-fallback-text" class="sidenav__close" type="button"
                                aria-label="id-icon-fallback-text"><!-- start icon-close.liquid (SNIPPET) -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="icon">
                                    <path fill="#444"
                                        d="M15.89 14.696l-4.734-4.734 4.717-4.717c.4-.4.37-1.085-.03-1.485s-1.085-.43-1.485-.03L9.641 8.447 4.97 3.776c-.4-.4-1.085-.37-1.485.03s-.43 1.085-.03 1.485l4.671 4.671-4.688 4.688c-.4.4-.37 1.085.03 1.485s1.085.43 1.485.03l4.688-4.687 4.734 4.734c.4.4 1.085.37 1.485-.03s.43-1.085.03-1.485z" />
                                </svg></button>
                        </div>
                        <!-- Search-bar --><!-- start search-bar.liquid (SNIPPET) -->

                        <div class="main-header menu-mobile">
                            <form action="/search" method="get" class="input-group search-bar">
                                <input id="search-input" type="text" name="q" value=""
                                    placeholder="Search for: Valentine’s, Engagement , Birthdays..."
                                    class="input-group-field" aria-label="">
                                <span class="input-group-btn">
                                    <button aria-label="search-button" id="search-button" type="submit"
                                        class="btn jq-icon-fallback-text">
                                        <span class="icon icon-search" aria-hidden="true"></span>
                                        <span class="fallback-text search-button-span"><svg width="14"
                                                height="14" viewBox="0 0 14 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="Search Icon">
                                                    <path id="Vector"
                                                        d="M6.61978 11.5061C9.54269 11.5061 11.9122 9.20046 11.9122 6.35631C11.9122 3.51217 9.54269 1.20654 6.61978 1.20654C3.69688 1.20654 1.32739 3.51217 1.32739 6.35631C1.32739 9.20046 3.69688 11.5061 6.61978 11.5061Z"
                                                        stroke="black" stroke-width="1.3231" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path id="Vector_2" d="M13.2352 12.7934L10.3574 9.99316"
                                                        stroke="black" stroke-width="1.3231" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                            </svg></span>
                                    </button>
                                </span>

                                <div class="search-results-wrapper w-80 " style="display: none;">
                                    <div class="close-suggestions"><span
                                            class="search__terms"></span><!-- start icon-close.liquid (SNIPPET) -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            class="icon">
                                            <path fill="#444"
                                                d="M15.89 14.696l-4.734-4.734 4.717-4.717c.4-.4.37-1.085-.03-1.485s-1.085-.43-1.485-.03L9.641 8.447 4.97 3.776c-.4-.4-1.085-.37-1.485.03s-.43 1.085-.03 1.485l4.671 4.671-4.688 4.688c-.4.4-.37 1.085.03 1.485s1.085.43 1.485.03l4.688-4.687 4.734 4.734c.4.4 1.085.37 1.485-.03s.43-1.085.03-1.485z" />
                                        </svg>
                                    </div>

                                    <div class="suggestion-half-to-half-flex">

                                        <div class="search-results "></div>

                                        <div class="search-content-container">
                                            <div class="search-results-pages-wrapper">
                                                <p class="search-section-title">Pages & Posts</p>
                                                <div class="search-results-pages"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="search-link-wrapper"></div>
                                </div>
                            </form>
                        </div>

                        <style scoped>
                            .search-bar {
                                display: flex;
                                justify-content: flex-end;
                            }

                            .search-button-span svg {
                                fill: var(--vasta-button-icon-color-menu-mobile, #fff);
                            }

                            .search-bar .jq-icon-fallback-text {
                                border-radius: 0 3px 3px 0;
                                padding: 6px 10px 5px;
                                background-color: var(--vasta-button-color-menu-mobile, #444);
                                color: #fff;
                                height: 37px;
                            }

                            .search-bar .input-group-field {
                                border-radius: 3px 0 0 3px;
                                width: 100%;
                                height: 37px;
                                border: none;
                                padding: 0 10px;
                                border: solid 1px var(--vasta-border-menu-mobile, #ccc);
                                color: var(--vasta-search-text-color-mobile, #e25c63);
                                font-size: 14px;
                            }

                            .js-drawer-open-left {
                                overflow: hidden !important;
                            }

                            .js-drawer-open-left .DrawerOverlay {
                                visibility: visible;
                                opacity: 1;
                            }

                            .js-drawer-open-left .DrawerOverlay {
                                visibility: visible;
                                opacity: 1;
                            }

                            .cart-open .DrawerOverlay,
                            .js-drawer-open-left .DrawerOverlay {
                                visibility: visible;
                                opacity: 1;
                            }

                            .DrawerOverlay {
                                width: 100%;
                                height: 100%;
                                background: rgba(0, 0, 0, 0.8);
                                display: block;
                                position: fixed;
                                top: 0;
                                left: 0;
                                z-index: 151;
                                visibility: hidden;
                                opacity: 0;
                                transition: ease all 0.3s;
                            }

                            /* Mobile Menu Styles */

                            .mobile-menu .search-bar .input-group-field,
                            .mobile-menu .search-bar .jq-icon-fallback-text {
                                border-radius: 0;
                            }

                            .mobile-menu .search-bar .jq-icon-fallback-text {
                                background-color: transparent;
                                border: solid 1px var(--vasta-border-menu-mobile, #ccc);
                                border-left: none;
                            }
                        </style>

                    </div>

                    <div class="sidenav__main">
                        <ul id="main-menu" class="sidenav__list list--parent">
                            <li class="sidenav__list__item item--submenu">
                                <div class="sidenav__item">
                                    <a id="mobile-menu-1" class="sidenav__item__anchor "
                                        href="/collections/all">PRODUCTS
                                    </a>

                                    <button class="sidenav__icon" type="button" aria-label="id-toggle-open-1"
                                        id="id-toggle-open-1" data-toggle="child">
                                        <span class="toggle toggle--plus"></span>
                                    </button>
                                </div>

                                <ul class="sidenav__list list--child">
                                    <li class="sidenav__list__item"><a class="sidenav__item__anchor "
                                            id="mobile-menu-1-1" href="/collections/stems">
                                            Short Stems
                                        </a>
                                    </li>
                                    <li class="sidenav__list__item"><a class="sidenav__item__anchor "
                                            id="mobile-menu-1-2" href="/collections/heads">
                                            Heads
                                        </a>
                                    </li>
                                    <li class="sidenav__list__item"><a class="sidenav__item__anchor "
                                            id="mobile-menu-1-3" href="/collections/petals">
                                            Petals
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidenav__list__item item--submenu">
                                <div class="sidenav__item">
                                    <a id="mobile-menu-2" class="sidenav__item__anchor " href="/collections/all">GIFTS
                                    </a>

                                    <button class="sidenav__icon" type="button" aria-label="id-toggle-open-2"
                                        id="id-toggle-open-2" data-toggle="child">
                                        <span class="toggle toggle--plus"></span>
                                    </button>
                                </div>

                                <ul class="sidenav__list list--child">
                                    <li class="sidenav__list__item item--submenu">
                                        <div class="sidenav__item">
                                            <a id="mobile-menu-2-3" class="sidenav__item__anchor "
                                                href="/collections/all">
                                                By Shape
                                            </a>
                                            <button class="sidenav__icon" type="button" id="id-nav__toggle-open-2-3"
                                                data-toggle="grandchild">
                                                <span class="toggle toggle--plus"></span>
                                            </button>
                                        </div>

                                        <ul class="sidenav__list list--grandchild">
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-2--1"
                                                    href="/collections/heart">
                                                    Heart
                                                </a>
                                            </li>
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-2--2"
                                                    href="/collections/square">
                                                    Square
                                                </a>
                                            </li>
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-2--3"
                                                    href="/collections/rectangular">
                                                    Rectangular
                                                </a>
                                            </li>
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-2--4"
                                                    href="/collections/round">
                                                    Round
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sidenav__list__item item--submenu">
                                        <div class="sidenav__item">
                                            <a id="mobile-menu-2-3" class="sidenav__item__anchor "
                                                href="/collections/all">
                                                By Size
                                            </a>
                                            <button class="sidenav__icon" type="button" id="id-nav__toggle-open-2-3"
                                                data-toggle="grandchild">
                                                <span class="toggle toggle--plus"></span>
                                            </button>
                                        </div>

                                        <ul class="sidenav__list list--grandchild">
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-2--1"
                                                    href="/collections/mini-boxes">
                                                    Mini boxes
                                                </a>
                                            </li>
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-2--2"
                                                    href="/collections/small-boxes">
                                                    Small boxes
                                                </a>
                                            </li>
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-2--3"
                                                    href="/collections/medium-boxes">
                                                    Medium boxes
                                                </a>
                                            </li>
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-2--4"
                                                    href="/collections/large-boxes">
                                                    Large boxes
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sidenav__list__item item--submenu">
                                        <div class="sidenav__item">
                                            <a id="mobile-menu-2-3" class="sidenav__item__anchor "
                                                href="/collections/all">
                                                By Material
                                            </a>
                                            <button class="sidenav__icon" type="button" id="id-nav__toggle-open-2-3"
                                                data-toggle="grandchild">
                                                <span class="toggle toggle--plus"></span>
                                            </button>
                                        </div>

                                        <ul class="sidenav__list list--grandchild">
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-2--1"
                                                    href="/collections/acrylic-collection">
                                                    Prestige Acrylic Expressions
                                                </a>
                                            </li>
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-2--2"
                                                    href="/collections/carboard-collection">
                                                    LuxBox Demonstration
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidenav__list__item item--submenu">
                                <div class="sidenav__item">
                                    <a id="mobile-menu-3" class="sidenav__item__anchor "
                                        href="/collections/all-flowers">COLLECTIONS
                                    </a>

                                    <button class="sidenav__icon" type="button" aria-label="id-toggle-open-3"
                                        id="id-toggle-open-3" data-toggle="child">
                                        <span class="toggle toggle--plus"></span>
                                    </button>
                                </div>

                                <ul class="sidenav__list list--child">
                                    <li class="sidenav__list__item item--submenu">
                                        <div class="sidenav__item">
                                            <a id="mobile-menu-3-3" class="sidenav__item__anchor "
                                                href="/collections/all-flowers">
                                                Everyday Occasions
                                            </a>
                                            <button class="sidenav__icon" type="button" id="id-nav__toggle-open-3-3"
                                                data-toggle="grandchild">
                                                <span class="toggle toggle--plus"></span>
                                            </button>
                                        </div>

                                        <ul class="sidenav__list list--grandchild">
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-3--1"
                                                    href="/collections/funnerals">
                                                    Sympathy
                                                </a>
                                            </li>
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-3--2"
                                                    href="/collections/weddings">
                                                    Wedding Gifts
                                                </a>
                                            </li>
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-3--3"
                                                    href="/collections/anniversary">
                                                    Anniversary Gifts
                                                </a>
                                            </li>
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-3--4"
                                                    href="/collections/apologize">
                                                    Apologies
                                                </a>
                                            </li>
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-3--5"
                                                    href="/collections/baby-shower">
                                                    Gender Reveal Ideas
                                                </a>
                                            </li>
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-3--6"
                                                    href="/collections/birthday">
                                                    Happy Birthday Wishes
                                                </a>
                                            </li>
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-3--7"
                                                    href="/collections/congratulations">
                                                    Congratulations
                                                </a>
                                            </li>
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-3--8"
                                                    href="/collections/engagement">
                                                    Engagement
                                                </a>
                                            </li>
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-3--9"
                                                    href="/collections/graduations">
                                                    Graduations
                                                </a>
                                            </li>
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-3--10"
                                                    href="/collections/romance">
                                                    Romance
                                                </a>
                                            </li>
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-3--11"
                                                    href="/collections/flowers-for-him">
                                                    Flowers for Him
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sidenav__list__item item--submenu">
                                        <div class="sidenav__item">
                                            <a id="mobile-menu-3-3" class="sidenav__item__anchor "
                                                href="/collections/all-flowers">
                                                Upcoming Ocassions
                                            </a>
                                            <button class="sidenav__icon" type="button" id="id-nav__toggle-open-3-3"
                                                data-toggle="grandchild">
                                                <span class="toggle toggle--plus"></span>
                                            </button>
                                        </div>

                                        <ul class="sidenav__list list--grandchild">
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-3--1"
                                                    href="/collections/graduations">
                                                    Graduations
                                                </a>
                                            </li>
                                            <li class="sidenav__list__item">
                                                <a class="sidenav__item__anchor " id="mobile-menu-3--2"
                                                    href="/collections/july-4th">
                                                    July 4th
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sidenav__list__item"><a class="sidenav__item__anchor "
                                            id="mobile-menu-3-3" href="#">
                                            Holidays
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidenav__list__item">
                                <a class="sidenav__item__anchor " id="mobile-menu-4"
                                    href="/pages/bloom-with-us">PARTNER WITH US
                                </a>
                            </li>
                            <li class="sidenav__list__item item--submenu">
                                <div class="sidenav__item">
                                    <a id="mobile-menu-5" class="sidenav__item__anchor " href="#">Members
                                    </a>

                                    <button class="sidenav__icon" type="button" aria-label="id-toggle-open-5"
                                        id="id-toggle-open-5" data-toggle="child">
                                        <span class="toggle toggle--plus"></span>
                                    </button>
                                </div>

                                <ul class="sidenav__list list--child">
                                    <li class="sidenav__list__item"><a class="sidenav__item__anchor "
                                            id="mobile-menu-5-1" href="https://cpanel.taleofroses.com.au">
                                            CPanel
                                        </a>
                                    </li>
                                    <li class="sidenav__list__item"><a class="sidenav__item__anchor "
                                            id="mobile-menu-5-2" href="https://www.speakingrosesuniversity.com">
                                            University
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <ul id="shop-info" class="sidenav__list sidenav__list--shop">
                            <li class="sidenav__list__item">
                                <a id="mobile-menu-email" class="sidenav__item__anchor "
                                    href="mailto:weborders@taleofroses.com.au?Subject=Hello%20again"
                                    target="_top"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="12" viewBox="0 0 16 12" fill="none">
                                        <path
                                            d="M15 1.875C15 1.11875 14.37 0.5 13.6 0.5H2.4C1.63 0.5 1 1.11875 1 1.875M15 1.875V10.125C15 10.8813 14.37 11.5 13.6 11.5H2.4C1.63 11.5 1 10.8813 1 10.125V1.875M15 1.875L8 6.6875L1 1.875"
                                            stroke="white" stroke-width="0.866667" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>weborders@taleofroses.com.au
                                </a>
                            </li>
                            <li class="sidenav__list__item"><a id="LoginAccount" class="sidenav__item__anchor"
                                    href="/account/logout"><!-- start icon-key.liquid (SNIPPET) -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 516.375 516.375"
                                        style="&#10;">
                                        <path
                                            d="M353.812,0C263.925,0,191.25,72.675,191.25,162.562c0,19.125,3.825,38.25,9.562,57.375L0,420.75v95.625h95.625V459H153 v-57.375h57.375l86.062-86.062c17.213,5.737,36.338,9.562,57.375,9.562c89.888,0,162.562-72.675,162.562-162.562S443.7,0,353.812,0 z M401.625,172.125c-32.513,0-57.375-24.862-57.375-57.375s24.862-57.375,57.375-57.375S459,82.237,459,114.75 S434.138,172.125,401.625,172.125z" />
                                    </svg>Logged in as Tuan
                                </a></li>
                            <li class="sidenav__list__item">
                                <a id="customer_logout_link-menu-mobile" class="sidenav__item__anchor"
                                    href="/account/logout"><!-- start icon-logout.liquid (SNIPPET) -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="22"
                                        viewBox="0 0 25 22" fill="none">
                                        <path
                                            d="M13.4472 7.17338C13.7066 7.17338 13.9554 7.07031 14.139 6.8869C14.3224 6.70339 14.4254 6.4546 14.4254 6.19519V2.93456C14.4254 2.15622 14.1162 1.40987 13.5659 0.859528C13.0156 0.309189 12.2692 0 11.4909 0H3.07519C2.29685 0 1.55049 0.309189 1.00015 0.859528C0.449814 1.40987 0.140625 2.15625 0.140625 2.93456V18.2595C0.140625 19.0378 0.449814 19.7842 1.00015 20.3345C1.55049 20.8849 2.29688 21.1941 3.07519 21.1941H11.4876H11.4875C12.2658 21.1941 13.0122 20.8849 13.5625 20.3345C14.1129 19.7842 14.4221 19.0378 14.4221 18.2595V15.3249C14.4221 14.9754 14.2357 14.6525 13.933 14.4778C13.6304 14.303 13.2575 14.303 12.9548 14.4778C12.6522 14.6525 12.4657 14.9754 12.4657 15.3249V18.2595C12.4657 18.5189 12.3626 18.7677 12.1792 18.9512C11.9958 19.1346 11.747 19.2377 11.4875 19.2377H3.07508C2.81567 19.2377 2.56678 19.1346 2.38337 18.9512C2.19996 18.7677 2.09689 18.5189 2.09689 18.2595V2.93456C2.09689 2.67516 2.19996 2.42637 2.38337 2.24285C2.56678 2.05944 2.81567 1.95638 3.07508 1.95638H11.4875H11.4874C11.7469 1.95638 11.9957 2.05944 12.1791 2.24285C12.3625 2.42636 12.4656 2.67515 12.4656 2.93456V6.19519C12.4656 6.45523 12.5692 6.70444 12.7533 6.88807C12.9375 7.07159 13.1871 7.17422 13.4471 7.17338H13.4472Z"
                                            fill="#595959" />
                                        <path
                                            d="M6.43695 10.76C6.43695 11.0194 6.54001 11.2682 6.72342 11.4517C6.90694 11.6352 7.15573 11.7382 7.41514 11.7382H20.8522L17.2264 15.3249H17.2265C16.9917 15.5729 16.9033 15.9252 16.9932 16.2547C17.083 16.5841 17.338 16.8428 17.6662 16.9373C17.9943 17.0318 18.3479 16.9483 18.5992 16.7172L23.9173 11.4578C24.1034 11.2739 24.2083 11.0232 24.2083 10.7616C24.2083 10.5 24.1034 10.2493 23.9173 10.0655L18.5992 4.81266C18.3479 4.58149 17.9943 4.49807 17.6662 4.59253C17.338 4.68699 17.083 4.94576 16.9932 5.27511C16.9033 5.60457 16.9917 5.95696 17.2265 6.20491L20.8523 9.79159H7.41524C7.15754 9.79159 6.91012 9.89328 6.72704 10.0747C6.54384 10.256 6.43961 10.5023 6.43706 10.76L6.43695 10.76Z"
                                            fill="#595959" />
                                    </svg>
                                    Log out
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="sidenav__footer"></div>
                </div>

                <script type="lazyload_int">
 setTimeout(function (){
 /* Open Menu Mobile */
 document.querySelector('.header__item-menu-mobile').addEventListener('click', function (){
 if (document.body.classList.contains('js-drawer-open-left')){
 document.body.classList.remove('js-drawer-open-left');
 }else{
 document.querySelector('.main-content').classList.add('is-moved-by-drawer');
 document.querySelector('body').classList.add('js-drawer-open-left');
 }
 });

 /* Close Nav */
 const closeNav = function (elClass){
 document.querySelector(`${elClass}`).addEventListener('click', function (){
 document.querySelector('body').classList.remove('js-drawer-open-left', 'cart-open', 'cart-drawer-open');
 });
 };

 closeNav('.sidenav__close');
 closeNav('.DrawerOverlay');

 /* Toggle Plus / Minus */
 let allSideNavIcon = document.querySelectorAll('.sidenav__icon');

 document.querySelectorAll('.js-dropdown').forEach((el) =>{
 el.addEventListener('click', function (e){
 this.nextElementSibling.click();
 });
 });

 allSideNavIcon.forEach((icon) =>{
 icon.addEventListener('click', function (e){
 let listType = this.getAttribute('data-toggle');

 if (this.querySelector('.toggle').classList.contains('toggle--plus')){
 this.querySelector('.toggle--plus').classList.add('rotateVerticalLine', 'rotateHorizontalLine');

 let listEl = this.closest('.sidenav__list__item');

 if (listType === 'grandchild'){
 this.closest('.list--child').style.height = 'auto';
 }

 let size = 0;
 let allChildEl = listEl.querySelectorAll(`.list--${listType}> .sidenav__list__item`);

 allChildEl.forEach((item) =>{
 size += item.offsetHeight;
 });

 listEl.querySelector(`.sidenav .list--${listType}`).style.height = `${size}px`;

 setTimeout(function (){
 listEl.querySelector(`.sidenav .list--${listType}`).style.height = `auto`;
 }, 350);

 this.querySelector('.toggle').classList.remove('toggle--plus');
 this.querySelector('.toggle').classList.add('toggle--minus');
 }else{
 let listEl = this.closest('.sidenav__list__item');
 if (listType === 'child'){
 const menuHeight = listEl.querySelector('.list--child').offsetHeight;
 }

 this.querySelector('.toggle').classList.remove('rotateVerticalLine', 'rotateHorizontalLine');
 this.querySelector('.toggle').classList.remove('toggle--minus');
 this.querySelector('.toggle').classList.add('toggle--plus');

 let sizeDown = 0;
 let allChildEl = listEl.querySelectorAll(`.list--${listType}> .sidenav__list__item`);
 allChildEl.forEach((item) =>{
 sizeDown += item.offsetHeight;
 });
 listEl.querySelector(`.sidenav .list--${listType}`).style.height = `${sizeDown}px`;
 setTimeout(function (){
 listEl.querySelector(`.sidenav .list--${listType}`).style.height = `0`;
 }, 50);
 }
 });
 });
 });
</script>


            </div>
        </aside>

        <div class="DrawerOverlay"></div>
        <section id="page-layout">
            <h2 class="hide">PageContent</h2>

            <div id="shopify-section-template--16265135128735__780d9b7f-7e73-4c65-abdd-872d32b70ddc"
                class="shopify-section contact-form__section"><!-- sections/custom-contact-form -->
                <style>
                    .contact-form__section {
                        padding: 30px 0 2px;
                    }

                    .contact-form__section .form-success {
                        text-align: center;
                        margin: auto;
                        font-size: 14px;
                    }

                    .contact-form__title,
                    .contact-form__subtitle,
                    .all-width {
                        text-transform: capitalize;
                    }

                    .contact-form__input,
                    .contact-form__input[type="text"] {
                        border-radius: 5px;
                    }

                    .contact-form__title {
                        padding: 0;
                        margin: 36px 0 9px;
                    }

                    .contact-form__subtitle {
                        text-align: center;
                        font-size: 20px;
                        margin: 0 0 20px 3px;
                    }

                    .contact-form__headline-wrapper {
                        margin-bottom: 26px;
                    }

                    .contact-form__wrapper {
                        width: 100%;
                        padding: 0 20px;
                        max-width: 858px;
                        margin: 0 auto;
                    }

                    .contact-form__form {
                        display: flex;
                        flex-wrap: wrap;
                        gap: 17.2px 1.5%;
                    }

                    .contact-form__form-field--fullname {
                        width: 66.25%;
                    }

                    .contact-form__form-field--language {
                        width: 32.25%;
                    }

                    .contact-form__form-field--email {
                        width: 56.95%;
                    }

                    .contact-form__form-field--phone {
                        width: 41.55%;
                    }

                    .contact-form__form-field--country,
                    .contact-form__form-field--city {
                        width: 45.6%;
                    }

                    .contact-form__form-field--state,
                    .contact-form__form-field--description {
                        width: 52.9%;
                    }

                    .all-width {
                        display: block;
                        font-size: 16px;
                        margin-bottom: 5px;
                    }

                    .all-width:after {
                        content: '*';
                    }

                    .contact-form__input {
                        border: 1px solid #000;
                        padding: 7px 10px;
                        font-size: 16px;
                        height: 35px;
                    }

                    .contact-form__form-buttons {
                        width: 100%;
                        text-align: center;
                        margin: 12px 0 0;
                    }

                    body .contact-form__form-button {
                        width: 192px;
                        height: 56px;
                        border-radius: 8px;
                        font-size: 21px;
                        font-weight: 500;
                        background-color: #A84F65;
                        color: #fff;
                        margin: auto;
                        border: unset;
                    }

                    @media (max-width: 1019px) {
                        .contact-form__title {
                            font-size: 32px;
                            margin: 10.6px 0 9.5px;
                        }

                        .contact-form__subtitle {
                            font-size: 13.3px;
                            margin: 0;
                        }

                        .contact-form__headline-wrapper {
                            margin-bottom: 23.5px;
                        }

                        .contact-form__wrapper {
                            max-width: 673px;
                        }

                        .contact-form__form {
                            gap: 26px 1.4%;
                        }

                        .all-width {
                            font-size: 14px;
                            margin-bottom: 1px;
                            line-height: 13.9px;
                            padding: 0 0 0 0.5px;
                        }

                        .contact-form__input {
                            padding: 3px 6px;
                        }

                        .contact-form__input,
                        .contact-form__input[type="text"] {
                            border-radius: 4px;
                        }

                        .contact-form__form-buttons {
                            margin: 0;
                            transform: translatey(-6px);
                        }

                        .contact-form__form-button {
                            width: 128px;
                            height: 37px;
                            border-radius: 6px;
                            font-size: 13px;
                            font-weight: 400;
                            letter-spacing: 0.6px;
                            padding: 0;
                        }

                        .contact-form__section {
                            padding: 30px 0 34px;
                        }
                    }

                    @media (max-width: 767px) {
                        .contact-form__section {
                            padding: 24px 0 40px;
                        }

                        .contact-form__title {
                            font-size: 17.4px;
                            margin: 11.5px 0 0;
                            line-height: 20px;
                        }

                        .contact-form__subtitle {
                            font-size: 7.3px;
                            margin: 0;
                        }

                        .contact-form__wrapper {
                            padding: 0;
                        }

                        .contact-form__form {
                            gap: 15px 1.4%;
                        }

                        .contact-form__headline-wrapper {
                            margin-bottom: 18px;
                        }

                        .all-width {
                            font-size: 12px;
                            margin-bottom: 10px;
                            line-height: 8px;
                        }

                        .contact-form__input {
                            font-size: 10.9px;
                        }

                        .contact-form__input,
                        .contact-form__input[type="text"] {
                            border-radius: 3px;
                        }

                        .contact-form__form-field--fullname {
                            width: 52.55%;
                        }

                        .contact-form__form-field--email,
                        .contact-form__form-field--country {
                            width: 51.35%;
                        }

                        .contact-form__form-field--language {
                            width: 45.98%;
                        }

                        .contact-form__form-field--phone,
                        .contact-form__form-field--state {
                            width: 47.15%;
                        }

                        .contact-form__form-field--city {
                            width: 46.9%;
                        }

                        .contact-form__form-field--description {
                            width: 51.6%;
                        }

                        .contact-form__form-buttons {
                            transform: unset;
                            margin: 5px 0 0;
                        }

                        .contact-form__form-button {
                            width: 114px;
                            height: 31.5px;
                            font-size: 11.7px;
                        }
                    }
                </style><!-- contact form -->
                <div class="wrapper">
                    <div class="contact-form">

                        <div class="contact-form__headline-wrapper">
                            <h2 class="section-title contact-form__title">Contact Form</h2>
                            <p class="section-subtitle contact-form__subtitle"></p>
                        </div>


                        <div class="contact-form__wrapper">
                            <form method="post" action="/contact#contact_form" id="contact_form"
                                accept-charset="UTF-8" class="contact-form__form"><input type="hidden"
                                    name="form_type" value="contact" /><input type="hidden" name="utf8"
                                    value="✓" />

                                <input type="text" name="contact[full_name]" id="ContactFormFullName"
                                    class="contact-form__form-field contact-form__form-field--fullname contact-form__input"
                                    placeholder="Full Name" value="" required>

                                <input name="contact[preferred_language]" id="ContactFormPreferredLanguage"
                                    class="contact-form__form-field contact-form__form-field--language contact-form__input"
                                    value="" placeholder="Preferred Language" required>

                                <input type="email" name="contact[email]" id="ContactFormEmail"
                                    placeholder="Email Address"
                                    class="contact-form__form-field contact-form__form-field--email contact-form__input"
                                    value="delangoc@gmail.com" spellcheck="false" autocomplete="off"
                                    autocapitalize="off" required>

                                <input type="tel" name="contact[phone]" id="ContactFormPhone"
                                    placeholder="Phone"
                                    class="contact-form__form-field contact-form__form-field--phone contact-form__input"
                                    value="" pattern="[0-9\-]*" required>

                                <input type="text" name="contact[country]" id="ContactFormCountry"
                                    placeholder="Country"
                                    class="contact-form__form-field contact-form__form-field--country contact-form__input"
                                    value="" required>

                                <input type="text" name="contact[state]" id="ContactFormState"
                                    placeholder="State"
                                    class="contact-form__form-field contact-form__form-field--state contact-form__input"
                                    value="" required>

                                <input type="text" name="contact[city]" id="ContactFormCity" placeholder="City"
                                    class="contact-form__form-field contact-form__form-field--city contact-form__input"
                                    value="" required>

                                <textarea rows="10" name="contact[how_did_you_hear_about_us]" id="ContactFormHowDidYouHear"
                                    placeholder="How did your hear about us"
                                    class="contact-form__form-field contact-form__form-field--description contact-form__input" required></textarea>

                                <input type="submit" id="id-button" name="Send"
                                    class="buttom-change-id contact-form__form-buttons contact-form__form-button"
                                    value="Send">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end contact form -->

            </div>
            <div id="shopify-section-template--16265135128735__custom_area_RECMxL"
                class="shopify-section custom-area"><!-- start custom-area.liquid (SECTION) -->
                <section id="shopify-section-template--16265135128735__custom_area_RECMxL-content"
                    data-section-type="custom-area" class=" custom-area">
                    <h2 class="hide">Custom Area</h2>
                    <style>
                        #XXXshopify-section-custom-header,
                        #XXXshopify-section-shipping_bar {
                            display: none !important;
                        }
                    </style>
                </section>

                <style scoped>
                    #shopify-section-template--16265135128735__custom_area_RECMxL {

                        margin: 20px 0;

                    }

                    .wrapper.custom-area .section-title {
                        padding: 17px 0 10px;
                        margin-bottom: 0;
                    }
                </style>

            </div>
            <limespot></limespot>
        </section>


    </main>
</x-layout>
