<x-checkout-portal>

    <main class="sec-main-check">



        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet"

            href="https://cdn.shopify.com/shopifycloud/checkout-web/assets/app.latest.en.eaaefad77ff32465e9ee.css"

            crossorigin="">





                        {{-- none --}}

                        <div class="f1jux fc8Jc kZBua mB_Id _1fragemps _1fragempo _1fragemw8">



                            <!--header role="banner" class="JPw09 REIwn KVQTQ _1fragemw8 _1fragemps _1fragempo">

                                <div class="k1Dlb">

                                    <div>

                                        <div>

                                            <div class="_1ip0g651 _1fragemo1 _1fragem4l _1fragem6y _1fragem3c">

                                                <header

                                                    class="_1fragemo1 _1fragem55 _1fragem7i 

                                                    _1fragemoq _1fragemou _1fragem3c 

                                                    _1fragemol _16s97g7f _16s97g7p 

                                                    _16s97g71j _16s97g71t    _16s97g7ak"

                                                    style="--_16s97g7a: 1fr; --_16s97g7k: minmax(0, 

                                                    1fr); --_16s97g71e: minmax(0, 1fr) 

                                                    minmax(auto, max-content); 

                                                    --_16s97g71o: minmax(0, 1fr);">

                                                    <span><a class="header__logo-wrapper" title="Tale of Roses"

                                                            href="/">

                                                            <img src="/storage/logo/logo-text.png" width="50"

                                                                height="32" alt="">

                                                        </a>

                                                    </span>



                                                </header>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </header-->



                            <div class="U6oc4 yesOe">

                                <button aria-pressed="false" aria-controls="disclosure_details" aria-expanded="false"

                                    class="b20QW"><span class="IfmSL">

                                        <span>

                                            <div

                                                class="_1ip0g651 _1fragemo1 _1fragem5z _1fragem8c _1fragem3c _1fragemr7">

                                                <p translate="no"

                                                    class="_1x52f9s1 _1fragemo1 _1x52f9sz _1fragemqe _1x52f9s3 _1x52f9so notranslate">

                                                    {{env('PAYMENT_CURRENCY_SYMBOL')}}{{ session('total_price') }}</p>

                                            </div>

                                        </span></span></button>

                                <div id="disclosure_details" hidden=""

                                    class="_94sxtb1 _1fragemuo _1fragemuq _1fragemo1 _1fragemvv _1fragemvl"

                                    style="height: 0px;">

                                    <div></div>

                                </div>

                            </div>



                            <div class="sooyq">

                                <div class="cLGHj jeN3o _1fragemps _1fragempn _1fragemwg">

                                    <div class="ETRXz">

                                        <main id="checkout-main" class="jvQbN">

                                            <div

                                                class="_1ip0g651 _1fragemo1 _1fragem5z _1fragem4r _1fragem8c _1fragem74 _1fragem3c">

                                                <form action="/cart/checkout/{{ $order->id }}/pay-by-stripe"

                                                    method="POST" novalidate="">

                                                    @csrf

                                                    <div class="_1fragemo1">

                                                        <div>



                                                            <div class="_16s97g755 _16s97g760"></div>

                                                        </div>

                                                        <div></div>

                                                        <div>

                                                            <div>

                                                                <section

                                                                    class="_1fragemps _1fragempo _1fragemgt _1fragemi3 _1fragemj6 _1fragemkg _1fragemeg _1fragemfq _1fragemlj _1fragemmt _1fragemw8 _1fragem2i _1fragemo1">

                                                                    <div>

                                                                        <div style="margin-bottom: 10px;">

                                                                            <h2 style="font-size: 20px;">

                                                                                Delivery

                                                                            </h2>

                                                                        </div>

                                                                        <div>

                                                                            <section aria-label="Delivery method">

                                                                                <div>

                                                                                    <div>

                                                                                        <fieldset

                                                                                            id="delivery_strategies">

                                                                                            <legend class="_1fragemvc">

                                                                                                Choose a delivery method

                                                                                            </legend>

                                                                                            <div>

                                                                                                @if (in_array('Fresh', $allFlowerTypes) || in_array('Preserved', $allFlowerTypes))

                                                                                                    <div>

                                                                                                        <div

                                                                                                            class="yyi4nyw _1fragemo1 _1fragem3c _1fragem6o _1fragemq2 yyi4ny10 yyi4nyx">

                                                                                                            <div

                                                                                                                class="_1fragemo1">

                                                                                                                <input

                                                                                                                    style="background: rgb(188, 188, 188);"

                                                                                                                    type="radio"

                                                                                                                    value="express"

                                                                                                                    id="delivery-express"

                                                                                                                    name="delivery_strategies"

                                                                                                                    class="_6hzjvo4 _1fragemq2 _1fragem2i _1fragemvp _1fragemvj _1fragemvv _6hzjvog _1fragemw8 _6hzjvof _6hzjvoc">

                                                                                                            </div>

                                                                                                            <div>

                                                                                                                <label

                                                                                                                    for="delivery-express"

                                                                                                                    data-option-selected="true">

                                                                                                                    <div

                                                                                                                        style="display: flex; justify-content: space-between;

                                                                                                                        margin-left: 10px; align-items: center;">

                                                                                                                        <p

                                                                                                                            style="font-size: 14px;">

                                                                                                                            Express

                                                                                                                            Delivery

                                                                                                                            (1

                                                                                                                            Day)

                                                                                                                        </p>

                                                                                                                        <span

                                                                                                                            class="_1fragemqz _1fragem2d _1fragemn2 _1fragemmx _1fragemph _1fragem2i a8x1wuo a8x1wul a8x1wuw a8x1wuy"><svg

                                                                                                                                xmlns="http://www.w3.org/2000/svg"

                                                                                                                                viewBox="0 0 14 14"

                                                                                                                                focusable="false"

                                                                                                                                aria-hidden="true"

                                                                                                                                class="a8x1wu10 _1fragem2i _1fragemqz _1fragemn2 _1fragemmx _1fragemq4">

                                                                                                                                <path

                                                                                                                                    stroke-linecap="round"

                                                                                                                                    stroke-linejoin="round"

                                                                                                                                    d="M3 10.5h-.9a.7.7 0 0 1-.7-.7V3.5a.7.7 0 0 1 .7-.7h4.2a.7.7 0 0 1 .7.7v.7m-4 6.3a1.2 1.2 0 0 0 2.4 0m-2.4 0a1.2 1.2 0 0 1 2.4 0M7 7v3.5M7 7V4.2M7 7h5.6M7 10.5H5.4m1.6 0h1.6M7 4.2h2.51a.7.7 0 0 1 .495.205L12.6 7m-4 3.5a1.2 1.2 0 0 0 2.4 0m-2.4 0a1.2 1.2 0 0 1 2.4 0m0 0h.9a.7.7 0 0 0 .7-.7V7">

                                                                                                                                </path>

                                                                                                                            </svg></span>

                                                                                                                    </div>

                                                                                                                </label>

                                                                                                            </div>

                                                                                                        </div>

                                                                                                    </div>

                                                                                                @endif

                                                                                                @if (in_array('Preserved', $allFlowerTypes))

                                                                                                    <div>

                                                                                                        <div

                                                                                                            class="yyi4nyw _1fragemo1 _1fragem3c _1fragem6o _1fragemq2 yyi4ny10 yyi4nyx">

                                                                                                            <div

                                                                                                                class="_1fragemo1">

                                                                                                                <input

                                                                                                                    style="background: rgb(188, 188, 188);"

                                                                                                                    type="radio"

                                                                                                                    id="delivery-standard"

                                                                                                                    value="standard"

                                                                                                                    name="delivery_strategies"

                                                                                                                    class="_6hzjvo4 _1fragemq2 _1fragem2i _1fragemvp _1fragemvj _1fragemvv _6hzjvog _1fragemw8 _6hzjvof _6hzjvoc">

                                                                                                            </div>

                                                                                                            <div>

                                                                                                                <label

                                                                                                                    for="delivery-standard"

                                                                                                                    data-option-selected="true">

                                                                                                                    <div

                                                                                                                        style="display: flex; justify-content: space-between;

                                                                                                                        margin-left: 10px; align-items: center;">

                                                                                                                        <p

                                                                                                                            style="font-size: 14px;">

                                                                                                                            Standard

                                                                                                                            Delivery

                                                                                                                            (2

                                                                                                                            to

                                                                                                                            3

                                                                                                                            Days)

                                                                                                                        </p>

                                                                                                                        <span

                                                                                                                            class="_1fragemqz _1fragem2d _1fragemn2 _1fragemmx _1fragemph _1fragem2i a8x1wuo a8x1wul a8x1wuw a8x1wuy"><svg

                                                                                                                                xmlns="http://www.w3.org/2000/svg"

                                                                                                                                viewBox="0 0 14 14"

                                                                                                                                focusable="false"

                                                                                                                                aria-hidden="true"

                                                                                                                                class="a8x1wu10 _1fragem2i _1fragemqz _1fragemn2 _1fragemmx _1fragemq4">

                                                                                                                                <path

                                                                                                                                    stroke-linecap="round"

                                                                                                                                    stroke-linejoin="round"

                                                                                                                                    d="M3 10.5h-.9a.7.7 0 0 1-.7-.7V3.5a.7.7 0 0 1 .7-.7h4.2a.7.7 0 0 1 .7.7v.7m-4 6.3a1.2 1.2 0 0 0 2.4 0m-2.4 0a1.2 1.2 0 0 1 2.4 0M7 7v3.5M7 7V4.2M7 7h5.6M7 10.5H5.4m1.6 0h1.6M7 4.2h2.51a.7.7 0 0 1 .495.205L12.6 7m-4 3.5a1.2 1.2 0 0 0 2.4 0m-2.4 0a1.2 1.2 0 0 1 2.4 0m0 0h.9a.7.7 0 0 0 .7-.7V7">

                                                                                                                                </path>

                                                                                                                            </svg></span>

                                                                                                                    </div>

                                                                                                                </label>

                                                                                                            </div>

                                                                                                        </div>

                                                                                                    </div>

                                                                                                @endif





                                                                                            </div>

                                                                                        </fieldset>

                                                                                    </div>

                                                                                </div>

                                                                            </section>

                                                                            <section aria-label="Shipping address"

                                                                                class="_1fragem2i _1fragemo1">

                                                                                <div

                                                                                    class="_1ip0g651 _1fragemo1 _1fragem4g _1fragem6t _1fragem3c">

                                                                                    <div

                                                                                        class="_1ip0g651 _1fragemo1 _1fragem4v _1fragem78 _1fragem3c">

                                                                                        <div

                                                                                            class="_1ip0g651 _1fragemo1 _1fragem4g _1fragem6t _1fragem3c">

                                                                                            <div>

                                                                                                <div

                                                                                                    id="shippingAddressForm">

                                                                                                    <div aria-hidden="false"

                                                                                                        class="pxSEU">

                                                                                                        <div

                                                                                                            class="_1ip0g651 _1fragemo1 _1fragem4g _1fragem6t _1fragem3c">

                                                                                                            <div class="_1fragemo1 _1fragem4g _1fragem6t _1fragem3c _1fragemol _1fragemoh _16s97g7f _16s97g7p _16s97g71j _16s97g71t"

                                                                                                                style=" --_16s97g7a: minmax(0, 1fr); --_16s97g7k: minmax(auto, max-content); --_16s97g71e: minmax(0, 1fr); --_16s97g71o: minmax(auto, max-content);">

                                                                                                                <div

                                                                                                                    class="vTXBW _1fragempt _10vrn9p1 _10vrn9p0 _10vrn9p4">

                                                                                                                    <div>

                                                                                                                        <div

                                                                                                                            class="j2JE7 _1fragempt">

                                                                                                                            <label

                                                                                                                                for="Select0"

                                                                                                                                class="QOQ2V NKh24"><span

                                                                                                                                    class="KBYKh"><span

                                                                                                                                        class="rermvf1 _1fragemuo _1fragemuq _1fragem2i">Country/Region</span></span></label>

                                                                                                                            <select

                                                                                                                                name="countryCode"

                                                                                                                                id="Select0"

                                                                                                                                required=""

                                                                                                                                autocomplete="shipping country"

                                                                                                                                class="_b6uH _1fragemw8 yA4Q8 vYo81 RGaKd">

                                                                                                                                <option

                                                                                                                                    value="AUS">

                                                                                                                                    Australia

                                                                                                                                </option>

                                                                                                                            </select>



                                                                                                                        </div>

                                                                                                                    </div>

                                                                                                                </div>

                                                                                                            </div>

                                                                                                            <div class="_1fragemo1 _1fragem4g _1fragem6t _1fragem3c _1fragemol _1fragemoh _16s97g7f _16s97g7p _16s97g71j _16s97g71t"

                                                                                                                style="--_16s97g7a: minmax(0, 1fr); --_16s97g7k: minmax(auto, max-content); --_16s97g71e: minmax(0, 1fr); --_16s97g71o: minmax(auto, max-content);">

                                                                                                                <div

                                                                                                                    class="_7ozb2u2 _1fragem3w _1fragem69 _1fragemo1 _1fragem3c _10vrn9p1 _10vrn9p0 _10vrn9p4 _1fragempt">

                                                                                                                    <div

                                                                                                                        class="_1fragemo1">

                                                                                                                        <label

                                                                                                                            id="TextField0-label"

                                                                                                                            for="TextField0"

                                                                                                                            class="cektnc3 _1fragemnr _1fragemvb _1fragemuu _1fragemw2 _1fragemvp _1fragemvk _1fragemvy _1fragemvz"><span

                                                                                                                                class="cektnc9"><span

                                                                                                                                    class="rermvf1 _1fragemuo _1fragemuq _1fragem2i">First

                                                                                                                                    name</span></span></label>

                                                                                                                        <div

                                                                                                                            class="_7ozb2u6 _1fragemo1 _1fragem3c _1fragemq3 _1fragemvp _1fragemvk _1fragemvy _1fragemw1 _1fragempt _1fragemw8 _7ozb2ul _7ozb2uh">

                                                                                                                            <input

                                                                                                                                style="border: 2px solid black;"

                                                                                                                                id="TextField0"

                                                                                                                                name="firstName"

                                                                                                                                placeholder="First name"

                                                                                                                                required=""

                                                                                                                                type="text"

                                                                                                                                aria-required="true"

                                                                                                                                aria-labelledby="TextField0-label"

                                                                                                                                autocomplete="shipping given-name"

                                                                                                                                class="_7ozb2uq _1fragemo1 _1fragemw2 _1fragemqz _1fragemva _7ozb2ur _7ozb2u11 _7ozb2u1h">

                                                                                                                        </div>

                                                                                                                    </div>

                                                                                                                </div>

                                                                                                                <div

                                                                                                                    class="_7ozb2u2 _1fragem3w _1fragem69 _1fragemo1 _1fragem3c _10vrn9p1 _10vrn9p0 _10vrn9p4 _1fragempt">

                                                                                                                    <div

                                                                                                                        class="_1fragemo1">

                                                                                                                        <label

                                                                                                                            id="TextField1-label"

                                                                                                                            for="TextField1"

                                                                                                                            class="cektnc3 _1fragemnr _1fragemvb _1fragemuu _1fragemw2 _1fragemvp _1fragemvk _1fragemvy _1fragemvz"><span

                                                                                                                                class="cektnc9"><span

                                                                                                                                    class="rermvf1 _1fragemuo _1fragemuq _1fragem2i">Last

                                                                                                                                    name</span></span></label>

                                                                                                                        <div

                                                                                                                            class="_7ozb2u6 _1fragemo1 _1fragem3c _1fragemq3 _1fragemvp _1fragemvk _1fragemvy _1fragemw1 _1fragempt _1fragemw8 _7ozb2ul _7ozb2uh">

                                                                                                                            <input

                                                                                                                                style="border: 2px solid black;"

                                                                                                                                id="TextField1"

                                                                                                                                name="lastName"

                                                                                                                                placeholder="Last name"

                                                                                                                                required=""

                                                                                                                                type="text"

                                                                                                                                aria-required="true"

                                                                                                                                aria-labelledby="TextField1-label"

                                                                                                                                autocomplete="shipping family-name"

                                                                                                                                class="_7ozb2uq _1fragemo1 _1fragemw2 _1fragemqz _1fragemva _7ozb2ur _7ozb2u11 _7ozb2u1h">

                                                                                                                        </div>

                                                                                                                    </div>

                                                                                                                </div>

                                                                                                            </div>

                                                                                                            <div class="_1fragemo1 _1fragem4g _1fragem6t _1fragem3c _1fragemol _1fragemoh _16s97g7f _16s97g7p _16s97g71j _16s97g71t"

                                                                                                                style="--_16s97g7a: minmax(0, 1fr); --_16s97g7k: minmax(auto, max-content); --_16s97g71e: minmax(0, 1fr); --_16s97g71o: minmax(auto, max-content);">

                                                                                                                <div

                                                                                                                    class="_7ozb2u2 _1fragem3w _1fragem69 _1fragemo1 _1fragem3c _10vrn9p1 _10vrn9p0 _10vrn9p4 _1fragempt">

                                                                                                                    <div

                                                                                                                        class="_1fragemo1">

                                                                                                                        <label

                                                                                                                            id="TextField2-label"

                                                                                                                            for="TextField2"

                                                                                                                            class="cektnc3 _1fragemnr _1fragemvb _1fragemuu _1fragemw2 _1fragemvp _1fragemvk _1fragemvy _1fragemvz"><span

                                                                                                                                class="cektnc9"><span

                                                                                                                                    class="rermvf1 _1fragemuo _1fragemuq _1fragem2i">Company

                                                                                                                                    (optional)</span></span></label>

                                                                                                                        <div

                                                                                                                            class="_7ozb2u6 _1fragemo1 _1fragem3c _1fragemq3 _1fragemvp _1fragemvk _1fragemvy _1fragemw1 _1fragempt _1fragemw8 _7ozb2ul _7ozb2uh">

                                                                                                                            <input

                                                                                                                                style="border: 2px solid black;"

                                                                                                                                id="TextField2"

                                                                                                                                name="company"

                                                                                                                                placeholder="Company (optional)"

                                                                                                                                type="text"

                                                                                                                                aria-required="false"

                                                                                                                                aria-labelledby="TextField2-label"

                                                                                                                                autocomplete="shipping organization"

                                                                                                                                class="_7ozb2uq _1fragemo1 _1fragemw2 _1fragemqz _1fragemva _7ozb2ur _7ozb2u11 _7ozb2u1h">

                                                                                                                        </div>

                                                                                                                    </div>

                                                                                                                </div>

                                                                                                            </div>

                                                                                                            <div class="_1fragemo1 _1fragem4g _1fragem6t _1fragem3c _1fragemol _1fragemoh _16s97g7f _16s97g7p _16s97g71j _16s97g71t"

                                                                                                                style="--_16s97g7a: minmax(0, 1fr); --_16s97g7k: minmax(auto, max-content); --_16s97g71e: minmax(0, 1fr); --_16s97g71o: minmax(auto, max-content);">

                                                                                                                <div

                                                                                                                    class="Vob8N R5Ptu">

                                                                                                                    <div

                                                                                                                        class="_1ip0g651 _1fragemo1 _1fragem46 _1fragem6j _1fragem3c">

                                                                                                                        <div>

                                                                                                                            <div

                                                                                                                                class="_7ozb2u2 _1fragem3w _1fragem69 _1fragemo1 _1fragem3c _10vrn9p1 _10vrn9p0 _10vrn9p4 _1fragempt">

                                                                                                                                <div

                                                                                                                                    class="_1fragemo1">

                                                                                                                                    <label

                                                                                                                                        id="shipping-address1-label"

                                                                                                                                        for="shipping-address1"

                                                                                                                                        class="cektnc3 _1fragemnr _1fragemvb _1fragemuu _1fragemw2 _1fragemvp _1fragemvk _1fragemvy _1fragemvz"><span

                                                                                                                                            class="cektnc9"><span

                                                                                                                                                class="rermvf1 _1fragemuo _1fragemuq _1fragem2i">Address</span></span></label>

                                                                                                                                    <div

                                                                                                                                        class="_7ozb2u6 _1fragemo1 _1fragem3c _1fragemq3 _1fragemvp _1fragemvk _1fragemvy _1fragemw1 _1fragempt _1fragemw8 _7ozb2ul _7ozb2uh">

                                                                                                                                        <input

                                                                                                                                            style="border: 2px solid black;"

                                                                                                                                            id="shipping-address1"

                                                                                                                                            name="address1"

                                                                                                                                            placeholder="Address"

                                                                                                                                            required=""

                                                                                                                                            type="text"

                                                                                                                                            aria-autocomplete="list"

                                                                                                                                            aria-controls="shipping-address1-options"

                                                                                                                                            aria-owns="shipping-address1-options"

                                                                                                                                            aria-expanded="false"

                                                                                                                                            aria-required="true"

                                                                                                                                            aria-labelledby="shipping-address1-label"

                                                                                                                                            aria-haspopup="listbox"

                                                                                                                                            role="combobox"

                                                                                                                                            autocomplete="shipping address-line1"

                                                                                                                                            autocorrect="off"

                                                                                                                                            class="_7ozb2uq _1fragemo1 _1fragemw2 _1fragemqz _1fragemva _7ozb2ur _1fragemro _1fragemry _7ozb2u11 _7ozb2u1h">



                                                                                                                                    </div>

                                                                                                                                </div>

                                                                                                                            </div>

                                                                                                                        </div>

                                                                                                                    </div>

                                                                                                                </div>

                                                                                                            </div>

                                                                                                            <div class="_1fragemo1 _1fragem4g _1fragem6t _1fragem3c _1fragemol _1fragemoh _16s97g7f _16s97g7p _16s97g71j _16s97g71t"

                                                                                                                style="--_16s97g7a: minmax(0, 1fr); --_16s97g7k: minmax(auto, max-content); --_16s97g71e: minmax(0, 1fr); --_16s97g71o: minmax(auto, max-content);">

                                                                                                                <div

                                                                                                                    class="_7ozb2u2 _1fragem3w _1fragem69 _1fragemo1 _1fragem3c _10vrn9p1 _10vrn9p0 _10vrn9p4 _1fragempt">

                                                                                                                    <div

                                                                                                                        class="_1fragemo1">

                                                                                                                        <label

                                                                                                                            id="TextField3-label"

                                                                                                                            for="TextField3"

                                                                                                                            class="cektnc3 _1fragemnr _1fragemvb _1fragemuu _1fragemw2 _1fragemvp _1fragemvk _1fragemvy _1fragemvz"><span

                                                                                                                                class="cektnc9"><span

                                                                                                                                    class="rermvf1 _1fragemuo _1fragemuq _1fragem2i">Apartment,

                                                                                                                                    suite,

                                                                                                                                    etc.

                                                                                                                                    (optional)</span></span></label>

                                                                                                                        <div

                                                                                                                            class="_7ozb2u6 _1fragemo1 _1fragem3c _1fragemq3 _1fragemvp _1fragemvk _1fragemvy _1fragemw1 _1fragempt _1fragemw8 _7ozb2ul _7ozb2uh">

                                                                                                                            <input

                                                                                                                                style="border: 2px solid black;"

                                                                                                                                id="TextField3"

                                                                                                                                name="address2"

                                                                                                                                placeholder="Apartment, suite, etc. (optional)"

                                                                                                                                type="text"

                                                                                                                                aria-required="false"

                                                                                                                                aria-labelledby="TextField3-label"

                                                                                                                                autocomplete="shipping address-line2"

                                                                                                                                class="_7ozb2uq _1fragemo1 _1fragemw2 _1fragemqz _1fragemva _7ozb2ur _7ozb2u11 _7ozb2u1h">

                                                                                                                        </div>

                                                                                                                    </div>

                                                                                                                </div>

                                                                                                            </div>

<div class="_1fragemo1 _1fragem4g _1fragem6t _1fragem3c _1fragemol _1fragemoh _16s97g7f _16s97g7p _16s97g71j _16s97g71t w3_bg" style="--_16s97g7a: minmax(0, 1fr); --_16s97g7k: minmax(auto, max-content); --_16s97g71e: minmax(0, 1fr); --_16s97g71o: minmax(auto, max-content);">

                                                                                                                <div class="_7ozb2u2 _1fragem3w _1fragem69 _1fragemo1 _1fragem3c _10vrn9p1 _10vrn9p0 _10vrn9p4 _1fragempt w3_bg">

                                                                                                                    <div class="_1fragemo1 w3_bg">

                                                                                                                        <label id="TextField3-label" for="email" class="cektnc3 _1fragemnr _1fragemvb _1fragemuu _1fragemw2 _1fragemvp _1fragemvk _1fragemvy _1fragemvz"><span class="cektnc9"><span class="rermvf1 _1fragemuo _1fragemuq _1fragem2i">Email</span></span></label>

                                                                                                                        <div class="_7ozb2u6 _1fragemo1 _1fragem3c _1fragemq3 _1fragemvp _1fragemvk _1fragemvy _1fragemw1 _1fragempt _1fragemw8 _7ozb2ul _7ozb2uh w3_bg">

                                                                                                                            <input style="border: 2px solid black;" id="email" name="email" placeholder="Email" type="email" aria-required="false" aria-labelledby="TextField3-label" autocomplete="shipping address-line2" class="_7ozb2uq _1fragemo1 _1fragemw2 _1fragemqz _1fragemva _7ozb2ur _7ozb2u11 _7ozb2u1h">

                                                                                                                        </div>

                                                                                                                    </div>

                                                                                                                </div>

                                                                                                            </div>
                                                                                                            <div class="_1fragemo1 _1fragem4g _1fragem6t _1fragem3c _1fragemol _1fragemoh _16s97g7f _16s97g7p _16s97g71j _16s97g71t"

                                                                                                                style="--_16s97g7a: minmax(0, 1fr); --_16s97g7k: minmax(auto, max-content); --_16s97g71e: minmax(0, 1fr); --_16s97g71o: minmax(auto, max-content);">

                                                                                                                <div

                                                                                                                    class="_7ozb2u2 _1fragem3w _1fragem69 _1fragemo1 _1fragem3c _10vrn9p1 _10vrn9p0 _10vrn9p4 _1fragempt">

                                                                                                                    <div

                                                                                                                        class="_1fragemo1">

                                                                                                                        <label

                                                                                                                            id="TextField4-label"

                                                                                                                            for="TextField4"

                                                                                                                            class="cektnc3 _1fragemnr _1fragemvb _1fragemuu _1fragemw2 _1fragemvp _1fragemvk _1fragemvy _1fragemvz"><span

                                                                                                                                class="cektnc9"><span

                                                                                                                                    class="rermvf1 _1fragemuo _1fragemuq _1fragem2i">City</span></span></label>

                                                                                                                        <div

                                                                                                                            class="_7ozb2u6 _1fragemo1 _1fragem3c _1fragemq3 _1fragemvp _1fragemvk _1fragemvy _1fragemw1 _1fragempt _1fragemw8 _7ozb2ul _7ozb2uh">

                                                                                                                            <input

                                                                                                                                style="border: 2px solid black;"

                                                                                                                                id="TextField4"

                                                                                                                                name="city"

                                                                                                                                placeholder="City"

                                                                                                                                required=""

                                                                                                                                type="text"

                                                                                                                                aria-required="true"

                                                                                                                                aria-labelledby="TextField4-label"

                                                                                                                                autocomplete="shipping address-level2"

                                                                                                                                class="_7ozb2uq _1fragemo1 _1fragemw2 _1fragemqz _1fragemva _7ozb2ur _7ozb2u11 _7ozb2u1h">

                                                                                                                        </div>

                                                                                                                    </div>

                                                                                                                </div>

                                                                                                                <div

                                                                                                                    class="vTXBW _1fragempt _10vrn9p1 _10vrn9p0 _10vrn9p4">

                                                                                                                    <div>

                                                                                                                        <div

                                                                                                                            class="j2JE7 _1fragempt">

                                                                                                                            <label

                                                                                                                                for="Select1"

                                                                                                                                class="QOQ2V NKh24"><span

                                                                                                                                    class="KBYKh"><span

                                                                                                                                        class="rermvf1 _1fragemuo _1fragemuq _1fragem2i">

                                                                                                                                        State</span></span></label>

                                                                                                                            <select

                                                                                                                                name="state"

                                                                                                                                id="state-box"

                                                                                                                                required=""

                                                                                                                                autocomplete="shipping address-level1"

                                                                                                                                class="_b6uH _1fragemw8 yA4Q8 vYo81 RGaKd">

                                                                                                                                @foreach ($allStates as $state)

                                                                                                                                    <option

                                                                                                                                        data-alternate-values="{{ $state }}"

                                                                                                                                        value="{{ $state }}">

                                                                                                                                        {{ $state }}

                                                                                                                                    </option>

                                                                                                                                @endforeach



                                                                                                                            </select>



                                                                                                                        </div>

                                                                                                                    </div>

                                                                                                                </div>

                                                                                                                <div

                                                                                                                    class="ii1aN">

                                                                                                                    <div

                                                                                                                        class="_7ozb2u2 _1fragem3w _1fragem69 _1fragemo1 _1fragem3c _10vrn9p1 _10vrn9p0 _10vrn9p4 _1fragempt">

                                                                                                                        <div

                                                                                                                            class="_1fragemo1">

                                                                                                                            <label

                                                                                                                                id="TextField5-label"

                                                                                                                                for="TextField5"

                                                                                                                                class="cektnc3 _1fragemnr _1fragemvb _1fragemuu _1fragemw2 _1fragemvp _1fragemvk _1fragemvy _1fragemvz"><span

                                                                                                                                    class="cektnc9">

                                                                                                                                    <span

                                                                                                                                        class="rermvf1 _1fragemuo _1fragemuq _1fragem2i">ZIP

                                                                                                                                        code</span></span></label>

                                                                                                                            <div

                                                                                                                                class="_7ozb2u6 _1fragemo1 _1fragem3c _1fragemq3 _1fragemvp _1fragemvk _1fragemvy _1fragemw1 _1fragempt _1fragemw8 _7ozb2ul _7ozb2uh">

                                                                                                                                <input

                                                                                                                                    style="border: 2px solid black;"

                                                                                                                                    id="postal-code"

                                                                                                                                    name="postalCode"

                                                                                                                                    placeholder="ZIP code"

                                                                                                                                    required=""

                                                                                                                                    type="text"

                                                                                                                                    inputmode="text"

                                                                                                                                    aria-required="true"

                                                                                                                                    aria-labelledby="TextField5-label"

                                                                                                                                    autocomplete="shipping postal-code"

                                                                                                                                    autocapitalize="characters"

                                                                                                                                    class="_7ozb2uq _1fragemo1 _1fragemw2 _1fragemqz _1fragemva _7ozb2ur _7ozb2u11 _7ozb2u1h">

                                                                                                                            </div>

                                                                                                                        </div>

                                                                                                                    </div>

                                                                                                                </div>

                                                                                                            </div>

                                                                                                            <div class="_1fragemo1 _1fragem4g _1fragem6t _1fragem3c _1fragemol _1fragemoh _16s97g7f _16s97g7p _16s97g71j _16s97g71t"

                                                                                                                style="--_16s97g7a: minmax(0, 1fr); --_16s97g7k: minmax(auto, max-content); --_16s97g71e: minmax(0, 1fr); --_16s97g71o: minmax(auto, max-content);">

                                                                                                                <div

                                                                                                                    class="_7ozb2u2 _1fragem3w _1fragem69 _1fragemo1 _1fragem3c _10vrn9p1 _10vrn9p0 _10vrn9p4 _1fragempt">

                                                                                                                    <div

                                                                                                                        class="_1fragemo1">

                                                                                                                        <label

                                                                                                                            id="TextField6-label"

                                                                                                                            for="TextField6"

                                                                                                                            class="cektnc3 _1fragemnr _1fragemvb _1fragemuu _1fragemw2 _1fragemvp _1fragemvk _1fragemvy _1fragemvz"><span

                                                                                                                                class="cektnc9"><span

                                                                                                                                    class="rermvf1 _1fragemuo _1fragemuq _1fragem2i">Phone

                                                                                                                                    (for

                                                                                                                                    shipping

                                                                                                                                    updates

                                                                                                                                    &amp;

                                                                                                                                    offers)</span></span></label>

                                                                                                                        <div

                                                                                                                            class="_7ozb2u6 _1fragemo1 _1fragem3c _1fragemq3 _1fragemvp _1fragemvk _1fragemvy _1fragemw1 _1fragempt _1fragemw8 _7ozb2ul _7ozb2uh">

                                                                                                                            <input

                                                                                                                                style="border: 2px solid black;"

                                                                                                                                id="TextField6"

                                                                                                                                name="phone"

                                                                                                                                placeholder="Phone (for shipping updates &amp; offers)"

                                                                                                                                required=""

                                                                                                                                type="tel"

                                                                                                                                aria-required="true"

                                                                                                                                aria-labelledby="TextField6-label"

                                                                                                                                autocomplete="shipping tel"

                                                                                                                                class="_7ozb2uq _1fragemo1 _1fragemw2 _1fragemqz _1fragemva _7ozb2ur _1fragemro _1fragemry _7ozb2u10 _7ozb2u1h">

                                                                                                                            <div

                                                                                                                                class="_1fragemo1 _1fragemw2 _1fragemp0 _1fragemq0 _7ozb2u1g">

                                                                                                                                <div

                                                                                                                                    class="_1fragemo1 _1fragem2s _1fragemr4">



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

                                                                                        </div>



                                                                                    </div>

                                                                                </div>

                                                                            </section>

                                                                        </div>

                                                                    </div>

                                                                </section>

                                                                <div class="_16s97g755 _16s97g760"></div>

                                                            </div>

                                                        </div>

                                                        <div>

                                                            <div>



                                                                <div class="_16s97g755 _16s97g760"></div>

                                                            </div>

                                                        </div>

                                                        <div>

                                                            <div>

                                                                <section class="d-none"

                                                                    class="_1fragemps _1fragempo _1fragemgt _1fragemi3 _1fragemj6 _1fragemkg _1fragemeg _1fragemfq _1fragemlj _1fragemmt _1fragemw8 _1fragem2i _1fragemo1">

                                                                    <div class="_qaeN"><button type="button"

                                                                            class="_1xqelvi1 _1fragemq2 _1fragemo1 _1fragemvf _1fragemvp _1fragemvk _1fragemvy _1fragemv9 _1fragem2i _1fragemi2 _1fragemkf _1fragemeg _1fragemms _1xqelvi8">

                                                                            <div style="display:none;"

                                                                                class="_1fragemo1 _1fragem4g _1fragem6t _1fragemoq _1fragemou _1fragem3c _1fragemog _1fragemr4 _1fragemr8 _16s97g7f _16s97g7p _16s97g71j _16s97g71t"

                                                                                style="--_16s97g7a: 1fr; --_16s97g7k: minmax(0, 1fr); --_16s97g71e: minmax(0, 1fr) minmax(auto, max-content); --_16s97g71o: minmax(0, 1fr);">

                                                                                <h2 class="n8k95w1 _1fragemo1 n8k95w2">

                                                                                    Order summary (2)</h2>



                                                                            </div>

                                                                        </button>

                                                                        <div id="mobileOrderSummary" hidden=""

                                                                            class="_94sxtb1 _1fragemuo _1fragemuq _1fragemo1 _1fragemvv _1fragemvl"

                                                                            style="height: 0px;">

                                                                            <div></div>

                                                                        </div>

                                                                        <div>

                                                                            <section class="_1fragem2i _1fragemo1">

                                                                                <div

                                                                                    class="_1ip0g651 _1fragemo1 _1fragem4q _1fragem73 _1fragem3c">

                                                                                    <div

                                                                                        class="_1ip0g651 _1fragemo1 _1fragem4q _1fragem73 _1fragem3c">

                                                                                        <section

                                                                                            class="_1fragem2i _1fragemo1">

                                                                                            <div

                                                                                                class="_1ip0g651 _1fragemo1 _1fragem4g _1fragem6t _1fragem3c">

                                                                                                <div

                                                                                                    class="_1fragemo1">



                                                                                                </div>

                                                                                                <div

                                                                                                    class="_1fragemvc _1fragem2i _1fragemo1">

                                                                                                    <button

                                                                                                        type="submit"

                                                                                                        tabindex="-1"

                                                                                                        aria-hidden="true"

                                                                                                        form="Form2">Submit</button>

                                                                                                </div>

                                                                                            </div>

                                                                                        </section>

                                                                                    </div>

                                                                                    <section

                                                                                        class="_1fragem2i _1fragemo1">

                                                                                        <div class="_1fragemvc">

                                                                                            <h4 id="MoneyLine-Heading1"

                                                                                                class="n8k95w1 _1fragemo1 n8k95w5">

                                                                                                Cost summary</h4>

                                                                                        </div>

                                                                                        <div role="table"

                                                                                            aria-labelledby="MoneyLine-Heading1"

                                                                                            class="nfgb6p0">

                                                                                            <div role="row"

                                                                                                style="display: none;"

                                                                                                class="_1qy6ue61 _1fragem3c _1qy6ue65">

                                                                                                <div role="rowheader"

                                                                                                    class="_1qy6ue67">

                                                                                                    <span

                                                                                                        class="_19gi7yt0 _19gi7yts _1fragemqc">Subtotal</span>

                                                                                                </div>

                                                                                                <div role="cell"

                                                                                                    class="_1qy6ue68">

                                                                                                    <span

                                                                                                        translate="no"

                                                                                                        class="_19gi7yt0 _19gi7yts 

                                                                                                    _1fragemqc notranslate">{{env('PAYMENT_CURRENCY_SYMBOL')}}

                                                                                                        <span

                                                                                                            id="sub-total-price">{{ session('total_price') }}</span>

                                                                                                    </span>

                                                                                                </div>

                                                                                            </div>

                                                                                            <div role="row"

                                                                                                style="display:none;"

                                                                                                class="_1qy6ue61 _1fragem3c _1qy6ue65">

                                                                                                <div role="rowheader"

                                                                                                    class="_1qy6ue67">

                                                                                                    <div

                                                                                                        class="_1ip0g651 _1fragemo1 _1fragem3w _1fragem69 _1fragem3c">

                                                                                                        <div

                                                                                                            class="_1fragemo1 _1fragem2s _1fragemr4">

                                                                                                            <div

                                                                                                                class="_5uqybw2 _1fragem2s _1fragemn7 _1fragem3w _1fragem69 _1fragemoq _1fragemou _1fragemr4">

                                                                                                                <span

                                                                                                                    class="_19gi7yt0 _19gi7yts _1fragemqc">Shipping</span><button

                                                                                                                    type="button"

                                                                                                                    aria-label="Shipping policy"

                                                                                                                    aria-haspopup="dialog"

                                                                                                                    class="_1m2hr9ge _1fragemvz _1fragemo1 _1fragemq2 _1fragem32 _1fragemvf _1fragemvq _1fragemvu _1fragemvk _1m2hr9g18 _1fragemvq _1fragemvu _1fragemv9 _1fragemvh"><span

                                                                                                                        class="_1m2hr9gr _1fragemvb _1fragemvt _1fragemvl _1fragemvu _1fragem2s _1fragemr1 _1fragemvd"><span

                                                                                                                            class="_1fragemqz _1fragem2d _1fragemn2 _1fragemmx a8x1wu9 _1fragem2i a8x1wun a8x1wul a8x1wuy"><svg

                                                                                                                                xmlns="http://www.w3.org/2000/svg"

                                                                                                                                viewBox="0 0 14 14"

                                                                                                                                focusable="false"

                                                                                                                                aria-hidden="true"

                                                                                                                                class="a8x1wu10 _1fragem2i _1fragemqz _1fragemn2 _1fragemmx _1fragemq4">

                                                                                                                                <circle

                                                                                                                                    cx="7"

                                                                                                                                    cy="7"

                                                                                                                                    r="5.6">

                                                                                                                                </circle>

                                                                                                                                <path

                                                                                                                                    stroke-linecap="round"

                                                                                                                                    stroke-linejoin="round"

                                                                                                                                    d="M5.6 5.1c.2-1.3 2.6-1.3 2.8 0S6.95 6.4 6.95 7.45m.055 2.35H7v.005h.005z">

                                                                                                                                </path>

                                                                                                                                <circle

                                                                                                                                    cx="7"

                                                                                                                                    cy="9.7"

                                                                                                                                    r="0.1">

                                                                                                                                </circle>

                                                                                                                            </svg></span></span></button>

                                                                                                            </div>

                                                                                                        </div>

                                                                                                    </div>

                                                                                                </div>

                                                                                                <div role="cell"

                                                                                                    style=""

                                                                                                    class="_1qy6ue68">

                                                                                                    <span

                                                                                                        translate="no"

                                                                                                        class="_19gi7yt0 _19gi7yts _1fragemqc 

                                                                                                    _19gi7ytm _19gi7yti notranslate">

                                                                                                        Enter

                                                                                                        shipping

                                                                                                        address

                                                                                                    </span>

                                                                                                </div>

                                                                                            </div>

                                                                                            <div role="row"

                                                                                                style="display: none;"

                                                                                                class="_1x41w3p1 _1fragem3c _1fragemou _1x41w3p5">

                                                                                                <div role="rowheader"

                                                                                                    class="_1x41w3p7">

                                                                                                    <span

                                                                                                        class="_19gi7yt0 _19gi7ytw _1fragemqe _19gi7yt2">Total</span>

                                                                                                </div>

                                                                                                <div role="cell"

                                                                                                    class="_1x41w3p8">

                                                                                                    <div

                                                                                                        class="_1fragemo1 _1fragem2s _1fragemr4">

                                                                                                        <div

                                                                                                            class="_5uqybw2 _1fragem2s _1fragemn7 _1fragem46 _1fragem6j _1fragemot _1fragemr4">

                                                                                                            <abbr

                                                                                                                translate="no"

                                                                                                                class="_19gi7yt0 _19gi7ytq _1fragemqb _19gi7yti notranslate _19gi7yt14 _1fragemvg">USD</abbr><strong

                                                                                                                translate="no"

                                                                                                                class="_19gi7yt0 _19gi7yty _1fragemqf _19gi7yt2 notranslate">{{env('PAYMENT_CURRENCY_SYMBOL')}}{{ session('total_price') }}</strong>

                                                                                                        </div>

                                                                                                    </div>

                                                                                                </div>

                                                                                            </div>

                                                                                        </div>

                                                                                    </section>

                                                                                </div>

                                                                            </section>

                                                                        </div>

                                                                        <div class="_16s97g75p"></div>

                                                                    </div>

                                                                    <div

                                                                        class="_1ip0g651 _1fragemo1 _1fragem50 _1fragem7d _1fragem3c">



                                                                    </div>

                                                                    <div class="_16s97g75k"></div>

                                                                    <div

                                                                        class="_1fragemq5 _1fragemou _1fragem2s _1fragemo1">

                                                                    </div>

                                                                    <div class="_16s97g75f"></div>

                                                                </section>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="_1fragemvc _1fragem2i _1fragemo1"><button

                                                            type="submit" tabindex="-1"

                                                            aria-hidden="true">Submit</button></div>

                                                    <button class="btn btn-success w-100"

                                                        style="height: 60px; font-size: 22px;

                                                        border-radius: 10px;"

                                                        id="checkout-pay-button" type="submit">

                                                        Pay

                                                        now

                                                    </button>

                                                </form>

                                            </div>

                                        </main>

                                        <footer role="contentinfo" class="mZR1U c0YIW _1fragemps">

                                            <div class="TfwLd">

                                                <div>

                                                    <div class="_1ip0g651 _1fragemo1 _1fragem4l _1fragem6y _1fragem3c">

                                                        <div class="_1fragemo1 _1fragem2s _1fragemr4">

                                                            <div

                                                                class="_5uqybw2 _1fragem2s _1fragemn7 _1fragemos _1fragemox _1fragem3w _1fragem6t _1fragemr4">

                                                                <button type="button" aria-haspopup="dialog"

                                                                    class="_1m2hr9ge _1fragemvz _1fragemo1 _1fragemq2 _1fragem32 _1fragemvf _1fragemvq _1fragemvu _1fragemvk _1m2hr9g18 _1fragemvq _1fragemvu _1fragemv9 _1fragemvh"><span

                                                                        class="_1m2hr9gr _1fragemvb _1fragemvt _1fragemvl _1fragemvu _1fragem2s _1fragemr1 _1fragemvd">Refund

                                                                        policy</span></button><button type="button"

                                                                    aria-haspopup="dialog"

                                                                    class="_1m2hr9ge _1fragemvz _1fragemo1 _1fragemq2 _1fragem32 _1fragemvf _1fragemvq _1fragemvu _1fragemvk _1m2hr9g18 _1fragemvq _1fragemvu _1fragemv9 _1fragemvh"><span

                                                                        class="_1m2hr9gr _1fragemvb _1fragemvt _1fragemvl _1fragemvu _1fragem2s _1fragemr1 _1fragemvd">Shipping

                                                                        policy</span></button><button type="button"

                                                                    aria-haspopup="dialog"

                                                                    class="_1m2hr9ge _1fragemvz _1fragemo1 _1fragemq2 _1fragem32 _1fragemvf _1fragemvq _1fragemvu _1fragemvk _1m2hr9g18 _1fragemvq _1fragemvu _1fragemv9 _1fragemvh"><span

                                                                        class="_1m2hr9gr _1fragemvb _1fragemvt _1fragemvl _1fragemvu _1fragem2s _1fragemr1 _1fragemvd">Privacy

                                                                        policy</span></button><button type="button"

                                                                    aria-haspopup="dialog"

                                                                    class="_1m2hr9ge _1fragemvz _1fragemo1 _1fragemq2 _1fragem32 _1fragemvf _1fragemvq _1fragemvu _1fragemvk _1m2hr9g18 _1fragemvq _1fragemvu _1fragemv9 _1fragemvh"><span

                                                                        class="_1m2hr9gr _1fragemvb _1fragemvt _1fragemvl _1fragemvu _1fragem2s _1fragemr1 _1fragemvd">Terms

                                                                        of service</span></button>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </footer>

                                    </div>

                                </div>

                                <div class="jCic4 _1fragemps _1fragempp _1fragemw8">

                                    <div class="blA7b">

                                        <div class="_1fragemvc">

                                            <h2 class="n8k95w1 _1fragemo1 n8k95w3">Order summary</h2>

                                        </div>

                                        <aside>

                                            <div>

                                                <section class="_1fragem2i _1fragemo1">

                                                    <div class="_1ip0g651 _1fragemo1 _1fragem4q _1fragem73 _1fragem3c">

                                                        <div

                                                            class="_1ip0g651 _1fragemo1 _1fragem4q _1fragem73 _1fragem3c">

                                                            <section class="_1fragem2i _1fragemo1">

                                                                <div class="_1fragemvc">

                                                                    <h4 id="ResourceList0"

                                                                        class="n8k95w1 _1fragemo1 n8k95w5">Shopping

                                                                        cart

                                                                    </h4>

                                                                </div>

                                                                <div role="table" aria-labelledby="ResourceList0"

                                                                    class="_6zbcq55 _1fragem2s _1fragemq5 _6zbcq56">

                                                                    <div role="row"

                                                                        class="_6zbcq51d _1fragem2s _1fragemou _1fragemqz _6zbcq51b">

                                                                        <div role="columnheader" class="_6zbcq51e">

                                                                            <div class="_1fragemvc">Product image

                                                                            </div>

                                                                        </div>

                                                                        <div role="columnheader" class="_6zbcq51e">

                                                                            <div class="_1fragemvc">Description</div>

                                                                        </div>

                                                                        <div role="columnheader" class="_6zbcq51e">

                                                                            <div class="_1fragemvc">Quantity</div>

                                                                        </div>

                                                                        <div role="columnheader" class="_6zbcq51e">

                                                                            <div class="_1fragemvc">Price</div>

                                                                        </div>

                                                                    </div>

                                                                    @foreach (session()->get('products') as $item)

                                                                        <div role="row"

                                                                            class="_6zbcq524 _1fragem2s _1fragem2d _6zbcq52b">

                                                                            <div role="cell"

                                                                                class="_6zbcq53s _1fragem2s _1fragemq5 _1fragemr4">

                                                                                <div class="_1m6j2n32 _1fragemo1 _1fragemwc _1m6j2n33"

                                                                                    style="--_1m6j2n30: 1;">

                                                                                    <div class="_1h3po421 _1h3po423 _1fragemo1"

                                                                                        style="--_1h3po420: 1;">

                                                                                        <picture>

                                                                                            <source

                                                                                                media="(min-width: 0px)"

                                                                                                


                                                srcset="/storage/products/{{ $item['image'] }}"
                                                
                                                                                                >

                                                                                            <img  
                                                src="/storage/products/{{ $item['image'] }}"
                                            

                                                                                                alt="picture"

                                                                                                class="_1h3po424 _1fragem2i _1fragemn2 _1fragemrl _1fragemrq _1fragems0 _1fragemrv _1fragem9q _1fragem96 _1fragemaa _1fragem8m _1fragemc3 _1fragembe _1fragemcs _1fragemap _1fragemnh">

                                                                                        </picture>

                                                                                    </div>

                                                                                    <div

                                                                                        class="1m6j2n3e _1fragemnr _1fragemt2 

                                                                                        _1fragemtl">

                                                                                        <div style="background: white; border: 3px solid red;"

                                                                                            class="_99ss3s1 _1fragem37 

                                                                                            _1fragemou _1fragemr1 

                                                                                            _99ss3s7 _99ss3s4 _1fragemku 

                                                                                            _1fragemih _1fragemqb _99ss3sc">

                                                                                            <div>

                                                                                                {{ $item['quantity'] }}

                                                                                            </div>

                                                                                        </div>

                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                            <div role="cell"

                                                                                class="_6zbcq53s _1fragem2s _1fragemq5 _1fragemr1 _1fragemq8">

                                                                                <div

                                                                                    class="_1fragem2i _1fragemo1 iZ894">

                                                                                    <p

                                                                                        class="_1x52f9s1 _1fragemo1 _1x52f9sv _1fragemqc">

                                                                                        {{ $item['name'] }}

                                                                                    </p>

                                                                                    <div

                                                                                        class="_1ip0g651 _1fragemo1 _1fragem5z _1fragem8c _1fragem3c">

                                                                                        <p

                                                                                            class="_1x52f9s1 _1fragemo1 _1x52f9st _1fragemqb _1x52f9sp">

                                                                                            {{ $item['color'] }}

                                                                                        </p>

                                                                                        <p> {{ $item['flower_type'] }}

                                                                                            Flower </p>

                                                                                        @if($item['print_type'])
                                                                                                    <span>Personalized {{ $item['print_type'] }}:</span> <br>
                                                                                                    @endif

                                                                                                    <span>
                                                                                                 @if($item['print_text'])
                                                                                                        "{{ $item['print_text'] }}"</span> <br>
                                                                                                        @endif
                                                                                                                @if($item['print_font'])
                                                                                                    <span>{{ $item['print_font'] }} -
                                                                                                         @endif
                                                                                                     @if($item['print_color'])
                                                                                                        {{ ucfirst($item['print_color']) }}</span>

                                                                                                    @endif





                                                                                        <div>

                                                                                            <ul role="list"

                                                                                                class="_1bzftbj1 _1fragemi2 _1fragemkf _1fragemfp _1fragemms _1fragem3c _1fragemo1 _1fragemur _1bzftbj4 _1fragem3w _1fragem69">

                                                                                            </ul>

                                                                                        </div>

                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                            <div role="cell"

                                                                                class="_6zbcq53s _1fragem2s _1fragemq5 _1fragemr1 _6zbcq53q">

                                                                                <div class="_1fragemvc"><span

                                                                                        class="_19gi7yt0 _19gi7yts _1fragemqc">1<span

                                                                                            aria-hidden="true"

                                                                                            class="_19gi7yt0 _19gi7yts _1fragemqc">

                                                                                            x</span></span></div>

                                                                            </div>

                                                                            <div role="cell"

                                                                                class="_6zbcq53s _1fragem2s _1fragemq5 _1fragemr4">

                                                                                <div class="_1fragemq5 _1fragemow _1fragem2s _1fragemr1 _1fragemo1 _16s97g741 bua0H"

                                                                                    style="--_16s97g73w: 6.4rem;">

                                                                                    <span translate="no"

                                                                                        class="_19gi7yt0 _19gi7yts _1fragemqc notranslate">{{env('PAYMENT_CURRENCY_SYMBOL')}}{{ $item['price'] }}</span>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                    @endforeach



                                                                </div>

                                                            </section>

                                                        </div>

                                                        <div

                                                            class="_1ip0g651 _1fragemo1 _1fragem4q _1fragem73 _1fragem3c">

                                                            <section class="_1fragem2i _1fragemo1">

                                                                <div

                                                                    class="_1ip0g651 _1fragemo1 _1fragem4g _1fragem6t _1fragem3c">

                                                                    <form 
                                                                        method="POST"
                                                                        @if ($discount_value === 1 )
                                                                            action="/removeDiscount/{{$order->id}}" 
                                                                        @else
                                                                            action="/getDiscount/{{$order->id}}" 
                                                                        @endif
                                                                        class="_1fragem2n">

                                                                        @csrf

                                                                        <div class="_1fragemo1">

                                                                            <div class="_1fragemo1 _1fragem3c _1fragem3w _1fragem6t _1fragemol _16s97g7f _16s97g7p _16s97g71j _16s97g71t"

                                                                                style="--_16s97g7a: 1fr; --_16s97g7k: minmax(auto, max-content); --_16s97g71e: minmax(0, 1fr) minmax(auto, max-content); --_16s97g71o: minmax(auto, max-content);">

                                                                                <div

                                                                                    class="_7ozb2u2 _1fragem3w _1fragem69 _1fragemo1 _1fragem3c _10vrn9p1 _10vrn9p0 _10vrn9p4 _1fragempt">

                                                                                    <div class="_1fragemo1">

                                                                                        <label

                                                                                            id="ReductionsInput0-label"

                                                                                            for="ReductionsInput0"

                                                                                            class="cektnc3 _1fragemnr _1fragemvb _1fragemuu _1fragemw2 _1fragemvp _1fragemvk _1fragemvy _1fragemvz"><span

                                                                                                class="cektnc9"><span

                                                                                                    class="rermvf1 _1fragemuo _1fragemuq _1fragem2i">

                                                                                                    Discount

                                                                                                    code</span></span>

                                                                                        </label>

                                                                                        <div

                                                                                            class="_7ozb2u6 _1fragemo1 _1fragem3c _1fragemq3 _1fragemvp _1fragemvk _1fragemvy _1fragemw1 _1fragempt _1fragemw8 _7ozb2ul _7ozb2uh">

                                                                                            <input

                                                                                                style="border: 2px solid black;"

                                                                                                id="discountCodeBox"

                                                                                                name="reductions"

                                                                                                placeholder="Discount code"

                                                                                                value = "{{ $discount_code ? $discount_code : '' }}"

                                                                                                type="text"

                                                                                                {{ $discount_value ? 'disabled' : '' }}

                                                                                                aria-labelledby="ReductionsInput0-label"

                                                                                                class="_7ozb2uq _1fragemo1 _1fragemw2 _1fragemqz _1fragemva _7ozb2ur _7ozb2u11 _7ozb2u1h">

                                                                                        </div>

                                                                                    </div>

                                                                                </div>

                                                                                <button 
                                                                                  @if ($discount_value == 1 )
                                                                                     id="RDiscountButton"
                                                                                  @else
                                                                                     id="ADiscountButton"
                                                                                  @endif

                                                                               

                                                                                    style="background: white; color: black;"
                                                                                            type="submit" 
                                                                                    aria-label="Apply Discount Code"><span

                                                                                        class="_1m2hr9gr _1fragemvb _1fragemvt _1fragemvl _1fragemvu _1fragem2s _1fragemr1 _1fragemvd">
                                                                                      @if ($discount_value == 1 )
                                                                                        Remove   
                                                                                        @else
                                                                                        Apply
                                                                                        @endif
                                                                                </span></button>

                                                                            </div>

                                                                        </div>

                                                       

                                                                    </form>

                                                                </div>

                                                            </section>

                                                        </div>
                                                        <script type="text/javascript">
                                                            
                                                             document.getElementById('RDiscountButton').addEventListener('click', (e) => { 

                                                                    e.preventDefault();   
                                                                         const codeBox = document.getElementById('discountCodeBox') 
                                                                        const code = codeBox.value;

                                                                   

                                                                    if (code != null) {

                                                                    const link = `${window.location.origin}/removeDiscount/{{$order->id}}`;    

                                                                    axios.post(link, {reductions: code, headers: 

                                                                      { 'Content-Type': 'application/json' }

                                                                     } ). then ((response) => {  

                                                                      

                                                                    window.location.replace("/cart/checkout/{{$order->id}}");

                                                                        //location.reload(true);

                                                                    })

                                                                      }

                                              })

/**/
                                                              document.getElementById('ADiscountButton').addEventListener('click', (e) => { 

                                                                    e.preventDefault();   
                                                                         const codeBox = document.getElementById('discountCodeBox') 
                                                                        const code = codeBox.value;

                                                                   

                                                                    if (code != null) {

                                                                    const link = `${window.location.origin}/getDiscount{{$order->id}}`;    

                                                                    axios.post(link, {reductions: code, headers: 

                                                                      { 'Content-Type': 'application/json' }

                                                                     } ). then ((response) => {  

                                                                              window.location.replace("/cart/checkout/{{$order->id}}");
                                                                        // location.reload(true); 

                                                                    })

                                                                      }

         

                                                                      })

                                                        </script>

                                                        <section class="_1fragem2i _1fragemo1">

                                                            <div class="_1fragemvc">

                                                                <h4 id="MoneyLine-Heading0"

                                                                    class="n8k95w1 _1fragemo1 n8k95w5">Cost

                                                                    summary

                                                                </h4>

                                                            </div>

                                                            <div role="table" aria-labelledby="MoneyLine-Heading0"

                                                                class="nfgb6p0">

                                                                <div role="row"

                                                                    class="_1qy6ue61 _1fragem3c _1qy6ue65">

                                                                    <div role="rowheader" class="_1qy6ue67"><span

                                                                            class="_19gi7yt0 _19gi7yts _1fragemqc">Subtotal</span>

                                                                    </div>

                                                                    <div role="cell" class="_1qy6ue68"><span

                                                                            translate="no"

                                                                            class="_19gi7yt0 _19gi7yts _1fragemqc notranslate">{{env('PAYMENT_CURRENCY_SYMBOL')}}{{ round(session('total_price'), 2) }}</span>

                                                                    </div>

                                                                </div>

                                                                <div role="row"

                                                                    class="_1qy6ue61 _1fragem3c _1qy6ue65">

                                                                    <div role="rowheader" class="_1qy6ue67">

                                                                        <div

                                                                            class="_1ip0g651 _1fragemo1 _1fragem3w _1fragem69 _1fragem3c">

                                                                            <div

                                                                                class="_1fragemo1 _1fragem2s _1fragemr4">

                                                                                <div

                                                                                    class="_5uqybw2 _1fragem2s _1fragemn7 _1fragem3w _1fragem69 _1fragemoq _1fragemou _1fragemr4">

                                                                                    <span

                                                                                        class="_19gi7yt0 _19gi7yts _1fragemqc">Shipping</span><button

                                                                                        type="button"

                                                                                        aria-label="Shipping policy"

                                                                                        aria-haspopup="dialog"

                                                                                        class="_1m2hr9ge _1fragemvz _1fragemo1 _1fragemq2 _1fragem32 _1fragemvf _1fragemvq _1fragemvu _1fragemvk _1m2hr9g18 _1fragemvq _1fragemvu _1fragemv9 _1fragemvh"><span

                                                                                            class="_1m2hr9gr _1fragemvb _1fragemvt _1fragemvl _1fragemvu _1fragem2s _1fragemr1 _1fragemvd"><span

                                                                                                class="_1fragemqz _1fragem2d _1fragemn2 _1fragemmx a8x1wu9 _1fragem2i a8x1wun a8x1wul a8x1wuy"><svg

                                                                                                    xmlns="http://www.w3.org/2000/svg"

                                                                                                    viewBox="0 0 14 14"

                                                                                                    focusable="false"

                                                                                                    aria-hidden="true"

                                                                                                    class="a8x1wu10 _1fragem2i _1fragemqz _1fragemn2 _1fragemmx _1fragemq4">

                                                                                                    <circle

                                                                                                        cx="7"

                                                                                                        cy="7"

                                                                                                        r="5.6">

                                                                                                    </circle>

                                                                                                    <path

                                                                                                        stroke-linecap="round"

                                                                                                        stroke-linejoin="round"

                                                                                                        d="M5.6 5.1c.2-1.3 2.6-1.3 2.8 0S6.95 6.4 6.95 7.45m.055 2.35H7v.005h.005z">

                                                                                                    </path>

                                                                                                    <circle

                                                                                                        cx="7"

                                                                                                        cy="9.7"

                                                                                                        r="0.1">

                                                                                                    </circle>

                                                                                                </svg></span></span></button>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <!--div role="cell" class="_1qy6ue68"><span

                                                                            translate="no" id="shipping-total"

                                                                            class="_19gi7yt0 _19gi7yts _1fragemqc 

                                                                        _19gi7ytm _19gi7yti notranslate">

                                                                            Enter shipping address</span>

                                                                    </div-->

                                                                </div>

                                                                <div role="row"

                                                                    class="_1x41w3p1 _1fragem3c _1fragemou _1x41w3p5">

                                                                    <div role="rowheader" class="_1x41w3p7"><span

                                                                            class="_19gi7yt0 _19gi7ytw _1fragemqe _19gi7yt2">Total</span>

                                                                    </div>

                                                                    <div role="cell" class="_1x41w3p8">

                                                                        <div class="_1fragemo1 _1fragem2s _1fragemr4">

                                                                            <div

                                                                                class="_5uqybw2 _1fragem2s _1fragemn7 _1fragem46 _1fragem6j _1fragemot _1fragemr4">

                                                                                <abbr translate="no"

                                                                                    class="_19gi7yt0 _19gi7ytq _1fragemqb _19gi7yti notranslate _19gi7yt14 _1fragemvg">{{env('PAYMENT_CURRENCY_SYMBOL')}}</abbr>

                                                                                <strong translate="no"

                                                                                    class="_19gi7yt0 _19gi7yty _1fragemqf _19gi7yt2 notranslate">

                                                                                    <span

                                                                                        id="full-price">{{ $full_price ? round(session('full_price'), 2) : round(session('total_price'), 2) }}</span>

                                                                                </strong>

                                                                            </div>



                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </section>

                                                    </div>

                                                </section>

                                            </div>

                                        </aside>

                                    </div>

                                </div>

                            </div>

                        </div>

              




    </main>

</x-checkout-portal>

