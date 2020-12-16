$(document).ready(function(){   
    
    // Select Modal
    var modal = document.getElementById('zoom-modal');
    console.log(modal);   
    
    // Get the button that opens the modal
    var btn = document.getElementById("zoom-in");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("zoom-close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "flex";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
        modal.style.display = "none";
        }
    }



    // Open image zoom modal
    // $('#zoom-in').click(function() {
    //     $('#zoom-modal').show();
    // })

    // // Close when click on close button
    // $('#zoom-close').click(function() {
    //     $('#zoom-modal').hide();
    // });

    // $('#zoom-modal').click(function() {
    //     $(this).hide();
    // });

    // When the user clicks anywhere outside of the modal, close it
    // window.onclick = function(event) {

    //     // console.log(event);

    //     if (event.target == modal) {
    //     modal.style.display = "none";
    //     }
    // }



});