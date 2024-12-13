<x-layout>

    <main id="MainContent" class="main-content">





        @include('menu-mobile')



        <div class="DrawerOverlay"></div>

        <section id="collection-layout">

            <h2 class="hide">CollectionContent</h2>



            <section id="shopify-section-template--16192518488223__main" class="shopify-section">

                <!-- sections/custom-collection-template -->

                <style>

                    #shopify-section-template--16192518488223__main .titles {

                        position: absolute;

                        width: 70%;

                        left: 9%;

                        top: 28%

                    }



                    #shopify-section-template--16192518488223__main .collection-banner__description * {

                        color: #ffffff;

                        text-shadow: 2px 1px 4px #000;

                    }



                    #shopify-section-template--16192518488223__main .collection-description__text {

                        text-align: left;

                        color: #000;

                    }



                    #shopify-section-template--16192518488223__main .collection-description__text.see-more.see-more:not(.collection-description__text--opened) {

                        max-height: 125px;

                    }



                    #shopify-section-template--16192518488223__main .collection-description__button {

                        color: #000;

                    }



                    #shopify-section-template--16192518488223__main .grid__item-price {

                        font-size: 1.125rem;

                    }



                    .collection-page__breadcrumb-wrapper {

                        display: flex;

                        align-items: center;

                        justify-content: space-between;

                        flex-wrap: wrap;

                        gap: 10px;

                        margin: 32px auto 10px;

                    }



                    .collection-page__breadcrumb-wrapper .breadcrumbs {

                        width: 22%;

                    }



                    .collection-page__breadcrumb-wrapper .breadcrumbs__item {

                        line-height: 1;

                    }



                    .collection-filter__wrapper {

                        display: flex;

                        justify-content: flex-end;

                        flex: 1;

                        margin-right: 44px;

                    }



                    .products-not-found {

                        margin: 0 auto;

                    }



                    .collection-page__loading-more-wrapper {

                        text-align: center;

                        margin-top: 40px;

                        width: 100%;

                    }



                    .collection-page__loading-more {

                        display: inline-block;

                        padding: 7px 10px;

                        background: var(--color-secondary-buttons);

                        color: var(--color-secondary-buttons-text);

                        font-size: 1rem;

                    }



                    .loading-more__progress-wrapper {

                        display: block;

                        width: 120px;

                        margin: 0 auto;

                    }



                    .loading-more__progress-label {

                        margin-bottom: 5px;

                    }



                    .loading-more__progress-bar {

                        display: block;

                        width: 100%;

                        height: 4px;

                        background-color: #eee;

                        position: relative;

                        margin-bottom: 10px;

                    }



                    .loading-more__progress-bar-fill {

                        display: block;

                        height: 100%;

                        background-color: #f00;

                        position: absolute;

                        top: 0;

                        left: 0;

                    }



                    .collection-page__loading-more:hover {

                        background: var(--color-secondary-buttons-hover);

                        color: var(--color-secondary-buttons-text-hover);

                    }



                    .collection-facets--opened {

                        overflow: hidden;

                    }



                    .collection-page__wrapper>div:not(.collection-page__filter-wrapper):not(.collection-page__content) {

                        display: none;

                    }



                    .collection-page__wrapper {

                        padding: 20px 0;

                    }



                    .collection-page__filter-wrapper {

                        width: 18%;

                        margin-left: 2px;

                    }



                    .collection-page__breadcrumb-wrapper {

                        margin: 34px auto 10px;

                    }



                    .collection-page__content {

                        width: 77%;

                    }



                    .collection-filter {

                        display: flex;

                        justify-content: space-between;

                        gap: 20px;

                    }



                    .collection-filter__item-label {

                        font-size: var(--breadcrumbFontSize, 1rem);

                        margin-right: 8px;

                    }



                    .collection-filter__dropdown {

                        width: 206px;

                        height: 47px;

                        margin: 3px 3px 0 0;

                        padding: 0 16px;

                        letter-spacing: 0.2px;

                        color: #626262;

                        font-size: var(--breadcrumbFontSize, 1rem);

                        appearance: none;

                        -webkit-appearance: none;

                        background-color: #F1F1F1;

                        background-image: url("//speakingroses.com/cdn/shop/t/12/assets/icon-arrow-down.svg?v=34278163452054174531698247614");

                        background-size: 18px;

                        background-position: 92% center;

                        background-repeat: no-repeat;

                        border-radius: 4px;

                        border: none;

                    }



                    .collection__filter-icon-wrapper {

                        display: flex;

                        align-items: center;

                        gap: 30px;

                    }



                    .spinner-widget {

                        display: flex;

                        flex-direction: column;

                        align-items: center;

                        padding: 30px 0;

                        margin: 0 auto;

                        width: 100%;

                    }



                    .spinner-widget__spinner {

                        display: block;

                        width: 50px;

                        height: 50px;

                        border: 3px solid #eee;

                        border-bottom-color: transparent;

                        border-radius: 100%;

                        margin-bottom: 5px;

                        animation: linear 0.45s 0s infinite spinner;

                    }



                    .spinner-widget__text {

                        text-transform: uppercase;

                    }



                    @keyframes spinner {

                        0% {

                            transform: rotate(0deg);

                        }



                        100% {

                            transform: rotate(360deg);

                        }

                    }



                    .collection-page__loading-more-wrapper {

                        text-align: center;

                        margin-top: 40px;

                        width: 100%;

                    }



                    .collection-page__loading-more {

                        display: inline-block;

                        padding: 7px 10px;

                        background: var(--color-secondary-buttons);

                        color: var(--color-secondary-buttons-text);

                    }



                    .collection-page__loading-more:hover {

                        background: var(--color-secondary-buttons-hover);

                        color: var(--color-secondary-buttons-text-hover);

                    }



                    /* product grid */

                    .collection-page__wrapper,

                    .collection-page__grid-products {

                        display: flex;

                    }



                    .collection-page__wrapper {

                        padding: 20px 20px;

                        justify-content: space-between;

                    }



                    .collection-page__grid-products {

                        flex-wrap: wrap;

                        justify-content: flex-start;

                    }



                    .collection-page__grid-products.grid-uniform--s4 {

                        gap: 30px 2%;

                    }



                    .collection-page__grid-products.grid-uniform--s3 {

                        gap: 30px 1.5%;

                    }



                    .collection-page__grid-products.grid-uniform--s2 {

                        gap: 30px 3%;

                    }



                    .collection-page__grid-products+.collection-page__grid-products {

                        margin-top: 30px;

                    }



                    .product-card__item-title-wrapper .product-card__item-title {

                        margin-top: 13px;

                    }



                    .product-card__item-price {

                        font-size: 18px;

                        font-weight: 400;

                    }



                    body .collection-banner .collection-page__title {

                        font-size: 30px;

                    }



                    .collection-description__text,

                    .collection-description__text * {

                        font-size: 18px;

                    }



                    .collection-template-wrapper .product-card__grid-item-image-wrapper {

                        padding-top: 108%;

                        border-radius: 10px;

                    }



                    @media (max-width: 1019px) {

                        .collection-page__breadcrumb-wrapper {

                            margin: 43px auto 7px;

                        }



                        .collection-page__wrapper {

                            padding: 9px 20px;

                        }



                        .collection-page__breadcrumb-wrapper .breadcrumbs {

                            width: auto;

                        }



                        .products-amount-span {

                            font-size: 12px;

                            margin-right: 20px;

                        }



                        .collection-page__grid-products.grid-uniform--st2 {

                            gap: 30px 3%;

                        }



                        .collection-page__grid-products.grid-uniform--st3 {

                            gap: 30px 1.5%;

                        }



                        .collection-page__grid-products+.collection-page__grid-products {

                            margin-top: 39px;

                        }



                        .collection__filter-icon-wrapper {

                            position: absolute;

                            right: 0;

                            margin-bottom: 92px;

                        }



                        .collection-filter__wrapper {

                            flex: unset;

                            width: 50%;

                            flex: unset;

                            justify-content: flex-end;

                            margin-right: 3px;

                            order: 1;

                        }



                        .collection-filter__item-label {

                            font-size: var(--breadcrumbFontSizeTablet, 1rem);

                        }



                        .collection-filter__dropdown {

                            font-size: var(--breadcrumbFontSizeTablet, 1rem);

                            height: 40px;

                            width: 140px;

                            border-radius: 10px;

                            background-size: 20px;

                        }



                        .collection-page__filter-wrapper {

                            width: 300px;

                            margin-right: 0;

                            position: fixed;

                            right: calc(100%);

                            top: 0;

                            height: 100%;

                            z-index: 10;

                            background: #fff;

                        }



                        body.collection-facets--opened .collection-facets__overlay {

                            opacity: 1;

                            visibility: visible;

                            background: rgba(0, 0, 0, 0.6);

                            transition: all .3s linear;

                        }



                        body.collection-facets--opened .collection-page__filter-wrapper {

                            transition: ease-in-out all .2s;

                            transform: translate(100%, 0%);

                        }



                        .collection-description__text,

                        .collection-description__text * {

                            font-size: 12px;

                        }



                        body .collection-banner .collection-page__title {

                            font-size: 24px;

                        }



                        .collection-page__content {

                            width: 100%;

                        }

                    }



                    @media (max-width: 767px) {

                        body .collection-banner .collection-page__title {

                            font-size: 16px;

                        }



                        .products-amount-span {

                            font-size: 10px;

                            margin-right: 18px;

                        }



                        .collection-page__breadcrumb-wrapper {

                            margin-top: 22px;

                            margin: 23px auto 0px;

                        }



                        .collection-filter__wrapper {

                            width: 60%;

                            align-items: center;

                            margin-right: 0px;

                        }



                        body .collection-page__wrapper {

                            width: 100%;

                            padding: 4px 20px;

                        }



                        .collection-filter__item-label {

                            font-size: 10px;

                        }



                        .collection-filter__dropdown {

                            font-size: 10px;

                            padding: 0px 7px;

                            width: 150px;

                            height: 23px;

                            width: 100px;

                            background-size: 10px;

                            border-radius: 5px;

                        }



                        .collection__filter-icon-wrapper {

                            display: flex;

                            align-items: center;

                            gap: 12px;

                            margin-bottom: 45px;

                        }



                        .collection-template-wrapper .product-card__grid-item-image-wrapper {

                            padding-top: 123.8%;

                        }



                        body .product-card__item-title-wrapper .product-card__item-title {

                            margin-top: 7px;

                        }



                        .collection-description__text,

                        .collection-description__text * {

                            font-size: 10px;

                        }



                        .collection-template-wrapper .breadcrumbs {

                            line-height: 12px;

                        }



                        .collection-page__grid-products.grid-uniform--sm1 {

                            gap: 30px 3%;

                            justify-content: center;

                        }



                        .collection-page__grid-products.grid-uniform--sm2 {

                            gap: 30px 3%;

                        }

                    }

                </style>

                <div class="collection-template-wrapper">

                    <!-- start custom-collection-banner.liquid (SNIPPET) -->

                    <div class="collection-banner-wrapper">







                        {{-- <div class="collection-banner__header-group">

                            <h2 class="collection-banner__title">Productsa</h2>

                        </div> --}}

                    </div>

                    <style>

                        @media (min-width: 1281px) {

                            .collection-banner-wrapper {

                                max-height: 450px;

                                overflow: hidden;

                            }



                            body #shopify-section-template--16192518488223__main .collection-description__text.see-more.see-more:not(.collection-description__text--opened) {

                                padding: 0;

                            }



                            .collection-page__title,

                            .collection-description {

                                max-width: 1220px;

                                margin: 0 auto;

                                padding: 0 20px;

                            }

                        }



                        h2.title {

                            color: #ffffff;

                            font-size: 32px;

                        }



                        .subtitle {

                            color: #ffffff;

                        }



                        .collection-banner {

                            position: relative;

                            height: 0;

                            overflow: hidden;

                            padding-top: 29%;

                            width: 100%;

                        }



                        .collection-banner__image {

                            width: 100%;

                            position: absolute;

                            top: 0;

                            left: 0;

                            height: 100%;

                            object-fit: cover;

                        }



                        .collection-page__title-wrapper {

                            position: absolute;

                            width: 100%;

                            height: 100%;

                            top: 0;

                            left: 0;

                            display: flex;

                            align-items: center;

                            justify-content: center;

                            flex-direction: column;

                            gap: 10px;

                            padding: 0 20px;

                        }



                        body .collection-page__title {

                            color: #FFF;

                            text-align: center;

                        }



                        @media (max-width: 1019px) {

                            .collection-banner {

                                padding-top: 37.386%;

                            }



                            .collection-page__title {

                                color: #FFF;

                            }

                        }



                        @media (max-width: 767px) {

                            .collection-banner-wrapper {

                                flex-wrap: wrap;

                            }



                            .collection-banner {

                                padding-top: 44.8%;

                            }

                        }

                    </style>

                    <div class="collection-page__breadcrumb-wrapper wrapper"><!-- start breadcrumb.liquid (SNIPPET) -->

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



                            <span class="breadcrumbs__item">Products</span>

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

                        <div class="collection__filter-icon-wrapper"><!-- start breadcrumb-product-count (SNIPPET) -->

                            <div class="products-amount">

                                <span class="products-amount-span">

                                    Showing



                                    <span class="product-count__initial-quantity">



                                        {{ $products->count() > 0 ? 1 : 0 }}



                                    </span> -

                                    <span class="product-count__final-quantity">







                                        {{ $products->count() }}



                                    </span> of



                                    <span class="product-count__total-quantity">

                                        {{ $products->count() }}





                                        items



                                    </span>

                                </span>

                            </div>



                            <style>

                                .products-amount {

                                    line-height: 1;

                                    font-size: var(--breadcrumbFontSize, 1rem);

                                    font-weight: 500;

                                }



                                @media (max-width: 1019px) {

                                    .products-amount {

                                        font-size: var(--breadcrumbFontSizeTablet, 1rem);

                                    }

                                }



                                @media (max-width: 767px) {

                                    .products-amount {

                                        font-size: var(--breadcrumbFontSizeMobile, 1rem);

                                    }

                                }

                            </style>

                        </div>



                        <div class="collection-filter__wrapper"><!-- start collection-filter.liquid (SNIPPET) -->

                            <input type="hidden" name="filter.v.availability" value="1">

                            <input type="hidden" name="filter.v.price.gte" value="">

                            <input type="hidden" name="filter.v.price.lte" value="">

                            <div class="content-collection below filter-width sticky">

                                <div>

                                    <div>

                                        <span class="collection-filter__item-label filter">Sort By</span>



                                        <select aria-label="SortBy" id="filter-by"

                                            class="collection-filter__dropdown sort-by filter-select">

                                            <option value="featured">

                                                Featured

                                            </option>

                                            <option value="bestSelling">

                                                Best Selling

                                            </option>

                                            <option value="ascending" selected>

                                                Alphabetically, A-Z

                                            </option>

                                            <option value="descending">

                                                Alphabetically, Z-A

                                            </option>

                                            <option value="priceAscending">

                                                Price, low to high

                                            </option>

                                            <option value="priceDescending">

                                                Price, high to low

                                            </option>

                                            <option value="dateAscending">

                                                Date, old to new

                                            </option>

                                            <option value="dateDescending">

                                                Date, new to old

                                            </option>

                                        </select>

                                    </div>

                                </div>

                            </div><!-- start collection-filter-icon.liquid (SNIPPET) -->

                            <div class="collection-facets__icon-container">

                                <span class="collection-facets__icon">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"

                                        viewBox="0 0 24 25" fill="none">

                                        <path d="M5 7.60419H19" stroke="black" stroke-width="2"

                                            stroke-linecap="round" />

                                        <path d="M5 12.5H15" stroke="black" stroke-width="2" stroke-linecap="round" />

                                        <path d="M5 17.3958H11" stroke="black" stroke-width="2"

                                            stroke-linecap="round" />

                                    </svg>



                                </span>

                            </div>



                            <style scope>

                                .collection-facets__icon,

                                .collection-facets__icon-container {

                                    display: none;

                                }



                                @media (max-width: 1019px) {

                                    .collection-facets__icon-container {

                                        display: block;

                                    }



                                    .collection-facets__icon {

                                        width: 85px;

                                        height: 39px;

                                        border-radius: 10px;

                                        background: #F1F1F1;

                                        display: flex;

                                        align-items: center;

                                        justify-content: center;

                                    }



                                    .collection-facets__item-fieldset-icon {

                                        display: flex;

                                        align-items: center;

                                        gap: 5px;

                                        border: none;

                                        order: 1;

                                        flex-wrap: wrap;

                                    }

                                }



                                @media (max-width: 767px) {

                                    .collection-facets__icon {

                                        width: 42px;

                                        height: 22px;

                                        border-radius: 5px;

                                    }



                                    .collection-facets__icon svg {

                                        width: 13px;

                                        height: 13px;

                                    }

                                }

                            </style>

                        </div>

                    </div>

                    <div class="collection-facets__overlay"></div>



                    <div class="collection-page__wrapper wrapper">



                        <div class="collection-page__filter-wrapper"><!-- start collection-facets.liquid (SNIPPET) -->











                            <div class="collection-facets__wrapper">

                                <h2 class="collection-facets__title no-desktop">Filter</h2>



                                <div class="collection-facets__scroll">









                                    <details open class="collection-facets__item collection-facets__item--list">

                                        <summary class="collection-facets__item-summary">

                                            <span class="collection-facets__item-title">Availability

                                            </span>

                                        </summary>

                                        <div class="collection-facets__item-values">

                                            <fieldset class="collection-facets__item-fieldset">

                                                <label class="collection-facets__item-value">

                                                    <input type="checkbox" id="inStock"

                                                        class="collection-facets__item-option" value="1">

                                                    <span class="collection-facets__item-label">In stock</span>

                                                </label><label class="collection-facets__item-value">

                                                    <input type="checkbox" id="outStock"

                                                        class="collection-facets__item-option" value="0">

                                                    <span class="collection-facets__item-label">Out of stock</span>

                                                </label>

                                            </fieldset>

                                        </div>

                                    </details>

                                    <div class="filter-line"></div>





                                    <details open class="collection-facets__item collection-facets__item--price-range">

                                        <summary class="collection-facets__item-summary">

                                            <span class="collection-facets__item-title">Price

                                            </span>

                                        </summary>

                                        <div class="collection-facets__item-values">

                                            <fieldset class="collection-facets__item-fieldset">

                                                <div class="collection-facets__item-box-wrapper">

                                                    <div class="collection-facets__sliders-control">

                                                        <div class="range-slider-track"></div>

                                                        <input type="range" id="slider-1" step="1"

                                                            min="0" max="19898" value=4974>

                                                        <input type="range" id="slider-2" step="1"

                                                            min="0" max="19898" value=15306>

                                                    </div>

                                                    <label class="collection-facets__item-box">

                                                        Min

                                                        <input id="minPrice" type="number" min="0"

                                                            name="filter.v.price.gte" placeholder="0"

                                                            class="collection-facets__item-input price-range-min">

                                                    </label>

                                                    <label class="collection-facets__item-box">

                                                        Max

                                                        <input id="maxPrice" type="number"

                                                            name="filter.v.price.lte"

                                                            class="collection-facets__item-input price-range-max"

                                                            placeholder="999">

                                                    </label>

                                                </div>



                                                <button id="applyPrice"

                                                    class="collection-facets__item-button">Apply</button>

                                            </fieldset>

                                        </div>

                                    </details>

                                    <div class="filter-line"></div>

                                    <details open

                                        class="collection-facets__item collection-facets__item--list item--list--color">

                                        <summary class="collection-facets__item-summary">

                                            <span class="collection-facets__item-title">Color

                                            </span>

                                        </summary>



                                        <div class="collection-facets__item-values">

                                            <fieldset class="collection-facets__item-fieldset item-fieldset--color">

                                                @foreach ($colors as $color)

                                                    <div>

                                                        <label class="collection-facets__item-value">

                                                            <input id="colorBox" type="checkbox"

                                                                class="collection-facets__item-option"

                                                                value="{{ $color->name }}"

                                                                name="filter.v.option.color" style="display: none;">

                                                            <span class="collection-facets__item-label--color"

                                                                style="background-image: url('/storage/color/{{ $color->image }}');

                                                        background-color: {{ $color->name }};"></span>

                                                        </label>

                                                    </div>

                                                @endforeach





                                            </fieldset>

                                        </div>

                                    </details>





                                </div>

                            </div>



                            <style scope>

                                .collection-facets__item-summary {

                                    appearance: auto;

                                    -webkit-appearance: auto;

                                    padding: 22px 0 21px;

                                }



                                .collection-facets__item-summary::-webkit-details-marker {

                                    display: none;

                                }



                                .filter-line {

                                    width: 74%;

                                    height: 1px;

                                    background: #DEE2E6;

                                    margin-left: 6px;

                                }



                                .collection-facets__item-title {

                                    font-weight: bold;

                                    font-size: 20px;

                                    letter-spacing: 0.6px;

                                    cursor: pointer;

                                    position: relative;

                                    width: 100%;

                                    display: block;

                                    color: #4B4B4B;

                                }



                                span.collection-facets__item-title::after {

                                    content: '';

                                    position: absolute;

                                    left: 169px;

                                    width: 14px;

                                    height: 2px;

                                    background-color: #D9D9D9;

                                    top: 12px;

                                    transition: ease all .6s;

                                }



                                .item--list--color span.collection-facets__item-title::after {

                                    content: none;

                                }



                                .item--list--quantity span.collection-facets__item-title::after {

                                    content: none;

                                }



                                span.collection-facets__item-title::before {

                                    content: '';

                                    position: absolute;

                                    left: 175px;

                                    height: 14px;

                                    width: 2px;

                                    background-color: #D9D9D9;

                                    top: 6px;

                                    transition: ease all .6s;

                                }



                                .item--list--color span.collection-facets__item-title::before {

                                    content: none;

                                }



                                .item--list--quantity span.collection-facets__item-title::before {

                                    content: none;

                                }



                                .collection-facets__item-values {

                                    margin: 0 auto 10px;

                                }



                                details[open] span.collection-facets__item-title::after {

                                    transform: none;

                                }



                                details[open] span.collection-facets__item-title::before {

                                    transform: rotate(-90deg);

                                    transition: ease all .6s;

                                }



                                details[open] summary~* {

                                    animation: sweep .5s ease-in-out;

                                }



                                @keyframes sweep {

                                    0% {

                                        opacity: 0;

                                        transform: translateY(-10px)

                                    }



                                    100% {

                                        opacity: 1;

                                        transform: translateX(0)

                                    }

                                }



                                .collection-facets__item-fieldset {

                                    border: none;

                                    position: relative;

                                }



                                .collection-facets__item-fieldset.item-fieldset--color {

                                    display: flex;

                                    gap: 7.24px;

                                    flex-wrap: wrap;

                                }



                                .collection-facets__item-fieldset.item-fieldset--quantity {

                                    display: flex;

                                    gap: 0px 11px;

                                    flex-wrap: wrap;

                                }



                                .collection-facets__item-fieldset--variation {

                                    display: flex;

                                    align-items: center;

                                    flex-wrap: wrap;

                                    gap: 4px;

                                    margin-top: -1px;

                                }



                                .collection-facets__item-label {

                                    font-size: 15px;

                                    word-break: break-word;

                                }



                                .collection-facets__item-label--quantity {

                                    width: 50.207px;

                                    height: 50.207px;

                                    border-radius: 50%;

                                    border: 1px solid #A8A8A8;

                                    padding: 14px 0;

                                    text-align: center;

                                    font-size: 19.525px;

                                    line-height: 1;

                                    Color: #555;

                                    background: #ffffff;

                                }



                                .collection-facets__item-label--color {

                                    width: 38.742px;

                                    height: 38.742px;

                                    border-radius: 50%;

                                    border: 1px solid #A8A8A8;

                                }



                                .collection-facets__item-option:checked+span {

                                    filter: brightness(70%);

                                }



                                .collection-facets__item-option:checked+.collection-facets__item-label--quantity {

                                    color: #ccc;

                                    background: #000;

                                }



                                .collection-facets__item--variation {

                                    padding: 6px;

                                    border: 1px solid #4b4b4b99;

                                    border-radius: 5.74px;

                                    letter-spacing: 0.1px;

                                }



                                .collection-facets__item-option:checked+.collection-facets__item--variation {

                                    background-color: #565656;

                                    color: #ffffff99;

                                }



                                .collection-facets__item-value {

                                    display: flex;

                                    align-items: center;

                                    line-height: 1.2;

                                    cursor: pointer;

                                    margin-bottom: 1px;

                                }



                                .collection-facets__item-value input[type='checkbox'] {

                                    min-width: 15px;

                                    min-height: 15px;

                                    margin: 0;

                                    margin-right: 6px;

                                }



                                .collection-facets__item-value:not(:last-child) {

                                    margin-bottom: 11px;

                                    margin-top: 1px;

                                }



                                .collection-facets__item-fieldset--variation .collection-facets__item-value {

                                    margin-bottom: 0;

                                }



                                .collection-facets__item-box-wrapper {

                                    display: flex;

                                    justify-content: flex-start;

                                    flex-wrap: wrap;

                                }



                                .collection-facets__sliders-control {

                                    width: 82.3%;

                                    position: relative;

                                    margin: 9px 0 24px;

                                }



                                input[type="range"] {

                                    position: absolute;

                                    pointer-events: none;

                                    -webkit-appearance: none;

                                    -moz-appearance: none;

                                    appearance: none;

                                    outline: none;

                                    z-index: 2;

                                    height: 5px;

                                    width: 100%;

                                    background-color: transparent;

                                }



                                .range-slider-track {

                                    width: 100%;

                                    height: 2px;

                                    position: absolute;

                                    background: linear-gradient(to right, #E3E3E3 25%, #A3A3A3 25%, #A3A3A3 75%, #E3E3E3 75%);

                                }



                                input[type="range"]::-webkit-slider-runnable-track {

                                    -webkit-appearance: none;

                                    -moz-appearance: none;

                                    appearance: none;

                                    height: 5px;

                                }



                                input[type="range"]::-webkit-slider-thumb {

                                    -webkit-appearance: none;

                                    -moz-appearance: none;

                                    appearance: none;

                                    height: 18px;

                                    width: 18px;

                                    background-color: #FFFFFF;

                                    cursor: pointer;

                                    pointer-events: auto;

                                    transform: translateY(-7px);

                                    border-radius: 50%;

                                    box-shadow: 0px 0px 2px #000;

                                }



                                input[type="range"]:active::-webkit-slider-thumb {

                                    border: 2px solid #E3E3E3;

                                }



                                .collection-facets__item-box {

                                    font-size: 14px;

                                    display: inline-block;

                                    width: 41%;

                                    position: relative;

                                }



                                .collection-facets__item-input {

                                    width: 91%;

                                    height: 30px;

                                    border: 1px solid #595959;

                                    padding: 6px 5px 5px 9.6px;

                                    cursor: pointer;

                                    font-size: 0.8rem;

                                    border-radius: 6px;

                                    margin-top: 7px;

                                }



                                .collection-facets__item-input::placeholder {

                                    color: #595959;

                                    font-size: 14px;

                                }



                                .collection-facets__item-button {

                                    background: transparent;

                                    border: 1px solid #595959;

                                    width: 78%;

                                    height: 31px;

                                    border-radius: 4px;

                                    padding: 0 10px;

                                    margin-top: 10px;

                                    font-size: 14px;

                                }



                                .collection-facets__overlay {

                                    position: fixed;

                                    top: 0;

                                    left: 0;

                                    width: 100%;

                                    height: 100%;

                                    opacity: 0;

                                    visibility: hidden;

                                    background: transparent;

                                    z-index: 10;

                                }



                                .collection-facets__item .collection-facets__item--price-range {

                                    margin-top: 10px;

                                }



                                @media (max-width: 1019px) {

                                    .collection-facets__wrapper {

                                        position: relative;

                                        height: 100%;

                                    }



                                    .collection-facets__scroll {

                                        padding: 10px 20px 60px;

                                        overflow-y: auto;

                                        height: 100%;

                                    }



                                    .collection-facets__title {

                                        padding: 10px 20px 10px;

                                    }



                                    .collection-facets__item-title {

                                        font-size: 18px;

                                    }



                                    .collection-facets__item-value input[type='checkbox'] {

                                        min-width: 16px;

                                        min-height: 16px;

                                        margin-right: 10px;

                                    }



                                    .collection-facets__item-label {

                                        font-size: 16px;

                                    }



                                    .filter-line {

                                        width: 100%;

                                        height: 1px;

                                        background: #DEE2E6;

                                        margin-left: 6px;

                                    }



                                    span.collection-facets__item-title::before {

                                        left: 247px;

                                    }



                                    span.collection-facets__item-title::after {

                                        left: 240px;

                                    }



                                    .template-collection .collection-facets__item--price-range .collection-facets__item-box-wrapper {

                                        width: 250px;

                                    }



                                    .template-collection .collection-facets__item--price-range .collection-facets__item-box {

                                        width: 100px;

                                    }



                                    .template-collection .collection-facets__item--price-range .collection-facets__item-button {

                                        width: 193px;

                                    }

                                }



                                @media (max-width: 767px) {

                                    .collection-facets__item-title {

                                        font-size: 16px;

                                    }



                                    .collection-facets__item-value input[type='checkbox'] {

                                        min-width: 14px;

                                        min-height: 14px;

                                    }



                                    .collection-facets__item-label {

                                        font-size: 14px;

                                    }



                                    .filter-line {

                                        width: 100%;

                                        height: 1px;

                                        background: #DEE2E6;

                                        margin-left: 6px;

                                    }



                                    span.collection-facets__item-title::before {

                                        left: 236px;

                                    }



                                    span.collection-facets__item-title::after {

                                        left: 230px;

                                    }



                                    .template-collection .collection-facets__item--price-range .collection-facets__item-box-wrapper {

                                        width: 250px;

                                    }



                                    .template-collection .collection-facets__item--price-range .collection-facets__item-box {

                                        width: 100px;

                                    }



                                    .template-collection .collection-facets__item--price-range .collection-facets__item-button {

                                        width: 193px;

                                    }

                                }

                            </style>



                            <script type="lazyload_int">

 let inputSliderOne = document.getElementById("slider-1");

 let inputSliderTwo = document.getElementById("slider-2");



 const inputMin = document.querySelector(".collection-facets__item-input.price-range-min");

 const inputMax = document.querySelector(".collection-facets__item-input.price-range-max");

 

 let minGap = 19898 / 10;



 let sliderTrack = document.querySelector(".range-slider-track");

 let sliderMaxValue = document.getElementById("slider-1").max;

 

 function slideOne(){

 if(parseInt(inputSliderTwo.value) - parseInt(inputSliderOne.value) <= minGap){

 inputSliderOne.value = parseInt(inputSliderTwo.value) - minGap;

 }

 inputMin.value = Math.ceil(inputSliderOne.value / 100);

 fillColor();

 }



 function slideTwo(){



 if(parseInt(inputSliderTwo.value) - parseInt(inputSliderOne.value) <= minGap){

 inputSliderTwo.value = parseInt(inputSliderOne.value) + minGap;

 }

 inputMax.value = Math.ceil(inputSliderTwo.value / 100);

 fillColor();

 }



 function fillColor(){

 percent1 = (inputSliderOne.value / sliderMaxValue) * 100;

 percent2 = (inputSliderTwo.value / sliderMaxValue) * 100;

 sliderTrack.style.background = `linear-gradient(to right, #E3E3E3 ${percent1}% , #A3A3A3 ${percent1}% , #A3A3A3 ${percent2}%, #E3E3E3 ${percent2}%)`;

 }



 inputSliderOne.addEventListener("input", slideOne);

 inputSliderTwo.addEventListener("input", slideTwo);

</script>

                        </div>





                        <div class="collection-page__content">

                            <!-- snippet/collection-items -->

                            <div class="collection-page">

                                <div id="collection-page-content"

                                    class="collection-page__grid-products grid-uniform grid-uniform--s3 grid-uniform--st2 grid-uniform--sm2">

                                    <!-- start product-card.liquid (SNIPPET) -->

                                    @include('products-only')


<div class="pr-lnmk">
                                       {{ $products->links() }}
                                   </div>

                                    <div class="collection-page__loading-more-wrapper">

                                        <div class="loading-more__progress-wrapper">

<style type="text/css">
    .pr-lnmk{width: 100%;}
.pr-lnmk    .py-2{padding-bottom: .3rem !important;padding-top: .3rem !important;}
    nav[role="navigation"] {width:100%; align-items: flex-end;gap: 15px;}

    nav[role="navigation"] svg{width: 20px;margin-bottom: 8px}
.product-grid-item-image img{display: none}
    .product-grid-item-image img:first-child{display: block;}
}
</style>



                                            <!--a href="#" title="Load More" class="collection-page__loading-more"

                                                data-pages="6">

                                                Load More

                                            </a-->

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









            </section>

            <div id="shopify-section-template--16192518488223__91f5d349-2980-4863-bcdc-b6650a50f5e3"

                class="shopify-section accordion-text__section"><!-- section/custom-accordion-text -->

                <style>

                    .accordion-text__section {

                        position: relative;

                        padding: 27px 0 19.5px;

                    }



                    .accordion-text__wrapper {

                        max-width: 1200px;

                        margin: 0 auto;

                        padding: 0 176px;

                    }



                    .accordion-text__title {

                        font-size: calc(30px + (36 - 30) * ((100vw - 768px) / (1440 - 768)));

                        padding: 0px 0px 0 0px;

                        margin-bottom: 36px;

                        color: #252525;

                    }



                    .accordion-text__section:not(.accordion-text__content--opened) .accordion-text__content {

                        overflow: hidden;

                        max-height: 93px;

                    }



                    .accordion-text__section:not(.accordion-text__content--opened):after,

                    .accordion-text__button-wrapper {

                        position: absolute;

                        left: 0;

                    }



                    .accordion-text__section:not(.accordion-text__content--opened):after {

                        content: '';

                        bottom: 0;

                        display: block;

                        width: 100%;

                        height: 100%;

                        background: linear-gradient(180deg, transparent, transparent, transparent, #f0f0f0, #e3e3e3, #d8d8d8);

                        pointer-events: none;

                    }



                    .accordion-text__content p {

                        font-size: calc(18px + (19 - 18) * ((100vw - 768px) / (1440 - 768)));

                        letter-spacing: 0.66px;

                        margin-bottom: 1rem;

                        color: #252525;

                    }



                    .accordion-text__button-wrapper {

                        width: 100%;

                        bottom: 60px;

                        text-align: center;

                        z-index: 1;

                    }



                    .accordion-text__button {

                        text-transform: uppercase;

                        text-decoration: underline;

                        font-size: calc(21px + (20 - 21) * ((100vw - 768px) / (1440 - 768)));

                        cursor: pointer;

                        color: #555;

                    }



                    .accordion-text__section.accordion-text__content--opened .accordion-text__button-wrapper {

                        position: static;

                    }



                    /* Responsive: Tablet */

                    @media (max-width: 1019px) {

                        .accordion-text__section {

                            padding: 15px 0 20px;

                        }



                        .accordion-text__wrapper {

                            max-width: 700px;

                            margin: 0 auto;

                            padding: 0 56px;

                        }



                        .accordion-text__content p {

                            letter-spacing: 0.2px;

                        }



                        .accordion-text__section:not(.accordion-text__content--opened) .accordion-text__content {

                            max-height: 88px;

                        }



                        .accordion-text__button-wrapper {

                            bottom: 112px;

                        }



                        .accordion-text__title {

                            letter-spacing: 0.3px;

                            margin-bottom: 40px;

                        }



                        .accordion-text__button {

                            letter-spacing: -0.4px;

                        }

                    }



                    /* End Responsive: Tablet */

                    /* Responsive: Mobile */

                    @media (max-width: 767px) {

                        .accordion-text__section {

                            padding: 9px 0;

                        }



                        .accordion-text__title {

                            letter-spacing: 0.1px;

                            line-height: 1;

                            font-size: 18px;

                            margin-bottom: 16px;

                        }



                        .accordion-text__content {

                            padding: 0 5px;

                        }



                        .accordion-text__section:not(.accordion-text__content--opened) .accordion-text__content {

                            max-height: 68px;

                        }



                        .accordion-text__content p {

                            font-size: 14px;

                            line-height: 1.2;

                            letter-spacing: 0.2px;

                            margin-bottom: 1rem;

                            padding: 2px 3px;

                        }



                        .accordion-text__button-wrapper {

                            bottom: 30px;

                        }



                        .accordion-text__button {

                            font-size: 14.3px;

                            letter-spacing: 0;

                        }



                        .accordion-text__wrapper {

                            max-width: 700px;

                            margin: 0 auto;

                            padding: 0 0px;

                        }

                    }



                    /* End Responsive: Mobile */

                </style>

                <div class="accordion-text">

                    <div class="wrapper">

                        <div class="accordion-text__wrapper">

                            <h2 class="section-title accordion-text__title">{{ $title }}</h2>

                            <div class="accordion-text__content">

                                <p>Tale of Roses, your perfect ally to transform any occasion into a memorable

                                    experience.<br />Turn

                                    your feelings into artistic expressions that leave indelible traces, creating a

                                    powerful impact in the

                                    memory of those who receive them.<br />Elevate your celebrations to a new level and

                                    surprise your

                                    loved ones.</p>

                            </div>

                            <div class="accordion-text__button-wrapper">

                                <span class="accordion-text__button">See More</span>

                            </div>

                        </div>

                    </div>

                </div>

                <script type="lazyload_int">

 (function($){

 const $section = $('#shopify-section-template--16192518488223__91f5d349-2980-4863-bcdc-b6650a50f5e3');

 const button ={

 $el: $('.accordion-text__button', $section),

 labels:{

 normal:"See More",

 active:"See Less"}

 };



 button.$el.click(function(e){

 e.preventDefault();



 const isOpened = $section

 .toggleClass('accordion-text__content--opened')

 .hasClass('accordion-text__content--opened');

 

 if (isOpened){

 $(this).html(button.labels.active);

 }else{

 $(this).html(button.labels.normal);

 }

 });

 })(jQuery);

</script>



            </div>

            <limespot></limespot>

        </section>





    </main>



</x-layout>

