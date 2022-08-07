(() => {
	$(document).on('click', '.add_to_cart', function(e) {
		e.preventDefault();
		let _productId = $(this)[0].dataset.index;
		addingProduct(_productId);
		fill_cart();
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

	$(`#add_item_to_cart_with_number`).on('click', function(e) {
		
		e.preventDefault();
		let _that = $(this),
			_id = _that[0].dataset.index,
			_quantityToAdd = _that.parent().prev().children().children().next().val(),
			_cartArray;
		if (_quantityToAdd == 0) {

		} else {
			if (localStorage.getItem(`cart`) != null) {
				_cartArray = localStorage.getItem("cart").split(',');
				// _cartArray = _cartArray.filter(number => number != _id);
				
				for (var i = 1; i <= _quantityToAdd; i++) {
					_cartArray.push(_id);
				}
				localStorage.setItem(`cart`, _cartArray);
			} else {
				_cartArray = [];
				for (var i = 1; i <= _quantityToAdd; i++) {
					_cartArray.push(_id);
				}
				localStorage.setItem(`cart`, _cartArray);
			}
		}

		fill_cart();
		console.log(_cartArray);
	});
})();