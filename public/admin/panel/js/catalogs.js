(() => {
  const btnAdd = getElement('#catalog__add'),
    btnSave = getElement('#catalog__save'),
    btnUpdate = getElement('#catalog__update'),
    btnCancel = getElement('#catalog__cancel'),
    inputTitle = getElement('#catalog_title'),
    inputLink = getElement('#catalog_link'),
    inputHiddenId = getElement('#catalog_id');

  chargeGrid();

  $(`#catalog__add`).on('click', function(){
    clearCatalogModal();
    $('#catalog-modal').modal('show');
    none(btnUpdate);
  });

  // btnAdd.addEventListener('click', () => {

  // });

  btnSave.addEventListener('click', () => {
    let _formData = new FormData($('#catalog_form')[0])
    lockWindow();
    axios.post(`catalogs`, _formData)
      .then((response) => {
        unlockWindow();
        toastNotice();
        $('#catalog-modal').modal('hide');
        chargeGrid();
      })
      .catch((error) => {
        unlockWindow();
        toastError(error.response)
      });
  });

  $(document).on('click', '.catalog__edit', function (e) {
    let _id = $(this)[0].value;
    axios.get(`catalogs/${_id}`)
      .then((response) => {
        let _catalog = response.data;

        clearCatalogModal();
        addInputHiddenPut($('#catalog_form'), `catalog_method`);

        inputHiddenId.value = _catalog.id;
        inputTitle.value = _catalog.title;
        inputLink.value = _catalog.link;

        if (_catalog.image_desktop) {
          $('#catalog_image-desktop-preview').append('<img src="' + _catalog.image_desktop + '" style="display: block;">');
          $('#catalog_preview-text-image-desktop').remove();
        }

        if (_catalog.image_movil) {
          $('#catalog_image-movil-preview').append('<img src="' + _catalog.image_movil + '" style="display: block;">');
          $('#catalog_preview-text-image-movil').remove();
        }

        none(btnSave);
        $('#catalog-modal').modal('show');

      });

  });

  btnUpdate.addEventListener('click', () => {

    let _formData = new FormData($('#catalog_form')[0]);
    ajaxFormData(`catalogs/${inputHiddenId.value}`, _formData, function (response) {
      toastNotice();
      $('#catalog-modal').modal('hide');
      chargeGrid();
    }, function (error) {
      toastError();
    });
  });

  btnCancel.addEventListener('click', () => {
    $('#catalog-modal').modal('hide');
  });


  $(document).on('click', '.catalog__published', function () {
    let _id = $(this)[0].value;
    let _lastStatus = $(this).data('published');
    let _title = $(this).data('catalog_title');
    let _text = (_lastStatus == 1) ? `¿Desea no publicar ${_title}` : `¿Desea publicar ${_title}`;

    updatePublishedWithAxios(`catalogs/${_id}/published`, {}, _text, function(response){
      toastNotice();
      chargeGrid();
    }, function(error){
      toastError();
    });
  });

  $(document).on('click', '.catalog__delete', function () {
    let _id = $(this)[0].value;
    let _title = $(this).data('catalog_title');

    deleteObjectAxios(`catalogs/${_id}`, {}, `¿Eliminar?`, function(response){
      toastNotice();
      chargeGrid();
    }, function(error){
      toastError();
    });
  });

  function loadGridCatalogs(catalogs) {
    let _content, _published;

    _content = '';
    $('#catalogs_grid').empty();

    $.each(catalogs, function (k, catalog) {
      _published = simbolPublished(catalog.published);
      _content = _content +
        '<div class="col-lg-3 col-md-4 col-sm-6 phs">' +
        '<li class="item-account">' +
        '<figure class="item-image">' +
        '<img src="' + catalog.image_desktop + '" alt="" />' +
        '</figure>' +
        '<span style="display: block;text-align: center;">' + catalog.title + '</span>' +
        '<div class="item__controls">' +
        ((getElement(`#catalog_publish`).value) ? '<button type="button" value="' + catalog.id + '" data-catalog_title="' + catalog.title + '" data-published="' + catalog.published + '" class="btn btn-warning catalog__published" title="' + _published.name + '">' +
        '<i class="' + _published.simbol + '"></i>' +
        '</button>' : ``)+
        ((getElement(`#catalog_edit`).value) ? '<button type="button" value="' + catalog.id + '" class="btn btn-success catalog__edit" title="Editar">' +
        '<i class="glyphicon glyphicon-pencil"></i>' +
        '</button>' : ``)+
        ((getElement(`#catalog_delete`).value) ? '<button type="button" value="' + catalog.id + '" class="btn btn-danger catalog__delete"  title="Eliminar">' +
        '<i class="glyphicon glyphicon-trash"></i>' +
        '</button>' : ``)+
        '</div>' +
        '</li>' +
        '</div>';
    });

    $('#catalogs_grid').append(_content);
  }

  function clearCatalogModal() {
    $('#catalog_method').remove();

    inputHiddenId.value = ``;
    inputTitle.value = ``;
    inputLink.value = ``;

    let _previewTextImageMovil, _previewTextImageDesktop;

    _previewTextImageMovil =
      '<label id="catalog_preview-text-image-movil">' +
      '<i class="glyphicon glyphicon-picture"></i>' +
      '<span class="u-ml3">Añadir Imágen</span>' +
      '</label>';

    _previewTextImageDesktop =
      '<label id="catalog_preview-text-image-desktop">' +
      '<i class="glyphicon glyphicon-info-sign"></i>' +
      '<span class="u-ml3">Añadir Imágen</span>' +
      '</label>';

    $('#catalog_preview-text-image-movil').remove();
    $('#catalog_preview-text-image-desktop').remove();

    $('#catalog_image-movil-preview').empty();
    $('#catalog_image-desktop-preview').empty();

    $('#catalog_image-desktop').val('');
    $('#catalog_image-movil').val('');

    $('#catalog_image-movil-container').prepend(_previewTextImageMovil);
    $('#catalog_image-desktop-container').prepend(_previewTextImageDesktop);

    displayInlineBlock(btnUpdate);
    displayInlineBlock(btnSave);
  }

  function chargeGrid() {
    axios.get(`catalogs`)
      .then((response) => {
        loadGridCatalogs(response.data);
      });
  }

})();
