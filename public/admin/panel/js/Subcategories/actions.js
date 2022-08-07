const inputSubcategoryName = getElement('#subcategory_name');
const inputHiddenSubcategoryId = getElement('#subcategory_id');
const inputHiddenSubcategoryCategoryId = getElement('#subcategory_category-id');
const textSubcategoryDescription = getElement('#subcategory_description');
const selectSubcategoryPublished = getElement('#subcategory_published');
const btnSubcategorySave = getElement('#subcategory__save');
const btnSubcategoryUpdate = getElement('#subcategory__update');
const btnSubcategoryCancel = getElement('#subcategory__cancel');
const divCategoriesAttributes = getElement('#categories_attributes');

const divSubcategoryNameError = getElement('#subcategory-name-error');



const labelSubCategoryPreviewIconText = getElement('#subcategory_icon-preview-text');

const divSubCategoryPreviewIcon = getElement('#subcategory_icon-preview-image');

const inputSubCategoryIcon = getElement('#subcategory_icon');

const labelSubCategoryPreviewIconWhiteText = getElement('#subcategory_icon-white-preview-text');

const divSubCategoryPreviewIconWhite = getElement('#subcategory_icon-white-preview-image')

const inputSubCategoryIconWhite = getElement('#subcategory_icon-white');

const labelSubCategoryPreviewImageText = getElement('#subcategory_image-preview-text');

const divSubCategoryPreviewImage = getElement('#subcategory_preview-image');

const inputSubCategoryImage = getElement('#subcategory_image');




function subcategoryAdd(btn) {
  cleanError();
  cleanSubcategoryModal();
  addSummernoteEditor($('#subcategory_description'));
  inputHiddenSubcategoryCategoryId.value = btn.getAttribute('data-category_id');
  none(btnSubcategoryUpdate);

  //Adding categories-attributes

  axios.get(`categories-attributes`)
    .then((response) => {
      let _content = ``;
      let _categories = response.data;
      let _options = ``;

      //Reemplazar por map
      _categories.forEach(category => {
        _options = ``;

        category.attributes.forEach(attribute => {
          _options += `<option value="${attribute.id}">${attribute.name}</option>`;
        });

        _content += `
                      <div class="form-group">
                        <label class="control-label">${category.name}</label>
                        <select name="values_category_${category.id}[]" class="form-control select2" id="attr-${category.id}" multiple="multiple" style="width: 100%;">
                          ${_options}
                        </select>
                      </div>
                    `;
      });

      divCategoriesAttributes.innerHTML = _content;

      _categories.forEach(category => {
        $(`#attr-${category.id}`).select2({});
      });
    });
}

btnSubcategorySave.addEventListener('click', (e) => {
  cleanError();

  let _route = `subcategories`,
    _formData = new FormData($('#subcategory_form')[0]);
  lockWindow();
  axios.post(_route, _formData, {
      headers: {
        'X-CSRF-TOKEN': $('input[name=_token]').val()
      }
    })
    .then((response) => {
      unlockWindow();
      toastNotice(`Se ha creado la subcategoría.`);

      $('#subcategory-modal').modal('hide');
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
          divSubcategoryNameError.innerHTML = _content;
          //dev
        }
        // lg(key);
        // lg(_errors[key]);
      }

    });
});

function subcategoryEdit(btn) {
  let _id = btn.value;
  let _route = `subcategories/${_id}`;

  axios.get(_route)
    .then(({
      data
    }) => {

      cleanError();
      cleanSubcategoryModal();
      addInputHiddenPut($('#subcategory_form'), 'subcategory_method');
      none(btnSubcategorySave);
      inputHiddenSubcategoryCategoryId.value = data.category_id;
      inputHiddenSubcategoryId.value = data.id;
      inputSubcategoryName.value = data.name;
      textSubcategoryDescription.value = data.content;
      addSummernoteEditor($('#subcategory_description'));
      selectSubcategoryPublished.value = data.published;


      if (data.icon) {
        divSubCategoryPreviewIcon.innerHTML = `<img src="${data.icon}" style="display: block;">`;
        none(labelSubCategoryPreviewIconText);
      }

      if (data.icon_white) {
        divSubCategoryPreviewIconWhite.innerHTML = `<img src="${data.icon_white}" style="display: block;">`;
        none(labelSubCategoryPreviewIconWhiteText)
      }

      if (data.image_thumb) {
        divSubCategoryPreviewImage.innerHTML = `<img src="${data.image_thumb}" style="display: block;">`;
        none(labelSubCategoryPreviewImageText);
      }




    })
    .then(() => {
      axios.get(`categories-attributes`)
        .then((response) => {
          return response.data;
        })
        .then((categoriesAttributes) => {
          axios.get(`subcategories/${_id}/attributes`)
            .then((response) => {
              let _attributesSelected = response.data;
              let _content = ``;
              let _options;
              let _opt;

              categoriesAttributes.forEach(category => {
                _options = ``;
                
                category.attributes_relationship.forEach(attribute => {
                  _opt = `<option value="${attribute.id}">${attribute.name}</option>`;

                  _attributesSelected.forEach(attrSelected => {
                    if (attrSelected.id == attribute.id) {
                      _opt = `<option value="${attribute.id}" selected="selected">${attribute.name}</option>`;
                    }
                  });
                  _options += _opt;

                });

                _content += `
                            <div class="form-group">
                              <label class="control-label">${category.name}</label>
                              <select name="values_category_${category.id}[]" class="form-control select2" id="attr--${category.id}" multiple="multiple" style="width: 100%;">
                                ${_options}
                              </select>
                            </div>
                          `;

              });

              divCategoriesAttributes.innerHTML = _content;

              categoriesAttributes.forEach(category => {
                $(`#attr--${category.id}`).select2();
              });
            });
        });
    });
}

btnSubcategoryUpdate.addEventListener('click', (e) => {
  cleanError();

  let _route = `subcategories/${inputHiddenSubcategoryId.value}`,
    _formData = new FormData($('#subcategory_form')[0]);
  lockWindow();
  axios.post(_route, _formData, {
      headers: {
        'X-CSRF-TOKEN': $('input[name=_token]').val()
      }
    })
    .then((response) => {
      unlockWindow();
      toastNotice(`Se ha actualizado la subcategoría.`);

      $('#subcategory-modal').modal('hide');
      location.reload();
    })
    .catch((error) => {
      unlockWindow();
      toastError();
      let _errors = error.response.data;
      lg(_errors);
      let _content;

      for (const key in _errors) {
        if (key == `name`) {
          _content = ``;
          _errors[key].forEach(error => {
            _content += `<li class='error-block'>${error}</li>`;
          });
          divSubcategoryNameError.innerHTML = _content;
        }
      }
    });

});

function subcategoryDelete(btn) {
  let _id = btn.value;
  let _route = `subcategories/${_id}`;

  deleteObjectAxios(_route, {}, `¿Desea eliminar esta categoría?`, (response) => {
    toastNotice(`Se ha eliminado la subcategoría`);
    location.reload();
  }, (error) => {

    if (error.response.data.success == false) {
      toastError(error.response.data.message);
    } else {
      toastError();
    }
  });

}


function cleanSubcategoryModal() {

  $('#subcategory_method').remove();

  inputHiddenSubcategoryId.value = ``;
  inputSubcategoryName.value = ``;
  selectSubcategoryPublished.value = 0;
  destroySummernote($('#subcategory_description'));
  textSubcategoryDescription.value = ``;

  divCategoriesAttributes.innerHTML = ``;

  displayInlineBlock(btnSubcategorySave);
  displayInlineBlock(btnSubcategoryUpdate);

  divSubCategoryPreviewImage.innerHTML = ``;
  divSubCategoryPreviewIcon.innerHTML = ``;
  divSubCategoryPreviewIconWhite.innerHTML = ``;


  inputSubCategoryImage.value = ``;
  inputSubCategoryIcon.value = ``;
  inputSubCategoryIconWhite.value = ``;

  displayBlock(labelSubCategoryPreviewIconText)
  displayBlock(labelSubCategoryPreviewIconWhiteText);
  displayBlock(labelSubCategoryPreviewImageText);

}

function updateCategorySubcategory(btn) {
  let _categoryId = btn.getAttribute('data-category_id');
  let _subcategoryId = btn.getAttribute('data-subcategory_id');

  sessionStorage.categoryId = _categoryId;
  sessionStorage.subcategoryId = _subcategoryId;
  location.reload();
}

// $(document).on('click', '.one-subcategory', function(e){
//   e.preventDefault();
//   let _categoryId = $(this).

// });
