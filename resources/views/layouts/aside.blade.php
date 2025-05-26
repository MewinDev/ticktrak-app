<aside
    class="fixed top-0 left-0 z-50 w-64 h-screen transition-transform -translate-x-full bg-gray-50 border-r border-gray-200 lg:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    :class="{
        'translate-x-0': open
    }" aria-label="Sidebar">
    <div class="h-full px-5 pb-4 overflow-y-auto">
        <div class="flex items-center justify-start my-5">
            <button type="button" x-on:click="open =!open"
                class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 dark:focus:ring-gray-900 rounded-lg text-sm p-1.5">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
                </svg>

            </button>
            <a href="/" class="flex ms-2 md:me-24">
                <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Ticktrak
                    App</span>
            </a>
        </div>
        <ul class="space-y-2 font-medium mt-7">
            <li>
                <x-navs.nav-link href="{{ route('dashboard') }}" :active="Str::contains(request()->url(), 'dashboard')">
                    <svg class="shrink-0 w-6 h-6 transition duration-75  group-hover:text-purple-600 dark:group-hover:text-purple-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                    </svg>

                    <span class="ms-3">Dashboard</span>
                </x-navs.nav-link>
            </li>
            <li>
                <x-navs.nav-link href="{{ route('tasks.index') }}" :active="Str::contains(request()->url(), 'tasks')">
                    <svg class="shrink-0 w-6 h-6 transition duration-75  group-hover:text-purple-600 dark:group-hover:text-purple-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>

                    <span class="flex-1 ms-3 whitespace-nowrap">Tasks</span>
                </x-navs.nav-link>
            </li>
            <li>
                <x-navs.nav-link href="{{ route('timesheet.index') }}" :active="Str::contains(request()->url(), 'timesheet')">
                    <svg class="w-6 h-6 transition duration-75  group-hover:text-purple-600 dark:group-hover:text-purple-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>


                    <span class="flex-1 ms-3 whitespace-nowrap">Timesheet</span>
                </x-navs.nav-link>
            </li>
        </ul>
    </div>
</aside>
