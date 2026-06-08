@extends('perusahaan.layouts.app')

@section('title', 'Peserta Course')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Peserta Course
        </h1>

        <p class="text-gray-500 mt-2">
            Kelola peserta yang mendaftar pada course perusahaan Anda.
        </p>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

        @forelse($courses as $course)

            <div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden">

                <div class="bg-gradient-to-r from-red-600 via-orange-500 to-yellow-400 p-6 text-white">

                    <div class="text-4xl mb-3">
                        🎓
                    </div>

                    <h2 class="text-xl font-black leading-tight">
                        {{ $course->title }}
                    </h2>

                </div>

                <div class="p-6">

                    <div class="flex items-center justify-between mb-5">

                        <div>
                            <p class="text-gray-400 text-sm font-semibold">
                                Total Peserta
                            </p>

                            <h3 class="text-4xl font-black text-gray-900 mt-1">
                                {{ $course->registrations_count }}
                            </h3>
                        </div>

                        <div class="w-16 h-16 rounded-2xl bg-red-50 flex items-center justify-center text-red-600 text-3xl">
                            👥
                        </div>

                    </div>

                    <a href="{{ route('perusahaan.course.participant.show', $course->id) }}"
                       class="w-full inline-flex items-center justify-center bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-2xl font-bold transition">
                        Lihat Peserta
                    </a>

                </div>

            </div>

        @empty

            <div class="col-span-full bg-white rounded-3xl shadow p-12 text-center">

                <div class="text-6xl mb-4">
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