<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: #F7F1C8;
        }

        .bg-primary {
            background-color: #E71F25;
        }

        .text-primary {
            color: #E71F25;
        }

        .border-primary {
            border-color: #E71F25;
        }

        .shadow-soft {
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.10);
        }

        .shadow-glow {
            box-shadow: 0 14px 35px rgba(231, 31, 37, 0.25);
        }
    </style>

    <div class="min-h-screen w-full bg-[#F7F1C8] overflow-hidden relative flex items-center justify-center px-4 py-10">

        {{-- BACKGROUND DECOR --}}
        <div class="absolute -top-40 -right-32 w-[520px] h-[520px] bg-[#E71F25] rounded-full opacity-95"></div>
        <div class="absolute -bottom-48 -left-32 w-[500px] h-[500px] bg-[#E71F25] rounded-full opacity-90"></div>
        <div class="absolute top-20 left-10 w-72 h-72 border border-red-300 rounded-full opacity-40"></div>
        <div class="absolute bottom-24 right-20 grid grid-cols-6 gap-3 opacity-30">
            @for ($i = 0; $i < 36; $i++)
                <span class="w-2 h-2 bg-[#E71F25] rounded-full"></span>
            @endfor
        </div>

        {{-- MAIN WRAPPER --}}
        <div class="relative z-10 w-full max-w-6xl grid lg:grid-cols-2 gap-10 items-center">

            {{-- LEFT CONTENT --}}
            <div class="hidden lg:block px-4">

                {{-- LOGO --}}
                <div class="flex items-center gap-3 mb-16">
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

                    <h2 class="text-2xl font-extrabold text-[#1B2540]">
                        Looker <span class="text-primary">Seeker</span>
                    </h2>
                </div>

                {{-- TITLE --}}
                <h1 class="text-5xl xl:text-6xl font-extrabold leading-tight text-[#1B2540] mb-6">
                    Welcome back <br>
                    to <span class="text-primary">Looker Seeker</span>
                </h1>

                <div class="w-24 h-1.5 bg-[#E71F25] rounded-full mb-8"></div>

                <p class="text-slate-600 text-lg leading-relaxed max-w-md">
                    Masuk ke akunmu untuk mengakses dashboard, mencari peluang kerja,
                    menawarkan jasa, dan mengelola aktivitasmu dengan lebih mudah.
                </p>

                {{-- SIMPLE ILLUSTRATION --}}
                <div class="mt-14 relative w-full max-w-md h-52 rounded-[36px] bg-white/40 border border-white/60 overflow-hidden shadow-soft">

                    <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-red-200/60 to-transparent"></div>

                    <div class="absolute bottom-8 left-8 flex items-end gap-4 opacity-70">
                        <div class="w-12 h-28 bg-[#E71F25]/30 rounded-t-xl"></div>
                        <div class="w-16 h-40 bg-[#E71F25]/40 rounded-t-xl"></div>
                        <div class="w-10 h-24 bg-[#E71F25]/25 rounded-t-xl"></div>
                        <div class="w-20 h-32 bg-[#1B2540]/20 rounded-t-xl"></div>
                        <div class="w-12 h-44 bg-[#E71F25]/35 rounded-t-xl"></div>
                    </div>

                    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-[#E71F25] rounded-full opacity-80"></div>
                    <div class="absolute top-8 right-8 w-20 h-20 bg-[#E71F25]/10 rounded-full"></div>
                </div>

            </div>

            {{-- LOGIN CARD --}}
            <div class="w-full max-w-xl mx-auto">

                <div class="bg-white/95 backdrop-blur-xl rounded-[36px] shadow-soft border border-white/70 px-7 sm:px-10 py-10 sm:py-12">

                    {{-- ICON --}}
                    <div class="w-20 h-20 mx-auto rounded-full bg-red-50 flex items-center justify-center mb-7">
                        <div class="w-14 h-14 rounded-2xl bg-[#E71F25] flex items-center justify-center shadow-glow">
                            <img src="{{ asset('image/logo.jpg') }}" alt="Looker Seeker" class="w-full h-full object-cover rounded-full">
                        </div>
                    </div>

                    {{-- HEADING --}}
                    <div class="text-center mb-8">
                        <h1 class="text-3xl sm:text-4xl font-extrabold text-[#1B2540] mb-3">
                            Welcome Back
                        </h1>

                        <p class="text-slate-500 text-sm sm:text-base">
                            Log in untuk melanjutkan ke akunmu
                        </p>
                    </div>

                    {{-- SESSION STATUS --}}
                    <x-auth-session-status class="mb-5 text-sm text-green-600 font-semibold" :status="session('status')" />

                    {{-- FORM --}}
                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        {{-- EMAIL --}}
                        <div>
                            <x-input-label for="email" :value="__('Email')"
                                class="text-[#1B2540] font-bold text-sm mb-2" />

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
                                    class="block w-full pl-12 pr-5 py-4 rounded-2xl border border-red-100 bg-white text-sm text-[#1B2540] focus:border-red-300 focus:ring-4 focus:ring-red-100 transition"
                                    type="email"
                                    name="email"
                                    :value="old('email')"
                                    placeholder="you@example.com"
                                    required
                                    autofocus
                                    autocomplete="username" />
                            </div>

                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                        </div>

                        {{-- PASSWORD --}}
                        <div>
                            <x-input-label for="password" :value="__('Password')"
                                class="text-[#1B2540] font-bold text-sm mb-2" />

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
                                    class="block w-full pl-12 pr-5 py-4 rounded-2xl border border-red-100 bg-white text-sm text-[#1B2540] focus:border-red-300 focus:ring-4 focus:ring-red-100 transition"
                                    type="password"
                                    name="password"
                                    placeholder="Masukkan password"
                                    required
                                    autocomplete="current-password" />
                            </div>

                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                        </div>

                        {{-- REMEMBER + FORGOT --}}
                        <div class="flex items-center justify-between gap-4">

                            <label for="remember_me" class="inline-flex items-center gap-2 cursor-pointer">
                                <input id="remember_me"
                                    type="checkbox"
                                    class="w-4 h-4 rounded border-red-200 text-[#E71F25] shadow-sm focus:ring-red-200"
                                    name="remember">

                                <span class="text-sm text-slate-600 font-medium">
                                    {{ __('Remember me') }}
                                </span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="text-sm text-primary font-bold hover:text-red-700 transition"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot password?') }}
                                </a>
                            @endif

                        </div>

                        {{-- BUTTON --}}
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-3 bg-[#E71F25] hover:bg-red-700 text-white py-4 rounded-2xl font-bold text-sm shadow-glow transition duration-300 hover:-translate-y-0.5">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 12H3m12 0l-4-4m4 4l-4 4" />
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21 4v16" />
                            </svg>

                            {{ __('Log in') }}
                        </button>

                        {{-- DIVIDER --}}
                        <div class="flex items-center gap-4 py-1">
                            <div class="h-px flex-1 bg-red-100"></div>
                            <span class="text-xs text-slate-400 font-semibold">
                                OR
                            </span>
                            <div class="h-px flex-1 bg-red-100"></div>
                        </div>

                        {{-- REGISTER LINK --}}
                        <div class="text-center">
                            <a class="text-sm text-slate-500 hover:text-[#1B2540] transition"
                                href="{{ route('register') }}">

                                {{ __('New to Looker Seeker?') }}
                                <span class="text-primary font-bold">
                                    {{ __('Create an account') }}
                                </span>

                            </a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
</x-guest-layout>