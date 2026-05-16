<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RsvpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rsvp = Rsvp::with(['user', 'event'])->get();

        return view('pages.rsvp', compact('rsvp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $event = Event::all();

        return view('pages.rsvp', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Rsvp::create([
            'user_id' => Auth::id(),
            'event_id' => $request->event_id,
            'status_kehadiran' => 'pending'
        ]);

        return redirect()->route('rsvp.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rsvp = Rsvp::findOrFail($id);

        return view('pages.rsvp', compact('rsvp'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rsvp = Rsvp::findOrFail($id);

        $rsvp->delete();

        return redirect()->route('rsvp.index');
    }
}