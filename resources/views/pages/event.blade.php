<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Festival Event</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    html {
      scroll-behavior: smooth;
    }

    .glow {
      box-shadow: 0 0 30px rgba(255, 77, 0, 0.4);
    }
  </style>
</head>

<body class="bg-gradient-to-b from-yellow-100 via-orange-50 to-red-100 text-gray-800 font-sans">

  <!-- Navbar -->
  <header class="fixed top-0 left-0 w-full bg-red-600 text-white shadow-lg z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-8 py-4">
      
      <h1 class="text-3xl font-black tracking-wide">
        FESTA🔥
      </h1>

      <nav class="hidden md:flex gap-8 font-semibold">
        <a href="#home" class="hover:text-yellow-300 transition">Home</a>
        <a href="#about" class="hover:text-yellow-300 transition">About</a>
        <a href="#schedule" class="hover:text-yellow-300 transition">Schedule</a>
        <a href="#gallery" class="hover:text-yellow-300 transition">Gallery</a>
      </nav>

    </div>
  </header>

  <!-- Hero -->
  <section id="home" class="min-h-screen flex items-center justify-center px-6 pt-24">
    
    <div class="max-w-7xl grid md:grid-cols-2 gap-12 items-center">
      
      <!-- Text -->
      <div>
        <p class="text-red-600 font-bold uppercase tracking-widest mb-3">
          Event Terbesar Tahun Ini
        </p>

        <h2 class="text-5xl md:text-7xl font-black leading-tight mb-6">
          Festival <span class="text-red-600">Kreatif</span> & Hiburan
        </h2>

        <p class="text-lg text-gray-700 leading-relaxed mb-8">
          Nikmati pengalaman event penuh warna, musik, games,
          kuliner, dan hiburan menarik bersama teman-temanmu.
        </p>

        <div class="flex gap-4 flex-wrap">
          <button class="bg-red-600 hover:bg-red-700 transition text-white px-8 py-4 rounded-full font-bold shadow-xl">
            Join Event
          </button>

          <button class="border-2 border-red-600 text-red-600 hover:bg-red-600 hover:text-white transition px-8 py-4 rounded-full font-bold">
            Learn More
          </button>
        </div>
      </div>

      <!-- Image -->
      <div class="relative">
        <img
          src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=1200&auto=format&fit=crop"
          class="rounded-3xl shadow-2xl glow"
          alt="Event"
        />

        <div class="absolute -bottom-6 -left-6 bg-yellow-300 px-6 py-4 rounded-2xl shadow-xl">
          <h3 class="font-black text-2xl">10K+</h3>
          <p class="font-semibold">Pengunjung</p>
        </div>
      </div>

    </div>

  </section>

  <!-- About -->
  <section id="about" class="py-24 px-6">
    
    <div class="max-w-6xl mx-auto text-center">
      
      <h2 class="text-5xl font-black text-red-600 mb-6">
        Tentang Event
      </h2>

      <p class="max-w-3xl mx-auto text-lg text-gray-700 leading-relaxed">
        Event ini menghadirkan berbagai aktivitas menarik mulai dari
        live music, stand makanan, kompetisi, workshop kreatif,
        hingga area hiburan yang cocok untuk semua kalangan.
      </p>

      <div class="grid md:grid-cols-3 gap-8 mt-16">

        <div class="bg-white p-8 rounded-3xl shadow-xl hover:-translate-y-2 transition">
          <div class="text-5xl mb-4">🎵</div>
          <h3 class="text-2xl font-bold mb-3">Live Music</h3>
          <p class="text-gray-600">
            Penampilan musik seru dari berbagai performer terbaik.
          </p>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-xl hover:-translate-y-2 transition">
          <div class="text-5xl mb-4">🍔</div>
          <h3 class="text-2xl font-bold mb-3">Food Festival</h3>
          <p class="text-gray-600">
            Banyak pilihan kuliner unik dan menarik untuk dicoba.
          </p>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-xl hover:-translate-y-2 transition">
          <div class="text-5xl mb-4">🎮</div>
          <h3 class="text-2xl font-bold mb-3">Fun Games</h3>
          <p class="text-gray-600">
            Games dan aktivitas seru dengan hadiah menarik.
          </p>
        </div>

      </div>

    </div>

  </section>

  <!-- Schedule -->
  <section id="schedule" class="py-24 px-6 bg-red-600 text-white">

    <div class="max-w-5xl mx-auto">
      
      <h2 class="text-5xl font-black text-center mb-16">
        Jadwal Event
      </h2>

      <div class="space-y-6">

        <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl flex justify-between items-center">
          <div>
            <h3 class="text-2xl font-bold">Opening Ceremony</h3>
            <p class="text-yellow-200">Main Stage</p>
          </div>

          <span class="font-bold text-xl">09:00</span>
        </div>

        <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl flex justify-between items-center">
          <div>
            <h3 class="text-2xl font-bold">Music Performance</h3>
            <p class="text-yellow-200">Live Concert</p>
          </div>

          <span class="font-bold text-xl">13:00</span>
        </div>

        <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl flex justify-between items-center">
          <div>
            <h3 class="text-2xl font-bold">Fun Competition</h3>
            <p class="text-yellow-200">Game Arena</p>
          </div>

          <span class="font-bold text-xl">16:00</span>
        </div>

      </div>

    </div>

  </section>

  <!-- Gallery -->
  <section id="gallery" class="py-24 px-6">

    <div class="max-w-7xl mx-auto">

      <h2 class="text-5xl font-black text-center text-red-600 mb-16">
        Gallery Event
      </h2>

      <div class="grid md:grid-cols-3 gap-6">

        <img src="https://images.unsplash.com/photo-1506157786151-b8491531f063?q=80&w=1200&auto=format&fit=crop"
          class="rounded-3xl shadow-xl h-80 w-full object-cover hover:scale-105 transition duration-300">

        <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=1200&auto=format&fit=crop"
          class="rounded-3xl shadow-xl h-80 w-full object-cover hover:scale-105 transition duration-300">

        <img src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?q=80&w=1200&auto=format&fit=crop"
          class="rounded-3xl shadow-xl h-80 w-full object-cover hover:scale-105 transition duration-300">

      </div>

    </div>

  </section>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white py-10 text-center">
    <h2 class="text-3xl font-black mb-3">FESTA🔥</h2>
    <p class="text-gray-400">
      © 2026 Event Festival. All Rights Reserved.
    </p>
  </footer>

</body>
</html>