@extends('users.layouts.app')
@section('content')
    <div class="max-w-3xl mx-auto px-6 py-10">
        <div class="bg-white rounded-3xl shadow-xl p-8">
            <h1 class="text-2xl font-black text-gray-800 mb-6">Profile Setting</h1>

            @if (session('success'))
                <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl mb-6">{{ session('success') }}</div>
            @endif

            <form action="{{ route('profile.settings.update') }}" method="post" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="block w-full px-5 py-4 rounded-2xl border border-gray-200 bg-white text-sm text-gray-800 focus:ring-red-100 transition" required>

                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                    <input type="text" name="email" id="email" value="{{ $user->email }}" class="block w-full px-5 py-4 rounded-2xl border border-gray-200 bg-white text-sm text-gray-800 focus:ring-red-100 transition" required>

                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- NIK --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">NIK</label>
                    <input type="text" name="nik" id="nik" value="{{ $profile?->nik ?? '' }}" class="block w-full px-5 py-4 rounded-2xl border border-gray-200 bg-white text-sm text-gray-800 focus:ring-red-100 transition" maxlength="16" {{ $profile?->nik ? 'disabled' : '' }}>
                </div>

                {{-- No HP --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">No HP</label>
                    <input type="text" name="no_hp" id="no_hp" value="{{ $profile?->no_hp ?? '' }}" class="block w-full px-5 py-4 rounded-2xl border border-gray-200 bg-white text-sm text-gray-800 focus:ring-red-100 transition" maxlength="15" required>

                    @error('no_hp')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tempat Lahir --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ $profile?->tempat_lahir ?? '' }}" class="block w-full px-5 py-4 rounded-2xl border border-gray-200 bg-white text-sm text-gray-800 focus:ring-red-100 transition" required>

                    @error('tempat_lahir')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tanggal Lahir --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" value="{{ $profile?->tgl_lahir ?? '' }}" class="block w-full px-5 py-4 rounded-2xl border border-gray-200 bg-white text-sm text-gray-800 focus:ring-red-100 transition" required>

                    @error('tgl_lahir')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Gender --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Gender</label>
                    <input type="text" name="gender" id="gender" value="{{ $profile?->gender ?? '-' }}" class="block w-full px-5 py-4 rounded-2xl border border-gray-200 text-sm text-gray-800 focus:ring-red-100 transition bg-gray-100" {{ $profile?->gender ? 'disabled' : '' }}>
                </div>

                {{-- Foto Diri --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Foto Diri</label>
                    @if ($profile?->foto_diri)
                        <img src="{{ asset('storage/' . $profile->foto_diri) }}" alt="Foto Diri" class="w-24 h-24 rounded-full object-cover mb-3">
                    @endif
                    <input type="file" name="foto_diri" id="foto_diri" accept="image/*" class="block w-full px-5 py-4 rounded-2xl border border-gray-200 bg-white text-sm text-gray-800 focus:ring-red-100 transition">

                    @error('foto_diri')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Foto KTP --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Foto KTP</label>
                    @if ($profile && $profile->foto_ktp)
                        <img src="{{ asset('storage/' . $profile->foto_ktp) }}" alt="Foto KTP" width="150">
                    @endif
                </div>

                {{-- Foto Ijazah --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Foto Ijazah</label>
                    @if ($profile && $profile->foto_ijazah)
                        <img src="{{ asset('storage/' . $profile->foto_ijazah) }}" alt="Foto Ijazah" width="150">
                    @endif
                </div>

                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-4 rounded-2xl font-bold transition">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
@endsection