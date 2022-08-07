function loadGridAgreetments(agreetments){
	var content= '';
	var published;
	if (agreetments) {
		$.each(agreetments,function(k,agreetment){
			published  = getSimbolPublished(agreetment.published);
			
			if (agreetment.published) {
			}

			content = content +
			'<div class="col-lg-3 col-md-4 col-sm-6 phs">'+
	          '<li class="item-account">'+
	            '<figure class="item-image">'+
	              '<img src="'+agreetment.image+'" alt="" />'+
				'</figure>'+
				'<span style="display: block;text-align: center;">'+agreetment.title+'</span>'+

	            '<div class="item__controls">'+
	              '<button type="button" data-index="'+agreetment.id+'" data-agreetment_title="'+agreetment.title+'" data-published="'+agreetment.published+'" class="btn btn-warning agreetment_published" title="'+published.name+'">'+
	                '<i class="'+published.simbol+'"></i>'+
	             '</button>'+
							 '<button type="button" data-index="'+agreetment.id+'" class="btn btn-success agreetment_edit"  data-target="#add-agreetments" data-toggle="modal" title="Editar">'+
								 '<i class="glyphicon glyphicon-pencil"></i>'+
							'</button>'+
	              '<button type="button" data-index="'+agreetment.id+'" class="btn btn-danger agreetment_delete"  title="Eliminar">'+
	                '<i class="glyphicon glyphicon-trash"></i>'+
	              '</button>'+
	            '</div>'+
	          '</li>'+
	        '</div>';
		});
		$('#agreetments_grid').empty();
		$('#agreetments_grid').append(content);
	}
}
