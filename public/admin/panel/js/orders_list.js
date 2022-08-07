  function datatableOrders(url){

    let _counter = 1;
  	$('#orders-datatable').DataTable({
  		processing: true,
  		serverSide: true,
  		destroy: true,
      bFilter: false,
  		ajax: url,
  		columns: [{
  			//0
  			data: 'order_id',
  			name: 'order_id',
  			searchable: false
  		}, {
        //1
        data: 'date',
        name: 'orders.created_at',
        searchable: true
      },{
  			//2
  			data: 'order_code',
  			name: 'orders.code',
  			searchable: true
  		}, {
  			//3
  			data: 'identity_document',
  			name: 'identity_document',
  			searchable: false
  		}, {

  			//4
  			data: 'first_name',
  			name: 'first_name',
  			searchable: false
  		}, {
  			//5
  			data: 'last_name',
  			name: 'last_name',
  			searchable: false
  		}, {
        //6
        data: 'cel',
        name: 'cel',
        searchable: false
      }, {
        //7
        data: 'total_products',
        name: 'total_products',
        class: 'text-center',
        searchable: false
      }, {
        //8
        data: 'total',
        name: 'total',
        searchable: false
      },{
        //9
        data: 'status',
        name: 'status',
        searchable: false
      }, {
  			//10
  			data: 'Actions',
  			searchable: false
  		}],
      order: [
        [0, 'desc']
      ],
  		"language": {
  			"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
  			// "search": "_INPUT_",
  			"searchPlaceholder": "Buscar"
  		},
  		"aoColumnDefs": [{
  			"bVisible": false,
  			"aTargets": [5]
  		},
  		{
  			"aTargets": [0],
  			"mData": "order_id",
  			"mRender": function(data, type, full) {
          return _counter++;
  			}
  		},{
        "aTargets": [1],
        "mData": "date",
        "mRender": function(data, type, full) {
           let _date = moment(full['date'], 'YYYY/MM/DD HH:mm').format();
           let _newDate = moment(_date).format('DD/MM/YYYY HH:mm');
           return _newDate;
        }
      },{
        "aTargets": [4],
        "mData": "first_name",
        "mRender": function(data, type, full) {
          return `${full['first_name'] || ' '} ${full['last_name'] || ' '}`;
          // if (!full['birthday']) {
          //  return '';
          // }
          // let _date = moment(full['birthday'], 'YYYY/MM/DD').format();
          // let _newDate = moment(_date).format('DD/MM/YYYY');
          // return _newDate;
        }
      },{
        "aTargets": [9],
        "mData": "status",
        "mRender": function(data, type, full) {

          switch (full['status']) {
            case 1:
              return "Pendiente";
            break;
            case 2:
              return "Confirmado";
            break;
            case 3:
              return "Cancelado";
            break;
          }
        }
      }, {
        "aTargets": [10],
        "mData": "Actions",
        "mRender": function(data, type, full) {
          return `<button class='btn btn-success btn-sm order__see' title='Ver Orden' data-order_id="${full['order_id']}">
                  <i class='glyphicon glyphicon-eye-open notPointerEvent'></i>
                </button>`;
        }
      },
  		]
  	});
  }

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

    //$('input[name="dates"]').daterangepicker();

    $('input[name="dates"]').daterangepicker({
        "linkedCalendars": false,
        "showCustomRangeLabel": false,
        "startDate": moment().startOf('month').format('DD/MM/YYYY'),
        "endDate": moment().endOf('month').format('DD/MM/YYYY'),
        "minDate": "DD/MM/YYYY",
        "maxDate": "DD/MM/YYYY",
        locale: {
            format: 'DD/MM/YYYY'
        }
    }, function(start, end, label) {
      // console.log(start.format('YYYY-MM-DD'), end.format('YYY-MM-DD'));
      //datatableOrders(`/admin/orders/datatable`);
      datatableOrders(`/admin/orders/datatable?status=${$(`#order-select__status`).val()}&start_date=${start.format('DD/MM/YYYY')}&end_date=${end.format('DD/MM/YYYY')}`);

      //console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
    });

    re_call_datatable();
    function re_call_datatable(){
      _dates = get_range_dates();
      datatableOrders(`/admin/orders/datatable?status=${$(`#order-select__status`).val()}&start_date=${_dates[0]}&end_date=${_dates[1]}`);
    }

    function get_range_dates(){

      let _dates_array;

      if (!$('input[name="dates"]').val()) {
        return ["", ""];
      }

      _dates_array = $('input[name="dates"]').val().split('-');
      return [_dates_array[0].trim(), _dates_array[1].trim()];
    }

    $(document).on('click', '.order__see', function () {
      let _id = $(this).data('order_id');
      let _route = `orders/${_id}`;

      axios.get(_route)
        .then((response) => {
          cleanOrderModal();
          let _order = response.data;
          const {rate, decimal, symbol} = response.data;

          getElement(`#order-modal #document_type`).innerHTML = "DNI:";
          getElement(`#order-modal #customer_type`).innerHTML = "Nombres y apellidos:";
          if (_order.customer.document_type == 2) {
            getElement(`#order-modal #document_type`).innerHTML = "RUC:";
            getElement(`#order-modal #customer_type`).innerHTML = "Razón social:";
          }


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
          _order.products.forEach(product => {
            _content += `
              <tr>
                <td class='u-center'>${product.quantity}</td>
                <td class='u-uppercase'>${product.name}</td>
                <td>${symbol}${(product.price*rate).toFixed(decimal)}</td>
                <td class="error-block">${symbol}${(product.discount*rate).toFixed(decimal)}</td>
                <td>${symbol}${(product.sub_total*rate).toFixed(decimal)}</td>
              </tr>
              `;
          });

          tBody.innerHTML = ``;
          tBody.innerHTML = _content;

          tdTotalQuantity.innerHTML = _order.quantity;
          tdTotalPrice.innerHTML = `${symbol}${(parseFloat(_order.total)*rate).toFixed(decimal)}`;

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

  function cleanOrderModal() {
    inputHiddenId.value = ``;

    displayInlineBlock(btnConfirm);
    displayInlineBlock(btnCancel);
  }

  // $(`input[name="dates"]`).on('change', function(){
  
  //     //re_call_datatable();
  // });

  selectStatus.addEventListener('change', (e) => {
    re_call_datatable();
  });

  $(`#order__export`).on('click', function(e){
    e.preventDefault();

    let _dates_array = $(`input[name="dates"]`).val().split('-');
    
    let _status = $(`#order-select__status`).val();
    window.open(window.location.origin + `/admin/orders/list/excel?status=${_status}&start_date=${_dates_array[0].trim()}&end_date=${_dates_array[1].trim()}`);
  });

  })();