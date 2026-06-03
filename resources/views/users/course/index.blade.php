@extends('users.course.layouts.app')

@section('title', 'Course | LOKER SEEKER')

@section('content')

<main class="p-4 md:p-10">

    <div class="max-w-7xl mx-auto">

        <div class="bg-white border-4 border-c rounded-[32px] course-shadow p-6 md:p-8 mb-10">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                <div>
                    <div class="inline-flex items-center gap-2 bg-red-50 border-2 border-c text-c px-4 py-2 rounded-full font-bold uppercase text-sm mb-4">
                        🎓 Course Center
                    </div>

                    <h1 class="text-c font-bold text-5xl md:text-6xl uppercase tracking-widest leading-none">
                        Course
                    </h1>

                    <p class="text-c mt-4 text-lg max-w-2xl leading-relaxed">
                        Daftar course terlebih dahulu. Link course hanya bisa diakses setelah pendaftaran kamu disetujui oleh mentor.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-3">

                    <a href="{{ route('welcome') }}"
                       class="btn-course bg-white text-c border-4 border-c px-6 py-3 rounded-2xl font-bold uppercase text-center course-shadow-sm">
                        ← Home
                    </a>

                    @auth
                        <div class="bg-c text-white px-6 py-3 rounded-2xl font-bold uppercase text-center border-4 border-c">
                            Hi, {{ auth()->user()->name }}
                        </div>
                    @endauth

                </div>

            </div>

        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 border-4 border-green-500 px-5 py-4 rounded-2xl mb-6 font-bold course-shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 text-red-700 border-4 border-red-500 px-5 py-4 rounded-2xl mb-6 font-bold course-shadow-sm">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-7">

            @forelse($courses as $course)

                @php
                    $registration = $registrations[$course->id] ?? null;
                @endphp

                <div class="course-card bg-white rounded-[30px] border-4 border-c p-6 flex flex-col justify-between course-shadow min-h-[420px]">

                    <div>

                        <div class="flex items-start gap-4 mb-5">

                            <div class="w-12 h-12 rounded-2xl bg-c flex items-center justify-center shrink-0 border-4 border-c">
                                <div class="w-4 h-4 rounded-full bg-white"></div>
                            </div>

                            <div class="flex-1">
                                <h2 class="text-c font-bold text-2xl uppercase leading-tight">
                                    {{ $course->title }}
                                </h2>

                                <div class="mt-3">
                                    @if($registration)
                                        @if($registration->status === 'pending')
                                            <span class="inline-flex items-center gap-2 bg-yellow-100 border-2 border-yellow-400 text-yellow-700 px-4 py-2 rounded-full text-sm font-bold">
                                                ⏳ Permintaan Diproses
                                            </span>
                                        @elseif($registration->status === 'approved')
                                            <span class="inline-flex items-center gap-2 bg-green-100 border-2 border-green-400 text-green-700 px-4 py-2 rounded-full text-sm font-bold">
                                                ✅ Disetujui
                                            </span>
                                        @elseif($registration->status === 'rejected')
                                            <span class="inline-flex items-center gap-2 bg-red-100 border-2 border-red-400 text-red-700 px-4 py-2 rounded-full text-sm font-bold">
                                                ❌ Ditolak
                                            </span>
                                        @endif
                                    @else
                                        <span class="inline-flex items-center gap-2 bg-gray-100 border-2 border-gray-300 text-gray-700 px-4 py-2 rounded-full text-sm font-bold">
                                            Belum Daftar
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="bg-red-50 border-2 border-red-100 rounded-2xl p-4 mb-4">
                            <p class="text-c text-sm leading-relaxed">
                                {{ $course->description }}
                            </p>
                        </div>

                        @if($course->benefit)
                            <div class="bg-yellow-50 border-2 border-yellow-200 rounded-2xl p-4">
                                <p class="text-c text-sm font-bold uppercase mb-1">
                                    Benefit
                                </p>

                                <p class="text-c text-sm leading-relaxed">
                                    {{ $course->benefit }}
                                </p>
                            </div>
                        @endif

                    </div>

                    <div class="mt-6 pt-5 border-t-4 border-red-100">

                        @guest
                            <a href="{{ route('login') }}"
                               class="btn-course inline-block w-full text-center bg-c text-white px-6 py-4 rounded-2xl font-bold uppercase">
                                Login untuk Daftar
                            </a>
                        @endguest

                        @auth
                            @if(!$registration)
                                <a href="{{ route('course.register.form', $course->id) }}"
                                   class="btn-course inline-block w-full text-center bg-c text-white px-6 py-4 rounded-2xl font-bold uppercase">
                                    Daftar Course
                                </a>

                            @elseif($registration->status === 'pending')
                                <button disabled
                                        class="w-full bg-gray-300 text-gray-600 px-6 py-4 rounded-2xl font-bold uppercase cursor-not-allowed">
                                    Menunggu
                                </button>

                            @elseif($registration->status === 'approved')
                                <a href="{{ route('course.access', $course->id) }}"
                                   class="btn-course inline-block w-full text-center bg-green-600 text-white px-6 py-4 rounded-2xl font-bold uppercase">
                                    Akses Course
                                </a>

                            @elseif($registration->status === 'rejected')
                                <a href="{{ route('course.register.form', $course->id) }}"
                                   class="btn-course inline-block w-full text-center bg-c text-white px-6 py-4 rounded-2xl font-bold uppercase">
                                    Daftar Ulang
                                </a>

                                @if($registration->catatan_admin)
                                    <div class="bg-red-50 border-2 border-red-200 rounded-2xl p-4 mt-4">
                                        <p class="text-red-600 text-sm font-bold">
                                            Catatan Mentor:
                                        </p>

                                        <p class="text-red-600 text-sm mt-1">
                                            {{ $registration->catatan_admin }}
                                        </p>
                                    </div>
                                @endif
                            @endif
                        @endauth

                    </div>

                </div>

            @empty

                <div class="col-span-full bg-white rounded-3xl border-4 border-c p-10 text-center course-shadow">

                    <div class="w-20 h-20 rounded-3xl bg-c text-white flex items-center justify-center text-4xl mx-auto mb-5">
                        🎓
                    </div>

                    <h2 class="text-c text-3xl font-bold uppercase">
                        Belum ada course tersedia.
                    </h2>

                    <p class="text-c mt-3">
                        Silakan cek kembali nanti.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</main>

@endsection