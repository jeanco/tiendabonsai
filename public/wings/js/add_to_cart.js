(() => {

    fill_cart();

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

    $(document).on('click', '.cart__remove-product', function(e) {
        e.preventDefault();

        let _id = $(this)[0].dataset.index;
        if (localStorage.getItem(`cart`) != null) {
            let _cartArray = localStorage.getItem("cart").split(',');

            _cartArray = _cartArray.filter(number => number != _id);

            if (_cartArray.length == 0) {
                localStorage.removeItem(`cart`);
                window.location.replace(`/orden-vacio`);
            } else {
                localStorage.setItem(`cart`, _cartArray);
            }

            // $(this).parent().parent().remove();
            // reCalculatingTotal()
        } else {
            console.log("Cart vacío");
            // alert("Error");
        }
        fill_cart();
    });


})();