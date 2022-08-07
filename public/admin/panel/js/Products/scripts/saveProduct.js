function saveProduct(){
	cleanError();
	var ruta  = 'products';
	var formData = new FormData($('#form_product')[0]);
	formData.append('category_id',$('#current_category_id').val());
	formData.append('subcategory_id',$('#current_subcategory_id').val());

	lockWindow();
	$.ajaxSetup({
		headers: {
			'csrftoken': $('input[name=_token]').val()
		}
	});
	$.ajax({
	   url : ruta,
	   type: 'post',
	   data: formData,
	   contentType: false,
	   processData: false,
	   success: function(e){
		 unlockWindow();
		 successSaveProduct(e);
	 },
	 error:function(jqXHR, textStatus, errorThrown)
	 {
		  unlockWindow();
		  errorSaveProduct(jqXHR, textStatus, errorThrown);
	 }

	 });
}

function successSaveProduct(data){
	if (data.success == false ) {
		$.growl.error({ message: "Ha ocurrido un error" })
	}
	else if(data.success == true){
		$.growl.notice({ message: "Se ha guardado el producto "+data.product.name  });
		$('#product_id').val(data.product.id);
		$('#text-product-modal-title').text('Imágenes del Producto '+data.product.name);
		$('#form_product').hide();
		$('#product_dropzone').show();
		$('#product_save').hide();
		$('#product_close').show();

		//Show product after save
		$('#product-name__after-save').append(data.product.name);
		$('#product-price__after-save').append(data.product.price);
		$('#product-description__after-save').append(data.product.description);

		$('#text-product-modal-title').text('Imágenes del producto '+data.product.name);

		statusCloseModalProduct = true;
		loadGridProducts($('#current_category_id').val(),$('#current_subcategory_id').val());

		$('#product-swiper-container').show();

		if (statusCarouselProduct == false) {
			statusCarouselProduct = true;
			startCarouselProduct();
		}
	}
};

function errorSaveProduct(jqXHR, textStatus, errorThrown){
	$('#product-error').append(msgError);
	console.log(jqXHR.responseJSON);

	$.each(jqXHR.responseJSON, function( key, value ) {
		if (key == "name") {
			$.each(value, function( errores, eror ) {
				$('#product-error-name').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		else if (key == "description") {
			$.each(value, function( errores, eror ) {
				$('#product-error-description').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		else if (key == "price") {
			$.each(value, function( errores, eror ) {
				$('#product-error-price').append("<li class='error-block'>"+eror+"</li>");
			});
		};
	});
};
