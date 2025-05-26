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
                <th class="px-6 py-3">Status</th>
                <th class="px-6 py-3">Due Date</th>
                <th class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
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
