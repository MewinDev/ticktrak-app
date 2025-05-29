<section id="table-view" x-data="taskTable()" x-init="loadTasks()" x-effect="$store.taskEvents.reload && loadTasks()"
    style="display:none;">

    @include('contents.tasks.table-view-partials.filtering-view')

    <template x-if="loading" class="w-full">
        @include('contents.tasks.table-view-partials.skeleton-view')
    </template>

    <template x-if="!loading">
        <div class="relative sm:rounded-t-lg">
            <div class="relative shadow-sm sm:rounded-t-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
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
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="data in tasks" :key="data.id">
                            <tr
                                class="bg-white border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-900 whitespace-nowrap">
                                <td class="w-4 p-4">
                                    <input type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </td>
                                <td class="px-6 py-4" x-text="data.title"></td>
                                <td class="px-2 py-2 whitespace-normal text-sm flex items-center">
                                    <div class="w-64 md:w-full lg:max-w-2xl" x-text="data.details"></div>
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
                                <td class="px-6 py-4">
                                    <template x-if="data.status === 'pending'">
                                        <span
                                            class="text-xs font-medium px-2.5 py-1.5 rounded-md bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300 capitalize">
                                            <span x-text="data.status"></span>
                                        </span>
                                    </template>
                                    <template x-if="data.status === 'done'">
                                        <span
                                            class="text-xs font-medium px-2.5 py-1.5 rounded-md bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 capitalize">
                                            <span x-text="data.status"></span>
                                        </span>
                                    </template>
                                </td>
                                <td class="px-6 py-4 w-5">
                                    <!-- Action Button -->
                                    <x-navs.dropdown width="24" align="top-right">
                                        <x-slot name="trigger">
                                            <button type="button"
                                                class="text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                </svg>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <div>
                                                <button x-on:click.prevent="$dispatch('open-modal', 'add-tasks-modal')"
                                                    class="group flex items-center justify-between gap-2 w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                                                    Edit
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="size-5 group-hover:text-blue-500">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg>

                                                </button>
                                                <button
                                                    class="group flex items-center justify-between gap-2 w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                                                    Delete
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="size-5 group-hover:text-red-500">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>

                                                </button>
                                            </div>
                                        </x-slot>
                                    </x-navs.dropdown>
                                </td>
                            </tr>
                        </template>

                        <!-- Show if no tasks -->
                        <tr x-show="tasks.length === 0"
                            class="text-center bg-white border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 whitespace-nowrap">
                            <td colspan="100%" class="px-6 py-4 text-red-500 dark:text-red-500 text-sm">
                                No tasks available.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </template>

    @include('contents.tasks.table-view-partials.pagination-view')
</section>
