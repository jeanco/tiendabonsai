function filterByDateAndStatus()
{
	var dateVal = $('#order-date__').val();
	var status  = $('#order-select__status').val();

	if (dateVal == '') {
		dateVal = 0;
	}

	var ruta = 'orders/filterBy/'+dateVal+'/'+status;
	$.get(ruta,function(data){
		loadGridOrders(data.orders);
	});
}
