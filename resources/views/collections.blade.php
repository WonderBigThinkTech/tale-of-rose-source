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



                        <div class="collection-banner__header-group">
                            <h2 class="collection-banner__title">Products</h2>
                        </div>
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

                                        1

                                    </span> -
                                    <span class="product-count__final-quantity">



                                        12

                                    </span> of

                                    <span class="product-count__total-quantity">
                                        160


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
                                <div class="collection-filter">
                                    <div class="collection-filter__item filter-by-order">
                                        <span class="collection-filter__item-label filter">Sort By</span>

                                        <select aria-label="SortBy" id="filter-sort-by"
                                            class="collection-filter__dropdown sort-by filter-select">
                                            <option value="manual">
                                                Featured
                                            </option>
                                            <option value="best-selling">
                                                Best Selling
                                            </option>
                                            <option value="title-ascending" selected>
                                                Alphabetically, A-Z
                                            </option>
                                            <option value="title-descending">
                                                Alphabetically, Z-A
                                            </option>
                                            <option value="price-ascending">
                                                Price, low to high
                                            </option>
                                            <option value="price-descending">
                                                Price, high to low
                                            </option>
                                            <option value="created-ascending">
                                                Date, old to new
                                            </option>
                                            <option value="created-descending">
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
                                            <fieldset class="collection-facets__item-fieldset"><label
                                                    class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="1" name="filter.v.availability">
                                                    <span class="collection-facets__item-label">In stock</span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="0" name="filter.v.availability">
                                                    <span class="collection-facets__item-label">Out of stock</span>
                                                </label></fieldset>
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
                                                        <input type="number" min="0"
                                                            name="filter.v.price.gte" placeholder="0"
                                                            class="collection-facets__item-input price-range-min">
                                                    </label>
                                                    <label class="collection-facets__item-box">
                                                        Max
                                                        <input type="number" name="filter.v.price.lte"
                                                            class="collection-facets__item-input price-range-max"
                                                            placeholder="999">
                                                    </label>
                                                </div>

                                                <button class="collection-facets__item-button">Apply</button>
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
                                                <label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="BLACK-01" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/black-01_120x.jpg?v=11907842344993096817');background-color: BLACK-01;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="BLACK-02" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/black-02_120x.jpg?15965');background-color: BLACK-02;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="BLUE-03" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/blue-03_120x.jpg?v=10051990101564860415');background-color: BLUE-03;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="BLUE-89" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/blue-89_120x.jpg?v=16894482816632867203');background-color: BLUE-89;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="green" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/green_120x.jpg?15965');background-color: green;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="Green" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/green_120x.jpg?15965');background-color: Green;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="GREY-02" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/grey-02_120x.jpg?15965');background-color: GREY-02;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="PEACH-99" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/peach-99_120x.jpg?v=8573711465553814149');background-color: PEACH-99;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="PINK - 07" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/pink-07_120x.jpg?v=2016015964140402161');background-color: PINK - 07;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="PINK-04" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/pink-04_120x.jpg?v=1551390352756595083');background-color: PINK-04;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="PINK-07" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/pink-07_120x.jpg?v=2016015964140402161');background-color: PINK-07;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="PINK-7" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/pink-7_120x.jpg?15965');background-color: PINK-7;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="PINK-99" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/pink-99_120x.jpg?v=14959951627522068371');background-color: PINK-99;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="PURPLE - 02" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/purple-02_120x.jpg?v=17665319176611277479');background-color: PURPLE - 02;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="PURPLE-02" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/purple-02_120x.jpg?v=17665319176611277479');background-color: PURPLE-02;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="PURPLE-03" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/purple-03_120x.jpg?15965');background-color: PURPLE-03;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="Red" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/red_120x.jpg?15965');background-color: Red;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="red" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/red_120x.jpg?15965');background-color: red;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="RED - 02" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/red-02_120x.jpg?v=16868146362269051666');background-color: RED - 02;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="RED-01" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/red-01_120x.jpg?v=2114152004054360806');background-color: RED-01;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="RED-02" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/red-02_120x.jpg?v=16868146362269051666');background-color: RED-02;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="RED-04" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/red-04_120x.jpg?15965');background-color: RED-04;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="VIOLET-02" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/violet-02_120x.jpg?15965');background-color: VIOLET-02;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="VIOLET-03" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/violet-03_120x.jpg?v=5708503433855562116');background-color: VIOLET-03;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="VIOLET-3" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/violet-3_120x.jpg?15965');background-color: VIOLET-3;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="WHITE-0" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/white-0_120x.jpg?15965');background-color: WHITE-0;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="WHITE-01" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/white-01_120x.jpg?v=8997432700479897980');background-color: WHITE-01;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="WHITE-02" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/white-02_120x.jpg?15965');background-color: WHITE-02;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="WHITE-04" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/white-04_120x.jpg?v=8756044933232727488');background-color: WHITE-04;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="YELLO2-02" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/yello2-02_120x.jpg?15965');background-color: YELLO2-02;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="YELLOW - 02" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/yellow-02_120x.jpg?v=2757630889365198667');background-color: YELLOW - 02;"></span>
                                                </label><label class="collection-facets__item-value">
                                                    <input type="checkbox" class="collection-facets__item-option"
                                                        value="YELLOW-02" name="filter.v.option.color"
                                                        style="display: none;">
                                                    <span class="collection-facets__item-label--color"
                                                        style="background-image: url('//speakingroses.com/cdn/shop/files/yellow-02_120x.jpg?v=2757630889365198667');background-color: YELLOW-02;"></span>
                                                </label>
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
                                    <input type="hidden" value="160"
                                        class="product-count__all-collection-items"><!-- start product-card.liquid (SNIPPET) -->
                                    <div class="product-card__grid-item">

                                        <div class="product-card__grid-item-fullsize">
                                            <div title="RED-02" class="product-card__grid-item-link">
                                                <div class="product-card__grid-item-image-wrapper">
                                                    <a href="/collections/all/products/another-year-of-love-acrylic-round-box-1-preserved-stem?variant=45873008214175"
                                                        class="grid__item_image-link"><!-- start responsive-image.liquid (SNIPPET) -->


                                                        <img id="784571288"
                                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAABhGlDQ1BJQ0MgcHJvZmlsZQAAKJF9kT1Iw0AcxV9Ta0UqDkYQcchQnSyIijhqFYpQIdQKrTqYXPohNGlIUlwcBdeCgx+LVQcXZ10dXAVB8APE0clJ0UVK/F9SaBHrwXE/3t173L0DhFqJ6XbHGKAbjpVKxKVMdkUKvyKETojoh6gw25yV5STajq97BPh6F+NZ7c/9OXq0nM2AgEQ8w0zLIV4nntp0TM77xCIrKhrxOfGoRRckfuS66vMb54LHAs8UrXRqjlgklgotrLYwK1o68SRxVNMNyhcyPmuctzjrpQpr3JO/MJIzlpe4TnMICSxgETIkqKhgAyU4iNFqkGIjRfvxNv5Bzy+TSyXXBhg55lGGDsXzg//B727t/MS4nxSJA6EX1/0YBsK7QL3qut/Hrls/AYLPwJXR9JdrwPQn6dWmFj0CereBi+umpu4BlzvAwJOpWIonBWkK+TzwfkbflAX6boHuVb+3xj5OH4A0dZW8AQ4OgZECZa+1eXdXa2//nmn09wMjG3KHDOS4EQAAAAlwSFlzAAAuIwAALiMBeKU/dgAAAAd0SU1FB+YFBhQWEhVMTaAAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAAADElEQVQI12O4f/8+AAU+Ap5GJPuHAAAAAElFTkSuQmCC"
                                                            data-src="//speakingroses.com/cdn/shop/files/Stems_PIN-99_Another_year_of_love__png_4eea2298-09ac-43a1-97ac-bee272954358.png?v=1720194931&width=50"
                                                            data-srcset="//speakingroses.com/cdn/shop/files/Stems_PIN-99_Another_year_of_love__png_4eea2298-09ac-43a1-97ac-bee272954358.png?v=1720194931&width=100 100w,//speakingroses.com/cdn/shop/files/Stems_PIN-99_Another_year_of_love__png_4eea2298-09ac-43a1-97ac-bee272954358.png?v=1720194931&width=153 153w,//speakingroses.com/cdn/shop/files/Stems_PIN-99_Another_year_of_love__png_4eea2298-09ac-43a1-97ac-bee272954358.png?v=1720194931&width=234 234w,//speakingroses.com/cdn/shop/files/Stems_PIN-99_Another_year_of_love__png_4eea2298-09ac-43a1-97ac-bee272954358.png?v=1720194931&width=358 358w,//speakingroses.com/cdn/shop/files/Stems_PIN-99_Another_year_of_love__png_4eea2298-09ac-43a1-97ac-bee272954358.png?v=1720194931&width=548 548w,"
                                                            sizes="(max-width: 479px) 480px, (max-width: 767px) 768px, (max-width: 1019px) 1020px, (max-width: 1279px) 1280px"
                                                            class="responsive-image grid__item-image one"
                                                            data-class="LazyLoad"
                                                            alt="Another Year Of Love - Acrylic Round Box (1 Preserved Stem)"
                                                            loading="lazy" width="400" height="400"></a>
                                                </div>

                                                <div class="product-card__product-info">
                                                    <h3 class="product-card__item-title">
                                                        <a href="/collections/all/products/another-year-of-love-acrylic-round-box-1-preserved-stem?variant=45873008214175"
                                                            class="product-card__item-title-link">Another Year Of Love
                                                            - Acrylic Round Box (1
                                                            Preserved Stem)</a>
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
                                                                class=money>$68.98</span></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <style scoped>
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
                                    <!-- start product-card.liquid (SNIPPET) -->
                                    <div class="product-card__grid-item">

                                        <div class="product-card__grid-item-fullsize">
                                            <div title="WHITE-01" class="product-card__grid-item-link">
                                                <div class="product-card__grid-item-image-wrapper">
                                                    <a href="/collections/all/products/another-year-of-love-acrylic-round-box-25-preserved-petals?variant=45818003619999"
                                                        class="grid__item_image-link"><!-- start responsive-image.liquid (SNIPPET) -->


                                                        <img id="786018453"
                                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAABhGlDQ1BJQ0MgcHJvZmlsZQAAKJF9kT1Iw0AcxV9Ta0UqDkYQcchQnSyIijhqFYpQIdQKrTqYXPohNGlIUlwcBdeCgx+LVQcXZ10dXAVB8APE0clJ0UVK/F9SaBHrwXE/3t173L0DhFqJ6XbHGKAbjpVKxKVMdkUKvyKETojoh6gw25yV5STajq97BPh6F+NZ7c/9OXq0nM2AgEQ8w0zLIV4nntp0TM77xCIrKhrxOfGoRRckfuS66vMb54LHAs8UrXRqjlgklgotrLYwK1o68SRxVNMNyhcyPmuctzjrpQpr3JO/MJIzlpe4TnMICSxgETIkqKhgAyU4iNFqkGIjRfvxNv5Bzy+TSyXXBhg55lGGDsXzg//B727t/MS4nxSJA6EX1/0YBsK7QL3qut/Hrls/AYLPwJXR9JdrwPQn6dWmFj0CereBi+umpu4BlzvAwJOpWIonBWkK+TzwfkbflAX6boHuVb+3xj5OH4A0dZW8AQ4OgZECZa+1eXdXa2//nmn09wMjG3KHDOS4EQAAAAlwSFlzAAAuIwAALiMBeKU/dgAAAAd0SU1FB+YFBhQWEhVMTaAAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAAADElEQVQI12O4f/8+AAU+Ap5GJPuHAAAAAElFTkSuQmCC"
                                                            data-src="//speakingroses.com/cdn/shop/files/Petals_PIN-07_Another_year_of_love__png_bea055b3-f8ba-460d-b82c-8f410ccece4d.png?v=1719580439&width=50"
                                                            data-srcset="//speakingroses.com/cdn/shop/files/Petals_PIN-07_Another_year_of_love__png_bea055b3-f8ba-460d-b82c-8f410ccece4d.png?v=1719580439&width=100 100w,//speakingroses.com/cdn/shop/files/Petals_PIN-07_Another_year_of_love__png_bea055b3-f8ba-460d-b82c-8f410ccece4d.png?v=1719580439&width=153 153w,//speakingroses.com/cdn/shop/files/Petals_PIN-07_Another_year_of_love__png_bea055b3-f8ba-460d-b82c-8f410ccece4d.png?v=1719580439&width=234 234w,//speakingroses.com/cdn/shop/files/Petals_PIN-07_Another_year_of_love__png_bea055b3-f8ba-460d-b82c-8f410ccece4d.png?v=1719580439&width=358 358w,//speakingroses.com/cdn/shop/files/Petals_PIN-07_Another_year_of_love__png_bea055b3-f8ba-460d-b82c-8f410ccece4d.png?v=1719580439&width=548 548w,"
                                                            sizes="(max-width: 479px) 480px, (max-width: 767px) 768px, (max-width: 1019px) 1020px, (max-width: 1279px) 1280px"
                                                            class="responsive-image grid__item-image one"
                                                            data-class="LazyLoad"
                                                            alt="Another year of love! - Acrylic Round Box (25 Preserved Petals)"
                                                            loading="lazy" width="400" height="400"></a>
                                                </div>

                                                <div class="product-card__product-info">
                                                    <h3 class="product-card__item-title">
                                                        <a href="/collections/all/products/another-year-of-love-acrylic-round-box-25-preserved-petals?variant=45818003619999"
                                                            class="product-card__item-title-link">Another year of love!
                                                            - Acrylic Round Box (25
                                                            Preserved Petals)</a>
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
                                                                class=money>$58.98</span></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <style scoped>
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
                                    <!-- start product-card.liquid (SNIPPET) -->
                                    <div class="product-card__grid-item">

                                        <div class="product-card__grid-item-fullsize">
                                            <div title="RED-01" class="product-card__grid-item-link">
                                                <div class="product-card__grid-item-image-wrapper">
                                                    <a href="/collections/all/products/another-year-of-love-acrylic-square-box-150-preserved-petals?variant=45908615594143"
                                                        class="grid__item_image-link"><!-- start responsive-image.liquid (SNIPPET) -->


                                                        <img id="787208755"
                                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAABhGlDQ1BJQ0MgcHJvZmlsZQAAKJF9kT1Iw0AcxV9Ta0UqDkYQcchQnSyIijhqFYpQIdQKrTqYXPohNGlIUlwcBdeCgx+LVQcXZ10dXAVB8APE0clJ0UVK/F9SaBHrwXE/3t173L0DhFqJ6XbHGKAbjpVKxKVMdkUKvyKETojoh6gw25yV5STajq97BPh6F+NZ7c/9OXq0nM2AgEQ8w0zLIV4nntp0TM77xCIrKhrxOfGoRRckfuS66vMb54LHAs8UrXRqjlgklgotrLYwK1o68SRxVNMNyhcyPmuctzjrpQpr3JO/MJIzlpe4TnMICSxgETIkqKhgAyU4iNFqkGIjRfvxNv5Bzy+TSyXXBhg55lGGDsXzg//B727t/MS4nxSJA6EX1/0YBsK7QL3qut/Hrls/AYLPwJXR9JdrwPQn6dWmFj0CereBi+umpu4BlzvAwJOpWIonBWkK+TzwfkbflAX6boHuVb+3xj5OH4A0dZW8AQ4OgZECZa+1eXdXa2//nmn09wMjG3KHDOS4EQAAAAlwSFlzAAAuIwAALiMBeKU/dgAAAAd0SU1FB+YFBhQWEhVMTaAAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAAADElEQVQI12O4f/8+AAU+Ap5GJPuHAAAAAElFTkSuQmCC"
                                                            data-src="//speakingroses.com/cdn/shop/files/Petals_PIN-07_Another_year_of_love__png_51b44fc8-66a5-47c1-a061-0bcc00f2a308.png?v=1721159617&width=50"
                                                            data-srcset="//speakingroses.com/cdn/shop/files/Petals_PIN-07_Another_year_of_love__png_51b44fc8-66a5-47c1-a061-0bcc00f2a308.png?v=1721159617&width=100 100w,//speakingroses.com/cdn/shop/files/Petals_PIN-07_Another_year_of_love__png_51b44fc8-66a5-47c1-a061-0bcc00f2a308.png?v=1721159617&width=153 153w,//speakingroses.com/cdn/shop/files/Petals_PIN-07_Another_year_of_love__png_51b44fc8-66a5-47c1-a061-0bcc00f2a308.png?v=1721159617&width=234 234w,//speakingroses.com/cdn/shop/files/Petals_PIN-07_Another_year_of_love__png_51b44fc8-66a5-47c1-a061-0bcc00f2a308.png?v=1721159617&width=358 358w,//speakingroses.com/cdn/shop/files/Petals_PIN-07_Another_year_of_love__png_51b44fc8-66a5-47c1-a061-0bcc00f2a308.png?v=1721159617&width=548 548w,"
                                                            sizes="(max-width: 479px) 480px, (max-width: 767px) 768px, (max-width: 1019px) 1020px, (max-width: 1279px) 1280px"
                                                            class="responsive-image grid__item-image one"
                                                            data-class="LazyLoad"
                                                            alt="Another year of love! - Acrylic Square Box (150 Preserved Petals)"
                                                            loading="lazy" width="400" height="400"></a>
                                                </div>

                                                <div class="product-card__product-info">
                                                    <h3 class="product-card__item-title">
                                                        <a href="/collections/all/products/another-year-of-love-acrylic-square-box-150-preserved-petals?variant=45908615594143"
                                                            class="product-card__item-title-link">Another year of love!
                                                            - Acrylic Square Box (150
                                                            Preserved Petals)</a>
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
                                                                class=money>$168.98</span></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <style scoped>
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
                                    <!-- start product-card.liquid (SNIPPET) -->
                                    <div class="product-card__grid-item">

                                        <div class="product-card__grid-item-fullsize">
                                            <div title="WHITE-01" class="product-card__grid-item-link">
                                                <div class="product-card__grid-item-image-wrapper">
                                                    <a href="/collections/all/products/another-year-of-love-acrylic-square-box-9-preserved-rose-stem?variant=45909823193247"
                                                        class="grid__item_image-link"><!-- start responsive-image.liquid (SNIPPET) -->


                                                        <img id="788098478"
                                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAABhGlDQ1BJQ0MgcHJvZmlsZQAAKJF9kT1Iw0AcxV9Ta0UqDkYQcchQnSyIijhqFYpQIdQKrTqYXPohNGlIUlwcBdeCgx+LVQcXZ10dXAVB8APE0clJ0UVK/F9SaBHrwXE/3t173L0DhFqJ6XbHGKAbjpVKxKVMdkUKvyKETojoh6gw25yV5STajq97BPh6F+NZ7c/9OXq0nM2AgEQ8w0zLIV4nntp0TM77xCIrKhrxOfGoRRckfuS66vMb54LHAs8UrXRqjlgklgotrLYwK1o68SRxVNMNyhcyPmuctzjrpQpr3JO/MJIzlpe4TnMICSxgETIkqKhgAyU4iNFqkGIjRfvxNv5Bzy+TSyXXBhg55lGGDsXzg//B727t/MS4nxSJA6EX1/0YBsK7QL3qut/Hrls/AYLPwJXR9JdrwPQn6dWmFj0CereBi+umpu4BlzvAwJOpWIonBWkK+TzwfkbflAX6boHuVb+3xj5OH4A0dZW8AQ4OgZECZa+1eXdXa2//nmn09wMjG3KHDOS4EQAAAAlwSFlzAAAuIwAALiMBeKU/dgAAAAd0SU1FB+YFBhQWEhVMTaAAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAAADElEQVQI12O4f/8+AAU+Ap5GJPuHAAAAAElFTkSuQmCC"
                                                            data-src="//speakingroses.com/cdn/shop/files/Stems_PIN-07_Another_year_of_love__png_bf8758d2-1664-4f62-912c-4e4b1420c350.png?v=1721328735&width=50"
                                                            data-srcset="//speakingroses.com/cdn/shop/files/Stems_PIN-07_Another_year_of_love__png_bf8758d2-1664-4f62-912c-4e4b1420c350.png?v=1721328735&width=100 100w,//speakingroses.com/cdn/shop/files/Stems_PIN-07_Another_year_of_love__png_bf8758d2-1664-4f62-912c-4e4b1420c350.png?v=1721328735&width=153 153w,//speakingroses.com/cdn/shop/files/Stems_PIN-07_Another_year_of_love__png_bf8758d2-1664-4f62-912c-4e4b1420c350.png?v=1721328735&width=234 234w,//speakingroses.com/cdn/shop/files/Stems_PIN-07_Another_year_of_love__png_bf8758d2-1664-4f62-912c-4e4b1420c350.png?v=1721328735&width=358 358w,//speakingroses.com/cdn/shop/files/Stems_PIN-07_Another_year_of_love__png_bf8758d2-1664-4f62-912c-4e4b1420c350.png?v=1721328735&width=548 548w,"
                                                            sizes="(max-width: 479px) 480px, (max-width: 767px) 768px, (max-width: 1019px) 1020px, (max-width: 1279px) 1280px"
                                                            class="responsive-image grid__item-image one"
                                                            data-class="LazyLoad"
                                                            alt="Another year of love! - Acrylic Square Box (9 Preserved Rose Stem)"
                                                            loading="lazy" width="400" height="400"></a>
                                                </div>

                                                <div class="product-card__product-info">
                                                    <h3 class="product-card__item-title">
                                                        <a href="/collections/all/products/another-year-of-love-acrylic-square-box-9-preserved-rose-stem?variant=45909823193247"
                                                            class="product-card__item-title-link">Another year of love!
                                                            - Acrylic Square Box (9
                                                            Preserved Rose Stem)</a>
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
                                                                class=money>$198.98</span></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <style scoped>
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
                                    <!-- start product-card.liquid (SNIPPET) -->
                                    <div class="product-card__grid-item">

                                        <div class="product-card__grid-item-fullsize">
                                            <div title="BLUE-89" class="product-card__grid-item-link">
                                                <div class="product-card__grid-item-image-wrapper">
                                                    <a href="/collections/all/products/you-are-my-forever-acrylic-square-box-1-preserved-rose-stem?variant=45478568132767"
                                                        class="grid__item_image-link"><!-- start responsive-image.liquid (SNIPPET) -->


                                                        <img id="788726886"
                                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAABhGlDQ1BJQ0MgcHJvZmlsZQAAKJF9kT1Iw0AcxV9Ta0UqDkYQcchQnSyIijhqFYpQIdQKrTqYXPohNGlIUlwcBdeCgx+LVQcXZ10dXAVB8APE0clJ0UVK/F9SaBHrwXE/3t173L0DhFqJ6XbHGKAbjpVKxKVMdkUKvyKETojoh6gw25yV5STajq97BPh6F+NZ7c/9OXq0nM2AgEQ8w0zLIV4nntp0TM77xCIrKhrxOfGoRRckfuS66vMb54LHAs8UrXRqjlgklgotrLYwK1o68SRxVNMNyhcyPmuctzjrpQpr3JO/MJIzlpe4TnMICSxgETIkqKhgAyU4iNFqkGIjRfvxNv5Bzy+TSyXXBhg55lGGDsXzg//B727t/MS4nxSJA6EX1/0YBsK7QL3qut/Hrls/AYLPwJXR9JdrwPQn6dWmFj0CereBi+umpu4BlzvAwJOpWIonBWkK+TzwfkbflAX6boHuVb+3xj5OH4A0dZW8AQ4OgZECZa+1eXdXa2//nmn09wMjG3KHDOS4EQAAAAlwSFlzAAAuIwAALiMBeKU/dgAAAAd0SU1FB+YFBhQWEhVMTaAAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAAADElEQVQI12O4f/8+AAU+Ap5GJPuHAAAAAElFTkSuQmCC"
                                                            data-src="//speakingroses.com/cdn/shop/files/Stems_RED-02_bemyforever_png_7a946bba-2171-4e14-bc8a-9eb99c4fb28d.png?v=1720192282&width=50"
                                                            data-srcset="//speakingroses.com/cdn/shop/files/Stems_RED-02_bemyforever_png_7a946bba-2171-4e14-bc8a-9eb99c4fb28d.png?v=1720192282&width=100 100w,//speakingroses.com/cdn/shop/files/Stems_RED-02_bemyforever_png_7a946bba-2171-4e14-bc8a-9eb99c4fb28d.png?v=1720192282&width=153 153w,//speakingroses.com/cdn/shop/files/Stems_RED-02_bemyforever_png_7a946bba-2171-4e14-bc8a-9eb99c4fb28d.png?v=1720192282&width=234 234w,//speakingroses.com/cdn/shop/files/Stems_RED-02_bemyforever_png_7a946bba-2171-4e14-bc8a-9eb99c4fb28d.png?v=1720192282&width=358 358w,//speakingroses.com/cdn/shop/files/Stems_RED-02_bemyforever_png_7a946bba-2171-4e14-bc8a-9eb99c4fb28d.png?v=1720192282&width=548 548w,"
                                                            sizes="(max-width: 479px) 480px, (max-width: 767px) 768px, (max-width: 1019px) 1020px, (max-width: 1279px) 1280px"
                                                            class="responsive-image grid__item-image one"
                                                            data-class="LazyLoad"
                                                            alt="Be my forever - Acrylic Square Box (1 Preserved Rose Stem)"
                                                            loading="lazy" width="400" height="400"></a>
                                                </div>

                                                <div class="product-card__product-info">
                                                    <h3 class="product-card__item-title">
                                                        <a href="/collections/all/products/you-are-my-forever-acrylic-square-box-1-preserved-rose-stem?variant=45478568132767"
                                                            class="product-card__item-title-link">Be my forever -
                                                            Acrylic Square Box (1 Preserved Rose
                                                            Stem)</a>
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
                                                                class=money>$68.98</span></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <style scoped>
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
                                    <!-- start product-card.liquid (SNIPPET) -->
                                    <div class="product-card__grid-item">

                                        <div class="product-card__grid-item-fullsize">
                                            <div title="RED-02" class="product-card__grid-item-link">
                                                <div class="product-card__grid-item-image-wrapper">
                                                    <a href="/collections/all/products/be-my-husband-acrylic-round-box-1-preserved-stem?variant=45876504297631"
                                                        class="grid__item_image-link"><!-- start responsive-image.liquid (SNIPPET) -->


                                                        <img id="789307891"
                                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAABhGlDQ1BJQ0MgcHJvZmlsZQAAKJF9kT1Iw0AcxV9Ta0UqDkYQcchQnSyIijhqFYpQIdQKrTqYXPohNGlIUlwcBdeCgx+LVQcXZ10dXAVB8APE0clJ0UVK/F9SaBHrwXE/3t173L0DhFqJ6XbHGKAbjpVKxKVMdkUKvyKETojoh6gw25yV5STajq97BPh6F+NZ7c/9OXq0nM2AgEQ8w0zLIV4nntp0TM77xCIrKhrxOfGoRRckfuS66vMb54LHAs8UrXRqjlgklgotrLYwK1o68SRxVNMNyhcyPmuctzjrpQpr3JO/MJIzlpe4TnMICSxgETIkqKhgAyU4iNFqkGIjRfvxNv5Bzy+TSyXXBhg55lGGDsXzg//B727t/MS4nxSJA6EX1/0YBsK7QL3qut/Hrls/AYLPwJXR9JdrwPQn6dWmFj0CereBi+umpu4BlzvAwJOpWIonBWkK+TzwfkbflAX6boHuVb+3xj5OH4A0dZW8AQ4OgZECZa+1eXdXa2//nmn09wMjG3KHDOS4EQAAAAlwSFlzAAAuIwAALiMBeKU/dgAAAAd0SU1FB+YFBhQWEhVMTaAAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAAADElEQVQI12O4f/8+AAU+Ap5GJPuHAAAAAElFTkSuQmCC"
                                                            data-src="//speakingroses.com/cdn/shop/files/Stems_WHI-01_be_my_husband_png_fea18c0b-ca40-428e-9917-533fd8df0270.png?v=1720198994&width=50"
                                                            data-srcset="//speakingroses.com/cdn/shop/files/Stems_WHI-01_be_my_husband_png_fea18c0b-ca40-428e-9917-533fd8df0270.png?v=1720198994&width=100 100w,//speakingroses.com/cdn/shop/files/Stems_WHI-01_be_my_husband_png_fea18c0b-ca40-428e-9917-533fd8df0270.png?v=1720198994&width=153 153w,//speakingroses.com/cdn/shop/files/Stems_WHI-01_be_my_husband_png_fea18c0b-ca40-428e-9917-533fd8df0270.png?v=1720198994&width=234 234w,//speakingroses.com/cdn/shop/files/Stems_WHI-01_be_my_husband_png_fea18c0b-ca40-428e-9917-533fd8df0270.png?v=1720198994&width=358 358w,//speakingroses.com/cdn/shop/files/Stems_WHI-01_be_my_husband_png_fea18c0b-ca40-428e-9917-533fd8df0270.png?v=1720198994&width=548 548w,"
                                                            sizes="(max-width: 479px) 480px, (max-width: 767px) 768px, (max-width: 1019px) 1020px, (max-width: 1279px) 1280px"
                                                            class="responsive-image grid__item-image one"
                                                            data-class="LazyLoad"
                                                            alt="Be my husband - Acrylic Round Box (1 Preserved Stem)"
                                                            loading="lazy" width="400" height="400"></a>
                                                </div>

                                                <div class="product-card__product-info">
                                                    <h3 class="product-card__item-title">
                                                        <a href="/collections/all/products/be-my-husband-acrylic-round-box-1-preserved-stem?variant=45876504297631"
                                                            class="product-card__item-title-link">Be my husband -
                                                            Acrylic Round Box (1 Preserved
                                                            Stem)</a>
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
                                                                class=money>$68.98</span></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <style scoped>
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
                                    <!-- start product-card.liquid (SNIPPET) -->
                                    <div class="product-card__grid-item">

                                        <div class="product-card__grid-item-fullsize">
                                            <div title="WHITE-01" class="product-card__grid-item-link">
                                                <div class="product-card__grid-item-image-wrapper">
                                                    <a href="/collections/all/products/be-my-husband-acrylic-round-box-25-preserved-petals?variant=45820442509471"
                                                        class="grid__item_image-link"><!-- start responsive-image.liquid (SNIPPET) -->


                                                        <img id="790134532"
                                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAABhGlDQ1BJQ0MgcHJvZmlsZQAAKJF9kT1Iw0AcxV9Ta0UqDkYQcchQnSyIijhqFYpQIdQKrTqYXPohNGlIUlwcBdeCgx+LVQcXZ10dXAVB8APE0clJ0UVK/F9SaBHrwXE/3t173L0DhFqJ6XbHGKAbjpVKxKVMdkUKvyKETojoh6gw25yV5STajq97BPh6F+NZ7c/9OXq0nM2AgEQ8w0zLIV4nntp0TM77xCIrKhrxOfGoRRckfuS66vMb54LHAs8UrXRqjlgklgotrLYwK1o68SRxVNMNyhcyPmuctzjrpQpr3JO/MJIzlpe4TnMICSxgETIkqKhgAyU4iNFqkGIjRfvxNv5Bzy+TSyXXBhg55lGGDsXzg//B727t/MS4nxSJA6EX1/0YBsK7QL3qut/Hrls/AYLPwJXR9JdrwPQn6dWmFj0CereBi+umpu4BlzvAwJOpWIonBWkK+TzwfkbflAX6boHuVb+3xj5OH4A0dZW8AQ4OgZECZa+1eXdXa2//nmn09wMjG3KHDOS4EQAAAAlwSFlzAAAuIwAALiMBeKU/dgAAAAd0SU1FB+YFBhQWEhVMTaAAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAAADElEQVQI12O4f/8+AAU+Ap5GJPuHAAAAAElFTkSuQmCC"
                                                            data-src="//speakingroses.com/cdn/shop/files/Petals_WHI-01_be_my_husband_png_303b08d5-6c27-4b13-979b-a9c21d05723d.png?v=1719593950&width=50"
                                                            data-srcset="//speakingroses.com/cdn/shop/files/Petals_WHI-01_be_my_husband_png_303b08d5-6c27-4b13-979b-a9c21d05723d.png?v=1719593950&width=100 100w,//speakingroses.com/cdn/shop/files/Petals_WHI-01_be_my_husband_png_303b08d5-6c27-4b13-979b-a9c21d05723d.png?v=1719593950&width=153 153w,//speakingroses.com/cdn/shop/files/Petals_WHI-01_be_my_husband_png_303b08d5-6c27-4b13-979b-a9c21d05723d.png?v=1719593950&width=234 234w,//speakingroses.com/cdn/shop/files/Petals_WHI-01_be_my_husband_png_303b08d5-6c27-4b13-979b-a9c21d05723d.png?v=1719593950&width=358 358w,//speakingroses.com/cdn/shop/files/Petals_WHI-01_be_my_husband_png_303b08d5-6c27-4b13-979b-a9c21d05723d.png?v=1719593950&width=548 548w,"
                                                            sizes="(max-width: 479px) 480px, (max-width: 767px) 768px, (max-width: 1019px) 1020px, (max-width: 1279px) 1280px"
                                                            class="responsive-image grid__item-image one"
                                                            data-class="LazyLoad"
                                                            alt="Be my husband - Acrylic Round Box (25 Preserved Petals)"
                                                            loading="lazy" width="400" height="400"></a>
                                                </div>

                                                <div class="product-card__product-info">
                                                    <h3 class="product-card__item-title">
                                                        <a href="/collections/all/products/be-my-husband-acrylic-round-box-25-preserved-petals?variant=45820442509471"
                                                            class="product-card__item-title-link">Be my husband -
                                                            Acrylic Round Box (25 Preserved
                                                            Petals)</a>
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
                                                                class=money>$58.98</span></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <style scoped>
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
                                    <!-- start product-card.liquid (SNIPPET) -->
                                    <div class="product-card__grid-item">

                                        <div class="product-card__grid-item-fullsize">
                                            <div title="RED-02" class="product-card__grid-item-link">
                                                <div class="product-card__grid-item-image-wrapper">
                                                    <a href="/collections/all/products/be-my-wife-acrylic-round-box-1-preserved-stem?variant=45895187300511"
                                                        class="grid__item_image-link"><!-- start responsive-image.liquid (SNIPPET) -->


                                                        <img id="791095948"
                                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAABhGlDQ1BJQ0MgcHJvZmlsZQAAKJF9kT1Iw0AcxV9Ta0UqDkYQcchQnSyIijhqFYpQIdQKrTqYXPohNGlIUlwcBdeCgx+LVQcXZ10dXAVB8APE0clJ0UVK/F9SaBHrwXE/3t173L0DhFqJ6XbHGKAbjpVKxKVMdkUKvyKETojoh6gw25yV5STajq97BPh6F+NZ7c/9OXq0nM2AgEQ8w0zLIV4nntp0TM77xCIrKhrxOfGoRRckfuS66vMb54LHAs8UrXRqjlgklgotrLYwK1o68SRxVNMNyhcyPmuctzjrpQpr3JO/MJIzlpe4TnMICSxgETIkqKhgAyU4iNFqkGIjRfvxNv5Bzy+TSyXXBhg55lGGDsXzg//B727t/MS4nxSJA6EX1/0YBsK7QL3qut/Hrls/AYLPwJXR9JdrwPQn6dWmFj0CereBi+umpu4BlzvAwJOpWIonBWkK+TzwfkbflAX6boHuVb+3xj5OH4A0dZW8AQ4OgZECZa+1eXdXa2//nmn09wMjG3KHDOS4EQAAAAlwSFlzAAAuIwAALiMBeKU/dgAAAAd0SU1FB+YFBhQWEhVMTaAAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAAADElEQVQI12O4f/8+AAU+Ap5GJPuHAAAAAElFTkSuQmCC"
                                                            data-src="//speakingroses.com/cdn/shop/files/Stems_PIN-99_be_my_wife__png_93959cea-b8ac-44b4-805e-baa0e77e49d6.png?v=1720621779&width=50"
                                                            data-srcset="//speakingroses.com/cdn/shop/files/Stems_PIN-99_be_my_wife__png_93959cea-b8ac-44b4-805e-baa0e77e49d6.png?v=1720621779&width=100 100w,//speakingroses.com/cdn/shop/files/Stems_PIN-99_be_my_wife__png_93959cea-b8ac-44b4-805e-baa0e77e49d6.png?v=1720621779&width=153 153w,//speakingroses.com/cdn/shop/files/Stems_PIN-99_be_my_wife__png_93959cea-b8ac-44b4-805e-baa0e77e49d6.png?v=1720621779&width=234 234w,//speakingroses.com/cdn/shop/files/Stems_PIN-99_be_my_wife__png_93959cea-b8ac-44b4-805e-baa0e77e49d6.png?v=1720621779&width=358 358w,//speakingroses.com/cdn/shop/files/Stems_PIN-99_be_my_wife__png_93959cea-b8ac-44b4-805e-baa0e77e49d6.png?v=1720621779&width=548 548w,"
                                                            sizes="(max-width: 479px) 480px, (max-width: 767px) 768px, (max-width: 1019px) 1020px, (max-width: 1279px) 1280px"
                                                            class="responsive-image grid__item-image one"
                                                            data-class="LazyLoad"
                                                            alt="Be My Wife - Acrylic Round Box (1 Preserved Stem)"
                                                            loading="lazy" width="400" height="400"></a>
                                                </div>

                                                <div class="product-card__product-info">
                                                    <h3 class="product-card__item-title">
                                                        <a href="/collections/all/products/be-my-wife-acrylic-round-box-1-preserved-stem?variant=45895187300511"
                                                            class="product-card__item-title-link">Be My Wife - Acrylic
                                                            Round Box (1 Preserved
                                                            Stem)</a>
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
                                                                class=money>$68.98</span></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <style scoped>
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
                                    <!-- start product-card.liquid (SNIPPET) -->
                                    <div class="product-card__grid-item">

                                        <div class="product-card__grid-item-fullsize">
                                            <div title="WHITE-01" class="product-card__grid-item-link">
                                                <div class="product-card__grid-item-image-wrapper">
                                                    <a href="/collections/all/products/be-my-wife-acrylic-round-box-25-preserved-petals?variant=45821484040351"
                                                        class="grid__item_image-link"><!-- start responsive-image.liquid (SNIPPET) -->


                                                        <img id="792446685"
                                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAABhGlDQ1BJQ0MgcHJvZmlsZQAAKJF9kT1Iw0AcxV9Ta0UqDkYQcchQnSyIijhqFYpQIdQKrTqYXPohNGlIUlwcBdeCgx+LVQcXZ10dXAVB8APE0clJ0UVK/F9SaBHrwXE/3t173L0DhFqJ6XbHGKAbjpVKxKVMdkUKvyKETojoh6gw25yV5STajq97BPh6F+NZ7c/9OXq0nM2AgEQ8w0zLIV4nntp0TM77xCIrKhrxOfGoRRckfuS66vMb54LHAs8UrXRqjlgklgotrLYwK1o68SRxVNMNyhcyPmuctzjrpQpr3JO/MJIzlpe4TnMICSxgETIkqKhgAyU4iNFqkGIjRfvxNv5Bzy+TSyXXBhg55lGGDsXzg//B727t/MS4nxSJA6EX1/0YBsK7QL3qut/Hrls/AYLPwJXR9JdrwPQn6dWmFj0CereBi+umpu4BlzvAwJOpWIonBWkK+TzwfkbflAX6boHuVb+3xj5OH4A0dZW8AQ4OgZECZa+1eXdXa2//nmn09wMjG3KHDOS4EQAAAAlwSFlzAAAuIwAALiMBeKU/dgAAAAd0SU1FB+YFBhQWEhVMTaAAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAAADElEQVQI12O4f/8+AAU+Ap5GJPuHAAAAAElFTkSuQmCC"
                                                            data-src="//speakingroses.com/cdn/shop/files/Petals_WHI-04_be_my_wife__png_b9ab57be-35bf-432d-b23b-efc922c5c1f0.png?v=1720815459&width=50"
                                                            data-srcset="//speakingroses.com/cdn/shop/files/Petals_WHI-04_be_my_wife__png_b9ab57be-35bf-432d-b23b-efc922c5c1f0.png?v=1720815459&width=100 100w,//speakingroses.com/cdn/shop/files/Petals_WHI-04_be_my_wife__png_b9ab57be-35bf-432d-b23b-efc922c5c1f0.png?v=1720815459&width=153 153w,//speakingroses.com/cdn/shop/files/Petals_WHI-04_be_my_wife__png_b9ab57be-35bf-432d-b23b-efc922c5c1f0.png?v=1720815459&width=234 234w,//speakingroses.com/cdn/shop/files/Petals_WHI-04_be_my_wife__png_b9ab57be-35bf-432d-b23b-efc922c5c1f0.png?v=1720815459&width=358 358w,//speakingroses.com/cdn/shop/files/Petals_WHI-04_be_my_wife__png_b9ab57be-35bf-432d-b23b-efc922c5c1f0.png?v=1720815459&width=548 548w,"
                                                            sizes="(max-width: 479px) 480px, (max-width: 767px) 768px, (max-width: 1019px) 1020px, (max-width: 1279px) 1280px"
                                                            class="responsive-image grid__item-image one"
                                                            data-class="LazyLoad"
                                                            alt="Be my wife - Acrylic Round Box (25 Preserved Petals)"
                                                            loading="lazy" width="400" height="400"></a>
                                                </div>

                                                <div class="product-card__product-info">
                                                    <h3 class="product-card__item-title">
                                                        <a href="/collections/all/products/be-my-wife-acrylic-round-box-25-preserved-petals?variant=45821484040351"
                                                            class="product-card__item-title-link">Be my wife - Acrylic
                                                            Round Box (25 Preserved
                                                            Petals)</a>
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
                                                                class=money>$58.98</span></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <style scoped>
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
                                    <!-- start product-card.liquid (SNIPPET) -->
                                    <div class="product-card__grid-item">

                                        <div class="product-card__grid-item-fullsize">
                                            <div title="WHITE-01" class="product-card__grid-item-link">
                                                <div class="product-card__grid-item-image-wrapper">
                                                    <a href="/collections/all/products/be-my-wife-acrylic-square-box-150-preserved-petals?variant=45908616839327"
                                                        class="grid__item_image-link"><!-- start responsive-image.liquid (SNIPPET) -->


                                                        <img id="793337313"
                                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAABhGlDQ1BJQ0MgcHJvZmlsZQAAKJF9kT1Iw0AcxV9Ta0UqDkYQcchQnSyIijhqFYpQIdQKrTqYXPohNGlIUlwcBdeCgx+LVQcXZ10dXAVB8APE0clJ0UVK/F9SaBHrwXE/3t173L0DhFqJ6XbHGKAbjpVKxKVMdkUKvyKETojoh6gw25yV5STajq97BPh6F+NZ7c/9OXq0nM2AgEQ8w0zLIV4nntp0TM77xCIrKhrxOfGoRRckfuS66vMb54LHAs8UrXRqjlgklgotrLYwK1o68SRxVNMNyhcyPmuctzjrpQpr3JO/MJIzlpe4TnMICSxgETIkqKhgAyU4iNFqkGIjRfvxNv5Bzy+TSyXXBhg55lGGDsXzg//B727t/MS4nxSJA6EX1/0YBsK7QL3qut/Hrls/AYLPwJXR9JdrwPQn6dWmFj0CereBi+umpu4BlzvAwJOpWIonBWkK+TzwfkbflAX6boHuVb+3xj5OH4A0dZW8AQ4OgZECZa+1eXdXa2//nmn09wMjG3KHDOS4EQAAAAlwSFlzAAAuIwAALiMBeKU/dgAAAAd0SU1FB+YFBhQWEhVMTaAAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAAADElEQVQI12O4f/8+AAU+Ap5GJPuHAAAAAElFTkSuQmCC"
                                                            data-src="//speakingroses.com/cdn/shop/files/Petals_WHI-04_be_my_wife__png_67652f67-3dac-4def-99d8-9614d00f7aa3.png?v=1721160470&width=50"
                                                            data-srcset="//speakingroses.com/cdn/shop/files/Petals_WHI-04_be_my_wife__png_67652f67-3dac-4def-99d8-9614d00f7aa3.png?v=1721160470&width=100 100w,//speakingroses.com/cdn/shop/files/Petals_WHI-04_be_my_wife__png_67652f67-3dac-4def-99d8-9614d00f7aa3.png?v=1721160470&width=153 153w,//speakingroses.com/cdn/shop/files/Petals_WHI-04_be_my_wife__png_67652f67-3dac-4def-99d8-9614d00f7aa3.png?v=1721160470&width=234 234w,//speakingroses.com/cdn/shop/files/Petals_WHI-04_be_my_wife__png_67652f67-3dac-4def-99d8-9614d00f7aa3.png?v=1721160470&width=358 358w,//speakingroses.com/cdn/shop/files/Petals_WHI-04_be_my_wife__png_67652f67-3dac-4def-99d8-9614d00f7aa3.png?v=1721160470&width=548 548w,"
                                                            sizes="(max-width: 479px) 480px, (max-width: 767px) 768px, (max-width: 1019px) 1020px, (max-width: 1279px) 1280px"
                                                            class="responsive-image grid__item-image one"
                                                            data-class="LazyLoad"
                                                            alt="Be my wife - Acrylic Square Box (150 Preserved Petals)"
                                                            loading="lazy" width="400" height="400"></a>
                                                </div>

                                                <div class="product-card__product-info">
                                                    <h3 class="product-card__item-title">
                                                        <a href="/collections/all/products/be-my-wife-acrylic-square-box-150-preserved-petals?variant=45908616839327"
                                                            class="product-card__item-title-link">Be my wife - Acrylic
                                                            Square Box (150 Preserved
                                                            Petals)</a>
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
                                                                class=money>$168.98</span></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <style scoped>
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
                                    <!-- start product-card.liquid (SNIPPET) -->
                                    <div class="product-card__grid-item">

                                        <div class="product-card__grid-item-fullsize">
                                            <div title="WHITE-01" class="product-card__grid-item-link">
                                                <div class="product-card__grid-item-image-wrapper">
                                                    <a href="/collections/all/products/be-my-wife-acrylic-square-box-9-preserved-rose-stem?variant=45912324309151"
                                                        class="grid__item_image-link"><!-- start responsive-image.liquid (SNIPPET) -->


                                                        <img id="794387486"
                                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAABhGlDQ1BJQ0MgcHJvZmlsZQAAKJF9kT1Iw0AcxV9Ta0UqDkYQcchQnSyIijhqFYpQIdQKrTqYXPohNGlIUlwcBdeCgx+LVQcXZ10dXAVB8APE0clJ0UVK/F9SaBHrwXE/3t173L0DhFqJ6XbHGKAbjpVKxKVMdkUKvyKETojoh6gw25yV5STajq97BPh6F+NZ7c/9OXq0nM2AgEQ8w0zLIV4nntp0TM77xCIrKhrxOfGoRRckfuS66vMb54LHAs8UrXRqjlgklgotrLYwK1o68SRxVNMNyhcyPmuctzjrpQpr3JO/MJIzlpe4TnMICSxgETIkqKhgAyU4iNFqkGIjRfvxNv5Bzy+TSyXXBhg55lGGDsXzg//B727t/MS4nxSJA6EX1/0YBsK7QL3qut/Hrls/AYLPwJXR9JdrwPQn6dWmFj0CereBi+umpu4BlzvAwJOpWIonBWkK+TzwfkbflAX6boHuVb+3xj5OH4A0dZW8AQ4OgZECZa+1eXdXa2//nmn09wMjG3KHDOS4EQAAAAlwSFlzAAAuIwAALiMBeKU/dgAAAAd0SU1FB+YFBhQWEhVMTaAAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAAADElEQVQI12O4f/8+AAU+Ap5GJPuHAAAAAElFTkSuQmCC"
                                                            data-src="//speakingroses.com/cdn/shop/files/Stems_PIN-99_be_my_wife__png_1a16fe15-7cfe-4b79-aa97-7ab902ec2360.png?v=1721404338&width=50"
                                                            data-srcset="//speakingroses.com/cdn/shop/files/Stems_PIN-99_be_my_wife__png_1a16fe15-7cfe-4b79-aa97-7ab902ec2360.png?v=1721404338&width=100 100w,//speakingroses.com/cdn/shop/files/Stems_PIN-99_be_my_wife__png_1a16fe15-7cfe-4b79-aa97-7ab902ec2360.png?v=1721404338&width=153 153w,//speakingroses.com/cdn/shop/files/Stems_PIN-99_be_my_wife__png_1a16fe15-7cfe-4b79-aa97-7ab902ec2360.png?v=1721404338&width=234 234w,//speakingroses.com/cdn/shop/files/Stems_PIN-99_be_my_wife__png_1a16fe15-7cfe-4b79-aa97-7ab902ec2360.png?v=1721404338&width=358 358w,//speakingroses.com/cdn/shop/files/Stems_PIN-99_be_my_wife__png_1a16fe15-7cfe-4b79-aa97-7ab902ec2360.png?v=1721404338&width=548 548w,"
                                                            sizes="(max-width: 479px) 480px, (max-width: 767px) 768px, (max-width: 1019px) 1020px, (max-width: 1279px) 1280px"
                                                            class="responsive-image grid__item-image one"
                                                            data-class="LazyLoad"
                                                            alt="Be my wife - Acrylic Square Box (9 Preserved Rose Stem)"
                                                            loading="lazy" width="400" height="400"></a>
                                                </div>

                                                <div class="product-card__product-info">
                                                    <h3 class="product-card__item-title">
                                                        <a href="/collections/all/products/be-my-wife-acrylic-square-box-9-preserved-rose-stem?variant=45912324309151"
                                                            class="product-card__item-title-link">Be my wife - Acrylic
                                                            Square Box (9 Preserved Rose
                                                            Stem)</a>
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
                                                                class=money>$198.98</span></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <style scoped>
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
                                    <!-- start product-card.liquid (SNIPPET) -->
                                    <div class="product-card__grid-item">

                                        <div class="product-card__grid-item-fullsize">
                                            <div title="RED-02" class="product-card__grid-item-link">
                                                <div class="product-card__grid-item-image-wrapper">
                                                    <a href="/collections/all/products/best-wishes-acrylic-round-box-1-preserved-stem?variant=45873077256351"
                                                        class="grid__item_image-link"><!-- start responsive-image.liquid (SNIPPET) -->


                                                        <img id="795212988"
                                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAABhGlDQ1BJQ0MgcHJvZmlsZQAAKJF9kT1Iw0AcxV9Ta0UqDkYQcchQnSyIijhqFYpQIdQKrTqYXPohNGlIUlwcBdeCgx+LVQcXZ10dXAVB8APE0clJ0UVK/F9SaBHrwXE/3t173L0DhFqJ6XbHGKAbjpVKxKVMdkUKvyKETojoh6gw25yV5STajq97BPh6F+NZ7c/9OXq0nM2AgEQ8w0zLIV4nntp0TM77xCIrKhrxOfGoRRckfuS66vMb54LHAs8UrXRqjlgklgotrLYwK1o68SRxVNMNyhcyPmuctzjrpQpr3JO/MJIzlpe4TnMICSxgETIkqKhgAyU4iNFqkGIjRfvxNv5Bzy+TSyXXBhg55lGGDsXzg//B727t/MS4nxSJA6EX1/0YBsK7QL3qut/Hrls/AYLPwJXR9JdrwPQn6dWmFj0CereBi+umpu4BlzvAwJOpWIonBWkK+TzwfkbflAX6boHuVb+3xj5OH4A0dZW8AQ4OgZECZa+1eXdXa2//nmn09wMjG3KHDOS4EQAAAAlwSFlzAAAuIwAALiMBeKU/dgAAAAd0SU1FB+YFBhQWEhVMTaAAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAAADElEQVQI12O4f/8+AAU+Ap5GJPuHAAAAAElFTkSuQmCC"
                                                            data-src="//speakingroses.com/cdn/shop/files/Stems_PIN-07_best_wishes_png_a8d988b3-ab0f-4647-9d4c-404ddeea15dd.png?v=1720200785&width=50"
                                                            data-srcset="//speakingroses.com/cdn/shop/files/Stems_PIN-07_best_wishes_png_a8d988b3-ab0f-4647-9d4c-404ddeea15dd.png?v=1720200785&width=100 100w,//speakingroses.com/cdn/shop/files/Stems_PIN-07_best_wishes_png_a8d988b3-ab0f-4647-9d4c-404ddeea15dd.png?v=1720200785&width=153 153w,//speakingroses.com/cdn/shop/files/Stems_PIN-07_best_wishes_png_a8d988b3-ab0f-4647-9d4c-404ddeea15dd.png?v=1720200785&width=234 234w,//speakingroses.com/cdn/shop/files/Stems_PIN-07_best_wishes_png_a8d988b3-ab0f-4647-9d4c-404ddeea15dd.png?v=1720200785&width=358 358w,//speakingroses.com/cdn/shop/files/Stems_PIN-07_best_wishes_png_a8d988b3-ab0f-4647-9d4c-404ddeea15dd.png?v=1720200785&width=548 548w,"
                                                            sizes="(max-width: 479px) 480px, (max-width: 767px) 768px, (max-width: 1019px) 1020px, (max-width: 1279px) 1280px"
                                                            class="responsive-image grid__item-image one"
                                                            data-class="LazyLoad"
                                                            alt="Best Wishes! - Acrylic Round Box (1 Preserved Stem)"
                                                            loading="lazy" width="400" height="400"></a>
                                                </div>

                                                <div class="product-card__product-info">
                                                    <h3 class="product-card__item-title">
                                                        <a href="/collections/all/products/best-wishes-acrylic-round-box-1-preserved-stem?variant=45873077256351"
                                                            class="product-card__item-title-link">Best Wishes! -
                                                            Acrylic Round Box (1 Preserved
                                                            Stem)</a>
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
                                                                class=money>$68.98</span></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <style scoped>
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

                                    <div class="collection-page__loading-more-wrapper">
                                        <div class="loading-more__progress-wrapper">


                                            <a href="#" title="Load More" class="collection-page__loading-more"
                                                data-pages="14">
                                                Load More
                                            </a>
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
                            <h2 class="section-title accordion-text__title">Products</h2>
                            <div class="accordion-text__content">
                                <p>Speaking Roses, your perfect ally to transform any occasion into a memorable
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
