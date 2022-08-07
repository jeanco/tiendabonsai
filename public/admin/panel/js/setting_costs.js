	function reDrawCosts(logistic_id) {
		//Categories
		axios.get(`/admin/logistic/${logistic_id}/costs`)
			.then((response) => {
				let _content = ``;

				getElement(`#setting-cost-tbody`).innerHTML = ``;

				response.data.forEach((value) => {
					_content += `
			            <tr>
			              <td>${value.name}</td>
			              <td>S/${value.cost}</td>
			              <td>
			                <button data-index="${value.id}" class="btn btn-success btn-sm cost__edit" title="Editar" data-target="#new-detail-costo" data-toggle="modal">
			                <i class="glyphicon glyphicon-pencil notPointerEvent"></i>
			                </button>
			                <button data-index="${value.id}" class="btn btn-danger btn-sm cost__delete" title="Eliminar">
			                <i class="glyphicon glyphicon-trash notPointerEvent"></i>
			                </button>
			              </td>
			            </tr>`;

				});
				getElement(`#setting-cost-tbody`).innerHTML = _content;
			});
	}

(() => {

  $(`#cost_form select[name=city_id]`).select2();
  $(`#cost_form select[name=province_id]`).select2();
  $(`#cost_form select[name=district_id]`).select2();
  $(`#cost_form select[name=subcategory_id]`).select2();

	//load_costs();

	function filling_cities(arr_citites_selected){

		axios.get(`/admin/country/${$(`#cost_form select[name='country_id']`).val()}/cities`)
			.then((response) => {
				fillSelectWithOutFirstOption(document.querySelector(`#cost_form select[name="city_id"]`), response.data, null)
				$(`#cost_form select[name="city_id"]`).select2().val(arr_citites_selected).trigger('change.select2');
			});
	}

	$(`#cost-all-cities`).on('click', function(){
		//xxxx
		let _that = $(this);	
		getElement(`#cost_form select[name="city_id"]`).innerHTML = ``;			

		if (_that.prop("checked")) {

			//fill all provinces of the country!
			get_provinces_by_country();
		} else {

			$(`#cost-all-provinces`).prop("checked", false);
			$(`#cost-all-districts`).prop("checked", false);
			getElement(`#cost_form select[name="district_id"]`).innerHTML = ``;			
			getElement(`#cost_form select[name="province_id"]`).innerHTML = ``;			

			get_cities_by_country()
		}
	});

	$(`#cost-all-provinces`).on('click', function(){
		let _that = $(this);	

		if (_that.prop("checked")) {
			getElement(`#cost_form select[name="province_id"]`).innerHTML = ``;			

			if ($(`#cost-all-districts`).prop("checked")) {
				getElement(`#cost_form select[name="district_id"]`).innerHTML = ``;
				return;
			}

			if ($(`#cost-all-cities`).prop("checked")) {
				//fill all provinces of the country!
				get_districts_by_country();
				return;
			}
			get_districts_by_city();
		} else {

			$(`#cost-all-districts`).prop("checked", false);
			getElement(`#cost_form select[name="district_id"]`).innerHTML = ``;
			getElement(`#cost_form select[name="province_id"]`).innerHTML = ``;			

			if ($(`#cost-all-cities`).prop("checked")) {

				get_provinces_by_country();
				return;
			}

			get_provinces_by_city();

		}

	});

	$(`#cost-all-districts`).on('click', function(){
		let _that = $(this);	

		if (_that.prop("checked")) {
			getElement(`#cost_form select[name="district_id"]`).innerHTML = ``;			
		} else {
			//False, deschequeado;
			if ($(`#cost-all-provinces`).prop("checked") == false && $(`#cost_form select[name="province_id"]`).val() == null) {
				return;
			}
			if ($(`#cost-all-provinces`).prop("checked")) {
				if ($(`#cost-all-cities`).prop("checked")) {
					//get districts by country
					get_districts_by_country();
				} else {
					//get districts by city
					get_districts_by_city();
				}
			} else {
				//get districts by province
				get_districts_by_province();
			}
		}
	});


	$(`#cost_form select[name="country_id"]`).on('change', function(e){
			
		_values_selected = $(this).val();

		getElement(`#cost_form select[name="city_id"]`).innerHTML = ``;
		getElement(`#cost_form select[name="province_id"]`).innerHTML = ``;
		getElement(`#cost_form select[name="district_id"]`).innerHTML = ``;
		$(`#cost-all-cities`).prop("checked", false);
		$(`#cost-all-provinces`).prop("checked", false);
		$(`#cost-all-districts`).prop("checked", false);

		//getting provinces
		get_cities_by_country();

	});


	$(`#cost_form select[name="city_id"]`).on('change', function(e){
			
		_values_selected = $(this).val();

		getElement(`#cost_form select[name="province_id"]`).innerHTML = ``;
		getElement(`#cost_form select[name="district_id"]`).innerHTML = ``;

		$(`#cost-all-cities`).prop("checked", false);
		$(`#cost-all-provinces`).prop("checked", false);
		$(`#cost-all-districts`).prop("checked", false);

		//getting provinces

		get_provinces_by_city();
	});

	$(`#cost_form select[name="province_id"]`).on('change', function(e){
			
		_values_selected = $(this).val();
		getElement(`#cost_form select[name="district_id"]`).innerHTML = ``;
		$(`#cost-all-provinces`).prop("checked", false);
		$(`#cost-all-districts`).prop("checked", false);
		//getting provinces
		get_districts_by_province();

	});

	$(`#cost_form select[name="district_id"]`).on('change', function(e){
		$(`#cost-all-districts`).prop("checked", false);
	});


	$(document).on('click', '.cost__edit', function(e) {
		e.preventDefault();
		cleanError();
		clean_modal();
		$(`#cost__update`).show();

		let _id = $(this)[0].dataset.index;

		axios.get(`/admin/cost/${_id}`)
			.then((response) => {
				let _risposta_master = response.data;
				getElement(`#cost_form input[name='cost_id']`).value = response.data.cost.id;
				getElement(`#cost_form input[name='name']`).value = response.data.cost.name;
				getElement(`#cost_form select[name='country_id']`).value = response.data.cost.country_id;
				getElement(`#cost_form select[name='transport_company_id']`).value = response.data.cost.transport_company_id;
				getElement(`#cost_form input[name='cost']`).value = response.data.cost.cost;
				$(`#cost_form`).append(`<input type="hidden" name="_method" id="cost_method" value="PUT" />`);
				$(`#cost_form select[name="subcategory_id"]`).select2().val(_risposta_master.subcategories).trigger('change.select2');

				if (_risposta_master.cost.all_cities) {
					$("#cost-all-cities").prop("checked", true);
          			document.querySelector(`#cost_form select[name="city_id"]`).innerHTML = ``;
				} else {
					axios.get(`/admin/country/${$(`#cost_form select[name='country_id']`).val()}/cities`)
						.then((response) => {
							fillSelectWithOutFirstOption(document.querySelector(`#cost_form select[name="city_id"]`), response.data, null)
							$(`#cost_form select[name="city_id"]`).select2().val(_risposta_master.cities).trigger('change.select2');
					});
				}

				if (_risposta_master.cost.all_provinces) {
          			$("#cost-all-provinces").prop("checked", true);
          			document.querySelector(`#cost_form select[name="province_id"]`).innerHTML = ``;
				} else {
					if (_risposta_master.cost.all_cities) {

						axios.get(`/admin/country/${$(`#cost_form select[name='country_id']`).val()}/provinces`)
							.then((response) => {
								fillSelectWithOutFirstOption(document.querySelector(`#cost_form select[name="province_id"]`), response.data, null)
								$(`#cost_form select[name="province_id"]`).select2().val(_risposta_master.provinces).trigger('change.select2');
						});

					} else {
						axios.get(`/admin/city/${_risposta_master.cities.join(',')}/provinces`)
							.then((response) => {
								fillSelectWithOutFirstOption(document.querySelector(`#cost_form select[name="province_id"]`), response.data, null)
								$(`#cost_form select[name="province_id"]`).select2().val(_risposta_master.provinces).trigger('change.select2');
						});
					}
				}

				if (_risposta_master.cost.all_districts) {
          			$("#cost-all-districts").prop("checked", true);
          			document.querySelector(`#cost_form select[name="district_id"]`).innerHTML = ``;
				} else {

					if (_risposta_master.cost.all_provinces) {

						if (_risposta_master.cost.all_cities) {
							
							axios.get(`/admin/country/${$(`#cost_form select[name='country_id']`).val()}/districts`)
								.then((response) => {
									fillSelectWithOutFirstOption(document.querySelector(`#cost_form select[name="district_id"]`), response.data, null)
									$(`#cost_form select[name="district_id"]`).select2().val(_risposta_master.districts).trigger('change.select2');
							});
						} else {
							axios.get(`/admin/city/${_risposta_master.cities.join(',')}/districts`)
								.then((response) => {
									fillSelectWithOutFirstOption(document.querySelector(`#cost_form select[name="district_id"]`), response.data, null)
									$(`#cost_form select[name="district_id"]`).select2().val(_risposta_master.districts).trigger('change.select2');
							});
						}
					} else {
						axios.get(`/admin/province/${_risposta_master.provinces.join(',')}/districts`)
							.then((response) => {
								fillSelectWithOutFirstOption(document.querySelector(`#cost_form select[name="district_id"]`), response.data, null)
								$(`#cost_form select[name="district_id"]`).select2().val(_risposta_master.districts).trigger('change.select2');
						});
					}
				}
			});
	});

	$(document).on('click', '.cost__delete', function(e) {
		e.preventDefault();
		let _id = $(this)[0].dataset.index;

		deleteObjectAxios(`/admin/cost/${_id}`, {}, `¿Desea eliminar este lugar?`, (response) => {
			toastNotice(`${response.data.message}`);
			reDrawCosts(getElement(`#logistic_form input[name='logistic_id']`).value);
		}, (error) => {
			toastError(`${error.response.data.message}`);
		});
	});

	getElement(`#cost__update`)
		.addEventListener('click', () => {
			cleanError();
			var _route = `/admin/cost/${getElement(`input[name=cost_id]`).value}`;
		
			var formData = new FormData($('#cost_form')[0]);

			formData.append('logistic_id', getElement(`#logistic_form input[name='logistic_id']`).value);

			if (document.querySelector(`#cost-all-cities`).checked) {
				formData.append('cities', document.querySelector(`#cost-all-cities`).checked);
			}

			if ($(`#cost_form select[name=city_id]`).val()) {
				formData.append('cities', $(`#cost_form select[name=city_id]`).val());
			}

			if (document.querySelector(`#cost-all-provinces`).checked) {
				formData.append('provinces', document.querySelector(`#cost-all-provinces`).checked);
			}

			if ($(`#cost_form select[name=province_id]`).val()) {
				formData.append('provinces', $(`#cost_form select[name=province_id]`).val());
			}

			if (document.querySelector(`#cost-all-districts`).checked) {
				formData.append('districts', document.querySelector(`#cost-all-districts`).checked);
			}

			if ($(`#cost_form select[name=district_id]`).val()) {
				formData.append('districts', $(`#cost_form select[name=district_id]`).val());
			}

			formData.append('subcategories', $(`#cost_form select[name=subcategory_id]`).val());

			lockWindow();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('input[name=_token]').val()
				}
			});
			$.ajax({
				url: _route,
				type: 'POST',
				data: formData,
				contentType: false,
				processData: false,
				success: function(e) {
					unlockWindow();
					toastNotice(`${e.message}`);
					$(`#new-detail-costo`).modal('hide');
					reDrawCosts(getElement(`#logistic_form input[name='logistic_id']`).value);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					unlockWindow();

					if (jqXHR.responseJSON.hasOwnProperty('type')) {
						toastError(`${jqXHR.responseJSON.message}`);
						return;
					}

					$.each(jqXHR.responseJSON, function(key, value) {
						if (key == "name") {
							$.each(value, function(errores, eror) {
								$('#cost-name-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if(key == 'country_id'){
							$.each(value, function(errores, eror) {
								$('#cost-country-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if(key == 'transport_company_id'){
							$.each(value, function(errores, eror) {
								$('#cost-transport-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if(key == 'cost'){
							$.each(value, function(errores, eror) {
								$('#cost-cost-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if(key == 'cities'){
							$.each(value, function(errores, eror) {
								$('#cost-cities-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if(key == 'provinces'){
							$.each(value, function(errores, eror) {
								$('#cost-provinces-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if(key == 'districts'){
							$.each(value, function(errores, eror) {
								$('#cost-districts-error').append("<li class='error-block'>" + eror + "</li>");
							});
						}
					});
				}
			});
		});


	getElement(`#cost__add`)
		.addEventListener('click', () => {

			filling_cities([]);
			clean_modal();

			$(`#cost-all-cities`).prop("checked", false);
			$(`#cost-all-provinces`).prop("checked", false);
			$(`#cost-all-districts`).prop("checked", false);
			getElement(`#cost_form select[name="city_id"]`).innerHTML = ``;
			getElement(`#cost_form select[name="province_id"]`).innerHTML = ``;
			getElement(`#cost_form select[name="district_id"]`).innerHTML = ``;
			$(`#cost_form select[name="subcategory_id"]`).select2().val([]).trigger('change.select2');

			$(`#cost__save`).show();

		});

	function clean_modal() {
		$(`#cost_form`)[0].reset();
		$(`#cost__save`).hide();
		$(`#cost__update`).hide();
		$(`#cost_method`).remove();
	}

	getElement(`#cost__save`)
		.addEventListener('click', () => {
			cleanError();

			var ruta = '/admin/cost';
			var formData = new FormData($('#cost_form')[0]);

			formData.append('logistic_id', getElement(`#logistic_form input[name='logistic_id']`).value);

			if (document.querySelector(`#cost-all-cities`).checked) {
				formData.append('cities', document.querySelector(`#cost-all-cities`).checked);
			}

			if ($(`#cost_form select[name=city_id]`).val()) {
				formData.append('cities', $(`#cost_form select[name=city_id]`).val());
			}

			if (document.querySelector(`#cost-all-provinces`).checked) {
				formData.append('provinces', document.querySelector(`#cost-all-provinces`).checked);
			}

			if ($(`#cost_form select[name=province_id]`).val()) {
				formData.append('provinces', $(`#cost_form select[name=province_id]`).val());
			}

			if (document.querySelector(`#cost-all-districts`).checked) {
				formData.append('districts', document.querySelector(`#cost-all-districts`).checked);
			}

			if ($(`#cost_form select[name=district_id]`).val()) {
				formData.append('districts', $(`#cost_form select[name=district_id]`).val());
			}

			formData.append('subcategories', $(`#cost_form select[name=subcategory_id]`).val());


			lockWindow();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('input[name=_token]').val()
				}
			});
			$.ajax({
				url: ruta,
				type: 'POST',
				data: formData,
				contentType: false,
				processData: false,
				success: function(e) {
					unlockWindow();
					toastNotice(`${e.message}`);
					$(`#new-detail-costo`).modal('hide');
					reDrawCosts(getElement(`#logistic_form input[name='logistic_id']`).value);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					unlockWindow();

					if (jqXHR.responseJSON.hasOwnProperty('type')) {
						toastError(`${jqXHR.responseJSON.message}`);
						return;
					}

					$.each(jqXHR.responseJSON, function(key, value) {
						if (key == "name") {
							$.each(value, function(errores, eror) {
								$('#cost-name-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if(key == 'country_id'){
							$.each(value, function(errores, eror) {
								$('#cost-country-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if(key == 'transport_company_id'){
							$.each(value, function(errores, eror) {
								$('#cost-transport-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if(key == 'cost'){
							$.each(value, function(errores, eror) {
								$('#cost-cost-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if(key == 'cities'){
							$.each(value, function(errores, eror) {
								$('#cost-cities-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if(key == 'provinces'){
							$.each(value, function(errores, eror) {
								$('#cost-provinces-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if(key == 'districts'){
							$.each(value, function(errores, eror) {
								$('#cost-districts-error').append("<li class='error-block'>" + eror + "</li>");
							});
						}
					});
				}
			});
		});


	function get_districts_by_country(selected = null){
		axios.get(`/admin/country/${getElement(`#cost_form select[name="country_id"]`).value}/districts`)
		.then((response) => {
			fillSelectWithOutFirstOption(document.querySelector(`#cost_form select[name="district_id"]`), response.data, null)
			if (selected) {
				$(`#cost_form select[name="district_id"]`).select2().val(selected).trigger('change.select2');
			}
		});
	}

	function get_districts_by_city(selected = null){
		axios.get(`/admin/city/${$(`#cost_form select[name="city_id"]`).val()}/districts`)
			.then((response) => {
				fillSelectWithOutFirstOption(document.querySelector(`#cost_form select[name="district_id"]`), response.data, null)

				if (selected) {
					$(`#cost_form select[name="district_id"]`).select2().val(selected).trigger('change.select2');
				}
		});

	}

	function get_districts_by_province(selected = null){
		axios.get(`/admin/province/${$(`#cost_form select[name="province_id"]`).val()}/districts`)
		.then((response) => {
			fillSelectWithOutFirstOption(document.querySelector(`#cost_form select[name="district_id"]`), response.data, null)
			if (selected) {
				$(`#cost_form select[name="district_id"]`).select2().val(selected).trigger('change.select2');
			}
		});
	}

	function get_provinces_by_city(selected = null){
		axios.get(`/admin/city/${_values_selected}/provinces`)
			.then((response) => {
				fillSelectWithOutFirstOption(document.querySelector(`#cost_form select[name="province_id"]`), response.data, null)
		});
	}

	function get_provinces_by_country(selected = null){
		axios.get(`/admin/country/${getElement(`#cost_form select[name="country_id"]`).value}/provinces`)
		.then((response) => {
			fillSelectWithOutFirstOption(document.querySelector(`#cost_form select[name="province_id"]`), response.data, null)
		});
	}

	function get_cities_by_country(){
		axios.get(`/admin/country/${getElement(`#cost_form select[name="country_id"]`).value}/cities`)
			.then((response) => {
				fillSelectWithOutFirstOption(document.querySelector(`#cost_form select[name="city_id"]`), response.data, null)
		});
	}

})();