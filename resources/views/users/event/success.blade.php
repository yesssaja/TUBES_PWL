@extends('users.event.layouts.app')

@section('title', 'Berhasil Daftar Event')

@section('content')

<div class="min-h-screen flex items-center justify-center px-6">

    <div class="bg-white rounded-3xl shadow-2xl p-10 max-w-lg w-full text-center">

        <div class="text-7xl mb-5">
            ✅
        </div>

        <h1 class="text-4xl font-black text-red-600 mb-4">
            RSVP Berhasil!
        </h1>

        <p class="text-gray-600 mb-2">
            Terima kasih telah mendaftar event.
        </p>

        <p class="text-gray-600 mb-8">
            Status kehadiran Anda saat ini masih
            <span class="font-bold text-orange-600">
                Pending
            </span>
            dan menunggu persetujuan penyelenggara.
        </p>

           <a href="{{ route('event.index') }}"
           class="bg-yellow-400 hover:bg-yellow-300 text-red-700 font-bold px-8 py-4 rounded-full transition shadow-lg">

            Kembali

        </a>

        </div>

    </div>

</div>

@endsection