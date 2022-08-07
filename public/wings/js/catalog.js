(() => {
	var categorySelected = getValueParameter('category'), attributes = [], perPage = 14, q = getValueParameter('q');
	fetch_data(1, categorySelected, attributes, perPage, q);
	fetch_data_attributes_cars(categorySelected);

    $(`#catalog_category`).on(`change`, function(e){
        let _categoryId = e.target.value;
		categorySelected = _categoryId;
		attributes = [];

		fetch_data(1, categorySelected, attributes, perPage, q);
		fetch_data_attributes_cars(categorySelected);

		newUrl = `?category=${categorySelected}`;
		window.history.replaceState("object or string", "Page Title 2", newUrl);
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


	$(document).on('keyup', '#catalog-product__search', function(E) {
		E.preventDefault();

		if (E.keyCode == 13) {
			q = $(`#catalog-product__search`).val();

			newUrl = `?category=${categorySelected}&q=${q}`;
			window.history.replaceState("object or string", "Page Title 2", newUrl);
			fetch_data(1, categorySelected, attributes, perPage, q);
		}

	});

	function fetch_data(page, category_slug, attributes_id, per_page, q) {
		// ocultar();
		$.ajax({
			url: `/api/wings/pagination/fetch-data-cars?page=${page}&category_id=${category_slug}&attributes_id=${attributes_id}&per_page=${per_page}&q=${q}`,
			success: function(data) {
				$('#table_data_product').html(data);
			}
		});
	}

	$(document).on('click', '.pagination a', function(event) {
		event.preventDefault();
		let _page = $(this).attr('href').split('&page=')[1];
		fetch_data(_page, categorySelected, attributes, perPage, q);
	});

	function getValueParameter(parameter) {
		var url_string = window.location.href;
		var url = new URL(url_string);
		let _risposta = url.searchParams.get(parameter);

		if (_risposta == null || _risposta == '') {
			return '';
		}
		return _risposta;
	}

	function fetch_data_attributes_cars(subcategory_slug) {
		$.ajax({
			url: `/api/wings/fetch-data-attributes-cars?subcategory_slug=${subcategory_slug}`,
			success: function(data) {
				// setTimeout(carga, 1000);
				$('#table_category-attribute').html(data);
			}
		});
	}


})();