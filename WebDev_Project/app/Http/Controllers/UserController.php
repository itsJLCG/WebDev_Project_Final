<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(){
            $users = User::withTrashed()->get();
            return view('users.index', compact('users'));
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
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for image upload
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $imageName = basename($imagePath);
        } else {
            $imageName = null;
        }

        // Create new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_image' => $imageName, // Save file name in the database
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    /**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\User  $user
 * @return \Illuminate\Http\RedirectResponse
 */
public function update(Request $request, User $user)
{
    // Validate request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for image upload
    ]);

    // Handle file upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('public/images');
        $imageName = basename($imagePath);
    } else {
        $imageName = $user->user_image; // Corrected column name
    }

    // Update user data
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password ? bcrypt($request->password) : $user->password,
        'user_image' => $imageName, // Corrected column name
    ]);

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}

public function destroy(User $user)
{
    // Soft delete the user
    $user->delete();

    return redirect()->route('users.index')->with('success', 'User deleted successfully.');
}


public function restore($id)
{
    // Restore user
    User::withTrashed()->find($id)->restore();

    return redirect()->route('users.index')->with('success', 'User restored successfully.');
}

}

