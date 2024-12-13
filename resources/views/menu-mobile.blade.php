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
                     <form action="/search" method="POST" class="input-group search-bar">
                         @csrf
                         <input id="search-input" type="text" name="term" value=""
                             placeholder="Search for: Valentine’s, Engagement , Birthdays..." class="input-group-field"
                             aria-label="">
                         <span class="input-group-btn">
                             <button aria-label="search-button" id="search-button" type="submit"
                                 class="btn jq-icon-fallback-text">
                                 <span class="icon icon-search" aria-hidden="true"></span>
                                 <span class="fallback-text search-button-span"><svg width="14" height="14"
                                         viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                         <g id="Search Icon">
                                             <path id="Vector"
                                                 d="M6.61978 11.5061C9.54269 11.5061 11.9122 9.20046 11.9122 6.35631C11.9122 3.51217 9.54269 1.20654 6.61978 1.20654C3.69688 1.20654 1.32739 3.51217 1.32739 6.35631C1.32739 9.20046 3.69688 11.5061 6.61978 11.5061Z"
                                                 stroke="black" stroke-width="1.3231" stroke-linecap="round"
                                                 stroke-linejoin="round" />
                                             <path id="Vector_2" d="M13.2352 12.7934L10.3574 9.99316" stroke="black"
                                                 stroke-width="1.3231" stroke-linecap="round" stroke-linejoin="round" />
                                         </g>
                                     </svg></span>
                             </button>
                         </span>

                         <div class="search-results-wrapper w-80 " style="display: none;">
                             <div class="close-suggestions"><span
                                     class="search__terms"></span><!-- start icon-close.liquid (SNIPPET) -->
                                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="icon">
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
                             <a id="mobile-menu-1" class="sidenav__item__anchor " href="/collections/all">SHOP
                             </a>

                             <button class="sidenav__icon" type="button" aria-label="id-toggle-open-1"
                                 id="id-toggle-open-1" data-toggle="child">
                                 <span class="toggle toggle--plus"></span>
                             </button>
                         </div>

                         <ul class="sidenav__list list--child">
                             <li class="sidenav__list__item item--submenu">
                                 <div class="sidenav__item">
                                     <a id="mobile-menu-2-3" class="sidenav__item__anchor " href="/collections/all">
                                         By Type
                                     </a>
                                     <button class="sidenav__icon" type="button" id="id-nav__toggle-open-2-3"
                                         data-toggle="grandchild">
                                         <span class="toggle toggle--plus"></span>
                                     </button>
                                 </div>

                                 <ul class="sidenav__list list--grandchild">
                                     @foreach ($types->pluck('name') as $type)
                                         <li class="sidenav__list__item">
                                             <a class="sidenav__item__anchor " id="mobile-menu-2--1"
                                                 href="/collections/type/{{ str_replace(' ', '-', strtolower($type)) }}">
                                                 {{ $type }}
                                             </a>
                                         </li>
                                     @endforeach
                                 </ul>
                             </li>
                             <li class="sidenav__list__item item--submenu">
                                 <div class="sidenav__item">
                                     <a id="mobile-menu-2-3" class="sidenav__item__anchor " href="/collections/all">
                                         By Shape
                                     </a>
                                     <button class="sidenav__icon" type="button" id="id-nav__toggle-open-2-3"
                                         data-toggle="grandchild">
                                         <span class="toggle toggle--plus"></span>
                                     </button>
                                 </div>

                                 <ul class="sidenav__list list--grandchild">
                                     @foreach ($shapes->pluck('name') as $shape)
                                         <li class="sidenav__list__item">
                                             <a class="sidenav__item__anchor " id="mobile-menu-2--1"
                                                 href="/collections/type/{{ str_replace(' ', '-', strtolower($shape)) }}">
                                                 {{ $shape }}
                                             </a>
                                         </li>
                                     @endforeach
                                 </ul>
                             </li>
                             <li class="sidenav__list__item item--submenu">
                                 <div class="sidenav__item">
                                     <a id="mobile-menu-2-3" class="sidenav__item__anchor " href="/collections/all">
                                         By Size
                                     </a>
                                     <button class="sidenav__icon" type="button" id="id-nav__toggle-open-2-3"
                                         data-toggle="grandchild">
                                         <span class="toggle toggle--plus"></span>
                                     </button>
                                 </div>

                                 <ul class="sidenav__list list--grandchild">
                                     @foreach ($sizes->pluck('name') as $size)
                                         <li class="sidenav__list__item">
                                             <a class="sidenav__item__anchor " id="mobile-menu-2--1"
                                                 href="/collections/type/{{ str_replace(' ', '-', strtolower($size)) }}">
                                                 {{ $size }}
                                             </a>
                                         </li>
                                     @endforeach
                                 </ul>
                             </li>
                             <li class="sidenav__list__item item--submenu">
                                 <div class="sidenav__item">
                                     <a id="mobile-menu-2-3" class="sidenav__item__anchor " href="/collections/all">
                                         By Material
                                     </a>
                                     <button class="sidenav__icon" type="button" id="id-nav__toggle-open-2-3"
                                         data-toggle="grandchild">
                                         <span class="toggle toggle--plus"></span>
                                     </button>
                                 </div>

                                 <ul class="sidenav__list list--grandchild">
                                     @foreach ($materials->pluck('name') as $material)
                                         <li class="sidenav__list__item">
                                             <a class="sidenav__item__anchor " id="mobile-menu-2--1"
                                                 href="/collections/type/{{ str_replace(' ', '-', strtolower($material)) }}">
                                                 {{ $material }}
                                             </a>
                                         </li>
                                     @endforeach
                                 </ul>
                             </li>

                         </ul>
                     </li>

                     <li class="sidenav__list__item item--submenu">
                         <div class="sidenav__item">
                             <a id="mobile-menu-1" class="sidenav__item__anchor " href="/design-your-own">TRY BEFORE
                                 BUY
                             </a>
                         </div>
                     </li>

                     <li class="sidenav__list__item item--submenu">
                         <div class="sidenav__item">
                             <a id="mobile-menu-3" class="sidenav__item__anchor " href="/collections/all">OCCASTIONS
                             </a>

                             <button class="sidenav__icon" type="button" aria-label="id-toggle-open-3"
                                 id="id-toggle-open-3" data-toggle="child">
                                 <span class="toggle toggle--plus"></span>
                             </button>
                         </div>

                         <ul class="sidenav__list list--child">
                             <li class="sidenav__list__item item--submenu">
                                 <div class="sidenav__item">
                                     <a id="mobile-menu-3-3" class="sidenav__item__anchor " href="/collections/all">
                                         Everyday Occasions
                                     </a>
                                     <button class="sidenav__icon" type="button" id="id-nav__toggle-open-3-3"
                                         data-toggle="grandchild">
                                         <span class="toggle toggle--plus"></span>
                                     </button>
                                 </div>

                                 <ul class="sidenav__list list--grandchild">
                                     @foreach ($everyday as $event)
                                         <li class="sidenav__list__item">
                                             <a class="sidenav__item__anchor " id="mobile-menu-3--1"
                                                 href="/collections/event/{{ strtolower($event->name) }}">
                                                 {{ $event->name }}
                                             </a>
                                         </li>
                                     @endforeach

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
                                     @foreach ($upcoming as $event)
                                         <li class="sidenav__list__item">
                                             <a class="sidenav__item__anchor " id="mobile-menu-3--1"
                                                 href="/collections/event/{{ strtolower($event->name) }}">
                                                 {{ $event->name }}
                                             </a>
                                         </li>
                                     @endforeach

                                 </ul>
                             </li>
                         </ul>
                     </li>

                     <li class="sidenav__list__item item--submenu">
                         <div class="sidenav__item">
                             <a id="mobile-menu-1" class="sidenav__item__anchor " href="/pages/about-us">
                                 ABOUT US
                             </a>
                         </div>
                     </li>

                 </ul>

                 <ul id="shop-info" class="sidenav__list sidenav__list--shop">
                     <li class="sidenav__list__item">
                         <a id="mobile-menu-email" class="sidenav__item__anchor "
                             href="mailto:weborders@taleofroses.com.au?Subject=Hello%20again" target="_top"><svg
                                 xmlns="http://www.w3.org/2000/svg" width="16" height="12"
                                 viewBox="0 0 16 12" fill="none">
                                 <path
                                     d="M15 1.875C15 1.11875 14.37 0.5 13.6 0.5H2.4C1.63 0.5 1 1.11875 1 1.875M15 1.875V10.125C15 10.8813 14.37 11.5 13.6 11.5H2.4C1.63 11.5 1 10.8813 1 10.125V1.875M15 1.875L8 6.6875L1 1.875"
                                     stroke="white" stroke-width="0.866667" stroke-linecap="round"
                                     stroke-linejoin="round" />
                             </svg>weborders@taleofroses.com.au
                         </a>
                     </li>
                     @if (auth()->check())
                         <li class="sidenav__list__item">
                             <span class="sidenav__text__wrapper">
                                 <a id="customer_login_link-menu-mobile" class="sidenav__item__anchor"
                                     href="/logout"><!-- start icon-key.liquid (SNIPPET) -->
                                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 516.375 516.375"
                                         style="&#10;">
                                         <path
                                             d="M353.812,0C263.925,0,191.25,72.675,191.25,162.562c0,19.125,3.825,38.25,9.562,57.375L0,420.75v95.625h95.625V459H153 v-57.375h57.375l86.062-86.062c17.213,5.737,36.338,9.562,57.375,9.562c89.888,0,162.562-72.675,162.562-162.562S443.7,0,353.812,0 z M401.625,172.125c-32.513,0-57.375-24.862-57.375-57.375s24.862-57.375,57.375-57.375S459,82.237,459,114.75 S434.138,172.125,401.625,172.125z" />
                                     </svg>Log out
                                 </a>
                             </span>
                         </li>
                     @else
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
                     @endif
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
