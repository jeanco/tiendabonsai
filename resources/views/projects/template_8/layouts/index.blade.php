<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--meta name="theme-color" content="#327d00" /-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="author" content="aaa" />
    <meta name="description" content="xd">
    <title>{{ $company_main->business_name }}</title>
    <meta name="theme-color" content="#004180">

    {{-- FB and twitter --}}
        <meta property="og:url" content="http://{{$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']}}"/>
        <meta property="og:locale" content="es_ES">
        <meta property="og:type" content="article"/>
        <meta property="og:title" content="{{ isset($product) ? $product->name : '' }}"/>
        <meta property="og:image" content="{{ isset($product_photo) ? $product_photo : '' }}"/>
        <meta property="og:description" content="{{ isset($product) ? strip_tags($product->description) : '' }}"/>

        <meta name="twitter:description" content="{{ isset($product) ? strip_tags($product->description) : '' }}"/>
        <meta name="twitter:image" content="{{ isset($product_photo) ? $product_photo : '' }}"/>
        <meta name="twitter:title" content="{{ isset($product) ? $product->name : '' }}"/>
        <meta name="twitter:card" content="summary"/>

    {{-- --}}


    <!--Favicon-->
    <link rel="shortcut icon" href="/template_8/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="/template_8/images/favicon.png" type="image/x-icon">
    <!-- Responsive -->

    <!-- Stylesheets -->
    <link href="/template_8/css/bootstrap.css" rel="stylesheet">
    <link href="/template_8/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="/template_8/plugins/revolution/css/settings.css" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
    <link href="/template_8/plugins/revolution/css/layers.css" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
    <link href="/template_8/plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->
    <link href="/template_8/css/style.css" rel="stylesheet">
    <link href="/template_8/css/responsive.css" rel="stylesheet">

    <!-- New -->
    <link href="/template_8/css/new_style.css" rel="stylesheet">

    <link href="{{ URL::asset('admin/plugins/sweet-alert-v2/sweetalert2.min.css') }}" rel="stylesheet">

    <style type="text/css">
        /*background-color: var(--main-bg-color-banner);*/
        :root {
          --main-bg-color-primario: #00326a; /*color_primary*/
          --main-bg-color-secundario: #fff; /*color_secondary*/
          --main-bg-color-terciario: #232323; /*color_tertiary*/
          --main-bg-color-cuarto: #e63312; /*color_header_promotion*/
        }
    </style>

    @yield('plugins-css')

  </head>
  <body>
    <div class="page-wrapper">
      <!-- Preloader -->
      <!-- <div class="preloader"></div> -->
      <!-- Main Header-->
      @include('template_8.layouts.sections.header')
      <!-- Movil Header-->
      @include('template_8.layouts.sections.header_movil')

      <!--Page content -->
      @yield('content')

      <!--Main Footer-->
      @include('template_8.layouts.sections.footer')

    </div>

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-up"></span></div>

    <!-- JS -->
    <script src="/template_8/js/jquery.js"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/sweet-alert-v2/sweetalert2.min.js') }}"></script>
    <script src="/template_8/js/bootstrap.min.js"></script>
    <!--Revolution Slider-->
    <script src="/template_8/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="/template_8/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="/template_8/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="/template_8/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="/template_8/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="/template_8/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="/template_8/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="/template_8/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="/template_8/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="/template_8/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="/template_8/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="/template_8/js/main-slider-script.js"></script>
    <!--End Revolution Slider-->
    <script src="/template_8/js/jquery-ui.js"></script>
    <script src="/template_8/js/jquery.fancybox.pack.js"></script>
    <script src="/template_8/js/jquery.fancybox-media.js"></script>
    <script src="/template_8/js/owl.js"></script>
    <script src="/template_8/js/appear.js"></script>
    <script src="/template_8/js/wow.js"></script>
    <script src="/template_8/js/main-slider-script.js"></script>
    <script src="/template_8/js/script.js"></script>
    <script src="/admin/plugins/axios/axios.js"></script>
    <script src="/template_8/js/custom-app.js"></script>

    {{-- Jquery BlockUI --}}
    <script type="text/javascript" src="https://malsup.github.io/jquery.blockUI.js"></script>

    @yield('plugins-js')

    <!-- menu responsivo -->
    <script type="text/javascript">
      function menuActive() {
          var element = document.getElementById("menu_movile");
          element.classList.toggle("active");
          var icon = document.getElementById("icon_menu");
          icon.classList.toggle("quit");
          var icon_2 = document.getElementById("icon_menu_2");
          icon_2.classList.toggle("quit");
      }
    </script>
  </body>
</html>
