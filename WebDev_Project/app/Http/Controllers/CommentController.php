<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Tracking;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    public function index(Request $request, $id_tracking)
{
    // Store the id_tracking in the session
    session(['id_tracking' => $id_tracking]);

    // Fetch comments related to the tracking ID
    $comments = Comment::where('id_tracking', $id_tracking)->get();

    // Pass the comments and id_tracking to the view
    return view('comment', ['comments' => $comments, 'id_tracking' => $id_tracking]);
}

    public function store(Request $request)
{
    // Retrieve the id_tracking from the session
    $idTracking = session('id_tracking');

    // Validate the request data
    $validatedData = $request->validate([
        'comment' => 'required|string',
        'comment_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validate image files
    ]);

    // Save the comment to the database
    $comment = new Comment();
    $comment->comment = $validatedData['comment'];
    $comment->id_tracking = $idTracking;

    // Handle file upload and store filenames
    $imagePaths = [];
    if ($request->hasFile('comment_image')) {
        foreach ($request->file('comment_image') as $image) {
            // Get the original name of the file
            $filename = $image->getClientOriginalName();

            // Move the file to the public storage directory
            $path = $image->move(public_path('storage/images'), $filename);

            // Save the filename to the array
            $imagePaths[] = $filename;
        }

        // Save the filenames to the database as comma-separated string
        $comment->commentImage = implode(',', $imagePaths);
    }

    // Save the comment
    $comment->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Comment submitted successfully.');
}

}
