(() => {
	function cleanError() {
		$('.mensaje-error').empty();
		$('.titulo-error').empty();
	}

	getElement(`#register__save`)
		.addEventListener(`click`, (e) => {
			cleanError();
			e.preventDefault();
			// if (getElement(`#register_password`).value == getElement(`#register_password-verification`).value) {
			axios.post(`/api/users`, {
					'first_name': getElement(`#register_firstname`).value,
					'last_name': getElement(`#register_lastname`).value,
					'email': getElement(`#register_email`).value,
					'cel': getElement(`#register_cel`).value,
					'cel_holder': getElement(`#register_cel-holder`).value,
					'gender': getElement(`#register_gender`).value,
					'birthday': getElement(`#register_birthday`).value,
					'password': getElement(`#register_password`).value,
					'password_confirmation': getElement(`#register_password-verification`).value,
				})
				.then((response) => {
					console.log(response.data);
					alert(response.data.message);
				})
				.catch((error) => {
					$.each(error.response.data, function(key, value) {
						if (key == "first_name") {
							$.each(value, function(errores, eror) {
								$('#register-first-name-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == "last_name") {
							$.each(value, function(errores, eror) {
								$('#register-last-name-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == "cel") {
							$.each(value, function(errores, eror) {
								$('#register-cel-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == "email") {
							$.each(value, function(errores, eror) {
								$('#register-email-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == "cel_holder") {
							$.each(value, function(errores, eror) {
								$('#register-cel-holder-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == "password") {
							$.each(value, function(errores, eror) {
								$('#register-password-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == 'password_confirmation') {
							$.each(value, function(errores, eror) {
								$('#register-password-verification-error').append("<li class='error-block'>" + eror + "</li>");
							});
						}
					});

				});

			// } else {
			// 	alert(`Las contraseñas no coinciden!`);
			// }

		});

})();