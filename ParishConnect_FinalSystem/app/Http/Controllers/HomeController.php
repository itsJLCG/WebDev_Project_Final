<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Leader;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch all events from the database
        $events = Event::all();
        $leaders = Leader::all();

        // Pass the events to the view
       // return view('home')->with('events', $events);
        //return view('home')->with('leaders', $leaders);
        // or
        // return view('home', compact('events'));
        return view('home', ['events'=>$events, 'leaders'=>$leaders]);
    }
    public function index2(){
        $leaders = Leader::all();
        return view('home')->with('leaders', $leaders);
    }

    public function eventOutside()
{
    // Fetch all events from the database
    $events = Event::all();

    // Pass the events to the view
    return view('eventOutside', compact('events'));
}

}
