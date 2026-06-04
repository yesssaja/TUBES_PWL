<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'LOKER SEEKER' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('image/favicon.ico') }}">
</head>

<body class="bg-gradient-to-br from-yellow-50 via-orange-50 to-red-100 min-h-screen text-gray-800">
    {{ $slot }}
</body>
</html>