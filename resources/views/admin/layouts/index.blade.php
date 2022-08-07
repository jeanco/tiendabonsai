<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Plataforma | {{ App\Company::first()->name_company }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> {{-- Select2 --}}
  <link href="{{ URL::asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet"> {{-- Dropzone --}}
  <link href="{{ URL::asset('admin/plugins/dropzone/dropzone.css') }}" rel="stylesheet"> {{-- Sweet Alert --}}
  <link href="{{ URL::asset('admin/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet"> {{-- growl alert --}}
  <link href="{{ URL::asset('admin/plugins/growl/jquery.growl.css') }}" rel="stylesheet">
  {{-- Owl Carousel --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.6/assets/owl.carousel.min.css" rel="stylesheet"> {{-- Swiper --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css"> {{-- Slick carousel --}}
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" /> {{-- Bootstrap --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet"> {{-- Bootstrap Toggle --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"> {{-- Datatables style --}}
  <link href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet"> {{-- Estilos del carousel --}}

  {{-- Summernote Style --}}
  <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote.css') }}">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">

{{--<link href="https://db.onlinewebfonts.com/c/61ffb0b2f8ea8d9ca29bf6865856f4cd?family=Hyundai+Sans+Head" rel="stylesheet" type="text/css"/>

<link href="https://db.onlinewebfonts.com/c/7da8964eb5bfb640a6462a63ffb9c7ba?family=Hyundai+Sans+Text+KR+Medium" rel="stylesheet" type="text/css"/>

<link href="https://db.onlinewebfonts.com/c/146989febbb861929ea12fa23a8f3180?family=Hyundai+Sans+Head+Office" rel="stylesheet" type="text/css"/>

<link href="//db.onlinewebfonts.com/c/5bab52d2b945c1aa19b539372d7f6b62?family=Hyundai+Sans+Text" rel="stylesheet" type="text/css"/>--}}

  {{-- Datepicker --}}
  <link rel="stylesheet" href="{{ asset('admin/plugins/datepicker/datepicker3.css') }}">

  {{-- Daterangepicker --}}
  <link href="/admin/plugins/daterangepicker3/daterangepicker.css" rel="stylesheet">


  {{-- Select2 --}}
  <link href="{{ URL::asset('admin/plugins/select2/select2-last.min.css') }}" rel="stylesheet">


  <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap-colorpicker/css/colorpicker.css')}}">

  <style>
    .swiper-container {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
  </style>
  <style>
    :root {
       --main-bg-color-header-admin: #00559e;
    }
  </style>

  <!-- Fontawesome 5.13 -->
  <link rel="stylesheet" href="/admin/fonts/fontawesome/css/all.min.css">

  {{-- Estilos generales --}}
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/panel/css/custom-app.css') }}" />
  @yield('styles')
  <link rel="stylesheet" href="{{asset('admin/css/main.css')}}">
  <style>
    .c-header__nav {background-color: var(--main-bg-color-header-admin);}
  </style>

  <link rel="stylesheet" href="{{asset('admin/css/admin_custom.css')}}">

</head>

<body>
  @include('admin.layouts.header')

  @yield('content')
  {{-- @include('admin.modals.company.video')
  @include('admin.modals.company.account')
  @include('admin.modals.company.services')
  @include('admin.modals.company.news')
  @include('admin.modals.company.news.news_images')
  @include('admin.modals.company.customer')
  @include('admin.modals.company.user')
  @include('admin.modals.company.value')
  @include('admin.modals.company.campaign')
  @include('admin.modals.company.catalog') --}}

  @include('admin.modals.user.profile')
  @include('admin.modals.user.password')
  @include('admin.modals.item.subcategory')
  @include('admin.modals.item.category')
  @include('admin.modals.item.promotion')
  @include('admin.modals.item.prices-config')
  @include('admin.modals.item.images')
  @include('admin.modals.order.view-order')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-hover-dropdown/2.2.1/bootstrap-hover-dropdown.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.responsive-tabs/1.6.0/jquery.responsiveTabs.min.js">
  </script>

  {{-- Sweet alert --}}
  <script type="text/javascript" src="{{ URL::asset('admin/plugins/sweet-alert/sweetalert.min.js') }}"></script>

  {{-- Datepicker --}}
  <script type="text/javascript" src="{{ URL::asset('admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>


  {{-- Bootstrap --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

  {{-- Owl Carousel --}} {{--
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.6/owl.carousel.min.js"></script> --}} {{-- Bootstrap Toggle --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

  {{--Datatable js--}}
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

  {{-- growl alert --}}
  <script type="text/javascript" src="{{ URL::asset('admin/plugins/growl/jquery.growl.js') }}"></script>

  {{-- Select2 --}}
  {{-- <script type="text/javascript" src="{{ URL::asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script> --}}
  <script type="text/javascript" src="{{ URL::asset('admin/plugins/select2/select2-last.min.js') }}"></script>

  {{-- Swiper --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>

  {{-- Slick carousel --}}
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

  {{-- Dropzone --}}
  <script type="text/javascript" src="{{ URL::asset('admin/plugins/dropzone/dropzone.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('admin/panel/js/Dropzone/my-dropzone.js') }}"></script>

  {{-- Jquery BlockUI --}}
  <script type="text/javascript" src="https://malsup.github.io/jquery.blockUI.js"></script>

  {{-- Users --}}
  <script type="text/javascript" src="{{ URL::asset('admin/panel/js/Users/actions.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('admin/panel/js/Users/scripts/userProfileEdit.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('admin/panel/js/Users/scripts/userProfileSave.js') }}"></script>

  {{-- Summernote js --}}
  <script src="{{asset('admin/plugins/summernote/summernote.js')}}"></script>
  <script src="{{asset('admin/plugins/summernote/summernote-es-ES.min.js')}}"></script>

  {{-- Moment.js --}}
  <script type="text/javascript" src="{{ URL::asset('admin/plugins/moment/moment.js') }}"></script>

  {{-- Axios --}}
  <script type="text/javascript" src="{{ URL::asset('admin/plugins/axios/axios.js') }}"></script>

  {{-- Custom functions --}}
  <script type="text/javascript" src="{{ URL::asset('admin/panel/js/base.js') }}"></script>


  {{-- Funciones generales --}}
  <script type="text/javascript" src="{{ URL::asset('admin/panel/js/custom-app.js') }}"></script>

  {{-- Daterangepicker --}}
  <script src="/admin/plugins/daterangepicker3/daterangepicker.js"></script>


  {{-- new general functions --}}
  {{-- <script type="text/javascript" src="{{ URL::asset('admin/panel/js/Base/index.js') }}"></script> --}}

  {{-- Ajax --}}
  <script type="text/javascript" src="{{ URL::asset('admin/panel/js/ajax.js') }}"></script>

  @yield('scripts')
  <script src="{{asset('admin/js/owl.carousel.js')}}"></script>
  <script src="{{asset('admin/js/main.js')}}"></script>

  <script src="{{asset('admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>

  <script type="text/javascript">

   $(document).ready(function(){

            document.body.style.zoom="85%"

        });

    $('.project_click').on('click',function(){
      let _operationId = $(this).data("index");
      //alert($(this).data("index"));
        loadTemplate(_operationId);
    });

    function loadTemplate(_operationId) {
    axios.post(`updatetemplate/${_operationId}`)
      .then((response) => {

       alert("actualizado!");
       location.reload();

      })
      .catch((error) =>{
        Swal.fire(
          `${error.response.data.title}`,
          `${error.response.data.message}`,
          'warning'
        );

      });

}

  //BEGIN PLUGINS COLOR PICKER

    $('.colorpicker-color_primary').colorpicker({
        format: 'hex'
    }).on('changeColor', function(ev) {
            $('.colorpicker-color_primary i').css('color',ev.color.toHex());
            $('.colorpicker-color_primary input').val(ev.color.toHex());
        });


  $('.colorpicker-color_attribute').colorpicker({
        format: 'hex'
    }).on('changeColor', function(ev) {
            $('.colorpicker-color_attribute i').css('color',ev.color.toHex());
            $('.colorpicker-color_attribute input').val(ev.color.toHex());
        });



     $('.colorpicker-color_secondary').colorpicker({
        format: 'hex'
    }).on('changeColor', function(ev) {
            $('.colorpicker-color_secondary i').css('color',ev.color.toHex());
            $('.colorpicker-color_secondary input').val(ev.color.toHex());
        });

     $('.colorpicker-color_tertiary').colorpicker({
        format: 'hex'
    }).on('changeColor', function(ev) {
            $('.colorpicker-color_tertiary i').css('color',ev.color.toHex());
            $('.colorpicker-color_tertiary input').val(ev.color.toHex());
        });

     $('.colorpicker-color_font').colorpicker({
        format: 'hex'
    }).on('changeColor', function(ev) {
            $('.colorpicker-color_font i').css('color',ev.color.toHex());
            $('.colorpicker-color_font input').val(ev.color.toHex());
        });

     $('.colorpicker-color_font_hover').colorpicker({
        format: 'hex'
    }).on('changeColor', function(ev) {
            $('.colorpicker-color_font_hover i').css('color',ev.color.toHex());
            $('.colorpicker-color_font_hover input').val(ev.color.toHex());
        });

     $('.colorpicker-color_header_menu').colorpicker({
        format: 'hex'
    }).on('changeColor', function(ev) {
            $('.colorpicker-color_header_menu i').css('color',ev.color.toHex());
            $('.colorpicker-color_header_menu input').val(ev.color.toHex());
        });

     $('.colorpicker-color_header_promotion').colorpicker({
        format: 'hex'
    }).on('changeColor', function(ev) {
            $('.colorpicker-color_header_promotion i').css('color',ev.color.toHex());
            $('.colorpicker-color_header_promotion input').val(ev.color.toHex());
        });



    //END PLUGINS COLOR PICKER

  </script>
</body>

</html>
