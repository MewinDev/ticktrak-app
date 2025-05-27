<x-app-layout>

    @include('contents.tasks-partials.header')

    <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">

    <main>
        <section class="flex items-center gap-3 mb-5">
            <div class=" bg-white dark:bg-gray-900 flex-grow max-w-md">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <x-forms.text-input color="purple" type="search" id="search-task-table"
                        placeholder="Search Task..." extraClass="pl-10"></x-forms.text-input>
                </div>
            </div>

            <div>
                <x-forms.select-input color="purple" label="Priority" width="28">
                    <option value="">Priority</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                    <option value="all">All</option>
                </x-forms.select-input>
            </div>
        </section>

        <div
            class="bg-gray-50 dark:bg-gray-800 p-5 rounded-md border border-gray-200 dark:border-gray-600 resize-div mb-5">
            @include('contents.tasks-partials.table-view')

            @include('contents.tasks-partials.list-view')
        </div>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all necessary elements
            const tableView = document.getElementById('table-view');
            const listView = document.getElementById('list-view');
            const tableButton = document.getElementById('table-btn');
            const listButton = document.getElementById('list-btn');

            // These are the styles we'll switch for active/inactive buttons
            const activeClasses = [
                'bg-white', 'text-black', 'border-gray-300',
                'dark:bg-gray-800', 'dark:text-white', 'dark:border-gray-600'
            ];

            const inactiveClasses = [
                'text-gray-400', 'border-none',
                'dark:hover:bg-gray-700', 'dark:text-white', 'dark:hover:border-gray-600'
            ];

            // This function switches between table and list views
            function toggleView(viewType) {
                const istable = viewType === 'table';

                // Show or hide views
                tableView.classList.toggle('hidden', !istable);
                listView.classList.toggle('hidden', istable);

                // Update button styles
                updateButtonStyle(tableButton, istable);
                updateButtonStyle(listButton, !istable);
            }

            // This function applies the correct styles to a button
            function updateButtonStyle(button, isActive) {
                if (isActive) {
                    button.classList.remove(...inactiveClasses);
                    button.classList.add(...activeClasses);
                } else {
                    button.classList.remove(...activeClasses);
                    button.classList.add(...inactiveClasses);
                }
            }

            // Expose the toggle function so it can be called from HTML
            window.toggleView = toggleView;

            // Set the default view on page load
            toggleView('table');
        });
    </script>

    <script>
        function taskForm() {
            return {
                form: {
                    title: '',
                    priority: '',
                    due_date: '',
                    details: '',
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
                                'Accept': 'application/json',
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

                        // Dispatch event on window to notify table
                        window.dispatchEvent(new CustomEvent('task-created', {
                            detail: data.task
                        }));

                        this.resetForm();
                        this.loading = false;

                        // Optional: close modal or UI signal
                        // $dispatch('close');

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
                        details: '',
                    };
                }
            }
        }
    </script>

</x-app-layout>
