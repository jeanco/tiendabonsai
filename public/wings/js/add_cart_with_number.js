$(`#add_item_to_cart_with_number`).on('click', function(e) {
    e.preventDefault();
    let _that = $(this),
        _id = _that[0].dataset.index,
        _quantityToAdd = _that.parent().parent().prev().children().next().children().val(),
        _cartArray;
    if (_quantityToAdd == 0) {

    } else {
        if (localStorage.getItem(`cart`) != null) {
            _cartArray = localStorage.getItem("cart").split(',');
            // _cartArray = _cartArray.filter(number => number != _id);
            for (var i = 1; i <= _quantityToAdd; i++) {
                _cartArray.push(_id);
            }
            localStorage.setItem(`cart`, _cartArray);
        } else {
            _cartArray = [];
            for (var i = 1; i <= _quantityToAdd; i++) {
                _cartArray.push(_id);
            }
            localStorage.setItem(`cart`, _cartArray);
        }
    }

    fill_cart();
});