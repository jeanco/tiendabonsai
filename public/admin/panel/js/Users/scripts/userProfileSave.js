function userProfileSave(){
	var formData = new FormData($('#form_profile')[0]);
	var ruta = 'user-profile';
	ajaxall_POST_formData(ruta,formData,successUserProfileSave,errorUserProfileSave);
}

function successUserProfileSave(data){
	if (data.success == true) {
		$.growl.notice({ message: "Se ha actualizado correctamente sus datos" });
		$('#img-user-photo').attr('src',data.user.user_image_thumb);
		$('#modalProfile').modal('hide');
	}
	else if(data.success == false){
		$.growl.error({ message: "Ha ocurrido un error actualizando el perfil" })
	}
}

function errorUserProfileSave(jqXHR, textStatus, errorThrown){
	$('#profile-error').append(msgError);
	$.each(jqXHR.responseJSON, function( key, value ) {
		if (key == "username") {
			$.each(value, function( errores, eror ) {
				$('#error-username-profile').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		else if (key == "first_name") {
			$.each(value, function( errores, eror ) {
				$('#error-first-name-profile').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		else if (key == "last_name") {
			$.each(value, function( errores, eror ) {
				$('#error-last-name-profile').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		else if (key == "cel_whatsapp") {
			$.each(value, function( errores, eror ) {
				$('#error-cel-profile').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		else if (key == "email") {
			$.each(value, function( errores, eror ) {
				$('#error-email-profile').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		else if (key == "address") {
			$.each(value, function( errores, eror ) {
				$('#error-address-profile').append("<li class='error-block'>"+eror+"</li>");
			});
		};
	});
}
