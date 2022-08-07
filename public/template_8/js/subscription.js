(() => {
	getElement(`#subscription__save`)
		.addEventListener('click', (e) => {
			e.preventDefault();
			cleanError();
			axios.post(`/api/template_8/subscriptions`, {
					'email': getElement(`#subscription_email`).value,
					'name': getElement(`#subscription_name`).value,
				})
				.then((response) => {
					cleanError();
					alert(`${response.data.message}`);
					getElement(`#subscription_email`).value = ``;
					getElement(`#subscription_name`).value = ``;
				})
				.catch((error) => {
					$.each(error.response.data, function(key, value) {
							$.each(value, function(errores, eror) {
								$(`#subscription-${key}-error`).append("<li class='error-block'>" + eror + "</li>");
							});
					});
				});
		});
})();