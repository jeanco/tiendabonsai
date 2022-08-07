function changeStatusPublishedProduct(productId,productName,lastStatus)
{
	var text;
	if (lastStatus == 1) {
		text = "¿Dejar de publicar en la tienda el producto "+productName+'?';
	}
	else if (lastStatus == 0) {
		text = "¿Publicar en la tienda el producto "+productName+'?';
	}

	swal({   title: text,
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: 'Aceptar',
	  cancelButtonText:'Cancelar',
	  closeOnConfirm: true },
	  function(){
		  var ruta = "products/change-published-status";
		 lockWindow();
		$.ajaxSetup({
		  headers: {
			  'X-CSRF-TOKEN': $('input[name=_token]').val()
		  }
		});
		$.ajax({
			url: ruta,
			data: {'productId':productId,'lastStatus':lastStatus},
			type: 'PUT',
			success: function(result) {
				unlockWindow();
				if (result.success == true) {
					$.growl.notice({ message: "Se ha cambiado el estado del producto" });
					loadGridProducts($('#current_category_id').val(),$('#current_subcategory_id').val());

				}
				if (result.success == false) {
					$.growl.error({ message: "Ha ocurrido un error al intentar cambiar el estado del producto" });
				}
			}
		});
	  });
}
