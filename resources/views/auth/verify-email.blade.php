<x-guest-layout>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #F7F1C8;
        }

        .shadow-soft {
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.10);
        }

        .shadow-glow {
            box-shadow: 0 14px 35px rgba(231, 31, 37, 0.25);
        }
    </style>

    <div class="min-h-screen w-full bg-[#F7F1C8] overflow-hidden relative flex items-center justify-center px-4 py-10">

        <div class="absolute -top-40 -right-32 w-[520px] h-[520px] bg-[#E71F25] rounded-full opacity-95"></div>
        <div class="absolute -bottom-48 -left-32 w-[500px] h-[500px] bg-[#E71F25] rounded-full opacity-90"></div>

        <div class="relative z-10 w-full max-w-lg">
            <div
                class="bg-white/95 backdrop-blur-xl rounded-[36px] shadow-soft border border-white/70 px-7 sm:px-10 py-10 sm:py-12 text-center">

                <div class="w-20 h-20 mx-auto rounded-full bg-red-50 flex items-center justify-center mb-7">
                    <div class="w-14 h-14 rounded-2xl bg-[#E71F25] flex items-center justify-center shadow-glow">
                        <img src="{{ asset('image/logo.jpg') }}" alt="Looker Seeker"
                            class="w-full h-full object-cover rounded-full">
                    </div>
                </div>

                <h1 class="text-3xl sm:text-4xl font-extrabold text-[#1B2540] mb-4">
                    Verifikasi Email
                </h1>

                <p class="text-slate-500 text-sm sm:text-base leading-relaxed mb-6">
                    Terima kasih sudah mendaftar. Sebelum melanjutkan, silakan verifikasi email kamu melalui link yang
                    sudah kami kirim.
                </p>

                @if (session('status') == 'verification-link-sent')
                    <div
                        class="mb-6 rounded-2xl bg-green-50 border border-green-200 px-4 py-3 text-sm font-medium text-green-700">
                        Link verifikasi sudah dikirim ke email kamu.
                    </div>
                @endif

                <div class="flex flex-col gap-4">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <button type="submit"
                            class="w-full bg-[#E71F25] hover:bg-red-700 text-white font-bold py-3 px-5 rounded-2xl shadow-glow transition">
                            Kirim Email Verifikasi
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="text-sm font-semibold text-slate-500 hover:text-[#E71F25] transition">
                            Logout
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>