fill_cart();
function fill_cart(){
    let _products = localStorage.getItem('cart');

    if (_products == null) {
        getElement(`#cart-header_quantity`).innerHTML = 0;
        $(`#cart-header_quantity`).hide();
    } else {
        let _productsSplitted = _products.split(',');
        $(`#cart-header_quantity`).show();
        getElement(`#cart-header_quantity`).innerHTML = _productsSplitted.length;
    }

}

