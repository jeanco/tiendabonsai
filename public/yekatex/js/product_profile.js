(() => {

    getElement(`#item_price_rule`)
        .addEventListener('change', (e) => {
            let _index = e.target.dataset.index, _quantity = e.target.value;
            axios.get(`/admin/product-prices/prices?index=${_index}&quantity=${_quantity}`)
                .then((risposta) => {
                    // console.log(risposta.data);
                    if (risposta.data != '') {
                        getElement(`#item_price`).innerHTML = `s/${risposta.data}`;
                    }
                });
        });
})();