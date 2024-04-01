<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tracking;

class TrackingController extends Controller
{
    public function index()
    {
        $trackings = Tracking::all();
        return view('trackings', compact('trackings'));
    }

    public function update(Request $request, $id)
    {
        $tracking = Tracking::findOrFail($id);
        $tracking->update([
            'trackingStatus' => $request->trackingStatus
        ]);

        return redirect()->back()->with('status', 'Tracking status updated successfully.');
    }
}
