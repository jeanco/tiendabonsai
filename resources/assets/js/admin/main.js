var $ = window.jQuery;

$(function () {
  $('#show-video').click(function () {
    $('#form-video').addClass('visible')
  });

  $('.hidden-video').click(function () {
    $('#form-video').removeClass('visible')
  });

  $('#show-photo').click(function () {
    $('#form-photo').addClass('visible')
  });

  $('.hidden-photo').click(function () {
    $('#form-photo').removeClass('visible')
  });

  $('.c-category__name').click(function () {
    $('.c-category').removeClass('is-active')
    $(this).parent().parent().addClass('is-active')
  });

  $('.hide-sub-menu').click(function () {
    $('.c-category__container').removeClass('is-active')
    $('.c-category__mask').removeClass('is-show')
    $('.c-category__wrapper').removeClass('u-z4')
  });

  $('.toggle-sub-menu').click(function () {
    $('.c-category__wrapper').removeClass('u-z4')
    $(this).next().toggleClass('is-active')
    $(this).prev().toggleClass('is-show')
    $(this).parent().toggleClass('u-z4')
  });

  $('.c-sub-header__category-button').click(function () {
    $('.c-sub-header__categories-container').toggleClass('is-active')
  });


  $('.owl-carousel').owlCarousel({
    loop: false,
    margin: 10,
    nav: true,
    video: true,
    navText: [
      "<i class='glyphicon glyphicon-chevron-left'>",
      "<i class='glyphicon glyphicon-chevron-right'>"
    ],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      900: {
        items: 2
      },
      1100: {
        items: 3
      }
    }
  });

  $('.dropzone').on('dragover', function() {
     $(this).addClass('is-hover');
   });

   $('.dropzone').on('dragleave', function() {
     $(this).removeClass('is-hover');
   });

  $('.dropzone input').on('change', function(e) {
    var file = this.files[0];

    $(this).removeClass('hover');

    if (this.accept && $.inArray(file.type, this.accept.split(/, ?/)) == -1) {
      return alert('Tipo de archivo no permitido.');
    }

    var thisParent = $(this).parent('.dropzone');

    thisParent.addClass('dropped');
    thisParent.children('img').remove();
    thisParent.children('label').remove();

    if ((/^image\/(gif|png|jpeg)$/i).test(file.type)) {
      var reader = new FileReader(file);

      reader.readAsDataURL(file);

      reader.onload = function(e) {
        var data = e.target.result,
        $img = $('<img />').attr('src', data).fadeIn();

        thisParent.children('.dropzone_image').html($img);
      };
    } else {
      var ext = file.name.split('.').pop();
      thisParent.children('.dropzone_image').html(ext);
    }
  });
});
