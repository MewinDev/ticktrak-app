<template x-if="loading" class="w-full">
    @include('contents.tasks.table-view-partials.skeleton-view')
</template>

<template x-if="!loading">
    <div class="relative shadow-sm overflow-auto border lg:border-0 dark:border-gray-700 sm:rounded-t-lg">
        <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <thead
                class="sticky top-0 text-sm text-gray-700 uppercase bg-blue-200 dark:bg-blue-200 dark:bg-opacity-50 dark:text-white whitespace-nowrap">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Title</th>
                    <th class="px-6 py-3">Users</th>
                    <th class="px-6 py-3">Progress</th>
                    <th class="px-6 py-3">Priority</th>
                    <th class="px-6 py-3">Due Date</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                <template x-for="(task, index) in tasks"  :key="task.id + task.updated_at">
                    <tr x-data="taskRow(task)" x-init="startProgress()"
                        class="group bg-white border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-900 whitespace-nowrap">
                        <td class="px-6 py-3 text-gray-900 dark:text-white">
                            <span x-text="index + 1"></span>
                        </td>
                        <td class="px-6 py-3 whitespace-normal text-sm">
                            <div x-data="{ expanded: false }" @click.outside="expanded = false"
                                class="relative cursor-pointer">
                                <p @click="expanded = true"
                                    class="w-full overflow-hidden transition-all duration-300 ease-in-out"
                                    :class="expanded ? 'max-h-[1000px]' : 'line-clamp-3'" x-text="task.title">
                                </p>
                            </div>
                        </td>
                        <td class="px-6 py-3 whitespace-normal text-sm">
                            <div class="flex -space-x-4 rtl:space-x-reverse">
                                <img class="w-8 h-8 border-2 border-white rounded-full dark:border-gray-800"
                                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                                    alt="">
                                <img class="w-8 h-8 border-2 border-white rounded-full dark:border-gray-800"
                                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/helene-engels.png"
                                    alt="">
                                <img class="w-8 h-8 border-2 border-white rounded-full dark:border-gray-800"
                                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                    alt="">
                            </div>
                        </td>
                        <td class="px-6 py-3 text-sm w-96">
                            <div>
                                <!-- Progress Label -->
                                <div class="flex justify-end mb-1">
                                    <span class="text-xs text-blue-700 dark:text-white" x-text="progress + '%'"></span>
                                </div>

                                <!-- Progress Bar Background -->
                                <div class="bg-gray-200 w-44 lg:w-full rounded-full h-2 dark:bg-gray-700 mb-1">
                                    <!-- Progress Bar Fill -->
                                    <div class="h-2 rounded-full transition-all duration-500"
                                        :class="progress === 100 ? 'bg-green-500' : 'bg-blue-500'"
                                        :style="{ width: progress + '%' }">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-3">
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
                        </td>
                        <td class="px-6 py-3" x-text="formatDate(task.due_date)"></td>
                        <td class="px-6 py-3 w-1">
                            <div class="flex items-center">
                                <x-templates.tooltip>
                                    <x-slot name="trigger">
                                        <a :href="`{{ url('/tasks') }}/${task.id}`"
                                            class="flex text-gray-500 group-hover:text-blue-500 hover:bg-gray-200 dark:hover:bg-gray-800 px-3 p-1.5 rounded-lg hover:animate-wiggle">
                                            <svg class="size-6" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M20 10.5V6.8C20 5.11984 20 4.27976 19.673 3.63803C19.3854 3.07354 18.9265 2.6146 18.362 2.32698C17.7202 2 16.8802 2 15.2 2H8.8C7.11984 2 6.27976 2 5.63803 2.32698C5.07354 2.6146 4.6146 3.07354 4.32698 3.63803C4 4.27976 4 5.11984 4 6.8V17.2C4 18.8802 4 19.7202 4.32698 20.362C4.6146 20.9265 5.07354 21.3854 5.63803 21.673C6.27976 22 7.11984 22 8.8 22H12M14 11H8M10 15H8M16 7H8M18 21V15M15 18H21"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </x-slot>
                                    Milestone
                                </x-templates.tooltip>

                                <x-templates.tooltip>
                                    <x-slot name="trigger">
                                        <button type="button"
                                            @click.prevent="selectedTask = JSON.parse(JSON.stringify(task)); $dispatch('open-modal', 'update-tasks-modal')"
                                            class="text-gray-500 group-hover:text-yellow-500 hover:bg-gray-200 dark:hover:bg-gray-800 p-1.5 rounded-lg hover:animate-wiggle">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    Update
                                </x-templates.tooltip>

                                <x-templates.tooltip>
                                    <x-slot name="trigger">
                                        <button type="button"
                                            @click="selectedTask = JSON.parse(JSON.stringify(task)); $dispatch('open-modal', 'delete-tasks-modal')"
                                            class="text-gray-500 group-hover:text-red-500 hover:bg-gray-200 dark:hover:bg-gray-800 p-1.5 rounded-lg hover:animate-wiggle">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
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

                <!-- Show if no tasks -->
                <tr x-show="tasks.length === 0"
                    class="text-center bg-white border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 whitespace-nowrap">
                    <td colspan="100%" class="px-6 py-4 text-red-500 dark:text-red-500 text-sm">
                        No tasks available.
                    </td>
                </tr>
            </tbody>
        </table>
        <section class="hidden items-center border border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
            <div class="w-full">
                <!-- Start coding here -->
                <div class="relative overflow-hidden bg-white rounded-b-lg shadow-md dark:bg-gray-800">
                    <nav class="flex flex-row items-center justify-between px-5 py-2" aria-label="Table navigation">
                        <button type="button"
                            class="flex items-center justify-center px-4 py-2 text-xs font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            View full report
                        </button>
                        <p class="text-sm">
                            <span class="font-normal text-gray-500 dark:text-gray-400">Total users:</span>
                            <span class="font-semibold text-gray-900 dark:text-white">1867</span>
                        </p>
                    </nav>
                </div>
            </div>
        </section>
    </div>
</template>
