<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="{{ asset('images/gg-ph-logo.png') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- SEO Meta Tags --}}
        <title>@yield('title', 'GoodGov PH')</title>
        <meta name="description" content="@yield('meta_description', 'Learn more about GoodGov PH, a platform for transparent and participatory governance in the Philippines.')">
        <meta name="keywords" content="@yield('meta_keywords', 'good governance, transparency, public service, Philippines government, GG PH')">

        {{-- Canonical URL --}}
        <link rel="canonical" href="{{ url()->current() }}"/>

        {{-- Open Graph Meta for Social Sharing --}}
        <meta property="og:title" content="About GoodGov PH">
        <meta property="og:description" content="Meet the minds behind GoodGov PH and our mission to empower citizens through digital governance tools.">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ asset('images/gg-ph-logo.png') }}">

        {{-- Twitter Cards --}}
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="About Us - GoodGov PH">
        <meta name="twitter:description" content="Our mission is to promote good governance and civic engagement in the Philippines.">
        <meta name="twitter:image" content="{{ asset('images/gg-ph-logo.png') }}">

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
                <!-- Primary Navigation Menu -->
                <div class="flex items-center">
                    <!-- dark-light-theme -->
                    <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 dark:focus:ring-gray-900 rounded-lg text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                    </svg>
                    </button>
                </div>
            </nav>

            <section class="max-w-7xl mx-auto p-6 lg:p-8 mt-10">
                <div class="flex items-center justify-center gap-5">
                    <x-application-logo class="w-32 rounded-xl"/>
                    <h1 class="sm:block hidden font-extrabold text-gray-700 dark:text-white text-6xl uppercase">
                    Good <br>
                    <span class="flex items-end">Go<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="text-blue-500 w-16">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg> PH
                    </span>
                    </h1>
                </div>

                <div class="mt-5">
                    <div class="flex flex-col space-y-3">
                    @if (Route::has('login'))
                        @auth
                            <x-forms.link href="{{ route('dashboard') }}" size="xl" color='gray' extraClass='uppercase'>Dashboard</x-forms.link>
                        @else
                            <x-forms.link href="{{ route('login') }}" size="xl" color='gray' extraClass='uppercase'>Log In</x-forms.link>
                            <x-forms.link href="{{ route('dashboard') }}" size='xl' color='gray' extraClass='uppercase'>List of Candidates  </x-forms.link>
                        @endauth
                    @endif
                    <x-forms.button size='xl' color='gray' extraClass='uppercase'>Sample Voting Ballots</x-forms.button>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
