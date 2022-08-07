(() => {

	axios.get(`/api/products/cart-lite?ids=${localStorage.getItem("cart")}`)
		.then((response) => {
			let _subTotal = 0;

			response.data.forEach((product) => {
				_subTotal += product.price * product.quantity;
			});

			getElement(`#payment_subtotal`).innerHTML = `S/ ${_subTotal}`;
			getElement(`#payment_total`).innerHTML = `S/ ${_subTotal}`;
		});
})();