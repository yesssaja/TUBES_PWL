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

        <a href="{{ route('perusahaan.lowongan.index') }}"
           class="inline-flex items-center gap-2 bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-3 rounded-xl font-semibold transition">
            ← Kembali
        </a>

    </div>

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl font-semibold">
            {{ session('success') }}
        </div>
    @endif

    {{-- ALERT ERROR --}}
    @if($errors->any())
        <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-2xl">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li class="font-semibold">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM --}}
    <div class="bg-white rounded-3xl shadow-lg p-8">

        <form action="{{ route('perusahaan.lowongan.store') }}" method="POST" class="space-y-8">
            @csrf

            {{-- GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- JUDUL --}}
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Judul Lowongan
                    </label>

                    <input
                        type="text"
                        name="judul_loker"
                        value="{{ old('judul_loker') }}"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                        placeholder="Contoh: Web Developer"
                        required>
                </div>

                {{-- LOKASI --}}
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Lokasi
                    </label>

                    <input
                        type="text"
                        name="lokasi"
                        value="{{ old('lokasi') }}"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                        placeholder="Contoh: Medan"
                        required>
                </div>

                {{-- TIPE --}}
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Tipe Pekerjaan
                    </label>

                    <select
                        name="tipe_pekerjaan"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                        required>

                        <option value="">Pilih Tipe</option>
                        <option value="Full Time" {{ old('tipe_pekerjaan') == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                        <option value="Part Time" {{ old('tipe_pekerjaan') == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                        <option value="Internship" {{ old('tipe_pekerjaan') == 'Internship' ? 'selected' : '' }}>Internship</option>
                        <option value="Freelance" {{ old('tipe_pekerjaan') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                        <option value="Remote" {{ old('tipe_pekerjaan') == 'Remote' ? 'selected' : '' }}>Remote</option>

                    </select>
                </div>

                {{-- GAJI --}}
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Gaji
                    </label>

                    <input
                        type="text"
                        name="gaji"
                        value="{{ old('gaji') }}"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                        placeholder="Rp 5.000.000">
                </div>

                {{-- BATAS LAMARAN --}}
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Deadline Lamaran
                    </label>

                    <input
                        type="date"
                        name="batas_lamaran"
                        value="{{ old('batas_lamaran') }}"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                </div>

            </div>

            {{-- DESKRIPSI --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Deskripsi Pekerjaan
                </label>

                <textarea
                    name="deskripsi"
                    rows="7"
                    class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                    placeholder="Jelaskan detail pekerjaan, tanggung jawab, dan kualifikasi kandidat..."
                    required>{{ old('deskripsi') }}</textarea>
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