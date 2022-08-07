function loadCompanyVideos(videos){

	$('#company_videos').empty();
	var content = '';
	$.each(videos,function(i,video){
		var link = video.resource;
		var id = link.substr(link.lastIndexOf('=')+1);

		content = content + '<div class="col-lg-6 col-md-12 col-sm-6 u-px2">'+
								          '<li class="item-video">'+
								            '<iframe width="100%" height="130" src="https://www.youtube.com/embed/'+id+'" frameborder="0" allowfullscreen></iframe>'+
											'<div class="item__controls">'+
											  ((getElement(`#cover_edit-video`).value) ? '<button type="button" class="btn bg-secondary edit_video" data-index="'+video.id+'" data-target="#add-video" data-toggle="modal" title="Editar">'+
											  '<i class="glyphicon glyphicon-pencil"></i>'+
											'</button>' : ``)+
											  ((getElement(`#cover_delete-video`).value) ? '<button type="button" class="btn btn-danger delete_video" data-index="'+video.id+'" title="Eliminar">'+
											  '<i class="glyphicon glyphicon-trash"></i>'+
											'</button>' : ``)+
								            '</div>'+
								          '</li>'+
								        '</div>';
	});
	$('#company_videos').append(content);
}
