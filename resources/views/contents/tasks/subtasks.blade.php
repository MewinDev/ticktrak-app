<x-app-layout>
    <div>
        <x-templates.breadcrumb :breadcrumb="[['name' => 'Back', 'link' => route('tasks.index')], ['name' => 'Task Details']]" />
    </div>

    <main x-data="subTaskTable({{ $task->id }})" x-init="loadSubTasks()" x-effect="$store.taskEvents.reload && loadSubTasks()"
        class="pb-10">
        <!-- Your alert -->
        <div id="alert-complete" x-show="showCompleteAlert" x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="flex items-center p-4 mt-4 text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="shrink-0 w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M9 11L12 14L22 4M16 3H7.8C6.11984 3 5.27976 3 4.63803 3.32698C4.07354 3.6146 3.6146 4.07354 3.32698 4.63803C3 5.27976 3 6.11984 3 7.8V16.2C3 17.8802 3 18.7202 3.32698 19.362C3.6146 19.9265 4.07354 20.3854 4.63803 20.673C5.27976 21 6.11984 21 7.8 21H16.2C17.8802 21 18.7202 21 19.362 20.673C19.9265 20.3854 20.3854 19.9265 20.673 19.362C21 18.7202 21 17.8802 21 16.2V12"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm -mb-1 font-medium">
                Great! You've hit 100%. Mark this task as
                <a href="#" class="font-semibold underline hover:no-underline">complete</a>
                to make it official.
            </div>
        </div>


        <div class="mt-4 grid grid-cols-1 xl:grid-cols-4 gap-6">

            <!-- Left: Progress/Details (should be first on all screens) -->
            <section>
                <div class="flex flex-col sm:flex-row xl:flex-col gap-6 w-full xl:col-span-1 order-1">
                    <div
                        class="relative flex-grow w-full bg-gray-100 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-5">

                        <!-- Full-size Canvas -->
                        <canvas class="absolute inset-0 w-full h-full z-0" id="my-canvas"></canvas>
                        <h1
                            class="text-base text-center font-bold leading-none text-gray-900 dark:text-white uppercase">
                            Milestones progress
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
                                    <span
                                        class="font-normal">{{ !empty($task->due_date) ? date('F d, Y', strtotime($task->due_date)) : 'No Set Date' }}</span>
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
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                    <div>
                        <p class="text-blue-500 dark:text-blue-300 text-sm md:text-base mb-2">
                            <strong>Note:</strong>
                            Please check the box after completing a task.
                        </p>
                        @include('contents.tasks.subtasks-partials.sub-tasks-list')
                    </div>
                </div>
            </section>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('scripts/subtasks/sub-task-table.js') }}"></script>
    <script src="{{ asset('scripts/subtasks/sub-task-form.js') }}"></script>
    <script src="{{ asset('scripts/subtasks/sub-task-chart.js') }}"></script>
</x-app-layout>
