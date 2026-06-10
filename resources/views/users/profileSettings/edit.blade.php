@extends('users.layouts.app')

@section('title', 'Profile Settings')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-[#FFF7E8] via-white to-red-50 px-4 py-10">

    <div class="max-w-5xl mx-auto">

        {{-- HEADER --}}
        <div class="bg-gradient-to-br from-red-600 via-orange-500 to-yellow-400 rounded-[32px] p-7 md:p-9 text-white shadow-2xl mb-8">
            <div class="flex flex-col md:flex-row md:items-center gap-5">

                <div class="w-24 h-24 rounded-3xl bg-white text-red-600 flex items-center justify-center text-5xl font-black shadow-xl overflow-hidden">
                    @if($profile?->foto_diri)
                        <img src="{{ asset('storage/' . $profile->foto_diri) }}"
                             class="w-full h-full object-cover"
                             alt="Foto Diri">
                    @else
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    @endif
                </div>

                <div>
                    <p class="text-white/80 font-black uppercase tracking-[3px] text-xs mb-2">
                        Profile Settings
                    </p>

                    <h1 class="text-3xl md:text-5xl font-black leading-tight">
                        {{ $user->name }}
                    </h1>

                    <p class="text-white/90 mt-1">
                        {{ $user->email }}
                    </p>
                </div>

            </div>
        </div>

        {{-- ALERT --}}
        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl mb-6 font-semibold shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl mb-6 shadow-sm">
                <p class="font-black mb-2">Mohon periksa kembali:</p>
                <ul class="list-disc list-inside text-sm space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM --}}
        <div class="bg-white rounded-[32px] shadow-2xl border border-red-100 overflow-hidden">

            <div class="px-6 md:px-8 py-6 border-b border-gray-100">
                <h2 class="text-2xl md:text-3xl font-black text-[#2A050A]">
                    Edit Data Diri
                </h2>

                <p class="text-gray-500 mt-1">
                    Perbarui informasi akun dan data pelamar kamu.
                </p>
            </div>

            <form action="{{ route('profile.settings.update') }}"
                  method="post"
                  enctype="multipart/form-data"
                  class="p-6 md:p-8 space-y-8">

                @csrf
                @method('PUT')

                {{-- DATA AKUN --}}
                <div>
                    <h3 class="text-lg font-black text-gray-900 mb-4">
                        Data Akun
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div>
                            <label class="block text-sm font-black text-gray-700 mb-2">
                                Nama
                            </label>

                            <input type="text"
                                   name="name"
                                   value="{{ old('name', $user->name) }}"
                                   class="block w-full px-5 py-4 rounded-2xl border border-gray-200 bg-white text-sm text-gray-800 focus:border-red-500 focus:ring-4 focus:ring-red-100 outline-none transition"
                                   required>
                        </div>

                        <div>
                            <label class="block text-sm font-black text-gray-700 mb-2">
                                Email
                            </label>

                            <input type="email"
                                   name="email"
                                   value="{{ old('email', $user->email) }}"
                                   class="block w-full px-5 py-4 rounded-2xl border border-gray-200 bg-white text-sm text-gray-800 focus:border-red-500 focus:ring-4 focus:ring-red-100 outline-none transition"
                                   required>
                        </div>

                    </div>
                </div>

                {{-- DATA PELAMAR --}}
                <div>
                    <h3 class="text-lg font-black text-gray-900 mb-4">
                        Data Pelamar
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div>
                            <label class="block text-sm font-black text-gray-700 mb-2">
                                NIK
                            </label>

                            <input type="text"
                                   name="nik"
                                   value="{{ old('nik', $profile?->nik ?? '') }}"
                                   maxlength="16"
                                   class="block w-full px-5 py-4 rounded-2xl border border-gray-200 bg-white text-sm text-gray-800 focus:border-red-500 focus:ring-4 focus:ring-red-100 outline-none transition"
                                   placeholder="Masukkan 16 digit NIK">
                        </div>

                        <div>
                            <label class="block text-sm font-black text-gray-700 mb-2">
                                No HP
                            </label>

                            <input type="text"
                                   name="no_hp"
                                   value="{{ old('no_hp', $profile?->no_hp ?? '') }}"
                                   maxlength="15"
                                   class="block w-full px-5 py-4 rounded-2xl border border-gray-200 bg-white text-sm text-gray-800 focus:border-red-500 focus:ring-4 focus:ring-red-100 outline-none transition"
                                   placeholder="Contoh: 081234567890"
                                   required>
                        </div>

                        <div>
                            <label class="block text-sm font-black text-gray-700 mb-2">
                                Tempat Lahir
                            </label>

                            <input type="text"
                                   name="tempat_lahir"
                                   value="{{ old('tempat_lahir', $profile?->tempat_lahir ?? '') }}"
                                   class="block w-full px-5 py-4 rounded-2xl border border-gray-200 bg-white text-sm text-gray-800 focus:border-red-500 focus:ring-4 focus:ring-red-100 outline-none transition"
                                   placeholder="Contoh: Medan"
                                   required>
                        </div>

                        <div>
                            <label class="block text-sm font-black text-gray-700 mb-2">
                                Tanggal Lahir
                            </label>

                            <input type="date"
                                   name="tgl_lahir"
                                   value="{{ old('tgl_lahir', $profile?->tgl_lahir ?? '') }}"
                                   class="block w-full px-5 py-4 rounded-2xl border border-gray-200 bg-white text-sm text-gray-800 focus:border-red-500 focus:ring-4 focus:ring-red-100 outline-none transition"
                                   required>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-black text-gray-700 mb-2">
                                Gender
                            </label>

                            <select name="gender"
                                    class="block w-full px-5 py-4 rounded-2xl border border-gray-200 bg-white text-sm text-gray-800 focus:border-red-500 focus:ring-4 focus:ring-red-100 outline-none transition"
                                    required>
                                <option value="">Pilih Gender</option>
                                <option value="Laki-laki" {{ old('gender', $profile?->gender ?? '') == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="Perempuan" {{ old('gender', $profile?->gender ?? '') == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                        </div>

                    </div>
                </div>

                {{-- DOKUMEN --}}
                <div>
                    <h3 class="text-lg font-black text-gray-900 mb-4">
                        Dokumen Pelamar
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                        {{-- Foto Diri --}}
                        <div class="bg-gray-50 rounded-3xl border border-gray-100 p-5">
                            <label class="block text-sm font-black text-gray-700 mb-3">
                                Foto Diri
                            </label>

                            @if ($profile?->foto_diri)
                                <img src="{{ asset('storage/' . $profile->foto_diri) }}"
                                     alt="Foto Diri"
                                     class="w-24 h-24 rounded-2xl object-cover mb-3 border">
                            @else
                                <div class="w-24 h-24 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center text-4xl font-black mb-3">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                            @endif

                            <input type="file"
                                   name="foto_diri"
                                   accept="image/*"
                                   class="block w-full text-sm text-gray-700 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-red-600 file:text-white file:font-bold">
                        </div>

                        {{-- Foto KTP --}}
                        <div class="bg-gray-50 rounded-3xl border border-gray-100 p-5">
                            <label class="block text-sm font-black text-gray-700 mb-3">
                                Foto KTP
                            </label>

                            @if ($profile?->foto_ktp)
                                <img src="{{ asset('storage/' . $profile->foto_ktp) }}"
                                     alt="Foto KTP"
                                     class="w-full h-24 rounded-2xl object-cover mb-3 border">
                            @else
                                <div class="w-full h-24 rounded-2xl bg-gray-100 text-gray-400 flex items-center justify-center mb-3 font-bold">
                                    Belum ada
                                </div>
                            @endif

                            <input type="file"
                                   name="foto_ktp"
                                   accept="image/*"
                                   class="block w-full text-sm text-gray-700 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-red-600 file:text-white file:font-bold">
                        </div>

                        {{-- Foto Ijazah --}}
                        <div class="bg-gray-50 rounded-3xl border border-gray-100 p-5">
                            <label class="block text-sm font-black text-gray-700 mb-3">
                                Foto Ijazah
                            </label>

                            @if ($profile?->foto_ijazah)
                                <img src="{{ asset('storage/' . $profile->foto_ijazah) }}"
                                     alt="Foto Ijazah"
                                     class="w-full h-24 rounded-2xl object-cover mb-3 border">
                            @else
                                <div class="w-full h-24 rounded-2xl bg-gray-100 text-gray-400 flex items-center justify-center mb-3 font-bold">
                                    Belum ada
                                </div>
                            @endif

                            <input type="file"
                                   name="foto_ijazah"
                                   accept="image/*"
                                   class="block w-full text-sm text-gray-700 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-red-600 file:text-white file:font-bold">
                        </div>

                    </div>

                    <p class="text-xs text-gray-400 mt-3">
                        Jika tidak ingin mengganti dokumen, kosongkan input file.
                    </p>
                </div>

                {{-- BUTTON --}}
                <div class="flex flex-col sm:flex-row gap-3 pt-3">
                    <a href="{{ route('profile.pelamar.index') }}"
                       class="w-full sm:w-auto text-center bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-4 rounded-2xl font-black transition no-underline">
                        Batal
                    </a>

                    <button type="submit"
                            class="flex-1 bg-red-600 hover:bg-red-700 text-white py-4 rounded-2xl font-black transition shadow-lg">
                        Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection