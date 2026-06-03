@extends('users.course.layouts.app')

@section('title', 'Daftar Course')

@section('content')

<div class="max-w-4xl mx-auto p-4 md:p-10">

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
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('course.register', $course->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

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

            {{-- Bagian pembayaran tetap sama persis --}}
            @if((bool) ($course->payment_required ?? false) || (float) ($course->price ?? 0) > 0)

                {{-- SALIN bagian pembayaran dari file lama mulai sini --}}

            @endif

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

@endsection