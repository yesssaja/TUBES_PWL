<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Loker</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&display=swap');
        body {
            font-family: 'Oswald', sans-serif;
            background-color: #f6b333; 
        }
        .text-custom-red {
            color: #d12026; 
        }
        .border-custom-red {
            border-color: #d12026;
        }
    </style>
</head>
<body class="p-0 m-0">

    <!-- Navbar -->
    <nav class="flex justify-center gap-8 py-8">
        <a href="#" class="text-custom-red font-bold text-xl uppercase hover:underline">Job Description</a>
        <a href="#" class="text-custom-red font-bold text-xl uppercase hover:underline">Requirements</a>
        <a href="#" class="text-custom-red font-bold text-xl uppercase hover:underline">About Company</a>
    </nav>

    <!-- Section Card Gambar Landscape (BARU) -->
    <div class="max-w-5xl mx-auto px-4 mb-10">
        <div class="bg-white rounded-3xl overflow-hidden shadow-2xl border-4 border-custom-red">
           <img src= "{{ asset('foto_perusahaan/perusahaan_1.jpg') }}""
                 alt="Company Landscape" 
                 class="w-full h-[300px] md:h-[450px] object-cover">
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="max-w-4xl mx-auto text-center px-4 mt-10">
        <div class="flex justify-center mb-4">
            <svg class="w-8 h-8 text-custom-red" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>
        </div>

        <h2 class="text-custom-red font-bold text-2xl mb-6 tracking-widest uppercase">Detail Pekerjaan</h2>

        <!-- Section 1: Job Description -->
        <div class="mb-12">
            <p class="text-custom-red font-bold text-lg md:text-2xl leading-relaxed uppercase">
                Kami mencari individu yang kreatif dan bersemangat untuk bergabung sebagai Backend Developer. 
                Tugas utamanya adalah membangun sistem yang kuat, mengelola database, 
                dan memastikan integrasi API berjalan dengan sempurna demi kenyamanan pengguna.
            </p>
        </div>

        <hr class="border-custom-red border-t-2 w-24 mx-auto my-8">

        <!-- Section 2: Requirements -->
        <div class="mb-12 text-custom-red">
            <h3 class="font-bold text-xl mb-4">REQUIREMENTS</h3>
            <ul class="font-bold text-md uppercase space-y-2">
                <li>Mahir PHP & Framework Laravel</li>
                <li>Paham Konsep Database MySQL (Port 3307)</li>
                <li>Mampu Bekerja dalam Tim Kelompok Kom A-25</li>
            </ul>
        </div>

        <!-- Section 3: About Company -->
        <div class="pb-20 text-custom-red">
            <h3 class="font-bold text-xl mb-4">ABOUT COMPANY</h3>
            <p class="font-bold text-md uppercase">
                Perusahaan kami bergerak di bidang teknologi informasi yang berlokasi di Medan. 
                Kami fokus pada pengembangan solusi digital yang estetik dan fungsional.
            </p>
        </div>
    </div>

</body>
</html>