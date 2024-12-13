@foreach ($products as $product)

    <div class="product-card__grid-item">



        <div class="product-card__grid-item-fullsize">

            <div title="RED-02" class="product-card__grid-item-link">

                <div class="product-card__grid-item-image-wrapper product-grid-item-image">

                    <a href="/products/{{ $product->id }}"

                        class="grid__item_image-link"><!-- start responsive-image.liquid (SNIPPET) -->





                                            @foreach(json_decode($product->eachcolor_image) as $img)                    

                                                                    <img id="784571288"

                                                                    src="/storage/products/{{$img}}"

                                                                    data-src="/storage/products/{{$img}}"

                                                                    data-srcset="/storage/products/{{$img}}"

                                                                    sizes="(max-width: 479px) 480px, (max-width: 767px) 768px, (max-width: 1019px) 1020px, (max-width: 1279px) 1280px"

                                                                    class="responsive-image grid__item-image one"

                                                                    data-class="LazyLoad"

                                                                    alt="Another Year Of Love - Acrylic Round Box (1 Preserved Stem)"

                                                                    loading="lazy" width="400" height="400">
                                                                @endforeach</a>

                </div>



                <div class="product-card__product-info">

                    <h3 class="product-card__item-title">

                        <a href="/products/{{ $product->id }}"

                            class="product-card__item-title-link">{{ $product->name }}</a>

                    </h3>

                    <div class="product-card__item-description-wrapper">

                        <span class="product-card__item-description"></span>

                    </div>





                    <div class="product-card__reviews">

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

                        <span>(5.0 of 800 Reviews)</span>

                    </div>

                    <div class="product-card__item-price-wrapper"><span class="product-card__item-price"><span

                                class=money>{{env('PAYMENT_CURRENCY_SYMBOL')}} {{ $product->price }}</span></span>



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

@endforeach

