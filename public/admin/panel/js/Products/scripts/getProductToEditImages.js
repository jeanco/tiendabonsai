function getProductToEditImages(productId)
{
	$('#form_product').hide();

	$.get('products/'+productId,function(data){
		if (data.product) {
			$('#edit-item').modal('show');

			$('#product_save').hide();
			$('#product_update').hide();

			$('#product_id').val(data.product.id);
			$('#product-name__after-save').append(data.product.name);
			if (data.product.promotion_available == true) {
				$('#product-price__after-save').append(data.product.price_promotion);
			}
			else {
				$('#product-price__after-save').append(data.product.price);
			}
			$('#product-description__after-save').append(data.product.description);

			$('#text-product-modal-title').text('Imágenes del producto '+data.product.name);

			setTimeout(function () {
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
			}, 1000);
		}
		else {
			alert("Error");
		}
	})
}
