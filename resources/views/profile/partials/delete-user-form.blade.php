<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-forms.button color='red' x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete Account') }}
    </x-forms.button>

    <x-modal title="Delete Account" name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-forms.input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-forms.text-input id="password" name="password" type="password" placeholder="{{ __('Password') }}" />

                <x-forms.input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-forms.button type='button' x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-forms.button>

                <x-forms.button type='submit' color='red' extraClass="ms-3">
                    {{ __('Delete Account') }}
                </x-forms.button>
            </div>
        </form>
    </x-modal>
</section>
