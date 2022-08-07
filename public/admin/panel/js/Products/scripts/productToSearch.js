function productToSearch(productName){
	if (productName != '') {
		let route = 'products/search/'+productName+'/'+$('#current_category_id').val()+'/'+$('#current_subcategory_id').val();
		
		$.get(route, function(data){
			successLoadGridProducts(data);
		});
	}
	else {
		loadGridProducts($('#current_category_id').val(),$('#current_subcategory_id').val());
	}
}

