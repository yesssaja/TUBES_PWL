@extends('perusahaan.layouts.app')

@section('title', 'Peserta Course')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    {{-- HEADER --}}
    <div class="mb-8 bg-gradient-to-r from-red-600 via-orange-500 to-yellow-400 rounded-3xl p-8 shadow-lg text-white">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-black">
                    Peserta Course
                </h1>
                <p class="text-white/90 mt-2 max-w-2xl">
                    Kelola peserta yang mendaftar pada course perusahaan Anda.
                </p>
            </div>
        </div>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl font-semibold shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- COURSE CARDS --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

        @forelse($courses as $course)

            <div class="group bg-white rounded-3xl shadow-md hover:shadow-2xl border border-gray-100 overflow-hidden transition-all duration-300 hover:-translate-y-1">

                <div class="relative bg-gradient-to-br from-red-600 via-orange-500 to-yellow-400 p-6 text-white overflow-hidden">

                    <div class="absolute -right-8 -top-8 w-28 h-28 bg-white/20 rounded-full"></div>
                    <div class="absolute right-10 bottom-4 w-14 h-14 bg-white/10 rounded-full"></div>

                    <div class="relative z-10">
                        <div class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center text-3xl mb-4 shadow-inner">
                            🎓
                        </div>

                        <h2 class="text-xl font-black leading-tight line-clamp-2">
                            {{ $course->title }}
                        </h2>
                    </div>

                </div>

                <div class="p-6">

                    <div class="flex items-center justify-between mb-6">

                        <div>
                            <p class="text-gray-400 text-sm font-bold uppercase tracking-wide">
                                Total Peserta
                            </p>

                            <h3 class="text-5xl font-black text-gray-900 mt-1">
                                {{ $course->registrations_count }}
                            </h3>
                        </div>

                        <div class="w-16 h-16 rounded-2xl bg-red-50 flex items-center justify-center text-red-600 text-3xl group-hover:bg-red-600 group-hover:text-white transition">
                            👥
                        </div>

                    </div>

                    <a href="{{ route('perusahaan.course.participant.show', $course->id) }}"
                       class="w-full inline-flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white px-5 py-3.5 rounded-2xl font-black transition shadow-md hover:shadow-lg">
                        Lihat Peserta
                        <span>→</span>
                    </a>

                </div>

            </div>

        @empty

            <div class="col-span-full bg-white rounded-3xl shadow-md border border-gray-100 p-12 text-center">

                <div class="w-24 h-24 mx-auto rounded-full bg-red-50 flex items-center justify-center text-6xl mb-5">
                    🎓
                </div>

                <h2 class="text-2xl font-black text-gray-800">
                    Belum Ada Course
                </h2>

                <p class="text-gray-500 mt-2">
                    Silakan buat course terlebih dahulu.
                </p>

            </div>

        @endforelse

    </div>

</div>

@endsection