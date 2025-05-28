<!-- List View (Replaces Table View) -->
<section id="list-view" class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 p-4 hidden">
    @foreach ($list_task as $task)
        <div
            class="relative bg-blue-50 dark:bg-blue-300 dark:bg-opacity-70 rounded-lg shadow-md p-5 border dark:border-gray-700">
            <div class="flex justify-between items-start">
                <!-- Checkbox -->
                <input id="checkbox-1" type="checkbox"
                    class="w-4 h-4 mt-1 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                <!-- Action Button -->
                <button type="button" class="text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </button>
            </div>

            <!-- Task Info -->
            <div class="mt-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $task->title }}</h3>
                <p class="text-base text-gray-600 dark:text-gray-300 mt-2 line-clamp-3">
                    {{ $task->details }}
                </p>
            </div>

            <!-- Metadata -->
            <div class="mt-4">
                <div class="text-sm text-gray-800 dark:text-white"><strong>Priority:</strong>
                    {{ ucwords($task->priority) }}</div>
                <div class="text-sm text-gray-600 dark:text-gray-300 mt-2 line-clamp-3"><strong>Due:</strong>
                    {{ !empty($task->due_date) ? date('F d, Y', strtotime($task->due_date)) : '' }}</div>
            </div>
        </div>
    @endforeach
</section>
