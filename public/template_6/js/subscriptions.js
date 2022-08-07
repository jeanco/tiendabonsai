(() => {
	getElement(`#subscription__save`)
		.addEventListener('click', (e) => {
			e.preventDefault();
			cleanError();
			lockWindow();
			//$(`.text-error`).html("");
			axios.post(`/api/template_6/subscriptions`, {
					'email': getElement(`#subscription_email`).value,
					'name': getElement(`#subscription_name`).value,
					'cellphone': $(`#subscription_cellphone`).val(),
					// 'cellphone': (getElement(`#subscription_cellphone`).value != null) ? 1 : 0,
				})
				.then((response) => {
					unlockWindow();
					cleanError();
					toastNotice(response.data.message)
					$(".popup_wrapper").fadeOut(500);
					localStorage.setItem("subscription_popup", false);
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

	getElement(`#popup-subscription__close`)
		.addEventListener('click', () => {
			localStorage.setItem("subscription_popup", false);
			/*if (getElement(`#subscription_checkbox`).checked) {
				localStorage.setItem("subscription_popup", false);
			}*/
		});

	getElement(`#popup-notice__close`)
		.addEventListener('click', () => {
			localStorage.setItem("notice_popup", false);
			/*if (getElement(`#subscription_checkbox`).checked) {
				localStorage.setItem("subscription_popup", false);
			}*/
		});

})();