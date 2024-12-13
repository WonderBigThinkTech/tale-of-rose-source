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
                    <a href="/account/admin/products/create">
                        <h3>Add Product</h3>
                    </a>
                    <table class="account__address-table" style="width: 100%; text-align: center; margin-top: 30px;" border="1">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>SKU</th>
                                <th>PRICE</th>
                                <th>QUANTITY</th>
                                <th>Colors</th>
                                <th>SOLD AMOUNT</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            
                            @foreach ($products as $key => $product)
                                <tr style="border-bottom: 1px solid black">
                                    <td>{{ $products->firstItem() + $key }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->SKU }}</td>
                                    <td>${{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                    @php
                                        $colorImages = json_decode($product->eachcolor_image, true); 
                                    @endphp

                                    <div style="margin-bottom: 5px; display: flex; flex-direction: row; gap: 5px;">
                                        @if(is_array($colorImages) && count($colorImages) > 0)
                                            @foreach ($colorImages as $color => $imageName)
                                                @php
                                                    $imageRecord = \App\Models\Color::where('id', $color)->first(); 
                                                @endphp
                                                @if($imageRecord)
                                                <div>
                                                    <img 
                                                        src="{{ asset('storage/color/'.$imageRecord->image) }}" 
                                                        alt="{{ $color }}" 
                                                        style="width: 30px; height: 30px; border-radius: 50%; cursor: pointer;" 
                                                        onclick="openModal('{{ asset('uploads/' . $imageName) }}')"
                                                    >
                                                </div>
                                                @else
                                                    <p>No image found for {{ $color }}</p>
                                                @endif                                          
                                            @endforeach 
                                        @else
                                            <p>No color images available.</p>
                                        @endif
                                    </div>

<!-- Modal Structure -->
<div id="imageModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.8); align-items:center; justify-content:center;">
    <span onclick="closeModal()" style="position:absolute; top:20px; right:30px; color:white; cursor:pointer;">&times;</span>
    <img id="modalImage" src="" alt="Modal Image" style="max-width: 90%; max-height: 90%; margin:auto; display:block;" />
    
    
</div>

<script>
function openModal(imageSrc) {
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('imageModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('imageModal').style.display = 'none';
}
</script>
                                    </td>

                                        <td>{{ $product->sold_amount }}</td>
                                    <td>
                                        <div style="display: flex;">

                                            <a href="/account/admin/products/{{ $product->id }}/edit"
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
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                  
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <div class="pr-lnmk">
                      {{ $products->links() }}
                      </div>
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

<style type="text/css">
   .pr-lnmk{width: 100%;margin-bottom: 30px;}
.pr-lnmk    .py-2{padding-bottom: .3rem !important;padding-top: .3rem !important;}
    nav[role="navigation"] {width:100%; align-items: flex-end;gap: 15px;justify-content: center;}

    nav[role="navigation"] svg{width: 20px;margin-bottom: 8px}
</style>
    </main>
</x-layout>
