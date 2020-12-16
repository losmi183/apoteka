$(document).ready(function(){

    // First Slider init function
    function sliderInit1() {
        $(".recomand-slider").slick({
            autoplay: true,
            autoplaySpeed: 3000,
            dots: false,
            infinite: true,
            slidesToShow: slides,
            slidesToScroll: 1,
            prevArrow: $(".prev1"),
            nextArrow: $(".next1"),
        });
    }
            
    // Second Slider init function
    function sliderInit2() {
        $(".action-slider").slick({
            autoplay: true,
            autoplaySpeed: 3000,
            dots: false,
            infinite: true,
            slidesToShow: slides,
            slidesToScroll: 1,
            prevArrow: $(".prev2"),
            nextArrow: $(".next2"),
        });
    }

    // Function set number of slides based on screen width
    function setSlides(width) {
        var slides = 4;
        if(width < 500 ) slides = 1;
        if(width >= 500 && width < 767 ) slides = 2;
        if(width >= 767 && width < 1200 ) slides = 3;
        if(width >= 1200 ) slides = 4;
        return slides;
    }


    // Initial set slides based on screen width
    var slides = 4;
    
    // Change slides if screen smaller
    slides = setSlides($(window).width());


    // When resize occur 
    $(window).resize(function() {
        slides = setSlides($(window).width());

        // First unset both sliders
        $('.recomand-slider').slick("unslick");
        $('.action-slider').slick("unslick");

        // Call functions to set both slidders
        sliderInit1();
        sliderInit2();
    });

    // Call functions to set both slidders, before any resize
    sliderInit1();
    sliderInit2();
  });