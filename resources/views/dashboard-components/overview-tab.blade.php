<div class="tab-content hidden rounded-lg !border-opacity-0 bg-white dark:bg-gray-900 bg-opacity-60 dark:bg-opacity-60 shadow-lg backdrop-blur-lg backdrop-filter sm:space-y-5 sm:p-8 md:px-10 xl:py-5"
    id="overview" role="tabpanel" aria-labelledby="overview-tab">

    {{-- 4 Cards --}}
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-3 justify-center items-center">
        <!-- Animal Population -->
        <div class="block w-full sm:max-w-sm p-3 bg-white dark:bg-gray-900 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 shadow border border-gray-200 dark:border-gray-950">
            <div>
                <div class="flex justify-center items-center">
                    <p class="pl-2 font-normal tracking-tight text-gray-700 dark:text-gray-400">
                        Animal Population</p>
                </div>
                <div class="flex justify-center items-center">
                    <p class="pl-2 pt-1 text-lg md:text-xl lg:text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $totalAnimalCount ?? 'N/A' }}</p>
                </div>

                <div class="flex justify-between items-center pt-1">
                    @if (isset($totalAnimalCountLastYear))
                        @php
                            $animalCountDifference = $totalAnimalCount - $totalAnimalCountLastYear;
                            $animalCountDifferencePercentage = $totalAnimalCountLastYear != 0
                                ? ($animalCountDifference / $totalAnimalCountLastYear) * 100
                                : 0;
                            $colorClass = $animalCountDifference > 0
                                ? 'green'
                                : ($animalCountDifference < 0 ? 'red' : 'gray');
                        @endphp
                        <p class="pl-2 text-sm md:text-base lg:text-sm tracking-tight dark:text-white">
                            vs. Last Year: {{ $animalCountDifference > 0 ? '+' : '' }}{{ $animalCountDifference }}
                        </p>
                        <p class="font-bold text-{{ $colorClass }}-500">
                            ({{ $animalCountDifferencePercentage > 0 ? '+' : '' }}{{ number_format($animalCountDifferencePercentage, 2) }}%)
                        </p>
                    @endif
                </div>
            </div>
        </div>
    
        <!-- Yearly Common Disease -->
        <div class="block w-full sm:max-w-sm p-3 bg-white dark:bg-gray-900 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 shadow border border-gray-200 dark:border-gray-950">
            <div>
                <div class="flex justify-center items-center">
                    <p class="pl-2 font-normal tracking-tight text-gray-700 dark:text-gray-400">
                        Yearly Common Disease</p>
                </div>
                <div class="flex justify-center items-center">
                    <p class="pl-2 pt-1 text-lg md:text-xl lg:text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $totalYearlyDisease ?? 'N/A' }}</p>
                </div>
                <div class="flex justify-between items-center pt-1">
                    @if (isset($totalYearlyDiseaseLastYear))
                        @php
                            $yearlyDiseaseDifference = $totalYearlyDisease - $totalYearlyDiseaseLastYear;
                            $yearlyDiseaseDifferencePercentage = $totalYearlyDiseaseLastYear != 0
                                ? ($yearlyDiseaseDifference / $totalYearlyDiseaseLastYear) * 100
                                : 0;
                            $colorClass = $yearlyDiseaseDifference > 0
                                ? 'green'
                                : ($yearlyDiseaseDifference < 0 ? 'red' : 'gray');
                        @endphp
                        <p class="pl-2 text-sm md:text-base lg:text-sm tracking-tight dark:text-white">
                            vs. Last Year: {{ $yearlyDiseaseDifference > 0 ? '+' : '' }}{{ $yearlyDiseaseDifference }}
                        </p>
                        <p class="font-bold text-{{ $colorClass }}-500">
                            ({{ $yearlyDiseaseDifferencePercentage > 0 ? '+' : '' }}{{ number_format($yearlyDiseaseDifferencePercentage, 2) }}%)
                        </p>
                    @endif
                </div>
            </div>
        </div>
    
        <!-- Affected Animals -->
        <div class="block w-full sm:max-w-sm p-3 bg-white dark:bg-gray-900 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 shadow border border-gray-200 dark:border-gray-950">
            <div>
                <div class="flex justify-center items-center">
                    <p class="pl-2 font-normal tracking-tight text-gray-700 dark:text-gray-400">
                        Affected Animals</p>
                </div>
                <div class="flex justify-center items-center">
                    <p class="pl-2 pt-1 text-lg md:text-xl lg:text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $totalAffectedAnimals ?? 'N/A' }}</p>
                </div>
                <div class="flex justify-between items-center pt-1">
                    @if (isset($totalAffectedAnimalsLastYear))
                        @php
                            $yearlyAffectedAnimalsDifference = $totalAffectedAnimals - $totalAffectedAnimalsLastYear;
                            $yearlyAffectedAnimalsDifferencePercentage = $totalAffectedAnimalsLastYear != 0
                                ? ($yearlyAffectedAnimalsDifference / $totalAffectedAnimalsLastYear) * 100
                                : 0;
                            $colorClass = $yearlyAffectedAnimalsDifference > 0
                                ? 'green'
                                : ($yearlyAffectedAnimalsDifference < 0 ? 'red' : 'gray');
                        @endphp
                        <p class="pl-2 text-sm md:text-base lg:text-sm tracking-tight dark:text-white">
                            vs. Last Year: {{ $yearlyAffectedAnimalsDifference > 0 ? '+' : '' }}{{ $yearlyAffectedAnimalsDifference }}
                        </p>
                        <p class="font-bold text-{{ $colorClass }}-500">
                            ({{ $yearlyAffectedAnimalsDifferencePercentage > 0 ? '+' : '' }}{{ number_format($yearlyAffectedAnimalsDifferencePercentage, 2) }}%)
                        </p>
                    @endif
                </div>
            </div>
        </div>
    
        <!-- Animal Death -->
        <div class="block w-full sm:max-w-sm p-3 bg-white dark:bg-gray-900 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 shadow border border-gray-200 dark:border-gray-950">
            <div>
                <div class="flex justify-center items-center">
                    <p class="pl-2 font-normal tracking-tight text-gray-700 dark:text-gray-400">
                        Animal Death</p>
                </div>
                <div class="flex justify-center items-center">
                    <p class="pl-2 pt-1 text-lg md:text-xl lg:text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $totalAnimalDeath ?? 'N/A' }}</p>
                </div>
                <div class="flex justify-between items-center pt-1">
                    @if (isset($totalAnimalDeathLastYear))
                        @php
                            $yearlyAnimalDeathDifference = $totalAnimalDeath - $totalAnimalDeathLastYear;
                            $yearlyAnimalDeathDifferencePercentage = $totalAnimalDeathLastYear != 0
                                ? ($yearlyAnimalDeathDifference / $totalAnimalDeathLastYear) * 100
                                : 0;
                            $colorClass = $yearlyAnimalDeathDifference > 0
                                ? 'green'
                                : ($yearlyAnimalDeathDifference < 0 ? 'red' : 'gray');
                        @endphp
                        <p class="pl-2 text-sm md:text-base lg:text-sm tracking-tight dark:text-white">
                            vs. Last Year: {{ $yearlyAnimalDeathDifference > 0 ? '+' : '' }}{{ $yearlyAnimalDeathDifference }}
                        </p>
                        <p class="font-bold text-{{ $colorClass }}-500">
                            ({{ $yearlyAnimalDeathDifferencePercentage > 0 ? '+' : '' }}{{ number_format($yearlyAnimalDeathDifferencePercentage, 2) }}%)
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    {{-- Animal Population Overview Chart --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-3 justify-center items-center">
        <div
            class="rounded-lg bg-clip-padding bg-opacity-0 col-span-8 sm:col-span-8 row-end-auto z-30 shadow-lg border border-gray-200 dark:border-gray-950">
            <div
                class="rounded-t-xl text-center bg-white dark:bg-gray-900 pt-5 font-bold text-md text-gray-900 dark:text-gray-100">
                {{ __('Overall Animal Population') }}
            </div>
            <div class="relative h-fit">
                <div
                    class="bg-white rounded-lg px-3 dark:bg-gray-900 overflow-hidden items-center justify-end h-full w-full">
                    {!! $animalPopulationOverviewChart->container() !!}
                    <script src="{{ $animalPopulationOverviewChart->cdn() }}"></script>
                    {!! $animalPopulationOverviewChart->script() !!}
                </div>
            </div>
        </div>

        {{-- <div
            class="rounded-lg bg-clip-padding bg-opacity-0 col-span-3 sm:col-span-3 row-end-auto z-30 shadow-lg border border-gray-200 dark:border-gray-950">
            <div
                class="rounded-t-xl text-center bg-white dark:bg-gray-900 pt-5 font-semibold text-md text-gray-900 dark:text-gray-100">
                {{ __('Veterinary Clinics by Sector') }}
            </div>

            <div class="relative h-fit">
                <div
                    class="bg-white rounded-lg px-3 dark:bg-gray-900 overflow-hidden items-center justify-end h-full w-full">
                    {!! $veterinaryClinicsChart->container() !!}
                    <script src="{{ $veterinaryClinicsChart->cdn() }}"></script>
                    {!! $veterinaryClinicsChart->script() !!}
                </div>
            </div>
        </div> --}}


    </div>

    {{-- Animal Population per Municipality Carousel --}}
    <div class="flex flex-col items-center justify-center py-5 lg:py-0">
        <div id="indicators-carousel" class="rounded-xl relative w-full">
            <!-- Carousel wrapper -->
            <div class="bg-white rounded-lg shadow-lg dark:bg-gray-900 overflow-hidden items-center w-full">
                <div
                    class="z-30 relative overflow-hidden rounded-lg md:h-full border border-gray-200 dark:border-gray-950 pb-16 px-10 lg:px-0">
                    @foreach ($municipalities as $index => $municipality)
                        <div class="{{ $index === $currentSlide ? 'block' : 'hidden' }} duration-700 ease-in-out"
                            data-carousel-item="{{ $index === $currentSlide ? 'active' : '' }}">
                            <div class="max-w-5xl mx-auto pt-15">
                                <div class="flex flex-row justify-between pb-5 pt-10">
                                    <div
                                        class="rounded-t-xl bg-white dark:bg-gray-900 pt-3 text-sm text-gray-900 dark:text-gray-100">
                                        <p>{{ __('Animal Population per Municipality') }}({{ $selectedYear }})</p>
                                    </div>
                                    <p class="text-end text-2xl font-bold pe-10">{{ $municipality->municipality_name }}
                                    </p>
                                </div>

                                <table class="table-auto w-full border border-gray-200">
                                    <thead>
                                        <tr class="dark:text-white">
                                            <th class="px-6 py-3 border border-gray-200 dark:border-gray-700">Animal
                                                Species</th>
                                            <th class="px-6 py-3 border border-gray-200 dark:border-gray-700">Population
                                                Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($animalPopulationsByMunicipality[$municipality->id]))
                                            {{-- Create an array to store aggregated populations --}}
                                            @php
                                                $aggregatedPopulations = [];
                                            @endphp
                                            {{-- Loop through each animal population --}}
                                            @foreach ($animalPopulationsByMunicipality[$municipality->id] as $animalPopulation)
                                                {{-- Check if the animal species already exists in aggregated populations --}}
                                                @if (isset($aggregatedPopulations[$animalPopulation->animal->animal_name]))
                                                    {{-- If exists, add the population count --}}
                                                    @php
                                                        $aggregatedPopulations[
                                                            $animalPopulation->animal->animal_name
                                                        ] += $animalPopulation->animal_population_count;
                                                    @endphp
                                                @else
                                                    {{-- If not exists, initialize with the population count --}}
                                                    @php
                                                        $aggregatedPopulations[$animalPopulation->animal->animal_name] =
                                                            $animalPopulation->animal_population_count;
                                                    @endphp
                                                @endif
                                            @endforeach
                                            {{-- Display aggregated populations --}}
                                            @foreach ($aggregatedPopulations as $animalName => $populationCount)
                                                <tr>
                                                    <td class="px-4 py-2 border border-gray-200 dark:border-gray-700">
                                                        {{ $animalName }}</td>
                                                    <td class="px-4 py-2 border border-gray-200 dark:border-gray-700">
                                                        {{ $populationCount }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <!-- Slider indicators -->
            <div class="absolute z-40 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                @foreach ($municipalities as $index => $municipality)
                    <button type="button"
                        class="w-3 h-3 rounded-full {{ $index === $currentSlide ? 'bg-blue-600' : 'bg-gray-300' }} "
                        aria-current="{{ $index === $currentSlide ? 'true' : 'false' }}"
                        aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}">
                    </button>
                @endforeach
            </div>

            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-5 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-300/30 dark:bg-gray-600/30 group-hover:bg-gray-500/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-gray-400 dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-black dark:text-white rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>

            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-5 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-300/30 dark:bg-gray-600/30 group-hover:bg-gray-500/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-gray-400 dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-black dark:text-white rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>

    {{-- Affected Animals Overview Chart --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 justify-center items-center">
        <div
            class="rounded-lg bg-clip-padding bg-opacity-0 col-span-2 sm:col-span-2 row-end-auto z-30 shadow-lg border border-gray-200 dark:border-gray-950">
            <div
                class="rounded-t-xl text-center bg-white dark:bg-gray-900 pt-5 font-bold text-md text-gray-900 dark:text-gray-100">
                {{ __('Affected Animals per Municipality') }}
            </div>
            <div class="relative h-fit">
                <div
                    class="rounded-lg bg-white px-3 dark:bg-gray-900 overflow-hidden items-center justify-end h-full w-full">
                    {!! $affectedAnimalsOverviewChart->container() !!}
                    <script src="{{ $affectedAnimalsOverviewChart->cdn() }}"></script>
                    {!! $affectedAnimalsOverviewChart->script() !!}
                </div>
            </div>
        </div>


        <div
            class="rounded-lg bg-clip-padding bg-opacity-0 col-span-2 sm:col-span-2 row-end-auto z-30 shadow-lg border border-gray-200 dark:border-gray-950">
            <div
                class="rounded-t-xl text-center bg-white dark:bg-gray-900 pt-5 font-bold text-md text-gray-900 dark:text-gray-100">
                {{ __('Affected Animals per Kind') }}
            </div>
            <div class="relative h-fit">
                <div
                    class="rounded-lg bg-white px-3 dark:bg-gray-900 overflow-hidden items-center justify-end h-full w-full">
                    {!! $affectedAnimalsOverviewSecondChart->container() !!}
                    <script src="{{ $affectedAnimalsOverviewSecondChart->cdn() }}"></script>
                    {!! $affectedAnimalsOverviewSecondChart->script() !!}
                </div>
            </div>
        </div>
    </div>


    {{-- Animal Death Overview Chart --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 justify-center items-center">
        <div
            class="rounded-lg bg-clip-padding bg-opacity-0 col-span-2 sm:col-span-2 row-end-auto z-30 shadow-lg border border-gray-200 dark:border-gray-950">
            <div
                class="rounded-t-xl text-center bg-white dark:bg-gray-900 pt-5 font-bold text-md text-gray-900 dark:text-gray-100">
                {{ __('Animal Death per Municipality') }}
            </div>
            <div class="relative h-fit">
                <div
                    class="bg-white rounded-lg px-3 dark:bg-gray-900 overflow-hidden items-center justify-end h-full w-full">
                    {!! $animalDeathOverviewChart->container() !!}
                    <script src="{{ $animalDeathOverviewChart->cdn() }}"></script>
                    {!! $animalDeathOverviewChart->script() !!}
                </div>
            </div>
        </div>


        <div
            class="rounded-lg bg-clip-padding bg-opacity-0 col-span-2 sm:col-span-2 row-end-auto z-30 shadow-lg border border-gray-200 dark:border-gray-950">
            <div
                class="rounded-t-xl text-center bg-white dark:bg-gray-900 pt-5 font-bold text-md text-gray-900 dark:text-gray-100">
                {{ __('Animal Death per Animal') }}
            </div>
            <div class="relative h-fit">
                <div
                    class="bg-white rounded-lg px-3 dark:bg-gray-900 overflow-hidden items-center justify-end h-full w-full">
                    {!! $animalDeathOverviewSecondChart->container() !!}
                    <script src="{{ $animalDeathOverviewSecondChart->cdn() }}"></script>
                    {!! $animalDeathOverviewSecondChart->script() !!}
                </div>
            </div>
        </div>
    </div>

    {{-- Yearly Common Disease Overview Chart --}}
    <div class="grid grid-cols-4 justify-center items-center">
        <div
            class="rounded-lg bg-clip-padding bg-opacity-0 col-span-4 row-end-auto z-30 shadow-lg border border-gray-200 dark:border-gray-950">
            <div
                class="rounded-t-xl text-center bg-white dark:bg-gray-900 pt-5 font-bold text-md text-gray-900 dark:text-gray-100">
                {{ __('Animal Disease Count') }}
            </div>
            <div class="relative h-fit">
                <div
                    class="bg-white rounded-lg px-3 dark:bg-gray-900 overflow-hidden items-center justify-end h-full w-full">
                    {!! $yearlyCommonDiseaseOverviewChart->container() !!}
                    <script src="{{ $yearlyCommonDiseaseOverviewChart->cdn() }}"></script>
                    {!! $yearlyCommonDiseaseOverviewChart->script() !!}
                </div>
            </div>
        </div>
    </div>

    {{-- Animal Population Overview Chart --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-3 justify-center items-center">
        <div
            class="rounded-lg bg-clip-padding bg-opacity-0 col-span-4 sm:col-span-4 row-end-auto z-30 shadow-lg border border-gray-200 dark:border-gray-950">

            <div
                class="rounded-lg bg-clip-padding bg-opacity-0 col-span-3 sm:col-span-3 row-end-auto z-30 shadow-lg border border-gray-200 dark:border-gray-950">
                <div
                    class="rounded-t-xl text-center bg-white dark:bg-gray-900 pt-5 font-semibold text-md text-gray-900 dark:text-gray-100">
                    {{ __('Veterinary Clinics by Sector') }}
                </div>

                <div class="relative h-fit">
                    <div
                        class="bg-white rounded-lg px-3 dark:bg-gray-900 overflow-hidden items-center justify-end h-full w-full">
                        {!! $veterinaryClinicsChart->container() !!}
                        <script src="{{ $veterinaryClinicsChart->cdn() }}"></script>
                        {!! $veterinaryClinicsChart->script() !!}
                    </div>
                </div>
            </div>


        </div>

    </div>

</div>
