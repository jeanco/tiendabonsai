function saveProductPromotion()
{
	cleanError();
	var ruta  = 'products/promotions';
	var formData = new FormData($('#product-promotion-form')[0]);

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
		 if (e.success == true) {
			 $.growl.notice({ message: "Se ha promocionado el producto"+e.name });
			 loadGridProducts($('#current_category_id').val(),$('#current_subcategory_id').val());
			 $('#add-promotion').modal('hide');
		 }
		 if (e.success ==false) {
			 $.growl.error({ message: "Ha ocurrido un error. Inténtelo de nuevo..."});

		 }
	 },
	 error:function(jqXHR, textStatus, errorThrown)
	 {
		  unlockWindow();
		  $('#product-promotion-error').append(msgError);
		  $.each(jqXHR.responseJSON, function( key, value ) {
			  if (key == "price_promotion") {
				  $.each(value, function( errores, eror ) {
					  $('#product-promotion-price-error').append("<li class='error-block'>"+eror+"</li>");
				  });
			  }
		  });
	 }

	 });
}
