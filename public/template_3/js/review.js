(() => {

	getElement(`#send_review`)
		.addEventListener('click', (e)=> {
			e.preventDefault();
			cleanError();
			if (!document.querySelector(`input[name="terms"]`).checked) {
            	$.growl.warning({ title:'Advertencia' , message: "Debe aceptar los términos" })
            	return;
			}

			if (localStorage.getItem(`id_product_to_review`) == null) {
				$.growl.warning({ title:'Advertencia' , message: "Ningún producto para opinar se ha  seleccionado" })
				return;
			}

			axios.post(`/api/template_3/message/review`, {
				'title': $(`#review_title`).val(),
				'message': $(`#review_message`).val(),
				'point': $(`.group-rating`).find('input:checked').val(),
				'product_id': localStorage.getItem(`id_product_to_review`),
			})
			.then((response) => {
				$.growl.notice({ title: response.data.title , message: response.data.message })
				$(`#review_form`)[0].reset();
                localStorage.removeItem(`id_product_to_review`);
			})
			.catch((err) => {
				$.each(err.response.data, function(key, value) {
					  $.each(value, function(errores, eror) {
					    $(`#review-${key}-error`).append("<li class='error-block'>" + eror + "</li>");
					  });
				});


			});


		});


})();