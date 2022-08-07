$(document).on('ready',function(){
	$.get('services',function(data){
		loadGridServices(data.services);
	});
});

$(document).on('click','.service_edit',function(){
	cleanError();
	cleanModalServices('edit');
	getServiceToEdit($(this).data('index'));
});

$(document).on('click','.service_delete',function(){
	deleteService($(this).data('index'));
});

$(document).on('click','.service_published',function(){
	changeStatusPublishedService($(this).data('index'),$(this).data('service_name'),$(this).data('published'));
});

$('#service_save').on('click',function(){
	saveService();
});

$('#service_update').on('click',function(){
	updateService();
});

$('#service_add').on('click',function(){
	cleanError();
	cleanModalServices("add");
	addSummernoteEditor($('#service_content'), 200);
});

function cleanModalServices(operation){
	var _previewText = "";

	_previewText = '<label id="service_preview_text">'+
		  					'<i class="glyphicon glyphicon-picture"></i>'+
		  					'<span class="u-ml3">Añadir Foto</span>'+
							'</label>';

	$('#service_name').val('');
	destroySummernote($('#service_content'));
	getElement('#service_content').value = ``;
	
	$('#service_preview_image').empty();
	$('#service_image').val('');
	$('#service_published').prop('checked', true).change();
	$('#account-preview-image-text').show();

	$('#service_preview_text').remove();

	$('#div_image-container_services-modal').prepend(_previewText);

	if (operation == 'add') {
		$('#service_method').remove();
		$('#service_update').hide();
		$('#service_save').show();
	}
	else if(operation =='edit'){
		$('#service_method').remove();
		$('#form_services').append('<input type="hidden" id="service_method" name="_method" value="PUT" />');
		$('#service_update').show();
		$('#service_save').hide();
	}
}

//He puesto esta funcion aqui porque no me permite llamarla desde otro archivo js
function changeStatusPublishedService(serviceId,serviceName,lastStatus)
{
	var text;
	if (lastStatus == 1) {
		text = "¿Dejar de publicar el servicio "+serviceName+'?';
	}
	else if (lastStatus == 0) {
		text = "¿Publicar el servicio "+serviceName+'?';
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
		  var ruta = "services/change-published-status";
		 lockWindow();
		$.ajaxSetup({
		  headers: {
			  'X-CSRF-TOKEN': $('input[name=_token]').val()
		  }
		});
		$.ajax({
			url: ruta,
			data: {'serviceId':serviceId,'lastStatus':lastStatus},
			type: 'PUT',
			success: function(result) {
				unlockWindow();
				if (result.success == true) {
					$.growl.notice({ message: "Se ha cambiado el estado del servicio" });
					$.get('services',function(data){
						loadGridServices(data.services);
					});
				}
				if (result.success == false) {
					$.growl.error({ message: "Ha ocurrido un error al intentar cambiar el estado del servicio" });
				}
			}
		});
	  });
}

$(document).on('click', '.service_edit_images', function(e) {
	let _id = $(this).data('index');
	cleanPostImagesModal();
	document.querySelector('#post-images_post-id').value = _id;
    document.querySelector('#post-images-modal input[name="model_type"]').value = 5;

setTimeout(function() {
  axios.get(`service/${_id}/images`)
    .then((response) => {
      let _images = response.data;
      startCarouselPost();
      addImageToSliderPost(swiperPost, $('#post-gallery_swiper-container'), _images);
    });
}, 1000);

});