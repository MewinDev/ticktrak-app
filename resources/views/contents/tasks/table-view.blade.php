<section id="table-view" x-data="taskTable()" x-init="loadTasks()" x-effect="$store.taskEvents.reload && loadTasks()"
    style="display:none;">

    @include('contents.tasks.table-view-partials.filtering-view')

    <template x-if="loading" class="w-full">
        @include('contents.tasks.table-view-partials.skeleton-view')
    </template>

    <template x-if="!loading">
        <div class="relative shadow-sm overflow-auto border lg:border-0 dark:border-gray-700 sm:rounded-t-lg">
            <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                <thead
                    class="sticky top-0 text-sm text-gray-700 uppercase bg-blue-200 dark:bg-blue-200 dark:bg-opacity-50 dark:text-white whitespace-nowrap">
                    <tr>
                        <th class="px-6 py-3 w-1">#</th>
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Details</th>
                        <th class="px-6 py-3">Priority</th>
                        <th class="px-6 py-3">Due Date</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(task, index) in tasks" :key="task.id">
                        <tr class="group bg-white border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-900 whitespace-nowrap">
                            <td class="px-6 py-3 w-1 text-gray-900 dark:text-white">
                                <span x-text="index + 1"></span>
                            </td>
                            <td class="px-6 py-3 break-words">
                                <div>
                                    <div class="text-sm text-gray-500 dark:text-gray-300">
                                        <span x-text="task.title"></span>
                                    </div>
                                    <div class="font-normal text-gray-500 mt-1">
                                        <template x-if="task.status === 'pending'">
                                            <span
                                                class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300"
                                                x-text="task.status"></span>
                                        </template>
                                        <template x-if="task.status === 'completed'">
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300"
                                                x-text="task.status"></span>
                                        </template>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-3 whitespace-normal text-sm">
                                <div x-data="{ expanded: false }" @click.outside="expanded = false"
                                     class="relative">
                                    <p @click="expanded = true"
                                     class="w-52 xl:w-full overflow-hidden transition-all duration-300 ease-in-out"
                                        :class="expanded ? 'max-h-[1000px]' : 'line-clamp-3'" x-text="task.details">
                                    </p>
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
                            <td class="px-6 py-3">
                                <div class="flex items-center">
                                    <button type="button" @click.prevent="selectedTask = JSON.parse(JSON.stringify(task)); $dispatch('open-modal', 'update-tasks-modal')" class="text-gray-500 group-hover:text-blue-500 hover:bg-gray-200 dark:hover:bg-gray-800 p-2.5 rounded-lg hover:animate-wiggle">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                    </button>

                                    <button type="button" @click="selectedTask = JSON.parse(JSON.stringify(task)); $dispatch('open-modal', 'delete-tasks-modal')" class="text-gray-500 group-hover:text-red-500 hover:bg-gray-200 dark:hover:bg-gray-800 p-2.5 rounded-lg hover:animate-wiggle">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
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
        </div>
    </template>

    <x-modal title="Update Task" name="update-tasks-modal">
        <div x-data="taskForm('update', selectedTask)">
            <form @submit.prevent="submit" class="space-y-4">
                <!-- Title -->
                <div>
                    <x-forms.input-label for="title" value="{{ __('Title') }}" />
                    <x-forms.text-input color="blue" type="text" name="title" id="title"
                        fieldName="title" x-model="selectedTask.title" placeholder="Title..."
                        extraClass="focus:border-blue-500"></x-forms.text-input>
                    <x-forms.input-error :messages="$errors->get('title')" x-text="errors?.title?.[0]" class="mt-2" />
                </div>

                <div class="flex items-center gap-4 w-full">
                    <!-- Priority -->
                    <div class="w-full">
                        <x-forms.input-label for="priority" value="{{ __('Priority') }}" />
                        <x-forms.select-input color="blue" name="priority" id="priority" fieldName="priority"
                            x-model="selectedTask.priority" extraClass="focus:border-blue-500">
                            <option value="">Priority</option>
                            <option value="low">Low Priority</option>
                            <option value="medium">Medium Priority</option>
                            <option value="high">High Priority</option>
                        </x-forms.select-input>
                        <x-forms.input-error :messages="$errors->get('priority')" x-text="errors?.priority?.[0]" class="mt-2" />
                    </div>

                    <!-- Due Date -->
                    <div class="w-full">
                        <x-forms.input-label for="due_date" value="{{ __('Due Date (optional)') }}" />
                        <x-forms.text-input color="blue" type="date" name="due_date" fieldName="due_date"
                            x-model="selectedTask.due_date" id="due_date"
                            extraClass="focus:border-blue-500"></x-forms.text-input>
                        <x-forms.input-error :messages="$errors->get('due_date')" x-text="errors?.due_date?.[0]" class="mt-2" />
                    </div>
                </div>

                <!-- Details -->
                <div>
                    <x-forms.input-label for="details" value="{{ __('Details') }}" />
                    <x-forms.text-area color="blue" name="details" id="details" fieldName="details"
                        rows="4" x-model="selectedTask.details" placeholder="Details..."
                        extraClass="focus:border-blue-500"></x-forms.text-area>
                    <x-forms.input-error :messages="$errors->get('details')" x-text="errors?.details?.[0]" class="mt-2" />
                </div>



                <!-- Actions -->
                <div class="flex justify-end space-x-3 pt-4">
                    <x-forms.button color="gray" type="button"
                        @click="$dispatch('close')">Close</x-forms.button>
                    <x-forms.button color="blue" type="submit" name="add-tasks">Add Task</x-forms.button>
                </div>
            </form>
        </div>
    </x-modal>

    @include('contents.tasks.table-view-partials.pagination-view')
</section>
