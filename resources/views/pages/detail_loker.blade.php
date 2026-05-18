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
<body  class="bg-gradient-to-b from-yellow-100 via-orange-50 to-yellow-200 text-gray-800 font-sans">

    @php
        $perusahaan = $loker->perusahaan ?? null;

        $namaPerusahaan = $perusahaan->nama_perusahaan ?? 'Perusahaan';
        $judulLoker = $loker->judul_loker ?? 'Lowongan Kerja';
        $lokasi = $loker->lokasi ?? '-';
        $tipePekerjaan = $loker->tipe_pekerjaan ?? '-';
        $gaji = $loker->gaji ?? 'Kompetitif';
        $deskripsi = $loker->deskripsi ?? '-';

        $tanggalDeadline = $loker->batas_lamaran
            ? \Carbon\Carbon::parse($loker->batas_lamaran)->format('d M Y')
            : '-';

        $tanggalPublish = $loker->created_at
            ? \Carbon\Carbon::parse($loker->created_at)->diffForHumans()
            : '-';

        $logoPerusahaan = $perusahaan && !empty($perusahaan->logo)
            ? asset('storage/' . $perusahaan->logo)
            : asset('foto_perusahaan/images.png');

        $tentangPerusahaan = $perusahaan->deskripsi ?? 'Informasi perusahaan belum tersedia.';
        $bidangPerusahaan = $perusahaan->bidang ?? 'Company';
        $jumlahKaryawan = $perusahaan->jumlah_karyawan ?? '-';
    @endphp

    <header class="bg-red-brand text-white p-4 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold italic tracking-wider">LOKER SEEKER</h1>
            <nav class="hidden md:flex space-x-6 font-medium">
                <a href="{{ url('/') }}" class="hover:text-yellow-300">Home</a>
                <a href="{{ route('loker.index') }}" class="hover:text-yellow-300 border-b-2 border-yellow-300">Jobs</a>
                <a href="{{ url('/perusahaan') }}" class="hover:text-yellow-300">Company</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8 max-w-5xl">

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl mb-8 font-medium shadow-sm text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-2xl mb-8 font-medium shadow-sm text-sm">
                {{ session('error') }}
            </div>
        @endif
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
            <div class="bg-yellow-brand h-32 w-full"></div> <div class="px-8 pb-8 -mt-12">
                <div class="flex flex-col md:flex-row md:justify-between md:items-end gap-4">
                    <div class="flex flex-col">
                       <img src="{{ $logoPerusahaan }}"  alt="Logo Perusahaan" class="w-24 h-24 rounded-xl border-4 border-white shadow-md bg-white object-contain mb-4">
                        <h2 class="text-3xl font-bold text-gray-800">{{ $judulLoker }}</h2>
                        <p class="text-xl text-red-brand font-semibold">{{ $namaPerusahaan }}</p>
                        
                        <div class="flex flex-wrap gap-4 mt-3 text-gray-500 text-sm">
                            <span><i class="fas fa-map-marker-alt mr-1"></i> {{ $lokasi }}</span>
                            <span><i class="fas fa-briefcase mr-1"></i> {{ $tipePekerjaan }}</span>
                            <span><i class="fas fa-pencil mr-1"></i> Dipublish {{ $tanggalPublish }}</span>
                            <span><i class="fas fa-clock mr-1"></i> {{ $tanggalDeadline }}</span>
                        </div>
                    </div>

                    @auth
                        <a href="{{ route('lamaran.create', $loker->id) }}" class="bg-red-brand hover:bg-red-700 text-white px-10 py-3 rounded-full font-bold shadow-lg transition-all transform hover:scale-105">
                            Apply Now
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="bg-red-brand hover:bg-red-700 text-white px-10 py-3 rounded-full font-bold shadow-lg transition-all transform hover:scale-105">
                            Login untuk Apply
                        </a>
                    @endauth

                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="text-xl font-bold mb-4 border-b-2 border-yellow-brand inline-block">Job Description</h3>

                    <div class="text-gray-600 mt-4 leading-relaxed whitespace-pre-line">
                        {{ $deskripsi }}
                    </div>

                    <h3 class="text-xl font-bold mt-8 mb-4 border-b-2 border-yellow-brand inline-block">Job Requirements</h3>

                    <div class="text-gray-600 mt-4 leading-relaxed">
                        <p>Persyaratan lengkap dapat dilihat pada deskripsi lowongan atau akan diinformasikan oleh perusahaan saat proses seleksi.</p>
                    </div>
                </div>

                <div class="bg-yellow-100 p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="text-xl font-bold mb-6">About the company</h3>
                    <div class="flex items-start gap-4 mb-4">
                       <img src="{{ $logoPerusahaan }}"  alt="Logo" class="rounded-md border">
                        <div>
                            <h4 class="font-bold text-lg">{{ $namaPerusahaan }}</h4>
                            <p class="text-sm text-gray-500">
                                {{ $bidangPerusahaan }} • {{ $jumlahKaryawan }} employees • LOKER SEEKER
                            </p>
                            <p class="text-gray-600 text-sm italic">
                                "{{ $tentangPerusahaan }}"
                            </p>
                        </div>
                    </div>

                    @if($perusahaan)
    <a href="{{ route('perusahaan.detail', $perusahaan->id) }}"
       class="mt-6 inline-block w-full text-center py-2 border-2 border-red-600 text-yellow-600 font-bold rounded-lg hover:bg-blue-50 transition">
        Show more
    </a>
@else
    <a href="{{ route('loker.index') }}"
       class="mt-6 inline-block w-full text-center py-2 border-2 border-red-600 text-yellow-600 font-bold rounded-lg hover:bg-blue-50 transition">
        Show more
    </a>
@endif
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-yellow-brand p-6 rounded-2xl shadow-sm">
                    <h3 class="font-bold text-gray-800 mb-4">Ringkasan Pekerjaan</h3>
                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-700">Tipe Kontrak:</span>
                            <span class="font-bold">{{ $tipePekerjaan }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-700">Gaji:</span>
                            <span class="font-bold text-red-brand">{{ $gaji }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-700">Level:</span>
                            <span class="font-bold">-</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center">
                    <p class="text-sm font-semibold mb-4 text-gray-600">Bagikan lowongan ini:</p>
                    <div class="flex justify-center gap-4">
                        <a href="https://web.facebook.com/?locale=id_ID&_rdc=1&_rdr#" class="text-blue-600 text-xl hover:scale-110 transition"><i class="fab fa-facebook"></i></a>
                         <a href="https://www.instagram.com/" class="text-pink-400 text-xl hover:scale-110 transition"><i class="fab fa-instagram"></i></a>
                        <a href="https://web.whatsapp.com/" class="text-green-500 text-xl hover:scale-110 transition"><i class="fab fa-whatsapp"></i></a>
                        <a href="{{ route('loker.show', $loker->id) }}" class="text-gray-600 text-xl hover:scale-110 transition"><i class="fas fa-link"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-red-800 text-white py-6 mt-12 text-center text-sm">
        <p>&copy; 2026 LOKER SEEKER. Dibuat oleh Mahasiswa USU.</p>
    </footer>

</body>
</html>