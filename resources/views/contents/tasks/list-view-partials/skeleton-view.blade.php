<!-- Table Skeleton -->
<section class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    <template x-for="data in tasks" :key="data.id">
        <div
            class="relative bg-blue-50 dark:bg-blue-300 dark:bg-opacity-20 rounded-lg shadow-md p-5 border dark:border-gray-700 animate-pulse">
            <!-- Header: Checkbox & Action -->
            <div class="flex justify-between items-start">
                <div class="h-4 w-1/3 bg-gray-300 dark:bg-gray-500 rounded"></div>
                <div class="h-4 w-1/3 bg-gray-300 dark:bg-gray-500 rounded"></div>

                <!-- Dots Action Button Skeleton -->
                <div class="w-5 h-5 rounded-full bg-gray-300 dark:bg-gray-500"></div>
            </div>

            <!-- Title Skeleton -->
            <div class="mt-4 h-5 w-2/3 bg-gray-300 dark:bg-gray-500 rounded"></div>

            <!-- Details Skeleton (3 lines) -->
            <div class="space-y-2 mt-3">
                <div class="h-4 bg-gray-300 dark:bg-gray-500 rounded w-full"></div>
                <div class="h-4 bg-gray-300 dark:bg-gray-500 rounded w-full"></div>
            </div>

            <!-- Priority + Due Date -->
            <div class="flex items-end justify-between mt-4 space-y-2">
                <div class="w-16 h-4 mt-1 rounded-sm bg-gray-300 dark:bg-gray-500"></div>
                <div class="h-4 w-1/2 bg-gray-300 dark:bg-gray-500 rounded"></div>
            </div>
        </div>
    </template>
</section>
