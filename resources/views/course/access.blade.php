<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Akses Course | LOKER SEEKER</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(18px);
        }

        .shadow-red {
            box-shadow: 0 20px 45px rgba(220, 38, 38, 0.18);
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-yellow-100 via-orange-50 to-red-100 text-gray-800">

    <!-- Background Decoration -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-24 -left-24 w-80 h-80 bg-yellow-300 rounded-full blur-3xl opacity-40"></div>
        <div class="absolute top-40 -right-24 w-96 h-96 bg-red-300 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 left-1/3 w-80 h-80 bg-orange-300 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="max-w-6xl mx-auto px-4 md:px-8 py-8 md:py-12">

        <!-- Top Navigation -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

            <a href="{{ route('welcome') }}"
               class="text-2xl md:text-3xl font-black text-red-600">
                LOKER SEEKER🔥
            </a>

            <div class="flex gap-3">
                <a href="{{ route('course.index') }}"
                   class="bg-white hover:bg-gray-50 text-gray-800 px-5 py-3 rounded-2xl font-bold shadow transition">
                    ← Daftar Course
                </a>

                <a href="{{ route('welcome') }}"
                   class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-2xl font-bold shadow transition">
                    Home
                </a>
            </div>

        </div>

        <!-- Hero Card -->
        <section class="glass-card rounded-[36px] shadow-red border border-white p-6 md:p-10 mb-8 overflow-hidden relative">

            <div class="absolute top-0 right-0 w-40 h-40 bg-yellow-300 rounded-bl-full opacity-30"></div>

            <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">

                <div>
                    <span class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-black mb-5">
                        ✅ Course Disetujui
                    </span>

                    <h1 class="text-4xl md:text-5xl font-black text-gray-900 leading-tight mb-5">
                        Akses Course Kamu
                    </h1>

                    <p class="text-gray-600 text-lg leading-relaxed">
                        Pendaftaran kamu untuk course ini sudah disetujui. Kamu hanya dapat mengakses link course yang sesuai dengan course yang kamu daftarkan.
                    </p>
                </div>

                <div class="bg-gradient-to-br from-red-600 to-yellow-400 rounded-[30px] p-6 md:p-8 text-white shadow-xl">

                    <p class="text-white/80 text-sm font-bold uppercase tracking-widest mb-3">
                        Course Terdaftar
                    </p>

                    <h2 class="text-3xl font-black leading-tight mb-4">
                        {{ $course->title }}
                    </h2>

                    <div class="flex flex-wrap gap-3 text-sm font-bold">

                        <span class="bg-white/20 px-4 py-2 rounded-full">
                            🎓 Online Course
                        </span>

                        <span class="bg-white/20 px-4 py-2 rounded-full">
                            🔒 Akses Terbatas
                        </span>

                        <span class="bg-white/20 px-4 py-2 rounded-full">
                            👤 {{ auth()->user()->name }}
                        </span>

                    </div>

                </div>

            </div>

        </section>

        <!-- Course Access Section -->
        @if($courseLink)

            <section class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Main Link Card -->
                <div class="lg:col-span-2 bg-white rounded-[36px] shadow-xl border border-white p-6 md:p-8">

                    <div class="flex items-start gap-4 mb-6">

                        <div class="w-16 h-16 rounded-3xl bg-red-100 text-red-600 flex items-center justify-center text-3xl shrink-0">
                            ▶️
                        </div>

                        <div>
                            <p class="text-red-600 text-sm font-black uppercase tracking-widest mb-2">
                                Link Course Kamu
                            </p>

                            <h2 class="text-3xl font-black text-gray-900 leading-tight">
                                {{ $courseLink->title }}
                            </h2>
                        </div>

                    </div>

                    <div class="bg-gray-50 border border-gray-100 rounded-3xl p-5 mb-6">
                        <p class="text-sm text-gray-500 font-bold mb-2">
                            URL Course
                        </p>

                        <p class="text-gray-700 break-all leading-relaxed">
                            {{ $courseLink->url }}
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">

                        <a href="{{ $courseLink->url }}"
                           target="_blank"
                           class="flex-1 text-center bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-2xl font-black shadow-lg transition transform hover:-translate-y-1">
                            Buka Link Course
                        </a>

                        <a href="{{ route('course.index') }}"
                           class="flex-1 text-center bg-yellow-400 hover:bg-yellow-500 text-black px-8 py-4 rounded-2xl font-black shadow-lg transition transform hover:-translate-y-1">
                            Lihat Course Lain
                        </a>

                    </div>

                </div>

                <!-- Info Card -->
                <div class="bg-white rounded-[36px] shadow-xl border border-white p-6 md:p-8">

                    <h3 class="text-2xl font-black text-gray-900 mb-5">
                        Informasi Akses
                    </h3>

                    <div class="space-y-4">

                        <div class="bg-green-50 border border-green-100 rounded-2xl p-4">
                            <p class="text-green-700 font-black text-sm mb-1">
                                Status
                            </p>

                            <p class="text-gray-700 font-semibold">
                                Disetujui
                            </p>
                        </div>

                        <div class="bg-yellow-50 border border-yellow-100 rounded-2xl p-4">
                            <p class="text-yellow-700 font-black text-sm mb-1">
                                Tanggal Disetujui
                            </p>

                            <p class="text-gray-700 font-semibold">
                                {{ $registration->approved_at ? $registration->approved_at->format('d M Y H:i') : '-' }}
                            </p>
                        </div>

                        <div class="bg-red-50 border border-red-100 rounded-2xl p-4">
                            <p class="text-red-700 font-black text-sm mb-1">
                                Catatan
                            </p>

                            <p class="text-gray-700 text-sm leading-relaxed">
                                Link ini hanya dapat diakses setelah pendaftaran course disetujui.
                            </p>
                        </div>

                    </div>

                </div>

            </section>

        @else

            <!-- Empty Link -->
            <section class="bg-white rounded-[36px] shadow-xl border border-white p-10 text-center">

                <div class="w-24 h-24 bg-red-100 text-red-600 rounded-[28px] flex items-center justify-center text-5xl mx-auto mb-6">
                    🔗
                </div>

                <h2 class="text-3xl font-black text-gray-900 mb-3">
                    Link Course Belum Tersedia
                </h2>

                <p class="text-gray-600 max-w-xl mx-auto leading-relaxed mb-6">
                    Course ini sudah disetujui, tetapi link materi belum tersedia. Silakan cek kembali nanti.
                </p>

                <a href="{{ route('course.index') }}"
                   class="inline-block bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-2xl font-black shadow-lg transition">
                    Kembali ke Course
                </a>

            </section>

        @endif

    </div>

</body>
</html>