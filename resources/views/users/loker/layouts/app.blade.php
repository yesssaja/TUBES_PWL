<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Loker - Looker Seeker' }}</title>

    {{-- TAILWIND --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('image/favicon.ico') }}">

    {{-- FONT AWESOME --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    {{-- FONT POPPINS --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
        }

        .bg-yellow-brand {
            background-color: #F4D03F;
        }

        .bg-red-brand {
            background-color: #E74C3C;
        }

        .text-red-brand {
            color: #E74C3C;
        }
    </style>

    @yield('style')
</head>

<body class="bg-gradient-to-b from-yellow-100 via-orange-50 to-yellow-200 text-gray-800 font-sans">

     @include('users.layouts.navbar')

    <main>
        @yield('content')
    </main>

    @include('users.layouts.footer')

    @yield('scripts')

</body>

</html>