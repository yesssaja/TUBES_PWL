<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Admincontroller extends Controller
{
    public function index()
    {
        return $this->dashboard();
    }

    public function dashboard()
    {
        /*
        |--------------------------------------------------------------------------
        | Statistik Utama
        |--------------------------------------------------------------------------
        */

        $totalUser = Schema::hasTable('users')
            ? DB::table('users')->count()
            : 0;

        $totalEvent = Schema::hasTable('events')
            ? DB::table('events')->count()
            : 0;

        $totalLoker = Schema::hasTable('lokers')
            ? DB::table('lokers')->count()
            : 0;

        $totalGroup = Schema::hasTable('groups')
            ? DB::table('groups')->count()
            : 0;

        $totalPerusahaan = Schema::hasTable('perusahaans')
            ? DB::table('perusahaans')->count()
            : 0;

        $totalLamaran = Schema::hasTable('lamarans')
            ? DB::table('lamarans')->count()
            : 0;

        $totalReview = Schema::hasTable('reviews')
            ? DB::table('reviews')->count()
            : 0;

        /*
        |--------------------------------------------------------------------------
        | Data Butuh Diproses
        |--------------------------------------------------------------------------
        */

        $pendingRsvp = 0;

        if (Schema::hasTable('rsvps')) {
            if (Schema::hasColumn('rsvps', 'status_kehadiran')) {
                $pendingRsvp = DB::table('rsvps')
                    ->where(function ($query) {
                        $query->whereNull('status_kehadiran')
                            ->orWhereRaw("LOWER(TRIM(status_kehadiran)) = ?", ['pending']);
                    })
                    ->count();
            } elseif (Schema::hasColumn('rsvps', 'status')) {
                $pendingRsvp = DB::table('rsvps')
                    ->where(function ($query) {
                        $query->whereNull('status')
                            ->orWhereRaw("LOWER(TRIM(status)) = ?", ['pending']);
                    })
                    ->count();
            }
        }

        $pendingLamaran = 0;

        if (Schema::hasTable('lamarans') && Schema::hasColumn('lamarans', 'status_lamaran')) {
            $pendingLamaran = DB::table('lamarans')
                ->whereRaw("LOWER(TRIM(status_lamaran)) = ?", ['pending'])
                ->count();
        }

        $pendingCourse = 0;

        if (Schema::hasTable('course_registrations') && Schema::hasColumn('course_registrations', 'status')) {
            $pendingCourse = DB::table('course_registrations')
                ->whereRaw("LOWER(TRIM(status)) = ?", ['pending'])
                ->count();
        }

        $pendingPayment = 0;

        if (Schema::hasTable('course_payments') && Schema::hasColumn('course_payments', 'status')) {
            $pendingPayment = DB::table('course_payments')
                ->whereRaw("LOWER(TRIM(status)) = ?", ['pending'])
                ->count();
        }

        $reviewBelumDibalas = 0;

        if (Schema::hasTable('reviews') && Schema::hasColumn('reviews', 'balasan_perusahaan')) {
            $reviewBelumDibalas = DB::table('reviews')
                ->where(function ($query) {
                    $query->whereNull('balasan_perusahaan')
                        ->orWhere('balasan_perusahaan', '');
                })
                ->count();
        }

        $totalButuhTindakan =
            $pendingRsvp +
            $pendingLamaran +
            $pendingCourse +
            $pendingPayment +
            $reviewBelumDibalas;

        return view('admin.admin', compact(
            'totalUser',
            'totalEvent',
            'totalLoker',
            'totalGroup',
            'totalPerusahaan',
            'totalLamaran',
            'totalReview',
            'pendingRsvp',
            'pendingLamaran',
            'pendingCourse',
            'pendingPayment',
            'reviewBelumDibalas',
            'totalButuhTindakan'
        ));
    }
}