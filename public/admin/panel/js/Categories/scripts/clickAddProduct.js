function clickAddProduct(element){
	var idCategory = element.data('index');
	console.log(idCategory);
	var ruta = 'category/'+idCategory;
	ajaxAll_GET(ruta,successClickAddProduct);
}
function successClickAddProduct(data){
	if (data.category) {
		$('#category_name').text(data.category.name);
		$('#category_description').text(data.category.content);
		$('#category_image').attr('src',data.category.image);

	}
	else {
		alert("No existe datos de la categoria");
	}
}
