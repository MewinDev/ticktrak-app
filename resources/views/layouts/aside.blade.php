<div x-show="open" x-transition.opacity class="fixed inset-0 z-40 bg-black bg-opacity-40 lg:hidden" @click="open = false"
    style="display: none;"></div>

<aside
    class="fixed top-0 left-0 z-50 w-64 h-screen transition-transform -translate-x-full bg-gray-50 border-r border-gray-200 lg:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    :class="{
        'translate-x-0': open
    }" aria-label="Sidebar">
    <div class="h-full px-5 pb-4">
        <div class="flex items-center justify-between mt-4">
            <a href="/" class="flex">
                <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Ticktrak
                    App</span>
            </a>
        </div>

        <div class="relative flex-grow mt-3 max-w-lg md:hidden">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <x-forms.text-input color="gray" type="search" id="search-2" placeholder="Seach here..."
                extraClass="block pl-10 w-full focus:border-gray-50" required></x-forms.text-input>
        </div>

        <div class="h-full overflow-scroll no-scrollbar">
            <ul class="space-y-2 font-medium mt-5 pt-2 border-t border-gray-200 dark:border-gray-700">
                <h5 class="text-xs font-semibold text-gray-500 uppercase dark:text-gray-400">Menu</h5>
                <li>
                    <x-navs.nav-link href="{{ route('dashboard') }}" :active="Str::contains(request()->url(), 'dashboard')">
                        <svg class="shrink-0 w-6 h-6 transition duration-75  group-hover:text-blue-600 dark:group-hover:text-blue-500"
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
                        <svg class="shrink-0 w-6 h-6 transition duration-75  group-hover:text-blue-600 dark:group-hover:text-blue-500"
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
                        <svg class="w-6 h-6 transition duration-75  group-hover:text-blue-600 dark:group-hover:text-blue-500"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>


                        <span class="flex-1 ms-3 whitespace-nowrap">Timesheet</span>
                    </x-navs.nav-link>
                </li>
                <li>
                    <div x-data="{ openSub: false }">
                        <button type="button" @click="openSub =!openSub"
                            class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">Pages</span>
                            <svg class="w-4 h-4 transform transition ease-in-out duration-300"
                                :class="{ 'rotate-180': openSub }" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="4" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                            </svg>
                        </button>
                        <ul x-show="openSub" style="display: none;" class="py-2 space-y-2">
                            <li>
                                <a href="#"
                                    class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Kanban</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Calendar</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="space-y-2 font-medium mt-5 pt-2 border-t border-gray-200 dark:border-gray-700">
                <h5 class="text-xs font-semibold text-gray-500 uppercase dark:text-gray-400">Others</h5>
                <li>
                    <x-navs.nav-link href="{{ route('setting.edit') }}" :active="Str::contains(request()->url(), 'setting')">
                        <svg class="shrink-0 w-6 h-6 transition duration-75  group-hover:text-blue-600 dark:group-hover:text-blue-500"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>


                        <span class="ms-3">Setting</span>
                    </x-navs.nav-link>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-navs.nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            <svg class="shrink-0 w-6 h-6 transition duration-75  group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16 16.9999L21 11.9999M21 11.9999L16 6.99994M21 11.9999H9M12 16.9999C12 17.2955 12 17.4433 11.989 17.5713C11.8748 18.9019 10.8949 19.9968 9.58503 20.2572C9.45903 20.2823 9.31202 20.2986 9.01835 20.3312L7.99694 20.4447C6.46248 20.6152 5.69521 20.7005 5.08566 20.5054C4.27293 20.2453 3.60942 19.6515 3.26118 18.8724C3 18.2881 3 17.5162 3 15.9722V8.02764C3 6.4837 3 5.71174 3.26118 5.12746C3.60942 4.34842 4.27293 3.75454 5.08566 3.49447C5.69521 3.29941 6.46246 3.38466 7.99694 3.55516L9.01835 3.66865C9.31212 3.70129 9.45901 3.71761 9.58503 3.74267C10.8949 4.0031 11.8748 5.09798 11.989 6.42855C12 6.55657 12 6.70436 12 6.99994"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                            <span class="ms-3">Logout</span>
                        </x-navs.nav-link>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</aside>
