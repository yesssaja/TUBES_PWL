<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Course</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&display=swap');

        :root {
            --course-yellow: #f6b333;
            --course-red: #d12026;
        }

        body {
            font-family: 'Oswald', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(255, 255, 255, 0.35), transparent 32%),
                radial-gradient(circle at bottom right, rgba(209, 32, 38, 0.18), transparent 34%),
                var(--course-yellow);
            min-height: 100vh;
        }

        .text-c {
            color: var(--course-red);
        }

        .border-c {
            border-color: var(--course-red);
        }

        .bg-c {
            background-color: var(--course-red);
        }

        .course-shadow {
            box-shadow: 6px 8px 0px var(--course-red);
        }

        .course-shadow-sm {
            box-shadow: 4px 5px 0px var(--course-red);
        }

        .btn-course {
            transition: transform 0.2s ease, filter 0.2s ease;
        }

        .btn-course:hover {
            transform: translateY(-2px);
            filter: brightness(0.95);
        }
    </style>
</head>

<body class="p-4 md:p-10 text-gray-900">

<div class="max-w-4xl mx-auto">

    <!-- Header kecil -->
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <a href="{{ route('welcome') }}"
           class="text-c text-3xl font-black uppercase tracking-widest">
            LOKER SEEKER🔥
        </a>

        <a href="{{ route('course.index') }}"
           class="bg-white text-c border-4 border-c px-5 py-3 rounded-2xl font-bold uppercase text-center course-shadow-sm">
            ← Kembali
        </a>

    </div>

    <!-- Card Form -->
    <div class="bg-white rounded-[32px] border-4 border-c p-6 md:p-8 course-shadow">

        <div class="mb-8">

            <div class="inline-flex items-center gap-2 bg-red-50 border-2 border-c text-c px-4 py-2 rounded-full font-bold uppercase text-sm mb-4">
                🎓 Form Pendaftaran
            </div>

            <h1 class="text-c text-4xl md:text-5xl font-bold uppercase leading-tight mb-3">
                Daftar Course
            </h1>

            <p class="text-c font-bold text-xl">
                {{ $course->title }}
            </p>

            <p class="text-c mt-3 leading-relaxed">
                Lengkapi data pendaftaran. Setelah dikirim, permintaan Anda sedang diproses.
            </p>

        </div>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 border-4 border-red-400 px-5 py-4 rounded-2xl mb-6 font-bold">
                <ul class="list-disc ml-5">
                    @foreach($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('course.register', $course->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <!-- Data User -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">

                <div>
                    <label class="block text-c font-bold mb-2 uppercase">
                        Nama
                    </label>

                    <input type="text"
                           value="{{ auth()->user()->name }}"
                           disabled
                           class="w-full border-4 border-c rounded-2xl px-4 py-3 bg-gray-100 text-gray-700 font-semibold">
                </div>

                <div>
                    <label class="block text-c font-bold mb-2 uppercase">
                        Email
                    </label>

                    <input type="email"
                           value="{{ auth()->user()->email }}"
                           disabled
                           class="w-full border-4 border-c rounded-2xl px-4 py-3 bg-gray-100 text-gray-700 font-semibold">
                </div>

            </div>

            <div class="mb-5">
                <label class="block text-c font-bold mb-2 uppercase">
                    No HP / WhatsApp
                </label>

                <input type="text"
                       name="no_hp"
                       value="{{ old('no_hp', $registration->no_hp ?? '') }}"
                       placeholder="Contoh: 081234567890"
                       class="w-full border-4 border-c rounded-2xl px-4 py-3 focus:outline-none focus:ring-4 focus:ring-red-200 font-semibold"
                       required>
            </div>

            <div class="mb-6">
                <label class="block text-c font-bold mb-2 uppercase">
                    Alasan Mengikuti Course
                </label>

                <textarea name="alasan"
                          rows="5"
                          placeholder="Jelaskan alasan kamu mengikuti course ini..."
                          class="w-full border-4 border-c rounded-2xl px-4 py-3 focus:outline-none focus:ring-4 focus:ring-red-200 font-semibold resize-none"
                          required>{{ old('alasan', $registration->alasan ?? '') }}</textarea>
            </div>

            <!-- Pembayaran -->
            @if((bool) ($course->payment_required ?? false) || (float) ($course->price ?? 0) > 0)

                <div class="bg-yellow-50 border-4 border-c rounded-[28px] p-5 md:p-6 mb-6 course-shadow-sm">

                    <h2 class="text-c text-2xl font-bold uppercase mb-4">
                        Informasi Pembayaran
                    </h2>

                    <div class="bg-white border-2 border-c rounded-2xl p-4 mb-4">

                        <p class="text-c font-bold uppercase text-sm">
                            Biaya Course
                        </p>

                        <p class="text-c text-3xl font-black mt-1">
                            Rp {{ number_format($course->price ?? 0, 0, ',', '.') }}
                        </p>

                    </div>

                    <div class="bg-white border-2 border-c rounded-2xl p-4">

                        <p class="text-c font-bold uppercase text-sm mb-2">
                            Metode Pembayaran
                        </p>

                        <p class="text-c text-xl md:text-2xl font-black leading-relaxed">
                            Transfer ke BCA 123456789 a.n LOKER SEEKER
                        </p>

                        <p class="text-c text-sm md:text-base mt-3 font-semibold leading-relaxed">
                            Setelah melakukan pembayaran, upload bukti pembayaran pada form di bawah ini.
                        </p>

                    </div>

                </div>

                <!-- Hidden input supaya tetap masuk ke database -->
                <input type="hidden"
                       name="payment_method"
                       value="Transfer ke BCA 123456789 a.n LOKER SEEKER">

                <div class="mb-6">
                    <label class="block text-c font-bold mb-2 uppercase">
                        Upload Bukti Pembayaran
                    </label>

                    <input type="file"
                           name="proof_image"
                           accept="image/*"
                           class="w-full border-4 border-c rounded-2xl px-4 py-3 bg-white focus:outline-none focus:ring-4 focus:ring-red-200 font-semibold"
                           required>

                    <p class="text-c text-sm mt-2 font-semibold">
                        Format: JPG, JPEG, PNG, WEBP. Maksimal 2MB.
                    </p>
                </div>

            @else

                <div class="bg-green-50 border-4 border-green-400 rounded-2xl p-5 mb-6">
                    <p class="text-green-700 font-bold">
                        Course ini gratis. Kamu tidak perlu upload bukti pembayaran.
                    </p>
                </div>

            @endif

            <!-- Action -->
            <div class="flex flex-col sm:flex-row gap-3">

                <button type="submit"
                        class="btn-course bg-c text-white px-6 py-4 rounded-2xl font-bold uppercase">
                    Kirim Pendaftaran
                </button>

                <a href="{{ route('course.index') }}"
                   class="btn-course bg-gray-800 text-white px-6 py-4 rounded-2xl font-bold uppercase text-center">
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>