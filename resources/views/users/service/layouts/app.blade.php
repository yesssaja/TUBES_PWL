<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Service - Looker Seeker' }}</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font --}}
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
                    },
                    boxShadow: {
                        soft: '0 15px 40px rgba(0,0,0,0.08)',
                        card: '0 15px 40px rgba(0,0,0,0.08)',
                        glow: '0 10px 30px rgba(231,31,37,0.18)',
                    }
                }
            }
        }
    </script>
    @yield('style') 
</head>

<body class="bg-cream font-poppins text-dark overflow-x-hidden">

    @yield('content')

    @yield('script')

</body>

</html>