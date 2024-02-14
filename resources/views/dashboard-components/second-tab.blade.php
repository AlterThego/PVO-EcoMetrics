<div class="tab-content hidden rounded-lg !border-opacity-0 bg-white dark:bg-gray-900 bg-opacity-60 dark:bg-opacity-60 shadow-base backdrop-blur-lg backdrop-filter sm:space-y-5 sm:p-8 md:px-10 xl:py-5"
    id="trend" role="tabpanel" aria-labelledby="trend-tab">


    <div class="rounded-xl bg-clip-padding bg-opacity-0 col-span-2 sm:col-span-2 row-end-auto z-30">
        <div class="bg-opacity-0 row-end-auto z-30 border darK:border-gray-900 rounded-xl shadow-lg">
            <div
                class="rounded-t-xl shadow-lg text-center bg-white dark:bg-gray-900 pt-3 font-semibold text-base text-gray-900 dark:text-gray-100">
                {{ __('Yearly Common Diseases Cases') }}
            </div>
            <div class="pl-6 bg-white dark:bg-gray-900 pt-3 text-xs text-gray-900 dark:text-gray-100">
                {{ __('Cases of common diseases reported for the recent 10 years') }}
            </div>
            <div class="relative aspect-w-16 aspect-h-11 sm:aspect-h-11 md:aspect-h-11 lg:aspect-h-11 2xl:aspect-h-6">
                <div
                    class="rounded-b-xl px-3 bg-white dark:bg-gray-900 overflow-hidden shadow-sm items-center justify-end h-full w-full">
                    {!! $yearlyCommonDiseaseChart->container() !!}
                    <script src="{{ $yearlyCommonDiseaseChart->cdn() }}"></script>
                    {!! $yearlyCommonDiseaseChart->script() !!}
                </div>
            </div>
        </div>
    </div>



    <div class="grid grid-cols-1 pt-2 m:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 justify-center items-center">
        <div class="border dark:border-gray-900 shadow-lg rounded-xl bg-clip-padding bg-opacity-0 col-span-2 sm:col-span-2 row-end-auto z-30">
            <div
                class="rounded-t-xl text-center bg-white dark:bg-gray-900 pt-3 font-semibold text-base text-gray-900 dark:text-gray-100">
                {{ __('Affected Animals with Disease') }}
            </div>
            <div class="relative aspect-w-16 aspect-h-11 sm:aspect-h-11 md:aspect-h-11 lg:aspect-h-11 2xl:aspect-h-10">
                <div
                    class="bg-white dark:bg-gray-900 px-3 rounded-b-xl overflow-hidden items-center justify-end h-full w-full">
                    {!! $affectedAnimalsChart->container() !!}
                    <script src="{{ $affectedAnimalsChart->cdn() }}"></script>
                    {!! $affectedAnimalsChart->script() !!}
                </div>
            </div>
        </div>

        <div class="border dark:border-gray-900 shadow-lg rounded-xl bg-clip-padding bg-opacity-0 col-span-2 sm:col-span-2 row-end-auto z-30">
            <div
                class="rounded-t-xl text-center bg-white dark:bg-gray-900 pt-3 font-semibold text-base text-gray-900 dark:text-gray-100">
                {{ __('Animal Death') }}
            </div>
            <div class="relative aspect-w-16 aspect-h-11 sm:aspect-h-11 md:aspect-h-11 lg:aspect-h-11 2xl:aspect-h-10">
                <div
                    class="bg-white dark:bg-gray-900 px-3 rounded-b-xl overflow-hidden items-center justify-end h-full w-full">
                    {!! $animalDeathChart->container() !!}
                    <script src="{{ $animalDeathChart->cdn() }}"></script>
                    {!! $animalDeathChart->script() !!}
                </div>
            </div>
        </div>
    </div>







</div>
