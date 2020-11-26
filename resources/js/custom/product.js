$(document).ready(function() {
    
    $('.image-small img').click(function() {
        
        let src2 = $(this).attr('src');

        $('#img-lg').attr('src', src2);

    });

    // Quantity move to form
    $('#kolicina').change(function() {
        var value = $('#kolicina').val();
        $('#qty').val(value);
    });

});