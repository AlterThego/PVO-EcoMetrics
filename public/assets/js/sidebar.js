// Navbar js
function toggleDropdown(dropdownId) {
    var dropdown = document.getElementById(dropdownId);

    // Close all other dropdowns
    var allDropdowns = document.querySelectorAll('.nav__dropdown');
    allDropdowns.forEach(function (otherDropdown) {
        if (otherDropdown !== dropdown) {
            otherDropdown.classList.remove('show');
        }
    });

    // Toggle the active class for the pressed dropdown
    dropdown.classList.toggle('show');
}


// Dark and light mode toggle
function toggleDarkMode(isDarkMode) {
    const root = document.documentElement;

    if (isDarkMode) {
        // Toggle to dark mode
        root.style.setProperty('--first-color', '#00A86B');
        root.style.setProperty('--first-color-light', '#2B313F');
        root.style.setProperty('--title-color', '#F0FFF0');
        root.style.setProperty('--text-color', '#E2E8F0');
        root.style.setProperty('--text-color-light', '#CBD5E0');
        root.style.setProperty('--body-color', '#1A202C');
        root.style.setProperty('--container-color', '#2D3748');
        root.style.setProperty('--nav-dropdown-collapse', '#1f2937');


    } else {
        // Toggle to light mode
        root.style.setProperty('--first-color', '#008000');
        root.style.setProperty('--first-color-light', '#F3F4F6');
        root.style.setProperty('--title-color', '#4F0A09');
        root.style.setProperty('--text-color', '#1F2937');
        root.style.setProperty('--text-color-light', '#A5A1AA');
        root.style.setProperty('--body-color', '#F0FFF0');
        root.style.setProperty('--container-color', '#FFFFFF');
        root.style.setProperty('--nav-dropdown-collapse', '#fefce8');

    }

    // Toggle dark mode class on the body element
    document.body.classList.toggle('dark', isDarkMode);

    // Save the user's choice in localStorage
    localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
}


// floating Button js
window.onscroll = function() {
    var floatingBtn = document.getElementById('floating-btn');
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        floatingBtn.classList.remove('hidden');
    } else {
        floatingBtn.classList.add('hidden');
    }
};

// Scroll to top function with transition effect
function goToTop() {
    const duration = 500; // Set the duration of the scroll animation in milliseconds
    const start = performance.now();
    const from = window.scrollY || document.documentElement.scrollTop;

    function scrollStep(timestamp) {
        const elapsed = timestamp - start;
        window.scrollTo(0, easeInOutCubic(elapsed, from, -from, duration));

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