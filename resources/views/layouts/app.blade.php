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

<body class="font-sans antialiased lg:overflow-y-auto sm:overflow-y-hidden">
    <div class="min-h-screen bg-custom-gray dark:bg-gray-900">
        <div class="absolute inset-x-0 top-0 z-0 flex min-h-0 flex-col overflow-hidden py-32 pl-10">
            <span
                class="lg:h-9w-96 h-80 w-80 rounded-full bg-red-200 opacity-20 mix-blend-multiply blur-3xl filter lg:w-96"></span>
            <span
                class="lg:h-9w-96 nc-animation-delay-2000 ml-10 -mt-10 h-80 w-80 rounded-full bg-emerald-200 opacity-20 mix-blend-multiply blur-3xl filter lg:w-96"></span>
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
    </div>
    @livewireScripts
    {{-- @livewireChartsScripts --}}
    
    
    <script src="{{ asset('assets/js/save-state.js') }}"></script>
</body>

</html>
