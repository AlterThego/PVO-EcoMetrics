<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased lg:overflow-y-auto sm:overflow-y-hidden overflow-x-hidden z-10">
    <div class="lg:pl-16 md:pl-8 sm:pl-4 min-h-screen bg-white dark:bg-gray-900 z-0 dark:[color-scheme:dark]">
        <div class="absolute inset-x-0 top-0 z-0 flex min-h-0 flex-col overflow-hidden pt-32 pl-10 h-screen w-screen">
            <span
                class="lg:h-9w-96 h-full w-80 rounded-full bg-green-200 dark:bg-blue-300 opacity-20 mix-blend-multiply blur-3xl filter lg:w-full fixed z-0 bottom-0 left-0"></span>
            <span
                class="lg:h-9w-96 nc-animation-delay-2000 ml-10 -mt-10 h-80 w-80 rounded-full bg-yellow-200 dark:bg-violet-400 opacity-20 mix-blend-multiply blur-3xl filter lg:w-full fixed z-0 top-0 right-0"></span>
        </div>



        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-900 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        @livewireScripts
        {{-- @livewireChartsScripts --}}
    </div>

    <script src="{{ asset('assets/js/save-state.js') }}"></script>
</body>

</html>
