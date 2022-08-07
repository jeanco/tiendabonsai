(() => {
	getElement(`#register-user__save`)
		.addEventListener('click', (E) => {
			lockWindow();
			E.preventDefault();
			clean_error();

			let _formData = new FormData($(`#new-user_form`)[0]);

			if (!getElement(`#user_terms`).checked) {
				normalSwal(`Advertencia`, `Debe aceptar los términos y condiciones`, `warning`);
				unlockWindow();
				return;
			}

			_formData.append('document_type', 1);

			if (getElement(`#company`).checked) {
				_formData.append('document_type', 2);
			}


			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('input[name=_token]').val()
				}
			});
			$.ajax({
				url : `/api/template_11/register-user`,
				type: 'POST',
				data: _formData,
				contentType: false,
				processData: false,
				success: function(e){
					unlockWindow();
					$(`#new-user_form`)[0].reset();

					Swal.fire({
					  icon: 'success',
					  title: e.title,
  				      text: e.message,
					  showDenyButton: false,
					  showCancelButton: false,
					  confirmButtonText: `Ir al Login`,
					  denyButtonText: `Don't save`,
					  allowOutsideClick: false,
					}).then((result) => {
					  if (result.value) {
						location.replace("/acceder");
					  }
					})

				},
				error:function(jqXHR, textStatus, errorThrown)
				{	
					unlockWindow();
					$.each(jqXHR.responseJSON, function (key, value) {
						  $.each(value, function (errores, eror) {
							$(`#user-${key}-error`).append("<li class='error-block'>" + eror + "</li>");
						  });
					  });
				}
			});

			// //api/companies
			// axios.post(`/api/oyeepe/register-user`, {
			// 		'ruc': getElement(`#register_ruc`).value,
			// 		'first_name': getElement(`#register_user-first-name`).value,
			// 		'last_name': getElement(`#register_user-last-name`).value,
			// 		'email': getElement(`#register_user-email`).value,
			// 		'cel': getElement(`#register_user-cel`).value,
			// 		'password': getElement(`#register_user-password`).value,
			// 		'password_confirmation': getElement(`#register_user-password-confirmation`).value,
			// 	})
			// 	.then((response) => {
			// 		// alert(response.data.message);
			// 		console.log('Se ha creado el usuario.');
			// 		// alert(response.data.message);
			// 		window.location.replace("/acceder");
			// 	})
			// 	.catch((error) => {
					
			// 		if (error.response.data.hasOwnProperty('one_error')) {
			// 			alert(error.response.data.message);
			// 		} else {
			// 			$.each(error.response.data, function(key, value) {
			// 				if (key == "ruc") {
			// 					$.each(value, function(errores, eror) {
			// 						$('#register-ruc-error').append("<li class='error-block'>" + eror + "</li>");
			// 					});
			// 				} else if (key == "email") {
			// 					$.each(value, function(errores, eror) {
			// 						$('#register-email-error').append("<li class='error-block'>" + eror + "</li>");
			// 					});
			// 				} else if (key == "first_name") {
			// 					$.each(value, function(errores, eror) {
			// 						$('#register-user-first-name-error').append("<li class='error-block'>" + eror + "</li>");
			// 					});
			// 				} else if (key == 'last_name') {
			// 					$.each(value, function(errores, eror) {
			// 						$('#register-user-last-name-error').append("<li class='error-block'>" + eror + "</li>");
			// 					});
			// 				} else if (key == 'cel') {
			// 					$.each(value, function(errores, eror) {
			// 						$('#register-user-cel-error').append("<li class='error-block'>" + eror + "</li>");
			// 					});
			// 				} else if (key == 'password') {
			// 					$.each(value, function(errores, eror) {
			// 						$('#register-user-password-error').append("<li class='error-block'>" + eror + "</li>");
			// 					});
			// 				} else if (key == 'password_confirmation') {
			// 					$.each(value, function(errores, eror) {
			// 						$('#register-user-password-confirmation-error').append("<li class='error-block'>" + eror + "</li>");
			// 					});
			// 				}
			// 			});
			// 		}


			// 	});
		});

	function clean_error() {
		$('.mensaje-error').empty();
		$('.titulo-error').empty();
	}

})();