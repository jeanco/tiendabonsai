function updateStatusPublishedValue(valueId, title, lastStatus)
{	
	var _text, _route;
	if (lastStatus == 1) {
		_text = "¿Dejar de publicar el valor "+title+"?";
	}
	else if (lastStatus == 0) {
		_text = "¿Publicar el valor "+title+"?";
	}

	_route = 'values/'+valueId+'/publish';

	swal({
	  title: _text,
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: 'Aceptar',
	  cancelButtonText:'Cancelar',
	  closeOnConfirm: true },
	  function(){
		lockWindow();
		$.ajaxSetup({
		  headers: {
			  'X-CSRF-TOKEN': $('input[name=_token]').val()
		  }
		});
		$.ajax({
			url: _route,
			data: {},
			type: 'PUT',
			success: function(result) {
				unlockWindow();
				if (result.success == true) {
					$.growl.notice({ message: "Se ha cambiado el estado de este valor" });
					
					$.get('values',function(data){
						loadGridValues(data);
					});
				}
				if (result.success == false) {
					$.growl.error({ message: "Ha ocurrido un error" });
				}
			}
		});
	  });
}