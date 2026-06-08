@extends('users.layouts.app')

@section('title', 'Profile Pelamar')

@section('content')

<div class="min-h-screen bg-gray-50 py-10">

    <div class="max-w-6xl mx-auto px-4">

        {{-- HEADER --}}
        <div class="bg-gradient-to-r from-red-600 to-yellow-400 rounded-3xl p-8 text-white shadow-xl mb-8">

            <div class="flex flex-col md:flex-row items-center gap-6">

                <div class="w-28 h-28 rounded-full bg-white shadow-lg overflow-hidden flex items-center justify-center">

    @if($profile && $profile->foto_diri)

        <img src="{{ asset('storage/' . $profile->foto_diri) }}"
             alt="{{ Auth::user()->name }}"
             class="w-full h-full object-cover">

    @else

        <div class="w-full h-full flex items-center justify-center text-red-600 text-5xl font-black">
            {{ strtoupper(substr(Auth::user()->name,0,1)) }}
        </div>

    @endif

</div>

                <div>
                    <h1 class="text-4xl font-black">
                        {{ Auth::user()->name }}
                    </h1>

                    <p class="text-lg text-white/90">
                        {{ Auth::user()->email }}
                    </p>

                    <span class="inline-block mt-3 bg-white text-red-600 px-4 py-2 rounded-full font-black text-sm">
                        👤 Pelamar
                    </span>
                </div>

            </div>

        </div>

        <div class="grid lg:grid-cols-3 gap-8">

            {{-- SIDEBAR --}}
            <div>

                <div class="bg-white rounded-3xl shadow-lg p-6">

                    <h2 class="font-black text-xl text-gray-800 mb-5">
                        Menu Profile
                    </h2>

                    <div class="space-y-3">

                        <a href="#"
                           class="block bg-red-50 text-red-600 font-bold px-4 py-3 rounded-2xl no-underline">
                            👤 Data Diri
                        </a>

                        <a href="{{ route('inbox.index') }}"
                           class="block hover:bg-gray-100 px-4 py-3 rounded-2xl font-bold text-gray-700 no-underline">
                            🔔 Inbox
                        </a>

                        <a href="{{ route('welcome') }}"
                           class="block hover:bg-gray-100 px-4 py-3 rounded-2xl font-bold text-gray-700 no-underline">
                            🏠 Dashboard
                        </a>

                    </div>

                </div>

            </div>

            {{-- CONTENT --}}
            <div class="lg:col-span-2">

                <div class="bg-white rounded-3xl shadow-lg p-8">

                    <div class="flex items-center justify-between mb-8">

                        <h2 class="text-3xl font-black text-gray-800">
                            Data Diri Pelamar
                        </h2>

                        <a href="{{ route('profile.settings.edit') }}"
                           class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-2xl font-bold transition no-underline">
                            Edit Profile
                        </a>

                    </div>

                    <div class="grid md:grid-cols-2 gap-6">

                        <div>
                            <label class="text-gray-500 text-sm font-bold">
                                Nama Lengkap
                            </label>

                            <div class="mt-2 bg-gray-50 p-4 rounded-2xl">
                                {{ Auth::user()->name }}
                            </div>
                        </div>

                        <div>
                            <label class="text-gray-500 text-sm font-bold">
                                Email
                            </label>

                            <div class="mt-2 bg-gray-50 p-4 rounded-2xl">
                                {{ Auth::user()->email }}
                            </div>
                        </div>

                        <div>
                            <label class="text-gray-500 text-sm font-bold">
                                Nomor HP
                            </label>

                            <div class="mt-2 bg-gray-50 p-4 rounded-2xl">
                                {{ $profile->no_hp ?? '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="text-gray-500 text-sm font-bold">
                                Jenis Kelamin
                            </label>

                            <div class="mt-2 bg-gray-50 p-4 rounded-2xl">
                                {{ $profile->gender ?? '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="text-gray-500 text-sm font-bold">
                                Tempat Lahir
                            </label>

                            <div class="mt-2 bg-gray-50 p-4 rounded-2xl">
                                {{ $profile->tempat_lahir ?? '-' }}
                            </div>
                        </div>

                        <div>
                            <label class="text-gray-500 text-sm font-bold">
                                Tanggal Lahir
                            </label>

                            <div class="mt-2 bg-gray-50 p-4 rounded-2xl">
                                {{ $profile->tgl_lahir ?? '-' }}
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <label class="text-gray-500 text-sm font-bold">
                                NIK
                            </label>

                            <div class="mt-2 bg-gray-50 p-4 rounded-2xl">
                                {{ $profile->nik ?? '-' }}
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection