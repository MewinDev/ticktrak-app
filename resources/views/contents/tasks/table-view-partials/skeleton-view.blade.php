<!-- Table Skeleton -->
<section>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead
                class="text-sm text-gray-700 uppercase bg-blue-200 dark:bg-blue-200 dark:bg-opacity-50 dark:text-white">
                <tr>
                    <th class="p-4">
                        <div class="h-4 w-4 rounded bg-gray-300 dark:bg-gray-600 animate-pulse"></div>
                    </th>
                    <th class="px-6 py-3">Title</th>
                    <th class="px-6 py-3">Details</th>
                    <th class="px-6 py-3">Priority</th>
                    <th class="px-6 py-3">Due Date</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                <template x-for="data in tasks" :key="data.id">
                    <tr
                        class="bg-white border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 whitespace-nowrap">
                        <td class="w-4 p-4">
                            <div class="h-4 w-4 rounded bg-gray-300 dark:bg-gray-600 animate-pulse"></div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="h-4 max-w-[100px] rounded bg-gray-300 dark:bg-gray-600 animate-pulse">
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="h-4 max-w-[150px] rounded bg-gray-300 dark:bg-gray-600 animate-pulse">
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div
                                class="inline-block px-2 py-1 rounded-md bg-blue-100 dark:bg-blue-900 animate-pulse w-14 h-6">
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="h-4 max-w-[90px] rounded bg-gray-300 dark:bg-gray-600 animate-pulse">
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div
                                class="inline-block px-2 py-1 rounded-md bg-blue-100 dark:bg-blue-900 animate-pulse w-14 h-6">
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
