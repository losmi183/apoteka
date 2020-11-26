const { default: Axios } = require("axios");

$(document).ready(function() {
    
    /**
     * 
     * Create unique slug
     * 
     */
    $('.category-name').change(function() {

        var ime = $('.category-name').val();

        axios.post('/category/createSlug', {
            name: ime
        })
        .then(response => {
            $('.category-slug').val(response.data.slug);
        });
    });
    // $('.subcategory-name').change(function() {

    //     var ime = $('.subcategory-name').val();

    //     axios.post('/category/createSlug', {
    //         name: ime
    //     })
    //     .then(response => {
    //         $('.subcategory-slug').val(response.data.slug);
    //     });
    // });
});
