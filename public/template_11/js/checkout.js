(() => {

    let message_about_price_arr = {};
    $(document).on('click', '.button_sum', function(e){
        let _that = $(this);
        let _inputNumber = $(this).parent().find('input'), _max = e.target.dataset.max;
        
        if (parseInt(_inputNumber.val()) + 1 <= _max) {
            _inputNumber.val(parseInt(_inputNumber.val()) + 1);
            change_quantity(_that[0].dataset.index, _inputNumber.val(), _that[0].dataset.price, _that.parent().parent().next().children());
        }
    });

    $(document).on('click', '.button_sub', function(e){
        let _that = $(this);
        const min = e.target.dataset.min;
        let _inputNumber = $(this).parent().find('input');

        if (_inputNumber.val() == min) return;

        _inputNumber.val(parseInt(_inputNumber.val()) - 1);
        change_quantity(_that[0].dataset.index, _inputNumber.val(), _that[0].dataset.price, _that.parent().parent().next().children());
    });

	// _0x473cf9(_0x2b9c('0x3'))['on']('click', function () {
	// 	var _0x3ddaf9 = _0x473cf9(this);
	// 	var _0x31c1f9 = _0x3ddaf9[_0x2b9c('0x54')]()[_0x2b9c('0xc')](_0x2b9c('0xd'))[_0x2b9c('0x22')]();
	// 	if (_0x3ddaf9[_0x2b9c('0x26')]() == '+') {
	// 		var _0x9bcf8f = parseFloat(_0x31c1f9) + 0x1;
	// 	} else {
	// 		if (_0x31c1f9 > 0x1) {
	// 			var _0x9bcf8f = parseFloat(_0x31c1f9) - 0x1;
	// 		} else {
	// 			_0x9bcf8f = 0x0;
	// 		}
	// 	}
	// 	_0x3ddaf9[_0x2b9c('0x54')]()[_0x2b9c('0xc')](_0x2b9c('0xd'))[_0x2b9c('0x22')](_0x9bcf8f);
	// });

    re_draw_table();

    function re_draw_table(){
    axios.get(`/api/template_11/products/cart?ids=${localStorage.getItem("cart")}`)
        .then((response) => {

            let _content = ``,
                _subTotal = 0;
            getElement(`#cart_tbody`).innerHTML = ``;

            response.data.forEach((product, index) => {
                _subTotal += product.price * product.quantity;

                let price = product.message_about_price;
                let total = product.message_about_price;
                message_about_price_arr[product.id] = product.message_about_price;

                if (!product.has_hidden_price) {
                    message_about_price_arr[product.id] = "";
                    price = `${getElement('#cart_symbol').value}${(parseFloat(product.price)*parseInt(getElement('#cart_rate').value)).toFixed(getElement('#cart_decimal').value)}`;
                    total = `${getElement('#cart_symbol').value}${((product.price*product.quantity*parseInt(getElement('#cart_rate').value))).toFixed(getElement('#cart_decimal').value)}`;
                }

                _content +=

                        `
                            <tr>
                                <td class="d-flex align-items-center">
                                  <figure class="thumb_cart mb-0">
                                      <img src="${product.image}" data-src="${product.image}" class="lazy" alt="Image">
                                  </figure>
                                  <p class="mb-0">
                                    <span>${product.name}</span><br>
                                    <span class="min_item_buy">Compra mínima: ${product.minimum_quantity} und.</span>
                                  </p>
                                </td>
                                <td>
                                    <strong>${price}</strong>
                                </td>
                                <td>
                                    <div class="numbers-row checkout_input">
                                        <input type="text" value="${product.quantity}" class="qty2" name="quantity_${index}">
                                        <div data-index=${product.id} data-max="${product.stock}" data-price="${parseFloat(product.price)*parseInt(getElement('#cart_rate').value).toFixed(getElement('#cart_decimal').value)}" class="inc button_inc button_sum">+</div>
                                        <div data-index=${product.id} data-min="${product.minimum_quantity}" data-price="${(parseFloat(product.price)*parseInt(getElement('#cart_rate').value)).toFixed(getElement('#cart_decimal').value)}" class="dec button_inc button_sub">-</div>
                                    </div>
                                </td>
                                <td>
                                    <strong>${total}</strong>
                                </td>
                                <td class="options">
                                    <a href="#" data-index="${product.id}" class="cart__remove-product"><i class="ti-trash"></i></a>
                                </td>
                            </tr>

                        `;

            });
            getElement(`#cart_tbody`).innerHTML = _content;
            reCalculatingTotal(true);
        });
    }

    $(document).on('click', '.cart__remove-product', function(e) {
        e.preventDefault();
        let _id = e.target.dataset.index;

        if (localStorage.getItem(`cart`) != null) {
            let _cartArray = localStorage.getItem("cart").split(',');

            _cartArray = _cartArray.filter(number => number != _id);

            if (_cartArray.length == 0) {
                localStorage.removeItem(`cart`);
                // window.location.replace(`/orden-vacio`);
            } else {
                localStorage.setItem(`cart`, _cartArray);
            }

            $(this).parent().parent().remove();
            reCalculatingTotal(true)
        } else {
            console.log("Cart vacío");
            // alert("Error");
        }
        fill_cart();
    });

    function change_quantity(_id, _newQuantity, _price, _elementTotal){

        if (localStorage.getItem(`cart`) != null) {
            let _cartArray = JSON.parse(localStorage.getItem("cart"));

              if (_cartArray[_id]) {
                let _value = _newQuantity;
                _cartArray[_id] = _value;
              } else {
                _cartArray[_id] = _newQuantity;
              }

             localStorage.setItem(`cart`, JSON.stringify(_cartArray));

            let _newTotal = _newQuantity * _price;

            _elementTotal.html(message_about_price_arr[_id]);
            if(!message_about_price_arr[_id]){
                _elementTotal.html(`${getElement('#cart_symbol').value}${parseFloat(_newTotal).toFixed(getElement('#cart_decimal').value)}`);
            }

            //$(this).parent().parent().next().html(`${getElement('#cart_symbol').value}${_newTotal}`);
            reCalculatingTotal(true)
        } else {
            console.log("Cart vacío");
        }
        fill_cart();
    }

    var remove_coupon_btn;

    function reCalculatingTotal(check_coupon) {

        axios.get(`/api/template_11/products/cart-lite?ids=${localStorage.getItem("cart")}`)
            .then((response) => {
                let _subTotal = 0, _discount = 0, _total = 0;
                response.data.forEach((product) => {
                    _subTotal += product.price * product.quantity;
                });
                remove_coupon_btn = ``;
                if (localStorage.getItem("coupon_by_percentage") != null) {
                    remove_coupon_btn = `<a href="" class="quit_cupon remove_coupon">Remover cupón</a>`;
                    if (localStorage.getItem("coupon_by_percentage") == 1) {
                        _discount = Math.round(((_subTotal / 100) * localStorage.getItem("coupon_amount")) * 100) / 100;
                    } else {
                        _discount = parseFloat(localStorage.getItem("coupon_amount"));
                    }
                }

                _total = _subTotal - _discount;

                getElement(`#cart-discount`).innerHTML = `<div class="row justify-content-between rest_checkout px-3"><span>Dscto Cupón</span>${getElement('#cart_symbol').value}${(_discount*parseInt(getElement('#cart_rate').value)).toFixed(getElement('#cart_decimal').value)}</div>${remove_coupon_btn}`;
                // getElement(`#cart-discount`).innerHTML = `<span>Dscto Cupón</span> ${remove_coupon_btn} ${getElement('#cart_symbol').value} ${(_discount*parseInt(getElement('#cart_rate').value)).toFixed(getElement('#cart_decimal').value)}`;
                getElement(`#cart-subtotal`).innerHTML = `<span>Subtotal</span>${getElement('#cart_symbol').value}${(_subTotal*parseInt(getElement('#cart_rate').value)).toFixed(getElement('#cart_decimal').value)}`;
                getElement(`#cart-total`).innerHTML = `<span>Total</span>${getElement('#cart_symbol').value}${(_total*parseInt(getElement('#cart_rate').value)).toFixed(getElement('#cart_decimal').value)}`;
                const checkout_message = getElement(`#checkout_message`).value;

                if(getElement('#checkout_active').value == 0){
                    getElement(`#cart-subtotal`).innerHTML = `<span>Subtotal</span>${checkout_message}`;
                    getElement(`#cart-total`).innerHTML = `<span>Total</span>${checkout_message}`;
                }

                //checking coupon;
                if (check_coupon && localStorage.getItem("coupon_code") != undefined) {
                    checking_coupon();
                }
            });

    }


    $(`#apply_coupon`)
        .on('click', function(){

            if (localStorage.getItem("coupon_code") != undefined) {
                normalSwal(`Aviso`, `Ya hay un cupón aplicado`, `info`);
                return;
            }

            let _code = $(`input[name="coupon-code"]`).val();

            axios.get(`/api/template_11/coupon/${_code}/information?ids=${localStorage.getItem("cart")}`)
                .then((response) => {
                    Swal.fire(
                    '',
                    response.data.message,
                    'success'
                    );
                    localStorage.removeItem(`coupon_code`);
                    localStorage.removeItem(`coupon_by_percentage`);
                    localStorage.removeItem(`coupon_amount`);
                    localStorage.setItem(`coupon_by_percentage`, response.data.is_by_percentage);
                    localStorage.setItem(`coupon_amount`, response.data.amount);
                    localStorage.setItem(`coupon_code`, response.data.coupon_code);

                    reCalculatingTotal(false);

                })
                .catch((err) => {
                    Swal.fire(
                    '',
                    err.response.data.message,
                    'warning'
                    )
                });
        });

    function checking_coupon()
    {
        const code = localStorage.getItem(`coupon_code`);

        axios.get(`/api/template_11/coupon/${code}/information?ids=${localStorage.getItem("cart")}`)
            .then((response) => {
            })
            .catch((err) => {
                Swal.fire(
                '',
                err.response.data.message,
                'warning'
                )
                localStorage.removeItem(`coupon_code`);
                localStorage.removeItem(`coupon_by_percentage`);
                localStorage.removeItem(`coupon_amount`);

                setTimeout(() => {
                    location.reload();

                }, 1500);
            });
    }


    $(document).on('click', '.remove_coupon', function(){
        localStorage.removeItem(`coupon_code`);
        localStorage.removeItem(`coupon_by_percentage`);
        localStorage.removeItem(`coupon_amount`);

        location.reload();
    });

    $(`select[name="place_id"]`).on('change', function(e){
        axios.post(`/api/template_11/set-place`, {
            'place_id': e.target.value,
        })
        .then((response) => {
            re_draw_table();
            reCalculatingTotal(true);
        });
    });

})();
