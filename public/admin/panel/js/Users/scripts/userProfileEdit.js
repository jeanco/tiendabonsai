function userProfileEdit(){
	var userId = $('#user_editar_perfil').data('index');
	var ruta = 'users/'+userId;
	$.get(ruta,function(data){
		successUserPerfilEdit(data);
	});
}

function successUserPerfilEdit(data){
	if (data.user) {
		$('#profile_id').val(data.user.id);
		$('#profile_username').val(data.user.username);
		$('#profile_first_name').val(data.user.first_name);
		$('#profile_last_name').val(data.user.last_name);
		$('#profile_cel').val(data.user.cel);
		$('#profile_email').val(data.user.email);
		$('#profile_address').val(data.user.address);
		$('#modalUserProfile').modal('show');
		
		if (data.user.user_image) {
			$('#user_preview-profile-text').hide();
			$('#user_preview-profile-image').append('<img src="'+data.user.user_image+'" style="display: inline;">')
		}
	}
	else {
		alert('Usuario no existe');
	}
}
