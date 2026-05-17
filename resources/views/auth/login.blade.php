<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;700&display=swap');
    
        body {
            font-family: 'oswald',sans-serif;
            background-color: #f6b333;
        }

        .text-merah{
            color: #d12026;
        }

        .border-merah{
            border-color: #d12026;
        }

        .bg-merah{
            background-color: #d12026;
        }
        </style>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class=" text-merah font-bold uppercase tracking-widest text-sm"/>
            <x-text-input id="email" class="block mt-1 w-full border-2 border-merah rounded-xl font-bold bg-gray-50" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-merah font-bold uppercase tracking-widest text-sm"/>

            <x-text-input id="password" class="block mt-1 w-full border-2 border-merah rounded-xl font-bold bg-gray-50"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="text-merah font-bold uppercase text-sm">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-merah font-bold uppercase " href="{{ route('register') }}">
                {{ __('Already have an account?') }}
            </a>

            @if (Route::has('password.request'))
                <a class="text-merah font-bold uppercase text-sm" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="bg-merah text-white font-bold uppercase tracking-widest rounded-xl">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
