(() => {
	var categorySelected = getValueParameter('categoria'), subcategorySelected = getValueParameter('subcategoria'), 
		attributes = [], perPage = 6, q = getValueParameter('q'), category_name = '', 
		subcategory_name = '', order_by = 'DESC', flag_toggle = 0;
	fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected);
	fetch_data_attributes(subcategorySelected, categorySelected);
	
	$(document).on('change', '#order_by_select', function(E) {
		// E.preventDefault();
		order_by = E.target.value;
		fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected);
	});

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
		flag_toggle = 1;
		fetch_data_attributes(subcategorySelected, categorySelected);
		fetch_data(1, categorySelected, attributes, perPage, q, subcategorySelected);
	});

	$(document).on('click', '.catalog-attribute__change', function(E) {
		// E.preventDefault();
		let _isChecked = $(this).prop('checked'), _attributeId = $(this)[0].dataset.inx;
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
		$(`.a-breadcrumbs`).remove();
		//$(`.a-breadcrumbs`).attr('href', '');

		//$(`#breadcrumb-category`).hide();
		//$(`#breadcrumb-subcategory`).hide();

		if (category_slug) {
			$(`#breadcrumbs-parent`).append(`<li class="a-breadcrumbs"><a class="a-breadcrumbs" id="breadcrumb-category" href="/catalogo?categoria=${category_slug}&subcategoria=">${document.querySelector('a[data-slug=' + category_slug + ']').text}</a></li>`);

			if (flag_toggle == 0) {
				$(`${getElement('a[data-slug=' + category_slug + ']').getAttribute('href')}`).collapse('show');
			}
			//console.log(`${getElement('a[data-slug=' + category_slug + ']').getAttribute('href')}`);
			//$('a[data-slug=' + category_slug + ']').click();
			//document.querySelector(`#breadcrumbs-parent`).innerHTML = ;
			//$(`#breadcrumb-category`).show();
			//document.querySelector(`#breadcrumb-category`).innerHTML = document.querySelector('a[data-slug=' + category_slug + ']').text;
			//$(`#breadcrumb-category`).attr('href', `/catalogo?categoria=${category_slug}&subcategoria=`);
		}

		if (subcategory_slug) {
			$(`#breadcrumbs-parent`).append(`<li class="a-breadcrumbs"><a class="a-breadcrumbs" id="breadcrumb-category" href="/catalogo?categoria=${ category_slug }&subcategoria=${ subcategory_slug }">${document.querySelector('a[data-slug=' + subcategory_slug + ']').text}</a></li>`);
			//$(`#breadcrumb-subcategory`).show();
			//document.querySelector(`#breadcrumb-subcategory`).innerHTML = document.querySelector('a[data-slug=' + subcategory_slug + ']').text;
			//$(`#breadcrumb-subcategory`).attr('href', `/catalogo?categoria=${ category_slug }&subcategoria=${ subcategory_slug }`);	
		}

		$.ajax({
			url: `/api/template_1/fetch-data-products?page=${page}&category_id=${category_slug}&subcategory_id=${subcategory_slug}&attributes_id=${attributes_id}&per_page=${per_page}&q=${q}&etiquette=${getElement(`#etiquette`).value}&order_by=${order_by}`,
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
			url: `/api/template_1/fetch-data-attributes?subcategory_slug=${subcategory_slug}&category_slug=${category_slug}`,
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

  	var presentations;

  	$(document).on('click', '.see-presentations', function(){
  		$(`#add-presentation-to-cart`).addClass('disabled');
  		$(`#product-presentation-price`).hide();
  		let _id = $(this)[0].dataset.index;
  		axios.get(`/api/template_1/products/${_id}/presentations`)
  			.then((response) => {
  				presentations = response.data.presentations;
				let _content = `<option value="">Seleccione</option>`;

				response.data.presentations.forEach(value => {
				_content += `<option value="${value.id}">${value.color.name}</option>`;
				});

				document.querySelector(`#presentation_name`).innerHTML = `Nombre del Producto: ${response.data.product_name}`;
				document.querySelector(`#product_presentations`).innerHTML = _content;
  			})
  	});

  	getElement(`#product_presentations`).addEventListener('change', (e) => {
  		$(`#add-presentation-to-cart`).attr('data-index', "");
  		$(`#add-presentation-to-cart`).removeClass('disabled');
  		$(`#add-presentation-to-cart`).addClass('disabled');
  		$(`#product-presentation-price`).hide();
  		let _object_found;
  		if (e.target.value) {
	  		$(`#add-presentation-to-cart`).removeClass('disabled');
	  		$(`#product-presentation-price`).show();
	  		_object_found = presentations.filter(a => a.id == e.target.value);
	  		$(`#add-presentation-to-cart`).attr('data-index', _object_found[0].product.id);

	  		if (_object_found[0].product.promotion_available) {
				getElement(`#product-price`).innerHTML = `Precio: S/ ${_object_found[0].product.price_promotion}`;
	  			getElement(`#old-product-price`).innerHTML = `S/ ${_object_found[0].product.price}`;
	  			return;
	  		}
	  		getElement(`#product-price`).innerHTML = `Precio: S/ ${_object_found[0].product.price}`;
	  		getElement(`#old-product-price`).innerHTML = ``;
  		}
  	});




})();