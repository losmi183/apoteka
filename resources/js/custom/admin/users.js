$(document).ready(function() {
    

    $('.select-role').change(function() {
    
        var role = $(this).val();

        user_id = $(this).attr('id')

        axios.post('/admin/users/changeRole', {
            role: role,
            user_id: user_id
        })
        .then(response => {
            alert(response.data);
            // $('.category-slug').val(response.data.slug);
        });        
    
    });

});