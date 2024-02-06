<title>Animal Population</title>

<x-app-layout>
    {{-- <x-slot name="header">
        <div class="mx-5">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Animal Population') }}
          </h2>
        </div>
      </x-slot>
       --}}



    <div class="pt-10">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-4">
            <div class="container relative">
                <div class="flex flex-col space-y-1">
                    <h1 class="text-4xl font-bold">Animal Population</h1>
                    <p class="text-base font-normal text-gray-700 dark:text-gray-100">Latest 6 Years</p>
                </div>

                <div class="relative pb-10 md:py-4 lg:pb-28">
                    <div class="relative mt-20 flex flex-col-reverse justify-end md:flex-row">
                        <div class="w-full md:w-4/5 lg:w-2/3">
                            <div
                                class="pb-10 bg-white-900 rounded-md bg-clip-padding backdrop-filter backdrop-blur-3xl bg-opacity-0 border border-gray-300 dark:border-gray-500 col-span-2 sm:col-span-2 row-end-auto z-30">
                                <div
                                    class="relative aspect-w-16 aspect-h-14 sm:aspect-h-10 md:aspect-h-14 lg:aspect-h-10 2xl:aspect-h-9">
                                    @include('charts.animal-population-chart')

                                </div>
                                <div class="absolute right-6 top-6 h-8 w-8 md:h-10 md:w-10">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 @include('regression.animal-population-regression', $regressionData)

            </div>
        </div>
    </div>




    {{-- pt-12 --}}
    <div class="pb-5" id="secondPage">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm p-6">
                    <div class="font-semibold text-xl text-gray-900 dark:text-gray-100">
                        {{ __('Animal Population') }}
                    </div>
                </div>
                <!-- Buttons at the center -->
                <div data-modal-target="animalPopulationModal"
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm p-6 flex items-center justify-end">
                    <button id="animalPopulationModalButton" data-modal-target="animalPopulationModal"
                        data-modal-toggle="animalPopulationModal"
                        class="bg-green-500 text-sm hover:bg-green-600 text-white font-bold py-2 px-4 rounded z-40">
                        + Add Data
                    </button>
                </div>
            </div>
        </div>
    </div>




    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <livewire:animal-population-table />
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
                <form action="{{ route('animal.population.store') }}" method="post">
                    @csrf
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="year"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year</label>
                            <input type="number" name="year" id="year"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type Year" required="" min="2000" max="2100">
                        </div>

                        <div>
                            <label for="municipality"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Municipality</label>
                            <select name="municipality" id="municipality"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                                <option value="" disabled selected>Select Municipality</option>
                                @foreach (\App\Models\Municipality::pluck('municipality_name', 'id') as $id => $municipalityName)
                                    <option value="{{ $id }}">{{ $municipalityName }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div>
                            <label for="animal"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Animal</label>
                            <select name="animal" id="animal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                                <option value="" disabled selected>Select Animal</option>
                                @foreach (\App\Models\Animal::pluck('animal_name', 'id') as $id => $animalName)
                                    <option value="{{ $id }}">{{ $animalName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="animal_type"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Animal
                                Type</label>
                            <select name="animal_type" id="animal_type"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                                <option value="" disabled selected>Select Animal Type</option>
                                @foreach (\App\Models\AnimalType::pluck('type', 'id') as $id => $animalType)
                                    <option value="{{ $id }}">{{ $animalType }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="animal_population_count"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Population</label>
                            <input type="number" name="animal_population_count" id="animal_population_count"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Input Population" required="">
                        </div>

                        <div>
                            <label for="volume"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Volume</label>
                            <input type="number" step="any" name="volume" id="volume"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Input Volume" required="">
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
                        Add New Animal Population Data
                    </button>


                </form>
            </div>
        </div>
    </div>

    @livewire('wire-elements-modal')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            document.getElementById('animalPopulationModalButton').click();
        });
    </script>

    <script>
        function scrollToSecondPage() {
            // Assuming the second page has an element with an id of 'secondPage'
            document.getElementById('secondPage').scrollIntoView({
                behavior: 'smooth'
            });
        }

        function scrollToSecondPage() {
            const duration = 500;
            const start = performance.now();
            const from = window.scrollY || document.documentElement.scrollTop;
            const to = document.getElementById('secondPage').offsetTop;

            function scrollStep(timestamp) {
                const elapsed = timestamp - start;
                window.scrollTo(0, easeInOutCubic(elapsed, from, to - from, duration));

                if (elapsed < duration) {
                    requestAnimationFrame(scrollStep);
                }
            }

            function easeInOutCubic(t, b, c, d) {
                t /= d / 2;
                if (t < 1) return c / 2 * t * t * t + b;
                t -= 2;
                return c / 2 * (t * t * t + 2) + b;
            }

            requestAnimationFrame(scrollStep);
        }
    </script>



</x-app-layout>
