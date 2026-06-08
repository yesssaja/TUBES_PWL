<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard Admin' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>

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
                        primary: '#E71F25',
                        dark: '#1B2540',
                        cream: '#FFFDF3',
                        soft: '#FFF7E8',
                    },
                    boxShadow: {
                        soft: '0 15px 45px rgba(0,0,0,0.08)',
                        glow: '0 18px 45px rgba(231,31,37,0.22)',
                    }
                }
            }
        }
    </script>
</head>

<body class="font-poppins bg-gradient-to-br from-cream via-soft to-red-50 text-dark overflow-x-hidden">

<div class="min-h-screen flex">

    @include('admin.partials.sidebar')

    <main id="adminMain" class="ml-[280px] w-full p-7 transition-all duration-300">
        @yield('content')
    </main>

</div>

<button id="showSidebarBtn"
    type="button"
    onclick="toggleSidebar()"
    class="hidden fixed left-5 top-5 z-[60] w-12 h-12 rounded-2xl bg-primary text-white shadow-glow items-center justify-center hover:bg-red-700 transition">

    <svg xmlns="http://www.w3.org/2000/svg"
        class="w-6 h-6"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        stroke-width="2">

        <path stroke-linecap="round"
            stroke-linejoin="round"
            d="M4 6h16M4 12h16M4 18h16" />
    </svg>
</button>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('adminSidebar');
        const main = document.getElementById('adminMain');
        const showBtn = document.getElementById('showSidebarBtn');

        sidebar.classList.toggle('-translate-x-full');
        main.classList.toggle('ml-[280px]');
        main.classList.toggle('ml-0');
        showBtn.classList.toggle('hidden');
        showBtn.classList.toggle('flex');
    }
</script>

@yield('script')

</body>
</html>