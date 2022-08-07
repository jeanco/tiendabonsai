Dropzone.options.myDropzone = {
  autoProcessQueue: true,
  uploadMultiple: true,
  maxFilezise: 10,
  parallelUploads: 1,
  maxFiles: 5,

  init: function () {
    myDropzone = this;

    this.on("addedfile", function (file) {
      //  var _that  = this;
      // 	 setTimeout(function () {
      // 		 var _imageWidth = 0, _imageHeight = 0;
      //
      // 		 _imageWidth = file.width;
      // 		 _imageHeight = file.height;
      //
      // 		 if (_imageHeight == 350 && _imageWidth == 1350) {
      // 		 _that.processQueue();
      // 		 }else {
      // 		 swal('La imagen no posee las dimensiones indicadas 1350x350.')
      // 			 _that.removeFile(file);
      // 		 }
      // 	 }, 700);
    });

    this.on("complete", function (file) {
      unlockWindow();
      if (file.status == "canceled") {

      } else {
        myobjeto = JSON.parse(file.xhr.response);
        if (getElement(`#cover_delete-photo`).value) {
          $('#company_carousel').trigger('add.owl.carousel', ['<li class="item item__photo"><img src="' + myobjeto.resource_thumb + '" width="100%"/><div class="item__controls"><button type="button" class="btn btn-primary company_delete_cover" data-index="' + myobjeto.id + '" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></button> </div></li>', 0]).trigger('refresh.owl.carousel');
        } else {
          $('#company_carousel').trigger('add.owl.carousel', ['<li class="item item__photo"><img src="' + myobjeto.resource_thumb + '" width="100%"/><div class="item__controls"></div></li>', 0]).trigger('refresh.owl.carousel');
        }

      }
      myDropzone.removeFile(file);
    });

    this.on("uploadprogress", function (file) {
      lockWindow();
    });

    // this.on("totaluploadprogress",function(file,progress,bytesSend){
    // 	console.log(progress);
    // });

    this.on("success",
      myDropzone.processQueue.bind(myDropzone)
    );
  }
};

var productDropzone = $('#product_dropzone').dropzone({
  dictDefaultMessage: "Arrastre sus imágenes aquí!.",
  autoProcessQueue: true,
  parallelUploads: 1,
  uploadMultiple: true,
  maxFilezise: 10,
  maxFiles: 5,

  init: function () {
    productDropzone = this;

    this.on("addedfile", function (file) {

    });

    this.on("complete", function (file) {
      this.removeFile(file);
    });

    this.on("uploadprogress", function (progress) {});

    this.on('canceled', function (file) {});

    this.on('error', function (file) {});

    this.on("success", function (file) {
      var _that = "",
        _myobjeto = {};
      _that = this;
      _myobjeto = JSON.parse(file.xhr.response);

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
      });
      $.post('contents/change-model-id', {
        'modelId': $('#images_product-id').val(),
        'type': (!!document.getElementById("product_gallery-type")) ? document.getElementById("product_gallery-type").value : 1,
        'contentId': _myobjeto.id
      }, function (data) {
        if (data.success == true) {
          toastNotice(msgImageUploaded);
          addImageToSliderProduct(swiperProduct, $('#product-swiper-container'), data.images);
          addSummernoteEditorMini($(`.textarea-slider-product-images`));
        }
        if (data.success == false) {
          toastError();
        }
      });
      _that.removeFile(file);
    });
  }
});


var galleryDropzone = $('#gallery-dropzone').dropzone({
    dictDefaultMessage: "Arrastre sus imágenes aquí!.",
    autoProcessQueue: true,
    parallelUploads: 1,
    uploadMultiple: true,
    maxFilezise: 10,
    maxFiles: 5,

    init: function() {
       galleryDropzone = this;

       this.on("addedfile", function() {
       });

       this.on("complete", function(file) {
        this.removeFile(file);
       });

       this.on("uploadprogress", function(progress) {
       });

       this.on('canceled',function(file){
       });

       this.on('error',function(file){
         $.growl.error({ message: msgFailedAction })
       });






      /* this.on("success",function(file){
         let _that = "", _myobjeto = {};

         _that = this;
         _myobjeto = JSON.parse(file.xhr.response);

         addImageToSliderGalleryProject(swiperGallery,$('#gallery_swiper-container'), _myobjeto);

         _that.removeFile(file);
       });*/


       this.on("success",function(file){
        var _that = "", _myobjeto = {};
        _that = this;
        _myobjeto = JSON.parse(file.xhr.response);

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
          }
        });
        $.post('contents/change-model-id_gallery',{'modelId':$('#gallery_id').val(),'contentId':_myobjeto.id},function(data){
          if (data.success == true) {
            $.growl.notice({ message: msgImageUploaded });
            addImageToSliderGalleryProject(swiperGallery,$('#gallery_swiper-container'),data.images);
            $('#gallery_swiper-container').show();
          }
          if (data.success == false) {
            $.growl.error({ message: msgFailedAction })
          }
        });
        _that.removeFile(file);
      });




    }
});

var postDropzone = $('#post_dropzone').dropzone({
  dictDefaultMessage: "Arrastre sus imágenes aquí!.",
  autoProcessQueue: true,
  uploadMultiple: true,
  parallelUploads: 1,
  maxFilezise: 10,
  maxFiles: 5,

  init: function () {
    postDropzone = this;

    this.on("addedfile", function (file) {

    });

    this.on("complete", function (file) {
      this.removeFile(file);
    });

    this.on('canceled', function (file) {});

    this.on('sending', function (file) {

    });

    this.on('error', function (file) {});

    this.on("uploadprogress", function (progress) {
    });

    this.on("success", function (file) {
      var _that = "",
        _myobjeto = {};

      _that = this;
      _myobjeto = JSON.parse(file.xhr.response);

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
      });
      $.post('contents/change-model-id', {
        'modelId': $('#post-images_post-id').val(),
        'type':  1,
        'contentId': _myobjeto.id
      }, function (data) {
        if (data.success == true) {
          $.growl.notice({
            message: msgImageUploaded
          });
          addImageToSliderPost(swiperPost, $('#post-gallery_swiper-container'), data.images);
        }
        if (data.success == false) {
          $.growl.error({
            message: msgFailedAction
          })
        }
      });
      _that.removeFile(file);
    });
  }
});
