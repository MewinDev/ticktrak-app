<x-app-layout>
    <!-- Dashboard Content -->
    <main class="space-y-6">
        <!-- Welcome Section -->
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Good morning, Carlo</h1>
            <p class="text-gray-600 dark:text-gray-300">Here's what's happening with your tasks today.</p>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 ">
            <div class="bg-blue-50 rounded-xl p-6 border border-blue-200 dark:border-blue-700 dark:bg-blue-900/10">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-sm font-medium text-gray-500 dark:text-gray-300">Tasks Completed</h2>
                        <p class="text-2xl font-semibold text-gray-800 dark:text-gray-100">12</p>
                        <p class="text-xs text-green-600 flex items-center dark:text-green-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                            +3 from yesterday
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="bg-yellow-50 rounded-xl p-6 border border-yellow-200 dark:border-yellow-700 dark:bg-yellow-900/10">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-sm font-medium text-gray-500 dark:text-gray-300">In Progress</h2>
                        <p class="text-2xl font-semibold text-gray-800 dark:text-gray-100">8</p>
                        <p class="text-xs text-yellow-600 flex items-center dark:text-yellow-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            2 due today
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-red-50 rounded-xl p-6 border border-red-200 dark:border-red-700 dark:bg-red-900/10">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-sm font-medium text-gray-500 dark:text-gray-300">Overdue</h2>
                        <p class="text-2xl font-semibold text-gray-800 dark:text-gray-100">3</p>
                        <p class="text-xs text-red-600 flex items-center dark:text-red-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                            +1 from yesterday
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-green-50 rounded-xl p-6 border border-green-200 dark:border-green-700 dark:bg-green-900/10">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-sm font-medium text-gray-500 dark:text-gray-300">Completion Rate</h2>
                        <p class="text-2xl font-semibold text-gray-800 dark:text-gray-100">78%</p>
                        <p class="text-xs text-green-600 flex items-center dark:text-green-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                            +5% this week
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Dashboard Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 pb-8">
            <!-- Left Column: Tasks -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Today's Tasks -->
                <section
                    class="section-card bg-gray-50 dark:bg-gray-900 rounded-xl p-6 border border-gray-200 dark:border-gray-700 ">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100">Today's Tasks</h2>
                        <button
                            class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 text-sm font-medium">View
                            All</button>
                    </div>
                    <div class="space-y-4">
                        <!-- Task 1 -->
                        <div class="task-card bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-4 cursor-pointer hover:border-blue-300 dark:hover:border-blue-400"
                            data-task-id="1">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center">
                                    <input type="checkbox"
                                        class="rounded text-blue-600 focus:ring-blue-500 h-4 w-4 mr-3 dark:bg-gray-700 dark:border-gray-600">
                                    <h3 class="text-sm font-medium text-gray-800 dark:text-gray-100">Complete website
                                        redesign</h3>
                                </div>
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-300">High</span>
                            </div>
                            <div class="ml-7">
                                <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Update the personal portfolio
                                    website with new
                                    projects and improve mobile responsiveness</p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400 mr-1"
                                            viewBox="0 0 36 36">
                                            <path class="progress-ring-circle" stroke-dasharray="40, 100"
                                                stroke-dashoffset="0" stroke-width="3" stroke="currentColor"
                                                fill="none"
                                                d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                        </svg>
                                        <span class="text-xs text-gray-500 dark:text-gray-400">2/5 subtasks</span>
                                    </div>
                                    <span class="text-xs text-red-600 dark:text-red-400">Due today at 5:00 PM</span>
                                </div>
                            </div>
                        </div>

                        <!-- Task 2 -->
                        <div class="task-card bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-4 cursor-pointer hover:border-blue-300 dark:hover:border-blue-400"
                            data-task-id="2">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center">
                                    <input type="checkbox"
                                        class="rounded text-blue-600 focus:ring-blue-500 h-4 w-4 mr-3 dark:bg-gray-700 dark:border-gray-600">
                                    <h3 class="text-sm font-medium text-gray-800 dark:text-gray-100">Review monthly
                                        budget</h3>
                                </div>
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-300">Medium</span>
                            </div>
                            <div class="ml-7">
                                <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Analyze expenses and update
                                    budget spreadsheet
                                    for the current month</p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400 mr-1"
                                            viewBox="0 0 36 36">
                                            <path class="progress-ring-circle" stroke-dasharray="75, 100"
                                                stroke-dashoffset="0" stroke-width="3" stroke="currentColor"
                                                fill="none"
                                                d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                        </svg>
                                        <span class="text-xs text-gray-500 dark:text-gray-400">3/4 subtasks</span>
                                    </div>
                                    <span class="text-xs text-red-600 dark:text-red-400">Due today at 3:00 PM</span>
                                </div>
                            </div>
                        </div>

                        <!-- Task 3 -->
                        <div class="task-card bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-4 cursor-pointer hover:border-blue-300 dark:hover:border-blue-400"
                            data-task-id="3">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center">
                                    <input type="checkbox"
                                        class="rounded text-blue-600 focus:ring-blue-500 h-4 w-4 mr-3 dark:bg-gray-700 dark:border-gray-600"
                                        checked>
                                    <h3 class="text-sm font-medium text-gray-800 dark:text-gray-100 line-through">
                                        Morning workout routine
                                    </h3>
                                </div>
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300">Low</span>
                            </div>
                            <div class="ml-7">
                                <p class="text-xs text-gray-500 dark:text-gray-400 mb-2 line-through">Complete 30
                                    minutes of cardio and 15
                                    minutes of strength training</p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400 mr-1"
                                            viewBox="0 0 36 36">
                                            <path class="progress-ring-circle" stroke-dasharray="100, 100"
                                                stroke-dashoffset="0" stroke-width="3" stroke="currentColor"
                                                fill="none"
                                                d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                        </svg>
                                        <span class="text-xs text-gray-500 dark:text-gray-400">2/2 subtasks</span>
                                    </div>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">Completed at 7:30 AM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Productivity Chart -->
                <section
                    class="section-card bg-gray-50 dark:bg-gray-900 rounded-xl p-6 border border-gray-200 dark:border-gray-700 ">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100">Productivity Trends</h2>
                        <select
                            class="text-sm border border-gray-300 dark:border-gray-600 rounded-md py-1 px-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100">
                            <option>Last 7 days</option>
                            <option>Last 30 days</option>
                            <option>Last 90 days</option>
                        </select>
                    </div>
                    <div>
                        <canvas id="productivityChart" height="250"></canvas>
                    </div>
                </section>
            </div>

            <!-- Right Column: Analytics and Calendar -->
            <div class="space-y-6">
                <!-- Calendar -->
                <section
                    class="section-card bg-gray-50 dark:bg-gray-900 rounded-xl p-6 border border-gray-200 dark:border-gray-700 ">
                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-4">Calendar</h2>
                    <div class="flex items-center justify-between mb-4">
                        <button class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <h3 class="text-sm font-medium text-gray-800 dark:text-gray-100">July 2023</h3>
                        <button class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                    <div
                        class="grid grid-cols-7 gap-1 text-center text-xs font-medium text-gray-500 dark:text-gray-400 mb-2">
                        <div>Su</div>
                        <div>Mo</div>
                        <div>Tu</div>
                        <div>We</div>
                        <div>Th</div>
                        <div>Fr</div>
                        <div>Sa</div>
                    </div>
                    <div class="grid grid-cols-7 gap-1 text-center">
                        <div class="py-1 text-gray-400 dark:text-gray-600">25</div>
                        <div class="py-1 text-gray-400 dark:text-gray-600">26</div>
                        <div class="py-1 text-gray-400 dark:text-gray-600">27</div>
                        <div class="py-1 text-gray-400 dark:text-gray-600">28</div>
                        <div class="py-1 text-gray-400 dark:text-gray-600">29</div>
                        <div class="py-1 text-gray-400 dark:text-gray-600">30</div>
                        <div class="py-1 dark:text-gray-100">1</div>
                        <div class="py-1 dark:text-gray-100">2</div>
                        <div class="py-1 dark:text-gray-100">3</div>
                        <div class="py-1 dark:text-gray-100">4</div>
                        <div class="py-1 dark:text-gray-100">5</div>
                        <div class="py-1 dark:text-gray-100">6</div>
                        <div class="py-1 dark:text-gray-100">7</div>
                        <div class="py-1 dark:text-gray-100">8</div>
                        <div class="py-1 dark:text-gray-100">9</div>
                        <div class="py-1 dark:text-gray-100">10</div>
                        <div class="py-1 dark:text-gray-100">11</div>
                        <div class="py-1 dark:text-gray-100">12</div>
                        <div
                            class="py-1 bg-blue-100 text-blue-800 rounded-full font-medium dark:bg-blue-900 dark:text-blue-200">
                            13</div>
                        <div class="py-1 relative dark:text-gray-100">
                            14
                            <div
                                class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-1 h-1 bg-red-500 rounded-full">
                            </div>
                        </div>
                        <div class="py-1 dark:text-gray-100">15</div>
                        <div class="py-1 dark:text-gray-100">16</div>
                        <div class="py-1 dark:text-gray-100">17</div>
                        <div class="py-1 dark:text-gray-100">18</div>
                        <div class="py-1 dark:text-gray-100">19</div>
                        <div class="py-1 relative dark:text-gray-100">
                            20
                            <div
                                class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-1 h-1 bg-green-500 rounded-full">
                            </div>
                        </div>
                        <div class="py-1 dark:text-gray-100">21</div>
                        <div class="py-1 dark:text-gray-100">22</div>
                        <div class="py-1 dark:text-gray-100">23</div>
                        <div class="py-1 dark:text-gray-100">24</div>
                        <div class="py-1 relative dark:text-gray-100">
                            25
                            <div
                                class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-1 h-1 bg-red-500 rounded-full">
                            </div>
                        </div>
                        <div class="py-1 dark:text-gray-100">26</div>
                        <div class="py-1 dark:text-gray-100">27</div>
                        <div class="py-1 dark:text-gray-100">28</div>
                        <div class="py-1 dark:text-gray-100">29</div>
                        <div class="py-1 dark:text-gray-100">30</div>
                        <div class="py-1 dark:text-gray-100">31</div>
                        <div class="py-1 text-gray-400 dark:text-gray-600">1</div>
                        <div class="py-1 text-gray-400 dark:text-gray-600">2</div>
                        <div class="py-1 text-gray-400 dark:text-gray-600">3</div>
                        <div class="py-1 text-gray-400 dark:text-gray-600">4</div>
                        <div class="py-1 text-gray-400 dark:text-gray-600">5</div>
                    </div>
                </section>

                <!-- Task Distribution -->
                <section
                    class="section-card bg-gray-50 dark:bg-gray-900 rounded-xl p-6 border border-gray-200 dark:border-gray-700 ">
                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-4">Task Distribution</h2>
                    <canvas id="taskDistributionChart" height="200"></canvas>
                    <div class="mt-4 space-y-2">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-blue-500 mr-2"></div>
                                <span class="text-sm text-gray-600 dark:text-gray-300">Work</span>
                            </div>
                            <span class="text-sm font-medium text-gray-800 dark:text-gray-100">45%</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-yellow-500 mr-2"></div>
                                <span class="text-sm text-gray-600 dark:text-gray-300">Personal</span>
                            </div>
                            <span class="text-sm font-medium text-gray-800 dark:text-gray-100">30%</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>
                                <span class="text-sm text-gray-600 dark:text-gray-300">Health</span>
                            </div>
                            <span class="text-sm font-medium text-gray-800 dark:text-gray-100">15%</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-purple-500 mr-2"></div>
                                <span class="text-sm text-gray-600 dark:text-gray-300">Learning</span>
                            </div>
                            <span class="text-sm font-medium text-gray-800 dark:text-gray-100">10%</span>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
</x-app-layout>
