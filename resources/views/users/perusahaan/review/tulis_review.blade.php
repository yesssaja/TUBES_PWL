@extends('users.layouts.app')

@section('title', 'Tulis Ulasan | LOKER SEEKER')

@section('content')

@php
    $namaPerusahaan = $perusahaan->nama_perusahaan
        ?? $perusahaan->nama
        ?? 'Perusahaan';

    $industri = $perusahaan->industri
        ?? $perusahaan->bidang
        ?? 'Industri belum diisi';

    $alamat = $perusahaan->alamat
        ?? 'Alamat belum diisi';
@endphp

<style>
    .hero-gradient-bg {
        background: linear-gradient(135deg, #ef4444 0%, #f97316 45%, #facc15 100%);
    }

    .star-rating i {
        cursor: pointer;
        transition: color .18s ease, transform .18s ease;
    }

    .star-rating i:hover {
        transform: translateY(-3px) scale(1.15);
    }

    .text-amber-400 {
        color: #f59e0b;
    }
</style>

{{-- HERO --}}
<section class="hero-gradient-bg py-8 md:py-10">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-center gap-5 md:gap-8">

            {{-- LOGO --}}
            <div class="w-24 h-24 md:w-28 md:h-28 bg-white rounded-[28px] shadow-lg flex items-center justify-center overflow-hidden shrink-0">

                @if(!empty($perusahaan->logo))
                    <img src="{{ asset($perusahaan->logo) }}"
                         alt="{{ $namaPerusahaan }}"
                         class="w-full h-full object-contain p-4"
                         onerror="this.onerror=null; this.src='{{ asset('images/default-company.png') }}';">
                @else
                    <span class="text-red-600 text-4xl font-black">
                        {{ strtoupper(substr($namaPerusahaan, 0, 1)) }}
                    </span>
                @endif

            </div>

            {{-- TEXT --}}
            <div class="text-white min-w-0">
                <h1 class="text-3xl md:text-5xl font-black leading-tight break-words">
                    {{ $namaPerusahaan }}
                </h1>

                <p class="mt-2 text-base md:text-lg text-white/90 font-semibold break-words">
                    {{ $alamat }}
                </p>
            </div>

        </div>

    </div>
</section>

<main class="max-w-6xl mx-auto mt-6 relative z-20 px-4 pb-20">

    <div class="bg-[#FFFDF8] rounded-[36px] shadow-2xl p-5 sm:p-7 md:p-10">

        {{-- TITLE --}}
        <div class="mb-8">
            <h1 class="text-3xl md:text-4xl font-black tracking-tight text-gray-900">
                Bagikan Ulasan Anda
            </h1>

            <p class="text-gray-500 mt-2 max-w-3xl leading-relaxed">
                Ulasan yang objektif membantu komunitas talenta digital menentukan langkah karier mereka berikutnya secara tepat.
            </p>
        </div>

        {{-- ERROR --}}
        @if($errors->any())
            <div class="bg-red-50 text-red-700 border border-red-100 px-5 py-4 rounded-2xl mb-8 text-sm shadow-sm">
                <div class="flex items-center gap-2 font-black mb-2">
                    <i class="fas fa-exclamation-circle"></i>
                    Mohon periksa kembali inputan Anda:
                </div>

                <ul class="list-disc ml-5 space-y-1 text-red-600">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-[1.8fr_0.9fr] gap-8 items-start">

           {{-- FORM --}}
        <div>
        
            @guest
                <div class="bg-white rounded-[32px] border border-yellow-100 shadow-lg p-8 text-center">
                    <div class="w-16 h-16 mx-auto mb-5 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600 text-2xl">
                        <i class="fas fa-lock"></i>
                    </div>
                
                    <h2 class="text-2xl font-black text-gray-900 mb-3">
                        Belum Login
                    </h2>
                
                    <p class="text-gray-500 mb-6 leading-relaxed">
                        Login terlebih dahulu untuk memberikan ulasan dan rating terhadap perusahaan ini.
                    </p>
                
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center justify-center bg-red-600 hover:bg-red-700 text-white font-black px-7 py-3.5 rounded-2xl transition">
                        Login Sekarang
                    </a>
                </div>
            @endguest
            
            @auth
                <form id="reviewForm"
                      action="{{ route('review.tulis.store') }}"
                      method="POST"
                      class="bg-white rounded-[32px] border border-gray-100 shadow-lg p-5 sm:p-7 lg:p-8">
            
                    @csrf
            
                    <input type="hidden" name="perusahaan_id" value="{{ $perusahaan->id ?? '' }}">
                    <input type="hidden" name="rating" id="rating_input" value="{{ old('rating') }}">
            
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
                    
                        <div>
                            <label class="block font-black text-gray-800 text-sm mb-2">
                                Nama Lengkap
                            </label>
                        
                            <input type="text"
                                   name="nama"
                                   value="{{ old('nama', auth()->user()->name ?? '') }}"
                                   placeholder="Masukkan nama asli Anda"
                                   class="w-full px-4 py-3.5 rounded-2xl border border-gray-200 focus:border-red-600 focus:ring-4 focus:ring-red-50 outline-none transition text-sm text-gray-900"
                                   required>
                        </div>
                    
                        <div>
                            <label class="block font-black text-gray-800 text-sm mb-2">
                                Jabatan / Posisi
                            </label>
                        
                            <input type="text"
                                   name="posisi"
                                   value="{{ old('posisi') }}"
                                   placeholder="Contoh: Junior Backend Developer"
                                   class="w-full px-4 py-3.5 rounded-2xl border border-gray-200 focus:border-red-600 focus:ring-4 focus:ring-red-50 outline-none transition text-sm text-gray-900">
                        </div>
                    
                    </div>
                
                    {{-- RATING --}}
                    <div class="mb-6 bg-[#FFF7E8] border border-yellow-100 p-5 rounded-[28px]">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div>
                                <label class="block font-black text-gray-800 text-sm mb-1">
                                    Penilaian Keseluruhan
                                </label>
                            
                                <p class="text-xs text-gray-500">
                                    Pilih jumlah bintang sesuai pengalaman Anda.
                                </p>
                            </div>
                        
                            <div class="flex text-4xl gap-2" id="star_container">
                                @for($i = 1; $i <= 5; $i++)
                                    <button type="button"
                                            class="star-btn text-gray-300 hover:scale-110 transition"
                                            data-value="{{ $i }}">
                                        ★
                                    </button>
                                @endfor
                            </div>
                        </div>
                    </div>
                
                    {{-- ULASAN --}}
                    <div class="mb-8">
                        <label class="block font-black text-gray-800 text-sm mb-2">
                            Deskripsi Ulasan
                        </label>
                    
                        <textarea name="ulasan"
                                  rows="7"
                                  placeholder="Berikan pandangan objektif mengenai budaya kerja, manajemen, kompensasi, serta peluang berkembang..."
                                  class="w-full px-4 py-4 rounded-2xl border border-gray-200 focus:border-red-600 focus:ring-4 focus:ring-red-50 outline-none transition text-sm text-gray-900 resize-none"
                                  required>{{ old('ulasan') }}</textarea>
                    </div>
                
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-red-600 to-red-700 text-white font-black py-4 rounded-2xl hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 text-base active:scale-[0.99] flex items-center justify-center gap-2 cursor-pointer">
                        <i class="fas fa-paper-plane text-sm"></i>
                        Submit Ulasan
                    </button>
                
                </form>
            @endauth
            
        </div>

            {{-- SIDEBAR INFO --}}
            <div class="space-y-5">

                <div class="bg-white border border-gray-100 rounded-[32px] p-6 shadow-lg">

                    <h3 class="font-black text-gray-900 text-lg mb-5 flex items-center gap-2 border-b border-gray-100 pb-4">
                        <i class="fas fa-gavel text-red-500"></i>
                        Panduan Komunitas
                    </h3>

                    <div class="space-y-6">

                        <div>
                            <span class="inline-block px-3 py-1 bg-emerald-50 text-emerald-700 font-black text-xs rounded-full mb-3 uppercase tracking-wider">
                                Dianjurkan
                            </span>

                            <ul class="space-y-3 text-sm text-gray-600 font-medium">
                                <li class="flex items-start gap-2">
                                    <span class="text-emerald-500 font-black">✓</span>
                                    <span>Berikan ulasan yang jujur berdasarkan pengalaman nyata.</span>
                                </li>

                                <li class="flex items-start gap-2">
                                    <span class="text-emerald-500 font-black">✓</span>
                                    <span>Sebutkan poin positif dan ruang perbaikan secara berimbang.</span>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <span class="inline-block px-3 py-1 bg-rose-50 text-rose-700 font-black text-xs rounded-full mb-3 uppercase tracking-wider">
                                Dilarang
                            </span>

                            <ul class="space-y-3 text-sm text-gray-600 font-medium">
                                <li class="flex items-start gap-2">
                                    <span class="text-rose-500 font-black">✕</span>
                                    <span>Menyebutkan nama individu spesifik demi menjaga privasi.</span>
                                </li>

                                <li class="flex items-start gap-2">
                                    <span class="text-rose-500 font-black">✕</span>
                                    <span>Membocorkan data rahasia atau informasi internal perusahaan.</span>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>

                <div class="bg-red-50 border border-red-100 rounded-[28px] p-5 flex gap-3 items-start">

                    <div class="w-11 h-11 rounded-2xl bg-white flex items-center justify-center text-red-600 shrink-0">
                        <i class="fas fa-user-shield"></i>
                    </div>

                    <div class="text-sm text-gray-600 leading-relaxed font-medium">
                        <strong class="text-gray-900 block mb-1 text-base">
                            Privasi Terjaga
                        </strong>
                        Data akun Anda diproses secara aman untuk menjaga kenyamanan komunitas.
                    </div>

                </div>

                <a href="{{ $perusahaan ? route('perusahaan.review', $perusahaan->id) : route('perusahaan.review') }}"
                   class="flex items-center justify-center gap-2 bg-white hover:bg-gray-50 text-gray-700 font-black py-4 rounded-2xl transition text-sm border border-gray-100 shadow-sm no-underline">
                    <i class="fas fa-arrow-left text-xs"></i>
                    Kembali ke Daftar Review
                </a>

            </div>

        </div>

    </div>

</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.star-btn');
    const ratingInput = document.getElementById('rating_input');
    const form = document.getElementById('reviewForm');

    if (!form || !ratingInput || stars.length === 0) {
        return;
    }

    let selectedRating = parseInt(ratingInput.value) || 0;

    function updateStars(rating) {
        stars.forEach(star => {
            const value = parseInt(star.dataset.value);

            if (value <= rating) {
                star.classList.remove('text-gray-300');
                star.classList.add('text-yellow-400');
            } else {
                star.classList.remove('text-yellow-400');
                star.classList.add('text-gray-300');
            }
        });
    }

    updateStars(selectedRating);

    stars.forEach(star => {
        star.addEventListener('click', function () {
            selectedRating = parseInt(this.dataset.value);
            ratingInput.value = selectedRating;
            updateStars(selectedRating);
        });
    });

    form.addEventListener('submit', function (e) {
        if (!ratingInput.value) {
            e.preventDefault();
            alert('Silakan tentukan penilaian bintang terlebih dahulu.');
        }
    });
});
</script>

@endsection