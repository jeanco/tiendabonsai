function saveAgreetment()
{
	cleanError();
	saveOrUpdateFormData('form_agreetments','agreetments',successSaveAgreetment,errorSaveAgreetment);
}

function successSaveAgreetment(data)
{
	if (data.success == true) {
		$.growl.notice({ message: "Se ha guardado correctamente el convenio" });
		loadGridAgreetments(data.agreetments);
		$('#add-agreetments').modal('hide');
	}
	else if(data.success == false) {
		$.growl.error({ message: "Ha ocurrido un error" });
	}
}

function errorSaveAgreetment(jqXHR, textStatus, errorThrown)
{
	$('#agreetment-error').append("Corrija los siguientes campos por favor!");
	$.each(jqXHR.responseJSON, function( key, value ) {
		if (key == "name") {
			$.each(value, function( errores, eror ) {
				$('#agreetment-error-name').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		else if (key == "description") {
			$.each(value, function( errores, eror ) {
				$('#agreetment-error-description').append("<li class='error-block'>"+eror+"</li>");
			});
		}
	});
}
