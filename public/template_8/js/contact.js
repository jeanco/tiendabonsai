(() => {
	getElement(`#contact__send`)
		.addEventListener(`click`, (e) => {
			e.preventDefault();
			cleanError();
			axios.post(`/api/template_8/contact`, {
					'name': getElement(`#contact_name`).value,
					'email': getElement(`#contact_email`).value,
					'cellphone': getElement(`#contact_cellphone`).value,
					'subject': getElement(`#contact_subject`).value,
					'msg': getElement(`#contact_msg`).value,
				})
				.then((response) => {
					alert(response.data.title);
					getElement(`#contact_name`).value = ``;
					getElement(`#contact_email`).value = ``;
					getElement(`#contact_cellphone`).value = ``;
					getElement(`#contact_subject`).value = ``;
					getElement(`#contact_msg`).value = ``;
				})
				.catch((error) => {
					$.each(error.response.data, function(key, value) {
							$.each(value, function(errores, eror) {
								$(`#contact-${key}-error`).append("<li class='error-block'>" + eror + "</li>");
							});
					});

				});
		});
})();