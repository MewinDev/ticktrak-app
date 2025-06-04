<x-app-layout>
    <div>
        <x-templates.breadcrumb :breadcrumb="[['name' => 'Back', 'link' => route('tasks.index')], ['name' => 'Task Details']]" />
    </div>

    <main>
        <div class="mt-10 grid grid-cols-1 xl:grid-cols-4 gap-6">

            <!-- Left: Progress/Details (should be first on all screens) -->
            <section class="flex flex-col sm:flex-row xl:flex-col gap-6 w-full xl:col-span-1 order-1">
                <div
                    class="flex-grow w-full bg-gray-100 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-5">
                    <h1 class="text-base text-center font-bold leading-none text-gray-900 dark:text-white">
                        Task progress
                    </h1>
                    <!-- Task Chart -->
                    <div class="text-white dark:text-white 2xl:-mt-2" id="task-chart"></div>
                    <div
                        class="flex items-center justify-between gap-3 pt-3 border-t border-gray-300 dark:border-gray-700">
                        <div class="flex flex-col items-start">
                            <h2 class="mb-2 text-sm font-bold text-gray-900 dark:text-white">
                                @if ($task->priority === 'high')
                                    <span
                                        class="font-normal bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300 px-2 py-1 rounded capitalize">
                                        {{ $task->priority }} Priority
                                    </span>
                                @elseif($task->priority === 'medium')
                                    <span
                                        class="font-normal bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300 px-2 py-1 rounded capitalize">
                                        {{ $task->priority }} Priority
                                    </span>
                                @elseif($task->priority === 'low')
                                    <span
                                        class="font-normal bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 px-2 py-1 rounded capitalize">
                                        {{ $task->priority }} Priority
                                    </span>
                                @else
                                    <span
                                        class="font-normal bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-300 px-2 py-1 rounded capitalize">
                                        {{ $task->priority }} Priority
                                    </span>
                                @endif
                            </h2>
                            <p class="text-sm text-gray-700 dark:text-gray-400 ml-2">Priority:</p>
                        </div>
                        <div class="flex flex-col items-end">
                            <h2 class="mb-2 text-sm font-bold text-gray-900 dark:text-white">
                                <span class="font-normal">{{ date('F d, Y', strtotime($task->due_date)) }}</span>
                            </h2>
                            <p class="text-sm text-gray-700 dark:text-gray-400">Deadline:</p>
                        </div>
                    </div>
                </div>

                <div
                    class="w-full h-full bg-gray-100 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-5">
                    <h1 class="text-base font-bold leading-none text-gray-900 dark:text-white uppercase">
                        Add Milestones
                    </h1>
                    <form method="POST" action="" class="space-y-4 mt-3">
                        <!-- Description -->
                        <div>
                            <x-forms.text-area color="blue" name="description" id="description"
                                fieldName="description" rows="4" placeholder="Description..." required
                                extraClass="focus:border-blue-500"></x-forms.text-area>
                            <x-forms.input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Due Date -->
                        <div class="w-full">
                            <x-forms.input-label for="due_date" value="{{ __('Due Date (optional)') }}" />
                            <x-forms.text-input color="blue" type="date" name="due_date" fieldName="due_date"
                                x-model="selectedTask.due_date" id="due_date"
                                extraClass="focus:border-blue-500"></x-forms.text-input>
                            <x-forms.input-error :messages="$errors->get('due_date')" class="mt-2" />
                        </div>

                        <!-- Actions -->
                        <div class="flex justify-start space-x-3">
                            <x-forms.button color="green" type="submit" name="update-tasks">Add
                                Milestones</x-forms.button>
                        </div>
                    </form>
                </div>
            </section>

            <!-- Right: Table (should be second on all screens) -->
            <section class="xl:col-span-3 order-2">
                <div
                    class="space-y-3 bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-5 relative rounded-lg">
                    <header>
                        <h2 class="text-base font-bold text-gray-900 dark:text-white mb-1">{{ $task->title }}</h2>
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-400">{{ $task->details }}</p>
                    </header>

                    <section class="flex items-center justify-end">
                        <div class="flex-grow max-w-xs w-full">
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative mt-1">
                                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <x-forms.text-input color="blue" type="search"
                                    id="search-task-table" placeholder="Search Task..."
                                    extraClass="pl-10 focus:border-blue-500"></x-forms.text-input>
                            </div>
                        </div>
                    </section>
                    <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead
                            class="sticky top-0 text-sm text-gray-700 uppercase bg-blue-200 dark:bg-blue-200 dark:bg-opacity-50 dark:text-white whitespace-nowrap">
                            <tr>
                                <th class="px-6 py-3 w-1">#</th>
                                <th class="px-6 py-3">Description</th>
                                <th class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="group bg-white border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-900 whitespace-nowrap">
                                <td class="px-6 py-3 w-1 text-gray-900 dark:text-white">
                                    <span></span>
                                </td>
                                <td class="px-6 py-3">
                                    <span></span>
                                </td>
                                <td class="px-6 py-3 w-1">
                                    <div class="flex items-center">

                                        <x-templates.tooltip>
                                            <x-slot name="trigger">
                                                <button type="button"
                                                    class="text-gray-500 group-hover:text-red-500 hover:bg-gray-200 dark:hover:bg-gray-800 p-2.5 rounded-lg hover:animate-wiggle">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">
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

                            <!-- Show if no tasks -->
                            <tr
                                class="text-center bg-white border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 whitespace-nowrap">
                                <td colspan="100%" class="px-6 py-4 text-red-500 dark:text-red-500 text-sm">
                                    No tasks available.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-gray-600 dark:text-gray-200">
                        Showing
                        <span></span>
                        to
                        <span></span>
                        of
                        <span></span> Entries
                    </div>
                </div>
            </section>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        // Returns ApexCharts options, adapting to dark mode
        const getChartOptions = () => {
            // Detect dark mode using Tailwind's dark class on html or body
            const isDark = document.documentElement.classList.contains('dark') || document.body.classList.contains(
                'dark');
            return {
                series: [95], // Progress value (hardcoded, replace with dynamic value if needed)
                colors: ["#0E9F6E"], // Chart color based on mode
                chart: {
                    type: "radialBar",
                    sparkline: {
                        enabled: true
                    },
                },
                plotOptions: {
                    radialBar: {
                        track: {
                            background: isDark ? '#374151' : '#E5E7EB', // Track color
                        },
                        dataLabels: {
                            show: true,
                            name: {
                                color: isDark ? '#fff' : '#111827'
                            }, // Label color
                            value: {
                                color: isDark ? '#fff' : '#111827'
                            } // Value color
                        },
                        hollow: {
                            margin: 0,
                            size: "50%",
                            background: isDark ? '#1f2937' : '#fff' // Hollow center color
                        }
                    },
                },
                grid: {
                    show: true,
                    strokeDashArray: 1
                },
                labels: ["Completed"], // Chart label
                legend: {
                    show: false,
                    position: "left",
                    labels: {
                        colors: isDark ? '#fff' : '#111827'
                    }
                },
                tooltip: {
                    enabled: false,
                    theme: isDark ? 'dark' : 'light',
                    x: {
                        show: false
                    },
                },
                yaxis: {
                    show: false,
                    labels: {
                        formatter: function(value) {
                            return value + '%';
                        },
                        style: {
                            colors: isDark ? '#fff' : '#111827'
                        }
                    }
                }
            }
        }

        // Renders the radial chart, destroying previous instance if exists
        function renderTaskChart() {
            if (document.getElementById("task-chart") && typeof ApexCharts !== 'undefined') {
                // Destroy previous chart if exists
                if (window.taskChartInstance) {
                    window.taskChartInstance.destroy();
                }
                window.taskChartInstance = new ApexCharts(document.querySelector("#task-chart"), getChartOptions());
                window.taskChartInstance.render();
            }
        }

        // Initial render on page load
        renderTaskChart();

        // Listen for dark mode changes (Tailwind dark mode toggling)
        // Re-render chart when dark mode class changes
        const observer = new MutationObserver(() => {
            renderTaskChart();
        });
        observer.observe(document.documentElement, {
            attributes: true,
            attributeFilter: ['class']
        });
    </script>

</x-app-layout>
