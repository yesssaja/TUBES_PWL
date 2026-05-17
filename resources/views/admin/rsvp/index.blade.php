<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage RSVP</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f7f0c8] min-h-screen p-10">

    <!-- Title -->
    <div class="mb-8 flex items-center justify-between">

        <div>
            <h1 class="text-4xl font-bold text-red-600">
                Manage RSVP
            </h1>

            <p class="text-gray-700 mt-2">
                Kelola peserta event yang melakukan RSVP
            </p>
        </div>

        <a href="{{ route('admin.dashboard') }}"
           class="bg-gray-800 hover:bg-gray-900 text-white px-5 py-3 rounded-xl font-semibold">
            Kembali
        </a>

    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6">
            {{ session('error') }}
        </div>
    @endif

    <!-- Table -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

        <table class="w-full">

            <thead class="bg-red-600 text-white">
                <tr>
                    <th class="p-5 text-left">
                        User
                    </th>

                    <th class="p-5 text-left">
                        Email
                    </th>

                    <th class="p-5 text-left">
                        Event
                    </th>

                    <th class="p-5 text-left">
                        Status
                    </th>

                    <th class="p-5 text-center">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody>

                @forelse($rsvps as $rsvp)

                    <tr class="border-b hover:bg-yellow-50 transition">

                        <!-- User -->
                        <td class="p-5 font-semibold text-gray-800">
                            {{ $rsvp->user->name ?? $rsvp->name ?? '-' }}
                        </td>

                        <!-- Email -->
                        <td class="p-5 text-gray-700">
                            {{ $rsvp->user->email ?? $rsvp->email ?? '-' }}
                        </td>

                        <!-- Event -->
                        <td class="p-5 text-gray-700">
                            {{ $rsvp->event->nama_event ?? '-' }}
                        </td>

                        <!-- Status -->
                        <td class="p-5">

                            @if($rsvp->status_kehadiran == 'pending')

                                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    Pending
                                </span>

                            @elseif($rsvp->status_kehadiran == 'hadir')

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    Approved
                                </span>

                            @elseif($rsvp->status_kehadiran == 'tidak_hadir')

                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    Rejected
                                </span>

                            @else

                                <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    {{ $rsvp->status_kehadiran }}
                                </span>

                            @endif

                        </td>

                        <!-- Action -->
                        <td class="p-5">

                            @if($rsvp->status_kehadiran == 'pending')

                                <div class="flex justify-center gap-3">

                                    <!-- APPROVE -->
                                    <form action="{{ route('admin.rsvp.approve', $rsvp->id) }}"
                                          method="POST"
                                          class="inline">

                                        @csrf
                                        @method('PUT')

                                        <button type="submit"
                                                onclick="return confirm('Yakin ingin menyetujui RSVP ini?')"
                                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-semibold">
                                            Setujui
                                        </button>

                                    </form>

                                    <!-- REJECT -->
                                    <form action="{{ route('admin.rsvp.reject', $rsvp->id) }}"
                                          method="POST"
                                          class="inline">

                                        @csrf
                                        @method('PUT')

                                        <button type="submit"
                                                onclick="return confirm('Yakin ingin menolak RSVP ini?')"
                                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-semibold">
                                            Tolak
                                        </button>

                                    </form>

                                </div>

                            @else

                                <div class="text-center text-gray-400 font-semibold">
                                    Done
                                </div>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="p-10 text-center text-gray-500">
                            Belum ada RSVP masuk
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</body>
</html>