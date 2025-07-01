<x-app-layout>
    <div>
        <h2 class="text-2xl py-2 font-bold tracking-wider text-gray-900 dark:text-white">Members Settings</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400">Control how members interact with your group</p>
    </div>

    <main class="py-8 space-y-8">
        @include('contents.teams.members-partials.role-management')
        @include('contents.teams.members-partials.invitation-setting')
        @include('contents.teams.members-partials.member-preference')
    </main>
</x-app-layout>
