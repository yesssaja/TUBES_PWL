@extends('perusahaan.layouts.app')

@section('title', 'Review Perusahaan')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- HEADER --}}
    <div class="relative overflow-hidden bg-gradient-to-br from-red-600 via-orange-500 to-yellow-400 rounded-[2rem] shadow-xl p-8 md:p-10 mb-8 text-white">

        <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>

        <div class="relative">

            <p class="inline-flex items-center gap-2 bg-white/20 border border-white/30 px-5 py-2 rounded-full text-sm font-black mb-5">
                ⭐ Review Pelamar
            </p>

            <h1 class="text-4xl md:text-5xl font-black leading-tight">
                Review Perusahaan
            </h1>

            <p class="text-white/90 mt-3 max-w-2xl leading-relaxed">
                Kelola review dan tanggapi masukan dari pelamar untuk meningkatkan reputasi perusahaan.
            </p>

        </div>

    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl font-semibold shadow-sm">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">

        <div class="bg-white rounded-3xl shadow p-6 border border-gray-100">
            <p class="text-gray-400 text-sm font-black uppercase tracking-wide">
                Total Review
            </p>

            <h2 class="text-4xl font-black text-gray-900 mt-3">
                {{ $reviews->count() }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl shadow p-6 border border-gray-100">
            <p class="text-gray-400 text-sm font-black uppercase tracking-wide">
                Rating Rata-rata
            </p>

            <h2 class="text-4xl font-black text-yellow-500 mt-3">
                ⭐ {{ number_format($reviews->avg('rating') ?? 0, 1) }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl shadow p-6 border border-gray-100">
            <p class="text-gray-400 text-sm font-black uppercase tracking-wide">
                Sudah Dibalas
            </p>

            <h2 class="text-4xl font-black text-green-600 mt-3">
                {{ $reviews->whereNotNull('balasan_perusahaan')->count() }}
            </h2>
        </div>

    </div>

    {{-- REVIEW LIST --}}
    <div class="space-y-6">

        @forelse($reviews as $review)

            <div class="bg-white rounded-[2rem] shadow-lg border border-gray-100 overflow-hidden">

                <div class="p-6 md:p-8">

                    {{-- TOP --}}
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

                        <div class="flex items-center gap-4">

                            <div class="w-14 h-14 rounded-2xl bg-red-50 flex items-center justify-center text-red-600 font-black text-xl">
                                {{ strtoupper(substr($review->nama ?? 'P',0,1)) }}
                            </div>

                            <div>
                                <h2 class="text-xl font-black text-gray-900">
                                    {{ $review->nama ?? 'Pelamar' }}
                                </h2>

                                <p class="text-gray-500 text-sm">
                                    {{ $review->created_at->format('d M Y H:i') }}
                                </p>
                            </div>

                        </div>

                        <div class="bg-yellow-100 text-yellow-700 px-5 py-2 rounded-full font-black">
                            ⭐ {{ $review->rating }}/5
                        </div>

                    </div>

                    {{-- REVIEW --}}
                    <div class="bg-gray-50 rounded-3xl p-5 mb-5">

                        <p class="text-gray-700 leading-relaxed">
                            {{ $review->ulasan }}
                        </p>

                    </div>

                    {{-- BALASAN --}}
                    @if($review->balasan_perusahaan)

                        <div class="bg-red-50 border border-red-100 rounded-3xl p-5 mb-5">

                            <div class="flex items-center gap-2 mb-3">

                                <span class="bg-red-600 text-white px-3 py-1 rounded-full text-xs font-black">
                                    BALASAN PERUSAHAAN
                                </span>

                            </div>

                            <p class="text-gray-700 leading-relaxed">
                                {{ $review->balasan_perusahaan }}
                            </p>

                        </div>

                    @endif

                    {{-- FORM BALAS --}}
                    <form action="{{ route('perusahaan.review.reply', $review->id) }}"
                          method="POST">

                        @csrf

                        <label class="block text-sm font-black text-gray-700 mb-2">
                            {{ $review->balasan_perusahaan ? 'Ubah Balasan' : 'Balas Review' }}
                        </label>

                        <textarea
                            name="balasan_perusahaan"
                            rows="4"
                            class="w-full rounded-3xl border border-gray-200 focus:border-red-500 focus:ring-red-500 p-4"
                            placeholder="Tulis balasan untuk review ini...">{{ old('balasan_perusahaan', $review->balasan_perusahaan) }}</textarea>

                        <button
                            type="submit"
                            class="mt-4 bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-2xl font-black transition">

                            {{ $review->balasan_perusahaan ? 'Update Balasan' : 'Kirim Balasan' }}

                        </button>

                    </form>

                </div>

            </div>

        @empty

            <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-12 text-center">

                <div class="w-24 h-24 rounded-3xl bg-yellow-50 text-yellow-500 flex items-center justify-center text-5xl mx-auto mb-6">
                    ⭐
                </div>

                <h2 class="text-3xl font-black text-gray-900">
                    Belum Ada Review
                </h2>

                <p class="text-gray-500 mt-3">
                    Saat ini perusahaan Anda belum menerima review dari pelamar.
                </p>

            </div>

        @endforelse

    </div>

</div>

@endsection