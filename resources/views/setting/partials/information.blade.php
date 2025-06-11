<div class="bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 p-5 rounded-md">
    <header>
        <h2 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-white">General Information</h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Please fill in the candidate's information.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <section>
                <x-forms.input-label for="name" value="Full Name" />
                <x-forms.text-input color="gray" label="Full Name" name="name" id="name" type="text"
                    placeholder="Enter full name" />
                <x-forms.input-error :messages="$errors->get('name')" class="mt-2" />
            </section>
            <section>
                <x-forms.input-label for="email" value="Email" />
                <x-forms.text-input color="gray" label="email" name="email" id="email" type="email"
                    placeholder="Enter email" />
                <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
            </section>
        </div>
        <x-forms.button type="submit" extraClass="mt-4">{{ __('Save Information') }}</x-forms.button>
    </form>
</div>
