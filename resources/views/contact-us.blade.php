<x-layout>
    <main id="MainContent" class="main-content">


        @include('menu-mobile')

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
                        width: 40%;
                    }

                    .contact-form__form-field--language {
                        width: 32.25%;
                    }

                    .contact-form__form-field--email {
                        width: 65%;
                    }

                    .contact-form__form-field--phone {
                        width: 33%;
                    }

                    .contact-form__form-field--country,
                    .contact-form__form-field--city {
                        width: 45.6%;
                    }

                    .contact-form__form-field--state,
                    .contact-form__form-field--description {
                        width: 100%;
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
                    #ContactFormHowDidYouHear{
                        height:auto;
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

                        .contact-form__form-field--language {
                        width: 32.25%;
                    }

                    .contact-form__form-field--fullname {
                        width: 100%;
                    }

                    .contact-form__form-field--language {
                        width: 100%;
                    }


                    .contact-form__form-field--email {
                        width: 65%;
                    }

                    .contact-form__form-field--phone {
                        width: 33%;
                    }

                    .contact-form__form-field--country,
                    .contact-form__form-field--city {
                        width: 45.6%;
                    }

                    .contact-form__form-field--state,
                    .contact-form__form-field--description {
                        width: 100%;
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="wrapper">
                    <div class="contact-form">

                        <div class="contact-form__headline-wrapper">
                            <h2 class="section-title contact-form__title">Contact Form</h2>
                            <p class="section-subtitle contact-form__subtitle"></p>
                        </div>


                        <div class="contact-form__wrapper">
                            <form method="post" action="{{ route('contact.store') }}" id="contact_form" accept-charset="UTF-8"
                                class="contact-form__form"><input type="hidden" name="form_type"
                                    value="contact" /><input type="hidden" name="utf8" value="✓" />
                                    @csrf
                                <input type="text" name="name" id="ContactFormFullName"
                                    class="contact-form__form-field contact-form__form-field--fullname contact-form__input"
                                    placeholder="Full Name" value="" required>

                                <!-- <input name="contact[preferred_language]" id="ContactFormPreferredLanguage"
                                    class="contact-form__form-field contact-form__form-field--language contact-form__input"
                                    value="" placeholder="Preferred Language" required> -->

                                <input type="email" name="email" id="ContactFormEmail"
                                    placeholder="Email Address"
                                    class="contact-form__form-field contact-form__form-field--email contact-form__input"
                                    spellcheck="false" autocomplete="off" autocapitalize="off" required>

                                <input type="tel" name="phone" id="ContactFormPhone" placeholder="Phone"
                                    class="contact-form__form-field contact-form__form-field--phone contact-form__input"
                                    value="" pattern="[0-9\-]*" required>

                                <!-- <input type="text" name="contact[country]" id="ContactFormCountry"
                                    placeholder="Country"
                                    class="contact-form__form-field contact-form__form-field--country contact-form__input"
                                    value="" required>

                                <input type="text" name="contact[state]" id="ContactFormState" placeholder="State"
                                    class="contact-form__form-field contact-form__form-field--state contact-form__input"
                                    value="" required>

                                <input type="text" name="contact[city]" id="ContactFormCity" placeholder="City"
                                    class="contact-form__form-field contact-form__form-field--city contact-form__input"
                                    value="" required> -->

                                <textarea rows="10" name="message" id="ContactFormHowDidYouHear"
                                    placeholder="Message"
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
            <div id="shopify-section-template--16265135128735__custom_area_RECMxL" class="shopify-section custom-area">
                <!-- start custom-area.liquid (SECTION) -->
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
