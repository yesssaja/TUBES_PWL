@extends('users.layouts.app')

@section('title', 'Home - Loker Seeker')

@section('content')

<!-- HERO -->
<section class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-12 items-center">
    <div>
        <p class="text-red-600 font-black tracking-[6px] uppercase mb-4">
            Platform Lowongan Kerja
        </p>

        <h2 class="text-6xl font-black text-slate-900 leading-tight mb-6">
            Cari <span class="text-red-600">Pekerjaan</span><br>
            Impianmu
        </h2>

        <p class="text-gray-700 text-lg mb-8 max-w-xl">
            Temukan lowongan kerja terbaik berdasarkan skill, lokasi, dan minatmu bersama Loker Seeker.
        </p>

        <div class="flex gap-4">
            <a href="#loker"
               class="bg-red-600 text-white px-8 py-4 rounded-2xl font-bold shadow-xl hover:bg-red-700 transition">
                Cari Loker
            </a>

            <a href="{{ route('groups.index') }}"
               class="bg-white text-slate-900 px-8 py-4 rounded-2xl font-bold shadow-xl hover:scale-105 transition">
                Gabung Group
            </a>
        </div>
    </div>

    <div class="bg-white rounded-[36px] p-6 shadow-2xl">
        <div class="bg-red-600 text-white rounded-[28px] p-8">
            <p class="text-sm uppercase tracking-[4px] mb-4">
                Loker Terbaru
            </p>

            <h3 class="text-4xl font-black mb-4">
                {{ isset($lokers) && $lokers->count() > 0 ? $lokers->first()->judul_loker : 'Backend Developer' }}
            </h3>

            <p class="mb-6">
                @if(isset($lokers) && $lokers->count() > 0)
                    {{ $lokers->first()->perusahaan->nama_perusahaan ?? 'Perusahaan' }} •
                    {{ $lokers->first()->lokasi ?? '-' }} •
                    {{ $lokers->first()->tipe_pekerjaan ?? '-' }}
                @else
                    PT Shopee Indonesia • Bandung • Full Time
                @endif
            </p>

            @if(isset($lokers) && $lokers->count() > 0)
                <a href="{{ route('detail.loker', $lokers->first()->id) }}"
                   class="inline-block bg-white text-red-600 px-6 py-3 rounded-2xl font-bold">
                    Lihat Detail
                </a>
            @else
                <a href="{{ route('loker.index') }}"
                   class="inline-block bg-white text-red-600 px-6 py-3 rounded-2xl font-bold">
                    Lihat Detail
                </a>
            @endif
        </div>
    </div>
</section>

<!-- MITRA -->
<section class="max-w-7xl mx-auto px-6 py-12">

    <h2 class="text-4xl font-black text-center text-slate-900 mb-10">
        Mitra <span class="text-red-600">Kerjasama</span>
    </h2>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

        <div class="bg-white p-6 rounded-3xl shadow-xl text-center hover:scale-105 transition">
            <img src="{{ asset('images/shopee.png') }}"
                 alt="Shopee"
                 class="w-20 h-20 object-contain mx-auto mb-3">

            <p class="font-black">Shopee</p>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-xl text-center hover:scale-105 transition">
            <img src="{{ asset('images/tokopedia.png') }}"
                 alt="Tokopedia"
                 class="w-20 h-20 object-contain mx-auto mb-3">

            <p class="font-black">Tokopedia</p>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-xl text-center hover:scale-105 transition">
            <img src="{{ asset('images/lazada.png') }}"
                 alt="Lazada"
                 class="w-20 h-20 object-contain mx-auto mb-3">

            <p class="font-black">Lazada</p>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-xl text-center hover:scale-105 transition">
            <img src="{{ asset('images/blibli.png') }}"
                 alt="Blibli"
                 class="w-20 h-20 object-contain mx-auto mb-3">

            <p class="font-black">Blibli</p>
        </div>

    </div>
</section>

<!-- KATEGORI -->
<section class="max-w-7xl mx-auto px-6 py-12">

    <h2 class="text-4xl font-black text-center text-slate-900 mb-10">
        Kategori <span class="text-red-600">Loker</span>
    </h2>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

        <a href="#loker"
           class="bg-red-600 text-white p-8 rounded-3xl text-center font-bold shadow-xl block hover:bg-red-700 transition">
           💻 Programmer
        </a>

        <a href="#loker"
           class="bg-red-600 text-white p-8 rounded-3xl text-center font-bold shadow-xl block hover:bg-red-700 transition">
           🎨 UI/UX
        </a>

        <a href="#loker"
           class="bg-red-600 text-white p-8 rounded-3xl text-center font-bold shadow-xl block hover:bg-red-700 transition">
           📈 Marketing
        </a>

        <a href="#loker"
           class="bg-red-600 text-white p-8 rounded-3xl text-center font-bold shadow-xl block hover:bg-red-700 transition">
           🎥 Content Creator
        </a>

    </div>
</section>

<!-- LOKER POPULER -->
<section id="loker" class="max-w-7xl mx-auto px-6 py-12">

    <h2 class="text-4xl font-black text-center text-slate-900 mb-10">
        Loker <span class="text-red-600">Populer</span>
    </h2>

    <div class="grid md:grid-cols-3 gap-6">

       @forelse($lokers as $loker)

    @php
        $gambarLoker = match($loop->iteration) {
            1 => 'images/backend.png',
            2 => 'images/uiux.png',
            3 => 'images/marketing.png',
            default => 'images/backend.png',
        };
    @endphp

    <div class="bg-white p-8 rounded-3xl shadow-xl text-center hover:scale-105 transition">

        <img src="{{ asset($gambarLoker) }}"
             alt="{{ $loker->judul_loker }}"
             class="w-40 h-40 object-contain mx-auto mb-4">

        <h3 class="text-2xl font-black text-slate-900">
            {{ $loker->judul_loker }}
        </h3>

        <p class="text-gray-600 mt-2">
            {{ $loker->perusahaan->nama_perusahaan ?? 'Perusahaan' }}
        </p>

        <p class="text-gray-500 mt-1">
            📍 {{ $loker->lokasi ?? '-' }}
        </p>


        <a href="{{ route('detail.loker', $loker->id) }}"
           class="inline-block mt-6 bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-2xl font-bold shadow-lg transition">
            Detail
        </a>

    </div>

@empty

            <div class="md:col-span-3 bg-white p-8 rounded-3xl shadow-xl text-center">
                <h3 class="text-2xl font-black text-slate-900">
                    Belum ada lowongan
                </h3>

                <p class="text-gray-600 mt-2">
                    Silakan jalankan seeder terlebih dahulu.
                </p>
            </div>

        @endforelse

    </div>
</section>

<!-- INFO PELAMAR -->
<section class="max-w-7xl mx-auto px-6 py-12">

    <h2 class="text-4xl font-black text-center text-slate-900 mb-10">
        Info <span class="text-red-600">Pelamar</span>
    </h2>

    <div class="grid md:grid-cols-3 gap-6">

        <div class="bg-white p-8 rounded-3xl shadow-xl text-center">
            <h3 class="text-5xl font-black text-red-600">
                120+
            </h3>

            <p class="font-bold mt-2">
                Pelamar Mendaftar
            </p>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-xl text-center">
            <h3 class="text-5xl font-black text-red-600">
                45
            </h3>

            <p class="font-bold mt-2">
                Pelamar Diterima
            </p>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-xl text-center">
            <h3 class="text-5xl font-black text-red-600">
                20
            </h3>

            <p class="font-bold mt-2">
                Pelamar Ditolak
            </p>
        </div>

    </div>
</section>

@endsection