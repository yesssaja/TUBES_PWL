{{-- resources/views/pages/all-service.blade.php --}}

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Semua Jasa - Looker Seeker</title>

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
                        glow: '0 10px 30px rgba(231,31,37,0.18)',

                    }

                }
            }
        }

    </script>

</head>

<body class="bg-cream font-poppins text-dark overflow-x-hidden">

    {{-- BACKGROUND --}}
    <div class="fixed inset-0 -z-10 overflow-hidden">

        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-red-200/40 rounded-full blur-3xl"></div>

        <div class="absolute bottom-0 right-0 w-[450px] h-[450px] bg-orange-100 rounded-full blur-3xl"></div>

    </div>

    {{-- HEADER --}}
    <section class="pt-14 pb-8 px-4 lg:px-6">

        <div class="max-w-7xl mx-auto">

            {{-- TOP BAR --}}
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-10">

                {{-- TITLE --}}
                <div>

                    <p class="text-primary font-bold text-sm mb-2 uppercase tracking-widest">

                        Explore Service

                    </p>

                    <h1 class="text-4xl lg:text-6xl font-extrabold leading-tight mb-4">

                        Semua <span class="text-primary">Jasa Freelancer</span>

                    </h1>

                    <p class="text-slate-500 max-w-2xl text-sm lg:text-base leading-relaxed">

                        Temukan berbagai layanan profesional terbaik dari freelancer terpercaya
                        untuk membantu kebutuhan project, bisnis, maupun personal Anda.

                    </p>

                </div>

                {{-- BUTTON --}}
                <a href="/service"
                    class="inline-flex items-center justify-center gap-2 bg-primary text-white px-6 py-4 rounded-2xl shadow-glow hover:bg-red-700 hover:-translate-y-1 transition duration-300 text-sm font-bold h-fit">

                    ← Kembali

                </a>

            </div>

            {{-- FILTER --}}
            <div class="bg-soft rounded-[32px] p-5 shadow-soft border border-red-100 mb-10">

                <div class="grid lg:grid-cols-3 gap-4">

                    {{-- SEARCH --}}
                    <div class="lg:col-span-2">

                        <input type="text"
                            placeholder="Cari jasa..."
                            class="w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200">

                    </div>

                    {{-- CATEGORY --}}
                    <div>

                        <select
                            class="w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200">

                            <option>Semua Kategori</option>
                            <option>Fotografi</option>
                            <option>Video Editing</option>
                            <option>Desain Grafis</option>
                            <option>Musik & Audio</option>

                        </select>

                    </div>

                </div>

            </div>

            {{-- SERVICE GRID --}}
            <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-8">

                {{-- CARD --}}
                @for ($i = 1; $i <= 9; $i++)

                    <div class="bg-white rounded-[28px] overflow-hidden shadow-soft border border-slate-100 hover:-translate-y-1 transition">

                        {{-- IMAGE --}}
                        <img
                            src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1200&auto=format&fit=crop"
                            class="h-52 w-full object-cover">

                        {{-- CONTENT --}}
                        <div class="p-5">

                            {{-- NAMA --}}
                            <h3 class="font-bold text-lg mb-1">

                                Billie Eilish

                            </h3>

                            {{-- PROFESI --}}
                            <p class="text-sm text-slate-500 mb-2">

                                Fotografer Event & Wisuda

                            </p>

                            {{-- KATEGORI --}}
                            <div class="flex flex-wrap gap-2 mb-4">

                                <span class="px-3 py-1 bg-red-100 text-primary text-xs font-semibold rounded-full">

                                    Fotografi

                                </span>

                            </div>

                            {{-- LOKASI --}}
                            <div class="flex items-center gap-2 text-sm text-slate-500 mb-4">

                                {{-- ICON LOCATION --}}
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 text-primary"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />

                                </svg>

                                Bandung

                            </div>

                            {{-- PRICE --}}
                            <p class="text-xs text-slate-400">

                                Mulai dari

                            </p>

                            <h4 class="text-2xl font-extrabold mb-5">

                                Rp350.000

                            </h4>

                            {{-- BUTTON --}}
                            <a href="/service/detail"
                                class="block w-full bg-primary text-white py-3 rounded-full text-sm font-bold hover:bg-red-700 transition text-center">

                                Lihat Detail

                            </a>

                        </div>

                    </div>

                @endfor

            </div>

            {{-- PAGINATION --}}
            <div class="flex items-center justify-center gap-3 mt-14">

                <button
                    class="w-12 h-12 rounded-2xl bg-primary text-white font-bold shadow-md">

                    1

                </button>

                <button
                    class="w-12 h-12 rounded-2xl bg-white border border-red-100 font-bold hover:bg-red-50 transition">

                    2

                </button>

                <button
                    class="w-12 h-12 rounded-2xl bg-white border border-red-100 font-bold hover:bg-red-50 transition">

                    3

                </button>

                <button
                    class="px-5 h-12 rounded-2xl bg-white border border-red-100 font-bold hover:bg-red-50 transition">

                    Next →

                </button>

            </div>

        </div>

    </section>

</body>

</html>