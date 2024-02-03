<div class="w-full bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
    <div class="sm:hidden">
        <label for="tabs" class="sr-only">Select tab</label>
        <select id="tabs"
            class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 text-sm rounded-t-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option>Linear Regression</option>
            <option>Latest Data</option>
        </select>
    </div>
    <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400 rtl:divide-x-reverse"
        id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
        <li class="w-full">
            <button id="overall-tab" data-tabs-target="#overall" type="button" role="tab" aria-controls="overall"
                aria-selected="true"
                class="inline-block w-full p-4 bg-gray-100 here focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Latest
                Data</button>
        </li>
        <li class="w-full">
            <button id="linear-regression-tab" data-tabs-target="#linear-regression" type="button" role="tab"
                aria-controls="linear-regression" aria-selected="false"
                class="inline-block w-full p-4 rounded-ss-lg bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Linear
                Regression</button>
        </li>
    </ul>

    <div id="fullWidthTabContent"
        class="border-t border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 rounded-b-lg">

        <!-- Latest Year and Population Section -->
        <div class="hidden p-4 md:p-8" id="overall" role="tabpanel" aria-labelledby="overall-tab">
            <div class="grid grid-cols-1 gap-8 text-gray-800 dark:text-white sm:grid-cols-2 xl:grid-cols-2">

                <!-- Latest Year Card -->
                <div
                    class="card text-center bg-white dark:bg-gray-800 p-6 rounded-md shadow-md hover:shadow-lg transform hover:scale-105 transition-transform duration-300 cursor-pointer">
                    <span class="custom-icon-svg w-12">
                        <svg class="fill-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M19 19H5V8h14m-3-7v2H8V1H6v2H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-1V1m-1 11h-5v5h5z" />
                        </svg>
                    </span>
                    <dt class="mb-2 text-4xl font-extrabold text-blue-600 dark:text-blue-400">{{ $latestYear }}</dt>
                    <dd class="text-gray-500 dark:text-gray-400">Year</dd>
                </div>

                <div
                    class="card text-center bg-white dark:bg-gray-800 p-7 rounded-md shadow-md hover:shadow-lg transform hover:scale-105 transition-transform duration-300 cursor-pointer">
                    <span class="custom-icon-svg w-12 fill-purple-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M6 13H2c-.6 0-1 .4-1 1v8c0 .6.4 1 1 1h4c.6 0 1-.4 1-1v-8c0-.6-.4-1-1-1m16-4h-4c-.6 0-1 .4-1 1v12c0 .6.4 1 1 1h4c.6 0 1-.4 1-1V10c0-.6-.4-1-1-1m-8-8h-4c-.6 0-1 .4-1 1v20c0 .6.4 1 1 1h4c.6 0 1-.4 1-1V2c0-.6-.4-1-1-1" />
                        </svg>
                    </span>
                    <dt class="mb-2 mt-1 text-3xl font-extrabold text-rose-500 dark:text-red-400">{{ $latestPopulation }}
                    </dt>
                    <dd class="text-gray-500 dark:text-gray-400">Latest Animal Population</dd>
                </div>


            </div>

            <!-- Insights Overview Section -->
            <div class="mt-5 text-center">
                <h2 class="text-3xl font-bold text-gray-600 dark:text-gray-300 mb-4">Summary Report</h2>
                <p class="text-base text-gray-600 dark:text-gray-400">
                    Explore the data for the year {{ $latestYear }} and discover a total animal population of
                    {{ $latestPopulation }} across all municipalities.
                </p>
            </div>

        </div>

        <!-- Linear Regression Section -->
        <div class="hidden p-4 md:p-8 bg-grey-50 dark:bg-gray-900" id="linear-regression" role="tabpanel"
            aria-labelledby="linear-regression-tab">
            <div class="grid grid-cols-1 gap-8 text-gray-800 dark:text-white sm:grid-cols-2 xl:grid-cols-2">

                <!-- Latest Year Card -->
                <div
                    class="card text-center bg-white dark:bg-gray-800 p-4 rounded-md shadow-md hover:shadow-lg transform hover:scale-105 transition-transform duration-300 cursor-pointer">
                    <span class="custom-icon-svg w-12"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M19 19H5V8h14m-3-7v2H8V1H6v2H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-1V1m-1 11h-5v5h5z" />
                        </svg></span>
                    <dt class="mb-2 text-4xl font-extrabold text-blue-600 dark:text-blue-400">{{ $predictedYear }}</dt>
                    <dd class="text-gray-500 dark:text-gray-400">Next Year
                    </dd>
                </div>

                <div
                    class="card text-center bg-white dark:bg-gray-800 p-4 rounded-md shadow-md hover:shadow-lg transform hover:scale-105 transition-transform duration-300 cursor-pointer">
                    <span class="custom-icon-svg w-12 h-12 py-4"><svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 16 16">
                            <path fill="currentColor"
                                d="M9 11H6c0-3 1.6-4 2.7-4.6c.4-.2.7-.4.9-.6c.5-.5.3-1.2.2-1.4c-.3-.7-1-1.4-2.3-1.4C5.4 3 5 4.9 5 5.3l-3-.4C2.2 3.2 3.7 0 7.5 0c2.3 0 4.3 1.3 5.1 3.2c.7 1.7.4 3.5-.8 4.7c-.5.5-1.1.8-1.6 1.1c-.9.5-1.2 1-1.2 2m.5 3a2 2 0 1 1-3.999.001A2 2 0 0 1 9.5 14" />
                        </svg></span>
                    <dt class="mb-2 text-2xl font-extrabold text-green-600 dark:text-green-400 ">
                        {{ $predictedPopulation }}
                    </dt>
                    <dd class="text-gray-500 dark:text-gray-400">Predicted Animal Population</dd>
                </div>

            </div>

            <!-- Insights Overview Section -->
            <div class="mt-5 text-center">
                <h2 class="text-3xl font-bold text-gray-600 dark:text-gray-300 mb-4">Insights Overview</h2>
                <p class="text-base text-gray-600 dark:text-gray-400">
                    For the next year ({{ $regressionData['predictedYear'] }}), the predicted animal population
                    is estimated to be {{ $regressionData['predictedPopulation'] }}.
            </div>
        </div>
    </div>
</div>
