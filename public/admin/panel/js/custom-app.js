var msgError = "Corrija los siguientes campos por favor!";
var msgFailedAction = "Ha ocurrido un error. Inténtelo de nuevo."

var msgSavePost = "La noticia se ha guardado correctamente.";
var msgUpdatePost = "La noticia se ha actualizado correctamente.";
var msgPublishedChangePost = "Se ha cambiado el estado de la noticia";
var msgPublishedChangePostError = "Ha ocurrido un error al intentar cambiar el estado de la noticia"
var msgDeletePost = "Se ha borrado la noticia correctamente.";
var msgDeletePostError = "Ha ocurrido un error. Inténtelo de nuevo.";


var msgImageUploaded = "La imágen se ha cargado correctamente.";
var msgImageDeleted = "La imágen ha sido borrada completamente.";

//Variables Globales
var statusCloseModalSubcategory = 0;
var statusCloseModalPost = false;
var statusCloseModalProduct = false;

var postDropzoneInstance = "";
var postDropzoneInstanceFile = "";

var statusCarouselPost = false;

var statusCarouselProduct = false;

var swiperPost;


$('.mensaje-error').addClass('text-error');
$('.titulo-error').addClass('text-error');

function editor3(element, high) {
  element.summernote({
    height: high || 200,
    lang: 'es-ES',
    toolbar: [
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['fontsize', ['fontsize']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['insert', ['link', 'table']],
    ]
  });
}

function cleanError() {
  $('.mensaje-error').empty();
  $('.titulo-error').empty();
}

function cleanEditor(element) {
  element.next().next().remove();
  element.prev().remove();
  element.css('display', 'block');
}

function cleanDropzone(identificador) {
  var myDropzone = Dropzone.forElement("#" + identificador);
  var files = myDropzone.files;
  myDropzone.removeAllFiles(true)
}

function beautifulAlert(title, text, type, confirmText, ruta, idForm, successFunction, errorFunction) {
  swal({
      title: title,
      text: text,
      type: type,
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: confirmText,
      closeOnConfirm: true
    },
    function () {
      var formData = new FormData($('#' + idForm)[0]);
      ajaxall_POST_formData(ruta, formData, successFunction, errorFunction);
    });
}

function saveOrUpdateFormData(formId, ruta, successFunction, errorFunction) {
  cleanError();
  var formData = new FormData($('#' + formId)[0]);
  ajaxall_POST_formData(ruta, formData, successFunction, errorFunction);
}

// $('#user_editar_perfil').on('click', function () {
//   $('#modalProfile').modal('show');
// });

$('#user_editar_password').on('click', function () {
  $('#password_user-id').val('');
  $('#form_password')[0].reset();
  $('#miModalpassword').modal('show');
  $('#password_user-id').val($('#user_editar_perfil').data('index'));
});

$('#change_password').click(function (event) {
  event.preventDefault();
  $('#error-password').empty();
  $('#error-password_confirmation').empty();
  saveOrUpdateFormData('form_password', 'users/password', successChangePassword, errorChangePassword);
});

function successChangePassword(data) {
  if (data.success == true) {
    window.location.replace("../plataforma");
  } else if (data.success == false) {
    $.growl.error({
      message: "Ha ocurrido un error actualizando la contraseña. Inténtelo de nuevo"
    })
  }
}

function errorChangePassword(jqXHR, textStatus, errorThrown) {
  $('#password_error').append(msgError);
  $.each(jqXHR.responseJSON, function (key, value) {
    if (key == "password") {
      $.each(value, function (errores, eror) {
        $('#error-password').append("<li class='error-block'>" + eror + "</li>");
      });
    } else if (key == "password_confirmation") {
      $.each(value, function (errores, eror) {
        $('#error-password_confirmation').append("<li class='error-block'>" + eror + "</li>");
      });
    }
  });
}

function getSimbolPublished(publishedVal) {
  var data = {};
  if (publishedVal == 0) {
    data.simbol = 'glyphicon glyphicon-eye-open';
    data.name = 'Publicar';
    return data;
  }

  if (publishedVal == 1) {
    data.simbol = 'glyphicon glyphicon-eye-close';
    data.name = 'Dejar de publicar';
    return data;
  }
}

//Just for product.


function charge_slider(area, data, container) {
  area.empty();
  if (data == null) {} else {
    area.append('<div id="' + container + '" class="owl-carousel"></div>');
    $.each(data, function (id, content) {
      // $('#'+config).append('<div class="item"><img class="lazyOwl" data-src="'+content.resource+'" alt="" height="100"><div align="center"><button class="btn btn-default recorta_slide" id="'+content.id+'" value="'+content.resource+'">Recortar</button><button class="btn btn-default elimina_slide" value="'+content.id+'">Eliminar</button></div></div>');
      $('#' + container).append('<div class="item"><img class="lazyOwl" data-src="' + content.resource + '" alt="" height="100" style="display: block;margin: 0 auto 2rem;"><div align="center"><button class="btn btn-default elimina_slide" value="' + content.id + '">Eliminar</button></div></div>');
    });
    $("#" + container).owlCarousel({
      items: 4,
      lazyLoad: true,
      navigation: true
    });
  }
}

function addImageToSlide(swiper, swiperContainer, images) {
  var number = swiperContainer.attr('data-number');
  if (number == "") {
    number = -1;
  } else {
    number = parseInt(number);
  }
  $.each(images, function (i, image) {
    number = number + 1;
    swiper.appendSlide('<div class="swiper-slide" data-index="' + number + '" style="display:flex;flex-direction:column"><img src="' + image.resource_thumb + '" alt="" /><button class="image-slide-button__delete form-control" data-image_id="' + image.id + '" style="margin-top: 10px;max-width:8rem;">Eliminar</button></div>');
  });
  swiperContainer.attr('data-number', number);
}



function deleteSlide(index, imageId, swiper, swiperContainer) {
  swal({
      title: "Borrar Imagen",
      text: "¿Estás seguro?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Si,borrar",
      closeOnConfirm: true
    },
    function () {
      var ruta = "contents";
      lockWindow();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
      });
      $.ajax({
        url: ruta,
        data: {
          'contentId': imageId
        },
        type: 'DELETE',
        success: function (result) {
          unlockWindow();
          if (result.success == true) {
            swiper.removeSlide(index);
            var number = swiperContainer.attr('data-number');
            swiperContainer.attr('data-number', parseInt(number) - 1);
            $.growl.notice({
              message: msgImageDeleted
            });
          }
          if (result.success == false) {
            $.growl.error({
              message: msgFailedAction
            });

          }
        }
      });
    });
}

function addImageToSliderGalleryProject(swiper, swiperContainer, images) {
  var number = swiperContainer.attr('data-number');
  if (number == "") {
    number = -1;
  } else {
    number = parseInt(number);
  }
  $.each(images, function(i, image) {
    number = number + 1;
    swiper.appendSlide('<div class="swiper-slide" data-index="' + number + '" style="display:flex;flex-direction:column"><img src="' + image.resource_thumb + '" alt="" /><button class="btn_image-slider-gallery__delete_project form-control" data-image_id="' + image.id + '" style="margin-top: 10px;max-width:8rem;">Eliminar</button></div>');
  });
  swiperContainer.attr('data-number', number);
  swiperContainer.show();
}

function deleteSlideGallery(index, imageId, swiper, swiperContainer) {

 

   swal({
      title: "Borrar Imagen",
      text: "¿Estás seguro?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Si,borrar",
      closeOnConfirm: true
    },
    function() {
      let _route = "contents/" + imageId;
      lockWindow();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
      });
      $.ajax({
        url: _route,
        data: {},
        type: 'DELETE',
        success: function(result) {
          unlockWindow();
          if (result.success == true) {
            swiper.removeSlide(index);
            var number = swiperContainer.attr('data-number');
            swiperContainer.attr('data-number', parseInt(number) - 1);

            $.growl.notice({
              message: msgImageDeleted
            });
          }
          if (result.success == false) {
            $.growl.error({
              message: msgFailedAction
            });

          }
        }
      });
    });
}

function lockElement(element) {
  element.attr("disabled", true);
}

function unlockElement(element) {
  element.attr("disabled", false);
}

function addInputPut(form, id) {
  form.append('<input type="hidden" name="_method" id="' + id + '" value="PUT" />');
}


function fillAnySelect(selectElement, values, valueSelected) {
  let _content = '';

  $.each(values, function(i, value) {
    _content += '<option value="' + value.id + '">' + value.name + '</option>';
  });

  selectElement.empty();
  selectElement.append(_content);

  if (valueSelected != null) {
    selectElement.val(valueSelected);
  }
}

//Carousels

//Post
function startCarouselPost() {
  swiperPost = new Swiper('#post-gallery_swiper-container', {
    loop: false,
    pagination: '#post-gallery_swiper-pagination',
    nextButton: '#post-gallery_swiper-button-next',
    prevButton: '#post-gallery_swiper-button-prev',
    slidesPerView: 3,
    //centeredSlides: true,
    //paginationClickable: true,
    spaceBetween: 30,
  });
}

function addImageToSliderPost(swiper, swiperContainer, images) {
  var number = swiperContainer.attr('data-number');
  if (number == "") {
    number = -1;
  } else {
    number = parseInt(number);
  }
  $.each(images, function (i, image) {
    number = number + 1;
    swiper.appendSlide(`  <div class="swiper-slide"
                            data-index="'+number+'" 
                            style="display:flex;flex-direction:column">
                              <img src="${image.resource_thumb}" alt="" />
                              <button class="image-slider-post__delete 
                                form-control" data-image_id="${image.id}" 
                                style="margin-top: 10px;max-width:8rem;">
                                Eliminar
                              </button>
                           </div>`);
  });
  swiperContainer.attr('data-number', number);
}

function ajaxFormData(route, data, successFunction, errorFunction) {
  lockWindow();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('input[name=_token]').val()
    }
  });
  $.ajax({
    url: route,
    type: 'POST',
    data: data,
    contentType: false,
    processData: false,
    success: function (result) {
      unlockWindow();
      successFunction(result);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      unlockWindow();
      errorFunction(jqXHR, textStatus, errorThrown);
    }
  });
}

/*$(document).on("hidden.bs.modal",".modal-of-summernote", function () {
  lg("Closing a summernote modal!");
  $("body").addClass("modal-open");
});*/

function _fillSelect(selectElement, values, valueSelected, valueFirstOptionText) {
    
  if (selectElement != null) {
    let _content = `<option value="">${valueFirstOptionText}</option>`;

    values.forEach(value => {
      _content += `<option value="${value.id}">${value.name}</option>`;
    });

    selectElement.innerHTML = _content;

    if (valueSelected != null) {
      selectElement.value = valueSelected;
    }
  }
}

function _fillSelectWithOutFirstOption(selectElement, values, valueSelected) {

  if (selectElement != null) {
    let _content = ``;
    values.forEach(value => {
      _content += `<option value="${value.id}">${value.name}</option>`;
    });

    selectElement.innerHTML = _content;

    if (valueSelected != null) {
      selectElement.value = valueSelected;
    }
  }
}

function block_window(){
  $.blockUI(
    {
      message: "<h1>Espere por favor...</h1>",
      css: {
       border: 'none',
       padding: '15px',
       backgroundColor: '#000',
       opacity: .5,
       color: '#fff',
       display: 'flex',
       top: 0,
       bottom: 0,
       left: 0,
       right: 0,
       'z-index': 1051,
       width :'100%',
       'justify-content': 'center',
       'align-items': 'center',
   } });
}

function unlock_window(){
  $.unblockUI();
}


function updatePublishedAxios(route, data, title, successFunction, errorFunction) {
  swal({
      title: title,
      text: '¿Está usted seguro?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: 'Aceptar',
      cancelButtonText: 'Cancelar',
      closeOnConfirm: true
    },
    function() {
      lockWindow();
      axios.put(route, data, {
          headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
          }
        })
        .then((response) => {
          unlockWindow();
          successFunction(response);
        })
        .catch((error) => {
          unlockWindow();
          errorFunction(error);
        });
    }
  );
}


// function deleteObjectAxios(route, data, title, successFunction, errorFunction){
//     swal({
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

// function toastNotice(text){
//   $.growl.notice({
//     message: text || "Éxito."
//   });
// }

// function toastError(text){
//   $.growl.error({
//     message: text || "Ha ocurrido un error."
//   });
// }