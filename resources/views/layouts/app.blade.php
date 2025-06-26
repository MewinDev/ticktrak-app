<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Ticktrak App') }}</title>

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

    <!-- Scripts -->
    <script>
        if (
            localStorage.getItem('color-theme') === 'dark' ||
            (!localStorage.getItem('color-theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)
        ) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased font-abz bg-white">
    <div x-data="{
        mini: window.innerWidth < 1024,
        isGroup: window.innerWidth >= 1024 && window.location.pathname.includes('teams') ?
            JSON.parse(localStorage.getItem('isGroup')) ?? true : false,
        isMobile: window.innerWidth < 1024,
    
        toggleSidebar(state) {
            this.isGroup = state;
            this.mini = this.isMobile ? true : state;
            localStorage.setItem('isGroup', JSON.stringify(state));
        }
    }" x-init="window.addEventListener('resize', () => {
        isMobile = window.innerWidth < 1024;
        if (!isMobile && window.location.pathname.includes('teams')) {
            isGroup = JSON.parse(localStorage.getItem('isGroup')) ?? true;
            mini = isGroup;
        } else {
            isGroup = false;
            mini = true;
        }
    })" class="min-h-screen dark:bg-gray-900">

        <header>
            @include('layouts.navigation')
            @include('layouts.aside')
        </header>

        <!-- Page Content -->
        <main class="w-full -pl-16 lg:pl-16 transition-all duration-300 ease-in-out"
            :class="{
                'lg:pl-80': isGroup,
                'lg:pl-16': !isGroup
            }">
            <div class="pt-24 px-5 lg:px-10 ">
                {{ $slot }}
            </div>
        </main>

        <x-modal title="Create Team" name="create-team-project-modal" maxWidth="md">
            <div>
                <!-- Replace 'teams.store' with 'teams.update' if editing -->
                <form action="{{ route('teams.store') }}" method="POST" class="space-y-4"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Team Picture Upload -->
                    <div class="flex flex-col md:flex-col lg:flex-row items-start gap-5 mt-3">
                        <img id="picturePreview" src="{{ asset('images/logo.png') }}" alt="picture"
                            class="w-28 h-28 object-cover rounded-md border border-gray-300 dark:border-gray-600" />
                        <div class="w-full">
                            <h2 class="text-lg text-gray-900 dark:text-white uppercase">Team Picture</h2>

                            <!-- Team Picture -->
                            <x-forms.file-input color="gray" name="team_profile" id="team_profile" type="file"
                                accept=".jpg,.jpeg,.png,.svg" x-model="form.team_profile" placeholder="Team Picture" />

                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-300">SVG, JPG or PNG. Max size of 2MB.
                            </p>
                            <x-forms.input-error :messages="$errors->get('team_profile')" x-text="errors?.team_profile?.[0]" class="mt-2" />
                        </div>
                    </div>

                    <!-- Team Name -->
                    <div>
                        <x-forms.input-label for="team_name" value="{{ __('Team Name') }}" />
                        <x-forms.text-input color="blue" type="text" name="team_name" id="team_name"
                            fieldName="team_name" x-model="form.team_name" placeholder="Team Name..."
                            extraClass="focus:border-blue-500" />
                        <x-forms.input-error :messages="$errors->get('team_name')" x-text="errors?.team_name?.[0]" class="mt-2" />
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-end space-x-3 pt-4">
                        <x-forms.button color="gray" type="button" @click="$dispatch('close')">Close</x-forms.button>
                        <x-forms.button color="blue" type="submit">Create Team</x-forms.button>
                    </div>
                </form>
            </div>
        </x-modal>
    </div>

    <x-templates.alert-message></x-templates.alert-message>
    <script src="{{ asset('scripts/teams/team-form.js') }}"></script>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('taskEvents', {
                reload: false,
            });

            Alpine.store('toast', {
                show: false, // Default to false
                message: '', // Default message
                type: '', // Set as empty to avoid undefined
                trigger(message, type = 'success') {
                    console.log('Toast triggered:', message, type);
                    this.message = message;
                    this.type = type;
                    this.show = true;
                    setTimeout(() => this.show = false, 3000);
                }
            });
        });
    </script>

    <script>
        document.getElementById('team_profile').addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    document.getElementById('picturePreview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

    @stack('scripts')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>

<footer
    class="z-20 p-4 bg-white border-t border-gray-200 shadow-sm md:flex md:items-center md:justify-center dark:bg-gray-800 dark:border-gray-600 uppercase"
    :class="{
        'sm:ml-64': full && !mini,
        'sm:ml-16': mini && !full
    }">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{ now()->year }} <a href="/"
            class="hover:underline">Ticktrak App</a>. All Rights Reserved.</span>
</footer>

</html>
