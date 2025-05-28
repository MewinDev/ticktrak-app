<x-app-layout>

    @include('contents.tasks-partials.header')

    <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">

    <main>

        <script>
            window.addEventListener('task-created', (event) => {
                const task = event.detail;

                // --- 1. Update Table View ---
                const tbody = document.querySelector('#table-view tbody');
                if (tbody) {
                    const tr = document.createElement('tr');
                    tr.className =
                        'bg-white border hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-600 whitespace-nowrap';

                    const due_dateFormatted = task.due_date ? new Date(task.due_date).toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'long',
                        day: '2-digit'
                    }) : '';

                    tr.innerHTML = `
            <td class="w-4 p-4"><input type="checkbox" class="w-4 h-4"></td>
            <td class="px-6 py-4">${task.title || ''}</td>
            <td class="px-6 py-4 line-clamp-3">${task.details || ''}</td>
            <td class="px-6 py-4">
                <span class="text-xs font-medium me-2 px-2.5 py-1.5 rounded-md bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                    ${task.priority || ''}
                </span>
            </td>
            <td class="px-6 py-4">${due_dateFormatted}</td>
            <td class="px-6 py-4 w-5">
                <button type="button" aria-label="More options">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </button>
            </td>
        `;
                    tbody.prepend(tr);
                }

                // --- 2. Update List View ---
                const listView = document.getElementById('list-view');
                if (listView) {
                    const div = document.createElement('div');
                    div.className =
                        "relative bg-blue-50 dark:bg-gray-800 rounded-lg shadow-md p-5 border dark:border-gray-700";

                    const due_dateFormatted = task.due_date ?
                        new Date(task.due_date).toLocaleDateString('en-US', {
                            year: 'numeric',
                            month: 'long',
                            day: '2-digit'
                        }) :
                        '';
                    const priorityText = task.priority ? task.priority.charAt(0).toUpperCase() + task.priority.slice(
                        1) : '';

                    div.innerHTML = `
            <div class="flex justify-between items-start">
                <input type="checkbox" class="w-4 h-4 mt-1 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                <button type="button" class="text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </button>
            </div>

            <div class="mt-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">${task.title || ''}</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300 mt-2 line-clamp-3">
                    ${task.details || ''}
                </p>
            </div>

            <div class="mt-4">
                <div class="text-sm text-gray-800 dark:text-white"><strong>Priority:</strong>
                    ${priorityText}</div>
                <div class="text-sm text-gray-600 dark:text-gray-300 mt-2 line-clamp-3"><strong>Due:</strong>
                    ${due_dateFormatted}</div>
            </div>
        `;

                    listView.prepend(div);
                }
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

                tableView.classList.toggle('hidden', !istable);
                listView.classList.toggle('hidden', istable);

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
                                } else {
                                    alert(data.message || 'Something went wrong.');
                                }
                                this.loading = false;
                                return;
                            }

                            // Dispatch event to update table
                            window.dispatchEvent(
                                new CustomEvent('task-created', {
                                    detail: data.task,
                                })
                            );

                            this.resetForm();
                            this.loading = false;
                            this.$dispatch('close');
                        } catch (error) {
                            console.error('Fetch Error:', error);
                            alert('Request failed. Please try again.');
                            this.loading = false;
                        }
                    },

                    resetForm() {
                        this.form = {
                            title: '',
                            priority: '',
                            due_date: '',
                            details: ''
                        };
                    },
                };
            }

            function taskTable() {
                return {
                    tasks: [],

                    init() {
                        // Optionally fetch existing tasks on page load
                        this.fetchTasks();

                        // Listen to task-created event and update tasks array
                        window.addEventListener('task-created', (event) => {
                            this.tasks.push(event.detail);
                        });
                    },

                    fetchTasks() {
                        fetch('/api/tasks')
                            .then((res) => res.json())
                            .then((data) => {
                                this.tasks = data;
                            });
                    },
                };
            }
        </script>
        <div
            class="bg-gray-50 dark:bg-gray-800 p-5 rounded-md border border-gray-200 dark:border-gray-600 resize-div mb-5">
            @include('contents.tasks-partials.table-view')

            @include('contents.tasks-partials.list-view')
        </div>

    </main>

</x-app-layout>
