$(document).ready(function() {
    
    // Turn on fixed navbar at scrollY 200
    $(window).on('scroll', function (e) {
        $('.navbar')[$(window).scrollTop() >= 200 ? 'addClass' : 'removeClass']('fixed-top');
    });

    // Display logo at scrollY 200
    $(window).on('scroll', function (e) {
        $('.navbar .navbar-brand')[$(window).scrollTop() >= 200 ? 'addClass' : 'removeClass']('d-inline-block');
    });


});