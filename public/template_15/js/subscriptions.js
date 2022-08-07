(() => {
	getElement(`#subscription__save`)
		.addEventListener('click', (e) => {
			e.preventDefault();
			cleanError();
			lockWindow();
			//$(`.text-error`).html("");
			axios.post(`/api/template_1/subscriptions`, {
					'email': getElement(`#subscription_email`).value,
					'name': getElement(`#subscription_name`).value,
					'cellphone': $(`#subscription_cellphone`).val(),
					// 'cellphone': (getElement(`#subscription_cellphone`).value != null) ? 1 : 0,
				})
				.then((response) => {
					cleanError();
					unlockWindow();
					alert(`${response.data.message}`);

					$(`#subscription_cellphone`).val("");
					$(`#subscription_email`).val("");
					$(`#subscription_name`).val("");
				})
				.catch((error) => {
					unlockWindow();
					$.each(error.response.data, function(key, value) {
						if (key == "email") {
							$.each(value, function(errores, eror) {
								$('#subscription-error-email').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == "name") {
							$.each(value, function(errores, eror) {
								$('#subscription-error-name').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == "cellphone") {
							$.each(value, function(errores, eror) {
								$('#subscription-error-cellphone').append("<li class='error-block'>" + eror + "</li>");
							});
						};
					});
				});
		});
})();