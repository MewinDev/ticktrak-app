<!-- Backdrop -->
<!-- Backdrop -->
<div x-transition.opacity class="fixed inset-0 z-40 bg-black bg-opacity-40 hidden" :class="{ 'hidden': !mini }"
    @click="full = false; mini = false">
</div>

<section class="flex">
    <!-- Mini Sidebar -->
    <aside
        class="fixed top-0 left-0 z-50 w-16 h-screen bg-gray-50 border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700 transform transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0"
        :class="{
            '-translate-x-full': !mini || isMobile,
            'translate-x-0': mini
        }"
        aria-label="Mini Sidebar">
        <div class="h-full px-3 pb-4 overflow-visible no-scrollbar">
            <div class="flex items-center justify-center mt-4 p-2">
                <a href="/" class="flex">
                    <img src="{{ asset('images/logo.png') }}" alt="candidate-profile" class="w-14 h-14"
                        style="width: 56px; height: 24px; object-fit: contain;" loading="lazy" />
                </a>
            </div>

            <!-- Menu -->
            <ul class="space-y-2 font-medium mt-4 pt-2 border-t border-gray-200 dark:border-gray-700">
                <h5 class="mt-2 text-xs font-semibold text-gray-500 uppercase dark:text-gray-400">Menu</h5>
                <li>
                    <x-templates.tooltip location="right">
                        <x-slot name="trigger">
                            <x-navs.nav-link href="{{ route('dashboard') }}" :active="Str::contains(request()->url(), 'dashboard')">
                                <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                </svg>
                            </x-navs.nav-link>
                        </x-slot>

                        Dashboard
                    </x-templates.tooltip>
                </li>
                <li>
                    <x-templates.tooltip location="right">
                        <x-slot name="trigger">
                            <x-navs.nav-link href="{{ route('tasks.index') }}" :active="Str::contains(request()->url(), 'tasks')">
                                <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                            </x-navs.nav-link>
                        </x-slot>

                        My Tasks
                    </x-templates.tooltip>
                </li>
                {{-- <li>
                    <div x-data="{ openSub: false }">
                        <button type="button" @click="openSub = !openSub"
                            class="{{ Str::contains(request()->url(), 'team-projects') ? 'w-full text-blue-500 font-bold bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 dark:text-blue-500 shadow-sm flex items-center p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 group' : 'w-full flex text-gray-900 items-center p-2 rounded-md dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' }}">

                            <svg class="w-4 h-4 transform transition ease-in-out duration-300"
                                :class="{ 'rotate-180': openSub }" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                            </svg>
                        </button>
                        <ul x-show="openSub" style="display: none;" class="py-2 space-y-2">
                            <li>
                                <a href="{{ route('tasks.index') }}"
                                    class="flex items-center p-2 pl-11 w-full text-sm font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Tasks</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center p-2 pl-11 w-full text-sm font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Kanban</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center p-2 pl-11 w-full text-sm font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Calendar</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                <!-- Other mini sidebar icons... -->
            </ul>
            <ul class="space-y-2 font-medium mt-5 pt-2 border-t border-gray-200 dark:border-gray-700">
                <div class="mt-2 flex flex-col items-center justify-between gap-3 text-gray-500 dark:text-gray-400">
                    <h5 class="text-xs uppercase font-semibold whitespace-nowrap">Team</h5>
                </div>
                <li>
                    <x-templates.tooltip location="right">
                        <x-slot name="trigger">
                            <button type="button" @click="$dispatch('open-modal', 'create-team-project-modal')"
                                class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 dark:focus:ring-gray-900 rounded-lg text-sm p-2 hover:animate-wiggle">
                                <svg class="shrink-0 w-5 h-5" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 8V16M8 12H16M7.8 21H16.2C17.8802 21 18.7202 21 19.362 20.673C19.9265 20.3854 20.3854 19.9265 20.673 19.362C21 18.7202 21 17.8802 21 16.2V7.8C21 6.11984 21 5.27976 20.673 4.63803C20.3854 4.07354 19.9265 3.6146 19.362 3.32698C18.7202 3 17.8802 3 16.2 3H7.8C6.11984 3 5.27976 3 4.63803 3.32698C4.07354 3.6146 3.6146 4.07354 3.32698 4.63803C3 5.27976 3 6.11984 3 7.8V16.2C3 17.8802 3 18.7202 3.32698 19.362C3.6146 19.9265 4.07354 20.3854 4.63803 20.673C5.27976 21 6.11984 21 7.8 21Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>
                        </x-slot>

                        Create Team Project
                    </x-templates.tooltip>
                </li>
                <li>
                    <x-templates.tooltip location="right">
                        <x-slot name="trigger">
                            <x-navs.nav-link href="#">
                                <img class="w-6 h-6 rounded-lg"
                                    src="{{ !empty(Auth::user()->profile) ? asset('storage/' . Auth::user()->profile) : asset('images/logo.png') }}"
                                    alt="user logo">
                            </x-navs.nav-link>
                        </x-slot>

                        Group 1
                    </x-templates.tooltip>
                </li>
                <li>
                    <x-templates.tooltip location="right">
                        <x-slot name="trigger">
                            <x-navs.nav-link href="#">
                                <svg class="shrink-0 w-5 h-5 fill-red-500 text-red-500" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3 7.8C3 6.11984 3 5.27976 3.32698 4.63803C3.6146 4.07354 4.07354 3.6146 4.63803 3.32698C5.27976 3 6.11984 3 7.8 3H16.2C17.8802 3 18.7202 3 19.362 3.32698C19.9265 3.6146 20.3854 4.07354 20.673 4.63803C21 5.27976 21 6.11984 21 7.8V16.2C21 17.8802 21 18.7202 20.673 19.362C20.3854 19.9265 19.9265 20.3854 19.362 20.673C18.7202 21 17.8802 21 16.2 21H7.8C6.11984 21 5.27976 21 4.63803 20.673C4.07354 20.3854 3.6146 19.9265 3.32698 19.362C3 18.7202 3 17.8802 3 16.2V7.8Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </x-navs.nav-link>
                        </x-slot>

                        Group 2
                    </x-templates.tooltip>
                </li>
            </ul>
            <ul class="space-y-2 font-medium mt-5 pt-2 border-t border-gray-200 dark:border-gray-700">
                <h5 class="mt-2 text-xs font-semibold text-gray-500 uppercase dark:text-gray-400">Others</h5>
                <li>
                    <x-templates.tooltip location="right">
                        <x-slot name="trigger">
                            <x-navs.nav-link href="{{ route('setting.edit') }}" :active="Str::contains(request()->url(), 'setting')">
                                <svg class="shrink-0 w-5 h-5 transition duration-75  group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </x-navs.nav-link>
                        </x-slot>

                        Setting
                    </x-templates.tooltip>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-templates.tooltip location="right">
                            <x-slot name="trigger">
                                <x-navs.nav-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <svg class="shrink-0 w-5 h-5 transition duration-75  group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16 16.9999L21 11.9999M21 11.9999L16 6.99994M21 11.9999H9M12 16.9999C12 17.2955 12 17.4433 11.989 17.5713C11.8748 18.9019 10.8949 19.9968 9.58503 20.2572C9.45903 20.2823 9.31202 20.2986 9.01835 20.3312L7.99694 20.4447C6.46248 20.6152 5.69521 20.7005 5.08566 20.5054C4.27293 20.2453 3.60942 19.6515 3.26118 18.8724C3 18.2881 3 17.5162 3 15.9722V8.02764C3 6.4837 3 5.71174 3.26118 5.12746C3.60942 4.34842 4.27293 3.75454 5.08566 3.49447C5.69521 3.29941 6.46246 3.38466 7.99694 3.55516L9.01835 3.66865C9.31212 3.70129 9.45901 3.71761 9.58503 3.74267C10.8949 4.0031 11.8748 5.09798 11.989 6.42855C12 6.55657 12 6.70436 12 6.99994"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </x-navs.nav-link>
                            </x-slot>

                            Logout
                        </x-templates.tooltip>
                    </form>
                </li>
            </ul>
        </div>
        <!-- Show this button ONLY when group sidebar is closed -->
        <div x-show="!isGroup && window.location.pathname.includes('dashboard')" class="fixed bottom-4 left-2 z-50"
            x-transition>
            <x-templates.tooltip location="right">
                <x-slot name="trigger">
                    <button
                        class="border border-gray-300 rounded-full p-2 bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition"
                        @click="toggleSidebar(true)" title="Show Group Sidebar">
                        <svg class="w-6 h-6 text-gray-800 dark:text-gray-100" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                </x-slot>
                Show Group Sidebar
            </x-templates.tooltip>
        </div>
    </aside>

    <aside
        class="fixed top-0 z-40 w-64 h-screen lg:left-16 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700 transform transition-transform duration-300 ease-in-out -translate-x-full"
        aria-label="Group Sidebar"
        :class="{
            '-translate-x-full': (!mini && !isGroup) || isMobile,
            'translate-x-0 left-16': (mini && isGroup)
        }">
        <div class="h-full px-3 pb-4 overflow-visible no-scrollbar">
            <div class="flex items-center justify-between gap-3 mt-4 py-2">
                <div class="flex gap-2 ml-3 items-center">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    <span class="text-lg font-semibold text-gray-900 dark:text-white">
                        @if (Str::contains(request()->url(), 'group1'))
                            Group 1
                        @elseif(Str::contains(request()->url(), 'group2'))
                            Group 2
                        @else
                            Group Unknown
                        @endif
                    </span>
                </div>
            </div>

            <!-- Group Info -->
            <div class="mt-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                <div class="flex items-center gap-3">
                    <div class="flex -space-x-2">
                        <img class="w-8 h-8 rounded-full border-2 border-white dark:border-gray-800"
                            src="{{ asset('images/user1.jpg') }}" alt="">
                        <img class="w-8 h-8 rounded-full border-2 border-white dark:border-gray-800"
                            src="{{ asset('images/user2.jpg') }}" alt="">
                        <img class="w-8 h-8 rounded-full border-2 border-white dark:border-gray-800"
                            src="{{ asset('images/user3.jpg') }}" alt="">
                        <div
                            class="w-8 h-8 rounded-full border-2 border-white dark:border-gray-800 bg-gray-200 dark:bg-gray-600 flex items-center justify-center text-xs font-medium text-gray-600 dark:text-gray-300">
                            +2
                        </div>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">5 members</p>
                    </div>
                </div>
            </div>

            <!-- Group Menu -->
            <ul class="space-y-2 font-medium mt-4">
                <li>
                    <x-navs.nav-link href="" :active="Str::contains(request()->url(), 'group/dashboard')">
                        <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                        </svg>
                        <span class="text-sm ms-3">Group Dashboard</span>
                    </x-navs.nav-link>
                </li>
                <li>
                    <x-navs.nav-link href="}" :active="Str::contains(request()->url(), 'group/tasks')">
                        <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                        <span class="text-sm ms-3">Group Tasks</span>
                    </x-navs.nav-link>
                </li>
                <li>
                    <x-navs.nav-link href="" :active="Str::contains(request()->url(), 'group/members')">
                        <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                        <span class="text-sm ms-3">Members</span>
                    </x-navs.nav-link>
                </li>
                <li>
                    <x-navs.nav-link href="" :active="Str::contains(request()->url(), 'group/settings')">
                        <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a6.759 6.759 0 010 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.075-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.991l-1.004-.827a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-sm ms-3">Group Settings</span>
                    </x-navs.nav-link>
                </li>
            </ul>
        </div>
        <div class="fixed bottom-4 right-4">
            <x-templates.tooltip location="left">
                <x-slot name="trigger">
                    <button class="border border-gray-300 rounded-full p-2" @click="toggleSidebar(false)">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                </x-slot>
                Close Group Sidebar
            </x-templates.tooltip>
        </div>
    </aside>
</section>
