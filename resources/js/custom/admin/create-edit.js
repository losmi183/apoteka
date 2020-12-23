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

    /**
     * 
     * On Select action, set discount field
     * 
     */
    var actions = document.getElementById('actions');
    actions.addEventListener('change', function() {
        // Taking value of select
        var action_id = this.value;
        // console.log(action_id);
        
        Axios.get('/product/discount/' + action_id)
        .then(function(response) {
            
            console.log(response.data.discount);
            document.getElementById('discount').value = response.data.discount;
        })
    })


});
