<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Loker Seeker')</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f7f0c8] min-h-screen">

    @include('users.layouts.navbar')

    <main>
        @yield('content')
    </main>

    @include('users.layouts.footer')

    @yield('scripts')

</body>
</html>