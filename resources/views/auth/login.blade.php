<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;700&display=swap');
    
        body {
            font-family: 'Oswald',sans-serif;
            background-color: #f6b333;
        }

        .text-custom-red{
            color: #d12026;
        }

        .border-custom-red{
            border-color: #d12026;
        }

        .bg-custom-red{
            background-color: #d12026;
        }
        </style>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class=" text-custom-red font-bold uppercase tracking-widest text-sm"/>
            <x-text-input id="email" class="block mt-1 w-full border-2 border-custom-red rounded-xl font-bold bg-gray-50" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-custom-red font-bold uppercase tracking-widest text-sm"/>

            <x-text-input id="password" class="block mt-1 w-full border-2 border-custom-red rounded-xl font-bold bg-gray-50"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="text-custom-red font-bold uppercase text-sm">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-custom-red font-bold uppercase text-sm" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="bg-custom-red text-white font-bold uppercase tracking-widest rounded-xl">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
