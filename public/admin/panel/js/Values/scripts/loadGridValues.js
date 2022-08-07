function loadGridValues(values)
{
	var content= '';
	var published;

	$('#values_grid').empty();
	if (values) {
		$.each(values,function(k,value){
			published  = getSimbolPublished(value.published);
			content = content +  '<div class="col-lg-3 col-md-4 col-sm-6 phs">'+
							          '<li class="item-account">'+
							            '<figure class="item-image">'+
							              '<img src="'+value.image_thumb+'" alt="" />'+
										'</figure>'+
							            '<span style="display: block; text-align: center;">'+value.title+'</span>'+
										'<div class="item__controls">'+
										  ((getElement(`#values_publish`).value) ? '<button type="button" data-value_id="'+value.id+'" data-value_title="'+value.title+'" data-published="'+value.published+'" class="btn btn-warning value__publish" title="'+published.name+'">'+
										  '<i class="'+published.simbol+'"></i>'+
									   '</button>' : '')+
									   	 ((getElement(`#values_edit`).value) ? '<button type="button" data-value_id="'+value.id+'" class="btn btn-success value__edit"  data-target="#value-modal" data-toggle="modal" title="Editar">'+
											'<i class="glyphicon glyphicon-pencil"></i>'+
										'</button>' : '' ) +
										 ((getElement(`#values_delete`).value) ? '<button type="button" data-value_id="'+value.id+'" class="btn btn-danger value__delete"  title="Eliminar">'+
										 '<i class="glyphicon glyphicon-trash"></i>'+
									   '</button>' : '')+
							            '</div>'+
							          '</li>'+
							        '</div>';
		});
		$('#values_grid').append(content);
	}
}