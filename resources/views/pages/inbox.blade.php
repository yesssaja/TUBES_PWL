<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Inbox | LOKER SEEKER</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-yellow-50 via-orange-50 to-red-100 min-h-screen text-gray-800">

<div class="max-w-5xl mx-auto p-4 md:p-8">

    <!-- Header -->
    <div class="bg-gradient-to-r from-red-600 to-yellow-400 rounded-3xl shadow-xl p-6 md:p-8 mb-8 text-white">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

            <div>
                <h1 class="text-3xl md:text-4xl font-black">
                    Inbox
                </h1>

                <p class="mt-2 text-white/90">
                    Lihat pemberitahuan RSVP dan lamaran kerja kamu di sini.
                </p>
            </div>

            <a href="{{ route('welcome') }}"
               class="bg-white/20 hover:bg-white/30 text-white font-bold px-5 py-3 rounded-2xl shadow transition text-center">
                ← Home
            </a>

        </div>

    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl mb-6 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-red-500">
            <h2 class="text-gray-500 text-sm font-semibold">
                Total Pesan
            </h2>

            <p class="text-4xl font-black text-red-600 mt-2">
                {{ $inboxes->count() }}
            </p>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-yellow-400">
            <h2 class="text-gray-500 text-sm font-semibold">
                Belum Dibaca
            </h2>

            <p class="text-4xl font-black text-yellow-500 mt-2">
                {{ $inboxes->where('is_read', false)->count() }}
            </p>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-green-500">
            <h2 class="text-gray-500 text-sm font-semibold">
                Sudah Dibaca
            </h2>

            <p class="text-4xl font-black text-green-600 mt-2">
                {{ $inboxes->where('is_read', true)->count() }}
            </p>
        </div>

    </div>

    <!-- Action -->
    <div class="mb-6 flex justify-end">

        <form action="{{ route('inbox.readAll') }}" method="POST">
            @csrf
            @method('PUT')

            <button type="submit"
                    class="bg-gray-800 hover:bg-black text-white px-5 py-3 rounded-2xl font-bold shadow transition">
                Tandai Semua Dibaca
            </button>
        </form>

    </div>

    <!-- Inbox List -->
    <div class="space-y-5">

        @forelse($inboxes as $inbox)

            <div class="bg-white rounded-3xl shadow-lg border {{ $inbox->is_read ? 'border-gray-100' : 'border-yellow-300' }} p-6">

                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-5">

                    <div class="flex-1">

                        <!-- Badge -->
                        <div class="flex flex-wrap items-center gap-3 mb-3">

                            @if($inbox->type === 'rsvp_approved')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">
                                    RSVP Diterima
                                </span>

                            @elseif($inbox->type === 'rsvp_rejected')
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold">
                                    RSVP Ditolak
                                </span>

                            @elseif($inbox->type === 'lamaran_diterima')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">
                                    Lamaran Diterima
                                </span>

                            @elseif($inbox->type === 'lamaran_ditolak')
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold">
                                    Lamaran Ditolak
                                </span>

                            @else
                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-bold">
                                    Info
                                </span>
                            @endif

                            @if(!$inbox->is_read)
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold">
                                    Baru
                                </span>
                            @endif

                        </div>

                        <!-- Title -->
                        <h2 class="text-2xl font-black text-gray-900">
                            {{ $inbox->title }}
                        </h2>

                        <!-- Message -->
                        <p class="text-gray-600 mt-3 leading-relaxed">
                            {{ $inbox->message }}
                        </p>

                        <!-- Action URL / Hubungi Perusahaan -->
                        @if(!empty($inbox->action_url) && !empty($inbox->action_text))
                            <a href="{{ $inbox->action_url }}"
                               class="inline-block mt-5 bg-yellow-400 hover:bg-yellow-500 text-black px-5 py-3 rounded-2xl text-sm font-black shadow transition">
                                {{ $inbox->action_text }}
                            </a>
                        @endif

                        <!-- Date -->
                        <p class="text-sm text-gray-400 mt-4">
                            {{ $inbox->created_at ? $inbox->created_at->format('d M Y H:i') : '-' }}
                        </p>

                    </div>

                    <!-- Read Button -->
                    <div class="md:w-44 flex md:justify-end">

                        @if(!$inbox->is_read)
                            <form action="{{ route('inbox.read', $inbox->id) }}" method="POST" class="w-full md:w-auto">
                                @csrf
                                @method('PUT')

                                <button type="submit"
                                        class="w-full md:w-auto bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-2xl text-sm font-bold shadow transition">
                                    Tandai Dibaca
                                </button>
                            </form>
                        @else
                            <span class="w-full md:w-auto text-center bg-gray-100 text-gray-500 px-5 py-3 rounded-2xl text-sm font-bold">
                                Dibaca
                            </span>
                        @endif

                    </div>

                </div>

            </div>

        @empty

            <div class="bg-white rounded-3xl shadow-xl p-12 text-center">

                <div class="w-20 h-20 bg-red-100 text-red-600 rounded-3xl flex items-center justify-center text-4xl mx-auto mb-4">
                    📬
                </div>

                <h3 class="text-2xl font-black text-gray-800">
                    Inbox masih kosong
                </h3>

                <p class="text-gray-500 mt-2">
                    Belum ada pemberitahuan RSVP atau lamaran.
                </p>

            </div>

        @endforelse

    </div>

</div>

</body>
</html>