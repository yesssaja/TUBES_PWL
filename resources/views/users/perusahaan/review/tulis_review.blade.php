@extends('users.perusahaan.layouts.app') 

@section('title', 'Tulis Ulasan | LOKER SEEKER')

@section('content')
@php
    $namaPerusahaan = $perusahaan->nama_perusahaan
        ?? $perusahaan->nama
        ?? 'Perusahaan';

    $industri = $perusahaan->industri
        ?? $perusahaan->bidang
        ?? 'Industri belum diisi';
@endphp

<style>
    .hero-gradient-bg {
        background-image: linear-gradient(to bottom, rgba(244, 208, 63, 0.85), rgba(244, 208, 63, 0.95)), url('{{ asset("perusahaan_1.jpg") }}');
        background-size: cover;
        background-position: center;
    }
    .star-rating i {
        cursor: pointer;
        transition: color 0.15s ease-in-out, transform 0.1s ease-in-out;
    }
    .star-rating i:hover {
        transform: scale(1.2);
    }
    .text-amber-400 {
        color: #F59E0B;
    }
</style>

<section class="hero-gradient-bg py-12 -mt-6">
    <div class="container mx-auto px-4 flex flex-col items-center justify-center gap-4">
        <div class="text-center text-gray-900">
            <h2 class="text-4xl font-extrabold flex items-center justify-center gap-2">
                {{ $namaPerusahaan }}
                <i class="fas fa-check-circle text-blue-500 text-2xl"></i>
            </h2>
        </div>
    </div>
</section>

<main class="max-w-5xl mx-auto mt-8 px-4 pb-20 text-slate-800">

    <div class="mb-8">
        <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">
            Bagikan Ulasan Anda
        </h1>
        <p class="text-gray-500 mt-2 text-base">
            Ulasan yang objektif membantu komunitas talenta digital menentukan langkah karier mereka berikutnya secara tepat.
        </p>
    </div>

    @if($errors->any())
        <div class="bg-red-50 text-red-700 border border-red-100 px-5 py-4 rounded-xl mb-8 text-sm">
            <div class="flex items-center gap-2 font-semibold mb-1">
                <i class="fas fa-exclamation-circle"></i> Mohon periksa kembali inputan Anda:
            </div>
            <ul class="list-disc ml-5 space-y-0.5 text-red-600 opacity-90">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
        
        <div class="lg:col-span-2">
            <form id="reviewForm" action="{{ route('review.store') }}" method="POST"
                  class="bg-white rounded-2xl border border-gray-100 shadow-md p-6 lg:p-8">
                @csrf

                <input type="hidden" name="perusahaan_id" value="{{ $perusahaan->id ?? '' }}">
                <input type="hidden" name="rating" id="rating_input" value="{{ old('rating') }}">

                <div class="mb-6">
                    <label class="block font-bold text-gray-800 text-base mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" 
                           value="{{ old('nama', auth()->user()->name ?? '') }}"
                           placeholder="Masukkan nama asli Anda"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-600 focus:ring-4 focus:ring-red-50 outline-none transition text-base text-gray-900"
                           required>
                </div>

                <div class="mb-6">
                    <label class="block font-bold text-gray-800 text-base mb-2">Jabatan / Posisi</label>
                    <input type="text" name="posisi" value="{{ old('posisi') }}"
                           placeholder="Contoh: Junior Backend Developer"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-600 focus:ring-4 focus:ring-red-50 outline-none transition text-base text-gray-900">
                </div>

                <div class="mb-6 bg-gray-50 border border-gray-100 p-5 rounded-xl">
                    <label class="block font-bold text-gray-800 text-base mb-2">Penilaian Keseluruhan</label>
                    <div class="star-rating flex text-4xl text-gray-200 gap-2 mt-1" id="star_container">
                        <i class="fas fa-star" data-value="1"></i>
                        <i class="fas fa-star" data-value="2"></i>
                        <i class="fas fa-star" data-value="3"></i>
                        <i class="fas fa-star" data-value="4"></i>
                        <i class="fas fa-star" data-value="5"></i>
                    </div>
                </div>

                <div class="mb-8">
                    <label class="block font-bold text-gray-800 text-base mb-2">Deskripsi Ulasan</label>
                    <textarea name="ulasan" rows="6" 
                              placeholder="Berikan pandangan objektif mengenai budaya kerja, manajemen, kompensasi, serta peluang berkembang..."
                              class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-600 focus:ring-4 focus:ring-red-50 outline-none transition text-base text-gray-900"
                              required>{{ old('ulasan') }}</textarea>
                </div>

                <button type="submit"
                        class="w-full bg-red-600 text-white font-bold py-3.5 rounded-xl hover:bg-red-700 transition shadow-md text-base active:scale-[0.99] flex items-center justify-center gap-2 cursor-pointer">
                    <i class="fas fa-paper-plane text-sm"></i> Submit Ulasan
                </button>

            </form>
        </div>

        <div class="space-y-4">
            
            <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-md">
                <h3 class="font-bold text-gray-900 text-base mb-4 flex items-center gap-2 border-b border-gray-100 pb-3">
                    <i class="fas fa-gavel text-gray-500"></i> Panduan Komunitas
                </h3>
                
                <div class="space-y-4">
                    <div>
                        <span class="inline-block px-2.5 py-0.5 bg-emerald-50 text-emerald-700 font-bold text-xs rounded mb-2 uppercase tracking-wider">Dianjurkan</span>
                        <ul class="list-none space-y-2 text-sm text-gray-600 font-medium">
                            <li class="flex items-start gap-1.5">
                                <span class="text-emerald-500 font-bold">✓</span> Berikan ulasan yang jujur berdasarkan pengalaman nyata yang Anda alami.
                            </li>
                            <li class="flex items-start gap-1.5">
                                <span class="text-emerald-500 font-bold">✓</span> Sebutkan poin positif sekaligus ruang perbaikan secara berimbang.
                            </li>
                        </ul>
                    </div>
                    
                    <div>
                        <span class="inline-block px-2.5 py-0.5 bg-rose-50 text-rose-700 font-bold text-xs rounded mb-2 uppercase tracking-wider">Dilarang</span>
                        <ul class="list-none space-y-2 text-sm text-gray-600 font-medium">
                            <li class="flex items-start gap-1.5">
                                <span class="text-rose-500 font-bold">✕</span> Menyebutkan nama individu spesifik demi menjaga privasi personil internal.
                            </li>
                            <li class="flex items-start gap-1.5">
                                <span class="text-rose-500 font-bold">✕</span> Membocorkan data rahasia (*NDA*) atau kekayaan intelektual perusahaan.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5 flex gap-3 items-start">
                <i class="fas fa-user-shield text-gray-400 mt-0.5 text-lg"></i>
                <div class="text-sm text-gray-600 leading-relaxed font-medium">
                    <strong class="text-gray-800 block mb-0.5 text-base">Enkripsi Identitas</strong>
                    Data akun Anda akan diproses secara aman oleh sistem internal kami untuk melindungi hak privasi pengguna selama masa evaluasi ulasan.
                </div>
            </div>

            <a href="{{ $perusahaan ? route('perusahaan.review', $perusahaan->id) : route('perusahaan.review') }}"
               class="flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-3 rounded-xl transition text-sm border border-gray-200">
                <i class="fas fa-arrow-left text-xs"></i> Kembali ke Daftar Review
            </a>
            
        </div>

    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('star_container');
        const stars = container.querySelectorAll('i');
        const hiddenInput = document.getElementById('rating_input');

        const oldValue = parseInt(hiddenInput.value) || 0;
        if (oldValue > 0) {
            updateStars(oldValue);
        }

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const currentRating = parseInt(this.getAttribute('data-value'));
                hiddenInput.value = currentRating;
                updateStars(currentRating);
            });
        });

        function updateStars(value) {
            stars.forEach(s => {
                const starValue = parseInt(s.getAttribute('data-value'));
                if (starValue <= value) {
                    s.classList.add('text-amber-400');
                    s.classList.remove('text-gray-200');
                } else {
                    s.classList.remove('text-amber-400');
                    s.classList.add('text-gray-200');
                }
            });
        }

        document.getElementById('reviewForm').addEventListener('submit', function(e) {
            if (!hiddenInput.value) {
                e.preventDefault();
                alert('Silakan tentukan penilaian bintang Anda terlebih dahulu.');
            }
        });
    });
</script>
@endsection