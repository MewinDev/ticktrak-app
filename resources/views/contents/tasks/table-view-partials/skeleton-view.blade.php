<!-- Table Skeleton -->
<section>
    <div class="relative overflow-x-auto sm:rounded-t-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead
                class="text-sm text-gray-700 uppercase bg-blue-200 dark:bg-blue-200 dark:bg-opacity-50 dark:text-white">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Title</th>
                    <th class="px-6 py-3">Details</th>
                    <th class="px-6 py-3">Priority</th>
                    <th class="px-6 py-3">Due Date</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                <template x-for="data in tasks" :key="data.id">
                    <tr
                        class="bg-white border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-900 whitespace-nowrap">
                        <td class="px-6 py-4 w-5">
                            <div class="h-6 w-6 rounded-sm bg-gray-300 dark:bg-gray-600 animate-pulse"></div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="h-4 max-w-[100px] rounded bg-gray-300 dark:bg-gray-600 animate-pulse">
                            </div>

                            <template x-if="data.status === 'pending'">
                                <div
                                    class="inline-block px-2 py-1 mt-2 rounded-md bg-blue-100 dark:bg-blue-900 animate-pulse w-14 h-3">
                                </div>
                            </template>
                            <template x-if="data.status === 'done'">
                                <div
                                    class="inline-block px-2 py-1 mt-2 rounded-md bg-green-100 dark:bg-green-900 animate-pulse w-14 h-3">
                                </div>
                            </template>
                        </td>
                        <td class="px-6 py-4 space-y-2 w-1/2">
                            <div class="h-4 rounded bg-gray-300 dark:bg-gray-600 animate-pulse">
                            </div>
                            <div class="h-4 rounded bg-gray-300 dark:bg-gray-600 animate-pulse">
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <template x-if="data.priority === 'high'">
                                <div
                                    class="px-2 py-1 max-w-[90px] rounded-md bg-red-100 dark:bg-red-900 animate-pulse h-6">
                                </div>
                            </template>
                            <template x-if="data.priority === 'medium'">
                                <div
                                    class="px-2 py-1 max-w-[90px] rounded-md bg-blue-100 dark:bg-blue-900 animate-pulse h-6">
                                </div>
                            </template>
                            <template x-if="data.priority === 'low'">
                                <div
                                    class="px-2 py-1 max-w-[90px] rounded-md bg-green-100 dark:bg-green-900 animate-pulse h-6">
                                </div>
                            </template>
                        </td>
                        <td class="px-6 py-4">
                            <div class="h-4 max-w-[90px] rounded bg-gray-300 dark:bg-gray-600 animate-pulse">
                            </div>
                        </td>
                        <td class="px-6 py-4 w-5">
                            <div class="h-6 w-6 rounded-full bg-gray-300 dark:bg-gray-600 animate-pulse"></div>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</section>
