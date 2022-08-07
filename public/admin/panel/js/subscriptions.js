  function datatableSubscriptions() {
  	$subscriptionsDatatable = $('#subscriptions-datatable').DataTable({
  		processing: true,
  		serverSide: true,
  		destroy: true,
  		ajax: 'suscripciones/datatable',
  		columns: [{
  			//0
  			data: 'id',
  			name: 'id',
  			searchable: false
  		}, {
  			//1
  			data: 'code',
  			name: 'code',
  			searchable: false
  		}, {
        //4
        data: 'name',
        name: 'name',
        searchable: true
      },{
  			//2
  			data: 'email',
  			name: 'email',
  			searchable: true
  		}, {

  			//3
  			data: 'cellphone',
  			name: 'cellphone',
  			searchable: false
  		},  {
  			//5
  			data: 'Actions',
  			searchable: false
  		}],
  		"language": {
  			"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
  			// "search": "_INPUT_",
  			"searchPlaceholder": "Buscar"
  		},
  		"aoColumnDefs": [{
  			"bVisible": false,
  			"aTargets": [0, 5]
  		}
  		// {
  		// 	"aTargets": [5],
  		// 	"mData": "birthday",
  		// 	"mRender": function(data, type, full) {

  		// 		if (!full['birthday']) {
  		// 			return '';
  		// 		}

  		// 		let _date = moment(full['birthday'], 'YYYY/MM/DD').format();
  		// 		let _newDate = moment(_date).format('DD/MM/YYYY');
  		// 		return _newDate;
  		// 	}
  		// },
  		]
  	});
  }

  (() => {
	datatableSubscriptions();
  })();