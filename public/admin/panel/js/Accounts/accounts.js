(() => {

  const selectPaymentWay = getElement('#account_payment-way'),
    inputHiddenId = getElement('#account_id'),
    textDescription = getElement('#account_description'),
    textInstructions = getElement('#account_instructions'),
    inputOwnerName = getElement('#account_owner-name'),
    selectPaymentEntity = getElement('#account_payment-entity'),
    inputName = getElement('#account_name'),
    selectCurrency = getElement('#account_currency'),
    inputOwnerDocument = getElement('#account_owner-document'),
    btnAdd = getElement('#account__add'),
    btnSave = getElement('#account__save'),
    btnUpdate = getElement('#account__update'),
    btnCancel = getElement('#account__cancel'),
    divGrid = getElement('#accounts_grid');

  axios.get(`accounts`)
    .then((response) => {
      let _accounts = response.data;
      loadGridAccounts(_accounts);
    });

  btnAdd.addEventListener('click', (e) => {
    cleanError();
    cleanAccountModal();

    addSummernoteEditor($('#account_instructions'));

    axios.get(`payment-ways`)
      .then((response) => {
        let _content = `<option value="">Seleccione la  forma de pago</option>`;
        response.data.forEach(payment_way => {
          _content += `<option value="${payment_way.id}">${payment_way.name}</option>`
        });
        selectPaymentWay.innerHTML = _content;
      })
      .then(() => {
        axios.get(`payment-entities`)
          .then((response) => {
            let _content = `<option value="">Seleccione el medio de pago</option>`;
            response.data.forEach(entity => {
              _content += `<option value="${entity.id}">${entity.name}</option>`
            });
            selectPaymentEntity.innerHTML = _content;
          });
      })
      .then(() => {
        axios.get(`currencies`)
          .then((response) => {
            let _content = `<option value="">Seleccione la moneda</option>`;
            response.data.forEach(currency => {
              _content += `<option value="${currency.id}">${currency.name}</option>`
            });
            selectCurrency.innerHTML = _content;
          });
      });

    none(btnUpdate);
  });

  btnSave.addEventListener('click', () => {
    cleanError();
    let _formData = new FormData($('#account_form')[0])

    axios.post(`accounts`, _formData)
      .then((response) => {
        toastNotice(`Se ha creado la cuenta`);
        $('#account-modal').modal('hide');

        axios.get(`accounts`)
          .then((response) => {
            loadGridAccounts(response.data);
          });
      })
      .catch((error) => {
        toastError();

        $('#account-error').append(`Corrija los siguientes campos por favor!`);
        $.each(error.response.data, function (key, value) {
          if (key == "name") {
            $.each(value, function (errores, eror) {
              $('#account-name-error').append("<li class='error-block'>" + eror + "</li>");
            });
          } else if (key == "payment_way_id") {
            $.each(value, function (errores, eror) {
              $('#account-payment-way-error').append("<li class='error-block'>" + eror + "</li>");
            });
          };
        });
      });
  });

  $(document).on('click', '.account__edit', function (e) {


    let _id = e.target.value;
    axios.get(`accounts/${_id}`)
      .then((response) => {
        let _account = response.data;
        cleanAccountModal();
        none(btnSave);
        addInputHiddenPut($('#account_form'), 'account_method');

        inputHiddenId.value = _account.id;
        inputName.value = _account.name;
        textInstructions.value = _account.instructions;

        textDescription.value = _account.description;
        inputOwnerName.value = _account.owner_name;
        inputOwnerDocument.value = _account.owner_document;
        addSummernoteEditor($('#account_instructions'));

        if (_account.payment_way_id == 1) {
          $('.payment-way-two').hide();
        } else {
          $('.payment-way-two').show();
        }

        axios.get(`payment-ways`)
          .then((response) => {
            let _content = `<option value="">Seleccione la  forma de pago</option>`;
            response.data.forEach(payment_way => {
              _content += `<option value="${payment_way.id}">${payment_way.name}</option>`
            });
            selectPaymentWay.innerHTML = _content;
            selectPaymentWay.value = _account.payment_way_id;
          })
          .then(() => {
            axios.get(`payment-entities`)
              .then((response) => {
                let _content = `<option value="">Seleccione el medio de pago</option>`;
                response.data.forEach(entity => {
                  _content += `<option value="${entity.id}">${entity.name}</option>`
                });
                selectPaymentEntity.innerHTML = _content;
                selectPaymentEntity.value = _account.payment_entity_id;
              });
          })
          .then(() => {
            axios.get(`currencies`)
              .then((response) => {
                let _content = `<option value="">Seleccione la moneda</option>`;
                response.data.forEach(currency => {
                  _content += `<option value="${currency.id}">${currency.name}</option>`
                });
                selectCurrency.innerHTML = _content;
                selectCurrency.value = _account.currency_id;
              });
          });
      });
  });

  $(document).on('click', '.account__published', function (e) {
    let _id = e.target.value;
    let _title = ($(this).data('published') == 1) ? `¿Dejar de publicar?` : `¿Publicar?`;

    updatePublishedWithAxios(`accounts/${_id}/published`, {}, _title, () => {
      toastNotice(`Se ha cambiado el estado`);
      axios.get(`accounts`)
        .then((response) => {
          loadGridAccounts(response.data);
        });

    }, () => {
      toastError();
    });
  });

  $(document).on('click', '.account__delete', function (e) {
    let _id = e.target.value;

    deleteObjectAxios(`accounts/${_id}`, {}, `¿Desea eliminarlo?`, () => {
      toastNotice(`La cuenta fue eliminada`);
      axios.get(`accounts`)
        .then((response) => {
          loadGridAccounts(response.data);
        });
    }, (error) => {
      toastError(`${error.response.data.message}`);
    });
  });

  btnUpdate.addEventListener('click', () => {
    cleanError();

    let _formData = new FormData($('#account_form')[0])

    axios.post(`accounts/${inputHiddenId.value}`, _formData)
      .then((response) => {
        toastNotice(`Se ha actualizado la cuenta`);
        $('#account-modal').modal('hide');

        axios.get(`accounts`)
          .then((response) => {
            loadGridAccounts(response.data);
          });
      })
      .catch((error) => {
        toastError();
        lg(error);
      });
  });

  function loadGridAccounts(accounts) {
    let _content = ``;
    let _published = ``;

    accounts.forEach(account => {
      _published = simbolPublished(account.published);
      _content += `<div class="col-lg-3 col-md-4 col-sm-6 phs">
                    <li class="item-account">
                      <figure class="item-image">
                        <img src="${(account.payment_way_id >=2) ? account.payment_entity.logo : `https://dl.dropboxusercontent.com/s/wq6ehrkoz5is5fj/company.png`}" alt="" />
                      </figure>
                      <span style="display: block; text-align: center;">${account.name}</span>
                      <div class="item__controls">`+
                        ((getElement(`#account_publish`).value) ? `<button type="button" value="${account.id}" data-published="${account.published}" class="btn btn-warning account__published" title="${_published.name}">
                        <i class="${_published.simbol} notPointerEvent"></i>
                      </button>` : ``)+
                        ((getElement(`#account_edit`).value) ? `<button type="button" value="${account.id}" class="btn btn-success account__edit"  data-target="#account-modal" data-toggle="modal" title="Editar">
                        <i class="glyphicon glyphicon-pencil notPointerEvent"></i>
                      </button>` : ``)+
                        ((getElement(`#account_delete`).value) ? `<button type="button" value="${account.id}" class="btn btn-danger account__delete" title="Eliminar">
                        <i class="glyphicon glyphicon-trash notPointerEvent"></i>
                      </button>` : ``)+
                      `</div>
                    </li>
                  </div>`;
    });



    divGrid.innerHTML = ``;
    divGrid.innerHTML = _content;
  }

  btnCancel.addEventListener('click', () => {
    $('#account-modal').modal('hide');
  });

  selectPaymentWay.addEventListener('change', (e) => {
    let _value = e.target.value;
    lg(_value);

    if (_value == 1) {
      $('.payment-way-two').hide();
    } else if (_value == 2) {
      $('.payment-way-two').show();

    }
  });

  function cleanAccountModal() {

    $('#account_method').remove();

    selectPaymentWay.innerHTML = ``;
    textDescription.value = ``;
    textInstructions.value = ``;
    inputOwnerName.value = ``;
    selectPaymentEntity.innerHTML = ``;
    inputName.value = ``;
    selectCurrency.innerHTML = ``;
    inputOwnerDocument.value = ``;
    inputHiddenId.value = ``;
    $('.payment-way-two').show();
    displayInlineBlock(btnSave);
    displayInlineBlock(btnUpdate);

    destroySummernote($('#account_instructions'));

  }

})();
