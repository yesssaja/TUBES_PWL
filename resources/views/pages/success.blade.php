<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamaran Berhasil Dikirim - Looker Seeker</title>
    
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
<body class="bg-ls-bg font-sans min-h-screen flex flex-col items-center py-10 px-4 relative overflow-x-hidden">
    
    <div class="absolute top-10 left-10 w-32 h-32 bg-dots opacity-50 -z-10"></div>
    <div class="absolute bottom-10 right-10 w-32 h-32 bg-dots opacity-50 -z-10"></div>

    <div class="w-full max-w-4xl bg-[#FFFDF3] rounded-[40px] shadow-[0_15px_60px_-15px_rgba(0,0,0,0.08)] p-5 md:p-6 text-center border border-gray-50">
        
        <div class="mb-1 flex justify-center">
            <img src="{{ asset('images/sukses-gambar.png') }}" alt="Success Illustration" class="w-64 md:w-80 animate-float drop-shadow-xl">
        </div>

        <h1 class="font-poppins text-3xl md:text-4xl font-bold text-ls-dark mb-2">
            Lamaran Berhasil Dikirim! 
        </h1>
        <p class="text-base text-slate-600 leading-relaxed max-w-3xl mx-auto">
            Terima kasih telah melamar posisi yang tersedia di Looker Seeker.<br>
            Informasi selanjutnya akan dikirim melalui email atau kontak yang telah Anda daftarkan.
        </p>

        <div class="bg-[#F7FBF7] border border-[#DDF3E2] border-l-4 border-l-[#22C55E] rounded-2xl p-4 mb-6 flex flex-col md:flex-row items-center gap-5 text-left max-w-2xl mx-auto shadow-sm">

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
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                    />

                </svg>
            </div>

            <div class="flex-1">

                <p class="text-[13px] font-extrabold text-[#0F172A] uppercase tracking-[0.18em] mb-1">
                    STATUS LAMARAN
                </p>

                <p class="text-[#22C55E] font-bold text-2xl leading-tight mb-1">
                    Lamaran Anda telah kami terima
                </p>

                <p class="text-slate-500 text-sm leading-relaxed">
                    Kami akan menghubungi Anda jika lamaran Anda lolos ke tahap berikutnya.
                </p>

            </div>

        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-2">
            <a href="/" class="border-2 border-gray-100 text-ls-dark flex items-center justify-center gap-2 px-8 py-3.5 rounded-2xl font-bold hover:bg-gray-50 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Kembali ke Beranda
            </a>
        </div>

    </div>
</body>
</html>