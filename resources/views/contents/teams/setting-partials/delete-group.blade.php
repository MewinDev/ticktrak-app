<!-- Delete Group -->
<section class="section-card bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
    <div class="flex items-center mb-6">
        <div class="bg-red-100 dark:bg-red-900 p-2 rounded-lg mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 dark:text-red-400" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </div>
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">Delete Group</h2>
    </div>

    <div>
        <div
            class="bg-red-50 dark:bg-red-900 dark:bg-opacity-10 border border-red-200 dark:border-red-600 rounded-lg p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400 dark:text-red-300"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-base font-medium text-red-800 dark:text-red-200">Warning: This action cannot be
                        undone</h3>
                    <div class="mt-2 text-sm text-red-700 dark:text-red-300">
                        <p>Deleting your group will permanently remove all tasks, comments, and data associated with
                            this group. All members will lose access.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <div>
                <label for="confirm-delete" class="block text-base font-medium text-gray-700 dark:text-gray-200 mb-2">To
                    confirm, type
                    "DELETE" below</label>
                <x-forms.text-input type="text" color="red" size="md" placeholder="Type DELETE here..." />
            </div>

            <x-forms.button type="submit" color="red" size="md" extraClass="dark:bg-opacity-60">
                Delete Group
            </x-forms.button>
        </div>
    </div>
</section>
