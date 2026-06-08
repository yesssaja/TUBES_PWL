@extends('users.layouts.app')

@section('title', 'Daftar Course')

@section('content')

<main class="min-h-screen bg-gradient-to-br from-red-50 via-white to-yellow-50 p-4 md:p-10">

    <div class="max-w-5xl mx-auto">

        {{-- TOP NAV --}}
        <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <a href="{{ route('welcome') }}"
               class="text-red-600 text-3xl font-black tracking-tight">
                LOKER SEEKER
            </a>

            <a href="{{ route('course.index') }}"
               class="inline-flex items-center justify-center bg-white hover:bg-red-50 text-red-600 border border-red-100 px-5 py-3 rounded-2xl font-black shadow-sm transition">
                ← Kembali
            </a>
        </div>

        {{-- FORM CARD --}}
        <div class="bg-white rounded-[2rem] border border-gray-100 shadow-2xl overflow-hidden">

            {{-- HEADER --}}
            <div class="relative overflow-hidden bg-gradient-to-br from-red-600 via-orange-500 to-yellow-400 p-8 md:p-10 text-white">
                <div class="absolute -top-16 -right-16 w-52 h-52 bg-white/20 rounded-full blur-2xl"></div>
                <div class="absolute -bottom-16 -left-16 w-52 h-52 bg-white/10 rounded-full blur-2xl"></div>

                <div class="relative">
                    <div class="inline-flex items-center gap-2 bg-white/20 px-5 py-2 rounded-full font-black text-sm mb-5">
                        🎓 Form Pendaftaran
                    </div>

                    <h1 class="text-4xl md:text-5xl font-black leading-tight">
                        Daftar Course
                    </h1>

                    <p class="text-white/90 mt-4 text-xl font-bold">
                        {{ $course->title }}
                    </p>

                    <p class="text-white/90 mt-3 leading-relaxed max-w-2xl">
                        Lengkapi data pendaftaran. Setelah dikirim, permintaan kamu akan diproses.
                    </p>
                </div>
            </div>

            <div class="p-6 md:p-8">

                {{-- ERROR --}}
                @if($errors->any())
                    <div class="bg-red-50 text-red-700 border border-red-200 px-5 py-4 rounded-2xl mb-6 font-bold">
                        <ul class="list-disc ml-5 space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- COURSE INFO --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                    <div class="bg-red-50 rounded-3xl p-5">
                        <p class="text-xs text-red-400 font-black uppercase tracking-wide">
                            Course
                        </p>
                        <p class="text-gray-900 font-black mt-2">
                            {{ $course->title }}
                        </p>
                    </div>

                    <div class="bg-yellow-50 rounded-3xl p-5">
                        <p class="text-xs text-yellow-600 font-black uppercase tracking-wide">
                            Biaya
                        </p>
                        <p class="text-gray-900 font-black mt-2">
                            @if((float)($course->price ?? 0) > 0)
                                Rp {{ number_format($course->price, 0, ',', '.') }}
                            @else
                                Gratis
                            @endif
                        </p>
                    </div>

                    <div class="bg-gray-50 rounded-3xl p-5">
                        <p class="text-xs text-gray-400 font-black uppercase tracking-wide">
                            Status
                        </p>
                        <p class="text-gray-900 font-black mt-2">
                            Menunggu Persetujuan
                        </p>
                    </div>
                </div>

                <form action="{{ route('course.register', $course->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">

                        <div>
                            <label class="block text-gray-700 font-black mb-2">
                                Nama
                            </label>

                            <input type="text"
                                   value="{{ auth()->user()->name }}"
                                   disabled
                                   class="w-full border border-gray-200 rounded-2xl px-4 py-3 bg-gray-100 text-gray-700 font-semibold focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-black mb-2">
                                Email
                            </label>

                            <input type="email"
                                   value="{{ auth()->user()->email }}"
                                   disabled
                                   class="w-full border border-gray-200 rounded-2xl px-4 py-3 bg-gray-100 text-gray-700 font-semibold focus:outline-none">
                        </div>

                    </div>

                    <div class="mb-5">
                        <label class="block text-gray-700 font-black mb-2">
                            No HP / WhatsApp
                        </label>

                        <input type="text"
                               name="no_hp"
                               value="{{ old('no_hp', $registration->no_hp ?? '') }}"
                               placeholder="Contoh: 081234567890"
                               class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-red-400 font-semibold"
                               required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-black mb-2">
                            Alasan Mengikuti Course
                        </label>

                        <textarea name="alasan"
                                  rows="5"
                                  placeholder="Jelaskan alasan kamu mengikuti course ini..."
                                  class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-red-400 font-semibold resize-none"
                                  required>{{ old('alasan', $registration->alasan ?? '') }}</textarea>
                    </div>

                    @if((bool) ($course->payment_required ?? false) || (float) ($course->price ?? 0) > 0)
                        <div class="bg-yellow-50 border border-yellow-200 rounded-3xl p-5 mb-6">
                            <h3 class="text-gray-900 font-black text-xl mb-3">
                                Informasi Pembayaran
                            </h3>

                            <p class="text-gray-700 leading-relaxed mb-4">
                                {{ $course->payment_note ?? 'Silakan lakukan pembayaran sesuai instruksi yang tersedia.' }}
                            </p>

                            <div class="mb-5">
                                <label class="block text-gray-700 font-black mb-2">
                                    Metode Pembayaran
                                </label>

                                <select name="payment_method"
                                        class="w-full border border-yellow-200 rounded-2xl px-4 py-3 bg-white font-semibold focus:outline-none focus:ring-4 focus:ring-yellow-100"
                                        required>
                                    <option value="">-- Pilih Metode Pembayaran --</option>
                                    <option value="BCA" {{ old('payment_method') == 'BCA' ? 'selected' : '' }}>BCA</option>
                                    <option value="BRI" {{ old('payment_method') == 'BRI' ? 'selected' : '' }}>BRI</option>
                                    <option value="BNI" {{ old('payment_method') == 'BNI' ? 'selected' : '' }}>BNI</option>
                                    <option value="DANA" {{ old('payment_method') == 'DANA' ? 'selected' : '' }}>DANA</option>
                                    <option value="OVO" {{ old('payment_method') == 'OVO' ? 'selected' : '' }}>OVO</option>
                                    <option value="GoPay" {{ old('payment_method') == 'GoPay' ? 'selected' : '' }}>GoPay</option>
                                </select>
                            </div>

                            <label class="block text-gray-700 font-black mb-2">
                                Upload Bukti Pembayaran
                            </label>

                            <input type="file"
                                   name="proof_image"
                                   accept="image/*"
                                   class="w-full border border-yellow-200 rounded-2xl px-4 py-3 bg-white font-semibold"
                                   required>
                        </div>
                    @endif

                    <div class="flex flex-col sm:flex-row gap-3">

                        <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white px-6 py-4 rounded-2xl font-black shadow-lg transition">
                            Kirim Pendaftaran
                        </button>

                        <a href="{{ route('course.index') }}"
                           class="bg-gray-900 hover:bg-black text-white px-6 py-4 rounded-2xl font-black text-center shadow-lg transition">
                            Kembali
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</main>

@endsection