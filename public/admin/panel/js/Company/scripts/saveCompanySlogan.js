function saveCompanySlogan(){
	var formData = new FormData($('#form-company-slogan')[0]);
	var ruta ="companies/slogan";
	ajaxall_POST_formData(ruta,formData,successSaveCompanySlogan,errorSaveCompanySlogan);
}

function successSaveCompanySlogan(data){
	if (data.success == false) {
		$.growl.error({ message: "Ha ocurrido un error. Inténtelo de nuevo!" })
	}
	else if(data.success == true){
		$.growl.notice({ message: "Se ha actualizado correctamente los Slogans!" })
	}
}
function errorSaveCompanySlogan(jqXHR, textStatus, errorThrown){

}
