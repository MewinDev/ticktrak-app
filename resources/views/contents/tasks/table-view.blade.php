<section id="table-view" x-data="taskTable()" x-init="loadTasks()" x-effect="$store.taskEvents.reload && loadTasks()"
    style="display:none;">

    @include('contents.tasks.table-view-partials.filtering-view')

    <template x-if="loading" class="w-full">
        @include('contents.tasks.table-view-partials.skeleton-view')
    </template>

    <template x-if="!loading">
        <div class="relative shadow-sm overflow-auto sm:rounded-t-lg">
            <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                <thead
                    class="sticky top-0 text-sm text-gray-700 uppercase bg-blue-200 dark:bg-blue-200 dark:bg-opacity-50 dark:text-white">
                    <tr>
                        <th class="p-4">
                            <input type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        </th>
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Details</th>
                        <th class="px-6 py-3">Priority</th>
                        <th class="px-6 py-3">Due Date</th>
                    </tr>
                </thead>
                <tbody @click.outside="openSubId = null">
                    <template x-for="data in tasks" :key="data.id">
                        <tr @click="openSubId = openSubId === data.id ? null : data.id; editForm = JSON.parse(JSON.stringify(data))"
                            class="cursor-pointer bg-white border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-900 whitespace-nowrap">
                            <td class="w-4 p-4">
                                <svg class="w-4 h-4 transform transition ease-in-out duration-300"
                                    :class="{ 'rotate-180': openSubId === data.id }" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                </svg>
                            </td>
                            <td class="px-6 py-4 break-words">
                                <div class="ps-3">
                                    <div class="text-sm text-gray-500 font-semibold">
                                        <span x-text="data.title"></span>
                                    </div>
                                    <div class="font-normal text-gray-500 mt-1">
                                        <template x-if="data.status === 'pending'">
                                            <span
                                                class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300"
                                                x-text="data.status"></span>
                                        </template>
                                        <template x-if="data.status === 'done'">
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300"
                                                x-text="data.status"></span>
                                        </template>
                                    </div>
                                </div>
                            </td>
                            <td class="px-2 py-2 whitespace-normal text-sm">
                                <div x-data="{ expanded: false }">
                                    <p class="w-52 xl:w-full overflow-hidden transition-all duration-300 ease-in-out"
                                        :class="expanded ? 'max-h-[1000px]' : 'max-h-[3em]'" x-text="data.details">
                                    </p>
                                    <template x-if="data.details && data.details.length > 0">
                                        <button type="button"
                                            class="2xl:hidden mt-1 text-blue-600 hover:underline text-xs"
                                            x-show="!expanded" @click="expanded = true">
                                            See more
                                        </button>
                                    </template>
                                    <template x-if="expanded">
                                        <button type="button" class="mt-1 text-blue-600 hover:underline text-xs"
                                            @click="expanded = false">
                                            See less
                                        </button>
                                    </template>
                                </div>
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
                        </tr>
                    </template>

                    <tr x-show="openSubId === editForm.id "
                        class="text-center bg-gray-200
                            border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600
                            whitespace-nowrap">
                        <td colspan="7" class="p-4">
                            <form x-data="editTaskForm(editForm)" @submit.prevent="submit">
                                <div class="grid grid-cols-1 lg:grid-cols-5 gap-4">
                                    <!-- Title -->
                                    <div>
                                        <x-forms.text-input color="blue" type="text" name="title" id="title"
                                            fieldName="title" x-model="form.title" placeholder="Title..."
                                            extraClass="focus:border-blue-500"></x-forms.text-input>
                                        <x-forms.input-error :messages="$errors->get('title')" x-text="errors?.title?.[0]"
                                            class="mt-2" />
                                    </div>

                                    <!-- Details -->
                                    <div class="col-span-2">
                                        <x-forms.text-area color="blue" name="details" id="details"
                                            fieldName="details" rows="1" x-model="form.details"
                                            placeholder="Details..."
                                            extraClass="focus:border-blue-500"></x-forms.text-area>
                                        <x-forms.input-error :messages="$errors->get('details')" x-text="errors?.details?.[0]"
                                            class="mt-2" />
                                    </div>

                                    <!-- Priority -->
                                    <div class="w-full">
                                        <x-forms.select-input color="blue" name="priority" id="priority"
                                            fieldName="priority" x-model="form.priority"
                                            extraClass="focus:border-blue-500">
                                            <option value="">Priority</option>
                                            <option value="low">Low Priority</option>
                                            <option value="medium">Medium Priority</option>
                                            <option value="high">High Priority</option>
                                        </x-forms.select-input>
                                        <x-forms.input-error :messages="$errors->get('priority')" x-text="errors?.priority?.[0]"
                                            class="mt-2" />
                                    </div>

                                    <!-- Due Date -->
                                    <div class="w-full">
                                        <x-forms.text-input color="blue" type="date" name="due_date"
                                            fieldName="due_date" x-model="form.due_date" id="due_date"
                                            extraClass="focus:border-blue-500"></x-forms.text-input>
                                        <x-forms.input-error :messages="$errors->get('due_date')" x-text="errors?.due_date?.[0]"
                                            class="mt-2" />
                                    </div>
                                </div>
                                <!-- Actions -->
                                <div class="flex justify-start space-x-3 pt-4">
                                    <x-forms.button size="sm" color="blue" type="submit"
                                        name="edit-tasks">Edit
                                        Task</x-forms.button>
                                    <x-forms.button size="sm" color="gray" type="button"
                                        @click="$dispatch('close')">Close</x-forms.button>
                                </div>
                            </form>
                        </td>
                    </tr>

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

    @include('contents.tasks.table-view-partials.pagination-view')
</section>
