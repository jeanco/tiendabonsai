function deleteAgreetment(agreetmentId)
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
		  var ruta = "agreetments";
		 lockWindow();
		$.ajaxSetup({
		  headers: {
			  'X-CSRF-TOKEN': $('input[name=_token]').val()
		  }
		});
		$.ajax({
			url: ruta,
			data: {'agreetmentId':agreetmentId},
			type: 'DELETE',
			success: function(result) {
				unlockWindow();
				successDeleteAgreetment(result)
			}
		});
});
}

function successDeleteAgreetment(data)
{
	if (data.success == true) {
		$.growl.notice({ message: "Se ha borrado el convenio" });
		loadGridAgreetments(data.agreetments);
	}
	else if(data.success = false){
		$.growl.error({ message: "Ha ocurrido un error al eliminar el convenio" });
	}
}
