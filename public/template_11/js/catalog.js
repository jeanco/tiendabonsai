(() => {
	var categorySelected = getValueParameter('categoria'), subcategorySelected = getValueParameter('subcategoria'), 
		attributes = [], perPage = 18, q = getValueParameter('q'), category_name = '', 
		subcategory_name = '', order_by = 'DESC', flag_toggle = 0, promotion = getValueParameter('promotion');

	fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected, promotion);
	fetch_data_attributes(subcategorySelected, categorySelected);
		
	$(document).on('change', '#order_by_select', function(E) {
		// E.preventDefault();
		order_by = E.target.value;
		fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected, promotion);
	});

	$(document).on('click', '.catalog-subcategory__change', function(E) {
		E.preventDefault();
		let _that = $(this);
		let _categorySlug = _that.parent().parent().parent().prev().children()[0].dataset.slug;
		let _subcategorySlug = _that[0].dataset.slug;
		categorySelected = _categorySlug;
		subcategorySelected = _subcategorySlug;
		promotion = "";
		q = ``;
		newUrl = `?categoria=${_categorySlug}&subcategoria=${_subcategorySlug}`;
		window.history.replaceState("", "", newUrl);

		fetch_data_attributes(_subcategorySlug, _categorySlug);
		fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected, promotion);

	});
	
	$(document).on('click', '.catalog-category__change', function(E) {
		E.preventDefault();
		let _categorySlug = E.target.dataset.slug;
		categorySelected = _categorySlug;
		subcategorySelected = ``;
		promotion = "";
		q = ``;

		newUrl = `?categoria=${_categorySlug}&subcategoria=${subcategorySelected}`;
		window.history.replaceState("", "", newUrl);

		flag_toggle = 1;
		fetch_data_attributes(subcategorySelected, categorySelected);
		fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected, promotion);
	});

	$(document).on('click', '.catalog-attribute__change', function(E) {
		// E.preventDefault();
		let _isChecked = E.target.checked;
		const attributeId = E.target.dataset.inx;

		if (_isChecked) {
			attributes = [...attributes, attributeId];
			return;
		}
        attributes = attributes.filter(value => value != attributeId);
		//fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected);
	});

	function fetch_data(page, category_slug, attributes_id, per_page, q, subcategory_slug, promotion) {
		$(`.a-breadcrumbs`).remove();

		if (category_slug) {
			$(`#breadcrumbs-parent`).append(`<li class="a-breadcrumbs"><a class="a-breadcrumbs" id="breadcrumb-category" href="/catalogo?categoria=${category_slug}&subcategoria=">${document.querySelector('a[data-slug=' + category_slug + ']').text}</a></li>`);

			if (flag_toggle == 0) {
				$(`${getElement('a[data-slug=' + category_slug + ']').getAttribute('href')}`).collapse('show');
			}
		}

		if (subcategory_slug) {
			$(`#breadcrumbs-parent`).append(`<li class="a-breadcrumbs"><a class="a-breadcrumbs" id="breadcrumb-category" href="/catalogo?categoria=${ category_slug }&subcategoria=${ subcategory_slug }">${document.querySelector('a[data-slug=' + subcategory_slug + ']').text}</a></li>`);
		}

		$.ajax({
			url: `/api/template_11/fetch-data-products?page=${page}&category_id=${category_slug}&subcategory_id=${subcategory_slug}&attributes_id=${attributes_id}&per_page=${per_page}&q=${q}&etiquette=${getElement(`#etiquette`).value}&order_by=${order_by}&promotion=${promotion}`,
			success: function(data) {
				$('#table_data_product').html(data);
				$('[data-countdown]').each(function() {
					var $this = $(this), finalDate = $(this).data('countdown');
					$this.countdown(finalDate, function(event) {
					$this.html(event.strftime('%DD %H:%M:%S'));
					});
				});

			}
		});
	}

	$(document).on('click', '.pagination a', function(e) {
		e.preventDefault();
		//let _page = $(this).attr('href').split('&page=')[1];
		let _page = e.target.getAttribute('href').split('&page=')[1];
		fetch_data(_page, categorySelected, attributes, perPage, q, subcategorySelected, promotion);
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
			url: `/api/template_11/fetch-data-attributes?subcategory_slug=${subcategory_slug}&category_slug=${category_slug}`,
			success: function(data) {
				$('#table_category-attribute').html(data);
			}
		});
	}

	$(document).on('click', '.pagination li a', function(event) {
		$("#toTop").trigger("click");
	});

	$(document).on('click', '.child-menu-ul li a', function(event) {
		
	 	$("#toTop").trigger("click");
		
		if ($(Window).width()<= 575) {
			$("#cerrar_menu_categorias").trigger("click");
        }
	});

	getElement('.btn_filters')
		.addEventListener('click', (e) => {
			e.preventDefault();
			fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected, promotion);

			$("#toTop").trigger("click");

			if ($(Window).width()<= 575) {
				$("#cerrar_menu_categorias").trigger("click");
			}
		});

})();