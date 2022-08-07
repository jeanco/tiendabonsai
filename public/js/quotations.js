var index;

function datatableOrder(url) {

    index = 0;

    $resolutionsTable = $('#order-datatable').DataTable({
      processing: true,
      serverSide: true,
      destroy: true,
      ajax: url,
      columns: [{
          //0
          data: 'id',
          name: 'id',
          searchable: true
        }, {
          //1
          data: 'index',
          name: 'index',
          searchable: true
        }, {
            //2
            data: 'city_name',
            name: 'city_name',
            searchable: false,
        }, {
            //3
            data: 'emission_date',
            name: 'emission_date',
            searchable: false,
        }, {
            //4
            data: 'number',
            name: 'number',
            searchable: false,
        }, {
            //5
            data: 'customer_first_name',
            name: 'customer_first_name',
            searchable: true,
        }, {
            //6
            data: 'customer_last_name',
            name: 'customer_last_name',
            searchable: true,
        }, {
            //7
            data: 'salesman_first_name',
            name: 'salesman_first_name',
            searchable: false,
        }, {
            //8
            data: 'salesman_last_name',
            name: 'salesman_last_name',
            searchable: false,
        }, {
            //9
            data: 'total',
            name: 'total',
            searchable: false,
        }, {
            //10
            data: 'commission',
            name: 'commission',
            searchable: false,
        }, {
          //11
            data: 'Actions',
            searchable: false
        }
      ],
      "order": [ 0, 'desc' ],
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      },
      "aoColumnDefs": [{
          "bVisible": false,
          "aTargets": [0,6,8]
        },
        {
          "aTargets": [5],
          "mData": "customer_first_name",
          "mRender": function (data, type, full) {
            // return full['meaning'];
            return `${full['customer_first_name']} ${full['customer_last_name']}`
            // return strip_html_tags(full['meaning']);
          }
        }, {
            "aTargets": [1],
            "mData": "index",
            "mRender": function (data, type, full) {
                index += 1;
                return index;
            }
        }, {
            "aTargets": [3],
            "mData": "emission_date",
            "mRender": function (data, type, full) {
                return moment(full['emission_date'], "YYYY-MM-DD").format("DD-MM-YYYY");

            }
        }, {
            "aTargets": [7],
            "mData": "salesman_first_name",
            "mRender": function (data, type, full) {
              // return full['meaning'];
              return `${full['salesman_first_name']} ${full['salesman_last_name']}`
              // return strip_html_tags(full['meaning']);
            }
          }, {
            "aTargets": [9],
            "mData": "total",
            "mRender": function (data, type, full) {
              return `S/. ${full['total']}`;
            }
          }, {
            "aTargets": [10],
            "mData": "commission",
            "mRender": function (data, type, full) {
              return `S/. ${full['commission']}`;
            }
          },
          {
            "aTargets": [11],
            "mData": "Actions",
            "mRender": function (data, type, full) {
              return `<a href="/ver-cotizacion/${full['id']}" class="btn btn-info btn-sm"><i class="far fa-eye"></i></a>`;
            }
          }

      ]
    });
  }

(() => {

  // var startDate;
  // var endDate;

  // $('.input-daterange-datepicker').daterangepicker({
  //     buttonClasses: ['btn', 'btn-sm'],
  //     applyClass: 'btn-danger',
  //     cancelClass: 'btn-inverse',
  //     format: 'DD/MM/YYYY',
  // }, function(start, end) {
  //     // console.log("cdadwa");
  //     // startDate = start;
  //     // endDate = end;
  // });

  var start = moment().subtract(29, 'days');
  var end = moment();
  var startDate, endDate;

  function cb(start, end) {
    startDate = start;
    endDate = end;
    datatableOrder(`/orders/datatable?city_id=${getElement(`#quotation_city`).value}&user_id=${getElement(`#quotation_salesman`).value}&start_date=${start.format('YYYY/MM/DD')}&end_date=${end.format('YYYY/MM/DD')}&customer_id=${getElement(`#quotation_customer`).value}`);
    $('#reportrange span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
  }

  $('#reportrange').daterangepicker({
      startDate: start,
      endDate: end,
      format: 'DD/MM/YYYY',
      monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      ranges: {
         'Hoy': [moment(), moment()],
         'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
         'Hace 7 Días': [moment().subtract(6, 'days'), moment()],
         'Hace 30 Días': [moment().subtract(29, 'days'), moment()],
         'Este Mes': [moment().startOf('month'), moment().endOf('month')],
         'Mes Anterior': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      locale: {
        applyLabel: 'Aplicar',
        fromLabel: 'De',
        toLabel: 'Hasta',
        format: 'DD/MM/YYYY',
        todayLabel: 'Hoy',
        customRangeLabel: 'Configurar periodo',
        lastMonth: 'El mes pasado',
        daysOfWeek: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sáb"],
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        firstDay: 1
    }
  }, cb);

cb(start, end);

    getElement(`#quotation_city`)
        .addEventListener('change', () => {
          datatableOrder(`/orders/datatable?city_id=${getElement(`#quotation_city`).value}&user_id=${getElement(`#quotation_salesman`).value}&start_date=${startDate.format('YYYY/MM/DD')}&end_date=${endDate.format('YYYY/MM/DD')}&customer_id=${getElement(`#quotation_customer`).value}`);
        });

    getElement(`#quotation_customer`)
        .addEventListener('change', () => {
          datatableOrder(`/orders/datatable?city_id=${getElement(`#quotation_city`).value}&user_id=${getElement(`#quotation_salesman`).value}&start_date=${startDate.format('YYYY/MM/DD')}&end_date=${endDate.format('YYYY/MM/DD')}&customer_id=${getElement(`#quotation_customer`).value}`);
        });

    getElement(`#quotation_salesman`)
      .addEventListener('change', () => {
        // console.log(start.format('DD/MM/YYYY'), end.format('DD/MM/YYYY'));
        datatableOrder(`/orders/datatable?city_id=${getElement(`#quotation_city`).value}&user_id=${getElement(`#quotation_salesman`).value}&start_date=${startDate.format('YYYY/MM/DD')}&end_date=${endDate.format('YYYY/MM/DD')}&customer_id=${getElement(`#quotation_customer`).value}`);
      });

})();