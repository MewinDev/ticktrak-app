<section class="flex flex-col sm:flex-row justify-between gap-4 items-center mt-4">
    <div class="text-gray-900 dark:text-gray-200 order-2 sm:order-1">
        Showing
        <span x-text="from()"></span>
        to
        <span x-text="to()"></span>
        of
        <span x-text="pagination.total"></span> Entries
    </div>

    <nav aria-label="Page navigation" class="order-1 sm:order-2">
        <ul class="inline-flex -space-x-px text-base h-10">
            <!-- Previous Button -->
            <li>
                <button @click="goToPage(pagination.current_page - 1)" :disabled="pagination.current_page === 1"
                    class="disabled:cursor-not-allowed flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 disabled:opacity-40">
                    Previous
                </button>
            </li>

            <!-- Dynamic Page Buttons -->
            <template x-for="page in paginationRange()" :key="page">
                <li>
                    <button x-text="page" :disabled="page === '...'"
                        @click="typeof page === 'number' && goToPage(page)"
                        :class="{
                            'text-blue-600 bg-blue-50 border-blue-300 dark:bg-gray-600 dark:border-blue-500': page ===
                                pagination.current_page,
                            'text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700': page !==
                                pagination.current_page
                        }"
                        class="flex items-center justify-center px-4 h-10 border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"></button>
                </li>
            </template>

            <!-- Ellipsis -->
            <li x-show="pagination.last_page > 5 && pagination.current_page < pagination.last_page - 2">
                <span
                    class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                    ...
                </span>
            </li>

            <!-- Next Button -->
            <li>
                <button @click="goToPage(pagination.current_page + 1)"
                    :disabled="pagination.current_page === pagination.last_page"
                    class="disabled:cursor-not-allowed flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 disabled:opacity-40">
                    Next
                </button>
            </li>
        </ul>
    </nav>
</section>
