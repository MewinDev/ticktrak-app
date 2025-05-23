<x-app-layout>
    <div class="flex items-center justify-between gap-3">
        <h2 class="text-2xl py-2 font-bold tracking-wider text-gray-900 dark:text-white">To-do Tasks</h2>

        <x-forms.button color="blue" type="button" extraClass="rounded-md flex items-center gap-2">
            <span>Add Tasks</span>
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>

        </x-forms.button>
    </div>
    <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">
</x-app-layout>
