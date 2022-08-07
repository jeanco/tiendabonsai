const inputCheckoutMessage = document.querySelector(`#checkout_message`);
const divCartQuantity = getElement(`#cart-header_quantity`);
const divCartQuantityReponsive = getElement(`#cart-header_quantity_mobil`);
const ulCartProducts = getElement(`#cart_products`);
const spanCartSubtotal = getElement(`#cart_subtotal`);

fill_cart();

function fill_cart(){
    let _products = localStorage.getItem('cart');
    const checkout_message = inputCheckoutMessage.value;

    if (_products == null) {
        divCartQuantity.innerHTML = 0;
        divCartQuantityReponsive.innerHTML = 0;
        //getElement(`#cart_products`).innerHTML = ``;
        cleanAllChildren(ulCartProducts);
        spanCartSubtotal.innerHTML = `${getElement('#cart_symbol').value}${parseFloat(0).toFixed(getElement('#cart_decimal').value)}`;
    } else {
        let _productsSplitted = JSON.parse(_products);
        //console.log(Object.values(_productsSplitted));
        divCartQuantity.innerHTML = Object.values(_productsSplitted).reduce((a, b) => parseInt(a) + parseInt(b), 0);
        divCartQuantityReponsive.innerHTML = Object.values(_productsSplitted).reduce((a, b) => parseInt(a) + parseInt(b), 0);
        //console.log(Object.keys(_productsSplitted).length);
        axios.get(`/api/template_11/products/cart?ids=${localStorage.getItem("cart")}`)
        .then((response) => {

            let _content = ``,
                _subTotal = 0;
            
            //getElement(`#cart_products`).innerHTML = ``;
            cleanAllChildren(ulCartProducts);

            response.data.forEach((product) => {
                _subTotal += product.price * product.quantity;

                let price = product.message_about_price;
                if (!product.has_hidden_price) {
                    price = `${getElement('#cart_symbol').value}${(parseFloat(product.price)*parseInt(getElement('#cart_rate').value)).toFixed(getElement('#cart_decimal').value)}`;
                }

                const li = document.createElement('li');

                li.innerHTML = `
                                <a href="/catalogo/${product.slug}">
                                    <figure>
                                        <img src="${product.image}" data-src="${product.image}" alt="" width="50" height="50" class="lazy">
                                    </figure>
                                    <strong>
                                        <span>${product.name}</span>${price}
                                    </strong>
                                    </a>
                                <a href="javascript:void(0);" data-index=${product.id} class="action cart__remove-product" onclick="removeProductFromCart(this)"><i class="ti-close pr-2" style="font-size: 12px; font-weight: 700; color: red;"></i></a>
                                `;

                // _content +=
                //     `<li>
                //         <a href="/catalogo/${product.slug}">
                //             <figure><img src="${product.image}" data-src="${product.image}" alt="" width="50" height="50" class="lazy"></figure>
                //             <strong><span>${product.name}</span>${price}</strong>
                //         </a>
                //         <a href="" data-index=${product.id} class="action cart__remove-product"><i class="ti-close pr-2" style="font-size: 12px; font-weight: 700; color: red;"></i></a>
                //     </li>`;
                ulCartProducts.appendChild(li);
            });

            //getElement(`#cart_products`).innerHTML = _content;
            spanCartSubtotal.innerHTML = `${getElement('#cart_symbol').value}${(_subTotal*parseInt(getElement('#cart_rate').value)).toFixed(getElement('#cart_decimal').value)}`;
            if(getElement('#checkout_active').value == 0){
               spanCartSubtotal.innerHTML = checkout_message;
            }
            // getElement(`#cart_total`).innerHTML = `S/.${_subTotal}`;
        });
    }
}

function removeProductFromCart(element){
    const _id = element.dataset.index;

    if (localStorage.getItem(`cart`) != null) {
        let _cartArray = JSON.parse(localStorage.getItem("cart"));
        delete _cartArray[_id];

        if (_cartArray.length == 0) {
            localStorage.removeItem(`cart`);
        } else {
            localStorage.setItem(`cart`, JSON.stringify(_cartArray));
        }
    }
    fill_cart();

}