function getTestimonyToEdit(testimonyId)
{
    $.get('testimonies/'+testimonyId, function(data){
        $('#testimony_id').val(data.id);
        $('#testimony_name').val(data.full_name);
        $('#testimony_description').val(data.description);
        $('#testimony_city').val(data.city);

        if (data.image) {
            $('#testimony_preview-image').append('<img src="'+data.image+'" style="display: block;">');
            $('#testimony_preview-text').hide();
        }
    });
}