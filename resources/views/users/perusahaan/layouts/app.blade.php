<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LOKER SEEKER')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght=300;400;600;700;900&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #F4D03F, #ffffff, #fef2f2);
        }
        .bg-red-brand { background-color: #E74C3C; }
        .text-red-brand { color: #E74C3C; }
        .bg-yellow-brand { background-color: #F4D03F; }
    </style>
</head>
<body class="text-gray-800">

    <header class="fixed top-0 left-0 w-full bg-red-brand text-white shadow-xl z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-8 py-4">

            <a href="{{ route('welcome') }}" class="flex items-center space-x-3 hover:opacity-90 transition">
                <div class="w-10 h-12 overflow-hidden rounded shadow-sm flex items-center justify-center bg-white/10">
                    <img src="{{ asset('logo/logo.png') }}" alt="Logo" class="w-full h-full object-cover">
                </div>
                <h1 class="text-3xl font-black tracking-tighter">
                    LOKER SEEKER🔥
                </h1>
            </a>

            <nav class="hidden md:flex gap-10 font-bold uppercase text-sm tracking-widest">
                <a href="{{ route('welcome') }}" class="hover:text-yellow-300 transition">Home</a>
                <a href="{{ route('loker.index') }}" class="hover:text-yellow-300 transition">Jobs</a>
                <a href="{{ route('perusahaan.index') }}" class="hover:text-yellow-300 transition {{ Route::is('perusahaan.index') ? 'border-b-2 border-yellow-300' : '' }}">Company</a>
                <a href="{{ route('event.index') }}" class="hover:text-yellow-300 transition">Event</a>
            </nav>

        </div>
    </header>

    <div class="pt-24"> 
        @yield('content')
    </div>

    <footer class="bg-gray-900 text-white py-10 text-center">
        <h2 class="text-3xl font-black mb-3">LOKER SEEKER🔥</h2>
        <p class="text-gray-400>© 2026 Loker Seeker. All Rights Reserved.</p>
    </footer>

</body>
</html>