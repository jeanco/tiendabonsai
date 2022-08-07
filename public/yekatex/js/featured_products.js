(() => {

	drawFeaturedProducts(0);

	$(document).on('click', '.featured-products_category', function(){
		let _categoryId = $(this)[0].dataset.index;
		drawFeaturedProducts(_categoryId);
	});

	function drawFeaturedProducts(_categoryId){

		axios.get(`/api/categories/${_categoryId}/featured-products`)
			.then((response) => {

				let _content = ``, _price = ``, _labelSale = ``, _percentage = 0;

				// getElement(`#featured_products`).innerHTML = ``;
                $(`#featured_products`).html(``);
				response.data.forEach((value) => {
                    _labelSale = ``;
                    _price = `<p><span class="price">S/.${value.price}</span></p>`;

                    if (value.promotion_available == 1) {

                        _percentage = (100 - (100*value.price_promotion)/value.price).toFixed(0);


                        _price = `<p><span class="price">S/.${value.price_promotion}</span>
                                    <del class="prev-price">S/.${value.price}</del></p>
                                    <div class="label-product l_sale">${_percentage}<span class="symbol-percent">%</span></div>`;

                        _labelSale = `<span class="sticker-new">Promoción</span>`;
                    }
					_content += `
          <div class="col-lg-3 col-md-4 col-sm-12">
              <div class="single-product">
                  <!-- Product Image Start -->
                  <div class="pro-img">
                      <a href="{{ URL::to('/catalogo/perfil') }}">
                          <img class="primary-img galeria__img" src="${value.image}" alt="single-product">
                          <img class="secondary-img galeria__img" src="${value.secondary_image}" alt="single-product">
                      </a>
                      <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                  </div>
                  <!-- Product Image End -->
                  <!-- Product Content Start -->
                  <div class="pro-content">
                      <div class="pro-info">
                          <h4><a href="{{ URL::to('/catalogo/perfil') }}">${value.name}</a></h4>
                          <p>
                            ${_price}
                          </p>
                      </div>
                      <div class="pro-actions">
                          <div class="actions-primary">
                              <a href="" class="add_to_cart" data-index=${value.id} title="Add to Cart"> + Agregar</a>
                          </div>
                      </div>
                  </div>
                  <!-- Product Content End -->
                  ${_labelSale}
              </div>
          </div>`;
				});
				// getElement(`#featured_products`).innerHTML = _content;
                $(`#featured_products`).html(_content);
			});
	}
})();
