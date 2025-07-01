<x-app-layout>
    <header>
        <h2 class="text-2xl py-2 font-bold tracking-wider text-gray-900 dark:text-white">Group Settings</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400">Manage your group information and preferences</p>
    </header>

    <main class="space-y-6 py-8">
        @include('contents.teams.setting-partials.group-picture')
        @include('contents.teams.setting-partials.general-info')
        @include('contents.teams.setting-partials.activity-logs')
        @include('contents.teams.setting-partials.transfer-ownership')
        @include('contents.teams.setting-partials.delete-group')
    </main>

</x-app-layout>
