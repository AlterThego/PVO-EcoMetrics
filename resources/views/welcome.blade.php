<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('assets/images/benguet.png') }}">
    <title>Province of Benguet — Provincial Veterinary Office</title>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Landing page section 4 --}}
    <link rel="stylesheet" href="assets/css/landing-page.css">
    <style>
        html {
            scroll-behavior: smooth;
        }

        .bg-primary {
            background-image: url('assets/images/benguet_image_2.jpg')
        }

        .bg-secondary {
            background-image: url('assets/images/benguet_image.jpg')
        }

        .bg-third {
            background-image: url('assets/images/capitol_image.png')
        }

        .header__img {
            width: 40px;
            height: 40px;
            order: 1;
        }

        /* Accordion */
        .pane.active {
            flex-grow: 10;
            max-width: 100%;

            .background {
                transform: scale(1.25, 1.25);
            }

            .label {
                @media (min-width: 640px) {
                    transform: translateX(0.5rem);
                }

                .content>* {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            .shadow {
                opacity: 0.75;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="antialiased overflow-x-hidden">
    {{-- Main --}}
    <section id="introduction"></section>
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen min-w-screen bg-center border-b-2 border-red-900 ">
        <div>
            {{-- Navigation bar --}}
            <nav id="navbar"
                class="fixed bg-white dark:bg-gray-900 top-0 left-0 z-50 w-screen transition duration-500 ease-in-out shadow-2xl">
                <div class="max-w-7xl mx-auto py-2 flex justify-between items-center">
                    <div class="flex items-center"> <!-- Added flex and items-center to align items horizontally -->
                        <a href="/">
                            <div class="flex items-center">
                                <!-- Added flex and items-center to align items horizontally -->
                                <div class="pl-6">
                                    <div class="bg-white rounded-full">
                                        <img fetchpriority="high" src="./assets/images/logo.png" alt=""
                                            class="header__img">
                                    </div>
                                </div>
                                <div class="h-px bg-gray-400 m-2"></div>
                            </div>
                        </a>

                        <div class="hidden sm:block">
                            <h1 class="text-xs">Province of Benguet</h1>
                            <h1 class="font-bold text-md">Provincial Veterinary Office</h1>
                        </div>

                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex hover:text-black">
                            <x-nav-link href="/">
                                <div class="font-bold">
                                    {{ __('Introduction') }}
                                </div>
                            </x-nav-link>
                            <x-nav-link href="#features">
                                <div class="font-bold">
                                    {{ __('Features') }}
                                </div>
                            </x-nav-link>
                             <x-nav-link href="#walkthrough">
                                <div class="font-bold">
                                    {{ __('Walkthrough') }}
                                </div>
                            </x-nav-link>
                            <x-nav-link href="#mission">
                                <div class="font-bold">
                                    {{ __('Mission and Vision') }}
                                </div>
                            </x-nav-link>
                        </div>
                    </div>



                    @if (Route::has('login'))
                        <div class="flex justify-end items-center py-4 px-10">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="font-bold hover:text-red-900">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="font-bold hover:text-red-900 ml-4">Log in</a>
                                {{-- @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="font-bold hover:text-red-900 ml-4">Register</a>
                                @endif --}}
                            @endauth
                        </div>
                    @endif

                </div>
            </nav>

            <div class="py-10">
                {{-- Introduction --}}
                @include('landing-page-components.introduction')

                {{-- Section 1 --}}
                @include('landing-page-components.section-1')

                {{-- Section 2 (image) --}}
                @include('landing-page-components.section-2')

                {{-- Section 3 --}}
                @include('landing-page-components.section-3')

                {{-- Section 4 --}}
                @include('landing-page-components.section-4')

                {{-- Section 5  --}}
                @include('landing-page-components.section-5')

                {{-- Section 6 (image) --}}
                @include('landing-page-components.section-6')

                {{-- Section 7  --}}
                @include('landing-page-components.section-7')
            </div>

        </div>
    </div>

    {{-- Footer --}}
    <div class=" mx-auto py-10 xl:px-20 lg:px-15 sm:px-6 px-4 text-center" style="position:relative; z-index:30;">
        <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
        <div class="flex w-full flex-col items-center justify-center pb-10">
            <img class="h-20"
                src="https://benguet.gov.ph/wp-content/uploads/2020/09/province-of-benguet-banner-1-768x154.png">
        </div>
        @include('landing-page-components.footer')
    </div>

    @livewireScripts

    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 0) {
                navbar.classList.add('bg-transparent', 'bg-opacity-60', 'backdrop-filter',
                    'backdrop-blur-6xl', 'border-b-2', 'border-red-900');
            } else {
                navbar.classList.remove('bg-transparent', 'bg-opacity-60', 'backdrop-filter',
                    'backdrop-blur-6xl', 'border-b-2', 'border-red-900');
            }
        });
    </script>
</body>

</html>
