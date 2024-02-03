/*==================== SHOW NAVBAR ====================*/
// const showMenu = (headerToggle, navbarId) =>{
//     const toggleBtn = document.getElementById(headerToggle),
//     nav = document.getElementById(navbarId)
    
//     // Validate that variables exist
//     if(headerToggle && navbarId){
//         toggleBtn.addEventListener('click', ()=>{
//             // We add the show-menu class to the div tag with the nav__menu class
//             nav.classList.toggle('show-menu')
//             // change icon
//             toggleBtn.classList.toggle('bx-x')
//         })
//     }
// }
// showMenu('header-toggle','navbar')

/*==================== LINK ACTIVE ====================*/
// const linkColor = document.querySelectorAll('.nav__link')

// function colorLink(){
//     linkColor.forEach(l => l.classList.remove('active'))
//     this.classList.add('active')
// }

// linkColor.forEach(l => l.addEventListener('click', colorLink))


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
