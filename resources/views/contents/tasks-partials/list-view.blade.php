<!-- List View (Replaces Table View) -->
<section id="list-view" x-data="taskList()" x-init="loadTasks()" x-effect="$store.taskEvents.reload && loadTasks()">

    <section class="flex flex-col md:flex-row items-center justify-between gap-3 mb-5">
        <div class="flex items-center justify-center md:justify-between gap-3 w-full">
            <div>
                <x-forms.select-input x-model="priority" @change="loadTasks(1)" color="blue" label="Priority"
                    width="32" extraClass="focus:border-blue-500">
                    <option value="">All Priority</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </x-forms.select-input>
            </div>

            <div class="flex-grow max-w-md w-full">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <x-forms.text-input x-model="search" @input.debounce.500ms="loadTasks(1)" color="blue"
                        type="search" id="search-task-table" placeholder="Search Task..."
                        extraClass="pl-10 focus:border-blue-500"></x-forms.text-input>
                </div>
            </div>
    </section>

    <template x-if="loading">
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <template x-for="data in tasks" :key="data.id">
                <div
                    class="relative bg-blue-50 dark:bg-blue-300 dark:bg-opacity-20 rounded-lg shadow-md p-5 border dark:border-gray-700 animate-pulse">
                    <!-- Header: Checkbox & Action -->
                    <div class="flex justify-between items-start">
                        <!-- Checkbox Skeleton -->
                        <div class="w-4 h-4 mt-1 rounded-sm bg-gray-300 dark:bg-gray-500"></div>

                        <!-- Dots Action Button Skeleton -->
                        <div class="w-5 h-5 rounded-full bg-gray-300 dark:bg-gray-500"></div>
                    </div>

                    <!-- Title Skeleton -->
                    <div class="mt-4 h-5 w-2/3 bg-gray-300 dark:bg-gray-500 rounded"></div>

                    <!-- Details Skeleton (3 lines) -->
                    <div class="space-y-2 mt-3">
                        <div class="h-4 bg-gray-300 dark:bg-gray-500 rounded w-full"></div>
                    </div>

                    <!-- Priority + Due Date -->
                    <div class="mt-4 space-y-2">
                        <div class="h-4 w-1/3 bg-gray-300 dark:bg-gray-500 rounded"></div>
                        <div class="h-4 w-1/2 bg-gray-300 dark:bg-gray-500 rounded"></div>
                    </div>
                </div>
            </template>
        </div>
    </template>

    <template x-if="!loading">
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <template x-for="data in tasks" :key="data.id">
                <div
                    class="relative bg-blue-50 dark:bg-blue-300 dark:bg-opacity-20 rounded-lg shadow-md p-5 border dark:border-gray-700">
                    <div class="flex justify-between items-start">
                        <!-- Checkbox -->
                        <input id="checkbox-1" type="checkbox"
                            class="w-4 h-4 mt-1 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                        <!-- Action Button -->
                        <x-navs.dropdown width="24">
                            <x-slot name="trigger">
                                <button type="button"
                                    class="text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                    </svg>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <div>
                                    <button
                                        class="flex items-center justify-between gap-2 w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                                        Edit
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>

                                    </button>
                                    <button
                                        class="flex items-center justify-between gap-2 w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                                        Delete
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                    </button>
                                </div>
                            </x-slot>
                        </x-navs.dropdown>
                    </div>

                    <!-- Task Info -->
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white" x-text="data.title"></h3>
                        <p class="text-base text-gray-600 dark:text-gray-300 mt-2 text-break" x-text="data.details">
                        </p>
                    </div>

                    <!-- Metadata -->
                    <div class="mt-4">
                        <div class="text-sm text-gray-800 dark:text-white" x-text="data.priority">
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-300 mt-2 line-clamp-3"
                            x-text="formatDate(data.due_date)">
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </template>
</section>
