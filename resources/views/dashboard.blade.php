<title>Dashboard</title>
<x-app-layout>
    <div class="max-w-7xl mx-auto p-3" style="position:relative; z-index:30;">
        <div class="w-full">
            <div class="flex flex-col space-y-1 pt-3 pb-4">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white">Dashboard</h1>
                <p class="text-sm font-normal text-gray-700 dark:text-gray-300">Benguet Animals and Agriculture</p>
            </div>
            <!-- Dropdown for small screens -->
            <div class="sm:hidden">
                <label for="tabs" class="sr-only">Select tab</label>
                <select id="tabs"
                    class="block w-full bg-gray-40 border border-gray-200 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="#overview">Overview</option>
                    <option value="#trend">Trends</option>
                    <option value="#summary">Summary Report</option>
                </select>
            </div>
            <!-- Tabs for larger screens -->
            <ul class="hidden sm:flex text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-t-lg !border-opacity-0 bg-gray-300 dark:bg-gray-900 bg-opacity-40 shadow-lg backdrop-blur-lg backdrop-filter   "
                id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                <li class="w-full relative">
                    <button id="overview-tab" data-tabs-target="#overview" type="button" role="tab"
                        aria-controls="overview" aria-selected="true"
                        class="font-serif font-black inline-block w-full p-4 rounded-ss-lg hover:bg-gray-300 focus:outline-none dark:hover:bg-gray-700">
                        Overview (Recent Year: {{$recentYear}})
                    </button>
                </li>
                <li class="w-full relative">
                    <button id="trend-tab" data-tabs-target="#trend" type="button" role="tab" aria-controls="trend"
                        aria-selected="false"
                        class="font-serif font-extrabold inline-block w-full p-4 hover:bg-gray-300 focus:outline-none dark:hover:bg-gray-600">
                        Trends
                    </button>
                </li>
                <li class="w-full relative">
                    <button id="summary-tab" data-tabs-target="#summary" type="button" role="tab" aria-controls="summary"
                        aria-selected="false"
                        class="font-serif font-extrabold inline-block w-full p-4 rounded-se-lg hover:bg-gray-300 focus:outline-none dark:hover:bg-gray-600">
                        Summary Report
                    </button>
                </li>
            </ul>
            <!-- Tab content -->
            <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
                @include('dashboard-components.first-tab')
                @include('dashboard-components.second-tab')
                @include('dashboard-components.third-tab')
            </div>
        </div>
    </div>


</x-app-layout>

<script>
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
                        tab.classList.remove('border-b-2', 'border-blue-500');
                    });

                    // Add border bottom to the selected tab button
                    this.classList.add('border-b-2', 'border-blue-500');
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
</script>
