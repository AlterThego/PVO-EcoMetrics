<title>Farms List</title>

<x-app-layout>
    <div class="pt-12 pb-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2">
                <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm p-6 z-30">
                    <div class="font-semibold text-xl text-gray-900 dark:text-gray-100">
                        {{ __('Farms List') }}
                    </div>
                </div>
                <!-- Buttons at the center -->
                <div data-modal-target="animalPopulationModal"
                    class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm p-6 flex items-center justify-end z-10">
                    <a href="{{ route('farms.generate-excel') }}" data-tooltip-target="export-tooltip"
                        data-tooltip-placement="left" class="relative inline-block">
                        <div
                            class="z-30 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-950 rounded-lg px-4 py-2 mr-5 hover:bg-gray-200 dark:hover:bg-gray-600">
                            <svg class="h-5 w-5 text-pg-primary-500 dark:text-pg-primary-300" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <!-- Tooltip -->
                        <div id="export-tooltip" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Export
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </a>

                    <button id="animalPopulationModalButton" data-modal-target="animalPopulationModal"
                        data-modal-toggle="animalPopulationModal"
                        class="bg-green-500 text-sm hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                        + Add Data
                    </button>
                    <!-- Outside of any Livewire component -->


                </div>
            </div>
        </div>
    </div>


    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="position: relative; z-index: 10;">
            <div class="bg-white dark:bg-gray-900 bg-opacity-90 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <livewire:farm-table />
                </div>
            </div>
        </div>


        <!-- Main modal -->
        <div id="animalPopulationModal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div
                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Add Data
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="animalPopulationModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route('farm.list.store') }}" method="post">
                        @csrf
                        <div class="mx-auto w-3/6">
                            <div class="grid gap-4 mb-4 sm:grid-cols-1">
                                <div>
                                    <label for="farm_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Farm
                                        Name</label>
                                    <input type="text" name="farm_name" id="farm_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type Farm Name" required="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <div>
                                <label for="municipality"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Municipality</label>
                                <select name="municipality" id="municipality"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500  @if (auth()->check() && auth()->user()->municipality_id != 0) pointer-events-none @endif"
                                    required="">
                                    <option value="" disabled @if (auth()->check() && auth()->user()->municipality_id == 0) selected @endif>
                                        Select Municipality</option>
                                    @foreach (\App\Models\Municipality::pluck('municipality_name', 'id') as $id => $municipalityName)
                                        <option value="{{ $id }}"
                                            @if (auth()->user()->municipality_id == $id) selected @endif>
                                            {{ $municipalityName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="barangay"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Barangay
                                    Name</label>
                                <select name="barangay" id="barangay"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required="">
                                    <option value="" disabled selected>Select Barangay</option>
                                    @foreach (\App\Models\Barangay::all() as $barangay)
                                        <option value="{{ $barangay->id }}" class="barangay-option"
                                            data-animal-id="{{ $barangay->municipality_id }}" style="display: none;">
                                            {{ $barangay->barangay_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="level"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Level</label>
                                <select id="level" name="level" required=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="" disabled selected>Select Level</option>
                                    <option value="Provincial">Provincial</option>
                                    <option value="Municipal">Municipal</option>
                                </select>
                            </div>

                            <div>
                                <label for="farm_sector"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Farm
                                    Sector</label>
                                <select id="farm_sector" name="farm_sector" required=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="" disabled selected>Select Sector</option>
                                    <option value="Commercial">Commercial</option>
                                    <option value="Government">Government</option>
                                </select>
                            </div>


                            <div>
                                <label for="farm_area"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Farm
                                    Area</label>
                                <div class="relative">
                                    <input type="number" step="any" name="farm_area" id="farm_area"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pl-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Input Volume" required="">
                                    <span
                                        class="absolute inset-y-0 right-0 flex items-center pr-10 text-gray-500 sm:text-sm dark:text-white">ha</span>
                                </div>
                            </div>



                            <div>
                                <label for="farm_type"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Farm Type</label>
                                <select name="farm_type" id="farm_type"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required="">
                                    <option value="" disabled selected>Select a Farm Type</option>
                                    @foreach (\App\Models\FarmType::pluck('type', 'id') as $id => $farmType)
                                        <option value="{{ $id }}">{{ $farmType }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="year_established"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year
                                    Established</label>
                                <input type="number" name="year_established" id="year_established"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type Year Established" required="" min="1900"
                                    max="2100">
                            </div>

                            <div>
                                <label for="year_closed"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year
                                    Closed</label>
                                <input type="number" name="year_closed" id="year_closed"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type Year Closed (optional)" min="1900" max="2100">
                            </div>

                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Add New Farm Data
                        </button>


                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        $(document).ready(function() {
            $('#municipality').change(function() {
                var municipalityId = $(this).val();
                $('.barangay-option').hide(); // Hide all barangays initially
                $('.barangay-option[data-animal-id="' + municipalityId + '"]')
                    .show(); // Show barangays of selected municipality
                $('#barangay').val(''); // Reset the selected barangay
            });

            // Trigger the change event on document ready to initially display barangays of the selected municipality
            $('#municipality').change();
        });
    </script>
    @livewire('wire-elements-modal')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            document.getElementById('animalPopulationModalButton').click();
        });
    </script>

</x-app-layout>
