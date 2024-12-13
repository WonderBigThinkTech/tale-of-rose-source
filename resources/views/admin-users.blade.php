<x-layout>
    <main id="MainContent" class="main-content">


        @include('menu-mobile')

        <div class="DrawerOverlay"></div>
        <section id="account-layout">
            <h2 class="hide">AccountContent</h2>

            <!-- start account.liquid (TEMPLATE) -->
            @include('admin-bar', ['title' => 'Users'])


            <div class="account__info-wrapper wrapper">

                <div class="account__address-wrapper"><!-- start snippets/customer-address.liquid -->

                    <table class="account__address-table" style="width: 100%; text-align: center; margin-top: 30px;">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>VERIFIED</th>
                                <th>SUB-ADMIN</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->firstName . ' ' . $user->lastName }}</td>
                                    <td>{{ $user->email }}</td>


                                    <td>
                                        @if (!$user->isAdmin)
                                            <form action="/account/admin/users/{{ $user->id }}/verify"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    style="color: white; background-color: teal;
                                                width: 40px; height: 40px; border-radius: 5px; font-size: 22px;">
                                                    {{ $user->email_verified_at ? 'X' : 'O' }}
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!$user->isAdmin)
                                            <form action="/account/admin/users/{{ $user->id }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    style="color: white; background-color: green;
                                                width: 40px; height: 40px; border-radius: 5px; font-size: 22px;">
                                                    {{ $user->isSubAdmin ? 'X' : 'O' }}
                                                </button>
                                            </form>
                                        @endif
                                    </td>


                                    <td style="display: flex;">
                                        {{-- <button
                                                    style="color: white; background-color: green;
                                                width: 40px; height: 40px; border-radius: 5px; font-size: 22px;">
                                                    <i class='fas fa-edit'></i>
                                                </button> --}}



                                        @if (!$user->isAdmin)
                                            {{-- <form action="/admin/users/update/{{ $user->id }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="text" name="password">
                                                            <input type="submit" value="SUBMIT">
                                                        </form> --}}
                                            <button class="changePass-modal"
                                                style="color: white; background-color: maroon;
                                                        padding: 0px 15px;
                                                border-radius: 5px; font-size: 16px;">
                                                Change <br> Password
                                            </button>

                                            <div>
                                                <button aria-valueNow="{{ $user->id }}" class="delete-modal"
                                                    style="color: white; background-color: red;
                                                width: 40px; height: 40px; border-radius: 5px; font-size: 22px;">
                                                    <i class='fas fa-trash'></i>
                                                </button>
                                            </div>
                                        @endif
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
