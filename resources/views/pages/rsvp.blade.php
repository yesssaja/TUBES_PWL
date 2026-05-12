<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSVP Event</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-yellow-500">

<section class="min-h-screen py-24 px-6">

    <div class="max-w-3xl mx-auto bg-white p-10 rounded-3xl shadow-2xl">

        <h1 class="text-5xl font-black text-red-600 text-center mb-10">
            RSVP Event
        </h1>

        <form action="/berhasil_daftar_event" method="GET" class="space-y-6">

            <input type="text"
                   name="name"
                   placeholder="Full Name"
                   class="w-full p-4 rounded-2xl border border-gray-300">

            <input type="email"
                   name="email"
                   placeholder="Email Address"
                   class="w-full p-4 rounded-2xl border border-gray-300">

            <select
                name="event"
                class="w-full p-4 rounded-2xl border border-gray-300">

                <option selected>
                    {{ request('event') }}
                </option>

                <option>
                    Bringing Your AI Models to Life
                </option>

                <option>
                    Navigating the Software Engineering Industry
                </option>

                <option>
                    Essay Competition : Digital Innovation for Local Impact
                </option>

            </select>

            <button type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 text-white font-black py-4 rounded-2xl">

                Submit RSVP

            </button>

        </form>

    </div>

</section>

</body>
</html>