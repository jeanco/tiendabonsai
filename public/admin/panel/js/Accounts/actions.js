



$(document).on('ready',function(){
	$.get('accounts',function(data){
		loadGridAccounts(data.accounts)
	});
});

$('#account_add').on('click',function(){
	cleanError();
	cleanModalAccount('add');
});

$('#account_save').on('click',function(){
	saveAccount();
});

$(document).on('click','.account_edit',function(){
	cleanModalAccount('edit');
	getAccountToEdit($(this).data('index'));
});

$('#account_update').on('click',function(){
	updateAccount();
});

$(document).on('click','.account_publish',function(){
	changeStatusPublished($(this).data('index'),$(this).data('account_number'),$(this).data('published'));
});

$(document).on('click','.account_delete',function(){
	cleanModalAccount('add');
	deleteAccount($(this).data('index'));
})

function cleanModalAccount(operation){
	var _previewText = '';
	
	_previewText = '<label id="label_preview-text_account-image">'+
                    '<i class="glyphicon glyphicon-picture"></i>'+
                    '<span class="u-ml3">Añadir Foto</span>'+
                  	'</label>';
    
	$('#account_name').val('');
	$('#account_number').val('');
	$('#account_cci').val('');
	$('#account_holder').val('');
	$('#account_preview_image').empty();
	$('#bank_image').val('');
	$('#account_published').prop('checked', true).change();
	$('#account-preview-image-text').show();

	$('#label_preview-text_account-image').remove();

	$('#div_image-container_accounts-modal').prepend(_previewText);


	if (operation == 'add') {
		$('#account_method').remove();
		$('#account_update').hide();
		$('#account_save').show();
	}
	else if(operation =='edit'){
		$('#account_method').remove();
		$('#form_account').append('<input type="hidden" id="account_method" name="_method" value="PUT" />');
		$('#account_update').show();
		$('#account_save').hide();
	}
}

//He puesto esta funcion aqui porque no me permite llamarla desde otro archivo js
function changeStatusPublished(accountId,accountNumber,lastStatus)
{
	var text;
	if (lastStatus == 1) {
		text = "¿Dejar de publicar la cuenta con número: "+accountNumber+'?';
	}
	else if (lastStatus == 0) {
		text = "¿Publicar la cuenta con número "+accountNumber+'?';
	}

	swal({   title: text,
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: 'Aceptar',
	  cancelButtonText:'Cancelar',
	  closeOnConfirm: true },
	  function(){
		  var ruta = "accounts/change-published-status";
		 lockWindow();
		$.ajaxSetup({
		  headers: {
			  'X-CSRF-TOKEN': $('input[name=_token]').val()
		  }
		});
		$.ajax({
			url: ruta,
			data: {'accountId':accountId,'lastStatus':lastStatus},
			type: 'PUT',
			success: function(result) {
				unlockWindow();
				if (result.success == true) {
					$.growl.notice({ message: "Se ha cambiado el estado de la cuenta" });
					$.get('accounts',function(data){
						loadGridAccounts(data.accounts);
					});
				}
				if (result.success == false) {
					$.growl.error({ message: "Ha ocurrido un error al intentar cambiar el estado de la cuenta" });
				}
			}
		});
	  });
}
