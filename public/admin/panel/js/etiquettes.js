(() => {

	function load_etiquettes() {
		//Categories

		axios.get(`/admin/etiquettes`)
			.then((response) => {
				let _content = ``;

				getElement(`#etiquettes_tbody`).innerHTML = ``;

				response.data.forEach((value) => {
					_content += `
							<tr>
								<td>${value.name}</td>
								<td>${value.published ? 'Publicado' : 'No publicado'}</td>
								<td>
									<form action="/admin/configurar-etiquetas" method="POST" target="_blank">
										<input type="hidden" name="etiquette_id" value="${value.id}">
										<button type="submit" class="btn btn-success btn-sm" title="Configurar">
										<i class="glyphicon glyphicon-cog notPointerEvent"></i>
										</button>
									</form>
									<button data-index="${value.id}" class="btn btn-success btn-sm etiquette__edit" title="Editar" data-target="#new-etiquette" data-toggle="modal">
										<i class="glyphicon glyphicon-pencil notPointerEvent"></i>
									</button>
									<button data-index="${value.id}" class="btn btn-danger btn-sm etiquette__delete" title="Eliminar">
										<i class="glyphicon glyphicon-trash notPointerEvent"></i>
									</button>
								</td>
							</tr>`;

				});

				getElement(`#etiquettes_tbody`).innerHTML = _content;
			});
	}

	load_etiquettes();

	$(document).on('click', '.etiquette__edit', function() {
		cleanError();
		clean_modal();
		addInputHiddenPut($(`#etiquette_form`), `etiquette_method`);
		$(`#etiquette__update`).show();

		let _id = $(this)[0].dataset.index;
		//var URLactual = window.location;
		var UrlDomain = document.domain;
		var URLProtocolo = window.location.protocol;

		axios.get(`/admin/etiquette/${_id}`)
			.then((response) => {
				getElement(`#etiquette_form input[name='id']`).value = response.data.id;
				getElement(`#etiquette_form input[name='name']`).value = response.data.name;
				getElement(`#etiquette_form input[name='slug_url']`).value = URLProtocolo+'//'+UrlDomain+'/cm/'+response.data.slug;
				getElement(`#etiquette_form select[name='published']`).value = response.data.published;
				document.querySelector("input[name='slug_url']").disabled = false;
				//drawing costs;
				reDrawCosts(_id);
			});
	});

	$(document).on('click', '.etiquette__delete', function() {
		let _id = $(this)[0].dataset.index;

		deleteObjectAxios(`/admin/etiquette/${_id}`, {}, `¿Desea eliminar este lugar?`, (response) => {
			toastNotice(`${response.data.message}`);
			load_etiquettes();
		}, (error) => {
			toastError(`${error.response.data.message}`);
		});
	});

	getElement(`#etiquette__update`)
		.addEventListener('click', () => {
			cleanError();
			var _route = `/admin/etiquette/${getElement(`#etiquette_form input[name=id]`).value}`;
			var formData = new FormData($('#etiquette_form')[0]);

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
					$(`#new-etiquette`).modal('hide');
					load_etiquettes();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					unlockWindow();
					$.each(jqXHR.responseJSON, function(key, value) {
						$.each(value, function(errores, eror) {
							$(`#etiquette-${key}-error`).append("<li class='error-block'>" + eror + "</li>");
						});
				
					});
				}
			});
		});

	getElement(`#etiquette__add`)
		.addEventListener('click', () => {
			clean_modal();
			document.querySelector("input[name='slug_url']").disabled = true;
			$(`#etiquette__save`).show();
			$(`#cost__add`).parent().hide();

		});

	function clean_modal() {
		$(`#etiquette_form`)[0].reset();
		$(`#etiquette__save`).hide();
		$(`#etiquette__update`).hide();
		$(`#etiquette_method`).remove();
	}

	getElement(`#etiquette__save`)
		.addEventListener('click', () => {
			cleanError();

			var ruta = '/admin/etiquette';
			var formData = new FormData($('#etiquette_form')[0]);

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
					getElement(`#etiquette_after-save-id`).value = e;
					$(`#etiquette_after-save-form`).submit();
					toastNotice(`${e.message}`);
					$(`#new-etiquette`).modal('hide');
					load_etiquettes();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					unlockWindow();
					$.each(jqXHR.responseJSON, function(key, value) {
						$.each(value, function(errores, eror) {
							$(`#etiquette-${key}-error`).append("<li class='error-block'>" + eror + "</li>");
						});
				
					});
				}
			});
		});
})();