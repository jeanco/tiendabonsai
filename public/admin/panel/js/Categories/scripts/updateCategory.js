function updateCategory(){
	cleanError();
	saveOrUpdateFormData('form_category','categories',successUpdateCategory,errorSaveCategory);
}
function successUpdateCategory(data){
	console.log(data);
	if (data.success == false ) {
		$.growl.error({ message: "Ha ocurrido un error" })
	}
	else if(data.success == true){
		$.growl.notice({ message: "Se ha actualizado la categoria "+data.category.name})
		// $('#current_category_name').text(data.category.name);
		// $('#current_category_content').text(data.category.content);
		$('#add-category').modal('hide');
		location.reload();
	}
}
