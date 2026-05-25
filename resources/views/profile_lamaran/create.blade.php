<x-guest-layout>
    <main class="min-h-screen bg-[#F7F1C8] relative overflow-hidden">

        {{-- Background --}}
        <div class="absolute -top-40 -right-40 w-[620px] h-[620px] bg-[#E71F25] rounded-full"></div>
        <div class="absolute -bottom-44 -left-44 w-[600px] h-[600px] bg-[#E71F25] rounded-full opacity-90"></div>
        <div class="absolute top-10 left-6 w-60 h-60 border border-red-300 rounded-full opacity-40"></div>

        {{-- Content --}}
        <section class="relative z-10 min-h-screen flex items-center justify-center px-4 py-10">

            <div class="w-full max-w-3xl bg-white rounded-[32px] shadow-xl px-8 py-10">

                <form action="{{ route('profile.pelamar.store') }}" method="post" enctype="multipart/form-data"
                    class="space-y-5">
                    @csrf
                    <div>
                        <x-input-label for="foto_diri" :value="__('Foto Diri')" class="block text-sm font-bold text-[#1B2540] mb-2"></x-input-label>

                        <input type="file" name="foto_diri" id="foto_diri" accept="image/*" required class="block w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm text-[#1B2540]">

                        <x-input-error :messages="$errors->get('foto_diri')" class="mt-2 text-sm text-red-600"></x-input-error>
                    </div>
                    <div>
                        <x-input-label for="nik" :value="__('NIK')" class="block text-sm font-bold text-[#1B2540] mb-2"></x-input-label>

                        <x-text-input type="text" name="nik" id="nik" placeholder="Masukkan 16 digit NIK" maxlength="16" required class="block w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm text-[#1B2540]"></x-text-input>

                        <x-input-error :messages="$errors->get('nik')" class="mt-2 text-sm text-red-600"></x-input-error>
                    </div>
                    <div>
                        <x-input-label for="tempat_lahir" :value="__('Tempat Lahir')" class="block text-sm font-bold text-[#1B2540] mb-2"></x-input-label>

                        <x-text-input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan tempat lahir" required class="block w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm text-[#1B2540]"></x-text-input>

                        <x-input-error :messages="$errors->get('tempat_lahir')" class="mt-2 text-sm text-red-600"></x-input-error>
                    </div>
                    <div>
                        <x-input-label for="tgl_lahir" :value="__('Tanggal Lahir')" class="block text-sm font-bold text-[#1B2540] mb-2"></x-input-label>

                        <x-text-input type="date" name="tgl_lahir" id="tgl_lahir" placeholder="Masukkan tanggal lahir" required class="block w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm text-[#1B2540]"></x-text-input>

                        <x-input-error :messages="$errors->get('tgl_lahir')" class="mt-2 text-sm text-red-600"></x-input-error>
                    </div>
                    <div>
                        <x-input-label for="gender" :value="__('Gender')" class="block text-sm font-bold text-[#1B2540] mb-2"></x-input-label>

                        <select name="gender" id="gender" required class="block w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm text-[#1B2540]">
                            <option value="">Pilih Gender</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>

                        <x-input-error :messages="$errors->get('gender')" class="mt-2 text-sm text-red-600"></x-input-error>
                    </div>
                    <div>
                        <x-input-label for="no_hp" :value="__('No HP')" class="block text-sm font-bold text-[#1B2540] mb-2"></x-input-label>

                        <x-text-input type="text" name="no_hp" id="no_hp" placeholder="Masukkan nomor HP" required class="block w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm text-[#1B2540]"></x-text-input>

                        <x-input-error :messages="$errors->get('no_hp')" class="mt-2 text-sm text-red-600"></x-input-error>
                    </div>
                    <div>
                        <x-input-label for="foto_ktp" :value="__('Foto KTP')" class="block text-sm font-bold text-[#1B2540] mb-2"></x-input-label>

                        <input type="file" name="foto_ktp" id="foto_ktp" accept="image/*" required class="block w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm text-[#1B2540]">

                        <x-input-error :messages="$errors->get('foto_ktp')" class="mt-2 text-sm text-red-600"></x-input-error>
                    </div>
                    <div>
                        <x-input-label for="foto_ijazah" :value="__('Foto Ijazah')" class="block text-sm font-bold text-[#1B2540] mb-2"></x-input-label>

                        <input type="file" name="foto_ijazah" id="foto_ijazah" accept="image/*" required class="block w-full px-5 py-4 rounded-2xl border border-red-100 bg-white text-sm text-[#1B2540]">

                        <x-input-error :messages="$errors->get('foto_ijazah')" class="mt-2 text-sm text-red-600"></x-input-error>
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-[#E71F25] hover:bg-red-700 text-white py-4 rounded-2xl font-bold text-sm transition duration-300">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</x-guest-layout>