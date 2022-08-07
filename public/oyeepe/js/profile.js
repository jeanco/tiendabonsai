(() => {
	getElement(`#profile_country`)
		.addEventListener('change', () => {
			reFillSelectCities();
		})


	reFillSelectCities();


	getElement(`#profile__update`)
		.addEventListener('click', (e) => {
			e.preventDefault();

			if (getElement(`#profile_password`).value != getElement(`#profile_password-verification`).value) {
				alert("Las contraseñas no coinciden");
				return;
			}

			axios.put(`/miperfil/${getElement(`#profile_id`).value}`, {
					'ruc': getElement(`#profile_ruc`).value,
					'first_name': getElement(`#profile_first-name`).value,
					'last_name': getElement(`#profile_last-name`).value,
					'cel_whatsapp': getElement(`#profile_cel-whatsapp`).value,
					'email': getElement(`#profile_email`).value,
					'address': getElement(`#profile_address`).value,
					'country_id': getElement(`#profile_country`).value,
					'city_id': getElement(`#profile_city`).value,
					'username': getElement(`#profile_username`).value,
					'birthday': getElement(`#profile_birthday`).value,
					'gender': getElement(`#profile_gender`).value,
					'password': getElement(`#profile_password`).value,
				})
				.then((risposta) => {
					alert("Se ha actualizado");
				})
				.catch((error) => {

				});
		});

	function reFillSelectCities() {
		if (getElement(`#profile_country`).value != '') {

			axios.get(`/api/countries/${getElement(`#profile_country`).value}/cities`)
				.then((risposta) => {
					fillSelect(getElement(`#profile_city`), risposta.data.data, getElement(`#profile_city-id`).value, `Seleccione Ciudad`);
				});
		} else {
			getElement(`#profile_city`).innerHTML = `<option value="">Seleccione Ciudad</option>`;
		}
	}

	// $(`#profile_my-coupons`).on('click', () => {
	// 	//Revisando los tiempos para eliminar los cupones. 7 dias de vida;
	// 	axios.put('/my-profile/update-coupons')
	// 		.then((risposta) => {
	// 			console.log("Vida de los cupones actualizados!");
	// 		});
	// });

})();