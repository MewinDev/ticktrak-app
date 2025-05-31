<template x-if="loading">
    @include('contents.tasks.list-view-partials.skeleton-view')
</template>

<template x-if="!loading">
    <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
        <template x-for="(task, index) in tasks" :key="task.id">
            <div
                class="relative bg-blue-50 dark:bg-blue-300 dark:bg-opacity-20 rounded-lg shadow-md p-3 border dark:border-gray-700">
                <div class="flex justify-between items-center">
                    <div class="flex md:flex-col lg:flex-row items-start gap-2">
                        <!-- Priority -->
                        <div>
                            <template x-if="task.priority === 'high'">
                                <span
                                    class="text-xs font-medium px-2.5 py-1.5 rounded-md bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300 capitalize">
                                    <span x-text="task.priority"></span> priority
                                </span>
                            </template>
                            <template x-if="task.priority === 'medium'">
                                <span
                                    class="text-xs font-medium px-2.5 py-1.5 rounded-md bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300 capitalize">
                                    <span x-text="task.priority"></span> priority
                                </span>
                            </template>
                            <template x-if="task.priority === 'low'">
                                <span
                                    class="text-xs font-medium px-2.5 py-1.5 rounded-md bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 capitalize">
                                    <span x-text="task.priority"></span> priority
                                </span>
                            </template>
                            <template x-if="!['high','medium','low'].includes(task.priority)">
                                <span
                                    class="text-xs font-medium px-2.5 py-1.5 rounded-md bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-300 capitalize">
                                    <span x-text="task.priority"></span> priority
                                </span>
                            </template>
                        </div>
                        <!-- Status -->
                        <div>
                            <template x-if="task.status === 'pending'">
                                <span
                                    class="text-xs font-medium px-2.5 py-1.5 rounded-md bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300 capitalize">
                                    <span x-text="task.status"></span>
                                </span>
                            </template>
                            <template x-if="task.status === 'done'">
                                <span
                                    class="text-xs font-medium px-2.5 py-1.5 rounded-md bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 capitalize">
                                    <span x-text="task.status"></span>
                                </span>
                            </template>
                        </div>
                    </div>

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
                                <button @click.prevent="selectedTask = JSON.parse(JSON.stringify(task)); $dispatch('open-modal', 'update-tasks-modal')"
                                    class="group flex items-center justify-between gap-2 w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                                    Edit
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor"
                                        class="size-5 group-hover:text-blue-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>

                                </button>
                                <button @click.prevent="selectedTask = JSON.parse(JSON.stringify(task)); $dispatch('open-modal', 'delete-tasks-modal')"
                                    class="group flex items-center justify-between gap-2 w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                                    Delete
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor"
                                        class="size-5 group-hover:text-red-500">
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
                    <h3 class="text-base font-semibold text-gray-800 dark:text-white" x-text="task.title"></h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-2 text-break" x-text="task.details">
                    </p>
                </div>

                <!-- Metatask -->
                <div class="mt-4 flex items-end justify-between gap-3">
                    <div class="text-xs text-gray-600 dark:text-gray-300"
                        x-text="formatDate(task.due_date)">
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>
