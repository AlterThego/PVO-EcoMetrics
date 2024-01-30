<div tabindex="-1" class="relative rounded-lg shadow dark:bg-gray-700">
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
        {{-- <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg> --}}

        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" viewBox="0 0 24 24">
            <path fill="currentColor" d="m21.171 15.398l-5.912-9.854C14.483 4.251 13.296 3.511 12 3.511s-2.483.74-3.259 2.031l-5.912 9.856c-.786 1.309-.872 2.705-.235 3.83C3.23 20.354 4.472 21 6 21h12c1.528 0 2.77-.646 3.406-1.771c.637-1.125.551-2.521-.235-3.831M12 17.549c-.854 0-1.55-.695-1.55-1.549c0-.855.695-1.551 1.55-1.551s1.55.696 1.55 1.551c0 .854-.696 1.549-1.55 1.549m1.633-7.424c-.011.031-1.401 3.468-1.401 3.468c-.038.094-.13.156-.231.156s-.193-.062-.231-.156l-1.391-3.438a1.776 1.776 0 0 1-.129-.655c0-.965.785-1.75 1.75-1.75a1.752 1.752 0 0 1 1.633 2.375" />
        </svg> --}}

        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
            viewBox="0 0 1024 1024">
            <path fill="currentColor"
                d="M864 256H736v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32m-200 0H360v-72h304z" />
        </svg>

        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
            viewBox="0 0 24 24">
            <path fill="currentColor"
                d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z" />
        </svg> --}}

        <h3 class="mb-5 text-lg font-normal dark:text-gray-400 text-gray-500">Are you sure you want to delete this?
        </h3>
        <button wire:click="deleteItem" type="button"
            class="text-white bg-red-600 hover:bg-red-800 dark:focus:ring-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
            Yes, I'm sure
        </button>

        <button wire:click="$dispatch('closeModal')" type="button"
            class="text-gray-500 bg-white hover:bg-gray-100 dark:bg-gray-700 dark:border-gray-500 dark:focus:ring-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:text-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
            No, cancel
        </button>
    </div>
</div>
