$(document).ready(function() {
    
    $('.image-small img').click(function() {
        
        let src2 = $(this).attr('src');

        $('#img-lg').attr('src', src2);

    });


});