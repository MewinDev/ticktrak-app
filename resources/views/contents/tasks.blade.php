<x-app-layout>
    @include('contents.tasks.header')
    <main x-data="taskTable(), taskList()" x-init="loadTasks()" x-effect="$store.taskEvents.reload && loadTasks()"
        class="mt-5 pb-8">
        <div class="bg-gray-50 dark:bg-gray-800 p-4 md:p-5 rounded-md border border-gray-200 dark:border-gray-600">
            <section id="table-view" style="display:none;">
                @include('contents.tasks.table-view-partials.filtering-view')
                @include('contents.tasks.table-view')
                @include('contents.tasks.table-view-partials.pagination-view')
            </section>

            <section id="list-view" style="display:none;">
                @include('contents.tasks.list-view-partials.filtering-view')
                @include('contents.tasks.list-view')
            </section>

        </div>

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
                        <x-forms.button color="gray" type="button" @click="$dispatch('close')">Close</x-forms.button>
                        <x-forms.button color="blue" type="submit" name="update-tasks">Update Task</x-forms.button>
                    </div>
                </form>
            </div>
        </x-modal>

        <x-modal :header="false" maxWidth="lg" title="Delete Task" name="delete-tasks-modal">
            <div class="my-2" x-data="taskForm('delete', selectedTask)">
                <form @submit.prevent="submit" class="space-y-4 ">
                    <div class="flex flex-col items-center justify-center space-y-5">
                        <svg class='text-red-500 dark:text-red-500 w-14 h-14' viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 8V12M12 16H12.01M7.8 21H16.2C17.8802 21 18.7202 21 19.362 20.673C19.9265 20.3854 20.3854 19.9265 20.673 19.362C21 18.7202 21 17.8802 21 16.2V7.8C21 6.11984 21 5.27976 20.673 4.63803C20.3854 4.07354 19.9265 3.6146 19.362 3.32698C18.7202 3 17.8802 3 16.2 3H7.8C6.11984 3 5.27976 3 4.63803 3.32698C4.07354 3.6146 3.6146 4.07354 3.32698 4.63803C3 5.27976 3 6.11984 3 7.8V16.2C3 17.8802 3 18.7202 3.32698 19.362C3.6146 19.9265 4.07354 20.3854 4.63803 20.673C5.27976 21 6.11984 21 7.8 21Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="mb-5 text-center text-gray-500 dark:text-gray-300">Are you sure you want to delete
                            this item?</p>
                    </div>
                    <div class="flex justify-center items-center space-x-4">
                        <x-forms.button color="gray" type="button"
                            @click="$dispatch('close')">Cancel</x-forms.button>
                        <x-forms.button color="red" type="submit" name="delete-tasks">Yes, I'm sure</x-forms.button>
                    </div>
                </form>
            </div>
        </x-modal>
    </main>
    <script src="{{ asset('scripts/tasks/toggle-view.js') }}"></script>
    <script src="{{ asset('scripts/tasks/task-form.js') }}"></script>
    <script src="{{ asset('scripts/tasks/task-list.js') }}"></script>
    <script src="{{ asset('scripts/tasks/task-table.js') }}"></script>
    <script>
        // ✅ Correct: Listen on document instead of window
        document.addEventListener('task-created', () => {
            const table_section = document.querySelector('#table-view');
            const list_section = document.querySelector('#list-view');
            if (table_section && table_section.__x) {
                table_section.__x.$data.loadTasks();
            }
            if (list_section && list_section.__x) {
                list_section.__x.$data.loadTasks();
            }
        });
    </script>

</x-app-layout>
