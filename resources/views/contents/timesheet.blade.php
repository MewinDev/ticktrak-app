<x-app-layout>
    <header class="flex items-center justify-between gap-3">
        <h2 class="text-2xl py-2 font-bold tracking-wider text-gray-900 dark:text-white">Timesheet</h2>


        <section class="flex items-center gap-3">
            <!-- Toggle Buttons -->
            <div
                class="flex justify-end gap-2 bg-gray-200 bg-opacity-50 dark:bg-gray-700 rounded-md px-2 py-1 divide-y divide-white focus:ring-0">

                <x-forms.button size="xs" color="white" type="button" id="list-btn" onclick="toggleView('list')"
                    extraClass="rounded-sm flex items-center gap-1 hover:bg-white">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                    List
                </x-forms.button>

                <x-forms.button size="xs" color="gray" type="button" id="grid-btn" onclick="toggleView('grid')"
                    extraClass="rounded-sm flex items-center gap-1 hover:bg-white">
                    <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                    </svg>
                    Grid
                </x-forms.button>
            </div>

            <script>
                function toggleView(view) {
                    const tableView = document.getElementById('table-view');
                    const gridView = document.getElementById('grid-view');
                    const listBtn = document.getElementById('list-btn');
                    const gridBtn = document.getElementById('grid-btn');

                    if (view === 'list') {
                        tableView?.classList.remove('hidden');
                        gridView?.classList.add('hidden');

                        listBtn.setAttribute('color', 'white');
                        gridBtn.setAttribute('color', 'gray');

                        listBtn.classList.remove('text-gray-400', 'border-none');
                        listBtn.classList.add('bg-white', 'text-black', 'border', 'border-gray-300');
                        gridBtn.classList.add('text-gray-400', 'border-none');
                        gridBtn.classList.remove('bg-white', 'text-black');
                    } else {
                        tableView?.classList.add('hidden');
                        gridView?.classList.remove('hidden');

                        listBtn.setAttribute('color', 'gray');
                        gridBtn.setAttribute('color', 'white');

                        gridBtn.classList.remove('text-gray-400', 'border-none');
                        gridBtn.classList.add('bg-white', 'text-black', 'border', 'border-gray-300');
                        listBtn.classList.add('text-gray-400', 'border-none');
                        listBtn.classList.remove('bg-white', 'text-black');
                    }
                }

                document.addEventListener('DOMContentLoaded', () => toggleView('list'));
            </script>



            <x-forms.button color="blue" type="button" extraClass="rounded-md flex items-center gap-2">
                <span>Add Log Time</span>
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>

            </x-forms.button>
        </section>
    </header>

    <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">

    <main>
        <section class="flex items-center justify-between gap-3">
            <div class="pb-4 bg-white dark:bg-gray-900 flex-grow max-w-md">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <x-forms.text-input color="gray" type="search" id="search-task-table"
                        placeholder="Search Task..." extraClass="pl-10"></x-forms.text-input>
                </div>
            </div>
        </section>

        <!-- List View (Show by default) -->
        <section id="table-view" class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-blue-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="p-4">
                            <input id="checkbox-all" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                        </th>
                        <th class="px-6 py-3">Task Details</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Time Period</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <input id="checkbox-1" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                        </td>
                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">Silver</td>
                        <td class="px-6 py-4">Laptop</td>
                        <td class="px-6 py-4 w-10">
                            <div class="flex gap-2">
                                <button class="text-xs text-blue-600 hover:underline">Edit</button>
                                <button class="text-xs text-red-600 hover:underline">Delete</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Grid View (Hidden by default) -->
        <section id="grid-view" class="hidden grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="flex justify-between items-start">
                    <input id="card-checkbox-1" type="checkbox"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                    <div class="flex gap-2">
                        <button class="text-xs text-blue-600 hover:underline">Edit</button>
                        <button class="text-xs text-red-600 hover:underline">Delete</button>
                    </div>
                </div>
                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Apple MacBook Pro 17"</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Status: <span
                            class="font-medium">Silver</span>
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Time Period: <span
                            class="font-medium">Laptop</span></p>
                </div>
            </div>
        </section>
    </main>

</x-app-layout>
