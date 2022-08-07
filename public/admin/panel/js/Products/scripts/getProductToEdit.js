function getProductToEdit(productId){
	var ruta = 'products/'+productId;
	ajaxAll_GET(ruta,successGetProductToEdit);
}

function successGetProductToEdit(data){
	if (data.product) {
		$('#product_close').hide();

		$('#product_id').val(data.product.id);
		// $('#product_category_id').val(data.product.category_id);
		$('#product_name').val(data.product.name);
		$('#product_description').val(data.product.description);
		editor2('product_description');
		$('#product_price').val(parseInt(data.product.price));
		// $('#product_min_quantity').val(data.product.min_quantity);
		$('#product_video').val(data.product.video);
		// $('#product_price_promotion').val(data.product.price_promotion);
		// $('#product_promotion_available').val(data.product.promotion_available);
		//$('#product_published').val(data.product.published);
		// $('#product_published').prop('checked', false).change();
		// if (data.product.published === '1') {
		// 	$('#product_published').prop('checked', true).change();
		// }

		if (data.product.pdf) {
			$('#product_preview_text').hide();
			$('#product_preview_pdf').append('<img src="http://ecotope.com/wp-content/uploads/2016/11/pdf-icon-1.png" style="display: inline;">');
		}

		$('#product_save').hide();
		$('#product_update').show();
	}
	else {
		alert('Producto no encontrado');
	}
}
