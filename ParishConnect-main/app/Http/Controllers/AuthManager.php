<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login(){
        if (Auth::check()){
            return redirect(route('home'));
        }
        return view('login');
    }

    function registration(){
        return view('registration');
    }
    
    function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        // Check if the user exists and the passwords match
        if ($user && $user->password === $request->password) {
            Auth::login($user);
            return redirect()->intended(route('home'));
        }

        return redirect(route('login'))->with("error", "Login Details are Not Valid");
    }

    function registrationPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
    
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password; 
        $user = User::create($data);
        
        if(!$user){
            return redirect(route('registration'))->with("error", "Registration Failed, Try Again");
        }
        
        return redirect(route('login'))->with("success", "Registration Successful, Login to Access");
    }    

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

    function schedule(Request $request)
    {
    $validatedData = $request->validate([
        'event_name' => 'required',
        'event_host' => 'required',
        'description' => 'required',
        'event_datetime' => 'required|date',
    ]);

    Event::create($validatedData);

    return redirect()->route('scheduling')->with('success', 'Event scheduled successfully!');
}
}
