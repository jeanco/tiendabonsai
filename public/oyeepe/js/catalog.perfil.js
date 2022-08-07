(() => {
	$(document).on('click', '.add_to_cart', function(e) {
		e.preventDefault();
		let _productId = $(this)[0].dataset.index;
		// localStorage.removeItem("cart");
		addingProduct(_productId);
		fill_cart();
	});

	$(document).on('click', '.shop_right_now', function(e) {
		e.preventDefault();
		let _productId = $(this)[0].dataset.index;
		localStorage.removeItem("cart");
		addingProduct(_productId);
		fill_cart();
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
			.catch((error) => {
				console.log();
			});
		} else {
			window.location.replace(`/acceder`);
		}
	});


})();
