<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use App\DataTables\PostDataTable;

class PostController extends Controller
{
    public function getPost(PostDataTable $dataTable)
    {
    // Fetch only active users
    $posts = Post::query()->get();

    return $dataTable->render('posts.datatable', compact('posts'));
    }
   /*  public function index()
    {
        $posts = Post::withTrashed()->get();
        return view('/post/datatable', compact('posts'));
    } */

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Delete the product
        $post->delete();

        return redirect('/post/datatable')->with('status', 'Post deleted successfully!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id); // Fetch the post by ID
        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, $id)
{

    $post = Post::find($id);

    // Handle selected images
    if ($request->hasFile('images')) {
        $postImages = [];
        foreach ($request->file('images') as $image) {
            // Store the image in the storage/images directory with original file name
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->store('public/images');
            // Get the file name without the 'public/images/' prefix
            $relativePath = str_replace('public/images/', '', $imagePath);
            $postImages[] = $relativePath;
        }
        // Store the list of image file names as a comma-separated string
        $post->image = implode(',', $postImages);
    }

    // Update other fields
    $post->update($request->except('images'));

    return redirect('/post/datatable')->with('status', 'Post updated successfully.');
}

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'product_name' => 'required|string|max:255',
        'message_text' => 'required|string',
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image files
    ]);

    // Create a new post instance
    $post = new Post();
    $post->product_name = $request->product_name;
    $post->message_text = $request->message_text;

    // Handle selected images
    // Handle selected images
    if ($request->hasFile('images')) {
        $postImages = [];
        foreach ($request->file('images') as $image) {
            // Store the image in the storage/images directory with original file name
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->store('public/images');
            // Get the file name without the 'public/images/' prefix
            $relativePath = str_replace('public/images/', '', $imagePath);
            $postImages[] = $relativePath;
        }
        // Store the list of image file names as a comma-separated string
        $post->image = implode(',', $postImages);
    }



    // Save the post
    $post->save();

    // Redirect back to the index page with a success message
    return redirect('/post/datatable')->with('status', 'Post created successfully.');
}


    public function indexOrder()
    {
        $posts = Post::all();
        return view('home', compact('posts'));
    }
    public function show()
    {
        $posts = Post::all(); // Retrieve the post by ID
        return view('posts.show', compact('posts'));
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        return redirect()->back()->with('success', 'Post restored successfully.');
    }
}
