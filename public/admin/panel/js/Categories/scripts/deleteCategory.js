function deleteCategory(categoryId){

					swal({   title: 'Borrar categoría',
					  text: '¿Está usted seguro?',
					  type: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: "#DD6B55",
					  confirmButtonText: 'Aceptar',
					  cancelButtonText: 'Cancelar',
					  closeOnConfirm: true },
					  function(){
						//  alert("En construccion...");
						  var ruta = 'categories';
						  lockWindow();
						  $.ajaxSetup({
							headers: {
								'X-CSRF-TOKEN': $('input[name=_token]').val()
							}
						  });
						  $.ajax({
							  url: ruta,
							  data: {'categoryId':categoryId},
							  type: 'DELETE',
							  success: function(result) {
								  unlockWindow();
								  if (result.success == true) {
									  $.growl.notice({ message: "Se ha borrado la categoría" });
									  location.reload();
								  }
								  else if(result.success == false) {
									  $.growl.error({ message: "Ha ocurrido un error" });
								  }
							  }
						  });
					  });
}

function successDeleteCategory(data){
	if (data.success == 0) {
		$.growl.error({ message: "Ha ocurrido un error al tratar de eliminar la categoría" })
	}
	else if(data.success ==2){
		$.growl.notice({ message: "Se ha eliminado la categoría" });
		itemCategory.remove();
	}
}
function errorDeleteCategory(jqXHR, textStatus, errorThrown){

}
