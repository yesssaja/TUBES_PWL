<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Inbox;
use App\Models\ProfilePerusahaan;
use Illuminate\Support\Facades\Auth;

class InboxController extends Controller
{
    public function index()
    {
        $perusahaan = ProfilePerusahaan::where('user_id', Auth::id())->first();

        $inboxes = Inbox::query()
            ->when($perusahaan, function ($query) use ($perusahaan) {
                $query->where('perusahaan_id', $perusahaan->id);
            })
            ->orWhere('pelamar_id', Auth::id())
            ->latest()
            ->get();

        return view('perusahaan.inbox.index', compact('inboxes', 'perusahaan'));
    }

    public function read($id)
    {
        $perusahaan = ProfilePerusahaan::where('user_id', Auth::id())->first();

        $inbox = Inbox::query()
            ->where('id', $id)
            ->where(function ($query) use ($perusahaan) {
                if ($perusahaan) {
                    $query->where('perusahaan_id', $perusahaan->id);
                }

                $query->orWhere('pelamar_id', Auth::id());
            })
            ->firstOrFail();

        $inbox->update([
            'is_read' => true,
        ]);

        return redirect()
            ->route('perusahaan.inbox.index')
            ->with('success', 'Inbox berhasil ditandai dibaca.');
    }

    public function readAll()
    {
        $perusahaan = ProfilePerusahaan::where('user_id', Auth::id())->first();

        Inbox::query()
            ->where(function ($query) use ($perusahaan) {
                if ($perusahaan) {
                    $query->where('perusahaan_id', $perusahaan->id);
                }

                $query->orWhere('pelamar_id', Auth::id());
            })
            ->update([
                'is_read' => true,
            ]);

        return redirect()
            ->route('perusahaan.inbox.index')
            ->with('success', 'Semua inbox berhasil ditandai dibaca.');
    }
}