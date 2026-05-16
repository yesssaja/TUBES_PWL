<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Loker Seeker Event</title>

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

<body class="bg-gradient-to-b from-yellow-500 via-orange-50 to-red-100 text-gray-800 font-sans">

  <!-- Navbar -->
  <header class="fixed top-0 left-0 w-full bg-red-600 text-white shadow-lg z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-8 py-4">
      
      <h1 class="text-3xl font-black tracking-wide">
        LOKER SEEKER🔥
      </h1>

      //NNT SESUAIKAN SAMA DASHBOARD
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
          Seminar <span class="text-red-600">Karir</span> & Job Fair
        </h2>

        <p class="text-lg text-gray-700 leading-relaxed mb-8">
          Dapatkan pengalaman event penuh pengalaman, tantangan,
          tips & trick, dan hal menarik untuk pengembagan karirmu.
        </p>

        <div class="flex gap-4 flex-wrap">
          <button class="bg-red-600 hover:bg-red-700 transition text-white px-8 py-4 rounded-full font-bold shadow-xl">
            See the Event
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
          <h3 class="font-black text-2xl">100Rb</h3>
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
        stan perusahaan, konsultasi, workshop & seminar karir,
        hingga area wawancara on-the-spot yang cocok untuk pengembangan karirmu.
      </p>

      <div class="grid md:grid-cols-3 gap-8 mt-16">

        <div class="bg-white p-8 rounded-3xl shadow-xl hover:-translate-y-2 transition">
          <div class="text-5xl mb-4">🏢</div>
          <h3 class="text-2xl font-bold mb-3">Stan Perusahaan</h3>
          <p class="text-gray-600">
             Perusahaan membuka stan untuk mengumpulkan CV, 
             memberikan informasi lowongan, dan melakukan screening awal.
          </p>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-xl hover:-translate-y-2 transition">
          <div class="text-5xl mb-4">📜</div>
          <h3 class="text-2xl font-bold mb-3">Seminar</h3>
          <p class="text-gray-600">
            Banyak pilihan workshop dan seminar yang dapat diikuti
            peserta guna meningkatkan kemampuan soft skill atau wawancara peserta.
          </p>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-xl hover:-translate-y-2 transition">
          <div class="text-5xl mb-4">🤝</div>
          <h3 class="text-2xl font-bold mb-3">Wawancara</h3>
          <p class="text-gray-600">
             Banyak perusahaan melakukan seleksi awal melalui proses
             wawancara singkat yang dilakukan secara langsung di lokasi.
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

        <!-- Card 1 -->
        <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl flex justify-between items-center">

          <div>
            <!-- Kategori -->
            <span class="bg-yellow-400 text-red-700 text-sm font-bold px-4 py-1 rounded-full">
              Workshop
            </span>

            <h3 class="text-2xl font-bold mt-3">
              Bringing Your AI Models to Life
            </h3>

            <p class="text-yellow-200">
              Main Stage
            </p>
          </div>

          <div class="flex items-center gap-5">
            <span class="font-bold text-xl">09:00 - Finished</span>

            <a href="/rsvp"
               class="bg-yellow-400 hover:bg-yellow-300 text-red-700 font-bold px-5 py-2 rounded-full transition duration-300 hover:scale-105 shadow-lg">
              RSVP
            </a>
          </div>

        </div>

        <!-- Card 2 -->
        <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl flex justify-between items-center">

          <div>
            <!-- Kategori -->
            <span class="bg-yellow-400 text-red-700 text-sm font-bold px-4 py-1 rounded-full">
              Seminar
            </span>

            <h3 class="text-2xl font-bold mt-3">
              Navigating the Software Engineering Industry 
            </h3>

            <p class="text-yellow-200">
              Live / Online
            </p>
          </div>

          <div class="flex items-center gap-5">
            <span class="font-bold text-xl">13:30 - Finished</span>

            <a href="/rsvp"
               class="bg-yellow-400 hover:bg-yellow-300 text-red-700 font-bold px-5 py-2 rounded-full transition duration-300 hover:scale-105 shadow-lg">
              RSVP
            </a>
          </div>

        </div>

        <!-- Card 3 -->
        <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl flex justify-between items-center">

          <div>
            <!-- Kategori -->
            <span class="bg-yellow-400 text-red-700 text-sm font-bold px-4 py-1 rounded-full">
              Competition
            </span>

            <h3 class="text-2xl font-bold mt-3">
              Essay Competition : Digital Inovation for Local Impact
            </h3>

            <p class="text-yellow-200">
              Game Arena
            </p>
          </div>

          <div class="flex items-center gap-5">
            <span class="font-bold text-xl">16:00 - Finished</span>

            <a href="/rsvp"
               class="bg-yellow-400 hover:bg-yellow-300 text-red-700 font-bold px-5 py-2 rounded-full transition duration-300 hover:scale-105 shadow-lg">
              RSVP
            </a>
          </div>

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
    <h2 class="text-3xl font-black mb-3">LOKER SEEKER🔥</h2>
    <p class="text-gray-400">
      © 2026 Event Festival. All Rights Reserved.
    </p>
  </footer>

</body>
</html>