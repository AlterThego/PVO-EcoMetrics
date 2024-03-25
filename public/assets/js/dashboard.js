// 
// Tabs JS
document.addEventListener('DOMContentLoaded', function () {
    var tabs = document.querySelectorAll('[role="tab"]');

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            var selectedTabId = this.getAttribute('data-tabs-target');
            var tabContentToShow = document.querySelector(selectedTabId);

            if (tabContentToShow) {
                // Hide all tab contents
                var allTabContents = document.querySelectorAll('.tab-content');
                allTabContents.forEach(function (tab) {
                    tab.style.display = 'none';
                });

                // Show selected tab content
                tabContentToShow.style.display = 'block';

                // Remove border bottom from all tab buttons
                tabs.forEach(function (tab) {
                    tab.classList.remove('border-b-4', 'border-green-500',
                        'dark:border-custom-orange', 'dark:text-white',
                        'hover:bg-white', 'dark:hover:bg-gray-900',
                        'hover:text-green-500', 'dark:hover:text-white',
                        'text-green-500', 'shadow-2xl', 'bg-white',
                        'dark:bg-gray-900');
                });

                // Add border bottom to the selected tab button
                this.classList.add('border-b-4', 'border-green-500',
                    'dark:border-custom-orange', 'dark:text-white', 'hover:bg-white',
                    'dark:hover:bg-gray-900', 'hover:text-green-500',
                    'dark:hover:text-white',
                    'text-green-500', 'shadow-2xl', 'bg-white', 'dark:bg-gray-900');
            }
        });
    });

    // Initially select the first tab
    tabs[0].click();

    var tabsSelect = document.getElementById('tabs');

    tabsSelect.addEventListener('change', function () {
        var selectedTabId = tabsSelect.value;
        var tabContentToShow = document.querySelector(selectedTabId);
        if (tabContentToShow) {
            // Hide all tab contents
            var allTabContents = document.querySelectorAll('.tab-content');
            allTabContents.forEach(function (tab) {
                tab.style.display = 'none';
            });

            // Show selected tab content
            tabContentToShow.style.display = 'block';
        }
    });
});

// 
// Save state of the tabs when reloaded
document.addEventListener('DOMContentLoaded', function () {
    // Function to handle tab button click
    function handleTabClick(event) {
        var selectedTabId = event.currentTarget.getAttribute('data-tabs-target');
        var tabContentToShow = document.querySelector(selectedTabId);

        if (tabContentToShow) {
            // Hide all tab contents
            var allTabContents = document.querySelectorAll('.tab-content');
            allTabContents.forEach(function (tab) {
                tab.style.display = 'none';
            });

            // Show selected tab content
            tabContentToShow.style.display = 'block';

            // Remove selected state from all tab buttons
            var allTabButtons = document.querySelectorAll('[role="tab"]');
            allTabButtons.forEach(function (button) {
                button.setAttribute('aria-selected', 'false');
            });

            // Add selected state to the clicked tab button
            event.currentTarget.setAttribute('aria-selected', 'true');

            // Store the ID of the selected tab in localStorage
            localStorage.setItem('selectedTab', selectedTabId);
        }
    }

    // Get all tab buttons
    var tabButtons = document.querySelectorAll('[role="tab"]');

    // Add click event listener to each tab button
    tabButtons.forEach(function (button) {
        button.addEventListener('click', handleTabClick);
    });

    // Retrieve the ID of the selected tab from localStorage
    var selectedTabId = localStorage.getItem('selectedTab');

    // If there's a stored selected tab, click on it to show its content
    if (selectedTabId) {
        var selectedTabButton = document.querySelector('[data-tabs-target="' + selectedTabId + '"]');
        if (selectedTabButton) {
            selectedTabButton.click();
        }
    }
});

// 
// Year dropdown save js
// Function to save selected year to local storage
function saveSelectedYear() {
    var yearSelect = document.getElementById('year');
    var selectedYear = yearSelect.value;
    localStorage.setItem('selectedYear', selectedYear);
}

// Function to load selected year from local storage
function loadSelectedYear() {
    var selectedYear = localStorage.getItem('selectedYear');
    if (selectedYear) {
        document.getElementById('year').value = selectedYear;
    }
}

// Function to set default value to the latest year
function setDefaultYear() {
    var yearSelect = document.getElementById('year');
    var latestYearOption = yearSelect.lastElementChild;
    yearSelect.value = latestYearOption.value; // Set default value to the latest year option
}

// Load selected year when the page loads
window.onload = function () {
    setDefaultYear(); // Set default value to the latest year
    loadSelectedYear(); // Load selected year from local storage
};

// Save selected year when it changes
document.getElementById('year').addEventListener('change', function () {
    saveSelectedYear();
});


// 
// Carousel js
document.addEventListener('DOMContentLoaded', function () {
    const carouselItems = document.querySelectorAll('[data-carousel-item]');
    const prevButton = document.querySelector('[data-carousel-prev]');
    const nextButton = document.querySelector('[data-carousel-next]');
    const slideIndicators = document.querySelectorAll('[data-carousel-slide-to]');
    let currentSlide = 0;

    // Function to show the current slide and hide others
    function showSlide(slideIndex) {
        carouselItems.forEach((item, index) => {
            if (index === slideIndex) {
                item.classList.add('block');
                item.classList.remove('hidden');
            } else {
                item.classList.add('hidden');
                item.classList.remove('block');
            }
        });
        updateActiveIndicator(slideIndex);
    }

    // Function to handle previous slide
    function prevSlide() {
        currentSlide = (currentSlide === 0) ? carouselItems.length - 1 : currentSlide - 1;
        showSlide(currentSlide);
    }

    // Function to handle next slide
    function nextSlide() {
        currentSlide = (currentSlide === carouselItems.length - 1) ? 0 : currentSlide + 1;
        showSlide(currentSlide);
    }

    // Function to update active indicator with animation
    function updateActiveIndicator(index) {
        slideIndicators.forEach((indicator, i) => {
            if (i === index) {
                indicator.classList.add('bg-blue-600', 'transition', 'duration-300');
                indicator.classList.remove('bg-gray-300');
            } else {
                indicator.classList.remove('bg-blue-600');
                indicator.classList.add('bg-gray-300', 'transition', 'duration-300');
            }
        });
    }

    // Event listener for previous button
    prevButton.addEventListener('click', prevSlide);

    // Event listener for next button
    nextButton.addEventListener('click', nextSlide);

    // Event listeners for slide indicators
    slideIndicators.forEach((indicator, index) => {
        indicator.addEventListener('click', function () {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });

    // Show initial slide
    showSlide(currentSlide);
});
