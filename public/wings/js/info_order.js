(() => {

    // if (localStorage.getItem("cart") == null) {
	// 	document.getElementById('checkout__save').onclick = function(){ return false; };
	// 	alert("No hay productos")
    // }


    fillSelectCity();
    $(`#checkout_country`).on('change', function(){
        fillSelectCity();
    });

    function fillSelectCity(){
        axios.get(`/api/countries/${$(`#checkout_country`).val()}/cities`)
        .then((risposta) => {
            fillSelectWithOutFirstOption(getElement(`#checkout_city`), risposta.data.data, null);
        });
    }



	axios.get(`/api/products/cart-lite?ids=${localStorage.getItem("cart")}`)
		.then((response) => {
			let _subTotal = 0,
				_content = ``;
			getElement(`#checkout_table`).innerHTML = ``;

			response.data.forEach((product) => {
				_subTotal += product.price * product.quantity;

                _content += `
                        <tr class="cart-subtotal">
                            <th class="text-left">${product.name}</th>
                            <td>x ${product.quantity}</td>
                            <td>S/. S/.${product.price*product.quantity}</td>
                        </tr>
                    `;

                // `
			    //             <tr>
	            //                 <td class="product-name" style="vertical-align: middle; padding: 10px 0px;">${product.name}</td>
	            //                 <td class="product-quantity" style="vertical-align: middle; padding: 10px 0px;">x ${product.quantity}</td>
	            //                 <td class="product-total text-right" style="vertical-align: middle; padding: 10px 0px;">S/.${product.price}</td>
	            //             </tr>`;
			});

            getElement(`#checkout_table`).innerHTML = _content;

			getElement(`#checkout_subtotal`).innerHTML = `S/.${_subTotal}`;
			getElement(`#checkout_total`).innerHTML = `S/.${_subTotal}`;
		});

	getElement(`#checkout__save`)
		.addEventListener('click', function(e) {
            e.preventDefault();

			if (localStorage.getItem("cart") == null) {
				alert("No hay productos elegidos");
				return;
			}

			cleanError();

			let _accountId = 0;

			axios.post(`/api/wings/order`, {
					'identity_document': getElement(`#checkout_identity-document`).value,
					'legal_name': '',
					'first_name': getElement(`#checkout_firstname`).value,
					'last_name': getElement(`#checkout_lastname`).value,
					'email': getElement(`#checkout_email_`).value,
					'cel_whatsapp': getElement(`#checkout_cel-whatsapp_`).value,
					'country_id': getElement(`#checkout_country`).value,
					'city_id': getElement(`#checkout_city`).value,
                    'address': getElement(`#checkout_address`).value,
					'description': getElement(`#checkout_description`).value,
					'account_id': _accountId,
					'product_ids': localStorage.getItem('cart'),
				})
				.then((response) => {
					console.log("Orden guardada!");
                    localStorage.removeItem(`cart`);
                    // alert("Ok");
					window.location.replace('/win-confirmacion');
				})
				.catch((error) => {
					let _content = ``;

					if (!error.response.data.hasOwnProperty('simple_error')) {
                        $.each(error.response.data, function(key, value) {
                            if (key == "identity_document") {
                                $.each(value, function(errores, eror) {
                                    $('#checkout-identity-document-error').append("<li class='error-block'>" + eror + "</li>");
                                });
                            } else if (key == "first_name") {
                                $.each(value, function(errores, eror) {
                                    $('#checkout-first-name-error').append("<li class='error-block'>" + eror + "</li>");
                                });
                            } else if (key == "last_name") {
                                $.each(value, function(errores, eror) {
                                    $('#checkout-last-name-error').append("<li class='error-block'>" + eror + "</li>");
                                });
                            } else if (key == "email") {
                                $.each(value, function(errores, eror) {
                                    $('#checkout-email-error').append("<li class='error-block'>" + eror + "</li>");
                                });
                            } else if (key == "cel_whatsapp") {
                                $.each(value, function(errores, eror) {
                                    $('#checkout-cel-whatsapp-error').append("<li class='error-block'>" + eror + "</li>");
                                });
                            };

                            // $.each(value, function(errores, eror) {
                            //     _content += `${eror} \n`;
                            // });
                        });
					} else {
                        _content = error.response.data.message;
                        alert(_content);
						// normalSwal(`${error.response.data.title}`, `${error.response.data.message}`, `error`);
					}
				});
		});

	// $('#checkout_identity-document').on('keyup', function(e) {
	// 	console.log("dawd");
	// 	if (e.target.value != '' && e.target.value.length >= 8) {
	// 		axios.get(`/api/customers/${e.target.value}`)
	// 			.then((response) => {
	// 				let _customer = response.data.data;

	// 				if (_customer != '') {
	// 					getElement(`#checkout_firstname`).value = _customer.firstName;
	// 					getElement(`#checkout_lastname`).value = _customer.lastName;
	// 					// getElement(`#checkout_legal-name`).value = _customer.legalName;
	// 					getElement(`#checkout_email_`).value = _customer.email;
	// 					getElement(`#checkout_cel-whatsapp_`).value = _customer.whatsapp;
	// 					getElement(`#checkout_country`).value = _customer.countryId;
	// 					getElement(`#checkout_address`).value = _customer.address;
	// 					getElement(`#checkout_city`).value = _customer.cityId;
	// 				}
	// 			});
	// 	}
	// });

})();
