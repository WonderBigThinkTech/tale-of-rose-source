<x-layout>

    <main id="MainContent" class="main-content">





        @include('menu-mobile')



        <div class="DrawerOverlay"></div>

        <section id="search-layout">

            <h2 class="hide">SearchContent</h2>



            <div id="shopify-section-template--16509025222815__main" class="shopify-section">

                <!-- start search-template.liquid (SECTION) -->

                <div class="wrapper">

                    <div class="search-collection container">

                        <div class="inner">

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



                                <span class="breadcrumbs__item">Search: {{ $products->count() }} results found for

                                    &quot;{{ $term }}&quot;</span>

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







                            <h1 id="id-section-header" class="section-header__title section-header__left title">Search

                                for: <strong class="search-terms">"{{ $term }}"</strong></h1>

                            @if ($products->count() > 0)

                                <header class="section-header">

                                    <h2 class="hide">{{ $term }}</h2>



                                    <form id="template-search-form" action="/search" method="post"

                                        style="margin-top: 30px; margin-bottom: 30px;" class="search-page-form">

                                        @csrf

                                        <input type="hidden" name="type" value="products">

                                        <input aria-label="search-text" type="text" class="search-text"

                                            name="term" id="Search-Template-Input" value="{{ $term }}"

                                            placeholder="">

                                        <button id="Template-SearchButton" type="submit" class="button">

                                            <span class="icon-fallback-text">Search</span>

                                        </button>

                                    </form>

                                </header>





                                <div class="search-page__list-of-products">

                                    <div class="grid-uniform grid-uniform--s5">

                                        <!-- start product-card.liquid (SNIPPET) -->

                                        @foreach ($products as $product)

                                            <div class="product-card__grid-item">



                                                <div class="product-card__grid-item-fullsize">

                                                    <div title="RED-02" class="product-card__grid-item-link">

                                                        <div class="product-card__grid-item-image-wrapper">

                                                            <a href="/products/{{ $product->id }}"

                                                                class="grid__item_image-link gridfimgor"><!-- start responsive-image.liquid (SNIPPET) -->

                                                                @foreach(json_decode($product->eachcolor_image) as $key => $img)
                                                                    

                                                                    <img id="784571288"

                                                                    src="/storage/products/{{$img}}"

                                                                    data-src="/storage/products/{{$img}}"

                                                                    data-srcset="/storage/products/{{$img}}"

                                                                    sizes="(max-width: 479px) 480px, (max-width: 767px) 768px, (max-width: 1019px) 1020px, (max-width: 1279px) 1280px"

                                                                    class="responsive-image grid__item-image one"

                                                                    data-class="LazyLoad"

                                                                    alt="Another Year Of Love - Acrylic Round Box (1 Preserved Stem)"

                                                                    loading="lazy" width="400" height="400">
                                                                @endforeach



                                                                </a>

                                                        </div>



                                                        <div class="product-card__product-info">

                                                            <h3 class="product-card__item-title">

                                                                <a href="/collections/all/products/another-year-of-love-acrylic-round-box-1-preserved-stem?variant=45873008214175"

                                                                    class="product-card__item-title-link">{{ $product->name }}</a>

                                                            </h3>

                                                            <div class="product-card__item-description-wrapper">

                                                                <span class="product-card__item-description"></span>

                                                            </div>





                                                            <div class="product-card__reviews">

                                                                <svg width="114" height="22" viewBox="0 0 114 22"

                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">

                                                                    <path

                                                                        d="M11.1938 0L13.707 7.60081H21.8398L15.2602 12.2984L17.7734 19.8992L11.1938 15.2016L4.61426 19.8992L7.12743 12.2984L0.547865 7.60081H8.68066L11.1938 0Z"

                                                                        fill="#595959" />

                                                                    <path

                                                                        d="M34.5815 0L37.0947 7.60081H45.2275L38.6479 12.2984L41.1611 19.8992L34.5815 15.2016L28.002 19.8992L30.5151 12.2984L23.9356 7.60081H32.0684L34.5815 0Z"

                                                                        fill="#595959" />

                                                                    <path

                                                                        d="M57.4604 0L59.8593 7.60081H67.6225L61.342 12.2984L63.7409 19.8992L57.4604 15.2016L51.1799 19.8992L53.5789 12.2984L47.2984 7.60081H55.0615L57.4604 0Z"

                                                                        fill="#595959" />

                                                                    <path

                                                                        d="M80.3391 0L82.8523 7.60081H90.9851L84.4055 12.2984L86.9187 19.8992L80.3391 15.2016L73.7595 19.8992L76.2727 12.2984L69.6931 7.60081H77.8259L80.3391 0Z"

                                                                        fill="#595959" />

                                                                    <path

                                                                        d="M102.903 0L105.394 7.60081H113.457L106.934 12.2984L109.426 19.8992L102.903 15.2016L96.3799 19.8992L98.8714 12.2984L92.3486 7.60081H100.411L102.903 0Z"

                                                                        fill="#595959" />

                                                                </svg>

                                                                <span>(5.0 of 800 Reviews)</span>

                                                            </div>

                                                            <div class="product-card__item-price-wrapper"><span

                                                                    class="product-card__item-price"><span

                                                                        class=money>${{ $product->price }}</span></span>



                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>







                                                <style scoped>
                                            .gridfimgor img{display: none;}
                                                     .gridfimgor img:first-child{display: block;}   
                                                    .product-card__grid-item {

                                                        width: 23.5%;

                                                        display: flex;

                                                        align-items: center;

                                                        flex-direction: column;

                                                        position: relative;

                                                        overflow: hidden;

                                                    }



                                                    .product-card__grid-item-fullsize {

                                                        width: 100%;

                                                        height: 100%;

                                                        background-color: #EDEDED;

                                                    }



                                                    .product-card__grid-item-image-wrapper {

                                                        position: relative;

                                                        padding-top: 100%;

                                                        overflow: hidden;

                                                        width: 100%;

                                                        transform: scale(1);

                                                    }



                                                    .product-card__grid-item-link {

                                                        width: 100%;

                                                        overflow: hidden;

                                                    }



                                                    .product-card__item-reviews-wrapper {

                                                        padding: 0 8px;

                                                    }



                                                    .grid-uniform--s2 .product-card__grid-item {

                                                        flex-basis: 48.5%;

                                                    }



                                                    .grid-uniform--s3 .product-card__grid-item {

                                                        flex-basis: 32.1%;

                                                    }



                                                    .grid-uniform--s4 .product-card__grid-item {

                                                        flex-basis: 23.5%;

                                                    }



                                                    body .product-page .product-variant-wrapper,

                                                    body .product-page #rc_container {

                                                        margin-bottom: 3px;

                                                    }



                                                    .ribbon {

                                                        width: 75px;

                                                        height: 75px;

                                                        overflow: hidden;

                                                        position: absolute;

                                                        z-index: 8;

                                                        pointer-events: none;

                                                    }



                                                    .ribbon::before,

                                                    .ribbon::after {

                                                        position: absolute;

                                                        z-index: -1;

                                                        content: '';

                                                        display: block;

                                                        border: 5px solid var(--tagBadgeBackgroundColor);

                                                    }



                                                    .ribbon span {

                                                        background-color: var(--tagBadgeBackgroundColor);

                                                        color: var(--tagBadgeTextColor);

                                                        position: absolute;

                                                        width: 185px;

                                                        padding: 6px 0;

                                                        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);

                                                        font-size: var(--tagBadgeTextSmallSize);

                                                        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);

                                                        text-transform: uppercase;

                                                        text-align: center;

                                                        height: 27px;

                                                        display: flex;

                                                        justify-content: center;

                                                        align-items: center;

                                                    }



                                                    .ribbon-top-left {

                                                        top: -10px;

                                                        left: -10px;

                                                    }



                                                    .ribbon-top-left::before,

                                                    .ribbon-top-left::after {

                                                        border-top-color: transparent;

                                                        border-left-color: transparent;

                                                    }



                                                    .ribbon-top-left::before {

                                                        top: 0;

                                                        right: 0;

                                                    }



                                                    .ribbon-top-left::after {

                                                        bottom: 0;

                                                        left: 0;

                                                    }



                                                    .ribbon-top-left span {

                                                        left: -62px;

                                                        top: 17px;

                                                        transform: rotate(-45deg);

                                                    }



                                                    .ribbon-top-right {

                                                        top: -10px;

                                                        right: -5px;

                                                    }



                                                    .ribbon-top-right::before,

                                                    .ribbon-top-right::after {

                                                        border-top-color: transparent;

                                                        border-right-color: transparent;

                                                    }



                                                    .ribbon-top-right::before {

                                                        top: 0;

                                                        left: 0;

                                                    }



                                                    .ribbon-top-right::after {

                                                        bottom: 0;

                                                        right: 0;

                                                    }



                                                    .ribbon-top-right span {

                                                        left: -48px;

                                                        top: 17px;

                                                        transform: rotate(45deg);

                                                    }



                                                    .product-half .ribbon {

                                                        width: 120px;

                                                        height: 120px;

                                                    }



                                                    .product-half .ribbon span {

                                                        height: 45px;

                                                    }



                                                    .product-half .ribbon-top-left {

                                                        top: -4px;

                                                        left: 9px;

                                                    }



                                                    .product-half .ribbon-top-left span {

                                                        left: -47px;

                                                        top: 21px;

                                                        font-size: var(--tagBadgeTextSize);

                                                    }



                                                    .soldout {

                                                        margin: 0 auto;

                                                        color: #e00;

                                                        font-weight: bold;

                                                    }



                                                    .compare-price {

                                                        color: var(--color-sale);

                                                        font-size: var(--collectionProductComparePriceSize);

                                                        margin-right: 5px;

                                                        text-decoration: line-through;

                                                        font-weight: bold;

                                                    }



                                                    /* Import CSS */



                                                    .product-card____item-title {

                                                        margin: 10px 0 3px 0;

                                                    }



                                                    .product-card__item-description-wrapper {

                                                        text-align: left;

                                                        padding: 0 8px;

                                                    }



                                                    .product-card____item-reviews-wrapper {

                                                        text-align: left;

                                                    }



                                                    .grid__item-image {

                                                        position: absolute;

                                                        top: 50%;

                                                        left: 50%;

                                                        width: 100%;

                                                        height: 100%;

                                                        object-fit: cover;

                                                        transform: translate(-50%, -50%) scale(1.01);

                                                        transition: transform 1s cubic-bezier(0.215, 0.61, 0.355, 1);

                                                    }



                                                    .product-card__item-title {

                                                        margin: 18.48px 0 3px 0;

                                                        text-align: left;

                                                        padding: 0 8px;

                                                        font-size: var(--h3Size);

                                                    }



                                                    .product-card__item-title-link {

                                                        color: #4b4b4b;

                                                    }



                                                    .product-card__item-compare-at-price,

                                                    .product-card__item-price,

                                                    .product-card__item-sold-out {

                                                        font-weight: bold;

                                                        text-align: center;

                                                    }



                                                    .product-card__item-compare-at-price {

                                                        margin-right: 10px;

                                                        color: var(--color-sale, #a00);

                                                        text-decoration-line: line-through;

                                                        font-size: var(--collectionProductComparePriceSize);

                                                    }



                                                    .product-card__item-price-wrapper {

                                                        margin: 10px 0;

                                                        text-align: left;

                                                        padding: 0 8px;

                                                    }



                                                    .product-card__item-price {

                                                        color: var(--color-price, rgb(25, 156, 25));

                                                    }



                                                    .product-card__item-price .money {

                                                        font-size: var(--h3Size);

                                                        margin: 0 4px 0 0;

                                                    }



                                                    .product-card__item-sold-out {

                                                        display: block;

                                                        color: var(--color_out_of_stock_label, #a00);

                                                        margin: 10px 0;

                                                        padding: 5px 0;

                                                        background-color: var(--stock_warning_background_color);

                                                        margin-bottom: 12px;

                                                    }



                                                        {

                                                        margin-top: 3px;

                                                        text-align: left;

                                                        padding: 0 8px;

                                                    }



                                                    .grid__item--hidden-image img {

                                                        opacity: 0;

                                                        visibility: hidden;

                                                    }



                                                    @media (max-width: 1019px) {

                                                        .grid-uniform--st2 .product-card__grid-item {

                                                            flex-basis: 48.5%;

                                                        }



                                                        .grid-uniform--st3 .product-card__grid-item {

                                                            flex-basis: 32.3%;

                                                        }

                                                    }



                                                    @media (max-width: 767px) {



                                                        .product-card__item-title,

                                                        .product-card__item-price .money {

                                                            font-size: var(--h3SizeTablet);

                                                        }



                                                        .grid-uniform--sm1 .product-card__grid-item {

                                                            flex-basis: 94%;

                                                        }



                                                        .grid-uniform--sm2 .product-card__grid-item {

                                                            flex-basis: 48.5%;

                                                        }



                                                        .product-card__item-compare-at-price .money {

                                                            font-size: 12px;

                                                        }

                                                    }



                                                    @media (max-width: 375px) {



                                                        .product-card__item-title,

                                                        .product-card__item-price .money {

                                                            font-size: var(--h3SizeMobile);

                                                        }

                                                    }

                                                </style>

                                            </div>

                                        @endforeach



                                    </div>







                                </div>

                                <hr>

                                <div class="pagination">

                                    <span class="page current">1</span> <span class="page"><a

                                            href="/search?page=2&amp;q=year&amp;type=products"

                                            title="">2</a></span>

                                    <span class="next"><a href="/search?page=2&amp;q=year&amp;type=products"

                                            title="">&rarr;</a></span>

                                </div>

                            @else

                                <p class="zero-founds-message text-center">Sorry, no results for:

                                    "{{ $term }}"</p>

                                <p class="text-center">Please try checking your spelling, use more general terms or

                                    go

                                    back to the <a href="/">homepage</a>.</p>

                                <h2 class="section-title-text">Check out these alternatives:</h2>

                            @endif



                        </div>

                    </div>

                </div>



                <style scoped>

                    .search-collection .grid-uniform {

                        display: flex;

                        flex-wrap: wrap;

                        width: 100%;

                        gap: 8vh 2%;

                        list-style: none;

                    }



                    .product-card__reviews {

                        display: flex;

                        align-items: center;

                        justify-content: left;

                        gap: 3px;

                        padding: 0 3px;

                        font-size: 14px;

                    }



                    .product-card__item-price .money {

                        font-size: 20px;

                        color: #A84F65;

                    }



                    .product-card__reviews svg {

                        width: 100px;

                    }



                    .product-card__reviews svg path {

                        fill: #FFD700;

                    }



                    .search-collection .grid__item {

                        box-sizing: border-box;

                        float: left;

                        min-height: 1px;

                        margin: 0 0 30px 0;

                        vertical-align: top;

                        width: 100%;

                    }



                    .search-collection .grid__item-image-wrapper {

                        position: relative;

                        height: 0;

                        padding-top: 100%;

                        overflow: hidden;

                        width: 100%;

                    }



                    .search-collection .grid__card {

                        display: flex;

                        flex-wrap: wrap;

                        width: 100%;

                        height: 100%;

                        column-gap: 8px;

                        row-gap: 8px;

                    }



                    .search-collection .card__content {

                        display: grid;

                        grid-template-rows: minmax(0, 1fr) max-content minmax(0, 1fr);

                        flex-grow: 1;

                        background-color: rgb(243, 243, 243);

                        height: 100%;

                        padding: 1rem;

                        text-decoration: none;

                        width: calc(25% - 8px * 3 / 4);

                        cursor: pointer;

                    }



                    .search-collection .card__information {

                        padding: 1.3rem 1rem;

                        grid-row-start: 2;

                    }



                    .search-collection .page-title {

                        font-size: 1rem;

                    }



                    .search-collection .page-content,

                    .page-content a {

                        font-size: 0.875rem;

                        color: rgb(18, 18, 18);

                    }



                    .search-collection .search-page__title-result {

                        margin: 2rem 0;

                    }



                    #shopify-section-template--16509025222815__main .grid-uniform--s2 .grid__item {

                        flex-basis: 48%;

                    }



                    #shopify-section-template--16509025222815__main .grid-uniform--s3 .grid__item {

                        flex-basis: 32%;

                    }



                    #shopify-section-template--16509025222815__main .grid-uniform--s4 .grid__item {

                        flex-basis: 23.5%;

                    }



                    #shopify-section-template--16509025222815__main .grid-uniform--s5 .grid__item {

                        flex-basis: 18.4%;

                    }



                    .section-header .zero-founds-message,

                    .section-header .text-center {

                        font-size: 18px;

                    }



                    .section-title-text {

                        text-align: center;

                        margin-top: 30px;

                        text-transform: capitalize;

                    }



                    .section-header .text-center a {

                        font-weight: 700;

                    }



                    .template-search .main-content {

                        margin: 0 auto;

                    }



                    .template-search .main-content .section-header {

                        width: 100%;

                        float: left;

                        padding: 0px 0px 25px 0px;

                    }



                    .template-search .main-content .section-header__title {

                        font-weight: 400;

                        color: #333;

                        text-transform: uppercase;

                        margin: 0 0 20px;

                    }



                    .template-search .main-content .section-header__title span {

                        padding: 0 10px;

                        color: #e5e5e5;

                    }



                    .template-search .main-content .section-header__title strong {

                        font-weight: 400;

                        font-size: 1em;

                    }



                    .template-search .main-content .inner {

                        display: block;

                    }



                    .template-search .main-content .inner .grid__item {

                        box-sizing: border-box;

                        float: left;

                        min-height: 1px;

                        margin: 0 0 30px 0;

                        vertical-align: top;

                        width: 100%;

                    }



                    .template-search .main-content .inner .productgrid {

                        display: block;

                    }



                    .template-search .main-content .inner .product-title {

                        margin: 15px 0 8px 0;

                        text-align: center;

                    }



                    .template-search .main-content .inner .product-title a {

                        color: #000;

                        font-size: 1rem;

                        margin: 15px 0 8px 0;

                        text-align: center;

                        text-transform: uppercase;

                        font-weight: bold;

                        font-size: 0.94118rem;

                    }



                    .template-search .main-content .inner .product-price {

                        text-align: center;

                    }



                    .template-search .main-content .inner .product-price .compare-price {

                        text-decoration: line-through;

                    }



                    .template-search .main-content .inner .grid__image {

                        display: block;

                        margin: 0 auto 15px;

                        width: 100%;

                    }



                    .template-search .main-content .inner .large--one-quarter {

                        width: 25%;

                        padding: 1%;

                    }



                    .search-page-form {

                        float: left;

                        width: 100%;

                        align-items: center;

                        justify-content: center;

                        display: flex;

                    }



                    .search-page-form .search-text {

                        width: 75%;

                        border: 1px solid #e5e5e5;

                        padding: 5px 10px;

                        float: left;

                        height: 37px;

                        max-width: 700px;

                    }



                    .search-page-form .button {

                        background-color: #3c3c3c;

                        color: #fff;

                        width: 25%;

                        float: left;

                        padding: 5px 10px;

                        border: 1px solid #3c3c3c;

                        text-transform: uppercase;

                        height: 37px;

                        max-width: 140px;

                    }



                    .search .inner .grid__card {

                        display: flex;

                        flex-wrap: wrap;

                        width: 100%;

                        height: 100%;

                        column-gap: 8px;

                        row-gap: 8px;

                    }



                    .search .inner .card__content {

                        display: grid;

                        grid-template-rows: minmax(0, 1fr) max-content minmax(0, 1fr);

                        flex-grow: 1;

                        background-color: rgb(243, 243, 243);

                        height: 100%;

                        padding: 1rem;

                        text-decoration: none;

                        width: calc(25% - 8px * 3 / 4);

                        cursor: pointer;

                    }



                    .search .inner .card__content .card__information {

                        padding: 1.3rem 1rem;

                        grid-row-start: 2;

                    }



                    .search .inner .card__content .card__information .page-title {

                        font-size: 1rem;

                    }



                    .search .inner .card__content .card__information .page-content {

                        font-size: 0.875rem;

                    }



                    .search .inner .card__content .card__badge .badge {

                        border: 1px solid transparent;

                        border-radius: 4rem;

                        padding: .3rem 1rem;

                        text-align: center;

                        background-color: rgb(255, 255, 255);

                        border-color: rgba(18, 18, 18, .1);

                        color: rgb(18, 18, 18);

                    }



                    .search .inner .card__content a {

                        color: rgb(18, 18, 18);

                    }



                    .search .inner .card__content a:hover {

                        text-decoration: underline;

                    }



                    .search .inner .card__content:hover {

                        border-color: rgba(18, 18, 18, .1);

                    }



                    @media (max-width: 1019px) {

                        #shopify-section-template--16509025222815__main .product-card__grid-item {

                            flex-basis: 23.5%;

                        }

                    }



                    @media (max-width: 767px) {



                        .template-search .main-content {

                            margin: 0 auto;

                        }



                        .product-card__reviews {

                            font-size: 10px;

                            padding: 0 0 0 8px;

                        }



                        .product-card__reviews svg {

                            width: 50px;

                        }



                        .product-card__item-price .money {

                            font-size: 16px;

                        }



                        .product-card__item-price-wrapper {

                            margin: 0 0 10px;

                        }



                        .template-search .main-content .section-header__title {

                            font-size: 20px;

                        }



                        .template-search .main-content .section-header__title strong {

                            font-weight: 400;

                            font-size: 20px;

                        }



                        .template-search .main-content .inner {

                            padding: 0 2%;

                        }



                        .template-search .main-content .inner header {

                            border: none;

                        }



                        .template-search .main-content .inner .large--one-quarter {

                            flex-basis: 49%;

                            display: block;

                        }



                        .template-search .main-content .inner .productgrid {

                            min-height: 0;

                        }



                        .search .inner .card__content {

                            width: calc(50% - 8px / 2);

                        }

                    }



                    @media (max-width: 479px) {

                        .template-search .main-content .inner .large--one-quarter {

                            flex-basis: 49%;

                        }



                        .search .inner .card__content .card__information {

                            padding: 0;

                            margin-top: 15px;

                        }



                        .search .inner .card__content .card__information .card__heading {

                            margin-bottom: 7px;

                        }



                        #shopify-section-template--16509025222815__main .product-card__grid-item {

                            flex-basis: 49%;

                            margin: 0 auto;

                        }

                    }

                </style>

            </div>

            <limespot></limespot>

        </section>





    </main>

</x-layout>

