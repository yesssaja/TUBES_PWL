<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Service - Looker Seeker</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Tailwind Config -->
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
                        cream: '#F7F1C8',
                        soft: '#FFFDF3',

                    },

                    boxShadow: {

                        soft: '0 6px 18px rgba(0,0,0,0.08)',
                        card: '0 15px 40px rgba(0,0,0,0.08)',

                    }

                }

            }

        }

    </script>

</head>

<body class="bg-[#F7F1C8] text-slate-800 font-poppins">

    <!-- SECTION DETAIL -->
    <section class="max-w-7xl mx-auto px-6 py-10">

        <!-- TOP -->
        <div class="grid lg:grid-cols-3 gap-8">

            <!-- LEFT CONTENT -->
            <div class="lg:col-span-2">

            <!-- GALLERY -->
@php
                $mainImage = $service->images->first();
            @endphp

           @php
                $mainImage = $service->images->first();
            @endphp

            <div class="bg-white rounded-[32px] p-4 shadow-soft border border-red-100">

                @if($mainImage)
                    <img
                    id="mainServiceImage"
                    src="{{ $mainImage->image_url }}"
                    alt="{{ $service->service_name }}"
                    class="w-full h-[420px] object-cover rounded-[26px] shadow-md transition duration-300">
                @else
                    <div class="w-full h-[420px] bg-red-100 rounded-[26px] flex items-center justify-center text-primary font-bold">
                        Tidak Ada Gambar
                    </div>
                @endif

                @if($service->images->count() > 1)
                    <div class="grid grid-cols-4 gap-3 mt-4">

                        @foreach($service->images->skip(1) as $image)
                            <img
                                src="{{ $image->image_url }}"
                                alt="{{ $service->service_name }}"
                                class="thumbnail-image w-full h-24 object-cover rounded-2xl border border-red-100 shadow-sm hover:scale-[1.03] transition cursor-pointer">
                        @endforeach

                    </div>
                @endif

            </div>

                <!-- PROFILE -->
                <div class="bg-white rounded-[32px] p-8 shadow-soft border border-slate-100 mb-8">

                    <div class="flex items-start justify-between flex-wrap gap-5">

                        <div>

                            <h1 class="text-4xl font-extrabold text-slate-800 mb-3">

                                {{ $service->freelancer_name }}

                            </h1>

                            <p class="text-lg text-slate-500 mb-4">

                                {{ $service->service_name }}

                            </p>

                            <div class="flex items-center gap-2 text-sm text-slate-500">

                                <!-- ICON LOCATION -->
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

                                {{ $service->location }}

                            </div>

                        </div>

                        <!-- PRICE -->
                        <div class="bg-[#FFF5F5] border border-red-100 rounded-3xl px-7 py-5 min-w-[220px]">

                            <p class="text-sm text-slate-400 mb-2">

                                Mulai dari

                            </p>

                            <h2 class="text-4xl font-extrabold text-primary">

                                Rp{{ number_format($service->price, 0, ',', '.') }}

                            </h2>

                        </div>

                    </div>

                </div>

                <!-- DESCRIPTION -->
                <div class="bg-white rounded-[32px] p-8 shadow-soft border border-slate-100 mb-8">

                    <h2 class="text-2xl font-bold mb-5 text-slate-800">

                        Deskripsi Jasa

                    </h2>

                    <div class="text-slate-500 leading-relaxed text-[15px]
                        [&_p]:mb-4
                        [&_strong]:font-bold
                        [&_em]:italic
                        [&_ul]:list-disc
                        [&_ul]:ml-6
                        [&_ol]:list-decimal
                        [&_ol]:ml-6
                        [&_li]:mb-2">

                        {!! $service->description !!}

                    </div>

                </div>

            </div>

            <!-- RIGHT SIDEBAR -->
            <div>

                <div class="bg-white rounded-[32px] p-7 shadow-soft border border-slate-100 sticky top-8">

                    <!-- PROFILE MINI -->
                    <div class="flex items-center gap-4 mb-6">

                       

                        <div>

                            <h3 class="font-bold text-lg">

                                {{ $service->freelancer_name }}

                            </h3>

                            <p class="text-sm text-slate-500">

                            {{ $service->service_name }}    

                            </p>

                        </div>

                    </div>

                    <!-- STATS -->
                    <div class="space-y-4 mb-8">

                        <div class="flex justify-between text-sm">

                            <span class="text-slate-400">
                                Pengalaman
                            </span>

                            <span class="font-semibold text-slate-700">
                                {{ $service->work_experience }}
                            </span>

                        </div>

                        <div class="flex justify-between text-sm">

                            <span class="text-slate-400">
                                Bahasa yang Dikuasai
                            </span>

                            <span class="font-semibold text-slate-700">
                                {{ is_array($service->languages) ? implode(', ', $service->languages) : $service->languages }}
                            </span>

                        </div>

                        <div class="flex justify-between text-sm">

                            <span class="text-slate-400">
                                Skill Utama
                            </span>

                            <span class="font-semibold text-slate-700">
                                {{ $service->skills }}
                            </span>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <button type="button"
                        id="openContactModal"
                        class="w-full bg-primary hover:bg-red-700 text-white py-4 rounded-full font-bold text-sm shadow-lg transition">

                        Hubungi Freelancer

                    </button>

                </div>

            </div>

        </div>

    </section>

@php
    $waNumber = preg_replace('/[^0-9]/', '', $service->whatsapp);

    if (str_starts_with($waNumber, '0')) {
        $waNumber = '62' . substr($waNumber, 1);
    }

    if (str_starts_with($waNumber, '62') === false) {
        $waNumber = '62' . $waNumber;
    }

    $waMessage = urlencode('Halo, ' . $service->freelancer_name . '. Saya tertarik dengan jasa ' . $service->service_name . ' yang Anda tawarkan di Looker Seeker.');
    $waLink = 'https://wa.me/' . $waNumber . '?text=' . $waMessage;

    $emailSubject = urlencode('Tertarik dengan jasa ' . $service->service_name);
    $emailBody = urlencode('Halo ' . $service->freelancer_name . ",\n\nSaya tertarik dengan jasa " . $service->service_name . " yang Anda tawarkan di Looker Seeker.\n\nTerima kasih.");
    $gmailLink = 'https://mail.google.com/mail/?view=cm&fs=1&to=' . $service->email . '&su=' . $emailSubject . '&body=' . $emailBody;
@endphp

<!-- MODAL KONTAK FREELANCER -->
<div id="contactModal"
    class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50 p-5">

    <div class="bg-white rounded-[32px] p-7 max-w-md w-full shadow-2xl relative">

        <!-- CLOSE -->
        <button type="button"
            id="closeContactModal"
            class="absolute top-5 right-5 w-10 h-10 rounded-full bg-red-100 text-primary font-bold hover:bg-primary hover:text-white transition">
            ✕
        </button>

        <!-- HEADER -->
        <div class="text-center mb-7">

            <div class="w-20 h-20 mx-auto mb-5 rounded-full bg-red-100 flex items-center justify-center text-primary">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-10 h-10"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.77 9.77 0 01-4-.82L3 20l1.3-3.9A7.46 7.46 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>

            </div>

            <h2 class="text-2xl font-extrabold text-dark mb-2">
                Hubungi Freelancer
            </h2>

            <p class="text-sm text-slate-500 leading-relaxed">
                Pilih metode kontak untuk menghubungi {{ $service->freelancer_name }}.
            </p>

        </div>

        <!-- OPTIONS -->
        <div class="space-y-4">

            <!-- WHATSAPP -->
            <a href="{{ $waLink }}"
                target="_blank"
                class="flex items-center gap-4 p-5 rounded-2xl border border-green-200 bg-green-50 hover:bg-green-100 transition">

                <div class="w-12 h-12 rounded-2xl bg-green-500 text-white flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-7 h-7"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 21l1.5-4.5A8.5 8.5 0 1112 20.5a8.7 8.7 0 01-4.5-1.25L3 21z" />
                    </svg>

                </div>

                <div>
                    <h3 class="font-bold text-slate-800">
                        WhatsApp
                    </h3>

                    <p class="text-xs text-slate-500">
                        Chat langsung ke nomor freelancer
                    </p>
                </div>

            </a>

            <!-- EMAIL -->
            <a href="{{ $gmailLink }}"
                target="_blank"
                class="flex items-center gap-4 p-5 rounded-2xl border border-red-200 bg-red-50 hover:bg-red-100 transition">

                <div class="w-12 h-12 rounded-2xl bg-primary text-white flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-7 h-7"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>

                </div>

                <div>
                    <h3 class="font-bold text-slate-800">
                        Email
                    </h3>

                    <p class="text-xs text-slate-500">
                        Buka Gmail dengan email penerima otomatis
                    </p>
                </div>

            </a>

        </div>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const openContactModal = document.getElementById('openContactModal');
    const closeContactModal = document.getElementById('closeContactModal');
    const contactModal = document.getElementById('contactModal');

    openContactModal.addEventListener('click', function () {
        contactModal.classList.remove('hidden');
        contactModal.classList.add('flex');
    });

    closeContactModal.addEventListener('click', function () {
        contactModal.classList.add('hidden');
        contactModal.classList.remove('flex');
    });

    contactModal.addEventListener('click', function (e) {
        if (e.target === contactModal) {
            contactModal.classList.add('hidden');
            contactModal.classList.remove('flex');
        }
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const mainImage = document.getElementById('mainServiceImage');
    const thumbnails = document.querySelectorAll('.thumbnail-image');

    thumbnails.forEach(function (thumbnail) {
        thumbnail.addEventListener('click', function () {
            const oldMainSrc = mainImage.src;

            mainImage.src = this.src;
            this.src = oldMainSrc;
        });
    });
});
</script>

</body>

</html>