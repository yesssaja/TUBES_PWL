@php($title = 'Manage RSVP')

@extends('admin.layouts.app')

@section('content')

    {{-- HEADER --}}
    <div class="relative overflow-hidden bg-gradient-to-r from-primary via-red-700 to-red-900 text-white rounded-[30px] shadow-glow p-8 mb-7">

        <div class="absolute -right-16 -top-16 w-52 h-52 bg-white/10 rounded-full"></div>
        <div class="absolute right-32 -bottom-24 w-64 h-64 bg-white/10 rounded-full"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

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
                            d="M3 8l9 6 9-6M5 6h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z" />
                    </svg>
                </div>

                <div>
                    <h1 class="text-4xl font-black tracking-wide">
                        Manage RSVP
                    </h1>

                    <p class="mt-1 text-white/90 font-medium">
                        Kelola peserta event yang melakukan RSVP.
                    </p>
                </div>
            </div>
        </div>

    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl mb-6 shadow-soft flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-green-100 text-green-600 flex items-center justify-center">
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

            <span class="font-semibold">
                {{ session('success') }}
            </span>
        </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl mb-6 shadow-soft flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-red-100 text-primary flex items-center justify-center">
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

            <span class="font-semibold">
                {{ session('error') }}
            </span>
        </div>
    @endif

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-7">

        <div class="bg-white rounded-[28px] shadow-soft p-6 border border-slate-100 relative overflow-hidden hover:-translate-y-1 hover:shadow-lg transition">
            <div class="absolute right-0 top-0 w-28 h-28 bg-red-50 rounded-bl-[60px]"></div>

            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <h2 class="text-slate-500 text-sm font-semibold">
                        Total RSVP
                    </h2>

                    <p class="text-4xl font-black text-primary mt-2">
                        {{ $rsvps->count() }}
                    </p>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-red-100 text-primary flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 8l9 6 9-6M5 6h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[28px] shadow-soft p-6 border border-slate-100 relative overflow-hidden hover:-translate-y-1 hover:shadow-lg transition">
            <div class="absolute right-0 top-0 w-28 h-28 bg-yellow-50 rounded-bl-[60px]"></div>

            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <h2 class="text-slate-500 text-sm font-semibold">
                        Pending
                    </h2>

                    <p class="text-4xl font-black text-yellow-600 mt-2">
                        {{ $rsvps->where('status_kehadiran', 'pending')->count() }}
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
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[28px] shadow-soft p-6 border border-slate-100 relative overflow-hidden hover:-translate-y-1 hover:shadow-lg transition">
            <div class="absolute right-0 top-0 w-28 h-28 bg-green-50 rounded-bl-[60px]"></div>

            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <h2 class="text-slate-500 text-sm font-semibold">
                        Approved
                    </h2>

                    <p class="text-4xl font-black text-green-600 mt-2">
                        {{ $rsvps->where('status_kehadiran', 'hadir')->count() }}
                    </p>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>
        </div>

    </div>

    {{-- TABLE CARD --}}
    <div class="bg-white rounded-[30px] shadow-soft border border-slate-100 overflow-hidden">

        <div class="px-7 py-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

            <div>
                <h2 class="text-2xl font-black text-dark">
                    Daftar RSVP
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Semua data peserta event yang melakukan RSVP.
                </p>
            </div>

            <div class="flex items-center gap-2 bg-red-50 text-primary px-4 py-2 rounded-2xl text-sm font-bold">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-4 h-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 17v-6h6v6m2 4H7a2 2 0 01-2-2V7a2 2 0 012-2h3l2-2 2 2h3a2 2 0 012 2v12a2 2 0 01-2 2z" />
                </svg>

                {{ $rsvps->count() }} Data RSVP
            </div>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full min-w-[950px]">

                <thead>
                    <tr class="bg-red-50 text-primary border-b border-red-100">
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider font-black">
                            User
                        </th>

                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider font-black">
                            Email
                        </th>

                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider font-black">
                            Event
                        </th>

                        <th class="px-6 py-4 text-center text-xs uppercase tracking-wider font-black">
                            Status
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($rsvps as $rsvp)

                        <tr class="hover:bg-red-50/40 transition align-middle">

                            {{-- USER --}}
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-11 h-11 rounded-2xl bg-red-100 text-primary flex items-center justify-center font-black">
                                        {{ strtoupper(substr($rsvp->user->name ?? $rsvp->name ?? 'U', 0, 1)) }}
                                    </div>

                                    <div>
                                        <div class="font-black text-slate-800">
                                            {{ $rsvp->user->name ?? $rsvp->name ?? '-' }}
                                        </div>

                                        <div class="text-sm text-slate-500 mt-1">
                                            ID RSVP: {{ $rsvp->id }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- EMAIL --}}
                            <td class="px-6 py-5">
                                <span class="inline-flex items-center gap-2 text-slate-700 font-semibold">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 text-primary"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M3 8l9 6 9-6M5 6h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z" />
                                    </svg>

                                    {{ $rsvp->user->email ?? $rsvp->email ?? '-' }}
                                </span>
                            </td>

                            {{-- EVENT --}}
                            <td class="px-6 py-5">
                                <div class="font-black text-slate-800">
                                    {{ $rsvp->event->nama_event ?? '-' }}
                                </div>

                                <div class="text-sm text-slate-500 mt-1">
                                    {{ $rsvp->event->tanggal_event ?? '-' }}

                                    @if(!empty($rsvp->event->jam))
                                        • {{ substr($rsvp->event->jam, 0, 5) }}
                                    @endif
                                </div>
                            </td>

                            {{-- STATUS --}}
                            <td class="px-6 py-5 text-center">

                                @if($rsvp->status_kehadiran == 'pending')

                                    <span class="inline-flex items-center gap-2 bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-black">
                                        <span class="w-2 h-2 rounded-full bg-yellow-500"></span>
                                        Pending
                                    </span>

                                @elseif($rsvp->status_kehadiran == 'hadir')

                                    <span class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-black">
                                        <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                        Approved
                                    </span>

                                @elseif($rsvp->status_kehadiran == 'tidak_hadir')

                                    <span class="inline-flex items-center gap-2 bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-black">
                                        <span class="w-2 h-2 rounded-full bg-red-500"></span>
                                        Rejected
                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-2 bg-slate-100 text-slate-700 px-4 py-2 rounded-full text-sm font-black">
                                        <span class="w-2 h-2 rounded-full bg-slate-400"></span>
                                        {{ $rsvp->status_kehadiran }}
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">

                                <div class="max-w-md mx-auto">

                                    <div class="w-20 h-20 bg-red-100 text-primary rounded-[26px] flex items-center justify-center mx-auto mb-5">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-10 h-10"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M3 8l9 6 9-6M5 6h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z" />
                                        </svg>
                                    </div>

                                    <h3 class="text-2xl font-black text-slate-800">
                                        Belum ada RSVP masuk
                                    </h3>

                                    <p class="text-slate-500 mt-2">
                                        Data peserta event yang melakukan RSVP belum tersedia.
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