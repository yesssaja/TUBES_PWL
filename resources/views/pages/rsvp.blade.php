<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSVP Event</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-b from-yellow-500 to-red-500 min-h-screen">

<section class="min-h-screen py-24 px-6 flex items-center">

    <div class="max-w-3xl w-full mx-auto bg-white p-10 rounded-3xl shadow-2xl">

        <h1 class="text-5xl font-black text-red-600 text-center mb-10">
            RSVP Event
        </h1>

        <form action="{{ route('rsvp.store') }}"
              method="POST"
              class="space-y-6">

            @csrf

            <input type="text"
                   name="name"
                   placeholder="Full Name"
                   required
                   class="w-full p-4 rounded-2xl border border-gray-300">

            <input type="email"
                   name="email"
                   placeholder="Email Address"
                   required
                   class="w-full p-4 rounded-2xl border border-gray-300">

            <select
                name="event_id"
                required
                class="w-full p-4 rounded-2xl border border-gray-300">

                <option value="">
                    -- Pilih Event --
                </option>

                @foreach($events as $event)

                    <option value="{{ $event->id }}">
                        {{ $event->nama_event }}
                    </option>

                @endforeach

            </select>

            <button type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 text-white font-black py-4 rounded-2xl transition">

                Submit RSVP

            </button>

        </form>

    </div>

</section>

</body>
</html>