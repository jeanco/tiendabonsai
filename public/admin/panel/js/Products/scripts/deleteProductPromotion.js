function deleteProductPromotion(productId,productName,pricePromotion)
{
	swal({   title: 'Anular promocion del '+productName+' S/.'+pricePromotion,
	  text: '¿Está usted seguro?',
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: 'Aceptar',
	  cancelButtonText:'Cancelar',
	  closeOnConfirm: true },
	  function(){
		  var ruta = "products/remove-promotion";
		 lockWindow();
		$.ajaxSetup({
		  headers: {
			  'X-CSRF-TOKEN': $('input[name=_token]').val()
		  }
		});
		$.ajax({
			url: ruta,
			data: {'productId':productId},
			type: 'PUT',
			success: function(result) {
				unlockWindow();
				if (result.success == true) {
					$.growl.notice({ message: "Se ha removido la promocion del producto"+ result.name });
					loadGridProducts($('#current_category_id').val(),$('#current_subcategory_id').val());
				}
				if (result.success == false) {
					$.growl.error({ message: "Ha ocurrido un error. Inténtelo de nuevo" });
				}
			}
		});
	  });
}
