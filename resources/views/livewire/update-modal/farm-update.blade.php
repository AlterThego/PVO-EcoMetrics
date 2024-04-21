<div tabindex="-1" class="relative shadow top-0 left-0 w-full h-full flex items-center justify-center">
    <div class="relative rounded-lg bg-white dark:bg-gray-800 p-4 max-w-2xl w-full h-full md:h-auto">
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                Update Data
            </h3>

            <button wire:click="$dispatch('closeModal')" type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>


        <form wire:submit.prevent="updateitem">
            @csrf
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div x-data="{ selectedMunicipality: @entangle('municipalityId'), selectedBarangay: @entangle('barangayId') }">
                    <label for="municipality"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Municipality</label>
                    <select name="municipality" id="municipality" x-model="selectedMunicipality"
                        @change="
                                    const municipalityId = $event.target.value;
                                    const barangayOptions = document.querySelectorAll('.barangay-option');
                                    barangayOptions.forEach(function(option) {
                                        if (option.getAttribute('data-municipality-id') === municipalityId) {
                                            option.style.display = 'block';
                                        } else {
                                            option.style.display = 'none';
                                        }
                                    });
                                    $refs.barangay.value = '';
                                    selectedBarangay = ''; // Reset selected barangay
                                    document.getElementById('barangay').classList.remove('border', 'border-red-500'); // Remove border
                                "
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @if (auth()->check() && auth()->user()->municipality_id != 0) pointer-events-none @endif"
                        required="">
                        <option value="" disabled>Select Municipality</option>
                        @foreach (\App\Models\Municipality::pluck('municipality_name', 'id') as $id => $municipalityName)
                            <option value="{{ $id }}" @if ($id == $municipalityId) selected @endif>
                                {{ $municipalityName }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="barangay"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Barangay</label>
                    <select wire:model="barangayId" name="barangay" id="barangay" x-ref="barangay" required=""
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="" disabled>Select Barangay</option>
                        @foreach (\App\Models\Barangay::all() as $barangay)
                            <option value="{{ $barangay->id }}" class="barangay-option"
                                data-municipality-id="{{ $barangay->municipality_id }}"
                                @if ($barangay->municipality_id == $municipalityId) style="display: block;" @else style="display: none;" @endif
                                @if ($barangay->id == $barangayId) selected @endif>
                                {{ $barangay->barangay_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Sector</label>
                    <select wire:model="farmLevel" id="level" name="level" required=""
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="" disabled selected>Select Level</option>
                        <option value="Municipal">Municipal</option>
                        <option value="Provincial">Provincial</option>
                    </select>
                </div>


                <div>
                    <label for="farm_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Farm
                        Name</label>
                    <input wire:model="farmName" type="text" name="farm_name" id="farm_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Enter Farm Name" required="" autocomplete="off">
                </div>


                <div>
                    <label for="farm_area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Farm
                        Area</label>
                    <div class="relative">
                        <input wire:model="farmArea" type="number" step="any" name="farm_area" id="farm_area"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pl-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Input Farm Area" required="">
                        <span
                            class="absolute inset-y-0 right-0 flex items-center pr-10 text-gray-500 sm:text-sm dark:text-white">ha</span>
                    </div>
                </div>

                <div>
                    <label for="farm_sector" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Sector</label>
                    <select wire:model="farmSector" id="farm_sector" name="farm_sector" required=""
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="" disabled selected>Select Sector</option>
                        <option value="Government">Government</option>
                        <option value="Commercial">Commercial</option>
                    </select>
                </div>

                <div>
                    <label for="farm_type"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Farm Type</label>
                    <select wire:model="farmTypeId" name="farm_type" id="farm_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                        <option value="" disabled selected>Select Farm Type</option>
                        @foreach (\App\Models\FarmType::pluck('type', 'id') as $id => $farmType)
                            <option value="{{ $id }}">{{ $farmType }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="year_established"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year Established</label>
                    <input wire:model="yearEstablished" type="number" name="year_established" id="year_established"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type Year Established" required="" min="2000" max="2100">
                </div>


                <div>
                    <label for="year_closed" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year
                        Closed</label>
                    <input wire:model="yearClosed" type="number" name="year_closed" id="year_closed"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type Year Closed" min="2000" max="2100">
                </div>

            </div>
            <button wire:click.prevent="updateitem"
                class="text-white inline-flex items-center bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd"></path>
                </svg>
                Update Farm List Data
            </button>
        </form>


    </div>
</div>
