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
    .star-rating i {
        cursor: pointer;
        transition: color 0.15s ease-in-out, transform 0.1s ease-in-out;
    }
    .star-rating i:hover {
        transform: scale(1.15);
    }
    .text-amber-400 {
        color: #F59E0B;
    }
</style>

<main class="max-w-5xl mx-auto px-4 py-10 text-slate-800">

    <div class="mb-10 text-center">
        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 text-slate-600 text-xs font-semibold tracking-wider uppercase mb-3">
            <i class="fas fa-briefcase text-[10px]"></i> {{ $namaPerusahaan }}
        </div>
        <h1 class="text-3xl font-bold tracking-tight text-slate-900">
            Bagikan Pengalaman Kerja Anda
        </h1>
        <p class="text-slate-500 mt-2 text-sm max-w-md mx-auto">
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
                  class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 lg:p-8">
                @csrf

                <input type="hidden" name="perusahaan_id" value="{{ $perusahaan->id ?? '' }}">
                <input type="hidden" name="rating" id="rating_input" value="{{ old('rating') }}">


                <div class="bg-slate-50 border border-slate-100 rounded-xl p-4 mb-6 flex justify-between items-center">
                    <div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Sasaran Ulasan</span>
                        <h2 class="text-lg font-bold text-slate-900">{{ $namaPerusahaan }}</h2>
                    </div>
                </div>

                <div class="mb-5">
                    <label class="block font-semibold text-slate-700 text-sm mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" 
                           value="{{ old('nama', auth()->user()->name ?? '') }}"
                           placeholder="Masukkan nama asli Anda"
                           class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-slate-900 focus:ring-4 focus:ring-slate-100 outline-none transition text-sm text-slate-900"
                           required>
                </div>

          
                <div class="mb-5">
                    <label class="block font-semibold text-slate-700 text-sm mb-2">Jabatan / Posisi</label>
                    <input type="text" name="posisi" value="{{ old('posisi') }}"
                           placeholder="Contoh: Junior Backend Developer"
                           class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-slate-900 focus:ring-4 focus:ring-slate-100 outline-none transition text-sm text-slate-900">
                </div>

                <div class="mb-6">
                    <label class="block font-semibold text-slate-700 text-sm mb-1">Penilaian Keseluruhan</label>
                    
                    <div class="star-rating flex text-3xl text-slate-200 gap-1.5" id="star_container">
                        <i class="fas fa-star" data-value="1"></i>
                        <i class="fas fa-star" data-value="2"></i>
                        <i class="fas fa-star" data-value="3"></i>
                        <i class="fas fa-star" data-value="4"></i>
                        <i class="fas fa-star" data-value="5"></i>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block font-semibold text-slate-700 text-sm mb-2">Deskripsi Ulasan</label>
                    <textarea name="ulasan" rows="6" 
                              placeholder="Berikan pandangan objektif mengenai budaya kerja, manajemen, kompensasi, serta peluang berkembang..."
                              class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-slate-900 focus:ring-4 focus:ring-slate-100 outline-none transition text-sm text-slate-900"
                              required>{{ old('ulasan') }}</textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full bg-red-600 text-white font-semibold py-3 rounded-xl hover:bg-red-700 transition shadow-sm text-sm active:scale-[0.99] flex items-center justify-center gap-2">
                    <i class="fas fa-paper-plane text-xs"></i> Submit Ulasan
                </button>

            </form>
        </div>

        <!-- Sidebar Guidelines (Right) -->
        <div class="space-y-4">
            
            <!-- Professional Guidelines Box -->
            <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                <h3 class="font-bold text-slate-900 text-sm mb-4 flex items-center gap-2 border-b border-slate-100 pb-3">
                    <i class="fas fa-gavel text-slate-500"></i> Panduan Komunitas
                </h3>
                
                <div class="space-y-4">
                    <div>
                        <span class="inline-block px-2 py-0.5 bg-emerald-50 text-emerald-700 font-bold text-[10px] rounded mb-1.5 uppercase tracking-wider">Dianjurkan</span>
                        <ul class="list-none space-y-2 text-xs text-slate-600 font-medium">
                            <li class="flex items-start gap-1.5">
                                <span class="text-emerald-500 font-bold">✓</span> Berikan ulasan yang jujur berdasarkan pengalaman nyata yang Anda alami.
                            </li>
                            <li class="flex items-start gap-1.5">
                                <span class="text-emerald-500 font-bold">✓</span> Sebutkan poin positif sekaligus ruang perbaikan secara berimbang.
                            </li>
                        </ul>
                    </div>
                    
                    <div>
                        <span class="inline-block px-2 py-0.5 bg-rose-50 text-rose-700 font-bold text-[10px] rounded mb-1.5 uppercase tracking-wider">Dilarang</span>
                        <ul class="list-none space-y-2 text-xs text-slate-600 font-medium">
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

            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 flex gap-3 items-start">
                <i class="fas fa-user-shield text-slate-400 mt-0.5 text-sm"></i>
                <div class="text-xs text-slate-500 leading-relaxed font-medium">
                    <strong class="text-slate-700 block mb-0.5">Enkripsi Identitas</strong>
                    Data akun Anda akan diproses secara aman oleh sistem internal kami untuk melindungi hak privasi pengguna selama masa evaluasi ulasan.
                </div>
            </div>

            <a href="{{ $perusahaan ? route('perusahaan.review', $perusahaan->id) : route('perusahaan.review') }}"
               class="flex items-center justify-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold py-2.5 rounded-xl transition text-xs border border-slate-200">
                <i class="fas fa-arrow-left text-[10px]"></i> Kembali ke Daftar Review
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
                    s.classList.remove('text-slate-200');
                } else {
                    s.classList.remove('text-amber-400');
                    s.classList.add('text-slate-200');
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