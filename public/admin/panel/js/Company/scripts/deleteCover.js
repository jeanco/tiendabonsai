function deleteCover(coverId){
	swal({   title: 'Borrar una portada',
	  text: '¿Está usted seguro?',
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: 'Aceptar',
	  cancelButtonText: 'Cancelar',
	  closeOnConfirm: true },
	  function(){
		  var ruta = "contents";
		 lockWindow();
		$.ajaxSetup({
		  headers: {
			  'X-CSRF-TOKEN': $('input[name=_token]').val()
		  }
		});
		$.ajax({
			url: ruta,
			data: {'contentId':coverId},
			type: 'DELETE',
			success: function(result) {
				unlockWindow();
				successDeleteCover(result)
			}
		});
	  });
}

function successDeleteCover(data){
	if (data.success == false) {
		$.growl.error({ message: "Ha ocurrido un error al eliminar la imagen" });
	}
	else if(data.success == true) {
		$.growl.notice({ message: "Se ha eliminado la imagen" });
		itemCover.remove();
	}
}

function errorDeleteCover(jqXHR, textStatus, errorThrown){

}
