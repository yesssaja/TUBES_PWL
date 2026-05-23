<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Inbox;
use Illuminate\Support\Facades\Auth;

class InboxController extends Controller
{
    public function index()
    {
        $inboxes = Inbox::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('perusahaan.inbox.index', compact('inboxes'));
    }

    public function read($id)
    {
        $inbox = Inbox::findOrFail($id);

        $inbox->is_read = true;
        $inbox->save();

        return back()->with('success', 'Pesan ditandai sudah dibaca.');
    }

    public function readAll()
    {
        Inbox::where('user_id', Auth::id())
            ->update([
                'is_read' => true
            ]);

        return back()->with('success', 'Semua inbox ditandai sudah dibaca.');
    }
}