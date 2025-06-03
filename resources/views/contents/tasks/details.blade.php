<x-app-layout>
    <div>
        <x-templates.breadcrumb :breadcrumb="[['name' => 'Back', 'link' => route('tasks.index')], ['name' => 'Task Details']]" />
    </div>

    <main>
        <div class="mt-10 grid grid-cols-1 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 xl:grid-cols-4 gap-6">

            <!-- Left: Progress/Details -->
            <section class="sm:col-span-2 md:col-span-2 lg:col-span-2 xl:col-span-1">
                <div
                    class="bg-gray-100 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-5 h-full flex flex-col">
                    <h1 class="text-base xl:text-xl font-bold leading-none text-gray-900 dark:text-white">
                        Task progress
                    </h1>
                    <!-- Task Chart -->
                    <div class="text-white dark:text-white" id="task-chart"></div>
                </div>
            </section>

            <!-- Right: Table (wider) -->
            <section class="sm:col-span-2 md:col-span-3 lg:col-span-4 xl:col-span-3">
                <div
                    class="bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-5 relative shadow-sm sm:rounded-t-lg">
                    <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                        <thead
                            class="sticky top-0 text-sm text-gray-700 uppercase bg-blue-200 dark:bg-blue-200 dark:bg-opacity-50 dark:text-white whitespace-nowrap">
                            <tr>
                                <th class="px-6 py-3 w-1">#</th>
                                <th class="px-6 py-3">Details</th>
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
                </div>
            </section>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!--
        task Chart Script
        - Renders a task progress chart using ApexCharts.
        - Dynamically adapts to Tailwind dark mode.
        - Observes dark mode changes and updates chart colors accordingly.
        - Destroys previous chart instance before re-rendering to prevent memory leaks.
        - Chart progress (series) is currently hardcoded to 95 (DONE).
    -->
    <script>
        // Returns ApexCharts options, adapting to dark mode
        const getChartOptions = () => {
            // Detect dark mode using Tailwind's dark class on html or body
            const isDark = document.documentElement.classList.contains('dark') || document.body.classList.contains(
                'dark');
            return {
                series: [95], // Progress value (hardcoded, replace with dynamic value if needed)
                colors: [isDark ? "#2563eb" : "#1C64F2"], // Chart color based on mode
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
                            size: "60%",
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
