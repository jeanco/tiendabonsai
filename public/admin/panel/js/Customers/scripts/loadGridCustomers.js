function loadGridCustomers(customers)
{	
	let _content= '', name='';
	if (customers) {
		$.each(customers,function(k,customer){

			if (customer.customer_type == 1) {
				name = customer.first_name+' '+customer.last_name;
			} else if(customer.customer_type == 2){
				name = customer.legal_name;
			}

			_content = 
			_content +  '<div class="col-lg-3 col-md-4 col-sm-6 phs" style="width: 15%;">'+
				          '<li class="item-account">'+
				            '<figure class="item-image">'+
				              '<img src="http://www.pngall.com/wp-content/uploads/2016/05/Customer-PNG.png" alt="" />'+
							'</figure>'+
							'<span style="display: block;text-align: center;">'+name+'</span>'+
				            '<div class="item__controls">'+
							 '<button type="button" style="width: 50%;" data-index="'+customer.id+'" class="btn btn-success customer_edit"  data-target="#add-customers" data-toggle="modal" title="Editar">'+
								 '<i class="glyphicon glyphicon-pencil"></i>'+
							 '</button>'+
				              '<button type="button" style="width: 50%;" data-index="'+customer.id+'" class="btn btn-danger customer_delete"  title="Eliminar">'+
				                '<i class="glyphicon glyphicon-trash"></i>'+
				              '</button>'+
				            '</div>'+
				          '</li>'+
				        '</div>';
		});
		$('#customers_grid').empty();
		$('#customers_grid').append(_content);
	}
}
