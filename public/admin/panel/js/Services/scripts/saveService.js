function saveService()
{
	cleanError();
	saveOrUpdateFormData('form_services','services',successSaveService,errorSaveService);
}

function successSaveService(data)
{
	if (data.success == true) {
		$.growl.notice({ message: "Se ha guardado correctamente el servicio" });
		loadGridServices(data.services);
		$('#add-services').modal('hide');
	}
	else if(data.success == false) {
		$.growl.error({ message: "Ha ocurrido un error" });
	}
}

function errorSaveService(jqXHR, textStatus, errorThrown)
{
	$('#service-error').append("Corrija los siguientes campos por favor!");
	$.each(jqXHR.responseJSON, function( key, value ) {
		if (key == "name") {
			$.each(value, function( errores, eror ) {
				$('#service-error-name').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		else if (key == "description") {
			$.each(value, function( errores, eror ) {
				$('#service-error-description').append("<li class='error-block'>"+eror+"</li>");
			});
		}
	});
}
