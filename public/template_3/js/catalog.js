(() => {
	var categorySelected = getValueParameter('categoria'), subcategorySelected = getValueParameter('subcategoria'), attributes = [], perPage = 15, q = getValueParameter('q');
	fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected);
	fetch_data_attributes(subcategorySelected, categorySelected);
	
	$(document).on('click', '.catalog-subcategory__change', function(E) {
		E.preventDefault();
		let _that = $(this);
		//let _categorySlug = _that.parent().prev()[0].dataset.slug;
		let _categorySlug = _that.parent().parent().parent().prev().children()[0].dataset.slug;
		let _subcategorySlug = _that[0].dataset.slug;
		categorySelected = _categorySlug;
		subcategorySelected = _subcategorySlug;
		q = ``;
		newUrl = `?categoria=${_categorySlug}&subcategoria=${_subcategorySlug}`;
		window.history.replaceState("", "", newUrl);

		fetch_data_attributes(_subcategorySlug, _categorySlug);
		fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected);

	});
	
	$(document).on('click', '.catalog-category__change', function(E) {
		E.preventDefault();
		let _that = $(this);
		let _categorySlug = _that[0].dataset.slug;
		categorySelected = _categorySlug;
		subcategorySelected = ``;
		q = ``;
		newUrl = `?categoria=${_categorySlug}&subcategoria=${subcategorySelected}`;
		window.history.replaceState("", "", newUrl);

		fetch_data_attributes(subcategorySelected, categorySelected);
		fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected);
	});

	$(document).on('click', '.catalog-attribute__change', function(E) {
		// E.preventDefault();
		let _isChecked = $(this).prop('checked'), _attributeId = $(this)[0].dataset.index;
		if (_isChecked) {
            attributes.push(_attributeId);
		} else {
            attributes = attributes.filter(value => value != _attributeId);
		}
		console.log(attributes);
		fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected);
	});

	// $(document).on('keyup', '#catalog-product__search', function(E) {
	// 	E.preventDefault();

	// 	if (E.keyCode == 13) {
	// 		q = $(`#catalog-product__search`).val();

	// 		newUrl = `?categoria=${categorySelected}&subcategoria=${subcategorySelected}&q=${q}`;
	// 		window.history.replaceState("object or string", "Page Title 2", newUrl);
	// 		fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected);
	// 	}
	// });

	function fetch_data(page, category_slug, attributes_id, per_page, q, subcategory_slug) {
		// ocultar();
		$.ajax({
			url: `/api/template_3/fetch-data-products?page=${page}&category_id=${category_slug}&subcategory_id=${subcategory_slug}&attributes_id=${attributes_id}&per_page=${per_page}&q=${q}`,
			success: function(data) {
				console.log(1);
				$('#table_data_product').html(data);
				console.log(2);
				$('[data-countdown]').each(function() {
					var $this = $(this), finalDate = $(this).data('countdown');
					$this.countdown(finalDate, function(event) {
					$this.html(event.strftime('%DD %H:%M:%S'));
					});
				});

			}
		});
	}

	$(document).on('click', '.pagination a', function(event) {
		event.preventDefault();
		let _page = $(this).attr('href').split('&page=')[1];
		fetch_data(_page, categorySelected, attributes, perPage, q, subcategorySelected);
	});

	$(document).on('click', '.pagination li a', function(event) {
		
		$("#toTop").trigger("click");
	});

$(document).on('click', '.child-menu-ul li a', function(event) {
		
		  $("#toTop").trigger("click");
		if ($(Window).width()<= 575) {
         
		$("#cerrar_menu_categorias").trigger("click");
           
        } else {
            
        }
	});

$(document).on('click', '.container_check input', function(event) {
		 $("#toTop").trigger("click");
		if ($(Window).width()<= 575) {
          
		$("#cerrar_menu_categorias").trigger("click");
           
        } else {
            
        }
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
			url: `/api/template_3/fetch-data-attributes?subcategory_slug=${subcategory_slug}&category_slug=${category_slug}`,
			success: function(data) {
				$('#table_category-attribute').html(data);
			}
		});
	}


})();