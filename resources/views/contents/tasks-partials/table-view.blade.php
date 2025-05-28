<!-- Table View (Show by default) -->
<section id="table-view" class="hidden">

    <div class="relative overflow-x-auto shadow-sm sm:rounded-t-lg">
        <section class="flex items-center gap-3 mb-5">
            <div class=" bg-white dark:bg-gray-900 flex-grow max-w-md">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <x-forms.text-input color="blue" type="search" id="search-task-table"
                        placeholder="Search Task..." extraClass="pl-10 focus:border-blue-500"></x-forms.text-input>
                </div>
            </div>

            <div>
                <x-forms.select-input color="blue" label="Priority" width="28" extraClass="focus:border-blue-500">
                    <option value="">Priority</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                    <option value="all">All</option>
                </x-forms.select-input>
            </div>
        </section>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead
                class="text-xs text-gray-700 uppercase bg-blue-200 dark:bg-blue-300 dark:bg-opacity-70 dark:text-white">
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
                @foreach ($table_task as $task)
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
                        <td class="px-6 py-4">
                            {{ !empty($task->due_date) ? date('F d, Y', strtotime($task->due_date)) : '' }}
                        </td>
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
    </div>

    <div class="mt-3">
        {{ $table_task->links() }}
    </div>
</section>
