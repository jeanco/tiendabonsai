function updateProduct(){
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
		 successUpdateProduct(e);
	 },
	 error:function(jqXHR, textStatus, errorThrown)
	 {
		  unlockWindow();
		  errorSaveProduct(jqXHR, textStatus, errorThrown);
	 }
	 });
}
function successUpdateProduct(data){
	if (data.success == false ) {
		$.growl.error({ message: "Ha ocurrido un error" })
	}
	else if(data.success == true){
		$.growl.notice({ message: "Se ha actualizado el producto "+data.product.name  })

		$('#product_id').val(data.product.id);
		$('#text-product-modal-title').text('Imágenes del Producto '+data.product.name);

		$('#form_product').hide();
		$('#product_dropzone').show();
		$('#product_update').hide();
		$('#product_close').show();

		//Show product after save
		$('#product-name__after-save').append(data.product.name);
		$('#product-price__after-save').append(data.product.price);
		$('#product-description__after-save').append(data.product.description);

		$('#text-product-modal-title').text('Imágenes del producto '+data.product.name);

		if (statusCarouselProduct == false) {
			statusCarouselProduct = true;
			startCarouselProduct();
		}

		$.get('contents/'+data.product.id+'/2/1',function(data){
			if (data.images.length) {
				addImageToSlide(swiperProduct,$('#product-swiper-container'),data.images);
			}
			else {
				$('#product-swiper-container').hide();
			}
		});

		statusCloseModalProduct = true;
		$('#products_grid').empty();
		loadGridProducts($('#current_category_id').val(),$('#current_subcategory_id').val());

	}
}
