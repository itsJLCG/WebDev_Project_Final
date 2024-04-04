<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use App\DataTables\FeedbackDataTable;

use Illuminate\Support\Facades\DB;


class FeedbackController extends Controller
{
    // public function index()
    // {
    //     $feedbacks = Feedback::latest()->get();
    //     return view('feedbacks.index', compact('feedbacks'));
    // }

    public function getFeedback(FeedbackDataTable $dataTable)
    {
    // Fetch only active users
    $feedbacks = Feedback::query()->get();

    return $dataTable->render('feedbacks.datatable', compact('feedbacks'));
    }

    public function index(){
                $feedbacks = Feedback::withTrashed()->get();
                return view('feedbacks.index', compact('feedbacks'));
            }

    public function create()
    {
        return view('feedbacks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'rating' => 'required', // Change 'comment' to 'rating'
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:1048576',
        ]);

        $feedback = new Feedback();
        $feedback->username = $request->username;
        $feedback->rating = $request->rating; // Change 'comment' to 'rating'

        // Handle images
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('public/images');
                $imagePaths[] = str_replace('public/', 'storage/', $imagePath);
            }
            $feedback->images = implode(',', $imagePaths);
        }

        $feedback->save();

        return redirect()->route('feedbacks')->with('success', 'Feedback submitted successfully!');
    }

    public function edit(Feedback $feedback)
    {
        return view('feedbacks.edit', compact('feedback'));
    }

    public function update(Request $request, Feedback $feedback)
    {
        $request->validate([
            'username' => 'required',
            'rating' => 'required', // Change 'comment' to 'rating'
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:1048576',
        ]);

        $feedback->username = $request->username;
        $feedback->rating = $request->rating; // Change 'comment' to 'rating'

        // Handle images
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('public/images');
                $imagePaths[] = str_replace('public/', 'storage/', $imagePath);
            }
            $feedback->images = implode(',', $imagePaths);
        }

        $feedback->save();

        return redirect()->route('feedbacks')->with('success', 'Feedback updated successfully!');
    }



    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->back()->with('success', 'Feedback deleted successfully!');
    }

    public function restore($id)
    {
        $feedback = Feedback::withTrashed()->find($id);
        $feedback->restore();
        return redirect()->back()->with('success', 'Feedback restored successfully!');
    }

    public function showChart()
    {
    $ratings = DB::table('feedbacks')
                ->select('rating', DB::raw('COUNT(id) as count'))
                ->groupBy('rating')
                ->pluck('count', 'rating')
                ->toArray();

    // Mapping ratings to their corresponding labels
    $labels = [
        1 => 'Very Unsatisfied',
        2 => 'Unsatisfied',
        3 => 'Neutral',
        4 => 'Satisfied',
        5 => 'Very Satisfied',
    ];

    // Adding labels to ratings data
    foreach ($ratings as $rating => $count) {
        $ratings[$labels[$rating]] = $count;
        unset($ratings[$rating]);
    }

        return view('feedback.chart', compact('ratings'));
    }
}

