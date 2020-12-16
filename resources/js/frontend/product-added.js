$(document).ready(function() {

    $('.product-order').children('form').click(function(event) {
        event.preventDefault();
    });  

      $( ".add-to-cart-button" ).click(function() {
        $( ".alert-box" ).fadeIn( 300 ).delay( 2500 ).fadeOut( 500 );
      });
});