<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use Illuminate\Support\Facades\Auth;

class InboxController extends Controller
{
    public function index()
    {
        $inboxes = Inbox::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('inbox.index', compact('inboxes'));
    }

   public function read(Inbox $inbox)
{
    if ($inbox->user_id !== Auth::id()) {
        abort(403);
    }

    $inbox->is_read = true;
    $inbox->save();

    return back()->with('success', 'Pesan berhasil ditandai sebagai dibaca.');
}

    public function readAll()
    {
        Inbox::where('user_id', Auth::id())
            ->update(['is_read' => true]);

        return back()->with('success', 'Semua pesan berhasil ditandai sebagai dibaca.');
    }
}