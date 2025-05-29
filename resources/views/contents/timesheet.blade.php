<x-app-layout>

    @include('contents.timesheet.header')

    <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">

    <main>
        <section class="flex items-center justify-between gap-3">
            <div class="pb-4 bg-white dark:bg-gray-900 flex-grow max-w-md">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <x-forms.text-input color="gray" type="search" id="search-task-table"
                        placeholder="Search Task..." extraClass="pl-10"></x-forms.text-input>
                </div>
            </div>
        </section>

        @include('contents.timesheet.list-view')

        @include('contents.timesheet.grid-view')

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all necessary elements
            const tableView = document.getElementById('table-view');
            const gridView = document.getElementById('grid-view');
            const listButton = document.getElementById('list-btn');
            const gridButton = document.getElementById('grid-btn');

            // These are the styles we'll switch for active/inactive buttons
            const activeClasses = [
                'bg-white', 'text-black', 'border-gray-300',
                'dark:bg-gray-800', 'dark:text-white', 'dark:border-gray-600'
            ];

            const inactiveClasses = [
                'text-gray-400', 'border-none',
                'dark:hover:bg-gray-700', 'dark:text-white', 'dark:hover:border-gray-600'
            ];

            // This function switches between list and grid views
            function toggleView(viewType) {
                const isList = viewType === 'list';

                // Show or hide views
                tableView.classList.toggle('hidden', !isList);
                gridView.classList.toggle('hidden', isList);

                // Update button styles
                updateButtonStyle(listButton, isList);
                updateButtonStyle(gridButton, !isList);
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
            toggleView('grid');
        });
    </script>
</x-app-layout>
