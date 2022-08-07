(() => {

	$(`#quotation__save`)
		.on('click', function(e){
			lockWindow();
			e.preventDefault();
			let _cart = {};
			let _flag = false;
			$(`.products_selected`).each(function(index,value){

				if ($(value).val()) {
					_flag = true;
					_cart[$(value)[0].dataset.index] = $(value).val();
				}
			});

			if (!_flag) {
				unlockWindow();
				normalSwal(`Aviso`, `No hay ningun producto elegido a cotizar`, `info`);
				return;
			}


			let _formData = new FormData($(`#quotation_form`)[0]);
			_formData.append('product_ids', JSON.stringify(_cart));

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('input[name=_token]').val()
				}
			});
			$.ajax({
				url : `/api/template_5/quotation`,
				type: 'POST',
				data: _formData,
				contentType: false,
				processData: false,
				success: function(e){
					/*normalSwal(e.title, e.message, `success`);*/
					unlockWindow();
					location.replace(`/cotizar-finalizado`);
				},
				error:function(jqXHR, textStatus, errorThrown)
				{
					unlockWindow();
					$.each(jqXHR.responseJSON, function (key, value) {
					  $.each(value, function (errores, eror) {
						$(`#quotation-${key}-error`).append("<li class='error-block'>" + eror + "</li>");
					  });	
						// if (key == "identity_document") {
						//   $.each(value, function (errores, eror) {
						// 	$('#quotation-document-error').append("<li class='error-block'>" + eror + "</li>");
						//   });
						// } else if (key == "password") {
						//   $.each(value, function (errores, eror) {
						// 	$('#quotation-password-error').append("<li class='error-block'>" + eror + "</li>");
						//   });
						// } else if (key == "first_name") {
						//   $.each(value, function (errores, eror) {
						// 	$('#quotation-first-name-error').append("<li class='error-block'>" + eror + "</li>");
						//   });
						// } else if (key == "last_name") {
						//   $.each(value, function (errores, eror) {
						// 	$('#quotation-last-name-error').append("<li class='error-block'>" + eror + "</li>");
						//   });
						// } else if (key == "phone") {
						//   $.each(value, function (errores, eror) {
						// 	$('#quotation-phone-error').append("<li class='error-block'>" + eror + "</li>");
						//   });

						// } else if (key == "cel_whatsapp") {
						//   $.each(value, function (errores, eror) {
						// 	$('#customer-cel-error').append("<li class='error-block'>" + eror + "</li>");
						//   });
						// } else if (key == "country_id") {
						//   $.each(value, function (errores, eror) {
						// 	$('#customer-country-error').append("<li class='error-block'>" + eror + "</li>");
						//   });
						// } else if (key == "city_id") {
						//   $.each(value, function (errores, eror) {
						// 	$('#customer-city-error').append("<li class='error-block'>" + eror + "</li>");
						//   });
						// };
					  });
				}
			});



		});

	$(`select[name="document_type"]`)
		.on('change', function(e){
			if (e.target.value == 1) {
				$(`#document-type-label`).html("Nombres y apellidos");
				document.querySelector(`input[name="first_name"]`).placeholder = "Escriba sus Nombres y Apellidos";
			}

			if (e.target.value == 2) {
				$(`#document-type-label`).html("Razón Social");
				document.querySelector(`input[name="first_name"]`).placeholder = "Escriba su Razón Social";
			}
		});

	$(document).on('click', '.more-info', function(e){
		e.preventDefault();
		let _id = $(this)[0].dataset.index;

		axios.get(`/api/template_5/product/${_id}/description`)
			.then((response) => {
				$(`#description__`).html(response.data[0]);
				$(`#cotiza_image`).attr('src', response.data[1]);
				/*$(`#image__`).html(response.data);*/
				$(`#product-description-modal`).modal('show');
			});
	});

})();