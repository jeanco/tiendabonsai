function updateService()
{
	cleanError();
	saveOrUpdateFormData('form_services','services',successSaveService,errorSaveService);
}

function successSaveService(data)
{
	if (data.success == true) {
		$.growl.notice({ message: "Se ha actualizado correctamente el servicio" });
		loadGridServices(data.services);
		$('#add-services').modal('hide');
	}
	else if(data.success == false) {
		$.growl.error({ message: "Ha ocurrido un error" });
	}
}
