<div class="tab-content hidden rounded-lg !border-opacity-0 bg-white dark:bg-gray-900 bg-opacity-60 dark:bg-opacity-60 shadow-base backdrop-blur-lg backdrop-filter sm:space-y-5 sm:p-8 md:px-10 xl:py-5"
    id="summary" role="tabpanel" aria-labelledby="summary-tab">
    <!-- Component Code -->
    <div class="relative">
        <div class="max-w-5xl rounded overflow-hidden flex flex-col mx-auto text-center pb-5">
            <div class="flex flex-1 w-full flex-col items-center justify-center text-center px-4 py-16 dark:to-gray-800">
                <h1
                    class="mx-auto font-display text-5xl p-5 font-bold tracking-normal text-white-300 dark:text-gray-300 sm:text-7xl">
                    Socio-Economic
                    <span class="relative whitespace-nowrap text-white-600 dark:text-gray-300">Profile</span>
                    <span class="relative whitespace-nowrap text-red-500 dark:text-orange-300">
                        <span class="relative">Export ({{ $selectedYear }})</span>
                    </span>
                </h1>
                <h2 class="mx-auto mt-6 max-w-xl text sm:text-white-400 text-white-500 dark:text-gray-300 leading-7">
                    The downloaded report provides a concise overview of raw data related to
                    socio-economic profile and agriculture in the Benguet. The purpose of this report is to offer quick
                    access to summarized information, without the need to navigate through extensive datasets,
                    and provide document for reporting.
                </h2>
                <a href="{{ route('report-export') }}"
                    class="bg-orange-600 dark:bg-gray-950 rounded-xl text-white dark:text-gray-300 font-medium px-4 py-3 sm:mt-10 mt-8 hover:bg-orange-500 dark:hover:bg-gray-600 transition">Download
                    Report</a>
            </div>
            <hr />

        </div>

    </div>
</div>
