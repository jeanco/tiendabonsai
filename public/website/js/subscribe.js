(() => {
	getElement(`#subscription__save`)
		.addEventListener('click', (e) => {
			e.preventDefault();
			$(`.text-error`).html("");
			axios.post(`/api/subscriptions`, {
					'email': getElement(`#subscription_email`).value,
					'name': getElement(`#subscription_name`).value,
					'cellphone': $(`#subscription_cellphone`).val(),
					// 'cellphone': (getElement(`#subscription_cellphone`).value != null) ? 1 : 0,
				})
				.then((response) => {
					$(`.text-error`).html("");
					alert(`${response.data.message}`);
				})
				.catch((error) => {
					$.each(error.response.data, function(key, value) {
						if (key == "email") {
							$.each(value, function(errores, eror) {
								$('#subscription-error-email').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == "name") {
							$.each(value, function(errores, eror) {
								$('#subscription-error-name').append("<li class='error-block'>" + eror + "</li>");
							});
						};
					});
				});
		});
})();