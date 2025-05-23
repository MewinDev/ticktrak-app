<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-forms.input-label for="name" :value="__('Name')" />
            <x-forms.text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="off" />
            <x-forms.input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-forms.input-label for="email" :value="__('Email')" />
            <x-forms.text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="off" />
            <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-forms.input-label for="password" :value="__('Password')" />

            <x-forms.text-input id="password"
                            type="password"
                            name="password"
                            required autocomplete="off" />

            <x-forms.input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-forms.input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-forms.text-input id="password_confirmation"
                            type="password"
                            name="password_confirmation" required autocomplete="off" />

            <x-forms.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4 gap-3">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-forms.button  type="submit" size="sm" color="blue" class="font-bold uppercase">
                {{ __('Register') }}
            </x-forms.button>
        </div>
    </form>
</x-guest-layout>
