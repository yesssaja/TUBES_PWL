<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tawarkan Jasa - Looker Seeker</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Quill -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

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
                        glow: '0 10px 30px rgba(231,31,37,0.18)',

                    }

                }
            }
        }

    </script>

    <style>

        .gradient-border {
            position: relative;
        }

        .gradient-border::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 28px;
            padding: 1px;
            background: linear-gradient(
                135deg,
                rgba(231,31,37,0.2),
                rgba(255,255,255,0.8)
            );

            -webkit-mask:
                linear-gradient(#fff 0 0) content-box,
                linear-gradient(#fff 0 0);

            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }

        .ql-toolbar.ql-snow {

            border: none !important;
            border-bottom: 1px solid #E2E8F0 !important;
            padding: 16px !important;

        }

        .ql-container.ql-snow {

            border: none !important;
            font-family: 'Poppins', sans-serif !important;

        }

        .ql-editor {

            min-height: 220px;
            font-size: 14px;

        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

    </style>

</head>

<body class="bg-cream font-poppins text-dark min-h-screen overflow-x-hidden">

    <!-- BACKGROUND -->
    <div class="fixed inset-0 -z-10 overflow-hidden">

        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-red-200/40 rounded-full blur-3xl"></div>

        <div class="absolute bottom-0 right-0 w-[450px] h-[450px] bg-orange-100 rounded-full blur-3xl"></div>

    </div>

    <section class="py-12 px-4 lg:px-6">

        <div class="max-w-6xl mx-auto">

            <!-- HEADER -->
            <div class="text-center mb-12">

                <!-- ICON -->
                <div class="w-24 h-24 mx-auto mb-8 rounded-[30px] bg-gradient-to-br from-red-500 to-red-400 flex items-center justify-center shadow-glow relative overflow-hidden">

                    <div class="absolute inset-0 opacity-20">

                        <div class="absolute -top-5 -left-5 w-20 h-20 bg-white rounded-full"></div>

                    </div>

                    <!-- SVG -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-12 h-12 text-white relative z-10"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 6v12m6-6H6" />

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19 16.5V7.8a2 2 0 00-.84-1.63l-5-3.57a2 2 0 00-2.32 0l-5 3.57A2 2 0 005 7.8v8.7a2 2 0 002 2h10a2 2 0 002-2z" />

                    </svg>

                </div>

                <h1 class="text-4xl lg:text-6xl font-extrabold mb-5 leading-tight">

                    Tawarkan Jasa <span class="text-primary">Profesionalmu</span>

                </h1>

                <p class="text-slate-500 max-w-2xl mx-auto leading-relaxed text-[15px]">

                    Tampilkan kemampuan terbaikmu dan bangun portfolio profesional
                    agar lebih mudah ditemukan oleh calon klien.

                </p>

            </div>

            <!-- FORM -->
            <div class="bg-soft rounded-[36px] p-6 lg:p-10 shadow-custom gradient-border relative overflow-hidden">

                <!-- DECOR -->
                <div class="absolute top-0 right-0 w-72 h-72 bg-red-100 rounded-full blur-3xl opacity-40"></div>

                <form id="serviceForm"
                    class="relative z-10 space-y-10">

                    <!-- GRID -->
                    <div class="grid lg:grid-cols-2 gap-8">

                        <!-- LEFT -->
                        <div class="space-y-6">

                            <!-- TITLE -->
                            <div class="flex items-center gap-4 mb-2">

                                <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center">

                                    <!-- SVG -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-7 h-7 text-primary"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />

                                    </svg>

                                </div>

                                <div>

                                    <h2 class="text-2xl font-extrabold">

                                        Informasi Jasa

                                    </h2>

                                    <p class="text-sm text-slate-500">

                                        Lengkapi detail jasa profesionalmu

                                    </p>

                                </div>

                            </div>

                            <!-- INPUT -->
                            <div>

                                <label class="block text-sm font-semibold mb-3">

                                    Nama Freelancer

                                </label>

                                <input type="text"
                                    name="freelancer_name"
                                    id="freelancerName"
                                    placeholder="Masukkan nama lengkap"
                                    class="w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200 transition">

                                <p id="freelancerError"
                                    class="text-red-500 text-sm mt-2 hidden">
                                    Silahkan masukkan nama lengkap Anda.   
                                </p>
                            </div>

                            <div>

                                <label class="block text-sm font-semibold mb-3">

                                    Nama Jasa

                                </label>

                                <input type="text"
                                    name="service_name"
                                    id="serviceName"
                                    placeholder="Contoh: Fotografer Wisuda"
                                    class="w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200 transition">

                                <p id="serviceError"
                                    class="text-red-500 text-sm mt-2 hidden">
                                    Silahkan masukkan nama jasa Anda.   
                                </p>

                            </div>

                            <div class="grid md:grid-cols-2 gap-5">

                                <div>

                                    <label class="block text-sm font-semibold mb-3">

                                        Kategori

                                    </label>

                                    <select
                                        name="category"
                                        required
                                        class="w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200 transition">

                                        <option>Pilih Kategori</option>
                                        <option>Fotografi</option>
                                        <option>Video Editing</option>
                                        <option>Desain Grafis</option>
                                        <option>Musik & Audio</option>

                                    </select>

                                </div>

                                <div>

                                    <label class="block text-sm font-semibold mb-3">

                                        Harga Mulai Dari

                                    </label>

                                    <input type="number"
                                        name="priceInput"
                                        id="priceInput"
                                        placeholder="Contoh: 35000"
                                        class="w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200 transition">
                                    
                                    <p id="priceError"
                                        class="text-red-500 text-sm mt-2 hidden">
                                        Silahkan masukkan harga jasa Anda.
                                    </p>
                                </div>

                            </div>

                            <div>

                                <label class="block text-sm font-semibold mb-3">

                                    Lokasi

                                </label>

                                <input type="text"
                                    name="location"
                                    id="locationInput"
                                    placeholder="Contoh: Medan"
                                    class="w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200 transition">
                                <p id="locationError"
                                    class="text-red-500 text-sm mt-2 hidden">
                                    Silahkan masukkan lokasi Anda.
                                </p>
                            </div>

                            <!-- EDITOR -->
                            <div>

                                <label class="block text-sm font-semibold mb-3">

                                    Deskripsi Jasa

                                </label>

                                <div class="bg-white rounded-[24px] overflow-hidden border border-red-100 shadow-sm">

                                    <div id="editor"></div>

                                </div>

                            </div>

                        </div>

                        <!-- RIGHT -->
                        <div class="space-y-8">

                            <!-- MEDIA -->
                            <div class="bg-white rounded-[30px] p-6 border border-red-100 shadow-sm">

                                <div class="flex items-center gap-4 mb-6">

                                    <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center">

                                        <!-- SVG -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-7 h-7 text-primary"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M3 16l5-5c.928-.893 2.072-.893 3 0l5 5m0 0l2-2c.928-.893 2.072-.893 3 0M13 8h.01" />

                                        </svg>

                                    </div>

                                    <div>

                                        <h2 class="text-2xl font-extrabold">

                                            Media & Portfolio

                                        </h2>

                                        <p class="text-sm text-slate-500">

                                            Upload tepat 5 gambar terbaikmu

                                        </p>

                                    </div>

                                </div>

                                <!-- UPLOAD -->
                                <label for="portfolioInput"
                                    class="border-2 border-dashed border-red-200 hover:border-primary transition duration-300 rounded-[28px] p-8 flex flex-col items-center justify-center text-center cursor-pointer bg-[#FFF9F9]">

                                    <div class="w-20 h-20 rounded-full bg-red-100 flex items-center justify-center mb-5 shadow-md">

                                        <!-- SVG -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-10 h-10 text-primary"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M12 11v6m0 0l-3-3m3 3l3-3" />

                                        </svg>

                                    </div>

                                    <h3 class="text-lg font-bold text-primary mb-2">

                                        Upload Gambar Portfolio

                                    </h3>

                                    <p class="text-sm text-slate-500">

                                        PNG, JPG atau WEBP (maks. 2MB)

                                    </p>

                                    <p class="text-xs text-slate-400 mt-2">

                                        Wajib upload tepat 5 gambar

                                    </p>

                                    <!-- INPUT -->
                                    <input type="file"
                                        id="portfolioInput"
                                        accept="image/*"
                                        multiple
                                        class="hidden">

                                </label>

                                <!-- ERROR -->
                                <p id="uploadError"
                                    class="text-red-500 text-sm mt-4 hidden">

                                    Error upload

                                </p>

                                <!-- PREVIEW -->
                                <div id="previewContainer"
                                    class="grid grid-cols-5 gap-3 mt-6">


                                </div>

                            </div>

                            <!-- TAMBAHAN -->
                            <div class="bg-white rounded-[30px] p-6 border border-red-100 shadow-sm">

                                <h2 class="text-2xl font-extrabold mb-6">

                                    Informasi Tambahan

                                </h2>

                                <div class="space-y-5">

                                    <div>

                                        <label class="block text-sm font-semibold mb-3">

                                            Pengalaman Kerja

                                        </label>

                                        <input type="text"
                                            name="work_experience"
                                            id="experienceInput"
                                            placeholder="Masukkan berapa lama pengalaman Anda bekerja"  
                                            class="w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200 transition">
                                        <p id="experienceError"
                                            class="text-red-500 text-sm mt-2 hidden">
                                            Silahkan masukkan pengalaman kerja Anda.
                                        </p>
                                    </div>

                                    <!-- BAHASA YANG DIKUASAI -->
                                    <div>

                                        <label class="block text-sm font-semibold mb-3">

                                            Bahasa yang Dikuasai

                                        </label>

                                        <!-- WRAPPER -->
                                        <div class="bg-white border border-red-100 rounded-2xl p-4 shadow-sm">

                                            <!-- HASIL PILIHAN -->
                                            <div id="selectedLanguages"
                                                class="flex flex-wrap gap-2 mb-4">

                                            </div>

                                            <!-- SELECT -->
                                            <select id="languageSelect"
                                                class="w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200 transition">

                                                <option value="">Pilih Bahasa</option>

                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Inggris">Inggris</option>
                                                <option value="Mandarin">Mandarin</option>
                                                <option value="Spanyol">Spanyol</option>
                                                <option value="Jepang">Jepang</option>
                                                <option value="Korea">Korea</option>
                                                <option value="Arab">Arab</option>
                                                <option value="Prancis">Prancis</option>
                                                <option value="Jerman">Jerman</option>
                                                <option value="Hindi">Hindi</option>
                                                <option value="Rusia">Rusia</option>
                                                <option value="Portugis">Portugis</option>
                                                <option value="Italia">Italia</option>
                                                <option value="Turki">Turki</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Belanda">Belanda</option>
                                                <option value="Vietnam">Vietnam</option>
                                                <option value="Yunani">Yunani</option>
                                                <option value="Polandia">Polandia</option>
                                                <option value="Swedia">Swedia</option>
                                                <option value="manual">Lainnya (Ketik Manual)</option>

                                            </select>

                                            <!-- INPUT MANUAL -->
                                            <div id="manualInputWrapper"
                                                class="hidden mt-4">

                                                <input
                                                    type="text"
                                                    id="manualLanguage"
                                                    placeholder="Masukkan bahasa lainnya..."
                                                    class="w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200 transition">

                                            </div>

                                        </div>

                                    </div>

                                    <div>

                                        <label class="block text-sm font-semibold mb-3">

                                            Skill / Keahlian

                                        </label>

                                        <input type="text"
                                            name="skills"
                                            id="skillsInput"
                                            placeholder="Contoh: fotografi, editing, retouch, photoshop"
                                            class="w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200 transition">
                                        <p id="skillsError"
                                            class="text-red-500 text-sm mt-2 hidden">
                                            Silahkan masukkan skill atau keahlian Anda.
                                        </p>
                                    </div>
                                    <!-- INFORMASI KONTAK -->
                                    <div class="pt-2">

                                        <h3 class="text-xl font-extrabold mb-5">
                                            Informasi Kontak
                                        </h3>

                                        <div class="space-y-5">

                                            <!-- WHATSAPP -->
                                            <div>

                                                <label class="block text-sm font-semibold mb-3">
                                                    Nomor WhatsApp
                                                </label>

                                                <div class="flex gap-3">

                                                    <!-- SELECT NEGARA -->
                                                    <select id="countryCode"
                                                        class="w-[140px] px-4 py-4 rounded-2xl border border-red-100 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200 transition">

                                                        <option value="+62">🇮🇩 +62</option>
                                                        <option value="+1">🇺🇸 +1</option>
                                                        <option value="+60">🇲🇾 +60</option>
                                                        <option value="+65">🇸🇬 +65</option>
                                                        <option value="+81">🇯🇵 +81</option>

                                                    </select>

                                                    <!-- INPUT NOMOR -->
                                                    <input
                                                        type="tel"
                                                        id="whatsappNumber"
                                                        name="whatsapp"
                                                        placeholder="81234567890"
                                                        class="flex-1 px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200 transition">

                                                </div>

                                                <!-- ERROR -->
                                                <p id="waError"
                                                    class="text-red-500 text-sm mt-2 hidden">

                                                    Nomor WhatsApp wajib diisi.

                                                </p>

                                            </div>

                                            <!-- EMAIL -->
                                            <div>

                                                <label class="block text-sm font-semibold mb-3">
                                                    Email Aktif
                                                </label>

                                                <input
                                                    type="email"
                                                    id="emailInput"
                                                    name="email"
                                                    placeholder="contoh@email.com"
                                                    class="w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200 transition">

                                                <!-- ERROR -->
                                                <p id="emailError"
                                                    class="text-red-500 text-sm mt-2 hidden">

                                                    Format email tidak valid.

                                                </p>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <div class="pt-4">

                        <button type="submit"
                            class="w-full bg-primary hover:bg-red-700 text-white py-5 rounded-full font-bold text-sm shadow-glow hover:scale-[1.01] transition duration-300">

                            Publikasikan Jasa

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </section>

    <!-- QUILL -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // =====================================================
    // QUILL EDITOR
    // =====================================================

    const quill = new Quill('#editor', {
        theme: 'snow',
        placeholder: 'Berikan detail jasa yang kamu tawarkan...',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline'],
                [{ 'align': [] }],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                ['link'],
                ['clean']
            ]
        }
    });

    // =====================================================
    // UPLOAD IMAGE
    // =====================================================

    const input = document.getElementById('portfolioInput');
    const preview = document.getElementById('previewContainer');
    const error = document.getElementById('uploadError');

    let uploadedFiles = [];

    input.addEventListener('change', function () {

        error.classList.add('hidden');

        const newFiles = Array.from(this.files);

        // VALIDASI MAX 5
        if (uploadedFiles.length + newFiles.length > 5) {
            error.innerText = 'Maksimal hanya 5 gambar.';
            error.classList.remove('hidden');
            input.value = '';
            return;
        }

        // LOOP FILE
        newFiles.forEach(file => {

            // VALIDASI SIZE
            if (file.size > 2 * 1024 * 1024) {
                error.innerText = `File "${file.name}" melebihi 2MB.`;
                error.classList.remove('hidden');
                return;
            }

            // SIMPAN FILE
            uploadedFiles.push(file);

            // FILE READER
            const reader = new FileReader();

            reader.onload = function (e) {

                // CARD IMAGE
                const div = document.createElement('div');

                div.className = `
                    relative aspect-square rounded-[22px]
                    overflow-hidden border-2 border-red-100
                    shadow-md group bg-white
                `;

                div.innerHTML = `
                    <!-- IMAGE -->
                    <img 
                        src="${e.target.result}"
                        class="w-full h-full object-cover transition duration-300 group-hover:scale-110 cursor-pointer"
                    >

                    <!-- OVERLAY -->
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition duration-300"></div>

                    <!-- REMOVE BUTTON -->
                    <button
                        type="button"
                        class="absolute top-2 right-2 w-8 h-8 rounded-full bg-white/90 backdrop-blur flex items-center justify-center shadow-lg hover:bg-red-500 hover:text-white transition"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                `;

                // REMOVE IMAGE
                const removeBtn = div.querySelector('button');

                removeBtn.addEventListener('click', function () {
                    uploadedFiles = uploadedFiles.filter(f => f !== file);
                    div.remove();
                });

                // MASUKKAN PREVIEW
                preview.appendChild(div);
            };

            reader.readAsDataURL(file);
        });

        // RESET INPUT
        input.value = '';
    });

    // =====================================================
    // SELECT BAHASA
    // =====================================================

    const languageSelect = document.getElementById('languageSelect');
    const selectedLanguages = document.getElementById('selectedLanguages');
    const manualInputWrapper = document.getElementById('manualInputWrapper');
    const manualLanguage = document.getElementById('manualLanguage');

    let selectedList = [];

    // TAMBAH BADGE
    function addLanguage(language) {

        // CEGAH DUPLIKAT
        if (selectedList.includes(language)) return;

        selectedList.push(language);

        const badge = document.createElement('div');

        badge.className = `
            flex items-center gap-2 px-4 py-2
            bg-red-100 text-primary text-xs
            font-bold rounded-full border border-red-200
        `;

        badge.innerHTML = `
            <span>${language.toUpperCase()}</span>

            <button
                type="button"
                class="text-primary hover:text-red-700 text-sm font-bold"
            >
                ✕
            </button>
        `;

        // REMOVE BADGE
        const removeBtn = badge.querySelector('button');

        removeBtn.addEventListener('click', function () {
            selectedList = selectedList.filter(item => item !== language);
            badge.remove();
        });

        selectedLanguages.appendChild(badge);
    }

    // SELECT OPTION
    languageSelect.addEventListener('change', function () {

        const value = this.value;

        // INPUT MANUAL
        if (value === 'manual') {
            manualInputWrapper.classList.remove('hidden');
        }

        // TAMBAH BAHASA
        else if (value !== '') {
            addLanguage(value);
            manualInputWrapper.classList.add('hidden');
            manualLanguage.value = '';
        }

        this.value = '';
    });

    // INPUT MANUAL ENTER
    manualLanguage.addEventListener('keydown', function (e) {

        if (e.key === 'Enter') {

            e.preventDefault();

            const value = this.value.trim();

            if (value !== '') {
                addLanguage(value);
                this.value = '';
            }
        }
    });

// =====================================================
// SUBMIT FORM
// =====================================================

const serviceForm = document.getElementById('serviceForm');
const successModal = document.getElementById('successModal');

serviceForm.addEventListener('submit', function (e) {

    e.preventDefault();

    const freelancerName = document.getElementById('freelancerName');
    const freelancerError = document.getElementById('freelancerError');

    const serviceName = document.getElementById('serviceName');
    const serviceError = document.getElementById('serviceError');

    const locationInput = document.getElementById('locationInput');
    const locationError = document.getElementById('locationError');

    const priceInput = document.getElementById('priceInput');
    const priceError = document.getElementById('priceError');

    const experienceInput = document.getElementById('experienceInput');
    const experienceError = document.getElementById('experienceError');

    const skillsInput = document.getElementById('skillsInput');
    const skillsError = document.getElementById('skillsError');

    const waInput = document.getElementById('whatsappNumber');
    const waError = document.getElementById('waError');

    const emailInput = document.getElementById('emailInput');
    const emailError = document.getElementById('emailError');

    let hasError = false;

    // VALIDASI NAMA FREELANCER
    if (freelancerName.value.trim() === '') {
        freelancerError.classList.remove('hidden');
        hasError = true;
    } else {
        freelancerError.classList.add('hidden');
    }

    // VALIDASI NAMA JASA
    if (serviceName.value.trim() === '') {
        serviceError.classList.remove('hidden');
        hasError = true;
    } else {
        serviceError.classList.add('hidden');
    }

    // VALIDASI LOKASI
    if (locationInput.value.trim() === '') {
        locationError.classList.remove('hidden');
        hasError = true;
    } else {
        locationError.classList.add('hidden');
    }

    // VALIDASI HARGA
    if (priceInput.value.trim() === '') {
        priceError.classList.remove('hidden');
        hasError = true;
    } else {
        priceError.classList.add('hidden');
    }

    // VALIDASI PENGALAMAN
    if (experienceInput.value.trim() === '') {
        experienceError.classList.remove('hidden');
        hasError = true;
    } else {
        experienceError.classList.add('hidden');
    }

    // VALIDASI SKILL
    if (skillsInput.value.trim() === '') {
        skillsError.classList.remove('hidden');
        hasError = true;
    } else {
        skillsError.classList.add('hidden');
    }

    // VALIDASI JUMLAH GAMBAR
    if (uploadedFiles.length !== 5) {
        error.innerText = 'Anda wajib upload tepat 5 gambar.';
        error.classList.remove('hidden');
        hasError = true;
    } else {
        error.classList.add('hidden');
    }

    // VALIDASI WHATSAPP
    if (waInput.value.trim() === '') {
        waError.classList.remove('hidden');
        hasError = true;
    } else {
        waError.classList.add('hidden');
    }

    // VALIDASI EMAIL
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(emailInput.value)) {
        emailError.classList.remove('hidden');
        hasError = true;
    } else {
        emailError.classList.add('hidden');
    }

    // STOP JIKA ADA ERROR
    if (hasError) return;

    // FORMAT NOMOR WHATSAPP
    const countryCode = document.getElementById('countryCode').value;
    const fullWhatsapp = countryCode + waInput.value;

    console.log("WhatsApp:", fullWhatsapp);
    console.log("Email:", emailInput.value);

    // TAMPILKAN MODAL SUCCESS
    successModal.classList.remove('hidden');
    successModal.classList.add('flex');

});

});
</script>

<!-- ========================================= -->
<!-- SUCCESS MODAL -->
<!-- ========================================= -->

<div id="successModal"
    class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50 p-5">

    <div class="bg-white rounded-[36px] p-8 max-w-md w-full text-center shadow-2xl animate-[fadeIn_.3s_ease]">

        <!-- ICON -->
        <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-green-100 flex items-center justify-center">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-12 h-12 text-green-600"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M5 13l4 4L19 7" />

            </svg>

        </div>

        <!-- TITLE -->
        <h2 class="text-3xl font-extrabold mb-3 text-dark">

            Jasa Berhasil Dipublikasikan

        </h2>

        <!-- DESC -->
        <p class="text-slate-500 text-sm leading-relaxed mb-8">

            Jasa yang Anda tawarkan berhasil dipublikasikan
            dan sekarang dapat dilihat oleh pengguna lain.

        </p>

        <!-- BUTTON -->
        <a href="/service"
            class="inline-flex items-center justify-center w-full bg-primary hover:bg-red-700 text-white py-4 rounded-full font-bold text-sm shadow-glow transition duration-300">

            Kembali ke Halaman Service

        </a>

    </div>

</div>
</body>
</html>