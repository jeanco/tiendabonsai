function deleteService(serviceId)
{
	swal({   title: 'Borrar el servicio',
	  text: '¿Está usted seguro?',
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: 'Aceptar',
	  cancelButtonText:'Cancelar',
	  closeOnConfirm: true },
	  function(){
		  var ruta = "services";
		 lockWindow();
		$.ajaxSetup({
		  headers: {
			  'X-CSRF-TOKEN': $('input[name=_token]').val()
		  }
		});
		$.ajax({
			url: ruta,
			data: {'serviceId':serviceId},
			type: 'DELETE',
			success: function(result) {
				unlockWindow();
				successDeleteService(result)
			}
		});
});
}

function successDeleteService(data)
{
	if (data.success == true) {
		$.growl.notice({ message: "Se ha borrado el servicio" });
		loadGridServices(data.services);
	}
	else if(data.success = false){
		$.growl.error({ message: "Ha ocurrido un error al eliminar el servicio" });
	}
}
