<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Loker Seeker Event')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        .glow {
            box-shadow: 0 0 30px rgba(255, 77, 0, 0.4);
        }
    </style>
</head>

<body class="bg-gradient-to-b from-yellow-500 via-orange-50 to-red-100 text-gray-800 font-sans min-h-screen">

    @yield('content')

</body>
</html>