<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index()
    {
        $user = Auth::user(); // Fetch the authenticated user
        return view('profile.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'user_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048576', // 1GB in KB // Add validation for user images
            // Add validation for other fields as needed
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if ($request->hasFile('user_image')) {
            $imagePaths = [];
            foreach ($request->file('user_image') as $image) {
                $imagePath = $image->store('public/images');
                $imagePaths[] = str_replace('public/', 'storage/', $imagePath);
            }
            $user->user_image = implode(',', $imagePaths);
        }
        // Save user data
        $user->save();

        return redirect()->route('profile.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    /**
 * Show the form for editing the specified resource.
 *
 * @param  \App\Models\User  $user
 * @return \Illuminate\View\View
 */
    public function edit()
    {
        $user = Auth::user(); // Fetch the authenticated user
        return view('profile.edit', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $user = $request->user();
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'string|min:6',
            'user_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048576', // Add validation for user images
            // Add validation for other fields as needed
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('user_image')) {
            $imagePaths = [];
            foreach ($request->file('user_image') as $image) {
                $imagePath = $image->store('public/images');
                $imagePaths[] = str_replace('public/', 'storage/', $imagePath);
            }
            $user->user_image = implode(',', $imagePaths);
        }

        // Save updated user data
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'user_image.*' => $imagePaths, // Corrected column name
        ]);

        return redirect()->route('profile.index')->with('success', 'User updated successfully.');
    }
}
