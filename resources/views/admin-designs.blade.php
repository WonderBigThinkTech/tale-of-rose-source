<x-layout>
    <main id="MainContent" class="main-content">


        @include('menu-mobile')

        <div class="DrawerOverlay"></div>
        <section id="account-layout">
            <h2 class="hide">AccountContent</h2>

            <!-- start account.liquid (TEMPLATE) -->
            @include('admin-bar', ['title' => 'Products'])



            <div class="account__info-wrapper wrapper">

                <div class="account__address-wrapper"><!-- start snippets/customer-address.liquid -->

                    {{-- <form action="/account/admin/products/color" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <label>Color Name</label>
                                <input type="text" name="name">
                                <input type="file" name="image">
                                <input type="submit" value="Add Color">
                            </form> --}}
                    <a href="/account/admin/designs/create">
                        <h3>Add Design</h3>
                    </a>
                    <table class="account__address-table" style="width: 100%; text-align: center; margin-top: 30px;">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>SKU</th>
                                <th>PRICE</th>
                                <th>QUANTITY</th>
                                <th>SOLD AMOUNT</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->SKU }}</td>
                                    <td>${{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->sold_amount }}</td>
                                    <td>
                                        <div style="display: flex;">

                                            <a href="/account/admin/designs/{{ $product->id }}/edit"
                                                style="color: white; background-color: green;padding-top: 5px;
                                                width: 40px; height: 40px; border-radius: 5px; font-size: 22px;">
                                                <i class='fas fa-edit'></i>
                                            </a>

                                            <form action="/account/admin/products/{{ $product->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    style="color: white; background-color: red;
                                                width: 40px; height: 40px; border-radius: 5px; font-size: 22px;">
                                                    <i class='fas fa-trash'></i>
                                                </button>
                                            </form>


                                            <form action="/account/admin/products/{{ $product->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                {{-- <button type="submit"
                                                    style="color: white; background-color: red;
                                                width: 40px; height: 40px; border-radius: 5px; font-size: 22px;">
                                                    <i class='fas fa-trash'></i>
                                                </button> --}}
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
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
