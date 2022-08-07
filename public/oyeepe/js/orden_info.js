(() => {


	if (getElement(`#is_logged`).value == 1) {

		axios.get(`/api/customers/${getElement(`#checkout_identity-document`).value}`)
			.then((response) => {
				let _customer = response.data.data;

				if (_customer != '') {
					getElement(`#checkout_firstname`).value = _customer.firstName;
					getElement(`#checkout_lastname`).value = _customer.lastName;
					getElement(`#checkout_legal-name`).value = _customer.legalName;
					getElement(`#checkout_email_`).value = _customer.email;
					getElement(`#checkout_cel-whatsapp_`).value = _customer.whatsapp;
					getElement(`#checkout_country`).value = _customer.countryId;
					getElement(`#checkout_address`).value = _customer.address;
					getElement(`#checkout_city`).value = _customer.cityId;
				}
			});

	} else if(localStorage.getItem('identity_document') != undefined){
		axios.get(`/api/customers/${localStorage.getItem('identity_document')}`)
		.then((response) => {
			let _customer = response.data.data;

			if (_customer != '') {
				getElement(`#checkout_identity-document`).value = localStorage.getItem('identity_document');
				getElement(`#checkout_firstname`).value = _customer.firstName;
				getElement(`#checkout_lastname`).value = _customer.lastName;
				getElement(`#checkout_legal-name`).value = _customer.legalName;
				getElement(`#checkout_email_`).value = _customer.email;
				getElement(`#checkout_cel-whatsapp_`).value = _customer.whatsapp;
				getElement(`#checkout_country`).value = _customer.countryId;
				getElement(`#checkout_address`).value = _customer.address;
				getElement(`#checkout_city`).value = _customer.cityId;
			}
		});
	}

	$(`#checkout_create-a-user-area`).hide();

	axios.get(`/api/products/cart-lite?ids=${localStorage.getItem("cart")}`)
		.then((response) => {
			let _subTotal = 0,
				_content = ``;
			getElement(`#checkout_tbody`).innerHTML = ``;

			response.data.forEach((product) => {
				_subTotal += product.price * product.quantity;

				_content += `
			                <tr>
	                            <td class="product-name" style="vertical-align: middle; padding: 10px 0px;">${product.name}</td>
	                            <td class="product-quantity" style="vertical-align: middle; padding: 10px 0px;">x ${product.quantity}</td>
	                            <td class="product-total text-right" style="vertical-align: middle; padding: 10px 0px;">S/.${product.price}</td>
	                        </tr>`;
			});

			getElement(`#checkout_tbody`).innerHTML = _content;
			getElement(`#checkout_subtotal`).innerHTML = `S/.${_subTotal}`;
			getElement(`#checkout_total`).innerHTML = `S/.${_subTotal}`;
		});

	getElement(`#checkout__save`)
		.addEventListener('click', function(e) {
			e.preventDefault();
			let _accountId = 0;
			//Verify the payment way;
			$(".payment-way-selected").each(function(index) {
				let _that = $(this);
				if (_that.hasClass('active')) {
					_accountId = _that[0].dataset.index;
				}
			});
			if (_accountId == 0) {
				alert("Seleccione un método de pago!");
				return;
			}
			//Verificando if account_id == 4
			if (_accountId == 4) {
				//It's an online payment. Save customer and user and go the payment gateway,
				axios.post(`/api/oyeepe/register-customer`, {
					'identity_document': getElement(`#checkout_identity-document`).value,
					'legal_name': $(`#checkout_legal-name`).val(),
					'first_name': getElement(`#checkout_firstname`).value,
					'last_name': getElement(`#checkout_lastname`).value,
					'email': getElement(`#checkout_email_`).value,
					'cel_whatsapp': getElement(`#checkout_cel-whatsapp_`).value,
					'country_id': getElement(`#checkout_country`).value,
					'address': getElement(`#checkout_address`).value,
					'city_id': getElement(`#checkout_city`).value,
					// 'description': getElement(`#checkout_description`).value,
					// 'account_id': _accountId,
					// 'product_ids': localStorage.getItem('cart'),
					'create_user': $(`#checkout_create-a-user`).prop('checked'),
					'cel_holder': $(`register_cel-holder`).val(),
					'birthday': $(`register_birthday`).val(),
					'gender': $(`#register_gender`).val(),
					'password': $(`#register_password`).val(),
					'password_confirmation': $(`#register_password-verification`).val(),
				})
				.then((response) => {
					localStorage.setItem('identity_document', response.data);
					window.location.replace('/orden/pago-en-linea');
				})
				.catch((error) => {
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
				//If account_id != 4
				axios.post(`/api/oyeepe/order`, {
					'identity_document': getElement(`#checkout_identity-document`).value,
					'legal_name': $(`#checkout_legal-name`).val(),
					'first_name': getElement(`#checkout_firstname`).value,
					'last_name': getElement(`#checkout_lastname`).value,
					'email': getElement(`#checkout_email_`).value,
					'cel_whatsapp': getElement(`#checkout_cel-whatsapp_`).value,
					'country_id': getElement(`#checkout_country`).value,
					'address': getElement(`#checkout_address`).value,
					'city_id': getElement(`#checkout_city`).value,
					'description': getElement(`#checkout_description`).value,
					'account_id': _accountId,
					'product_ids': localStorage.getItem('cart'),
					'create_user': $(`#checkout_create-a-user`).prop('checked'),
					'cel_holder': $(`register_cel-holder`).val(),
					'birthday': $(`register_birthday`).val(),
					'gender': $(`#register_gender`).val(),
					'password': $(`#register_password`).val(),
					'password_confirmation': $(`#register_password-verification`).val(),
				})
				.then((response) => {
					console.log("Orden guardada!");
					localStorage.removeItem(`cart`);

					if (response.data.redirect_) {
						window.location.replace('/orden/pago-en-linea');
					} else {
						window.location.replace('/completado');
					}
				})
				.catch((error) => {
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
			}


		});

	$('#checkout_identity-document').on('keyup', function(e) {
		if (e.target.value != '' && e.target.value.length >= 8) {
			axios.get(`/api/customers/${e.target.value}`)
				.then((response) => {
					let _customer = response.data.data;

					if (_customer != '') {
						getElement(`#checkout_firstname`).value = _customer.firstName;
						getElement(`#checkout_lastname`).value = _customer.lastName;
						// getElement(`#checkout_legal-name`).value = _customer.legalName;
						getElement(`#checkout_email_`).value = _customer.email;
						getElement(`#checkout_cel-whatsapp_`).value = _customer.whatsapp;
						getElement(`#checkout_country`).value = _customer.countryId;
						getElement(`#checkout_address`).value = _customer.address;
						getElement(`#checkout_city`).value = _customer.cityId;
					}
				});
		}
	});



	$(`#checkout_create-a-user`).on('change', function(E) {
		E.preventDefault();
		let _that = $(this);

		if (_that.prop('checked')) {
			$(`#checkout_create-a-user-area`).show();
		} else {
			$(`#checkout_create-a-user-area`).hide();
			// console.log("Non checked");
		}
	});



})();