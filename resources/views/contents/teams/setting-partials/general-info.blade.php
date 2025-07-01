<!-- General Information -->
<section class="section-card bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
    <div class="flex items-center mb-6">
        <div class="bg-blue-100 dark:bg-blue-900 p-2 rounded-lg mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">General Information</h2>
    </div>

    <div class="space-y-6">
        <div>
            <label for="group-name" class="block text-base font-medium text-gray-700 dark:text-gray-200 mb-2">Group
                Name</label>
            <x-forms.text-input type="text" color="blue" name="team_name" id="team_name" size="md"
                placeholder="Group Name" />
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">This name will be displayed throughout the app</p>
        </div>

        <div>
            <label for="group-slug" class="block text-base font-medium text-gray-700 dark:text-gray-200 mb-2">Group
                URL</label>
            <div class="flex rounded-md shadow-sm">
                <span
                    class="inline-flex items-center px-4 rounded-l-md bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-400 text-base">/teams/</span>
                <input type="text" id="group-slug" placeholder="Group URL"
                    class="disabled:cursor-not-allowed disabled:opacity-50 rounded-r-md border border-gray-300 text-gray-900 placeholder-$color-700 focus:ring-$color-500 bg-gray-50 dark:bg-gray-700 focus:border-$color-500 block w-full dark:text-white dark:placeholder-gray-400 dark:border-gray-600"
                    value="gg-ph-groupies">
            </div>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">The web address where members can access your group
            </p>
        </div>
        <x-forms.button type="submit" color="blue" size="md">
            Save Information
        </x-forms.button>

        <div class="pt-2">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Created on</p>
                    <p class="text-base font-medium text-gray-900 dark:text-gray-100">June 15, 2023</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Last updated</p>
                    <p class="text-base font-medium text-gray-900 dark:text-gray-100">Today at 10:30 AM</p>
                </div>
            </div>
        </div>
    </div>
</section>
