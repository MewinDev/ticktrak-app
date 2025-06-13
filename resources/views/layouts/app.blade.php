<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Blog') }}</title>

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
    <div x-data="{ mini: true, full: false }" class="min-h-screen dark:bg-gray-900">
        <header @click.outside="full = false; mini = true">
            @include('layouts.navigation')
            @include('layouts.aside')
        </header>

        <!-- Page Content -->
        <main class="w-full lg:pl-16"
            :class="{
                'lg:pl-64': full && !mini,
                'lg:pl-16': mini && !full
            }">
            <div class="pt-24 px-5 lg:px-10 ">
                {{ $slot }}
            </div>
        </main>
    </div>

    <x-templates.alert-message></x-templates.alert-message>

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
