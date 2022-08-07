// const addSummernoteEditor = (element, high) => {
//   element.summernote({
//     height: high,
//     minHeight: null,
//     maxHeight: null,
//     lang: 'es-ES',
//     toolbar: [
//       ['style', ['bold', 'italic', 'underline', 'clear']],
//       ['fontsize', ['fontsize']],
//       ['para', ['ul', 'ol', 'paragraph']],
//       ['object', ['link', 'table', 'picture', 'video']],
//       ['view', ['fullscreen', 'codeview']],
//       ['help', ['help']]
//     ]
//   });
// };

// const destroySummernote = (element) => element.summernote('destroy');

// const lockWindow = () => {
//   $.blockUI({
//     message: "<h1>Espere por favor...</h1>",
//     css: {
//       border: 'none',
//       padding: '15px',
//       backgroundColor: '#000',
//       opacity: .5,
//       color: '#fff',
//       display: 'flex',
//       top: 0,
//       bottom: 0,
//       left: 0,
//       right: 0,
//       'z-index': 1051,
//       width: '100%',
//       'justify-content': 'center',
//       'align-items': 'center',
//     }
//   });
// };

// const unlockWindow = () => $.unblockUI();

// const emptier = (arr) => {
//   arr.forEach(element => {
//     element.innerHTML = '';
//   });
// };

// const addInputHiddenPut = (element, id) => {
//   element.append(`<input type="hidden" name="_method" id="${id}" value="PUT" />`);
// };

// const updatePublishedWithAxios = (route, data, title, successFunction, errorFunction) => {
//   swal({
//       title: title,
//       text: '¿Está usted seguro?',
//       type: 'warning',
//       showCancelButton: true,
//       confirmButtonColor: "#DD6B55",
//       confirmButtonText: 'Aceptar',
//       cancelButtonText: 'Cancelar',
//       closeOnConfirm: true
//     },
//     function () {
//       lockWindow();
//       axios.put(route, data, {
//           headers: {
//             'X-CSRF-TOKEN': $('input[name=_token]').val()
//           }
//         })
//         .then((response) => {
//           unlockWindow();
//           successFunction(response);
//         })
//         .catch((error) => {
//           unlockWindow();
//           errorFunction(error);
//         });
//     }
//   );
// }

// const deleteObjectAxios = (route, data, title, successFunction, errorFunction) => {
//   swal({
//       title: title,
//       text: '¿Está usted seguro?',
//       type: 'warning',
//       showCancelButton: true,
//       confirmButtonColor: "#DD6B55",
//       confirmButtonText: 'Aceptar',
//       cancelButtonText: 'Cancelar',
//       closeOnConfirm: true
//     },
//     function () {
//       lockWindow();
//       axios.delete(route, data)
//         .then((response) => {
//           unlockWindow();
//           successFunction(response);
//         })
//         .catch((error) => {
//           unlockWindow();
//           errorFunction(error);
//         });
//     }
//   );
// }

// const toastNotice = (text) => {
//   $.growl.notice({
//     message: text || "Éxito."
//   });
// }

// const toastError = (text) => {
//   $.growl.error({
//     message: text || "Ha ocurrido un error."
//   });
// }

// const lg = console.log;

// const simbolPublished = (publishedVal) => {
//   var data = {};
//   if (publishedVal == 0) {
//     data.simbol = 'glyphicon glyphicon-eye-open';
//     data.name = 'Publicar';
//     return data;
//   }

//   if (publishedVal == 1) {
//     data.simbol = 'glyphicon glyphicon-eye-close';
//     data.name = 'Dejar de publicar';
//     return data;
//   }
// }

// const getElement = (element) => {
//   return document.querySelector(element);
// };

// const statusPromotion = (promotionAvailabe) => {
//   var data = {};
//   if (promotionAvailabe == 1) {
//     data.style = "";
//     data.name = "Promocionado";
//     return data;
//   } else if (promotionAvailabe == 0) {
//     data.style = "background-color: red;";
//     data.name = "No promocionado";
//     return data;
//   }
// }

// const fillSelect = (selectElement, values, valueSelected, valueFirstOptionText) => {
//   let _content = `<option value="">${valueFirstOptionText}</option>`;

//   values.forEach(value => {
//     _content += `<option value="${value.id}">${value.name}</option>`;
//   });

//   selectElement.innerHTML = _content;

//   if (valueSelected != null) {
//     selectElement.value = valueSelected;
//   }
// }

// const loadGridProducts = (products) => {

//   let _content = '';
//   let _published;
//   let _promotion;
//   let _currentPrice;
    
//   products.forEach(product => {
//     _published = simbolPublished(product.published); //titulo y simbolo
//     _promotion = statusPromotion(product.promotion_available); //titulo y estilo
//     _currentPrice = (product.promotion_available == 1 ? product.price_promotion : product.price);
//     _content +=
//       `
//       <div class="col-lg-4 col-md-6">
//         <article class="c-item">
//           <span class="c-item__price">
//             <sub>s/.</sub>${parseInt(_currentPrice)}
//           </span>
//           <div class="c-item__image">
//             <img src="${product.image}"/>
//           </div>
//           <h3 class="c-item__title">
//             ${product.name}
//           </h3>
//           <div class="u-flex">
//             <button 
//               value="${product.id}" 
//               data-name="${product.name}" 
//               data-published="${product.published}" 
//               title="${_published.name}" 
//               class="c-item__publish btn-info c-item__btn ${_published.simbol}">
//             </button>
//             <button 
//               value="${product.id}" 
//               title="${_promotion.name}" 
//               data-toggle="modal" 
//               data-target="product-promotion-modal" 
//               class="c-item__promotion btn-warning c-item__btn glyphicon glyphicon-tag product__published" style="${_promotion.estilo}";>
//             </button>
//             <button 
//               value="${product.id}" 
//               title="Editar" 
//               class="c-item__edit btn-success c-item__btn c-item__btn glyphicon glyphicon-pencil product__edit">
//             </button>
//             <button 
//               value="${product.id}" 
//               title="Editar imágenes" 
//               data-toggle="modal" 
//               data-target="product-images-modal" 
//               class="c-item__edit c-item__btn c-item__btn glyphicon glyphicon-picture product__edit-images">
//             </button>
//             <button 
//               value="${product.id}" 
//               title="Eliminar" 
//               class="btn-danger c-item__btn glyphicon glyphicon-trash product__delete">
//             </button>
//           </div>
//         </article>
//       </div>`;
//   });

//   let _productsGrid = getElement('#products_grid');

//   _productsGrid.innerHTML = ``;

//   let btnAddProduct = 
//     ` 
//       <div class="col-lg-4 col-md-6">
//         <button class="c-item c-item--add product__add">
//           <i class="glyphicon glyphicon-plus"></i>
//           <h3>Añadir Producto</h3>
//         </button>
//       </div>
//     `;
  
//   _productsGrid.innerHTML = `${btnAddProduct}${_content}`;
// }

// const none = (element) => {
//   element.style.display = `none`;
// };

// export {simbolPublished};
// export {loadGridProducts};
// export {statusPromotion};
// export {emptier};
// export {unlockWindow};
// export {lockWindow};
// export {getElement};
// export {lg};
// export {toastError};
// export {toastNotice};
// export {updatePublishedWithAxios};
// export {addInputHiddenPut};
// export {fillSelect};
// export {deleteObjectAxios};
// export {addSummernoteEditor};
// export {destroySummernote};
// export {none};