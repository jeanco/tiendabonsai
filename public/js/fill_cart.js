    function fill_cart(){
        let _products = localStorage.getItem('cart');

        if (_products == null) {
            getElement(`#cart-header_quantity`).innerHTML = 0;
            getElement(`#cart_products`).innerHTML = ``;
        } else {
            let _productsSplitted = _products.split(',');
            getElement(`#cart-header_quantity`).innerHTML = _productsSplitted.length;

            axios.get(`/api/products/cart?ids=${localStorage.getItem("cart")}`)
            .then((response) => {

                let _content = ``,
                    _subTotal = 0;
                getElement(`#cart_products`).innerHTML = ``;

                response.data.forEach((product) => {
                    _subTotal += product.price * product.quantity;

                    _content += `
                        <div class="single-cart-box">
                            <div class="cart-img">
                                <a href="/catalogo/perfil"><img src="${product.image}" alt="cart-image"></a>
                                <span class="pro-quantity">${product.quantity}</span>
                            </div>
                            <div class="cart-content">
                                <h6><a href="/catalogo/perfil"> ${product.name} </a></h6>
                                <span class="cart-price">S/.${product.price}</span>
                            </div>
                            <a class="del-icone cart__remove-product" data-index=${product.id} href="#"><i class="ion-close"></i></a>
                        </div>`;
                        // <span>Color: Yellow</span>
                    // _content += `
                    //     <tr class="cart_item">
                    //         <td class="product-thumbnail" style="vertical-align: middle; padding: 0px;"><a href=""><img src="${product.image}" alt="images" class="img-responsive" style="height: 65px;"></a></td>
                    //         <td class="product-name" style="vertical-align: middle; padding: 0px;">
                    //             <a href="checkout-1.html#">${product.name}</a>
                    //         </td>
                    //         <td class="product-price" style="vertical-align: middle; padding: 0px;">
                    //             <p class="price">S/.${product.price}</p>
                    //         </td>
                    //         <td class="product-quantity" style="vertical-align: middle; padding: 0px;">
                    //             <div class="quantity">
                    //                 <input type="number" data-index="${product.id}" min="1" max=${product.stock} name="quantity" value="${product.quantity}" class="cart__change-quantity">
                    //             </div>
                    //             <input type="hidden" value="${product.price}">
                    //         </td>
                    //         <td class="product-price product-subtotal" style="vertical-align: middle; padding: 0px;">
                    //             <p class="price">S/.${product.price*product.quantity}</p>
                    //         </td>
                    //         <td class="product-acciones" style="vertical-align: middle; padding: 0px;">
                    //             <a href="" data-index="${product.id}" class="btn-clear cart__remove-product"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>
                    //         </td>
                    //     </tr>
                    // `;
                });

                let _costShipping = 0;

                _content += `
                        <div class="cart-footer">
                        <ul class="price-content">
                            <li>Subtotal <span>S/ ${_subTotal}</span></li>
                            <li>Envío <span>S/ ${_costShipping}</span></li>
                            <li>Total <span>S/ ${_subTotal + _costShipping}</span></li>
                        </ul>
                        <div class="cart-actions text-center">
                            <a class="cart-checkout" href="/orden">Comprar</a>
                        </div>
                    </div>`;


                getElement(`#cart_products`).innerHTML = _content;
                // getElement(`#cart_subtotal`).innerHTML = `S/.${_subTotal}`;
                // getElement(`#cart_total`).innerHTML = `S/.${_subTotal}`;
            });
        }
    }
