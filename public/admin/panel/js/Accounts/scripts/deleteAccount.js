function deleteAccount(accountId){
	swal({   title: 'Borrar la cuenta',
	  text: '¿Está usted seguro?',
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: 'Aceptar',
	  cancelButtonText: 'Cancelar',
	  closeOnConfirm: true },
	  function(){
		  var ruta = "accounts";
		 lockWindow();
		$.ajaxSetup({
		  headers: {
		      'X-CSRF-TOKEN': $('input[name=_token]').val()
		  }
		});
		$.ajax({
			url: ruta,
			data: {'accountId':accountId},
			type: 'DELETE',
			success: function(result) {
				unlockWindow();
				successDeleteAccount(result)
			}
		});
});
}
function successDeleteAccount(data){
	if (data.success == false) {
		$.growl.error({ message: "Ha ocurrido un error al eliminar la cuenta" });
	}
	else if(data.success == true) {
		$.growl.notice({ message: "Se ha borrado la cuenta" });
		loadGridAccounts(data.accounts);
	}
}
