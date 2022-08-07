function loadGridPosts(posts){
	var published;
	var content = '';
	post.grid.empty();
	$.each(posts,function(i,post){
		published  = getSimbolPublished(post.published);
		content = content + 	        '<div class="col-lg-3 col-md-4 col-sm-6 u-px2">'+
											          '<li class="item-account">'+
											            '<figure class="item-image">'+
											              '<img src="'+post.image+'" alt="" />'+
											            '</figure>'+
														'<span style="display: block; text-align: center;">'+post.title+'</span>'+
											            '<div class="item__controls">'+
											              '<button type="button" data-post_id="'+post.id+'" data-post_title="'+post.title+'" data-published="'+post.published+'" class="btn btn-warning post-button__published" title="'+published.name+'">'+
											                '<i class="'+published.simbol+'"></i>'+
											              '</button>'+
											              '<button type="button" data-post_id="'+post.id+'" class="btn btn-success post-button__edit" data-target="#add-news" data-toggle="modal" title="Editar">'+
											                '<i class="glyphicon glyphicon-pencil"></i>'+
											              '</button>'+
														  '<button type="button" data-post_id="'+post.id+'" class="btn post-button__edit-images" data-target="#add-news" data-toggle="modal" title="Editar">'+
														  	'<i class="glyphicon glyphicon-picture"></i>'+
												  		  '</button>'+
											              '<button type="button" data-post_id="'+post.id+'" class="btn btn-danger post-button__delete" title="Eliminar">'+
											                '<i class="glyphicon glyphicon-trash"></i>'+
											              '</button>'+
											            '</div>'+
											          '</li>'+
											        '</div>';
	});

	post.grid.append(content);

}
