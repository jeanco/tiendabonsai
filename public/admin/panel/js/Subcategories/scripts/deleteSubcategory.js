function deleteSubcategory(subcategoryId)
{
			swal({   title: "Borrar subcategoría",
			  text: "¿Estás seguro?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Aceptar",
			  cancelButtonText: "Cancelar",
			  closeOnConfirm: true },
			  function(){
				  var ruta = "subcategories";
				  lockWindow();
				  $.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('input[name=_token]').val()
					}
				  });
				  $.ajax({
					  url: ruta,
					  data: {'subcategoryId':subcategoryId},
					  type: 'DELETE',
					  success: function(result) {
						  unlockWindow();
						  if (result.success == true) {
							  $.growl.notice({ message: "Se ha borrado la subcategoría" });
							  location.reload();
						  }
						  else if(result.success == false) {
							  $.growl.error({ message: "Ha ocurrido un error" });
						  }
					  }
				  });
			  });
}
