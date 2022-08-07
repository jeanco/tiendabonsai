function confirmOrder(message)
{
	swal({   title: "Confirmar Orden",
	  text: "¿Estás seguro?",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Aceptar",
	  cancelButtonText:"Cancelar",
	  closeOnConfirm: true },
	  function(){
		  var ruta = "orders/confirm";
		  lockWindow();
		  $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('input[name=_token]').val()
			}
		  });
		  $.ajax({
			  url: ruta,
			  data: {'orderId':$('#order-id').val(), 'orderMessage':message},
			  type: 'PUT',
			  success: function(result) {
				  unlockWindow();
				  if (result.success == true) {
					  $.growl.notice({ message: "Ha confirmado la orden" });
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
