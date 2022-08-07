function loadGridUsers(users)
{
	var _content= '';
	var _elementActivated = '';
	var _userImage = '';

	if (users) {
		$.each(users,function(k,user){

			_userImage = 'https://image.freepik.com/free-icon/male-user-shadow_318-34042.jpg';
			if (user.user_image != null && user.user_image != '') {
				_userImage = user.user_image;
			}

			if (user.activated == true) {
				_elementActivated = '<button type="button" style="width: 50%;" data-index="'+user.id+'" class="btn btn-danger user_suspend" title="Suspender usuario">'+
								 		'<i class="glyphicon glyphicon-ban-circle"></i>'+
							 		'</button>';
			} else {
				_elementActivated = '<button type="button" style="width: 50%;" data-index="'+user.id+'" class="btn btn-success user_activate" title="Activar usuario">'+
								 		'<i class="glyphicon glyphicon-ok-circle"></i>'+
							 		'</button>';
			}

			_content =
			_content +  '<div class="col-lg-3 col-md-4 col-sm-6 width-user phs">'+
				          '<li class="item-account">'+
				            '<figure class="item-image">'+
				              '<img src="'+_userImage+'" alt="" />'+
							'</figure>'+
							'<span style="display: block;text-align: center;">'+user.first_name+' '+user.last_name+'</span>'+
							`<span style="display: block;text-align: center;">${(user.company != null) ? user.company.name_company : 'Sin compañía'}</span>`+
							'<div class="item__controls">'+
							 ((getElement(`#user_edit`).value) ? '<button type="button" style="width: 50%;" data-index="'+user.id+'" class="btn btn-success user_edit"  data-target="#add-users" data-toggle="modal" title="Editar">'+
							 '<i class="glyphicon glyphicon-pencil"></i>'+
						 		'</button>' : '')+
							 ((getElement(`#user_suspend`).value) ? _elementActivated : '')+
							 ((getElement(`#user_edit-permissions`).value) ? `<a href="/admin/permisos?index=${user.id}" style="width: 50%;" class="btn btn-warning" title="Permisos">`+
							 '<i class="glyphicon glyphicon-ok"></i>'+'</a>' : '')+
							 ((getElement(`#user_change-password`).value) ? '<button type="button" style="width: 50%;" data-index="'+user.id+'" class="btn btn-success user_change-password"  data-target="#miModalpassword" data-toggle="modal" title="Cambiar la contraseña">'+
							 '<i class="glyphicon glyphicon-ruble"></i>'+
						 '</button>' : '')+
				            '</div>'+
				          '</li>'+
				        '</div>';
		});
		$('#users_grid').empty();
		$('#users_grid').append(_content);
	}
}
