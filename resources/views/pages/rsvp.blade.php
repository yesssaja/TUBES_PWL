{{-- @extends('layouts.app')

@section('content')

<section class="min-h-screen bg-gradient-to-b from-yellow-100 via-yellow-50 to-red-100 py-24 px-6">

    <div class="max-w-3xl mx-auto bg-white p-10 rounded-3xl shadow-2xl">

        <!-- Title -->
        <div class="text-center mb-10">

            <h1 class="text-5xl font-black text-red-600 mb-4">
                RSVP Event
            </h1>

            <p class="text-gray-600 text-lg">
                Register yourself and join the excitement!
            </p>

        </div>

        <!-- Form -->
        <form class="space-y-6">

            <!-- Full Name -->
            <div>

                <label class="block font-bold mb-2 text-gray-700">
                    Full Name
                </label>

                <input type="text"
                       placeholder="Enter your full name"
                       class="w-full p-4 rounded-2xl border border-gray-300 focus:outline-none focus:ring-4 focus:ring-red-300">

            </div>

            <!-- Email -->
            <div>

                <label class="block font-bold mb-2 text-gray-700">
                    Email Address
                </label>

                <input type="email"
                       placeholder="Enter your email"
                       class="w-full p-4 rounded-2xl border border-gray-300 focus:outline-none focus:ring-4 focus:ring-red-300">

            </div>

            <!-- Phone -->
            <div>

                <label class="block font-bold mb-2 text-gray-700">
                    Phone Number
                </label>

                <input type="text"
                       placeholder="08xxxxxxxxxx"
                       class="w-full p-4 rounded-2xl border border-gray-300 focus:outline-none focus:ring-4 focus:ring-red-300">

            </div>

            <!-- Select Event -->
            <div>

                <label class="block font-bold mb-2 text-gray-700">
                    Select Event
                </label>

                <select
                    class="w-full p-4 rounded-2xl border border-gray-300 focus:outline-none focus:ring-4 focus:ring-red-300">

                    <option>Bringing Your AI Models to Life</option>

                    <option>Navigating the Software Engineering Industry</option>

                    <option>Essay Competition : Digital Innovation for Local Impact</option>

                </select>

            </div>

            <!-- Notes -->
            <div>

                <label class="block font-bold mb-2 text-gray-700">
                    Notes
                </label>

                <textarea rows="4"
                          placeholder="Write something..."
                          class="w-full p-4 rounded-2xl border border-gray-300 focus:outline-none focus:ring-4 focus:ring-red-300"></textarea>

            </div>

            <!-- Button -->
            <button type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 text-white font-black py-4 rounded-2xl transition duration-300 hover:scale-[1.02] shadow-xl">

                Submit RSVP

            </button>

        </form>

    </div>

</section>

@endsection --}}


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

    <div class="max-w-3xl mx-auto bg-white p-10 rounded-3xl shadow-2xl center">

        <h1 class="text-5xl font-black text-red-600 text-center mb-10">
            RSVP Event
        </h1>

        <form class="space-y-6">

            <input type="text"
                   placeholder="Full Name"
                   class="w-full p-4 rounded-2xl border border-gray-300">

            <input type="email"
                   placeholder="Email Address"
                   class="w-full p-4 rounded-2xl border border-gray-300">

            <select
            class="w-full p-4 rounded-2xl border border-gray-300">

            <option selected>
                {{ request('event') }}
            </option>
        
            <option>Bringing Your AI Models to Life</option>
        
            <option>Navigating the Software Engineering Industry</option>
        
            <option>Essay Competition : Digital Innovation for Local Impact</option>

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