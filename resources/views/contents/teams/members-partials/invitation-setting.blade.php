<section class="section-card bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
    <div class="flex items-center mb-4">
        <div class="bg-purple-100 dark:bg-purple-900 p-2 rounded-lg mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </div>
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">Invitation Settings</h2>
    </div>

    <div class="mt-4 space-y-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Who can invite new
                members?</label>
            <div class="space-y-2">
                <div class="flex items-center">
                    <input id="invite-owner" name="invite-permission" type="radio" checked value=""
                        class="w-5 h-5 text-purple-600 bg-gray-100 border-gray-300 focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="invite-owner"
                        class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-300">Only
                        Owner</label>
                </div>
                <div class="flex items-center">
                    <input id="invite-editor" name="invite-permission" type="radio" checked value=""
                        class="w-5 h-5 text-purple-600 bg-gray-100 border-gray-300 focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="invite-editor"
                        class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-300">Owner &
                        Editor</label>
                </div>
                <div class="flex items-center">
                    <input id="invite-all" name="invite-permission" type="radio" checked value=""
                        class="w-5 h-5 text-purple-600 bg-gray-100 border-gray-300 focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="invite-all" class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-300">All
                        All Members</label>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
            <div class="flex items-center">
                <label class="inline-flex items-center me-5 cursor-pointer">
                    <input type="checkbox" value="" id="approval-toggle" class="sr-only peer" checked>
                    <div
                        class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-purple-300 dark:peer-focus:ring-purple-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-purple-600 dark:peer-checked:bg-purple-600">
                    </div>
                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Require approval for join
                        requests</span>
                </label>
            </div>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">When enabled, new members must be approved before
                joining the
                group.</p>
        </div>
    </div>
</section>
