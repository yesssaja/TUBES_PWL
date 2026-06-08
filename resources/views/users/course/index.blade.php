@extends('users.course.layouts.app')

@section('title', 'Course | LOKER SEEKER')

@section('content')

<main class="min-h-screen bg-gradient-to-br from-red-50 via-white to-yellow-50 px-4 py-8 md:px-10 md:py-12">

    <div class="max-w-7xl mx-auto">

        {{-- HERO --}}
        <div class="relative overflow-hidden bg-gradient-to-br from-red-600 to-orange-500 rounded-[2.5rem] shadow-2xl p-8 md:p-12 mb-12 text-white">

            <div class="absolute -top-20 -right-20 w-72 h-72 bg-white/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -left-24 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute top-10 right-1/3 w-24 h-24 bg-yellow-300/20 rounded-full blur-2xl"></div>

            <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">

                <div class="max-w-3xl">
                    <p class="inline-flex items-center gap-2 bg-white/20 border border-white/30 backdrop-blur px-5 py-2 rounded-full font-black uppercase text-sm mb-6 shadow">
                        🎓 Course Center
                    </p>

                    <h1 class="font-black text-5xl md:text-7xl leading-tight tracking-tight">
                        Course
                    </h1>

                    <p class="mt-5 text-white/90 text-lg md:text-xl max-w-2xl leading-relaxed">
                        Daftar course terlebih dahulu. Link course hanya bisa diakses setelah pendaftaran kamu disetujui.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row lg:flex-col gap-3 min-w-[220px]">

                    <a href="{{ route('welcome') }}"
                       class="bg-white text-red-600 hover:bg-red-50 px-6 py-4 rounded-2xl font-black text-center shadow-lg transition hover:-translate-y-1">
                        ← Home
                    </a>

                    @auth
                        <div class="bg-white/20 text-white px-6 py-4 rounded-2xl font-black text-center border border-white/30 backdrop-blur shadow">
                            Hi, {{ auth()->user()->name }}
                        </div>
                    @endauth

                </div>

            </div>

        </div>

        {{-- ALERT --}}
        @if(session('success'))
            <div class="bg-green-50 text-green-700 border border-green-200 px-6 py-4 rounded-2xl mb-6 font-bold shadow-sm flex items-center gap-3">
                <span>✅</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 text-red-700 border border-red-200 px-6 py-4 rounded-2xl mb-6 font-bold shadow-sm flex items-center gap-3">
                <span>⚠️</span>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        {{-- SECTION TITLE --}}
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-7">
            <div>
                <p class="text-red-600 font-black uppercase tracking-wider text-sm">
                    Pilihan Course
                </p>
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mt-1">
                    Tingkatkan Skill Kamu
                </h2>
            </div>

            <p class="text-gray-500 font-semibold">
                Total course: {{ $courses->count() }}
            </p>
        </div>

        {{-- COURSE LIST --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

            @forelse($courses as $course)

                @php
                    $registration = $registrations[$course->id] ?? null;
                    $judul = $course->title ?? $course->judul ?? $course->nama_course ?? 'Course';
                    $deskripsi = $course->description ?? $course->deskripsi ?? '-';
                    $kategori = $course->kategori ?? $course->category ?? 'Course';
                    $harga = $course->biaya_pendaftaran ?? $course->harga ?? $course->price ?? null;
                @endphp

                <div class="group bg-white rounded-[2rem] border border-gray-100 shadow-xl overflow-hidden flex flex-col transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

                    {{-- IMAGE / THUMBNAIL --}}
                    <div class="relative h-56 bg-gradient-to-br from-red-600 via-orange-500 to-yellow-400 overflow-hidden">

                        @if(!empty($course->thumbnail))
                            <img src="{{ asset('storage/' . $course->thumbnail) }}"
                                 alt="{{ $judul }}"
                                 class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
                        @else
                            <div class="w-full h-full flex items-center justify-center text-white text-7xl transition duration-500 group-hover:scale-110">
                                🎓
                            </div>
                        @endif

                        <span class="absolute top-4 right-4 bg-white text-red-600 px-4 py-2 rounded-full text-sm font-black shadow-lg">
                            {{ $kategori }}
                        </span>

                    </div>

                    <div class="p-6 flex flex-col flex-1">

                        <div class="flex-1">

                            <h2 class="text-2xl font-black text-gray-900 leading-tight group-hover:text-red-600 transition">
                                {{ $judul }}
                            </h2>

                            <div class="flex flex-wrap items-center gap-2 mt-4">
                                @if($registration)
                                    @if($registration->status === 'pending')
                                        <span class="inline-flex bg-yellow-50 border border-yellow-200 text-yellow-700 px-4 py-2 rounded-full text-sm font-black">
                                            ⏳ Diproses
                                        </span>
                                    @elseif($registration->status === 'approved')
                                        <span class="inline-flex bg-green-50 border border-green-200 text-green-700 px-4 py-2 rounded-full text-sm font-black">
                                            ✅ Disetujui
                                        </span>
                                    @elseif($registration->status === 'rejected')
                                        <span class="inline-flex bg-red-50 border border-red-200 text-red-700 px-4 py-2 rounded-full text-sm font-black">
                                            ❌ Ditolak
                                        </span>
                                    @endif
                                @else
                                    <span class="inline-flex bg-gray-50 border border-gray-200 text-gray-700 px-4 py-2 rounded-full text-sm font-black">
                                        Belum Daftar
                                    </span>
                                @endif
                            </div>

                            <div class="bg-gray-50 rounded-3xl p-5 mt-5 space-y-5 border border-gray-100">

                                <div class="flex gap-3">
                                    <div class="w-11 h-11 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center font-black">
                                        📝
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-400 font-black uppercase tracking-wide">
                                            Deskripsi
                                        </p>
                                        <p class="text-gray-600 text-sm leading-relaxed mt-1">
                                            {{ Str::limit($deskripsi, 130) }}
                                        </p>
                                    </div>
                                </div>

                                @if($harga)
                                    <div class="flex gap-3">
                                        <div class="w-11 h-11 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center font-black">
                                            Rp
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-400 font-black uppercase tracking-wide">
                                                Biaya
                                            </p>
                                            <p class="text-red-600 font-black mt-1">
                                                Rp {{ number_format($harga, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                @endif

                            </div>

                        </div>

                        <div class="mt-6 pt-5 border-t border-gray-100">

                            @guest
                                <a href="{{ route('login') }}"
                                   class="inline-block w-full text-center bg-red-600 hover:bg-red-700 text-white px-6 py-4 rounded-2xl font-black shadow-lg transition hover:-translate-y-1">
                                    Login untuk Daftar
                                </a>
                            @endguest

                            @auth
                                @if(!$registration)
                                    <a href="{{ route('course.register.form', $course->id) }}"
                                       class="inline-block w-full text-center bg-red-600 hover:bg-red-700 text-white px-6 py-4 rounded-2xl font-black shadow-lg transition hover:-translate-y-1">
                                        Daftar Course
                                    </a>

                                @elseif($registration->status === 'pending')
                                    <button disabled
                                            class="w-full bg-gray-200 text-gray-500 px-6 py-4 rounded-2xl font-black cursor-not-allowed">
                                        Menunggu Persetujuan
                                    </button>

                                @elseif($registration->status === 'approved')
                                    <a href="{{ route('course.access', $course->id) }}"
                                       class="inline-block w-full text-center bg-green-600 hover:bg-green-700 text-white px-6 py-4 rounded-2xl font-black shadow-lg transition hover:-translate-y-1">
                                        Akses Course
                                    </a>

                                @elseif($registration->status === 'rejected')
                                    <a href="{{ route('course.register.form', $course->id) }}"
                                       class="inline-block w-full text-center bg-red-600 hover:bg-red-700 text-white px-6 py-4 rounded-2xl font-black shadow-lg transition hover:-translate-y-1">
                                        Daftar Ulang
                                    </a>

                                    @if($registration->catatan_admin)
                                        <div class="bg-red-50 border border-red-200 rounded-2xl p-4 mt-4">
                                            <p class="text-red-600 text-sm font-black">
                                                Catatan:
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

                </div>

            @empty

                <div class="col-span-full bg-white rounded-[2.5rem] border border-gray-100 p-12 text-center shadow-xl">

                    <div class="w-24 h-24 rounded-3xl bg-red-50 text-red-600 flex items-center justify-center text-5xl mx-auto mb-6 shadow-sm">
                        🎓
                    </div>

                    <h2 class="text-gray-800 text-3xl md:text-4xl font-black">
                        Belum ada course tersedia.
                    </h2>

                    <p class="text-gray-500 mt-3 text-lg">
                        Silakan cek kembali nanti.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</main>

@endsection