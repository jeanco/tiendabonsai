(() => {

    // var subTotal = 0, total = 0;
    axios.get(`/api/products/cart?ids=${localStorage.getItem("cart")}`)
        .then((response) => {
            let _content = ``,
                _subTotal = 0;
            getElement(`#cart_tbody`).innerHTML = ``;

            response.data.forEach((product, index) => {

                _subTotal += product.price * product.quantity;

                $(`#cart_tbody`).append(`
                                <tr>
                                    <td style="vertical-align: middle;">
                                        <a href="javascript:void(0)"><img src="${product.image}" alt="user" width="50"/></a>
                                    </td>
                                    <td style="vertical-align: middle;">${product.name}</td>
                                    <td style="vertical-align: middle;">$ ${product.price}</td>
                                    <td style="vertical-align: middle;">
                                        <div class="form-group mb-0">
                                            <input type="text" data-index=${product.id} id="touch-spin${index}" value="${product.quantity}" name="tch3_22" class="touch-spin-input" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                            <input type="hidden" value=${product.price}>
                                        </div>
                                    </td>
                                    <td style="vertical-align: middle;">$ ${(Math.round((product.price*product.quantity) * 100) / 100).toFixed(2)}</td>
                                    <td style="vertical-align: middle;">
                                        <button type="button" data-index=${product.id} class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn cart__remove-product" data-toggle="tooltip" data-original-title="Delete">
                                            <i class="ti-close" aria-hidden="true">
                                            </i>
                                        </button>
                                    </td>
                                </tr>`);

                $(`#touch-spin${index}`).TouchSpin();


            });

            // getElement(`#cart_tbody`).innerHTML = _content;
            _subTotal = parseFloat(_subTotal);
            getElement(`#cart_subtotal`).innerHTML = `$ ${(Math.round((_subTotal) * 100) / 100).toFixed(2)}`;
            let _igvTotal = parseFloat(Math.round(_subTotal*0.18 * 100) / 100).toFixed(2);
            _igvTotal = parseFloat(_igvTotal);
            getElement(`#cart_igv-total`).innerHTML = `$ ${_igvTotal}`;
            // console.log((Math.round((_subTotal+_igvTotal) * 100) / 100).toFixed(2));
            getElement(`#cart_total`).innerHTML = `$ ${(Math.round((_subTotal+_igvTotal) * 100) / 100).toFixed(2)}`;
        });

    $(document).on('click', '.cart__remove-product', function(e) {
        e.preventDefault();
        let _id = $(this)[0].dataset.index;
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

            $(this).parent().parent().remove();
            reCalculatingTotal()
        } else {
            console.log("Cart vacío");
            // alert("Error");
        }
        // fill_cart();
    });

    // $(document).on('change', '.cart__change-quantity', function(e) {
    //     e.preventDefault();
    //     let _that = $(this);
    //     let _id = _that[0].dataset.index;
    //     let _newQuantity = e.target.value;

    //     if (_newQuantity == 0) {
    //         _newQuantity = 1;
    //     }

    //     if (localStorage.getItem(`cart`) != null) {
    //         let _cartArray = localStorage.getItem("cart").split(',');
    //         _cartArray = _cartArray.filter(number => number != _id);

    //         for (var i = 1; i <= _newQuantity; i++) {
    //             _cartArray.push(_id);
    //         }
    //         localStorage.setItem(`cart`, _cartArray);


    //         let _newTotal = _newQuantity * _that.parent().next().val();
    //         $(this).parent().parent().next().children().html(`S/.${_newTotal}`);
    //         reCalculatingTotal()
    //     } else {
    //         console.log("Cart vacío");
    //     }
    //     fill_cart();
    // });

    function reCalculatingTotal() {

        axios.get(`/api/products/cart-lite?ids=${localStorage.getItem("cart")}`)
            .then((response) => {
                let _subTotal = 0;
                response.data.forEach((product) => {
                    _subTotal += product.price * product.quantity;
                });

                _subTotal = parseFloat((Math.round((_subTotal) * 100) / 100).toFixed(2));
                getElement(`#cart_subtotal`).innerHTML = `S/.${_subTotal}`;
                let _igvTotal = parseFloat(Math.round(_subTotal*0.18 * 100) / 100).toFixed(2);
                _igvTotal = parseFloat(_igvTotal);
                getElement(`#cart_igv-total`).innerHTML = `S/.${_igvTotal}`;
                getElement(`#cart_total`).innerHTML = `S/.${(Math.round((_subTotal+_igvTotal) * 100) / 100).toFixed(2)}`;
            });

    }

    $(document).on('change', '.touch-spin-input', function(){
        // e.preventDefault();


        let _that = $(this);
        let _id = _that[0].dataset.index;
        let _newQuantity = this.value;

        if (_newQuantity == 0) {
            _newQuantity = 1;
            _that.val(1);
        }

        if (localStorage.getItem(`cart`) != null) {
            let _cartArray = localStorage.getItem("cart").split(',');
            _cartArray = _cartArray.filter(number => number != _id);

            for (var i = 1; i <= _newQuantity; i++) {
                _cartArray.push(_id);
            }
            localStorage.setItem(`cart`, _cartArray);
            document.cookie = `cart=${_cartArray};path=/`;
            //fff
            let _newTotal = _newQuantity * _that.parent().next().val();
            _that.parent().parent().parent().next().html(`S/.${(Math.round((_newTotal) * 100) / 100).toFixed(2)}`)
            reCalculatingTotal();
        } else {
            console.log("Cart vacío");
        }
    });

	getElement(`#checkout__save`)
		.addEventListener('click', function(e) {
			e.preventDefault();
                $(".preloader").fadeIn("slow");
                if (localStorage.getItem(`cart`) != null) {
                    axios.post(`/divemotor/orders`, {
                        'number': getElement(`#checkout_number`).value,
                        'description': getElement(`#checkout_description`).value,
                        'first_name': getElement(`#checkout_first-name`).value,
                        'identity_document': getElement(`#checkout_identity-document`).value,
                        'address': getElement(`#checkout_address`).value,
                        'email': getElement(`#checkout_email_`).value,
                        'contact': getElement(`#checkout_contact`).value,
                        'cel_whatsapp': getElement(`#checkout_cel-whatsapp_`).value,
                        'product_ids': localStorage.getItem('cart'),

                    })
                    .then((response) => {
                        $(".preloader").fadeOut("slow");
                        console.log("Orden guardada!");
                        localStorage.removeItem(`cart`);
                        document.cookie = "cart= ;path=/ ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
                        $(`#confirm`).modal('show');

                        clean_view();
                        getElement(`#checkout_number`).value = response.data.number;
                        getElement(`#cart_tbody`).innerHTML = ``;
                        $(`#a_confirm-order`).attr(`href`, `/ver-cotizacion/${response.data.order_id}`);
                        reCalculatingTotal();

                        // if (response.data.redirect_) {
                        // 	window.location.replace('/orden/pago-en-linea');
                        // } else {
                        // 	window.location.replace('/completado');
                        // }
                    })
                    .catch((error) => {
                        $(".preloader").fadeOut("slow");
                        let _content = ``;

                        if (!error.response.data.hasOwnProperty('simple_error')) {
                            $.each(error.response.data, function(key, value) {
                                $.each(value, function(errores, eror) {
                                    _content += `${eror} \n`;
                                });
                            });
                        } else {
                            _content = error.response.data.message;
                            // normalSwal(`${error.response.data.title}`, `${error.response.data.message}`, `error`);
                        }
                        alert(_content);
                    });
                } else {
                    alert(`No hay productos`);
                }
        });

    getElement(`#checkout_search-customer`)
        .addEventListener(`click`, (e) => {
            axios.get(`/admin/customers/search?identity_document=${getElement(`#checkout_identity-document`).value}`)
                .then((risposta) => {
                    if (Object.keys(risposta.data).length) {
                        getElement(`#checkout_address`).value = risposta.data.address;
                        getElement(`#checkout_email_`).value = risposta.data.email;
                        getElement(`#checkout_first-name`).value = risposta.data.first_name;
                        getElement(`#checkout_cel-whatsapp_`).value = risposta.data.cel_whatsapp;
                        getElement(`#checkout_contact`).value = risposta.data.contact;
                        return;
                    }
                });
        });

    function clean_view(){
        getElement(`#checkout_address`).value = ``;
        getElement(`#checkout_email_`).value = ``;
        getElement(`#checkout_first-name`).value = ``;
        getElement(`#checkout_first-name`).value = ``;
        getElement(`#checkout_cel-whatsapp_`).value = ``;
        getElement(`#checkout_contact`).value = ``;
        getElement(`#checkout_identity-document`).value = ``;
    }




})();
