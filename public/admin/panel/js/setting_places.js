(() => {

	function load_places() {
		//Categories

		axios.get(`/admin/places`)
			.then((response) => {
				let _content = ``;

				getElement(`#setting-place-tbody`).innerHTML = ``;

				response.data.forEach((value) => {
					_content += `
							<tr>
								<td>${value.name}</td>
								<td>${value.address}</td>
								<td>${value.schedule}</td>
								<td>
									<button data-index="${value.id}" class="btn btn-success btn-sm place__edit" title="Editar" data-target="#new-place" data-toggle="modal">
										<i class="glyphicon glyphicon-pencil notPointerEvent"></i>
									</button>
									<button data-index="${value.id}" class="btn btn-danger btn-sm place__delete" title="Eliminar">
										<i class="glyphicon glyphicon-trash notPointerEvent"></i>
									</button>
								</td>
							</tr>`;

				});

				getElement(`#setting-place-tbody`).innerHTML = _content;
			});
	}

	load_places();

	$(document).on('click', '.place__edit', function() {
		cleanError();
		clean_modal();
		$(`#place__update`).show();

		let _id = $(this)[0].dataset.index;

		axios.get(`/admin/place/${_id}`)
			.then((response) => {

				getElement(`#place_form input[name='place_id']`).value = response.data.id;
				getElement(`#place_form input[name='name']`).value = response.data.name;
			/*	getElement(`#place_form textarea[name='address']`).value = response.data.address;
				getElement(`#place_form input[name='cel']`).value = response.data.cel;*/
				getElement(`#place_form input[name='email']`).value = response.data.email;
				getElement(`#place_form input[name='phone']`).value = response.data.phone;
				/*getElement(`#place_form textarea[name='schedule']`).value = response.data.schedule;*/
				getElement(`#place_form textarea[name='geolocalization']`).value = response.data.geolocalization;
				$(`#place_form`).append(`<input type="hidden" name="_method" id="place_method" value="PUT" />`);
				getElement(`#place_form select[name='country_id']`).value = response.data.country_id;
				getElement(`#place_form select[name='type']`).value = response.data.type;


				$(`#schedule_content`).html(response.data.schedule);
		        addSummernoteEditor($(`#schedule_content`));

				$(`#address_content`).html(response.data.address);
		        addSummernoteEditor($(`#address_content`));

		        $(`#cel_content`).html(response.data.cel);
		        addSummernoteEditor($(`#cel_content`));
				//getElement(`#company-category_id`).value = response.data.id;
				//getElement(`#company-category_name`).value = response.data.name;
				//getElement(`#company-category_description`).value = response.data.description;
				//getElement(`#company-category_published`).value = response.data.published;
			});
	});

	$(document).on('click', '.place__delete', function() {
		let _id = $(this)[0].dataset.index;

		deleteObjectAxios(`/admin/place/${_id}`, {}, `¿Desea eliminar este lugar?`, (response) => {
			toastNotice(`${response.data.message}`);
			load_places();
		}, (error) => {
			toastError(`${error.response.data.message}`);
		});
	});

	getElement(`#place__update`)
		.addEventListener('click', () => {
			cleanError();
			var _route = `/admin/place/${getElement(`input[name=place_id]`).value}`;
			var formData = new FormData($('#place_form')[0]);

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
					$(`#new-place`).modal('hide');
					load_places();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					unlockWindow();
					$.each(jqXHR.responseJSON, function(key, value) {
						if (key == "name") {
							$.each(value, function(errores, eror) {
								$('#place-name-error').append("<li class='error-block'>" + eror + "</li>");
							});
						};
					});
				}
			});
		});

	getElement(`#place__add`)
		.addEventListener('click', () => {
			clean_modal();
			$(`#place__save`).show();
			addSummernoteEditor($('#address_content'));
			addSummernoteEditor($('#cel_content'));
			addSummernoteEditor($(`#schedule_content`));

		});

	function clean_modal() {
		$(`#place_form`)[0].reset();
		$(`#place__save`).hide();
		$(`#place__update`).hide();
		$(`#place_method`).remove();
		destroySummernote($('#address_content'));
		destroySummernote($('#cel_content'));
		destroySummernote($('#schedule_content'));

	}

	getElement(`#place__save`)
		.addEventListener('click', () => {
			cleanError();

			var ruta = '/admin/place';
			var formData = new FormData($('#place_form')[0]);

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
					$(`#new-place`).modal('hide');
					load_places();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					unlockWindow();
					$.each(jqXHR.responseJSON, function(key, value) {
						if (key == "name") {
							$.each(value, function(errores, eror) {
								$('#place-name-error').append("<li class='error-block'>" + eror + "</li>");
							});
						};
					});
				}
			});
		});
})();