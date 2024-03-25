<div tabindex="-1" class="relative rounded-lg shadow bg-white dark:bg-gray-800">
    <button wire:click="$dispatch('closeModal')" type="button"
        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
        data-modal-hide="popup-modal">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close modal</span>
    </button>
    <div class="p-4 md:p-5 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
            class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200">
            <path fill="currentColor"
                d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89l.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7s-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18m-1 5v5l4.28 2.54l.72-1.21l-3.5-2.08V8z" />
        </svg>
        <h3 class="mb-5 text-lg font-normal dark:text-gray-400 text-gray-500">Are you sure you want to restore this
            item?
        </h3>
        <button wire:click="restoreItem" type="button"
            class="text-white bg-yellow-400 hover:bg-yellow-500 dark:focus:ring-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
            Yes, I'm sure
        </button>

        <button wire:click="$dispatch('closeModal')" type="button"
            class="text-gray-500 bg-white hover:bg-gray-100 dark:bg-gray-700 dark:border-gray-500 dark:focus:ring-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:text-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
            No, cancel
        </button>
    </div>
</div>
