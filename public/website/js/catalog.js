(() => {
	var categorySlugSelected = '',
		subcategorySlugSelected = '',
		q = '',
		brandSelected = [],
		colorSelected = '',
		priceRangeSelected = '',
		perPage = 16,
		orderedBy = 'relevance'; //max_price and min_price
		byCompany = (window.location.pathname == `/catalogo`) ? '' : window.location.pathname.substring(1, window.location.pathname.length),
		newUrl = ``;

	// fetch_data(1, categorySlugSelected, brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, byCompany);
	fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'), getValueParameter('q'));
	fetch_data_attributes(getValueParameter('subcategory'));

	$(document).on('click', '.catalog-category__change', function(E) {
		E.preventDefault();
		let _categorySlug = $(this)[0].dataset.slug;
		categorySlugSelected = _categorySlug;

		newUrl = `${(getValueCompany() == '') ? 'catalogo' : getValueCompany()}?category=${categorySlugSelected}&subcategory=`;
		window.history.replaceState("object or string", "Page Title 2", newUrl);
		fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	});

	$(document).on('click', '#home-search__go', function(E) {
		E.preventDefault();
		let _categorySlug = $(`#home-search_category`).find(':selected').data('slug');
		categorySlugSelected = _categorySlug;
		let _q = $(`#home-search_text`).val();

		newUrl = `${(getValueCompany() == '') ? 'catalogo' : getValueCompany()}?category=${categorySlugSelected}&subcategory=&q=${_q}`;
		window.history.replaceState("object or string", "Page Title 2", newUrl);
		fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'), getValueParameter('q'));
	});

	$("#home-search_text").keyup(function(event) {
		if (event.keyCode === 13) {
			$("#home-search__go").click();
		}
	});

	$(`#catalog_special-offers`).on('click', function(e){
		e.preventDefault();
		//Adding promotion = true;
		newUrl = `${(getValueCompany() == '') ? 'catalogo' : getValueCompany()}?category=${getValueParameter('category')}&subcategory=${getValueParameter('subcategory')}&promotion=true`;
		window.history.replaceState("object or string", "Page Title 2", newUrl);
		fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	});

	// getElement(`#catalog_special-offers`)
	// 	.addEventListener('click', (e) => {
	// 		e.preventDefault();
	// 		//Adding promotion = true;
	// 		newUrl = `${(getValueCompany() == '') ? 'catalogo' : getValueCompany()}?category=${getValueParameter('category')}&subcategory=${getValueParameter('subcategory')}&promotion=true`;
	// 		window.history.replaceState("object or string", "Page Title 2", newUrl);
	// 		fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	// 	});

	$(document).on('click', '.catalog-subcategory__change', function(E) {
		E.preventDefault();
		let _that = $(this);
		let _categorySlug = _that.parent().parent().parent().parent().parent().prev()[0].dataset.slug;
		let _subcategorySlug = _that[0].dataset.slug;
		// subcategorySlugSelected = _subcategorySlug;
		newUrl = `${(getValueCompany() == '') ? 'catalogo' : getValueCompany()}?category=${_categorySlug}&subcategory=${_subcategorySlug}`;
		window.history.replaceState("object or string", "Page Title 2", newUrl);
		fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	});

	$(document).on('click', '.catalog-subcategory__change-divemotor', function(E) {
		E.preventDefault();
		let _that = $(this);
		let _categorySlug = _that[0].dataset.category_slug;
		let _subcategorySlug = _that[0].dataset.subcategory_slug;

		document.querySelector(`#catalog_category-name`).innerHTML = _that[0].dataset.category_name;
		document.querySelector(`#catalog_subcategory-name`).innerHTML = _that[0].dataset.subcategory_name;

		// subcategorySlugSelected = _subcategorySlug;
		newUrl = `${(getValueCompany() == '') ? 'catalogo' : getValueCompany()}?category=${_categorySlug}&subcategory=${_subcategorySlug}`;
		window.history.replaceState("object or string", "Page Title 2", newUrl);

		brandSelected = [];
		// fetch_data_attributes(_subcategorySlug);
		fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	});

	$(document).on('click', '.catalog-subcategory__change_', function(E) {
		E.preventDefault();
		let _that = $(this);
		let _categorySlug = _that.parent().parent().prev()[0].dataset.slug;
		let _subcategorySlug = _that[0].dataset.slug;
		// subcategorySlugSelected = _subcategorySlug;
		newUrl = `${(getValueCompany() == '') ? 'catalogo' : getValueCompany()}?category=${_categorySlug}&subcategory=${_subcategorySlug}`;
		window.history.replaceState("object or string", "Page Title 2", newUrl);

		brandSelected = [];
		fetch_data_attributes(_subcategorySlug);
		fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	});

	$(document).on('click', '.click-menu', function(E) {
		$('.menu-heading').click();
	});

	$(document).on('click', '.catalog-brand__change', function(E) {
		// E.preventDefault();
		let _isChecked = $(this).prop('checked');
		let _attributeSlug = $(this)[0].dataset.slug;

		if (_isChecked) {
			//Checked
			brandSelected.push(_attributeSlug);
		} else {
			brandSelected = brandSelected.filter(value => value != _attributeSlug);
		}

		fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	});

	$(document).on('click', '.catalog-color__change', function(E) {
		E.preventDefault();
		colorSelected = $(this)[0].dataset.slug;
		fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	});

	// axios.get(`/api/catalog?page=1`)
	// 	.then((response) => {
	// 		$(`#catalog_pagination`).html(``);
	// 		let _content = `<li><a href="shop-list-v2.html#"><i class="ion-chevron-left"></i></a></li>`;
	// 		for (var i = 1; i <= response.data; i++) {
	// 			// console.log(i);
	// 			_content += `<li><a href="" data-page=${i}>${i}</a></li>`;
	// 		}
	// 		$(`#catalog_pagination`).html(`${_content}<li><a href="shop-list-v2.html#"><i class="ion-chevron-right"></i></a></li>`);
	// 	});

	$(document).on('click', '.pagination a', function(event) {
		event.preventDefault();
		let _page = $(this).attr('href').split('&page=')[1];
		fetch_data(_page, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'),getValueParameter('promotion'));
	});

	function fetch_data(page, category_slug, brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, byCompany, subcategory_slug, promotion, text_to_search = '') {
		ocultar();
		$.ajax({
			url: `/api/pagination/fetch_data?page=${page}&category_slug=${category_slug}&brand_selected=${brandSelected}&color_selected=${colorSelected}&price_range_selected=${priceRangeSelected}&per_page=${perPage}&ordered_by=${orderedBy}&slug_company=${byCompany}&subcategory_slug=${subcategory_slug}&promotion=${promotion}&q=${text_to_search}`,
			success: function(data) {
				setTimeout(carga, 1000);
				$('#table_data').html(data);
				$(".windows8").hide();
			}
		});
	}

	function fetch_data_attributes(subcategory_slug) {
		ocultar();
		$.ajax({
			url: `/api/fetch_data_attributes?subcategory_slug=${subcategory_slug}`,
			success: function(data) {
				setTimeout(carga, 1000);
				$('#table_category-attribute').html(data);
			}
		});
	}


	function carga() {
		// document.getElementById('circulo_').className = 'hide';
		// document.getElementById('table_data').className = 'center';
	}

	function ocultar() {
		// document.getElementById('table_data').className = 'hide';
		// document.getElementById('circulo_').className = 'center';
	}

	// getElement(`#price-slider_`)
	// 	.addEventListener('input change', (e) => {
	// 	});
	$(`#filter_by_price`).on('click', function(e){
		e.preventDefault();
		priceRangeSelected = getElement(`#price-slider_`).value;
		fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	});

	// getElement(`#filter_by_price`)
	// 	.addEventListener('click', (e) => {
	// 		e.preventDefault();
	// 		priceRangeSelected = getElement(`#price-slider_`).value;
	// 		fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	// 	});

	$(document).on('click', '.filter_per_page', function(e) {
		e.preventDefault();
		perPage = $(this)[0].dataset.value;
		fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	});

	$(document).on('click', '.ordered_by', function(e) {
		e.preventDefault();
		orderedBy = $(this)[0].dataset.value;
		fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	});

	$(`#remove_filters`).on('click', function(e){
		e.preventDefault();

		categorySlugSelected = '';
		brandSelected = '';
		colorSelected = '';
		priceRangeSelected = '';
		q = '';
		fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'), getValueParameter('q'));
	});

	// getElement(`#remove_filters`)
	// 	.addEventListener('click', (e) => {
	// 		e.preventDefault();

	// 		categorySlugSelected = '';
	// 		brandSelected = '';
	// 		colorSelected = '';
	// 		priceRangeSelected = '';
	// 		fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	// 	});

	// $(document).on('click', '.add_to_cart', function(e) {
	// 	e.preventDefault();
	// 	let _productId = $(this)[0].dataset.index;
	// 	addingProduct(_productId);
	// 	fill_cart();
	// });

	// function addingProduct(productId) {
	// 	if (localStorage.getItem("cart") == null) {
	// 		let _cart = [];
	// 		_cart.push(productId);
	// 		localStorage.setItem(`cart`, _cart);
	// 	} else {
	// 		let _cartSaved = localStorage.getItem("cart").split(',');
	// 		_cartSaved.push(productId);
	// 		localStorage.setItem(`cart`, _cartSaved);
	// 	}
	// }

	function getValueParameter(parameter){
		var url_string = window.location.href;
		var url = new URL(url_string);
		let _risposta = url.searchParams.get(parameter);

		if (_risposta == null || _risposta == '') {
			return '';
		}
		return _risposta;
	}

	function getValueCompany(){

		let _pathName = window.location.pathname;

		if (_pathName == "/catalogo") {
			return '';
		} else {
			let _companySlug = _pathName.substring(1, _pathName.length);
			return _companySlug;
		}
	}

	$(document).on('click', '.catalog-remove-select', function(){
		let _that = $(this), _parent = _that.parent().parent().parent(), _index=_parent[0].dataset.index;
		_parent.html(``);

		_parent.html(`<div class="row align-items-center" style="height: 100%;">
							<div class="col-12 text-center">
								<button type="button" data-index=${_index} class="btn btn-sm btn-success catalog-select add_to_cart">Elegir Producto</button>
							</div>
							</div>`);

	});

	$(document).on('click', '.catalog-select', function(){
		let _that = $(this), _parent = _that.parent().parent().parent(), _index=_parent[0].dataset.index;
		_parent.html(``);
		_parent.html(`<div class="row align-items-center" style="height: 100%">
						<div class="col-12">
							<a href="javascript:void(0);" class="catalog-remove-select cart__remove-product" data-index=${_index}> <i class="fas fa-times-circle fa-3x" style="color: #fff;"></i> </a>
							</div>
						</div>`);

	});

	// document.cookie = "testing=1";

})();