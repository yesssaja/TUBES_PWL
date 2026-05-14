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
        body { font-family: 'Poppins', sans-serif; background-color: #fdfdfd; }
        .bg-red-brand { background-color: #E74C3C; }
        .bg-yellow-brand { background-color: #F4D03F; }
        .text-red-brand { color: #E74C3C; }
        .text-yellow-brand { color: #F4D03F; }
        
        /* Star Rating Logic */
        .star-rating i { cursor: pointer; transition: color 0.2s; }
        .star-rating i.active { color: #F4D03F; }
        
        /* Modal Animation */
        .modal { transition: opacity 0.3s ease, visibility 0.3s ease; }
    </style>
</head>
<body class="text-gray-800">

    <main class="max-w-6xl mx-auto px-4 py-12">
        <div class="mb-10 text-center">
            <h1 class="text-3xl font-bold italic"><span class="text-red-brand">Berikan</span> <span class="text-yellow-brand text-4xl underline decoration-red-brand">Feedback</span></h1>
            <p class="text-gray-500 mt-2">Suara Anda membantu pencari kerja lainnya membuat keputusan yang tepat.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Form Input (Kiri) -->
            <div class="lg:col-span-2">
                <form id="reviewForm" class="bg-white rounded-2xl shadow-xl p-8 border-t-8 border-red-brand">
                    
                    <!-- Rating Section -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="space-y-2">
                            <label class="font-semibold block">Gaji</label>
                            <div class="star-rating flex text-2xl text-gray-300" data-category="salary">
                                <i class="fas fa-star" data-value="1"></i>
                                <i class="fas fa-star" data-value="2"></i>
                                <i class="fas fa-star" data-value="3"></i>
                                <i class="fas fa-star" data-value="4"></i>
                                <i class="fas fa-star" data-value="5"></i>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold block">Kultur</label>
                            <div class="star-rating flex text-2xl text-gray-300" data-category="culture">
                                <i class="fas fa-star" data-value="1"></i>
                                <i class="fas fa-star" data-value="2"></i>
                                <i class="fas fa-star" data-value="3"></i>
                                <i class="fas fa-star" data-value="4"></i>
                                <i class="fas fa-star" data-value="5"></i>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold block">Fasilitas</label>
                            <div class="star-rating flex text-2xl text-gray-300" data-category="facility">
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
                        <label class="block font-semibold mb-2">Jabatan Terakhir / Saat Ini</label>
                        <input type="text" placeholder="Contoh: Senior Backend Developer" 
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-brand focus:ring-2 focus:ring-red-100 outline-none transition">
                    </div>

                    <!-- Review Content -->
                    <div class="mb-8">
                        <label class="block font-semibold mb-2">Isi Ulasan <span class="text-gray-400 font-normal">(Opsional)</span></label>
                        <textarea rows="5" placeholder="Ceritakan pengalaman Anda bekerja di perusahaan ini..." 
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-brand focus:ring-2 focus:ring-red-100 outline-none transition"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                        class="w-full bg-red-brand text-white font-bold py-4 rounded-xl hover:bg-red-600 transition-all shadow-lg shadow-red-200 active:scale-95">
                        Kirim Ulasan Sekarang
                    </button>
                </form>
            </div>

            <!-- Pedoman & Info (Kanan) -->
            <div class="space-y-6">
                <div class="bg-yellow-brand rounded-2xl p-6 shadow-lg border-b-4 border-yellow-600">
                    <h3 class="font-bold text-lg mb-4 flex items-center">
                        <i class="fas fa-shield-alt mr-2 text-red-brand"></i> Pedoman Tinjauan
                    </h3>
                    <div class="space-y-4 text-sm">
                        <div>
                            <p class="font-bold text-green-800 uppercase text-xs mb-1">✅ Lakukan:</p>
                            <ul class="list-disc ml-4 text-gray-800 space-y-1">
                                <li>Bagikan pendapat yang jujur</li>
                                <li>Berikan umpan balik yang seimbang</li>
                            </ul>
                        </div>
                        <hr class="border-yellow-600 opacity-20">
                        <div>
                            <p class="font-bold text-red-800 uppercase text-xs mb-1">❌ Jangan:</p>
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
                        <i class="fas fa-info-circle mr-1"></i> Ulasan Anda akan diproses secara anonim untuk menjaga privasi Anda. Tim kami akan memverifikasi ulasan sebelum dipublikasikan.
                    </p>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Success / Admin Notification -->
    <div id="successModal" class="modal fixed inset-0 z-50 flex items-center justify-center opacity-0 invisible bg-black/50 backdrop-blur-sm px-4">
        <div class="bg-white rounded-3xl p-8 max-w-sm w-full text-center shadow-2xl transform transition-all scale-90">
            <div class="w-20 h-20 bg-green-100 text-green-500 rounded-full flex items-center justify-center mx-auto mb-6 text-3xl">
                <i class="fas fa-check-circle"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Ulasan Terkirim!</h2>
            <p class="text-gray-500 mb-6">Terima kasih sudah berbagi. Ulasan kamu akan <strong>diperiksa oleh admin</strong> terlebih dahulu sebelum ditampilkan ke publik.</p>
            <button onclick="closeModal()" class="w-full bg-gray-800 text-white font-bold py-3 rounded-xl hover:bg-black transition">
                Mengerti
            </button>
        </div>
    </div>

    <script>
        // Logika Star Rating
        document.querySelectorAll('.star-rating').forEach(container => {
            const stars = container.querySelectorAll('i');
            stars.forEach(star => {
                star.addEventListener('click', () => {
                    const value = parseInt(star.getAttribute('data-value'));
                    
                    // Reset semua bintang dalam container ini
                    stars.forEach(s => s.classList.remove('active', 'text-yellow-brand'));
                    stars.forEach(s => s.classList.add('text-gray-300'));

                    // Aktifkan bintang sampai urutan yang diklik
                    for(let i = 0; i < value; i++) {
                        stars[i].classList.add('active', 'text-yellow-brand');
                        stars[i].classList.remove('text-gray-300');
                    }
                });
            });
        });

        // Logika Form & Modal
        const form = document.getElementById('reviewForm');
        const modal = document.getElementById('successModal');

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            // Tampilkan Modal
            modal.classList.remove('opacity-0', 'invisible');
            modal.querySelector('div').classList.add('scale-100');
            modal.querySelector('div').classList.remove('scale-90');
        });

        function closeModal() {
            modal.classList.add('opacity-0', 'invisible');
            modal.querySelector('div').classList.add('scale-90');
            modal.querySelector('div').classList.remove('scale-100');
            // Opsional: Redirect atau reset form
            form.reset();
            document.querySelectorAll('.star-rating i').forEach(s => {
                s.classList.remove('active', 'text-yellow-brand');
                s.classList.add('text-gray-300');
            });
        }
    </script>
</body>
</html>