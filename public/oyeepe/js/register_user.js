(() => {
	getElement(`#register-user__save`)
		.addEventListener('click', (E) => {
			E.preventDefault();
			clean_error();

			//api/companies
			axios.post(`/api/oyeepe/register-user`, {
					'ruc': getElement(`#register_ruc`).value,
					'first_name': getElement(`#register_user-first-name`).value,
					'last_name': getElement(`#register_user-last-name`).value,
					'email': getElement(`#register_user-email`).value,
					'cel': getElement(`#register_user-cel`).value,
					'password': getElement(`#register_user-password`).value,
					'password_confirmation': getElement(`#register_user-password-confirmation`).value,
				})
				.then((response) => {
					// alert(response.data.message);
					console.log('Se ha creado el usuario.');
					// alert(response.data.message);
					window.location.replace("/acceder");
				})
				.catch((error) => {
					
					if (error.response.data.hasOwnProperty('one_error')) {
						alert(error.response.data.message);
					} else {
						$.each(error.response.data, function(key, value) {
							if (key == "ruc") {
								$.each(value, function(errores, eror) {
									$('#register-ruc-error').append("<li class='error-block'>" + eror + "</li>");
								});
							} else if (key == "email") {
								$.each(value, function(errores, eror) {
									$('#register-email-error').append("<li class='error-block'>" + eror + "</li>");
								});
							} else if (key == "first_name") {
								$.each(value, function(errores, eror) {
									$('#register-user-first-name-error').append("<li class='error-block'>" + eror + "</li>");
								});
							} else if (key == 'last_name') {
								$.each(value, function(errores, eror) {
									$('#register-user-last-name-error').append("<li class='error-block'>" + eror + "</li>");
								});
							} else if (key == 'cel') {
								$.each(value, function(errores, eror) {
									$('#register-user-cel-error').append("<li class='error-block'>" + eror + "</li>");
								});
							} else if (key == 'password') {
								$.each(value, function(errores, eror) {
									$('#register-user-password-error').append("<li class='error-block'>" + eror + "</li>");
								});
							} else if (key == 'password_confirmation') {
								$.each(value, function(errores, eror) {
									$('#register-user-password-confirmation-error').append("<li class='error-block'>" + eror + "</li>");
								});
							}
						});
					}


				});
		});

	function clean_error() {
		$('.mensaje-error').empty();
		$('.titulo-error').empty();
	}

})();