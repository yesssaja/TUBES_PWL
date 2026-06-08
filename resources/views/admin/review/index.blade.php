@php
    $title = 'Manage Review';

    $totalBalasan = 0;

    foreach ($reviews as $reviewItem) {
        if (!empty($reviewItem->balasan_perusahaan)) {
            $totalBalasan++;
        }
    }
@endphp

@extends('admin.layouts.app')

@section('content')

    {{-- HEADER --}}
    <div class="relative overflow-hidden bg-gradient-to-r from-red-700 via-primary to-red-900 rounded-[30px] shadow-glow p-7 md:p-8 mb-7 text-white">

        <div class="absolute -right-20 -top-20 w-60 h-60 bg-white/10 rounded-full"></div>
        <div class="absolute right-36 -bottom-28 w-72 h-72 bg-white/10 rounded-full"></div>

        <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-5">

            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-2xl bg-white/15 border border-white/20 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8 text-white"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 3l2.7 5.47 6.03.88-4.36 4.25 1.03 6L12 16.76 6.6 19.6l1.03-6-4.36-4.25 6.03-.88L12 3z" />
                    </svg>
                </div>

                <div>
                    <h1 class="text-3xl md:text-4xl font-black tracking-wide">
                        Manage Review
                    </h1>

                    <p class="mt-2 text-white/90 font-medium">
                        Kelola review perusahaan dari user dan balas ulasan yang masuk.
                    </p>
                </div>
            </div>

        </div>

    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl mb-6 shadow-soft font-bold flex items-center gap-3">

            <div class="w-10 h-10 rounded-xl bg-green-100 text-green-600 flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <span>
                {{ session('success') }}
            </span>

        </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl mb-6 shadow-soft">

            <div class="flex items-start gap-3">
                <div class="w-10 h-10 rounded-xl bg-red-100 text-red-600 flex items-center justify-center shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                    </svg>
                </div>

                <div>
                    <h3 class="font-black mb-1">
                        Ada data yang belum sesuai
                    </h3>

                    <ul class="list-disc list-inside text-sm">
                        @foreach($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    @endif

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-7">

        <div class="bg-white rounded-[28px] shadow-soft p-6 border border-slate-100 relative overflow-hidden hover:-translate-y-1 hover:shadow-lg transition">
            <div class="absolute right-0 top-0 w-28 h-28 bg-red-50 rounded-bl-[60px]"></div>

            <div class="relative z-10 flex items-center justify-between">

                <div>
                    <h2 class="text-slate-500 text-sm font-semibold">
                        Total Review
                    </h2>

                    <p class="text-4xl font-black text-red-600 mt-2">
                        {{ $reviews->count() }}
                    </p>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 3l2.7 5.47 6.03.88-4.36 4.25 1.03 6L12 16.76 6.6 19.6l1.03-6-4.36-4.25 6.03-.88L12 3z" />
                    </svg>
                </div>

            </div>
        </div>

        <div class="bg-white rounded-[28px] shadow-soft p-6 border border-slate-100 relative overflow-hidden hover:-translate-y-1 hover:shadow-lg transition">
            <div class="absolute right-0 top-0 w-28 h-28 bg-yellow-50 rounded-bl-[60px]"></div>

            <div class="relative z-10 flex items-center justify-between">

                <div>
                    <h2 class="text-slate-500 text-sm font-semibold">
                        Rata-rata Rating
                    </h2>

                    <p class="text-4xl font-black text-yellow-500 mt-2">
                        {{ number_format($reviews->avg('rating') ?? 0, 1) }}
                    </p>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-yellow-100 text-yellow-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 19V9m5 10V5m5 14v-7m5 7V3" />
                    </svg>
                </div>

            </div>
        </div>

        <div class="bg-white rounded-[28px] shadow-soft p-6 border border-slate-100 relative overflow-hidden hover:-translate-y-1 hover:shadow-lg transition">
            <div class="absolute right-0 top-0 w-28 h-28 bg-orange-50 rounded-bl-[60px]"></div>

            <div class="relative z-10 flex items-center justify-between">

                <div>
                    <h2 class="text-slate-500 text-sm font-semibold">
                        Sudah Dibalas
                    </h2>

                    <p class="text-4xl font-black text-orange-500 mt-2">
                        {{ $totalBalasan }}
                    </p>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M7 8h10M7 12h6m-9 8l3.5-3.5H17a4 4 0 004-4V7a4 4 0 00-4-4H7a4 4 0 00-4 4v5.5a4 4 0 004 4h.5L4 20z" />
                    </svg>
                </div>

            </div>
        </div>

    </div>

    {{-- TABLE CARD --}}
    <div class="bg-white rounded-[30px] shadow-soft overflow-hidden border border-slate-100 max-w-full">

        <div class="px-7 py-6 border-b border-slate-100 bg-white flex flex-col md:flex-row md:items-center md:justify-between gap-3">

            <div>
                <h2 class="text-2xl font-black text-gray-800">
                    Daftar Review
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Semua review perusahaan yang dikirim oleh user.
                </p>
            </div>

            <div class="inline-flex items-center gap-2 bg-red-50 text-red-600 px-4 py-2 rounded-2xl text-sm font-black">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-4 h-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 3l2.7 5.47 6.03.88-4.36 4.25 1.03 6L12 16.76 6.6 19.6l1.03-6-4.36-4.25 6.03-.88L12 3z" />
                </svg>

                {{ $reviews->count() }} Data Review
            </div>

        </div>

        <div class="w-full max-w-full overflow-x-auto overflow-y-hidden">

            <table class="w-full min-w-[1350px]">

                <thead class="bg-red-50 text-red-600">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wide font-black">Reviewer</th>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wide font-black">Perusahaan</th>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wide font-black">Rating</th>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wide font-black">Ulasan</th>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wide font-black">Balasan</th>
                        <th class="px-6 py-4 text-center text-xs uppercase tracking-wide font-black">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($reviews as $review)

                        <tr class="hover:bg-red-50/40 transition align-top">

                            {{-- REVIEWER --}}
                            <td class="px-6 py-5">

                                <div class="flex items-start gap-3">

                                    <div class="w-11 h-11 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center font-black text-lg shrink-0">
                                        {{ strtoupper(substr($review->nama ?? 'A', 0, 1)) }}
                                    </div>

                                    <div class="min-w-[160px]">
                                        <div class="font-black text-gray-800">
                                            {{ $review->nama }}
                                        </div>

                                        <div class="text-sm text-gray-500 mt-1">
                                            {{ $review->posisi ?? '-' }}
                                        </div>

                                        <div class="text-xs text-gray-400 mt-1">
                                            {{ $review->created_at ? $review->created_at->format('d M Y') : '-' }}
                                        </div>
                                    </div>

                                </div>

                            </td>

                            {{-- PERUSAHAAN --}}
                            <td class="px-6 py-5">

                                <span class="inline-block bg-red-50 text-red-600 px-3 py-2 rounded-full text-sm font-bold">
                                    {{ $review->perusahaan->nama_perusahaan
                                        ?? $review->perusahaan->nama
                                        ?? $review->perusahaan->name
                                        ?? '-' }}
                                </span>

                            </td>

                            {{-- RATING --}}
                            <td class="px-6 py-5">

                                <span class="inline-flex items-center gap-2 bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-black">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-4 h-4 fill-current"
                                        viewBox="0 0 24 24">

                                        <path d="M12 2.5l2.9 5.88 6.49.94-4.69 4.57 1.11 6.46L12 17.3l-5.81 3.05 1.11-6.46-4.69-4.57 6.49-.94L12 2.5z" />
                                    </svg>

                                    {{ number_format($review->rating, 1) }}
                                </span>

                                <div class="mt-3 space-y-2 text-xs text-gray-500 min-w-[130px]">

                                    <div class="flex justify-between gap-4">
                                        <span>Gaji</span>
                                        <span class="font-bold text-gray-700">
                                            {{ $review->rating_gaji ?? '-' }}
                                        </span>
                                    </div>

                                    <div class="flex justify-between gap-4">
                                        <span>Kultur</span>
                                        <span class="font-bold text-gray-700">
                                            {{ $review->rating_kultur ?? '-' }}
                                        </span>
                                    </div>

                                    <div class="flex justify-between gap-4">
                                        <span>Fasilitas</span>
                                        <span class="font-bold text-gray-700">
                                            {{ $review->rating_fasilitas ?? '-' }}
                                        </span>
                                    </div>

                                </div>

                            </td>

                            {{-- ULASAN --}}
                            <td class="px-6 py-5 max-w-sm">

                                <div class="bg-gray-50 border border-gray-100 rounded-2xl p-4 min-w-[260px]">
                                    <p class="text-sm text-gray-700 leading-relaxed">
                                        {{ $review->ulasan }}
                                    </p>
                                </div>

                            </td>

                            {{-- BALASAN --}}
                            <td class="px-6 py-5 max-w-md">

                                <div class="min-w-[300px]">

                                    @if($review->balasan_perusahaan)
                                        <div class="bg-green-50 border border-green-200 text-green-700 p-4 rounded-2xl text-sm mb-3 leading-relaxed">
                                            {{ $review->balasan_perusahaan }}
                                        </div>
                                    @else
                                        <div class="bg-gray-100 text-gray-500 p-4 rounded-2xl text-sm mb-3">
                                            Belum ada balasan.
                                        </div>
                                    @endif

                                    <form action="{{ route('admin.review.reply', $review->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <textarea name="balasan_perusahaan"
                                            rows="3"
                                            placeholder="Tulis balasan perusahaan..."
                                            class="w-full border border-gray-200 rounded-2xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-400 resize-none">{{ old('balasan_perusahaan', $review->balasan_perusahaan) }}</textarea>

                                        <button type="submit"
                                            class="mt-2 w-full inline-flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white px-4 py-2.5 rounded-xl text-sm font-black shadow transition">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M3 10l18-7-7 18-2.5-7.5L3 10z" />
                                            </svg>

                                            Kirim Balasan
                                        </button>
                                    </form>

                                </div>

                            </td>

                            {{-- AKSI --}}
                            <td class="px-6 py-5">

                                <div class="flex flex-col items-center gap-2 min-w-[150px]">

                                    <a href="{{ route('admin.review.edit', $review->id) }}"
                                        class="w-full inline-flex items-center justify-center gap-2 bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-4 py-2 rounded-xl text-sm font-black transition">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15.232 5.232l3.536 3.536M4 20h4l10.5-10.5a2.5 2.5 0 10-3.536-3.536L4 16.928V20z" />
                                        </svg>

                                        Edit
                                    </a>

                                    <form action="{{ route('admin.review.destroy', $review->id) }}"
                                        method="POST"
                                        class="w-full"
                                        onsubmit="return confirm('Yakin ingin menghapus review ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="w-full inline-flex items-center justify-center gap-2 bg-red-100 hover:bg-red-200 text-red-600 px-4 py-2 rounded-xl text-sm font-black transition">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M6 7h12M9 7V5a1 1 0 011-1h4a1 1 0 011 1v2m-8 0l1 13h8l1-13M10 11v6m4-6v6" />
                                            </svg>

                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">

                                <div class="max-w-md mx-auto">

                                    <div class="w-20 h-20 bg-red-100 text-red-600 rounded-3xl flex items-center justify-center mx-auto mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-10 h-10"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M12 3l2.7 5.47 6.03.88-4.36 4.25 1.03 6L12 16.76 6.6 19.6l1.03-6-4.36-4.25 6.03-.88L12 3z" />
                                        </svg>
                                    </div>

                                    <h3 class="text-2xl font-black text-gray-800">
                                        Belum ada data review
                                    </h3>

                                    <p class="text-gray-500 mt-2">
                                        Data review perusahaan dari user belum tersedia.
                                    </p>

                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection