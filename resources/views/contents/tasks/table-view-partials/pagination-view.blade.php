<section class="flex flex-col sm:flex-row justify-between gap-4 items-center mt-4">
    <div class="text-gray-600 dark:text-gray-200 order-2 sm:order-1">
        Showing
        <span x-text="from()"></span>
        to
        <span x-text="to()"></span>
        of
        <span x-text="pagination.total"></span> Entries
    </div>


    <ul class="inline-flex items-stretch -space-x-px order-1 sm:order-2">
        <li>
            <button @click="goToPage(pagination.current_page - 1)" :disabled="pagination.current_page === 1"
                class="disabled:cursor-not-allowed flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <span class="sr-only">Previous</span>
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </li>
        <!-- Dynamic Page Buttons -->
        <template x-for="page in paginationRange()" :key="page">
            <li>
                <button x-text="page" :disabled="page === '...'"
                    @click="typeof page === 'number' && goToPage(page)"
                    :class="{
                        'z-10 flex items-center justify-center px-3 py-2 text-sm leading-tight border text-primary-600 bg-primary-50 border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white': page ===
                            pagination.current_page,
                        'flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white': page !==
                            pagination.current_page
                    }"
                    class="flex items-center justify-center px-4 h-10 border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"></button>
            </li>
        </template>

        <!-- Ellipsis -->
        <li x-show="pagination.last_page > 5 && pagination.current_page < pagination.last_page - 2">
            <span
                class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                ...
            </span>
        </li>
        <li>
            <button @click="goToPage(pagination.current_page + 1)"
                :disabled="pagination.current_page === pagination.last_page"
            class="disabled:cursor-not-allowed flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            <span class="sr-only">Next</span>
            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
            </button>
        </li>
    </ul>
</section>
