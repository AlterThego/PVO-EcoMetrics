<label class="relative inline-flex items-center cursor-pointer">
    <input id="darkModeToggle" type="checkbox" value="" class="sr-only peer">
    <div
        class="w-11 h-6 bg-gray-300 rounded-full dark:bg-gray-500 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-gray-900">
    </div>
    {{-- <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Dark Mode</span> --}}
    <svg class="w-5 h-5 text-gray-500 dark:text-gray-300  mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
        <path fill="currentColor" stroke="currentColor" stroke-linejoin="round" stroke-width="4"
            d="M28.053 4.41c-5.47 1.427-9.507 6.4-9.507 12.317c0 7.03 5.698 12.728 12.727 12.728c5.916 0 10.89-4.038 12.316-9.508A20.05 20.05 0 0 1 44 24c0 11.046-8.954 20-20 20S4 35.046 4 24S12.954 4 24 4c1.389 0 2.744.141 4.053.41Z" />
    </svg>

</label>


<script>
    // Function to set initial theme based on user preference
    function setInitialTheme() {
        const savedTheme = localStorage.getItem('theme');
        const darkModeToggle = document.getElementById('darkModeToggle');

        if (savedTheme === 'dark') {
            darkModeToggle.checked = true;
            toggleDarkMode(true);
        } else {
            toggleDarkMode(false);
        }
    }

    // Call the function to set initial theme on page load
    setInitialTheme();

    // Get the toggle element
    const darkModeToggle = document.getElementById('darkModeToggle');

    // Event listener for when the toggle is clicked
    darkModeToggle.addEventListener('change', function() {
        toggleDarkMode(darkModeToggle.checked);
    });
</script>
