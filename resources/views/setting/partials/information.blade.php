<div class="bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 p-5 rounded-md">
    <header>
        <h2 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-white">General Information</h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Please fill in the candidate's information.</p>
    </header>

    <form method="post" action="{{ route('setting.update') }}">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <section>
                <x-forms.input-label for="name" value="Full Name" />
                <x-forms.text-input color="gray" label="Full Name" :value="old('name', $user->name)" name="name" id="name"
                    type="text" placeholder="Enter full name" />
                <x-forms.input-error :messages="$errors->get('name')" class="mt-2" />
            </section>
            <section>
                <x-forms.input-label for="email" value="Email" />
                <x-forms.text-input color="gray" label="email" :value="old('email', $user->email)" name="email" id="email"
                    type="email" placeholder="Enter email" />
                <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification"
                                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </section>
        </div>
        <x-forms.button type="submit" extraClass="mt-4">{{ __('Save Information') }}</x-forms.button>
    </form>
</div>
