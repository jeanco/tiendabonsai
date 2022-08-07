$(document).on('ready', function(){

    $.get('testimonies', function(data){
        loadGridTestimonies(data);
    });
});

$('#testimony__add').on('click', function(){
    cleanModalTestimony('add');
});

$(document).on('click', '.testimony__edit', function(){
    cleanModalTestimony('edit');
    getTestimonyToEdit($(this).data('index'));
});

$(document).on('click', '.testimony__change-published', function(){
    changePublishTestimony($(this).data('index'), $(this).data('published'));
});

$(document).on('click', '.testimony__delete', function(){
    deleteTestimony($(this).data('index'));
});

$('#testimony__update').on('click', function(){
    cleanError();
    updateTestimony();
});

$('#testimony__save').on('click', function(){
    cleanError();
    saveTestimony();
});

function cleanModalTestimony(action){
    $('#testimony_name').val('');
    $('#testimony_description').val('');
    $('#testimony_city').val('');

    $('#testimony_method').remove();
    $('#testimony_preview-image').empty();
    $(`#testimony_image`).val('');
    let _previewText = '';

    _previewText = '<label id="testimony_preview-text">'+
                            '<i class="glyphicon glyphicon-picture"></i>'+
                            '<span class="u-ml3">Añadir Foto</span>'+
                            '</label>';

    $('#testimony_preview-text').remove();
    $('#testimony_image-container').prepend(_previewText);


    if (action=='add') {
        $('#testimony__save').show();
        $('#testimony__update').hide();
    } else if(action == 'edit'){
        addInputPut($('#form_testimony'), 'testimony_method')
        $('#testimony__save').hide();
        $('#testimony__update').show();
    }
}
