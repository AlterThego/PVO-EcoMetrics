<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="{{ asset('assets/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/boxicons/css/boxicons.min.css') }}">



    <title>Dashboard</title>

</head>

<body>
    <div class="wrapper">
        <!--========== NAV ==========-->
        <div class="nav" id="navbar">
            <nav class="nav__container">
                <div>
                    <a href="/" class="nav__link nav__logo">
                        {{-- <i class='bx bxs-disc nav__icon'></i> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="bx nav__icon" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5">
                                <path
                                    d="M9.5 15.5v-7A.5.5 0 0 1 10 8h2a3.5 3.5 0 0 1 3.5 3.5v1A3.5 3.5 0 0 1 12 16h-2a.5.5 0 0 1-.5-.5" />
                                <path
                                    d="M7.805 3.469C8.16 3.115 8.451 3 8.937 3h6.126c.486 0 .778.115 1.132.469l4.336 4.336c.354.354.469.646.469 1.132v6.126c0 .5-.125.788-.469 1.132l-4.336 4.336c-.354.354-.646.469-1.132.469H8.937c-.5 0-.788-.125-1.132-.469L3.47 16.195c-.355-.355-.47-.646-.47-1.132V8.937c0-.5.125-.788.469-1.132z" />
                            </g>
                        </svg>
                        <span class="nav__logo-name">EcoMetrics</span>
                        <div class="header__toggle">
                            <i class='bx bx-menu' id="header-toggle"></i>
                        </div>
                    </a>

                    <div class="nav__list">
                        <div class="nav__items">
                            <h3 class="nav__subtitle">Shortcut</h3>

                            <a href="/dashboard" class="nav__link{{ request()->is('dashboard') ? ' active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="bx nav__icon" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M4 13h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1m0 8h6c.55 0 1-.45 1-1v-4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v4c0 .55.45 1 1 1m10 0h6c.55 0 1-.45 1-1v-8c0-.55-.45-1-1-1h-6c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1M13 4v4c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1h-6c-.55 0-1 .45-1 1" />
                                </svg>
                                {{-- <i class='bx bxs-dashboard nav__icon'></i> --}}
                                <span class="nav__name">Dashboard</span>
                            </a>

                            {{-- <a href="/compare" class="nav__link {{ request()->is('compare') ? 'active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class='bx nav__icon' width="20"
                                    height="220" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M10 23v-2H5q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h5V1h2v22zm-5-5h5v-6zm9 3v-9l5 6V5h-5V3h5q.825 0 1.413.588T21 5v14q0 .825-.587 1.413T19 21z" />
                                </svg>
                                <span class="nav__name">Compare</span>
                            </a> --}}


                        </div>

                        <div class="nav__items">
                            <h3 class="nav__subtitle">Menu</h3>

                            <div class="nav__dropdown {{ request()->is('animal-population') || request()->is('animal-infected') || request()->is('animal-death')
                                ? 'show'
                                : '' }}"
                                id="animalsDropdown">
                                <a class="nav__link {{ request()->is('animal-population') || request()->is('animal-infected') || request()->is('animal-death')
                                    ? 'active'
                                    : '' }}"
                                    onclick="toggleDropdown('animalsDropdown')">
                                    <svg xmlns="/benguetlivestock/assets/images/dog.svg" class='bx nav__icon'
                                        width="20" height="20" viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M108 136a16 16 0 1 1-16-16a16 16 0 0 1 16 16m56-16a16 16 0 1 0 16 16a16 16 0 0 0-16-16m68.24 26.18a20.42 20.42 0 0 1-8.41 1.85a19.59 19.59 0 0 1-3.83-.39V184a44.05 44.05 0 0 1-44 44H80a44.05 44.05 0 0 1-44-44v-36.37a19 19 0 0 1-3.85.39a20.31 20.31 0 0 1-8.39-1.84a19.71 19.71 0 0 1-11.4-21.9l16.42-88a20 20 0 0 1 24.51-15.69l.47.13l52 15.27h44.54l52-15.27l.47-.13a20 20 0 0 1 24.51 15.72l16.42 88a19.71 19.71 0 0 1-11.46 21.87m-60-91.63L217 112.42l-12.56-67.33ZM39 112.42l44.76-57.87l-32.2-9.46ZM196 184v-59.52L146.11 60h-36.22L60 124.48V184a20 20 0 0 0 20 20h36v-7l-12.48-12.49a12 12 0 0 1 17-17L128 175l7.51-7.52a12 12 0 0 1 17 17L140 197v7h36a20 20 0 0 0 20-20" />
                                    </svg>
                                    <span class="nav__name">Animal</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="/animal-population"
                                            class="nav__dropdown-item {{ request()->is('animal-population') ? ' active' : '' }}">Population</a>
                                        <a href="/animal-infected"
                                            class="nav__dropdown-item {{ request()->is('animal-infected') ? ' active' : '' }}">Affected
                                            w/ Disease</a>
                                        <a href="/animal-death"
                                            class="nav__dropdown-item {{ request()->is('animal-death') ? ' active' : '' }}">Death</a>
                                    </div>
                                </div>
                            </div>

                            <div class="nav__dropdown {{ request()->is('fish-production-area') || request()->is('sanctuaries') ? 'show' : '' }}"
                                id="fisheryDropdown">
                                <a class="nav__link {{ request()->is('fish-production-area') || request()->is('sanctuaries') ? 'active' : '' }}"
                                    onclick="toggleDropdown('fisheryDropdown')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class='bx nav__icon' width="20"
                                        height="20" viewBox="0 0 48 48">
                                        <defs>
                                            <mask id="ipSFishOne0">
                                                <g fill="none">
                                                    <path fill="#fff" stroke="#fff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="4"
                                                        d="M44 24c-1.215 4.69-7.962 8.467-11 9c-2.43 5.97-8.962 6.533-12 6l4-6c-4.456-.427-9.975-5.046-12-7c-2.614 2.85-6.806 5.08-9 5.969C7.646 24.294 5.519 17.309 4 15c2.835 0 7.143 3.224 9 5c2.025-2.132 8.962-5.112 12-6l-4-5c7.696-.853 11.156 2.868 12 5c7.696 1.706 10.662 7.69 11 10" />
                                                    <circle cx="36" cy="24" r="2" fill="#000" />
                                                </g>
                                            </mask>
                                        </defs>
                                        <path fill="currentColor" d="M0 0h48v48H0z" mask="url(#ipSFishOne0)" />
                                    </svg>
                                    <span class="nav__name">Fishery</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="/fish-production-area"
                                            class="nav__dropdown-item {{ request()->is('fish-production-area') ? ' active' : '' }}">Production
                                            Area</a>

                                        <a href="/sanctuaries"
                                            class="nav__dropdown-item {{ request()->is('sanctuaries') ? ' active' : '' }}">Sanctuaries</a>
                                    </div>
                                </div>
                            </div>

                            <div class="nav__dropdown {{ request()->is('yearly-disease') || request()->is('veterinary-clinics') ? ' show' : '' }}"
                                id="healthDropdown">
                                <a class="nav__link {{ request()->is('yearly-disease') || request()->is('veterinary-clinics') ? ' active' : '' }}"
                                    onclick="toggleDropdown('healthDropdown')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class='bx nav__icon' width="20"
                                        height="20" viewBox="0 0 16 16">
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M7.999 1a.75.75 0 0 1 .715.521L12 11.79l1.286-4.018A.75.75 0 0 1 14 7.25h1.25a.75.75 0 0 1 0 1.5h-.703l-1.833 5.729a.75.75 0 0 1-1.428 0L8.005 4.226l-2.29 7.25a.75.75 0 0 1-1.42.03L3.031 8.03l-.07.208a.75.75 0 0 1-.711.513H.75a.75.75 0 0 1 0-1.5h.96l.578-1.737a.75.75 0 0 1 1.417-.02L4.95 8.919l2.335-7.394A.75.75 0 0 1 7.999 1"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="nav__name">Health</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="/yearly-disease"
                                            class="nav__dropdown-item {{ request()->is('yearly-disease') ? ' active' : '' }}">Yearly
                                            Diseases</a>

                                        <a href="/veterinary-clinics"
                                            class="nav__dropdown-item {{ request()->is('veterinary-clinics') ? ' active' : '' }}">Veterinary
                                            Clinics</a>
                                    </div>
                                </div>
                            </div>

                            <div class="nav__dropdown {{ request()->is('farm') || request()->is('bee-keeping') || request()->is('farm-supply') ? 'show' : '' }}"
                                id="farmDropDown">
                                <a class="nav__link {{ request()->is('farm') || request()->is('bee-keeping') || request()->is('farm-supply') ? 'active' : '' }}"
                                    onclick="toggleDropdown('farmDropDown')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class='bx nav__icon' viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 3L3 8.2V21h6l2.9-3l3.1 3h6V8.2zM7.9 20v-6l3 3zm1-7h6l-3 3zm7 7l-3-3l3-3zm-.9-9H8.8V9H15z" />
                                    </svg>
                                    <span class="nav__name">Farm</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="/farm"
                                            class="nav__dropdown-item {{ request()->is('farm') ? ' active' : '' }}">List</a>
                                        <a href="/farm-supply"
                                            class="nav__dropdown-item{{ request()->is('farm-supply') ? ' active' : '' }}">
                                            Supplies</a>
                                        <a href="/bee-keeping"
                                            class="nav__dropdown-item{{ request()->is('bee-keeping') ? ' active' : '' }}">Bee
                                            Keeping</a>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="nav__dropdown {{ request()->is('municipalities') ||
                            request()->is('barangays') ||
                            request()->is('animal-list') ||
                            request()->is('animal-type') ||
                            request()->is('fish-production') ||
                            request()->is('disease') ||
                            request()->is('farm-supply') ||
                            request()->is('population')
                                ? ' show'
                                : '' }}"
                                id="miscellaneousDropdown">
                                <a class="nav__link {{ request()->is('municipalities') ||
                                request()->is('animal-list') ||
                                request()->is('animal-type') ||
                                request()->is('fish-production') ||
                                request()->is('disease') ||
                                request()->is('farm-supply') ||
                                request()->is('barangays') ||
                                request()->is('population')
                                    ? ' active'
                                    : '' }}"
                                    onclick="toggleDropdown('miscellaneousDropdown')">
                                    <svg class='bx nav__icon'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="m18 13l.989 7.875A1 1 0 0 1 17.997 22H6.003a1 1 0 0 1-.992-1.125L6 13Zm3-3H3v2h18Zm-6.286-4.196A6.303 6.303 0 0 0 15 3.835C15 2.27 14.552 1 14 1s-1 1.27-1 2.835a7.115 7.115 0 0 0 .115 1.301a4.626 4.626 0 0 0-2.234.001A7.094 7.094 0 0 0 11 3.835C11 2.27 10.552 1 10 1S9 2.27 9 3.835a6.31 6.31 0 0 0 .283 1.971A5.11 5.11 0 0 0 7 9h2a1 1 0 0 1 2 0h2a1 1 0 0 1 2 0h2a5.11 5.11 0 0 0-2.286-3.196" />
                                    </svg>
                                    <span class="nav__name">Miscellaneous</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="/animal-list"
                                            class="nav__dropdown-item {{ request()->is('animal-list') ? ' active' : '' }}">Animals List</a>
                                        <a href="/animal-type"
                                            class="nav__dropdown-item {{ request()->is('animal-type') ? ' active' : '' }}">Animal Types</a>
                                        <a href="/fish-production"
                                            class="nav__dropdown-item {{ request()->is('fish-production') ? ' active' : '' }}">Fish
                                            Production
                                            Types</a>
                                        <a href="/disease"
                                            class="nav__dropdown-item {{ request()->is('disease') ? ' active' : '' }}">Animal Diseases</a>
                                        <a href="/farm-supply"
                                            class="nav__dropdown-item{{ request()->is('farm-supply') ? ' active' : '' }}">Farm Supplies</a>
                                        <a href="/municipalities"
                                            class="nav__dropdown-item {{ request()->is('municipalities') ? ' active' : '' }}">Municipalities</a>
                                        <a href="/barangays"
                                            class="nav__dropdown-item {{ request()->is('barangays') ? ' active' : '' }}">Barangays</a>
                                        <a href="/population"
                                            class="nav__dropdown-item {{ request()->is('population') ? ' active' : '' }}">Population (Human)</a>
                                    </div>
                                </div>
                            </div> --}}




                        </div>
                    </div>
                </div>
            </nav>
        </div>



    </div>

    <div id="floating-btn" onclick="goToTop()"
        class="fixed bottom-8 right-8 bg-green-500 hover:bg-green-700 text-white dark:text-gray-300 font-bold py-2 px-4 rounded-full hidden cursor-pointer z-40">
        <button class="w-6 h-6 flex justify-center items-center"> <!-- Added width and height classes -->
            <svg class="h-6 w-6 fill-current"> <!-- Adjusted the size of the SVG -->
                <path fill="currentColor" d="M5 15h4v6h6v-6h4l-7-8zM4 3h16v2H4z" />
            </svg>
        </button>
    </div>



    <script>
        // Function to toggle between light and dark mode
        function toggleDarkMode(isDarkMode) {
            const root = document.documentElement;

            if (isDarkMode) {
                // Toggle to dark mode
                root.style.setProperty('--first-color', '#00A86B');
                root.style.setProperty('--first-color-light', '#2B313F');
                root.style.setProperty('--title-color', '#F0FFF0');
                root.style.setProperty('--text-color', '#E2E8F0');
                root.style.setProperty('--text-color-light', '#CBD5E0');
                root.style.setProperty('--body-color', '#1A202C');
                root.style.setProperty('--container-color', '#2D3748');
                root.style.setProperty('--nav-dropdown-collapse', '#1f2937');

                // Add more properties for other variables if needed
            } else {
                // Toggle to light mode
                root.style.setProperty('--first-color', '#008000');
                root.style.setProperty('--first-color-light', '#F3F4F6');
                root.style.setProperty('--title-color', '#4F0A09');
                root.style.setProperty('--text-color', '#1F2937');
                root.style.setProperty('--text-color-light', '#A5A1AA');
                root.style.setProperty('--body-color', '#F0FFF0');
                root.style.setProperty('--container-color', '#FFFFFF');
                root.style.setProperty('--nav-dropdown-collapse', '#f0fdf4');
                // Add more properties for other variables if needed
            }

            // Toggle dark mode class on the body element
            document.body.classList.toggle('dark', isDarkMode);

            // Save the user's choice in localStorage
            localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
        }
    </script>

    <script>
        // Show/hide button based on scroll position
        window.onscroll = function() {
            var floatingBtn = document.getElementById('floating-btn');
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                floatingBtn.classList.remove('hidden');
            } else {
                floatingBtn.classList.add('hidden');
            }
        };

        // Scroll to top function with transition effect
        function goToTop() {
            const duration = 500; // Set the duration of the scroll animation in milliseconds
            const start = performance.now();
            const from = window.scrollY || document.documentElement.scrollTop;

            function scrollStep(timestamp) {
                const elapsed = timestamp - start;
                window.scrollTo(0, easeInOutCubic(elapsed, from, -from, duration));

                if (elapsed < duration) {
                    requestAnimationFrame(scrollStep);
                }
            }

            function easeInOutCubic(t, b, c, d) {
                t /= d / 2;
                if (t < 1) return c / 2 * t * t * t + b;
                t -= 2;
                return c / 2 * (t * t * t + 2) + b;
            }

            requestAnimationFrame(scrollStep);
        }
    </script>


    <!-- Save State of Page Script -->
    {{-- <script src="./assets/js/save-state.js"></script> --}}
    <!-- Sidebar Responsive Script -->
    {{-- <script src="/assets/js/sidebar.js"></script> --}}
    <script src="{{ asset('./assets/js/sidebar.js') }}"></script>
    <!-- Dropdown Script -->
    {{-- <script src="./assets/js/dropdown.js"></script> --}}
</body>

</html>
