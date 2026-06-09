<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = strtolower(trim($request->q));

        if ($keyword == '') {
            return redirect()
                ->back()
                ->with('error', 'Masukkan kata kunci pencarian terlebih dahulu.');
        }

        // EVENT
        if (
            str_contains($keyword, 'event') ||
            str_contains($keyword, 'seminar') ||
            str_contains($keyword, 'webinar')
        ) {
            return redirect()->route('event.index');
        }

        // PERUSAHAAN
        if (
            str_contains($keyword, 'perusahaan') ||
            str_contains($keyword, 'company')
        ) {
            return redirect()->route('perusahaan.index');
        }

        // LOKER
        if (
            str_contains($keyword, 'loker') ||
            str_contains($keyword, 'lowongan') ||
            str_contains($keyword, 'job') ||
            str_contains($keyword, 'kerja')
        ) {
            return redirect()->route('loker.index');
        }

        // COURSE
        if (
            str_contains($keyword, 'course') ||
            str_contains($keyword, 'pelatihan') ||
            str_contains($keyword, 'kursus')
        ) {
            return redirect()->route('course.index');
        }

        // SERVICE
        if (
            str_contains($keyword, 'service') ||
            str_contains($keyword, 'servis') ||
            str_contains($keyword, 'jasa') ||
            str_contains($keyword, 'freelance')
        ) {
            return redirect()->route('service.index');
        }

        // GROUP
        if (
            str_contains($keyword, 'group') ||
            str_contains($keyword, 'grup') ||
            str_contains($keyword, 'komunitas')
        ) {
            return redirect()->route('groups.index');
        }

        // INBOX
        if (
            str_contains($keyword, 'inbox') ||
            str_contains($keyword, 'pesan') ||
            str_contains($keyword, 'notifikasi')
        ) {
            return redirect()->route('inbox.index');
        }

        // PROFILE
        if (
            str_contains($keyword, 'profile') ||
            str_contains($keyword, 'profil') ||
            str_contains($keyword, 'akun') ||
            str_contains($keyword, 'account')
        ) {
            return redirect()->route('profile.pelamar.index');
        }

        // HOME
        if (
            str_contains($keyword, 'home') ||
            str_contains($keyword, 'beranda') ||
            str_contains($keyword, 'dashboard') ||
            str_contains($keyword, 'welcome')
        ) {
            return redirect()->route('welcome');
        }

        return redirect()
            ->back()
            ->with('error', 'Pencarian tidak ditemukan.');
    }
}