<title>Animal Types</title>

<x-app-layout>
    <div class="pt-12 pb-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2">
                <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm p-6 z-30">
                    <div class="font-semibold text-xl text-gray-900 dark:text-gray-100">
                        {{ __('Animal Types') }}
                    </div>
                </div>
                <!-- Buttons at the center -->
                <div data-modal-target="animalTypeModal"
                    class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm p-6 flex items-center justify-end z-10">
                    <button id="animalTypeModalButton" data-modal-target="animalTypeModal" data-modal-toggle="animalTypeModal"
                        class="bg-green-500 text-sm hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                        + Add Data
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="position: relative; z-index: 10;">
            <div class="bg-white dark:bg-gray-900 bg-opacity-90 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <livewire:animal-type-table />
                </div>
            </div>
        </div>


        <!-- Main modal -->
        <div id="animalTypeModal" tabindex="-1" aria-hidden="true"
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
                            data-modal-toggle="animalTypeModal">
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
                    <form action="{{ route('animal.type.store') }}" method="post">
                        @csrf
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
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
                                <label for="type"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Animal Type</label>
                                <input type="text" name="type" id="type"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type Animal Type" required="" autocomplete="off">
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
                            Add New Animal Type
                        </button>


                    </form>
                </div>
            </div>
        </div>

        @livewire('wire-elements-modal')
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                document.getElementById('animalTypeModalButton').click();
            });
        </script>


</x-app-layout>
