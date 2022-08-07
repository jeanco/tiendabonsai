function getVideoToEdit(videoId){
	ruta = "contents/"+videoId;
	ajaxAll_GET(ruta,successGetVideoToEdit);
}

function successGetVideoToEdit(data){
	if (data.content) {
		$('#company_video_content').val(data.content.content);
		$('#company_video_resource').val(data.content.resource);
		$('#company_video_id').val(data.content.id);
	}
}
