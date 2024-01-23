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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm p-6">
                    <div class="font-semibold text-xl text-gray-900 dark:text-gray-100">
                        {{ __('Animal Population') }}
                    </div>
                </div>
                <!-- Buttons at the center -->
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm p-6 flex items-center justify-end">
                    <button class="bg-green-500 text-sm hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                        + Add Data
                    </button>
                    <!-- Add more buttons as needed -->
                </div>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
