<label class="relative inline-flex items-center cursor-pointer">
    <input id="darkModeToggle" type="checkbox" value="" class="sr-only peer">
    <div
        class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-gray-500 dark:peer-focus:ring-gray-700 rounded-full peer dark:bg-gray-500 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-gray-700">
    </div>
    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Dark Mode</span>
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
darkModeToggle.addEventListener('change', function () {
    toggleDarkMode(darkModeToggle.checked);
});

</script>
