<main x-data="subTaskTable({{ $task->id }})" x-init="loadSubTasks()" x-effect="$store.taskEvents.reload && loadSubTasks()" class="space-y-3">
    <section class="flex items-center justify-end">
        <div class="flex-grow max-w-xs w-full">
            <label for="search-sub-task-table" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div
                    class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <x-forms.text-input x-model="search" @input.debounce.500ms="loadSubTasks()" color="blue" type="search" id="search-sub-task-table"
                    placeholder="Search Task..."
                    extraClass="pl-10 focus:border-blue-500"></x-forms.text-input>
            </div>
        </div>
    </section>
    <template x-if="!loading">
        <div class="overflow-x-auto relative rounded-t-lg">
            <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead
                    class="sticky top-0 text-sm text-gray-700 uppercase bg-green-200 dark:bg-green-200 dark:bg-opacity-50 dark:text-white whitespace-nowrap">
                    <tr>
                        <th class="px-6 py-3 w-1">#</th>
                        <th class="px-6 py-3">Description</th>
                        <th class="px-6 py-3">Deadline</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(subTask, index) in subTasks" :key="subTask.id">
                        <tr
                            class="group bg-white border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-900 whitespace-nowrap">
                            <td class="px-6 py-3 w-1 text-gray-900 dark:text-white">
                                <span x-text="index + 1"></span>
                            </td>
                            <td class="px-6 py-3">
                                <span x-text="subTask.description"></span>
                            </td>
                            <td class="px-6 py-3">
                                <span x-text="formatDate(subTask.due_date)"></span>
                            </td>
                            <td class="px-6 py-3 w-1">
                                <div class="flex items-center">

                                    <x-templates.tooltip>
                                        <x-slot name="trigger">
                                            <button type="button"
                                                class="text-gray-500 group-hover:text-red-500 hover:bg-gray-200 dark:hover:bg-gray-800 p-2.5 rounded-lg hover:animate-wiggle">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </x-slot>
                                        Delete
                                    </x-templates.tooltip>

                                </div>
                            </td>
                        </tr>
                    </template>
                    

                    <template x-if="subTasks.length === 0">
                        <tr class="text-center bg-white border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 whitespace-nowrap">
                            <td colspan="100%" class="px-6 py-4 text-red-500 dark:text-red-500 text-sm">
                                No sub-tasks available.
                            </td>
                        </tr>
                    </template>
                    
                </tbody>
            </table>
        </div>
    </template>

    <div class="text-gray-600 dark:text-gray-200">
        Showing
        <span x-text="subTasks.length"></span>
        Entries
    </div>
</main>
