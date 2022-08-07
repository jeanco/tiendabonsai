<!doctype html>
<html class="no-js" lang="en">
  <head>
      <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $company_main->name_company }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="shortcut icon" href="/yekatex/img/favicon.ico">
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="/yekatex/css/font-awesome.min.css">
    <!-- Ionicons css -->
    <link rel="stylesheet" href="/yekatex/css/ionicons.min.css">
    <!-- linearicons css -->
    <link rel="stylesheet" href="/yekatex/css/linearicons.css">
    <!-- Nice select css -->
    <link rel="stylesheet" href="/yekatex/css/nice-select.css">
    <!-- Jquery fancybox css -->
    <link rel="stylesheet" href="/yekatex/css/jquery.fancybox.css">
    <!-- Jquery ui price slider css -->
    <link rel="stylesheet" href="/yekatex/css/jquery-ui.min.css">
    <!-- Meanmenu css -->
    <link rel="stylesheet" href="/yekatex/css/meanmenu.min.css">
    <!-- Nivo slider css -->
    <link rel="stylesheet" href="/yekatex/css/nivo-slider.css">
    <!-- Owl carousel css -->
    <link rel="stylesheet" href="/yekatex/css/owl.carousel.min.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="/yekatex/css/bootstrap.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="/yekatex/css/default.css">
    <!-- Main css -->
    <link rel="stylesheet" href="/yekatex/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="/yekatex/css/responsive.css">
    <!-- Others css -->
    <link rel="stylesheet" href="/yekatex/css/newstyles.css">

    {{-- growl alert --}}
    <link href="{{ URL::asset('admin/plugins/growl/jquery.growl.css') }}" rel="stylesheet">
    
    {{-- Sweet Alert --}}
    <link href="{{ URL::asset('admin/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/plugins/sweet-alert-v2/sweetalert2.min.css') }}" rel="stylesheet">

    <style type="text/css">
      .mean-container a.meanmenu-reveal span {
        background: #ffffff none repeat scroll 0 0;
      }
    </style>

    <!-- Modernizer js -->
    <script src="/yekatex/js/vendor/modernizr-3.5.0.min.js"></script>
  </head>

  <body>
    <!-- Main Wrapper Start Here -->
    <div class="wrapper">
          <!--Header section -->
          @include('yekatex.layouts.sections.header')
          <!--Page content -->
          @yield('content')
          <!--Footer section -->
          @include('yekatex.layouts.sections.footer')
    </div>
    <!-- Main Wrapper End Here -->

      <!-- style-customizer End
      ================================-->

          <!-- jquery 3.2.1 -->
    <script src="/yekatex/js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Countdown js -->
    <script src="/yekatex/js/jquery.countdown.min.js"></script>
    <!-- Mobile menu js -->
    <script src="/yekatex/js/jquery.meanmenu.min.js"></script>
    <!-- ScrollUp js -->
    <script src="/yekatex/js/jquery.scrollUp.js"></script>
    <!-- Nivo slider js -->
    <script src="/yekatex/js/jquery.nivo.slider.js"></script>
    <!-- Fancybox js -->
    <script src="/yekatex/js/jquery.fancybox.min.js"></script>
    <!-- Jquery nice select js -->
    <script src="/yekatex/js/jquery.nice-select.min.js"></script>
    <!-- Jquery ui price slider js -->
    <script src="/yekatex/js/jquery-ui.min.js"></script>
    <!-- Owl carousel -->
    <script src="/yekatex/js/owl.carousel.min.js"></script>
    <!-- Bootstrap popper js -->
    <script src="/yekatex/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/yekatex/js/bootstrap.min.js"></script>
    <!-- Plugin js -->
    <script src="/yekatex/js/plugins.js"></script>
    <!-- Main activaion js -->
    <script src="/yekatex/js/main.js"></script>
      {{-- Axios --}}
      <script type="text/javascript" src="{{ URL::asset('/admin/plugins/axios/axios.js') }}"></script>
      {{-- Custom functions --}}
      <script type="text/javascript" src="{{ URL::asset('/admin/panel/js/base.js') }}"></script>

          {{-- growl alert --}}
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/growl/jquery.growl.js') }}"></script>
    {{-- Sweet alert --}}
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/sweet-alert-v2/sweetalert2.min.js') }}"></script>

      @yield('plugins-js')
      <script type="text/javascript">
        $('#menufeatures').on('click', function(E){
          E.preventDefault();
          $('#feature-bar').toggleClass('features-view');
        })
      </script>
      <script type="text/javascript" src="/js/fill_cart.js"></script>
      <script type="text/javascript" src="/js/cart.js"></script>
      <script type="text/javascript" src="/yekatex/js/search_product.js"></script>
      <script type="text/javascript" src="/website/js/subscribe.js"></script>
  </body>
</html>
