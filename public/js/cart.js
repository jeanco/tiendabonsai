(() => {
    fill_cart();
    

    function fill_cart(){
        let _products = localStorage.getItem('cart');

        if (_products == null) {

            $(`#cart-header_quantity`).html(0);
            // getElement(`#`).innerHTML = 0;
            $(`#cart_products`).html(``)
        } else {
            let _productsSplitted = _products.split(',');

            $(`#cart-header_quantity`).html(_productsSplitted.length);

            // getElement(`#cart-header_quantity`).innerHTML = _productsSplitted.length;

            axios.get(`/api/products/cart?ids=${localStorage.getItem("cart")}`)
            .then((response) => {

                let _content = ``,
                    _subTotal = 0;

                $(`#cart_products`).html(``)
                // getElement(`#cart_products`).innerHTML = ``;

                response.data.forEach((product) => {
                    _subTotal += product.price * product.quantity;

                    _content += `
                        <div class="single-cart-box">
                            <div class="cart-img">
                                <a href="/catalogo/perfil"><img src="${product.image}" alt="cart-image"></a>
                                <span class="pro-quantity" style="left: 50px; top: 30px;">${product.quantity}</span>
                            </div>
                            <div class="cart-content">
                                <h6><a href="/catalogo/perfil"> ${product.name} </a></h6>
                                <span class="cart-price">S/.${product.price}</span>
                            </div>
                            <a class="del-icone cart__remove-product" data-index=${product.id} href="#"><i class="ion-close"></i></a>
                        </div>`;

                });

                let _costShipping = 0;

                _content += `
                        <div class="cart-footer">
                        <ul class="price-content">
                            <li>Subtotal <span>S/ ${_subTotal}</span></li>
                            <li>Envío <span>S/ ${_costShipping}</span></li>
                            <li>Total <span>S/ ${_subTotal + _costShipping}</span></li>
                        </ul>
                        <div class="cart-actions text-center">
                            <a class="cart-checkout" href="/orden">Comprar</a>
                        </div>
                    </div>`;

                $(`#cart_products`).html(`${_content}`)
                // getElement(`#cart_products`).innerHTML = _content;
                // getElement(`#cart_subtotal`).innerHTML = `S/.${_subTotal}`;
                // getElement(`#cart_total`).innerHTML = `S/.${_subTotal}`;
                getElement(`#cart-header_total`).innerHTML = `S/ ${_subTotal}`;
            });
        }
    }

	$(document).on('click', '.add_to_cart', function(e) {
		e.preventDefault();
		let _productId = $(this)[0].dataset.index;
		// localStorage.removeItem("cart");
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
          Swal.fire({

          position: 'center',
         // icon: 'success',
          title: '¡Se a agregado a su carrito!',
          showConfirmButton: false,
          timer: 1500,
          /*showClass: {
            popup: 'animated fadeInDown faster'
          },*/
           imageUrl: 'https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/dab60938212491.5968c68fa9113.gif',  
          imageAlt: 'Custom image',
          imageWidth: 250,
           // imageHeight: 200,
        })
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
