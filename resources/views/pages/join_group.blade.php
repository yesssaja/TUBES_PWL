<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Join Group</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f7f0c8] min-h-screen">

    <!-- Navbar -->
<header class="bg-red-600 text-white p-5 shadow-lg"><!-- Container Utama -->
<div class="bg-yellow-50-100 min-h-screen pb-10">
    
    <!-- HEADER GRUP (Mirip LinkedIn) -->
    <div class="max-w-4xl mx-auto bg-white rounded-b-xl shadow-sm overflow-hidden border border-gray-200">
        <!-- Banner -->
        <div class="h-48 bg-gradient-to-r from-yellow-600 to-yellow-400">
            <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover opacity-50">
        </div>

        <div class="px-6 pb-6">
            <!-- Foto Profil Grup -->
            <div class="-mt-16 mb-4 relative">
                <div class="w-32 h-32 bg-white p-1 rounded-xl shadow-md inline-block">
                    <div class="w-full h-full bg-red-600 rounded-lg flex items-center justify-center text-white text-4xl font-bold">
                        W
                    </div>
                </div>
            </div>

            <!-- Info Grup -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Komunitas Pencari Kerja USU</h1>
                    <div class="flex items-center gap-2 mt-2 text-gray-600">
                        <span class="flex items-center gap-1"><i class="fas fa-globe-asia text-sm"></i> Public group</span>
                        <span>•</span>
                        <span class="font-semibold text-gray-800">8,619 members</span>
                    </div>
                </div>

                <!-- Tombol Join dengan Logic Sederhana -->
                <div x-data="{ joined: false }">
                    <button 
                        @click="joined = !joined"
                        :class="joined ? 'bg-gray-200 text-gray-700' : 'bg-red-600 text-white hover:bg-red-700'"
                        class="px-8 py-2 rounded-full font-bold transition-all transform active:scale-95 shadow-md"
                    >
                        <span x-text="joined ? '✓ Joined' : 'Join'"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- FEED POSTINGAN (Macam Tweet/LinkedIn) -->
    <div class="max-w-2xl mx-auto mt-6 space-y-4">
        
        <!-- Input Post (Tambahan biar interaktif) -->
       <!-- Container Input Postingan -->
<div x-data="{ 
    postText: '', 
    showAdminNotif: false 
}" class="bg-white p-4 rounded-xl shadow-sm border border-gray-200">
    
    <div class="flex gap-3 items-center">
        <!-- Avatar Kuning -->
        <div class="w-10 h-10 rounded-full bg-yellow-400 flex-shrink-0 flex items-center justify-center font-bold text-red-600">
            DI
        </div>
        
        <!-- Input Text -->
        <input 
            x-model="postText"
            type="text" 
            placeholder="Bagikan info loker atau tanya sesuatu..." 
            class="w-full bg-gray-100 rounded-full px-4 py-2 text-black focus:outline-none focus:ring-2 focus:ring-yellow-400 border border-transparent focus:bg-white transition"
        >

        <!-- Tombol Kirim (Merah Brand) -->
        <button 
            @click="if(postText) { showAdminNotif = true; postText = '' }"
            class="bg-[#E74C3C] text-white px-5 py-2 rounded-full font-bold text-sm hover:bg-red-700 transition flex items-center gap-2 shadow-md"
        >
            <span>Post</span>
            <i class="fas fa-paper-plane text-xs"></i>
        </button>
    </div>

    <!-- POP-UP NOTIFIKASI ADMIN (Modal) -->
    <div x-show="showAdminNotif" 
        class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black bg-opacity-60 backdrop-blur-sm"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-cloak>
        
        <div @click.away="showAdminNotif = false" class="bg-white rounded-2xl w-full max-w-sm p-6 shadow-2xl border-t-8 border-[#F4D03F] text-center">
            <!-- Icon Jam / Pending -->
            <div class="w-16 h-16 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                <i class="fas fa-clock"></i>
            </div>
            
            <h3 class="text-xl font-bold text-gray-900 mb-2">Postingan Dikirim!</h3>
            <p class="text-gray-600 text-sm leading-relaxed mb-6">
                Terima kasih, Dian! Postingan kamu akan **direview oleh admin** sebelum ditampilkan di grup komunitas.
            </p>
            
            <button 
                @click="showAdminNotif = false"
                class="w-full bg-[#E74C3C] text-white py-2 rounded-lg font-bold hover:bg-red-700 transition"
            >
                Oke, Mengerti
            </button>
        </div>
    </div>
</div>

        <!-- Contoh Postingan 1 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-4">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden">
                        <img src="https://ui-avatars.com/api/?name=Vanshika+Kawale&background=random" alt="User">
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 leading-tight">Vanshika Kawale <span class="text-gray-400 font-normal text-sm">• 1st</span></h4>
                        <p class="text-xs text-gray-500">Talent Acquisition || HR || 1h ago</p>
                    </div>
                </div>
                
                <p class="text-gray-800 text-sm leading-relaxed mb-4">
                    Hiring: <span class="font-bold text-red-600">Backend Developer (Laravel)</span> | 1-3 Years Experience <br>
                    📍 Location: Medan, Indonesia <br>
                    Ayo teman-teman Kom A-25 yang minat bisa langsung kirim CV ya!
                </p>

                <!-- Action Buttons (Like & Comment) -->
                <div x-data="{ 
                    liked: false, 
                    showCommentInput: false, 
                    commentSent: false, 
                    showModal: false,
                    commentText: ''
                }" class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-6">

    <!-- Konten Postingan (Seperti yang sebelumnya) -->
    <div class="p-4">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden">
                <img src="https://ui-avatars.com/api/?name=Vanshika+Kawale&background=random" alt="User">
            </div>
            <div @click="showModal = true" class="cursor-pointer">
                <h4 class="font-bold text-gray-900 leading-tight">Vanshika Kawale</h4>
                <p class="text-xs text-gray-500">Talent Acquisition • 1h ago</p>
            </div>
        </div>
        <p class="text-gray-800 text-sm mb-4">Hiring: Backend Developer Laravel! Lokasi di Medan ya teman-teman Kom A-25.</p>

        <!-- INFO JUMLAH LIKE/KOMEN (Klik untuk buka Pop-up) -->
        <div class="flex justify-between text-xs text-gray-500 mb-3 px-1">
            <span @click="showModal = true" class="hover:underline cursor-pointer">5 Comments</span>
        </div>

        <!-- BUTTON ACTIONS -->
        <div class="flex items-center border-t pt-3 gap-6">
            <!-- Like Button -->
            <button @click="liked = !liked" 
                :class="liked ? 'text-yellow-600' : 'text-gray-600'"
                class="flex items-center gap-2 font-medium text-sm transition transform active:scale-90">
                <i :class="liked ? 'fas fa-thumbs-up' : 'far fa-thumbs-up'"></i> 
                <span x-text="liked ? 'Liked' : 'Like'"></span>
            </button>

            <!-- Comment Button -->
            <button @click="showCommentInput = !showCommentInput; commentSent = false" 
                class="flex items-center gap-2 text-gray-600 hover:text-yellow-500 font-medium text-sm transition">
                <i class="far fa-comment"></i> Comment
            </button>

        </div>

        <div x-show="showCommentInput && !commentSent" x-transition class="mt-4 flex gap-2">
            <input x-model="commentText" type="text" placeholder="Tulis komentar..." 
               class="w-full bg-gray-100 rounded-lg px-4 py-2 text-sm text-black focus:outline-none ring-1 ring-gray-300 focus:ring-2 focus:ring-yellow-400">
            
            <button @click="if(commentText) { commentSent = true; setTimeout(() => { showCommentInput = false }, 1500) }"
                class="bg-yellow-500 text-black px-4 py-2 rounded-lg text-sm font-bold flex items-center gap-2">
                Send
            </button>
        </div>

        <div x-show="commentSent" x-transition class="mt-4 p-2 bg-green-50 text-green-600 rounded-lg text-sm flex items-center justify-center gap-2 font-bold">
            <i class="fas fa-check-circle"></i> Komentar Terkirim!
        </div>
    </div>

    <div x-show="showModal" 
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100">
        
        <div @click.away="showModal = false" class="bg-white rounded-2xl w-full max-w-md max-h-[80vh] overflow-hidden shadow-2xl">
            <div class="p-4 border-b flex justify-between items-center bg-gray-50">
                <h3 class="font-bold text-lg">Likers & Comments</h3>
                <button @click="showModal = false" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
            </div>
            
            <div class="overflow-y-auto p-4 space-y-4 h-96">
                <!-- List Likers/Comments Dummy -->
                <template x-for="i in 5">
                    <div class="flex items-start gap-3 border-b pb-3">
                        <div class="w-10 h-10 rounded-full bg-yellow-200"></div>
                        <div>
                            <p class="text-sm font-bold">User Ke- <span x-text="i"></span></p>
                            <p class="text-xs text-gray-600 italic">"Keren banget infonya kak!"</p>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>

<!-- Pastikan ada script ini di head atau sebelum penutup body -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
            </div>
            <!-- Footer Info -->
            
        </div>

    </div>
</div>

<<footer class="bg-red-600 text-white py-8 mt-16">
    <div class="text-center">
        <h2 class="text-3xl font-black mb-4">
            LOKER SEEKER🔥
        </h2>

        <p>Email : lokerseeker@gmail.com</p>
        <p>Instagram : @lokerseeker</p>

        <p class="mt-6">
            © 2026 LOKER SEEKER🔥
        </p>
    </div>
</footer>

<script>
    function toggleMenu() {
        document.getElementById('menuDropdown').classList.toggle('hidden');
    }
</script>

</body>
</html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!-- Tambahkan Alpine.js untuk fitur klik tombol (jika belum ada di project) -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>