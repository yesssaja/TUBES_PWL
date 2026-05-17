<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form RSVP Event</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-b from-yellow-500 via-orange-50 to-red-100 min-h-screen text-gray-800">

    <div class="max-w-3xl mx-auto px-6 py-16">

        <div class="bg-white rounded-3xl shadow-2xl p-8">

            <h1 class="text-4xl font-black text-red-600 mb-4 text-center">
                Form RSVP Event
            </h1>

            <p class="text-center text-gray-600 mb-8">
                Silakan pilih event yang ingin kamu ikuti.
            </p>

            @if(session('error'))
                <div class="bg-red-100 text-red-700 px-4 py-3 rounded-xl mb-5">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl mb-5">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 text-red-700 px-4 py-3 rounded-xl mb-5">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('rsvp.store') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 font-bold text-gray-700">
                        Pilih Event
                    </label>

                    <select name="event_id"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500"
                            required>

                        <option value="">-- Pilih Event --</option>

                        @foreach($events as $event)
                            <option value="{{ $event->id }}"
                                {{ $selectedEventId == $event->id ? 'selected' : '' }}>

                                {{ $event->nama_event }} - {{ $event->lokasi }} - {{ $event->jam }}

                            </option>
                        @endforeach

                    </select>
                </div>

                <button type="submit"
                        class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-4 rounded-full transition shadow-lg">

                    Daftar RSVP

                </button>
            </form>

            <div class="text-center mt-6">
                <a href="{{ url()->previous() }}"
                   class="text-red-600 font-semibold hover:underline">
                    Kembali
                </a>
            </div>

        </div>

    </div>

</body>
</html>