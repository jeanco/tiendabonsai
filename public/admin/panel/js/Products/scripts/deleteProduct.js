function deleteProduct(productId){
		swal({   title: "Borrar producto",
		  text: "¿Está usted seguro?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Aceptar",
		  cancelButtonText: "Cancelar",
		  closeOnConfirm: true },
		  function(){
			  var ruta = "products";
			  lockWindow();
			  $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('input[name=_token]').val()
				}
			  });
			  $.ajax({
				  url: ruta,
				  data: {'productId':productId},
				  type: 'DELETE',
				  success: function(result) {
					  unlockWindow();
					  successDeleteProduct(result);
				  }
			  });
		  });
}

function successDeleteProduct(data){
	if (data.success == false) {
		$.growl.error({ message: "Ha ocurrido un error" })
	}
	else if(data.success == true) {
		$.growl.notice({ message: "Se ha borrado el producto" })
		loadGridProducts($('#current_category_id').val(),$('#current_subcategory_id').val());
	}
}
