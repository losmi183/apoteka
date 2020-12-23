const { default: Axios } = require("axios");
const { valuesIn } = require("lodash");

$(document).ready(function() {

    // OLD NETHOD
    // Quantity input change firing form submit method

    // $('#qtyInput').on('input', function() { 
    //     let val = $(this).val() // get the current value of the input field.
    //     console.log(val);
    //     $('#qtyForm').submit();
    // });


    /***
     * Change Product quantity on 
     */

    /***
     * Order button fire ajax request to cart controller, add product to cart
     */
    // $('.add-to-cart-form').submit(function(e) {
        
    //     // e.preventDefault();

    //     var values = {};

    //     // Kreira se asocijativni niz , input_name => input_value
    //     $.each($(this).serializeArray(), function(i, field) {
    //         values[field.name] = field.value;
    //     });

    //     console.log(values);

    //     // Ajax post to CartController@store
    //     axios.post('/cart', {
    //         data: values
    //     }).
    //     then(response => console.log(response)).
    //     catch(error => console.log(error))


    // });

});