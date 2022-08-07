function activateUser(userId)
{
	swal({   title: 'Activar al usuario',
	  text: '¿Está usted seguro?',
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: 'Aceptar',
	  cancelButtonText:'Cancelar',
	  closeOnConfirm: true },
	  function(){
		 var ruta = "users/"+userId+'/activate';
		 lockWindow();
		$.ajaxSetup({
		  headers: {
			  'X-CSRF-TOKEN': $('input[name=_token]').val()
		  }
		});
		$.ajax({
			url: ruta,
			data: {},
			type: 'PUT',
			success: function(result) {
				unlockWindow();
				successActivateUser(result)
			}
		});
	});
}

function successActivateUser(data)
{
	if (data.success == true) {
		$.growl.notice({ message: "Se ha activado al usuario" });
		$.get('users',function(data){
			loadGridUsers(data.users);
		});
	}
	else if(data.success = false){
		$.growl.error({ message: "Ha ocurrido un error..." });
	}
}