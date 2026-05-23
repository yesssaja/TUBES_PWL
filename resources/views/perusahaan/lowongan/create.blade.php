@extends('perusahaan.layouts.app')

@section('title', 'Tambah Lowongan')

@section('content')

<div class="max-w-5xl mx-auto">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Tambah Lowongan
            </h1>

            <p class="text-gray-500 mt-2">
                Buat lowongan pekerjaan baru untuk menemukan kandidat terbaik.
            </p>
        </div>

        {{-- BUTTON KEMBALI --}}
        <a href="{{ route('perusahaan.lowongan.index') }}"
           class="inline-flex items-center gap-2 bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-3 rounded-xl font-semibold transition">

            ← Kembali

        </a>

    </div>

    {{-- FORM --}}
    <div class="bg-white rounded-3xl shadow-lg p-8">

        <form class="space-y-8">

            {{-- GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- JUDUL --}}
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Judul Lowongan
                    </label>

                    <input
                        type="text"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                        placeholder="Contoh: Web Developer">
                </div>

                {{-- LOKASI --}}
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Lokasi
                    </label>

                    <input
                        type="text"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                        placeholder="Contoh: Medan">
                </div>

                {{-- TIPE --}}
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Tipe Pekerjaan
                    </label>

                    <select
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">

                        <option>Pilih Tipe</option>
                        <option>Full Time</option>
                        <option>Part Time</option>
                        <option>Internship</option>
                        <option>Freelance</option>
                        <option>Remote</option>

                    </select>
                </div>

                {{-- GAJI --}}
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Gaji
                    </label>

                    <input
                        type="text"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                        placeholder="Rp 5.000.000">
                </div>

                {{-- DEADLINE --}}
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Deadline Lamaran
                    </label>

                    <input
                        type="date"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                </div>

                {{-- STATUS --}}
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Status Lowongan
                    </label>

                    <select
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">

                        <option>Aktif</option>
                        <option>Draft</option>
                        <option>Ditutup</option>

                    </select>
                </div>

            </div>

            {{-- DESKRIPSI --}}
            <div>

                <label class="block font-semibold text-gray-700 mb-2">
                    Deskripsi Pekerjaan
                </label>

                <textarea
                    rows="7"
                    class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                    placeholder="Jelaskan detail pekerjaan, tanggung jawab, dan kualifikasi kandidat..."></textarea>

            </div>

            {{-- KUALIFIKASI --}}
            <div>

                <label class="block font-semibold text-gray-700 mb-2">
                    Kualifikasi
                </label>

                <textarea
                    rows="5"
                    class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                    placeholder="Contoh:
- Menguasai Laravel
- Mengerti UI/UX
- Pengalaman minimal 1 tahun"></textarea>

            </div>

            {{-- BENEFIT --}}
            <div>

                <label class="block font-semibold text-gray-700 mb-2">
                    Benefit
                </label>

                <textarea
                    rows="4"
                    class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                    placeholder="Contoh:
- BPJS
- Bonus Tahunan
- Work From Home"></textarea>

            </div>

            {{-- BUTTON --}}
            <div class="flex flex-col sm:flex-row gap-4 pt-4">

                <button
                    type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-2xl font-bold shadow-lg hover:scale-[1.02] transition">

                    Simpan Lowongan

                </button>

                <button
                    type="reset"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-8 py-4 rounded-2xl font-semibold transition">

                    Reset Form

                </button>

            </div>

        </form>

    </div>

</div>

@endsection