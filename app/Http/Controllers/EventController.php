<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('perusahaan')->get();

        return view('pages.event', compact('events'));
    }

    public function show($id)
    {
        $event = Event::with('perusahaan')
                    ->findOrFail($id);

        return view('pages.event', compact('event'));
    }
}