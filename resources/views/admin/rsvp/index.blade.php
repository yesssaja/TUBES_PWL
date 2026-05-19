<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage RSVP</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-yellow-50 via-orange-50 to-red-100 min-h-screen text-gray-800">

<div class="min-h-screen p-4 md:p-8">

    <!-- Header -->
    <div class="bg-gradient-to-r from-red-600 to-yellow-400 rounded-3xl shadow-xl p-6 md:p-8 mb-8 text-white">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

            <div>
                <h1 class="text-3xl md:text-4xl font-black">
                    Manage RSVP
                </h1>

                <p class="mt-2 text-white/90">
                    Kelola peserta event yang melakukan RSVP.
                </p>
            </div>

            <a href="{{ route('admin.dashboard') }}"
               class="bg-white/20 hover:bg-white/30 text-white font-bold px-5 py-3 rounded-2xl shadow transition text-center">
                ← Dashboard
            </a>

        </div>

    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl mb-6 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if(session('error'))
        <div class="bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-2xl mb-6 shadow-sm">
            {{ session('error') }}
        </div>
    @endif

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-red-500 hover:-translate-y-1 transition">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-gray-500 text-sm font-semibold">
                        Total RSVP
                    </h2>

                    <p class="text-4xl font-black text-red-600 mt-2">
                        {{ $rsvps->count() }}
                    </p>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center text-2xl">
                    📝
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-yellow-400 hover:-translate-y-1 transition">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-gray-500 text-sm font-semibold">
                        Pending
                    </h2>

                    <p class="text-4xl font-black text-yellow-500 mt-2">
                        {{ $rsvps->where('status_kehadiran', 'pending')->count() }}
                    </p>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-yellow-100 text-yellow-600 flex items-center justify-center text-2xl">
                    ⏳
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-green-500 hover:-translate-y-1 transition">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-gray-500 text-sm font-semibold">
                        Approved
                    </h2>

                    <p class="text-4xl font-black text-green-600 mt-2">
                        {{ $rsvps->where('status_kehadiran', 'hadir')->count() }}
                    </p>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-2xl">
                    ✅
                </div>
            </div>
        </div>

    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-white">

        <div class="px-6 py-5 border-b bg-white flex flex-col md:flex-row md:items-center md:justify-between gap-3">

            <div>
                <h2 class="text-xl font-black text-gray-800">
                    Daftar RSVP
                </h2>

                <p class="text-sm text-gray-500">
                    Semua data peserta event yang melakukan RSVP.
                </p>
            </div>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full min-w-[900px]">

                <thead class="bg-red-600 text-white">
                    <tr>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">User</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Email</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Event</th>
                        <th class="p-4 text-center text-sm uppercase tracking-wide">Status</th>
                        <th class="p-4 text-center text-sm uppercase tracking-wide">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($rsvps as $rsvp)

                        <tr class="hover:bg-yellow-50 transition align-middle">

                            <!-- User -->
                            <td class="p-4">
                                <div class="font-black text-gray-800">
                                    {{ $rsvp->user->name ?? $rsvp->name ?? '-' }}
                                </div>

                                <div class="text-sm text-gray-500 mt-1">
                                    ID RSVP: {{ $rsvp->id }}
                                </div>
                            </td>

                            <!-- Email -->
                            <td class="p-4 text-gray-700">
                                {{ $rsvp->user->email ?? $rsvp->email ?? '-' }}
                            </td>

                            <!-- Event -->
                            <td class="p-4">
                                <div class="font-bold text-gray-800">
                                    {{ $rsvp->event->nama_event ?? '-' }}
                                </div>

                                <div class="text-sm text-gray-500 mt-1">
                                    {{ $rsvp->event->tanggal_event ?? '-' }}
                                    @if(!empty($rsvp->event->jam))
                                        • {{ substr($rsvp->event->jam, 0, 5) }}
                                    @endif
                                </div>
                            </td>

                            <!-- Status -->
                            <td class="p-4 text-center">

                                @if($rsvp->status_kehadiran == 'pending')

                                    <span class="inline-block bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-bold">
                                        Pending
                                    </span>

                                @elseif($rsvp->status_kehadiran == 'hadir')

                                    <span class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold">
                                        Approved
                                    </span>

                                @elseif($rsvp->status_kehadiran == 'tidak_hadir')

                                    <span class="inline-block bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-bold">
                                        Rejected
                                    </span>

                                @else

                                    <span class="inline-block bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm font-bold">
                                        {{ $rsvp->status_kehadiran }}
                                    </span>

                                @endif

                            </td>

                            <!-- Action -->
                            <td class="p-4">

                                @if($rsvp->status_kehadiran == 'pending')

                                    <div class="flex justify-center items-center gap-2">

                                        <!-- APPROVE -->
                                        <form action="{{ route('admin.rsvp.approve', $rsvp->id) }}"
                                              method="POST">

                                            @csrf
                                            @method('PUT')

                                            <button type="submit"
                                                    onclick="return confirm('Yakin ingin menyetujui RSVP ini?')"
                                                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl text-sm font-bold shadow transition">
                                                Setujui
                                            </button>

                                        </form>

                                        <!-- REJECT -->
                                        <form action="{{ route('admin.rsvp.reject', $rsvp->id) }}"
                                              method="POST">

                                            @csrf
                                            @method('PUT')

                                            <button type="submit"
                                                    onclick="return confirm('Yakin ingin menolak RSVP ini?')"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-sm font-bold shadow transition">
                                                Tolak
                                            </button>

                                        </form>

                                    </div>

                                @else

                                    <div class="text-center">
                                        <span class="inline-block bg-gray-100 text-gray-500 px-4 py-2 rounded-full text-sm font-bold">
                                            Done
                                        </span>
                                    </div>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="p-12 text-center">

                                <div class="max-w-md mx-auto">

                                    <div class="w-20 h-20 bg-red-100 text-red-600 rounded-3xl flex items-center justify-center text-4xl mx-auto mb-4">
                                        📝
                                    </div>

                                    <h3 class="text-2xl font-black text-gray-800">
                                        Belum ada RSVP masuk
                                    </h3>

                                    <p class="text-gray-500 mt-2">
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

</div>

</body>
</html>