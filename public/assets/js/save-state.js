
// OLD!!!!
// Save scroll position to sessionStorage before the page reloads
// window.onbeforeunload = function () {
//     sessionStorage.setItem("scrollPos", window.scrollY);
// };


// Restore scroll position from sessionStorage on page load
// window.onload = function () {
//     var scrollPos = sessionStorage.getItem("scrollPos");
//     if (scrollPos !== null) {
//         window.scrollTo(0, scrollPos);
//         sessionStorage.removeItem("scrollPos");
//     }
// };


// V2
// Save scroll position to sessionStorage before the page reloads or changes
// window.onbeforeunload = function () {
//     sessionStorage.setItem("scrollPos", window.scrollY);
// };

// Restore scroll position from sessionStorage on page load
// window.onload = function () {
//     var scrollPos = sessionStorage.getItem("scrollPos");
//     if (scrollPos !== null && window.location.href === document.referrer) {
//         // Check if the current page is being reloaded (not a new page)
//         window.scrollTo(0, scrollPos);
//         sessionStorage.removeItem("scrollPos");
//     } else {
//         // Reset scroll position for a new page
//         sessionStorage.removeItem("scrollPos");
//     }
// };


// V3
// Save scroll position to sessionStorage before the page reloads or changes
window.onbeforeunload = function () {
    sessionStorage.setItem("scrollPos", window.scrollY);
};

// Restore scroll position from sessionStorage on page load
window.onload = function () {
    var scrollPos = sessionStorage.getItem("scrollPos");
    var currentHref = window.location.href;
    var referringPage = document.referrer;

    if (scrollPos !== null && currentHref === referringPage && currentHref.indexOf('#') === -1) {
        // Check if the current page is being reloaded (not a new page and not a link with #)
        window.scrollTo(0, scrollPos);
        sessionStorage.removeItem("scrollPos");
    } else {
        // Reset scroll position for a new page or when link has #
        sessionStorage.removeItem("scrollPos");
    }
};
