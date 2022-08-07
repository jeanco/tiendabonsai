function getCategoryToEdit(categoryId){
	var ruta = 'categories/'+categoryId;
	ajaxAll_GET(ruta,successGetCategoryToEdit)
}

function successGetCategoryToEdit(data){
	if (data.category) {
		$('#category_id').val(data.category.id);
		$('#category_name').val(data.category.name);
		$('#category_description').val(data.category.content);
		
		$('#category_published').prop('checked', false).change();
		if (data.category.published == 1) {
			$('#category_published').prop('checked', true).change();
		}
		if (data.category.image) {
			$('#category_preview_image_text').hide();
			$('#category_preview_image').append('<img src="'+data.category.image+'" style="display: block;">');
		}

		$('#category_save').hide();
		$('#category_update').show();
	}
	else {
		alert('Error');
	}
}
