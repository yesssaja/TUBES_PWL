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

     @include('users.layouts.navbar')

    <main>
        @yield('content')
    </main>

    @include('users.layouts.footer')

    @yield('scripts')

</body>
</html>