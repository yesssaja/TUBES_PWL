<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile | LOKER SEEKER</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap');
    
    html { scroll-behavior: smooth; }
    
    body { 
        font-family: 'Poppins', sans-serif; 
        /* Mengikuti gaya gradasi temanmu tapi pakai warna tema kita */
        background: linear-gradient(to bottom, #F4D03F, #ffffff, #fef2f2); 
    }

    /* Efek Glow seperti punya temanmu */
    .glow-red {
        box-shadow: 0 0 30px rgba(231, 76, 60, 0.3);
    }

    .bg-red-brand { background-color: #E74C3C; }
    .text-red-brand { color: #E74C3C; }
    
    /* Hero Section yang lebih luas */
    .hero-gradient-bg {
        background-image: linear-gradient(to bottom, rgba(244, 208, 63, 0.9), rgba(255, 255, 255, 1)), url('{{ asset("perusahaan_1.jpg") }}');
        background-size: cover;
        background-position: center;
        min-height: 400px; /* Lebih tinggi agar tidak sesak */
    }
</style>
</head>
<body>

    <header class="fixed top-0 left-0 w-full bg-red-brand text-white shadow-xl z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-8 py-4">
        <h1 class="text-3xl font-black tracking-tighter">
            LOKER SEEKER🔥
        </h1>
        <nav class="hidden md:flex gap-10 font-bold uppercase text-sm tracking-widest">
            <a href="#about" class="hover:text-yellow-300 transition">About</a>
            <a href="#events" class="hover:text-yellow-300 transition">Events</a>
            <a href="#course" class="hover:text-yellow-300 transition">Course</a>
            <a href="#jobs" class="hover:text-yellow-300 transition">Jobs</a>
        </nav>
    </div>
</header>

 <section class="hero-gradient-bg pt-32 pb-20 px-6">
    <section id="jobs" class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold mb-6 border-b-4 border-yellow-400 inline-block">
                Open Positions
            </h3>
            <span class="text-sm text-gray-500">
                12 Lowongan Aktif
            </span>
        </div>

        <div class="space-y-4">

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center hover:border-red-500 transition">
                <div>
                    <h4 class="font-bold text-lg">Maintenance Manager</h4>
                    <p class="text-sm text-gray-500">Medan, Indonesia • Full-time</p>
                </div>

                <a href="{{ route('loker.index') }}"
                   class="bg-gray-100 hover:bg-yellow-300 hover:text-white px-6 py-2 rounded-lg font-bold hover:scale-105 transition-transform">
                    Detail
                </a>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center hover:border-red-500 transition">
                <div>
                    <h4 class="font-bold text-lg">Backend Developer (Laravel)</h4>
                    <p class="text-sm text-gray-500">Medan, Indonesia • Remote</p>
                </div>

                <a href="{{ route('loker.index') }}"
                   class="bg-gray-100 hover:bg-yellow-300 hover:text-white px-6 py-2 rounded-lg font-bold hover:scale-105 transition-transform">
                    Detail
                </a>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center hover:border-red-500 transition">
                <div>
                    <h4 class="font-bold text-lg">UI/UX Designer</h4>
                    <p class="text-sm text-gray-500">Medan, Indonesia • Full-time</p>
                </div>

                <a href="{{ route('loker.index') }}"
                   class="bg-gray-100 hover:bg-yellow-300 hover:text-white px-6 py-2 rounded-lg font-bold hover:scale-105 transition-transform">
                    Detail
                </a>
            </div>

        </div>
    </section>
</section>


</body>
</html>