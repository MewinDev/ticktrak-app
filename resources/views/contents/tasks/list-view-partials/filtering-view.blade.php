<section class="flex flex-col md:flex-row items-center justify-between gap-3 mb-5">
    <div class="flex items-center justify-center md:justify-between gap-3 w-full">
        <div x-data="{ status: 'pending' }" x-init="loadTasks(1)" class="flex items-center gap-3">
            <x-forms.select-input x-model="status" @change="loadTasks(1)" color="blue" label="Status" width="32"
                extraClass="focus:border-blue-500">
                <option value="pending">Pending</option>
                <option value="completed">Compeleted</option>
            </x-forms.select-input>
            <x-forms.select-input x-model="priority" @change="loadTasks(1)" color="blue" label="Priority"
                width="32" extraClass="focus:border-blue-500">
                <option value="">All Priority</option>
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </x-forms.select-input>
        </div>
    </div>

    <div class="flex-grow max-w-md w-full">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-1">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <x-forms.text-input x-model="search" @input.debounce.500ms="loadTasks(1)" color="blue" type="search"
                id="search-task-table" placeholder="Search Task..."
                extraClass="pl-10 focus:border-blue-500"></x-forms.text-input>
        </div>
    </div>
</section>
