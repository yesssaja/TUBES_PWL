@extends('perusahaan.layouts.app')

@section('title', 'Lamaran Masuk')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- HEADER --}}
    <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-red-600 via-orange-500 to-yellow-400 p-6 sm:p-8 mb-8 shadow-xl">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/20 rounded-full blur-2xl"></div>
        <div class="absolute -left-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>

        <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-5">
            <div>
                <p class="text-white/80 font-semibold mb-2">
                    Dashboard Perusahaan
                </p>

                <h1 class="text-3xl sm:text-4xl font-black text-white">
                    Lamaran Masuk
                </h1>

                <p class="text-white/90 mt-3 text-base sm:text-lg max-w-2xl">
                    Kelola kandidat yang melamar lowongan perusahaan Anda.
                </p>
            </div>

            <div class="bg-white/20 backdrop-blur rounded-3xl px-6 py-4 border border-white/30 text-white">
                <p class="text-sm text-white/80">Total Lamaran</p>
                <p class="text-3xl font-black">{{ $lamarans->count() }}</p>
            </div>
        </div>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl font-semibold shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- DESKTOP TABLE --}}
    <div class="hidden lg:block bg-white rounded-[2rem] shadow-xl border border-gray-100 overflow-hidden">

        <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-white">
            <div>
                <h2 class="text-2xl font-black text-gray-800">
                    Daftar Pelamar
                </h2>
                <p class="text-gray-500 mt-1">
                    Data lamaran yang masuk berdasarkan lowongan perusahaan.
                </p>
            </div>
        </div>

        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider">Pelamar</th>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider">Lowongan</th>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider">Dokumen</th>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @forelse ($lamarans as $lamaran)

                    @php
                        $namaPelamar = $lamaran->nama ?? $lamaran->pelamar->name ?? 'Pelamar';
                        $emailPelamar = $lamaran->email ?? $lamaran->pelamar->email ?? '-';

                        $foto = $lamaran->foto
                            ? asset('storage/' . $lamaran->foto)
                            : 'https://ui-avatars.com/api/?name=' . urlencode($namaPelamar) . '&background=fee2e2&color=dc2626&bold=true';
                    @endphp

                    <tr class="hover:bg-orange-50/40 transition">

                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                <img src="{{ $foto }}"
                                     class="w-14 h-14 rounded-2xl object-cover shadow border border-gray-100">

                                <div class="min-w-0">
                                    <h3 class="font-black text-gray-800 text-base truncate">
                                        {{ $namaPelamar }}
                                    </h3>
                                    <p class="text-gray-500 text-sm truncate max-w-[220px]">
                                        {{ $emailPelamar }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-5">
                            <h3 class="font-bold text-gray-800">
                                {{ $lamaran->loker->judul_loker ?? '-' }}
                            </h3>
                            <p class="text-sm text-gray-500 mt-1">
                                Dikirim {{ $lamaran->created_at ? $lamaran->created_at->format('d M Y') : '-' }}
                            </p>
                        </td>

                        <td class="px-6 py-5">
                            <div class="flex flex-col gap-2">
                                @if($lamaran->cv)
                                    <a href="{{ asset('storage/' . $lamaran->cv) }}"
                                       target="_blank"
                                       class="inline-flex justify-center bg-blue-50 text-blue-600 px-4 py-2 rounded-xl font-bold hover:bg-blue-100 transition">
                                        Lihat CV
                                    </a>
                                @else
                                    <span class="inline-flex justify-center bg-gray-100 text-gray-400 px-4 py-2 rounded-xl font-bold">
                                        CV -
                                    </span>
                                @endif

                                @if($lamaran->portfolio)
                                    <a href="{{ $lamaran->portfolio }}"
                                       target="_blank"
                                       class="inline-flex justify-center bg-purple-50 text-purple-600 px-4 py-2 rounded-xl font-bold hover:bg-purple-100 transition">
                                        Portfolio
                                    </a>
                                @else
                                    <span class="inline-flex justify-center bg-gray-100 text-gray-400 px-4 py-2 rounded-xl font-bold">
                                        Portfolio -
                                    </span>
                                @endif
                            </div>
                        </td>

                        <td class="px-6 py-5">
                            @if($lamaran->status_lamaran == 'diterima')
                                <span class="inline-flex bg-green-50 text-green-700 border border-green-200 px-4 py-2 rounded-full text-sm font-black">
                                    Diterima
                                </span>
                            @elseif($lamaran->status_lamaran == 'ditolak')
                                <span class="inline-flex bg-red-50 text-red-700 border border-red-200 px-4 py-2 rounded-full text-sm font-black">
                                    Ditolak
                                </span>
                            @else
                                <span class="inline-flex bg-yellow-50 text-yellow-700 border border-yellow-200 px-4 py-2 rounded-full text-sm font-black">
                                    Pending
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-5">
                            <div class="flex flex-col gap-2 items-center">

                                <a href="{{ route('perusahaan.lamaran.show', ['id' => $lamaran->id]) }}"
                                   class="w-32 text-center bg-red-600 hover:bg-red-700 text-white px-4 py-2.5 rounded-xl font-black shadow transition">
                                    Detail
                                </a>

                                @if($lamaran->status_lamaran == 'pending')
                                    <form action="{{ route('perusahaan.lamaran.approve', ['id' => $lamaran->id]) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menerima lamaran ini?')">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit"
                                                class="w-32 bg-green-600 hover:bg-green-700 text-white px-4 py-2.5 rounded-xl font-black shadow transition">
                                            Terima
                                        </button>
                                    </form>

                                    <form action="{{ route('perusahaan.lamaran.reject', ['id' => $lamaran->id]) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menolak lamaran ini?')">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit"
                                                class="w-32 bg-gray-800 hover:bg-gray-900 text-white px-4 py-2.5 rounded-xl font-black shadow transition">
                                            Tolak
                                        </button>
                                    </form>
                                @endif

                            </div>
                        </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="p-14 text-center">
                            <div class="max-w-md mx-auto">
                                <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
                                    📄
                                </div>
                                <h3 class="text-xl font-black text-gray-700">
                                    Belum ada lamaran masuk
                                </h3>
                                <p class="text-gray-500 mt-2">
                                    Lamaran dari pelamar akan tampil di halaman ini.
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- MOBILE CARD --}}
    <div class="lg:hidden space-y-5">
        @forelse ($lamarans as $lamaran)

            @php
                $namaPelamar = $lamaran->nama ?? $lamaran->pelamar->name ?? 'Pelamar';
                $emailPelamar = $lamaran->email ?? $lamaran->pelamar->email ?? '-';

                $foto = $lamaran->foto
                    ? asset('storage/' . $lamaran->foto)
                    : 'https://ui-avatars.com/api/?name=' . urlencode($namaPelamar) . '&background=fee2e2&color=dc2626&bold=true';
            @endphp

            <div class="bg-white border border-gray-100 rounded-[2rem] p-5 shadow-lg">

                <div class="flex items-start gap-4">
                    <img src="{{ $foto }}"
                         class="w-16 h-16 rounded-2xl object-cover shadow border border-gray-100">

                    <div class="flex-1 min-w-0">
                        <h3 class="font-black text-gray-800 text-lg break-words">
                            {{ $namaPelamar }}
                        </h3>
                        <p class="text-gray-500 text-sm break-all">
                            {{ $emailPelamar }}
                        </p>
                    </div>
                </div>

                <div class="mt-5 bg-gray-50 rounded-3xl p-4 space-y-4">
                    <div>
                        <p class="text-xs text-gray-400 font-black uppercase tracking-wide">Lowongan</p>
                        <p class="font-bold text-gray-800 mt-1">
                            {{ $lamaran->loker->judul_loker ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-400 font-black uppercase tracking-wide">Tanggal</p>
                        <p class="text-gray-700 mt-1">
                            {{ $lamaran->created_at ? $lamaran->created_at->format('d M Y') : '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-400 font-black uppercase tracking-wide">Status</p>
                        <div class="mt-2">
                            @if($lamaran->status_lamaran == 'diterima')
                                <span class="inline-flex bg-green-50 text-green-700 border border-green-200 px-4 py-2 rounded-full text-sm font-black">
                                    Diterima
                                </span>
                            @elseif($lamaran->status_lamaran == 'ditolak')
                                <span class="inline-flex bg-red-50 text-red-700 border border-red-200 px-4 py-2 rounded-full text-sm font-black">
                                    Ditolak
                                </span>
                            @else
                                <span class="inline-flex bg-yellow-50 text-yellow-700 border border-yellow-200 px-4 py-2 rounded-full text-sm font-black">
                                    Pending
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @if($lamaran->cv)
                        <a href="{{ asset('storage/' . $lamaran->cv) }}"
                           target="_blank"
                           class="text-center bg-blue-50 text-blue-600 px-4 py-3 rounded-xl font-black hover:bg-blue-100 transition">
                            Lihat CV
                        </a>
                    @else
                        <div class="text-center bg-gray-100 text-gray-400 px-4 py-3 rounded-xl font-black">
                            CV -
                        </div>
                    @endif

                  <a href="{{ Str::startsWith($lamaran->portfolio, ['http://','https://']) 
            ? $lamaran->portfolio 
            : 'https://' . $lamaran->portfolio }}"
   target="_blank"
   class="text-center bg-purple-50 text-purple-600 px-4 py-3 rounded-xl font-black hover:bg-purple-100 transition">
    Portfolio
</a>

                    <a href="{{ route('perusahaan.lamaran.show', ['id' => $lamaran->id]) }}"
                       class="text-center bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-xl font-black shadow transition">
                        Detail
                    </a>

                    @if($lamaran->status_lamaran == 'pending')
                        <form action="{{ route('perusahaan.lamaran.approve', ['id' => $lamaran->id]) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menerima lamaran ini?')">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                    class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-3 rounded-xl font-black shadow transition">
                                Terima
                            </button>
                        </form>

                        <form action="{{ route('perusahaan.lamaran.reject', ['id' => $lamaran->id]) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menolak lamaran ini?')">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                    class="w-full bg-gray-800 hover:bg-gray-900 text-white px-4 py-3 rounded-xl font-black shadow transition">
                                Tolak
                            </button>
                        </form>
                    @endif
                </div>
            </div>

        @empty
            <div class="bg-white p-10 text-center rounded-[2rem] shadow border border-gray-100">
                <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
                    📄
                </div>
                <h3 class="text-xl font-black text-gray-700">
                    Belum ada lamaran masuk
                </h3>
                <p class="text-gray-500 mt-2">
                    Lamaran dari pelamar akan tampil di halaman ini.
                </p>
            </div>
        @endforelse
    </div>

</div>

@endsection