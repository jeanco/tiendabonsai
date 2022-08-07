fill_cart();

function fill_cart(){
    let _products = localStorage.getItem('cart');

    if (_products == null) {
        getElement(`#cart-header_quantity`).innerHTML = 0;
        getElement(`#cart-header_quantity_mobil`).innerHTML = 0;
        getElement(`#cart_products`).innerHTML = ``;
        getElement(`#cart_subtotal`).innerHTML = `S/0.00`;

    } else {
        let _productsSplitted = JSON.parse(_products);
        //console.log(Object.values(_productsSplitted));
        getElement(`#cart-header_quantity`).innerHTML = Object.values(_productsSplitted).reduce((a, b) => parseInt(a) + parseInt(b), 0);
        getElement(`#cart-header_quantity_mobil`).innerHTML = Object.values(_productsSplitted).reduce((a, b) => parseInt(a) + parseInt(b), 0);
        //console.log(Object.keys(_productsSplitted).length);
        axios.get(`/api/template_15/products/cart?ids=${localStorage.getItem("cart")}`)
        .then((response) => {
            
            let _content = ``,
                _subTotal = 0;
            getElement(`#cart_products`).innerHTML = ``;

            response.data.forEach((product) => {
                _subTotal += product.price * product.quantity;

                _content += 
                    `<li>
                        <a href="/catalogo/${product.slug}">
                            <figure><img src="${product.image}" data-src="${product.image}" alt="" width="50" height="50" class="lazy"></figure>
                            <strong><span>${product.name}</span>S/.${product.price}</strong>
                        </a>
                        <a href="" data-index=${product.id} class="action cart__remove-product"><i class="ti-trash"></i></a>
                    </li>`;
            });
            
            getElement(`#cart_products`).innerHTML = _content;
            getElement(`#cart_subtotal`).innerHTML = `S/.${_subTotal.toFixed(2)}`;
            // getElement(`#cart_total`).innerHTML = `S/.${_subTotal}`;
        });
    }
}

