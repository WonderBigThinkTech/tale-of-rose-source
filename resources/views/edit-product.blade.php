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

                                height="433">

                        </a>

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

                        <h1 class="customer-form__title">Edit Product [ {{ $product->name }} ]</h1>

                    </div>

                    <form enctype="multipart/form-data" method="post"

                        action="/account/admin/products/{{ $product->id }}" id="RegisterForm" accept-charset="UTF-8"

                        data-login-with-shop-sign-up="true" novalidate="novalidate" class="create-account-form">

                        @csrf

                        @method('PUT')

                        <input type="hidden" name="form_type" value="create_customer" /><input type="hidden"

                            name="utf8" value="✓" />

                        <div class="customer-form__content">

                            <div class="customer-form__fieldset">

                                <div class="customer-form__fieldset-first-name">

                                    <label class="customer-form__fieldset-label" for="name">Product

                                        Name</label>

                                    <input type="text" class="customer-form__input" value="{{ $product->name }}"

                                        name="name" id="FirstName">

                                </div>
<div class="customer-form__fieldset-last-name">
                                <label class="customer-form__fieldset-label" for="color">Color</label>
                                <select multiple name="color[]" id="color" style="height: 500px;" class="customer-form__input select-country" data-default="" required onchange="showFileInputs()">

                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}" 
                                            @if(in_array($color->id, $sel_colors))
                                            selected
                                              @endif
                                            >{{ $color->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                                     @php
                                        $colorImages = json_decode($product->eachcolor_image, true); 
                                    @endphp

                                    <div class="remove-colors">
                                        @foreach ($colorImages as $color => $imageName)
                                                @php
                                                    $imageRecord = \App\Models\Color::where('id', $color)->get()->toArray();
                                                    @endphp
                                                        <img src="/storage/products/{{$imageName}}" width="120">
                                    <a href="/account/admin/products/remove-colors/{{$product->id}}/{{$color}}" style="color: #fff;background: red;padding: 4px;    margin: 8px 0 20px;    display: inline-block; ">{{$imageRecord[0]['name']}} :Remove Color<a>
                                    <br>
                                @endforeach

                                    </div>

                            <div id="file-inputs">
                                @foreach ($colorImages as $color => $imageName)
                                                @php
                                                    $imageRecord = \App\Models\Color::where('id', $color)->get()->toArray();
                                                    @endphp
                                    <label for="{{$color}}">{{$imageRecord[0]['name']}}: </label>
                                    <input type="file" name="{{$color}}[]"  id="{{$color}}">
                                    <br>
                                @endforeach
                            </div>

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

                                    <label class="address__edit-form-fieldset-label" for="flower_type">Flower

                                        Type</label>

                                    <select name="flower_type" id="selectBox"

                                        class="customer-form__input select-country" data-default="">



                                        <option value="Preserved"

                                            {{ $product->flower_type == 'Preserved' ? 'selected' : '' }}>

                                            Preserved Flower

                                        </option>



                                        <option value="Fresh"

                                            {{ $product->flower_type == 'Fresh' ? 'selected' : '' }}>

                                            Fresh Flower

                                        </option>









                                    </select>

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="address__edit-form-fieldset-label" for="event">Event</label>

                                    <select multiple name="event[]" id="event"

                                        class="customer-form__input select-country" data-default="" required>

                                        @foreach ($everydayEvents as $event)

                                            <option value="{{ $event->name }}"

                                                {{ $product->events->where('id', $event->id)->value('id') == $event->id ? 'selected' : '' }}>

                                                {{ $event->name }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>



                                <div class="address__edit-form-fieldset-default-address">

                                    <input type="checkbox" name="hasMessage" value=1

                                        {{ $product->hasMessage ? 'checked' : '' }} />

                                    <label for="default">Add custom message</label>

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="address__edit-form-fieldset-label" for="type">Type</label>

                                    <select multiple name="type[]" id="type"

                                        class="customer-form__input select-country" data-default="" required>

                                        @foreach ($types as $type)

                                            <option value="{{ $type->name }}"

                                                {{ $product->types->where('id', $type->id)->value('id') == $type->id ? 'selected' : '' }}>

                                                {{ $type->name }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="address__edit-form-fieldset-label" for="material">Material</label>

                                    <select multiple name="material[]" id="material"

                                        class="customer-form__input select-country" data-default="" required>

                                        @foreach ($materials as $material)

                                            <option value="{{ $material->name }}"

                                                {{ $product->materials->where('id', $material->id)->value('id') == $material->id ? 'selected' : '' }}>

                                                {{ $material->name }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="address__edit-form-fieldset-label" for="size">Size</label>

                                    <select multiple name="size[]" id="size"

                                        class="customer-form__input select-country" data-default="" required>

                                        @foreach ($sizes as $size)

                                            <option value="{{ $size->name }}"

                                                {{ $product->sizes->where('id', $size->id)->value('id') == $size->id ? 'selected' : '' }}>

                                                {{ $size->name }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="address__edit-form-fieldset-label" for="shape">Shape</label>

                                    <select multiple name="shape[]" id="shape"

                                        class="customer-form__input select-country" data-default="" required>

                                        @foreach ($shapes as $shape)

                                            <option value="{{ $shape->name }}"

                                                {{ $product->shapes->where('id', $shape->id)->value('id') == $shape->id ? 'selected' : '' }}>

                                                {{ $shape->name }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>



                               





                                <div class="customer-form__fieldset-last-name">

                                    <label class="customer-form__fieldset-label" for="SKU">SKU</label>

                                    <input type="text" class="customer-form__input" name="SKU" id="LastName"

                                        value="{{ $product->SKU }}">

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="customer-form__fieldset-label" for="price">Price</label>

                                    <input type="number" class="customer-form__input" name="price" id="LastName"

                                        value="{{ $product->price }}">

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="customer-form__fieldset-label" for="quantity">Quantity</label>

                                    <input type="number" class="customer-form__input" name="quantity"

                                        id="LastName" value="{{ $product->quantity }}">

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="customer-form__fieldset-label" for="box_material">Box

                                        Material</label>

                                    <input type="text" class="customer-form__input" name="box_material"

                                        id="LastName" value="{{ $product->box_material }}">

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="customer-form__fieldset-label" for="box_content">Box Content</label>

                                    <input type="text" class="customer-form__input" name="box_content"

                                        id="LastName" value="{{ $product->box_content }}">

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="customer-form__fieldset-label" for="box_dimension_inner">Inner Box

                                        Dimension</label>

                                    <input type="text" class="customer-form__input" name="box_dimension_inner"

                                        id="LastName" value="{{ $product->box_dimension_inner }}">

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="customer-form__fieldset-label" for="box_dimension_outer">Outer Box

                                        Dimension</label>

                                    <input type="text" class="customer-form__input" name="box_dimension_outer"

                                        id="LastName" value="{{ $product->box_dimension_outer }}">

                                </div>



                                <div class="customer-form__fieldset-last-name">

                                    <label class="customer-form__fieldset-label" for="description">Description</label>

                                    <textarea rows="10" class="customer-form__input" name="description" id="LastName">{{ $product->description }}</textarea>

                                </div>



                                <!--div class="customer-form__fieldset-last-name">

                                    <label class="customer-form__fieldset-label" for="image">Product Image</label>

                                    <input type="file" multiple class="customer-form__input" name="image[]"

                                        id="upload-button">

                                    <div id="display-multiple-image" style="display: flex; justify-content: center;">

                                        @foreach ($product->images as $image)

                                            <div class="row">

                                                <img style="margin: 5px 5px;"

                                                    src="/storage/products/{{ $image->name }}" alt=""

                                                    width="100">

                                                <input type="button" onclick="return this.parentNode.remove();"

                                                    value="Remove" class="deleteImg"

                                                    style="cursor: pointer; width: 100%;

                                                    display: flex; height: 30px; background-color: red; color: white;">





                                            </div>

                                        @endforeach





                                    </div>



                                </div-->







                                <button type="submit" value=Create class="customer-form__button">

                                    Edit Product

                                </button>

                            </div>



                    </form>

                </div>

            </div>



            <limespot></limespot>

        </section>





    </main>

</x-layout>

