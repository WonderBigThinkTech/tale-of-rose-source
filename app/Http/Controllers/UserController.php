<?php

namespace App\Http\Controllers;

use App\Jobs\SendVerificationEmail;
use App\Models\Type;
use App\Models\User;
use App\Models\Address;
use App\Models\Banner;
use App\Models\Faq;
use App\Models\Highlight;
use App\Models\IPAddress;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    public function showHome()
    {
        $products = Product::orderBy('sold_amount', "DESC")->take(4)->get();
        $reviews = Review::all();
        $faqs = Faq::all();
        $highlights = Highlight::all();
        $features = Banner::where('type', '!=', 'home-banner')->get();
        $featureImages = $features->where('type', 'Feature Image')->pluck('content')->all();
        for ($i = 0; $i < count($featureImages); $i++) {
            $image = '/storage/features/' . $featureImages[$i];
            $featureImages[$i] = $image;
        }

        $featureTexts = $features->where('type', 'Feature Text')->pluck('content')->all();

        return view('home', [
            'products' => $products,
            'reviews' => $reviews,
            'highlights' => $highlights,
            'faqs' => $faqs,
            'featureImages' => $featureImages,
            'featureTexts' => $featureTexts
        ]);
    }


    public function showAccount(Session $session)
    {

        $user_email = auth()->user()->email;
        $orders = Order::where('user_email', $user_email)->get();

        if (auth()->user()->hasVerifiedEmail()) {
            return view('account', ['orders' => $orders]);
        } else {
            return redirect('/email/verify');
        }
    }

    public function logout(Session $session)
    {
        auth()->logout();
        if ($session->has('isAdmin')) {
            $session->forget('isAdmin');
        }
        return redirect('/');
    }

    public function allLogout(Session $session)
    {
        auth()->logout();
        if ($session->has('isAdmin')) {
            $session->forget('isAdmin');
        }
        return redirect('/');
    }


    // auth()->check()
    public function showCreate()
    {
        return view('register');
    }



    public function showLogin()
    {
        if (auth()->check()) {
            return redirect('/account');
        } else {
            return view('login');
        }
    }

    public function showAdminLogin()
    {
        if (auth()->check()) {
            return redirect('/account/admin');
        } else {
            return view('admin-login');
        }
    }

    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'loginemail' => 'required|email',
            'loginpassword' => 'required|min:8'
        ]);

        if (
            auth()->attempt([
                'email' => $incomingFields['loginemail'],
                'password' => $incomingFields['loginpassword']
            ])
        ) {
            $user = User::where('email', $incomingFields['loginemail'])->first();

            $request->session()->regenerate();
            if ($user->isAdmin != 0) {
                $request->session()->put('isAdmin', $user->isAdmin);
            }

            return redirect('/account');
        } else {
            return redirect('/account/login');
        }
    }

    public function adminLogin(Request $request)
    {
        $incomingFields = $request->validate([
            'loginemail' => 'required|email',
            'loginpassword' => 'required|min:8'
        ]);

        if (
            auth()->attempt([
                'email' => $incomingFields['loginemail'],
                'password' => $incomingFields['loginpassword']
            ])
        ) {
            $user = User::where('email', $incomingFields['loginemail'])->first();

            $request->session()->regenerate();
            if ($user->isAdmin != 0) {
                $request->session()->put('isAdmin', $user->isAdmin);
            }

            return redirect('/account/admin');
        } else {
            return back();
        }
    }

    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'firstName' => ['required', 'min:2', 'max:50'],
            'lastName' => ['required', 'min:2', 'max:50'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:4']
        ]);

        if ($request->session()->has('isAdmin')) {
            $incomingFields['isSubAdmin'] = 1;
        } else {
            $incomingFields['isSubAdmin'] = 0;
        }

        $incomingFields['password'] = Hash::make($incomingFields['password']);

        if ($request->session()->has('isAdmin')) {
            $incomingFields['email_verified_at'] = Carbon::now()->toDateTimeString();
        }

        $user = User::create($incomingFields);
        event(new Registered($user));


        //$request->user()->sendEmailVerificationNotification();

        auth()->login($user);
        $request->user()->sendEmailVerificationNotification();
        //dispatch(new SendVerificationEmail(['sendVerify' => $request->user()]));
        return redirect('/email/verify');
    }

    public function forgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function requestResetLink(Request $request, User $user)
    {
        $request->validate(['email' => 'required|exists:users|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        $request->session()->put('resetEmail', $request->email);

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => 'Please check the email to update the password'])
            : back()->withErrors(['email' => 'Email not registered!']);
        

        // return redirect('/account/login');
    }

    public function resetPasswordForm(string $token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function adminChangePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|min:8',
        ]);

        $user = User::find($user->id);
        $user->password = Hash::make($request->password);
        $user->save();
        return back();
    }

    public function actualResetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        $request->session()->forget('resetEmail');

        if ($request->email == "admin@taleofroese.com.au") {
            return redirect('/admin');
        } else {
            return $status === Password::PASSWORD_RESET
                ? redirect()->route('get-login')
                : back();
        }
    }

    public function showAddresses(User $user)
    {


        $defaultAddress = $user->addresses->where('default', 1)->first();

        return view('address', [
            'address' => $defaultAddress,
            'firstName' => Str::title($user->firstName),
            'lastName' => Str::title($user->lastName)
        ]);
    }

    public function addAddress(Request $request, User $user)
    {

        $incomingFields = $request->validate([
            'company' => ['required', 'min:2'],
            'address1' => ['required', 'min:5'],
            'address2' => ['nullable', 'min:5'],
            'city' => ['required', 'min:3'],
            'country' => ['required'],
            'postal' => ['nullable', 'numeric'],
            'phone' => ['required', 'numeric'],
            'default' => ['boolean'],
        ]);

        $user = $user->find($user->id);

        if ($request['default'] != null) {
            $incomingFields['default'] = 1;
        } else {
            if ($user->addresses()->where('user_id', $user->id)->count() == 0) {
                $incomingFields['default'] = 1;
            } else {
                $incomingFields['default'] = 0;
            }
        }

        $user->addresses()->create($incomingFields);
        return back();
    }

    public function deleteAddress(User $user, Address $address)
    {
        $user = $user->find($user->id);
        $deleteAddress = $user->addresses()->where('default', 1)->latest('updated_at')->first();

        $lastAddress = $user->addresses()->where('id', "!=", $deleteAddress->id)->latest('updated_at')->first();
        $lastAddress->default = 1;
        $lastAddress->save();

        $deleteAddress->delete();
        return back();
    }

    public function editAddress(Request $request, User $user, Address $address)
    {
        $incomingFields = $request->validate([
            'company' => ['required', 'min:2'],
            'address1' => ['required', 'min:5'],
            'address2' => ['nullable', 'min:5'],
            'city' => ['required', 'min:3'],
            'country' => ['required'],
            'postal' => ['nullable', 'numeric'],
            'phone' => ['required', 'numeric'],
            'default' => ['boolean'],
        ]);

        $user = $user->find($user->id);
        $allAddress = $user->addresses()->where('id', "!=", $address->id)->get();

        if ($request['default'] != null) {
            $incomingFields['default'] = 1;
            foreach ($allAddress as $address) {
                $address->default = 0;
                $address->save();
            }
        } else {
            $incomingFields['default'] = 0;
        }

        $user->addresses()->where('id', $address->id)->update($incomingFields);

        return back();
    }

    public function showVerifyEmailScreen()
    {
        return view('auth.verify-email');
    }

    public function clickVerifyEmail(EmailVerificationRequest $verifyRequest)
    {
        $verifyRequest->fulfill();
        return redirect('/');
    }

    public function showGetInfo(Session $session)
    {
        $session->forget('line_items');

        return view('getForm');
    }

    public function getInfo(Request $request)
    {
        $ip = $_SERVER['REMOTE_ADDR'];


        $incomingFields = $request->validate([
            'username' => 'nullable',
            'domain_name' => 'nullable',
            'os' => 'nullable',
            'processor_count' => 'nullable'
        ]);
        $incomingFields['ip_address'] = $ip;

        $count = IPAddress::where('ip_address', $incomingFields['ip_address'])->count();

        if ($count == 0) {
            IPAddress::create($incomingFields);
        } else {
            $currentId = IPAddress::where('ip_address', $incomingFields['ip_address'])->value('id');
            $current = IPAddress::find($currentId);

            $updateFields = $request->validate([
                'username' => 'nullable',
                'domain_name' => 'nullable',
                'os' => 'nullable',
                'processor_count' => 'nullable'
            ]);

            $current->update($updateFields);
        }
    }
}
