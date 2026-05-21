<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile User</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#fff8dc] min-h-screen py-10 px-5">

    <!-- Container -->
    <div class="max-w-5xl mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden">

        <!-- Header -->
        <div class="bg-gradient-to-r from-red-500 via-red-400 to-yellow-400 p-10">

            <div class="flex flex-col md:flex-row items-center gap-8">

                <!-- Foto -->
                <div>

                    <img
                        src="https://i.pravatar.cc/200"
                        alt="Profile"
                        class="w-40 h-40 rounded-full border-4 border-white shadow-xl object-cover"
                    >

                </div>

                <!-- Info -->
                <div class="text-center md:text-left">

                    <h1 class="text-5xl font-bold text-white">
                        Yessica Jaklin
                    </h1>

                    <p class="text-white text-xl mt-3">
                        Fullstack Web Developer
                    </p>

                    <div class="flex flex-wrap justify-center md:justify-start gap-3 mt-5">

                        <span class="bg-white/20 text-white px-4 py-2 rounded-full">
                            Laravel
                        </span>

                        <span class="bg-white/20 text-white px-4 py-2 rounded-full">
                            TailwindCSS
                        </span>

                        <span class="bg-white/20 text-white px-4 py-2 rounded-full">
                            MySQL
                        </span>

                        <span class="bg-white/20 text-white px-4 py-2 rounded-full">
                            UI/UX
                        </span>

                    </div>

                </div>

            </div>

        </div>

        <!-- Body -->
        <div class="p-10">

            <!-- Title -->
            <div class="mb-8">

                <h2 class="text-3xl font-bold text-red-500">
                    Edit Profile
                </h2>

                <p class="text-gray-500 mt-2">
                    Kelola informasi profile akun anda
                </p>

            </div>

            <!-- Form -->
            <form>

                <div class="grid md:grid-cols-2 gap-6">

                    <!-- Nama -->
                    <div>
                        <label class="block text-red-500 font-semibold mb-2">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            placeholder="Masukkan nama lengkap"
                            value="Yessica Jaklin"
                            class="w-full border-2 border-yellow-300 rounded-2xl p-4 focus:outline-none focus:border-red-400"
                        >
                    </div>

                    <!-- Username -->
                    <div>
                        <label class="block text-red-500 font-semibold mb-2">
                            Username
                        </label>

                        <input
                            type="text"
                            placeholder="Masukkan username"
                            value="yessicaj"
                            class="w-full border-2 border-yellow-300 rounded-2xl p-4 focus:outline-none focus:border-red-400"
                        >
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-red-500 font-semibold mb-2">
                            Email
                        </label>

                        <input
                            type="email"
                            placeholder="Masukkan email"
                            value="yessica@gmail.com"
                            class="w-full border-2 border-yellow-300 rounded-2xl p-4 focus:outline-none focus:border-red-400"
                        >
                    </div>

                    <!-- Nomor HP -->
                    <div>
                        <label class="block text-red-500 font-semibold mb-2">
                            Nomor HP
                        </label>

                        <input
                            type="text"
                            placeholder="Masukkan nomor hp"
                            value="081234567890"
                            class="w-full border-2 border-yellow-300 rounded-2xl p-4 focus:outline-none focus:border-red-400"
                        >
                    </div>

                    <!-- Gender -->
                    <div>
                        <label class="block text-red-500 font-semibold mb-2">
                            Gender
                        </label>

                        <select
                            class="w-full border-2 border-yellow-300 rounded-2xl p-4 focus:outline-none focus:border-red-400"
                        >
                            <option>Laki-laki</option>
                            <option selected>Perempuan</option>
                        </select>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label class="block text-red-500 font-semibold mb-2">
                            Tanggal Lahir
                        </label>

                        <input
                            type="date"
                            value="2005-01-01"
                            class="w-full border-2 border-yellow-300 rounded-2xl p-4 focus:outline-none focus:border-red-400"
                        >
                    </div>

                    <!-- Tempat Lahir -->
                    <div>
                        <label class="block text-red-500 font-semibold mb-2">
                            Tempat Lahir
                        </label>

                        <input
                            type="text"
                            value="Medan"
                            placeholder="Masukkan tempat lahir"
                            class="w-full border-2 border-yellow-300 rounded-2xl p-4 focus:outline-none focus:border-red-400"
                        >
                    </div>

                    <!-- Lokasi -->
                    <div>
                        <label class="block text-red-500 font-semibold mb-2">
                            Lokasi
                        </label>

                        <input
                            type="text"
                            value="Medan, Indonesia"
                            placeholder="Masukkan lokasi"
                            class="w-full border-2 border-yellow-300 rounded-2xl p-4 focus:outline-none focus:border-red-400"
                        >
                    </div>

                </div>

                <!-- Upload -->
                <div class="mt-6">

                    <label class="block text-red-500 font-semibold mb-2">
                        Upload Foto Profile
                    </label>

                    <input
                        type="file"
                        class="w-full border-2 border-yellow-300 rounded-2xl p-4 bg-white"
                    >

                </div>

                <!-- About -->
                <div class="mt-6">

                    <label class="block text-red-500 font-semibold mb-2">
                        Tentang Saya
                    </label>

                    <textarea
                        rows="5"
                        placeholder="Ceritakan tentang diri anda"
                        class="w-full border-2 border-yellow-300 rounded-2xl p-4 focus:outline-none focus:border-red-400"
                    >Saya seorang Fullstack Web Developer yang tertarik pada pengembangan website modern dan desain UI/UX.</textarea>

                </div>

                <!-- Pendidikan -->
                <div class="mt-6">

                    <label class="block text-red-500 font-semibold mb-2">
                        Pendidikan Terakhir
                    </label>

                    <input
                        type="text"
                        value="Universitas ABC"
                        placeholder="Masukkan pendidikan terakhir"
                        class="w-full border-2 border-yellow-300 rounded-2xl p-4 focus:outline-none focus:border-red-400"
                    >

                </div>

                <!-- Skills -->
                <div class="mt-6">

                    <label class="block text-red-500 font-semibold mb-2">
                        Skills
                    </label>

                    <input
                        type="text"
                        value="Laravel, PHP, MySQL, TailwindCSS"
                        placeholder="Pisahkan dengan koma"
                        class="w-full border-2 border-yellow-300 rounded-2xl p-4 focus:outline-none focus:border-red-400"
                    >

                </div>

                <!-- Experience -->
                <div class="mt-6">

                    <label class="block text-red-500 font-semibold mb-2">
                        Pengalaman Kerja
                    </label>

                    <textarea
                        rows="5"
                        placeholder="Masukkan pengalaman kerja"
                        class="w-full border-2 border-yellow-300 rounded-2xl p-4 focus:outline-none focus:border-red-400"
                    >Frontend Developer di PT ABC selama 1 tahun.</textarea>

                </div>

                <!-- Portfolio -->
                <div class="mt-6">

                    <label class="block text-red-500 font-semibold mb-2">
                        Link Portfolio
                    </label>

                    <input
                        type="url"
                        value="https://portfolio.com"
                        placeholder="Masukkan link portfolio"
                        class="w-full border-2 border-yellow-300 rounded-2xl p-4 focus:outline-none focus:border-red-400"
                    >

                </div>

                <!-- CV -->
                <div class="mt-6">

                    <label class="block text-red-500 font-semibold mb-2">
                        Upload CV
                    </label>

                    <input
                        type="file"
                        class="w-full border-2 border-yellow-300 rounded-2xl p-4 bg-white"
                    >

                </div>

                <!-- Buttons -->
                <div class="mt-10 flex flex-col md:flex-row gap-4">

                    <button
                        type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-8 py-4 rounded-2xl font-semibold text-lg shadow-lg transition duration-300"
                    >
                        Simpan Profile
                    </button>

                    <button
                        type="reset"
                        class="bg-yellow-400 hover:bg-yellow-500 text-white px-8 py-4 rounded-2xl font-semibold text-lg shadow-lg transition duration-300"
                    >
                        Reset
                    </button>

                </div>

            </form>

        </div>

    </div>

</body>
</html>

