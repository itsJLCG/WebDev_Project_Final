<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use App\Models\User;

class UserProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:6|confirmed', // Add password validation
        'user_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for profile image
        // Add other validation rules as needed
    ]);

    // Update other user attributes
    $data = $request->except('user_image', 'password', 'password_confirmation');
    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    // Handle profile image update
    if ($request->hasFile('user_image')) {
        // Handle profile image upload
    }

    return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
}


    }
