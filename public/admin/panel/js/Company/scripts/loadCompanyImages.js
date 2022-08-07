function loadCompanyImages(images){
		var content = '';
		$.each(images,function(i,image){
			content = content + '<div class="owl-item" style="width: 251px; margin-right: 10px;">'+
												'<li class="item item__photo">'+
												  '<img src="'+image.resource_thumb+'" width="100%"/>'+
												  '<div class="item__controls">'+
													'<button type="button" class="btn u-bg-secondary u-mr2" data-toggle="tab" title="Editar">'+
													  '<i class="glyphicon glyphicon-pencil"></i>'+
													'</button>'+
													'<button type="button" class="btn btn-danger" title="Eliminar">'+
													  '<i class="glyphicon glyphicon-trash"></i>'+
													'</button>'+
												  '</div>'+
												'</li>'+
										  '</div>';
		});
		$('#company_carousel .owl-stage').empty();
		$('#company_carousel .owl-stage').append(content);
}
