function deleteValue(valueId)
{
	swal({   title: 'Borrar el Valor',
	text: '¿Está usted seguro?',
	type: 'warning',
	showCancelButton: true,
	confirmButtonColor: "#DD6B55",
	confirmButtonText: 'Aceptar',
	cancelButtonText: 'Cancelar',
	closeOnConfirm: true },
	function(){
		
	  var ruta = 'values/'+valueId;
	  lockWindow();
	  $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('input[name=_token]').val()
		}
	  });
	  $.ajax({
		  url: ruta,
		  data: {},
		  type: 'DELETE',
		  success: function(result) {
			  unlockWindow();
			  if (result.success == true) {
					$.growl.notice({ message: "Se ha borrado el valor" });
			  		$.get('values', function(data){
			  			loadGridValues(data);
			  		});
			  }
			  else if(result.success == false) {
				  $.growl.error({ message: "Ha ocurrido un error" });
			  }
		  }
	  });
	});

}