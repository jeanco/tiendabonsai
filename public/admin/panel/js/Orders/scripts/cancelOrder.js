function cancelOrder()
{
	swal({   title: "Cancelar Orden",
	  text: "¿Estás seguro?",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Aceptar",
	  cancelButtonText:"Cancelar",
	  closeOnConfirm: true },
	  function(){
		  var ruta = "orders/cancel";
		  lockWindow();
		  $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('input[name=_token]').val()
			}
		  });
		  $.ajax({
			  url: ruta,
			  data: {'orderId':$('#order-id').val()},
			  type: 'PUT',
			  success: function(result) {
				  unlockWindow();
				  if (result.success == true) {
					  $.growl.notice({ message: "Ha cancelado la orden" });
					  $('#view-order').modal('hide');
					  filterOrders();
				  }
				  else if(result.success == false) {
					  $.growl.error({ message: "Ha ocurrido un error. Inténtelo de nuevo..." });
				  }
			  }
		  });
	  });
}
