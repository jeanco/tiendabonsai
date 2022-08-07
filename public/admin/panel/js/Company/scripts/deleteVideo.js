function deleteVideo(idVideo){

	swal({   title: 'Borrar video',
	  text: '¿Estás seguro de borrar el video?',
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: 'Aceptar',
	  cancelButtonText: 'Cancelar',
	  closeOnConfirm: true },
	  function(){
		  var ruta = "companies/videos";
		  lockWindow();
		  $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('input[name=_token]').val()
			}
		  });
		  $.ajax({
			  url: ruta,
			  data: {'videoId':idVideo},
			  type: 'DELETE',
			  success: function(result) {
				  unlockWindow();
				  successDeleteVideo(result);
			  }
		  });
	  });
}

function successDeleteVideo(data){
	if (data.success = false) {
		$.growl.error({ message: "Ha ocurrido un error al borrar el video" });
	}
	else if(data.success = true){
		$.growl.notice({ message: "Se ha borrado el video" });
		loadCompanyVideos(data.videos);
	}
}
