<div class="tab-content hidden rounded-b-lg !border-opacity-0 bg-white dark:bg-gray-900 bg-opacity-60 dark:bg-opacity-60 shadow-base backdrop-blur-lg backdrop-filter sm:space-y-5 sm:p-8 md:px-10 xl:py-5"
    id="summary" role="tabpanel" aria-labelledby="summary-tab">
    <!-- Component Code -->
    <div class="relative">
        <div class="max-w-3xl rounded overflow-hidden flex flex-col mx-auto text-center pb-5">
            <div class="flex flex-1 w-full flex-col items-center justify-center text-center px-4 py-16 dark:to-gray-800">
                <h1
                    class="mx-auto max-w-4xl font-display text-5xl font-bold tracking-normal text-white-300 dark:text-gray-300 sm:text-7xl">
                    Animal Population
                    <span class="relative whitespace-nowrap text-white-600 dark:text-gray-300">and Agriculture</span>
                    <span class="relative whitespace-nowrap text-red-500 dark:text-orange-300">
                        {{-- <svg aria-hidden="true" viewBox="0 0 418 42"
                            class="absolute top-2/3 left-0 h-[0.58em] w-full fill-orange-500 dark:fill-orange-300/60"
                            preserveAspectRatio="none"> --}}
                        <path
                            d="M203.371.916c-26.013-2.078-76.686 1.963-124.73 9.946L67.3 12.749C35.421 18.062 18.2 21.766 6.004 25.934 1.244 27.561.828 27.778.874 28.61c.07 1.214.828 1.121 9.595-1.176 9.072-2.377 17.15-3.92 39.246-7.496C123.565 7.986 157.869 4.492 195.942 5.046c7.461.108 19.25 1.696 19.17 2.582-.107 1.183-7.874 4.31-25.75 10.366-21.992 7.45-35.43 12.534-36.701 13.884-2.173 2.308-.202 4.407 4.442 4.734 2.654.187 3.263.157 15.593-.780 35.401-2.686 57.944-3.488 88.365-3.143 46.327.526 75.721 2.23 130.788 7.584 19.787 1.924 20.814 1.98 24.557 1.332l.066-.011c1.201-.203 1.53-1.825.399-2.335-2.911-1.31-4.893-1.604-22.048-3.261-57.509-5.556-87.871-7.36-132.059-7.842-23.239-.254-33.617-.116-50.627.674-11.629.540-42.371 2.494-46.696 2.967-2.359.259 8.133-3.625 26.504-9.810 23.239-7.825 27.934-10.149 28.304-14.005 .417-4.348-3.529-6-16.878-7.066Z">
                        </path>
                        </svg>
                        <span class="relative">Summary Report</span>
                    </span>
                </h1>
                <h2 class="mx-auto mt-6 max-w-xl text sm:text-white-400 text-white-500 dark:text-gray-300 leading-7">
                    Welcome to the Benguet Animal Population and Agriculture Summary Report! This automated report
                    provides a concise overview of key data related to animal population and agriculture in the Benguet
                    province. The
                    purpose of this report is to offer quick access to summarized information,
                    without the need to navigate through extensive datasets.
                </h2>
                <a class="bg-orange-600 dark:bg-gray-950 rounded-xl text-white dark:text-gray-300 font-medium px-4 py-3 sm:mt-10 mt-8 hover:bg-orange-500 dark:hover:bg-gray-600 transition"
                    onclick="scrollToStart()">Get started</a>
            </div>
            <hr/>

        </div>

        <div id="startPage" class="max-w-3xl mx-auto">
            <div class="mt-3 rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
                <div class="">
                    <h3 class="text-2xl font-bold my-5">Year: {{ $selectedYear }}</h3>

                    <p class="text-base leading-8 my-5">
                        Beginning our report, we'll be examining the Poultry Population. Let's jump in and uncover the
                        facts and figures behind this important aspect of agriculture.
                    </p>

                    @foreach ($animalTypes as $animalType)
                        @php
                            $percentage = 0; // Default value in case of division by zero
                            if ($overallAnimalPopulationCount !== 0) {
                                $percentage = ($animalPopulationData[$animalType->type] / $overallAnimalPopulationCount) * 100;
                            }
                        @endphp

                        <div class="flex items-center mb-3">
                            <p class="text-base font-normal tracking-tight text-gray-700 dark:text-gray-400">
                                {{ $animalType->type }}:
                            </p>

                            <p
                                class="text-lg md:text-xl lg:text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                                &#160;
                                @if (isset($animalPopulationData[$animalType->type]))
                                    {{ $animalPopulationData[$animalType->type] }}
                                @else
                                    N/A
                                @endif,
                            </p>
                            <p
                                class="text-sm md:text-base lg:text-sm tracking-tight text-gray-900 dark:text-white ml-2">
                                <!-- Added margin for separation -->
                                {{ round($percentage, 2) }}% of overall Poultry Population
                            </p>

                        </div>
                    @endforeach

                </div>


                <blockquote class="text-md italic leading-8 my-5 p-5 text-indigo-600 font-semibold">
                    The poultry population is a significant component of the agricultural landscape in Benguet. It plays
                    a crucial role in providing a sustainable source of protein and contributing to the local economy.
                    As of the selected year, the population distribution across different poultry types is presented
                    above.
                </blockquote>

                <p class="text-base leading-8 my-5">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>

                <div>
                    <a href="#"
                        class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">#Election</a>,
                    <a href="#"
                        class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">#people</a>,
                    <a href="#"
                        class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">#Election2020</a>,
                    <a href="#"
                        class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">#trump</a>,
                    <a href="#"
                        class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">#Joe</a>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
