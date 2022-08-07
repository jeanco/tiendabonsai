(() => {

	$('#home_category').val(1);

	// $(`#home_category`).on('change', function(e){
	// 		let _categoryId = e.target.value;

	// 		axios.get(`/api/categories/${_categoryId}/subcategories-published`)
	// 			.then((risposta) => {

	// 				let _subcategories = risposta.data;
	// 				fillSelectWithOutFirstOption(getElement(`#home_subcategory`), _subcategories, null);
	// 				$(`#home_subcategory`).selectpicker('refresh');
	// 				// charge_attributes();
	// 				// $(`#home_subcategory`).html(``);

	// 			});
	// });

	// $(`#home_search`).on('keyup', function(e){
	// 	axios.get(`/api/miranda/products/search?q=${e.target.value}`)
	// 		.then((risposta) => {
	// 			console.log(risposta.data);
	// 		});
	// });

	getElement(`#home__search`)
		.addEventListener('click', (e) => {
			e.preventDefault();
			window.location.replace(`${window.location.origin}/catalogo?q=${getElement(`#home_text-to-search`).value}&category=${$('#home_category').val()}`);
		});

	$('#home_company-map').locationpicker({
		enableAutocomplete: true,
		enableReverseGeocode: true,
		radius: 0,
		location: {
			latitude: $('#home_company-latitude').val(),
			longitude: $('#home_company-longitude').val()
		},
		inputBinding: {
			// latitudeInput: $('#product_latitude'),
			// longitudeInput: $('#product_longitude'),
			// locationNameInput: $('#product_address')
		}
	});


})();