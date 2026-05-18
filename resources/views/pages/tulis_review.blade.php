<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tulis Ulasan | LOKER SEEKER</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fdfdfd;
        }

        .bg-red-brand {
            background-color: #E74C3C;
        }

        .bg-yellow-brand {
            background-color: #F4D03F;
        }

        .text-red-brand {
            color: #E74C3C;
        }

        .text-yellow-brand {
            color: #F4D03F;
        }

        .star-rating i {
            cursor: pointer;
            transition: color 0.2s;
        }

        .star-rating i.active {
            color: #F4D03F;
        }

        .modal {
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
    </style>
</head>

@php
    $namaPerusahaan = $perusahaan->nama_perusahaan
        ?? $perusahaan->nama
        ?? $perusahaan->name
        ?? 'Perusahaan';

    $industri = $perusahaan->industri
        ?? $perusahaan->industry
        ?? $perusahaan->bidang
        ?? 'Industri belum diisi';
@endphp

<body class="bg-gradient-to-b from-yellow-500 via-orange-50 to-red-100 text-gray-800 font-sans">

    <main class="max-w-6xl mx-auto px-4 py-12">

        <div class="mb-10 text-center">
            <h1 class="text-3xl font-bold italic">
                <span class="text-red-brand">Berikan</span>
                <span class="text-red-brand text-4xl underline decoration-red-brand">Feedback</span>
            </h1>

            <p class="text-gray-500 mt-2">
                Suara Anda membantu pencari kerja lainnya membuat keputusan yang tepat.
            </p>
        </div>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 border border-red-300 px-5 py-4 rounded-2xl mb-6">
                <ul class="list-disc ml-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-100 text-green-700 border border-green-300 px-5 py-4 rounded-2xl mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Form Input -->
            <div class="lg:col-span-2">

                <form id="reviewForm"
                      action="{{ route('review.store') }}"
                      method="POST"
                      class="bg-white rounded-2xl shadow-xl p-8 border-t-8 border-red-brand">

                    @csrf

                    <input type="hidden" name="perusahaan_id" value="{{ $perusahaan->id ?? '' }}">

                    <input type="hidden" name="rating" id="rating" value="{{ old('rating') }}">
                    <input type="hidden" name="rating_gaji" id="rating_gaji" value="{{ old('rating_gaji') }}">
                    <input type="hidden" name="rating_kultur" id="rating_kultur" value="{{ old('rating_kultur') }}">
                    <input type="hidden" name="rating_fasilitas" id="rating_fasilitas" value="{{ old('rating_fasilitas') }}">

                    <!-- Info Perusahaan -->
                    <div class="bg-yellow-100 border border-yellow-300 rounded-2xl p-5 mb-8">

                        <p class="text-sm font-bold text-red-brand uppercase tracking-widest mb-1">
                            Review untuk perusahaan
                        </p>

                        <h2 class="text-2xl font-black text-gray-900">
                            {{ $namaPerusahaan }}
                        </h2>

                        <p class="text-gray-600 mt-1">
                            {{ $industri }}
                        </p>

                    </div>

                    <!-- Nama Reviewer -->
                    <div class="mb-6">
                        <label class="block font-semibold mb-2">
                            Nama
                        </label>

                        <input type="text"
                               name="nama"
                               value="{{ old('nama', auth()->user()->name ?? '') }}"
                               placeholder="Nama kamu"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-brand focus:ring-2 focus:ring-red-100 outline-none transition"
                               required>
                    </div>

                    <!-- Rating Section -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                        <div class="space-y-2">
                            <label class="font-semibold block">Gaji</label>

                            <div class="star-rating flex text-2xl text-gray-300"
                                 data-input="rating_gaji">

                                <i class="fas fa-star" data-value="1"></i>
                                <i class="fas fa-star" data-value="2"></i>
                                <i class="fas fa-star" data-value="3"></i>
                                <i class="fas fa-star" data-value="4"></i>
                                <i class="fas fa-star" data-value="5"></i>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="font-semibold block">Kultur</label>

                            <div class="star-rating flex text-2xl text-gray-300"
                                 data-input="rating_kultur">

                                <i class="fas fa-star" data-value="1"></i>
                                <i class="fas fa-star" data-value="2"></i>
                                <i class="fas fa-star" data-value="3"></i>
                                <i class="fas fa-star" data-value="4"></i>
                                <i class="fas fa-star" data-value="5"></i>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="font-semibold block">Fasilitas</label>

                            <div class="star-rating flex text-2xl text-gray-300"
                                 data-input="rating_fasilitas">

                                <i class="fas fa-star" data-value="1"></i>
                                <i class="fas fa-star" data-value="2"></i>
                                <i class="fas fa-star" data-value="3"></i>
                                <i class="fas fa-star" data-value="4"></i>
                                <i class="fas fa-star" data-value="5"></i>
                            </div>
                        </div>

                    </div>

                    <!-- Job Title -->
                    <div class="mb-6">
                        <label class="block font-semibold mb-2">
                            Jabatan Terakhir / Saat Ini
                        </label>

                        <input type="text"
                               name="posisi"
                               value="{{ old('posisi') }}"
                               placeholder="Contoh: Senior Backend Developer"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-brand focus:ring-2 focus:ring-red-100 outline-none transition">
                    </div>

                    <!-- Review Content -->
                    <div class="mb-8">
                        <label class="block font-semibold mb-2">
                            Isi Ulasan
                        </label>

                        <textarea name="ulasan"
                                  rows="5"
                                  placeholder="Ceritakan pengalaman Anda bekerja di perusahaan ini..."
                                  class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-brand focus:ring-2 focus:ring-red-100 outline-none transition"
                                  required>{{ old('ulasan') }}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="w-full bg-red-brand text-white font-bold py-4 rounded-xl hover:bg-red-600 transition-all shadow-lg shadow-red-200 active:scale-95">
                        Kirim Ulasan Sekarang
                    </button>

                </form>
            </div>

            <!-- Pedoman & Info -->
            <div class="space-y-6">

                <div class="bg-yellow-brand rounded-2xl p-6 shadow-lg border-b-4 border-yellow-600">

                    <h3 class="font-bold text-lg mb-4 flex items-center">
                        <i class="fas fa-shield-alt mr-2 text-red-brand"></i>
                        Pedoman Tinjauan
                    </h3>

                    <div class="space-y-4 text-sm">

                        <div>
                            <p class="font-bold text-green-800 uppercase text-xs mb-1">
                                ✅ Lakukan:
                            </p>

                            <ul class="list-disc ml-4 text-gray-800 space-y-1">
                                <li>Bagikan pendapat yang jujur</li>
                                <li>Berikan umpan balik yang seimbang</li>
                            </ul>
                        </div>

                        <hr class="border-yellow-600 opacity-20">

                        <div>
                            <p class="font-bold text-red-800 uppercase text-xs mb-1">
                                ❌ Jangan:
                            </p>

                            <ul class="list-disc ml-4 text-gray-800 space-y-1">
                                <li>Sebutkan orang-orang tertentu</li>
                                <li>Gunakan bahasa yang agresif</li>
                                <li>Bagikan informasi rahasia</li>
                            </ul>
                        </div>

                    </div>

                </div>

                <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6">
                    <p class="text-xs text-blue-600 leading-relaxed italic">
                        <i class="fas fa-info-circle mr-1"></i>
                        Ulasan Anda akan diproses secara anonim untuk menjaga privasi Anda.
                        Tim kami akan memverifikasi ulasan sebelum dipublikasikan.
                    </p>
                </div>

                <a href="{{ $perusahaan ? route('perusahaan.review', $perusahaan->id) : route('perusahaan.review') }}"
                   class="block text-center bg-gray-800 text-white font-bold py-3 rounded-xl hover:bg-black transition">
                    Lihat Review
                </a>

            </div>

        </div>
    </main>

    <script>
        function setStars(container, value) {
            const stars = container.querySelectorAll('i');

            stars.forEach(star => {
                star.classList.remove('active', 'text-yellow-brand');
                star.classList.add('text-gray-300');
            });

            for (let i = 0; i < value; i++) {
                stars[i].classList.add('active', 'text-yellow-brand');
                stars[i].classList.remove('text-gray-300');
            }
        }

        function updateAverageRating() {
            const gaji = parseFloat(document.getElementById('rating_gaji').value) || 0;
            const kultur = parseFloat(document.getElementById('rating_kultur').value) || 0;
            const fasilitas = parseFloat(document.getElementById('rating_fasilitas').value) || 0;

            if (gaji > 0 && kultur > 0 && fasilitas > 0) {
                const average = ((gaji + kultur + fasilitas) / 3).toFixed(1);
                document.getElementById('rating').value = average;
            }
        }

        document.querySelectorAll('.star-rating').forEach(container => {
            const inputId = container.getAttribute('data-input');
            const hiddenInput = document.getElementById(inputId);
            const oldValue = parseInt(hiddenInput.value) || 0;

            if (oldValue > 0) {
                setStars(container, oldValue);
            }

            const stars = container.querySelectorAll('i');

            stars.forEach(star => {
                star.addEventListener('click', () => {
                    const value = parseInt(star.getAttribute('data-value'));

                    hiddenInput.value = value;

                    setStars(container, value);
                    updateAverageRating();
                });
            });
        });

        document.getElementById('reviewForm').addEventListener('submit', function(e) {
            const rating = document.getElementById('rating').value;
            const ratingGaji = document.getElementById('rating_gaji').value;
            const ratingKultur = document.getElementById('rating_kultur').value;
            const ratingFasilitas = document.getElementById('rating_fasilitas').value;

            if (!rating || !ratingGaji || !ratingKultur || !ratingFasilitas) {
                e.preventDefault();
                alert('Mohon isi semua rating: Gaji, Kultur, dan Fasilitas.');
            }
        });
    </script>

</body>
</html>