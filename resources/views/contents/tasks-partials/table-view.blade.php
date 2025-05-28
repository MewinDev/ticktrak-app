<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('taskEvents', {
            reload: false,
        });
    });
</script>


<section id="table-view" x-data="taskTable()" x-init="loadTasks()" x-effect="$store.taskEvents.reload && loadTasks()">

    <section class="flex flex-col md:flex-row items-center justify-between gap-3 mb-5">
        <div class="flex items-center justify-center md:justify-between gap-3 w-full">
            <div class="flex items-center gap-3 text-gray-900 dark:text-gray-200">
                Show
                <x-forms.select-input x-model="perPage" @change="loadTasks(1)" color="blue" label="Priority"
                    width="16" extraClass="focus:border-blue-500">
                    <template x-for="option in perPageOptions" :key="option">
                        <option :value="option" x-text="option"></option>
                    </template>
                </x-forms.select-input>
                entries
            </div>

            <div>
                <x-forms.select-input x-model="priority" @change="loadTasks(1)" color="blue" label="Priority"
                    width="32" extraClass="focus:border-blue-500">
                    <option value="">All Priority</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </x-forms.select-input>
            </div>
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
                <x-forms.text-input x-model="search" @input.debounce.500ms="loadTasks(1)" color="blue" type="search"
                    id="search-task-table" placeholder="Search Task..."
                    extraClass="pl-10 focus:border-blue-500"></x-forms.text-input>
            </div>
        </div>
    </section>

    <template x-if="loading" class="w-full">

        <!-- Table Skeleton -->
        <div class="relative overflow-x-auto sm:rounded-t-lg">
            <div class="relative overflow-x-auto sm:rounded-t-lg">

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
                                <td class="px-6 py-4 w-5">
                                    <div class="h-6 w-6 rounded-full bg-gray-300 dark:bg-gray-600 animate-pulse"></div>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>

    </template>

    <template x-if="!loading">
        <div class="relative overflow-x-auto sm:rounded-t-lg">

            <div class="relative overflow-x-auto shadow-sm sm:rounded-t-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead
                        class="text-sm text-gray-700 uppercase bg-blue-200 dark:bg-blue-200 dark:bg-opacity-50 dark:text-white">
                        <tr>
                            <th class="p-4">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </th>
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
                                class="bg-white border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 whitespace-nowrap">
                                <td class="w-4 p-4">
                                    <input type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </td>
                                <td class="px-6 py-4" x-text="data.title"></td>
                                <td class="px-2 py-2 whitespace-normal text-sm max-w-full sm:max-w-sm md:max-w-md lg:max-w-lg"
                                    x-text="data.details">
                                </td>
                                <td class="px-6 py-4">
                                    <template x-if="data.priority === 'high'">
                                        <span
                                            class="text-xs font-medium px-2.5 py-1.5 rounded-md bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300 capitalize">
                                            <span x-text="data.priority"></span> priority
                                        </span>
                                    </template>
                                    <template x-if="data.priority === 'medium'">
                                        <span
                                            class="text-xs font-medium px-2.5 py-1.5 rounded-md bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300 capitalize">
                                            <span x-text="data.priority"></span> priority
                                        </span>
                                    </template>
                                    <template x-if="data.priority === 'low'">
                                        <span
                                            class="text-xs font-medium px-2.5 py-1.5 rounded-md bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 capitalize">
                                            <span x-text="data.priority"></span> priority
                                        </span>
                                    </template>
                                    <template x-if="!['high','medium','low'].includes(data.priority)">
                                        <span
                                            class="text-xs font-medium px-2.5 py-1.5 rounded-md bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-300 capitalize">
                                            <span x-text="data.priority"></span> priority
                                        </span>
                                    </template>
                                </td>
                                <td class="px-6 py-4" x-text="formatDate(data.due_date)"></td>
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
                        </template>
                    </tbody>
                </table>
            </div>

        </div>
    </template>
    <div class="flex flex-col sm:flex-row justify-between gap-4 items-center mt-4">
        <div class="text-gray-900 dark:text-gray-200 order-2 sm:order-1">
            Showing
            <span x-text="(pagination.current_page - 1) * pagination.per_page + 1"></span>
            to
            <span x-text="Math.min(pagination.current_page * pagination.per_page, pagination.total)"></span>
            of
            <span x-text="pagination.total"></span> Entries
        </div>

        <nav aria-label="Page navigation" class="order-1 sm:order-2">
            <ul class="inline-flex -space-x-px text-base h-10">
                <!-- Previous Button -->
                <li>
                    <button @click="goToPage(pagination.current_page - 1)" :disabled="pagination.current_page === 1"
                        class="disabled:cursor-not-allowed flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 disabled:opacity-40">
                        Previous
                    </button>
                </li>

                <!-- Dynamic Page Buttons -->
                <template x-for="page in paginationRange()" :key="page">
                    <li>
                        <button x-text="page" :disabled="page === '...'"
                            @click="typeof page === 'number' && goToPage(page)"
                            :class="{
                                'text-blue-600 bg-blue-50 border-blue-300 dark:bg-gray-600 dark:border-blue-500': page ===
                                    pagination.current_page,
                                'text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700': page !==
                                    pagination.current_page
                            }"
                            class="flex items-center justify-center px-4 h-10 border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"></button>
                    </li>
                </template>

                <!-- Ellipsis -->
                <li x-show="pagination.last_page > 5 && pagination.current_page < pagination.last_page - 2">
                    <span
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                        ...
                    </span>
                </li>

                <!-- Next Button -->
                <li>
                    <button @click="goToPage(pagination.current_page + 1)"
                        :disabled="pagination.current_page === pagination.last_page"
                        class="disabled:cursor-not-allowed flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 disabled:opacity-40">
                        Next
                    </button>
                </li>
            </ul>
        </nav>
    </div>
</section>
