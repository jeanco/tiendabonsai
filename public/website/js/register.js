(() => {
	getElement(`#register__save`)
		.addEventListener('click', (E) => {
			E.preventDefault();
			clean_error();

			axios.post(`/api/companies`, {
					'name_company': getElement(`#register_name-company`).value,
					'business_name': getElement(`#register_business-name`).value,
					'ruc': getElement(`#register_ruc`).value,
					'address': getElement(`#register_address`).value,
					'phone': getElement(`#register_phone`).value,
					'email': getElement(`#register_email`).value,
					'user_first_name': getElement(`#register_user-first-name`).value,
					'user_last_name': getElement(`#register_user-last-name`).value,
					'user_email': getElement(`#register_user-email`).value,
					'user_cel': getElement(`#register_user-cel`).value,
					'user_password': getElement(`#register_user-password`).value,
					'user_password_confirmation': getElement(`#register_user-password-confirmation`).value,
				})
				.then((response) => {
					// alert(response.data.message);
					window.location.replace("/plataforma");
				})
				.catch((error) => {
					$.each(error.response.data, function(key, value) {
						if (key == "name_company") {
							$.each(value, function(errores, eror) {
								$('#register-name-company-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == "business_name") {
							$.each(value, function(errores, eror) {
								$('#register-business-name-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == "ruc") {
							$.each(value, function(errores, eror) {
								$('#register-ruc-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == "address") {
							$.each(value, function(errores, eror) {
								$('#register-address-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == "email") {
							$.each(value, function(errores, eror) {
								$('#register-email-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == "user_first_name") {
							$.each(value, function(errores, eror) {
								$('#register-user-first-name-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == 'user_last_name') {
							$.each(value, function(errores, eror) {
								$('#register-user-last-name-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == 'user_email') {
							$.each(value, function(errores, eror) {
								$('#register-user-email-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == 'user_cel') {
							$.each(value, function(errores, eror) {
								$('#register-user-cel-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == 'user_password') {
							$.each(value, function(errores, eror) {
								$('#register-user-password-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == 'user_password_confirmation') {
							$.each(value, function(errores, eror) {
								$('#register-user-password-confirmation-error').append("<li class='error-block'>" + eror + "</li>");
							});
						}
					});
				});
		});

	function clean_error() {
		$('.mensaje-error').empty();
		$('.titulo-error').empty();
	}

})();