@extends('users.layouts.app')

@section('title', 'Buat Group')

@section('content')
@if(session('success'))

    <div class="max-w-7xl mx-auto px-6 pt-8">

        <div class="bg-green-100 border border-green-300 text-green-800 px-6 py-4 rounded-2xl shadow">

            <div class="flex items-center gap-3">

                <span class="text-2xl">
                    ✅
                </span>

                <div>

                    <p class="font-black">
                        Berhasil
                    </p>

                    <p>
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        </div>

    </div>

@endif

<section class="max-w-3xl mx-auto px-6 py-14">

    <div class="text-center mb-10">

        <p class="text-red-600 font-black tracking-[6px] uppercase mb-3">
            Komunitas Pencari Kerja
        </p>

        <h1 class="text-5xl font-black text-slate-900">
            Buat Group Baru
        </h1>

        <p class="text-gray-600 mt-4">
            Bangun komunitas dan berbagi informasi karir bersama anggota lainnya.
        </p>

    </div>

    <div class="bg-white rounded-[30px] shadow-xl p-10">

        <form action="{{ route('groups.store') }}" method="POST">

            @csrf

            <div class="mb-6">

                <label class="block font-black text-slate-900 mb-2">
                    Nama Group
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Contoh : Laravel Developer Indonesia"
                    class="w-full p-4 rounded-2xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500">

                @error('name')
                    <p class="text-red-600 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <div class="mb-8">

                <label class="block font-black text-slate-900 mb-2">
                    Deskripsi Group
                </label>

                <textarea
                    name="description"
                    rows="6"
                    placeholder="Jelaskan tujuan dan isi komunitas ini..."
                    class="w-full p-4 rounded-2xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500">{{ old('description') }}</textarea>

                @error('description')
                    <p class="text-red-600 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <div class="flex gap-4">

                <a href="{{ route('groups.index') }}"
                   class="px-6 py-3 rounded-2xl bg-gray-200 hover:bg-gray-300 font-black text-gray-700 transition">
                    Kembali
                </a>

                <button
                    type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-2xl font-black shadow-lg transition">
                    + Simpan Group
                </button>

            </div>

        </form>

    </div>

</section>

@endsection