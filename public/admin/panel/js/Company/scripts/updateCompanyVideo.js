function updateCompanyVideo(){
	cleanError();
	saveOrUpdateFormData('form_company_video','companies/videos',successUpdateCompanyVideo,errorSaveCompanyVideo);
}
//
function successUpdateCompanyVideo(data){
	if (data.success == false) {
		alert("Ha ocurrido un error al actualizar el video");
	}
	else if(data.success == true) {
		loadCompanyVideos(data.videos);
		$.growl.notice({ message: "Se ha actualizado el video" })
		$('#add-video').modal('hide');
	}
}
