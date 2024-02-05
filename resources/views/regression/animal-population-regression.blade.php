<div class="z-10 w-full flex justify-center items-center">
    <div
        class="w-full sm:px-6 md:absolute md:left-1 md:top-1/2 md:mt-0 md:w-2/5 md:-translate-y-3/4 md:px-0 lg:w-2/6 xl:w-2/6 xl:pl-24">
        <div class="rounded-lg !border-opacity-0 bg-opacity-40 backdrop-blur-lg backdrop-filter sm:space-y-5">


            <div
                class="w-full bg-stone-100 dark:bg-gray-900 border border-gray-200 rounded-sm shadow-lg dark:border-gray-700">
                <div class="sm:hidden">
                    <label for="tabs" class="sr-only">Select tab</label>
                    <select id="tabs"
                        class="bg-gray-50 border-gray-200 text-gray-900 text-sm rounded-t-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Statistics</option>
                        <option>Regression</option>
                    </select>
                </div>
                <ul class="hidden font-bold shadow text-base font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-sm sm:flex dark:divide-gray-600 dark:text-gray-400 rtl:divide-x-reverse"
                    id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                    <li class="w-full">
                        <button id="stats-tab" data-tabs-target="#stats" type="button" role="tab"
                            aria-controls="stats" aria-selected="true"
                            class="inline-block w-full py-4 rounded-ss-lg hover:bg-gray-100 focus:outline-none dark:hover:bg-gray-600">Statistics</button>
                    </li>
                    <li class="w-full">
                        <button id="regression-tab" data-tabs-target="#regression" type="button" role="tab"
                            aria-controls="regression" aria-selected="false"
                            class="inline-block w-full py-4 rounded-ss-lg hover:bg-gray-100 focus:outline-none dark:hover:bg-gray-600">Prediction</button>
                    </li>
                </ul>
                
                <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
                    <div class="hidden p-2 md:p-4" id="stats" role="tabpanel" aria-labelledby="stats-tab">
                        <dl
                            class="grid max-w-screen-xl grid-cols-2 gap-4 p-2 mx-auto text-gray-900 sm:grid-cols-2 xl:grid-cols-2 dark:text-white sm:p-8">
                            <div class="flex flex-col items-center text-center">
                                <dt class="mb-2 text-4xl text-red-600 font-extrabold justify-center">{{ $latestYear }}
                                </dt>
                                <dd class="text-gray-500 dark:text-gray-400 justify-center">Year</dd>
                            </div>

                            <div class="flex flex-col items-right text-center justify-center">
                                <dt class="mb-2 text-5xl text-green-600 font-extrabold">{{ $latestPopulation }}</dt>
                                <dd class="text-gray-500 dark:text-gray-400">Animal Population</dd>
                            </div>
                        </dl>
                    </div>

                    <div class="hidden p-2 rounded-lg md:p-4" id="regression" role="tabpanel"
                        aria-labelledby="regression-tab">
                        <dl
                            class="grid max-w-screen-xl grid-cols-2 gap-4 p-2 mx-auto text-gray-900 sm:grid-cols-2 xl:grid-cols-2 dark:text-white sm:p-8">
                            <div class="flex flex-col items-center text-center">
                                <dt class="mb-2 text-4xl text-red-600 font-extrabold">{{ $predictedYear }}</dt>
                                <dd class="text-gray-500 dark:text-gray-400">Year</dd>
                            </div>

                            <div class="flex flex-col items-right text-center">
                                <dt class="mb-2 text-5xl text-green-600 font-extrabold">{{ $predictedPopulation }}</dt>
                                <dd class="text-gray-500 dark:text-gray-400">Animal Population</dd>
                            </div>
                        </dl>
                    </div>

                    <div class="flex justify-end pr-5 pb-5">
                        <a onclick="scrollToSecondPage()"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer">
                            Know more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>






        </div>
    </div>
</div>
