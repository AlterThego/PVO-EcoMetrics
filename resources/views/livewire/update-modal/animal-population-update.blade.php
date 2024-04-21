<div tabindex="-1" class="relative rounded-lg shadow ">
    <div class="relative bg-white dark:bg-gray-800 p-6 max-w-2xl w-full h-full md:h-auto">
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
            <div class="mx-auto w-3/6">
                <div class="grid gap-4 mb-4 sm:grid-cols-1">
                    <div>
                        <label for="year"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year</label>
                        <input wire:model="year" type="number" name="year" id="year"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type Year" required="" min="1900" max="2100">
                    </div>
                </div>
            </div>
            {{-- <div>
                    <label for="municipality"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Municipality</label>
                    <select wire:model="municipalityId" name="municipality" id="municipality"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @if (auth()->check() && auth()->user()->municipality_id != 0) pointer-events-none @endif"
                        required="">
                        <option value="" disabled selected>Select Municipality</option>
                        @foreach (\App\Models\Municipality::pluck('municipality_name', 'id') as $id => $municipalityName)
                            <option value="{{ $id }}">{{ $municipalityName }}</option>
                        @endforeach
                    </select>
                </div> --}}

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

                {{-- <div>
                    <label for="animal"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Animal</label>
                    <select wire:model="animalId" name="animal" id="animal"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                        <option value="" disabled selected>Select Animal</option>
                        @foreach (\App\Models\Animal::pluck('animal_name', 'id') as $id => $animalName)
                            <option value="{{ $id }}">{{ $animalName }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="animal_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Animal
                        Type</label>
                    <select wire:model="animalTypeId" name="animal_type" id="animal_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="" selected>Select Animal Type (optional)</option>
                        @foreach (\App\Models\AnimalType::pluck('type', 'id') as $id => $animalType)
                            <option value="{{ $id }}">{{ $animalType }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div x-data="{ selectedAnimal: @entangle('animalId'), selectedAnimalType: @entangle('animalTypeId') }">
                    <label for="animal"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Animal</label>
                    <select name="animal" id="animal" x-model="selectedAnimal"
                        @change="
                                const animalId = $event.target.value;
                                const animalOptions = document.querySelectorAll('.animal-option');
                                animalOptions.forEach(function(option) {
                                    if (option.getAttribute('data-animal-id') === animalId) {
                                        option.style.display = 'block';
                                    } else {
                                        option.style.display = 'none';
                                    }
                                });
                                $refs.animalType.value = '';
                                selectedAnimalType = ''; // Reset selected animal type
                                document.getElementById('animal_type').classList.remove('border', 'border-red-500'); // Remove border
                            "
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                        <option value="" disabled>Select Animal</option>
                        @foreach (\App\Models\Animal::pluck('animal_name', 'id') as $id => $animalName)
                            <option value="{{ $id }}" @if ($id == $animalId) selected @endif>
                                {{ $animalName }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="animal_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Animal
                        Type</label>
                    <select wire:model="animalTypeId" name="animal_type" id="animal_type" x-ref="animalType"
                        required=""
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="" disabled>Select Animal Type</option>
                        @foreach (\App\Models\AnimalType::all() as $animalType)
                            <option value="{{ $animalType->id }}" class="animal-option"
                                data-animal-id="{{ $animalType->animal_id }}"
                                @if ($animalType->animal_id == $animalId) style="display: block;" @else style="display: none;" @endif
                                @if ($animalType->id == $animalTypeId) selected @endif>
                                {{ $animalType->type }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="animal_population_count"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Population</label>
                    <input wire:model="animalPopulationCount" type="number" name="animal_population_count"
                        id="animal_population_count"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Input Population" required="">
                </div>

                <div>
                    <label for="volume"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Volume</label>
                    <div class="relative">

                        <input wire:model="volume" type="number" step="any" name="volume" id="volume"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pl-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Input Volume (optional)">
                        <span
                            class="absolute inset-y-0 right-0 flex items-center pr-10 text-gray-500 sm:text-sm dark:text-white">mt</span>
                    </div>
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
                Update Animal Population Data
            </button>
        </form>


    </div>
</div>
