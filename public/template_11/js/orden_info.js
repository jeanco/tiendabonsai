const aCouponRemover = document.querySelector('.remove_coupon');
const btnApplyCoupon = document.querySelector('#apply_coupon');
const selectCity = document.querySelector(`select[name="city_id"]`);
const selectProvince = document.querySelector(`select[name="province_id"]`);
const selectDistrict = document.querySelector(`select[name="district_id"]`);
const tBodyCheckout = document.querySelector('#checkout_tbody');
const spanShippingCost = document.querySelector('#checkout_shipping-cost');
const onShopOptions = document.querySelectorAll('input[name="store_item"]');

let shippingCost = 0;
let order_history_id;

$(`.invoice-area`).hide();
$('#options_paymets_1').fadeOut('fast');
$(`#select_payment_0`).prop("checked", true);
$(`.document-type-two`).hide();

$(`#checkout_create-a-user-area`).hide();

calculate_prices(0);

function calculate_prices(shipping_cost){
	axios.get(`/api/template_11/products/cart-lite?ids=${localStorage.getItem("cart")}`)
		.then((response) => {
			let _subTotal = 0,
				_content = ``,
				_discount = 0,
				_total = 0;

			cleanAllChildren(tBodyCheckout);

			response.data.forEach((product) => {

				const li = document.createElement('li');
				li.classList.add('clearfix');

				_subTotal += product.price * product.quantity;

                let price = product.message_about_price;
	            if (!product.has_hidden_price) {
	                price = `${getElement('#cart_symbol').value}${(parseFloat(product.price)*parseInt(getElement('#cart_rate').value)).toFixed(getElement('#cart_decimal').value)}`;
	            }

	            li.innerHTML = `<li class="clearfix"><em>(${product.quantity} u.) ${product.name}</em><span>${price}</span></li>`;

	            tBodyCheckout.appendChild(li);
				//_content += `<li class="clearfix"><em>${product.quantity}x ${product.name}</em><span>${price}</span></li>`;
			});

		    if (localStorage.getItem("coupon_by_percentage") != null) {
                if (localStorage.getItem("coupon_by_percentage") == 1) {
                    _discount = Math.round(((_subTotal / 100) * localStorage.getItem("coupon_amount")) * 100) / 100;
                } else {
                    _discount = parseFloat(localStorage.getItem("coupon_amount"));
                }
            }

			_total = _subTotal - _discount + shipping_cost;
			//getElement(`#checkout_tbody`).innerHTML = _content;
			getElement(`#checkout_discount`).innerHTML = `${getElement('#cart_symbol').value}${(_discount*parseInt(getElement('#cart_rate').value)).toFixed(getElement('#cart_decimal').value)}`;

			getElement(`#checkout_subtotal`).innerHTML = `${getElement('#cart_symbol').value}${(_subTotal*parseInt(getElement('#cart_rate').value)).toFixed(getElement('#cart_decimal').value)}`;
			getElement(`#checkout_total`).innerHTML = `${getElement('#cart_symbol').value}${(_total*parseInt(getElement('#cart_rate').value)).toFixed(getElement('#cart_decimal').value)}`;

			const checkout_message = getElement(`#checkout_message`).value;

            if(getElement('#checkout_active').value == 0){
            	getElement(`#checkout_subtotal`).innerHTML = checkout_message;
				getElement(`#checkout_total`).innerHTML = checkout_message;
            }

			//getElement(`#checkout_shipping-cost`).innerHTML = `${getElement('#cart_symbol').value}${shipping_cost.toFixed(getElement('#cart_decimal').value)}`;
			// if (shipping_cost == 0 && getElement(`#delivery-home`).checked) {
			// 	getElement(`#checkout_shipping-cost`).innerHTML = `Seleccione Distrito`;
			// }
			// if (getElement(`#on-shop`).checked) {
			// 	getElement(`#checkout_shipping-cost`).parent().hide();
			// }
            none(aCouponRemover);
            if (localStorage.getItem("coupon_code") != undefined) {
                displayInlineBlock(aCouponRemover);
            }
		});
}

	getElement(`#checkout__save`)
		.addEventListener('click', function(e) {
			lockWindow();
			e.preventDefault();
			cleanError();

			if (localStorage.getItem('cart') == undefined || localStorage.getItem('cart') == '') {
				normalSwal(`Revise`, `No ha elegido ningun producto!`, `info`);
				unlockWindow();
				return;
			}

			if (getElement(`#delivery-home`).checked && getElement(`select[name="district_id"]`).value == '') {
				normalSwal(`Revise`, `Seleccione Distrito`, `info`);
				unlockWindow();
				return;
			}

			if (!document.querySelector(`#terms-conditions`).checked) {
				normalSwal(`Revise`, `Debe aceptar los términos y condiciones`, `info`);
            	unlockWindow();
            	return;
			}


			$(".windows8").show();

			let _formData = new FormData($(`#checkout_form`)[0]);

			let _accountId = $(`.method-payments`).find('input:checked')[0].dataset.index;

			let place_id_selected = "";
			if ($(`.store_area`).find('input:checked').length) {
				place_id_selected = $(`.store_area`).find('input:checked')[0].dataset.index;
			}

			let _otherBillingAddress = $('#delivery-home').is(":checked");

			_formData.append('with_invoice', $('#with_invoice').is(":checked"));

			_formData.append('account_id', _accountId);
			_formData.append('other_address', _otherBillingAddress);
			_formData.append('product_ids', localStorage.getItem('cart'));

			_formData.append('coupon_code', localStorage.getItem('coupon_code'));
			_formData.append('currency_id', getElement('#cart_currency-id').value);
			_formData.append('place_id_selected', place_id_selected);

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
				url : `/api/template_11/order`,
				type: 'POST',
				data: _formData,
				contentType: false,
				processData: false,
				success: function(e){
					unlockWindow();
					if (e.payment_status) {
						order_history_id = e.order_history_id;

						Culqi = new culqijs.Checkout();
						//Desarrollo
						//Culqi.publicKey = 'pk_test_c2650b7e72d134fc';
						//produccion
						Culqi.publicKey = 'pk_live_ajZ4cielMttR0yVK';
						Culqi.options({
							lang: 'es',
							modal: true,
				            installments: false,
							style: {
								bgcolor: '#f0f0f0',
								maincolor: '#ed3137',
								disabledcolor: '#ffffff',
								buttontext: '#ffffff',
								maintext: '#ed3137',
								desctext: '#ed3137',
								logo: e.company_logo,
				      		  }
						})
						Culqi.settings({
							title: 'Pago en línea',
							currency: 'PEN',
							//description: e.payment_description,
							description: '',
							amount: e.payment_amount,
							//order: e.order_index
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
							if (eror === 'El email es obligatorio.') {
								normalSwal(`Registre sus correo`, `Es obligatorio escribir su correo electrónico`, `info`);
								$("#toTop").trigger("click");
							}

							if (eror === 'El email ya existe, pruebe con otro.') {
								//normalSwal('Alerta', eror, `warning`);



								Swal.fire({
										  title: 'Su correo ya se encuentra registrado, Por favor Ingrese su usuario y contraseña',
										  showDenyButton: true,
										  showCancelButton: true,
										  confirmButtonText: `Ingresar a mi cuenta`,
										   cancelButtonText:  'Continuar con otro correo',
										}).then((result) => {
										  /* Read more about isConfirmed, isDenied below */

										  console.log(result.value);
										  if (result.value == true) {
										    //normalSwal('Alerta', eror, `warning`);
										    $("#profile-tab").trigger("click");
										    $("#toTop").trigger("click");
										  } else if (result.value != true) {
										   // normalSwal('Alerta', 'cancel', `warning`);
										  }
										})
							}

						  });
						} else if (key == "password") {
						  $.each(value, function (errores, eror) {
							$('#checkout-password-error').append("<li class='error-block'>" + eror + "</li>");
						  });
						} else if (key == "first_name") {
						  $.each(value, function (errores, eror) {
							$('#checkout-first-name-error').append("<li class='error-block'>" + eror + "</li>");
							if (eror === 'El campo nombre es obligatorio.') {
								normalSwal(`Registre su Nombre`, `Es obligatorio escribir su Nombre Completo`, `info`);
								$("#toTop").trigger("click");
							}

						  });
						} else if (key == "last_name") {
						  $.each(value, function (errores, eror) {
							$('#checkout-last-name-error').append("<li class='error-block'>" + eror + "</li>");
							if (eror === 'El campo apellidos es obligatorio.') {
								normalSwal(`Registre sus Apellidos`, `Es obligatorio escribir sus Apellidos Completo`, `info`);
								$("#toTop").trigger("click");
							}
						  });
						} else if (key == "phone") {
						  $.each(value, function (errores, eror) {
							$('#checkout-phone-error').append("<li class='error-block'>" + eror + "</li>");
							if (eror === 'El campo teléfono es obligatorio.') {
								normalSwal(`Registre su Número Celular`, `Es obligatorio escribir número celular`, `info`);
								$("#toTop").trigger("click");
							}
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
						} else if (key == "birthday") {
						  $.each(value, function (errores, eror) {
							$('#customer-birthday-error').append("<li class='error-block'>" + eror + "</li>");
						  });
						} else if (key == "document_type") {
						  $.each(value, function (errores, eror) {
							$('#checkout-document-type-error').append("<li class='error-block'>" + eror + "</li>");
						  });
						} else if (key == "business_name") {
						  $.each(value, function (errores, eror) {
							$('#checkout-business-name-error').append("<li class='error-block'>" + eror + "</li>");
						  });
						} else if (key == "identity_document") {
						  $.each(value, function (errores, eror) {
							$('#checkout-identity-document-error').append("<li class='error-block'>" + eror + "</li>");
							if (eror === 'El campo documento es obligatorio.') {
								normalSwal(`Registre su DNI`, `Es obligatorio escribir su Documento de Identidad`, `info`);
								$("#toTop").trigger("click");
							}
						  });
						} else if (key == "business_document") {
						  $.each(value, function (errores, eror) {
							$('#business-document-error').append("<li class='error-block'>" + eror + "</li>");
						  });
						} else if (key == "business_name_social") {
						  $.each(value, function (errores, eror) {
							$('#business-name-error').append("<li class='error-block'>" + eror + "</li>");
						  });
						} else if (key == "business_address") {
						  $.each(value, function (errores, eror) {
							$('#business-address-error').append("<li class='error-block'>" + eror + "</li>");
						  });
						};
					  });
				}
			});
		});

	$('#checkout_identity-document').on('keyup', function(e) {
		if (e.target.value != '' && e.target.value.length >= 8) {
			axios.get(`/api/customers/${e.target.value}`)
				.then((response) => {
					const customer = response.data.data;

					if (customer != '') {
						getElement(`#checkout_firstname`).value = customer.firstName;
						getElement(`#checkout_lastname`).value = customer.lastName;
						// getElement(`#checkout_legal-name`).value = customer.legalName;
						getElement(`#checkout_email_`).value = customer.email;
						getElement(`#checkout_cel-whatsapp_`).value = customer.whatsapp;
						getElement(`#checkout_country`).value = customer.countryId;
						getElement(`#checkout_address`).value = customer.address;
						getElement(`#checkout_city`).value = customer.cityId;
					}
				});
		}
	});

	$(`#checkout_create-a-user`).on('change', function(E) {
		E.preventDefault();
		let _that = $(this);

		if (_that.prop('checked')) {
			$(`#checkout_create-a-user-area`).show();
			return;
		}

		$(`#checkout_create-a-user-area`).hide();

	});

	$(`#value_dni`).on('change', function(E) {
		$(`#value_password`).val($(`#value_dni`).val());
	});

	//$(`select[name="city_id"]`).html('<option value="" selected>Departamento</option>');
	selectCity.innerHTML = '<option value="" selected>Departamento</option>';
	$(`select[name="city_id"]`).niceSelect('update');

	//$(`select[name="province_id"]`).html('<option value="" selected>Provincia</option>');
	selectProvince.innerHTML = '<option value="" selected>Provincia</option>';
	$(`select[name="province_id"]`).niceSelect('update');

	//$(`select[name="district_id"]`).html('<option value="" selected>Distrito</option>');
	selectDistrict.innerHTML = '<option value="" selected>Distrito</option>';
	$(`select[name="district_id"]`).niceSelect('update');

	$(`select[name="country_id"]`).on('change', function(e){
		//$(`select[name="city_id"]`).html('<option value="">Departamento</option>');
		selectCity.innerHTML = '<option value="">Departamento</option>';
		$(`select[name="city_id"]`).niceSelect('update');
		//$(`select[name="province_id"]`).html('<option value="">Provincia</option>');
		selectProvince.innerHTML = '<option value="">Provincia</option>';
		$(`select[name="province_id"]`).niceSelect('update');

		//$(`select[name="district_id"]`).html('<option value="">Distrito</option>');
		selectDistrict.innerHTML = '<option value="">Distrito</option>';
		$(`select[name="district_id"]`).niceSelect('update');

		getElement(`#shipping-error`).innerHTML = ``;

		get_cities_by_country();
		spanShippingCost.innerHTML = `Seleccione Distrito`;
		//$(`#checkout_shipping-cost`).html(`Seleccione Distrito`);

	});

	$(`select[name="city_id"]`).on('change', function(e){
		$(`select[name="province_id"]`).html('<option value="">Provincia</option>');
		$(`select[name="province_id"]`).niceSelect('update');

		$(`select[name="district_id"]`).html('<option value="">Distrito</option>');
		$(`select[name="district_id"]`).niceSelect('update');
		getElement(`#shipping-error`).innerHTML = ``;
		get_provinces_by_city();
		spanShippingCost.innerHTML = `Seleccione Distrito`;
		//$(`#checkout_shipping-cost`).html(`Seleccione Distrito`);
	});

	$(`select[name="province_id"]`).on('change', function(e){
		$(`select[name="district_id"]`).html('<option value="">Distrito</option>');
		$(`select[name="district_id"]`).niceSelect('update');
		getElement(`#shipping-error`).innerHTML = ``;
		get_districts_by_province();
		spanShippingCost.innerHTML = `Seleccione Distrito`;
		//$(`#checkout_shipping-cost`).html(`Seleccione Distrito`);
	});

	function get_cities_by_country(){
		if (getElement(`select[name="country_id"]`).value != '') {
			axios.get(`/api/template_11/country/${getElement(`select[name="country_id"]`).value}/cities`)
				.then((response) => {
					//fillSelect(document.querySelector(`select[name="city_id"]`), response.data, null, `Departamento`);
					//fillSelectWithOutFirstOption(document.querySelector(`select[name="city_id"]`), response.data, null);
					cleanAllChildren(selectCity);
					fillSelectWithOutFirstOptionv2(selectCity, response.data);
					$(`select[name="city_id"]`).niceSelect('update');
				})
				.then(() => {
					get_provinces_by_city();
				});

		}
	}

	function get_provinces_by_city(){
		axios.get(`/api/template_11/city/${getElement(`select[name="city_id"]`).value}/provinces`)
			.then((response) => {
				//fillSelectWithOutFirstOption(selectProvince, response.data, null);
				cleanAllChildren(selectProvince);
				fillSelectWithOutFirstOptionv2(selectProvince, response.data);
				$(`select[name="province_id"]`).niceSelect('update');
				get_districts_by_province();

		});
	}

	function get_districts_by_province(){
		axios.get(`/api/template_11/province/${$(`select[name="province_id"]`).val()}/districts`)
		.then((response) => {

			cleanAllChildren(selectDistrict);
			fillSelectWithFirstOptionv2(selectDistrict, response.data, 'Distrito');
			//fillSelect(document.querySelector(`select[name="district_id"]`), response.data, null, 'Distrito')
			$(`select[name="district_id"]`).niceSelect('update');
		});
	}

	$(`select[name="district_id"]`).on('change', function(E){
		//apply shipping cost
		$(`#checkout__save`).attr('disabled',false);

		if (E.target.value != '') {
			axios.get(`/api/template_11/district/${E.target.value}/shipping-cost?cart=${localStorage.getItem('cart')}`)
				.then((response) => {
					let _max = Math.max.apply(null, response.data);
					shippingCost = _max;
					calculate_prices(_max);
					getElement(`#shipping-error`).innerHTML = ``;
					spanShippingCost.innerHTML = `${getElement('#cart_symbol').value}${(_max*parseInt(getElement('#cart_rate').value)).toFixed(getElement('#cart_decimal').value)}`;
    				//$(`#checkout_shipping-cost`).html(`${getElement('#cart_symbol').value}${(_max*parseInt(getElement('#cart_rate').value)).toFixed(getElement('#cart_decimal').value)}`);
				})
				.catch((error) => {
					//getElement(`#shipping-error`).innerHTML = error.response.data.message;
					getElement(`#shipping-error`).innerHTML = '<div class="text-danger"  style="background: #fcb600; padding: 10px; border-radius: 5px; color: #121212!important;">'+error.response.data.message+'</div>';
					$(`#checkout__save`).attr('disabled',false);
    				//$(`#checkout_shipping-cost`).html(`${getElement('#cart_symbol').value}${parseInt("0").toFixed(getElement('#cart_decimal').value)}`);
    				//$(`#checkout_shipping-cost`).html(`A Consultar`);
    				spanShippingCost.innerHTML = `A Consultar`;
					shippingCost = 0;
					calculate_prices(0);
				});
		} else {
			//$(`#checkout_shipping-cost`).html(`Seleccione Distrito`);
    		spanShippingCost.innerHTML = `Seleccione Distrito`;

			$(`#shipping-error`).html(``);
		}
	});
// })();

function culqi() {
		if (Culqi.token) {
			    console.log("Token obtenido");
			    console.log(Culqi.token);
				//console.log("Respuesta desde iframe: " + Culqi.token);
				//alert('llego token')
				lockWindow_culqi();
				$(document).ajaxStart(function(){
					// run_waitMe();
				});
				$.ajax({
						type: 'POST',
						url: '/api/template_11/order-confirm-payment',
						data: { token: Culqi.token.id, cuotas: Culqi.token.metadata.installments, order_history_id: order_history_id, 'credit_card_payment': true},
						datatype: 'json',
						success: function(data) {
							Culqi.close();
							unlockWindow();

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


							if(result.object === 'charge'){
								localStorage.removeItem(`cart`);
								localStorage.removeItem(`coupon_code`);
								localStorage.removeItem(`coupon_by_percentage`);
								localStorage.removeItem(`coupon_amount`);
								location.replace(`/checkout/completado`);
								return;
							}

							// if (data.successful) {
							// return;
							// }
							//data = JSON.parse(data);

							//normalSwal(data.user_message, data.merchant_message, `warning`);
							// var result = "";
							// if(data.constructor == String){
							// 		result = JSON.parse(data);
							// }
							// if(data.constructor == Object){
							// 		result = JSON.parse(JSON.stringify(data));
							// }
							// if(result.object === 'charge'){
							// resultdiv(result.outcome.user_message);
    //                             Culqi.close();
							// }
							// if(result.object === 'error'){
							// 		Culqi.close();
							// 		resultdiv(result.user_message);
							// 		console.log(result.merchant_message);
							// }
						},
						error: function(error) {
							console.log(error);
							unlockWindow();
							//resultdiv(error)
						}
				});
		} else if (Culqi.order) {
			 console.log("Order confirmada");
             //console.log(Culqi.order);
			 //resultpe(Culqi.order);
				$.ajax({
						type: 'POST',
						url: '/api/template_11/order-confirm-payment',
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


// getElement(`#select_payment_0`)
// 	.addEventListener('click', () => {
// 		$(`#select_payment_1`).prop("checked", false);
// 		//$(`#select_payment_2`).prop("checked", false);
// 	    $('#options_paymets_0').fadeIn('fast');
// 	    $('#options_paymets_1').fadeOut('fast');
// 	    $('#options_paymets_2').fadeOut('fast');

// 	});

// getElement(`#select_payment_1`)
// 	.addEventListener('click', () => {
// 		$(`#select_payment_0`).prop("checked", false);
// 		//$(`#select_payment_2`).prop("checked", false);
// 	    $('#options_paymets_1').fadeIn('fast');
// 	    $('#options_paymets_0').fadeOut('fast');
// 	    $('#options_paymets_2').fadeOut('fast');
// 	    $(`#select_payment_more_0`).prop("checked", true);
// 	});

/*getElement(`#select_payment_2`)
	.addEventListener('click', () => {
		$(`#select_payment_0`).prop("checked", false);
		$(`#select_payment_1`).prop("checked", false);
	    $('#options_paymets_2').fadeIn('fast');
	    $('#options_paymets_0').fadeOut('fast');
	    $('#options_paymets_1').fadeOut('fast');
	});*/

if (onShopOptions.length) {
    		onShopOptions[0].checked = true;
}

getElement(`#on-shop`)
	.addEventListener('click', () => {
		$(`#delivery-home`).prop("checked", false);
	    $('#other_addr_c').fadeOut('fast');
		//$(`#checkout__save`).attr('disabled',false);
		spanShippingCost.innerHTML = `${getElement('#cart_symbol').value}${parseInt("0").toFixed(getElement('#cart_decimal').value)}`;
    	//$(`#checkout_shipping-cost`).html(`${getElement('#cart_symbol').value}${parseInt("0").toFixed(getElement('#cart_decimal').value)}`);
    	calculate_prices(0);

    	if (onShopOptions.length) {
    		onShopOptions[0].checked = true;
    	}

	});

getElement(`#delivery-home`)
	.addEventListener('click', () => {
		$(`#on-shop`).prop("checked", false);
        $('#other_addr_c').fadeIn('fast');
    	/*$(`#checkout__save`).attr('disabled',true);*/
    	//$(`#checkout_shipping-cost`).html(`Seleccione Distrito`);
    	spanShippingCost.innerHTML = `Seleccione Distrito`;
		//$(`select[name="district_id"]`).val("")
		//$(`select[name="district_id"]`).niceSelect('update');

		if (selectDistrict.value) {
		//if ($(`select[name="district_id"]`).val() != "") {
			axios.get(`/api/template_11/district/${$(`select[name="district_id"]`).val()}/shipping-cost?cart=${localStorage.getItem('cart')}`)
				.then((response) => {
					let _max = Math.max.apply(null, response.data);
					shippingCost = _max;
					calculate_prices(_max);
					getElement(`#shipping-error`).innerHTML = ``;
    				//$(`#checkout_shipping-cost`).html(_max.toFixed(2));
    				spanShippingCost.innerHTML = _max.toFixed(2);
				})
				.catch((error) => {
					//getElement(`#shipping-error`).innerHTML = error.response.data.message;
					getElement(`#shipping-error`).innerHTML = '<div class="text-danger"  style="background: #fcb600; padding: 10px; border-radius: 5px; color: #121212!important;">'+error.response.data.message+'</div>';
					$(`#checkout__save`).attr('disabled',false);
    				//$(`#checkout_shipping-cost`).html(`${getElement('#cart_symbol').value}${parseInt("0").toFixed(getElement('#cart_decimal').value)}`);
    				//$(`#checkout_shipping-cost`).html(`A Consultar`);
    				spanShippingCost.innerHTML = `A Consultar`;

					shippingCost = 0;
					calculate_prices(0);
				});
		}

	});

$(`select[name="document_type"]`).on('change', function(e){

	if (e.target.value == 1) {
		$(`.document-type-one`).show();
		$(`.document-type-two`).hide();
	}

	if (e.target.value == 2) {
		$(`.document-type-one`).hide();
		$(`.document-type-two`).show();
	}

});

getElement(`input[name="identity_document"]`)
	.addEventListener('keyup', function(e){

		if (e.target.value.length >= 8) {
			axios.get(`/api/template_11/customer?identity_document=${e.target.value}`)
				.then((response) => {
					if (response.data) {
						getElement(`input[name="first_name"]`).value = response.data.first_name;
						getElement(`input[name="last_name"]`).value = response.data.last_name;
						getElement(`#checkout_form input[name="address"]`).value = response.data.address;
						getElement(`input[name="phone"]`).value = response.data.cel_whatsapp;
						getElement(`#other-billing_form input[name="last_name"]`).value = response.data.last_name;
						getElement(`#other-billing_form input[name="first_name"]`).value = response.data.first_name;
						getElement(`#other-billing_form input[name="phone"]`).value = response.data.cel_whatsapp;
						$(`#other-billing_form input[name="identity_document"]`).val(response.data.identity_document);
						getElement(`#other-billing_form input[name="address"]`).value = response.data.address;

						if (response.data.alternative_direction != null) {
							getElement(`#other-billing_form input[name="last_name"]`).value = response.data.alternative_direction.last_name;
							getElement(`#other-billing_form input[name="address"]`).value = response.data.alternative_direction.address;

							getElement(`#other-billing_form input[name="first_name"]`).value = response.data.alternative_direction.first_name;
							getElement(`#other-billing_form input[name="phone"]`).value = response.data.alternative_direction.cel;
							$(`#other-billing_form input[name="identity_document"]`).val(response.data.alternative_direction.identity_document);
						}


						//getElement(``).value = response.data.identity_document;
						//getElement(`input[name="first_name"]`).value = response.data.first_name;
						//getElement(`input[name="first_name"]`).value = response.data.first_name;

					}

				});
		}
	});


if (getElement(`#country_id`).value != '') {
	axios.get(`/api/template_11/country/${getElement(`#country_id`).value}/cities`)
		.then((response) => {
			fillSelect(document.querySelector(`select[name="city_id"]`), response.data, getElement(`#city_id`).value, `Departamento`);
			document.querySelector(`select[name="city_id"]`).value = getElement(`#city_id`).value;
			$(`select[name="city_id"]`).niceSelect('update');
			return getElement(`#city_id`).value;
	})
	.then((city_id) => {
		axios.get(`/api/template_11/city/${city_id}/provinces`)
			.then((response) => {
				fillSelect(document.querySelector(`select[name="province_id"]`), response.data, getElement(`#province_id`).value, 'Provincia');
				document.querySelector(`select[name="province_id"]`).value = getElement(`#province_id`).value;
				$(`select[name="province_id"]`).niceSelect('update');
		});
	})
	.then(() => {
		axios.get(`/api/template_11/province/${getElement(`#province_id`).value}/districts`)
		.then((response) => {
			fillSelect(document.querySelector(`select[name="district_id"]`), response.data, getElement(`#district_id`).value, 'Distrito')
			document.querySelector(`select[name="district_id"]`).value = getElement(`#district_id`).value;
			$(`select[name="district_id"]`).niceSelect('update');
		});
	})
	.then(() => {
	});

} else {
	get_cities_by_country();
}

$(`#with_invoice`)
	.on('click', function(){
		if ($(this).prop('checked')) {
			$(`.invoice-area`).show();
			return;
		}
		$(`.invoice-area`).hide();
	});

$(document).on('click', '.btn_pay', function(){
    let _that = $(this);
    _that.parent().next().children().find('.radio-btn-0').prop("checked", true);
});

$(`select[name="country_id"]`).select2();
$(`select[name="city_id"]`).select2();
$(`select[name="province_id"]`).select2();
$(`select[name="district_id"]`).select2();


btnApplyCoupon
	.addEventListener('click', () => {

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

                displayInlineBlock(aCouponRemover);
                calculate_prices(shippingCost);
                //window.location.reload();
                //reCalculatingTotal(false);

            })
            .catch((err) => {
                Swal.fire(
                '',
                err.response.data.message,
                'warning'
                )
            });
	});

aCouponRemover
	.addEventListener('click', () => {
	    localStorage.removeItem(`coupon_code`);
	    localStorage.removeItem(`coupon_by_percentage`);
	    localStorage.removeItem(`coupon_amount`);
	    none(aCouponRemover);
	    calculate_prices(shippingCost);
	});
