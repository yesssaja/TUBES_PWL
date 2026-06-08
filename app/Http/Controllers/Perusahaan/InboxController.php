<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Inbox;
use App\Models\ProfilePerusahaan;
use Illuminate\Support\Facades\Auth;

class InboxController extends Controller
{
    private function getProfilePerusahaan()
    {
        return ProfilePerusahaan::where('user_id', Auth::id())->first();
    }

    private function inboxOwnerIds()
    {
        $profile = $this->getProfilePerusahaan();

        $ids = [Auth::id()];

        if ($profile) {
            $ids[] = $profile->id;
        }

        return $ids;
    }

    public function index()
    {
        $profile = $this->getProfilePerusahaan();

        $inboxes = Inbox::where(function ($query) use ($profile) {
                $query->whereIn('pelamar_id', $this->inboxOwnerIds());

                if ($profile) {
                    $query->orWhere('perusahaan_id', $profile->id);
                }
            })
            ->whereIn('type', [
                'lamaran',
                'lamaran_masuk',
                'rsvp',
                'rsvp_masuk',
                'event',
                'event_info',
                'event_daftar',
                'pendaftaran_event',
                'course',
                'course_info',
                'course_daftar',
                'pendaftaran_course',
                'admin_message',
                'review',
                'review_reply'
            ])
            ->latest()
            ->get();

        return view('perusahaan.inbox.index', compact('inboxes'));
    }

    public function read($id)
    {
        $profile = $this->getProfilePerusahaan();

        $inbox = Inbox::where(function ($query) use ($profile) {
                $query->whereIn('pelamar_id', $this->inboxOwnerIds());

                if ($profile) {
                    $query->orWhere('perusahaan_id', $profile->id);
                }
            })
            ->where('id', $id)
            ->firstOrFail();

        $inbox->update([
            'is_read' => true,
        ]);

        return back()->with('success', 'Pesan ditandai sudah dibaca.');
    }

    public function readAll()
    {
        $profile = $this->getProfilePerusahaan();

        Inbox::where(function ($query) use ($profile) {
                $query->whereIn('pelamar_id', $this->inboxOwnerIds());

                if ($profile) {
                    $query->orWhere('perusahaan_id', $profile->id);
                }
            })
            ->update([
                'is_read' => true,
            ]);

        return back()->with('success', 'Semua inbox ditandai sudah dibaca.');
    }
}