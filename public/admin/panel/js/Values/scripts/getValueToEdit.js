function getValueToEdit(valueId)
{
	$.get('values/'+valueId, function(value){
		$('#value_id').val(value.id);
		$('#value_title').val(value.title);
		$('#value_description').val(value.description);

		if (value.image) {
			$('#value_preview-image').append('<img src="'+value.image+'" style="display: block;">');
			$('#value_preview-text').hide();
		}
	});
}