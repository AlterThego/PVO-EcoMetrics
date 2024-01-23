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
