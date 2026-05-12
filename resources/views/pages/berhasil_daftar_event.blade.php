<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Event Berhasil - Looker Seeker</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        'ls-red': '#E51D21',
                        'ls-dark': '#1D2746',
                        'ls-bg': '#F7F1C8',
                        'ls-green': '#22C55E',
                    }
                }
            }
        }
    </script>

    <style>
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        .bg-dots {
            background-image: radial-gradient(#e5e7eb 1.5px, transparent 1.5px);
            background-size: 20px 20px;
        }
    </style>
</head>

<body class="bg-ls-bg font-poppins min-h-screen flex flex-col items-center justify-center py-10 px-4 relative overflow-x-hidden">

    <!-- Background Decoration -->
    <div class="absolute top-10 left-10 w-32 h-32 bg-dots opacity-50 -z-10"></div>
    <div class="absolute bottom-10 right-10 w-32 h-32 bg-dots opacity-50 -z-10"></div>

    <!-- Card -->
    <div class="w-full max-w-4xl bg-[#FFFDF3] rounded-[40px] shadow-[0_15px_60px_-15px_rgba(0,0,0,0.08)] p-6 md:p-8 text-center border border-gray-100">

        <!-- Illustration -->
        <div class="mb-2 flex justify-center">
            <img 
                src="{{ asset('images/sukses-gambar.png') }}" 
                alt="Event Success"
                class="w-64 md:w-80 animate-float drop-shadow-xl"
            >
        </div>

        <!-- Heading -->
        <h1 class="text-3xl md:text-4xl font-extrabold text-ls-dark mb-3">
            Pendaftaran Event Berhasil!
        </h1>

        <p class="text-slate-600 text-base leading-relaxed max-w-3xl mx-auto mb-8">
            Terima kasih telah mendaftar pada event di Looker Seeker.<br>
            Detail informasi event dan pengingat acara akan dikirim melalui email atau kontak yang telah Anda daftarkan.
        </p>

        <!-- Status Box -->
        <div class="bg-[#F7FBF7] border border-[#DDF3E2] border-l-4 border-l-[#22C55E] rounded-2xl p-5 mb-8 flex flex-col md:flex-row items-center gap-5 text-left max-w-2xl mx-auto shadow-sm">

            <!-- Icon -->
            <div class="w-16 h-16 bg-[#22C55E] rounded-full flex items-center justify-center flex-shrink-0 shadow-md">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-8 w-8 text-white"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2.5"
                        d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z"
                    />

                </svg>

            </div>

            <!-- Text -->
            <div class="flex-1">

                <p class="text-[13px] font-extrabold text-[#0F172A] uppercase tracking-[0.18em] mb-1">
                    STATUS PENDAFTARAN
                </p>

                <p class="text-[#22C55E] font-bold text-2xl leading-tight mb-1">
                    Anda berhasil terdaftar pada event
                </p>

                <p class="text-slate-500 text-sm leading-relaxed">
                    Sampai jumpa di acara nanti. Jangan lupa cek email Anda untuk informasi lebih lanjut.
                </p>

            </div>

        </div>

        <!-- Button -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">

            <a href="{{route('welcome')}}"
               class="border-2 border-gray-100 text-ls-dark flex items-center justify-center gap-2 px-8 py-3.5 rounded-2xl font-bold hover:bg-gray-50 transition-all duration-300">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />

                </svg>

                Kembali ke Beranda

            </a>

        </div>

    </div>

</body>
</html>