function updateAccount(){
	cleanError();
	saveOrUpdateFormData('form_account','accounts',successUpdateAccount,errorSaveAccount);
}

function successUpdateAccount(data){
	if (data.success == true) {
		$.growl.notice({ message: "Se ha actualizado correctamente la cuenta" });
		loadGridAccounts(data.accounts);
		$('#add-account').modal('hide');
	}
	else if(data.success == false) {
		$.growl.error({ message: "Ha ocurrido un error" });
	}
}
