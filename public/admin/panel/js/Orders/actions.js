$(document).on('click', '.view-order', function () {
  cleanModalOrder();
  getOrderToSee($(this).data('order_id'));
});

$('#order-to-search').on('keyup', function () {
  filterOrders();
  // orderToSearch($('#order-to-search').val());
});

$('#order-confirm').on('click', function () {
  confirmOrder($('#textarea-order-message').val());
});

$('#order-cancel').on('click', function () {
  cancelOrder();
});

$('#btn-x_modal-order__close').on('click', function () {
  cleanModalOrder();
});

$('#order-show-pdf').on('click', function () {
  window.open(window.location.origin + "/orden/" + $('#order-code').val());
});

$('#order-select__status').on('change', function () {
  filterOrders();
  //filterByDateAndStatus();
});

$('#order-date__').on('change', function () {
  filterOrders();
  //filterByDateAndStatus();
});

function filterOrders() {

  let _route = `orders/filter-by?q=${$('#order-to-search').val()}&date=${$('#order-date__').val()}&status=${$('#order-select__status').val()}`;
  

  axios.get(_route)
    .then(({data}) => {
      loadGridOrders(data);
    });

}

function cleanModalOrder() {
  $('#order-id').val('');
  $('#order-confirm').show();
  $('#order-cancel').show();
  cleanEditor($('#textarea-order-message'));
  $('#textarea-order-message').val('');
  $('#order-description').val('');
}