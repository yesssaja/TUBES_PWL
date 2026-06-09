@extends('perusahaan.layouts.app')

@section('title', 'Course Perusahaan')

@section('content')

@php
    $totalPendingPayment = 0;
    $totalVerifiedPayment = 0;

    foreach ($courses as $courseItem) {
        $totalPendingPayment += \App\Models\CoursePayment::where('course_id', $courseItem->id)
            ->where('status', 'pending')
            ->count();

        $totalVerifiedPayment += \App\Models\CoursePayment::where('course_id', $courseItem->id)
            ->where('status', 'verified')
            ->count();
    }
@endphp

<div class="max-w-7xl mx-auto">

    {{-- HEADER --}}
    <div class="bg-red-600 rounded-[2rem] shadow-xl p-6 sm:p-8 md:p-10 mb-8 text-white">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div class="min-w-0">
                <p class="inline-flex items-center bg-white/20 border border-white/30 px-4 sm:px-5 py-2 rounded-full text-xs sm:text-sm font-black mb-5">
                    Manajemen Course
                </p>

                <h1 class="text-3xl sm:text-4xl md:text-5xl font-black leading-tight break-words">
                    Course Perusahaan
                </h1>

                <p class="text-white/90 mt-3 max-w-2xl leading-relaxed text-sm sm:text-base">
                    Kelola course, peserta, pembayaran, dan verifikasi bukti pembayaran.
                </p>
            </div>

            <a href="{{ route('perusahaan.course.create') }}"
               class="w-full sm:w-auto inline-flex items-center justify-center bg-white hover:bg-red-50 text-red-600 px-6 py-4 rounded-2xl font-black shadow-lg transition no-underline">
                Tambah Course
            </a>

        </div>

    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl font-semibold shadow-sm text-sm sm:text-base">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-2xl font-semibold shadow-sm text-sm sm:text-base">
            {{ session('error') }}
        </div>
    @endif

    {{-- SUMMARY CARD --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

        <div class="bg-white rounded-3xl shadow p-5 sm:p-6 border border-gray-100">
            <p class="text-gray-400 text-xs sm:text-sm font-black uppercase tracking-wide">
                Total Course
            </p>

            <h2 class="text-3xl sm:text-4xl font-black text-gray-900 mt-3">
                {{ $courses->count() }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl shadow p-5 sm:p-6 border border-gray-100">
            <p class="text-gray-400 text-xs sm:text-sm font-black uppercase tracking-wide">
                Course Aktif
            </p>

            <h2 class="text-3xl sm:text-4xl font-black text-green-600 mt-3">
                {{ $courses->where('is_active', true)->count() }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl shadow p-5 sm:p-6 border border-gray-100">
            <p class="text-gray-400 text-xs sm:text-sm font-black uppercase tracking-wide">
                Menunggu Verifikasi
            </p>

            <h2 class="text-3xl sm:text-4xl font-black text-yellow-500 mt-3">
                {{ $totalPendingPayment }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl shadow p-5 sm:p-6 border border-gray-100">
            <p class="text-gray-400 text-xs sm:text-sm font-black uppercase tracking-wide">
                Pembayaran Verified
            </p>

            <h2 class="text-3xl sm:text-4xl font-black text-blue-600 mt-3">
                {{ $totalVerifiedPayment }}
            </h2>
        </div>

    </div>

    {{-- COURSE CARD LIST --}}
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

        @forelse($courses as $course)

            @php
                $pendingPayment = \App\Models\CoursePayment::where('course_id', $course->id)
                    ->where('status', 'pending')
                    ->count();

                $verifiedPayment = \App\Models\CoursePayment::where('course_id', $course->id)
                    ->where('status', 'verified')
                    ->count();

                $totalParticipant = \App\Models\CourseRegistration::where('course_id', $course->id)
                    ->count();
            @endphp

            <div class="bg-white rounded-[2rem] shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition">

                <div class="p-5 sm:p-6">

                    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-5">

                        <div class="min-w-0">
                            <div class="w-14 h-14 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center text-xl font-black mb-4">
                                C
                            </div>

                            <h2 class="text-xl sm:text-2xl font-black text-gray-900 leading-tight break-words">
                                {{ $course->title }}
                            </h2>
                        </div>

                        <div class="shrink-0">
                            @if($course->is_active)
                                <span class="inline-flex bg-green-100 text-green-700 px-4 py-2 rounded-full text-xs sm:text-sm font-black">
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex bg-red-100 text-red-700 px-4 py-2 rounded-full text-xs sm:text-sm font-black">
                                    Nonaktif
                                </span>
                            @endif
                        </div>

                    </div>

                    <p class="text-gray-500 leading-relaxed mb-5 text-sm sm:text-base">
                        {{ Str::limit($course->description, 140) }}
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">

                        <div class="bg-gray-50 rounded-2xl p-4">
                            <p class="text-xs text-gray-400 font-black uppercase tracking-wide">
                                Harga
                            </p>

                            <p class="text-gray-900 font-black mt-2 break-words">
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

                    {{-- VERIFIKASI PEMBAYARAN --}}
                    <div class="bg-yellow-50 border border-yellow-200 rounded-3xl p-5 mb-6">

                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-4">

                            <div>
                                <h3 class="text-lg font-black text-gray-900">
                                    Verifikasi Pembayaran
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    Cek bukti pembayaran peserta course ini.
                                </p>
                            </div>

                            @if($pendingPayment > 0)
                                <span class="inline-flex bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-black">
                                    {{ $pendingPayment }} Menunggu
                                </span>
                            @else
                                <span class="inline-flex bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-black">
                                    Tidak Ada Pending
                                </span>
                            @endif

                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mb-4">

                            <div class="bg-white rounded-2xl p-4 border border-yellow-100">
                                <p class="text-xs text-gray-400 font-black uppercase">
                                    Peserta
                                </p>

                                <p class="text-2xl font-black text-gray-900 mt-1">
                                    {{ $totalParticipant }}
                                </p>
                            </div>

                            <div class="bg-white rounded-2xl p-4 border border-yellow-100">
                                <p class="text-xs text-gray-400 font-black uppercase">
                                    Pending
                                </p>

                                <p class="text-2xl font-black text-yellow-600 mt-1">
                                    {{ $pendingPayment }}
                                </p>
                            </div>

                            <div class="bg-white rounded-2xl p-4 border border-yellow-100">
                                <p class="text-xs text-gray-400 font-black uppercase">
                                    Verified
                                </p>

                                <p class="text-2xl font-black text-green-600 mt-1">
                                    {{ $verifiedPayment }}
                                </p>
                            </div>

                        </div>

                        <a href="{{ route('perusahaan.course.participant.index', ['course_id' => $course->id]) }}"
                           class="inline-flex w-full items-center justify-center bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-3 rounded-2xl text-sm font-black transition no-underline">
                            Verifikasi Bukti Pembayaran
                        </a>

                    </div>

                    <div class="flex flex-col gap-4 pt-5 border-t border-gray-100">

                        <div class="text-sm text-gray-400 font-semibold">
                            Dibuat: {{ $course->created_at ? $course->created_at->format('d M Y') : '-' }}
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">

                            <a href="{{ route('perusahaan.course.show', $course->id) }}"
                               class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-3 rounded-xl text-sm font-bold transition no-underline">
                                Detail
                            </a>

                            <a href="{{ route('perusahaan.course.edit', $course->id) }}"
                               class="inline-flex items-center justify-center bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-3 rounded-xl text-sm font-bold transition no-underline">
                                Edit
                            </a>

                            <form action="{{ route('perusahaan.course.destroy', $course->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus course ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-xl text-sm font-bold transition">
                                    Hapus
                                </button>
                            </form>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="xl:col-span-2 bg-white rounded-[2rem] shadow-xl border border-gray-100 p-8 sm:p-12 text-center">

                <div class="w-20 sm:w-24 h-20 sm:h-24 rounded-3xl bg-red-50 text-red-600 flex items-center justify-center text-4xl sm:text-5xl mx-auto mb-6">
                    C
                </div>

                <h2 class="text-2xl sm:text-3xl font-black text-gray-900">
                    Belum ada course.
                </h2>

                <p class="text-gray-500 mt-3 mb-6 text-sm sm:text-base">
                    Silakan tambah course pertama untuk perusahaan Anda.
                </p>

                <a href="{{ route('perusahaan.course.create') }}"
                   class="w-full sm:w-auto inline-flex items-center justify-center bg-red-600 hover:bg-red-700 text-white px-6 py-4 rounded-2xl font-black shadow-lg transition no-underline">
                    Tambah Course
                </a>

            </div>

        @endforelse

    </div>

</div>

@endsection