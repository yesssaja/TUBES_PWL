<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Course | LOKER SEEKER')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&display=swap');

        :root {
            --course-yellow: #f6b333;
            --course-red: #d12026;
            --course-dark: #1f2937;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Oswald', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(255, 255, 255, 0.35), transparent 32%),
                radial-gradient(circle at bottom right, rgba(209, 32, 38, 0.18), transparent 34%),
                var(--course-yellow);
            min-height: 100vh;
        }

        .text-c { color: var(--course-red); }
        .border-c { border-color: var(--course-red); }
        .bg-c { background-color: var(--course-red); }

        .course-shadow {
            box-shadow: 6px 8px 0px var(--course-red);
        }

        .course-shadow-sm {
            box-shadow: 4px 5px 0px var(--course-red);
        }

        .course-card {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 9px 11px 0px var(--course-red);
        }

        .btn-course {
            transition: transform 0.2s ease, filter 0.2s ease;
        }

        .btn-course:hover {
            transform: translateY(-2px);
            filter: brightness(0.95);
        }
    </style>
</head>

<body class="text-gray-900">

    @include('users.course.layouts.navbar')

    <main>
        @yield('content')
    </main>

    @yield('scripts')

    <script>
        function toggleMenu() {
            const menu = document.getElementById('menuDropdown');

            if (menu) {
                menu.classList.toggle('hidden');
            }
        }

        function toggleProfile() {
            const profile = document.getElementById('profileDropdown');

            if (profile) {
                profile.classList.toggle('hidden');
            }
        }
    </script>

</body>
</html>