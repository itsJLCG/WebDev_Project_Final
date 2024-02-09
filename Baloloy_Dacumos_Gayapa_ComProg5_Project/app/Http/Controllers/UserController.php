<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        return view('create-user');
    }

    public function store(Request $request)
    {
        // Validate and store user data in the database
        // You can use Eloquent to create a new user instance and save it

        return redirect()->route('user.create')->with('success', 'User created successfully.');
    }
}
