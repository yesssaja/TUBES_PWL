@extends('perusahaan.layouts.app')

@section('title', 'Course Perusahaan')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- HEADER --}}
    <div class="relative overflow-hidden bg-gradient-to-br from-red-600 via-orange-500 to-yellow-400 rounded-[2rem] shadow-xl p-8 md:p-10 mb-8 text-white">

        <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>

        <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-6">

            <div>
                <p class="inline-flex items-center gap-2 bg-white/20 border border-white/30 px-5 py-2 rounded-full text-sm font-black mb-5">
                    🎓 Manajemen Course
                </p>

                <h1 class="text-4xl md:text-5xl font-black leading-tight">
                    Course Perusahaan
                </h1>

                <p class="text-white/90 mt-3 max-w-2xl leading-relaxed">
                    Kelola course yang dibuat oleh perusahaan Anda, mulai dari materi, harga, pembayaran, hingga status publikasi.
                </p>
            </div>

            <a href="{{ route('perusahaan.course.create') }}"
               class="inline-flex items-center justify-center bg-white hover:bg-red-50 text-red-600 px-6 py-4 rounded-2xl font-black shadow-lg transition hover:-translate-y-1">
                + Tambah Course
            </a>

        </div>

    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl font-semibold shadow-sm">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-2xl font-semibold shadow-sm">
            ⚠️ {{ session('error') }}
        </div>
    @endif

    {{-- SUMMARY CARD --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">

        <div class="bg-white rounded-3xl shadow p-6 border border-gray-100">
            <p class="text-gray-400 text-sm font-black uppercase tracking-wide">
                Total Course
            </p>
            <h2 class="text-4xl font-black text-gray-900 mt-3">
                {{ $courses->count() }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl shadow p-6 border border-gray-100">
            <p class="text-gray-400 text-sm font-black uppercase tracking-wide">
                Course Aktif
            </p>
            <h2 class="text-4xl font-black text-green-600 mt-3">
                {{ $courses->where('is_active', true)->count() }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl shadow p-6 border border-gray-100">
            <p class="text-gray-400 text-sm font-black uppercase tracking-wide">
                Course Berbayar
            </p>
            <h2 class="text-4xl font-black text-red-600 mt-3">
                {{ $courses->where('payment_required', true)->count() }}
            </h2>
        </div>

    </div>

    {{-- COURSE CARD LIST --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        @forelse($courses as $course)

            <div class="bg-white rounded-[2rem] shadow-lg border border-gray-100 overflow-hidden hover:shadow-2xl transition hover:-translate-y-1">

                <div class="p-6">

                    <div class="flex items-start justify-between gap-4 mb-5">

                        <div>
                            <div class="w-14 h-14 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center text-2xl mb-4">
                                🎓
                            </div>

                            <h2 class="text-2xl font-black text-gray-900 leading-tight">
                                {{ $course->title }}
                            </h2>
                        </div>

                        <div>
                            @if($course->is_active)
                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-black">
                                    Aktif
                                </span>
                            @else
                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-black">
                                    Nonaktif
                                </span>
                            @endif
                        </div>

                    </div>

                    <p class="text-gray-500 leading-relaxed mb-5">
                        {{ Str::limit($course->description, 140) }}
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">

                        <div class="bg-gray-50 rounded-2xl p-4">
                            <p class="text-xs text-gray-400 font-black uppercase tracking-wide">
                                Harga
                            </p>

                            <p class="text-gray-900 font-black mt-2">
                                @if((float)($course->price ?? 0) > 0)
                                    Rp {{ number_format($course->price, 0, ',', '.') }}
                                @else
                                    Gratis
                                @endif
                            </p>
                        </div>

                        <div class="bg-gray-50 rounded-2xl p-4">
                            <p class="text-xs text-gray-400 font-black uppercase tracking-wide">
                                Pembayaran
                            </p>

                            <p class="font-black mt-2">
                                @if($course->payment_required)
                                    <span class="text-yellow-700">
                                        Wajib
                                    </span>
                                @else
                                    <span class="text-gray-700">
                                        Tidak Wajib
                                    </span>
                                @endif
                            </p>
                        </div>

                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 pt-5 border-t border-gray-100">

                        <div class="text-sm text-gray-400 font-semibold">
                            Dibuat: {{ $course->created_at ? $course->created_at->format('d M Y') : '-' }}
                        </div>

                        <div class="flex flex-wrap gap-2">

                            <a href="{{ route('perusahaan.course.show', $course->id) }}"
                               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-sm font-bold transition">
                                Detail
                            </a>

                            <a href="{{ route('perusahaan.course.edit', $course->id) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-xl text-sm font-bold transition">
                                Edit
                            </a>

                            <form action="{{ route('perusahaan.course.destroy', $course->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus course ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl text-sm font-bold transition">
                                    Hapus
                                </button>
                            </form>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="lg:col-span-2 bg-white rounded-[2rem] shadow-xl border border-gray-100 p-12 text-center">

                <div class="w-24 h-24 rounded-3xl bg-red-50 text-red-600 flex items-center justify-center text-5xl mx-auto mb-6">
                    🎓
                </div>

                <h2 class="text-3xl font-black text-gray-900">
                    Belum ada course.
                </h2>

                <p class="text-gray-500 mt-3 mb-6">
                    Silakan tambah course pertama untuk perusahaan Anda.
                </p>

                <a href="{{ route('perusahaan.course.create') }}"
                   class="inline-flex items-center justify-center bg-red-600 hover:bg-red-700 text-white px-6 py-4 rounded-2xl font-black shadow-lg transition">
                    + Tambah Course
                </a>

            </div>

        @endforelse

    </div>

</div>

@endsection