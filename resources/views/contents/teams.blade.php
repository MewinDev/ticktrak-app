<x-app-layout>
    <main class="py-8 space-y-6">
        <!-- Group Header -->
        <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="flex items-center mb-4 md:mb-0">
                    <div
                        class="h-16 w-16 rounded-lg bg-blue-500 flex items-center justify-center text-white text-2xl font-bold mr-4">
                        PG
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-100">Project Groupies</h1>
                        <p class="text-gray-600 dark:text-gray-400 mt-1">Our awesome project team focused on delivering
                            great results!</p>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        Invite Members
                    </button>
                    <button
                        class="bg-white dark:bg-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-800 dark:text-gray-200 font-medium py-2 px-4 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm transition flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Settings
                    </button>
                </div>
            </div>
        </div>

        <!-- Quick Stats / KPIs -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
            <div
                class="stat-card bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700 shadow-md flex flex-col items-center justify-center text-center">
                <div class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-1">245</div>
                <div class="text-sm text-gray-600 dark:text-gray-400 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-blue-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Total Tasks
                </div>
            </div>
            <div
                class="stat-card bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700 shadow-md flex flex-col items-center justify-center text-center">
                <div class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-1">89</div>
                <div class="text-sm text-gray-600 dark:text-gray-400 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-blue-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Open Tasks
                </div>
            </div>
            <div
                class="stat-card bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700 shadow-md flex flex-col items-center justify-center text-center">
                <div class="text-2xl font-bold text-green-600 dark:text-green-400 mb-1">36</div>
                <div class="text-sm text-gray-600 dark:text-gray-400 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Completed This Week
                </div>
            </div>
            <div
                class="stat-card bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700 shadow-md flex flex-col items-center justify-center text-center">
                <div class="text-2xl font-bold text-red-600 dark:text-red-400 mb-1">12</div>
                <div class="text-sm text-gray-600 dark:text-gray-400 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-red-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    Overdue Tasks
                </div>
            </div>
            <div
                class="stat-card bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700 shadow-md flex flex-col items-center justify-center text-center">
                <div class="text-2xl font-bold text-purple-600 dark:text-purple-400 mb-1">5</div>
                <div class="text-sm text-gray-600 dark:text-gray-400 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-purple-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Active Members
                </div>
            </div>
            <div
                class="stat-card bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700 shadow-md flex flex-col items-center justify-center text-center">
                <div class="text-2xl font-bold text-indigo-600 dark:text-indigo-400 mb-1">67h</div>
                <div class="text-sm text-gray-600 dark:text-gray-400 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-indigo-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Time Tracked (Month)
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Active Members -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Active Members
                </h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div
                                class="h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center text-blue-800 dark:text-blue-200 font-medium mr-3 relative">
                                JD
                                <span
                                    class="absolute bottom-0 right-0 h-3 w-3 rounded-full bg-green-500 border-2 border-white dark:border-gray-800"></span>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">John Doe</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">Online</div>
                            </div>
                        </div>
                        <div class="text-sm font-medium text-blue-600 dark:text-blue-400">4 Tasks</div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div
                                class="h-10 w-10 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center text-purple-800 dark:text-purple-200 font-medium mr-3 relative">
                                MS
                                <span
                                    class="absolute bottom-0 right-0 h-3 w-3 rounded-full bg-green-500 border-2 border-white dark:border-gray-800"></span>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Maria Smith</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">Working</div>
                            </div>
                        </div>
                        <div class="text-sm font-medium text-blue-600 dark:text-blue-400">6 Tasks</div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div
                                class="h-10 w-10 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center text-green-800 dark:text-green-200 font-medium mr-3 relative">
                                RJ
                                <span
                                    class="absolute bottom-0 right-0 h-3 w-3 rounded-full bg-yellow-500 border-2 border-white dark:border-gray-800"></span>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Robert Johnson</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">Away</div>
                            </div>
                        </div>
                        <div class="text-sm font-medium text-blue-600 dark:text-blue-400">3 Tasks</div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div
                                class="h-10 w-10 rounded-full bg-pink-100 dark:bg-pink-900 flex items-center justify-center text-pink-800 dark:text-pink-200 font-medium mr-3 relative">
                                AW
                                <span
                                    class="absolute bottom-0 right-0 h-3 w-3 rounded-full bg-green-500 border-2 border-white dark:border-gray-800"></span>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Alice Williams</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">Online</div>
                            </div>
                        </div>
                        <div class="text-sm font-medium text-blue-600 dark:text-blue-400">5 Tasks</div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div
                                class="h-10 w-10 rounded-full bg-yellow-100 dark:bg-yellow-900 flex items-center justify-center text-yellow-800 dark:text-yellow-200 font-medium mr-3 relative">
                                TB
                                <span
                                    class="absolute bottom-0 right-0 h-3 w-3 rounded-full bg-gray-400 border-2 border-white dark:border-gray-800"></span>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Tom Brown</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">Offline</div>
                            </div>
                        </div>
                        <div class="text-sm font-medium text-blue-600 dark:text-blue-400">2 Tasks</div>
                    </div>
                </div>
            </div>

            <!-- Task Progress Charts -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    Task Progress
                </h2>
                <div class="flex flex-col items-center">
                    <div class="w-full h-64 mb-4">
                        <canvas id="taskStatusChart"></canvas>
                    </div>
                    <div class="grid grid-cols-3 w-full text-center">
                        <div>
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">To Do</div>
                            <div class="text-lg font-bold text-gray-800 dark:text-gray-100">42</div>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">In Progress</div>
                            <div class="text-lg font-bold text-blue-600 dark:text-blue-400">47</div>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Completed</div>
                            <div class="text-lg font-bold text-green-600 dark:text-green-400">156</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Feed -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                    Recent Activity
                </h2>
                <div class="space-y-4">
                    <div class="border-l-4 border-green-500 dark:border-green-400 pl-3">
                        <div class="flex items-center">
                            <div
                                class="h-8 w-8 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center text-purple-800 dark:text-purple-200 font-medium mr-2">
                                MS
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Maria completed
                                    "Design Mockups"</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">Today at 10:30 AM</div>
                            </div>
                        </div>
                    </div>
                    <div class="border-l-4 border-blue-500 dark:border-blue-400 pl-3">
                        <div class="flex items-center">
                            <div
                                class="h-8 w-8 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center text-blue-800 dark:text-blue-200 font-medium mr-2">
                                JD
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">John created task
                                    "Fix Payment Bug"
                                </div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">Today at 9:15 AM</div>
                            </div>
                        </div>
                    </div>
                    <div class="border-l-4 border-yellow-500 dark:border-yellow-400 pl-3">
                        <div class="flex items-center">
                            <div
                                class="h-8 w-8 rounded-full bg-pink-100 dark:bg-pink-900 flex items-center justify-center text-pink-800 dark:text-pink-200 font-medium mr-2">
                                AW
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Alice commented on
                                    "Marketing Plan"
                                </div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">Yesterday at 4:30 PM</div>
                            </div>
                        </div>
                    </div>
                    <div class="border-l-4 border-green-500 dark:border-green-400 pl-3">
                        <div class="flex items-center">
                            <div
                                class="h-8 w-8 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center text-green-800 dark:text-green-200 font-medium mr-2">
                                RJ
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Robert completed
                                    "Update Documentation"
                                </div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">Yesterday at 2:45 PM</div>
                            </div>
                        </div>
                    </div>
                    <div class="border-l-4 border-purple-500 dark:border-purple-400 pl-3">
                        <div class="flex items-center">
                            <div
                                class="h-8 w-8 rounded-full bg-yellow-100 dark:bg-yellow-900 flex items-center justify-center text-yellow-800 dark:text-yellow-200 font-medium mr-2">
                                TB
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Tom assigned "Client
                                    Meeting" to Maria
                                </div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">Yesterday at 11:20 AM</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <button
                        class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-200 text-sm font-medium">
                        View All Activity
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Upcoming Deadlines -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Upcoming Deadlines
                </h2>
                <div class="space-y-6">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Today</h3>
                        <div class="space-y-2">
                            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-3">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Submit tax
                                            report</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            John Doe
                                        </div>
                                    </div>
                                    <span
                                        class="bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 text-xs font-medium px-2 py-1 rounded">5:00
                                        PM</span>
                                </div>
                            </div>
                            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-3">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Call supplier
                                        </div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            Maria Smith
                                        </div>
                                    </div>
                                    <span
                                        class="bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 text-xs font-medium px-2 py-1 rounded">3:30
                                        PM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Tomorrow</h3>
                        <div class="space-y-2">
                            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-3">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Finalize
                                            homepage UI</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            Alice Williams
                                        </div>
                                    </div>
                                    <span
                                        class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 text-xs font-medium px-2 py-1 rounded">11:00
                                        AM</span>
                                </div>
                            </div>
                            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-3">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Team status
                                            meeting</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            All members
                                        </div>
                                    </div>
                                    <span
                                        class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 text-xs font-medium px-2 py-1 rounded">2:00
                                        PM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">This Week</h3>
                        <div class="space-y-2">
                            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-3">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Prepare
                                            quarterly report</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            Robert Johnson
                                        </div>
                                    </div>
                                    <span
                                        class="bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200 text-xs font-medium px-2 py-1 rounded">Friday</span>
                                </div>
                            </div>
                            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-3">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Client
                                            presentation</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            Tom Brown
                                        </div>
                                    </div>
                                    <span
                                        class="bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200 text-xs font-medium px-2 py-1 rounded">Friday</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Overdue / Priority Tasks -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    Overdue & Priority Tasks
                </h2>
                <div class="space-y-3">
                    <div class="bg-red-50 dark:bg-gray-800 border border-red-100 dark:border-red-700 rounded-lg p-3">
                        <div class="flex justify-between items-start">
                            <div class="flex items-start">
                                <div
                                    class="h-6 w-6 rounded-full bg-red-100 dark:bg-gray-600 flex items-center justify-center mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Update payment
                                        gateway</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">Due 2 days ago</div>
                                    <div class="flex items-center mt-1">
                                        <div
                                            class="h-5 w-5 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center text-blue-800 dark:text-blue-200 text-xs font-medium">
                                            JD
                                        </div>
                                        <span class="text-xs text-gray-500 dark:text-gray-400 ml-1">John Doe</span>
                                    </div>
                                </div>
                            </div>
                            <span
                                class="bg-red-100 dark:bg-red-800 text-red-800 dark:text-red-200 text-xs font-medium px-2 py-1 rounded">Overdue</span>
                        </div>
                    </div>
                    <div class="bg-red-50 dark:bg-gray-800 border border-red-100 dark:border-red-700 rounded-lg p-3">
                        <div class="flex justify-between items-start">
                            <div class="flex items-start">
                                <div
                                    class="h-6 w-6 rounded-full bg-red-100 dark:bg-gray-600 flex items-center justify-center mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Fix login page
                                        bug</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">Due 1 day ago</div>
                                    <div class="flex items-center mt-1">
                                        <div
                                            class="h-5 w-5 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center text-green-800 dark:text-green-200 text-xs font-medium">
                                            RJ
                                        </div>
                                        <span class="text-xs text-gray-500 dark:text-gray-400 ml-1">Robert
                                            Johnson</span>
                                    </div>
                                </div>
                            </div>
                            <span
                                class="bg-red-100 dark:bg-red-800 text-red-800 dark:text-red-200 text-xs font-medium px-2 py-1 rounded">Overdue</span>
                        </div>
                    </div>
                    <div
                        class="bg-yellow-50 dark:bg-gray-800 border border-yellow-100 dark:border-yellow-700 rounded-lg p-3">
                        <div class="flex justify-between items-start">
                            <div class="flex items-start">
                                <div
                                    class="h-6 w-6 rounded-full bg-yellow-100 dark:bg-gray-600 flex items-center justify-center mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-600"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Prepare client
                                        presentation</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">Due today</div>
                                    <div class="flex items-center mt-1">
                                        <div
                                            class="h-5 w-5 rounded-full bg-yellow-100 dark:bg-yellow-800 flex items-center justify-center text-yellow-800 dark:text-yellow-200 text-xs font-medium">
                                            TB
                                        </div>
                                        <span class="text-xs text-gray-500 dark:text-gray-400 ml-1">Tom Brown</span>
                                    </div>
                                </div>
                            </div>
                            <span
                                class="bg-yellow-100 dark:bg-yellow-800 text-yellow-800 dark:text-yellow-200 text-xs font-medium px-2 py-1 rounded">High</span>
                        </div>
                    </div>
                    <div
                        class="bg-yellow-50 dark:bg-gray-800 border border-yellow-100 dark:border-yellow-700 rounded-lg p-3">
                        <div class="flex justify-between items-start">
                            <div class="flex items-start">
                                <div
                                    class="h-6 w-6 rounded-full bg-yellow-100 dark:bg-gray-600 flex items-center justify-center mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-600"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Finalize homepage
                                        design</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">Due tomorrow</div>
                                    <div class="flex items-center mt-1">
                                        <div
                                            class="h-5 w-5 rounded-full bg-pink-100 dark:bg-pink-900 flex items-center justify-center text-pink-800 dark:text-pink-200 text-xs font-medium">
                                            AW
                                        </div>
                                        <span class="text-xs text-gray-500 dark:text-gray-400 ml-1">Alice
                                            Williams</span>
                                    </div>
                                </div>
                            </div>
                            <span
                                class="bg-yellow-100 dark:bg-yellow-800 text-yellow-800 dark:text-yellow-200 text-xs font-medium px-2 py-1 rounded">High</span>
                        </div>
                    </div>
                    <div
                        class="bg-orange-50 dark:bg-gray-800 border border-orange-100 dark:border-orange-700 rounded-lg p-3">
                        <div class="flex justify-between items-start">
                            <div class="flex items-start">
                                <div
                                    class="h-6 w-6 rounded-full bg-orange-100 dark:bg-gray-600 flex items-center justify-center mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-orange-600"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Update API
                                        documentation</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">Due in 2 days</div>
                                    <div class="flex items-center mt-1">
                                        <div
                                            class="h-5 w-5 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center text-purple-800 dark:text-purple-200 text-xs font-medium">
                                            MS
                                        </div>
                                        <span class="text-xs text-gray-500 dark:text-gray-400 ml-1">Maria Smith</span>
                                    </div>
                                </div>
                            </div>
                            <span
                                class="bg-orange-100 dark:bg-orange-800 text-orange-800 dark:text-orange-200 text-xs font-medium px-2 py-1 rounded">Medium</span>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <button
                        class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-200 text-sm font-medium">
                        View All Tasks
                    </button>
                </div>
            </div>
        </div>

        <!-- Pinned Tasks / Group Goals -->
        <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                    </svg>
                    Pinned Tasks & Group Goals
                </h2>
                <button
                    class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-200 text-sm font-medium flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Pin Task
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div
                    class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900 dark:to-blue-800 rounded-lg p-4 border border-blue-200 dark:border-blue-700">
                    <div class="flex items-start justify-between">
                        <h3 class="text-base font-medium text-blue-800 dark:text-blue-200">Q3 Sales Target</h3>
                        <span
                            class="bg-blue-200 dark:bg-blue-700 text-blue-800 dark:text-blue-200 text-xs font-medium px-2 py-1 rounded">Goal</span>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Reach $250,000 in new sales by end of Q3
                    </p>
                    <div class="mt-3">
                        <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400 mb-1">
                            <span>Progress</span>
                            <span>65%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                            <div class="bg-blue-500 h-2 rounded-full" style="width: 65%"></div>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900 dark:to-green-800 rounded-lg p-4 border border-green-200 dark:border-green-700">
                    <div class="flex items-start justify-between">
                        <h3 class="text-base font-medium text-green-800 dark:text-green-200">Website Redesign</h3>
                        <span
                            class="bg-green-200 dark:bg-green-700 text-green-800 dark:text-green-200 text-xs font-medium px-2 py-1 rounded">Project</span>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Complete homepage and product pages by
                        July 30</p>
                    <div class="mt-3">
                        <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400 mb-1">
                            <span>Progress</span>
                            <span>40%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                            <div class="bg-green-500 h-2 rounded-full" style="width: 40%"></div>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900 dark:to-purple-800 rounded-lg p-4 border border-purple-200 dark:border-purple-700">
                    <div class="flex items-start justify-between">
                        <h3 class="text-base font-medium text-purple-800 dark:text-purple-200">Customer Satisfaction
                        </h3>
                        <span
                            class="bg-purple-200 dark:bg-purple-700 text-purple-800 dark:text-purple-200 text-xs font-medium px-2 py-1 rounded">KPI</span>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Maintain 95% or higher satisfaction rating
                    </p>
                    <div class="mt-3">
                        <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400 mb-1">
                            <span>Current</span>
                            <span>92%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                            <div class="bg-purple-500 h-2 rounded-full" style="width: 92%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tips Panel -->
        <div
            class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900 dark:to-indigo-900 rounded-xl p-6 shadow-md">
            <div class="flex items-start">
                <div class="h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-800 flex items-center justify-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-2">Tips & Suggestions</h2>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-blue-500 dark:text-blue-300 mr-2 flex-shrink-0 mt-0.5"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-700 dark:text-gray-200">You have 2 overdue tasks. Consider
                                prioritizing them
                                today.</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-blue-500 dark:text-blue-300 mr-2 flex-shrink-0 mt-0.5"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-700 dark:text-gray-200">Only 3 of 5 members are active this
                                week. Check in with
                                your team.</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-blue-500 dark:text-blue-300 mr-2 flex-shrink-0 mt-0.5"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-700 dark:text-gray-200">Your team completed 36 tasks this
                                week - that's 20%
                                more than last week!</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
