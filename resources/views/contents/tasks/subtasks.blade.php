<x-app-layout>
    <div>
        <x-templates.breadcrumb :breadcrumb="[['name' => 'Back', 'link' => route('tasks.index')], ['name' => 'Task Details']]" />
    </div>

    <main class="pb-10">
        <div class="mt-5 grid grid-cols-1 xl:grid-cols-4 gap-6">

            <!-- Left: Progress/Details (should be first on all screens) -->
            <section>
                <div class="flex flex-col sm:flex-row xl:flex-col gap-6 w-full xl:col-span-1 order-1">
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
                            <div class="flex flex-col items-end ">
                                <h2 class="mb-2 text-sm font-bold text-gray-900 dark:text-white">
                                    <span class="font-normal">{{ !empty($task->due_date) ? date('F d, Y', strtotime($task->due_date)) : 'Unknown' }}</span>
                                </h2>
                                <p class="text-sm text-gray-700 dark:text-gray-400">Deadline:</p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="w-full bg-gray-100 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-5">
                        <h1 class="text-sm font-bold leading-none text-gray-900 dark:text-white uppercase mb-3">
                            Add Milestones (Sub-Tasks)
                        </h1>
                        @include('contents.tasks.subtasks-partials.create-sub-task-form')
                    </div>
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
                    @include('contents.tasks.subtasks-partials.sub-tasks-list')
                </div>
            </section>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        function subTaskForm(action, taskId, selectedSubTask) {
            return {
                action,
                errors: {},
                loading: false,
                form: {
                    description: '',
                    due_date: '',
                },

                async submit() {
                    this.errors = {};
                    this.loading = true;
                    
                    const subTaskId = this.selectedSubTask?.id;

                    const url = this.action === 'update' || this.action === 'delete'
                        ? `/api/tasks/${taskId}/subtasks/${subTaskId}`
                        : `/api/tasks/${taskId}/subtasks`;

                    const method = this.action === 'update' ? 'PUT' : this.action === 'delete' ? 'DELETE' : 'POST';

                    try {
                        const response = await fetch(url, {
                            method,
                            headers: {
                                'Content-Type': 'application/json',
                                Accept: 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            },
                            body: JSON.stringify(this.form),
                        });

                        const data = await response.json();
                        if(!response.ok) {
                            if(response.status === 422) {
                                this.errors = data.errors
                            }
                            return;
                        }

                        this.message = data.message || 'Sub-task updated successfully';
                        this.type = 'success';
                        this.show = true;
                        this.resetForm();
                        Alpine.store('toast').trigger(this.message, this.type);
                        Alpine.store('taskEvents').reload = Date.now();
                        this.$dispatch('close');
                    }
                    catch(error) {
                        console.log('Error:', error);
                        Alpine.store('toast').trigger('An error occurred while processing your request.', 'error');
                        this.message = 'An error occurred while processing your request.';
                        this.type = 'error';
                        this.show = true;
                    }
                    finally {
                        setTimeout(() => {
                            this.loading = false;
                        }, 2000);
                    }
                },

                resetForm() {
                    this.form = {
                        id: null,
                        description: '',
                        due_date: '',
                    };
                    this.errors = {};
                }
            }
        }

        function subTaskTable(taskId) {
            return {
                taskId,
                subTasks: [],
                selectedSubTask: {},
                search: '',
                loading: false,

                async loadSubTasks() {
                    // this.loading = true;

                    const param = new URLSearchParams({
                        search: this.search,
                    });

                    const url = `/api/tasks/${this.taskId}/subtasks?${param.toString()}`;

                    try {
                        const response = await fetch(url);
                        if(!response.ok) {
                            throw new Error('Failed to fetch subTasks');
                        }

                        const data = await response.json();
                        this.subTasks = data.all_subtasks;

                        this.updateChart();
                    } catch (error) {
                        console.log('Error loading subTasks:', error);
                        Alpine.store('toast').trigger('Failed to load sub-tasks.', 'error');
                    } finally {
                        this.loading = false;
                    }
                    
                },

                async updateStatus(subTaskId, status) {
                    const url = `/api/tasks/${this.taskId}/subtasks/${subTaskId}`;

                    try {
                        const response = await fetch(url, {
                            method: 'PATCH',
                            headers: {
                                'Content-Type': 'application/json',
                                Accept: 'application/json',
                            },
                            body: JSON.stringify({is_complete: !status}),
                        });

                        if(!response.ok) {
                            throw new Error('Failed to update status to completed');
                        }

                        await this.loadSubTasks();
                    } catch (error) {
                        console.log('Update Error', error);
                        Alpine.store('toast').trigger('Failed to update status', 'error');
                    }
                },

                formatDate(date) {
                    if (!date) return '';
                    return new Date(date).toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'long',
                        day: '2-digit'
                    });
                },

                getProgress(){
                    if(this.subTasks.length === 0) return 0;
                    const completed = this.subTasks.filter(st => st.is_complete).length;
                    
                    return Math.round((completed / this.subTasks.length) * 100);
                },

                updateChart() {
                    const progress = this.getProgress();
                    window.currentProgress = progress;
                    if (window.taskChartInstance) {
                        window.taskChartInstance.updateSeries([this.getProgress()]);
                    }
                }
            }
        }
    </script>

    <script>
        // Returns ApexCharts options, adapting to dark mode
        const getChartOptions = () => {
            // Detect dark mode using Tailwind's dark class on html or body
            const isDark = document.documentElement.classList.contains('dark') || document.body.classList.contains(
                'dark');
            const progress = window.currentProgress || 0;
            return {
                series: [progress],
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
