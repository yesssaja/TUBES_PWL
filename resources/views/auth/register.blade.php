<x-guest-layout>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F7F1C8;
        }

        .bg-primary {
            background-color: #E71F25;
        }

        .text-primary {
            color: #E71F25;
        }

        .shadow-soft {
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.10);
        }

        .shadow-glow {
            box-shadow: 0 14px 35px rgba(231, 31, 37, 0.25);
        }
    </style>

    <main class="min-h-screen bg-[#F7F1C8] relative overflow-hidden">

        {{-- BACKGROUND DECOR --}}
        <div class="absolute -top-40 -right-40 w-[460px] h-[460px] md:w-[620px] md:h-[620px] bg-[#E71F25] rounded-full"></div>
        <div class="absolute -bottom-44 -left-44 w-[460px] h-[460px] md:w-[600px] md:h-[600px] bg-[#E71F25] rounded-full opacity-90"></div>
        <div class="absolute top-10 left-6 w-60 h-60 border border-red-300 rounded-full opacity-40"></div>

        {{-- CONTENT --}}
        <section class="relative z-10 min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-10 py-10">

            <div class="w-full max-w-7xl grid lg:grid-cols-2 gap-10 lg:gap-16 items-center">

                {{-- LEFT SIDE --}}
                <div class="hidden lg:block">

                    <div class="flex items-center gap-3 mb-14">
                        <div class="w-12 h-12 rounded-2xl bg-[#E71F25] flex items-center justify-center shadow-glow">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-7 h-7 text-white"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>

                        <h1 class="text-2xl font-extrabold text-[#1B2540]">
                            Looker <span class="text-primary">Seeker</span>
                        </h1>
                    </div>

                    <h2 class="text-5xl xl:text-6xl font-extrabold leading-tight text-[#1B2540] mb-6">
                        Create your <br>
                        <span class="text-primary">Looker Seeker</span> account
                    </h2>

                    <div class="w-24 h-1.5 bg-[#E71F25] rounded-full mb-8"></div>

                    <p class="text-slate-600 text-lg leading-relaxed max-w-lg">
                        Daftar untuk mulai mencari lowongan kerja, menawarkan jasa,
                        mengikuti event, dan mengakses berbagai fitur Looker Seeker.
                    </p>

                    <div class="mt-14 max-w-lg h-56 rounded-[36px] bg-white/45 border border-white/70 shadow-soft relative overflow-hidden">
                        <div class="absolute bottom-0 left-0 right-0 h-28 bg-gradient-to-t from-red-200/70 to-transparent"></div>

                        <div class="absolute bottom-8 left-10 flex items-end gap-4 opacity-80">
                            <div class="w-12 h-24 bg-[#E71F25]/25 rounded-t-2xl"></div>
                            <div class="w-16 h-40 bg-[#E71F25]/35 rounded-t-2xl"></div>
                            <div class="w-10 h-28 bg-[#E71F25]/20 rounded-t-2xl"></div>
                            <div class="w-20 h-32 bg-[#1B2540]/20 rounded-t-2xl"></div>
                            <div class="w-12 h-44 bg-[#E71F25]/30 rounded-t-2xl"></div>
                        </div>

                        <div class="absolute -bottom-12 -left-12 w-44 h-44 bg-[#E71F25] rounded-full opacity-80"></div>
                        <div class="absolute top-8 right-8 w-24 h-24 bg-[#E71F25]/10 rounded-full"></div>
                    </div>

                </div>

                {{-- REGISTER CARD --}}
                <div class="w-full flex justify-center">

                    <div class="w-full max-w-[520px] bg-white/95 backdrop-blur-xl rounded-[32px] sm:rounded-[40px] shadow-soft border border-white/80 px-6 sm:px-9 py-8 sm:py-10">

                        {{-- MOBILE BRAND --}}
                        <div class="lg:hidden flex items-center justify-center gap-3 mb-7">
                            <div class="w-11 h-11 rounded-2xl bg-[#E71F25] flex items-center justify-center shadow-glow">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>

                            <h1 class="text-xl font-extrabold text-[#1B2540]">
                                Looker <span class="text-primary">Seeker</span>
                            </h1>
                        </div>

                        {{-- ICON --}}
                        <div class="w-20 h-20 mx-auto rounded-full bg-red-50 flex items-center justify-center mb-6">
                            <div class="w-14 h-14 rounded-2xl bg-[#E71F25] flex items-center justify-center shadow-glow">
                                <img src="{{ asset('image/logo.jpg') }}" alt="Looker Seeker" class="w-full h-full object-cover rounded-full">
                            </div>
                        </div>

                        {{-- TITLE --}}
                        <div class="text-center mb-7">
                            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1B2540] mb-2">
                                Register
                            </h2>

                            <p class="text-slate-500 text-sm sm:text-base">
                                Buat akun baru untuk melanjutkan
                            </p>
                        </div>

                        {{-- FORM --}}
                        <form method="POST" action="{{ route('register') }}" class="space-y-5">
                            @csrf

                            {{-- NAME --}}
                            <div>
                                <x-input-label for="name" :value="__('Name')"
                                    class="block text-sm font-bold text-[#1B2540] mb-2" />

                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z" />
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M4 20c0-3.314 3.582-6 8-6s8 2.686 8 6" />
                                        </svg>
                                    </span>

                                    <x-text-input id="name"
                                        class="block w-full pl-12 pr-5 py-4 rounded-2xl border border-red-100 bg-white text-sm text-[#1B2540] placeholder:text-slate-400 focus:border-red-300 focus:ring-4 focus:ring-red-100 transition"
                                        type="text"
                                        name="name"
                                        :value="old('name')"
                                        placeholder="Masukkan nama"
                                        required
                                        autofocus
                                        autocomplete="name" />
                                </div>

                                <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
                            </div>

                            {{-- EMAIL --}}
                            <div>
                                <x-input-label for="email" :value="__('Email')"
                                    class="block text-sm font-bold text-[#1B2540] mb-2" />

                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8" />
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </span>

                                    <x-text-input id="email"
                                        class="block w-full pl-12 pr-5 py-4 rounded-2xl border border-red-100 bg-white text-sm text-[#1B2540] placeholder:text-slate-400 focus:border-red-300 focus:ring-4 focus:ring-red-100 transition"
                                        type="email"
                                        name="email"
                                        :value="old('email')"
                                        placeholder="you@example.com"
                                        required
                                        autocomplete="username" />
                                </div>

                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                            </div>

                            {{-- PASSWORD --}}
                            <div>
                                <x-input-label for="password" :value="__('Password')"
                                    class="block text-sm font-bold text-[#1B2540] mb-2" />

                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M12 11c1.657 0 3-1.343 3-3V7a3 3 0 10-6 0v1c0 1.657 1.343 3 3 3z" />
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M5 11h14v9H5z" />
                                        </svg>
                                    </span>

                                    <x-text-input id="password"
                                        class="block w-full pl-12 pr-5 py-4 rounded-2xl border border-red-100 bg-white text-sm text-[#1B2540] placeholder:text-slate-400 focus:border-red-300 focus:ring-4 focus:ring-red-100 transition"
                                        type="password"
                                        name="password"
                                        placeholder="Masukkan password"
                                        required
                                        autocomplete="new-password" />
                                </div>

                                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                            </div>

                            {{-- CONFIRM PASSWORD --}}
                            <div>
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')"
                                    class="block text-sm font-bold text-[#1B2540] mb-2" />

                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M9 12l2 2 4-4" />
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M12 11c1.657 0 3-1.343 3-3V7a3 3 0 10-6 0v1c0 1.657 1.343 3 3 3z" />
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M5 11h14v9H5z" />
                                        </svg>
                                    </span>

                                    <x-text-input id="password_confirmation"
                                        class="block w-full pl-12 pr-5 py-4 rounded-2xl border border-red-100 bg-white text-sm text-[#1B2540] placeholder:text-slate-400 focus:border-red-300 focus:ring-4 focus:ring-red-100 transition"
                                        type="password"
                                        name="password_confirmation"
                                        placeholder="Konfirmasi password"
                                        required
                                        autocomplete="new-password" />
                                </div>

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
                            </div>

                            {{-- ROLE --}}
                            <div>
                                <x-input-label for="role" value="Daftar Sebagai"
                                    class="block text-sm font-bold text-[#1B2540] mb-2" />

                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M17 20h5V4H2v16h5" />
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M9 20h6" />
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M12 16v4" />
                                        </svg>
                                    </span>

                                    <select name="role"
                                        id="role"
                                        class="block w-full pl-12 pr-5 py-4 rounded-2xl border border-red-100 bg-white text-sm text-[#1B2540] font-medium focus:outline-none focus:border-red-300 focus:ring-4 focus:ring-red-100 transition">
                                        <option value="user">User / Pencari Kerja</option>
                                        <option value="perusahaan">Perusahaan</option>
                                    </select>
                                </div>
                            </div>

                            {{-- ACTION --}}
                            <div class="pt-2">

                                <button type="submit"
                                    class="w-full bg-[#E71F25] hover:bg-red-700 text-white py-4 rounded-2xl font-bold text-sm shadow-glow transition duration-300 hover:-translate-y-0.5">
                                    {{ __('Lengkapi Data Diri') }}
                                </button>

                                <div class="flex items-center gap-4 my-5">
                                    <div class="h-px flex-1 bg-red-100"></div>
                                    <span class="text-xs text-slate-400 font-semibold">
                                        OR
                                    </span>
                                    <div class="h-px flex-1 bg-red-100"></div>
                                </div>

                                <div class="text-center">
                                    <a class="text-sm text-slate-500 hover:text-[#1B2540] transition"
                                        href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>
                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </section>

    </main>
</x-guest-layout>