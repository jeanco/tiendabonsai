((d) => {
  const selectPaymentWay = d('account_payment-way'),
    selectPaymentEntity = d('account_payment-entity'),
    inputName = d('account_name'),
    textDescription = d('account_description'),
    textInstructions = d('account_instructions'),
    selectCurrency = d('account_currency'),
    inputOwnerName = d('account_owner-name'),
    inputOwnerDocument = d('account-owner-document'),
    inputHiddenId = d('account_id'),
    btnSave = d('account__save'),
    btnUpdate = d('account__update'),
    btnCancel = d('account__cancel');
  btnAdd = d('account__add');


  btnAdd.addEventListener('click', () => {
    axios.get(`payment-ways`)
      .then((response) => {
        let _paymentWays = response.data;
        let _content = ``;

        _paymentWays.forEach(payment_way => {
          _content += `<option value="${payment_way.id}">${payment_way.name}</option>`;
        });

        selectPaymentWay.innerHTML = ``;
        selectPaymentWay.innerHTML = _content;
      });


    axios.get(`payment-entities`)
      .then((response) => {
        let _paymentEntities = response.data;
        let _content = ``;

        _paymentEntities.forEach(payment_entity => {
          _content += `<option value="${currency.id}">${currency.name}</option>`;
        });

        selectPaymentEntity.innerHTML = ``;
        selectPaymentEntity.innerHTML = _content;

      });

    axios.get(`currencies`)
      .then((response) => {
        let _currencies = response.data;
        let _content = ``;
        _currencies.forEach(currency => {
          _content += `<option value="${currency.id}">${currency.name}</option>`;
        });

        selectCurrency.innerHTML = ``;
        selectCurrency.innerHTML = _content;
      });

  });


  $(document).on('click', '.account__edit', function () {
    let _id = $(this).value;
    let _route = `accounts/${_id}`;

    axios.get(_route)
      .then((response) => {
        let _account = response.data;


      });

  });

  btnSave.addEventListener('click', () => {

  });

  btnUpdate.addEventListener('click', () => {

  });

  btnCancel.addEventListener('click', () => {

  });





  cleanAccountModal() {

    inputHiddenId.value = ``;
    selectPaymentWay.innerHTML = ``;
    selectPaymentEntity.innerHTML = ``;
    selectCurrency.innerHTML = ``;

    inputName.value = ``;
    textDescription.value = ``;
    textInstructions.value = ``;
    inputOwnerName.value = ``;
    inputOwnerDocument.value = ``;
  }


})(document.getElementById);
