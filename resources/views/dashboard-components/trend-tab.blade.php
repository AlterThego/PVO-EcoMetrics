<div class="tab-content hidden rounded-lg !border-opacity-0 bg-white dark:bg-gray-900 bg-opacity-60 dark:bg-opacity-60 shadow-base backdrop-blur-lg backdrop-filter sm:space-y-5 sm:p-8 md:px-10 xl:py-5"
    id="trend" role="tabpanel" aria-labelledby="trend-tab">

    <div class="rounded-lg bg-clip-padding bg-opacity-0 col-span-2 sm:col-span-2 row-end-auto z-30">
        <div class="bg-opacity-0 row-end-auto z-30 border border-gray-200 dark:border-gray-950 rounded-lg shadow-lg">
            <div
                class="rounded-t-xl shadow-lg pl-6 bg-white dark:bg-gray-900 pt-4 font-semibold text-md text-gray-900 dark:text-gray-100">
                {{ __('Animal Population Trend') }}
            </div>
            <div class="pl-6 bg-white dark:bg-gray-900 pt-1 text-xs text-gray-900 dark:text-gray-100">
                {{ __('For the past 20 years') }}
            </div>
            <div class="relative h-fit">
                <div
                    class="rounded-lg dark:text-white rounded-b-xl px-3 bg-white dark:bg-gray-900 overflow-hidden shadow-lg items-center justify-end h-full w-full">
                    {!! $animalPopulationTrendChart->container() !!}
                    <script src="{{ $animalPopulationTrendChart->cdn() }}"></script>
                    {!! $animalPopulationTrendChart->script() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="rounded-lg bg-clip-padding bg-opacity-0 col-span-2 sm:col-span-2 row-end-auto z-30">
        <div class="bg-opacity-0 row-end-auto z-30 border border-gray-200 dark:border-gray-950 rounded-lg shadow-lg">
            <div
                class="rounded-t-xl shadow-lg pl-6 bg-white dark:bg-gray-900 pt-4 font-semibold text-md text-gray-900 dark:text-gray-100">
                {{ __('Disease Trend') }}
            </div>
            <div class="pl-6 bg-white dark:bg-gray-900 pt-1 text-xs text-gray-900 dark:text-gray-100">
                {{ __('Cases of common diseases reported for the recent 20 years') }}
            </div>
            <div class="relative h-fit">
                <div
                    class="rounded-lg px-3 bg-white dark:bg-gray-900 overflow-hidden shadow-lg items-center justify-end h-full w-full">
                    {!! $yearlyCommonDiseaseTrendChart->container() !!}
                    <script src="{{ $yearlyCommonDiseaseTrendChart->cdn() }}"></script>
                    {!! $yearlyCommonDiseaseTrendChart->script() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="rounded-lg bg-clip-padding bg-opacity-0 col-span-2 sm:col-span-2 row-end-auto z-30">
        <div class="bg-opacity-0 row-end-auto z-30 border border-gray-200 dark:border-gray-950 rounded-lg shadow-lg">
            <div
                class="rounded-t-xl shadow-lg pl-6 bg-white dark:bg-gray-900 pt-4 font-semibold text-md text-gray-900 dark:text-gray-100">
                {{ __('Affected Animals with Disease Trend') }}
            </div>
            <div class="relative h-fit">
                <div
                    class="rounded-lg px-3 bg-white dark:bg-gray-900 overflow-hidden shadow-lg items-center justify-end h-full w-full">
                    {!! $affectedAnimalsTrendChart->container() !!}
                    <script src="{{ $affectedAnimalsTrendChart->cdn() }}"></script>
                    {!! $affectedAnimalsTrendChart->script() !!}
                </div>
            </div>
        </div>
    </div>


    <div class="rounded-lg bg-clip-padding bg-opacity-0 col-span-2 sm:col-span-2 row-end-auto z-30">
        <div class="bg-opacity-0 row-end-auto z-30 border border-gray-200 dark:border-gray-950 rounded-lg shadow-lg">
            <div class="relative h-fit">
                <div
                    class="rounded-t-xl shadow-lg pl-6 bg-white dark:bg-gray-900 pt-4 font-semibold text-md text-gray-900 dark:text-gray-100">
                    {{ __('Animal Death Trend') }}
                </div>
                <div
                    class="rounded-lg dark:text-white px-3 bg-white dark:bg-gray-900 overflow-hidden shadow-lg items-center justify-end h-full w-full">
                    {!! $animalDeathTrendChart->container() !!}
                    <script src="{{ $animalDeathTrendChart->cdn() }}"></script>
                    {!! $animalDeathTrendChart->script() !!}
                </div>
            </div>
        </div>
    </div>
</div>
