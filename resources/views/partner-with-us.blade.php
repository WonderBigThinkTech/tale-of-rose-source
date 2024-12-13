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
                            <li class="sidenav__list__item">
                                <span class="sidenav__text__wrapper">
                                    <a id="customer_login_link-menu-mobile" class="sidenav__item__anchor"
                                        href="/account/login"><!-- start icon-key.liquid (SNIPPET) -->
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 516.375 516.375"
                                            style="&#10;">
                                            <path
                                                d="M353.812,0C263.925,0,191.25,72.675,191.25,162.562c0,19.125,3.825,38.25,9.562,57.375L0,420.75v95.625h95.625V459H153 v-57.375h57.375l86.062-86.062c17.213,5.737,36.338,9.562,57.375,9.562c89.888,0,162.562-72.675,162.562-162.562S443.7,0,353.812,0 z M401.625,172.125c-32.513,0-57.375-24.862-57.375-57.375s24.862-57.375,57.375-57.375S459,82.237,459,114.75 S434.138,172.125,401.625,172.125z" />
                                        </svg>Log in
                                    </a>
                                </span>
                            </li>
                            <li class="sidenav__list__item">
                                <a id="customer_register_link-menu-mobile" class="sidenav__item__anchor"
                                    href="/account/register"><!-- start icon-create.liquid (SNIPPET) -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27.021 27.022">
                                        <path
                                            d="M17.855,21.223c0-1.902,1.049-3.55,2.588-4.44c-0.963-0.308-2-0.552-3.09-0.722c2.342-1.299,3.929-3.794,3.929-6.663 c0-4.207-3.41-7.617-7.617-7.617s-7.617,3.41-7.617,7.617c0,2.868,1.587,5.364,3.929,6.663C4.223,16.958,0,19.897,0,23.389h18.35 C18.041,22.727,17.855,22,17.855,21.223z" />
                                        <path
                                            d="M23.004,17.206c-2.218,0-4.018,1.797-4.018,4.018c0,2.219,1.8,4.017,4.018,4.017c2.219,0,4.018-1.798,4.018-4.017 C27.02,19.002,25.223,17.206,23.004,17.206z M25.627,21.936h-1.909v1.91h-1.427v-1.91h-1.91v-1.429h1.91v-1.911h1.427v1.911h1.909 V21.936z" />
                                    </svg>Sign up
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

            <div id="shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn"
                class="shopify-section banner"><!-- start custom-new-banner-layout.liquid (SECTION) -->





                <section id="new-banner-layout"
                    class="shopify-section new-banner new-banner__homepage-style-1 top-banner">
                    <div class="new-banner__banner-img ">
                        <picture>
                            <source class="new-banner__banner-image-desktop" media="(min-width: 1020px)"
                                srcset="https://speakingroses.com/cdn/shop/files/banner_principal_afiliados.gif?v=1716571721&width=1500 1500w,https://speakingroses.com/cdn/shop/files/banner_principal_afiliados.gif?v=1716571721&width=1400 1400w,https://speakingroses.com/cdn/shop/files/banner_principal_afiliados.gif?v=1716571721&width=1300 1300w,https://speakingroses.com/cdn/shop/files/banner_principal_afiliados.gif?v=1716571721&width=1200 1200w,https://speakingroses.com/cdn/shop/files/banner_principal_afiliados.gif?v=1716571721&width=1100 1100w,https://speakingroses.com/cdn/shop/files/banner_principal_afiliados.gif?v=1716571721&width=1000 1000w,https://speakingroses.com/cdn/shop/files/banner_principal_afiliados.gif?v=1716571721&width=900 900w,https://speakingroses.com/cdn/shop/files/banner_principal_afiliados.gif?v=1716571721&width=800 800w,"
                                data-class="LazyLoad" />

                            <source class="new-banner__banner-image-tablet" media="(min-width: 768px)"
                                srcset="https://speakingroses.com/cdn/shop/t/12/assets/default-banner-placeholder-tablet_768x280.png?v=5942895346331318641695383958 1200w,https://speakingroses.com/cdn/shop/t/12/assets/default-banner-placeholder-tablet_768x280.png?v=5942895346331318641695383958 1100w,https://speakingroses.com/cdn/shop/t/12/assets/default-banner-placeholder-tablet_768x280.png?v=5942895346331318641695383958 1000w,https://speakingroses.com/cdn/shop/t/12/assets/default-banner-placeholder-tablet_768x280.png?v=5942895346331318641695383958 900w,https://speakingroses.com/cdn/shop/t/12/assets/default-banner-placeholder-tablet_768x280.png?v=5942895346331318641695383958 800w,https://speakingroses.com/cdn/shop/t/12/assets/default-banner-placeholder-tablet_768x280.png?v=5942895346331318641695383958 700w,"
                                data-class="LazyLoad" />
                            <source class="new-banner__banner-image-mobile" media="(max-width: 767px)"
                                srcset="https://speakingroses.com/cdn/shop/t/12/assets/default-banner-placeholder-mobile_375x269.png?v=11131399933959493641695383956 700w,https://speakingroses.com/cdn/shop/t/12/assets/default-banner-placeholder-mobile_375x269.png?v=11131399933959493641695383956 600w,https://speakingroses.com/cdn/shop/t/12/assets/default-banner-placeholder-mobile_375x269.png?v=11131399933959493641695383956 500w,https://speakingroses.com/cdn/shop/t/12/assets/default-banner-placeholder-mobile_375x269.png?v=11131399933959493641695383956 400w,"
                                data-class="LazyLoad" /><img class="new-banner__banner-image" width="1800"
                                height="1000"
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                alt="Banner" loading="lazy" />
                        </picture>
                        <div class="new-banner__banner-titles ">

                            <div class="new-banner__upper-headline">
                                <p>With 1,600+ 5-star reviews</p>
                                <svg width="66" height="12" viewBox="0 0 66 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.4579 0.549805L7.03297 4.28668L10.9003 4.72203L8.00476 7.45088L8.80576 11.4501L5.44131 9.39964L2.06902 11.4362L2.88516 7.44L0 4.6993L3.86877 4.28006L5.4579 0.549805Z"
                                        fill="#DAD4D4" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M19.0834 0.549805L20.6585 4.28668L24.5258 4.72203L21.6302 7.45088L22.4313 11.4501L19.0668 9.39964L15.6945 11.4362L16.5107 7.44L13.6255 4.6993L17.4943 4.28006L19.0834 0.549805Z"
                                        fill="#DAD4D4" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M32.7089 0.549805L34.2839 4.28668L38.1513 4.72203L35.2557 7.45088L36.0567 11.4501L32.6923 9.39964L29.32 11.4362L30.1361 7.44L27.251 4.6993L31.1197 4.28006L32.7089 0.549805Z"
                                        fill="#DAD4D4" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M46.3344 0.549805L47.9094 4.28668L51.7768 4.72203L48.8812 7.45088L49.6822 11.4501L46.3178 9.39964L42.9455 11.4362L43.7616 7.44L40.8765 4.6993L44.7452 4.28006L46.3344 0.549805Z"
                                        fill="#DAD4D4" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M59.9594 0.549805L61.5344 4.28668L65.4018 4.72203L62.5062 7.45088L63.3072 11.4501L59.9428 9.39964L56.5705 11.4362L57.3866 7.44L54.5015 4.6993L58.3702 4.28006L59.9594 0.549805Z"
                                        fill="#DAD4D4" />
                                </svg>
                            </div>

                            <div class="new-banner__banner-title">
                                <h1>Flower Power Partnerships</h1>
                            </div>
                            <div class="new-banner__banner-sub-title">
                                <p>Tale of Roses offers a variety of dynamic partnership programs</p>
                            </div><a style="position: static;transform: unset;"
                                class="new-banner__banner-titles-new-button" title="Partner with us"
                                href="/pages/contact-us">
                                Partner with us
                            </a>
                            <div style="
 clear: both;
 padding-top: 10px;
 padding-left: 26px;
 ">
                                <div
                                    style="
 		/* clear: both;*/
 		width: 110px;
 		height: 35px;
 		background-color: #ffffffaa;
 		border-radius: 5px;
 		background-image: url(https://cdn.shopify.com/s/files/1/0593/2892/1759/files/icono-risk-free.png?v=1715892743);
 		background-size: cover;
 background-position: center;
 	">
                                </div>
                            </div>
                        </div>
                        <div class="new-banner__slider-buttons"
                            id="CallToAction-template--16843925880991__custom_new_banner_layout_H3JQfn"></div>



                    </div>
                </section>



                <style scoped>
                    :root {
                        --banner-title-color: #000000;
                        --banner-sub-title-color: #000000;
                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn {

                        margin: 20px 0;

                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .wrapper {
                        padding-top: 0px;
                        padding-bottom: 60px;
                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__block-reviews__name {
                        font-size: 20px;
                        margin-bottom: 3px;
                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__block-reviews__content {
                        text-align: center;
                        font-family: var(--auxiliarFont);
                        font-style: normal;
                        font-weight: 300;
                        font-size: 16px;
                        line-height: 120%;
                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__banner-titles-new-button {
                        display: flex;
                        margin: auto;
                        max-width: 170px;
                        width: 100%;
                        padding: 10px;
                        font-size: 16px;
                        justify-content: center;
                        cursor: pointer;

                        float: left;

                        background-color: #ffffff;
                        color: #000000;


                        border-radius: 18px;

                        letter-spacing: normal;
                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__banner-titles-new-button:hover {
                        background-color: #d97281;
                        color: #ffffff;

                        border: 3px solid #ffffff;

                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1 {
                        display: block;
                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons .btn-v {
                        padding: 10px;
                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles {
                        left: 33%;
                        top: 49%;
                        text-transform: initial;
                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__banner-title__static {
                        text-align: left;
                        position: static;
                        transform: unset;
                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-title__static.new-banner__banner-titles {
                        padding: 25px 0 35px;
                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles .new-banner__banner-title,
                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles .new-banner__banner-title * {
                        color: #000000;
                        font-size: min(50px, calc(28px + (56 - 28) * ((100vw - 768px) / (1440 - 768))));
                        text-align: left;
                        font-weight: 700;
                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles .new-banner__banner-title span {
                        color: #D97281;
                        font-family: 'Luxia', sans-serif;
                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles .new-banner__banner-sub-title,
                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles .new-banner__banner-sub-title * {
                        font-size: calc(14px + (18 - 14) * ((100vw - 768px) / (1440 - 768)));

                        color: #000000;
                        text-align: left;
                        line-height: 120%;
                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .custom-banner--dashed .new-banner__banner-titles .new-banner__banner-sub-title {
                        font-weight: 400;
                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__banner-titles .new-banner__upper-headline {
                        color: #000000;
                        font-size: calc(14px + (15 - 14) * ((100vw - 768px) / (1440 - 768)));
                        display: flex;
                        align-items: center;
                        gap: 7px;
                        letter-spacing: 0.4px;

                        justify-content: flex-start;

                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .btn-v,
                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__custom__help-text {
                        font-size: 18px;
                        line-height: 87.8%;
                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1 .new-banner__banner-img.new-banner__banner-padding-top-desktop {
                        padding-top: 37.5%;
                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles {
                        z-index: 1;
                        height: auto;
                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__block-reviews {
                        width: 300px;
                    }



                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1 .new-banner__banner-img {
                        overflow: hidden;
                        display: flex;
                        height: 0;
                        padding-top: 500px;
                        top: 0;
                        left: 0;
                        width: 100%;
                        position: relative;
                    }

                    #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1 .new-banner__banner-img img {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        max-width: 100%;
                        width: 100%;
                        object-fit: cover;
                        height: 100%;
                    }

                    @media screen and (-ms-high-contrast: active),
                    (-ms-high-contrast: none) {
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1 .new-banner__banner-img img {
                            height: auto;
                        }
                    }

                    @media (max-width: 1019px) {
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__block-reviews__name {
                            font-size: 20px;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1 .new-banner__banner-img {
                            padding-top: 430px;
                        }
                    }

                    @media (max-width: 767px) {
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__block-reviews__name {
                            font-size: 20px;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1 .new-banner__banner-img {
                            padding-top: 210px;
                        }
                    }



                    .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons .btn-v.effect_1:hover,
                    .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons .btn-v.effect_1:active {
                        background-color: var(--vasta-buttons-hover-color, #fff);
                    }

                    .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons .btn-v.effect_1:hover:before,
                    .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons .btn-v.effect_1:active:before {
                        -webkit-transform: scaleX(1);
                        transform: scaleX(1);
                    }

                    .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons .btn-v.effect_1:before {
                        content: "";
                        position: absolute;
                        z-index: -1;
                        top: 0;
                        bottom: 0;
                        background-color: var(--vasta-buttons-hover-color, #fff);
                        border-color: var(--vasta-buttons-hover-color, #006ba2);
                        transform: scaleX(0);
                        transition: cubic-bezier(0, 0.24, 0.84, 1.09) all 0.3s;
                    }

                    .new-banner__block-reviews__head+.new-banner__block-reviews__content {
                        margin-top: 12px;
                    }

                    .new-banner__block-reviews__author-img img {
                        width: 100%;
                        height: 100%;
                        max-width: 100%;
                    }

                    .new-banner__block-reviews__author-img {
                        width: 50px;
                        height: 50px;
                        position: relative;
                    }

                    .new-banner__block-reviews__stars svg {
                        width: 12px;
                        height: 12px;
                    }

                    .new-banner__custom__help-text {
                        margin: 6px;
                    }

                    .new-banner__block-reviews__name {
                        font-size: 16px;
                        line-height: 87.8%;
                    }

                    .btn-v {
                        position: absolute;
                        display: inline-block;
                        cursor: pointer;
                        padding: 15px;
                        letter-spacing: 1px;
                        text-align: center;
                        font-weight: 700;
                        transition: all 0.3s;
                    }

                    .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons {
                        height: 100%;
                        position: absolute;
                        top: 0;
                    }

                    .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons img {
                        width: 100%;
                    }

                    .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons,
                    .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons a {
                        display: block;
                        width: 100%;
                    }

                    .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons a,
                    .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons:before {
                        position: absolute;
                    }

                    .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons .btn-v {
                        display: flex;
                        height: 71px;
                        font-size: 22px;
                        transform: translate(-50%, -50%);
                        overflow: hidden;
                        padding: 1px 0 0 0;
                        flex-direction: column;
                        align-content: center;
                        justify-content: center;
                        align-items: center;
                    }

                    .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons .btn-v.btn-2,
                    .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons .btn-v:before {
                        right: 0;
                        left: 0;
                    }

                    .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons .btn-v.btn-1 {
                        left: 10%;
                    }

                    .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons .btn-v.btn-2 {
                        bottom: 45%;
                        margin: 0 auto;
                    }

                    .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons .btn-v.btn-3 {
                        right: 10%;
                    }

                    .new-banner__homepage-style-1.new-banner .new-banner__banner-img {
                        width: 100%;
                        position: relative;
                        overflow: hidden;
                    }

                    .new-banner__homepage-style-1.new-banner .new-banner__banner-img .main-mobile-link {
                        float: left;
                        width: 100%;
                        height: 100%;
                    }

                    .new-banner__homepage-style-1.new-banner .new-banner__banner-img .new-banner__banner-image {
                        position: absolute;
                        width: 100%;
                        top: 0;
                        height: auto;
                        object-fit: cover;
                    }

                    .new-banner__homepage-style-1.new-banner .new-banner__banner-titles {
                        position: absolute;
                        transform: translate(-50%, -50%);
                        padding: 10px 0 0 20px;
                        text-align: center;
                        width: 60%;
                        list-style-position: inside;
                    }

                    .new-banner__homepage-style-1.new-banner .new-banner__banner-sub-title ul {
                        list-style-position: inside;
                    }

                    .new-banner__homepage-style-1.new-banner .new-banner__banner-sub-title ul li:before {
                        content: "";
                        margin-right: -0.8rem;
                    }

                    .new-banner {
                        float: left;
                        width: 100%;
                        position: relative;
                        overflow: hidden;
                    }

                    .new-banner .new-banner__banner-img {
                        margin: 0 auto;
                    }

                    .new-banner .new-banner__banner-img img {
                        width: 100%;
                    }

                    .block__text {
                        border-bottom: 1px solid #000;
                        padding-bottom: 10px;
                    }

                    .item_block__text--1,
                    .item_block__text--2,
                    .item_block__text--3 {
                        text-align: left;
                    }

                    .item_block__text--4,
                    .item_block__text--5,
                    .item_block__text--6 {
                        text-align: right;
                    }

                    .new-banner__block-reviews__head {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        gap: 16px;
                    }

                    .new-banner__block-reviews__infos {
                        text-align: left;
                    }

                    .new-banner__homepage-style-1.new-banner .new-banner__banner-titles .new-banner__banner-sub-title {
                        margin: 15px 0 30px;
                    }

                    /**@media queries**/

                    @media screen and (max-width: 1019px) {
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__block-reviews__content {
                            font-size: 20px;
                            line-height: 120%;
                        }

                        .new-banner__block-reviews__name {
                            font-size: 14px;
                            line-height: 120%;
                        }
                    }

                    @media screen and (max-width: 767px) {
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__block-reviews__content {
                            font-size: 26px;
                            line-height: 120%;
                        }

                        .new-banner__block-reviews__name {
                            font-size: 12px;
                            line-height: 100%;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .wrapper {
                            padding-top: 30px;
                            padding-bottom: 30px;
                        }
                    }

                    @media screen and (max-width: 1019px) {
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__block-reviews {
                            width: 200px;
                        }

                    }

                    @media screen and (max-width: 767px) {
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__block-reviews__content {
                            font-size: 26px;
                            line-height: 120%;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__block-reviews__name {
                            margin-bottom: 4px;
                            line-height: 100%;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .wrapper {
                            padding-top: 30px;
                            padding-bottom: 30px;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__block-reviews {
                            width: 190px;
                        }


                    }

                    @media screen and (min-width: 767px) {
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons .btn-v {
                            padding: 10px;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons .btn-v.:hover,
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons .btn-v.:active {
                            background-color: #d97281;
                            color: #ffffff;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons .btn-v.effect_1:before {
                            background-color: #d97281;
                        }
                    }

                    @media screen and (min-width: 1020px) {
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles .new-banner__banner-sub-title {
                            font-weight: 300;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .custom-banner--dashed .new-banner__banner-titles .new-banner__banner-sub-title {
                            margin-top: 0 !important;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles.new-banner__banner-titles--desktop,
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-title__static.new-banner__banner-titles-no-floating--desktop {
                            display: none;
                        }
                    }

                    @media (min-width: 768px) and (max-width: 1019px) {

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles.new-banner__banner-titles--tablet,
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__homepage-style-1.new-banner .new-banner__banner-title__static.new-banner__banner-titles-no-floating--tablet {
                            display: none;
                        }
                    }

                    @media (max-width: 1019px) {
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-title__static.new-banner__banner-titles {
                            padding-bottom: 20px;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles {
                            left: 33%;
                            top: 50%;
                            width: 49%;
                            padding: 0;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1 .new-banner__banner-img.new-banner__banner-padding-top-tablet {
                            padding-top: 50%;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .custom-banner--dashed .new-banner__banner-titles .new-banner__banner-sub-title {
                            font-weight: 500;
                        }

                        .new-banner__banner-titles .new-banner__banner-title+.new-banner__banner-titles .new-banner__banner-sub-title {
                            margin-top: 5px;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__banner-titles .new-banner__upper-headline p {
                            font-size: 14px;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__banner-titles-new-button {
                            font-size: 16px;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .btn-v,
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__custom__help-text {
                            font-size: 16px;
                            line-height: 120%;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn.new-banner__custom__help-text {
                            margin: 0;
                        }

                        .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons .btn-v {
                            height: 60px;
                            line-height: calc(60px - 6px);
                            font-size: 15px;
                        }

                        .new-banner__slider-buttons a {
                            max-width: 195px;
                            width: 184px;
                            height: 58px;
                            line-height: calc(58px - 6px);
                            font-size: 0.75rem;
                        }

                        .new-banner__slider-buttons a:first-child,
                        .new-banner__slider-buttons a:last-child {
                            top: 50%;
                        }

                        .new-banner__slider-buttons a:first-child,
                        .new-banner__slider-buttons a:last-child {
                            top: 50%;
                        }

                        .new-banner__slider-buttons a:nth-child(2) {
                            top: 50%;
                        }
                    }

                    @media(max-width: 767px) {

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles.new-banner__banner-titles--mobile,
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-title__static.new-banner__banner-titles-no-floating--mobile {
                            display: none;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn {
                            --custom-text-x: %;
                            --custom-text-y: %;
                            --custom-text-font-size: ;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles {
                            left: 44%;
                            top: 35%;
                            width: 70%;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles .new-banner__banner-title,
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles .new-banner__banner-title * {
                            font-size: calc(19px + (28 - 19) * ((100vw - 375px) / (767 - 375)));
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles .new-banner__banner-sub-title,
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles .new-banner__banner-sub-title * {
                            font-size: 0.875rem;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__banner-titles .new-banner__upper-headline {
                            gap: 15px;
                            font-size: 14px;

                            justify-content: center;

                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .btn-v,
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__custom__help-text {
                            font-size: 14px;
                            line-height: 100%;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .btn-v {

                            border-radius: 9px;

                        }

                        .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons .btn-v {
                            height: 50px;
                            line-height: calc(50px - 6px);
                            font-size: 14px;
                            margin: 0 auto;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles .new-banner__banner-title,
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles .new-banner__banner-title *,
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles .new-banner__banner-sub-title,
                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner__homepage-style-1.new-banner .new-banner__banner-titles .new-banner__banner-sub-title * {
                            text-align: center;
                        }

                        #shopify-section-template--16843925880991__custom_new_banner_layout_H3JQfn .new-banner .new-banner__banner-titles-new-button {
                            font-size: 12px;
                            float: none;

                            margin: 0 auto;

                        }
                    }

                    @media (max-width: 479px) {
                        .new-banner__homepage-style-1.new-banner .new-banner__slider-buttons .btn-v {
                            height: 45px;
                            line-height: calc(45px - 6px);
                            font-size: 12px;
                        }
                    }
                </style>


                <!-- end custom-new-banner-layout.liquid -->
            </div>
            <div id="shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY"
                class="shopify-section shipping-text-uvp-2">
                <!-- start custom-unique-value-proposition.liquid (SECTION) -->
                <style>
                    #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY {

                        margin-top: 50px;
                        margin-bottom: 0px;
                        padding-top: 0px;
                        padding-bottom: 0px;

                        background-color: #ffffff;
                    }

                    #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY .shipping-text .section-title {
                        font-size: 34px;
                    }

                    #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY .shipping-text .section-subtitle {
                        font-size: 18px;
                    }

                    #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY .shipping-text .shipping-text-content svg,
                    #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY .shipping-text .shipping-text-content svg .supertheme {
                        fill: #aaaaaa;
                    }

                    #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY .shipping-text .shipping-text-content {
                        display: flex !important;
                        flex-direction: column-reverse;
                        justify-content: center;
                        align-items: center;
                    }

                    #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY.uvp-text-container {
                        word-break: break-word;
                        text-align: ;
                        flex-direction: column-reverse;
                        text-align: ;
                    }

                    #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY .shipping-text .shipping-text-content .shipping-text-text {
                        color: #aaaaaa;
                        font-size: 20px;
                        text-transform: none;
                    }

                    #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY .shipping-text .shipping-text-content .shipping-body-text {
                        color: #aaaaaa;
                        font-size: 20px;
                        text-transform: none;
                    }

                    #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY .shipping-text .shipping-text-content img {
                        width: 95%;
                        max-width: 180px;
                        height: auto;

                    }

                    #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY .shipping-text .shipping-text-content svg {
                        max-width: 180px;
                        height: auto;
                        width: 100%;

                    }

                    @media(max-width: 1019px) {
                        #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY .shipping-text .section-title {
                            font-size: 28px;
                        }

                        #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY .shipping-text .section-subtitle {
                            font-size: 14px;
                        }

                        #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY .shipping-text .shipping-text-content .shipping-text-text {
                            font-size: 20px;
                        }

                        #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY .shipping-text .shipping-text-content .shipping-body-text {
                            font-size: 20px;
                        }
                    }

                    @media(min-width: 768px) {
                        #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY .shipping-text .shipping-text-content {
                            flex: 0 023%;
                        }
                    }

                    @media(max-width: 767px) {
                        #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY .shipping-text .shipping-text-content {
                            flex: 0 020%;
                        }

                        #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY .shipping-text .section-title {
                            font-size: 20px;
                        }

                        #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY .shipping-text .section-subtitle {
                            font-size: 14px;
                        }

                        #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY .shipping-text .shipping-text-content .shipping-text-text {
                            font-size: 20px;
                        }

                        #shopify-section-template--16843925880991__custom_unique_value_proposition_eLyGFY .shipping-text .shipping-text-content .shipping-body-text {
                            font-size: 20px;
                        }
                    }
                </style>


                <style scoped>
                    .shipping-text {
                        padding: 73px 0 78px;
                    }

                    .shipping-text .wrapper {
                        display: flex;
                        padding: 0 10px;
                        flex: 1 1 16.66%;
                        justify-content: center;
                        flex-wrap: wrap;
                    }

                    .shipping-text .shipping-text__titles {
                        margin-bottom: 49.7px;
                        padding-left: 13px;
                    }

                    .shipping-text .section-title {
                        padding: 0;
                        margin-bottom: 24.2px;
                        line-height: 1;
                        letter-spacing: 1.1px;
                    }

                    .shipping-text .section-subtitle {
                        letter-spacing: 0.5px;
                    }

                    .shipping-text .shipping-text__uvps {
                        padding: 0;
                        gap: 0px;
                        max-width: 100%;
                        flex-wrap: nowrap;
                        width: 77.5%;
                        justify-content: space-between;
                    }

                    .shipping-text .shipping-text-content {
                        max-width: 250px;
                        display: flex;
                        align-items: center;
                        text-align: center;
                    }

                    .shipping-text .shipping-text-content .shipping-text-text {
                        margin: 22px 0 15px;
                    }

                    .shipping-text .shipping-text-content .shipping-body-text {
                        line-height: 1.5;
                    }

                    .shipping-text .shipping-text-content svg {
                        height: 100%;
                    }

                    .shipping-text .shipping-text-content img {
                        display: inline;
                    }

                    .shipping-text .trust-badges__svg-image {
                        padding-top: 0;
                    }

                    .slick-prev-slider {
                        left: 0;
                    }

                    .slick-next-slider {
                        right: 0;
                    }

                    .uvp-slider .slick-arrow {
                        color: #fff;
                        font-size: 35px;
                        position: absolute;
                        top: 35%;
                        border-radius: 50%;
                        z-index: 9;
                        background: unset;
                    }

                    .uvp-slider .slick-arrow:before {
                        content: "";
                        background: rgb(255 255 255 / 18%);
                        width: 45px;
                        height: 45px;
                    }

                    @media (max-width: 1019px) {
                        .shipping-text {
                            padding: 51px 0 54px;
                        }

                        .shipping-text .shipping-text__titles {
                            margin-bottom: 35px;
                            padding-left: 11px;
                        }

                        .shipping-text .section-title {
                            margin-bottom: 0;
                            letter-spacing: 0.3px;
                        }

                        .shipping-text .section-subtitle {
                            margin-bottom: 0px;
                            letter-spacing: 0;
                        }

                        .shipping-text .shipping-text__uvps {
                            width: 75%;
                        }

                        .shipping-text .shipping-text-content {
                            flex: 0 0 22%;
                        }

                        .shipping-text .shipping-text-content .shipping-text-text {
                            margin: 10px 0 6px 0;
                        }

                        .shipping-text .shipping-text-content .shipping-body-text {
                            letter-spacing: 0.3px;
                            line-height: 1.1;
                        }

                        .shipping-text .shipping-text-content svg {
                            padding: 6px;
                        }
                    }

                    @media (max-width: 767px) {
                        .shipping-text {
                            padding: 21px 0 19px;
                        }

                        .shipping-text .shipping-text__titles {
                            margin-bottom: 2px;
                        }

                        .shipping-text .section-title {
                            margin-bottom: 5px;
                            letter-spacing: 0.5px;
                        }

                        .shipping-text .section-subtitle {
                            letter-spacing: 0.4px;
                        }

                        .shipping-text .shipping-text-content {
                            padding: 10px 5px;
                            flex-direction: column-reverse;
                        }

                        .shipping-text .shipping-text__uvps {
                            width: 96%;
                            flex-wrap: wrap;
                            gap: 1px 49px;
                            padding: 0 19px;
                        }

                        .shipping-text .shipping-text-content .shipping-text-text {
                            margin-bottom: 11px;
                        }

                        .shipping-text .shipping-text-content .shipping-body-text {
                            line-height: 1.5;
                            letter-spacing: 0;
                        }
                    }


                    @media (max-width: 479px) {

                        .uvp-text-container h3,
                        .uvp-text-container p {
                            font-size: 10px;
                        }
                    }
                </style>


                <style scoped>
                    #shopify-section-template--16843925880991__custom_area_JMcWCH {

                        margin-top: 0px;
                        margin-bottom: 0px;
                        padding-top: 0px;
                        padding-bottom: 0px;

                    }

                    .wrapper.custom-area .section-title {
                        padding: 17px 0 10px;
                        margin-bottom: 0;
                    }
                </style>

            </div>
            <div id="shopify-section-template--16843925880991__custom_area_h6z88q"
                class="shopify-section custom-area">
                <!-- start custom-area.liquid (SECTION) -->
                <section id="shopify-section-template--16843925880991__custom_area_h6z88q-content"
                    data-section-type="custom-area" class=" custom-area">
                    <h2 class="hide">Custom Area</h2>
                    <style>
                        .sr-afreview-container {
                            max-width: 1220px;
                            background-color: transparent;
                        }

                        .sr-afreview-bg {
                            background-color: #E16C81;
                            padding-top: 20px;
                            height: 600px;

                            background-image: url(https://cdn.shopify.com/s/files/1/0593/2892/1759/files/banners-resena-afiliados-18.png?v=1716584554);
                            background-size: cover;
                            background-position: center;
                        }

                        .sr-afreview-review {
                            padding-left: 20px;
                            width: 50%;
                            padding-bottom: 50px;
                            padding-top: 120px;
                            color: white;
                            font-size: 18px;
                            text-align: center;
                        }

                        .sr-afreview-author {
                            margin-top: 30px;
                        }
                    </style>

                    <div class="sr-afreview-container wrapper">
                        <div class="sr-afreview-bg">
                            <div class="sr-afreview-review">
                                "Tale of Roses is more than just flowers;it's about conveying a message. By using
                                flowers as the new
                                medium for messages, I've successfully sold over $23,000 in the first three months.
                                Passionate about the
                                product and the incredible team at Tale of Roses, I believe in making things happen and
                                embracing the
                                entrepreneurial journey!"
                                <div class="sr-afreview-author">Sussie - Roses Design</div>
                            </div>
                        </div>
                    </div>
                </section>

                <style scoped>
                    #shopify-section-template--16843925880991__custom_area_h6z88q {

                        margin-top: 0px;
                        margin-bottom: 0px;
                        padding-top: 0px;
                        padding-bottom: 0px;

                    }

                    .wrapper.custom-area .section-title {
                        padding: 17px 0 10px;
                        margin-bottom: 0;
                    }
                </style>

            </div>
            <div id="shopify-section-template--16843925880991__a8bb14f3-a52e-410e-ab35-c5f82e0e7c11"
                class="shopify-section custom-area"><!-- start custom-area.liquid (SECTION) -->
                <section id="shopify-section-template--16843925880991__a8bb14f3-a52e-410e-ab35-c5f82e0e7c11-content"
                    data-section-type="custom-area" class="judgeme-widget custom-area">
                    <h2 class="hide">Custom Area</h2><a href="https://clenchfitness.com/a/review/all">
                        <div id="stamped-reviews-widget" data-widget-type="site-badge" data-badge-type="badge"></div>
                    </a>
                </section>

                <style scoped>
                    #shopify-section-template--16843925880991__a8bb14f3-a52e-410e-ab35-c5f82e0e7c11 {

                        margin-top: 0px;
                        margin-bottom: 0px;
                        padding-top: 0px;
                        padding-bottom: 0px;

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
