(() => {

    // var subTotal = 0, total = 0;

    axios.get(`/api/products/cart?ids=${localStorage.getItem("cart")}`)
        .then((response) => {

            let _content = ``,
                _subTotal = 0;
            getElement(`#cart_tbody`).innerHTML = ``;

            response.data.forEach((product) => {
                _subTotal += product.price * product.quantity;
                _content += `
                                <tr class="cart_item">
                                    <td class="product-thumbnail" style="vertical-align: middle; padding: 0px;"><a href=""><img src="${product.image}" alt="images" class="img-responsive" style="height: 65px;"></a></td>
                                    <td class="product-name" style="vertical-align: middle; padding: 0px;">
                                        <a href="checkout-1.html#">${product.name}</a>
                                    </td>
                                    <td class="product-price" style="vertical-align: middle; padding: 0px;">
                                        <p class="price">S/.${product.price}</p>
                                    </td>
                                    <td class="product-quantity" style="vertical-align: middle; padding: 0px;">
                                        <div class="quantity">
                                            <input type="number" data-index="${product.id}" min="1" max=${product.stock} name="quantity" value="${product.quantity}" class="cart__change-quantity">
                                        </div>
                                        <input type="hidden" value="${product.price}">
                                    </td>
                                    <td class="product-price product-subtotal" style="vertical-align: middle; padding: 0px;">
                                        <p class="price">S/.${product.price*product.quantity}</p>
                                    </td>
                                    <td class="product-acciones" style="vertical-align: middle; padding: 0px;">
                                        <a href="" data-index="${product.id}" class="btn-clear cart__remove-product"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                `;

            });

            getElement(`#cart_tbody`).innerHTML = _content;
            getElement(`#cart_subtotal`).innerHTML = `S/.${_subTotal}`;
            getElement(`#cart_total`).innerHTML = `S/.${_subTotal}`;

        });

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

            $(this).parent().parent().remove();
            reCalculatingTotal()
        } else {
            console.log("Cart vacío");
            // alert("Error");
        }
        fill_cart();
    });

    $(document).on('change', '.cart__change-quantity', function(e) {
        e.preventDefault();
        let _that = $(this);
        let _id = _that[0].dataset.index;
        let _newQuantity = e.target.value;

        if (_newQuantity == 0) {
            _newQuantity = 1;
        }

        if (localStorage.getItem(`cart`) != null) {
            let _cartArray = localStorage.getItem("cart").split(',');
            _cartArray = _cartArray.filter(number => number != _id);

            for (var i = 1; i <= _newQuantity; i++) {
                _cartArray.push(_id);
            }
            localStorage.setItem(`cart`, _cartArray);

            let _newTotal = _newQuantity * _that.parent().next().val();
            $(this).parent().parent().next().children().html(`S/.${_newTotal}`);
            reCalculatingTotal()
        } else {
            console.log("Cart vacío");
        }
        fill_cart();
    });


    function reCalculatingTotal() {

        axios.get(`/api/products/cart-lite?ids=${localStorage.getItem("cart")}`)
            .then((response) => {
                let _subTotal = 0;
                response.data.forEach((product) => {
                    _subTotal += product.price * product.quantity;
                });

                let _products = localStorage.getItem('cart');

                let _productsSplitted = _products.split(',');
                $(`#cart-header_quantity`).html(_productsSplitted.length);
                getElement(`#cart_subtotal`).innerHTML = `S/.${_subTotal}`;
                getElement(`#cart_total`).innerHTML = `S/.${_subTotal}`;
                //actualiza el header monto total
                getElement(`#cart-header_total`).innerHTML = `S/ ${_subTotal}`;
            });

    }



})();
