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
                <a href="{{ route('service.index') }}"
                    class="inline-flex items-center justify-center gap-2 bg-primary text-white px-6 py-4 rounded-2xl shadow-glow hover:bg-red-700 hover:-translate-y-1 transition duration-300 text-sm font-bold h-fit">

                    ← Kembali

                </a>

            </div>

            {{-- FILTER --}}
            <div class="bg-soft rounded-[32px] p-5 shadow-soft border border-red-100 mb-10">

                <form action="{{ route('service.all') }}" method="GET">

                    <div class="grid lg:grid-cols-3 gap-4">

                        {{-- CATEGORY --}}
                        <div>

                            <select name="category"
                                class="w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200">

                                <option value="all">Semua Kategori</option>

                                @foreach($categories as $category)
                                    <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                                        {{ $category }}
                                    </option>
                                @endforeach

                            </select>

                        </div>

                    </div>

                    <div class="flex justify-end gap-3 mt-4">

                        <a href="{{ route('service.all') }}"
                            class="px-5 py-3 rounded-2xl bg-white border border-red-100 text-sm font-bold hover:bg-red-50 transition">

                            Reset

                        </a>

                        <button type="submit"
                            class="px-6 py-3 rounded-2xl bg-primary text-white text-sm font-bold hover:bg-red-700 transition shadow-glow">

                            Cari

                        </button>

                    </div>

                </form>

            </div>

            {{-- SERVICE GRID --}}
            @if($services->count() > 0)

                <div id="serviceGrid" class="grid sm:grid-cols-2 xl:grid-cols-3 gap-8">

                    @foreach($services as $service)

                        @php
                            $firstImage = $service->images->first();
                        @endphp

                        {{-- CARD --}}
                        <div class="service-card bg-white rounded-[28px] overflow-hidden shadow-soft border border-slate-100 hover:-translate-y-1 transition h-full flex flex-col"
                            data-name="{{ strtolower($service->freelancer_name) }}"
                            data-service="{{ strtolower($service->service_name) }}"
                            data-category="{{ $service->category }}">

                            {{-- IMAGE --}}
                            @if($firstImage)
                                <img
                                    src="{{ $firstImage->image_url }}"
                                    alt="{{ $service->service_name }}"
                                    class="h-52 w-full object-cover flex-shrink-0">
                            @else
                                <div class="h-52 w-full bg-red-100 flex items-center justify-center text-primary font-bold flex-shrink-0">
                                    Tidak Ada Gambar
                                </div>
                            @endif

                            {{-- CONTENT --}}
                            <div class="p-5 flex flex-col flex-1">

                                {{-- NAMA --}}
                                <h3 class="font-bold text-lg mb-1 leading-snug line-clamp-1">

                                    {{ $service->freelancer_name }}

                                </h3>

                                {{-- PROFESI --}}
                                <p class="text-sm text-slate-500 mb-2 leading-relaxed line-clamp-2 min-h-[40px]">

                                    {{ $service->service_name }}

                                </p>

                                {{-- KATEGORI --}}
                                <div class="flex flex-wrap gap-2 mb-4 min-h-[28px]">

                                    <span class="px-3 py-1 bg-red-100 text-primary text-xs font-semibold rounded-full">

                                        {{ $service->category }}

                                    </span>

                                </div>

                                {{-- LOKASI --}}
                                <div class="flex items-center gap-2 text-sm text-slate-500 mb-4 min-h-[24px]">

                                    {{-- ICON LOCATION --}}
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 text-primary flex-shrink-0"
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

                                    <span class="line-clamp-1">

                                        {{ $service->location }}

                                    </span>

                                </div>

                                <div class="mt-auto">

                                    {{-- PRICE --}}
                                    <p class="text-xs text-slate-400">

                                        Mulai dari

                                    </p>

                                    <h4 class="text-2xl font-extrabold mb-5">

                                        Rp{{ number_format($service->price, 0, ',', '.') }}

                                    </h4>

                                    {{-- BUTTON --}}
                                    <a href="{{ route('service.show', $service->id) }}"
                                        class="block w-full bg-primary text-white py-3 rounded-full text-sm font-bold hover:bg-red-700 transition text-center">

                                        Lihat Detail

                                    </a>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

                {{-- EMPTY FILTER --}}
                <div id="emptyFilter"
                    class="hidden bg-white rounded-[28px] p-10 shadow-soft border border-red-100 text-center">

                    <h3 class="text-2xl font-extrabold text-dark mb-2">

                        Jasa Tidak Ditemukan

                    </h3>

                    <p class="text-slate-500 text-sm">

                        Coba gunakan kata kunci atau kategori lain.

                    </p>

                </div>

            @else

                {{-- EMPTY DATABASE --}}
                <div class="bg-white rounded-[28px] p-10 shadow-soft border border-red-100 text-center">

                    <h3 class="text-2xl font-extrabold text-dark mb-2">

                        Belum Ada Jasa

                    </h3>

                    <p class="text-slate-500 text-sm mb-6">

                        Saat ini belum ada jasa freelancer yang dipublikasikan.

                    </p>

                    <a href="{{ route('service.create') }}"
                        class="inline-flex items-center justify-center bg-primary text-white px-6 py-4 rounded-2xl shadow-glow hover:bg-red-700 transition text-sm font-bold">

                        Tawarkan Jasa

                    </a>

                </div>

            @endif

            {{-- PAGINATION --}}
            @if($services->hasPages())

                <div class="flex items-center justify-center gap-3 mt-14">

                    @if($services->onFirstPage())
                        <span class="px-5 h-12 rounded-2xl bg-white/60 border border-red-100 font-bold text-slate-400 flex items-center">
                            ← Prev
                        </span>
                    @else
                        <a href="{{ $services->previousPageUrl() }}"
                            class="px-5 h-12 rounded-2xl bg-white border border-red-100 font-bold hover:bg-red-50 transition flex items-center">
                            ← Prev
                        </a>
                    @endif

                    @foreach($services->getUrlRange(1, $services->lastPage()) as $page => $url)

                        @if($page == $services->currentPage())

                            <span class="w-12 h-12 rounded-2xl bg-primary text-white font-bold shadow-md flex items-center justify-center">

                                {{ $page }}

                            </span>

                        @else

                            <a href="{{ $url }}"
                                class="w-12 h-12 rounded-2xl bg-white border border-red-100 font-bold hover:bg-red-50 transition flex items-center justify-center">

                                {{ $page }}

                            </a>

                        @endif

                    @endforeach

                    @if($services->hasMorePages())
                        <a href="{{ $services->nextPageUrl() }}"
                            class="px-5 h-12 rounded-2xl bg-white border border-red-100 font-bold hover:bg-red-50 transition flex items-center">
                            Next →
                        </a>
                    @else
                        <span class="px-5 h-12 rounded-2xl bg-white/60 border border-red-100 font-bold text-slate-400 flex items-center">
                            Next →
                        </span>
                    @endif

                </div>

            @endif

        </div>

    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const emptyFilter = document.getElementById('emptyFilter');
            const serviceGrid = document.getElementById('serviceGrid');

            function filterServices() {
                const keyword = searchInput.value.toLowerCase();
                const selectedCategory = categoryFilter.value;
                let visibleCount = 0;

                serviceCards.forEach(function (card) {
                    const name = card.dataset.name;
                    const service = card.dataset.service;
                    const category = card.dataset.category;

                    const matchKeyword = name.includes(keyword) || service.includes(keyword);
                    const matchCategory = selectedCategory === 'all' || category === selectedCategory;

                    if (matchKeyword && matchCategory) {
                        card.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        card.classList.add('hidden');
                    }
                });

                if (visibleCount === 0 && serviceCards.length > 0) {
                    emptyFilter.classList.remove('hidden');
                    serviceGrid.classList.add('hidden');
                } else {
                    emptyFilter.classList.add('hidden');
                    serviceGrid.classList.remove('hidden');
                }
            }

            searchInput.addEventListener('input', filterServices);
            categoryFilter.addEventListener('change', filterServices);
        });
    </script>

</body>

</html>