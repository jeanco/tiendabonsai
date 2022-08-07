$(document).on('ready', function(){
	$.get('values',function(data){
		loadGridValues(data);
	});
});

$('#value__add').on('click', function(){
	cleanError();
	cleanValueModal();
	$('#value__update').hide();
});

$(document).on('click', '.value__publish', function(){
	updateStatusPublishedValue($(this).data('value_id'), $(this).data('value_title'), $(this).data('published'));
});

$(document).on('click', '.value__edit', function(){
	cleanError();
	cleanValueModal();
	$('#value__save').hide();
	addInputPut($('#form_value'), 'value_method');
	getValueToEdit($(this).data('value_id'));
});

$(document).on('click', '.value__delete', function(){
	deleteValue($(this).data('value_id'));
});

$('#value__save').on('click', function($query){
	cleanError();
	saveValue();
});

$('#value__update').on('click', function($query){
	cleanError();
	updateValue();
});
	
function cleanValueModal()
{	
	var _previewText = "";
	_previewText = '<label id="value_preview-text">'+
		  					'<i class="glyphicon glyphicon-picture"></i>'+
		  					'<span class="u-ml3">Añadir Foto</span>'+
					'</label>';

	$('#value_preview-text').remove();
	$('#value_container-image').prepend(_previewText);
	$('#value_preview-image').empty();
	$('#value_image').val('');

	$('#value_method').remove();

	$('#value_id').val('');
	$('#value_title').val('');
	$('#value_description').val('');

	$('#value__save').show();
	$('#value__update').show();

}