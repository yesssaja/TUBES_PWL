<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;700&display=swap');
        body{
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
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-merah font-bold uppercase tracking-widest text-sm"/>
            <x-text-input id="name" class="block mt-1 w-full border-2 border-merah rounded-xl font-bold bg-gray-50" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-merah font-bold uppercase tracking-widest text-sm" />
            <x-text-input id="email" class="block mt-1 w-full border-2 border-merah rounded-xl font-bold bg-gray-50" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-merah font-bold uppercase tracking-widest text-sm" />

            <x-text-input id="password" class="block mt-1 w-full border-2 border-merah rounded-xl font-bold bg-gray-50"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-merah font-bold uppercase tracking-widest text-sm" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full border-2 border-merah rounded-xl font-bold bg-gray-50"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-merah font-bold uppercase " href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 block bg-merah text-white font-bold uppercase tracking-widest rounded-xl">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
