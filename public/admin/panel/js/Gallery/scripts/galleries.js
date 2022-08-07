	(() => {
		axios.get(`/admin/galleries`)
			.then(({
				data
			}) => {
				loadGridGalleries(data);
			});

		getElement(`#gallery__add`)
			.addEventListener('click', () => {
				clean_modal();
				$('#multi_fotos').hide();
				$(`#gallery__update`).hide();
				axios.get(`/admin/gallery-categories/index`)
					.then((response) => {
						fillAnySelect($(`#gallery_category`), response.data, null);
					});
			});

		getElement(`#gallery__save`)
			.addEventListener('click', () => {
				let _route = "galleries",
					_formData = new FormData($("#gallery_form")[0]);

				cleanError();

				ajaxFormData(
					_route,
					_formData,
					function(result) {
						$("#new-gallery").modal("hide");
						let _r = "/admin/galleries";

						axios.get(_r)
							.then(({
								data
							}) => {
								loadGridGalleries(data);
							});
					},
					function(jqXHR, textStatus, errorThrown) {
						// $('#galleryerror').append(msgError);

						$.each(jqXHR.responseJSON, function(key, value) {
							if (key == "title") {
								$.each(value, function(errores, eror) {
									$('#gallery-title-error').append("<li class='error-block'>" + eror + "</li>");
								});
							} else if (key == "link") {
								$.each(value, function(errores, eror) {
									$('#gallery-image-error').append("<li class='error-block'>" + eror + "</li>");
								});
							};
						});
					}
				);
			});

		getElement(`#gallery__update`)
			.addEventListener('click', () => {
				let _route = `galleries/${getElement(`#gallery_id`).value}`,
					_formData = new FormData($("#gallery_form")[0]);
				cleanError();

				ajaxFormData(
					_route,
					_formData,
					function(result) {
						$("#new-gallery").modal("hide");

						let _route = "/admin/galleries";

						axios.get(_route)
							.then(({
								data
							}) => {
								loadGridGalleries(data);
							});
					},
					function(jqXHR, textStatus, errorThrown) {
						// $('#galleryerror').append(msgError);

						$.each(jqXHR.responseJSON, function(key, value) {
							if (key == "title") {
								$.each(value, function(errores, eror) {
									$('#gallery-title-error').append("<li class='error-block'>" + eror + "</li>");
								});
							} else if (key == "link") {
								$.each(value, function(errores, eror) {
									$('#gallery-link-error').append("<li class='error-block'>" + eror + "</li>");
								});
							};
						});

					}
				);
			});

		$(document).on('click', '.gallery_edit', function() {
			clean_modal();
			cleanError();
			$('#multi_fotos').show();
			/*let _id = $(this).val();
			let _route = `/admin/galleries/${_id}`;*/

			let _galleryId = $(this).val();
			let _route = `/admin/galleries/${_galleryId}`;

			axios.get(_route)
				.then(({
					data
				}) => {
					clean_modal();
					addInputPut($('#gallery_form'), "gallery_method");
					$(`#gallery__save`).hide();

					getElement(`#gallery_id`).value = data.id;
					getElement(`#gallery_title`).value = data.title;
					getElement(`#gallery_description`).value = data.description;
					// getElement(`#gall	erycategory`).value = data.gallerycategory_id;
					getElement(`#gallery_link`).value = data.link;

					if (data.image_thumb != null) {
						getElement(`#gallery_preview-image`).innerHTML = `<img src="${data.image_thumb}" style="display: block;">`;
						$(`#gallery_preview-text`).remove();

					}

					return data.category_id;

				})
				.then((gallery_category_id) => {
					axios.get(`/admin/gallery-categories/index`)
						.then((response) => {
							fillAnySelect($(`#gallery_category`), response.data, null);
							$(`#gallery_category`).val(gallery_category_id);
						});

				});

					//Charge gallery images
				$('#gallery_swiper-container .swiper-wrapper').empty();


				setTimeout(function () {
					startCarouselGallery();

					$.get('contents/'+_galleryId+'/7/1', function(r){
						console.log(r.images.length);
						if (r.images.length) {
							addImageToSliderGalleryProject(swiperGallery,$('#gallery_swiper-container'),r.images);
						}
					});
				}, 500);
		});


$(document).on('click','.btn_image-slider-gallery__delete_project',function(event){
	event.preventDefault();
	deleteSlideGallery($(this).parent().data('index'),$(this).data('image_id'),swiperGallery,$('#gallery_swiper-container'));
});



 /* Company gallery */
function startCarouselGallery()
{
		swiperGallery = new Swiper('#gallery_swiper-container', {
			loop: false,
			pagination: '#gallery_swiper-pagination',
			nextButton: '#gallery_swiper-button-next',
			prevButton: '#gallery_swiper-button-prev',
			slidesPerView: 3,
			//centeredSlides: true,
			//paginationClickable: true,
			spaceBetween: 30,
		});
}



		function clean_modal() {
			getElement(`#gallery_title`).value = ``;
			getElement(`#gallery_description`).value = ``;
			getElement(`#gallery_category`).innerHTML = ``;
			getElement(`#gallery_link`).value = ``;
			getElement(`#gallery_preview-image`).innerHTML = ``;

			$(`#gallery_preview-text-image`).remove();
			$(`#gallery_method`).remove();

			let _previewTextImage = `<label style="text-align: center;" id="gallery_preview-text-image">
						             	<i class="glyphicon glyphicon-picture"></i>
						                <span class="u-ml3">Añadir Imágen</span>
						             </label>`;

			$('#gallery_image-container').prepend(_previewTextImage);

			// getElement('#gallery_preview-text').style.display = "block";
			$(`#gallery_preview-image`).empty();
			$(`#gallery__save`).show();
			$(`#gallery__update`).show();
		}

		function loadGridGalleries(statements) {
			let _content = "";
			let _published = "";

			statements.forEach(statement => {
				_published = getSimbolPublished(statement.published);

				_content += `
        <div class="col-lg-3 col-md-4 col-sm-6 phs">
          <li class="item-account">
            <figure class="item-image"> 
              <img src="${statement.image_thumb}" alt="" /> 
            </figure> 
            <span style="display: block;text-align: center;">${statement.title}&nbsp;</span> 
            <div class="item__controls"> 
              <button type="button"
                value="${statement.id}"
                data-testimony_name="${statement.title}"
                data-published="${statement.published}"
                class="btn btn-warning gallery_published" 
                title="${_published.name}"> 
                
                <i class="${_published.simbol}"></i> 
              </button> 
              
              <button type="button"
                value="${statement.id}"	
                class="btn btn-success gallery_edit"
                data-target="#new-gallery"
                data-toggle="modal"
                title="Editar">

                <i class="glyphicon glyphicon-pencil"></i>
              </button>

              <button type="button" 
                value="${statement.id}"	
                class="btn btn-danger gallery_delete"
                title="Eliminar">
                
                <i class="glyphicon glyphicon-trash"></i>
              </button> 
            </div>
          </li>
        </div>`;
			});

			getElement(`#galleries_grid`).innerHTML = "";
			getElement(`#galleries_grid`).innerHTML = _content;
		}

		$(document).on('click', '.gallery_published', function() {

			let _id = $(this).val();
			let _published = $(this)[0].dataset.published;

			let _route = `/admin/galleries/${_id}/published`;
			let _title = (_published == 1) ? "¿Está conforme en no publicar esta gallería?" : "¿Desea publicar esta gallería?";

			updatePublishedAxios(_route, {}, _title, function(response) {
				toastNotice(response.data.message);

				let _r = "/admin/galleries";

				axios.get(_r).then(({
					data
				}) => {
					loadGridGalleries(data);
				});
			}, function(error) {
				toastError();
			});
		});

		$(document).on('click', '.gallery_delete', function() {

			let _id = $(this).val();

			let _route = `/admin/galleries/${_id}`;

			deleteObjectAxios(_route, {}, "¿Desea eliminar esta galería?", (response) => {
				toastNotice("Se ha borrado la galería.");

				let _r = "/admin/galleries";

				axios.get(_r).then(({
					data
				}) => {
					loadGridGalleries(data);
				});
			}, (error) => {
				toastError();
			})
		})

		// getElement(`#gallery-category__add`)
		// 	.addEventListener('click', () => {
		// 		$("#gallery-category-modal").modal("show");
		// 		getElement(`#gallery-category_name`).value = ``;
		// 		getElement(`#gallery-category_description`).value = ``;
		// 	});

		// getElement(`#gallery-category__save`)
		// 	.addEventListener('click', () => {
		// 		cleanError();
		// 		axios.post('/admin/gallery-categories', {
		// 				'name': getElement(`#gallery-category_name`).value,
		// 				'description': getElement(`#gallery-category_description`).value,
		// 			})
		// 			.then((response) => {
		// 				toastNotice(`${response.data.message}`);
		// 				$("#gallery-category-modal").modal("hide");
		// 			})
		// 			.catch((error) => {
		// 				$.each(error.response.data, function(key, value) {
		// 					if (key == "name") {
		// 						$.each(value, function(errores, eror) {
		// 							$('#gallery-category-name-error').append("<li class='error-block'>" + eror + "</li>");
		// 						});
		// 					}
		// 				});
		// 			});
		// 	});
	})();