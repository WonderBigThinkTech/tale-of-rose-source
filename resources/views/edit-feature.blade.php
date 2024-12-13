<x-layout>
    <main id="MainContent" class="main-content">


        @include('menu-mobile')

        <div class="DrawerOverlay"></div>
        <section id="register-layout">
            <h2 class="hide">RegisterContent</h2>

            <!-- start register.liquid (TEMPLATE) -->
            <style>
                .customer-form__wrapper {
                    width: 100%;
                    margin: 60px auto;
                    float: left;
                }

                .customer-form__title-wrapper {
                    text-align: center;
                    margin-bottom: 32px;
                }

                .customer-form__title {
                    padding: 25px 0 12px;
                }

                .customer-form__sub-title {
                    color: #555555;
                }

                .customer-form__message-errors {
                    margin-bottom: 20px;
                }

                .customer-form__message-title {
                    text-align: center;
                    font-size: 20px;
                }

                .customer-form__list-errors {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                }

                .customer-form__content {
                    max-width: 100%;
                    width: 440px;
                    height: 100%;
                    margin: 0 auto;
                    padding: 32px 40px;
                    border-radius: 10px;
                    box-shadow: 0px 10px 20px -3px #00000080;
                }

                .customer-form__fieldset {
                    width: 100%;
                    display: flex;
                    flex-direction: column;
                    gap: 20px;
                    margin-bottom: 24px;
                }

                .customer-form__fieldset-label {
                    display: inline-block;
                    margin-bottom: 5px;
                    font-size: 20px;
                }

                .customer-form__fieldset .customer-form__input {
                    width: 100%;
                    padding: 10px 14px;
                    border-radius: 8px;
                    display: flex;
                    align-items: center;
                    border: 1px solid #EEE;
                    background: #FFF;
                    box-shadow: 0px 1px 2px 0px #1018280D;
                }

                .customer-form__fieldset .customer-form__input::placeholder {
                    color: #bcbcbc;
                }

                .customer-form__fieldset .customer-form__input {
                    font-size: 18px;
                }

                .customer-form__wrapper .customer-form__button {
                    width: 100%;
                    display: flex;
                    padding: 10px 18px;
                    justify-content: center;
                    align-items: center;
                    color: #FFF;
                    font-size: 14px;
                    margin-bottom: 12px;
                    border-radius: 8px;
                    border: 1px solid #1B4E9B;
                    background: #1B4E9B;
                    box-shadow: 0px 1px 2px 0px rgba(16, 24, 40, 0.05);
                    cursor: pointer;
                    font-weight: 500;
                }

                .customer-form__wrapper .customer-form__button:hover,
                .customer-form__wrapper .customer-form__button:active {
                    background: #0b2751;
                }

                .customer-form__buttons {
                    margin-top: 32px;
                    display: flex;
                    align-items: center;
                    flex-direction: column;
                    gap: 12px;
                }

                .customer-form__register-text {
                    color: #252525;
                    font-size: 14px;
                }

                .customer-form__link-login {
                    color: #1B4E9B;
                    font-size: 14px;
                    font-weight: 700;
                }

                .customer-form__link-cancel {
                    color: #252525;
                    font-size: 14px;
                    font-weight: 500;
                }

                @media (max-width: 1019px) {
                    .customer-form__wrapper {
                        margin: 15px auto 35px;
                    }
                }

                @media (max-width: 767px) {
                    .customer-form__title-wrapper {
                        margin-bottom: 15px;
                    }

                    .customer-form__content {
                        padding: 25px 30px;
                    }

                    .customer-form__fieldset {
                        gap: 16px;
                        margin-bottom: 20px;
                    }

                    .customer-form__wrapper .customer-form__button {
                        margin-bottom: 8px;
                        padding: 8px 14px;
                    }

                    .customer-form__buttons {
                        margin-top: 15px;
                    }
                }
            </style>
            <div class="customer-form__wrapper">
                <div class="customer-register-form__wrapper wrapper" id="CustomerLoginForm">


                    <div class="customer-form__logo-wrapper">
                        <a href="/"
                            class="customer-form__logo-link"><!-- start responsive-image.liquid (SNIPPET) -->


                            <img id="583621690" class="responsive-image" src="/storage/logo/logo.png"
                                sizes="(max-width: 479px) 480px, (max-width: 767px) 768px, (max-width: 1019px) 1020px, (max-width: 1279px) 1280px"
                                alt="Image" width="400" height="433"></a>
                    </div>

                    <style>
                        .customer-form__logo-wrapper {
                            display: flex;
                            margin: 0 auto;

                            height: auto;
                            width: 60px;

                        }

                        .customer-form__logo-wrapper img,
                        .customer-form__logo-wrapper svg {
                            width: 100%;
                            height: 100%;
                        }

                        @media (max-width: 1019px) {
                            .customer-form__logo-wrapper {

                                width: px;

                            }
                        }

                        @media (max-width: 767px) {
                            .customer-form__logo-wrapper {

                                width: px;

                            }
                        }
                    </style>



                    <div class="customer-form__title-wrapper">
                        <h1 class="customer-form__title">Edit Feature</h1>
                    </div>
                    <form enctype="multipart/form-data" method="post"
                        action="/custom/features/{{ $feature->id }}/edit" id="RegisterForm" accept-charset="UTF-8"
                        data-login-with-shop-sign-up="true" novalidate="novalidate" class="create-account-form">
                        @csrf
                        @method('PUT')

                        <div class="customer-form__content">
                            <div class="customer-form__fieldset">
                                <div class="customer-form__fieldset-last-name" style="pointer-events:none;">
                                    <label class="address__edit-form-fieldset-label" for="type">Type</label>
                                    <select name="type" id="type" class="customer-form__input select-country"
                                        data-default="">

                                        <option value="{{ $feature->type }}">
                                            {{ $feature->type }}
                                        </option>


                                    </select>
                                </div>



                                @if ($feature->type == 'Feature Text')
                                    <div class="customer-form__fieldset-first-name">
                                        <label class="customer-form__fieldset-label" for="content">Content</label>
                                        <input type="text" class="customer-form__input" name="content" id="FirstName"
                                            value="{{ $feature->content }}">
                                    </div>
                                @else
                                    <div class="customer-form__fieldset-last-name">
                                        <label class="customer-form__fieldset-label" for="content">Content</label>
                                        <input type="file" class="customer-form__input" name="content"
                                            id="upload-button">

                                        <div style="display: flex; justify-content: center;">

                                            <img id="edit-image" style="margin: 5px 5px;" src="" alt=""
                                                width="200">


                                        </div>
                                    </div>
                                @endif





                                <button type="submit" value=Create class="customer-form__button">
                                    Edit
                                </button>
                            </div>

                    </form>
                </div>
            </div>

            <limespot></limespot>
        </section>


    </main>
</x-layout>
