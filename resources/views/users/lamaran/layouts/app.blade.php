<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Lamaran - Looker Seeker' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('image/favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        cream: '#F7F1C8',
                        primary: '#E71F25',
                        dark: '#1B2540',
                        soft: '#FFFDF3',
                        'ls-red': '#E51D21',
                        'ls-dark': '#1D2746',
                        'ls-bg': '#F7F1C8',
                        'ls-green': '#22C55E',
                    },
                    boxShadow: {
                        custom: '0 15px 40px rgba(0,0,0,0.08)',
                        soft: '0 15px 40px rgba(0,0,0,0.08)',
                    }
                }
            }
        }
    </script>

    @yield('style')
</head>

<body class="bg-cream font-poppins text-dark min-h-screen overflow-x-hidden">

   @include('users.layouts.navbar')

    <main>
        @yield('content')
    </main>

    @include('users.layouts.footer')

    @yield('scripts')

</body>

</html>