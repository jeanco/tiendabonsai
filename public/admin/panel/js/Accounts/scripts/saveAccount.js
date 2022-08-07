function saveAccount(){
	cleanError();
	saveOrUpdateFormData('form_account','accounts',successSaveAccount,errorSaveAccount);
}

function successSaveAccount(data){
	if (data.success == true) {
		$.growl.notice({ message: "Se ha guardado correctamente la cuenta" });
		loadGridAccounts(data.accounts);
		$('#add-account').modal('hide');
	}
	else if(data.success == false) {
		$.growl.error({ message: "Ha ocurrido un error" });
	}
}

function errorSaveAccount(jqXHR, textStatus, errorThrown){
	$('#account-error').append("Corrija los siguientes campos por favor!");
	$.each(jqXHR.responseJSON, function( key, value ) {
		if (key == "account_name") {
			$.each(value, function( errores, eror ) {
				$('#account-error-name').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		else if (key == "account_number") {
			$.each(value, function( errores, eror ) {
				$('#account-error-number').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		else if (key == "account_holder") {
			$.each(value, function( errores, eror ) {
				$('#account-error-holder').append("<li class='error-block'>"+eror+"</li>");
			});
		};
	});
}
