<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Inbox;
use App\Models\ProfilePerusahaan;
use Illuminate\Support\Facades\Auth;

class InboxController extends Controller
{
    private function inboxOwnerIds()
    {
        $profile = ProfilePerusahaan::where('user_id', Auth::id())->first();

        $ids = [Auth::id()];

        if ($profile) {
            $ids[] = $profile->id;
        }

        return $ids;
    }

    public function index()
    {
        $inboxes = Inbox::whereIn('pelamar_id', $this->inboxOwnerIds())
    ->whereIn('type', [
        'lamaran',
        'lamaran_masuk',
        'rsvp',
        'rsvp_masuk',
        'event',
        'event_info',
        'course',
        'course_info',
        'admin_message',
    ])
    ->latest()
    ->get();

        return view('perusahaan.inbox.index', compact('inboxes'));
    }

    public function read($id)
    {
        $inbox = Inbox::whereIn('pelamar_id', $this->inboxOwnerIds())
            ->where('id', $id)
            ->firstOrFail();

        $inbox->update([
            'is_read' => true,
        ]);

        return back()->with('success', 'Pesan ditandai sudah dibaca.');
    }

    public function readAll()
    {
        Inbox::whereIn('pelamar_id', $this->inboxOwnerIds())
            ->update([
                'is_read' => true,
            ]);

        return back()->with('success', 'Semua inbox ditandai sudah dibaca.');
    }
}