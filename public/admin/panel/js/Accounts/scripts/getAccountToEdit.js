function getAccountToEdit(accountId){
	ajaxAll_GET('accounts/'+accountId,successGetAccountToEdit)
}

function successGetAccountToEdit(data){
	if (data.account) {
		$('#account_id').val(data.account.id);
		$('#select_account-type_accounts').val(data.account.account_type);
		$('#select_account-currency_accounts').val(data.account.account_currency);
		$('#account_number').val(data.account.account_number);
		$('#account_cci').val(data.account.account_cci);
		$('#account_holder').val(data.account.account_holder);

		$('#account_published').prop('checked', false).change();
		if (data.account.published === '1') {
			$('#account_published').prop('checked', true).change();
		}

		if (data.account.bank_image) {
			$('#account_preview_image').append('<img src="'+data.account.bank_image+'" style="display: block;">');
		}
	}
}
