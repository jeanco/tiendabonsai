(() => {

	var categorySlugSelected = '',
		subcategorySlugSelected = '',
		brandSelected = [],
		colorSelected = '',
		priceRangeSelected = '',
		perPage = 8,
		orderedBy = 'relevance'; //max_price and min_price
	byCompany = (window.location.pathname == `/catalogo`) ? '' : window.location.pathname.substring(1, window.location.pathname.length),
		newUrl = ``;

	// fetch_data(1, categorySlugSelected, brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, byCompany);
	fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));

	$(document).on('click', '.catalog-category__change', function(E) {
		E.preventDefault();
		let _categorySlug = $(this)[0].dataset.slug;
		categorySlugSelected = _categorySlug;

		newUrl = `${(getValueCompany() == '') ? 'catalogo' : getValueCompany()}?category=${categorySlugSelected}`;
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
		let _categorySlug = _that[0].dataset.slug_category;
		let _subcategorySlug = _that[0].dataset.slug;
		newUrl = `${(getValueCompany() == '') ? 'catalogo' : getValueCompany()}?category=${_categorySlug}&subcategory=${_subcategorySlug}`;
		window.history.replaceState("object or string", "Page Title 2", newUrl);
		fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	});

	// $(document).on('click', '.click-menu', function(E) {

	// 	$('.menu-heading').click();
	// });

	// $(document).on('click', '.catalog-brand__change', function(E) {
	// 	// E.preventDefault();
	// 	let _isChecked = $(this).prop('checked');
	// 	let _attributeSlug = $(this)[0].dataset.slug;

	// 	if (_isChecked) {
	// 		//Checked
	// 		brandSelected.push(_attributeSlug);
	// 	} else {
	// 		brandSelected = brandSelected.filter(value => value != _attributeSlug);
	// 		//Not Checked
	// 	}

	// 	fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	// 	// console.log($(this).prop('checked'));
	// 	// let _categorySlug = $(this)[0].dataset.slug;
	// 	// categorySlugSelected = _categorySlug;
	// 	// fetch_data(1, _categorySlug);
	// });

	// $(document).on('click', '.catalog-color__change', function(E) {
	// 	E.preventDefault();
	// 	colorSelected = $(this)[0].dataset.slug;
	// 	fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	// });

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
		console.log(_page);
		fetch_data(_page, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	});

	function fetch_data(page, category_slug, brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, byCompany, subcategory_slug, promotion) {
		// ocultar();
		$.ajax({
			url: `/api/pagination/fetch_data?page=${page}&category_slug=${category_slug}&brand_selected=${brandSelected}&color_selected=${colorSelected}&price_range_selected=${priceRangeSelected}&per_page=${perPage}&ordered_by=${orderedBy}&slug_company=${byCompany}&subcategory_slug=${subcategory_slug}&promotion=${promotion}`,
			success: function(data) {
				// setTimeout(carga, 1000);
				$('#table_data_').html(data);
			}
		});
	}

	// function carga() {
	// 	document.getElementById('circulo_').className = 'hide';
	// 	document.getElementById('table_data').className = 'center';
	// }

	// function ocultar() {
	// 	document.getElementById('table_data').className = 'hide';
	// 	document.getElementById('circulo_').className = 'center';
	// }

	// getElement(`#price-slider_`)
	// 	.addEventListener('input change', (e) => {
	// 	});

	// getElement(`#filter_by_price`)
	// 	.addEventListener('click', (e) => {
	// 		e.preventDefault();
	// 		priceRangeSelected = getElement(`#price-slider_`).value;
	// 		fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	// 	});

	// $(document).on('click', '.filter_per_page', function(e) {
	// 	e.preventDefault();
	// 	perPage = $(this)[0].dataset.value;
	// 	fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	// });

	// $(document).on('click', '.ordered_by', function(e) {
	// 	e.preventDefault();
	// 	orderedBy = $(this)[0].dataset.value;
	// 	fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	// });

	// getElement(`#remove_filters`)
	// 	.addEventListener('click', (e) => {
	// 		e.preventDefault();

	// 		categorySlugSelected = '';
	// 		brandSelected = '';
	// 		colorSelected = '';
	// 		priceRangeSelected = '';
	// 		fetch_data(1, getValueParameter('category'), brandSelected, colorSelected, priceRangeSelected, perPage, orderedBy, getValueCompany(), getValueParameter('subcategory'), getValueParameter('promotion'));
	// 	});

	$(document).on('click', '.add_to_cart', function(e) {
		e.preventDefault();
		let _productId = $(this)[0].dataset.index;
		// localStorage.removeItem("cart");
		addingProduct(_productId);
		fill_cart();
	});

	$(document).on('click', '.shop_right_now', function(e) {
		window.location.replace("/orden/info");
	});


	function addingProduct(productId) {
		if (localStorage.getItem("cart") == null) {
			let _cart = [];
			_cart.push(productId);
			localStorage.setItem(`cart`, _cart);
		} else {
			let _cartSaved = localStorage.getItem("cart").split(',');
			_cartSaved.push(productId);
			localStorage.setItem(`cart`, _cartSaved);
		}
	}

	function getValueParameter(parameter) {
		var url_string = window.location.href;
		var url = new URL(url_string);
		let _risposta = url.searchParams.get(parameter);

		if (_risposta == null || _risposta == '') {
			return '';
		}
		return _risposta;
	}

	function getValueCompany() {
		let _pathName = window.location.pathname;

		if (_pathName == "/catalogo") {
			return '';
		} else {
			let _companySlug = _pathName.substring(1, _pathName.length);
			return _companySlug;
		}
	}

	$(document).on('click', '.save_coupon', function(e){
		e.preventDefault();
		let _productId = $(this)[0].dataset.index;

		if ($(`#is_logged`).val()) {
			axios.post(`/api/oyeepe/register-coupon`, {
				'product_id': _productId,
				'user_id': $(`#user_index`).val(),
			})
			.then((response) => {
				console.log("Cupon guardado correctamente");
				window.location.replace(`/miperfil/${$(`#user_index`).val()}`);
			})
			// .then(() => {
			// 	axios.get(`/admin/user-information`)
			// 		.then((risposta) => {
			// 			console.log(risposta.data);
			// 		});
			// })
			.catch((error) => {
				console.log();
			});

		} else {
			window.location.replace(`/acceder`);
		}
	});
})();