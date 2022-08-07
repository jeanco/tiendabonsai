function saveCompanyVideo(){
	cleanError();
	saveOrUpdateFormData('form_company_video','companies/videos',successSaveCompanyVideo,errorSaveCompanyVideo);
}

function successSaveCompanyVideo(data){
	if (data.success == false) {
		$.growl.error({ message: "Ha ocurrido un error al guardar el video" })
	}
	else if(data.success == true) {
		loadCompanyVideos(data.videos);
		$.growl.notice({ message: "Se ha guardado el video" })
		$('#add-video').modal('hide');
	}
}

function errorSaveCompanyVideo(jqXHR, textStatus, errorThrown){
	$('#company-video-error').append(msgError);
	$.each(jqXHR.responseJSON, function( key, value ) {
		if (key == "company_video_name") {
			$.each(value, function( errores, eror ) {
				$('#company-video-error-name').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		else if (key == "company_video_link") {
			$.each(value, function( errores, eror ) {
				$('#company-video-error-link').append("<li class='error-block'>"+eror+"</li>");
			});
		};
	});
}
