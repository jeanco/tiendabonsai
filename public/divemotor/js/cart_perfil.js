(() => {
    $(document).on('click', '.cart__remove-product-perfil', function(e) {
        e.preventDefault();

        let _that = $(this), _id = $(this)[0].dataset.index;
        if (localStorage.getItem(`cart`) != null) {
            let _cartArray = localStorage.getItem("cart").split(',');

            _cartArray = _cartArray.filter(number => number != _id);

            if (_cartArray.length == 0) {
                localStorage.removeItem(`cart`);
                document.cookie = "cart= ;path=/ ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
            } else {
                localStorage.setItem(`cart`, _cartArray);
                document.cookie = `cart=${_cartArray};path=/`;
            }

            let _parent = _that.parent();

            _parent.html(``);
            _parent.html(`
                <a href="javascript:void(0)" data-index="${_id}" class="btn btn-success btn-block text-left cart__add-product-perfil"><i class="fas fa-check"></i>&nbsp;&nbsp;Seleccionar</a>
            `);

        } else {
            console.log("Cart vacío");
            // alert("Error");
        }
        // fill_cart();
    });

	$(document).on('click', '.cart__add-product-perfil', function(e) {
		e.preventDefault();
		let _that = $(this), _productId = $(this)[0].dataset.index;
		// localStorage.removeItem("cart");
        adding_product(_productId);

        let _parent = _that.parent();

        _parent.html(``);
        _parent.html(`
            <a href="javascript:void(0)" data-index="${_productId}" class="btn btn-danger btn-block text-left cart__remove-product-perfil"><i class="fas fa-ban"></i>&nbsp;&nbsp;No seleccionar</a>
        `);
		// fill_cart();
	});


    function adding_product(productId){
		if (localStorage.getItem("cart") == null) {
			let _cart = [];
			_cart.push(productId);
            localStorage.setItem(`cart`, _cart);
            document.cookie = `cart=${_cart};path=/`;
		} else {
			let _cartSaved = localStorage.getItem("cart").split(',');
			_cartSaved.push(productId);
            localStorage.setItem(`cart`, _cartSaved);
            document.cookie = `cart=${_cartSaved};path=/`;
		}
    }




})();