<form method="post" action="/cart/add" accept-charset="UTF-8" class=""

    enctype="multipart/form-data">

    @csrf



    <input id="productId" type="hidden" name="productId" value="{{ $product->id }}" />

    <input id="flower-type" type="hidden" name="flower_type" value="{{ $product->flower_type }}" />


 @if(Route::current()->getName() == 'singleProduct')
    <input id="productform" type="hidden" name="productform" value="y" />
 @elseif(Route::current()->getName() == 'singledesignProduct')
    <input id="productform" type="hidden" name="productform" value="n" />
 @endif

    <input type="hidden" name="form_type" value="product" />



    <input type="hidden" name="utf8" value="✓" />



    <!-- Begin SPK Custom Code -->



    <input type="hidden" id="spkbasesku" name="properties[_SPK_BASE_SKU]" value="RO1TACSTP01" />



    <!-- End SPK Custom Code -->



    <!-- Begin ReCharge code -->



    <!-- "snippets/subscription-product.liquid" was not rendered, the associated app was uninstalled -->



    <!-- End ReCharge code -->

    <div class="product-variant-wrapper">



        <!-- start swatch.liquid (SNIPPET) -->





        <div id="product-swatch" class="swatch swatch-standard">

            <div class="swatch-type color">

                <label class="product-form-label" style="font-size: 20px; margin-top: 5px;">Color</label>

                <div class="swatch-elements-options" style="margin-top: 10px;">

                    <div class="swatch-elements-wrapper">

                        <!-- start swatch-color.liquid (SNIPPET) -->




                        @foreach ($sel_colors as $color)

                            <label id="prod-swatch-color-red-02-1" class="swatch-element swatch-element-color round data-color-val"

                                data-swatch="{{ $color->name }}">



                                <input type="radio" id="id-jq-swatch-color-element-1-1"

                                    class="sw-color swatch-variant-value jq-swatch-element "  value="{{ $color->name }}"

                                    data-swatch-index="data_color_con_{{ $color->id }}" name="color"

                                     >

                                <span  class="lazybg swatch-value swatch-background-red-02 red-02"

                                    style="background-color: {{ $color->name }};

                                                                    background-image: url('/storage/color/{{ $color->image }}');

                                                                    width: 45px; height: 45px;">

                                </span>





                                <span class="swatch-value-color-circle-checked">

                                </span>

                                <span class="tooltip">{{ $color->name }}

                                </span>

                            </label>

                        @endforeach

                    
<script type="text/javascript">
    $(document).ready(function(){
        $('.data-color-val:first-child input').prop( "checked", true );

        $('.data-color-val').click(function(){
                    $('.data-color-val input').prop( "checked", false );
              $(this).find('input').prop( "checked", true );  
          });
    });
</script>
<style type="text/css">
    .swatch .swatch-type .swatch-elements-wrapper .swatch-element.swatch-element-color{position: relative;}
</style>

                    </div>

                </div>

            </div><!-- start size-chart-link.liquid (SNIPPET) -->

            <script>

                const colorss = document.querySelectorAll(".sw-color");

                for (let i = 0; i < colorss.length; i++) {

                    colorss[i].addEventListener('click', function(e) {

                        e.preventDefault()



                        $('.product-slider-featured').slick('slickGoTo', i);

                    })

                }

            </script>





            <div class="size-chart">

                <span class="size-chart-text vasta-size-chart-link" data-modal="size-chart-1">

                    Sizes and Dimensions</span>

            </div><!-- start custom-size-chart.liquid (SNIPPET) -->

            <div class="modal-container modal-container-size-chart-1 jq-sizechart-modal" data-id="size-chart-1">

                <div class="modal-box">

                    <span class="modal-close">x</span>

                    <div class="modal-content">

                        <div class="title modal-title">

                            <div class="modal-set"><span>BOX MATERIAL:</span>

                                <div class="metafield-rich_text_field">

                                    <p>{{ $product->box_material }}</p>

                                </div>

                            </div>

                            <div id="modal-sku" class="modal-set"><span>SKU:</span>

                                <p>{{ $product->SKU }}</p>

                            </div>

                            <div class="modal-set"><span>BOX DIMENSIONS:</span>

                                <div class="metafield-rich_text_field">

                                    <p>Inner: {{ $product->box_dimension_inner }}</p>

                                    <p>Out: {{ $product->box_dimension_outer }}</p>

                                </div>

                            </div>

                            <div class="modal-set"><span>PRODUCT:</span>

                                <div class="metafield-rich_text_field">

                                    <p>{{ $product->box_content }}</p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            <select id="all-product-variants" name="id" class="product-variant all-variant hide"

                data-productid="9365387083935">

                <option selected value="45873008214175" data-available="true" data-options="RED-02" data-sku=""

                    data-price="6898" data-variant-inventory = "shopify" data-inventory_policy = "deny "

                    data-inventory="10" data-compare-at-price=""

                    data-image="files/Stems_RED-02_Another_year_of_love__png_8396c970-b35d-42b1-bad2-b95b9c141c99.Fpng"

                    data-image-position="12">

                    RED-02 / <span class=money>{{ $product->price }}</span>

                </option>





                <option value="45873008246943" data-available="true" data-options="PINK-99" data-sku=""

                    data-price="6898" data-variant-inventory = "shopify" data-inventory_policy = "deny "

                    data-inventory="10" data-compare-at-price=""

                    data-image="files/Stems_PIN-99_Another_year_of_love__png_4eea2298-09ac-43a1-97ac-bee272954358.png"

                    data-image-position="1">

                    PINK-99 / <span class=money>{{ $product->price }}</span>

                </option>





                <option value="45873008312479" data-available="true" data-options="PINK-07" data-sku=""

                    data-price="6898" data-variant-inventory = "shopify" data-inventory_policy = "deny "

                    data-inventory="10" data-compare-at-price=""

                    data-image="files/Stems_PIN-07_Another_year_of_love__png_100aed1b-202b-43f7-8e70-d1ce4fa62fe0.png"

                    data-image-position="4">

                    PINK-07 / <span class=money>{{ $product->price }}</span>

                </option>





                <option value="45873008345247" data-available="true" data-options="PEACH-99" data-sku=""

                    data-price="6898" data-variant-inventory = "shopify" data-inventory_policy = "deny "

                    data-inventory="10" data-compare-at-price=""

                    data-image="files/Stems_PEA-99_Another_year_of_love__png_44eb8f06-08fb-4b5a-8289-b37beabfd7e9.png"

                    data-image-position="24">

                    PEACH-99 / <span class=money>{{ $product->price }}</span>

                </option>





                <option value="45873008378015" data-available="true" data-options="WHITE-01" data-sku=""

                    data-price="6898" data-variant-inventory = "shopify" data-inventory_policy = "deny "

                    data-inventory="10" data-compare-at-price=""

                    data-image="files/Stems_WHI-01_Another_year_of_love__png_e1114e9f-6560-4fc0-b91a-6d399a7f6442.png"

                    data-image-position="18">

                    WHITE-01 / <span class=money>{{ $product->price }}</span>

                </option>





                <option value="45873008410783" data-available="true" data-options="BLACK-01" data-sku=""

                    data-price="6898" data-variant-inventory = "shopify" data-inventory_policy = "deny "

                    data-inventory="10" data-compare-at-price=""

                    data-image="files/Stems_BLA-01_Another_year_of_love__png_155115a7-97b1-401c-b329-a337acbc3b2a.png"

                    data-image-position="10">

                    BLACK-01 / <span class=money>{{ $product->price }}</span>

                </option>





                <option value="45873008443551" data-available="true" data-options="YELLOW-02" data-sku=""

                    data-price="6898" data-variant-inventory = "shopify" data-inventory_policy = "deny "

                    data-inventory="10" data-compare-at-price=""

                    data-image="files/Stems_YEL-02_Another_year_of_love__png_f40968c4-fe72-405e-a5df-4eeb1899a746.png"

                    data-image-position="21">

                    YELLOW-02 / <span class=money>{{ $product->price }}</span>

                </option>





                <option value="45873008476319" data-available="true" data-options="PURPLE-02" data-sku=""

                    data-price="6898" data-variant-inventory = "shopify" data-inventory_policy = "deny "

                    data-inventory="10" data-compare-at-price=""

                    data-image="files/Stems_PUR-02_Another_year_of_love__png_867041ed-2ded-4e7e-b256-27beafb06ae8.png"

                    data-image-position="7">

                    PURPLE-02 / <span class=money>{{ $product->price }}</span>

                </option>





                <option value="45873008509087" data-available="true" data-options="VIOLET-02" data-sku=""

                    data-price="6898" data-variant-inventory = "shopify" data-inventory_policy = "deny "

                    data-inventory="10" data-compare-at-price=""

                    data-image="files/Stems_VIO-03_Another_year_of_love__png_75757b5c-b1de-4e36-bf5b-eba250644c4e.png"

                    data-image-position="15">

                    VIOLET-02 / <span class=money>{{ $product->price }}</span>

                </option>



            </select>

        </div>



        <style scoped>

            :root {

                --swatch_checked-color: #A84F65;

            }

        </style>

    </div>









    <div id="shopify-block-product_options_customizer_product_page_customizer_wKJftK"

        class="shopify-block shopify-app-block">















        <!-- BEGIN app snippet: product-customizer -->

        <div class="product-customizer-options" data-product-id="9365387083935" data-product-price="6898"

            data-version="2.0.0">

            <div class="product-customizer-loading" style="display: none;">

                Loading Your Options<br />

                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"

                    style="margin: auto;background: rgb(255, 255, 255);display: block;shape-rendering: auto;"

                    width="30px" height="30px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">

                    <circle cx="50" cy="50" r="32" stroke-width="8" stroke="#f5323f"

                        stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round">

                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite"

                            dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>

                    </circle>

                </svg>

            </div>



            @if ($product->hasMessage)

                <div class="product-customizer-content">

                    <div class="product-customizer-option option-type-text option-required" data-option-id="757624"

                        data-product-option-id="14425760" data-option-name="engraving-message"><label

                            for="9365387083935_option_1">What do you want to print on

                            your roses?</label>

                        <div>



                            <div class="radio-toolbar">

                                <input type="radio" class="type-element" name="print_type" id="textRadio"

                                    value="text">

                                <label for="textRadio">Text</label>



                                <input type="radio" class="type-element" name="print_type" id="pictureRadio"

                                    value="picture">

                                <label for="pictureRadio">Picture/Logo</label>

                            </div>

                            <style>

                                .radio-toolbar input[type="radio"] {

                                    opacity: 0;

                                    position: fixed;

                                    width: 0;

                                }



                                .radio-toolbar label {

                                    display: inline-block;

                                    background: var(--AddToCartBackground);

                                    color: var(--AddToCartTextColor);

                                    padding: 10px 20px;

                                    font-family: sans-serif, Arial;

                                    font-size: var(--AddToCartFontSize);

                                    font-weight: var(--AddToCartFontWeight);

                                    border-radius: var(--AddToCartBorderRadius);

                                }



                                .radio-toolbar input[type="radio"]:checked+label {

                                    background-color: white;

                                    color: black;

                                    border-color: black;

                                }



                                .radio-toolbar input[type="radio"]:focus+label {

                                    border: 2px dashed #444;

                                    cursor: pointer;

                                }

                            </style>



                            <div>





                                <div style="display: flex; align-items:">

                                    <div id="tg">

                                        <h3 style="margin-bottom: 0px;">Personalized Text</h3>

                                        <input type="text" id="print_text" name="print_text" maxlength="30"

                                            placeholder="" />

                                    </div>



                                    <div id="fg">

                                        <h3 style="margin-bottom: 0px;">Font</h3>

                                        <select name="print_font" id="f">

                                            @foreach ($fonts as $font)

                                                <option value="{{ $font->name }}"

                                                    class="{{ str_replace(' ', '-', $font->name) }}">

                                                    {{ $font->name }}

                                                </option>

                                            @endforeach



                                        </select>

                                    </div>

                                </div>





                                <div class="radio-swatches" id="radioSwatches">

                                    <h3 style="margin-bottom: 0px;">Ink</h3>

                                    @foreach ($inks as $ink)

                                        <input class="sw-element" style="background-color: {{ $ink->color }};"

                                            type="radio" id="sw-ink" name="print_color"

                                            value="{{ $ink->color }}">

                                    @endforeach





                                </div>



                            </div>

                            <style>

                                .sw-element {

                                    height: 40px;

                                    width: 40px;

                                    border-radius: 100%;

                                    cursor: pointer;

                                    box-shadow: 1px 0px 5px 0px #9c9898;

                                }



                                .sw-element:checked {

                                    background-color: #bfb;

                                    border-color: #4c4;

                                }



                                .sw-element:focus {

                                    border: 2px dashed #444;

                                }

                            </style>



                            <div id="imageOption">

                                <input type="file" class="customer-form__input" name="print_image"

                                    id="upload-button">

                            </div>





                        </div>

                    </div>



                    <script>

                        var textRadio = document.getElementById('textRadio');

                        var pictureRadio = document.getElementById('pictureRadio');

                        var tb = document.getElementById('tg');

                        var fb = document.getElementById('fg');

                        var cb = document.getElementById('radioSwatches');

                        var imageBox = document.getElementById('imageOption');

                        tb.style.display = 'none';

                        fb.style.display = 'none';

                        cb.style.display = 'none';

                        imageBox.style.display = 'none';



                        textRadio.addEventListener('click', function() {

                            var image = document.getElementById('edit-image');

                            var input = document.getElementById('upload-button')

                            input.value = ""

                            image.style.display = "none"

                            tb.style.display = 'block';

                            fb.style.display = 'block';

                            cb.style.display = 'block';

                            imageBox.style.display = 'none';

                        });



                        pictureRadio.addEventListener('click', function() {

                            var image = document.getElementById('edit-image');

                            var text = document.getElementById('print_text');

                            image.style.display = "block"

                            text.value = ""

                            document.getElementById('print_text_preview').innerHTML = ""

                            tb.style.display = 'none';

                            fb.style.display = 'none';

                            cb.style.display = 'none';

                            imageBox.style.display = 'block';

                        });

                    </script>

                    <script>

                        var textBox = document.getElementById('print_text');

                        var fontBox = document.getElementById('f');



                        textBox.addEventListener('input', function() {

                            var text = textBox.value;

                            var font = document.getElementById('f').value;

                            var color = findSelection('.sw-element')





                            document.getElementById('print_text_preview').innerHTML =

                                '<span id="newText" style="font-size: 35px; font-family: ' +

                                font + '; color: ' + color +

                                '">' +

                                text +

                                '</span>';

                        });



                        fontBox.addEventListener('change', function() {

                            var text = textBox.value;

                            var font = document.getElementById('f').value;

                            var color = findSelection('.sw-element')





                            document.getElementById('print_text_preview').innerHTML =

                                '<span id="newText" style="font-size: 35px; font-family: ' +

                                font + '; color: ' + color +

                                '">' +

                                text +

                                '</span>';

                        });



                        var colorBlacks = document.querySelectorAll('#sw-ink')



                        for (let i = 0; i < colorBlacks.length; i++) {

                            colorBlacks[i].addEventListener('click', function() {

                                var color2 = colorBlacks[i].value;



                                var text = document.getElementById('newText')

                                text.style.color = color2;

                            })

                        }





                        function findSelection(field) {

                            var test = document.querySelectorAll(field)

                            var sizes = test;



                            for (i = 0; i < sizes.length; i++) {

                                if (sizes[i].checked == true) {

                                    return sizes[i].value;

                                }

                            }

                        }

                    </script>

                </div>

            @endif



        </div>

        <!-- END app snippet -->









        <!-- BEGIN app snippet: product-customizer-asw -->

        <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"

            as="style" onload="this.onload=null;this.rel='stylesheet'">

        <style>

            #asw-core-loading {

                position: fixed;

                top: 50%;

                left: 0;

                z-index: 99999;

                box-shadow: 0px 0px 20px #006e52;

                background-color: #006e52;

                border-radius: 0px 5px 5px 0px;

                text-align: center;

                padding: 10px;

                color: white;

            }



            .asw-core-hidden {

                display: none !important;

            }

        </style>

        <div id="asw-core-loading" class="animate__animated animate__pulse animate__infinite asw-core-hidden">

            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="45.000000pt" height="45.000000pt"

                viewBox="0 0 65.000000 75.000000" preserveAspectRatio="xMidYMid meet">

                <g transform="translate(0.000000,75.000000) scale(0.100000,-0.100000)" fill="#ffffff" stroke="none">

                    <path d="M408 645 c-8 -19 -8 -31 0 -51 10 -21 18 -25 44 -22 17 2 33 9 36 16

 3 9 -5 12 -24 10 -21 -2 -29 2 -32 16 -6 28 12 40 39 25 13 -6 27 -17 31 -23

 5 -7 8 -6 8 4 -1 51 -81 71 -102 25z"></path>

                    <path d="M320 645 c-30 -7 -71 -16 -90 -20 -19 -4 -56 -14 -82 -22 -45 -14

 -48 -17 -48 -48 0 -55 19 -58 166 -28 71 14 130 27 132 28 2 2 -4 15 -13 29

 -11 16 -15 35 -11 51 4 14 5 25 4 24 -2 0 -28 -6 -58 -14z"></path>

                    <path d="M508 544 c-4 -23 -13 -46 -20 -51 -7 -6 -47 -15 -88 -22 -84 -14

 -100 -23 -83 -49 9 -16 18 -100 14 -140 0 -8 -10 -12 -23 -10 -21 3 -23 10

 -26 62 -2 32 0 66 4 75 4 9 8 24 9 34 3 26 19 34 87 41 81 10 108 21 108 46 0

 16 -5 20 -17 16 -10 -2 -91 -20 -181 -38 l-162 -32 2 -155 c2 -108 7 -156 15

 -158 8 -3 13 11 15 38 3 49 27 71 52 50 12 -10 16 -32 16 -88 0 -66 2 -74 18

 -71 13 2 18 17 22 68 5 61 6 65 30 65 22 0 26 -5 30 -39 5 -39 26 -60 34 -34

 3 7 7 34 11 60 4 34 12 51 26 59 29 15 59 -14 59 -58 0 -28 3 -33 25 -33 34 0

 36 15 33 225 -2 117 -6 166 -10 139z"></path>

                </g>

            </svg>

            <div id="asw-core-loading-text">

            </div>

        </div>























        <script>

            window.aswm_on_product_page = true;

            window.this_product_variants =

                `45873008214175, 45873008246943, 45873008312479, 45873008345247, 45873008378015, 45873008410783, 45873008443551, 45873008476319, 45873008509087`

                .split(',').map(function(vid) {

                    return Number(vid);

                });

        </script>















        <!-- END app snippet -->



        <!-- BEGIN app snippet: product-page-css-settings -->

        <style class="pc_css_settings">

            .product-customizer-options {

                width: 100% !important;

            }



            .product-customizer-customizations-total {

                display: initial !important;

            }



            .product-customizer-option>label {

                color: #000000 !important;

                font-size: 14px !important;

                font-weight: unset !important;

                margin-top: 0px !important;

                margin-bottom: 0 !important;

            }



            .product-customizer-option select,

            .product-customizer-option textarea,

            .product-customizer-option input:not([type='radio'],

            [type='checkbox']),

            .product-customizer-option.option-type-swatch .product-customizer-swatch__trigger {

                vertical-align: middle !important;

                background-color: #FFFFFF !important;

                color: #000000 !important;

                border-color: #000000 !important;

                width: 100% !important;

                border-width: 1px !important;

                border-style: solid !important;

                border-radius: nonepx !important;

                font-size: 14px !important;

                font-weight: none !important;

                margin-top: 0px !important;

                margin-bottom: 0px !important;

                padding: 10px !important;

            }



            .product-customizer-options .product-customizer-option .product-customizer-upswatch-wrapper ul li label {

                background-color: #FFFFFF !important;

                width: 100% !important;

                border-radius: nonepx !important;

                margin-top: 0px !important;

                margin-bottom: 0px !important;

            }



            .product-customizer-options .product-customizer-option .product-customizer-upswatch-wrapper ul li label picture {

                border-color: #000000 !important;

                border-width: 1px !important;

                border-style: solid !important;

                border-radius: nonepx !important;

                padding: 0 !important;

            }



            .product-customizer-options .product-customizer-option .product-customizer-upswatch-wrapper ul li label .option-value,

            .product-customizer-options .product-customizer-option .product-customizer-upswatch-wrapper ul li label .option-price {

                color: #000000 !important;

                font-size: 14px !important;

                font-weight: none !important;

            }







            .product-customizer-loading {

                text-align: center;

            }

        </style>

        <!-- END app snippet -->

        <!-- BEGIN app snippet: product-page-js-settings -->



        <!-- END app snippet -->



    </div>









    <div id="shopify-block-zepto_product_personalizer_product_personalizer_page_PtQGTQ"

        class="shopify-block shopify-app-block">

        <!-- BEGIN app snippet: product-personalizer -->















        <!-- END app snippet -->



    </div>







    <div class="" style="width: 100%; height: 200px;">

        <div class="">

            <span class="">

                <strong>Quantity</strong>

            </span>

            <div class="d-flex mb-3">

                <button id="ButtonMinus" type="button" class="btn btn-minus btn--minus"

                    style="width: 40px; height: 40px; border: 2px solid black;">

                    <i class="fa fa-minus"></i>

                </button>

                <input id="quantityInput" class="quantity text-center mx-2 fw-bold" name="quantity"

                    style="width: 40px; height: 40px;" step="1" value="1" type="number">

                <button id="ButtonPlus" aria-label="ButtonPlus" type="button" class="btn btn-plus"

                    style="width: 40px; height: 40px;border: 2px solid black;">

                    <i class="fa fa-plus"></i>

                </button>

                <style>

                    input::-webkit-outer-spin-button,

                    input::-webkit-inner-spin-button {

                        -webkit-appearance: none;

                        margin: 0;

                    }



                    /* Firefox */

                    input[type=number] {

                        -moz-appearance: textfield;

                    }

                </style>



            </div>

            <span id="StockWarning" class="stock-wrn">

                <span>Maximum Quantity</span>

                <span>Available In Stock</span>

            </span>

        </div>





        <!-- snippets/priority-processing.liquid -->











        <style scoped>

            .priority-processing {

                width: 100%;

                margin: 13px 0 11.7px;

                float: left;

            }



            .priority-processing a:hover {

                text-decoration: underline;

            }



            .priority-processing__wrapper {

                display: flex;

                align-items: center;

                justify-content: center;

                gap: 11.66px;

                width: 100%;

                cursor: pointer;



                border-radius: 7px;

                border: 1px dashed #AAA;



                padding: 4px;

            }



            .priority-processing__input {

                display: none;

            }



            .priority-processing__box {

                width: 16px;

                height: 16px;

                border: 1px solid #000;

                flex-shrink: 0;

            }



            .priority-processing__box-fill {

                display: block;

                width: 100%;

                height: 100%;

                line-height: 1;

            }



            .priority-processing__box-fill svg {

                max-width: 100%;

                max-height: 100%;

                fill: #fff;

                padding: 2px;

            }



            .priority-processing__input:checked+.priority-processing__box .priority-processing__box-fill {

                background: #000;

            }



            .priority-processing__label {

                line-height: 1;

                display: block;

                padding: 2px 0 0;

            }



            #priority-processing-form .priority-processing__label * {

                margin-bottom: 0px;

                font-size: 16px;

                line-height: 1;

            }



            .priority-processing__modal-wrapper {

                position: fixed;

                top: 0;

                left: 0;

                width: 100%;

                height: 100%;

                display: flex;

                justify-content: center;

                align-items: center;

                z-index: 152;

                opacity: 0;

                visibility: hidden;

                transition: all .3s linear;

            }



            body.priority-processing__modal--opened {

                overflow: hidden;

            }



            body.priority-processing__modal--opened .priority-processing__modal-wrapper {

                opacity: 1;

                visibility: visible;

            }



            .priority-processing__modal-overlay {

                display: block;

                width: 100%;

                height: 100%;

                background-color: rgba(0, 0, 0, 0.4);

                position: absolute;

                top: 0;

                left: 0;

            }



            .priority-processing__modal-box {

                width: 640px;

                background-color: #fff;

                border-radius: 10px;

                box-shadow: 0 2px 3px 5px rgba(0, 0, 0, 0.3);

                position: relative;

                z-index: 1;

                padding: 0;

            }



            .priority-processing__modal-content {

                padding: 20px;

                max-height: 95vh;

                overflow-y: auto;

            }



            .priority-processing__modal-close {

                position: absolute;

                top: 0;

                right: 0;

                width: 30px;

                height: 30px;

                transform: translate(50%, -50%);

                border-radius: 100%;

                background-color: #fff;

                display: flex;

                justify-content: center;

                align-items: center;

                cursor: pointer;

            }



            .priority-processing__modal-close:before {

                content: "\00d7";

                font-size: 2.3rem;

                line-height: 1;

                display: inline-block;

                padding-top: 4px;

            }



            @media (max-width: 1019px) {

                .priority-processing {

                    width: auto;

                    margin-bottom: 11.1px;

                }



                .priority-processing__wrapper {

                    justify-content: flex-start;

                    padding: 4px 7px;

                    gap: 10px;

                }



                #priority-processing-form .priority-processing__label * {

                    font-size: 14px;

                }

            }



            @media (max-width: 767px) {

                .priority-processing {

                    width: 100%;

                    margin: 5px 0 12px;

                }



                .priority-processing__label {

                    padding: 0;

                }



                #priority-processing-form .priority-processing__label * {

                    font-size: 12px;

                }



                .priority-processing__wrapper {

                    padding: 2px;

                    gap: 3px;

                }



                .priority-processing__box {

                    width: 10px;

                    height: 10px;

                }

            }

        </style>





















        <div class="product-form__buttons">

            <button type="submit" class=" cart-icon btn btn-add-tocart " id="AddToCarts">

                <div class="text-btn">

                    <span class="btn-money">

                        <span>$<span id="singlePrice">{{ $product->price }}</span> </span></span>

                    <span class="divisor">|</span><span class="btn-label">Add To

                        Cart</span><span class="subtotal-money"></span>

                    <span class="btn-svg"><!-- start icon-cart-layout-03.liquid (SNIPPETS) -->

                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none"

                            xmlns="http://www.w3.org/2000/svg">

                            <path

                                d="M0.365234 1.25457C0.365234 0.921834 0.497411 0.60273 0.732688 0.367453C0.967964 0.132177 1.28707 0 1.6198 0H2.5532C4.14231 0 5.09578 1.06889 5.63943 2.0625C6.00241 2.72492 6.26504 3.49271 6.47078 4.18857C6.52644 4.18418 6.58224 4.18195 6.63806 4.18188H27.5441C28.9325 4.18188 29.9362 5.51005 29.5548 6.84658L26.497 17.5673C26.2228 18.5288 25.6428 19.3749 24.8448 19.9774C24.0467 20.5798 23.0741 20.9058 22.0742 20.9061H12.1247C11.1168 20.9061 10.1369 20.5752 9.33542 19.9641C8.53395 19.353 7.95535 18.4957 7.68855 17.5238L6.41726 12.8869L4.30959 5.78104L4.30791 5.76765C4.04696 4.8192 3.80274 3.93097 3.43808 3.26856C3.08848 2.62455 2.80745 2.50913 2.55487 2.50913H1.6198C1.28707 2.50913 0.967964 2.37695 0.732688 2.14168C0.497411 1.9064 0.365234 1.5873 0.365234 1.25457ZM8.85111 12.278L10.1074 16.8597C10.3583 17.7663 11.1829 18.3969 12.1247 18.3969H22.0742C22.5287 18.3969 22.9708 18.2488 23.3336 17.9751C23.6964 17.7013 23.9602 17.3168 24.0849 16.8798L26.9904 6.69101H7.19843L8.82769 12.1894L8.85111 12.278Z"

                                fill="black" />

                            <path

                                d="M14.5836 25.9275C14.5836 26.8148 14.2311 27.6658 13.6037 28.2932C12.9763 28.9206 12.1254 29.273 11.2381 29.273C10.3508 29.273 9.49986 28.9206 8.87245 28.2932C8.24505 27.6658 7.89258 26.8148 7.89258 25.9275C7.89258 25.0403 8.24505 24.1893 8.87245 23.5619C9.49986 22.9345 10.3508 22.582 11.2381 22.582C12.1254 22.582 12.9763 22.9345 13.6037 23.5619C14.2311 24.1893 14.5836 25.0403 14.5836 25.9275V25.9275ZM12.0745 25.9275C12.0745 25.7057 11.9863 25.493 11.8295 25.3361C11.6726 25.1793 11.4599 25.0912 11.2381 25.0912C11.0163 25.0912 10.8035 25.1793 10.6467 25.3361C10.4898 25.493 10.4017 25.7057 10.4017 25.9275C10.4017 26.1494 10.4898 26.3621 10.6467 26.5189C10.8035 26.6758 11.0163 26.7639 11.2381 26.7639C11.4599 26.7639 11.6726 26.6758 11.8295 26.5189C11.9863 26.3621 12.0745 26.1494 12.0745 25.9275Z"

                                fill="black" />

                            <path

                                d="M26.2926 25.9275C26.2926 26.8148 25.9401 27.6658 25.3127 28.2932C24.6853 28.9206 23.8344 29.273 22.9471 29.273C22.0598 29.273 21.2088 28.9206 20.5814 28.2932C19.954 27.6658 19.6016 26.8148 19.6016 25.9275C19.6016 25.0403 19.954 24.1893 20.5814 23.5619C21.2088 22.9345 22.0598 22.582 22.9471 22.582C23.8344 22.582 24.6853 22.9345 25.3127 23.5619C25.9401 24.1893 26.2926 25.0403 26.2926 25.9275V25.9275ZM23.7834 25.9275C23.7834 25.7057 23.6953 25.493 23.5385 25.3361C23.3816 25.1793 23.1689 25.0912 22.9471 25.0912C22.7252 25.0912 22.5125 25.1793 22.3557 25.3361C22.1988 25.493 22.1107 25.7057 22.1107 25.9275C22.1107 26.1494 22.1988 26.3621 22.3557 26.5189C22.5125 26.6758 22.7252 26.7639 22.9471 26.7639C23.1689 26.7639 23.3816 26.6758 23.5385 26.5189C23.6953 26.3621 23.7834 26.1494 23.7834 25.9275Z"

                                fill="black" />

                        </svg>

                    </span>

                    <!--span class="btn-items">1 Item</span><span class="btn-progress"></span-->

                </div>

            </button>

        </div>

        {{-- heart button --}}

        {{-- <button 

                                            class="swym-button swym-add-to-wishlist btn btn-wishlist stock"

                                            data-with-epi="true" data-swaction="addToWishlist"

                                            data-product-id="9365387083935" data-variant-id="45873008214175"

                                            data-product-url="https://speakingroses.com/products/another-year-of-love-acrylic-round-box-1-preserved-stem">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="69" height="58"

                                                viewBox="0 0 69 58" fill="none">

                                                <path

                                                    d="M25.5737 22.2072C23.5252 24.2557 23.5252 27.5768 25.5737 29.6253L34.5282 38.5797L43.4824 29.6253C45.5308 27.5768 45.5308 24.2557 43.4824 22.2072C41.4339 20.1588 38.1128 20.1588 36.0643 22.2072L34.5282 23.7436L32.9917 22.2072C30.9433 20.1588 27.6221 20.1588 25.5737 22.2072Z"

                                                    stroke="#252525" stroke-width="2.33126" stroke-linecap="round"

                                                    stroke-linejoin="round" />

                                            </svg>

                                        </button> --}}





        <button type="submit" class="cart-icon btn btn-add-tocart AddToCartFixed no-show" id="AddToCart3"><span

                class="btn-money"><span class=money>${{ $product->price }}</span>

                | Add To Cart </span>

            <!-- <span class="divisor">|</span> --><!-- <span class="btn-label">Add To Cart</span>-->

            <span class="btn-svg"><!-- start icon-cart-layout-03.liquid (SNIPPETS) -->

                <svg width="30" height="30" viewBox="0 0 30 30" fill="none"

                    xmlns="http://www.w3.org/2000/svg">

                    <path

                        d="M0.365234 1.25457C0.365234 0.921834 0.497411 0.60273 0.732688 0.367453C0.967964 0.132177 1.28707 0 1.6198 0H2.5532C4.14231 0 5.09578 1.06889 5.63943 2.0625C6.00241 2.72492 6.26504 3.49271 6.47078 4.18857C6.52644 4.18418 6.58224 4.18195 6.63806 4.18188H27.5441C28.9325 4.18188 29.9362 5.51005 29.5548 6.84658L26.497 17.5673C26.2228 18.5288 25.6428 19.3749 24.8448 19.9774C24.0467 20.5798 23.0741 20.9058 22.0742 20.9061H12.1247C11.1168 20.9061 10.1369 20.5752 9.33542 19.9641C8.53395 19.353 7.95535 18.4957 7.68855 17.5238L6.41726 12.8869L4.30959 5.78104L4.30791 5.76765C4.04696 4.8192 3.80274 3.93097 3.43808 3.26856C3.08848 2.62455 2.80745 2.50913 2.55487 2.50913H1.6198C1.28707 2.50913 0.967964 2.37695 0.732688 2.14168C0.497411 1.9064 0.365234 1.5873 0.365234 1.25457ZM8.85111 12.278L10.1074 16.8597C10.3583 17.7663 11.1829 18.3969 12.1247 18.3969H22.0742C22.5287 18.3969 22.9708 18.2488 23.3336 17.9751C23.6964 17.7013 23.9602 17.3168 24.0849 16.8798L26.9904 6.69101H7.19843L8.82769 12.1894L8.85111 12.278Z"

                        fill="black" />

                    <path

                        d="M14.5836 25.9275C14.5836 26.8148 14.2311 27.6658 13.6037 28.2932C12.9763 28.9206 12.1254 29.273 11.2381 29.273C10.3508 29.273 9.49986 28.9206 8.87245 28.2932C8.24505 27.6658 7.89258 26.8148 7.89258 25.9275C7.89258 25.0403 8.24505 24.1893 8.87245 23.5619C9.49986 22.9345 10.3508 22.582 11.2381 22.582C12.1254 22.582 12.9763 22.9345 13.6037 23.5619C14.2311 24.1893 14.5836 25.0403 14.5836 25.9275V25.9275ZM12.0745 25.9275C12.0745 25.7057 11.9863 25.493 11.8295 25.3361C11.6726 25.1793 11.4599 25.0912 11.2381 25.0912C11.0163 25.0912 10.8035 25.1793 10.6467 25.3361C10.4898 25.493 10.4017 25.7057 10.4017 25.9275C10.4017 26.1494 10.4898 26.3621 10.6467 26.5189C10.8035 26.6758 11.0163 26.7639 11.2381 26.7639C11.4599 26.7639 11.6726 26.6758 11.8295 26.5189C11.9863 26.3621 12.0745 26.1494 12.0745 25.9275Z"

                        fill="black" />

                    <path

                        d="M26.2926 25.9275C26.2926 26.8148 25.9401 27.6658 25.3127 28.2932C24.6853 28.9206 23.8344 29.273 22.9471 29.273C22.0598 29.273 21.2088 28.9206 20.5814 28.2932C19.954 27.6658 19.6016 26.8148 19.6016 25.9275C19.6016 25.0403 19.954 24.1893 20.5814 23.5619C21.2088 22.9345 22.0598 22.582 22.9471 22.582C23.8344 22.582 24.6853 22.9345 25.3127 23.5619C25.9401 24.1893 26.2926 25.0403 26.2926 25.9275V25.9275ZM23.7834 25.9275C23.7834 25.7057 23.6953 25.493 23.5385 25.3361C23.3816 25.1793 23.1689 25.0912 22.9471 25.0912C22.7252 25.0912 22.5125 25.1793 22.3557 25.3361C22.1988 25.493 22.1107 25.7057 22.1107 25.9275C22.1107 26.1494 22.1988 26.3621 22.3557 26.5189C22.5125 26.6758 22.7252 26.7639 22.9471 26.7639C23.1689 26.7639 23.3816 26.6758 23.5385 26.5189C23.6953 26.3621 23.7834 26.1494 23.7834 25.9275Z"

                        fill="black" />

                </svg>

            </span>

            <span class="btn-items">1 Item</span><span class="btn-progress"></span>

        </button>

        <div id="add-to-cart-error" class="add-to-cart-errors add-to-cart--error hide">

        </div>

    </div>



    <div id="button-out-of-stock" class="btn btn-choose-variant hide">

        <span class="btn-label">(Out of Stock)</span>

    </div>



    <span class="invetoryError"></span>





    <div class="trust-badges"><!-- start trust-badges.liquid (SNIPPET) -->

        <div id="shopify-section-trust-badges" class="shopify-section trust-badges-wrapper">

            <div class="container-trust-badges">

                <div class="container-trust-badges-bottom">

                    <div class="trust-badges-img col-4">

                        <div class="custom-svg"><svg xmlns="http://www.w3.org/2000/svg" width="50"

                                height="50" viewbox="0 0 54 55" fill="none">

                                <path

                                    d="M49.8262 26.9694C50.1516 26.2303 50.4798 25.4947 50.7786 24.8251C52.4886 20.9931 52.4805 20.9602 52.3825 20.558C51.064 15.147 45.4919 12.6078 44.0863 12.0463C43.3458 10.301 41.9613 8.32771 39.3773 6.8376C35.1111 4.37745 33.4627 0.698546 33.4473 0.663547C33.3296 0.391377 33.082 0.197253 32.7895 0.148022C32.695 0.132156 30.4443 -0.236493 27.8015 0.253017C25.4972 0.679997 23.6091 1.62903 22.2088 3.04367C20.7053 1.83086 18.6623 1.38556 17.2096 1.22632C15.7676 1.06824 14.3508 1.13591 14.009 1.25187C13.7236 1.34881 13.4981 1.59159 13.4288 1.88499C13.2191 2.77243 12.5658 3.77128 11.9339 4.73735C10.935 6.26433 9.9046 7.84042 10.1291 9.52804C6.58163 11.4002 2.82164 14.935 2.25887 15.4727C2.15761 15.5694 2.08108 15.689 2.0357 15.8214C2.00618 15.9072 1.311 17.9533 0.955534 20.6783C0.469874 24.403 0.845872 27.4706 2.07315 29.7956C2.10966 29.8649 2.14909 29.9314 2.18712 29.9991C1.06496 32.0527 1.49859 33.925 1.88194 35.5779C2.18059 36.8653 2.43841 37.9771 2.01773 39.0929C1.92184 39.3479 1.9517 39.6374 2.09578 39.8685C2.40936 40.3711 6.49192 43.2876 10.7894 43.7341C10.8613 44.0249 10.9537 44.3189 11.0748 44.6142C12.0528 46.9972 14.4236 48.8974 18.1215 50.262C20.0138 50.9602 21.3508 51.6228 22.5304 52.2073C23.991 52.931 25.2522 53.556 26.906 53.8794C27.3672 53.9696 27.8373 54.0143 28.3134 54.0143C30.5569 54.0143 32.9328 53.0232 35.1383 51.1417C35.5801 50.7648 36.2123 50.3958 36.8814 50.0052C39.1802 48.6635 42.314 46.831 42.1353 42.1491C42.5376 41.9274 42.9322 41.6893 43.3169 41.4265C43.3731 41.4845 43.4378 41.536 43.5115 41.5781C43.8609 41.7774 44.2084 41.8666 44.5543 41.8666C46.0992 41.8666 47.6096 40.0844 49.0788 38.3507C50.1803 37.0508 51.4288 35.5776 52.4444 35.1718C52.7046 35.0676 53.154 34.7738 53.2367 33.976C53.4065 32.344 51.9317 28.6391 49.8262 26.9694ZM50.6297 20.7682C50.443 21.2828 49.7762 22.7775 49.1805 24.112C48.2931 26.1008 47.519 27.8507 46.9712 29.2C46.8752 28.901 46.7763 28.6001 46.6765 28.2974C46.1892 26.8174 45.6854 25.2871 45.4902 23.77C45.3062 22.3398 44.9151 21.108 44.3243 20.0806C44.9763 18.3732 45.132 16.2716 44.7615 14.2936C46.6554 15.2925 49.7042 17.3752 50.6297 20.7682ZM39.2675 41.6202C37.4938 42.4541 35.4834 43.3993 33.4412 45.1923C30.807 47.5048 27.4719 46.7112 25.2992 44.932C25.8858 44.5062 26.4378 43.9908 26.9469 43.3894C28.9985 43.1314 31.1016 42.3957 33.0835 41.207C36.6878 39.0457 39.4363 35.6416 40.6246 31.8676C42.1575 26.9988 40.525 21.6645 37.9448 18.2648C38.8623 18.2869 40.2242 18.4912 41.4001 19.3572C42.6889 20.3065 43.4812 21.8662 43.7547 23.9933C43.971 25.676 44.5015 27.2869 45.0146 28.8448C45.8096 31.2595 46.5608 33.5404 45.8237 35.4015C44.2972 39.2555 42.0776 40.2989 39.2675 41.6202ZM11.418 36.6321C10.6723 35.0131 9.74501 33.9465 8.92687 33.0055C7.8005 31.71 6.91073 30.6866 6.62141 28.5439C5.95143 23.581 9.07304 18.7906 12.3501 16.8029C13.2522 16.2558 14.1023 15.9641 14.8041 15.9397C12.8984 18.0663 10.7777 21.5797 10.8475 25.0287C10.8895 27.1061 11.7191 28.8176 13.3133 30.1159C13.7339 30.4584 14.1686 30.7598 14.6146 31.0206C14.1157 32.5653 14.3455 34.8445 15.2488 36.9335C16.0098 38.6935 17.9196 41.83 22.1586 43.059C22.8675 43.2645 23.6046 43.395 24.3595 43.4552C23.108 44.3983 21.6811 44.7947 20.1555 44.6089C16.8463 44.2062 13.4983 41.1496 11.418 36.6321ZM16.0286 8.59312C17.4373 7.5266 20.3496 6.06052 24.026 8.22353C26.6873 9.78947 29.2675 10.3839 31.3406 10.8614C34.1947 11.5187 35.7113 11.9428 36.2955 13.6822C36.685 14.8421 35.9201 15.6049 35.5632 15.8855C33.7576 14.5811 31.8237 14.1927 30.1109 14.8152C29.2289 14.0027 28.1791 13.353 26.9848 12.8973C23.4122 11.5339 19.3099 12.157 16.3561 14.4671C15.2681 14.0062 13.9004 14.116 12.4331 14.7815C12.5035 12.6406 14.2038 9.9745 16.0286 8.59312ZM22.6459 41.3785C19.0957 40.3491 17.4939 37.7166 16.8549 36.2391C16.0938 34.4788 15.9683 32.7868 16.2203 31.7634C16.6067 31.8981 16.9991 32.0048 17.3965 32.0825C18.3164 34.3682 20.6773 36.2068 23.4105 36.7217C23.9432 36.8222 24.4755 36.8716 25.0039 36.8716C27.7843 36.8716 30.4581 35.5018 32.5196 32.9705C34.9055 30.0408 37.1149 26.0157 33.1284 20.7786C32.8915 19.0833 32.3007 17.5654 31.4055 16.293C33.0106 16.098 34.4877 17.1802 35.2893 17.9192C38.2959 20.6913 40.4893 26.4699 38.9554 31.3419C37.8938 34.7133 35.4256 37.762 32.1835 39.7062C29.0133 41.6074 25.537 42.2166 22.6459 41.3785ZM17.0373 16.1735C19.4947 14.0013 23.2418 13.3419 26.361 14.5322C27.6089 15.0084 29.531 16.0882 30.6376 18.4148C29.2451 17.4809 27.6359 16.8981 25.9598 16.7502C23.7512 16.5557 21.6729 17.1688 20.2562 18.4332C17.6843 20.7288 16.7418 23.5501 17.6703 26.1737C18.3279 28.0321 19.8826 29.5172 21.5888 30.0264C19.8246 30.6653 17.1374 30.9735 14.4183 28.7594C13.2409 27.8005 12.6281 26.5335 12.597 24.9937C12.5499 22.6621 14.0901 18.7787 17.0373 16.1735ZM23.2434 28.6595C22.7224 28.2353 22.398 27.6336 22.3296 26.9654C22.2612 26.2971 22.4572 25.6421 22.8814 25.1212C23.3056 24.6003 23.9073 24.2757 24.5755 24.2074C24.6627 24.1984 24.7496 24.1941 24.8362 24.1941C25.4124 24.1941 25.9666 24.3904 26.4196 24.7593C27.495 25.6351 27.6573 27.2224 26.7816 28.2977C26.3573 28.8186 25.7557 29.1432 25.0875 29.2116C24.4196 29.2799 23.7642 29.0837 23.2434 28.6595ZM24.8237 30.9749C24.9702 30.9749 25.1178 30.9674 25.2656 30.9523C26.399 30.8363 27.4193 30.286 28.1386 29.4026C29.6236 27.5791 29.3483 24.8874 27.5249 23.4023C26.6415 22.683 25.5307 22.3504 24.3975 22.4666C23.2642 22.5825 22.2438 23.1328 21.5245 24.0162C20.8051 24.8995 20.4727 26.0101 20.5887 27.1435C20.6021 27.2749 20.622 27.4046 20.647 27.5327C20.0671 27.0247 19.5877 26.3465 19.32 25.5898C18.6305 23.6416 19.3768 21.5636 21.4215 19.7386C22.4791 18.7945 24.0768 18.3407 25.806 18.4932C28.0623 18.6925 30.1759 19.8494 31.6045 21.6676C34.8094 25.7458 33.7457 28.6938 31.1628 31.8655C28.3761 35.2873 25.3131 35.2995 23.7347 35.0021C21.9131 34.6589 20.3114 33.5999 19.4338 32.2305C19.7067 32.2176 19.9807 32.1929 20.2557 32.154C21.1288 32.0306 22.4648 31.7068 23.8911 30.8709C24.195 30.9394 24.5073 30.9749 24.8237 30.9749ZM28.0723 1.98275C29.7821 1.6589 31.3408 1.74745 32.0676 1.82047C32.6836 2.98919 34.5999 6.10275 38.5031 8.35349C41.3896 10.018 42.5002 12.3788 42.9235 14.0662C43.326 15.6707 43.2571 17.2104 42.9954 18.4087C42.8181 18.246 42.6328 18.0918 42.4378 17.9482C40.607 16.5997 38.4901 16.4744 37.3706 16.5229C37.9864 15.7213 38.4321 14.5477 37.9542 13.1252C37.0311 10.3765 34.5761 9.81106 31.7334 9.15624C29.6753 8.68213 27.3425 8.14479 24.9134 6.71546C24.0384 6.20063 23.1981 5.85368 22.3983 5.63634C23.5478 3.707 25.4511 2.47914 28.0723 1.98275ZM13.3985 5.69537C13.9905 4.7902 14.5993 3.85959 14.95 2.89259C16.1723 2.83671 19.2905 2.93949 21.1077 4.40335C20.9098 4.70387 20.7277 5.01827 20.5629 5.34714C18.0748 5.24214 16.123 6.32733 14.9726 7.19797C14.5075 7.55005 14.0699 7.94553 13.6652 8.37228C13.1104 8.39304 12.5061 8.52942 11.8745 8.75096C12.0061 7.82665 12.6856 6.78522 13.3985 5.69537ZM3.62707 16.5885C4.11786 16.1319 5.68544 14.7022 7.54618 13.3013C9.54447 11.7969 10.9952 10.985 12.0304 10.5585C11.0163 12.3018 10.5116 14.2059 10.7483 15.7644C7.18943 18.2932 4.15636 23.3653 4.88713 28.7782C5.02024 29.7644 5.26896 30.5743 5.58814 31.2714C4.77152 30.681 4.11973 29.9225 3.62287 28.9825C1.30902 24.605 3.24011 17.8326 3.62707 16.5885ZM3.58694 35.1827C3.29587 33.9276 3.03735 32.811 3.38337 31.6472C4.46143 32.8019 5.85845 33.6234 7.55878 34.099C7.57465 34.1172 7.59051 34.1355 7.60626 34.1537C8.38369 35.0479 9.18772 35.9724 9.82854 37.3642C10.2197 38.2136 10.6567 39.0212 11.1309 39.7805C11.1192 39.8011 11.1076 39.8219 11.0973 39.8437C10.8412 40.3899 10.6448 41.1216 10.6089 41.9497C7.63158 41.5318 4.87033 39.8272 3.84558 39.0915C4.17445 37.7163 3.87638 36.431 3.58694 35.1827ZM35.9998 48.4941C35.2612 48.9252 34.5635 49.3324 34.003 49.8106C31.7438 51.7379 29.343 52.5733 27.2422 52.1623C25.819 51.884 24.7108 51.3349 23.3077 50.6396C22.0889 50.0357 20.7074 49.3511 18.7277 48.6206C15.5536 47.4493 13.4672 45.8344 12.6941 43.9502C12.3118 43.0185 12.3043 42.1864 12.3969 41.5774C12.9894 42.3206 13.6221 42.9937 14.2865 43.5836C16.0572 45.156 18.0134 46.1112 19.9439 46.3463C20.2562 46.3843 20.5661 46.4031 20.8731 46.4031C21.8488 46.4031 22.7944 46.2122 23.6869 45.8414C23.6978 45.8527 23.7081 45.8643 23.7196 45.8752C25.091 47.1566 26.8905 48.0383 28.6566 48.294C29.0312 48.3483 29.4012 48.3752 29.7666 48.3752C31.5396 48.3752 33.1918 47.7399 34.5957 46.5074C36.4519 44.8777 38.2618 44.0268 40.012 43.2039C40.1343 43.1464 40.2562 43.089 40.3779 43.0315C40.1667 46.0616 38.0517 47.2965 35.9998 48.4941ZM47.7442 37.2194C46.9581 38.1471 45.8808 39.4187 45.1015 39.9042C45.9905 38.9491 46.7875 37.7198 47.4503 36.0458C47.9498 34.785 47.9673 33.4917 47.745 32.1621C47.8066 32.0726 47.854 31.9713 47.8792 31.8586C48.0061 31.2905 48.4962 30.0586 49.0958 28.652C50.5672 30.0872 51.5132 32.8112 51.5076 33.6759C50.1944 34.3282 48.9501 35.7964 47.7442 37.2194Z"

                                    fill="#555555"></path>

                            </svg>

                        </div><span class="title-badges ">

                            <p>Premium <br />Roses</p>

                        </span>

                    </div>

                    <div class="trust-badges-img col-4">

                        <div class="custom-svg"><svg xmlns="http://www.w3.org/2000/svg" width="50"

                                height="50" viewbox="0 0 60 54" fill="none">

                                <path

                                    d="M44.1136 0C37.5793 0 32.1824 6.06924 29.9999 8.93369C27.8174 6.06924 22.4206 0 15.8863 0C7.42729 0 0.54541 7.77714 0.54541 17.3352C0.54541 22.55 2.61528 27.4098 6.2383 30.7358C6.29099 30.8269 6.35577 30.9108 6.43125 30.9863L29.1334 53.6416C29.3731 53.8801 29.6859 54 29.9999 54C30.3139 54 30.6279 53.8801 30.8677 53.6404L54.3248 30.1917L54.5669 29.9567C54.7587 29.7757 54.9481 29.5923 55.1602 29.3575C55.2489 29.2701 55.3219 29.1717 55.3783 29.065C58.0091 25.8435 59.4544 21.6882 59.4544 17.3352C59.4544 7.77714 52.5727 0 44.1136 0ZM53.3361 27.6844C53.3025 27.7239 53.2713 27.7658 53.2438 27.809C53.1287 27.9408 53.0028 28.057 52.8782 28.1758L29.9988 51.0384L8.44601 29.5288C8.37651 29.3921 8.2794 29.2675 8.16078 29.1633C4.8804 26.2988 2.99991 21.9878 2.99991 17.3352C2.99991 9.13021 8.78036 2.45462 15.8863 2.45462C22.912 2.45462 28.908 11.6184 28.968 11.7107C29.4211 12.4106 30.5788 12.4106 31.0319 11.7107C31.0918 11.6184 37.0879 2.45462 44.1136 2.45462C51.2195 2.45462 56.9999 9.13032 56.9999 17.3352C56.9999 21.2016 55.6983 24.8774 53.3361 27.6844Z"

                                    fill="#555555"></path>

                            </svg>

                        </div><span class="title-badges ">

                            <p>Emotional Masterpiece</p>

                        </span>

                    </div>

                    <div class="trust-badges-img col-4">

                        <div class="custom-svg"><svg xmlns="http://www.w3.org/2000/svg" width="232"

                                height="232" viewbox="0 0 232 232" fill="none">

                                <path

                                    d="M231.61 7.17998C228.31 10.85 225.05 14.56 221.71 18.2C200.16 41.67 186.22 69.09 179.24 100.11C176.34 113.01 173.44 125.91 168.87 138.36C163.3 153.53 155.97 167.67 144.32 179.18C132.96 190.4 119.24 196.97 103.49 199.05C83.64 201.68 64.28 199.47 45.87 191.39C39.45 188.57 33.55 184.6 27.22 181.04C26.73 181.95 25.9 183.36 25.17 184.82C19.71 195.8 14.61 206.93 11.95 218.99C11.42 221.4 11.17 223.88 10.86 226.34C10.46 229.57 8.3 231.71 5.47 231.59C2.51 231.47 0.0800017 229.05 0.490002 225.79C1.15 220.6 1.96 215.36 3.41 210.34C6.98 197.94 12.47 186.32 18.71 175.06C19.48 173.67 19.48 172.77 18.39 171.54C9.84 161.84 4.46 150.51 2.05 137.87C-1.34 120.12 0.519993 102.83 7.44999 86.13C15.12 67.66 27.9 53.34 44 41.81C61.76 29.09 81.65 20.93 102.5 14.94C118.78 10.26 135.39 7.12998 152.17 4.91998C170.09 2.55998 188.08 1.28998 206.14 0.749985C206.96 0.729985 207.77 0.529983 208.58 0.419983C215.05 0.419983 221.53 0.419983 228 0.419983C229.2 1.76998 230.41 3.12998 231.61 4.47998V7.18999V7.17998ZM213.7 11.14C212.6 11.14 211.89 11.12 211.18 11.14C203.44 11.45 195.69 11.69 187.95 12.1C166.51 13.23 145.25 15.78 124.25 20.28C103 24.84 82.41 31.33 63.32 41.97C47.87 50.58 34.22 61.37 24.59 76.43C10.25 98.87 6.52999 122.77 16.2 148.08C18.3 153.57 21.4 158.55 25.36 163.16C25.83 162.46 26.21 161.93 26.55 161.38C34.1 149.04 42.52 137.33 51.65 126.11C72.03 101.03 95.46 79.37 123.22 62.64C128.43 59.5 133.84 56.69 139.24 53.88C143.09 51.88 147.09 53.83 147.4 57.76C147.64 60.74 145.74 62.39 143.28 63.6C132.53 68.89 122.31 75.06 112.57 82.04C81.85 104.04 57.37 131.82 37.19 163.55C35.67 165.94 34.29 168.41 32.84 170.86C40.65 177.56 49.4 182.12 58.98 185.08C71.85 189.06 85.05 190.41 98.45 189.12C113.8 187.64 127.16 181.81 137.97 170.54C146.93 161.19 152.85 150.04 157.54 138.13C162.85 124.65 166 110.57 169.25 96.52C175.65 68.85 187.31 43.71 205.1 21.49C207.81 18.11 210.63 14.82 213.67 11.15L213.7 11.14Z"

                                    fill="#555555"></path>

                            </svg>

                        </div><span class="title-badges ">

                            <p>Lasting<br />beauty</p>

                        </span>

                    </div>

                    <div class="trust-badges-img col-4">

                        <div class="custom-svg"><svg xmlns="http://www.w3.org/2000/svg" width="249"

                                height="249" viewbox="0 0 249 249" fill="none">

                                <path

                                    d="M233.24 248.736H15.55C11.87 247.496 10.73 244.816 10.73 241.096C10.79 201.416 10.77 161.736 10.77 122.056V118.786C9.48 118.786 8.53 118.786 7.57 118.786C1.75 118.766 0.01 117.036 0 111.266C0 98.3059 0 85.3559 0 72.3959C0 66.3359 1.71001 64.6359 7.81001 64.6359C31.13 64.6359 54.45 64.6359 77.76 64.6359C78.61 64.6359 79.45 64.6359 80.3 64.6359C79.82 63.8259 79.22 63.4959 78.67 63.1059C73.8 59.6559 68.61 56.5659 64.13 52.6559C51.2 41.3459 50.75 21.1559 62.85 8.8459C74.47 -2.9941 95.09 -2.81409 106.57 9.22591C111.24 14.1159 115.15 19.5659 118.12 25.6459C120.27 30.0359 122.28 34.4959 124.47 39.1959C124.91 38.2059 125.28 37.4359 125.59 36.6459C128.44 29.3959 131.93 22.4959 136.44 16.1059C142.69 7.25591 150.52 1.15591 161.8 0.125906C181.83 -1.70409 198.26 16.7059 194.05 36.3759C192.26 44.7559 187.51 51.0859 180.82 56.0559C176.84 59.0059 172.61 61.6259 168.11 64.6459C169.32 64.6459 170.17 64.6459 171.02 64.6459C194.5 64.6459 217.98 64.6659 241.46 64.6159C244.85 64.6159 247.46 65.5759 248.78 68.9259V114.606C246.8 119.666 242.26 118.656 238.01 118.886V122.116C238.01 161.776 237.99 201.446 238.05 241.106C238.05 244.826 236.91 247.506 233.23 248.736H233.24ZM97.2 118.936H21.83V237.556H97.2V118.936ZM151.64 118.916V237.556H226.94V118.916H151.64ZM108.34 237.576H140.44V118.986H108.34V237.576ZM10.92 107.746H97.16V75.7059H10.92V107.746ZM237.89 75.6659H151.66V107.706H237.89V75.6659ZM119.01 65.1859C118.95 63.7959 118.96 63.3159 118.9 62.8459C117.41 50.5559 113.36 39.1059 107.33 28.3759C104.44 23.2359 101.18 18.2459 96.34 14.6259C90.33 10.1359 83.64 9.31591 76.85 12.2459C69.88 15.2559 65.85 20.8059 65.11 28.4859C64.36 36.3259 67.91 42.2159 73.79 46.9359C82.56 53.9759 92.59 58.5659 103.32 61.6459C108.32 63.0759 113.48 63.9659 119 65.1859H119.01ZM129.4 64.6659C131.34 64.5159 132.73 64.5959 134.02 64.2759C139.89 62.8159 145.85 61.5759 151.55 59.6259C161.09 56.3559 170.04 51.8159 177.41 44.7459C183.59 38.8159 185.52 31.5059 182.57 23.4559C179.77 15.8259 173.95 11.4559 165.78 10.7259C157.97 10.0259 152.09 13.7059 147.41 19.6259C140.01 28.9659 135.32 39.6459 132.25 51.0659C131.08 55.3959 130.39 59.8459 129.4 64.6659ZM108.34 107.756H140.43V75.7159H108.34V107.756Z"

                                    fill="#555555"></path>

                            </svg>

                        </div><span class="title-badges ">

                            <p>Complete <br />gift experience</p>

                        </span>

                    </div>

                </div>

            </div>

        </div>



        <style scoped>

            :root {

                --trust-badges-text-transform: capitalize;

                --trust-badges-text-weight: bold;

                --color-text-trust-bradges: #555555;

                --copy-badges: 15px;

                --copy-badges-tablet: 20px;

                --copy-badges-mobile: 10px;

                --title-section-badges-size: 20px;

            }



            .title-badges-section {

                font-size: 1.25rem;

            }

        </style>

    </div>

    <script>

        const plus = document.getElementById("ButtonPlus");

        const minus = document.getElementById("ButtonMinus");

        const quantity = document.getElementById("quantityInput");

        const price = document.getElementById("singlePrice");

        var singlePrice = parseFloat(price.textContent)



        plus.addEventListener("click", () => {

            quantity.stepUp();

            price.textContent = (singlePrice * quantity.value).toFixed(2);

        });

        minus.addEventListener("click", () => {

            if (quantity.value > 1) {

                quantity.stepDown();

                price.textContent = (singlePrice * quantity.value).toFixed(2);

            }

        });

    </script>

    @foreach ($fonts as $font)

        <style>

            @font-face {

                font-family: {{ $font->name }};

                src: url('/storage/fonts/{{ $font->font }}');

            }



            .{{ str_replace(' ', '-', $font->name) }} {

                font-size: 50px;

                font-family: {{ $font->name }};

            }

        </style>

    @endforeach



</form>

