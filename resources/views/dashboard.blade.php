<title>Dashboard</title>
<x-app-layout>
    <div class="max-w-7xl mx-auto" style="position:relative; z-index:30;">
        <div class="w-full">
            <div class="grid grid-cols-6 gap-3 pt-8 justify-center">
                <div
                    class="flex flex-col space-y-1 col-span-6 lg:col-span-2 text-center items-center pb-6 px-10 lg:px-0">
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white">Dashboard</h1>
                    <p class="text-sm font-normal text-gray-700 dark:text-gray-300">Benguet Socio-Economic Profile</p>
                </div>

                <!-- Tabs for larger screens -->
                <ul class="col-span-3 lg:col-span-2 px-10 lg:px-0 hidden sm:flex text-sm font-medium text-center items-end justify-end text-gray-500 divide-x 
                divide-gray-100 dark:divide-gray-950 rounded-t-lg"
                    id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                    <li class="w-full relative">
                        <button id="overview-tab" data-tooltip-target="tooltip-overview" data-tabs-target="#overview"
                            type="button" role="tab" aria-controls="overview" aria-selected="true"
                            class="shadow text-lg bg-gray-100 dark:bg-gray-800 font-extrabold hover:text-gray-500 flex items-center justify-center rounded-tl-lg w-full p-2 hover:bg-gray-200 focus:outline-none dark:hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                <path fill="currentColor"
                                    d="M3 19q-.825 0-1.412-.587T1 17V7q0-.825.588-1.412T3 5h10q.825 0 1.413.588T15 7v10q0 .825-.587 1.413T13 19zm14 0V5h2v14zm4 0V5h2v14z" />
                            </svg>

                            <div id="tooltip-overview" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Overview ({{ $selectedYear }})
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>

                        </button>
                    </li>

                    <li class="w-full relative">
                        <button id="compare-tab" data-tooltip-target="tooltip-compare" data-tabs-target="#compare"
                            type="button" role="tab" aria-controls="compare" aria-selected="false"
                            class="shadow text-lg bg-gray-100 dark:bg-gray-800 font-extrabold hover:text-gray-500 flex items-center justify-center w-full p-2 hover:bg-gray-200 focus:outline-none dark:hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class='w-6 h-6' viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M10 23v-2H5q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h5V1h2v22zm-5-5h5v-6zm9 3v-9l5 6V5h-5V3h5q.825 0 1.413.588T21 5v14q0 .825-.587 1.413T19 21z" />
                            </svg>
                            <div id="tooltip-compare" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Density and Ratio
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </button>
                    </li>

                    <li class="w-full relative">
                        <button id="trend-tab" data-tooltip-target="tooltip-trend" data-tabs-target="#trend"
                            type="button" role="tab" aria-controls="trend" aria-selected="false"
                            class="shadow text-lg bg-gray-100 dark:bg-gray-800 font-extrabold hover:text-gray-500 flex items-center justify-center w-full p-2 hover:bg-gray-200 focus:outline-none dark:hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="w-6 h-6">
                                <path fill="currentColor"
                                    d="M244 56v64a12 12 0 0 1-24 0V85l-75.51 75.52a12 12 0 0 1-17 0L96 129l-63.51 63.49a12 12 0 0 1-17-17l72-72a12 12 0 0 1 17 0L136 135l67-67h-35a12 12 0 0 1 0-24h64a12 12 0 0 1 12 12" />
                            </svg>
                            <div id="tooltip-trend" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Trends
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </button>
                    </li>

                    <li class="w-full relative">
                        <button id="summary-tab" data-tooltip-target="tooltip-summary" data-tabs-target="#summary"
                            type="button" role="tab" aria-controls="summary" aria-selected="false"
                            class="shadow text-lg bg-gray-100 dark:bg-gray-800 font-extrabold hover:text-gray-500 flex items-center justify-center w-full p-2 hover:bg-gray-200 focus:outline-none dark:hover:bg-gray-700 rounded-tr-lg ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                <path fill="currentColor"
                                    d="m20 8l-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM9 19H7v-9h2zm4 0h-2v-6h2zm4 0h-2v-3h2zM14 9h-1V4l5 5z" />
                            </svg>
                            <div id="tooltip-summary" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Summary Report
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </button>
                    </li>
                </ul>

                {{-- Year Dropdown Selection --}}
                <div class="flex text-center align-center justify-center col-span-6 md:col-span-3 lg:col-span-2">
                    <form method="GET" action="{{ route('dashboard') }}" class="flex items-center justify-between">
                        <svg data-tooltip-target="tooltip-help" class="w-4 h-4 mr-3 text-gray-500 dark:text-gray-400"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M11.95 18q.525 0 .888-.363t.362-.887q0-.525-.362-.888t-.888-.362q-.525 0-.887.363t-.363.887q0 .525.363.888t.887.362m-.9-3.85h1.85q0-.825.188-1.3t1.062-1.3q.65-.65 1.025-1.238T15.55 8.9q0-1.4-1.025-2.15T12.1 6q-1.425 0-2.312.75T8.55 8.55l1.65.65q.125-.45.563-.975T12.1 7.7q.8 0 1.2.438t.4.962q0 .5-.3.938t-.75.812q-1.1.975-1.35 1.475t-.25 1.825M12 22q-2.075 0-3.9-.787t-3.175-2.138q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20m0-8" />
                        </svg>
                        <div id="tooltip-help" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-xs text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Choose a year to view corresponding dashboard data. </br>The dashboard content will update
                            accordingly based on your selection.
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <div class="relative max-w-sm flex-grow pointer">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <select name="year" id="year"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                focus:ring-green-500 focus:border-green-500 block w-full pl-10 pr-4 py-2.5 
                                dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                                dark:focus:ring-custom-orange dark:focus:border-custom-orange cursor-pointer">
                                @foreach ($years as $year)
                                <option value="{{ $year }}" {{ (empty($selectedYear) && $year == $recentYear) || $year == $selectedYear ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-1 pointer-events-none">
                                <svg class="w-6 h-6 text-gray-500 dark:text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="m7 10l5 5l5-5z" />
                                </svg>
                            </div>
                        </div>
                        <button type="submit"
                            class="ml-4 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 focus:outline-none focus:bg-green-500">

                            <p class="hidden lg:block">View Data</p>
                            <svg class="w-4 h-4 block lg:hidden"xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 32 32">
                                <circle cx="16" cy="16" r="4" fill="currentColor" />
                                <path fill="currentColor"
                                    d="M30.94 15.66A16.69 16.69 0 0 0 16 5A16.69 16.69 0 0 0 1.06 15.66a1 1 0 0 0 0 .68A16.69 16.69 0 0 0 16 27a16.69 16.69 0 0 0 14.94-10.66a1 1 0 0 0 0-.68M16 22.5a6.5 6.5 0 1 1 6.5-6.5a6.51 6.51 0 0 1-6.5 6.5" />
                            </svg>
                        </button>


                    </form>
                </div>


            </div>
            <!-- Dropdown for small screens -->
            <div class="sm:hidden px-10">
                <label for="tabs" class="sr-only">Select tab</label>
                <select id="tabs"
                    class="block w-full mb-5 bg-white border border-gray-300 dark:border-gray-950 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-900 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 shadow-lg">
                    <option value="#overview">Overview</option>
                    <option value="#compare">Density and Ratio</option>
                    <option value="#trend">Trends</option>
                    <option value="#summary">Summary Report</option>
                </select>
            </div>

            <!-- Tab content -->
            <div id="fullWidthTabContent" class="border rounded-lg dark:border-gray-950 mx-5 lg:mx-0">
                @include('dashboard-components.overview-tab')
                @include('dashboard-components.compare-tab')
                @include('dashboard-components.report-tab')
                @include('dashboard-components.trend-tab')
            </div>
        </div>
    </div>


</x-app-layout>

<script src="{{ asset('assets/js/dashboard.js') }}"></script>

{{-- <script>
    // 
    // Tabs JS
    document.addEventListener('DOMContentLoaded', function() {
        var tabs = document.querySelectorAll('[role="tab"]');

        tabs.forEach(function(tab) {
            tab.addEventListener('click', function() {
                var selectedTabId = this.getAttribute('data-tabs-target');
                var tabContentToShow = document.querySelector(selectedTabId);

                if (tabContentToShow) {
                    // Hide all tab contents
                    var allTabContents = document.querySelectorAll('.tab-content');
                    allTabContents.forEach(function(tab) {
                        tab.style.display = 'none';
                    });

                    // Show selected tab content
                    tabContentToShow.style.display = 'block';

                    // Remove border bottom from all tab buttons
                    tabs.forEach(function(tab) {
                        tab.classList.remove('border-b-4', 'border-green-500',
                            'dark:border-custom-orange', 'dark:text-white',
                            'hover:bg-white', 'dark:hover:bg-gray-900',
                            'hover:text-green-500', 'dark:hover:text-white',
                            'text-green-500', 'shadow-2xl', 'bg-white',
                            'dark:bg-gray-900');
                    });

                    // Add border bottom to the selected tab button
                    this.classList.add('border-b-4', 'border-green-500',
                        'dark:border-custom-orange', 'dark:text-white', 'hover:bg-white',
                        'dark:hover:bg-gray-900', 'hover:text-green-500',
                        'dark:hover:text-white',
                        'text-green-500', 'shadow-2xl', 'bg-white', 'dark:bg-gray-900');
                }
            });
        });

        // Initially select the first tab
        tabs[0].click();

        var tabsSelect = document.getElementById('tabs');

        tabsSelect.addEventListener('change', function() {
            var selectedTabId = tabsSelect.value;
            var tabContentToShow = document.querySelector(selectedTabId);
            if (tabContentToShow) {
                // Hide all tab contents
                var allTabContents = document.querySelectorAll('.tab-content');
                allTabContents.forEach(function(tab) {
                    tab.style.display = 'none';
                });

                // Show selected tab content
                tabContentToShow.style.display = 'block';
            }
        });
    });

    // 
    // Save state of the tabs when reloaded
    document.addEventListener('DOMContentLoaded', function() {
        // Function to handle tab button click
        function handleTabClick(event) {
            var selectedTabId = event.currentTarget.getAttribute('data-tabs-target');
            var tabContentToShow = document.querySelector(selectedTabId);

            if (tabContentToShow) {
                // Hide all tab contents
                var allTabContents = document.querySelectorAll('.tab-content');
                allTabContents.forEach(function(tab) {
                    tab.style.display = 'none';
                });

                // Show selected tab content
                tabContentToShow.style.display = 'block';

                // Remove selected state from all tab buttons
                var allTabButtons = document.querySelectorAll('[role="tab"]');
                allTabButtons.forEach(function(button) {
                    button.setAttribute('aria-selected', 'false');
                });

                // Add selected state to the clicked tab button
                event.currentTarget.setAttribute('aria-selected', 'true');

                // Store the ID of the selected tab in localStorage
                localStorage.setItem('selectedTab', selectedTabId);
            }
        }

        // Get all tab buttons
        var tabButtons = document.querySelectorAll('[role="tab"]');

        // Add click event listener to each tab button
        tabButtons.forEach(function(button) {
            button.addEventListener('click', handleTabClick);
        });

        // Retrieve the ID of the selected tab from localStorage
        var selectedTabId = localStorage.getItem('selectedTab');

        // If there's a stored selected tab, click on it to show its content
        if (selectedTabId) {
            var selectedTabButton = document.querySelector('[data-tabs-target="' + selectedTabId + '"]');
            if (selectedTabButton) {
                selectedTabButton.click();
            }
        }
    });

    // 
    // Year dropdown save js
    // Function to save selected year to local storage
    function saveSelectedYear() {
        var yearSelect = document.getElementById('year');
        var selectedYear = yearSelect.value;
        localStorage.setItem('selectedYear', selectedYear);
    }

    // Function to load selected year from local storage
    function loadSelectedYear() {
        var selectedYear = localStorage.getItem('selectedYear');
        if (selectedYear) {
            document.getElementById('year').value = selectedYear;
        }
    }

    // Function to set default value to the latest year
    function setDefaultYear() {
        var yearSelect = document.getElementById('year');
        var latestYearOption = yearSelect.lastElementChild;
        yearSelect.value = latestYearOption.value; // Set default value to the latest year option
    }

    // Load selected year when the page loads
    window.onload = function() {
        setDefaultYear(); // Set default value to the latest year
        loadSelectedYear(); // Load selected year from local storage
    };

    // Save selected year when it changes
    document.getElementById('year').addEventListener('change', function() {
        saveSelectedYear();
    });


    // 
    // Carousel js
    document.addEventListener('DOMContentLoaded', function() {
        const carouselItems = document.querySelectorAll('[data-carousel-item]');
        const prevButton = document.querySelector('[data-carousel-prev]');
        const nextButton = document.querySelector('[data-carousel-next]');
        const slideIndicators = document.querySelectorAll('[data-carousel-slide-to]');
        let currentSlide = 0;

        // Function to show the current slide and hide others
        function showSlide(slideIndex) {
            carouselItems.forEach((item, index) => {
                if (index === slideIndex) {
                    item.classList.add('block');
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                    item.classList.remove('block');
                }
            });
            updateActiveIndicator(slideIndex);
        }

        // Function to handle previous slide
        function prevSlide() {
            currentSlide = (currentSlide === 0) ? carouselItems.length - 1 : currentSlide - 1;
            showSlide(currentSlide);
        }

        // Function to handle next slide
        function nextSlide() {
            currentSlide = (currentSlide === carouselItems.length - 1) ? 0 : currentSlide + 1;
            showSlide(currentSlide);
        }

        // Function to update active indicator with animation
        function updateActiveIndicator(index) {
            slideIndicators.forEach((indicator, i) => {
                if (i === index) {
                    indicator.classList.add('bg-blue-600', 'transition', 'duration-300');
                    indicator.classList.remove('bg-gray-300');
                } else {
                    indicator.classList.remove('bg-blue-600');
                    indicator.classList.add('bg-gray-300', 'transition', 'duration-300');
                }
            });
        }

        // Event listener for previous button
        prevButton.addEventListener('click', prevSlide);

        // Event listener for next button
        nextButton.addEventListener('click', nextSlide);

        // Event listeners for slide indicators
        slideIndicators.forEach((indicator, index) => {
            indicator.addEventListener('click', function() {
                currentSlide = index;
                showSlide(currentSlide);
            });
        });

        // Show initial slide
        showSlide(currentSlide);
    });
</script> --}}
