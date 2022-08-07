  const inputTitle = getElement('#post_title'),
    inputHiddenId = getElement('#post_id'),
    textContent = getElement('#post_content'),  
    inputDate = getElement('#date'),
    selectTag = getElement('#post_tag'),
    btnAdd = getElement('#post__add'),
    btnSave = getElement('#post__save'),
    btnUpdate = getElement('#post__update'),
    btnCancel = getElement('#post__cancel'),
    divGrid = getElement('#posts_grid'),
    divTitleError = getElement('#post-title-error');

  axios.get(`posts`)
    .then((response) => {
      let _posts = response.data;
      loadGridPosts(_posts);
    });

  $(`#post__add`).on('click', function(){
    cleanPostModal();
    none(btnUpdate);

    axios.get(`tags`)
      .then((response) => {
        let _tags = response.data;
        let _content = ``;

        _tags.forEach(tag => {
          _content += `<option value="${tag.id}">${tag.name}</option>`;
        });

        selectTag.innerHTML = _content;
      });

    addSummernoteEditor($('#post_content'));
    $(`#date
      `).datepicker({
    format: 'dd/mm/yyyy',
    language: 'es-ES',
});
  });

  // btnAdd.addEventListener('click', () => {

  // });

  btnSave.addEventListener('click', () => {
    let _formData = new FormData($('#post_form')[0]);

    lockWindow();
    axios.post(`posts`, _formData)
      .then((response) => {
        unlockWindow();
        toastNotice(`Se ha creado la cuenta`);
        $(`#post-modal`).modal('hide');

        axios.get(`posts`)
          .then((response) => {
            loadGridPosts(response.data);
          });
      })
      .catch((error) => {
        unlockWindow();
        toastError();
        let _errors = error.response.data;
        let _content;

        for (const key in _errors) {
          if (key == `title`) {
            _content = ``;
            _errors[key].forEach(error => {
              _content += `<li class='error-block'>${error}</li>`;
            });
            divTitleError.innerHTML = _content;
            //dev
          }
          // lg(key);
          // lg(_errors[key]);
        }
      });
  });

  $(document).on('click', '.post__edit', function(e) {
    let _id = e.target.value;

    axios.get(`posts/${_id}`)
      .then((response) => {
        cleanPostModal();
        let _post = response.data;
        inputDate.value=_post.date;
        inputTitle.value = _post.title;
        inputHiddenId.value = _post.id;
        textContent.value = _post.content;


        addInputHiddenPut($(`#post_form`), `post_method`);
        addSummernoteEditor($(`#post_content`));
        none(btnSave);

        $(`#date`).datepicker({
            format: 'dd/mm/yyyy',
            language: 'es-ES',
        });

        return _post.tag_id;
      })
      .then((_tag_id) => {
        axios.get(`tags`)
          .then((response) => {
            let _tags = response.data;
            let _content;
            _tags.forEach(tag => {
              _content += `<option value="${tag.id}">${tag.name}</option>`;
            });

            selectTag.innerHTML = _content;
            selectTag.value = _tag_id;
          });
      });

  });

  btnUpdate.addEventListener('click', () => {
    let _formData = new FormData($('#post_form')[0]);

    axios.post(`posts/${inputHiddenId.value}`, _formData)
      .then((response) => {
        toastNotice(`Se ha actualizado la cuenta`);
        $(`#post-modal`).modal('hide');

        axios.get(`posts`)
          .then((response) => {
            loadGridPosts(response.data);
          });
      })
      .catch((error) => {
        toastError();

        // $(`#post-error`).append(`Corrija los siguientes campos por favor!`);
        // $.each(error.response.data, function (key, value) {
        //   if (key == "title") {
        //     $.each(value, function (errores, eror) {
        //       $(`#post-title-error`).append("<li class='error-block'>" + eror + "</li>");
        //     });
        //   } else if (key == "tag_id") {
        //     $.each(value, function (errores, eror) {
        //       $(`#post-content-error`).append("<li class='error-block'>" + eror + "</li>");
        //     });
        //   };
        // });
      });
  });

  $(document).on('click', '.post__published', function(e) {
    let _id = e.target.value;
    let _title = ($(this).data('published') == 1) ? `¿Dejar de publicar?` : `¿Publicar?`;

    updatePublishedWithAxios(`posts/${_id}/published`, {}, _title, () => {
      toastNotice(`Se ha cambiado el estado`);
      axios.get(`posts`)
        .then((response) => {
          loadGridPosts(response.data);
        });
    }, () => {
      toastError();
    });
  });

  $(document).on('click', '.post__delete', function(e) {
    let _id = e.target.value;
    deleteObjectAxios(`posts/${_id}`, {}, `¿Desea eliminarlo?`, () => {
      toastNotice(`La noticia fue eliminada`);
      axios.get(`posts`)
        .then((response) => {
          loadGridPosts(response.data);
        });
    }, () => {
      toastError();
    });
  });

  $(document).on('click', '.post__edit-images', function(e) {
    let _id = e.target.value;
    cleanPostImagesModal();
    document.querySelector('#post-images_post-id').value = _id;
    document.querySelector('#post-images-modal input[name="model_type"]').value = 3;

    setTimeout(function() {
      axios.get(`posts/${_id}/images`)
        .then((response) => {
          let _images = response.data;
          startCarouselPost();
          addImageToSliderPost(swiperPost, $('#post-gallery_swiper-container'), _images);
        });
    }, 1000);

  });

  btnCancel.addEventListener('click', () => {
    $(`#post-modal`).modal('hide');
  });

  $('#post-images__cancel').on('click', function() {
    $('#post-images-modal').modal('hide');
    axios.get(`posts`)
      .then((response) => {
        loadGridPosts(response.data);
      });
  });

  function loadGridPosts(posts) {
    let _published;
    let _content = ``;

    posts.forEach(post => {
      _published = simbolPublished(post.published);
      _content +=
        `<div class="col-lg-3 col-md-4 col-sm-6 u-px2">
          <li class="item-account">
            <figure class="item-image">
              <img src="${(post.random_image) ? post.random_image.resource_thumb : ''}" alt="" />
            </figure>
            <span style="display: block; text-align: center;">${post.title}</span>
            <div class="item__controls">`+
              ((getElement(`#blog_publish`).value) ? `<button type="button" value="${post.id}" data-post_title="${post.title}" data-published="${post.published}" class="btn btn-warning post__published" title="${_published.name}">
              <i class="${_published.simbol}"></i>
            </button>` : ``)+
              ((getElement(`#blog_edit`).value) ? `<button type="button" value="${post.id}" class="btn btn-success post__edit" data-target="#post-modal" data-toggle="modal" title="Editar">
              <i class="glyphicon glyphicon-pencil notPointerEvent"></i>
            </button>` : ``)+
              ((getElement(`#blog_add-images`).value) ? `<button type="button" value="${post.id}" class="btn post__edit-images" data-target="#post-images-modal" data-toggle="modal" title="Editar">
                <i class="glyphicon glyphicon-picture notPointerEvent"></i>
              </button>` : ``)+
              ((getElement(`#blog_delete`).value) ? `<button type="button" value="${post.id}"  class="btn btn-danger post__delete" title="Eliminar">
                <i class="glyphicon glyphicon-trash notPointerEvent"></i>
              </button>` : ``)+
            `</div>
          </li>
        </div>`;
    });

    divGrid.innerHTML = _content;
  }

  function cleanPostModal() {



    $('#post_method').remove();
    inputTitle.value = ``;
    inputHiddenId.value = ``;
    textContent.value = ``;
    selectTag.innerHTML = ``;
 

    displayInlineBlock(btnSave);
    displayInlineBlock(btnUpdate);

    emptier(document.querySelectorAll('.mensaje-error'));
    destroySummernote($('#post_content'));

  }

  function cleanPostImagesModal() {
    $('#post-gallery_swiper-container .swiper-wrapper').empty();
    document.querySelector('#post-images_post-id').value = ``;
    document.querySelector('#post-gallery_swiper-container').setAttribute('data-number', -1);
  }

  $(document).on('click', '.image-slider-post__delete', function() {
    deleteImageFromSliderPost($(this).data('image_id'), swiperPost, $('#post-gallery_swiper-container'))
  });

  function deleteImageFromSliderPost(imageId, swiper, swiperContainer) {
    swal({
        title: "Borrar Imagen",
        text: "¿Estás seguro?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si,borrar",
        closeOnConfirm: true
      },
      function() {
        let _route = `contents/${imageId}`;

        lockWindow();
        axios.delete(_route)
          .then((response) => {
            unlockWindow();
            swiperContainer.attr('data-number', -1);
          })
          .then(() => {

            if (document.querySelector('#post-images-modal input[name="model_type"]').value == 3) {
              axios.get(`posts/${document.querySelector('#post-images_post-id').value}/images`)
                .then((response) => {
                  let _images = response.data;

                  $('#post-gallery_swiper-container .swiper-wrapper').empty();
                  if (_images) {
                    addImageToSliderPost(swiperPost, $('#post-gallery_swiper-container'), _images);
                  }
                });
              return;
            }

            axios.get(`service/${document.querySelector('#post-images_post-id').value}/images`)
              .then((response) => {
                let _images = response.data;

                $('#post-gallery_swiper-container .swiper-wrapper').empty();
                if (_images) {
                  addImageToSliderPost(swiperPost, $('#post-gallery_swiper-container'), _images);
                }
              });



          });
      });
  }

  // $(document).on('change', '.note-image-input.note-form-control.note-input', function() {
  //   lg("added image");
  //   $('body').addClass('modal-open');
  // });

  // $(document).on('click', '.btn.btn-primary.note-btn.note-btn-primary.note-video-btn', function() {
  //   lg("added video");
  //   $('body').addClass('modal-open');
  // });

  // $(document).on('click', '.close', function() {
  //   lg("closing a modal created by summernote");
  //   $('body').addClass('modal-open');
  // });
