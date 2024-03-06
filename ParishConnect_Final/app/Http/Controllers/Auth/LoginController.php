<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected function redirectTo()
    {
        if (auth()->user()->role === 'Admin') {
            return '/typography'; //Admin to kay raj
        }

        return '/home';
    }

    protected function authenticated($request, $user)
    {
        if ($user->role === 'Admin') {
            return redirect()->intended($this->redirectPath());
        }

        if ($user->status === 'Pending') {
            auth()->logout();
            return redirect()->route('login')->with('error', 'Your account is Pending for Approval');
        }

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
