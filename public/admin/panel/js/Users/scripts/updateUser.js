function updateUser()
{
	cleanError();
	saveOrUpdateFormData('form_users','users',successUpdateUser,errorUpdateUser);
}

function successUpdateUser(data)
{
	if (data.success == true) {
		$.growl.notice({ message: "Se ha actualizado correctamente al usuario" });
		
		$.get('users', function(data)
		{
			loadGridUsers(data.users);
		});

		$('#add-users').modal('hide');
	}
	else if(data.success == false) {
		$.growl.error({ message: "Ha ocurrido un error" });
	}
}

function errorUpdateUser(jqXHR, textStatus, errorThrown)
{
	$('#user_error').append("Corrija los siguientes campos por favor!");
	$.each(jqXHR.responseJSON, function( key, value ) {
		if (key == "username") {
			$.each(value, function( errores, eror ) {
				$('#user-error-username').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		else if (key == "first_name") {
			$.each(value, function( errores, eror ) {
				$('#user-error-firstname').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		else if (key == "last_name") {
			$.each(value, function( errores, eror ) {
				$('#user-error-lastname').append("<li class='error-block'>"+eror+"</li>");
			});
		}
		else if (key == "email") {
			$.each(value, function( errores, eror ) {
				$('#user-error-email').append("<li class='error-block'>"+eror+"</li>");
			});
		};
	});
}