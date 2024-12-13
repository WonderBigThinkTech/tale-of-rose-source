<x-layout>



    <main id="MainContent" class="main-content">





        @include('menu-mobile')
            <div class="DrawerOverlay"></div>
        @if ($product)





            <section id="product-layout">

                <h2 class="hide">ProductContent</h2>



                <div id="shopify-section-template--16189407592607__main" class="shopify-section product-tabs">

                    <!-- start custom-product-template.liquid (SECTION) -->

                    <style>

                        @media (max-width: 1019px) {

                            #shopify-section-template--16189407592607__main .product-info--mobile .product-sub-title {

                                font-size: var(--ProductSubtitleFontSizeTablet);

                            }



                            #shopify-section-template--16189407592607__main .title-delivery,

                            #shopify-section-template--16189407592607__main .date {

                                font-size: calc(18px - 0.2rem);

                            }

                        }



                        @media (max-width: 767px) {

                            #shopify-section-template--16189407592607__main .product-info--mobile .product-sub-title {

                                font-size: var(--ProductSubtitleFontSizeMobile);

                            }



                            .product-page .product-variant-wrapper .product-variant.jq-product-variant {

                                width: 70%;

                            }

                        }

                    </style>

                    <style scoped>

                        /*** PRODUCT NEW LAYOUT ***/

                        .price-per-unit-edits {

                            padding-top: 0px;

                            padding-bottom: 1px;

                        }



                        .product-mobile-wrapper>.breadcrumbs {

                            display: none;

                        }



                        .product-half .breadcrumbs {

                            display: flex;

                            line-height: 1;

                        }



                        .product-page .product-form-buttons-wrapper .product-quantity {

                            flex-direction: column;

                            align-items: start;

                        }



                        .trust-badges .trust-badges-wrapper {

                            width: 100%;

                        }



                        .trust-badges .trust-badges-wrapper .trust-badges-img .custom-svg {

                            width: 50%;

                        }



                        .product-page .compare-btn {

                            display: flex;

                            flex-direction: column;

                            justify-content: center;

                            align-items: center;

                            line-height: 1;

                            height: 100%;

                            position: relative;

                            bottom: 0;

                            left: 3px;

                            padding-right: 10px;

                            gap: 2px;

                        }



                        .product-page .compare-btn .compare-add-price {

                            text-decoration: line-through;

                            font-size: 18px;

                            padding-bottom: 0;

                        }



                        .product-page .compare-btn .compare_percent {

                            font-size: 12px;

                            letter-spacing: 0;

                        }



                        .product-page .btn-add-tocart .line {

                            border: 1px solid #ffffff17;

                            height: 68px;

                            margin-right: 0;

                            position: relative;

                            left: 10px;

                        }



                        body .product-page .btn-add-tocart:not(.hide) {

                            border-radius: var(--AddToCartBorderRadius);

                        }



                        .product-quantity-wrapper .btn-minus {

                            border-radius: 4px 0 0 4px;

                        }



                        .product-quantity-wrapper .btn-plus {

                            border-radius: 0 4px 4px 0;

                        }



                        @media (max-width: 1019px) {

                            body .product-page .mobile {

                                display: block;

                                width: 100%;

                            }



                            body .no-mobile {

                                display: none;

                            }



                            .product-half .breadcrumbs {

                                display: none;

                            }



                            .product-mobile-wrapper>.breadcrumbs {

                                display: flex;

                                margin-bottom: 4px;

                                line-height: 16px;

                            }



                            .trust-badges .trust-badges-wrapper .trust-badges-img .custom-svg {

                                width: 67%;

                            }

                        }



                        body .swatch-element .swatch-background- red-02 {

                            background-image: url('//speakingroses.com/cdn/shop/t/12/assets/red-02?16568');

                        }



                        body .swatch-element .swatch-background- pink-99 {

                            background-image: url('//speakingroses.com/cdn/shop/t/12/assets/pink-99?16568');

                        }



                        body .swatch-element .swatch-background- pink-07 {

                            background-image: url('//speakingroses.com/cdn/shop/t/12/assets/pink-07?16568');

                        }



                        body .swatch-element .swatch-background- peach-99 {

                            background-image: url('//speakingroses.com/cdn/shop/t/12/assets/peach-99?16568');

                        }



                        body .swatch-element .swatch-background- white-01 {

                            background-image: url('//speakingroses.com/cdn/shop/t/12/assets/white-01?16568');

                        }



                        body .swatch-element .swatch-background- black-01 {

                            background-image: url('//speakingroses.com/cdn/shop/t/12/assets/black-01?16568');

                        }



                        body .swatch-element .swatch-background- yellow-02 {

                            background-image: url('//speakingroses.com/cdn/shop/t/12/assets/yellow-02?16568');

                        }



                        body .swatch-element .swatch-background- purple-02 {

                            background-image: url('//speakingroses.com/cdn/shop/t/12/assets/purple-02?16568');

                        }



                        body .swatch-element .swatch-background- violet-02 {

                            background-image: url('//speakingroses.com/cdn/shop/t/12/assets/violet-02?16568');

                        }



                        .shopify-section.special-offer-badge-wrapper img,

                        .shopify-section.special-offer-badge-wrapper svg {

                            width: 50px;

                            height: auto;

                        }



                        #shopify-section-template--16189407592607__main .title-delivery,

                        #shopify-section-template--16189407592607__main .date {

                            color: #838383;

                            font-size: 18px;

                            font-weight: normal;

                        }



                        .price-per-unit-edits {

                            font-size: 14px;

                            display: block;

                            padding-top: 5px;

                            color: #000000;

                            font-weight: normal;

                        }



                        .price-per-unit-edits {

                            padding-top: 0px;

                            padding-bottom: 1px;

                        }



                        .meta-short-description {

                            font-size: 16px;

                            font-weight: normal;

                            font-style: normal;

                        }



                        .products-info .product-half .ribbon-top-left {

                            top: -5px;

                            left: 9px;

                        }



                        .shopify-section.special-offer-badge-wrapper {

                            width: auto;

                        }



                        .swatch.swatch-standard {

                            position: relative;

                        }



                        .swatch .swatch-image-style {

                            width: 55px;

                            height: 55px;

                        }



                        .swatch .swatch-image-style .swatch-value {

                            padding: 0;

                            background-repeat: no-repeat;

                            background-size: cover;

                            background-position: center;

                        }



                        .swatch .swatch-image-style .swatch-value,

                        .swatch .swatch-image-style img {

                            width: 100%;

                        }



                        body .pplr-quantity-printed .pplr-drop-item {

                            display: flex;

                            align-items: center;

                            flex-direction: column;

                            padding: 5px 10px 5px 5px;

                        }



                        .swatch .swatch-image-style img {

                            height: 100%;

                            background: none;

                        }



                        .swatch,

                        .swatch .swatch-type,

                        .swatch .swatch-label,

                        .swatch .swatch-value,

                        .swatch .swatch-elements-options {

                            width: 100%;

                            gap: 7px;

                        }



                        .swatch .swatch-type .product-form-label {

                            font-weight: bold;

                        }



                        .swatch .swatch-type,

                        .swatch .swatch-elements-wrapper,

                        .swatch .swatch-elements-options {

                            display: flex;

                        }



                        .swatch .swatch-elements-options {

                            justify-content: flex-start;

                        }



                        .swatch .swatch-type,

                        .swatch .swatch-elements-wrapper {

                            flex-wrap: wrap;

                            align-items: flex-start;

                            justify-content: flex-start;

                            margin: 0 auto;

                        }



                        .product-page .swatch .swatch-type,

                        .product-page .swatch .swatch-elements-wrapper {

                            margin: 0;

                        }



                        .swatch .swatch-type .product-form-label {

                            line-height: 1;

                            font-size: 16px;

                            letter-spacing: -1px;

                        }



                        .swatch .swatch-type .swatch-elements-wrapper {

                            flex-wrap: wrap;

                            gap: 17px;

                            width: 100%;

                        }



                        .swatch .swatch-type .swatch-elements-wrapper .swatch-element-standard {

                            position: relative;

                        }



                        .swatch .swatch-type .swatch-elements-wrapper .swatch-element-standard .swatch-variant-value {

                            display: none;

                        }



                        .swatch .swatch-type .swatch-elements-wrapper .swatch-element.swatch-element-color {

                            margin-bottom: 5px;

                            line-height: 0;

                            align-items: center;

                            justify-content: center;

                            display: flex;

                        }



                        .swatch .swatch-type .swatch-elements-wrapper .swatch-element input[type="radio"] {

                            display: none;

                        }



                        .swatch .swatch-type .swatch-elements-wrapper .swatch-element.soldout {

                            opacity: 0.5;

                        }



                        .swatch .swatch-type .swatch-elements-wrapper .swatch-element.swatch-disabled {

                            display: none;

                        }



                        .swatch .swatch-type .swatch-elements-wrapper .swatch-element>.tooltip {

                            display: block;

                            width: 90px;

                            position: absolute;

                            visibility: hidden;

                            opacity: 0;

                            line-height: 1.3;

                            background: #757575;

                            color: #fff;

                            border: 1px solid #757575;

                            transition: ease all 0.2s;

                            transform: translate(-33%, 0);

                            font-size: 12px;

                            padding: 3px 5px 4px;

                            margin-bottom: 20px;

                            top: -7px;

                            left: 50%;

                            transform: translatex(-50%);

                            text-align: center;

                            box-shadow: 0 0px 2px rgba(50, 50, 50, 0.4);

                            pointer-events: none;

                        }



                        .swatch .swatch-type .swatch-elements-wrapper .swatch-element>.tooltip:before {

                            content: "";

                            border-left: 8px solid transparent;

                            border-right: 8px solid transparent;

                            border-top: 8px solid #757575;

                            position: absolute;

                            bottom: 0;

                            left: 50%;

                            transform: translate(-50%, 100%);

                        }



                        .swatch .swatch-type .swatch-elements-wrapper .swatch-element>.tooltip-standard,

                        .swatch .swatch-type .swatch-elements-wrapper .swatch-element>.tooltip {

                            display: block;

                            min-width: var(--tooltip-size, 120px);

                            position: absolute;

                            visibility: hidden;

                            opacity: 0;

                            background: #ebeaea;

                            color: #000;

                            border: 1px solid #ebeaea;

                            transition: ease all 0.2s;

                            transform: translate(-33%, 0);

                            font-size: 14px;

                            padding: 0 5px;

                            margin-bottom: 20px;

                            top: -7px;

                            left: 50%;

                            z-index: 1;

                            text-align: center;

                            box-shadow: 0 0px 2px rgba(50, 50, 50, 0.4);

                            pointer-events: none;

                            transform: translatex(-50%);

                            border-radius: 5px;

                        }



                        .swatch .swatch-type .swatch-elements-wrapper .swatch-element>.tooltip-standard:before,

                        .swatch .swatch-type .swatch-elements-wrapper .swatch-element>.tooltip:before {

                            content: "";

                            border-left: 8px solid transparent;

                            border-right: 8px solid transparent;

                            border-top: 8px solid #ebeaea;

                            position: absolute;

                            bottom: 0;

                            left: 50%;

                            transform: translate(-50%, 100%);

                        }



                        .swatch .swatch-type .swatch-elements-wrapper .swatch-element .swatch-value:hover~.tooltip-standard,

                        .swatch .swatch-type .swatch-elements-wrapper .swatch-element .swatch-value:active~.tooltip-standard {

                            transform: translate(-50%, -100%);

                            visibility: visible;

                            opacity: 1;

                        }



                        .swatch .swatch-type .swatch-elements-wrapper .swatch-element .swatch-value:hover~.tooltip,

                        .swatch .swatch-type .swatch-elements-wrapper .swatch-element .swatch-value:active~.tooltip {

                            transform: translate(-50%, -100%);

                            visibility: visible;

                            opacity: 1;

                        }



                        .swatch .swatch-type .swatch-elements-wrapper .swatch-element:last-child {

                            margin-right: 0;

                        }



                        .swatch .swatch-type .swatch-elements-wrapper.dropdown-option {

                            width: 100%;

                        }



                        .swatch .swatch-label {

                            font-weight: 600;

                        }



                        .swatch .swatch-value {

                            display: inline-flex;

                            justify-content: center;

                            align-items: center;

                            padding: 9px 7px 6.75px 4px;

                            height: 100%;

                            width: auto;

                            cursor: pointer;

                            position: relative;

                            letter-spacing: -0.8px;

                        }



                        .swatch .swatch-value.no-font {

                            height: 40px;

                            width: 40px;

                        }



                        .swatch .swatch-value.rounded {

                            border-radius: 100%;

                        }



                        .swatch-standard .swatch-value,

                        .swatch-style .swatch-value {

                            box-shadow: 1px 0px 5px 0px #9c9898;

                            color: #000;

                            border-radius: 5px;

                            text-align: center;

                            background-size: cover;

                            background-repeat: no-repeat;

                            background-position: center center;

                        }



                        .swatch-standard .swatch-value.bold,

                        .swatch-style .swatch-value.bold {

                            font-weight: bold;

                        }



                        .swatch-standard .swatch-value:hover,

                        .swatch-style .swatch-value:hover,

                        .swatch-standard .swatch-value:active,

                        .swatch-style .swatch-value:active {

                            border-color: #888;

                        }



                        .swatch-standard .swatch-value-checked,

                        .swatch-style .swatch-value-checked,

                        .swatch-standard .swatch-value-circle-checked,

                        .swatch-style .swatch-value-circle-checked,

                        .swatch-standard .swatch-value-color-circle-checked,

                        .swatch-style .swatch-value-color-circle-checked {

                            align-items: center;

                            display: none;

                            justify-content: center;

                        }



                        .swatch-standard .swatch-value-checked svg,

                        .swatch-style .swatch-value-checked svg,

                        .swatch-standard .swatch-value-circle-checked svg,

                        .swatch-style .swatch-value-circle-checked svg,

                        .swatch-standard .swatch-value-color-circle-checked svg,

                        .swatch-style .swatch-value-color-circle-checked svg {

                            max-width: 60%;

                            max-height: 60%;

                        }



                        .swatch-standard .swatch-value-checked svg {

                            max-width: 100%;

                        }



                        .swatch-standard input:checked+.swatch-value,

                        .swatch-style input:checked+.swatch-value {

                            border: 1px solid var(--swatch_checked-color);

                            box-shadow: 0 1px var(--swatch_checked-color), 0 -1px var(--swatch_checked-color), 1px 0 var(--swatch_checked-color), -1px 0 var(--swatch_checked-color);

                            color: var(--swatch_checked-color);

                        }



                        span.swatch-value-checked svg {

                            fill: var(--colorCollectionSwatchCheck, #fff);

                        }



                        .swatch-standard input:checked+.swatch-value+.swatch-value-checked,

                        .swatch-style input:checked+.swatch-value+.swatch-value-checked {

                            background: var(--swatch_checked-color);

                            border-radius: 100%;

                            display: flex;

                            height: 15px;

                            position: absolute;

                            right: 0;

                            top: 0;

                            transform: translate(50%, -50%);

                            width: 15px;

                            z-index: 1;

                        }



                        .swatch-standard input:checked+.swatch-value+.swatch-value-circle-checked,

                        .swatch-style input:checked+.swatch-value+.swatch-value-circle-checked {

                            background: var(--swatch_checked-color);

                            border-radius: 100%;

                            display: flex;

                            height: 16px;

                            position: absolute;

                            right: 6px;

                            top: 2px;

                            transform: translate(50%, -50%);

                            width: 16px;

                            z-index: 1;

                        }



                        .swatch-standard input:checked+.swatch-value+.swatch-value-color-circle-checked,

                        .swatch-style input:checked+.swatch-value+.swatch-value-color-circle-checked {

                            background: var(--swatch_checked-color);

                            border-radius: 100%;

                            display: flex;

                            height: 16px;

                            position: absolute;

                            right: 0;

                            top: 6px;

                            transform: translate(50%, -50%);

                            width: 16px;

                            z-index: 1;

                        }



                        .swatch-style-option.round .tooltip {

                            left: 13px;

                        }



                        .swatch .swatch-type .swatch-elements-wrapper .swatch-style-option {

                            width: 60px;

                            height: 60px;

                        }



                        .swatch .swatch-type .swatch-elements-wrapper .swatch-style-option .swatch-value {

                            width: 100%;

                            height: 100%;

                        }



                        .round span.swatch-value {

                            border-radius: 100%;

                        }



                        .empty .proceed-to-checkout-Bottom,

                        .empty .cart-notes {

                            display: none !important;

                        }



                        .cart-notes {

                            margin-top: 15px;

                            margin-bottom: 15px;

                        }



                        .cart-notes .input-full {

                            width: 100%;

                            border: 1px solid #aaa;

                            resize: vertical;

                            margin-top: 5px;

                            margin-bottom: 0px;

                            padding: 5px 10px;

                        }



                        .reviewtitle {

                            text-align: center;

                        }



                        .product-title p {

                            padding: 0 0;

                            text-align: center;

                            line-height: 22px;

                            margin: 10px 0;

                            color: #000;

                            text-transform: uppercase;

                        }



                        .at-price {

                            text-decoration: line-through;

                            font-size: 14px;

                        }



                        .grid-related-product-link {

                            width: 100%;

                        }



                        .trustbadge_image_wrapper {

                            width: 100%;

                            position: relative;

                            overflow: hidden;

                        }



                        .trustbadge_image_wrapper img {

                            position: absolute;

                            top: 0;

                        }



                        .trust-badges__svg-image {

                            position: relative;

                            padding-top: 100%;

                            width: 100%;

                        }



                        body .trust-badges-img .trust-badges__svg-image img {

                            position: absolute;

                            top: 0;

                            left: 0;

                            width: 100%;

                            height: 100%;

                        }



                        .trust-badges-wrapper {

                            justify-content: center;

                            width: 88%;

                            margin: 0 auto;

                        }



                        .product-half .trust-badges-wrapper,

                        .product-half .trust-badges-wrapper .trust-badges-img {

                            display: flex;

                            align-items: center;

                            flex-wrap: wrap;

                        }



                        .trust-badges-wrapper .trust-badges-img {

                            flex-direction: column;

                            text-align: center;

                            justify-content: space-between;

                        }



                        .trust-badges-wrapper .trust-badges-img .custom-svg {

                            width: 100%;

                        }



                        .trust-badges-wrapper .trust-badges-img svg,

                        .trust-badges-wrapper .trust-badges-img img {

                            height: 100%;

                            width: 100%;

                        }



                        .trust-badges-wrapper .container-trust-badges {

                            display: flex;

                            flex-direction: column;

                            width: 100%;

                            justify-content: center;

                            align-items: center;

                        }



                        .trust-badges-wrapper .container-trust-badges .container-trust-badges-bottom {

                            display: flex;

                            width: 100%;

                            justify-content: center;

                            align-items: flex-start;

                            flex-wrap: wrap;

                        }



                        .title-badges-section {

                            font-size: var(--title-section-badges-size);

                            padding: 0;

                        }



                        .template-product .title-badges-section {

                            margin: 13px 0 0;

                        }



                        .container-trust-badges .title-badges {

                            color: var(--color-text-trust-bradges);

                            font-size: var(--copy-badges);

                            line-height: 1.3;

                            max-width: 100%;

                            word-break: break-word;

                            font-weight: var(--trust-badges-text-weight);

                            text-transform: var(--trust-badges-text-transform);

                        }



                        .container-trust-badges .title-badges * {

                            margin-bottom: 0;

                            letter-spacing: 0.7px;

                            font-size: inherit;

                        }



                        .tabs-accordion-title::before,

                        .tabs-accordion-title::after {

                            content: '';

                            position: absolute;

                            transition: ease all 0.9s;

                            background-color: var(--inactive-tab-text-color);

                            border-radius: 15px;

                        }



                        .tabs-accordion-title::before {

                            right: 11px;

                            height: 18px;

                            width: 2px;

                            top: 28%;

                        }



                        .tabs-accordion-title::after {

                            right: 3px;

                            width: 18px;

                            height: 2px;

                            top: 46%;

                        }



                        .tabs-accordion-title.active::before,

                        .tabs-accordion-title.active::after {

                            background-color: var(--active-tab-text-color);

                        }



                        .tabs-accordion-title.active::before {

                            transform: rotate(-90deg);

                        }



                        .tabs-accordion-title.active::after {

                            transform: none;

                        }



                        .tabs-accordion-title.active svg {

                            fill: var(--active-arrow-tab-color, #fff);

                        }



                        .tabs-accordion-title svg {

                            max-width: 22px;

                            transition: ease all 0.3s;

                            top: 12px;

                            fill: var(--inactive-arrow-tab-color, #fff);

                        }



                        .tabs-section {

                            width: 100%;

                            margin-top: 5px;

                        }



                        .tabs-accordion {

                            margin-bottom: 20px;

                        }



                        .tabs-accordion .tabs-accordion-title svg {

                            width: 40px;

                        }



                        .tabs-accordion .tabs-accordion-title.active svg {

                            transform: rotatex(180deg);

                        }



                        .product-tabs {

                            margin-bottom: 47px;

                            width: 100%;

                        }



                        .product-tabs__nav {

                            list-style: none;

                        }



                        .product-half .product-tabs__nav {

                            padding-left: 0;

                            margin-bottom: 0;

                        }



                        .product-tabs__nav,

                        .product-tabs__nav-link {

                            display: flex;

                        }



                        .product-tabs__nav-item,

                        .tabs-accordion-title {

                            padding: 9px 0px;

                            background-color: var(--inactive-tab-color, #717171);

                            color: var(--inactive-tab-text-color, #fff);

                            cursor: pointer;

                            display: flex;

                            flex-direction: row;

                            justify-content: space-between;

                        }



                        .tabs-accordion-title {

                            text-transform: var(--product-tab-text-transform);

                            font-size: 18px;

                            position: relative;

                            line-height: 1.45;

                            letter-spacing: -0.56px;

                        }



                        .product-tabs__nav-link {

                            height: 100%;

                            align-items: center;

                            text-transform: var(--product-tab-text-transform);

                        }



                        .product-tabs__nav-link:before {

                            content: "";

                            display: var(--enable-bullet-points);

                            width: 9px;

                            height: 9px;

                            margin: 0 5px 3px 0;

                            background: var(--inactive-tab-bullet-color, #555);

                            border: 2px solid #e5e5e5;

                            border-radius: 100%;

                        }



                        .product-tabs__nav-item--active,

                        .tabs-accordion-title.active {

                            background-color: var(--active-tab-color, #323232);

                            color: var(--active-tab-text-color, #fff);

                        }



                        .product-tabs__nav-item--active .product-tabs__nav-link:before {

                            background: var(--active-tab-bullet-color, #0c0);

                            border: 2px solid #e5e5e5;

                        }



                        .product-tabs__content-wrapper {

                            clear: both;

                            border: 1px solid var(--active-tab-border-color, #444);

                            padding: 10px 15px;

                        }



                        .tabs-accordion-content {

                            padding: 1px 15px 13px 17px;

                        }



                        .tabs-accordion-content ul {

                            padding-left: 10px;

                            display: flex;

                            flex-direction: column;

                            gap: 13.4px;

                            margin-bottom: 0;

                            line-height: 1.3;

                        }



                        .tabs-accordion-content ul li,

                        .tabs-accordion-content p {

                            font-size: 18px;

                        }



                        .tabs-accordion-item {

                            clear: both;

                            border-bottom: 1px solid var(--active-tab-border-color, #444);

                        }



                        .product-tabs__content--max-height,

                        .accordion-max-height {

                            max-height: var(--tab-max-height, 500px);

                            overflow-y: auto;

                        }



                        .product-tabs__content:not(.product-tabs__content--active) {

                            display: none;

                        }



                        .product-tabs--radius {

                            border-radius: 8px 8px 0 0;

                        }



                        .product-tabs--shadow {

                            box-shadow: 0 -7px 7px -6px rgba(0, 0, 0, 0.4);

                        }



                        .product-page .rte a {

                            color: var(--color-link);

                        }



                        i.spr-icon.spr-icon-star,

                        i.spr-icon.spr-icon-star-empty,

                        .spr-badge-starrating .spr-icon,

                        .spr-icon.spr-icon-star-half-alt {

                            color: #f9c52c;

                        }



                        .no-mobile.reviews-app-stars span {

                            text-align: left;

                        }



                        .you-save-price,

                        .you-save-price span {

                            font-weight: bold;

                        }



                        .you-save-price {

                            color: var(--yousave-color, #000);

                            font-size: 12px;

                            display: block;

                        }



                        .btn-add-tocart,

                        .btn-choose-variant {

                            text-transform: var(--AddToCartTextTransform);

                            height: 57px;

                            line-height: 50px;

                            font-size: var(--AddToCartFontSize);

                            text-align: center;

                        }



                        .btn-add-tocart .btn-money,

                        .btn-choose-variant .btn-money,

                        .btn-add-tocart .btn-label,

                        .btn-choose-variant .btn-label,

                        .btn-add-tocart .btn-items,

                        .btn-choose-variant .btn-items {

                            font-weight: var(--AddToCartFontWeight);

                        }



                        .btn-add-tocart {

                            background: var(--AddToCartBackground);

                            color: var(--AddToCartTextColor);

                            position: relative;

                            display: flex;

                            justify-content: center;

                            align-items: center;

                        }



                        .btn-add-tocart .text-btn {

                            padding-left: 28px;

                            letter-spacing: 1.1px;

                        }



                        .btn-add-tocart .divisor {

                            margin: 0 3px 0 3px;

                        }



                        .btn-add-tocart .btn-items:before {

                            content: "(";

                        }



                        .btn-add-tocart .btn-items:after {

                            content: ")";

                        }



                        .btn-add-tocart .btn-progress {

                            display: block;

                            position: absolute;

                            left: 0;

                            bottom: -3px;

                            height: 3px;

                            width: 0;

                            background: var(--progressATCBackgroundColor);

                            transition: ease all 0.2s;

                        }



                        .btn-add-tocart .btn-svg svg path {

                            fill: var(--AddToCartTextColor);

                        }



                        .btn-add-tocart:hover,

                        .btn-add-tocart:active {

                            background: var(--AddToCartBackgroundHover);

                            color: var(--AddToCartTextColorHover);

                        }



                        .btn-add-tocart:hover .btn-svg svg path,

                        .btn-add-tocart:active .btn-svg svg path {

                            fill: var(--AddToCartTextColorHover);

                        }



                        .btn-add-tocart[disabled] {

                            background: #ccc !important;

                            color: #888;

                        }



                        .btn-add-tocart[disabled] svg,

                        .btn-add-tocart[disabled] path {

                            fill: #888 !important;

                        }



                        .add-to-cart-errors {

                            clear: both;

                            text-align: center;

                            color: red;

                            float: left;

                            width: 100%;

                        }



                        .btn-choose-variant {

                            background: var(--out_of_stock_background_color);

                            color: var(--out_of_stock_text_color);

                            margin: 20px 0 20px;

                        }



                        .lds-rolling {

                            position: relative;

                        }



                        .lds-rolling div,

                        .lds-rolling div:after {

                            position: absolute;

                            width: 160px;

                            height: 160px;

                            border: 20px solid black;

                            border-top-color: transparent;

                            border-radius: 50%;

                        }



                        .lds-rolling div {

                            -webkit-animation: lds-rolling 0.9s linear infinite;

                            animation: lds-rolling 0.9s linear infinite;

                            top: 50px;

                            left: 50px;

                        }



                        .lds-rolling div:after {

                            -webkit-transform: rotate(90deg);

                            transform: rotate(90deg);

                        }



                        .lds-rolling {

                            margin: 0 auto;

                            width: 100px !important;

                            height: 100px !important;

                            -webkit-transform: translate(-50px, -50px) scale(1) translate(50px, 50px);

                            transform: translate(-50px, -50px) scale(1) translate(50px, 50px);

                        }



                        .lds-css.ng-scope {

                            padding-top: 25%;

                        }



                        .lds-spinner {

                            position: relative;

                        }



                        .lds-spinner div {

                            left: 99px;

                            top: 62px;

                            position: absolute;

                            -webkit-animation: lds-spinner linear 1s infinite;

                            animation: lds-spinner linear 1s infinite;

                            background: #28292f;

                            width: 2px;

                            height: 8px;

                            border-radius: 12%;

                            -webkit-transform-origin: 1px 38px;

                            transform-origin: 1px 38px;

                        }



                        .lds-spinner div:nth-child(1) {

                            -webkit-transform: rotate(0deg);

                            transform: rotate(0deg);

                            -webkit-animation-delay: -0.9285714286s;

                            animation-delay: -0.9285714286s;

                        }



                        .lds-spinner div:nth-child(2) {

                            -webkit-transform: rotate(25.7142857143deg);

                            transform: rotate(25.7142857143deg);

                            -webkit-animation-delay: -0.8571428571s;

                            animation-delay: -0.8571428571s;

                        }



                        .lds-spinner div:nth-child(3) {

                            -webkit-transform: rotate(51.4285714286deg);

                            transform: rotate(51.4285714286deg);

                            -webkit-animation-delay: -0.7857142857s;

                            animation-delay: -0.7857142857s;

                        }



                        .lds-spinner div:nth-child(4) {

                            -webkit-transform: rotate(77.1428571429deg);

                            transform: rotate(77.1428571429deg);

                            -webkit-animation-delay: -0.7142857143s;

                            animation-delay: -0.7142857143s;

                        }



                        .lds-spinner div:nth-child(5) {

                            -webkit-transform: rotate(102.8571428571deg);

                            transform: rotate(102.8571428571deg);

                            -webkit-animation-delay: -0.6428571429s;

                            animation-delay: -0.6428571429s;

                        }



                        .lds-spinner div:nth-child(6) {

                            -webkit-transform: rotate(128.5714285714deg);

                            transform: rotate(128.5714285714deg);

                            -webkit-animation-delay: -0.5714285714s;

                            animation-delay: -0.5714285714s;

                        }



                        .lds-spinner div:nth-child(7) {

                            -webkit-transform: rotate(154.2857142857deg);

                            transform: rotate(154.2857142857deg);

                            -webkit-animation-delay: -0.5s;

                            animation-delay: -0.5s;

                        }



                        .lds-spinner div:nth-child(8) {

                            -webkit-transform: rotate(180deg);

                            transform: rotate(180deg);

                            -webkit-animation-delay: -0.4285714286s;

                            animation-delay: -0.4285714286s;

                        }



                        .lds-spinner div:nth-child(9) {

                            -webkit-transform: rotate(205.7142857143deg);

                            transform: rotate(205.7142857143deg);

                            -webkit-animation-delay: -0.3571428571s;

                            animation-delay: -0.3571428571s;

                        }



                        .lds-spinner div:nth-child(10) {

                            -webkit-transform: rotate(231.4285714286deg);

                            transform: rotate(231.4285714286deg);

                            -webkit-animation-delay: -0.2857142857s;

                            animation-delay: -0.2857142857s;

                        }



                        .lds-spinner div:nth-child(11) {

                            -webkit-transform: rotate(257.1428571429deg);

                            transform: rotate(257.1428571429deg);

                            -webkit-animation-delay: -0.2142857143s;

                            animation-delay: -0.2142857143s;

                        }



                        .lds-spinner div:nth-child(12) {

                            -webkit-transform: rotate(282.8571428571deg);

                            transform: rotate(282.8571428571deg);

                            -webkit-animation-delay: -0.1428571429s;

                            animation-delay: -0.1428571429s;

                        }



                        .lds-spinner div:nth-child(13) {

                            -webkit-transform: rotate(308.5714285714deg);

                            transform: rotate(308.5714285714deg);

                            -webkit-animation-delay: -0.0714285714s;

                            animation-delay: -0.0714285714s;

                        }



                        .lds-spinner div:nth-child(14) {

                            -webkit-transform: rotate(334.2857142857deg);

                            transform: rotate(334.2857142857deg);

                            -webkit-animation-delay: 0s;

                            animation-delay: 0s;

                        }



                        .lds-spinner {

                            width: 200px;

                            height: 400px;

                            -webkit-transform: translate(-100px, -100px) scale(1) translate(100px, 100px);

                            transform: translate(-100px, -100px) scale(1) translate(100px, 100px);

                        }



                        .product-mobile-wrapper {

                            margin-top: 35px;

                            padding: 0 23px;

                        }



                        .product-page .product-price {

                            margin: 5px 0 5px;

                        }



                        .product-page .products-reviews-stars {

                            margin: 0 auto;

                            display: block;

                        }



                        .product-page form {

                            margin-top: 4px;

                            min-width: 100%;

                            float: left;

                        }



                        .product-page form span.invetoryError {

                            width: 100%;

                            color: #f00;

                            display: none;

                            margin: 0 0 15px 0;

                            transition: ease all 300ms;

                            text-align: center;

                        }



                        .product-page form .product-quantity-wrapper .btn[disabled="disabled"],

                        .product-page form .product-quantity-wrapper .quantity[disabled="disabled"],

                        .product-page form button[disabled="disabled"] {

                            background-color: #eee;

                            color: #bbb;

                        }



                        .product-page form .product-quantity-wrapper .btn[disabled="disabled"] svg,

                        .product-page form button[disabled="disabled"] svg {

                            fill: #bbb;

                        }



                        .product-page .product-wrapper {

                            width: 100%;

                            max-width: 1180px;

                            margin: 0 auto;

                            clear: both;

                            display: block;

                            top: 25px;

                            padding-bottom: 54px;

                            position: relative;

                        }



                        .product-page .reviews-app-stars {

                            text-align: center;

                        }



                        .product-page .no-mobile.reviews-app-stars {

                            margin-top: 10px;

                        }



                        .product-page .mobile.reviews-app-stars {

                            margin-top: 10px;

                        }



                        .product-page .products-info {

                            display: flex;

                            justify-content: space-between;

                            width: 100%;

                            flex-wrap: wrap;

                            align-items: flex-start;

                        }



                        .product-page .prod_description a {

                            color: var(--color-link);

                        }



                        .product-page .prod_description a:hover,

                        .product-page .prod_description a:active {

                            text-decoration: underline;

                        }



                        .product-page .prod_description h2 {

                            line-height: 1.4;

                        }



                        .product-page .prod_description h3 {

                            line-height: 1.2;

                        }



                        .product-page .prod_description h4 {

                            line-height: 1.6;

                        }



                        .product-page .prod_description p,

                        .product-page .prod_description ul,

                        .product-page .prod_description ol {

                            margin: 15px 0;

                        }



                        .product-page .prod_description ul,

                        .product-page .prod_description ol {

                            display: block;

                            width: auto;

                            margin-left: 2rem;

                        }



                        .product-page .prod_description ul li+li,

                        .product-page .prod_description ol li+li {

                            margin-top: 10px;

                        }



                        .product-page .prod_description img {

                            max-width: 100%;

                        }



                        .product-page .product-half {

                            width: var(--product-slider-width, 48%);

                        }



                        .product-info__wrapper {

                            width: 72%;

                        }



                        .product-page .product-half~.product-half {

                            padding-left: 2.04%;

                            flex: 1 1 10%;

                            width: 10%;

                        }



                        .product-page .product-title {

                            font-size: var(--ProductTitleFontSize);

                            line-height: 1;

                            font-weight: bold;

                            text-transform: var(--productTitleTransform);

                            margin-bottom: 0;

                            letter-spacing: -0.8px;

                            margin-top: 5px;

                        }



                        .product-page .product-sub-title {

                            line-height: 1;

                            margin: 12px 0 5px;

                            letter-spacing: 0.2px;

                        }



                        .product-page .product-price .compare-price {

                            text-decoration: line-through;

                            font-size: var(--ProductComparePriceFontSize);

                        }



                        .product-page .product-price .current-price {

                            display: inline;

                            font-weight: bold;

                            font-size: var(--ProductPriceFontSize);

                            line-height: 1;

                        }



                        .product-page .product-variant-wrapper {

                            width: 100%;

                        }



                        .product-page .product-variant-wrapper .product-variant {

                            border: 1px solid #ddd;

                            width: 50%;

                            color: #000;

                            font-size: 14px;

                            border-radius: 5px;

                            padding: 10px;

                            appearance: none;

                            -webkit-appearance: none;

                            max-width: 100%;

                            text-transform: capitalize;

                            background-image: url("//speakingroses.com/cdn/shop/t/12/assets/down_30x.png?v=117118517596853744451695383963");

                            background-position: 94% center;

                            background-size: 10px 7px;

                            background-repeat: no-repeat;

                            box-shadow: 1px 0px 2px 0px #9c9898;

                        }



                        .product-page .product-variant-wrapper .product-variant option[disabled] {

                            color: #aaa;

                            background: #eee;

                        }



                        .product-page .trust-badges {

                            width: 100%;

                            display: flex;

                            justify-content: center;

                            margin: 26px 0 10px;

                            float: left;

                        }



                        .product-page .product-quantity {

                            display: flex;

                            justify-content: flex-start;

                            width: 100%;

                            align-items: center;

                            margin: 9px 0 20px;

                            float: left;

                        }



                        .product-page .product-quantity .product-form-label {

                            font-weight: bold;

                        }



                        .product-page .product-quantity .product-form-label {

                            width: 88px;

                            text-align: left;

                        }



                        .product-page .product-quantity-wrapper {

                            display: flex;

                            height: 35px;

                            float: left;

                            position: static;

                            margin: 0;

                            width: 126px;

                        }



                        .product-page .product-quantity-wrapper .btn-minus,

                        .product-page .product-quantity-wrapper .quantity,

                        .product-page .product-quantity-wrapper .btn-plus {

                            height: 100%;

                            margin: 0;

                            padding: 0;

                            background: transparent;

                            border: 1px solid #ccc;

                        }



                        .product-page .product-quantity-wrapper .btn-minus,

                        .product-page .product-quantity-wrapper .btn-plus {

                            flex: 0 0 33%;

                            color: #000;

                            font-weight: bold;

                            display: flex;

                            justify-content: center;

                            align-items: center;

                        }



                        .product-page .product-quantity-wrapper .btn-minus svg,

                        .product-page .product-quantity-wrapper .btn-plus svg {

                            width: 15px;

                        }



                        .product-page .product-quantity-wrapper .quantity[type="number"]::-webkit-inner-spin-button,

                        .product-page .product-quantity-wrapper .quantity[type="number"]::-webkit-outer-spin-button {

                            margin: 0;

                        }



                        .product-page .product-quantity-wrapper .quantity {

                            border-left: none;

                            border-right: none;

                            text-align: center;

                            border-radius: 0;

                            width: 40%;

                        }



                        .product-page .product-quantity-wrapper input::-webkit-outer-spin-button,

                        .product-page .product-quantity-wrapper input::-webkit-inner-spin-button {

                            -webkit-appearance: none;

                            margin: 0;

                        }



                        .product-page .product-quantity-wrapper input[type="number"] {

                            -moz-appearance: textfield;

                            appearance: textfield;

                        }



                        .grid__item-sold-out {

                            background-color: var(--stock_warning_background_color);

                        }



                        .product-page .stock-wrn {

                            position: relative;

                            color: var(--stock_warning_text_color);

                            display: none;

                            font-size: 12px;

                            background-color: var(--stock_warning_background_color);

                            text-align: center;

                            border-radius: 5px;

                            padding: 8px 15px;

                            bottom: 40px;

                            left: 90px;

                        }



                        .product-page .stock-wrn:before {

                            content: "";

                            color: var(--stock_warning_background_color);

                            display: block;

                            width: 0;

                            height: 0;

                            border-top: 10px solid transparent;

                            border-bottom: 10px solid transparent;

                            border-right: 15px solid;

                            border-left: 10px solid transparent;

                            position: absolute;

                            left: -6%;

                            top: 50%;

                            transform: translate(-50%, -50%);

                        }



                        .product-page .stock-wrn span {

                            display: block;

                            line-height: 1.3;

                        }



                        .product-page .stock-wrn--active {

                            display: block;

                        }



                        .product-page .btn-choose-variant {

                            border-radius: var(--AddToCartBorderRadius) 0 0 var(--AddToCartBorderRadius);

                            width: 88%;

                            height: 57px;

                            margin-top: 0px;

                            margin-bottom: 10px;

                            justify-content: center;

                            align-items: center;

                        }



                        .product-page .btn-wishlist.out-of-stock {

                            display: none;

                        }



                        .product-page .btn-add-tocart:not(.hide) {

                            justify-content: center;

                            align-items: center;

                        }



                        .product-page .btn-add-tocart:not(.AddToCartFixed) {

                            margin-bottom: 10px;

                        }



                        .product-page .AddToCart2-div {

                            width: 100%;

                            display: flex;

                            justify-content: center;

                        }



                        .product-page .AddToCart2-div .button-out-of-stock-2 {

                            margin: 0;

                        }



                        .product-page .AddToCart2-div .btn-add-tocart {

                            margin: 0;

                            width: 100%;

                        }



                        .product-page .product-half.half-img {

                            position: relative;

                        }



                        .product-page .product-half.half-img.product-slider-sticky {

                            position: sticky;

                            top: var(--shipping-bar-height, 0);

                            overflow: hidden;

                        }



                        .product-page .lds-spinner {

                            margin: 0 auto;

                            display: block;

                        }



                        .product-page .product-slider-widget .product-slider {

                            display: flex;

                            justify-content: space-between;

                            align-items: center;

                            transition: all ease-in 0.2s;

                            margin-bottom: 2px;

                        }



                        .product-page .product-slider-widget .product-slider>div {

                            width: 100%;

                        }



                        .product-page .product-slider-widget .product-slider .slick-list {

                            flex-grow: 1;

                            margin: 0 auto;

                        }



                        .product-page .product-slider-widget .product-slider .slick-list .slick-track {

                            display: flex;

                            align-items: center;

                        }



                        .slick-slide .product-slider-image-wrapper {

                            position: relative;

                            height: 0;

                            padding-top: 102.9% !important;

                            overflow: hidden;

                        }



                        .slick-slide .product-slider-image-wrapper>img,

                        .slick-slide .product-slider-image-wrapper .magnify {

                            position: absolute !important;

                            top: 0;

                            left: 0;

                            width: 100%;

                            height: 100%;

                            object-fit: cover;

                        }



                        .slick-slide .product-slider-image-wrapper .magnify img {

                            height: 100%;

                            object-fit: cover;

                        }



                        .product-slider-thumbnails .product-slider-image-wrapper img {

                            width: 96%;

                            margin: 0 2%;

                        }



                        .external-video-wrapper {

                            position: absolute;

                            top: 0;

                            left: 0;

                            width: 100%;

                            height: 100%;

                        }



                        .product-page .product-slider-widget .product-slider .external-video-wrapper .product-slider-image-wrapper:not(.-zoom) {

                            position: relative;

                            padding-top: 100%;

                            overflow: hidden;

                            margin: 0 auto;

                        }



                        .product-page .product-slider-widget .product-slider .external-video-wrapper .product-slider-image-wrapper:not(.magnify-zoom) .slick-img {

                            position: absolute;

                            top: 50%;

                            left: 50%;

                            width: calc(100% - 5px);

                            transform: translate(-50%, -50%);

                        }



                        .product-page .product-slider-widget .product-slider .magnify {

                            width: 100%;

                        }



                        .product-page .product-slider-widget .product-slider .magnify .img {

                            -ms-touch-action: pan-y pinch-zoom;

                            touch-action: pan-y pinch-zoom;

                        }



                        .product-page .product-slider-widget .product-slider .external-video-wrapper,

                        .product-page .product-slider-widget .product-slider .product-slider-image-wrapper:not(.magnify-zoom) {

                            position: relative;

                            padding-top: 100%;

                            overflow: hidden;

                            margin: 0 auto;

                        }



                        .product-page .product-slider-widget .product-slider .external-video-wrapper .slick-img,

                        .product-page .product-slider-widget .product-slider .product-slider-image-wrapper:not(.magnify-zoom) .slick-img {

                            position: absolute;

                            top: 50%;

                            left: 50%;

                            width: calc(100% - 5px);

                            transform: translate(-50%, -50%);

                        }



                        .product-slider-image-wrapper {

                            width: 100%;

                            display: inline-block;

                        }



                        .product-slider-thumbnails .product-slider-image-wrapper img {

                            width: 96%;

                            margin: 0 2%;

                        }



                        .product-page .product-slider-widget .product-slider-thumbnails .slick-slide:not(.slick-current) {

                            opacity: 0.6;

                        }



                        .product-page .product-slider-widget .product-slider-thumbnails .slick-list {

                            margin-left: -8.7px;

                        }



                        .product-page .product-slider-widget .product-slider-thumbnails .slick-slide {

                            margin-left: 8.7px;

                        }



                        .product-page .product-slider-widget .product-slider-thumbnails.invisible>div {

                            width: 100%;

                        }



                        .product-page .product-slider-widget .product-slider-thumbnails.invisible .product-slider__image-wrapper img {

                            width: unset;

                            margin: 0 auto;

                        }



                        .product-page .product-slider-widget .product-slider-thumbnails.invisible>div:nth-child(n + 5) {

                            display: none;

                        }



                        .product-page .product-slider-widget .product-slider-thumbnails .slick-arrow {

                            font-size: 40px;

                            width: 15px;

                            height: 27px;

                            color: #000;

                            position: absolute;

                            top: 41%;

                            z-index: 9

                        }



                        .product-page .product-slider-widget .product-slider-thumbnails .slick-arrow::before {

                            content: "";

                            width: 100%;

                            height: 100%;

                            position: absolute;

                            left: -0.9px;

                            top: 1px;

                            z-index: 9;

                            background-image: url("//speakingroses.com/cdn/shop/t/12/assets/icon-arrow-slider.svg?v=115894421367614493321704915723");

                            background-size: 100%;

                            background-position: center center;

                            background-repeat: no-repeat;

                        }



                        .product-page .product-slider-widget .product-slider-thumbnails .slick-prev {

                            transform: rotate(180deg);

                            left: 2%;

                        }



                        .product-page .product-slider-widget .product-slider-thumbnails .slick-next {

                            right: 2%;

                        }



                        .product-page .product-slider-widget .product-slider-featured .slick-arrow {

                            font-size: 40px;

                            width: 30px;

                            height: 40px;

                            color: #000;

                            position: absolute;

                            top: 46.2%;

                            z-index: 9;

                        }



                        .product-page .product-slider-widget .product-slider-featured .slick-prev {

                            left: 5px;

                        }



                        .product-page .product-slider-widget .product-slider-featured .slick-arrow {

                            transform: rotate(180deg);

                            width: 71px;

                            height: 71px;

                            border-radius: 50%;

                            position: absolute;

                            top: 45%;

                            background: rgba(222, 222, 222, 0.66);

                            backdrop-filter: blur(2.5px);

                            -webkit-backdrop-filter: blur(2.5px);

                            z-index: 9;

                        }



                        .product-page .product-slider-widget .product-slider-featured .slick-next {

                            right: 5px;

                            transform: rotate(1deg);

                        }



                        .product-page .product-slider-widget .product-slider-featured .slick-prev {

                            left: 5px;

                        }



                        .product-page .product-slider-widget .product-slider-featured .slick-arrow:before {

                            content: "";

                            width: 100%;

                            height: 100%;

                            position: absolute;

                            left: 0;

                            top: 0;

                            z-index: 9;

                            background-image: url("//speakingroses.com/cdn/shop/t/12/assets/icon-arrow-left.svg?v=150525300415663835271704915722");

                            background-size: 30%;

                            background-position: center center;

                            background-repeat: no-repeat;

                        }



                        .product-page .product-slider-widget .product-slider-featured.invisible>div {

                            display: none;

                        }



                        .slick-image {

                            width: 100%;

                            height: 100%;

                            position: absolute;

                            top: 0;

                            left: 0;

                        }



                        .product-page .product-slider-widget .product-slider-featured.invisible>div.variant__image {

                            display: flex;

                            justify-content: center;

                        }



                        .product-page .product-slider-widget .product-slider .product-slider-image-wrapper iframe {

                            position: absolute;

                            left: 0;

                            top: 0;

                            width: 100%;

                            height: 100%;

                        }



                        .video-wrapper {

                            position: relative;

                            padding-top: 100%;

                            overflow: hidden;

                            margin: 0 auto;

                        }



                        .video-wrapper__media {

                            position: absolute;

                            top: 50%;

                            left: 50%;

                            width: calc(100% - 5px);

                            transform: translate(-50%, -50%);

                        }



                        .new-product-price-value.jq-new-price.price {

                            font-size: var(--ProductPriceFontSize);

                        }



                        .new-product-price {

                            display: flex;

                            align-items: center;

                            margin-top: 8px;

                            gap: 4px;

                        }



                        .new-layout-price .compare-price,

                        .new-price-discounts-wrapper {

                            display: flex;

                            flex-direction: column;

                            justify-content: center;

                            line-height: 1;

                            gap: 2px;

                        }



                        .product-page .new-product-price .new-current-price {

                            display: flex;

                            align-items: center;

                            line-height: 1.3;

                            font-size: var(--ProductPriceFontSize);

                            color: #CE0000;

                            font-weight: 700;

                        }



                        .new-current-price-wrapper {

                            display: flex;

                            align-items: center;

                            font-weight: bold;

                            font-size: var(--ProductPriceFontSize);

                            letter-spacing: -0.8px;

                        }



                        .product-page .new-product-price .new-compare-price.money {

                            margin-top: 5px;

                            margin-bottom: -8px;

                            text-decoration: line-through;

                            font-size: var(--ProductComparePriceFontSize);

                            color: var(--color-sale);

                            margin-right: 5px;

                            font-weight: bold;

                        }



                        .new-product-price-value {

                            line-height: 1.2;

                        }



                        .new-product-price .product-price-symbol {

                            font-size: 0.5em;

                            font-weight: 700;

                            margin-top: 2px;

                            color: var(--color-price);

                        }



                        .new-product-price .new-layout-price {

                            display: flex;

                            flex-direction: column;

                        }



                        .new-product-price .compare-price {

                            font-size: var(--ProductComparePriceFontSize);

                        }



                        .related-product-price {

                            text-align: center;

                        }



                        .product-box-float {

                            position: fixed;

                            left: 0;

                            bottom: -100%;

                            width: 100%;

                            transition: ease all 0.6s;

                            padding: 10px 0;

                            background: #fff;

                            z-index: 10;

                            box-shadow: 0 -3px 5px rgba(0, 0, 0, 0.2);

                        }



                        .product-box-float .product-float-wrapper {

                            display: flex;

                            align-items: center;

                            justify-content: space-between;

                            flex-wrap: wrap;

                        }



                        .product-box-float .product-float-wrapper img {

                            height: 50px;

                        }



                        .product-box-float .product-float-wrapper .product-float-info-wrapper {

                            flex-grow: 1;

                            display: flex;

                            align-items: flex-start;

                            justify-content: flex-start;

                        }



                        .product-box-float .product-float-wrapper .product-float-info-wrapper .product-float-title {

                            font-size: 18px;

                            padding-left: 20px;

                        }



                        .product-box-float .product-float-wrapper .buttons-atc-wrapper .btn-add-tocart,

                        .product-box-float .product-float-wrapper .buttons-atc-wrapper .btn-choose-variant {

                            margin: 0;

                            font-size: 14px;

                            height: 40px;

                            line-height: 40px;

                            width: 100%;

                        }



                        .product-box-float.show {

                            bottom: 0;

                        }



                        .meta-short-description {

                            letter-spacing: 0px;

                            margin: 2px 0 5px;

                            font-size: 16px;

                            line-height: 1;

                        }



                        .product-half__reviews {

                            display: flex;

                            align-items: center;

                        }



                        .product-half__reviews svg {

                            width: 117px;

                        }



                        .product-half__reviews span {

                            color: #FFD700;

                            margin-left: 8px;

                        }



                        .product-half__short-description {

                            font-size: 16px;

                            line-height: 1.1;

                        }



                        .btn-svg svg {

                            width: calc(var(--AddToCartFontSize) + 2px);

                            height: calc(var(--AddToCartFontSize) + 3px);

                            max-height: 100%;

                            margin: 0 2px 0 6px;

                        }



                        .btn-svg svg path {

                            fill: #FFD700;

                        }



                        .btn-add-tocart .btn-items {

                            text-transform: none;

                            letter-spacing: 0px;

                        }



                        .processing-checkbox {

                            display: inline-block;

                            width: 100%;

                            font-size: 18px;

                        }



                        .processing-checkbox .checkbox-wrapper {

                            float: left;

                            margin: 0 5px 0 0;

                        }



                        .processing-checkbox p {

                            font-size: 14px;

                        }



                        .checkbox-style {

                            position: relative;

                            width: 15px;

                            height: 15px;

                            top: 3px;

                            display: inline-block;

                            cursor: pointer;

                        }



                        .checkbox-style .checkbox-fill {

                            position: absolute;

                            left: 0;

                            top: -2px;

                            width: 100%;

                            height: 100%;

                            display: inline-block;

                            background: #f1f4f8;

                            border: 1px solid #d1d1d1;

                            border-radius: 2px;

                        }



                        .checkbox-style .checkbox-fill:after {

                            content: "";

                            position: absolute;

                            left: 3px;

                            top: 0px;

                            width: 4px;

                            height: 7px;

                            border: solid #fff;

                            border-width: 0 3px 3px 0;

                            -webkit-transform: rotate(45deg);

                            -ms-transform: rotate(45deg);

                            transform: rotate(45deg);

                            opacity: 0;

                        }



                        .checkbox-style .upsell {

                            position: absolute;

                            left: 0;

                            top: 0;

                            width: 100%;

                            height: 100%;

                            z-index: 1;

                            opacity: 0;

                            cursor: pointer;

                        }



                        .upsell[disabled]+.checkbox-fill {

                            background: #FFD700;

                            border-color: #FFD700;

                        }



                        .upsell[disabled]:hover+.checkbox-fill+.tooltip,

                        .upsell[disabled]:active+.checkbox-fill+.tooltip {

                            transform: translate(-33%, -100%);

                            visibility: visible;

                            opacity: 1;

                        }



                        .upsell[disabled]+.checkbox-fill+.tooltip:before {

                            content: "";

                            border-left: 8px solid transparent;

                            border-right: 8px solid transparent;

                            border-top: 8px solid #757575;

                            position: absolute;

                            bottom: 0;

                            left: 50%;

                            transform: translate(-50%, 100%);

                        }



                        .upsell+.checkbox-fill+.tooltip {

                            display: block;

                            width: 110px;

                            position: absolute;

                            visibility: hidden;

                            opacity: 0;

                            background: #757575;

                            color: #fff;

                            border: 1px solid #757575;

                            transition: ease all 0.2s;

                            transform: translate(-33%, 0);

                            font-size: 14px;

                            padding: 5px 0;

                            margin-bottom: 20px;

                            top: -7px;

                            text-align: center;

                            box-shadow: 0 0px 2px rgba(50, 50, 50, 0.4);

                            pointer-events: none;

                            left: -11px;

                        }



                        span.tooltip {

                            display: none;

                        }



                        .checkbox-style .upsell:checked+.checkbox-fill {

                            background: var(--checkbox-upsell-color);

                            border-color: var(--checkbox-upsell-color);

                        }



                        .checkbox-style .upsell:checked+.checkbox-fill:after {

                            opacity: 1;

                        }



                        .modal-container {

                            position: fixed;

                            background: rgba(0, 0, 0, 0.7);

                            width: 100%;

                            height: 100%;

                            display: none;

                            visibility: hidden;

                            opacity: 0;

                            top: 0;

                            left: 0;

                            z-index: 99999999;

                            transition: ease all 0.3s;

                            justify-content: center;

                            align-items: center;

                        }



                        .modal-container.active {

                            display: flex;

                            visibility: visible;

                            opacity: 1;

                        }



                        .modal-container .modal-box {

                            position: relative;

                            background: #fff;

                            border: 10px solid #fff;

                            border-radius: 10px;

                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.8);

                            width: 1000px;

                            height: auto;

                            display: block;

                            max-height: 90%;

                            max-width: 90%;

                        }



                        .modal-container .modal-box.size-chart-image {

                            width: 1100px;

                            max-width: 90%;

                        }



                        .modal-container .modal-box .modal-close {

                            position: absolute;

                            top: 0;

                            right: 0;

                            transform: translate(80%, -90%);

                            display: flex;

                            width: 30px;

                            height: 30px;

                            justify-content: center;

                            align-items: center;

                            background: #fff;

                            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);

                            border-radius: 100%;

                            text-transform: uppercase;

                            font-weight: bold;

                            cursor: pointer;

                            z-index: 10;

                        }



                        .modal-container .modal-box .modal-content {

                            padding: 10px 5px;

                            height: 100%;

                            overflow: auto;

                        }



                        .modal-container .modal-box .modal-content .modal-img,

                        .modal-container .modal-box .modal-content .modal-text {

                            width: 47%;

                        }



                        .modal-container .modal-box .modal-content .modal-text {

                            max-height: 100%;

                            overflow: auto;

                        }



                        .modal-container .modal-box .modal-content .modal-text img {

                            max-width: 100%;

                        }



                        .processing-checkbox a {

                            color: #0793ff;

                        }



                        .prioritylink {

                            text-decoration: underline;

                            font-size: 18px;

                        }



                        .processing-checkbox a:hover,

                        .processing-checkbox a:active {

                            opacity: 1;

                        }



                        .size-chart {

                            display: block;

                            width: 100%;

                            padding: 10px 0px 0 2px;

                        }



                        .size-chart>.size-chart-text {

                            cursor: pointer;

                            text-decoration: underline;

                            color: var(--size-chart-color);

                            font-size: 0.9rem;

                            display: block;

                            line-height: 2.5;

                        }



                        .modal-container .modal-box .modal-content {

                            padding: 10px 5px;

                        }



                        .modal-container .modal-box .modal-content .modal-img {

                            width: 48%;

                            margin-bottom: 10px;

                            float: left;

                            margin-right: 2%;

                        }



                        .modal-container .modal-box .modal-content .modal-text {

                            width: 100%;

                        }



                        .modal-container .modal-box.size-chart-image .modal-content .modal-img {

                            margin: 0;

                            width: 100%;

                        }



                        .modal-container.jq-sizechart-modal.modal-container-image.active {

                            align-items: center;

                            display: flex;

                            justify-content: center;

                        }



                        .modal-container.jq-sizechart-modal.modal-container-image.active .modal-box {

                            width: auto;

                            max-width: none;

                            transform: none;

                            height: auto;

                            position: relative;

                            top: auto;

                            left: auto;

                        }



                        .modal-container.jq-sizechart-modal .modal-content {

                            overflow: auto;

                            padding: 0;

                            margin: 5px 10px;

                            background: #fff;

                        }



                        .modal-container.jq-sizechart-modal .modal-content .modal-page-content {

                            margin-top: 30px;

                        }



                        .modal-container.jq-sizechart-modal .modal-content .modal-title .modal-set {

                            display: flex;

                            justify-content: start;

                            align-items: center;

                            flex-wrap: wrap;

                            width: 100%;

                            border: 1px solid #dcdcdc;

                        }



                        .modal-container.jq-sizechart-modal .modal-content .modal-title .modal-set * {

                            margin: 0;

                            width: 50%;

                            padding-left: 10px;

                            font-size: 20px;

                        }



                        .modal-container.jq-sizechart-modal .modal-content .modal-title .modal-set span {

                            display: flex;

                            align-items: center;

                            width: 35%;

                            font-size: 25px;

                            height: 64px;

                        }



                        .modal-container.jq-sizechart-modal .modal-content .modal-title .modal-set *:nth-child(odd) {

                            background-color: #f1f1f1;

                            font-weight: bold;

                        }



                        .modal-container.jq-sizechart-modal .modal-content .modal-title .modal-set .metafield-rich_text_field * {

                            background-color: #fff;

                        }



                        .modal-container.jq-sizechart-modal .modal-content .modal-page-title {

                            padding: 0 0 10px;

                            position: sticky;

                            top: 0;

                            background: #fff;

                        }



                        .modal-container.jq-sizechart-modal .modal-content .modal-img {

                            width: auto;

                        }



                        .product-box-float .product-float-wrapper .product-float-title {

                            font-size: 16px;

                            margin-left: 5px;

                        }



                        .product-box-float .product-float-wrapper .product-title.product-float-title {

                            flex-grow: 1;

                            flex-basis: 40%;

                            flex-basis: 40%;

                        }



                        .product-box-float .product-float-wrapper .product-title.product-float-title .relate-content {

                            float: left;

                            width: 100%;

                            margin-top: 20px;

                        }



                        .product-box-float .product-float-wrapper .buttons-atc-wrapper {

                            width: 300px;

                        }



                        .template-product .related_product {

                            float: left;

                        }



                        .template-product .relate-content {

                            float: left;

                            width: 100%;

                            padding-top: 76px;

                        }



                        .template-product .social-share-info {

                            display: flex;

                            justify-content: flex-start;

                            margin: 15px 0;

                        }



                        .template-product .social-share-info .social-share-title {

                            color: var(--SocialShareTitleColor);

                        }



                        .template-product .social-share-info .social-share {

                            display: flex;

                            align-items: center;

                            margin: 0 5px;

                        }



                        .template-product .social-share-info .social-share svg path {

                            fill: var(--SocialShareColor);

                        }



                        .product-page .trust-badges-wrapper .trust-badges-img.col-1 {

                            width: 100%;

                        }



                        .product-page .trust-badges-wrapper .trust-badges-img.col-1 .custom-svg {

                            max-width: 200px;

                        }



                        .product-page .trust-badges-wrapper .trust-badges-img.col-2 {

                            width: 46%;

                            margin: 0 2%;

                        }



                        .product-page .trust-badges-wrapper .trust-badges-img.col-3 {

                            width: 29%;

                            margin: 0 2%;

                        }



                        .product-page .trust-badges-wrapper .trust-badges-img.col-4 {

                            width: 23.5%;

                        }



                        .product-page .trust-badges-wrapper .trust-badges-img.col-5 {

                            width: 18%;

                            margin: 0 1%;

                        }



                        .product-page .trust-badges-wrapper .trust-badges-img.col-6 {

                            width: 14.6%;

                            margin: 0 1%;

                        }



                        .product-page .trust-badges-wrapper .container-trust-badges .container-trust-badges-bottom {

                            justify-content: space-between;

                            align-items: center;

                        }



                        .no-show {

                            display: none !important;

                        }



                        .AddToCartFixed {

                            left: 0;

                            position: fixed;

                            bottom: 0;

                            z-index: 9;

                            animation: AddToCartFixed ease 2s;

                            -webkit-animation: AddToCartFixed ease 2s;

                            opacity: 0.95;

                        }



                        .related-product-price .price {

                            margin-left: 5px;

                        }



                        @keyframes AddToCartFixed {

                            0% {

                                opacity: 0;

                            }



                            100% {

                                opacity: 0.95;

                            }

                        }



                        @-moz-keyframes AddToCartFixed {

                            0% {

                                opacity: 0;

                            }



                            100% {

                                opacity: 0.95;

                            }

                        }



                        @-webkit-keyframes AddToCartFixed {

                            0% {

                                opacity: 0;

                            }



                            100% {

                                opacity: 0.95;

                            }

                        }



                        @-o-keyframes AddToCartFixed {

                            0% {

                                opacity: 0;

                            }



                            100% {

                                opacity: 0.95;

                            }

                        }



                        @-ms-keyframes AddToCartFixed {

                            0% {

                                opacity: 0;

                            }



                            100% {

                                opacity: 0.95;

                            }

                        }



                        .product-dynamic-video__wrapper {

                            display: flex;

                            justify-content: center;

                            align-items: center;

                            margin: 0 auto;

                            clear: both;

                        }



                        .product-dynamic-video {

                            margin: 18px 0 13px;

                            position: relative;

                            overflow: hidden;

                            width: 100%;

                            padding-top: 56.25%;

                        }



                        .product-dynamic-video svg,

                        .product-dynamic-video img,

                        .product-dynamic-video video,

                        .product-dynamic-video iframe {

                            position: absolute;

                            top: 0;

                            left: 0;

                            bottom: 0;

                            right: 0;

                            width: 100%;

                            height: 100%;

                        }



                        .youtube-player {

                            position: relative;

                            padding-bottom: 56.25%;

                            height: 0;

                            overflow: hidden;

                            max-width: 100%;

                            background: #000;

                        }



                        .product-slider .youtube-player {

                            padding-bottom: 100%;

                        }



                        body .youtube-player img {

                            margin: auto;

                        }



                        .youtube-player iframe {

                            position: absolute;

                            top: 0;

                            left: 0;

                            width: 100%;

                            height: 100%;

                            z-index: 100;

                            background: transparent;

                        }



                        .youtube-player img {

                            object-fit: cover;

                            display: block;

                            left: 0;

                            bottom: 0;

                            margin: auto;

                            max-width: 100%;

                            width: 100%;

                            position: absolute;

                            right: 0;

                            top: 0;

                            border: none;

                            height: auto;

                            cursor: pointer;

                            -webkit-transition: 0.4s all;

                            -moz-transition: 0.4s all;

                            transition: 0.4s all;

                        }



                        .youtube-player img:hover {

                            -webkit-filter: brightness(75%);

                        }



                        .youtube-player .play {

                            align-items: center;

                            display: flex;

                            justify-content: center;

                            height: 72px;

                            left: 50%;

                            top: 50%;

                            margin-left: -77px;

                            margin-top: -38px;

                            position: absolute;

                            cursor: pointer;

                        }



                        .youtube-player .play .play-background {

                            background: #f4471f;

                            border-radius: 50%;

                            cursor: pointer;

                            height: 100%;

                            position: absolute;

                            width: 50%;

                            box-shadow: 0 1px 2.2px rgba(0, 0, 0, 0.051), 0 2.3px 5.3px rgba(0, 0, 0, 0.059), 0 4.4px 10px rgba(0, 0, 0, 0.06), 0 7.8px 17.9px rgba(0, 0, 0, 0.059), 0 14.6px 33.4px rgba(0, 0, 0, 0.059), 0 35px 80px rgba(0, 0, 0, 0.07);

                        }



                        .youtube-player .play .play-icon {

                            height: 150px;

                            transform: rotate(-120deg);

                            transition: transform 500ms;

                            width: 150px;

                        }



                        .youtube-player .play-left-side,

                        .youtube-player .play-right-side {

                            background: white;

                            height: 150px;

                            position: absolute;

                            width: 150px;

                        }



                        .youtube-player .play-left-side {

                            clip-path: polygon(43.77666% 99.85251%, 43.77874% 55.46331%, 43.7795% 55.09177%, 43.77934% 54.74844%, 43.77855% 54.44389%, 43.77741% 54.18863%, 43.77625% 53.99325%, 43.77533% 53.86828%, 43.77495% 53.82429%, 43.77518% 53.55329%, 43.7754% 53.2823%, 43.77563% 53.01131%, 43.77585% 52.74031%, 43.77608% 52.46932%, 43.7763% 52.19832%, 43.77653% 51.92733%, 43.77675% 51.65633%, 43.77653% 51.38533%, 43.7763% 51.11434%, 43.77608% 50.84334%, 43.77585% 50.57235%, 43.77563% 50.30136%, 43.7754% 50.03036%, 43.77518% 49.75936%, 43.77495% 49.48837%, 44.48391% 49.4885%, 45.19287% 49.48865%, 45.90183% 49.48878%, 46.61079% 49.48892%, 47.31975% 49.48906%, 48.0287% 49.4892%, 48.73766% 49.48934%, 49.44662% 49.48948%, 50.72252% 49.48934%, 51.99842% 49.4892%, 53.27432% 49.48906%, 54.55022% 49.48892%, 55.82611% 49.48878%, 57.10201% 49.48865%, 58.3779% 49.4885%, 59.6538% 49.48837%, 59.57598% 49.89151%, 59.31883% 50.28598%, 58.84686% 50.70884%, 58.12456% 51.19714%, 57.11643% 51.78793%, 55.78697% 52.51828%, 54.10066% 53.42522%, 52.02202% 54.54581%, 49.96525% 55.66916%, 48.3319% 56.57212%, 47.06745% 57.27347%, 46.11739% 57.79191%, 45.42719% 58.14619%, 44.94235% 58.35507%, 44.60834% 58.43725%, 44.37066% 58.41149%, 44.15383% 58.27711%, 43.99617% 58.0603%, 43.88847% 57.77578%, 43.82151% 57.43825%, 43.78608% 57.06245%, 43.77304% 56.66309%, 43.773% 56.25486%);

                            transition: clip-path 500ms;

                        }



                        .youtube-player .play-right-side {

                            clip-path: polygon(43.77666% 43.83035%, 43.77874% 44.21955%, 43.7795% 44.59109%, 43.77934% 44.93442%, 43.77855% 45.23898%, 43.77741% 45.49423%, 43.77625% 45.68961%, 43.77533% 45.81458%, 43.77495% 45.85858%, 43.77518% 46.12957%, 43.7754% 46.40056%, 43.77563% 46.67156%, 43.77585% 46.94255%, 43.77608% 47.21355%, 43.7763% 47.48454%, 43.77653% 47.75554%, 43.77675% 48.02654%, 43.77653% 48.29753%, 43.7763% 48.56852%, 43.77608% 48.83952%, 43.77585% 49.11051%, 43.77563% 49.38151%, 43.7754% 49.65251%, 43.77518% 49.9235%, 43.77495% 50.1945%, 44.48391% 50.19436%, 45.19287% 50.19422%, 45.90183% 50.19408%, 46.61079% 50.19394%, 47.31975% 50.1938%, 48.0287% 50.19366%, 48.73766% 50.19353%, 49.44662% 50.19338%, 50.72252% 50.19353%, 51.99842% 50.19366%, 53.27432% 50.1938%, 54.55022% 50.19394%, 55.82611% 50.19408%, 57.10201% 50.19422%, 58.3779% 50.19436%, 59.6538% 50.1945%, 59.57598% 49.79136%, 59.31883% 49.39688%, 58.84686% 48.97402%, 58.12456% 48.48572%, 57.11643% 47.89493%, 55.78697% 47.16458%, 54.10066% 46.25764%, 52.02202% 45.13705%, 49.96525% 44.01371%, 48.3319% 43.11074%, 47.06745% 42.4094%, 46.11739% 41.89096%, 45.42719% 41.53667%, 44.94235% 41.3278%, 44.60834% 41.24561%, 44.37066% 41.27137%, 44.15383% 41.40575%, 43.99617% 41.62256%, 43.88847% 41.90709%, 43.82151% 42.24461%, 43.78608% 42.62041%, 43.77304% 43.01978%, 43.773% 43.428%);

                            transition: clip-path 500ms;

                        }



                        .max-msg {

                            font-size: 12px;

                            width: 125px;

                            text-align: center;

                            color: #fff;

                            position: absolute;

                            background-color: #757575;

                            border-radius: 5px;

                            bottom: -4px;

                            left: 41px;

                            pointer-events: none;

                            line-height: 1.3;

                            margin: 0;

                            padding: 5px;

                            display: none;

                            z-index: 1;

                        }



                        .cart-product--max-items .btn-plus {

                            pointer-events: none;

                            background-color: #eee !important;

                            color: #bbb !important;

                        }



                        .cart-product--max-items .btn-plus:before,

                        .cart-product--max-items .btn-plus:after {

                            background: #bbb;

                        }



                        .cart-product--max-items .max-msg:before {

                            content: "";

                            position: absolute;

                            left: -13px;

                            border: 7px solid transparent;

                            border-right-color: #757575;

                            top: 50%;

                            transform: translatey(-50%);

                        }



                        .cart-product--max-items .max-msg {

                            display: block;

                        }



                        .compare-price {

                            color: var(--color-sale);

                            font-size: var(--collectionProductComparePriceSize);

                            margin-right: 5px;

                            text-decoration: line-through;

                            font-weight: bold;

                        }



                        .template-product .section-title {

                            margin: 0 0 43px;

                        }



                        .template-product .cart-drawer .section-title {

                            padding: 0;

                            margin: 20px 0 30px;

                        }



                        .template-product .shopify-section.reviews .section-title {

                            padding-bottom: 0;

                        }



                        .template-product .title-recently,

                        .related_product .reviewtitle.section-title.section-header__title {

                            margin-top: 0;

                            padding-top: 0;

                            padding-bottom: 0;

                        }



                        .recently-viewed-products [data-handle="another-year-of-love-acrylic-round-box-1-preserved-stem"],

                        .recently-viewed-products [data-handle]:nth-child(n + 5) {

                            display: none;

                        }



                        .special-offer__image {

                            width: 50px;

                        }



                        .product-slider-thumbnails.invisible .product-slider__image-wrapper {

                            position: unset;

                            height: unset;

                            padding-top: unset;

                        }



                        .product-slider-thumbnails.invisible .product-slider__image-wrapper img {

                            position: unset;

                            height: auto;

                        }



                        .product-slider__image-wrapper,

                        .product-slider__video-wrapper {

                            position: relative;

                            padding-top: 114.4%;

                            overflow: hidden;

                        }



                        .product-slider__image-wrapper img,

                        .product-slider__video-wrapper iframe,

                        .product-slider__video-wrapper video {

                            position: absolute;

                            top: 0;

                            left: 0;

                            width: 100%;

                            height: 100%;

                            object-fit: cover;

                        }



                        .product-slider-thumbnails__slick-img {

                            object-fit: contain;

                        }



                        span.swatch-value-checked:after,

                        span.swatch-value-circle-checked:after,

                        span.swatch-value-color-circle-checked:after {

                            content: "\2713";

                            color: var(--iconCheckmarkChecked);

                            font-size: 10px;

                            width: 9px;

                            font-weight: 800;

                        }



                        .slick-list,

                        .slick-slider,

                        .slick-track {

                            position: relative;

                            display: block;

                        }



                        .slick-loading .slick-slide,

                        .slick-loading .slick-track {

                            visibility: hidden;

                        }



                        .slick-slider {

                            box-sizing: border-box;

                            -webkit-user-select: none;

                            -moz-user-select: none;

                            -ms-user-select: none;

                            user-select: none;

                            -webkit-touch-callout: none;

                            -khtml-user-select: none;

                            -ms-touch-action: pan-y;

                            touch-action: pan-y;

                            -webkit-tap-highlight-color: transparent;

                        }



                        .slick-list {

                            overflow: hidden;

                            margin: 0;

                            padding: 0;

                        }



                        .slick-list:focus {

                            outline: 0;

                        }



                        .slick-list.dragging {

                            cursor: pointer;

                        }



                        .slick-slider .slick-list,

                        .slick-slider .slick-track {

                            -webkit-transform: translate3d(0, 0, 0);

                            -moz-transform: translate3d(0, 0, 0);

                            -ms-transform: translate3d(0, 0, 0);

                            -o-transform: translate3d(0, 0, 0);

                            transform: translate3d(0, 0, 0);

                        }



                        .slick-track {

                            top: 0;

                            left: 0;

                            margin-left: auto;

                            margin-right: auto;

                        }



                        .slick-track:after,

                        .slick-track:before {

                            display: table;

                            content: '';

                        }



                        .slick-track:after {

                            clear: both;

                        }



                        .slick-slide {

                            float: left;

                            height: 100%;

                            min-height: 1px;

                        }



                        [dir=rtl] .slick-slide {

                            float: right;

                        }



                        .slick-slide img {

                            display: block;

                            width: 100%;

                            margin: 0 auto;

                            visibility: visible;

                        }



                        .slick-slide.slick-loading img {

                            display: none;

                        }



                        .slick-slide.dragging img {

                            pointer-events: none;

                        }



                        .slick-initialized .slick-slide {

                            display: block;

                        }



                        .slick-vertical .slick-track .slick-slide {

                            height: auto;

                            display: block;

                        }



                        .slick-arrow {

                            background: transparent;

                        }



                        .slick-arrow.slick-hidden {

                            display: none;

                        }



                        .center-slick-track .draggable .slick-track {

                            transform: translate3d(0px, 0px, 0px) !important;

                        }



                        @media screen and (max-width: 1279px) {

                            .product-page .product-wrapper {

                                max-width: 990px;

                            }

                        }



                        @media (max-width: 1019px) {

                            .swatch.swatch-standard {

                                top: 0;

                            }



                            .trust-badges-wrapper .trust-badges-img svg,

                            .trust-badges-wrapper .trust-badges-img img {

                                height: auto;

                            }



                            .product-page form .trust-badges-img img {

                                height: auto;

                                width: 100%;

                            }



                            body .trust-badges-img .trust-badges__svg-image img {

                                height: 100%;

                            }



                            .cart-drawer .trust-badges-wrapper {

                                width: 100%;

                                margin-top: 0;

                            }



                            .meta-short-description {

                                text-align: var(--product-info-alignment, left);

                                margin: 12px 0 13px;

                                width: 75%;

                            }



                            .new-product-price {

                                justify-content: var(--product-info-alignment, flex-start);

                            }



                            body .product-form-label {

                                font-size: 14px;

                            }



                            .product-page .quantity {

                                font-size: 16px;

                            }



                            .product-page .products-reviews-stars {

                                margin: 0 auto;

                                display: block;

                            }



                            .product-page .product-mobile-wrapper {

                                padding: 0 20px;

                                margin-top: 18px;

                            }



                            .product-page .product-title {

                                font-size: var(--ProductTitleFontSizeTablet);

                            }



                            .product-page .product-sub-title {

                                margin: 10px 0 6px;

                                letter-spacing: 0.2px;

                            }



                            .product-half__reviews svg {

                                width: 115px;

                                margin-right: 1px;

                            }



                            .product-half__reviews span {

                                font-size: 16px;

                            }



                            .product-page .products-info {

                                display: flex;

                                flex-direction: column;

                                margin-top: 1px;

                            }



                            .product-page .product-half {

                                width: 100%;

                                display: block;

                            }



                            .product-page .product-wrapper {

                                max-width: 90%;

                                margin: 0 auto;

                                padding-bottom: 0;

                                top: 0;

                            }



                            .product-page .product-half~.product-half {

                                padding-left: 0;

                                flex-basis: 100%;

                                width: 100%;

                            }



                            .product-page .btn-add-tocart,

                            .product-page .btn-choose-variant {

                                font-size: 18px;

                                height: 69px;

                            }



                            .product-page .product-page .product-price .current-price {

                                font-size: 18px;

                            }



                            .product-page .product-page .btn-add-tocart .btn-items {

                                margin-left: 5px;

                            }



                            .product-page .product-half.half-img {

                                margin: 4px 0 0 0;

                            }



                            .product-page .product-slider-widget .product-slider-featured {

                                margin-bottom: 5px;

                            }



                            .product-page .product-slider-widget .product-slider-thumbnails {

                                margin-bottom: 5px;

                            }



                            .product-page .product-title {

                                text-align: center;

                            }



                            .mobile .product-title,

                            .mobile .product-price,

                            .mobile .products-reviews-stars {

                                text-align: var(--product_info_mobile_direction);

                            }



                            .mobile .jdgm-prev-badge {

                                justify-content: var(--product_info_mobile_direction);

                            }



                            .cart-icon {

                                padding: 0;

                            }



                            .product-page .AddToCart2-div .btn-add-tocart {

                                width: 100%;

                            }



                            .size-chart>.size-chart-text {

                                font-size: 14px;

                            }



                            .modal-container.jq-sizechart-modal.modal-container-image.active .modal-box {

                                width: 90%;

                                max-width: 600px;

                            }



                            .modal-container.jq-sizechart-modal .modal-content .modal-img {

                                width: 100%;

                            }



                            .product-box-float .product-float-wrapper .product-float-title {

                                font-size: 16px;

                                margin-left: 5px;

                            }



                            .product-box-float .product-float-wrapper .buttons-atc-wrapper {

                                width: 100%;

                                margin-top: 5px;

                            }



                            .product-box-float .product-float-wrapper .buttons-atc-wrapper .btn-add-tocart,

                            .product-box-float .product-float-wrapper .buttons-atc-wrapper .btn-choose-variant {

                                font-size: 16px;

                                padding: 0 5px;

                            }



                            .template-product .modal-container .modal-box.size-chart-image {

                                width: 90%;

                                height: auto;

                            }



                            .template-product .relate-content {

                                margin-top: 0;

                                padding-top: 38px;

                            }



                            .product-page .product-half.half-img.product-slider-sticky {

                                position: relative;

                                top: 0;

                            }



                            .cart-product--max-items .max-msg {

                                max-width: 105px;

                                font-size: 0.7rem;

                            }

                        }



                        @media (max-width: 1019px) {

                            .product-page .product-slider-widget .product-slider-thumbnails .slick-slide {

                                margin-left: 8.3px;

                            }



                            .modal-container.jq-sizechart-modal .modal-content .modal-title .modal-set * {

                                width: 60%;

                            }



                            .modal-container.jq-sizechart-modal .modal-content .modal-title .modal-set span {

                                font-size: 20px;

                            }



                            .slick-slide .product-slider-image-wrapper {

                                padding-top: 100%;

                            }



                            .product-slider__image-wrapper,

                            .product-slider__video-wrapper {

                                padding-top: 123%;

                            }



                            .product-page .product-price .current-price,

                            .new-product-price-value.jq-new-price.price,

                            .new-current-price-wrapper {

                                font-size: var(--ProductPriceFontSizeTablet);

                            }



                            .product-page .product-slider-widget .product-slider-thumbnails .slick-arrow {

                                width: 19px;

                                height: 38px;

                            }



                            .product-page .product-slider-widget .product-slider-featured .slick-arrow {

                                width: 49px;

                                height: 49px;

                                top: 46.1%;

                            }



                            .tabs-section {

                                margin-top: 2px;

                            }



                            .product-tabs {

                                margin-bottom: 11px;

                            }



                            .tabs-accordion-title {

                                font-size: 28px;

                                letter-spacing: -0.8px;

                                padding: 12px 1px;

                                line-height: 1.6;

                            }



                            .tabs-accordion-title::before {

                                right: 17px;

                                height: 29px;

                                width: 3px;

                                top: 29%;

                            }



                            .tabs-accordion-title::after {

                                right: 5px;

                                width: 29px;

                                height: 3px;

                                top: 48%;

                            }



                            .tabs-accordion-content ul {

                                gap: 25px;

                            }



                            .tabs-accordion-content ul li,

                            .tabs-accordion-content p {

                                font-size: 28px;

                                line-height: 1.1;

                            }



                            .tabs-accordion-content {

                                padding: 2px 32px 20px;

                            }



                            span.swatch-value.uppercase {

                                font-size: 12px;

                            }



                            .swatch .swatch-type .swatch-elements-wrapper {

                                gap: 16px;

                            }



                            .swatch .swatch-value {

                                font-size: 15px;

                                padding: 6px 7px;

                                line-height: 2;

                            }



                            .product-page .product-quantity {

                                margin: 22px 0 8px;

                            }



                            .product-page .product-quantity-wrapper {

                                width: 138px;

                                height: 38px;

                            }



                            .product-page .product-wrapper {

                                max-width: 720px;

                            }



                            .product-page .btn-add-tocart {

                                padding-left: 69px;

                                letter-spacing: 0;

                            }



                            .product-page .btn-add-tocart,

                            .product-page .btn-choose-variant {

                                font-size: calc(var(--AddToCartFontSize) - 0.2rem);

                            }



                            .product-page .compare-btn {

                                right: 10px;

                                gap: 1px;

                            }



                            .product-page .compare-btn .compare-add-price {

                                font-size: 24px;

                            }



                            .product-page .compare-btn .compare_percent {

                                font-size: 15px;

                            }



                            .product-page .btn-add-tocart .line {

                                left: 17px;

                            }



                            .product-page .trust-badges {

                                margin: 15px 0 10px;

                            }



                            .product-page .trust-badges-wrapper .trust-badges-img.col-4 {

                                width: 23%;

                                gap: 5px;

                            }



                            .container-trust-badges .title-badges * {

                                letter-spacing: 0px;

                            }



                            .container-trust-badges .title-badges {

                                font-size: var(--copy-badges-tablet);

                            }



                            .product-dynamic-video {

                                margin: 8px 0 13px;

                            }

                        }



                        @media (min-width: 768px) {}



                        @media (max-width: 767px) {

                            .product-page .product-mobile-wrapper {

                                margin-top: 2px;

                            }



                            .modal-container.jq-sizechart-modal .modal-content .modal-title .modal-set *:nth-child(odd) {

                                font-size: 12px;

                                padding-left: 4px;

                            }



                            .modal-container.jq-sizechart-modal .modal-content .modal-title .modal-set * {

                                padding-left: 0;

                            }



                            .modal-container.jq-sizechart-modal .modal-content .modal-title .modal-set .metafield-rich_text_field {

                                width: 60%;

                            }



                            .modal-container.jq-sizechart-modal .modal-content .modal-title .modal-set .metafield-rich_text_field *:nth-child(odd) {

                                font-size: 12px;

                                padding-left: 4px;

                                width: 75%;

                            }



                            .product-info--mobile {

                                margin-top: 4px;

                            }



                            .product-page .product-title {

                                font-size: var(--ProductTitleFontSizeMobile);

                                letter-spacing: 0px;

                            }



                            .product-page .product-sub-title {

                                letter-spacing: 0.1px;

                                margin: 10px 0 1px;

                            }



                            .product-half__reviews svg {

                                width: 83px;

                            }



                            .product-half__reviews span {

                                font-size: 11.346px;

                                margin-left: 7px;

                            }



                            .meta-short-description {

                                width: 100%;

                                font-size: 14px;

                                margin: 2px 0;

                            }



                            .product-page .product-price .current-price,

                            .new-product-price-value.jq-new-price.price,

                            .new-current-price-wrapper {

                                font-size: var(--ProductPriceFontSizeMobile);

                            }



                            .new-price-discounts-wrapper {

                                gap: 0;

                            }



                            .new-product-price {

                                margin-top: 4px;

                            }



                            .you-save-price {

                                font-size: 10px;

                            }



                            .product-page .products-info {

                                margin-top: 0px;

                            }



                            .tabs-accordion {

                                margin-left: 1px;

                            }



                            .product-page .product-slider-widget .product-slider-featured .slick-arrow {

                                width: 15px;

                                height: 20px;

                                top: 46.7%;

                            }



                            .product-page .product-slider-widget .product-slider-featured .slick-arrow:before {

                                content: "";

                                width: 100%;

                                height: 100%;

                                position: absolute;

                                left: 0;

                                top: 0;

                                z-index: 9;

                                background-image: url("//speakingroses.com/cdn/shop/t/12/assets/icon-arrow-left.svg?v=150525300415663835271704915722");

                                background-size: 30%;

                                background-position: center center;

                                background-repeat: no-repeat;

                            }



                            .slick-slide .product-slider-image-wrapper {

                                padding-top: 102.9%;

                            }



                            .product-page .product-slider-widget .product-slider-featured {

                                margin-bottom: 1px;

                            }



                            .product-page .product-slider-widget .product-slider-thumbnails .slick-list {

                                margin-left: -5px;

                            }



                            .product-page .product-slider-widget .product-slider-thumbnails .slick-slide {

                                margin-left: 5px;

                            }



                            .product-page .product-slider-widget .product-slider-thumbnails {

                                margin-bottom: 2px;

                            }



                            .product-page .product-slider-widget .product-slider-thumbnails .slick-arrow {

                                width: 15px;

                                height: 15px;

                            }



                            .swatch .swatch-type .product-form-label {

                                font-size: 14px;

                            }



                            .swatch .swatch-type .swatch-elements-wrapper {

                                gap: 10px;

                            }



                            .swatch .swatch-value {

                                padding: 3px;

                                font-size: 10px;

                                letter-spacing: 0px;

                            }



                            .swatch-standard input:checked+.swatch-value+.swatch-value-circle-checked,

                            .swatch-style input:checked+.swatch-value+.swatch-value-circle-checked {

                                width: 12px;

                                height: 12px;

                                right: 2px;

                                top: 1px;

                            }



                            span.swatch-value-checked:after,

                            span.swatch-value-circle-checked:after,

                            span.swatch-value-color-circle-checked:after {

                                font-size: 7px;

                                width: 5px;

                            }



                            .product-page .product-quantity {

                                margin: 11px 0 8px;

                            }



                            .product-page .product-quantity-wrapper .btn-minus,

                            .product-page .product-quantity-wrapper .btn-plus {

                                flex: 0 0 32%;

                            }



                            .product-page .btn-add-tocart:not(.AddToCartFixed) {

                                margin-bottom: 0px;

                                padding-left: 0;

                                height: 40px;

                                border-radius: 4px 0 0 4px;

                            }



                            .product-page .btn-add-tocart .compare-btn {

                                left: unset;

                                right: 10px;

                                padding-right: 0;

                                gap: 0;

                            }



                            .product-page .btn-add-tocart .compare-add-price {

                                font-size: 14px;

                            }



                            .product-page .btn-add-tocart .compare_percent {

                                font-size: 8px;

                            }



                            .product-page .btn-add-tocart .line {

                                left: unset;

                                right: 2px;

                            }



                            .product-page .btn-add-tocart .text-btn {

                                padding-left: 4px;

                                letter-spacing: 0.7px;

                                display: flex;

                                align-items: center;

                            }



                            .product-page .btn-add-tocart .btn-money,

                            .product-page .btn-add-tocart .btn-label {

                                font-size: 13px;

                            }



                            .product-page .btn-add-tocart .divisor {

                                margin: 0 2px;

                            }



                            .product-page .btn-add-tocart .btn-svg {

                                padding-bottom: 7px;

                            }



                            .product-page .btn-add-tocart .btn-svg svg {

                                width: 10px;

                                height: 10px;

                            }



                            .product-page .btn-add-tocart .btn-items {

                                font-size: 12px;

                            }



                            .product-page .trust-badges {

                                margin: 10px 0;

                            }



                            .product-page .trust-badges-wrapper .trust-badges-img.col-4 {

                                width: 17%;

                                gap: 3px;

                            }



                            .trust-badges .trust-badges-wrapper .trust-badges-img .custom-svg {

                                display: flex;

                                width: 85%;

                            }



                            .product-dynamic-video {

                                margin: 8px 0 5px;

                            }



                            .product-tabs {

                                margin-bottom: 19px;

                            }



                            .tabs-section {

                                margin-top: 2px;

                            }



                            .tabs-accordion-title {

                                font-size: 12px;

                                padding: 6.2px 0px;

                                letter-spacing: -0.4px;

                            }



                            .container-trust-badges .title-badges {

                                font-size: var(--copy-badges-mobile);

                                line-height: 1;

                            }



                            .tabs-accordion-content ul li,

                            .tabs-accordion-content p {

                                font-size: 14px;

                            }



                            .tabs-accordion-title::before {

                                right: 8px;

                                height: 14px;

                                width: 2px;

                                top: 23%;

                            }



                            .tabs-accordion-title::after {

                                right: 2px;

                                width: 14px;

                                height: 2px;

                                top: 15px;

                            }



                            .tabs-accordion-content {

                                padding: 2px 10px 6px;

                            }



                            .tabs-accordion-content ul {

                                gap: 12.5px;

                                padding-left: 0px;

                            }



                            .product-page .btn-add-tocart,

                            .product-page .btn-choose-variant {

                                font-size: 0.9rem;

                                height: 40px;

                            }

                        }



                        @media (max-width: 479px) {

                            .trust-badges-wrapper {

                                width: 100%;

                            }



                            .cart-product--max-items .max-msg {

                                max-width: 100px;

                                font-size: 0.65rem;

                            }



                            .new-product-price .product-price-symbol {

                                margin-top: 3px;

                            }



                            .product-page .btn-svg svg {

                                width: 18px;

                                height: 18px;

                            }

                        }



                        @media screen and (-ms-high-contrast: active),

                        (-ms-high-contrast: none) {

                            .trust-badges-wrapper .trust-badges-img svg {

                                width: 74px;

                            }

                        }

                    </style>

                    <section id="product" class="product-page" data-section-type="product-template">

                        <div class="

 wrapper product-mobile-wrapper 

 ">



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



                                <span class="breadcrumbs__item">Try Before Buy</span>

                                </span>

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





                            <!-- start product-info-mobile.liquid (SNIPPET) -->

                            <div class="product-info--mobile mobile">

                                <span class="product-title">Try Before Buy</span>

                                <div class="product-half__reviews">

                                    <svg width="114" height="22" viewBox="0 0 114 22" fill="none"

                                        xmlns="http://www.w3.org/2000/svg">

                                        <path

                                            d="M11.1938 0L13.707 7.60081H21.8398L15.2602 12.2984L17.7734 19.8992L11.1938 15.2016L4.61426 19.8992L7.12743 12.2984L0.547865 7.60081H8.68066L11.1938 0Z"

                                            fill="#FFD700" />

                                        <path

                                            d="M34.5815 0L37.0947 7.60081H45.2275L38.6479 12.2984L41.1611 19.8992L34.5815 15.2016L28.002 19.8992L30.5151 12.2984L23.9356 7.60081H32.0684L34.5815 0Z"

                                            fill="#FFD700" />

                                        <path

                                            d="M57.4604 0L59.8593 7.60081H67.6225L61.342 12.2984L63.7409 19.8992L57.4604 15.2016L51.1799 19.8992L53.5789 12.2984L47.2984 7.60081H55.0615L57.4604 0Z"

                                            fill="#FFD700" />

                                        <path

                                            d="M80.3391 0L82.8523 7.60081H90.9851L84.4055 12.2984L86.9187 19.8992L80.3391 15.2016L73.7595 19.8992L76.2727 12.2984L69.6931 7.60081H77.8259L80.3391 0Z"

                                            fill="#FFD700" />

                                        <path

                                            d="M102.903 0L105.394 7.60081H113.457L106.934 12.2984L109.426 19.8992L102.903 15.2016L96.3799 19.8992L98.8714 12.2984L92.3486 7.60081H100.411L102.903 0Z"

                                            fill="#FFD700" />

                                    </svg>

                                    <span>(854 Reviews)</span>

                                </div><!-- start product-price-new-layout.liquid (SNIPPET) -->

                                <div class="new-product-price">





                                    <span class="new-current-price" id="product-price" data-product-price="6898">

                                        <span class="new-current-price-wrapper">

                                            <span class="product-symbol-price price">$</span>

                                            <span

                                                class="new-product-price-value jq-new-price price recharger-price">68.98</span>

                                        </span>

                                    </span>



                                    <span class="new-price-discounts-wrapper">

                                        <span class="new-layout-price" style="display: none;">

                                            <span class="new-compare-price compare-price jq-new-compare-price"></span>

                                        </span>



                                        <span

                                            class="compare-price hide"></span><!-- start you-save.liquid (SNIPPET) --><span

                                            class="you-save-price hide">

                                            You Save:

                                            <span class="money" data-usd="-6898">

                                                <span class=money>$-68.98</span>

                                            </span>

                                            <span class="compare_percent">

                                                (100%)

                                            </span></span><!-- start price-per-unit (SNIPPET) --></span>

                                </div>

                            </div>

                            <div class="products-info">

                                <div class="product-half half-img product-slider-sticky">

                                    <!-- start product-sliders (SNIPPET) -->

                                    <div class="product-slider-widget">



                                        <div

                                            class="product-slider product-slider-featured 

                                  jq-featured-slider">



                                            {{-- main --}}

                                             @foreach ($eachcolor  as $key => $colorimg)
                                            <div class="product-slider-image-wrapper magnify-zoom variant__image">
                                                <img width="600" height="600"

                                                    src="/storage/products/{{ $colorimg }}"

                                                    class="slick-img"

                                                    data-magnify-src="/uploads/{{ $colorimg }}"

                                                    data-magnify-magnifiedwidth="1000"

                                                    data-magnify-magnifiedheight="1000"

                                                    height="158" src="/storage/products/{{ $colorimg }}"

                                                    alt="{{ $key }}"

                                                    class="product-slider-thumbnails__slick-img">

                                            </div>
                                            @endforeach

                                        </div>

                                        <div class="printText">

                                            <div id="print_text_preview"></div>

                                        </div>

                                        <img id="edit-image" style="margin: 5px 5px;" src="" alt=""

                                            width="100">

                                        <style>

                                            .printText {

                                                height: 200px;

                                                display: flex;

                                                justify-content: center;

                                                align-items: center;

                                                position: absolute;

                                                top: 30%;

                                                left: 30%;

                                                width: 175px;

                                                max-width: 175px;

                                                text-align: center;

                                                overflow-wrap: break-word;

                                                text-wrap: wrap;

                                                line-height: 45px;

                                            }



                                            #print_text_preview {

                                                width: 175px;

                                                max-width: 175px;

                                                text-align: center;

                                                overflow-wrap: break-word;

                                                text-wrap: wrap;

                                                line-height: 45px;

                                            }



                                            #edit-image {

                                                display: float;

                                                position: absolute;

                                                top: 35%;

                                                left: 40%;

                                                width: 100px;



                                            }

                                        </style>







                                        <div class="product-slider product-slider-thumbnails invisible " style="opacity: 0; visibility: hidden;">

                                          @foreach ($eachcolor  as $key => $colorimg)
                                            <div class="product-slider__image-wrapper"

                                                data-forloop-index="data_color_con_{{ $key }}"><img width="140"

                                                    height="158" src="/storage/products/{{ $colorimg }}"

                                                    alt="{{ $key }}"

                                                    class="product-slider-thumbnails__slick-img">

                                            </div>
                                            @endforeach

                                        </div>

                                    </div>

                                </div>

                                <div class="product-half rte">



                                    <!-- start breadcrumb.liquid (SNIPPET) -->

                                    <div class="breadcrumbs" aria-label="breadcrumbs">



                                        <a id="breadcrumbs__homepage" class="breadcrumbs__item breadcrumbs__link"

                                            href="/" title="Home">Home</a>

                                        <span class="breadcrumbs__separator" aria-hidden="true"> <svg

                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"

                                                viewBox="0 0 24 24" fill="none">

                                                <path d="M10 8L14 12L10 16" stroke="black" stroke-width="2"

                                                    stroke-linecap="round" stroke-linejoin="round" />

                                            </svg>

                                        </span>



                                        <span class="breadcrumbs__item">Try Before Buy</span>

                                        </span>

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







                                    <div class="product-info__wrapper">

                                        <h1 class="product-title desktop">Try Before Buy</h1>

                                        <!-- "snippets/judgeme_widgets.liquid" was not rendered, the associated app was uninstalled -->

                                        <div class="no-mobile">

                                            <div class="product-half__reviews">

                                                <svg width="114" height="22" viewBox="0 0 114 22"

                                                    fill="none" xmlns="http://www.w3.org/2000/svg">

                                                    <path

                                                        d="M11.1938 0L13.707 7.60081H21.8398L15.2602 12.2984L17.7734 19.8992L11.1938 15.2016L4.61426 19.8992L7.12743 12.2984L0.547865 7.60081H8.68066L11.1938 0Z"

                                                        fill="#FFD700" />

                                                    <path

                                                        d="M34.5815 0L37.0947 7.60081H45.2275L38.6479 12.2984L41.1611 19.8992L34.5815 15.2016L28.002 19.8992L30.5151 12.2984L23.9356 7.60081H32.0684L34.5815 0Z"

                                                        fill="#FFD700" />

                                                    <path

                                                        d="M57.4604 0L59.8593 7.60081H67.6225L61.342 12.2984L63.7409 19.8992L57.4604 15.2016L51.1799 19.8992L53.5789 12.2984L47.2984 7.60081H55.0615L57.4604 0Z"

                                                        fill="#FFD700" />

                                                    <path

                                                        d="M80.3391 0L82.8523 7.60081H90.9851L84.4055 12.2984L86.9187 19.8992L80.3391 15.2016L73.7595 19.8992L76.2727 12.2984L69.6931 7.60081H77.8259L80.3391 0Z"

                                                        fill="#FFD700" />

                                                    <path

                                                        d="M102.903 0L105.394 7.60081H113.457L106.934 12.2984L109.426 19.8992L102.903 15.2016L96.3799 19.8992L98.8714 12.2984L92.3486 7.60081H100.411L102.903 0Z"

                                                        fill="#FFD700" />

                                                </svg>

                                                <span>(854 Reviews)</span>

                                            </div><!-- start product-price-new-layout.liquid (SNIPPET) -->

                                            <div class="new-product-price">





                                                <span class="new-current-price" id="product-price"

                                                    data-product-price="6898">

                                                    <span class="new-current-price-wrapper">

                                                        <span class="product-symbol-price price">$</span>

                                                        <span

                                                            class="new-product-price-value jq-new-price price recharger-price">{{ $product->price }}</span>

                                                    </span>

                                                </span>



                                                <span class="new-price-discounts-wrapper">

                                                    <span class="new-layout-price" style="display: none;">

                                                        <span

                                                            class="new-compare-price compare-price jq-new-compare-price"></span>

                                                    </span>



                                                    <span

                                                        class="compare-price hide"></span><!-- start you-save.liquid (SNIPPET) --><span

                                                        class="you-save-price hide">

                                                        You Save:

                                                        <span class="money" data-usd="-6898">

                                                            <span class=money>$-68.98</span>

                                                        </span>

                                                        <span class="compare_percent">

                                                            (100%)

                                                        </span></span><!-- start price-per-unit (SNIPPET) --></span>

                                            </div>

                                        </div>

                                    </div>

                                    <!-- start custom-product-form (SNIPPET) -->

                                    @include('single-product-form')



                                    <!-- START product-video.liquid ( SNIPPET ) -->



                                    <div class="product-dynamic-video__wrapper dynamic-video__slider"></div>



                                </div>

                            </div>

                            <div class="products-info" style="margin-top: 80px">

                                <div class="product-half"><!-- start product-tabs-accordion.liquid (SNIPPET) -->



                                    <section class="tabs-section" data-section-type="product-tabs">

                                        <h2 class="hide">Product Description</h2>

                                        <div class="tabs-accordion">

                                            <div class="tabs-accordion-item">

                                                <div class="tabs-accordion-title active">

                                                    Description

                                                </div>

                                                <div class="tabs-accordion-content rte " style="display: block;">

                                                    <p><span>{{ $product->description }}</span></p>

                                                    <!---->

                                                </div>

                                            </div>



                                            @if ($product->flower_type == 'Preserved')

                                                <div class="tabs-accordion-item">

                                                    <div class="tabs-accordion-title ">

                                                        Preserved roses care:

                                                    </div>

                                                    <div class="tabs-accordion-content " style="display: none;">

                                                        <ul>

                                                            <li>Avoid direct exposure to sun and humidity.</li>

                                                            <li>Place them in a dry place without intense light to

                                                                maintain

                                                                their color and shape.</li>

                                                            <li>Handle with care to prevent damage.</li>

                                                        </ul>

                                                    </div>

                                                </div>

                                            @endif























































































                                        </div>

                                    </section>

                                    <script type="lazyload_int">

 setTimeout(function (){

 (function ($){

 var $document = $(document);

 $document.ready(function (){

 $document.on('click', '.tabs', function (){

 var tabs = $(this),

 scope = tabs.parent().attr('data-tabs-scope');



 tabs.addClass('active').siblings().removeClass('active');



 $('.tabs-content[data-tabs-scope="' + scope + '"] .tab-content[data-identifier="' + tabs.attr('data-target') + '"]')

 .addClass('active')

 .siblings()

 .removeClass('active');

 

 return false;

 });



 $(document).on('click', '.tabs-accordion-title', function (){

 var self = $(this),

 accordion = self.closest('.tabs-accordion'),

 item = self.closest('.tabs-accordion-title'),

 content = self.siblings('.tabs-accordion-content');



 var allTitles = accordion.find('.tabs-accordion-title').not(item),

 allContents = accordion.find('.tabs-accordion-content').not(content);



 allTitles.removeClass('active');

 allContents.stop().slideUp();



 if (item.hasClass('active')){

 item.removeClass('active');

 }else{

 item.addClass('active');

 }



 content.stop().slideToggle();

 });

 });

 })(jQuery);

 });

</script>

                                    <style scoped>

                                        :root {

                                            --product-tab-text-transform: capitalize;

                                            --active-tab-color: #ffffff;

                                            --active-tab-bullet-color: #f40808;

                                            --active-tab-text-color: #000000;

                                            --active-tab-border-color: #dde0e5;

                                            --inactive-tab-color: #ffffff;

                                            --inactive-tab-bullet-color: #555555;

                                            --inactive-tab-text-color: #000000;

                                            --active-arrow-tab-color: #ffffff;

                                            --inactive-arrow-tab-color: #000000;

                                            --tab-max-height: 500px;

                                            --enable-bullet-points: inline-block;



                                            --enable-bullet-points: none;



                                        }



                                        .flex-control-paging li a {

                                            display: initial;

                                        }

                                    </style>

                                </div>

                                <div class="product-half">

















































































































                                    {{-- <img src="/storage/products/{{ $product->images->value('name') }}"

                                    style="width: 100%;height: auto" /> --}}







                                </div>

                            </div>



                        </div>

                    </section>

                    <div class="wrapper"><!-- start all-reviews.liquid (SNIPPET) -->



                        <!-- "snippets/judgeme_widgets.liquid" was not rendered, the associated app was uninstalled -->



                    </div>

                </div>

                <limespot></limespot>

            </section>





            <style>

                .cart__proceed-to-checkout--top {

                    display: none;

                }

            </style>



            <script>

                $(document).ready(function() {





                    $('.product-slider-featured').slick({

                        slidesToShow: 1,

                        slidesToScroll: 1,

                        arrows: false,

                        fade: true,

                        infinite: true,

                        asNavFor: '.product-slider-thumbnails'

                    });

                    $('.product-slider-thumbnails').slick({

                        slidesToShow: 4,

                        slidesToScroll: 1,

                        asNavFor: '.product-slider-featured',



                        centerMode: true,

                        focusOnSelect: true,

                        infinite: true,

                    });

                });

            </script>

        @endif



</x-layout>

