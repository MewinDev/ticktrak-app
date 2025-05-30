<x-app-layout>
    @include('contents.tasks.header')
    <main class="mt-5">
        <div class="bg-gray-50 dark:bg-gray-800 p-4 md:p-5 rounded-md border border-gray-200 dark:border-gray-600 mb-5">
            @include('contents.tasks.table-view')
            @include('contents.tasks.list-view')
        </div>
    </main>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('taskEvents', {
                reload: false,
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
        function taskForm() {
            return {
                form: {
                    title: '',
                    priority: '',
                    due_date: '',
                    details: ''
                },
                errors: {},
                loading: false,

                async submit() {
                    this.errors = {};
                    this.loading = true;

                    try {
                        const response = await fetch('/api/tasks', {
                            method: 'POST',
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
                                console.log('Response Error:', this.errors);
                            }
                            return;
                        }
                        document.dispatchEvent(new CustomEvent('task-created'));
                        Alpine.store('taskEvents').reload = true;

                        this.resetForm();
                        this.loading = false;
                        this.$dispatch('close');
                    } catch (error) {
                        console.error('Fetch Error:', error);
                    }
                },


                resetForm() {
                    this.form = {
                        title: '',
                        priority: '',
                        due_date: '',
                        details: ''
                    };
                    this.errors = {};
                },
            };
        }

        function editTaskForm() {
            return {
                form: {
                    title: '',
                    priority: '',
                    due_date: '',
                    details: ''
                },
                errors: {},
                loading: false,

                async submit() {
                    const taskId = this.editForm.id; // or use a real task ID
                    console.log(this.form);

                    this.errors = {};

                    this.loading = true;

                    try {
                        const response = await fetch(`/api/tasks/${taskId}`, {
                            method: 'PUT',
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
                            this.loading = false;
                            return;
                        }

                        // ✅ Correct: Dispatch on document
                        document.dispatchEvent(new CustomEvent('task-created'));
                        Alpine.store('taskEvents').reload = true;
                        this.$dispatch('close');
                    } catch (error) {
                        console.error('Fetch Error:', error);
                        // alert('Request failed. Please try again.');
                        this.loading = false;
                    }
                },
            };
        }

        function taskList() {
            return {
                tasks: [],
                search: '',
                priority: '',
                loading: true,

                loadTasks() {

                    const params = new URLSearchParams({
                        search: this.search,
                        priority: this.priority,
                    });

                    this.loading = true,
                        fetch(`/api/tasks?${params.toString()}`)
                        .then(response => response.json())
                        .then(data => {
                            const all = data.all_tasks;

                            this.tasks = all;
                            setTimeout(() => {
                                this.loading = false;
                            }, 100);
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
                loading: true,
                openSubId: null,
                editForm: {},
                search: '',
                status: '',
                priority: '',
                perPage: 10,
                perPageOptions: [10, 25, 50, 100, 250, 500, 'All'],
                pagination: {
                    current_page: 1,
                    last_page: 1,
                    per_page: 10,
                    total: 0,
                },

                loadTasks(page = 1) {
                    this.loading = true;

                    const params = new URLSearchParams({
                        page: page,
                        per_page: this.perPage === 'All' ? this.pagination.total : this.perPage,
                        search: this.search,
                        status: this.status,
                        priority: this.priority,
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
                            setTimeout(() => {
                                this.loading = false;
                            }, 100);
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
