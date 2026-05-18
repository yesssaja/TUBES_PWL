<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Join Group | LOKER SEEKER</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { 
            font-family: 'poppins' , sans-serif; 
            background-color: #f7f0c8; 
        }
        .bg-yellow-brand { background-color: #F4D03F; } 
        .bg-red-brand { background-color: #E74C3C; }    
        .text-red-brand { color: #E74C3C; }
    </style>
</head>
<body class="min-h-screen antialiased flex flex-col justify-between" 
    x-data="groupApp()" 
    x-init="initApp()">

    <!-- Navbar Minimalis -->
    <header class="bg-red-brand text-white p-5 shadow-md sticky top-0 z-50">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-extrabold tracking-tighter">LOKER<span class="text-yellow-brand">SEEKER</span></h1>
            
            <!-- SIMULASI GANTI USER -->
            <div class="flex items-center gap-2 bg-black/20 px-3 py-1.5 rounded-xl border border-white/10">
                <span class="text-[10px] uppercase font-bold text-yellow-brand">Acting As:</span>
                <input type="text" x-model="currentUser" class="bg-transparent text-xs font-bold text-white focus:outline-none w-28 border-b border-white/20 pb-0.5">
            </div>
        </div>
    </header>

    <!-- Container Utama -->
    <main class="w-full max-w-4xl mx-auto pb-16 flex-grow">
        
        <!-- HEADER GRUP -->
<div class="bg-white rounded-b-3xl shadow-sm overflow-hidden border border-gray-200/60">

    <div class="h-48 bg-gradient-to-r from-yellow-500 to-yellow-400 relative overflow-hidden">
        <img src="{{ $group->cover_image ?? 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=800&q=80' }}"
             class="w-full h-full object-cover opacity-30 mix-blend-multiply">
    </div>

    <div class="px-8 pb-6">

        <div class="-mt-16 mb-4 relative z-10">
            <div class="w-28 h-28 bg-white p-1.5 rounded-2xl shadow-sm inline-block border border-gray-100">
                <div class="w-full h-full bg-red-brand rounded-xl flex items-center justify-center text-white text-3xl font-extrabold">
                    {{ $group->icon_letter ?? strtoupper(substr($group->name, 0, 1)) }}
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 border border-green-300 px-4 py-3 rounded-xl mb-5">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 text-red-700 border border-red-300 px-4 py-3 rounded-xl mb-5">
                {{ session('error') }}
            </div>
        @endif

        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">

            <div>
                <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">
                    {{ $group->name }}
                </h1>

                <div class="flex items-center gap-2 mt-2 text-xs font-semibold text-gray-500 tracking-wide">
                    <span class="flex items-center gap-1">
                        <i class="fas fa-globe-asia"></i>
                        {{ $group->is_public ? 'Public group' : 'Private group' }}
                    </span>

                    <span>•</span>

                    <span class="text-gray-700">
                        {{ $group->members_count }} members
                    </span>
                </div>

                @if($group->description)
                    <p class="text-sm text-gray-600 mt-3 max-w-xl">
                        {{ $group->description }}
                    </p>
                @endif
            </div>

            <div>
                @auth
                    @if($joined)
                        <form action="{{ route('groups.leave', $group->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="bg-gray-100 text-gray-500 border border-gray-200 px-8 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wider transition-all duration-200">
                                ✓ Joined
                            </button>
                        </form>
                    @else
                        <form action="{{ route('groups.join', $group->slug) }}" method="POST">
                            @csrf

                            <button type="submit"
                                    class="bg-red-brand text-white hover:bg-red-700 px-8 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wider transition-all duration-200">
                                Join Group
                            </button>
                        </form>
                    @endif
                @else
                    <a href="{{ route('login') }}"
                       class="inline-block bg-red-brand text-white hover:bg-red-700 px-8 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wider transition-all duration-200">
                        Login untuk Join
                    </a>
                @endauth
            </div>

        </div>

    </div>
</div>

        <!-- AREA FEED POSTINGAN -->
        <div class="max-w-2xl mx-auto mt-8 space-y-4 px-4 sm:px-0">
            
            <!-- KOTAK INPUT POST -->
            <div x-data="{ postText: '' }" class="bg-white p-4 rounded-2xl border border-gray-200/60 shadow-sm">
                <div class="flex gap-3 items-center">
                    <div class="w-10 h-10 rounded-xl bg-yellow-brand flex-shrink-0 flex items-center justify-center font-extrabold text-red-brand text-xs shadow-sm" x-text="getInitials(currentUser)"></div>
                    
                    <input x-model="postText" @keydown.enter="addNewPost(postText); postText = ''" type="text" placeholder="Bagikan info loker atau tanya sesuatu..." class="w-full bg-gray-50 rounded-xl px-4 py-2.5 text-sm text-gray-900 focus:outline-none border border-transparent focus:border-gray-200 focus:bg-white transition">

                    <button @click="addNewPost(postText); postText = ''" class="bg-red-brand text-white px-5 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wider hover:bg-red-700 transition flex items-center gap-2">
                        <span>Post</span> <i class="fas fa-paper-plane text-[10px]"></i>
                    </button>
                </div>
            </div>

            <!-- LOOPING UTAMA POSTINGAN -->
            <template x-for="(post, index) in posts" :key="post.id">
                <div class="bg-white rounded-2xl border border-gray-200/60 p-5 shadow-sm relative">
                    
                    <!-- TOMBOL REPORT -->
                    <button @click="toggleReport(post.id)" class="absolute top-5 right-5 text-xs font-bold tracking-wider uppercase px-2.5 py-1 rounded-md transition flex items-center gap-1.5" :class="post.reported ? 'text-white bg-red-brand' : 'text-gray-400 hover:text-red-brand bg-gray-50'">
                        <i class="fas fa-flag"></i> <span x-text="post.reported ? 'Reported' : 'Report'"></span>
                    </button>

                    <!-- Header Postingan -->
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-11 h-11 rounded-xl bg-yellow-brand text-red-brand font-extrabold flex items-center justify-center text-xs shadow-sm" x-text="getInitials(post.author)"></div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm leading-tight" x-text="post.author"></h4>
                            <p class="text-[11px] text-gray-400 font-medium tracking-wide uppercase mt-0.5" x-text="formatTime(post.timestamp)"></p>
                        </div>
                    </div>
                    
                    <!-- Konten -->
                    <p class="text-gray-800 text-sm leading-relaxed mb-4 whitespace-pre-line" x-text="post.content"></p>

                    <!-- Info Jumlah Komentar -->
                    <div class="flex justify-between text-[11px] font-bold tracking-wide uppercase text-gray-400 mb-2 px-1">
                        <span @click="post.showComments = !post.showComments" class="cursor-pointer hover:underline text-red-brand">
                            <span x-text="post.comments.length"></span> Comments
                        </span>
                    </div>

                    <!-- Navigasi Utama (Like & Comment) -->
                    <div class="flex items-center border-t border-gray-100 pt-3 gap-6 text-xs font-bold uppercase tracking-wider">
                        <button @click="toggleLike(post.id)" :class="post.liked ? 'text-yellow-600' : 'text-gray-400 hover:text-gray-900'" class="flex items-center gap-2 transition">
                            <i :class="post.liked ? 'fas fa-thumbs-up' : 'far fa-thumbs-up'"></i> Like
                        </button>
                        <button @click="post.showComments = !post.showComments" class="text-gray-400 hover:text-gray-900 flex items-center gap-2 transition">
                            <i class="far fa-comment"></i> Comment
                        </button>
                    </div>

                    <!-- AREA KOLEKSI KOMENTAR (PERBAIKAN: x-show diubah ke post.showComments) -->
                    <div x-show="post.showComments" x-transition class="mt-4 pt-4 border-t border-gray-50 space-y-3">
                        
                        <!-- List Komentar -->
                        <div class="space-y-3 max-h-60 overflow-y-auto pr-1">
                            <template x-for="comment in post.comments" :key="comment.id">
                                <div class="bg-gray-50 p-3 rounded-xl flex items-start gap-3 border border-gray-100">
                                    <div class="w-8 h-8 rounded-lg bg-red-brand/10 text-red-brand font-black flex items-center justify-center text-[10px] flex-shrink-0" x-text="getInitials(comment.author)"></div>
                                    <div class="flex-grow">
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs font-bold text-gray-900" x-text="comment.author"></span>
                                            <span class="text-[9px] font-medium text-gray-400" x-text="formatTime(comment.timestamp)"></span>
                                        </div>
                                        <p class="text-xs text-gray-700 mt-0.5" x-text="comment.content"></p>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <!-- Form Input Komentar Baru -->
                        <div x-data="{ commentText: '' }" class="flex gap-2 mt-2">
                            <input x-model="commentText" @keydown.enter="addComment(post.id, commentText); commentText = ''" type="text" placeholder="Tulis komentar..." class="w-full bg-gray-50 rounded-xl px-4 py-2 text-xs text-gray-900 focus:outline-none border border-transparent focus:border-gray-200 focus:bg-white">
                            <button @click="addComment(post.id, commentText); commentText = ''" class="bg-yellow-brand text-gray-900 px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-yellow-500">
                                Send
                            </button>
                        </div>
                    </div>

                </div>
            </template>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-10 text-center text-xs tracking-wider border-t border-gray-800">
        <div class="max-w-4xl mx-auto space-y-2">
            <h2 class="text-base font-extrabold tracking-tighter text-white mb-4">LOKER SEEKER</h2>
            <p>&copy; 2026 LOKER SEEKER. Dibuat oleh Mahasiswa USU.</p>
        </div>
    </footer>

    <script>
        function groupApp() {
            return {
                currentUser: 'Dian Indriani',
                posts: [],
                nowTime: Date.now(),

                initApp() {
                    const savedPosts = localStorage.getItem('loker_seeker_posts');
                    if (savedPosts) {
                        this.posts = JSON.parse(savedPosts);
                    } else {
                        this.posts = [
                            {
                                id: 1,
                                author: 'Vanshika Kawale',
                                content: 'Hiring: Backend Developer (Laravel) | 1-3 Years Experience \n📍 Location: Medan, Indonesia \nAyo teman-teman Kom A-25 yang minat bisa langsung kirim CV ya!',
                                timestamp: Date.now() - (3600 * 1000),
                                reported: false,
                                liked: false,
                                showComments: false,
                                comments: [
                                    { id: 102, author: 'Aliyah', content: 'Bisa remote atau wajib WFO kak?', timestamp: Date.now() - (900 * 1000) }
                                ]
                            }
                        ];
                        this.saveToStorage();
                    }

                    setInterval(() => {
                        this.nowTime = Date.now();
                    }, 30000);
                },

                saveToStorage() {
                    localStorage.setItem('loker_seeker_posts', JSON.stringify(this.posts));
                },

                addNewPost(text) {
                    if (text.trim() === '') return;
                    this.posts.unshift({
                        id: Date.now(),
                        author: this.currentUser,
                        content: text,
                        timestamp: Date.now(),
                        reported: false,
                        liked: false,
                        showComments: false,
                        comments: []
                    });
                    this.saveToStorage();
                },

                addComment(postId, commentText) {
                    if (commentText.trim() === '') return;
                    const targetPost = this.posts.find(p => p.id === postId);
                    if (targetPost) {
                        targetPost.comments.push({
                            id: Date.now(),
                            author: this.currentUser,
                            content: commentText,
                            timestamp: Date.now()
                        });
                        // Otomatis buka kolom komentar begitu berhasil submit
                        targetPost.showComments = true;
                        this.saveToStorage();
                        
                        // OPSI PENANDA SUKSES: Alert bawaan browser sebagai tanda sukses (bisa dihapus jika mengganggu)
                        alert("Komentar berhasil dikirim!");
                    }
                },

                toggleReport(postId) {
                    const targetPost = this.posts.find(p => p.id === postId);
                    if(targetPost) {
                        targetPost.reported = !targetPost.reported;
                        this.saveToStorage();
                    }
                },
                toggleLike(postId) {
                    const targetPost = this.posts.find(p => p.id === postId);
                    if(targetPost) {
                        targetPost.liked = !targetPost.liked;
                        this.saveToStorage();
                    }
                },

                getInitials(name) {
                    if(!name) return '??';
                    const parts = name.split(' ');
                    return parts.map(p => p[0]).join('').substring(0, 2).toUpperCase();
                },

                formatTime(timestamp) {
                    const diffMs = this.nowTime - timestamp;
                    const diffMins = Math.floor(diffMs / 60000);
                    const diffHours = Math.floor(diffMins / 60);
                    const diffDays = Math.floor(diffHours / 24);

                    if (diffMins < 1) return 'Just now';
                    if (diffMins < 60) return `${diffMins}m ago`;
                    if (diffHours < 24) return `${diffHours}h ago`;
                    return `${diffDays}d ago`;
                }
            }
        }
    </script>
</body>
</html>