function selectStatusOrder(statusVal)
{
	if (statusVal == '') {
		$.get('orders',function(data){
			loadGridOrders(data.orders);
		});
	}
	else {
		$.get('orders/status/'+statusVal,function(data){
			loadGridOrders(data.orders)
		});
	}
}
