$(document).ready(function(){

    navbar = $('.top-header');
    navbar2 = $('.navbar');

    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {
        setFixed()
    }
    
    // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function setFixed() {
        // Navbar 1 set fixed
        if (window.pageYOffset > navbar.position().top + 60) {
            navbar.addClass('fixed-top');
        } else {
            navbar.removeClass('fixed-top');
        }

        // Navbar 2 set fixed
        if (window.pageYOffset > navbar2.position().top + 68)  {
            navbar2.addClass('fixed-top navbar-margin-top');
        } else {
            navbar2.removeClass('fixed-top navbar-margin-top');
        }
    }
});