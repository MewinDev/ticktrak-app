<header class="sm:flex items-center justify-between gap-3 whitespace-nowrap">
    <h2 class="text-2xl py-2 font-bold tracking-wider text-gray-900 dark:text-white sm:block hidden">Tasks List</h2>
    <h2 class="text-5xl text-center py-3 mb-5 font-bold tracking-wider text-gray-900 dark:text-white sm:hidden">Tasks
        List</h2>

    <section class="flex items-center justify-center gap-3">
        <!-- Toggle Buttons -->
        <div x-data="{ open: false }"
            class ="flex justify-end gap-2 bg-gray-200 bg-opacity-50 dark:bg-gray-700 rounded-md px-2
                py-1 focus:ring-0">

            <x-forms.button size="xs" color="white" type="button" id="table-btn" x-on:click="toggleView('table')"
                extraClass="rounded-sm flex items-center gap-1 hover:bg-white dark:focus:outline-none dark:ring-0 w-full">
                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                </svg>
                Table
            </x-forms.button>

            <x-forms.button size="xs" color="white" type="button" id="list-btn" x-on:click="toggleView('list')"
                extraClass="rounded-sm flex items-center gap-1 hover:bg-white dark:focus:outline-none dark:ring-0 w-full">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
                List
            </x-forms.button>
        </div>

        <div>
            <x-forms.button x-on:click.prevent="$dispatch('open-modal', 'add-tasks-modal')" size="sm"
                color="blue" type="button" extraClass="rounded-md flex items-center gap-2">
                <span>Add Tasks</span>
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </x-forms.button>

            <x-modal title="Add Task" name="add-tasks-modal">
                <form x-data="taskForm()" @submit.prevent="submit" class="space-y-4">
                    <!-- Title -->
                    <div>
                        <x-forms.input-label for="title" value="{{ __('Title') }}" />
                        <x-forms.text-input color="blue" type="text" name="title" id="title"
                            x-model="form.title" placeholder="Title..." extraClass="focus:border-blue-500"></x-forms.text-input>
                        <x-forms.input-error :messages="$errors->get('title')" x-text="errors.title[0]" class="mt-2" />
                    </div>

                    <div class="flex items-center gap-4 w-full">
                        <!-- Priority -->
                        <div class="w-full">
                            <x-forms.input-label for="priority" value="{{ __('Priority') }}" />
                            <x-forms.select-input color="blue" name="priority" id="priority" x-model="form.priority"
                                extraClass="focus:border-blue-500">
                                <option value="">Priority</option>
                                <option value="low">Low Priority</option>
                                <option value="medium">Medium Priority</option>
                                <option value="high">High Priority</option>
                            </x-forms.select-input>
                            <x-forms.input-error :messages="$errors->get('priority')" x-text="errors.priority[0]" class="mt-2" />
                        </div>

                        <!-- Due Date -->
                        <div class="w-full">
                            <x-forms.input-label for="due_date" value="{{ __('Due Date (optional)') }}" />
                            <x-forms.text-input color="blue" type="date" name="due_date" x-model="form.due_date"
                                id="due_date" extraClass="focus:border-blue-500"></x-forms.text-input>
                            <x-forms.input-error :messages="$errors->get('due_date')" x-text="errors.due_date[0]" class="mt-2" />
                        </div>
                    </div>

                    <!-- Details -->
                    <div>
                        <x-forms.input-label for="details" value="{{ __('Details') }}" />
                        <x-forms.text-area color="blue" name="details" id="details" rows="4"
                            x-model="form.details" placeholder="Details..."
                            extraClass="focus:border-blue-500"></x-forms.text-area>
                        <x-forms.input-error :messages="$errors->get('details')" x-text="errors.details[0]" class="mt-2" />
                    </div>



                    <!-- Actions -->
                    <div class="flex justify-end space-x-3 pt-4">
                        <x-forms.button color="gray" type="button" @click="$dispatch('close')">Close</x-forms.button>
                        <x-forms.button color="blue" type="submit" name="add-tasks">Add Task</x-forms.button>
                    </div>
                </form>
            </x-modal>

        </div>
    </section>
</header>
