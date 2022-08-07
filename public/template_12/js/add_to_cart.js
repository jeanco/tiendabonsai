(() => {

  fill_cart();

  //id => quantity
  //json.stringify{'20' => 100}
  //json.parse;

	$(document).on('click', '.add_to_cart', function(e) {
		e.preventDefault();
		let _productId = $(this)[0].dataset.index;
		addingProduct(_productId);
		fill_cart();
	});

    function addingProduct(productId) {
		if (localStorage.getItem("cart") == null) {
			let _cart = {};
      //Object.assign(_cart, {productId: 1});
      _cart[productId] = 1;
			//_cart.push(productId);
			localStorage.setItem(`cart`, JSON.stringify(_cart));
		} else {

			let _cartSaved = JSON.parse(localStorage.getItem("cart"));

      if (_cartSaved[productId]) {
        let _value = parseInt(_cartSaved[productId])+1;
        _cartSaved[productId] = _value;
      } else {
        _cartSaved[productId] = 1;
        //Object.assign(_cartSaved, {productId: 1});
      }
		  //_cartSaved.push(productId);
      localStorage.setItem(`cart`, JSON.stringify(_cartSaved));
		}

        Swal.fire({
          position: 'center',
         // icon: 'success',
          title: '¡Se ha agregado a su carrito!',
          showConfirmButton: false,
          timer: 1500,
          /*showClass: {
            popup: 'animated fadeInDown faster'
          },*/
           imageUrl: 'https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/dab60938212491.5968c68fa9113.gif',
          imageAlt: 'Custom image',
          imageWidth: 250,
           // imageHeight: 200,
        })
    }

    $(document).on('click', '.cart__remove-product', function(e) {
        e.preventDefault();

        let _id = $(this)[0].dataset.index;
        if (localStorage.getItem(`cart`) != null) {
            let _cartArray = JSON.parse(localStorage.getItem("cart"));

            //_cartArray = _cartArray.filter(number => number != _id);
            delete _cartArray[_id];

            if (_cartArray.length == 0) {
                localStorage.removeItem(`cart`);
                //window.location.replace(`/orden-vacio`);
            } else {
                localStorage.setItem(`cart`, JSON.stringify(_cartArray));
            }

            // $(this).parent().parent().remove();
            // reCalculatingTotal()
        } else {
            console.log("Cart vacío");
            // alert("Error");
        }
        fill_cart();
    });

})();
