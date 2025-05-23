<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-forms.input-label for="email" :value="__('Email')" />
            <x-forms.text-input id="email" type="email" name="email" :value="old('email')" autocomplete="off" required autofocus />
            <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-forms.button type='submit' extraClass='uppercase'>
                {{ __('Email Password Reset Link') }}
            </x-forms.button>
        </div>
    </form>
</x-guest-layout>
