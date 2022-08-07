// (() => {
	var order_history_id;
	// if (getElement(`#is_logged`).value == 1) {

	// 	axios.get(`/api/customers/${getElement(`#checkout_identity-document`).value}`)
	// 		.then((response) => {
	// 			let _customer = response.data.data;

	// 			if (_customer != '') {
	// 				getElement(`#checkout_firstname`).value = _customer.firstName;
	// 				getElement(`#checkout_lastname`).value = _customer.lastName;
	// 				// getElement(`#checkout_legal-name`).value = _customer.legalName;
	// 				getElement(`#checkout_email_`).value = _customer.email;
	// 				getElement(`#checkout_cel-whatsapp_`).value = _customer.whatsapp;
	// 				getElement(`#checkout_country`).value = _customer.countryId;
	// 				getElement(`#checkout_address`).value = _customer.address;
	// 				getElement(`#checkout_city`).value = _customer.cityId;
	// 			}
	// 		});

	// }


	$(`#checkout_create-a-user-area`).hide();
	
	calculate_prices();

	/*$(`#other_addr`).click();*/
	/*$("#other-billing-address").prop('disabled',true);*/
	
	function calculate_prices(shipping_cost = ''){
		axios.get(`/api/template_9/products/cart-lite?ids=${localStorage.getItem("cart")}`)
			.then((response) => {
				let _subTotal = 0,
					_content = ``,
					_discount = 0,
					_total = 0;
				getElement(`#checkout_tbody`).innerHTML = ``;

				response.data.forEach((product) => {
					_subTotal += product.price * product.quantity;
					_content += `
								<li class="clearfix"><em>${product.quantity}x ${product.name}</em>  <span>S/${product.price}</span></li>`;
				});


			    if (localStorage.getItem("coupon_by_percentage") != null) {
	                if (localStorage.getItem("coupon_by_percentage") == 1) {
	                    _discount = Math.round(((_subTotal / 100) * localStorage.getItem("coupon_amount")) * 100) / 100;
	                } else {
	                    _discount = parseFloat(localStorage.getItem("coupon_amount"));
	                }
	            }

				_total = _subTotal - _discount + ((shipping_cost == '') ? 0 : shipping_cost);
				getElement(`#checkout_tbody`).innerHTML = _content;
				getElement(`#checkout_discount`).innerHTML = `S/${_discount}`;
				getElement(`#checkout_subtotal`).innerHTML = `S/${_subTotal}`;
				// getElement(`#checkout_shipping-cost`).innerHTML = `S/${shipping_cost ? shipping_cost : 0}`;

				// if (shipping_cost === '' && getElement(`#other-billing-address`).checked) {
				// 	getElement(`#checkout_shipping-cost`).innerHTML = `Seleccione Distrito`;
				// }

				getElement(`#checkout_total`).innerHTML = `S/${_total}`;
				
			});
	}


	getElement(`#checkout__save`)
		.addEventListener('click', function(e) {
			lockWindow();
			e.preventDefault();
			cleanError();

			if (getElement(`#delivery-home`).checked && getElement(`select[name="district_id"]`).value == '') {
				normalSwal(`Revise`, `Seleccione Distrito`, `info`);
				unlockWindow();
				return;
			}

			if (localStorage.getItem('cart') == undefined || localStorage.getItem('cart') == '') {
				normalSwal(`Revise`, `No ha elegido ningun producto!`, `info`);
				unlockWindow();
				return;
				//return;
			}

			if (!document.querySelector(`#terms-conditions`).checked) {
				normalSwal(`Revise`, `Debe aceptar los Términos y Condiciones`, `info`);
            	//$.growl.warning({ title:'Advertencia' , message: "Debe aceptar los Términos y Condiciones" })
            	unlockWindow();
            	return;
			}

			//let _accountId = 0;
			//Verify the payment way;
			// $(".payment-way-selected").each(function(index) {
			// 	let _that = $(this);
			// 	if (_that.hasClass('active')) {
			// 		_accountId = _that[0].dataset.index;
			// 	}
			// });
			$(".windows8").show();
			// if (_accountId == 0) {
			// 	alert("Seleccione un método de pago!");
			// 	$(".windows8").hide();
			// 	return;
			// }

			//Verificando if account_id == 4
			// if (_accountId == 5) {
			// 	//It's an online payment. Save customer and user and go the payment gateway,
			// 	axios.post(`/api/oyeepe/register-customer`, {
			// 		'identity_document': getElement(`#checkout_identity-document`).value,
			// 		'legal_name': $(`#checkout_legal-name`).val(),
			// 		'first_name': getElement(`#checkout_firstname`).value,
			// 		'last_name': getElement(`#checkout_lastname`).value,
			// 		'email': getElement(`#checkout_email_`).value,
			// 		'cel_whatsapp': getElement(`#checkout_cel-whatsapp_`).value,
			// 		'country_id': getElement(`#checkout_country`).value,
			// 		'address': getElement(`#checkout_address`).value,
			// 		'city_id': getElement(`#checkout_city`).value,
			// 		// 'description': getElement(`#checkout_description`).value,
			// 		// 'account_id': _accountId,
			// 		// 'product_ids': localStorage.getItem('cart'),
			// 		'create_user': $(`#checkout_create-a-user`).prop('checked'),
			// 		'cel_holder': $(`register_cel-holder`).val(),
			// 		'birthday': $(`register_birthday`).val(),
			// 		'gender': $(`#register_gender`).val(),
			// 		'password': $(`#register_password`).val(),
			// 		'password_confirmation': $(`#register_password-verification`).val(),
			// 	})
			// 	.then((response) => {
			// 		localStorage.setItem('identity_document', response.data);
			// 		$(".windows8").hide();
			// 		window.location.replace('/orden/pago-en-linea');
			// 	})
			// 	.catch((error) => {
			// 		let _content = ``;

			// 		if (!error.response.data.hasOwnProperty('simple_error')) {
			// 			$.each(error.response.data, function(key, value) {
			// 				$.each(value, function(errores, eror) {
			// 					_content += `${eror} \n`;
			// 				});
			// 			});
			// 		} else {
			// 			_content = error.response.data.message;
			// 			// normalSwal(`${error.response.data.title}`, `${error.response.data.message}`, `error`);
			// 		}
			// 		alert(_content);
			// 		$(".windows8").hide();
			// 	});
			// } else {
				//If account_id != 5
				let _formData = new FormData($(`#checkout_form`)[0]);
				let _accountId = $(`.payments`).find('input:checked')[0].dataset.index;

				let _otherBillingAddress = $('#delivery-home').is(":checked");
				
				_formData.append('account_id', _accountId);
				_formData.append('other_address', _otherBillingAddress);
				_formData.append('product_ids', localStorage.getItem('cart'));

				_formData.append('coupon_code', localStorage.getItem('coupon_code'));

				if (_otherBillingAddress) {
					let _formDataOtherBillingAddress = new FormData($(`#other-billing_form`)[0]);
					var object = {};

					_formDataOtherBillingAddress.forEach((value, key) => {object[key] = value});
					var json = JSON.stringify(object);
					_formData.append('other_billing_address', json);
				}


				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('input[name=_token]').val()
					}
				});
				$.ajax({
					url : `/api/template_9/order`,
					type: 'POST',
					data: _formData,
					contentType: false,
					processData: false,
					success: function(e){
						unlockWindow();

						if (e.payment_status) {

							order_history_id = e.order_history_id;

							Culqi = new culqijs.Checkout();
							Culqi.publicKey = 'pk_test_z3ph2Ut9kViQ0u5x';

							Culqi.options({
								lang: 'auto',
								modal: true,
					            installments: false,
								style: {
									bgcolor: '#f0f0f0',
									maincolor: '#53D3CA',
									disabledcolor: '#ffffff',
									buttontext: '#ffffff',
									maintext: '#4A4A4A',
									desctext: '#4A4A4A',
									logo: e.company_logo,  
					      		  }
							})
							Culqi.settings({
								title: 'Pago en línea',
								currency: 'PEN',
								description: e.payment_description,
								amount: e.payment_amount,
								order: e.order_index
							});
							
							Culqi.open();
							return;
						}

						location.replace(`/checkout/completado`);
						localStorage.removeItem(`cart`);
						localStorage.removeItem(`coupon_code`);
						localStorage.removeItem(`coupon_by_percentage`);
						localStorage.removeItem(`coupon_amount`);

					},
					error:function(jqXHR, textStatus, errorThrown)
					{
						unlockWindow();
						$.each(jqXHR.responseJSON, function (key, value) {
							if (key == "email") {
							  $.each(value, function (errores, eror) {
								$('#checkout-email-error').append("<li class='error-block'>" + eror + "</li>");
							  });
							} else if (key == "password") {
							  $.each(value, function (errores, eror) {
								$('#checkout-password-error').append("<li class='error-block'>" + eror + "</li>");
							  });
							} else if (key == "first_name") {
							  $.each(value, function (errores, eror) {
								$('#checkout-first-name-error').append("<li class='error-block'>" + eror + "</li>");
							  });
							} else if (key == "last_name") {
							  $.each(value, function (errores, eror) {
								$('#checkout-last-name-error').append("<li class='error-block'>" + eror + "</li>");
							  });
							} else if (key == "phone") {
							  $.each(value, function (errores, eror) {
								$('#checkout-phone-error').append("<li class='error-block'>" + eror + "</li>");
							  });

							} else if (key == "cel_whatsapp") {
							  $.each(value, function (errores, eror) {
								$('#customer-cel-error').append("<li class='error-block'>" + eror + "</li>");
							  });
							} else if (key == "country_id") {
							  $.each(value, function (errores, eror) {
								$('#customer-country-error').append("<li class='error-block'>" + eror + "</li>");
							  });
							} else if (key == "city_id") {
							  $.each(value, function (errores, eror) {
								$('#customer-city-error').append("<li class='error-block'>" + eror + "</li>");
							  });
							};
						  });
					}
				});

				// axios.post(`/api/template_1/order`, {
				// 	//'identity_document': getElement(`#checkout_identity-document`).value,
				// 	//'legal_name': $(`#checkout_legal-name`).val(),
				// 	'email': getElement(`_`).value,
				// 	'first_name': getElement(`#checkout_firstname`).value,
				// 	'last_name': getElement(`#checkout_lastname`).value,
				// 	'cel_whatsapp': getElement(`#checkout_cel-whatsapp_`).value,
				// 	'country_id': getElement(`#checkout_country`).value,
				// 	'address': getElement(`#checkout_address`).value,
				// 	'city_id': getElement(`#checkout_city`).value,
				// 	'description': getElement(`#checkout_description`).value,
				// 	'account_id': _accountId,
				// 	'product_ids': localStorage.getItem('cart'),
				// 	'create_user': $(`#checkout_create-a-user`).prop('checked'),
				// 	'cel_holder': $(`register_cel-holder`).val(),
				// 	'birthday': $(`register_birthday`).val(),
				// 	'gender': $(`#register_gender`).val(),
				// 	'password': $(`#register_password`).val(),
				// 	'password_confirmation': $(`#register_password-verification`).val(),
				// })
				// .then((response) => {
				// 	console.log("Orden guardada!");
				// 	localStorage.removeItem(`cart`);
				// 	$(".windows8").hide();

				// 	if (response.data.redirect_) {
				// 		window.location.replace('/orden/pago-en-linea');
				// 	} else {
				// 		window.location.replace('/completado');
				// 	}
				// })
				// .catch((error) => {
				// 	let _content = ``;

				// 	if (!error.response.data.hasOwnProperty('simple_error')) {
				// 		$.each(error.response.data, function(key, value) {
				// 			$.each(value, function(errores, eror) {
				// 				_content += `${eror} \n`;
				// 			});
				// 		});
				// 	} else {
				// 		_content = error.response.data.message;
				// 		// normalSwal(`${error.response.data.title}`, `${error.response.data.message}`, `error`);
				// 	}
				// 	alert(_content);
				// });
			// }
			/*// return "OK";
			axios.post(`/api/order`, {
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
					window.location.replace('/completado');
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
				});*/
		});
	
	if (getElement(`#country_id`).value != '') {
		axios.get(`/api/template_9/country/${getElement(`#country_id`).value}/cities`)
			.then((response) => {
				fillSelect(document.querySelector(`select[name="city_id"]`), response.data, getElement(`#city_id`).value, `Ciudad`);
				$(`select[name="city_id"]`).niceSelect('update');
				return getElement(`#city_id`).value;
		})
		.then((city_id) => {
			axios.get(`/api/template_9/city/${city_id}/provinces`)
				.then((response) => {
					fillSelect(document.querySelector(`select[name="province_id"]`), response.data, getElement(`#province_id`).value, 'Provincia');
					$(`select[name="province_id"]`).niceSelect('update');
			});
		})
		.then(() => {
			axios.get(`/api/template_9/province/${getElement(`#province_id`).value}/districts`)
			.then((response) => {
				fillSelect(document.querySelector(`select[name="district_id"]`), response.data, getElement(`#district_id`).value, 'Distrito')
				$(`select[name="district_id"]`).niceSelect('update');
			});
		})
		.then(() => {
			axios.get(`/api/template_9/district/${getElement(`#district_id`).value}/shipping-cost`)
				.then((response) => {
					calculate_prices(response.data);
					getElement(`#shipping-error`).innerHTML = ``;
				})
				.catch((error) => {
					getElement(`#shipping-error`).innerHTML = error.response.data.message;
					$(`#checkout__save`).attr('disabled',true);
				});	
		});		
 
	} else {
		get_cities_by_country();
	}

	$('#checkout_identity-document').on('keyup', function(e) {
		console.log("dawd");
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

	$(`select[name="city_id"]`).html('<option value="" selected>Ciudad</option>');
	$(`select[name="city_id"]`).niceSelect('update');

	$(`select[name="province_id"]`).html('<option value="" selected>Provincia</option>');
	$(`select[name="province_id"]`).niceSelect('update');

	$(`select[name="district_id"]`).html('<option value="" selected>Distrito</option>');
	$(`select[name="district_id"]`).niceSelect('update');


	$(`select[name="country_id"]`).on('change', function(e){

		$(`select[name="city_id"]`).html('');
		$(`select[name="city_id"]`).niceSelect('update');
		$(`select[name="province_id"]`).html('');
		$(`select[name="province_id"]`).niceSelect('update');

		$(`select[name="district_id"]`).html('');
		$(`select[name="district_id"]`).niceSelect('update');

		getElement(`#shipping-error`).innerHTML = ``;

		get_cities_by_country();
	});

	$(`select[name="city_id"]`).on('change', function(e){
		$(`select[name="province_id"]`).html('');
		$(`select[name="province_id"]`).niceSelect('update');

		$(`select[name="district_id"]`).html('');
		$(`select[name="district_id"]`).niceSelect('update');
		getElement(`#shipping-error`).innerHTML = ``;

		get_provinces_by_city();
	});

	$(`select[name="province_id"]`).on('change', function(e){
		$(`select[name="district_id"]`).html('');
		$(`select[name="district_id"]`).niceSelect('update');
		getElement(`#shipping-error`).innerHTML = ``;
		get_districts_by_province();
	});

	function get_cities_by_country(){
		axios.get(`/api/template_9/country/${getElement(`select[name="country_id"]`).value}/cities`)
			.then((response) => {
				fillSelect(document.querySelector(`select[name="city_id"]`), response.data, null, `Ciudad`);

				$(`select[name="city_id"]`).niceSelect('update');

		});
	}

	function get_provinces_by_city(){
		axios.get(`/api/template_9/city/${getElement(`select[name="city_id"]`).value}/provinces`)
			.then((response) => {
				fillSelect(document.querySelector(`select[name="province_id"]`), response.data, null, 'Provincia');
				$(`select[name="province_id"]`).niceSelect('update');

		});
	}

	function get_districts_by_province(){
		axios.get(`/api/template_9/province/${$(`select[name="province_id"]`).val()}/districts`)
		.then((response) => {
			fillSelect(document.querySelector(`select[name="district_id"]`), response.data, null, 'Distrito')
			$(`select[name="district_id"]`).niceSelect('update');
		});
	}

	$(`select[name="district_id"]`).on('change', function(E){
		//apply shipping cost
		$(`#checkout__save`).attr('disabled',false);

		if (E.target.value != '') {
			axios.get(`/api/template_9/district/${E.target.value}/shipping-cost?cart=${localStorage.getItem('cart')}`)
				.then((response) => {
					let _max = Math.max.apply(null, response.data);
					calculate_prices(max);
					getElement(`#shipping-error`).innerHTML = ``;
					$(`#checkout_shipping-cost`).html(_max.toFixed(2));
				})
				.catch((error) => {
					getElement(`#shipping-error`).innerHTML = '<div class="text-danger"  style="background: #402d7a;  padding: 10px; border-radius: 5px; color: white;">'+error.response.data.message+'</div>';
					$(`#checkout__save`).attr('disabled',false);
    				$(`#checkout_shipping-cost`).html(`S/0.00`);
					calculate_prices(0);
				});			
		}
	});
// })();

// if (getElement(`#country_id`).value != '') {
// 	//charge all selects about alternative direction;
// 	$(`select[name="country_id"]`).val(getElement(`#country_id`).value);
// 	$(`select[name="country_id"]`).niceSelect('update');
// }


function culqi() {
		if (Culqi.token) { 

			    console.log("Token obtenido"); 
			    console.log(Culqi.token);  
				console.log("Respuesta desde iframe: " + Culqi.token);  
				//alert('llego token')
				$(document).ajaxStart(function(){
					// run_waitMe();
				});
				$.ajax({
						type: 'POST',
						url: '/api/template_9/order-confirm-payment',
						data: { token: Culqi.token.id, cuotas: Culqi.token.metadata.installments, order_history_id: order_history_id, 'credit_card_payment': true},
						datatype: 'json',
						success: function(data) {
							Culqi.close();

							var result = "";
							if(data.constructor == String){
									result = JSON.parse(data);
							}
							if(data.constructor == Object){
									result = JSON.parse(JSON.stringify(data));
							}
							if(result.object === 'error'){
								normalSwal(result.merchant_message, result.user_message, `warning`);
								return;
							}

							//data = JSON.parse(data);

							// if (data.successful) {



							if(result.object === 'charge'){
								localStorage.removeItem(`cart`);
								localStorage.removeItem(`coupon_code`);
								localStorage.removeItem(`coupon_by_percentage`);
								localStorage.removeItem(`coupon_amount`);
								location.replace(`/checkout/completado`);
								return;
							}

							//Desscomentar!!!
							// }
							//normalSwal(data.user_message, data.merchant_message, `warning`);

						},
						error: function(error) {
							console.log(error);
							//resultdiv(error)
						}
				});
		} else if (Culqi.order) {
			 console.log("Order confirmada");
             //console.log(Culqi.order); 
			 //resultpe(Culqi.order);
				$.ajax({
						type: 'POST',
						url: '/api/template_9/order-confirm-payment',
						data: { order_history_id: order_history_id, 'culqi_order': Culqi.order, 'credit_card_payment': false},
						datatype: 'json',
						success: function(data) {
							Culqi.close();
							localStorage.removeItem(`cart`);
							localStorage.removeItem(`coupon_code`);
							localStorage.removeItem(`coupon_by_percentage`);
							localStorage.removeItem(`coupon_amount`);
							location.replace(`/checkout/completado`);
							return;
						},
						error: function(error) {
							console.log(error);
							//resultdiv(error)
						}
				});
		} 
		else if (Culqi.closeEvent){
			console.log("cerrando!!");
			console.log(Culqi.closeEvent); 
		} 			
		else {
			$('#response-panel').show();
			$('#response').html(Culqi.error.merchant_message);
			// $('body').waitMe('hide');
		}
	};



getElement(`#on-shop`)
	.addEventListener('click', () => {
		$(`#delivery-home`).prop("checked", false);
	    $('#other_addr_c').fadeOut('fast');
		//$(`#checkout__save`).attr('disabled',false);
    	$(`#checkout_shipping-cost`).html(`S/0.00`);
    	calculate_prices(0);
	});

getElement(`#delivery-home`)
	.addEventListener('click', () => {
		$(`#on-shop`).prop("checked", false);
        $('#other_addr_c').fadeIn('fast');
    	/*$(`#checkout__save`).attr('disabled',true);*/
    	$(`#checkout_shipping-cost`).html(`Seleccione Distrito`);


		//$(`select[name="district_id"]`).val("")
		//$(`select[name="district_id"]`).niceSelect('update');

		if ($(`select[name="district_id"]`).val() != "") {
			axios.get(`/api/template_3/district/${$(`select[name="district_id"]`).val()}/shipping-cost?cart=${localStorage.getItem('cart')}`)
				.then((response) => {
					let _max = Math.max.apply(null, response.data);
					calculate_prices(_max);
					getElement(`#shipping-error`).innerHTML = ``;
    				$(`#checkout_shipping-cost`).html(_max.toFixed(2));
				})
				.catch((error) => {
					//getElement(`#shipping-error`).innerHTML = error.response.data.message;
					getElement(`#shipping-error`).innerHTML = '<div class="text-danger"  style="background: #404040;  padding: 10px; border-radius: 5px; color: white;">'+error.response.data.message+'</div>';
					$(`#checkout__save`).attr('disabled',false);
    				$(`#checkout_shipping-cost`).html(`S/0.00`);
					calculate_prices(0);
				});	
		}



	});




getElement(`input[name="identity_document"]`)
	.addEventListener('keyup', function(e){

		if (e.target.value.length >= 8) {
			axios.get(`/api/template_9/customer?identity_document=${e.target.value}`)
				.then((response) => {

					if (response.data) {
						getElement(`input[name="first_name"]`).value = response.data.first_name;
						getElement(`input[name="last_name"]`).value = response.data.last_name;
						getElement(`input[name="phone"]`).value = response.data.cel_whatsapp;
						getElement(`#other-billing_form input[name="last_name"]`).value = response.data.last_name;
						getElement(`#other-billing_form input[name="first_name"]`).value = response.data.first_name;
						getElement(`#other-billing_form input[name="phone"]`).value = response.data.cel_whatsapp;
						getElement(`#other-billing_form input[name="identity_document"]`).value = response.data.identity_document;
						//getElement(`input[name="first_name"]`).value = response.data.first_name;
						//getElement(`input[name="first_name"]`).value = response.data.first_name;

					}

				});
		}
	});

getElement(`#checkout_form input[name="identity_document"]`)
	.addEventListener('keyup', (e) => {
		getElement(`#other-billing_form input[name="identity_document"]`).value = e.target.value;
	});

getElement(`#checkout_form input[name="first_name"]`)
	.addEventListener('keyup', (e) => {
		getElement(`#other-billing_form input[name="first_name"]`).value = e.target.value;
	});

getElement(`#checkout_form input[name="last_name"]`)
	.addEventListener('keyup', (e) => {
		getElement(`#other-billing_form input[name="last_name"]`).value = e.target.value;
	});

getElement(`#checkout_form input[name="phone"]`)
	.addEventListener('keyup', (e) => {
		getElement(`#other-billing_form input[name="phone"]`).value = e.target.value;
	});