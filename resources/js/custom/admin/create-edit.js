const { default: Axios } = require("axios");

$(document).ready(function() {
    
    /**
     * On select change event / Populate Subcategories select
     */
    $('#category').change(function() {        
        var categoryId = $(this).val();

        Axios.get('/product/fetchSubcategories/'+categoryId)
        .then(function(response) {
            var subcategories = (response.data.data);

            // First remove old subcategories
            $('#subcategories').empty();

            subcategories.forEach(function(item, index) {
                $('#subcategories').append("<option value="+item.id+">"+item.name+"</option>")
            })
        })
    });

    /**
     * 
     * Create unique slug
     * 
     */
    $('#ime').change(function() {

        var ime = $('#ime').val();

        axios.post('/product/createSlug', {
            name: ime
        })
        .then(response => {
            $('#slug').val(response.data.slug);
        });
    });
});
