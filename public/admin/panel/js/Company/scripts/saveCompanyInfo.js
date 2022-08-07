function saveCompanyInfo(){
		cleanError();
		var formData = new FormData($('#form_company')[0]);
		var ruta ="companies";
		ajaxall_POST_formData(ruta,formData,successSaveCompany,errorSaveCompany);
}

function successSaveCompany(data){
	if (data.success == false) {
		$.growl.error({ message: "Ha ocurrido un error. Inténtelo de nuevo!" })
	}
	else if(data.success == true){
		$('#company_logo').val('');
		$('#company_logo_white').val('');
		$.growl.notice({ message: "Se ha actualizado los datos de la empresa" });
	}
}

function errorSaveCompany(jqXHR, textStatus, errorThrown){
	$('#company-error').append(msgError);
	$.each(jqXHR.responseJSON, function( key, value ) {
		if (key == "name_company") {
			$.each(value, function( errores, eror ) {
				$('#company-error-name').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		if (key == "ruc") {
			$.each(value, function( errores, eror ) {
				$('#company-error-ruc').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		if (key == "email") {
			$.each(value, function( errores, eror ) {
				$('#company-error-email').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		else if (key == "business_name") {
			$.each(value, function( errores, eror ) {
				$('#company-error-business-name').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		else if (key == "cel") {
			$.each(value, function( errores, eror ) {
				$('#company-error-cel').append("<li class='error-block'>"+eror+"</li>");
			});
		}
	});
}
