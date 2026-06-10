@extends('users.layouts.app')

@section('title', 'Course | LOKER SEEKER')

@section('content')

<style>
    /* UTILITY ANIMASI HOVER REVEAL INTERAKTIF */
    .reveal-container {
        display: grid;
        grid-template-rows: 0fr;
        opacity: 0;
        transition: grid-template-rows 0.5s cubic-bezier(0.16, 1, 0.3, 1), 
                    opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .card-hover-group:hover .reveal-container {
        grid-template-rows: 1fr;
        opacity: 1;
    }

    .reveal-content {
        overflow: hidden;
    }
</style>

<main class="min-h-screen bg-gradient-to-br from-[#FDF6D8]/60 via-white to-amber-50 px-4 py-8 md:px-10 md:py-12">

    <div class="max-w-7xl mx-auto">

        {{-- HERO --}}
        <div class="relative overflow-hidden bg-gradient-to-br from-[#3B0A12] to-red-900 rounded-[2.5rem] shadow-2xl p-8 md:p-12 mb-12 text-white">

            <div class="absolute -top-20 -right-20 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -left-24 w-72 h-72 bg-[#FDF6D8]/10 rounded-full blur-3xl"></div>

            <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">

                <div class="max-w-3xl">
                    <p class="inline-flex items-center gap-2 bg-white/10 border border-white/20 px-5 py-2 rounded-full font-black uppercase text-sm mb-6 shadow-sm text-[#FDF6D8]">
                        Course Center
                    </p>

                    <h1 class="font-black text-5xl md:text-7xl leading-tight tracking-tight">
                        Course
                    </h1>

                    <p class="mt-5 text-white/80 text-lg md:text-xl max-w-2xl leading-relaxed">
                        Daftar course terlebih dahulu. Link course hanya bisa diakses setelah pendaftaran kamu disetujui.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row lg:flex-col gap-3 min-w-[220px]">

                    <a href="{{ route('welcome') }}"
                       class="bg-white text-[#3B0A12] hover:bg-[#FDF6D8] px-6 py-4 rounded-2xl font-black text-center shadow-lg transition duration-300 hover:-translate-y-1">
                        Home
                    </a>

                    @auth
                        <div class="bg-white/10 text-[#FDF6D8] px-6 py-4 rounded-2xl font-black text-center border border-white/10 shadow">
                            Hi, {{ auth()->user()->name }}
                        </div>
                    @endauth

                </div>

            </div>

        </div>

        {{-- ALERT --}}
        @if(session('success'))
            <div class="bg-green-50 text-green-700 border border-green-200 px-6 py-4 rounded-2xl mb-6 font-bold shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 text-red-700 border border-red-100 px-6 py-4 rounded-2xl mb-6 font-bold shadow-sm">
                {{ session('error') }}
            </div>
        @endif

        {{-- SECTION TITLE --}}
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-7 max-w-5xl mx-auto">
            <div>
                <p class="text-[#3B0A12] font-black uppercase tracking-wider text-sm">
                    Pilihan Course
                </p>

                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mt-1">
                    Tingkatkan Skill Kamu
                </h2>
            </div>

            <p class="text-gray-500 font-semibold bg-white px-4 py-2 rounded-xl border border-gray-100 shadow-sm">
                Total course: {{ $courses->count() }}
            </p>
        </div>

        {{-- COURSE LIST (2 KOLOM KE SAMPING & INDEPENDEN HEIGHT) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start max-w-5xl mx-auto">

            @forelse($courses as $course)

                @php
                    $registration = $registrations[$course->id] ?? null;

                    $judul = $course->title
                        ?? $course->judul
                        ?? $course->nama_course
                        ?? 'Course';

                    $deskripsi = $course->description
                        ?? $course->deskripsi
                        ?? '-';

                    $kategori = $course->kategori
                        ?? $course->category
                        ?? 'Course';

                    $harga = $course->biaya_pendaftaran
                        ?? $course->harga
                        ?? $course->price
                        ?? null;

                    $namaPerusahaan =
                        $course->perusahaan->nama_perusahaan
                        ?? $course->profilePerusahaan->nama_perusahaan
                        ?? $course->company->nama_perusahaan
                        ?? $course->company->name
                        ?? 'Perusahaan';
                @endphp

                {{-- CARD CONTAINER --}}
                <div class="card-hover-group group bg-white hover:bg-[#F9EAA2] rounded-[2.5rem] border border-gray-100 shadow-xl overflow-hidden flex flex-col transform transition-all duration-700 cubic-bezier(0.16, 1, 0.3, 1) hover:-translate-y-2 hover:shadow-2xl">

                    {{-- TUMBNAIL UTAMA (HANYA JUDUL, HARGA, KATEGORI, STATUS) --}}
                    <div class="p-8 flex flex-col justify-between min-h-[220px] transition-all duration-300">
                        
                        <div class="flex justify-between items-start gap-4">
                            <span class="bg-[#FDF6D8] text-[#3B0A12] px-4 py-1.5 rounded-full text-xs font-black tracking-wide border border-[#3B0A12]/10 uppercase">
                                {{ $kategori }}
                            </span>

                            <div class="shrink-0">
                                @if($registration)
                                    @if($registration->status === 'pending')
                                        <span class="inline-flex bg-yellow-50 border border-yellow-200 text-yellow-700 px-3 py-1 rounded-full text-xs font-black">
                                            Diproses
                                        </span>
                                    @elseif($registration->status === 'approved')
                                        <span class="inline-flex bg-green-50 border border-green-200 text-green-700 px-3 py-1 rounded-full text-xs font-black">
                                            Disetujui
                                        </span>
                                    @elseif($registration->status === 'rejected')
                                        <span class="inline-flex bg-red-50 border border-red-200 text-red-700 px-3 py-1 rounded-full text-xs font-black">
                                            Ditolak
                                        </span>
                                    @endif
                                @else
                                    <span class="inline-flex bg-gray-50 border border-gray-200 text-gray-400 px-3 py-1 rounded-full text-xs font-black">
                                        Belum Daftar
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="mt-6 flex-1">
                            <h2 class="text-2xl font-black text-[#3B0A12] leading-tight transition duration-300 group-hover:text-red-600 line-clamp-2">
                                {{ $judul }}
                            </h2>
                        </div>

                        @if($harga)
                            <div class="mt-4 pt-4 border-t border-gray-100/30 transition-colors duration-500">
                                <p class="text-xs text-gray-400 group-hover:text-[#3B0A12]/60 font-bold uppercase tracking-wider">Biaya Registrasi</p>
                                <p class="text-xl font-black text-red-600 group-hover:text-[#3B0A12] mt-0.5">
                                    Rp {{ number_format($harga, 0, ',', '.') }}
                                </p>
                            </div>
                        @else
                            <div class="mt-4 pt-4 border-t border-gray-100/30 transition-colors duration-500">
                                <p class="text-xs text-gray-400 group-hover:text-[#3B0A12]/60 font-bold uppercase tracking-wider">Biaya Registrasi</p>
                                <p class="text-xl font-black text-green-700 mt-0.5">Gratis</p>
                            </div>
                        @endif

                    </div>

                    {{-- DETAIL CONTAINER (MUNCUL SAAT CURSOR HOVER) --}}
                    <div class="reveal-container px-8">
                        <div class="reveal-content">

                            <div class="border-t border-[#3B0A12]/10 my-1 transition-colors duration-500"></div>

                            {{-- NAMA PERUSAHAAN --}}
                            <div class="mt-3 bg-white/60 border border-white/40 rounded-2xl p-4 flex flex-col transition-all duration-500">
                                <span class="text-[10px] text-gray-400 group-hover:text-[#3B0A12]/50 font-black uppercase tracking-wide">Penyelenggara</span>
                                <span class="text-[#3B0A12] font-black text-sm mt-0.5">{{ $namaPerusahaan }}</span>
                            </div>

                            {{-- DESKRIPSI --}}
                            <div class="mt-4">
                                <span class="text-[10px] text-gray-400 group-hover:text-[#3B0A12]/50 font-black uppercase tracking-wide block">Deskripsi Kelas</span>
                                <p class="text-gray-600 group-hover:text-[#3B0A12]/80 text-sm leading-relaxed mt-1 font-medium transition-colors duration-500">
                                    {{ Str::limit($deskripsi, 130) }}
                                </p>
                            </div>

                            {{-- TOMBOL AKSES --}}
                            <div class="mt-6 mb-8">
                                
                                @guest
                                    <a href="{{ route('login') }}"
                                       class="inline-block w-full text-center bg-[#3B0A12] hover:bg-[#54111c] text-white hover:text-[#FDF6D8] px-6 py-4 rounded-2xl font-black shadow-lg transition-all duration-300 hover:-translate-y-0.5">
                                        Login untuk Daftar
                                    </a>
                                @endguest

                                @auth
                                    @if(!$registration)
                                        <a href="{{ route('course.register.form', $course->id) }}"
                                           class="inline-block w-full text-center bg-[#3B0A12] hover:bg-[#b02f44] text-white hover:text-[#FDF6D8] px-6 py-4 rounded-2xl font-black shadow-lg transition-all duration-300 hover:-translate-y-0.5 active:scale-[0.98]">
                                            Daftar Course
                                        </a>

                                    @elseif($registration->status === 'pending')
                                        <button disabled
                                                class="w-full bg-gray-100 text-gray-400 border border-gray-200 px-6 py-4 rounded-2xl font-black cursor-not-allowed">
                                            Menunggu Persetujuan
                                        </button>

                                    @elseif($registration->status === 'approved')
                                        <a href="{{ route('course.access', $course->id) }}"
                                           class="inline-block w-full text-center bg-green-600 hover:bg-green-700 text-white px-6 py-4 rounded-2xl font-black shadow-lg transition hover:-translate-y-0.5">
                                            Akses Course
                                        </a>

                                    @elseif($registration->status === 'rejected')
                                        <a href="{{ route('course.register.form', $course->id) }}"
                                           class="inline-block w-full text-center bg-red-600 hover:bg-red-700 text-white px-6 py-4 rounded-2xl font-black shadow-lg transition hover:-translate-y-0.5">
                                            Daftar Ulang
                                        </a>

                                        @if($registration->catatan_admin)
                                            <div class="bg-red-50 border border-red-100 rounded-2xl p-4 mt-3 text-xs text-red-600 font-medium">
                                                <strong class="font-black">Catatan:</strong> {{ $registration->catatan_admin }}
                                            </div>
                                        @endif
                                    @endif
                                @endauth

                            </div>

                        </div>
                    </div>

                </div> 

            @empty

                <div class="col-span-full bg-white rounded-[2.5rem] border border-gray-100 p-12 text-center shadow-xl max-w-xl mx-auto">
                    <div class="w-20 h-20 rounded-3xl bg-amber-50 text-[#3B0A12] flex items-center justify-center text-3xl mx-auto mb-4 font-black">
                        !
                    </div>
                    <h2 class="text-gray-800 text-2xl font-black">
                        Belum ada course tersedia.
                    </h2>
                    <p class="text-gray-500 mt-1">
                        Silakan cek kembali nanti ya.
                    </p>
                </div>

            @endforelse

        </div> 

    </div> 

</main>

@endsection