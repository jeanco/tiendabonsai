const inputCategoryName = getElement('#category_name');
const textCategoryDescription = getElement('#category_description');
const inputHiddenCategoryId = getElement('#category_id');
const inputCategoryImage = getElement('#category_image');
const inputCategoryIcon = getElement('#category_icon');
const inputCategoryIconWhite = getElement('#category_icon-white');
const btnCategorySave = getElement('#category__save');
const btnCategoryUpdate = getElement('#category__update');
const btnCategoryCancel = getElement('#category__cancel');
const selectCategoryPublished = getElement('#category_published');

const divCategoryPreviewImage = getElement('#category_preview-image');
const divCategoryPreviewIcon = getElement('#category_icon-preview-image');
const divCategoryPreviewIconWhite = getElement('#category_icon-white-preview-image')

const labelCategoryPreviewImageText = getElement('#category_image-preview-text');
const labelCategoryPreviewIconText = getElement('#category_icon-preview-text');
const labelCategoryPreviewIconWhiteText = getElement('#category_icon-white-preview-text');

const divCategoryNameError = getElement(`#category-name-error`);

$(document).on('ready', function () {
  //Cargar automaticamente la empresa
  var idCategoryToLoad = '';
  var idSubcategoryToLoad = '';

  if (sessionStorage.categoryId !== undefined) {
    if (sessionStorage.subcategoryId !== undefined) {
      idCategoryToLoad = sessionStorage.categoryId;
      idSubcategoryToLoad = sessionStorage.subcategoryId;
    }
  }
  loadFirstCategory(idCategoryToLoad, idSubcategoryToLoad);
});

function loadFirstCategory(idCategoryToLoad, idSubcategoryToLoad) {
  //Carga la primera categoría existente
  var ruta = 'categories/first';
  //Verifica si idCategoryToLoad  esta asignado a un valor para cargar dicha categoría
  if (idCategoryToLoad !== '') {
    ruta = 'categories/' + idCategoryToLoad;
  }

  axios.get(ruta)
    .then(({
      data
    }) => {
      successLoadCategory(data, idSubcategoryToLoad)
    });
}

function successLoadCategory(data, idSubcategoryToLoad) {
  if (data) {
    $('#current_category_id').val(data.id);
    $('#current_category_name').text(data.name);
    $('#current_category_content').text(data.content);
    loadSubcategory(data.id, idSubcategoryToLoad);
  } else {
    $.growl.warning({
      message: "No existe ninguna categoría o ha eliminado la categoría en la que estaba anteriormente. Cree o ingrese a otra categoría."
    });
  }
}

function loadSubcategory(categoryId, subcategoryId) {
  if (subcategoryId != '') {
    let ruta = `subcategories/${subcategoryId}`;

    axios.get(ruta)
      .then(({
        data
      }) => {
        if (data) {
          $('#current_subcategory_id').val(data.id);
          $('#current_subcategory_name').text(data.name);
          $('#current_subcategory_content').text(data.content);
          sessionStorage.categoryId = categoryId;
          sessionStorage.subcategoryId = subcategoryId;

          let _r = `categories/${categoryId}/subcategories/${subcategoryId}/products`;

          axios.get(_r)
            .then(({
              data
            }) => {
              loadGridProducts(data)
            });

        } else {
          $.growl.warning({
            message: "Probablemente esta subcategoria haya sido eliminada. Ingrese a otra subcategoría"
          });
        }
      });
  } else {

    let _r = `categories/${categoryId}/first-subcategory`;

    axios.get(_r)
      .then(({
        data
      }) => {
        if (data) {
          $('#current_subcategory_id').val(data.id);
          $('#current_subcategory_name').text(data.name);
          $('#current_subcategory_content').text(data.content);
          sessionStorage.categoryId = data.category_id;
          sessionStorage.subcategoryId = data.id;
          let _rt = `categories/${data.category_id}/subcategories/${data.id}/products`;

          axios.get(_rt)
            .then(({
              data
            }) => {
              loadGridProducts(data)
            });
        } else {
          $.growl.warning({
            message: "Cree una subcategoria para esta categoría"
          });
        }
      });
  }
}

$(document).on('click', '.category__add', (e) => {
  cleanCategoryModal();
  cleanError();
  none(btnCategoryUpdate);
  addSummernoteEditor($('#category_description'));
});

btnCategorySave.addEventListener('click', (e) => {
  cleanError();

  let _route = `categories`,
    _formData = new FormData($('#category_form')[0]);
  lockWindow();
  axios.post(_route, _formData, {
      headers: {
        'X-CSRF-TOKEN': $('input[name=_token]').val()
      }
    })
    .then((response) => {
      unlockWindow();
      toastNotice(`Se ha creado la categoría.`);

      $('#category-modal').modal('hide');
      location.reload();
    })
    .catch((error) => {
      unlockWindow();
      toastError();
      let _errors = error.response.data;

      let _content;

      for (const key in _errors) {
        if (key == `name`) {
          _content = ``;
          _errors[key].forEach(error => {
            _content += `<li class='error-block'>${error}</li>`;
          });
          divCategoryNameError.innerHTML = _content;
        }
      }
    });
});

function categoryEdit(btn) {
  let _id = btn.value;
  let _route = `categories/${_id}`;
  axios.get(_route)
    .then(({
      data
    }) => {
      cleanCategoryModal();
      cleanError();

      addInputHiddenPut($('#category_form'), 'category_method');
      
      inputCategoryName.value = data.name;
      textCategoryDescription.value = data.content;
      addSummernoteEditor($('#category_description'));
      inputHiddenCategoryId.value = data.id;
      selectCategoryPublished.value = data.published;

      none(btnCategorySave);

      if (data.icon) {
        divCategoryPreviewIcon.innerHTML = `<img src="${data.icon}" style="display: block;">`;
        none(labelCategoryPreviewIconText);
      }

      if (data.icon_white) {
        divCategoryPreviewIconWhite.innerHTML = `<img src="${data.icon_white}" style="display: block;">`;
        none(labelCategoryPreviewIconWhiteText)
      }

      if (data.image_thumb) {
        divCategoryPreviewImage.innerHTML = `<img src="${data.image_thumb}" style="display: block;">`;
        none(labelCategoryPreviewImageText);
      }
    });
}

btnCategoryUpdate.addEventListener('click', (e) => {
  cleanError();

  let _route = `categories/${inputHiddenCategoryId.value}`,
    _formData = new FormData($('#category_form')[0]);

  ajaxFormData(_route, _formData, (response) => {
     toastNotice(`Se ha actualizado la categoría.`);
    $('#category-modal').modal('hide');
    location.reload();
  }, (error) => {
    toastError();
    let _errors = error.responseJSON;

    let _content;

    for (const key in _errors) {
      if (key == `name`) {
        _content = ``;
        _errors[key].forEach(error => {
          _content += `<li class='error-block'>${error}</li>`;
        });
        divCategoryNameError.innerHTML = _content;
      }
    }
  });
});

function categoryDelete(btn) {

  let _id = btn.value;
  let _route = `categories/${_id}`;

  deleteObjectAxios(_route, {}, `¿Desea eliminar esta categoría?`, (response) => {
    toastNotice(`Se ha eliminado la categoría`);
    location.reload();
  }, (error) => {

    if (error.response.data.success == false) {
      toastError(error.response.data.message);
    } else {
      toastError();
    }
  });
}

function cleanCategoryModal() {
  $('#category_method').remove();

  destroySummernote($('#category_description'));
  textCategoryDescription.value = ``;

  inputHiddenProductId.value = ``;
  inputCategoryName.value = ``;

  btnCategorySave.style.display = `inline-block`;
  btnCategoryUpdate.style.display = `inline-block`;

  divCategoryPreviewImage.innerHTML = ``;
  divCategoryPreviewIcon.innerHTML = ``;
  divCategoryPreviewIconWhite.innerHTML = ``;
  
  selectCategoryPublished.value = 0;

  inputCategoryImage.value = ``;
  inputCategoryIcon.value = ``;
  inputCategoryIconWhite.value = ``;

  displayBlock(labelCategoryPreviewIconText)
  displayBlock(labelCategoryPreviewIconWhiteText);
  displayBlock(labelCategoryPreviewImageText);
}
