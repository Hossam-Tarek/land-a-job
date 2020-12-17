<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     *
     * @return void
     *
     *
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8 max:20',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ],        $request->filled('remember')
        )
        ) {
            $user = User::where('email', $request->email)->first();
            if ($user->isCompany()) {
                return redirect()->route('users.create');
            } elseif ($user->isUser()) {
                return redirect()->route('phones.create');
            } elseif ($user->isAdmin()) {
                return redirect()->route('links.create');
            }
        }

        return $this->sendFailedLoginResponse($request);
    }

}
