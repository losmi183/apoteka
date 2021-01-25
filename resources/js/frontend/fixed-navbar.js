$(document).ready(function(){   

    alert('asd');
    navbar = $('.navbar');

    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {
        setFixed()
    }
    
    // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function setFixed() {

        if (window.pageYOffset > navbar.position().top -40)  {
            navbar.addClass('header-fixed-bottom');
        } else {
            navbar.removeClass('header-fixed-bottom');
        }
    }

});