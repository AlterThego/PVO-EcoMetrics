<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('assets/images/benguet.png') }}">
    <title>Province of Benguet — Provincial Veterinary Office</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen min-w-screenbg-center">
        <div>
            {{-- Navigation bar --}}
            <nav id="navbar"
                class="fixed bg-white dark:bg-gray-900 top-0 left-0 z-50 w-screen transition duration-500 ease-in-out shadow-2xl">
                <div class="max-w-7xl mx-auto py-2 flex justify-between items-center">
                    <div class="flex items-center"> <!-- Added flex and items-center to align items horizontally -->
                        <div class="flex items-center"> <!-- Added flex and items-center to align items horizontally -->
                            <div class="pl-6">
                                <div class="bg-white rounded-full">
                                    <img fetchpriority="high" src="./assets/images/logo.png" alt=""
                                        class="header__img">
                                </div>
                            </div>
                            <div class="h-px bg-gray-400 m-2"></div> <!-- Horizontal line break -->
                        </div>
                        <div class="hidden sm:block">
                            <h1 class="text-xs">Province of Benguet</h1>
                            {{-- <div class="h-px bg-gray-400"></div> <!-- Horizontal line break --> --}}
                            <h1 class="font-bold text-md">Provincial Veterinary Office</h1>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link href="#introduction">
                                <div class="text-bold">
                                    {{ __('Introduction') }}
                                </div>
                            </x-nav-link>
                            <x-nav-link href="#features">
                                <div class="text-bold">
                                    {{ __('Features') }}
                                </div>
                            </x-nav-link>
                            <x-nav-link href="#about">
                                <div class="text-bold">
                                    {{ __('About') }}
                                </div>
                            </x-nav-link>
                        </div>
                    </div>



                    @if (Route::has('login'))
                        <div class="flex justify-end items-center py-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="font-bold hover:text-red-900">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="font-bold hover:text-red-900 ml-4">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="font-bold hover:text-red-900 ml-4">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif

                </div>
            </nav>



            {{-- Section 1 --}}
            {{-- Static cover --}}
            <section id="introduction"
                class="grid h-screen w-screen grid-cols-1 bg-slate-200 md:grid-cols-1 bg-gradient-to-r from-zinc-900 to-gray-900">
                <div class="relative h-screen">
                    <div
                        class="absolute inset-0 bg-primary bg-no-repeat bg-fixed bg-cover bg-right md:bg-center opacity-70">
                        <!-- Background Image with Opacity -->
                    </div>
                    <div class="absolute inset-0 flex flex-col justify-center items-center text-center">
                        <span class="font-bold text-6xl text-yellow-300">Lorem ipsum </span><br />
                        <span class="text-6xl text-white">Lorem Ipsum</span>
                    </div>
                </div>
            </section>

            {{-- If video --}}
            {{-- <section id="introduction" class="grid h-screen w-screen grid-cols-1 md:grid-cols-1">
                <div class="relative h-screen">
                    <video autoplay muted loop class="absolute inset-0 object-cover w-full h-full">
                        <source src="assets/ambuklao.mkv" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="absolute inset-0 flex flex-col justify-center items-center text-center">
                        <span class="font-bold text-6xl text-yellow-300">Lorem ipsum </span><br />
                        <span class="text-6xl text-white">Lorem Ipsum</span>
                    </div>
                </div>
            </section> --}}


            {{-- Section 2 --}}
            <section class=" w-5/6 m-auto mt-28 grid grid-col-1 gap-x-3 gap-y-10 md:grid-cols-2 max-w-6xl items-center">
                <div class="py-3 px-2">
                    <p1 class="text-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in turpis
                        at
                        libero euismod luctus vel sit amet lorem.<br /> Maecenas lorem metus, semper in lobortis
                        imperdiet,
                        pulvinar sed felis. Maecenas aliquam velit in ligula tincidunt imperdiet. Integer interdum enim
                        ut
                        placerat dignissim. Maecenas turpis orci, facilisis vitae ligula non, luctus convallis risus.
                    </p1>
                </div>
                <div class="py-3 px-2">
                    {{-- <img src="https://vehint.com/wp-content/uploads/2020/10/audi_r8_green_hell_2021_1.jpg"> --}}
                </div>
            </section>

            {{-- Section 3 --}}
            <section
                class="w-full bg-secondary md:py-52 py-28 md:bg-cover md:bg-center bg-contain my-20 border   bg-fixed bg-no-repeat ">
            </section>

            {{-- Section 4 --}}
            <section id="features"
                class="w-5/6 m-auto mt-10 grid grid-col-1 gap-x-3 gap-y-10 md:grid-cols-2 max-w-6xl items-center mb-20">
                <div
                    class="flex flex-col flex-grow items-stretch max-w-2xl min-w-md w-full sm:flex-row sm:h-72 sm:overflow-hidden">
                    <div
                        class="active cursor-pointer duration-700 ease-in-out flex-grow m-2 min-h-14 min-w-14 overflow-hidden pane relative rounded-3xl transition-all">
                        <div
                            class="absolute bg-primary bg-center bg-cover bg-red-500 bg-red-img bg-no-repeat duration-700 ease-in-out inset-0 scale-105 transition-all z-10">
                        </div>
                        <div
                            class="absolute bg-gradient-to-b bottom-0 duration-700 ease-in-out from-transparent h-1/2 inset-x-0 opacity-0 shadow to-black transform transition-all translate-y-1/2 z-20">
                        </div>
                        <div
                            class="absolute bottom-0 duration-700 ease-in-out flex label left-0 mb-2 ml-3 sm:mb-3 sm:ml-2 transition-all z-30">
                            <div
                                class="bg-gray-900 flex h-10 icon items-center justify-center mr-3 rounded-full text-red-500 w-10">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <g fill="currentColor">
                                        <path
                                            d="m14.829 11.948l1.414-1.414L12 6.29l-4.243 4.243l1.415 1.414L11 10.12v7.537h2V10.12z" />
                                        <path fill-rule="evenodd"
                                            d="M19.778 4.222c-4.296-4.296-11.26-4.296-15.556 0c-4.296 4.296-4.296 11.26 0 15.556c4.296 4.296 11.26 4.296 15.556 0c4.296-4.296 4.296-11.26 0-15.556m-1.414 1.414A9 9 0 1 0 5.636 18.364A9 9 0 0 0 18.364 5.636"
                                            clip-rule="evenodd" />
                                    </g>
                                </svg>
                            </div>
                            <div class="content flex flex-col justify-center leading-tight text-white whitespace-pre">
                                <div
                                    class="ease-in-out font-bold duration-700 opacity-0 relative transform transition-all translate-x-8">
                                    Scalable</div>
                                <div
                                    class="delay-100 duration-700 ease-in-out opacity-0 relative transform transition-all translate-x-8">
                                    For the Future</div>
                            </div>
                        </div>
                    </div>

                    <!-- Second feature panel -->
                    <div
                        class="undefined cursor-pointer duration-700 ease-in-out flex-grow m-2 min-h-14 min-w-14 overflow-hidden pane relative rounded-3xl transition-all">
                        <div
                            class="absolute background bg-center bg-cover bg-yellow-500 bg-yellow-img bg-no-repeat duration-700 ease-in-out inset-0 scale-105 transition-all z-10">
                        </div>
                        <div
                            class="absolute bg-gradient-to-b bottom-0 duration-700 ease-in-out from-transparent h-1/2 inset-x-0 opacity-0 shadow to-black transform transition-all translate-y-1/2 z-20">
                        </div>
                        <div
                            class="absolute bottom-0 duration-700 ease-in-out flex label left-0 mb-2 ml-3 sm:mb-3 sm:ml-2 transition-all z-30">
                            <div
                                class="bg-gray-900 flex h-10 icon items-center justify-center mr-3 rounded-full text-yellow-500 w-10">
                            </div>
                            <div class="content flex flex-col justify-center leading-tight text-white whitespace-pre">
                                <div
                                    class="ease-in-out font-bold duration-700 opacity-0 relative transform transition-all translate-x-8">
                                    Prediction</div>
                                <div
                                    class="delay-100 duration-700 ease-in-out opacity-0 relative transform transition-all translate-x-8">
                                    Linear Regression</div>
                            </div>
                        </div>
                    </div>

                    <!-- Third feature panel -->
                    <div
                        class="undefined cursor-pointer duration-700 ease-in-out flex-grow m-2 min-h-14 min-w-14 overflow-hidden pane relative rounded-3xl transition-all">
                        <div
                            class="absolute background bg-center bg-cover bg-green-500 bg-green-img bg-no-repeat duration-700 ease-in-out inset-0 scale-105 transition-all z-10">
                        </div>
                        <div
                            class="absolute bg-gradient-to-b bottom-0 duration-700 ease-in-out from-transparent h-1/2 inset-x-0 opacity-0 shadow to-black transform transition-all translate-y-1/2 z-20">
                        </div>
                        <div
                            class="absolute bottom-0 duration-700 ease-in-out flex label left-0 mb-2 ml-3 sm:mb-3 sm:ml-2 transition-all z-30">
                            <div
                                class="bg-gray-900 flex h-10 icon items-center justify-center mr-3 rounded-full text-green-500 w-10">
                                <i class="fas fa-tree"></i>
                            </div>
                            <div class="content flex flex-col justify-center leading-tight text-white whitespace-pre">
                                <div
                                    class="ease-in-out font-bold duration-700 opacity-0 relative transform transition-all translate-x-8">
                                    Summary</div>
                                <div
                                    class="delay-100 duration-700 ease-in-out opacity-0 relative transform transition-all translate-x-8">
                                    Automated Report</div>
                            </div>
                        </div>
                    </div>

                    <!-- Fourth feature panel -->
                    <div
                        class="undefined cursor-pointer duration-700 ease-in-out flex-grow m-2 min-h-14 min-w-14 overflow-hidden pane relative rounded-3xl transition-all">
                        <div
                            class="absolute background bg-center bg-cover bg-blue-500 bg-blue-img bg-no-repeat duration-700 ease-in-out inset-0 scale-105 transition-all z-10">
                        </div>
                        <div
                            class="absolute bg-gradient-to-b bottom-0 duration-700 ease-in-out from-transparent h-1/2 inset-x-0 opacity-0 shadow to-black transform transition-all translate-y-1/2 z-20">
                        </div>
                        <div
                            class="absolute bottom-0 duration-700 ease-in-out flex label left-0 mb-2 ml-3 sm:mb-3 sm:ml-2 transition-all z-30">
                            <div
                                class="bg-gray-900 flex h-10 icon items-center justify-center mr-3 rounded-full text-blue-500 w-10">
                                <i class="fas fa-tint"></i>
                            </div>
                            <div class="content flex flex-col justify-center leading-tight text-white whitespace-pre">
                                <div
                                    class="ease-in-out font-bold duration-700 opacity-0 relative transform transition-all translate-x-8">
                                    Adapt</div>
                                <div
                                    class="delay-100 duration-700 ease-in-out opacity-0 relative transform transition-all translate-x-8">
                                    Embrace the times</div>
                            </div>
                        </div>
                    </div>

                    <!-- Fifth feature panel -->
                    <div
                        class="undefined cursor-pointer duration-700 ease-in-out flex-grow m-2 min-h-14 min-w-14 overflow-hidden pane relative rounded-3xl transition-all">
                        <div
                            class="absolute background bg-center bg-cover bg-purple-500 bg-purple-img bg-no-repeat duration-700 ease-in-out inset-0 scale-105 transition-all z-10">
                        </div>
                        <div
                            class="absolute bg-gradient-to-b bottom-0 duration-700 ease-in-out from-transparent h-1/2 inset-x-0 opacity-0 shadow to-black transform transition-all translate-y-1/2 z-20">
                        </div>
                        <div
                            class="absolute bottom-0 duration-700 ease-in-out flex label left-0 mb-2 ml-3 sm:mb-3 sm:ml-2 transition-all z-30">
                            <div
                                class="bg-gray-900 flex h-10 icon items-center justify-center mr-3 rounded-full text-purple-500 w-10">
                                <i class="fas fa-palette"></i>
                            </div>
                            <div class="content flex flex-col justify-center leading-tight text-white whitespace-pre">
                                <div
                                    class="ease-in-out font-bold duration-700 opacity-0 relative transform transition-all translate-x-8">
                                    Inspire</div>
                                <div
                                    class="delay-100 duration-700 ease-in-out opacity-0 relative transform transition-all translate-x-8">
                                    Share your potential</div>
                            </div>
                        </div>
                    </div>
                </div>
                <h1
                    class="mx-auto pl-10 max-w-4xl font-display text-5xl font-bold tracking-normal text-white-300 dark:text-gray-300 sm:text-7xl">
                    Features
                </h1>
            </section>


            {{-- Section 5 --}}
            <section
                class="grid h-screen w-full grid-cols-1  bg-slate-200 md:grid-cols-1 bg-gradient-to-r from-zinc-900 to-gray-900">

                <div
                    class="flex flex-col justify-between bg-primary  bg-no-repeat bg-fixed bg-cover bg-right md:bg-center ">
                    <nav class="mt-5 border-b py-1">
                        <ul class="flex justify-center">
                            <li class="py-2 px-3 text-2xl font-thin text-white  ">Home</li>
                            <li class="py-2 px-3 text-2xl font-thin text-white">Services</li>
                            <li class="py-2 px-3 text-2xl font-thin text-white">About</li>
                            <li class="py-2 px-3 text-2xl font-thin text-white">Models</li>
                        </ul>
                    </nav>
                    <div class="-mt-44 py-4 text-center text-6xl font-bold text-yellow-300">
                        <span class="font-extralight">R8</span><br />
                        <span class=" font-anybody">THE POWER</span>
                    </div>
                    <div class="flex items-center md:w-6/12 md:self-center">
                        <div class="flex w-1/3 justify-center border-r py-4 px-4 gap-5 text-white">
                            <span>250 MPH</span>
                            <span class="material-icons">speed</span>

                        </div>
                        <div class="flex w-1/3 justify-center py-4 px-4 gap-5 text-white">
                            <span>300 km</span>
                            <span class="material-icons">
                                directions_car
                            </span>
                        </div>
                        <div class="flex w-1/3 justify-center border-l py-4 px-4 gap-5 text-white">
                            <span>SuperChargh</span>
                            <span class="material-icons">
                                bolt
                            </span>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Section 6 --}}
            <section
                class=" w-5/6 m-auto mt-28 grid grid-col-1 gap-x-3 gap-y-10 md:grid-cols-2 max-w-6xl items-center">
                <div class="py-3 px-2">
                    <h1 class="text-5xl mb-8">New interior</h1>
                    <p1 class="text-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in turpis
                        at
                        libero euismod luctus vel sit amet lorem.<br /> Maecenas lorem metus, semper in lobortis
                        imperdiet,
                        pulvinar sed felis. Maecenas aliquam velit in ligula tincidunt imperdiet. Integer interdum enim
                        ut
                        placerat dignissim. Maecenas turpis orci, facilisis vitae ligula non, luctus convallis risus.
                    </p1>
                </div>
                <div class="py-3 px-2">
                    <img src="https://vehint.com/wp-content/uploads/2020/10/audi_r8_green_hell_2021_1.jpg">
                </div>
            </section>

            {{-- Section 7 --}}
            <section
                class="w-full bg-secondary md:py-52 py-28 md:bg-cover md:bg-center bg-contain my-20 border   bg-fixed bg-no-repeat ">
            </section>

            {{-- Section 8 --}}
            <section
                class=" w-5/6 m-auto mt-10 grid grid-col-1 gap-x-3 gap-y-10 md:grid-cols-2 max-w-6xl items-center mb-20  ">

                <div class="py-3 px-2">
                    {{-- <img src="https://vehint.com/wp-content/uploads/2020/10/audi_r8_green_hell_2021_1.jpg"> --}}
                </div>

                <div class="py-3 px-2 ">
                    <h1 class="text-5xl mb-8">New interior</h1>
                    <p1 class="text-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in turpis
                        at
                        libero euismod luctus vel sit amet lorem.<br /> Maecenas lorem metus, semper in lobortis
                        imperdiet,
                        pulvinar sed felis. Maecenas aliquam velit in ligula tincidunt imperdiet. Integer interdum enim
                        ut
                        placerat dignissim. Maecenas turpis orci, facilisis vitae ligula non, luctus convallis risus.
                    </p1>
                </div>




            </section>


        </div>
    </div>
    <div class=" mx-auto py-16 xl:px-20 lg:px-12 sm:px-6 px-4 text-center"
    style="position:relative; z-index:30;">
    <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
    <div class="flex w-full flex-col items-center justify-center pb-10">
        <img class="h-20"
            src="https://benguet.gov.ph/wp-content/uploads/2020/09/province-of-benguet-banner-1-768x154.png">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 md:gap-8 gap-4">
        <div class="flex flex-col">
            <p class="text-lg font-bold leading-none text-gray-800 dark:text-white">DigiStock</p>
            <p class="text-sm leading-none text-gray-800 mt-4 dark:text-white">Copyright © 2021 DigiStock
            </p>
            <p class="text-sm leading-none text-gray-800 mt-4 dark:text-white">All rights reserved</p>
        </div>
        <div class="flex flex-col">
            <h2 class="text-base font-semibold leading-4 text-gray-800 dark:text-white">Company</h2>
            <a href="/about-us-guest"
                class=" hover:text-gray-500 text-base leading-4 mt-6 text-gray-800 dark:text-white cursor-pointer">About
                Us</a>
            <a href="javascript:void(0)"
                class="focus:outline-none focus:underline hover:text-gray-500 text-base leading-4 mt-6 text-gray-800 dark:text-white cursor-pointer">Contact
                us</a>
        </div>
        <div class="flex flex-col">
            <h2 class="text-base font-semibold leading-4 text-gray-800 dark:text-white">Support</h2>
            <a href="javascript:void(0)"
                class="focus:outline-none focus:underline hover:text-gray-500 text-base leading-4 mt-6 text-gray-800 dark:text-white cursor-pointer">Legal
                policy</a>
            <a href="javascript:void(0)"
                class="focus:outline-none focus:underline hover:text-gray-500 text-base leading-4 mt-6 text-gray-800 dark:text-white cursor-pointer">Status
                policy</a>
            <a href="javascript:void(0)"
                class="focus:outline-none focus:underline hover:text-gray-500 text-base leading-4 mt-6 text-gray-800 dark:text-white cursor-pointer">Privacy
                policy</a>
            <a href="javascript:void(0)"
                class="focus:outline-none focus:underline hover:text-gray-500 text-base leading-4 mt-6 text-gray-800 dark:text-white cursor-pointer">Terms
                of service</a>
        </div>
    </div>
</div>
    @livewireScripts

    <script>
        const panes = document.querySelectorAll('.pane');
        let activePaneIndex = 0;

        panes.forEach((pane, index) => {
            pane.addEventListener('click', () => {
                panes[activePaneIndex].classList.remove('active');
                activePaneIndex = index;
                panes[activePaneIndex].classList.add('active');
            });
        });
    </script>

    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 0) {
                navbar.classList.add('bg-transparent', 'bg-opacity-60', 'backdrop-filter',
                    'backdrop-blur-6xl');
            } else {
                navbar.classList.remove('bg-transparent', 'bg-opacity-60', 'backdrop-filter',
                    'backdrop-blur-6xl');
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('x-nav-link');

            window.addEventListener('scroll', () => {
                let current = '';

                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.clientHeight;
                    const windowHeight = window.innerHeight;
                    if (pageYOffset >= sectionTop - windowHeight / 2 && pageYOffset <= sectionTop +
                        sectionHeight - windowHeight / 2) {
                        current = section.getAttribute('id');
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href').slice(1) === current) {
                        link.classList.add('active');
                    }
                });
            });
        });
    </script>
</body>

</html>
