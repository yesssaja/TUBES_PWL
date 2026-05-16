<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage RSVP</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f7f0c8] min-h-screen p-10">

    <!-- Title -->
    <div class="mb-8">

        <h1 class="text-4xl font-bold text-red-600">
            Manage RSVP
        </h1>

        <p class="text-gray-700 mt-2">
            Kelola peserta event yang melakukan RSVP
        </p>

    </div>

    <!-- Success Message -->
    @if(session('success'))

        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6">

            {{ session('success') }}

        </div>

    @endif

    <!-- Table -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

        <table class="w-full">

            <!-- Header -->
            <thead class="bg-red-600 text-white">

                <tr>

                    <th class="p-5 text-left">
                        User
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

            <!-- Body -->
            <tbody>

                @forelse($rsvps as $rsvp)

                <tr class="border-b hover:bg-yellow-50 transition">

                    <!-- User -->
                    <td class="p-5 font-semibold text-gray-800">

                        {{ $rsvp->user->name }}

                    </td>

                    <!-- Event -->
                    <td class="p-5 text-gray-700">

                        {{ $rsvp->event->nama_event }}

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

                        @elseif($rsvp->status_kehadiran == 'ditolak')

                            <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-semibold">
                                Rejected
                            </span>

                        @endif

                    </td>

                    <!-- Action -->
                    <td class="p-5">

                        @if($rsvp->status_kehadiran == 'pending')

                        <div class="flex justify-center gap-3">

                            <!-- APPROVE -->
                            <form action="{{ route('admin.rsvp.approve', $rsvp->id) }}"
                                  method="POST">

                                @csrf
                                @method('PUT')

                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-xl font-semibold transition">

                                    ACC

                                </button>

                            </form>

                            <!-- REJECT -->
                            <form action="{{ route('admin.rsvp.reject', $rsvp->id) }}"
                                  method="POST">

                                @csrf
                                @method('PUT')

                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-xl font-semibold transition">

                                    Reject

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

                    <td colspan="4"
                        class="p-10 text-center text-gray-500">

                        Belum ada RSVP masuk

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</body>
</html>