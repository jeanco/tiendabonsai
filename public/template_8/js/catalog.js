(() => {
	var categorySelected = getValueParameter('categoria'), subcategorySelected = getValueParameter('subcategoria'), attributes = [], perPage = 12, q = getValueParameter('q');
	fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected);
	fetch_data_attributes(subcategorySelected, categorySelected);

	$(document).on('selectmenuchange', '.catalog-subcategory__change', function(E) {
		// let _that = $(this);
		// //let _categorySlug = _that.parent().prev()[0].dataset.slug;
		// let _categorySlug = _that.parent().parent().parent().prev().children()[0].dataset.slug;
		// let _subcategorySlug = _that[0].dataset.slug;
		// categorySelected = _categorySlug;
		subcategorySelected = $(".catalog-subcategory__change option:selected")[0].dataset.slug;
		q = ``;
		$(`#catalog-product__search`).val("");

		newUrl = `?categoria=${categorySelected}&subcategoria=${subcategorySelected}`;
		window.history.replaceState("", "", newUrl);

		fetch_data_attributes(subcategorySelected, categorySelected);
		fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected);
	});
	
	$(document).on('selectmenuchange', '.catalog-category__change', function(E) {
		let _id = E.target.value;
		q = ``;
		$(`#catalog-product__search`).val("");

		categorySelected = $(".catalog-category__change option:selected")[0].dataset.slug;
		fetch_data_attributes(subcategorySelected, categorySelected);
		fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected);

		$.ajax({
			url: `/api/template_8/category/${_id}/subcategories`,
			success: function(data) {

				let _content = `<option data-slug="" value="">Todos</option>`;

				data.forEach((value) => {
					_content += `<option data-slug="${value.slug}" value="${value.id}">${value.name}</option>`;
				});

				$(`.catalog-subcategory__change`).html(_content);
				$(".catalog-subcategory__change").selectmenu("refresh");

				newUrl = `?categoria=${categorySelected}&subcategoria=`;
				window.history.replaceState("", "", newUrl);
			}
		});

		// E.preventDefault();
		// let _that = $(this);
		// let _categorySlug = _that[0].dataset.slug;
		// categorySelected = _categorySlug;
		// subcategorySelected = ``;
		// q = ``;
		// newUrl = `?categoria=${_categorySlug}&subcategoria=${subcategorySelected}`;
		// window.history.replaceState("", "", newUrl);

		// fetch_data_attributes(subcategorySelected, categorySelected);
		// fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected);
	});

	$(document).on('selectmenuchange', '.catalog-attribute__change', function(E) {

		attributes = [];
		q = ``;
		$(`#catalog-product__search`).val("");

		$(".catalog-attribute__change").each(function(index, value) {
			let _attribute_id = $(value).val();
			if (_attribute_id) {
				attributes.push(_attribute_id);
			}
		});

		fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected);
		newUrl = `?categoria=${categorySelected}&subcategoria=${subcategorySelected}`;
		window.history.replaceState("", "", newUrl);
		// E.preventDefault();
		// let _isChecked = $(this).prop('checked'), _attributeId = $(this)[0].dataset.index;
		// if (_isChecked) {
  //           attributes.push(_attributeId);
		// } else {
  //           attributes = attributes.filter(value => value != _attributeId);
		// }
		// console.log(attributes);
		// fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected);
	});

	$(document).on('keyup', '#catalog-product__search', function(E) {
		E.preventDefault();

		if (E.keyCode == 13) {
			q = $(`#catalog-product__search`).val();

			newUrl = `?categoria=${categorySelected}&subcategoria=${subcategorySelected}&q=${q}`;
			window.history.replaceState("object or string", "Page Title 2", newUrl);
			fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected);
		}
	});

	$(`#apply_filters`).on('click', function(e){
			e.preventDefault();
			attributes = [];

			$(".catalog-attribute__change").each(function(index, value) {
				let _attribute_id = $(value).val();
				if (_attribute_id) {
					attributes.push(_attribute_id);
				}
			});
			fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected);
	});

	// getElement(`#apply_filters`)
	// 	.addEventListener(`click`, (e) => {
	// 		e.preventDefault();

	// 		$(".catalog-attribute__change").each(function( index ) {
	// 			console.log(index);
	// 		});

	// 		//fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected);

	// 		//fetch_data();
	// 	});

	function fetch_data(page, category_slug, attributes_id, per_page, q, subcategory_slug) {
		// ocultar();
		$.ajax({
			url: `/api/template_8/fetch-data-products?page=${page}&category_id=${category_slug}&subcategory_id=${subcategory_slug}&attributes_id=${attributes_id}&per_page=${per_page}&q=${q}`,
			success: function(data) {
				$('#table_data_product').html(data);
			}
		});
	}

	$(document).on('click', '.pagination a', function(event) {
		event.preventDefault();
		let _page = $(this).attr('href').split('&page=')[1];
		fetch_data(_page, categorySelected, attributes, perPage, q, subcategorySelected);
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

	function fetch_data_attributes(subcategory_slug = "", category_slug = "") {
		$.ajax({
			url: `/api/template_8/fetch-data-attributes?subcategory_slug=${subcategory_slug}&category_slug=${category_slug}`,
			success: function(data) {
				$('#table_category-attribute').html(data);
				$(".catalog-attribute__change").selectmenu({});
			}
		});
	}


})();