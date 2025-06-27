<div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-600 p-5 rounded-md">
    <header>
        <h2 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-white">General Information</h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Please fill in the team's information.</p>
    </header>

    <form method="post" action="">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 gap-4 mt-4">
            <section>
                <x-forms.input-label for="name" value="Team Name" />
                <x-forms.text-input color="gray" label="Team Name" name="team_name" id="team_name" type="text"
                    placeholder="Enter team name" />
                <x-forms.input-error :messages="$errors->get('team_name')" class="mt-2" />
            </section>
        </div>
        <x-forms.button type="submit" extraClass="mt-4">{{ __('Save Information') }}</x-forms.button>
    </form>
</div>
