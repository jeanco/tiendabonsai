$(`#add_item_to_cart_with_number`).on('click', function(e) {
    e.preventDefault();
    let _that = $(this),
        _id = _that[0].dataset.index,
        _quantityToAdd = $(`#quantity_1`).val(),
        _cartArray;
    
    if (_quantityToAdd) {
        if (localStorage.getItem(`cart`) != null) {

            _cartArray = JSON.parse(localStorage.getItem("cart"));
            if (_cartArray[_id]) {
              let _value = parseInt(_cartArray[_id])+parseInt(_quantityToAdd);
              _cartArray[_id] = _value;
            } else {
              _cartArray[_id] = _quantityToAdd;
            }

            localStorage.setItem(`cart`, JSON.stringify(_cartArray));
        } else {

            let _cartArray = {};
            _cartArray[_id] = _quantityToAdd;
            localStorage.setItem(`cart`, JSON.stringify(_cartArray));
         }
    }

     Swal.fire({
          position: 'center',
         // icon: 'success',
          title: '¡Se ha agregado a su carretilla de compras!',
          showConfirmButton: false,
          timer: 1500,
          /*showClass: {
            popup: 'animated fadeInDown faster'
          },*/
           imageUrl: '../template_2/img/carretilla_black.png',  
          imageAlt: 'Custom image',
          imageWidth: 250,
           // imageHeight: 200,
        })

    fill_cart();
});