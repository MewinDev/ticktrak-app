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

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('taskEvents', {
                reload: false,
            });

            Alpine.store('toast', {
                show: false,
                message: '',
                type: '', // Set as empty to avoid undefined
                trigger(message, type = 'success') {
                    console.log('Toast triggered:', message, type);
                    this.message = message;
                    this.type = type;
                    this.show = true;
                    setTimeout(() => this.show = false, 3000);
                }
            });
        });
    </script>

    <script>
        // Run toggleView as early as possible
        const savedView = localStorage.getItem('table-view') || 'table';

        // This function applies the correct styles to a button
        function updateButtonStyle(button, isActive) {
            const activeClasses = [
                'bg-white', 'text-black', 'border-gray-300',
                'dark:bg-gray-800', 'dark:text-white', 'dark:border-gray-600'
            ];
            const inactiveClasses = [
                'text-gray-400', 'border-none',
                'dark:hover:bg-gray-700', 'dark:text-white', 'dark:hover:border-gray-600'
            ];

            if (isActive) {
                button.classList.remove(...inactiveClasses);
                button.classList.add(...activeClasses);
            } else {
                button.classList.remove(...activeClasses);
                button.classList.add(...inactiveClasses);
            }
        }

        // This function switches between table and list views
        function toggleView(viewType) {
            const istable = viewType === 'table';

            const tableView = document.getElementById('table-view');
            const listView = document.getElementById('list-view');
            const tableButton = document.getElementById('table-btn');
            const listButton = document.getElementById('list-btn');

            // Use display block/none instead of hidden class
            tableView.style.display = istable ? 'block' : 'none';
            listView.style.display = istable ? 'none' : 'block';

            updateButtonStyle(tableButton, istable);
            updateButtonStyle(listButton, !istable);

            localStorage.setItem('table-view', viewType);
        }

        // Ensure DOM content is fully loaded before selecting and toggling
        document.addEventListener('DOMContentLoaded', function() {
            toggleView(savedView);
            // Make it available globally
            window.toggleView = toggleView;
        });
    </script>

    <script>
        function taskForm(mode, selectedTask) {
            return {
                mode,
                errors: {},
                loading: true,
                form: {
                    id: '',
                    title: '',
                    priority: '',
                    due_date: '',
                    details: ''
                },

                async submit() {
                    this.errors = {};
                    this.loading = true;
                    const taskId = this.selectedTask?.id;
                    if (this.mode === 'update' || this.mode === 'delete') {
                        this.form.id = taskId;
                    }
                    if (this.mode === 'update') {
                        this.form.title = this.selectedTask.title;
                        this.form.priority = this.selectedTask.priority;
                        this.form.due_date = this.selectedTask.due_date;
                        this.form.details = this.selectedTask.details;
                    }
                    if (this.mode === 'delete') {
                        this.form.title = this.selectedTask.title;
                    }

                    const url = this.mode === 'update' || this.mode === 'delete' ?
                        `/api/tasks/${taskId}` :
                        '/api/tasks';

                    const method = this.mode === 'update' ? 'PUT' : this.mode === 'delete' ? 'DELETE' : 'POST';

                    try {
                        const response = await fetch(url, {
                            method,
                            headers: {
                                'Content-Type': 'application/json',
                                Accept: 'application/json',
                            },
                            body: JSON.stringify(this.form),
                        });
                        const data = await response.json();

                        if (!response.ok) {
                            if (response.status === 422) {
                                this.errors = data.errors;
                            }
                            return;
                        }

                        this.message = data.message;
                        this.type = 'success';
                        this.show = true;
                        // ✅ Success: Trigger the toast
                        Alpine.store('toast').trigger(data.message, 'success');
                        Alpine.store('taskEvents').reload = Date.now();
                        this.resetForm();
                        this.$dispatch('close');
                    } catch (error) {
                        console.error('Submit Error:', error);
                        Alpine.store('toast').trigger('Something went wrong', 'error');
                        this.message = 'Something went wrong';
                        this.type = 'error';
                        this.show = true;
                    } finally {
                        setTimeout(() => {
                            this.loading = false;
                        }, 2000);
                    }
                },

                resetForm() {
                    this.form = {
                        id: null,
                        title: '',
                        priority: '',
                        due_date: '',
                        details: ''
                    };
                    this.errors = {};
                }
            };
        }


        function taskList() {
            return {
                tasks: [],
                selectedTask: {},
                loading: false,
                search: '',
                loading: false,

                loadTasks() {

                    const params = new URLSearchParams({
                        search: this.search,
                    });

                    this.loading = true,
                        fetch(`/api/tasks?${params.toString()}`)
                        .then(response => response.json())
                        .then(data => {
                            const all = data.all_tasks;

                            this.tasks = all;
                            setTimeout(() => {
                                this.loading = false;
                            }, 200);
                        })
                        .catch(() => {
                            this.loading = false;
                        })

                },

                formatDate(date) {
                    if (!date) return '';
                    return new Date(date).toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'long',
                        day: '2-digit'
                    });
                },
            };
        }

        function taskTable() {
            return {
                tasks: [],
                selectedTask: {},
                loading: false,
                search: '',
                perPage: 5,
                perPageOptions: [5, 10, 25, 50, 100, 250, 500, 'All'],
                pagination: {
                    current_page: 1,
                    last_page: 1,
                    per_page: 5,
                    total: 0,
                },

                loadTasks(page = 1) {
                    // this.loading = true;

                    const params = new URLSearchParams({
                        page: page,
                        per_page: this.perPage === 'All' ? this.pagination.total : this.perPage,
                        search: this.search,
                    });

                    fetch(`/api/tasks?${params.toString()}`)
                        .then(response => response.json())
                        .then(data => {

                            const paginated = data.paginated_tasks;

                            this.tasks = paginated.data;
                            this.pagination.current_page = paginated.current_page;
                            this.pagination.last_page = paginated.last_page;
                            this.pagination.per_page = paginated.per_page;
                            this.pagination.total = paginated.total;
                        })
                        .catch(() => {
                            this.loading = false;
                        });
                },

                formatDate(date) {
                    if (!date) return '';
                    return new Date(date).toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'long',
                        day: '2-digit'
                    });
                },

                from() {
                    if (this.pagination.total === 0) return 0;
                    return (this.pagination.current_page - 1) * this.pagination.per_page + 1;
                },

                to() {
                    if (this.pagination.total === 0) return 0;
                    const end = this.pagination.current_page * this.pagination.per_page;
                    return Math.min(end, this.pagination.total);
                },

                goToPage(page) {
                    if (page >= 1 && page <= this.pagination.last_page && page !== this.pagination.current_page) {
                        this.loadTasks(page);
                    }
                },

                paginationRange() {
                    const totalPages = this.pagination.last_page;
                    const currentPage = this.pagination.current_page;
                    const maxVisible = 3;
                    const pages = [];

                    if (totalPages <= maxVisible) {
                        for (let i = 1; i <= totalPages; i++) {
                            pages.push(i);
                        }
                    } else {
                        const side = Math.floor(maxVisible / 2);
                        let start = Math.max(2, currentPage - side);
                        let end = Math.min(totalPages - 1, currentPage + side);

                        if (currentPage <= side) {
                            end = maxVisible - 1;
                        }

                        if (currentPage + side >= totalPages) {
                            start = totalPages - (maxVisible - 2);
                        }

                        pages.push(1); // always show first page

                        if (start > 2) {
                            pages.push('...');
                        }

                        for (let i = start; i <= end; i++) {
                            pages.push(i);
                        }

                        if (end < totalPages - 1) {
                            pages.push('...');
                        }

                        pages.push(totalPages); // always show last page
                    }

                    return pages;
                },
            };
        }

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
