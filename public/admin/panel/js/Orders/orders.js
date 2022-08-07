(() => {

  const inputHiddenId = getElement('#order_id');
  const pDate = getElement('#order_date');
  const bCode = getElement('#order_code');
  const pCustomerDocument = getElement('#order_customer-document');
  const pCustomerName = getElement('#order_customer-name');
  const pCustomerCel = getElement('#order_customer-cel');
  const pCustomerEmail = getElement('#order_customer-email');
  const pCustomerOrigin = getElement('#order_customer-origin');
  const pCustomerAddress = getElement('#order_customer-address');
  const btnConfirm = getElement('#order__confirm');
  const btnCancel = getElement('#order__cancel');
  const tBody = getElement('#order_product-detail');
  const tdTotalQuantity = getElement('#order_total-quantity');
  const tdTotalPrice = getElement('#order_total-price');
  const inputCustomerName = getElement('#order-to-search');
  const inputDate = getElement('#order-date__');
  const selectStatus = getElement('#order-select__status');
  const pSeparated = getElement('#order_is-separated'),
        pAdvanceToPay = getElement('#order_advance-to-pay');
  const pPaymentWay = getElement('#order_payment-way');
  const pAccountName = getElement('#order_account-name');

  $(document).on('click', '.order__see', function (e) {
    e.preventDefault();
    let _id = $(this).data('order_id');
    let _route = `orders/${_id}`, _type_recommendation_text = "";
    axios.get(_route)
      .then((response) => {
        cleanOrderModal();
        let _order = response.data;
        const {rate, decimal, symbol} = response.data;

        bCode.innerHTML = _order.code;
        inputHiddenId.value = _order.id;
        pDate.innerHTML = _order.date;
        pCustomerDocument.innerHTML = _order.customer.document;
        pCustomerName.innerHTML = _order.customer.name;
        document.querySelector('#order_customer-birthday').innerHTML = _order.customer.birthday;
        pCustomerCel.innerHTML = _order.customer.cel;
        pCustomerEmail.innerHTML = _order.customer.email;
        pCustomerOrigin.innerHTML = _order.customer.origin;
        pCustomerAddress.innerHTML = (_order.customer.address) ? _order.customer.address : `No ha registrado la dirección`;
        pPaymentWay.innerHTML = _order.payment_way_name;
        pAccountName.innerHTML = _order.account_name;
        getElement(`#order_customer-description`).innerHTML = _order.description;
        pSeparated.innerHTML = (_order.is_separated == 1) ? `El cliente ha solicitado separar ahora` : ``;
        pAdvanceToPay.innerHTML = (_order.is_separated == 1) ? `Adelanto a pagar:${parseInt(_order.total*0.1)}` : ``;
        $(`#order__see-pdf`).attr('href', `${window.origin}/pdf-pedido/${_order.uuid}`);
        
        let _content = ``;
        console.log(_order.products);
        _order.products.forEach(product => {
          _content += `
            <tr>
              <td class='u-center'>${product.quantity}</td>
              <td class='u-uppercase'>${product.code} - ${product.name}</td>
              <td>${symbol}${(product.price*rate).toFixed(decimal)}</td>
              <td class="error-block">${symbol}${(product.discount*rate).toFixed(decimal)}</td>
              <td>${symbol}${(product.sub_total*rate).toFixed(decimal)}</td>
            </tr>
            `;
        });

        tBody.innerHTML = ``;
        tBody.innerHTML = _content;

        tdTotalQuantity.innerHTML = _order.quantity;
        tdTotalPrice.innerHTML = `${symbol}${(parseFloat(_order.total)*rate).toFixed(decimal ? 2 : 0)}`;

        if (_order.status == 2) {
          none(btnConfirm);
        }
        if (_order.status == 3) {
          none(btnConfirm);
          none(btnCancel);
        }

        $('#order-modal').modal('show');

        //Alternative direction
        $(`#alternative_direction`).hide();

        if (_order.alternative_direction) {
          $(`#alternative_direction`).show();
          $(`#alternative-document`).html(_order.alternative_direction.identity_document);
          $(`#alternative-name`).html(`${_order.alternative_direction.first_name} ${_order.alternative_direction.last_name}`);
          $(`#alternative-cel`).html(_order.alternative_direction.cel);
          $(`#alternative-address`).html(_order.alternative_direction.address);
          $(`#alternative-country`).html(_order.alternative_direction.country.name);
          $(`#alternative-city`).html(_order.alternative_direction.city.name);
          $(`#alternative-province`).html(_order.alternative_direction.province.name);
          $(`#alternative-district`).html(_order.alternative_direction.district.name);
          $(`#alternative-reference`).html(_order.alternative_direction.reference);
          $(`#alternative-reference-additional`).html(_order.alternative_direction.additional_reference);

        } 

        $(`.with-invoice`).hide();
          
        if (_order.with_invoice) {
          $(`.with-invoice`).show();
          $(`#order_business-document`).html(_order.business_document);
          $(`#order_business-name`).html(_order.business_name);
          $(`#order_business-address`).html(_order.business_address);
        }

        $(`#order_type-recommendation`).parent().hide();

        if (_order.type_recommendation != 0) {
          $(`#order_type-recommendation`).parent().show();

          switch(_order.type_recommendation){
            case 1:
              _type_recommendation_text = "Por la Publicidad en facebook";
              break;
            case 2:
              _type_recommendation_text = "Por la Radio";
              break;
            case 3:
              _type_recommendation_text = "Por el Periódico";
              break;
            case 4:
              _type_recommendation_text = "Por Recomendación";
              break;
          }

          $(`#order_type-recommendation`).html(_type_recommendation_text);

        }


        $(`#order_when-purchased`).parent().hide();

        if (_order.when_purchased != 0) {
          $(`#order_when-purchased`).parent().show();

          switch(_order.when_purchased){
            case 1:
              $(`#order_when-purchased`).html("HOY");
              break;
            case 2:
              $(`#order_when-purchased`).html("1 MES");
              break;
            case 3:
              $(`#order_when-purchased`).html("3 MESES");
              break;
          }
        }

        $(`#order_guarantee`).parent().hide();

        if (_order.guarantee != 0) {
          $(`#order_guarantee`).parent().show();

          switch(_order.guarantee){
            case 1:
              $(`#order_guarantee`).html("SI");
              break;
            case 2:
              $(`#order_guarantee`).html("NO");
              break;
          }
        }

        $(`#order_simulate-financing`).parent().hide();

        if (_order.simulate_financing != 0) {
          $(`#order_simulate-financing`).parent().show();

          switch(_order.simulate_financing){
            case 1:
              $(`#order_simulate-financing`).html("SI");
              break;
            case 2:
              $(`#order_simulate-financing`).html("NO");
              break;
          }
        }



      });
  });

  inputCustomerName.addEventListener('keyup', () => {
    filterOrders();
  });

  inputDate.addEventListener('change', () => {
    filterOrders();
  });

  selectStatus.addEventListener('change', () => {
    filterOrders();
  });

  btnConfirm.addEventListener('click', () => {

    swal({
        title: "¿Confirmar esta orden?",
        text: "¿Estás seguro?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar",
        closeOnConfirm: true
      },
      function () {
        let _route = `orders/${inputHiddenId.value}/confirm`;
        lockWindow();
        axios.put(_route,  {}, {})
          .then((response) => {
            unlockWindow();
            toastNotice(`Se ha confirmado la orden`);
            $('#order-modal').modal('hide');
            filterOrders();
          })
          .catch((error) => {
            unlockWindow();
            lg(error);
            toastError();
          });
      });
  });

  btnCancel.addEventListener('click', () => {
    swal({
        title: "¿Cancelar la orden?",
        text: "¿Estás seguro?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar",
        closeOnConfirm: true
      },
      function () {
        let _route = `orders/${inputHiddenId.value}/cancel`;

        lockWindow();
        axios.put(_route, {}, {})
          .then((response) => {
            unlockWindow();
            toastNotice(`Se ha cancelado la orden`);
            $('#order-modal').modal('hide');
            filterOrders();
          })
          .catch((error) => {
            unlockWindow();
            lg(error);
            toastError();
          });
      });
  });

  function loadGridOrders(orders) {
    var content = '';
    $('#order-grid').empty();

    $.each(orders, function (i, order) {
      content = content + '<div class="col-lg-3 col-md-4 col-sm-6">' +
        '<button class="c-order order__see" data-order_id="' + order.id + '" data-toggle="modal">' +
        '<div class="u-flex u-items-start u-justify-between">' +
        '<p class="u-flex u-items-center">' +
        '<i class="glyphicon glyphicon-calendar u-color-primary u-mr2"></i>' +
        order.date +
        '</p>';

      if (order.status == 1) {
        content = content + '<label class="u-mb2 u-label u-bg-warning"><img src="https://dl.dropboxusercontent.com/s/3caq9w90298wwbg/billete.png?dl=0"  width="25px" style="    padding-top: 0px;"> Pendiente </label>';
      }
      if (order.status == 2) {
        content = content + '<label class="u-mb2 u-label u-bg-success"><img src="https://dl.dropboxusercontent.com/s/3caq9w90298wwbg/billete.png?dl=0"  width="25px" style="    padding-top: 0px;"> Confirmado </label>';

      }
      if (order.status == 3) {
        content = content + '<label class="u-mb2 u-label u-bg-danger"><img src="https://dl.dropboxusercontent.com/s/3caq9w90298wwbg/billete.png?dl=0"  width="25px" style="    padding-top: 0px;"> Cancelado </label>';

      }

      content = content +
        '</div>' +

        '<h3 class="u-color-primary">' + order.code + '</h3>' +

        '<div class="u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2">' +
        '<span class="u-mr2">Cantidad:</span>' +
        '<p class="u-color-text u-mb0">' + order.quantity + '</p>' +
        '</div>' +

        '<div class="u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2">' +
        '<span class="u-mr2">Total:</span>' +
        '<p class="u-color-text u-mb0">' + order.total + '</p>' +
        '</div>' +

        '<hr class="u-mb0">' +
        '<hr class="u-mt0">' +

        '<div class="u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2">' +
        '<span class="u-mr2">Cliente:</span>' +
        '<p class="u-color-text u-mb0">' + order.customer.name + '</p>' +
        '</div>' +

        '<div class="u-flex u-flex-wrap u-line-1 u-fz-h2">' +
        '<span class="u-mr2">Celular:</span>' +
        '<p class="u-color-text u-mb0">' + order.customer.cel + '</p>' +
        '</div></button>' +
        `
        <div style="padding-top: 10px; padding-bottom: 0px; padding-left: 20px;">
          <a href="#" data-index="${order.id}" class="btn btn-info tracking" data-toggle="modal" data-target="#tracking-order" style="padding: 3px 3px !important;"><img src="https://dl.dropboxusercontent.com/s/53qneyb50r4gu8j/camion_ico.png?dl=0" width="25px" style="    padding-top: 0px;"> Seguimiento</a>
        </div><hr>
        `
        +
        '</div> ';
    });
    $('#order-grid').append(content);

  }

  function filterOrders() {
    let _route = `orders/filter-by?q=${$('#order-to-search').val()}&date=${$('#order-date__').val()}&status=${$('#order-select__status').val()}`;

    axios.get(_route)
      .then(({
        data
      }) => {
        loadGridOrders(data);
      });
  }

  function cleanOrderModal() {
    inputHiddenId.value = ``;
    displayInlineBlock(btnConfirm);
    displayInlineBlock(btnCancel);

  }

  $(`#order__export`).on('click', function(){

  });

  $(`#order_send-email`).on(`click`, function(){
    axios.post(`/admin/order/send-message-to-customer-email`, {
      'msg' : $(`#order_message`).val(),
      'order_id': $(`#order_id`).val(),
    })
      .then((response) => {
        toastNotice(response.data.message);
      })
      .catch((error) => {

      });

  });




  // $('#btn-x_modal-order__close').on('click', function () {
  //   cleanModalOrder();
  // });

  // $('#order-show-pdf').on('click', function () {
  //   window.open(window.location.origin + "/orden/" + $('#order-code').val());
  // });

})();
