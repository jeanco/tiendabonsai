(() => {
	console.log("gofoladow");
	// charge_subcategories(getElement(`#product-perfil_categories`).value);

	getElement(`#product-perfil_categories`)
		.addEventListener('change', function(e) {
			let _categoryId = e.target.value;
			charge_subcategories(_categoryId);
		});

	$(`#product-perfil_contact`).on('click', function(){
		// console.log(e.target.dataset.index);
		getElement(`#catalog-product-id`).value = e.target.dataset.index;
	});

	// getElement(`#product-perfil_contact`)
	// 	.addEventListener('click', function(e) {

	// 	});

	$(`#catalog-contact__send_`).on('click', function(){
		cleanError();

		axios.post('/api/miranda/orders', {
				'name': getElement(`#catalog-contact-name`).value,
				'cel': getElement(`#catalog-contact-cel`).value,
				'msg': getElement(`#catalog-contact-message`).value,
				'product_id': getElement(`#catalog-product-id`).value,
			})
			.then((risposta) => {
				alert(risposta.data.message);
			})
			.catch((error) => {
				$.each(error.response.data, function(key, value) {
					if (key == "name") {
						$.each(value, function(errores, eror) {
							$('#catalog-contact-name-error').append("<li class='error-block'>" + eror + "</li>");
						});
					} else if (key == "cel") {
						$.each(value, function(errores, eror) {
							$('#catalog-contact-cel-error').append("<li class='error-block'>" + eror + "</li>");
						});
					} else if (key == "msg") {
						$.each(value, function(errores, eror) {
							$('#catalog-contact-message-error').append("<li class='error-block'>" + eror + "</li>");
						});
					};
				});
			});
	});

	// getElement(`#catalog-contact__send_`)
	// 	.addEventListener('click', function() {

	// });

	$('#googleMap-145').locationpicker({
		enableAutocomplete: true,
		enableReverseGeocode: true,
		radius: 0,
		location: {
			latitude: $('#product_latitude').val(),
			longitude: $('#product_longitude').val()
		},
		inputBinding: {
			// latitudeInput: $('#product_latitude'),
			// longitudeInput: $('#product_longitude'),
			// locationNameInput: $('#product_address')
		}
	});

	function charge_subcategories(categoryId) {
		axios.get(`/api/categories/${categoryId}/subcategories-published`)
			.then((risposta) => {
				fillSelect(getElement(`#product-perfil_subcategories`), risposta.data, null, `Todos los Inmuebles`);
				// $(`#catalog_filters`).hide();
				// if (getElement(`#catalog_subcategories`).value != '') {
				// 	charge_attributes();
				// 	$(`#catalog_filters`).show();
				// }
			});

	}

	//The buscador
	getElement(`#product-perfil__search`)
		.addEventListener('click', (e) => {
			e.preventDefault();
			window.location.replace(`${window.location.origin}/catalogo?q=${getElement(`#product-perfil_text-to-search`).value}&category=${$('#product-perfil_categories').val()}`);
		});

})();