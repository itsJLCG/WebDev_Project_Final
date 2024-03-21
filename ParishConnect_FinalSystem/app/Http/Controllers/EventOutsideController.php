<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventOutsideController extends Controller
{
    public function index()
    {
        // Fetch events from the database
        $events = Event::all();

        // Pass events to the view
        return view('auth.eventOutside', compact('events'));
    }
}
