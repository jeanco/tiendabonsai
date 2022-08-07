function loadGridProducts(categoryId, subcategoryId) {
  let _route = `categories/${categoryId}/subcategories/${subcategoryId}/products`;
  axios.get(_route)
    .then(({data}) => {
      var content = '';
      var published;
      var promotion;
      var price;

      data.forEach(product => {
        published = getSimbolPublished(product.published); //titulo y simbolo
        promotion = getStatusPromotion(product.promotion_available); //titulo y estilo
        currentPrice = (product.promotion_available == 1 ? product.price_promotion : product.price);
        content = content +
          '<div class="col-lg-4 col-md-6">' +
          ' <article class="c-item">' +
          '<span class="c-item__price"><sub>s/.</sub>' + parseInt(currentPrice) + '</span>' +
          '<div class="c-item__image">' +
          '<img src="' + product.image + '"/>' +
          '</div>' +
          '<h3 class="c-item__title">' + product.name + '</h3>' +
          '<div class="u-flex">' +
          '<button onClick="productPublished(this)" value="' + product.id + '" data-name="' + product.name + '" data-published="' + product.published + '" title="' + published.name + '" data-target="#item-published" data-toggle="modal" class="c-item__publish btn-info c-item__btn ' + published.simbol + '"></button>' +
          '<button onClick="productPromotion(this)" value="' + product.id + '" title="' + promotion.name + '" data-toggle="modal" data-target="product-promotion-modal" class="c-item__promotion btn-warning c-item__btn glyphicon glyphicon-tag" style="' + promotion.estilo + '";></button>' +
          '<button onClick="productEdit(this)" value="' + product.id + '" title="Editar" class="c-item__edit btn-success c-item__btn c-item__btn glyphicon glyphicon-pencil"></button>' +
          '<button onClick="productEditImages(this)" value="' + product.id + '" title="Editar imágenes" data-toggle="modal" data-target="product-images-modal" class="c-item__edit c-item__btn c-item__btn glyphicon glyphicon-picture"></button>' +
          '<button onClick="productDelete(this)" value="' + product.id + '" title="Eliminar" class="btn-danger c-item__btn glyphicon glyphicon-trash"></button>' +
          '</div>' +
          '</article>' +
          '</div>';
        });

        $('#products_grid').empty();

        //Cuadro boton para agregar nuevo producto en la grilla products
        var btnAddProduct = '<div class="col-lg-4 col-md-6">' +
          '<button class="c-item c-item--add product__add">' +
          '<i class="glyphicon glyphicon-plus"></i>' +
          '<h3>Añadir Producto</h3>' +
          '</button>' +
          '</div>';
        $('#products_grid').append(btnAddProduct + content);

    });
}
