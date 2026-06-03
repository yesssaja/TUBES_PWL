@extends('users.group.layouts.app')

@section('title', 'Halaman Group')

@section('content')

<section class="max-w-7xl mx-auto px-6 py-14">

    <p class="text-red-600 font-black tracking-[6px] uppercase mb-4">
        Komunitas Pencari Kerja
    </p>

    <h1 class="text-6xl font-black text-slate-900 leading-tight">
        Temukan <span class="text-red-600">Group</span><br>
        Sesuai Minatmu
    </h1>

    <p class="text-gray-700 mt-6 text-lg max-w-2xl">
        Bergabung dengan komunitas pencari kerja terbaik untuk berbagi informasi,
        pengalaman, dan peluang karir terbaru.
    </p>

    <div class="mt-8">
        <a href="{{ route('groups.create') }}"
           class="bg-red-600 hover:bg-red-700 text-white font-black px-6 py-3 rounded-2xl shadow-lg inline-block">
            + Buat Group
        </a>
    </div>

</section>

<section class="max-w-7xl mx-auto px-6 pb-16">

    <div class="grid md:grid-cols-3 gap-8">

        @forelse($groups as $group)

            <a href="{{ route('join_group', $group->slug) }}"
               class="bg-white rounded-[30px] p-8 shadow-xl hover:scale-105 transition block">

                <div class="bg-red-600 text-white w-20 h-20 rounded-3xl flex items-center justify-center text-4xl font-black">
                    {{ $group->icon_letter ?? strtoupper(substr($group->name, 0, 1)) }}
                </div>

                <h2 class="text-3xl font-black text-slate-900 mt-6">
                    {{ $group->name }}
                </h2>

                <p class="text-gray-600 mt-3">
                    {{ $group->description }}
                </p>

                <div class="mt-5 text-sm text-gray-500 font-bold">
                    👥 {{ $group->members_count ?? 0 }} Member
                </div>

                <div class="mt-6 bg-red-600 hover:bg-red-700 transition text-white font-black px-6 py-3 rounded-2xl shadow-lg inline-block">
                    Join Group
                </div>

            </a>

        @empty

            <div class="md:col-span-3 bg-white rounded-3xl p-10 text-center shadow-xl">
                <h2 class="text-2xl font-black text-slate-900">
                    Belum ada group
                </h2>

                <p class="text-gray-600 mt-3">
                    Data group belum tersedia. Silakan jalankan seeder atau tambahkan group dari admin.
                </p>
            </div>

        @endforelse

    </div>

</section>

@endsection