(() => {
	getElement(`#contact__send`)
		.addEventListener(`click`, (e) => {
			e.preventDefault();
			lockWindow();
			cleanError();
			console.log(getElement(`#contact_email`).value);
			// getElement(`#contact_subject`).value
			axios.post(`/api/template_1/contact`, {
					'name': getElement(`#contact_name`).value,
					'email': getElement(`#contact_email`).value,
					'cellphone': getElement(`#contact_cellphone`).value,
					'subject': getElement(`#contact_subject`).value,
					'msg': getElement(`#contact_msg`).value,
				})
				.then((response) => {
					alert(response.data.title);
					unlockWindow();
					getElement(`#contact_name`).value = ``;
					getElement(`#contact_email`).value = ``;
					getElement(`#contact_cellphone`).value = ``;
					$(`#contact_subject`).val('');
					// getElement(`#contact_subject`).value = ``;
					getElement(`#contact_msg`).value = ``;

				})
				.catch((error) => {
					// console.log(error);
					unlockWindow();
					$.each(error.response.data, function(key, value) {
						if (key == "name") {
							$.each(value, function(errores, eror) {
								$('#contact-error-name').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == "email") {
							$.each(value, function(errores, eror) {
								$('#contact-error-email').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == "cellphone") {
							$.each(value, function(errores, eror) {
								$('#contact-error-cellphone').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == "subject") {
							$.each(value, function(errores, eror) {
								$('#contact-error-subject').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == "msg") {
							$.each(value, function(errores, eror) {
								$('#contact-error-msg').append("<li class='error-block'>" + eror + "</li>");
							});
						};
					});

				});
		});
})();