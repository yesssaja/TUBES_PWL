<?php

namespace App\Http\Controllers;

use App\Models\Inbox;

class InboxController extends Controller
{
    public function index()
    {
        $inboxes = Inbox::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('pages.inbox', compact('inboxes'));
    }

    public function read(Inbox $inbox)
    {
        if ($inbox->user_id !== auth()->id()) {
            abort(403);
        }

        $inbox->update([
            'is_read' => true,
        ]);

        return back();
    }

    public function readAll()
    {
        Inbox::where('user_id', auth()->id())
            ->update([
                'is_read' => true,
            ]);

        return back()->with('success', 'Semua pesan sudah ditandai dibaca.');
    }
}