(() => {
	getElement(`#subscription__save`)
		.addEventListener('click', (e) => {
			e.preventDefault();
			cleanError();
			lockWindow();
			//$(`.text-error`).html("");
			axios.post(`/api/template_13/subscriptions`, {
					'email': getElement(`#subscription_email`).value,
					'name': getElement(`#subscription_name`).value,
					'cellphone': $(`#subscription_cellphone`).val(),
				})
				.then((response) => {
					cleanError();
					unlockWindow();
					normalSwal(response.data.title, response.data.message, `success`);

					$(`#subscription_cellphone`).val("");
					$(`#subscription_email`).val("");
					$(`#subscription_name`).val("");
					localStorage.setItem("subscription_popup", false);

				})
				.catch((error) => {
					unlockWindow();
					$.each(error.response.data, function(key, value) {
						$.each(value, function(errores, eror) {
							$(`#subscription-${key}-error`).append("<li class='error-block'>" + eror + "</li>");
						});
					});
				});
		});

	$(`#modal-subscription__save`).on('click', function(e){
		e.preventDefault();
		cleanError();
		lockWindow();

		axios.post(`/api/template_13/subscriptions`, {
				'email': getElement(`#modal-subscription_email`).value,
				'name': getElement(`#modal-subscription_name`).value,
				'cellphone': $(`#modal-subscription_cellphone`).val(),
			})
			.then((response) => {
				cleanError();
				unlockWindow();
				//alert(`${response.data.message}`);
				$(`#modal-subscription_cellphone`).val("");
				$(`#modal-subscription_email`).val("");
				$(`#modal-subscription_name`).val("");
				$("#subscription_modal_ventana").fadeOut(300);
				localStorage.setItem("subscription_popup", false);
				normalSwal(response.data.title, response.data.message, `success`);
			})
			.catch((error) => {
				unlockWindow();
				$.each(error.response.data, function(key, value) {
					$.each(value, function(errores, eror) {
						$(`#modal-subscription-${key}-error`).append("<li class='error-block'>" + eror + "</li>");
					});
				});
			});
	});
	
	getElement(`#popup-subscription__close`)
		.addEventListener('click', () => {
			localStorage.setItem("subscription_popup", false);
		    $(".popup_wrapper").fadeOut(300);

		});

})();