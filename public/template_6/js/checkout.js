(() => {

    $(document).on('click', '.button_sum', function(){
        let _that = $(this);
        let _inputNumber = $(this).parent().find('input'), _max = _that[0].dataset.max;
        
        if (parseInt(_inputNumber.val()) + 1 <= _max) {
            _inputNumber.val(parseInt(_inputNumber.val()) + 1);
            change_quantity(_that[0].dataset.index, _inputNumber.val(), _that[0].dataset.price, _that.parent().parent().next().children());
        }
    });

    $(document).on('click', '.button_sub', function(){
        let _that = $(this);
        let _inputNumber = $(this).parent().find('input');
        if (_inputNumber.val() == 1) return;

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
    axios.get(`/api/template_6/products/cart?ids=${localStorage.getItem("cart")}`)
        .then((response) => {

            let _content = ``,
                _subTotal = 0;
            getElement(`#cart_tbody`).innerHTML = ``;

            response.data.forEach((product, index) => {
                _subTotal += product.price * product.quantity;
                _content +=
    
                        `
                            <tr>
                                <td>
                                    <div class="thumb_cart">
                                        <img src="${product.image}" data-src="${product.image}" class="lazy" alt="Image">
                                    </div>
                                    <span class="item_cart">${product.name}</span>
                                </td>
                                <td>
                                    <strong>S/. ${parseInt(product.price).toFixed(2)}</strong>
                                </td>
                                <td>
                                    <div class="numbers-row">
                                        <input type="text" value="${product.quantity}" class="qty2" name="quantity_${index}">
                                        <div data-index=${product.id} data-max="${product.stock}" data-price="${product.price}" class="inc button_inc button_sum">+</div>
                                        <div data-index=${product.id} data-price="${product.price}" class="dec button_inc button_sub">-</div>
                                    </div>
                                </td>
                                <td>
                                    <strong>S/. ${(product.price*product.quantity).toFixed(2)}</strong>
                                </td>
                                <td class="options">
                                    <a href="#" data-index="${product.id}" class="cart__remove-product"><i class="ti-trash"></i></a>
                                </td>
                            </tr>
                            
                        `;

            });
            getElement(`#cart_tbody`).innerHTML = _content;
            reCalculatingTotal();
        });

    }

    $(document).on('click', '.cart__remove-product', function(e) {
        e.preventDefault();
        let _id = $(this)[0].dataset.index;
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
            reCalculatingTotal()
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

            _elementTotal.html(`S/.${_newTotal}`);
            //$(this).parent().parent().next().html(`S/.${_newTotal}`);
            reCalculatingTotal()
        } else {
            console.log("Cart vacío");
        }
        fill_cart();
    }

    function reCalculatingTotal() {

        axios.get(`/api/template_6/products/cart-lite?ids=${localStorage.getItem("cart")}`)
            .then((response) => {
                let _subTotal = 0, _discount = 0, _total = 0;
                response.data.forEach((product) => {
                    _subTotal += product.price * product.quantity;
                });

                if (localStorage.getItem("coupon_by_percentage") != null) {
                    console.log(localStorage.getItem("coupon_amount"));
                    if (localStorage.getItem("coupon_by_percentage") == 1) {
                        _discount = Math.round(((_subTotal / 100) * localStorage.getItem("coupon_amount")) * 100) / 100;
                        console.log(_discount);
                    } else {
                        _discount = parseFloat(localStorage.getItem("coupon_amount"));
                    }

                }

                _total = _subTotal - _discount;

                getElement(`#cart-discount`).innerHTML = `<span>Dscto Cupón</span>S/${_discount.toFixed(2)}`;
                getElement(`#cart-subtotal`).innerHTML = `<span>Subtotal</span>S/${_subTotal.toFixed(2)}`;
                getElement(`#cart-total`).innerHTML = `<span>Total</span>S/${_total.toFixed(2)}`;
            });

    }


    $(`#apply_coupon`)
        .on('click', function(){

            if (localStorage.getItem("coupon_code") != undefined) {
                normalSwal(`Aviso`, `Ya hay un cupón aplicado`, `info`);
                return;
            }

            let _code = $(`input[name="coupon-code"]`).val();

            axios.get(`/api/template_6/coupon/${_code}/information?ids=${localStorage.getItem("cart")}`)
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

                    reCalculatingTotal();

                })
                .catch((err) => {
                    Swal.fire(
                    '',
                    err.response.data.message,
                    'warning'
                    )
                });
        });

    $(`select[name="place_id"]`).on('change', function(e){
        axios.post(`/api/template_6/set-place`, {
            'place_id': e.target.value,
        })
        .then((response) => {
            re_draw_table();
            reCalculatingTotal();
        });
    });


    //Search and add a product
    $('#nameProduct').select2({
        ignore:' ',
        ajax: {
            url: "api/template_6/products/name",
            dataType: 'json',
            quietMillis: 1200,
            data: function (term) {
                return {
                    nameProduct: term
                };
            },
            results: function (data) {
                var myResults = [];
                $.each(data, function (index, item) {
                    myResults.push({
                        'id': item.idProducto,
                        'text': item.producto
                    });
                });
                return {
                    results: myResults
                };
            }
        },
        //tags: true,
        minimumInputLength: 2,
        maximumSelectionSize: 5,
        formatSelectionTooBig: function (limit)
        {
            return 'Ingre nombre de producto';
        }
    });

    $("#nameProduct").on('change', function(e){

        var idProducto= e.target.value;

        if (idProducto){
            if (localStorage.getItem("cart") == null) {
                let _cart = {};
                _cart[idProducto] = 1;
                localStorage.setItem(`cart`, JSON.stringify(_cart));
            } else {
                let _cartSaved = JSON.parse(localStorage.getItem("cart"));

                if (_cartSaved[idProducto]) {
                    let _value = parseInt(_cartSaved[idProducto])+1;
                    _cartSaved[idProducto] = _value;
                } else {
                    _cartSaved[idProducto] = 1;
                }
                localStorage.setItem(`cart`, JSON.stringify(_cartSaved));
            }

            $("#nameProduct").select2("val", "");
            re_draw_table();

        }
        else {
              $.growl.warning({
                title: "Operación interrumpida",
                message: "No sea ha especificado un producto.",
              });

        };
    });

})();
