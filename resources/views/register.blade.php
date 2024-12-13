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


                            <img id="583621690" class="responsive-image" src="/storage/logo/logo.png" width="400"
                                height="433"></a>
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
                        <h1 class="customer-form__title">Create @if (session()->has('isAdmin'))
                                Sub-Admin
                            @endif Account</h1>
                        <p class="customer-form__sub-title">Register @if (session()->has('isAdmin'))
                                Sub-Admin
                            @else
                                your
                            @endif
                            account</p>
                    </div>
                    <form method="post"
                        @if (session()->has('isAdmin')) action="/admin/users/register"
                        @else
                        action="/account/register" @endif
                        id="RegisterForm" accept-charset="UTF-8" data-login-with-shop-sign-up="true"
                        novalidate="novalidate" class="create-account-form">
                        @csrf
                        <input type="hidden" name="form_type" value="create_customer" /><input type="hidden"
                            name="utf8" value="✓" />
                        <div class="customer-form__content">
                            <div class="customer-form__fieldset">
                                <div class="customer-form__fieldset-first-name">
                                    <label class="customer-form__fieldset-label" for="firstName">First
                                        Name</label>
                                    <input type="text" class="customer-form__input" name="firstName" id="FirstName"
                                        placeholder="John" autofocus>
                                </div>

                                <div class="customer-form__fieldset-last-name">
                                    <label class="customer-form__fieldset-label" for="lastName">Last
                                        Name</label>
                                    <input type="text" class="customer-form__input" name="lastName" id="LastName"
                                        placeholder="Doe">
                                </div>

                                <div class="customer-form__fieldset-email">
                                    <label class="customer-form__fieldset-label" for="email">Email</label>
                                    <input type="email" name="email" id="Email" class="customer-form__input "
                                        placeholder="Enter your email" value="" spellcheck="false"
                                        autocomplete="off" autocapitalize="off">
                                </div>

                                <div class="customer-form__fieldset-password">
                                    <label class="customer-form__fieldset-label" for="password">Password</label>
                                    <input type="password" name="password" id="CreatePassword"
                                        class="customer-form__input " placeholder="••••••••">
                                </div>
                            </div>

                            @if (session()->has('isAdmin'))
                                <input type="hidden" id="address_default_address_8943303196831" name="subAdmin"
                                    value="1" />
                            @endif

                            <button type="submit" value=Create class="customer-form__button">
                                Create
                            </button>
                        </div>

                        <div class="customer-form__buttons">
                            <span class="customer-form__register-text">Already have an account? <a title="Login"
                                    class="customer-form__link-login" id="login" href="/account/login">Log
                                    in</a></span>
                            <a title="Register Cancel" class="customer-form__link-cancel" id="id-register-cancel"
                                href="/">Return to Store</a>
                            <input type="hidden" name="return_to" value="/account">
                        </div>
                    </form>
                </div>
            </div>

            <limespot></limespot>
        </section>


    </main>
</x-layout>
