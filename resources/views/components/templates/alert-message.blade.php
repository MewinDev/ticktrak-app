<div x-data x-show="$store.toast.show" x-transition x-init="$watch('$store.toast.show', value => value && setTimeout(() => $store.toast.show = false, 3000))"
    class="fixed top-10 right-4 flex items-center w-full max-w-xs p-4 mb-4 text-sm font-normal rounded-lg shadow-sm border z-40"
    :class="{
        'bg-green-50 text-green-700 border-green-200 dark:bg-green-800 dark:text-green-200': $store.toast
            .type === 'success',
        'bg-red-50 text-red-700 border-red-200 dark:bg-red-800 dark:text-red-200': $store.toast.type === 'error',
        'bg-yellow-50 text-yellow-700 border-yellow-200 dark:bg-yellow-800 dark:text-yellow-200': $store.toast
            .type === 'warning',
        'bg-blue-50 text-blue-700 border-blue-200 dark:bg-blue-800 dark:text-blue-200': $store.toast.type === 'info'
    }"
    role="alert">
    <div class="inline-flex items-center justify-center w-8 h-8 rounded-lg shrink-0"
        :class="{
            'bg-green-100 text-green-600 dark:bg-green-700 dark:text-green-100': $store.toast.type === 'success',
            'bg-red-100 text-red-600 dark:bg-red-700 dark:text-red-100': $store.toast.type === 'error',
            'bg-yellow-100 text-yellow-600 dark:bg-yellow-700 dark:text-yellow-100': $store.toast.type === 'warning',
            'bg-blue-100 text-blue-600 dark:bg-blue-700 dark:text-blue-100': $store.toast.type === 'info'
        }">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
        </svg>
    </div>
    <div class="ms-3 text-gray-900" x-text="$store.toast.message"></div>
    <button type="button" @click="$store.toast.show = false"
        class="ms-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 inline-flex items-center justify-center h-8 w-8 text-gray-400 hover:text-gray-900 dark:text-gray-500 dark:hover:text-white"
        aria-label="Close">
        <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>
