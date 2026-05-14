<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Lowongan | LOKER SEEKER</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; background-color: #f9f9f9; }
        .bg-yellow-brand { background-color: #F4D03F; } 
        .bg-red-brand { background-color: #E74C3C; }    
        .text-red-brand { color: #E74C3C; }
    </style>
</head>
<body>

    <header class="bg-red-brand text-white p-4 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold italic tracking-wider">LOKER SEEKER</h1>
            <nav class="hidden md:flex space-x-6 font-medium">
                <a href="#" class="hover:text-yellow-300">Home</a>
                <a href="#" class="hover:text-yellow-300">About</a>
                <a href="#" class="hover:text-yellow-300 border-b-2 border-yellow-300">Jobs</a>
                <a href="#" class="hover:text-yellow-300">Schedule</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8 max-w-5xl">
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
            <div class="bg-yellow-brand h-32 w-full"></div> <div class="px-8 pb-8 -mt-12">
                <div class="flex flex-col md:flex-row md:justify-between md:items-end gap-4">
                    <div class="flex flex-col">
                       <img src="{{ asset('foto_perusahaan/images.png') }}"  alt="Logo Perusahaan" class="w-24 h-24 rounded-xl border-4 border-white shadow-md bg-white object-contain mb-4">
                        <h2 class="text-3xl font-bold text-gray-800">Maintenance Manager</h2>
                        <p class="text-xl text-red-brand font-semibold">SHOPEE</p>
                        
                        <div class="flex flex-wrap gap-4 mt-3 text-gray-500 text-sm">
                            <span><i class="fas fa-map-marker-alt mr-1"></i> Medan, Sumatera Utara</span>
                            <span><i class="fas fa-briefcase mr-1"></i> Finance</span>
                            <span><i class="fas fa-clock mr-1"></i> Dipublish 2 hari yang lalu</span>
                        </div>
                    </div>
                      <a href="/lamaran" class="bg-red-brand hover:bg-red-700 text-white px-10 py-3 rounded-full font-bold shadow-lg transition-all transform hover:scale-105">
                        Apply Now
                      </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="text-xl font-bold mb-4 border-b-2 border-yellow-brand inline-block">Job Description</h3>
                    <ul class="list-disc ml-5 space-y-2 text-gray-600 mt-4">
                        <li>Coordinate and monitor the implementation of maintenance to be completed in accordance with the target time and results set.</li>
                        <li>Monitor and ensure the running of preventive maintenance and maintenance of existing instruments and electrical equipment.</li>
                        <li>Ensure calibration is on schedule.</li>
                    </ul>

                    <h3 class="text-xl font-bold mt-8 mb-4 border-b-2 border-yellow-brand inline-block">Job Requirements</h3>
                    <ul class="list-disc ml-5 space-y-2 text-gray-600 mt-4">
                        <li>Bachelor degree (Mechanical Engineering) from reputable University.</li>
                        <li>Minimal 15 years experiences in chemical plant maintenance with minimal 5 years at managerial position.</li>
                        <li>Strong leadership and communication skills.</li>
                        <li>Willing to be placed in Medan.</li>
                    </ul>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="text-xl font-bold mb-6">About the company</h3>
                    <div class="flex items-start gap-4 mb-4">
                       <img src="/foto_perusahaan/images.png"  alt="Logo" class="rounded-md border">
                        <div>
                            <h4 class="font-bold text-lg">SHOPEE</h4>
                            {{-- <p class="text-sm text-gray-500">956,439 followers</p>
                            <button class="mt-2 text-blue-600 font-bold hover:underline flex items-center">
                                <i class="fas fa-plus mr-1"></i> Follow
                            </button> --}}
                            <p class="text-sm text-gray-500">
                        Food and Beverage Manufacturing • 10,001+ employees • 13,382 on LOKER SEEKER
                    </p>
                    <p class="text-gray-600 text-sm italic">
                        "Di Sinar Mas Agribusiness and Food, kami bertumbuh dengan tujuan. Minyak kelapa sawit menjadi awal dari perjalanan kami..."
                    </p>
                        </div>
                    </div>
                    {{-- <p class="text-sm text-gray-500">
                        Food and Beverage Manufacturing • 10,001+ employees • 13,382 on LOKER SEEKER
                    </p>
                    <p class="text-gray-600 text-sm italic">
                        "Di Sinar Mas Agribusiness and Food, kami bertumbuh dengan tujuan. Minyak kelapa sawit menjadi awal dari perjalanan kami..."
                    </p> --}}
                    <a href="{{ route('perusahaan.detail') }}" class="mt-6 w-full py-2 border-2 border-blue-600 text-blue-600 font-bold rounded-lg hover:bg-blue-50 transition">
                        Show more
                    </a>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-yellow-brand p-6 rounded-2xl shadow-sm">
                    <h3 class="font-bold text-gray-800 mb-4">Ringkasan Pekerjaan</h3>
                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-700">Tipe Kontrak:</span>
                            <span class="font-bold">Full-time</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-700">Gaji:</span>
                            <span class="font-bold text-red-brand">Kompetitif</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-700">Level:</span>
                            <span class="font-bold">Manager</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center">
                    <p class="text-sm font-semibold mb-4 text-gray-600">Bagikan lowongan ini:</p>
                    <div class="flex justify-center gap-4">
                        <a href="https://web.facebook.com/?locale=id_ID&_rdc=1&_rdr#" class="text-blue-600 text-xl hover:scale-110 transition"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.instagram.com/" class="text-pink-400 text-xl hover:scale-110 transition"><i class="fab fa-instagram"></i></a>
                        <a href="https://web.whatsapp.com/" class="text-green-500 text-xl hover:scale-110 transition"><i class="fab fa-whatsapp"></i></a>
                        <a href="http://127.0.0.1:8000/detail-loker" class="text-gray-600 text-xl hover:scale-110 transition"><i class="fas fa-link"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white py-6 mt-12 text-center text-sm">
        <p>&copy; 2026 LOKER SEEKER. Dibuat oleh Mahasiswa USU.</p>
    </footer>

</body>
</html>
