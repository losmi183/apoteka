$(document).ready(function() {

    // Quantity input change firing form submit method

    $('#qtyInput').on('input', function() { 
        let val = $(this).val() // get the current value of the input field.
        console.log(val);
        $('#qtyForm').submit();
    });

});