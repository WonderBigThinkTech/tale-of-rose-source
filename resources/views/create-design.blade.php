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

                    /*xxxx*/

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

                        <h1 class="customer-form__title">Create Design</h1>

                    </div>

                    <form enctype="multipart/form-data" method="post" action="/account/admin/products/create"

                        id="RegisterForm" accept-charset="UTF-8" data-login-with-shop-sign-up="true"

                        novalidate="novalidate" class="create-account-form">

                        @csrf

                        <input type="hidden" name="form_type" value="create_customer" /><input type="hidden"

                            name="utf8" value="✓" />

                        <div class="customer-form__content">

                            <div class="customer-form__fieldset">

                                <div class="d-none customer-form__fieldset-first-name">

                                    <label class="customer-form__fieldset-label" for="name">Product

                                        Name</label>

                                    <input type="text" class="customer-form__input" name="name" id="FirstName"

                                        value="Try Before Buy">

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="customer-form__fieldset-label" for="flower_type">Flower Type</label>

                                    <select name="flower_type" id="selectBox"

                                        class="customer-form__input select-country" data-default="">

                                        <option value="Preserved">

                                            Preserved Flower

                                        </option>

                                        <option value="Fresh">

                                            Fresh Flower

                                        </option>

                                    </select>

                                </div>





                                <div class="customer-form__fieldset-last-name">

                                    <label class="customer-form__fieldset-label" for="color">Color</label>

                                    <select multiple name="color[]" id="color" style="height: 300px;"

                                        class="customer-form__input select-country" data-default="" required onchange="showFileInputs()">

                                        @foreach ($colors as $color)

                                            <option value="{{ $color->id }}">

                                                {{ $color->name }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>

  <div id="file-inputs"></div>

                            <script>
                            function showFileInputs() {
                               
                                var select = document.getElementById('color');
                                var selectedColors = Array.from(select.selectedOptions).map(option => option);
                                var fileInputsDiv = document.getElementById('file-inputs');
                                
                                // Clear previous file inputs
                                fileInputsDiv.innerHTML = '';
                                
                                selectedColors.forEach(color => {
                                    // Create a label for each color
                                    var label = document.createElement('label');
                                    label.textContent = color.text + ': ';
                                    label.htmlFor = color.value; // Assigning for attribute to the label
                                    
                                    // Create input for the color
                                    var input = document.createElement('input');
                                    input.type = 'file';
                                    input.name = color.value + '[]'; // Set name attribute to color[]
                                    input.id = color.value; // Assigning the ID as the color name
                                    input.multiple = true; // Allow multiple files
                                    
                                    // Append the label and input to the div and add a line break
                                    fileInputsDiv.appendChild(label);
                                    fileInputsDiv.appendChild(input);
                                    fileInputsDiv.appendChild(document.createElement('br'));
                                });
                            }
                            </script>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="customer-form__fieldset-label" for="SKU">SKU</label>

                                    <input type="text" class="customer-form__input" name="SKU" id="LastName"

                                        placeholder="0000">

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="customer-form__fieldset-label" for="price">Price</label>

                                    <input type="number" class="customer-form__input" name="price" id="LastName"

                                        placeholder="$0.00">

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="customer-form__fieldset-label" for="quantity">Quantity</label>

                                    <input type="number" class="customer-form__input" name="quantity" id="LastName"

                                        placeholder="0">

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="customer-form__fieldset-label" for="box_material">Box

                                        Material</label>

                                    <input type="text" class="customer-form__input" name="box_material"

                                        id="LastName" placeholder="Box Material">

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="customer-form__fieldset-label" for="box_content">Box Content</label>

                                    <input type="text" class="customer-form__input" name="box_content"

                                        id="LastName" placeholder="Box Content">

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="customer-form__fieldset-label" for="box_dimension_inner">Inner Box

                                        Dimension</label>

                                    <input type="text" class="customer-form__input" name="box_dimension_inner"

                                        id="LastName" placeholder="LxWxH">

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="customer-form__fieldset-label" for="box_dimension_outer">Outer Box

                                        Dimension</label>

                                    <input type="text" class="customer-form__input" name="box_dimension_outer"

                                        id="LastName" placeholder="LxWxH">

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="customer-form__fieldset-label" for="description">Description</label>

                                    <textarea rows="10" class="customer-form__input" name="description" id="LastName"

                                        placeholder="Product description">

                                        </textarea>

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="customer-form__fieldset-label" for="image">Product Image</label>

                                    <input type="file" multiple class="customer-form__input" name="image[]"

                                        id="upload-button">



                                    <div id="display-multiple-image" style="display: flex; justify-content: center;">



                                    </div>

                                </div>







                                <button type="submit" value=Create class="customer-form__button">

                                    Create

                                </button>

                            </div>



                    </form>

                </div>

            </div>



            <limespot></limespot>

        </section>





    </main>

</x-layout>

