<x-app-layout>
    <div>
        <h2 class="text-2xl py-2 font-bold tracking-wider text-gray-900 dark:text-white">Leave Group</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400">Leave this group if you no longer wish to be a member.</p>
    </div>

    <main class="py-8">
        <!-- Leave Group Panel -->
        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">

            <div class="p-6">
                <!-- Owner Warning Box -->
                <div class="danger-box bg-red-50 dark:bg-red-900/30 p-4 rounded-md mb-6">
                    <h3 class="font-medium text-red-800 dark:text-red-300 mb-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        You are the group owner
                    </h3>
                    <p class="text-red-700 dark:text-red-200 text-sm mb-3">As the owner of this group, you must transfer
                        ownership to
                        another member before leaving. Otherwise, the group will be deleted and all content will be
                        lost.</p>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 dark:text-red-400 mr-2"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm font-medium text-red-700 dark:text-red-200">Required: Select a new owner
                            below</span>
                    </div>
                </div>

                <!-- Transfer Ownership Section -->
                <div class="mb-6">
                    <h3 class="font-medium text-gray-900 dark:text-white mb-3">Transfer Ownership</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">Select a team member to become the new
                        group owner. The
                        new owner will have full control over the group, including the ability to:</p>

                    <ul class="text-sm text-gray-600 dark:text-gray-300 mb-4 space-y-1 pl-5 list-disc">
                        <li>Manage all group settings and permissions</li>
                        <li>Add or remove members</li>
                        <li>Delete the group entirely</li>
                        <li>Edit or delete any content within the group</li>
                    </ul>

                    <!-- Member Selection -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-4">
                        <div
                            class="member-card border dark:border-gray-700 rounded-lg p-3 cursor-pointer dark:bg-gray-800">
                            <div class="flex items-center">
                                <div
                                    class="h-10 w-10 rounded-full bg-pink-100 dark:bg-pink-900/40 flex items-center justify-center text-pink-800 dark:text-pink-200 font-medium mr-3">
                                    AS</div>
                                <div>
                                    <h4 class="text-sm font-medium text-gray-900 dark:text-white">Anna Smith</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Marketing Manager</p>
                                </div>
                                <div class="ml-auto">
                                    <div class="h-5 w-5 rounded-full border-2 border-gray-300 dark:border-gray-600">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="member-card border dark:border-gray-700 rounded-lg p-3 cursor-pointer dark:bg-gray-800">
                            <div class="flex items-center">
                                <div
                                    class="h-10 w-10 rounded-full bg-green-100 dark:bg-green-900/40 flex items-center justify-center text-green-800 dark:text-green-200 font-medium mr-3">
                                    RJ</div>
                                <div>
                                    <h4 class="text-sm font-medium text-gray-900 dark:text-white">Robert Johnson</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Content Strategist</p>
                                </div>
                                <div class="ml-auto">
                                    <div class="h-5 w-5 rounded-full border-2 border-gray-300 dark:border-gray-600">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="member-card selected border dark:border-blue-500 rounded-lg p-3 cursor-pointer dark:bg-gray-800">
                            <div class="flex items-center">
                                <div
                                    class="h-10 w-10 rounded-full bg-yellow-100 dark:bg-yellow-900/40 flex items-center justify-center text-yellow-800 dark:text-yellow-200 font-medium mr-3">
                                    EW</div>
                                <div>
                                    <h4 class="text-sm font-medium text-gray-900 dark:text-white">Emily Wilson</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Team Lead</p>
                                </div>
                                <div class="ml-auto">
                                    <div
                                        class="h-5 w-5 rounded-full border-2 border-blue-500 flex items-center justify-center bg-blue-500 dark:bg-blue-600">
                                        <svg class="h-3 w-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="member-card border dark:border-gray-700 rounded-lg p-3 cursor-pointer dark:bg-gray-800">
                            <div class="flex items-center">
                                <div
                                    class="h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-900/40 flex items-center justify-center text-blue-800 dark:text-blue-200 font-medium mr-3">
                                    MK</div>
                                <div>
                                    <h4 class="text-sm font-medium text-gray-900 dark:text-white">Michael Kim</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Social Media Specialist</p>
                                </div>
                                <div class="ml-auto">
                                    <div class="h-5 w-5 rounded-full border-2 border-gray-300 dark:border-gray-600">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button id="transferOwnershipBtn"
                        class="px-4 py-2 bg-blue-600 dark:bg-blue-700 text-white rounded-md hover:bg-blue-700 dark:hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 text-sm font-medium">
                        Transfer Ownership to Emily Wilson
                    </button>
                </div>

                <!-- Information Box -->
                <div class="info-box bg-blue-50 dark:bg-blue-900/30 p-4 rounded-md mb-6">
                    <h3 class="font-medium text-blue-800 dark:text-blue-200 mb-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        What happens when you leave?
                    </h3>
                    <ul class="text-blue-700 dark:text-blue-200 space-y-2 text-sm">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 flex-shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            You'll no longer have access to this group's tasks and conversations
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 flex-shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Your tasks will remain assigned to you until reassigned by the new owner
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 flex-shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Your comments and activity history will remain visible to group members
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 flex-shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            You can be invited back to the group by the new owner in the future
                        </li>
                    </ul>
                </div>

                <!-- Your Tasks in this Group -->
                <div class="mb-6">
                    <h3 class="font-medium text-gray-900 dark:text-white mb-3">Your Active Tasks in this Group</h3>
                    <div
                        class="bg-gray-50 dark:bg-gray-800 rounded-md p-4 border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm text-gray-500 dark:text-gray-400">You have 3 active tasks in this
                                group</span>
                            <a href="#"
                                class="text-sm text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">View
                                All</a>
                        </div>

                        <ul class="space-y-2">
                            <li
                                class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                                <div class="flex items-center">
                                    <div class="h-2 w-2 rounded-full bg-yellow-400 mr-2"></div>
                                    <span class="text-sm font-medium text-gray-800 dark:text-gray-100">Update social
                                        media content
                                        calendar</span>
                                </div>
                                <span class="text-xs text-gray-500 dark:text-gray-400">Due in 2 days</span>
                            </li>
                            <li
                                class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                                <div class="flex items-center">
                                    <div class="h-2 w-2 rounded-full bg-red-500 mr-2"></div>
                                    <span class="text-sm font-medium text-gray-800 dark:text-gray-100">Finalize Q3
                                        marketing
                                        budget</span>
                                </div>
                                <span class="text-xs text-gray-500 dark:text-gray-400">Due tomorrow</span>
                            </li>
                            <li class="flex items-center justify-between py-2">
                                <div class="flex items-center">
                                    <div class="h-2 w-2 rounded-full bg-green-500 mr-2"></div>
                                    <span class="text-sm font-medium text-gray-800 dark:text-gray-100">Review website
                                        analytics
                                        report</span>
                                </div>
                                <span class="text-xs text-gray-500 dark:text-gray-400">Due in 5 days</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Warning Box -->
                <div class="warning-box bg-yellow-50 dark:bg-yellow-900/30 p-4 rounded-md mb-6">
                    <h3 class="font-medium text-yellow-800 dark:text-yellow-200 mb-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        Before you leave
                    </h3>
                    <p class="text-yellow-700 dark:text-yellow-100 text-sm">Consider reassigning your tasks to other
                        team members or
                        discussing your departure with the new owner to ensure a smooth transition.</p>
                </div>

                <!-- Leave Button (Disabled until ownership transferred) -->
                <div class="mt-6">
                    <x-forms.button type="submit" color="red" size="md" extraClass="dark:bg-opacity-60">
                        Delete Group
                    </x-forms.button>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">You must transfer ownership before leaving
                        the group</p>
                </div>
            </div>
        </div>

    </main>
</x-app-layout>
