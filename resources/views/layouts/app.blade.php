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
                class="lg:h-9w-96 h-full w-80 rounded-full bg-yellow-100 dark:bg-blue-600 opacity-20 mix-blend-multiply blur-3xl filter lg:w-full fixed z-0 bottom-0 left-0"></span>
            <span
                class="lg:h-9w-96 nc-animation-delay-2000 ml-10 -mt-10 h-80 w-80 rounded-full bg-green-100 dark:bg-violet-600 opacity-20 mix-blend-multiply blur-3xl filter lg:w-full fixed z-0 top-0 right-0"></span>
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
            <div class=" mx-auto py-16 xl:px-20 lg:px-12 sm:px-6 px-4 text-center"
                style="position:relative; z-index:30;">
                <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
                <div class="flex w-full flex-col items-center justify-center pb-10">
                    <img class="h-20"
                        src="https://benguet.gov.ph/wp-content/uploads/2020/09/province-of-benguet-banner-1-768x154.png">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 md:gap-8 gap-4">
                    <div class="flex flex-col">
                        <p class="text-lg font-bold leading-none text-gray-800 dark:text-white">EcoMetrics</p>
                        <p class="text-sm leading-none text-gray-800 mt-4 dark:text-white">Copyright © 2024 EcoMetrics
                        </p>
                        <p class="text-sm leading-none text-gray-800 mt-4 dark:text-white">All rights reserved</p>
                    </div>
                    <div class="flex flex-col">
                        <h2 class="text-base font-semibold leading-4 text-gray-800 dark:text-white">Benguet Provincial Veterinary Office</h2>
                        <a href="/about-us"
                            class="focus:outline-none hover:text-gray-500 text-base leading-4 mt-6 text-gray-800 dark:text-white cursor-pointer">About
                            Us</a>
                        <a href="/contact-us"
                            class="focus:outline-none hover:text-gray-500 text-base leading-4 mt-6 text-gray-800 dark:text-white cursor-pointer">Contact
                            us</a>
                    </div>
                    <div class="flex flex-col">
                        <h2 class="text-base font-semibold leading-4 text-gray-800 dark:text-white">Support</h2>
                        <a href="/privacy-policy"
                            class="hover:text-gray-500 text-base leading-4 mt-6 text-gray-800 dark:text-white cursor-pointer">Privacy
                            Policy</a>
                        <a href="/terms-of-service"
                            class="hover:text-gray-500 text-base leading-4 mt-6 text-gray-800 dark:text-white cursor-pointer">Terms
                            of Service</a>
                    </div>
                </div>
            </div>
        </main>


        @livewireScripts
        {{-- @livewireChartsScripts --}}
    </div>

    <script src="{{ asset('assets/js/save-state.js') }}"></script>
</body>

</html>
