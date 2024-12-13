<x-layout>
    <style>
        .customer-form {
            width: 100%;
            margin: 60px auto;
            float: left;
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

        .customer-form__error {
            margin-bottom: 20px;
        }

        .customer-form__error ul {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .customer-form__fieldset {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 24px;
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

        .customer-form__fieldset-label {
            display: inline-block;
            margin-bottom: 5px;
            font-size: 14px;
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

        .customer-form__link-recover {
            color: #595959;
            text-align: center;
            font-size: 14px;
            display: block;
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

        .customer-form__link-register {
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
            .customer-form {
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
    <div class="customer-form">
        @if (session('status'))
            <div class="alert alert-success text-center">
                {{ session('status') }}
            </div>
        @endif
        <div class="customer-login-form__wrapper wrapper">
            <div class="customer-form__wrapper">


                <div class="customer-form__logo-wrapper">
                    <a href="/" class="customer-form__logo-link"><!-- start responsive-image.liquid (SNIPPET) -->


                        <img id="993367281" class="responsive-image"
                            src="//speakingroses.com/cdn/shop/files/Favicon.svg?v=1700829289&width=50"
                            srcset="//speakingroses.com/cdn/shop/files/Favicon.svg?v=1700829289&width=100 100w,//speakingroses.com/cdn/shop/files/Favicon.svg?v=1700829289&width=153 153w,//speakingroses.com/cdn/shop/files/Favicon.svg?v=1700829289&width=234 234w,//speakingroses.com/cdn/shop/files/Favicon.svg?v=1700829289&width=358 358w,//speakingroses.com/cdn/shop/files/Favicon.svg?v=1700829289&width=548 548w,"
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



                <div id="RecoverPasswordForm" class="customer-form__recover-password-form" style="display: block;">
                    <div class="customer-form__title-wrapper">
                        <h1 class="customer-form__title" id="RecoverHeading">Reset your password</h1>

                        <p class="customer-form__sub-title">We will send you an email to reset your password.
                        </p>
                    </div>

                    <form method="post" action="/account/recover" accept-charset="UTF-8">
                        @csrf
                        <input type="hidden" name="form_type" value="recover_customer_password" /><input type="hidden"
                            name="utf8" value="✓" />
                        <div class="customer-form__content">

                            <div class="customer-form__fieldset">
                                <div class="customer-form__fieldset-email">
                                    <label class="customer-form__fieldset-label" for="email">Email</label>
                                    <input id="RecoverEmail" type="email" name="email" autocorrect="off"
                                        autocapitalize="off" placeholder="Enter your email"
                                        class="customer-form__input ">

                                </div>
                            </div>

                            <input id="id-recover-password" type="submit" class="customer-form__button" value="Submit">
                        </div>

                        <div class="customer-form__buttons">
                            <a href="/account/login" class="customer-form__link-cancel"
                                id="HideRecoverPasswordLink">Cancel</a>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</x-layout>
