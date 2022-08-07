function saveCategory(){
	cleanError();
	saveOrUpdateFormData('form_category','categories',successSaveCategory,errorSaveCategory);
}
function successSaveCategory(data){
	if (data.success == false ) {
		$.growl.error({ message: "Ha ocurrido un error" })
	}
	else if(data.success == true){
		$.growl.notice({ message: "Se ha guardado la categoria "+data.category.name})
		$('#add-category').modal('hide');
		
		cleanModalSubcategory("add");
		$('#subcategory_category_id').val(data.category.id);
		$('#label-subcategory_category-name').text("Categoría: " +data.category.name);
		$('#subcategory-modal').modal('show');
		statusCloseModalSubcategory = 1;
	}
}
function errorSaveCategory(jqXHR, textStatus, errorThrown){
	$('#category-error').append(msgError);
	$.each(jqXHR.responseJSON, function( key, value ) {
		if (key == "name") {
			$.each(value, function( errores, eror ) {
				$('#category-error-name').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		else if (key == "content") {
			$.each(value, function( errores, eror ) {
				$('#category-error-content').append("<li class='error-block'>"+eror+"</li>");
			});
		};
	});
}
