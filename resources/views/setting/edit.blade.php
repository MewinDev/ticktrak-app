<x-app-layout>
    <main>
        <header>
            <h1 class="text-2xl py-2 font-bold tracking-wider text-gray-900 dark:text-white">User Information</h1>
        </header>

        <div class="grid sm:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6 mt-3">
            <!-- Left Section -->
            <section class="col-span-1 sm:col-span-2 lg:col-span-2 xl:col-span-2 space-y-7">
                <div>
                    <div class="space-y-7">
                        @include('setting.partials.profile')
                        @include('setting.partials.language')
                    </div>
                </div>
            </section>

            <!-- Right Section -->
            <section class="col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-3 xl:col-span-4 space-y-7">
                <div>
                    <div class="space-y-7">
                        @include('setting.partials.information')
                        @include('setting.partials.password-change')
                        @include('setting.partials.delete-account')
                    </div>
                </div>
            </section>
        </div>
    </main>
</x-app-layout>
