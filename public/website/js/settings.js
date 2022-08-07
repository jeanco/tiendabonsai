(() => {

	const tBodyAttributes = document.querySelector(`#setting_attributes-tbody`);
	const selectAttributeCategory = document.querySelector('#attribute-category');

	function chargeTableCategories() {
		//Categories

		axios.get(`/admin/category-attributes`)
			.then((response) => {
				let _content = ``,
					_stringPublished = ``;

				getElement(`#setting_categories-tbody`).innerHTML = ``;

				response.data.forEach((value) => {

					_stringPublished = `<span><b>No Publicado</b></span>`;

					if (value.published == 1) {
						_stringPublished = `<span style="color: #009400;"><b>Publicado</b></span>`;
					}

					_content += `
						<tr>
							<td>${value.name}</td>
								<td>${_stringPublished}</td>
								<td>`+
								((getElement(`#category_edit`).value) ? `<button data-index="${value.id}" class="btn btn-success btn-sm category-attribute__edit" title="Editar" data-target="#new-category" data-toggle="modal">
									<i class="glyphicon glyphicon-pencil notPointerEvent"></i>
								</button>` : ``)+
								((getElement(`#category_delete`).value) ? `<button data-index="${value.id}" class="btn btn-danger btn-sm category-attribute__delete" title="Eliminar">
									<i class="glyphicon glyphicon-trash notPointerEvent"></i>
								</button>` : ``)+
							`</td>
						</tr>`;

				});

				getElement(`#setting_categories-tbody`).innerHTML = _content;
			});
	}

	chargeTableCategories();

	$(document).on('click', '.category-attribute__edit', function() {
		clean_modal();
		cleanError();
		let _id = $(this)[0].dataset.index;

		$(`#new-category__save`).hide();

        addInputPut($('#attribute-category-form'), 'attribute-category-method')

		axios.get(`/admin/category-attributes/${_id}`)
			.then((response) => {
				getElement(`#new-category_id`).value = response.data.id;
				getElement(`#new-category_name`).value = response.data.name;
				getElement(`#new-category_published`).value = response.data.published;

				if (response.data.icon) {
					$('#attribute_preview-image').append('<img src="'+response.data.icon+'" style="display: block;">');
					$(`#category-attribute_preview-text`).remove();
				}



			});
	});

	getElement(`#setting-category__add`)
		.addEventListener('click', () => {
			clean_modal();
			cleanError();
			$(`#new-category__update`).hide();
		});

	getElement(`#new-category__save`)
		.addEventListener('click', () => {
			cleanError();

			var formData = new FormData($('#attribute-category-form')[0]);

			lockWindow();
			$.ajaxSetup({
				headers: {
					'csrftoken': $('input[name=_token]').val()
				}
			});
			$.ajax({
			   url : `/admin/category-attributes`,
			   type: `POST`,
			   data: formData,
			   contentType: false,
			   processData: false,
			   success: function(e){
				    unlockWindow();
					chargeTableCategories();
					toastNotice(e.message);
					$(`#new-category`).modal('hide');
				},
				error:function(jqXHR, textStatus, errorThrown)
				{
					unlockWindow();
					$.each(jqXHR.responseJSON, function(key, value) {
						if (key == "name") {
							$.each(value, function(errores, eror) {
								$('#new-category-name-error').append("<li class='error-block'>" + eror + "</li>");
							});
						};
					});
				}
			 });


			// axios.post(`/admin/category-attributes`, {
			// 		'name': getElement(`#new-category_name`).value,
			// 		'published': getElement(`#new-category_published`).value,
			// 	})
			// 	.then((response) => {
			// 		chargeTableCategories();
			// 		toastNotice(response.data.message);
			// 		$(`#new-category`).modal('hide');
			// 	})
			// 	.catch((error) => {
			// 		$.each(error.response.data, function(key, value) {
			// 			if (key == "name") {
			// 				$.each(value, function(errores, eror) {
			// 					$('#new-category-name-error').append("<li class='error-block'>" + eror + "</li>");
			// 				});
			// 			};
			// 		});

			// 	});


		});

	getElement(`#new-category__update`)
		.addEventListener('click', () => {
			cleanError();

			var formData = new FormData($('#attribute-category-form')[0]);

			lockWindow();
			$.ajaxSetup({
				headers: {
					'csrftoken': $('input[name=_token]').val()
				}
			});
			$.ajax({
			   url : `/admin/category-attributes/${getElement(`#new-category_id`).value}`,
			   type: 'POST',
			   data: formData,
			   contentType: false,
			   processData: false,
			   success: function(e){
				    unlockWindow();
					chargeTableCategories();
					toastNotice(e.message);
					$(`#new-category`).modal('hide');
			 },
			 error:function(jqXHR, textStatus, errorThrown)
			 {
				unlockWindow();
				$.each(jqXHR.responseJSON, function(key, value) {
					if (key == "name") {
						$.each(value, function(errores, eror) {
							$('#new-category-name-error').append("<li class='error-block'>" + eror + "</li>");
						});
					};
				});
			 }
			 });

			// axios.put(`/admin/category-attributes/${getElement(`#new-category_id`).value}`, {
			// 		'name': getElement(`#new-category_name`).value,
			// 		'published': getElement(`#new-category_published`).value,
			// 		'id': getElement(`#new-category_id`).value,
			// 	})
			// 	.then((response) => {
			// 		chargeTableCategories();
			// 		toastNotice(response.data.message);
			// 		$(`#new-category`).modal('hide');
			// 	})
			// 	.catch((error) => {
			// 		$.each(error.response.data, function(key, value) {
			// 			if (key == "name") {
			// 				$.each(value, function(errores, eror) {
			// 					$('#new-category-name-error').append("<li class='error-block'>" + eror + "</li>");
			// 				});
			// 			};
			// 		});
			// 	});

		});

	function clean_modal() {
		$(`#new-category__save`).show();
		$(`#new-category__update`).show();
		$(`#new-category_published`).val(1);
		$(`#new-category_name`).val('');
		$(`#new-category_id`).val('');

		$(`#attribute-category-method`).remove();
		let _previewText = '';

		_previewText = '<label id="category-attribute_preview-text">'+
								'<i class="glyphicon glyphicon-picture"></i>'+
								'<span class="u-ml3">Añadir Ícono</span>'+
								'</label>';

		$('#category-attribute_preview-text').remove();
		$(`#attribute_preview-image`).html("");

		$('#attribute_container-image').prepend(_previewText);

	}

	chargeTableAttributes("");

	function chargeTableAttributes(category) {
		let _publishedTd = ``;
		axios.get(`/admin/attributes?category=${category}`)
			.then((response) => {
				let _content = ``;

				cleanAllChildren(tBodyAttributes)
				//getElement(`#setting_attributes-tbody`).innerHTML = ``;

				response.data.forEach((value) => {
					_publishedTd = `<span style="color: #009400;"><b>Publicado</b></span>`;

					if (value.published == 0) {
						_publishedTd = `<span><b>No publicado</b></span>`;
					}

					const tr = document.createElement('tr');

					tr.innerHTML = `
								<td>${value.name}</td>
								<td>${value.category_attribute.name}</td>
								<td>${_publishedTd}</td>
								<td>`+
								((getElement(`#attribute_edit`).value) ? `<button data-index=${value.id} class="btn btn-success btn-sm attribute__edit" title="Editar Tienda" data-target="#new-attribute" data-toggle="modal">
								<i class="glyphicon glyphicon-pencil notPointerEvent"></i>
								</button>` : ``)+
								((getElement(`#attribute_delete`).value) ? `<button data-index=${value.id} class="btn btn-danger btn-sm attribute__delete" title="Eliminar Tienda">
								<i class="glyphicon glyphicon-trash notPointerEvent"></i>
								</button>` : ``)+
								`</td>`;

					// _content += `
					// 		<tr>
							
					// 		</tr>`;
					tBodyAttributes.appendChild(tr);
				});
				//getElement(`#setting_attributes-tbody`).innerHTML = _content;
			});

	}

	selectAttributeCategory
		.addEventListener('change', (e) => {
			chargeTableAttributes(e.target.value);
		});

	$(document).on('click', '.attribute__edit', function() {
		let _id = $(this)[0].dataset.index;

		clean_modal_attribute();
		$(`#attribute__save`).hide();
		addInputPut($('#attribute_form'), 'attribute_method');

		axios.get(`/admin/attributes/${_id}`)
			.then((response) => {
				// console.log(response.data);
				getElement(`#attribute_name`).value = response.data.name;
				getElement(`#attribute_id`).value = response.data.id;
				getElement(`#attribute_category`).value = response.data.category_attribute_id;
				getElement(`#attribute_description`).value = response.data.description;
				getElement(`#attribute_published`).value = response.data.published;

				$(`.color-area`).hide();

				if (response.data.category_attribute_id == 2) {
					$(`.color-area`).show();
				}

				if (response.data.icon) {
					$('#attribute_preview-image_').append('<img src="' + response.data.icon + '" style="display: block;">');
					$('#attribute_preview-text_').hide();
				}
				return response.data.category_attribute_id;
			})
			.then((category_id) => {
				axios.get(`category-attributes`)
					.then((response) => {
						_fillSelectWithOutFirstOption(getElement(`#attribute_category`), response.data, category_id);
					});
			});
	});

	$(`#attribute_category`).on('change', function(e){
		$(`.color-area`).hide();
		if (e.target.value == 2) {
			$(`.color-area`).show();
		}
	})

	$(document).on('click', '.attribute__delete', function() {
		let _id = $(this)[0].dataset.index;

		deleteObjectAxios(`/admin/attributes/${_id}`, {}, `¿Desea eliminar este atributo?`, (response) => {
			toastNotice(`${response.data.message}`);
			chargeTableAttributes(selectAttributeCategory.value);
		}, (error) => {
			toastError(`${error.response.data.message}`);
		});
	});

	getElement(`#attribute__update`)
		.addEventListener('click', () => {
			cleanError();
			var _route = `/admin/attributes/${getElement(`#attribute_id`).value}`;
			var formData = new FormData($('#attribute_form')[0]);
			
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
					$(`#new-attribute`).modal('hide');
					chargeTableAttributes(selectAttributeCategory.value);

				},
				error: function(jqXHR, textStatus, errorThrown) {
					unlockWindow();
					$.each(jqXHR.responseJSON, function(key, value) {
						if (key == "name") {
							$.each(value, function(errores, eror) {
								$('#attribute-name-error').append("<li class='error-block'>" + eror + "</li>");
							});
						};
					});
				}
			});
			// axios.put(`/admin/attributes/${getElement(`#attribute_id`).value}`, {
			// 		'id': getElement(`#attribute_id`).value,
			// 		'name': getElement(`#attribute_name`).value,
			// 		'category_attribute_id': getElement(`#attribute_category`).value,
			// 		'published': getElement(`#attribute_published`).value,
			// 	})
			// 	.then((response) => {
			// 		toastNotice(`${response.message}`);
			// 		$(`#new-attribute`).modal('hide');
			// 		chargeTableAttributes();
			// 	})
			// 	.catch((error) => {
			// 		console.log(`Error`);
			// 		$.each(error.response.data, function(key, value) {
			// 			if (key == "name") {
			// 				$.each(value, function(errores, eror) {
			// 					$('#attribute-name-error').append("<li class='error-block'>" + eror + "</li>");
			// 				});
			// 			};
			// 		});
			// 	});
		});

	getElement(`#attribute__add`)
		.addEventListener('click', () => {
			clean_modal_attribute();
			$(`#attribute__update`).hide();

			axios.get(`category-attributes`)
				.then((response) => {
					_fillSelectWithOutFirstOption(getElement(`#attribute_category`), response.data, null);
				});

		});

	function clean_modal_attribute() {
		getElement(`#attribute_id`).value = ``;
		getElement(`#attribute_name`).value = ``;
		getElement(`#attribute_description`).value = ``;
		getElement(`#attribute_published`).value = 1;
		getElement(`#attribute_image_`).value = "";

		$(`#attribute__save`).show();
		$(`#attribute__update`).show();
		$(`#attribute_method`).remove();

		var _previewText = "";
		_previewText = `<label id="attribute_preview-text_">
											<i class="glyphicon glyphicon-picture">
											</i>
											<span class="u-ml3">Añadir Ícono</span>
										</label>`;

		cleanAllChildren(document.querySelector('#attribute_preview-image_'));
		$('#attribute_preview-text_').remove();
		$('#attribute_container-image_').prepend(_previewText);
	}

	getElement(`#attribute__save`)
		.addEventListener('click', () => {
			cleanError();

			var ruta = 'attributes';
			var formData = new FormData($('#attribute_form')[0]);

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
					$(`#new-attribute`).modal('hide');
					chargeTableAttributes(selectAttributeCategory.value);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					unlockWindow();
					$.each(jqXHR.responseJSON, function(key, value) {
						if (key == "name") {
							$.each(value, function(errores, eror) {
								$('#attribute-name-error').append("<li class='error-block'>" + eror + "</li>");
							});
						};
					});
				}
			});
		});

	chargeTableCompanyCategories();

	function chargeTableCompanyCategories() {
		let _publishedTd = ``;
		axios.get(`/admin/company-categories`)
			.then((response) => {
				let _content = ``;

				getElement(`#setting_company-categories-tbody`).innerHTML = ``;

				response.data.forEach((value) => {
					_publishedTd = `<span style="color: #009400;"><b>Publicado</b></span>`;

					if (value.published == 0) {
						_publishedTd = `<span><b>No publicado</b></span>`;
					}

					_content += `
							<tr>
							<td>${value.name}</td>
							<td>${value.description}</td>
							<td>${_publishedTd}</td>
							<td>`+
							((getElement(`#company-category_edit`).value) ? `<button data-index=${value.id} class="btn btn-success btn-sm category-company__edit" title="Editar categoría" data-target="#new-company-category" data-toggle="modal">
								<i class="glyphicon glyphicon-pencil notPointerEvent"></i>
							</button>` : ``)+
							((getElement(`#company-category_delete`).value) ? `<button data-index=${value.id} class="btn btn-danger btn-sm category-company__delete" title="Eliminar categoría">
								<i class="glyphicon glyphicon-trash notPointerEvent"></i>
							</button>` : ``)+
							`</td>
							</tr>`;
				});

				getElement(`#setting_company-categories-tbody`).innerHTML = _content;
			});
	}

	function clean_modal_company_category() {

		getElement(`#company-category_name`).value = ``;
		getElement(`#company-category_id`).value = ``;
		getElement(`#company-category_description`).value = ``;
		getElement(`#company-category_published`).value = 1;
		$(`#company-category__save`).show();
		$(`#company-category__update`).show();
	}

	getElement(`#company-category__add`)
		.addEventListener('click', () => {
			clean_modal_company_category();
			$(`#company-category__update`).hide();
		});

	getElement(`#company-category__save`)
		.addEventListener('click', () => {
			cleanError();
			axios.post(`/admin/company-categories`, {
					'name': getElement(`#company-category_name`).value,
					'description': getElement(`#company-category_description`).value,
					'published': getElement(`#company-category_published`).value,
				})
				.then((response) => {
					toastNotice(`${response.data.message}`);
					$(`#new-company-category`).modal('hide');
					chargeTableCompanyCategories();
				}).catch((error) => {
					$.each(error.response.data, function(key, value) {
						if (key == "name") {
							$.each(value, function(errores, eror) {
								$('#company-category-name-error').append("<li class='error-block'>" + eror + "</li>");
							});
						};
					});
				});
		});

	getElement(`#company-category__update`)
		.addEventListener('click', () => {
			cleanError();
			let _id = getElement(`#company-category_id`).value;

			axios.put(`/admin/company-categories/${_id}`, {
					'id': getElement(`#company-category_id`).value,
					'name': getElement(`#company-category_name`).value,
					'description': getElement(`#company-category_description`).value,
					'published': getElement(`#company-category_published`).value,
				})
				.then((response) => {
					toastNotice(`${response.data.message}`);
					$(`#new-company-category`).modal('hide');
					chargeTableCompanyCategories();
				}).catch((error) => {
					$.each(error.response.data, function(key, value) {
						if (key == "name") {
							$.each(value, function(errores, eror) {
								$('#company-category-name-error').append("<li class='error-block'>" + eror + "</li>");
							});
						};
					});
				});
		});

	$(document).on('click', '.category-company__edit', function() {
		clean_modal_company_category();
		cleanError();

		let _id = $(this)[0].dataset.index;
		$(`#company-category__save`).hide();

		axios.get(`/admin/company-categories/${_id}`)
			.then((response) => {
				getElement(`#company-category_id`).value = response.data.id;
				getElement(`#company-category_name`).value = response.data.name;
				getElement(`#company-category_description`).value = response.data.description;
				getElement(`#company-category_published`).value = response.data.published;
			});

	});

	$(document).on('click', '.category-company__delete', function() {
		let _id = $(this)[0].dataset.index;

		deleteObjectAxios(`/admin/company-categories/${_id}`, {}, `¿Desea eliminar esta categoría?`, (response) => {
			toastNotice(`${response.data.message}`);
			chargeTableCompanyCategories();
		}, (error) => {
			toastError(`${error.response.data.message}`);
		});
	});

	//setting-place-tbody
	$(document).on('click', '.category-attribute__delete', function() {
		let _id = $(this)[0].dataset.index;

		deleteObjectAxios(`/admin/category-attributes/${_id}`, {}, `¿Desea eliminar esta categoría?`, (response) => {
			toastNotice(`${response.data.message}`);
			chargeTableCategories();
		}, (error) => {
			toastError(`${error.response.data.message}`);
		});
	});


})();