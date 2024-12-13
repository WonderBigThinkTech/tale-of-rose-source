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

    <div class="customer-form__wrapper">
        @if (session('status'))
            <div class="alert alert-success text-center">
                {{ session('status') }}
            </div>
        @endif
        <form method="post" action="{{ route('password.update') }}" id="reset_customer_password" accept-charset="UTF-8">
            @csrf
            @method('PUT')
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="form_type" value="reset_customer_password" />

            <input type="hidden" name="utf8" value="✓" />
            <div class="customer-form__title-wrapper">
                <h1 class="customer-form__title">Reset account password</h1>
                <p class="customer-form__sub-title" id="id-password">Enter a new password for xxx@gmail.com</p>
            </div>

            <div class="customer-form__content">



                <div class="customer-form__fieldset">


                    <input type="hidden" value="{{ session('resetEmail') }}" name="email">


                    <div class="customer-form__fieldset-password">
                        <label class="customer-form__fieldset-label" for="password">Password</label>
                        <input type="password" value="" name="password" id="ResetPassword"
                            class="customer-form__input" placeholder="••••••••">
                    </div>

                    <div class="customer-form__fieldset-password-confirmation">
                        <label class="customer-form__fieldset-label" for="password_confirmation">Confirm
                            Password</label>
                        <input type="password" value="" name="password_confirmation" id="PasswordConfirmation"
                            class="customer-form__input" placeholder="••••••••">
                    </div>
                </div>
                <input type="submit" name="submit" id="id-btn--full" class="customer-form__button"
                    value="Reset Password">
            </div><input type="hidden" name="token" value="{{ $token }}" />

        </form>
    </div>


</x-layout>
