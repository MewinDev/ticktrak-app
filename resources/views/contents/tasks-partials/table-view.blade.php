<!-- Table View (Show by default) -->
<section id="table-view" class="relative overflow-x-auto shadow-md sm:rounded-t-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead
            class="text-xs text-gray-700 uppercase bg-purple-200 dark:bg-purple-400 dark:bg-opacity-30 dark:text-white">
            <tr>
                <th class="p-4">
                    <input id="checkbox-all" type="checkbox"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                </th>
                <th class="px-6 py-3">Title</th>
                <th class="px-6 py-3">Details</th>
                <th class="px-6 py-3">Priority</th>
                <th class="px-6 py-3">Due Date</th>
                <th class="px-6 py-3"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allTask as $task)
                <tr
                    class="bg-white border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 whitespace-nowrap">
                    <td class="w-4 p-4">
                        <input id="checkbox-1" type="checkbox"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                    </td>
                    <td class="px-6 py-4">{{ $task->title }}</td>
                    <td class="px-6 py-4 line-clamp-3">{{ $task->details }}</td>
                    <td class="px-6 py-4">
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-1.5 rounded-md dark:bg-blue-900 dark:text-blue-300">{{ ucwords($task->priority) }}</span>
                    </td>
                    <td class="px-6 py-4">{{ $task->due_date }}</td>
                    <td class="px-6 py-4 w-5">
                        <button type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
