<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Yajra\DataTables\Facades\DataTables;
use Datatable;
use App\DataTables\UserDataTable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    // public function index(){
    //         $users = User::withTrashed()->get();
    //         return view('users.index', compact('users'));
    //     }

    public function getUsers(UserDataTable $dataTable)
{
    // Fetch only active users
    $users = User::query()->get();

    return $dataTable->render('users.datatable', compact('users'));
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
//     public function store(Request $request)
// {
//     // Validate request data
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|email|unique:users,email',
//         'password' => 'required|string|min:8',
//         'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048576', // Add validation for image upload
//     ]);

//     // Handle file upload
//     $imagePaths = [];

//     if ($request->hasFile('image')) {
//         foreach ($request->file('image') as $image) {
//             $imagePath = $image->store('public/images');
//             $imagePaths[] = basename($imagePath);
//         }
//     }

//     // Create new user
//     $user = User::create([
//         'name' => $request->name,
//         'email' => $request->email,
//         'password' => bcrypt($request->password),
//     ]);

//     // Save file names in the database
//     $user->user_image = json_encode($imagePaths);
//     $user->save();

//     return redirect()->route('users.index')->with('success', 'User created successfully.');
// }

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'user_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048576', // Add validation for image upload
            'role' => 'required|string|in:user,Admin',
            'accountStatus' => 'required|string|in:Activated,Deactivated',
        ]);
        // Create new user
        $user = new  User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->accountStatus = $request->accountStatus;

        $imagePaths = [];
        if ($request->hasFile('user_image')) {
            foreach ($request->file('user_image') as $image) {
                $imagePath = $image->store('public/images');
                $imagePaths[] = str_replace('public/', 'storage/', $imagePath); // Adjust path for storage
            }
            $user->user_image = implode(',', $imagePaths);
            $user->save();
        }
        return redirect()->route('users')->with('success', 'User created successfully.');
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
        'user_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048576', // Add validation for image upload
        'role' => 'required|string|in:user,Admin',
        'accountStatus' => 'required|string|in:Activated,Deactivated',
    ]);

    // Handle file upload
    $imagePaths = [];
    if ($request->hasFile('user_image')) {
        foreach ($request->file('user_image') as $image) {
            $imagePath = $image->store('public/images');
            $imagePaths[] = str_replace('public/', 'storage/', $imagePath); // Adjust path for storage
        }
        $user->user_image = implode(',', $imagePaths);
        $user->save();
    }

    // Update user data
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password ? bcrypt($request->password) : $user->password,
        'user_image.*' => $imagePaths, // Corrected column name
        'role' => $request->role,
        'accountStatus' => $request->accountStatus,
    ]);

    return redirect()->route('users')->with('success', 'User updated successfully.');
}

public function destroy(User $user)
{
    // Soft delete the user
    $user->delete();

    return redirect()->route('users')->with('success', 'User deleted successfully.');
}


public function restore($id)
{
    // Restore user
    User::withTrashed()->find($id)->restore();

    return redirect()->route('users')->with('success', 'User restored successfully.');
}

}

