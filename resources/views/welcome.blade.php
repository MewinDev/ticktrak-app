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

<body class="antialiased font-abz">

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-50 dark:bg-gray-900">
        <nav x-data="{ open: false }" class="absolute top-0 right-0 mt-4 mr-4">
            <!-- blue Navigation Menu -->
            <div class="flex items-center">
                <!-- dark-light-theme -->
                <button id="theme-toggle" type="button"
                    class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 dark:focus:ring-gray-900 rounded-lg text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-7 h-7" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                    </svg>
                </button>
            </div>
        </nav>

        <section class="max-w-7xl mx-auto p-6 lg:p-8 mt-10">
            <a href="/">
                <x-application-logo />
            </a>
            <div class="mt-5">
                <div class="flex flex-col space-y-3">
                    @if (Route::has('login'))
                        @auth
                            <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                                @csrf
                            </form>

                            <x-forms.link href="{{ route('dashboard') }}" size="xl" color='gray'
                                extraClass='uppercase'>Dashboard</x-forms.link>

                            <x-forms.link href="{{ route('logout') }}"
                                onclick="document.getElementById('logoutForm').submit(); return false;" size="xl"
                                color='gray' extraClass='uppercase'>Logout</x-forms.link>
                        @else
                            <x-forms.link href="{{ route('login') }}" size="xl" color='gray'
                                extraClass='uppercase'>Log In</x-forms.link>
                        @endauth
                    @endif
                </div>
            </div>
        </section>
    </div>
</body>

</html>
