(() => {
	getElement(`#subscription__save`)
		.addEventListener('click', (e) => {
			e.preventDefault();
			cleanError();
			lockWindow();

			if (!document.querySelector(`#terms-conditions`).checked) {
				normalSwal(`Revise`, `Debe aceptar las Políticas de Privacidad`, `info`);
            	//$.growl.warning({ title:'Advertencia' , message: "Debe aceptar los Términos y Condiciones" })
            	unlockWindow();
            	return;
			}

			//$(`.text-error`).html("");
			axios.post(`/api/template_7/subscriptions`, {
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
					location.replace(`/regalo-catalogo`);
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
			localStorage.setItem("subscription_popup", true);
			if (getElement(`#subscription_checkbox`).checked) {
				localStorage.setItem("subscription_popup", false);
			}
		});

})();