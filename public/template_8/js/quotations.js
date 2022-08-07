(() => {

	var product_id = localStorage.getItem(`product_quotation`);

	if (product_id) {
		axios.get(`/api/template_8/product/${product_id}/main-photo`)
			.then((response) => {
				getElement(`#product_photo`).setAttribute(`src`, response.data.main_photo);
				getElement(`#product_name`).innerHTML = response.data.name;
			});


		get_cities_by_country();

		function get_cities_by_country(){
			if (getElement(`input[name="country_id"]`).value != '') {
				axios.get(`/api/template_3/country/${getElement(`input[name="country_id"]`).value}/cities`)
					.then((response) => {
						fillSelect(document.querySelector(`select[name="city_id"]`), response.data, null, `DEPARTAMENTO`);
						//$(`select[name="city_id"]`).niceSelect('update');

				});

			}
		}

		function get_provinces_by_city(){
			axios.get(`/api/template_3/city/${getElement(`select[name="city_id"]`).value}/provinces`)
				.then((response) => {
					fillSelect(document.querySelector(`select[name="province_id"]`), response.data, null, 'PROVINCIA');
			});
		}

		function get_districts_by_province(){
			axios.get(`/api/template_3/province/${$(`select[name="province_id"]`).val()}/districts`)
			.then((response) => {
				fillSelect(document.querySelector(`select[name="district_id"]`), response.data, null, 'DISTRITO')
			});
		}

		$(`select[name="city_id"]`).on('change', function(e){
			$(`select[name="province_id"]`).html('<option value="">PROVINCIA</option>');
			$(`select[name="district_id"]`).html('<option value="">DISTRITO</option>');
			get_provinces_by_city();
		});

		$(`select[name="province_id"]`).on('change', function(e){
			$(`select[name="district_id"]`).html('<option value="">DISTRITO</option>');
			get_districts_by_province();
		});

		$(`#quotation__save`)
			.on('click', function(e){
				e.preventDefault();
				cleanError();
				if (!getElement(`#terminos`).checked) {
					normalSwal(`Aviso`, `Debe aceptar los términos y condiciones`, `info`);
					return;
				}

				lockWindow();

				let _formData = new FormData($(`#quotation_form`)[0]);
				_formData.append('product_id', product_id);

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('input[name=_token]').val()
					}
				});
				$.ajax({
					url : `/api/template_8/quotation`,
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
						});
					}
				});
			});
		return;



	}



	// $(`select[name="document_type"]`)
	// 	.on('change', function(e){
	// 		if (e.target.value == 1) {
	// 			$(`#document-type-label`).html("Nombres y apellidos");
	// 			document.querySelector(`input[name="first_name"]`).placeholder = "Escriba sus Nombres y Apellidos";
	// 		}

	// 		if (e.target.value == 2) {
	// 			$(`#document-type-label`).html("Razón Social");
	// 			document.querySelector(`input[name="first_name"]`).placeholder = "Escriba su Razón Social";
	// 		}
	// 	});

	// $(document).on('click', '.more-info', function(e){
	// 	e.preventDefault();
	// 	let _id = $(this)[0].dataset.index;

	// 	axios.get(`/api/template_2/product/${_id}/description`)
	// 		.then((response) => {
	// 			$(`#description__`).html(response.data[0]);
	// 			$(`#cotiza_image`).attr('src', response.data[1]);
	// 			/*$(`#image__`).html(response.data);*/
	// 			$(`#product-description-modal`).modal('show');
	// 		});
	// });

})();