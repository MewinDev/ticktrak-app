<div class="bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 p-5 rounded-md">
    <header>
        <h2 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-white">Change Password</h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Update your account password below.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="mt-4 space-y-4">
            <div>
                <x-forms.input-label for="update_password_current_password" :value="__('Current Password')" />
                <x-forms.text-input id="update_password_current_password" name="current_password" type="password"
                    placeholder="Enter current password" autocomplete="current-password" />
                <x-forms.input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>

            <div>
                <x-forms.input-label for="update_password_password" :value="__('New Password')" />
                <x-forms.text-input id="update_password_password" name="password" type="password"
                    placeholder="Enter new password" autocomplete="new-password" />
                <x-forms.input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <div>
                <x-forms.input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                <x-forms.text-input id="update_password_password_confirmation" name="password_confirmation"
                    type="password" placeholder="Confirm new password" autocomplete="new-password" />
                <x-forms.input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center gap-4 mt-5">
            <x-forms.button type='submit'>{{ __('Save Password') }}</x-forms.button>
        </div>
    </form>
</div>
