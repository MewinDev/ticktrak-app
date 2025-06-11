<div class="bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 p-5 rounded-md">
    <h2 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-white">Language Selection</h2>
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Select a language for the you want to use.</p>
    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <section class="mt-3 space-y-3">
            <x-forms.input-label for="language" value="Language" />
            <x-forms.select-input color="gray" label="language" name="language" id="language">
                <option value="english">English</option>
                <option value="filipino">Filipino</option>
            </x-forms.select-input>
        </section>
        <x-forms.button type="submit" extraClass="mt-4">{{ __('Save Language') }}</x-forms.button>
    </form>
</div>
