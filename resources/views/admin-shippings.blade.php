<x-layout>
    <main id="MainContent" class="main-content">


        @include('menu-mobile')

        <div class="DrawerOverlay"></div>
        <section id="account-layout">
            <h2 class="hide">AccountContent</h2>

            <!-- start account.liquid (TEMPLATE) -->
            @include('admin-bar', ['title' => 'Shipping Cost'])


            <div class="account__info-wrapper wrapper">

                <div class="account__address-wrapper"><!-- start snippets/customer-address.liquid -->

                    <table class="account__address-table" style="width: 100%; text-align: center; margin-top: 30px;">
                        <div class="customer-form__content">
                            <div style=" display: flex; justify-content: space-between"
                                class="customer-form__fieldset-last-name">
                                <select style="width: 15%;" name="state" id="stateBox"
                                    class="customer-form__input select-country">

                                    @foreach ($states as $state)
                                        <option value={{ $state }} {{ $st == $state ? 'selected' : '' }}>
                                            {{ $state }}
                                        </option>
                                    @endforeach
                                </select>

                                <button id="set-standard-cost"
                                    style="display:flex; justify-content: center; color: white; background-color: green;padding-top: 5px;
                                                width: 400px; height: 40px; border-radius: 5px; font-size: 22px;">
                                    Set Standard Cost
                                </button>


                                <button id="set-express-cost"
                                    style="display:flex; justify-content: center; color: white; background-color: green;padding-top: 5px;
                                                width: 400px; height: 40px; border-radius: 5px; font-size: 22px;">
                                    Set Express Cost
                                </button>

                                <script>
                                    const selectBox = document.getElementById('stateBox');

                                    selectBox.addEventListener('change', function() {
                                        const link = `${window.location.origin}/custom/shippings/` + selectBox.value;

                                        location.href = link;

                                    })
                                </script>
                            </div>
                        </div>


                        <thead>
                            <tr>

                                <th>POSTCODE</th>
                                <th>LOCALITY</th>
                                <th>STANDARD DELIVERY</th>
                                <th>EXPRESS DELIVERY</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($postcodes as $postCode)
                                <tr>

                                    <td>{{ $postCode->postcode }}</td>
                                    <td>{{ $postCode->locality }}</td>
                                    <form action="/custom/shippings/edit/{{ $postCode->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <td> <input disabled name="standard" class="standard-cost" type="number"
                                                value="{{ $postCode->standard }}"> </td>
                                        <td><input disabled name="express" class="express-cost" type="number"
                                                value="{{ $postCode->express }}">
                                        </td>
                                        <td style="display: flex;">
                                            <button class="cost-save-button" type="submit"
                                                style="color: white; background-color: black;padding-top: 5px;
                                                width: 100px; height: 40px; border-radius: 5px; font-size: 22px;">
                                                Save
                                            </button>
                                    </form>


                                    <button class="cost-edit-button"
                                        style="color: white; background-color: green;padding-top: 5px;
                                                width: 40px; height: 40px; border-radius: 5px; font-size: 22px;">
                                        <i class='fas fa-edit'></i>
                                    </button>

                                    </td>

                                    <style>
                                        .standard-cost,
                                        .express-cost {
                                            width: 100px;
                                            height: 50px;
                                            text-align: center;
                                            font-size: 22px;
                                            border: none;
                                            background: transparent;
                                            color: black;
                                        }

                                        .cost-save-button {
                                            display: none;
                                        }
                                    </style>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{ $postcodes->links() }}
                </div>
            </div>

            </div>
            </div>

            <script type="lazyload_int">
 jQuery(document).ready(function ($){
 $('.account__orders-table-row').click(function (){
 window.location = $(this).data('href');
 });
 });
</script>

            <limespot></limespot>
        </section>


    </main>

</x-layout>
