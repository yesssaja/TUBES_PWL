@extends('perusahaan.layouts.app')

@section('title', 'Tambah Course')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Tambah Course
            </h1>

            <p class="text-gray-500 mt-2">
                Buat course baru untuk pelamar.
            </p>
        </div>

        <a href="{{ route('perusahaan.course.index') }}"
           class="inline-flex items-center justify-center bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-3 rounded-2xl font-bold transition">
            ← Kembali
        </a>
    </div>

    @if($errors->any())
        <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-2xl font-semibold">
            <ul class="list-disc ml-5 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('perusahaan.course.store') }}"
          method="POST"
          class="bg-white rounded-3xl shadow p-6 md:p-8">

        @csrf

        <div class="mb-5">
            <label class="block text-gray-700 font-bold mb-2">
                Judul Course
            </label>

            <input type="text"
                   name="title"
                   value="{{ old('title') }}"
                   placeholder="Contoh: Course Web Development"
                   class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-red-400"
                   required>
        </div>

        <div class="mb-5">
            <label class="block text-gray-700 font-bold mb-2">
                Deskripsi
            </label>

            <textarea name="description"
                      rows="5"
                      placeholder="Jelaskan isi course..."
                      class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-red-400 resize-none"
                      required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-5">
            <label class="block text-gray-700 font-bold mb-2">
                Benefit
            </label>

            <textarea name="benefit"
                      rows="4"
                      placeholder="Jelaskan manfaat course..."
                      class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-red-400 resize-none">{{ old('benefit') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
            <div>
                <label class="block text-gray-700 font-bold mb-2">
                    Harga
                </label>

                <input type="number"
                       name="price"
                       value="{{ old('price', 0) }}"
                       min="0"
                       class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-red-400"
                       required>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">
                    Status Course
                </label>

                <select name="is_active"
                        class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-red-400">
                    <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
        </div>

        <div class="mb-5">
            <label class="block text-gray-700 font-bold mb-2">
                Wajib Pembayaran?
            </label>

            <select name="payment_required"
                    class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-red-400">
                <option value="1" {{ old('payment_required') == '1' ? 'selected' : '' }}>Ya</option>
                <option value="0" {{ old('payment_required') == '0' ? 'selected' : '' }}>Tidak</option>
            </select>
        </div>

        <div class="mb-5">
            <label class="block text-gray-700 font-bold mb-2">
                Catatan Pembayaran
            </label>

            <textarea name="payment_note"
                      rows="4"
                      placeholder="Contoh: Transfer ke Bank atau E-Wallet 123456789 a.n LOKER SEEKER"
                      class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-red-400 resize-none">{{ old('payment_note') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
            <div>
                <label class="block text-gray-700 font-bold mb-2">
                    Judul Link Course
                </label>

                <input type="text"
                       name="link_title"
                       value="{{ old('link_title') }}"
                       placeholder="Contoh: Materi Course"
                       class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-red-400">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">
                    URL Link Course
                </label>

                <input type="url"
                       name="link_url"
                       value="{{ old('link_url') }}"
                       placeholder="https://..."
                       class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-red-400">
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-3">
            <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-4 rounded-2xl font-bold shadow transition">
                Simpan Course
            </button>

            <a href="{{ route('perusahaan.course.index') }}"
               class="bg-gray-900 hover:bg-black text-white px-6 py-4 rounded-2xl font-bold text-center shadow transition">
                Batal
            </a>
        </div>

    </form>

</div>

@endsection