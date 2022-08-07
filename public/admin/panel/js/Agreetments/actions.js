$(document).on('ready',function(){
	$.get('agreetments',function(data){
		loadGridAgreetments(data.agreetments);
	});
});

$(document).on('click','.agreetment_edit',function(){
	cleanError();
	cleanModalAgreetments('edit');
	getAgreetmentToEdit($(this).data('index'));
});

$(document).on('click','.agreetment_delete',function(){
	deleteAgreetment($(this).data('index'));
});

$(document).on('click','.agreetment_published',function(){
	changeStatusPublishedAgreetment($(this).data('index'),$(this).data('agreetment_title'),$(this).data('published'));
});

$('#agreetment_save').on('click',function(){
	saveAgreetment();
});

$('#agreetment_update').on('click',function(){
	updateAgreetment();
});

$('#agreetment_add').on('click',function(){
	cleanError();
	cleanModalAgreetments("add");
	editor3($('#agreetment_description'));
});

function cleanModalAgreetments(operation){
	var _previewText = "";

	_previewText = '<label id="agreetment_preview_text">'+
		  					'<i class="glyphicon glyphicon-picture"></i>'+
		  					'<span class="u-ml3">Añadir Foto</span>'+
							'</label>';

	$('#agreetment_title').val('');
	$('#agreetment_website').val('');
	$('#agreetment_preview_image').empty();
	$('#agreetment_image').val('');
	$('#agreetment_published').prop('checked', true).change();
	$('#account-preview-image-text').show();
	
	$('#agreetment_description').summernote('destroy');
	document.querySelector('#agreetment_description').value = ``;

	$('#agreetment_preview_text').remove();

	$('#div_image-container_agreetments-modal').prepend(_previewText);

	if (operation == 'add') {
		$('#agreetment_method').remove();
		$('#agreetment_update').hide();
		$('#agreetment_save').show();
	}
	else if(operation =='edit'){
		$('#agreetment_method').remove();
		$('#form_agreetments').append('<input type="hidden" id="agreetment_method" name="_method" value="PUT" />');
		$('#agreetment_update').show();
		$('#agreetment_save').hide();
	}
}

//He puesto esta funcion aqui porque no me permite llamarla desde otro archivo js
function changeStatusPublishedAgreetment(agreetmentId,agreetmentName,lastStatus)
{
	var text;
	if (lastStatus == 1) {
		text = "¿Dejar de publicar el servicio "+agreetmentName+'?';
	}
	else if (lastStatus == 0) {
		text = "¿Publicar el servicio "+agreetmentName+'?';
	}
	swal({
	  title: text,
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: 'Aceptar',
	  cancelButtonText:'Cancelar',
	  closeOnConfirm: true },
	  function(){
		  var ruta = "agreetments/change-published-status";
		 lockWindow();
		$.ajaxSetup({
		  headers: {
			  'X-CSRF-TOKEN': $('input[name=_token]').val()
		  }
		});
		$.ajax({
			url: ruta,
			data: {'agreetmentId':agreetmentId,'lastStatus':lastStatus},
			type: 'PUT',
			success: function(result) {
				unlockWindow();
				if (result.success == true) {
					$.growl.notice({ message: "Se ha cambiado el estado del servicio" });
					$.get('agreetments',function(data){
						loadGridAgreetments(data.agreetments);
					});
				}
				if (result.success == false) {
					$.growl.error({ message: "Ha ocurrido un error al intentar cambiar el estado del convenio" });
				}
			}
		});
	  });
}
