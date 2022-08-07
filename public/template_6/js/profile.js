(() => {
	// getElement(`#profile_country`)
	// 	.addEventListener('change', () => {
	// 		reFillSelectCities();
	// 	});

	// reFillSelectCities();
	
	getElement(`#profile__update`)
		.addEventListener('click', (e) => {
			e.preventDefault();
			cleanError();
			// if (getElement(`#profile_password`).value != getElement(`#profile_password-verification`).value) {
			// 	alert("Las contraseñas no coinciden");
			// 	return;
			// }
			let _formData = new FormData($(`#profile_form`)[0]);

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('input[name=_token]').val()
				}
			});
			$.ajax({
				url : `/miperfil/${getElement(`#profile_id`).value}`,
				type: 'POST',
				data: _formData,
				contentType: false,
				processData: false,
				success: function(e){
					unlockWindow();
					normalSwal(`${e.title}`, `${e.message}`, `success`);

				},
				error:function(jqXHR, textStatus, errorThrown)
				{
					unlockWindow();
					$.each(jqXHR.responseJSON, function (key, value) {
						  $.each(value, function (errores, eror) {
							$(`#profile-${key}-error`).append("<li class='error-block'>" + eror + "</li>");
						  });
					  });
				}
			});

			// axios.put(`/miperfil/${getElement(`#profile_id`).value}`, {
			// 		'ruc': getElement(`#profile_ruc`).value,
			// 		'first_name': getElement(`#profile_first-name`).value,
			// 		'last_name': getElement(`#profile_last-name`).value,
			// 		'cel_whatsapp': getElement(`#profile_cel-whatsapp`).value,
			// 		'email': getElement(`#profile_email`).value,
			// 		'address': getElement(`#profile_address`).value,
			// 		'country_id': getElement(`#profile_country`).value,
			// 		'city_id': getElement(`#profile_city`).value,
			// 		'username': getElement(`#profile_username`).value,
			// 		'birthday': getElement(`#profile_birthday`).value,
			// 		'gender': getElement(`#profile_gender`).value,
			// 		'password': getElement(`#profile_password`).value,
			// 	})
			// 	.then((risposta) => {
			// 		alert("Se ha actualizado");
			// 	})
			// 	.catch((error) => {

			// 	});
		});

	if (getElement(`#profile_country`).value != null) {
		axios.get(`/api/template_6/country/${getElement(`#profile_country`).value}/cities`)
			.then((response) => {
				if (!getElement(`#profile_city-id`).value) {
					return;
				}
				fillSelect(document.querySelector(`select[name="city_id"]`), response.data, getElement(`#profile_city-id`).value, `Ciudad`);
				//$(`select[name="city_id"]`).niceSelect('update');
				return getElement(`#profile_city-id`).value;
		})
		.then((city_id) => {

			if (!getElement(`#profile_city-id`).value) {
				return;
			}
			axios.get(`/api/template_6/city/${city_id}/provinces`)
				.then((response) => {
					fillSelect(document.querySelector(`select[name="province_id"]`), response.data, getElement(`#profile_province-id`).value, 'Provincia');
					//$(`select[name="province_id"]`).niceSelect('update');
			});
		})
		.then(() => {
			if (!getElement(`#profile_city-id`).value) {
				return;
			}
			axios.get(`/api/template_6/province/${getElement(`#profile_province-id`).value}/districts`)
			.then((response) => {
				fillSelect(document.querySelector(`select[name="district_id"]`), response.data, getElement(`#profile_district-id`).value, 'Distrito')
				//$(`select[name="district_id"]`).niceSelect('update');
			});
		});
		// .then(() => {
		// 	axios.get(`/api/template_2/district/${getElement(`#district_id`).value}/shipping-cost`)
		// 		.then((response) => {
		// 			calculate_prices(response.data);
		// 			getElement(`#shipping-error`).innerHTML = ``;
		// 		})
		// 		.catch((error) => {
		// 			getElement(`#shipping-error`).innerHTML = error.response.data.message;
		// 			$(`#checkout__save`).attr('disabled',true);
		// 		});	
		// });		
 	} else {
		//get_cities_by_country();
	}
	// function reFillSelectCities() {
	// 	if (getElement(`#profile_country`).value != '') {
	// 		axios.get(`/api/template_6/country/${getElement(`#profile_country`).value}/cities`)
	// 			.then((risposta) => {
	// 				fillSelect(getElement(`#profile_city`), risposta.data.data, getElement(`#profile_city-id`).value, `Seleccione Ciudad`);
	// 			});
	// 	} else {
	// 		getElement(`#profile_city`).innerHTML = `<option value="">Seleccione Ciudad</option>`;
	// 	}
	// }
	// $(`#profile_my-coupons`).on('click', () => {
	// 	//Revisando los tiempos para eliminar los cupones. 7 dias de vida;
	// 	axios.put('/my-profile/update-coupons')
	// 		.then((risposta) => {
	// 			console.log("Vida de los cupones actualizados!");
	// 		});
	// });

	$(`select[name="country_id"]`).on('change', function(e){

		$(`select[name="city_id"]`).html('');
		$(`select[name="province_id"]`).html('');
		$(`select[name="district_id"]`).html('');
		get_cities_by_country();
	});

	$(`select[name="city_id"]`).on('change', function(e){
		$(`select[name="province_id"]`).html('');
		$(`select[name="district_id"]`).html('');
		get_provinces_by_city();
	});

	$(`select[name="province_id"]`).on('change', function(e){
		$(`select[name="district_id"]`).html('');
		get_districts_by_province();
	});

	function get_cities_by_country(){
		axios.get(`/api/template_6/country/${getElement(`select[name="country_id"]`).value}/cities`)
			.then((response) => {
				fillSelect(document.querySelector(`select[name="city_id"]`), response.data, null, `Ciudad`);

		});
	}

	function get_provinces_by_city(){
		axios.get(`/api/template_6/city/${getElement(`select[name="city_id"]`).value}/provinces`)
			.then((response) => {
				fillSelect(document.querySelector(`select[name="province_id"]`), response.data, null, 'Provincia');

		});
	}

	function get_districts_by_province(){
		axios.get(`/api/template_6/province/${$(`select[name="province_id"]`).val()}/districts`)
		.then((response) => {
			fillSelect(document.querySelector(`select[name="district_id"]`), response.data, null, 'Distrito')
		});
	}


})();