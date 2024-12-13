<x-layout>
    <main id="MainContent" class="main-content">


        @include('menu-mobile')

        <div class="DrawerOverlay"></div>
        <section id="account-layout">
            <h2 class="hide">AccountContent</h2>

            <!-- start account.liquid (TEMPLATE) -->
            @include('admin-bar', ['title' => 'Fonts'])


            <div class="account__info-wrapper wrapper">

                <div class="account__address-wrapper"><!-- start snippets/customer-address.liquid -->

                    <table class="account__address-table" style="width: 100%; text-align: center; margin-top: 30px;">
                        <div style="display: flex;">
                            <a href="/account/admin/fonts/create"
                                style="display:flex; justify-content: center; color: white; background-color: green;padding-top: 5px;
                                                width: 150px; height: 40px; border-radius: 5px; font-size: 22px;">
                                Add Font
                            </a>
                        </div>


                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>FONT</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fonts as $font)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $font->name }}</td>
                                    <td style="font-size: 50px; font-family: {{ $font->name }};">{{ $font->name }}
                                    </td>
                                    <style>
                                        @font-face {
                                            font-family: {{ $font->name }};
                                            src: url('/storage/fonts/{{ $font->font }}');
                                        }
                                    </style>

                                    <td style="display: flex;">

                                        <a href="/account/admin/fonts/{{ $font->id }}/edit" class="edit-font-modal"
                                            aria-valuenow="{{ $font->id }}"
                                            style="color: white; background-color: green;padding-top: 5px;
                                                width: 40px; height: 40px; border-radius: 5px; font-size: 22px;">
                                            <i class='fas fa-edit'></i>
                                        </a>

                                        <div>
                                            <button aria-valueNow="{{ $font->id }}" class="delete-font-modal"
                                                style="color: white; background-color: red;
                                                width: 40px; height: 40px; border-radius: 5px; font-size: 22px;">
                                                <i class='fas fa-trash'></i>
                                            </button>
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
