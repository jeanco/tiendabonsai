function orderToSearch(byName)
{	
	if (byName == '') {
		$.get('orders',function(data){
				loadGridOrders(data.orders);
		});
	}
	else {
		$.get('orders/customers/'+byName,function(data){
				loadGridOrders(data);
		});
	}
}
