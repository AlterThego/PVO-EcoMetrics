<div class="tab-content hidden rounded-lg !border-opacity-0 bg-white dark:bg-gray-900 bg-opacity-60 dark:bg-opacity-60 shadow-base backdrop-blur-lg backdrop-filter sm:space-y-5 sm:p-8 md:px-10 xl:py-5"
    id="trend" role="tabpanel" aria-labelledby="trend-tab">

    <div class="rounded-xl bg-clip-padding bg-opacity-0 col-span-2 sm:col-span-2 row-end-auto z-30">
        <div class="bg-opacity-0 row-end-auto z-30 border darK:border-gray-900 rounded-xl shadow-lg">
            <div class="relative h-fit">
                <div
                    class="dark:text-white rounded-b-xl px-3 pt-5 bg-white dark:bg-gray-900 overflow-hidden shadow-sm items-center justify-end h-full w-full">
                    {!! $animalPopulationTrendChart->container() !!}
                    <script src="{{ $animalPopulationTrendChart->cdn() }}"></script>
                    {!! $animalPopulationTrendChart->script() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="rounded-xl bg-clip-padding bg-opacity-0 col-span-2 sm:col-span-2 row-end-auto z-30">
        <div class="bg-opacity-0 row-end-auto z-30 border darK:border-gray-900 rounded-xl shadow-lg">
            {{-- <div
                class="rounded-t-xl shadow-lg text-center bg-white dark:bg-gray-900 pt-3 font-semibold text-base text-gray-900 dark:text-gray-100">
                {{ __('Yearly Common Diseases Cases') }}
            </div>
            <div class="pl-6 bg-white dark:bg-gray-900 pt-3 text-xs text-gray-900 dark:text-gray-100">
                {{ __('Cases of common diseases reported for the recent 10 years') }}
            </div> --}}
            <div class="relative h-fit">
                <div
                    class="rounded-b-xl px-3 pt-5 bg-white dark:bg-gray-900 overflow-hidden shadow-sm items-center justify-end h-full w-full">
                    {!! $yearlyCommonDiseaseTrendChart->container() !!}
                    <script src="{{ $yearlyCommonDiseaseTrendChart->cdn() }}"></script>
                    {!! $yearlyCommonDiseaseTrendChart->script() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="rounded-xl bg-clip-padding bg-opacity-0 col-span-2 sm:col-span-2 row-end-auto z-30">
        <div class="bg-opacity-0 row-end-auto z-30 border darK:border-gray-900 rounded-xl shadow-lg">
            <div class="relative h-fit">
                <div
                    class="rounded-b-xl px-3 pt-5 bg-white dark:bg-gray-900 overflow-hidden shadow-sm items-center justify-end h-full w-full">
                    {!! $affectedAnimalsTrendChart->container() !!}
                    <script src="{{ $affectedAnimalsTrendChart->cdn() }}"></script>
                    {!! $affectedAnimalsTrendChart->script() !!}
                </div>
            </div>
        </div>
    </div>


    <div class="rounded-xl bg-clip-padding bg-opacity-0 col-span-2 sm:col-span-2 row-end-auto z-30">
        <div class="bg-opacity-0 row-end-auto z-30 border darK:border-gray-900 rounded-xl shadow-lg">
            <div class="relative h-fit">
                <div
                    class="dark:text-white rounded-b-xl px-3 pt-5 bg-white dark:bg-gray-900 overflow-hidden shadow-sm items-center justify-end h-full w-full">
                    {!! $animalDeathTrendChart->container() !!}
                    <script src="{{ $animalDeathTrendChart->cdn() }}"></script>
                    {!! $animalDeathTrendChart->script() !!}
                </div>
            </div>
        </div>
    </div>
</div>
