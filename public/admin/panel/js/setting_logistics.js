(() => {

	function load_logistics() {
		//Categories

		axios.get(`/admin/logistics`)
			.then((response) => {
				let _content = ``;

				getElement(`#setting-logistic-tbody`).innerHTML = ``;

				response.data.forEach((value) => {
					_content += `
							<tr>
								<td>${value.name}</td>
								<td>Por hacer</td>
								<td>Por hacer</td>
								<td>
									<button data-index="${value.id}" class="btn btn-success btn-sm logistic__edit" title="Editar" data-target="#new-logistic" data-toggle="modal">
										<i class="glyphicon glyphicon-pencil notPointerEvent"></i>
									</button>
									<button data-index="${value.id}" class="btn btn-danger btn-sm logistic__delete" title="Eliminar">
										<i class="glyphicon glyphicon-trash notPointerEvent"></i>
									</button>
								</td>
							</tr>`;

				});

				getElement(`#setting-logistic-tbody`).innerHTML = _content;
			});
	}

	load_logistics();

	$(document).on('click', '.logistic__edit', function() {
		cleanError();
		clean_modal();
		$(`#logistic__update`).show();
		$(`#setting-cost-tbody`).html("");

		let _id = $(this)[0].dataset.index;

		axios.get(`/admin/logistic/${_id}`)
			.then((response) => {

				getElement(`#logistic_form input[name='logistic_id']`).value = response.data.id;
				getElement(`#logistic_form input[name='name']`).value = response.data.name;
				getElement(`#logistic_form textarea[name='shipping_policies']`).value = response.data.shipping_policies;
				getElement(`#logistic_form select[name='company_id']`).value = response.data.company_id;
				getElement(`#logistic_form select[name='place_id']`).value = response.data.place_id;
				getElement(`#logistic_form select[name='status']`).value = response.data.status;
				$(`#logistic_form`).append(`<input type="hidden" name="_method" id="logistic_method" value="PUT" />`);

				//drawing costs;
				reDrawCosts(_id);
			});
	});

	$(document).on('click', '.logistic__delete', function() {
		let _id = $(this)[0].dataset.index;

		deleteObjectAxios(`/admin/logistic/${_id}`, {}, `¿Desea eliminar este lugar?`, (response) => {
			toastNotice(`${response.data.message}`);
			//load_logistics();
			reDrawCosts(_id);
		}, (error) => {
			toastError(`${error.response.data.message}`);
		});
	});

	getElement(`#logistic__update`)
		.addEventListener('click', () => {
			cleanError();
			var _route = `/admin/logistic/${getElement(`input[name=logistic_id]`).value}`;
			var formData = new FormData($('#logistic_form')[0]);

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
					$(`#new-logistic`).modal('hide');
					load_logistics();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					unlockWindow();
					$.each(jqXHR.responseJSON, function(key, value) {
						if (key == "name") {
							$.each(value, function(errores, eror) {
								$('#logistic-name-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == 'shipping_policies'){
							$.each(value, function(errores, eror) {
								$('#logistic-policies-error').append("<li class='error-block'>" + eror + "</li>");
							});
						}
					});
				}
			});
		});

	getElement(`#logistic__add`)
		.addEventListener('click', () => {
			clean_modal();
			$(`#logistic__save`).show();
			$(`#cost__add`).parent().hide();

		});

	function clean_modal() {
		$(`#logistic_form`)[0].reset();
		$(`#logistic__save`).hide();
		$(`#logistic__update`).hide();
		$(`#logistic_method`).remove();
		$(`#cost__add`).parent().show();

	}

	getElement(`#logistic__save`)
		.addEventListener('click', () => {
			cleanError();

			var ruta = '/admin/logistic';
			var formData = new FormData($('#logistic_form')[0]);

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
					$(`#new-logistic`).modal('hide');
					load_logistics();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					unlockWindow();
					$.each(jqXHR.responseJSON, function(key, value) {
						if (key == "name") {
							$.each(value, function(errores, eror) {
								$('#logistic-name-error').append("<li class='error-block'>" + eror + "</li>");
							});
						} else if (key == 'shipping_policies'){
							$.each(value, function(errores, eror) {
								$('#logistic-policies-error').append("<li class='error-block'>" + eror + "</li>");
							});
						}
					});
				}
			});
		});
})();