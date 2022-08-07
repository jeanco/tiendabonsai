(() => {
  drawFeaturedProducts(0);
  

  $(document).on("click", ".featured-products_category", function () {
    let _categoryId = $(this)[0].dataset.index;

    drawFeaturedProducts(_categoryId);
  });

  function drawFeaturedProducts(_categoryId) {
    axios
      .get(`/api/categories/${_categoryId}/featured-products`)
      .then((response) => {
        let _content = ``,
          _price = ``,
          _labelSale = ``;

        // getElement(`#featured_products`).innerHTML = ``;
        //<a href="/productos/${value.slug}" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
        $(`#featured_products`).html(``);
        response.data.forEach((value) => {
          _labelSale = ``;
          _price = `<span class="price black">S/.${value.price}</span>`;

          if (value.promotion_available == 1) {
            _price = `<span class="price black">S/.${value.price_promotion}</span>
                                    <span class="price old">S/.${value.price}</span>`;

            _labelSale = `<div class="label pink">Promoción</div>`;
          }
          _content += ` 
							<div class="col-md-15 col-sm-3 col-xs-6 ">
                            ${_labelSale}
                            <div class="product-item ver2 sombra-box">
                                <div class="prod-item-img bd-style-2 box-catalog-img">
                                    <a href="/productos/${value.slug}" >
                                    <img src="${value.image}" alt="images" style="height: 200px; border-radius: 9px 9px 0px 0px;" class="img-responsive "></a>
                                    <div class="button card-items-box" style="">
                                        <a href="" class="addcart add_to_cart ok" data-index=${value.id}>AGREGAR</a>
                                        <a href="/productos/${value.slug}" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="prod-info">
                                    <h3 style="height: 75px; font-size: 15px;"><a  href="/productos/${value.slug}">${value.name}</a></h3>
                                    <!--div class="ratingstar sm">
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <a href="index.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>-->
                                    <div class="prod-price">
                                        ${_price}
                                    </div>
                                </div>
                            </div>
                        </div>`;
        });
        $(".windows8").hide();
        // getElement(`#featured_products`).innerHTML = _content;
        $(`#featured_products`).html(_content);
      });
  }
})();
