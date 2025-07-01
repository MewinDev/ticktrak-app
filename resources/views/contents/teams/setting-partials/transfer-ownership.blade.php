<!-- Transfer Ownership -->
<section class="section-card bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
    <div class="flex items-center mb-4">
        <div class="bg-indigo-200 dark:bg-indigo-800 p-2 rounded-lg mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 dark:text-indigo-400" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
            </svg>
        </div>
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">Transfer Ownership</h2>
    </div>

    <div class="mt-4">
        <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">Transfer ownership to another member before leaving the
            group.</p>

        <div class="flex flex-col md:flex-row md:items-center space-y-3 md:space-y-0 md:space-x-3">

            <x-forms.select-input color="purple" size="md" width="md:w-64">
                <option value="">Select a member</option>
                <option value="">Maria Smith (Editor)</option>
                <option value="">Robert Johnson (Editor)</option>
                <option value="">Sarah Williams (Member)</option>
            </x-forms.select-input>

            <x-forms.button type="submit" color="purple" size="md" extraClass="bg-opacity-80 dark:bg-opacity-40">
                Transfer ownership
            </x-forms.button>
        </div>

        <p class="text-xs text-gray-500 dark:text-gray-400 mt-3"><strong>Note:</strong> This action cannot be undone.
            The new owner will
            have full control over this group.</p>
    </div>
</section>
