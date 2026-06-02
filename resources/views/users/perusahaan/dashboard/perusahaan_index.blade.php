@extends('users.perusahaan.layouts.app') 

@section('title', 'Daftar Perusahaan | LOKER SEEKER')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #F4D03F, #ffffff, #fef2f2);
            min-height: 100vh;
        }

        .glow-red-card:hover {
            box-shadow: 0 20px 40px rgba(231, 76, 60, 0.15);
        }

        .bg-red-brand {
            background-color: #E74C3C;
        }
        
        /* 1. Efek Klik POP Murni Terpusat (Sesuai Request: Tidak Mereng!) */
        .pop-card-effect {
            transition: transform 0.4s cubic-bezier(0.25, 1, 0.5, 1), box-shadow 0.4s ease;
        }
        
        /* Ketika Di-hover, Naik Lembut Secara Proporsional */
        .pop-card-effect:hover {
            transform: translateY(-6px) scale(1.02);
        }
        
        .pop-card-effect:active {
            transform: translateY(-2px) scale(0.97) !important;
        }

        .shimmer-text {
            background: linear-gradient(to right, #E74C3C 20%, #F4D03F 40%, #F4D03F 60%, #E74C3C 80%);
            background-size: 200% auto;
            color: transparent;
            -webkit-background-clip: text;
            background-clip: text;
            animation: shine 6s linear infinite;
        }

        @keyframes shine {
            to { background-position: 200% center; }
        }
    </style>

    <section class="pt-12 pb-16 px-6">
        <div class="max-w-7xl mx-auto text-center">
            <p data-aos="fade-down" data-aos-duration="1000" class="text-red-600 font-black uppercase tracking-widest mb-3 text-sm">
                — Company Partner —
            </p>
            
            <h2 data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200" class="text-5xl md:text-6xl font-black text-gray-900 mb-5 tracking-tighter leading-tight">
                Daftar Perusahaan <span class="shimmer-text">Bersama</span>
            </h2>
        </div>
    </section>

    <main class="max-w-7xl mx-auto px-6 pb-24">
        <div data-aos="fade-right" data-aos-duration="1000" class="mb-12 flex flex-col md:flex-row justify-between items-center border-b-4 border-yellow-400 pb-4 gap-4">
            <div>
                <h3 class="text-3xl font-black text-gray-900 tracking-tight uppercase">
                     Daftar <span class="text-red-600">Perusahaan</span>
                </h3>
                <p class="text-gray-500 font-medium mt-1">
                    Menampilkan <span class="bg-red-100 text-red-600 px-2 py-0.5 rounded-full font-bold">{{ $perusahaans->count() }}</span> perusahaan terverifikasi.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($perusahaans as $index => $perusahaan)
                @php
                    $namaPerusahaan = $perusahaan->nama_perusahaan
                        ?? $perusahaan->nama
                        ?? $perusahaan->name
                        ?? 'Nama Perusahaan';


                    $alamat = $perusahaan->alamat
                        ?? $perusahaan->lokasi
                        ?? '-';

                    $deskripsi = $perusahaan->deskripsi
                        ?? $perusahaan->description
                        ?? 'Deskripsi perusahaan belum tersedia.';

                    $website = $perusahaan->website
                        ?? $perusahaan->situs
                        ?? null;

                    $logo = $perusahaan->logo
                        ?? $perusahaan->foto
                        ?? $perusahaan->foto_perusahaan
                        ?? null;

                    $logoUrl = null;

                    if ($logo) {
                        if (str_starts_with($logo, 'http://') || str_starts_with($logo, 'https://')) {
                            $logoUrl = $logo;
                        } else {
                            $cleanPath = trim(str_replace('\\', '/', $logo), '/');

                            if (file_exists(public_path($cleanPath))) {
                                $logoUrl = asset($cleanPath);
                            } 
                            elseif (file_exists(public_path('foto_perusahaan/' . $cleanPath))) {
                                $logoUrl = asset('foto_perusahaan/' . $cleanPath);
                            } 
                            elseif (file_exists(public_path('images/' . $cleanPath))) {
                                $logoUrl = asset('images/' . $cleanPath);
                            }
                        }
                    }
                    
                    $totalLoker = \App\Models\Loker::where('perusahaan_id', $perusahaan->id)->count();
                    $totalEvent = \App\Models\Event::where('perusahaan_id', $perusahaan->id)->count();
                    $totalReview = \App\Models\Review::where('perusahaan_id', $perusahaan->id)->count();
                    
                    // Sekarang $cardDelay aman digunakan tanpa menghasilkan eror Undefined
                    $cardDelay = ($index % 3) * 150;
                @endphp

                <div data-aos="fade-up" 
                     data-aos-duration="1100" 
                     data-aos-delay="{{ $cardDelay }}"
                     class="group bg-white rounded-[32px] shadow-xl border border-gray-100 overflow-hidden glow-red-card pop-card-effect flex flex-col justify-between cursor-pointer">
                    
                    <div>
                       <div class="h-36 bg-slate-50 border-b border-gray-100 relative">
                            <div class="absolute -bottom-10 left-6 w-24 h-24 bg-white rounded-2xl shadow-xl border-4 border-white flex items-center justify-center overflow-hidden group-hover:scale-105 transition duration-500 ease-out">
                                <img src="{{ $logoUrl }}"
                                     onerror="this.src='{{ asset('foto_perusahaan/images.png') }}'"
                                     alt="Logo Perusahaan"
                                     class="w-full h-full object-contain p-2">
                            </div>

                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-blue-600 rounded-full px-3 py-1 text-xs font-black shadow-sm flex items-center gap-1">
                                <i class="fas fa-check-circle"></i> Verified
                            </div>
                        </div>

                        <div class="pt-14 px-6 pb-4">
                            <div class="mb-4">
                                <h4 class="text-2xl font-black text-gray-900 tracking-tight group-hover:text-red-600 transition duration-300 line-clamp-1">
                                    {{ $namaPerusahaan }}
                                </h4>
                                <p class="text-sm text-gray-500 font-semibold mt-2 flex items-center">
                                    <i class="fas fa-map-marker-alt text-red-500 mr-2"></i> 
                                    <span class="line-clamp-1">{{ $alamat }}</span>
                                </p>
                            </div>

                            <p class="text-gray-600 text-sm font-medium leading-relaxed mb-6 line-clamp-3">
                                {{ \Illuminate\Support\Str::limit($deskripsi, 120) }}
                            </p>

                            <div class="grid grid-cols-3 gap-3 mb-4">
                                <div class="bg-red-50 rounded-2xl p-2.5 text-center border border-red-100 group-hover:bg-red-100/50 transition duration-300">
                                    <p class="text-lg font-black text-red-600">{{ $totalLoker }}</p>
                                    <p class="text-[10px] text-gray-500 font-bold uppercase tracking-wider">Loker</p>
                                </div>
                                <div class="bg-yellow-50 rounded-2xl p-2.5 text-center border border-yellow-100 group-hover:bg-yellow-100/50 transition duration-300">
                                    <p class="text-lg font-black text-yellow-600">{{ $totalEvent }}</p>
                                    <p class="text-[10px] text-gray-500 font-bold uppercase tracking-wider">Event</p>
                                </div>
                                <div class="bg-orange-50 rounded-2xl p-2.5 text-center border border-orange-100 group-hover:bg-orange-100/50 transition duration-300">
                                    <p class="text-lg font-black text-orange-500">{{ $totalReview }}</p>
                                    <p class="text-[10px] text-gray-500 font-bold uppercase tracking-wider">Review</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-6 pb-6 pt-2 space-y-3 mt-auto">
                        <div class="flex gap-3">
                            <a href="{{ route('perusahaan.detail', $perusahaan->id) }}"
                               class="flex-1 text-center bg-red-brand hover:bg-red-700 active:scale-95 text-white px-4 py-3 rounded-xl font-black text-sm tracking-wide shadow-md transition-all duration-150 transform hover:scale-[1.02]">
                                <i class="fas fa-info-circle mr-1"></i> Detail
                            </a>
                            <a href="{{ route('perusahaan.review', $perusahaan->id) }}"
                               class="flex-1 text-center bg-yellow-400 hover:bg-yellow-500 active:scale-95 text-black px-4 py-3 rounded-xl font-black text-sm tracking-wide shadow-md transition-all duration-150 transform hover:scale-[1.02]">
                                <i class="fas fa-star mr-1"></i> Review
                            </a>
                        </div>

                        @if($website)
                            <a href="{{ str_starts_with($website, 'http') ? $website : 'https://' . $website }}"
                               target="_blank"
                               class="block text-center border-2 border-gray-100 hover:border-red-400 active:scale-[0.98] text-gray-700 hover:text-red-600 px-4 py-2.5 rounded-xl font-bold text-xs transition duration-200">
                                Website Utama <i class="fas fa-external-link-alt ml-1 text-[10px]"></i>
                            </a>
                        @endif
                    </div>

                </div>
            @empty
                <div class="col-span-full bg-white rounded-3xl shadow-xl p-12 text-center">
                    <h3 class="text-3xl font-black text-gray-800">
                        Belum Ada Perusahaan
                    </h3>
                    <p class="text-gray-500 mt-3">
                        Data perusahaan belum tersedia.
                    </p>
                </div>
            @endforelse
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                once: true, // Dipicu sekali saja agar scroll halaman terasa ringan dan tidak lag
                easing: 'cubic-bezier(0.25, 1, 0.5, 1)', // Kurva transisi melambat di akhir (Sangat Smooth & Presisi seperti contoh video)
            });
        });
    </script>
@endsection