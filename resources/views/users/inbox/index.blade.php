@extends('users.layouts.app')

@section('title', 'Inbox')

@section('content')
<x-inbox-layout>

    <section class="min-h-screen bg-gradient-to-br from-[#FFF7E8] via-white to-red-50 px-4 sm:px-6 py-10">

        <div class="max-w-6xl mx-auto">

            {{-- HEADER --}}
            <div class="relative overflow-hidden bg-gradient-to-br from-red-600 via-orange-500 to-yellow-400 rounded-[32px] shadow-2xl p-6 md:p-8 mb-8 text-white">

                <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/20 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-red-900/20 rounded-full blur-3xl"></div>

                <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-5">

                    <div>
                        <span class="inline-flex items-center gap-2 bg-white/20 border border-white/30 px-4 py-2 rounded-full text-xs font-black uppercase tracking-wider mb-4">
                            📬 Pusat Notifikasi
                        </span>

                        <h1 class="text-3xl md:text-5xl font-black leading-tight">
                            Inbox
                        </h1>

                        <p class="mt-2 text-white/90 max-w-2xl">
                            Lihat pemberitahuan RSVP, lamaran kerja, course, dan review kamu di sini.
                        </p>
                    </div>

                    <a href="{{ route('index') }}"
                       class="inline-flex items-center justify-center bg-white/20 hover:bg-white/30 text-white font-black px-5 py-3 rounded-2xl shadow transition no-underline">
                        ← Home
                    </a>

                </div>

            </div>

            {{-- ALERT --}}
            @if (session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl mb-6 shadow-sm font-semibold">
                     {{ session('success') }}
                </div>
            @endif

            {{-- STATISTIK --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">

                <div class="bg-white rounded-[28px] shadow-lg p-6 border border-red-100">
                    <p class="text-gray-400 text-sm font-black uppercase tracking-wide">
                        Total Pesan
                    </p>

                    <p class="text-4xl font-black text-red-600 mt-3">
                        {{ $inboxes->count() }}
                    </p>
                </div>

                <div class="bg-white rounded-[28px] shadow-lg p-6 border border-yellow-100">
                    <p class="text-gray-400 text-sm font-black uppercase tracking-wide">
                        Belum Dibaca
                    </p>

                    <p class="text-4xl font-black text-yellow-500 mt-3">
                        {{ $inboxes->where('is_read', false)->count() }}
                    </p>
                </div>

                <div class="bg-white rounded-[28px] shadow-lg p-6 border border-green-100">
                    <p class="text-gray-400 text-sm font-black uppercase tracking-wide">
                        Sudah Dibaca
                    </p>

                    <p class="text-4xl font-black text-green-600 mt-3">
                        {{ $inboxes->where('is_read', true)->count() }}
                    </p>
                </div>

            </div>

            {{-- ACTION --}}
            @if($inboxes->count() > 0)
                <div class="mb-6 flex justify-end">
                    <form action="{{ route('inbox.readAll') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <button type="submit"
                                class="bg-[#2A050A] hover:bg-black text-white px-5 py-3 rounded-2xl font-black shadow transition">
                            Tandai Semua Dibaca
                        </button>
                    </form>
                </div>
            @endif

            {{-- LIST --}}
            <div class="space-y-5">

                @forelse($inboxes as $inbox)

                    <div class="bg-white rounded-[30px] shadow-lg border overflow-hidden transition hover:-translate-y-1 hover:shadow-2xl
                                {{ $inbox->is_read ? 'border-gray-100' : 'border-yellow-300 ring-4 ring-yellow-100/70' }}">

                        <div class="p-5 md:p-6">

                            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-5">

                                {{-- CONTENT --}}
                                <div class="flex-1 min-w-0">

                                    {{-- BADGE --}}
                                    <div class="flex flex-wrap items-center gap-2 mb-4">

                                        @if ($inbox->type === 'rsvp_user')
                                            <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-black">
                                                RSVP Berhasil
                                            </span>

                                        @elseif ($inbox->type === 'rsvp_approved')
                                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-black">
                                                RSVP Diterima
                                            </span>

                                        @elseif ($inbox->type === 'rsvp_rejected')
                                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-black">
                                                RSVP Ditolak
                                            </span>

                                        @elseif ($inbox->type === 'lamaran_diterima')
                                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-black">
                                                Lamaran Diterima
                                            </span>

                                        @elseif ($inbox->type === 'lamaran_ditolak')
                                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-black">
                                                Lamaran Ditolak
                                            </span>

                                        @elseif ($inbox->type === 'course_payment_verified')
                                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-black">
                                                Pembayaran Course
                                            </span>

                                        @elseif ($inbox->type === 'course_payment_rejected')
                                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-black">
                                                Pembayaran Ditolak
                                            </span>

                                        @elseif ($inbox->type === 'course_approved')
                                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-black">
                                                Course Disetujui
                                            </span>

                                        @elseif ($inbox->type === 'course_rejected')
                                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-black">
                                                Course Ditolak
                                            </span>

                                        @elseif ($inbox->type === 'review')
                                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-black">
                                                Balasan Review
                                            </span>

                                        @else
                                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-black">
                                                Informasi
                                            </span>
                                        @endif

                                        @if (!$inbox->is_read)
                                            <span class="bg-yellow-400 text-[#2A050A] px-3 py-1 rounded-full text-xs font-black">
                                                Baru
                                            </span>
                                        @endif

                                    </div>

                                    {{-- TITLE --}}
                                    <h2 class="text-xl md:text-2xl font-black text-gray-900 break-words">
                                        {{ $inbox->title ?? 'Tanpa Judul' }}
                                    </h2>

                                    {{-- MESSAGE --}}
                                    <p class="text-gray-600 mt-3 leading-relaxed break-words">
                                        {{ $inbox->message ?? 'Tidak ada isi pesan.' }}
                                    </p>

                                    {{-- ACTION BUTTON --}}
                                    <div class="mt-5 flex flex-wrap gap-3">

                                        @if ($inbox->type === 'rsvp_rejected')
                                            <div class="inline-flex items-center justify-center bg-red-50 border border-red-200 text-red-700 px-5 py-3 rounded-2xl text-sm font-black">
                                                Akses Grup WA Tidak Tersedia
                                            </div>
                                        @elseif (!empty($inbox->action_url) && !empty($inbox->action_text))
                                            <a href="{{ $inbox->action_url }}"
                                               class="inline-flex items-center justify-center bg-yellow-400 hover:bg-yellow-500 text-[#2A050A] px-5 py-3 rounded-2xl text-sm font-black shadow transition no-underline">
                                                {{ $inbox->action_text }}
                                            </a>
                                        @endif

                                    </div>

                                    {{-- DATE --}}
                                    <p class="text-sm text-gray-400 mt-4 font-medium">
                                        {{ $inbox->created_at ? $inbox->created_at->format('d M Y H:i') : '-' }}
                                    </p>

                                </div>

                                {{-- STATUS BUTTON --}}
                                <div class="lg:w-44 flex lg:justify-end">

                                    @if (!$inbox->is_read)
                                        <form action="{{ route('inbox.read', $inbox->id) }}"
                                              method="POST"
                                              class="w-full lg:w-auto">
                                            @csrf
                                            @method('PUT')

                                            <button type="submit"
                                                    class="w-full lg:w-auto bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-2xl text-sm font-black shadow transition">
                                                Tandai Dibaca
                                            </button>
                                        </form>
                                    @else
                                        <span class="w-full lg:w-auto text-center bg-gray-100 text-gray-500 px-5 py-3 rounded-2xl text-sm font-black">
                                            Dibaca
                                        </span>
                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="bg-white rounded-[32px] shadow-xl p-10 md:p-12 text-center border border-gray-100">
                        <div class="w-20 h-20 bg-red-100 text-red-600 rounded-3xl flex items-center justify-center text-4xl mx-auto mb-4">
                            📬
                        </div>

                        <h3 class="text-2xl font-black text-gray-800">
                            Inbox masih kosong
                        </h3>

                        <p class="text-gray-500 mt-2">
                            Belum ada pemberitahuan RSVP, lamaran, course, atau review.
                        </p>
                    </div>

                @endforelse

            </div>

        </div>

    </section>

</x-inbox-layout>
@endsection