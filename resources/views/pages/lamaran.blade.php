<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamaran Kerja</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {

                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },

                    colors: {

                        cream: '#F7F1C8',
                        primary: '#E71F25',
                        dark: '#1B2540',
                        soft: '#FFFDF3',
                    },

                    boxShadow: {
                        custom: '0 15px 40px rgba(0,0,0,0.08)',
                    }

                }
            }
        }
    </script>

</head>

<body class="bg-cream font-poppins text-dark min-h-screen">

    <section class="py-10 px-4 lg:px-6">

        <div class="max-w-5xl mx-auto">

            @if(session('success'))

                <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl mb-8 font-medium shadow-sm text-sm">
                    {{ session('success') }}
                </div>

            @endif

            <div class="mb-10">

                <h1 class="text-4xl lg:text-5xl font-extrabold leading-tight mb-4">
                    <span class="text-dark">
                        Lamaran
                    </span>

                    <span class="text-primary">
                        Kerja
                    </span>
                </h1>

                <p class="text-base lg:text-lg leading-relaxed text-slate-700 max-w-2xl">
                    Pastikan data yang Anda masukkan sudah benar sebelum dikirim.
                </p>
            </div>

            <!-- CARD -->
            <div class="bg-soft rounded-[28px] p-6 lg:p-8 shadow-custom">

                <!-- INFO LOWONGAN -->
                <div class="bg-white rounded-[24px] p-5 shadow-md mb-10 border border-red-100">

                    <div class="flex flex-col lg:flex-row items-start lg:items-center gap-5">

                        <!-- LOGO -->
                        <div class="w-20 h-20 bg-primary rounded-[20px] flex items-center justify-center shadow-md shrink-0">

                            <span class="text-white text-4xl font-extrabold">
                                HL
                            </span>

                        </div>

                        <!-- DETAIL -->
                        <div>

                            <h2 class="text-2xl lg:text-3xl font-extrabold text-primary mb-2 leading-tight">

                                Host Live (Live Streamer)

                            </h2>

                            <p class="text-base text-slate-500 mb-4 font-medium">

                                PT Host Live Indonesia

                            </p>
                            <div class="flex flex-wrap gap-6 text-sm font-medium text-slate-700">

                                <!-- LOKASI -->
                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white shadow-md">
                                        <!-- icon location -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>

                                    <div>
                                        <p class="font-semibold">Bandung, Jawa Barat</p>
                                        <p class="text-xs text-slate-500">Lokasi</p>
                                    </div>

                                </div>

                                <!-- JENIS KERJA -->
                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white shadow-md">
                                        <!-- icon briefcase -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 13V7a2 2 0 00-2-2h-3V3H8v2H5a2 2 0 00-2 2v6m18 0H3m18 0v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6" />
                                        </svg>
                                    </div>

                                    <div>
                                        <p class="font-semibold">Full Time</p>
                                        <p class="text-xs text-slate-500">Jenis Kerja</p>
                                    </div>

                                </div>

                                <!-- DEADLINE -->
                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white shadow-md">
                                        <!-- icon calendar -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>

                                    <div>
                                        <p class="font-semibold">20 Juni 2025</p>
                                        <p class="text-xs text-slate-500">Deadline</p>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- FORM -->
                <form
                    action="{{ route('lamaran.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >

                    @csrf

                    <!-- DATA DIRI -->
                    <div class="mb-12">

                        <h2 class="text-3xl font-extrabold mb-2">

                            Data Diri

                        </h2>

                        <p class="text-slate-500 text-sm mb-8">

                            Lengkapi informasi diri Anda dengan benar.

                        </p>

                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">

                            <!-- NAMA -->
                            <div>

                                <label class="block text-sm font-bold mb-3">

                                    Nama Lengkap

                                </label>

                                <input
                                    type="text"
                                    id="nama"
                                    name="nama"
                                    placeholder="Masukkan nama lengkap"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200"
                                >

                                <p id="namaError" class="text-red-500 text-xs mt-2 hidden">
                                    Nama lengkap wajib diisi
                                </p>

                            </div>

                            <!-- EMAIL -->
                            <div>

                                <label class="block text-sm font-bold mb-3">

                                    Email

                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    placeholder="contoh@email.com"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200"
                                >

                                <p id="emailError" class="text-red-500 text-sm mt-2 hidden">
                                    Email wajib diisi
                                </p>

                            </div>

                            <!-- HP -->
                            <div>

                                <label class="block text-sm font-bold mb-3">

                                    Nomor Handphone

                                </label>

                                <input
                                    type="text"
                                    id="hp"
                                    name="hp"
                                    placeholder="08xxxxxxxxxx"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200"
                                >
                                <p id="hpError" class="text-red-500 text-sm mt-2 hidden">
                                    Nomor handphone wajib diisi
                                </p>

                            </div>

                            <!-- TEMPAT -->
                            <div>

                                <label class="block text-sm font-bold mb-3">

                                    Tempat Lahir

                                </label>

                                <input
                                    type="text"
                                    id="tempat_lahir"
                                    name="tempat_lahir"
                                    placeholder="Masukkan tempat lahir"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200"
                                >

                                <p id="tempat_lahirError" class="text-red-500 text-sm mt-2 hidden">
                                    Tempat lahir wajib diisi
                                </p>

                            </div>

                            <!-- TANGGAL -->
                            <div>

                                <label class="block text-sm font-bold mb-3">

                                    Tanggal Lahir

                                </label>

                                <input
                                    type="date"
                                    id="tanggal_lahir"
                                    name="tanggal_lahir"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200"
                                >

                                <p id="tanggal_lahirError" class="text-red-500 text-sm mt-2 hidden">
                                    Tanggal lahir wajib diisi
                                </p>

                            </div>

                            <!-- GENDER -->
                            <div>

                                <label class="block text-sm font-bold mb-3">

                                    Jenis Kelamin

                                </label>

                                <div class="flex gap-5 pt-3 text-sm font-medium">

                                    <label class="flex items-center gap-2">

                                        <input
                                            type="radio"
                                            id="gender_laki"
                                            name="gender"
                                            value="Laki-laki"
                                            class="accent-red-600"
                                        >

                                        Laki-laki

                                    </label>

                                    <label class="flex items-center gap-2">

                                        <input
                                            type="radio"
                                            id="gender_perempuan"
                                            name="gender"
                                            value="Perempuan"
                                            class="accent-red-600"
                                        >

                                        Perempuan

                                    </label>
                                </div>
                                    
                                    <p id="genderError" class="text-red-500 text-sm mt-2 hidden">
                                        Jenis kelamin wajib dipilih
                                    </p>
                            </div>

                        </div>

                    </div>

                    <!-- DOKUMEN -->
                    <div class="mb-12">

                        <h2 class="text-3xl font-extrabold mb-2">

                            Dokumen

                        </h2>

                        <p class="text-slate-500 text-sm mb-8">

                            Upload dokumen yang diperlukan.

                        </p>

                        <div class="grid md:grid-cols-2 gap-5">

                            <!-- CV -->
                            <div class="bg-white rounded-[22px] p-6 border-2 border-dashed border-red-200 hover:border-primary transition duration-300">
                                
                                <h3 class="text-xl font-bold text-primary mb-2">
                                    Upload CV
                                </h3>

                                <p class="text-slate-500 mb-5 text-sm">
                                    Format PDF, maksimal 2MB
                                </p>

                                <input
                                    type="file"
                                    id="cv"
                                    name="cv"
                                    accept=".pdf"
                                    class="w-full text-sm"
                                >

                                <p id="cvError" class="text-red-500 text-sm mt-2 hidden">
                                    CV wajib diupload (PDF maksimal 2MB)
                                </p>

                                <!-- PREVIEW CV -->
                                <div id="cvPreview" class="hidden mt-5">

                                    <div class="bg-red-50 border border-red-200 rounded-xl p-4">

                                        <p class="text-sm font-semibold text-slate-700 mb-2">
                                            📄 <span id="cvName"></span>
                                        </p>

                                        <a
                                            id="cvLink"
                                            target="_blank"
                                            class="inline-block bg-primary text-white px-4 py-2 rounded-lg text-sm font-semibold hover:opacity-90 transition"
                                        >
                                            Lihat CV
                                        </a>

                                    </div>

                                </div>

                            </div>

                            <!-- FOTO -->
                            <div class="bg-white rounded-[22px] p-6 border-2 border-dashed border-red-200 hover:border-primary transition duration-300">

                                <h3 class="text-xl font-bold text-primary mb-2">
                                    Upload Foto
                                </h3>

                                <p class="text-slate-500 mb-5 text-sm">
                                    Format JPG/PNG, maksimal 2MB
                                </p>

                                <input
                                    type="file"
                                    id="foto"
                                    name="foto"
                                    accept=".jpg,.jpeg,.png"
                                    class="w-full text-sm"
                                >

                                <p id="fotoError" class="text-red-500 text-sm mt-2 hidden">
                                    Foto harus JPG/PNG dan maksimal 2MB
                                </p>

                                <!-- PREVIEW FOTO -->
                                <div class="mt-5">

                                    <img
                                        id="previewFoto"
                                        class="hidden w-40 h-40 object-cover rounded-2xl border border-red-200 shadow-md"
                                    >

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- PORTFOLIO -->
                    <div class="mb-8">

                        <label class="block text-sm font-bold mb-3">

                            Portofolio / Link (Opsional)

                        </label>

                        <input
                            type="text"
                            name="portfolio"
                            placeholder="https://example.com/portfolio"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200"
                        >

                    </div>

                    <!-- MOTIVASI -->
                    <div class="mb-10">

                        <label class="block text-sm font-bold mb-3">

                            Motivasi Melamar (Opsional)

                        </label>

                        <textarea
                            name="motivasi"
                            rows="5"
                            placeholder="Tulis motivasi Anda..."
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-sm resize-none focus:outline-none focus:ring-2 focus:ring-red-200"
                        ></textarea>

                    </div>

                    <!-- BUTTON -->
                    <div class="flex flex-col md:flex-row gap-4 justify-between">

                    <a href="/detail-loker"
                        class="inline-flex items-center justify-center border-2 border-primary text-primary px-7 py-3 rounded-full font-bold text-sm hover:bg-primary hover:text-white transition duration-300">

                        ← Kembali

                    </a>

                        <button
                            type="submit"
                            class="bg-primary text-white px-8 py-3 rounded-full font-bold text-sm shadow-custom hover:scale-105 transition duration-300"
                        >

                            Kirim Lamaran

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </section>

    <script>

    /*
    =========================
    PREVIEW FOTO
    =========================
    */

    document.getElementById('foto').addEventListener('change', function(e) {

        const file = e.target.files[0];

        if(file){

            const reader = new FileReader();

            reader.onload = function(event){

                const preview = document.getElementById('previewFoto');

                preview.src = event.target.result;

                preview.classList.remove('hidden');

            }

            reader.readAsDataURL(file);

        }

    });



    /*
    =========================
    PREVIEW CV PDF
    =========================
    */

    document.getElementById('cv').addEventListener('change', function(e){

        const file = e.target.files[0];

        if(file){
            document.getElementById('cvPreview')
                .classList.remove('hidden');

            document.getElementById('cvName')
                .innerText = file.name;

            const fileURL = URL.createObjectURL(file);

            document.getElementById('cvLink')
                .href = fileURL;

        }

    });


document.querySelector("form").addEventListener("submit", function(e){

    // ======================
    // AMBIL VALUE
    // ======================

    const nama = document.getElementById("nama").value;
    const email = document.getElementById("email").value;
    const hp = document.getElementById("hp").value;
    const tempat = document.getElementById("tempat_lahir").value;
    const tanggal = document.getElementById("tanggal_lahir").value;
    const gender = document.querySelector('input[name="gender"]:checked');
    const cvInput = document.getElementById("cv");
    const fotoInput = document.getElementById("foto");

    // ======================
    // ERROR ELEMENT
    // ======================

    const namaError = document.getElementById("namaError");
    const emailError = document.getElementById("emailError");
    const hpError = document.getElementById("hpError");
    const tempatError = document.getElementById("tempat_lahirError");
    const tanggalError = document.getElementById("tanggal_lahirError");
    const genderError = document.getElementById("genderError");
    const cvError = document.getElementById("cvError");
    const fotoError = document.getElementById("fotoError");

    // ======================
    // RESET ERROR
    // ======================

    namaError.classList.add("hidden");
    emailError.classList.add("hidden");
    hpError.classList.add("hidden");
    tempatError.classList.add("hidden");
    tanggalError.classList.add("hidden");
    genderError.classList.add("hidden");
    cvError.classList.add("hidden");
    fotoError.classList.add("hidden");

    let valid = true;

    // ======================
    // VALIDASI
    // ======================

    if(nama.trim() === ""){

        namaError.classList.remove("hidden");
        valid = false;

    }

    if(email.trim() === ""){

        emailError.classList.remove("hidden");
        valid = false;

    }

    if(hp.trim() === ""){

        hpError.classList.remove("hidden");
        valid = false;

    }

    if(tempat.trim() === ""){

        tempatError.classList.remove("hidden");
        valid = false;

    }

    if(tanggal.trim() === ""){

        tanggalError.classList.remove("hidden");
        valid = false;

    }

    if(!gender){

        genderError.classList.remove("hidden");
        valid = false;

    }

    const cvFile = cvInput.files[0];

    if (!cvFile) {

        cvError.innerText = "CV wajib diupload";
        cvError.classList.remove("hidden");
        valid = false;

    } else {

        // cek format file
        if (cvFile.type !== "application/pdf") {
            cvError.innerText = "CV harus berformat PDF";
            cvError.classList.remove("hidden");
            valid = false;
        }

        // cek ukuran file (2MB)
        if (cvFile.size > 2 * 1024 * 1024) {
            cvError.innerText = "Ukuran CV maksimal 2MB";
            cvError.classList.remove("hidden");
            valid = false;
        }

    }

    const fotoFile = fotoInput.files[0];

    if (fotoFile) {

        // cek format file
        if (!["image/jpeg", "image/png"].includes(fotoFile.type)) {
            fotoError.innerText = "Foto harus JPG/PNG";
            fotoError.classList.remove("hidden");
            valid = false;
        }

        // cek ukuran file (2MB)
        if (fotoFile.size > 2 * 1024 * 1024) {
            fotoError.innerText = "Ukuran foto maksimal 2MB";
            fotoError.classList.remove("hidden");
            valid = false;
        }

    }

    // ======================
    // CEGAH SUBMIT JIKA ERROR
    // ======================

        if(!valid){

            e.preventDefault();

            // cari elemen error pertama yang muncul
            const firstError = document.querySelector(".text-red-500:not(.hidden)");

            if(firstError){

                firstError.scrollIntoView({
                    behavior: "smooth",
                    block: "center"
                });

            }

        }

});

</script>

</body>

</html>