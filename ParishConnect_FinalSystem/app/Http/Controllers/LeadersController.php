<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leader;

class LeadersController extends Controller
{
    
    public function index()
    {
        // Fetch all events from the database
        $leaders = Leader::all();

        // Pass the events to the view
        return view('home')->with('leaders', $leaders);
    }
}
