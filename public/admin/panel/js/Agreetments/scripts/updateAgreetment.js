function updateAgreetment()
{
	cleanError();
	saveOrUpdateFormData('form_agreetments','agreetments',successSaveAgreetment,errorSaveAgreetment);
}

function successSaveAgreetment(data)
{
	if (data.success == true) {
		$.growl.notice({ message: "Se ha actualizado correctamente el convenio" });
		loadGridAgreetments(data.agreetments);
		$('#add-agreetments').modal('hide');
	}
	else if(data.success == false) {
		$.growl.error({ message: "Ha ocurrido un error" });
	}
}
