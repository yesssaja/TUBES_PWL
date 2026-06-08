@extends('admin.layouts.app')

@section('content')

    {{-- HEADER --}}
    <div class="relative overflow-visible bg-gradient-to-r from-primary via-red-700 to-red-800 text-white rounded-[28px] shadow-glow p-8 mb-7 flex items-center justify-between min-h-[130px]">

        <div class="relative z-10">
            <h1 class="text-4xl font-black tracking-wide">
                Dashboard Admin
            </h1>

            <p class="mt-2 text-white/90 font-medium">
                Selamat datang admin.
            </p>
        </div>

        @auth
            <div class="relative z-20">
                <button onclick="toggleProfile()"
                    class="w-14 h-14 rounded-full bg-white text-primary flex items-center justify-center font-black text-xl shadow-xl">
                    {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                </button>

                <div id="profileDropdown"
                    class="hidden absolute right-0 top-16 w-52 bg-white rounded-2xl shadow-2xl p-4 z-50">

                    <p class="font-bold text-slate-900 px-2 mb-2">
                        {{ Auth::user()->name }}
                    </p>

                    <hr class="mb-2">

                    <form action="{{ route('logout') }}" method="post">
                        @csrf

                        <button type="submit"
                            class="w-full text-left px-2 py-2 font-bold text-red-600 hover:bg-red-100 rounded-xl">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        @endauth

    </div>

    {{-- BUTUH DIPROSES --}}
    <div class="bg-white/95 rounded-[32px] shadow-soft border border-white border-l-[6px] border-l-primary p-7 mb-7">

        <div class="flex items-center justify-between gap-5 mb-7">

            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-red-100 text-primary flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 11-6 0" />
                    </svg>
                </div>

                <div>
                    <h2 class="text-2xl font-black text-red-700">
                        Butuh Diproses
                    </h2>

                    <p class="text-slate-500 text-sm mt-1">
                        Data yang menunggu persetujuan atau balasan admin.
                    </p>
                </div>
            </div>

            <div class="bg-red-100 text-red-700 px-6 py-3 rounded-2xl font-black text-xl">
                {{ $totalButuhTindakan ?? 0 }} Tugas
            </div>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-5">

            @include('admin.partials.pending-card', [
                'route' => route('admin.rsvp.index'),
                'color' => 'red',
                'icon' => 'mail',
                'title' => 'RSVP Pending',
                'total' => $pendingRsvp ?? 0,
                'desc' => 'Perlu diterima / ditolak'
            ])

            @include('admin.partials.pending-card', [
                'route' => route('admin.lamaran.index'),
                'color' => 'yellow',
                'icon' => 'document',
                'title' => 'Lamaran Pending',
                'total' => $pendingLamaran ?? 0,
                'desc' => 'Perlu diterima / ditolak'
            ])

            @include('admin.partials.pending-card', [
                'route' => route('admin.course.index'),
                'color' => 'orange',
                'icon' => 'academic',
                'title' => 'Course Pending',
                'total' => $pendingCourse ?? 0,
                'desc' => 'Menunggu persetujuan'
            ])

            @include('admin.partials.pending-card', [
                'route' => route('admin.course.index'),
                'color' => 'blue',
                'icon' => 'wallet',
                'title' => 'Pembayaran Pending',
                'total' => $pendingPayment ?? 0,
                'desc' => 'Bukti bayar perlu dicek'
            ])

            @include('admin.partials.pending-card', [
                'route' => route('admin.review.index'),
                'color' => 'purple',
                'icon' => 'star',
                'title' => 'Review Belum Dibalas',
                'total' => $reviewBelumDibalas ?? 0,
                'desc' => 'Perlu dibalas'
            ])

        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

        @include('admin.partials.stat-card', [
            'color' => 'red',
            'icon' => 'user',
            'title' => 'Total User',
            'total' => $totalUser
        ])

        @include('admin.partials.stat-card', [
            'color' => 'yellow',
            'icon' => 'calendar',
            'title' => 'Total Event',
            'total' => $totalEvent
        ])

        @include('admin.partials.stat-card', [
            'color' => 'orange',
            'icon' => 'briefcase',
            'title' => 'Total Loker',
            'total' => $totalLoker
        ])

        @include('admin.partials.stat-card', [
            'color' => 'green',
            'icon' => 'document',
            'title' => 'Total Lamaran',
            'total' => $totalLamaran
        ])

        @include('admin.partials.stat-card', [
            'color' => 'red',
            'icon' => 'users',
            'title' => 'Total Group',
            'total' => $totalGroup
        ])

        @include('admin.partials.stat-card', [
            'color' => 'blue',
            'icon' => 'building',
            'title' => 'Total Perusahaan',
            'total' => $totalPerusahaan
        ])

        @include('admin.partials.stat-card', [
            'color' => 'purple',
            'icon' => 'star',
            'title' => 'Total Review',
            'total' => $totalReview
        ])

    </div>

@endsection

@section('script')
<script>
    function toggleProfile() {
        document.getElementById('profileDropdown').classList.toggle('hidden');
    }
</script>
@endsection