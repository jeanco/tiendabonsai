function updateValue()
{
	var _route  = 'values/'+$('#value_id').val();
	var formData = new FormData($('#form_value')[0]);
	
	lockWindow();
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('input[name=_token]').val()
		}
	});
	$.ajax({
	   url : _route,
	   type: 'POST',
	   data: formData,
	   contentType: false,
	   processData: false,
		success: function(e){
			unlockWindow();
			if (e.success == false) {
				$.growl.error({ message: "Ha ocurrido un error" });
			}
			else if(e.success == true){
				$.growl.notice({ message: "Se ha actualizado el Valor" });
				$('#value-modal').modal('hide');

				$.get('values',function(data){
				loadGridValues(data);
				});
			}
		},
		error:function(jqXHR, textStatus, errorThrown)
		{	
			unlockWindow();
			$('#value-error').append(msgError);
			$.each(jqXHR.responseJSON, function( key, value ) {
			if (key == "title") {
				$.each(value, function( errores, eror ) {
					$('#value-error-title').append("<li class='error-block'>"+eror+"</li>");
				});
			};
			});
		}

	 });
}