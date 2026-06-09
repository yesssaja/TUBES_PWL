@extends('users.layouts.app')

@section('title', 'Hasil Pencarian')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

    <h1 class="text-4xl font-black mb-2">
        Hasil Pencarian
    </h1>

    <p class="text-gray-500 mb-8">
        Kata kunci:
        <span class="font-bold text-red-600">
            {{ $keyword }}
        </span>
    </p>

    @php
        $total =
            $lokers->count() +
            $perusahaans->count() +
            $events->count() +
            $groups->count();
    @endphp

    @if($total == 0)

        <div class="bg-red-100 border border-red-300 text-red-700 px-6 py-5 rounded-2xl shadow">

            <div class="flex items-center gap-3">

                <span class="text-3xl">
                    ⚠️
                </span>

                <div>
                    <h3 class="font-black text-lg">
                        Data Tidak Ditemukan
                    </h3>

                    <p>
                        Tidak ada hasil pencarian untuk
                        <strong>"{{ $keyword }}"</strong>.
                    </p>
                </div>

            </div>

        </div>

    @else

        {{-- LOWONGAN --}}
        @if($lokers->count())
            <h2 class="text-2xl font-black mt-8 mb-4">
                Lowongan
            </h2>

            @foreach($lokers as $loker)
                <div class="bg-white p-4 rounded-xl shadow mb-3">
                    {{ $loker->judul_loker }}
                </div>
            @endforeach
        @endif

        {{-- PERUSAHAAN --}}
        @if($perusahaans->count())
            <h2 class="text-2xl font-black mt-8 mb-4">
                Perusahaan
            </h2>

            @foreach($perusahaans as $perusahaan)
                <div class="bg-white p-4 rounded-xl shadow mb-3">
                    {{ $perusahaan->nama_perusahaan }}
                </div>
            @endforeach
        @endif

        {{-- EVENT --}}
        @if($events->count())
            <h2 class="text-2xl font-black mt-8 mb-4">
                Event
            </h2>

            @foreach($events as $event)
                <div class="bg-white p-4 rounded-xl shadow mb-3">
                    {{ $event->title }}
                </div>
            @endforeach
        @endif

        {{-- GROUP --}}
        @if($groups->count())
            <h2 class="text-2xl font-black mt-8 mb-4">
                Group
            </h2>

            @foreach($groups as $group)
                <div class="bg-white p-4 rounded-xl shadow mb-3">
                    {{ $group->name }}
                </div>
            @endforeach
        @endif

    @endif

</div>

@endsection