<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'Admin') {
            return redirect('/adminPage');
        }

        if ($user->email_verified_at === null) {
            auth()->logout();
            return redirect()->route('login')->with('message', 'Email is NOT yet Verified');
        }

        if ($user->accountStatus === 'Deactivated') {
            auth()->logout();
            return redirect()->route('login')->with('message', 'Your Account is Deactivated');
        }

        return redirect($this->redirectTo);
    }
}
