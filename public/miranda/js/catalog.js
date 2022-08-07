(() => {
	var categorySelected = getValueParameter('category'), attributes = [], perPage = 14, q = getValueParameter('q');
	fetch_data(1, categorySelected, attributes, perPage, q);

	$(document).on('click', '.catalog-category__change', function(E) {
		E.preventDefault();
		let _that = $(this);
		let _categoryId = $(this)[0].dataset.index;
		let _categorySlug_ = $(this)[0].dataset.slug;
		q = '';
		categorySelected = _categoryId;

		$(".catalog-category__change").each(function(index) {
			$(this).removeClass('active');
		});

		_that.addClass('active');
		newUrl = `?category=${_categorySlug_}`;
		window.history.replaceState("object or string", "Page Title 2", newUrl);
		// fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
		fetch_data(1, categorySelected, attributes, perPage, q);
	});

	$(document).on('click', '.catalog-attribute__change', function(E) {
		// E.preventDefault();
		let _isChecked = $(this).prop('checked'), _attributeId = $(this)[0].dataset.index;
		if (_isChecked) {
			attributes.push(_attributeId);
		} else {
			attributes = attributes.filter(value => value != _attributeId);
		}

		fetch_data(1, categorySelected, attributes, perPage, q);
	});


	$(document).on('click', '.clik_whatsapp', function(E) {
		var number = $(this).val();
		//alert(number);
		var baseUrl = `https://api.whatsapp.com/send?phone=.${number}&amp;text=Me%20interesa%20sus%20servicios%20.%20Más%20información%20por%20favor.&amp;source=&amp;data=`;
        window.open(baseUrl,'_blank');
	});



	// var categoryValueInitial = getValueParameter('category');
	// if (categoryValueInitial != '') {
	// 	$(`#catalog_categories`).val(categoryValueInitial);

	// 	axios.get(`/api/categories/${categoryValueInitial}/subcategories-published`)
	// 		.then((risposta) => {
	// 			fillSelect(getElement(`#catalog_subcategories`), risposta.data, null, `Todos los Inmuebles`);
	// 			$(`#catalog_filters`).hide();
	// 			if (getElement(`#catalog_subcategories`).value != '') {
	// 				charge_attributes();
	// 				$(`#catalog_filters`).show();
	// 			} else {
	// 				attributes = [];
	// 				fetch_data(1, getElement(`#catalog_categories`).value, getElement(`#catalog_subcategories`).value, attributes, perPage);
	// 			}
	// 		});
	// } else {
	// 	$(`#catalog_filters`).hide();
	// 	if (getElement(`#catalog_subcategories`).value != '') {
	// 		charge_attributes();
	// 		$(`#catalog_filters`).show();
	// 	} else {
	// 		attributes = [];
	// 		fetch_data(1, getElement(`#catalog_categories`).value, getElement(`#catalog_subcategories`).value, attributes, perPage);
	// 	}
	// }


	// function fetch_data_attributes(subcategory_slug) {
	// 	ocultar();
	// 	$.ajax({
	// 		url: `/api/fetch_data_attributes?subcategory_slug=${subcategory_slug}`,
	// 		success: function(data) {
	// 			setTimeout(carga, 1000);
	// 			$('#table_category-attribute').html(data);
	// 		}
	// 	});
	// }


	// getElement(`#catalog_categories`)
	// 	.addEventListener('change', function(e) {
	// 		let _categoryId = e.target.value;

	// 		axios.get(`/api/categories/${_categoryId}/subcategories-published`)
	// 			.then((risposta) => {
	// 				// console.log(risposta);
	// 				fillSelect(getElement(`#catalog_subcategories`), risposta.data, null, `Todos los Inmuebles`);
	// 				$(`#catalog_filters`).hide();
	// 				if (getElement(`#catalog_subcategories`).value != '') {
	// 					charge_attributes();
	// 					$(`#catalog_filters`).show();
	// 				} else {
	// 					attributes = [];
	// 					fetch_data(1, getElement(`#catalog_categories`).value, getElement(`#catalog_subcategories`).value, attributes, perPage);
	// 				}
	// 			});
	// 	});

	// getElement(`#catalog_subcategories`)
	// 	.addEventListener('change', function(e) {
	// 		$(`#catalog_filters`).hide();
	// 		if (e.target.value != '') {
	// 			charge_attributes();
	// 			$(`#catalog_filters`).show();
	// 		} else {
	// 			attributes = [];
	// 			fetch_data(1, getElement(`#catalog_categories`).value, getElement(`#catalog_subcategories`).value, attributes, perPage);
	// 		}
	// 	});

	// function charge_attributes() {
	// 	axios.get(`/api/subcategories/${getElement(`#catalog_subcategories`).value}/categories-attributes`)
	// 		.then((response) => {
	// 			let _categories = response.data,
	// 				_content = ``,
	// 				_subContent = ``;

	// 			attributes = [];

	// 			getElement(`#catalog_filters`).innerHTML = ``;

	// 			_categories.forEach((value) => {

	// 				_subContent = ``;

	// 				value.attributes_relationship.forEach((attribute, index) => {

	// 					if (index == 0) {
	// 						attributes.push(attribute.id);
	// 					}

	// 					_subContent += `
	// 						<option value="${attribute.id}">${attribute.name}</option>
	// 						`;
	// 				});

	// 				_content += `
	// 				<div class="aside-title"><h5>${value.name}</h5></div>
	// 					<div class="mb-2">
	// 					<select class="select-catalog catalog_attributes">
	// 						${_subContent}
	// 					</select>
	// 				</div>
	// 				<br>
	// 					`;
	// 			});
	// 			getElement(`#catalog_filters`).innerHTML = _content;
	// 		})
	// 		.then(() => {
	// 			fetch_data(1, getElement(`#catalog_categories`).value, getElement(`#catalog_subcategories`).value, attributes, perPage);
	// 		});
	// }
	// $(".catalog_attributes").each(function(index) {
	// 	attributes.push($(this).val());
	// 	console.log(attributes);
	// });

	// setTimeout(() => {
	// }, 200);
	function fetch_data(page, category_slug, attributes_id, per_page, q) {
		// ocultar();
		$.ajax({
			url: `/api/miranda/pagination/fetch-data-catalog?page=${page}&category_id=${category_slug}&attributes_id=${attributes_id}&per_page=${per_page}&q=${q}`,
			success: function(data) {
				// setTimeout(carga, 1000);
				// console.log(data);
				// console.log(data);
				$('#table_data_product').html(data);
			}
		});
	}

	$(document).on('click', '.pagination a', function(event) {
		event.preventDefault();
		let _page = $(this).attr('href').split('&page=')[1];
		fetch_data(_page, categorySelected, attributes, perPage, q);
	});

	// $(document).on('change', '.catalog_attributes', function(e) {
	// 	// console.log(e.target.value);
	// 	attributes = [];
	// 	$(".catalog_attributes").each(function(index) {
	// 		// console.log($(this).val());
	// 		attributes.push($(this).val());
	// 		// console.log( index + ": " + $( this ).text() );
	// 	});
	// 	fetch_data(1, getElement(`#catalog_categories`).value, getElement(`#catalog_subcategories`).value, attributes, perPage);
	// });

	function getValueParameter(parameter) {
		var url_string = window.location.href;
		var url = new URL(url_string);
		let _risposta = url.searchParams.get(parameter);

		if (_risposta == null || _risposta == '') {
			return '';
		}
		return _risposta;
	}

	$(document).on('click', '.catalog_contact', function() {
		let _name = $(this)[0].dataset.name;
		let _address = $(this)[0].dataset.address;
		let _id = $(this)[0].dataset.id;

		getElement(`#catalog-contact-message`).value = `Hola. Estoy interesado en el ${_name} ubicado en ${_address}. Muchas gracias.`
		getElement(`#catalog-product-id`).value = _id;
	});

	$(`#catalog-contact__send`).on('click', function(){
			cleanError();
			$("#fakeLoader").show();
			axios.post('/api/miranda/orders', {
					'name': getElement(`#catalog-contact-name`).value,
					'cel': getElement(`#catalog-contact-cel`).value,
					'msg': getElement(`#catalog-contact-message`).value,
					'product_id': getElement(`#catalog-product-id`).value,
				})
				.then((risposta) => {
					// alert(risposta.data.message);
					$(`#contactar`).modal('hide');
					$(`#contactar-cel-company`).modal(`show`);
					$("#fakeLoader").hide();
				})
				.catch((error) => {
					$.each(error.response.data, function(key, value) {
						if (key == "name") {
							$.each(value, function(errores, eror) {
								$('#product-perfil-contact-name-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == "cel") {
							$.each(value, function(errores, eror) {
								$('#product-perfil-contact-cel-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == "msg") {
							$.each(value, function(errores, eror) {
								$('#product-perfil-contact-message-error').append("<li class='error-block'>" + eror + "</li>");
							});
						};
					});
				});
	});

	// getElement(`#catalog-contact__send`)
	// 	.addEventListener('click', function() {

	// 	});
})();