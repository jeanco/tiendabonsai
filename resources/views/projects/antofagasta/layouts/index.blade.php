<!doctype html>
<html class="no-js" lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>{{ $company_main->name_company }}</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="theme-color" content="#ec8300" />
      <!-- Place favicon.ico in the root directory -->
      <link href="/antofagasta/images/favicon.ico" type="images/x-icon" rel="shortcut icon">
      <!-- All css files are included here. -->
      <link rel="stylesheet" href="/miranda/css/bootstrap.min.css">
      <link rel="stylesheet" href="/miranda/css/core.css">
      <link rel="stylesheet" href="/miranda/css/shortcode/shortcodes.css">
      <link rel="stylesheet" href="/antofagasta/style.css">
      <link rel="stylesheet" href="/miranda/css/responsive.css">
      <!-- customizer style css -->
      <link rel="stylesheet" href="/miranda/css/style-customizer.css">
      <link href="#" data-style="styles" rel="stylesheet">
      <link rel="stylesheet" href="/antofagasta/newstyles.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

      @yield('css')

      <!-- Modernizr JS -->
      <script src="/miranda/js/vendor/modernizr-2.8.3.min.js"></script>
  </head>

  <body>
      <!--Preloader start-->
      <div id="fakeLoader"></div>
      <!--Preloader end-->
      <div class="wrapper white_bg">
          <!--Header section -->
          @include('antofagasta.layouts.sections.header')
          <!--Page content -->
          @yield('content')
          <!--Footer section -->
          @include('antofagasta.layouts.sections.footer')
      </div>

      <!--=================================
           style-customizer start  -->
      {{-- <div class="style-customizer closed">
          <div class="buy-button">
              <a href="index-2.html#" class="customizer-logo"><img src="/miranda/img/logo/logo.png" alt="Theme Logo"></a>
              <a class="opener" href="index-2.html#"><i class="fa fa-cog fa-spin"></i></a>
              <div class="buy-now">
                  <a class="button button-border" href="index-2.html#">Buy now!</a>
              </div>
          </div>
          <div class="content-chooser">
              <h3>Layout Options</h3>
              <p>Which layout option you want to use?</p>
              <ul class="layoutstyle">
                  <li class="wide-layout selected" data-style="wide" title="wide"> Wide </li>
                  <li class="boxed-layout" data-style="boxed" title="boxed"> Boxed </li>
              </ul>
              <h3>Color Schemes</h3>
              <p>Which theme color you want to use? Select from here.</p>
              <ul class="styleChange">
                  <li class="skin-default selected" title="skin-default" data-style="skin-default"></li>
                  <li class="color-1" title="color-1" data-style="color-1"></li>
                  <li class="color-2" title="color-2" data-style="color-2"></li>
                  <li class="color-3" title="color-3" data-style="color-3"></li>
                  <li class="color-4" title="color-4" data-style="color-4"></li>
                  <li class="color-5" title="color-5" data-style="color-5"></li>
                  <li class="color-6" title="color-6" data-style="color-6"></li>
                  <li class="color-7" title="color-7" data-style="color-7"></li>
                  <li class="color-8" title="color-8" data-style="color-8"></li>
                  <li class="color-9" title="color-9" data-style="color-9"></li>
                  <li class="color-10" title="color-10" data-style="color-10"></li>
                  <li class="color-11" title="color-11" data-style="color-11"></li>
              </ul>
              <h3>Background Patterns</h3>
              <p>Which background pattern you want to use?</p>
              <ul class="patternChange clearfix">
                  <li class="pattern-0" data-style="pattern-0" title="white background"></li>
                  <li class="pattern-1" data-style="pattern-1" title="pattern-1"></li>
                  <li class="pattern-2" data-style="pattern-2" title="pattern-2"></li>
                  <li class="pattern-3" data-style="pattern-3" title="pattern-3"></li>
                  <li class="pattern-4" data-style="pattern-4" title="pattern-4"></li>
                  <li class="pattern-5" data-style="pattern-5" title="pattern-5"></li>
                  <li class="pattern-6" data-style="pattern-6" title="pattern-6"></li>
                  <li class="pattern-7" data-style="pattern-7" title="pattern-7"></li>
              </ul>
              <h3>Background img</h3>
              <p>Which background image you want to use?</p>
              <ul class="patternChange main-bg-change clearfix">
                  <li class="main-bg-1" data-style="main-bg-1" title="Background 1"> <img
                          src="/miranda/img/customizer/bodybg/bg-1.jpg" alt=""></li>
                  <li class="main-bg-2" data-style="main-bg-2" title="Background 2"> <img
                          src="/miranda/img/customizer/bodybg/bg-2.jpg" alt=""></li>
                  <li class="main-bg-3" data-style="main-bg-3" title="Background 3"> <img
                          src="/miranda/img/customizer/bodybg/bg-3.jpg" alt=""></li>
                  <li class="main-bg-4" data-style="main-bg-4" title="Background 4"> <img
                          src="/miranda/img/customizer/bodybg/bg-4.jpg" alt=""></li>
                  <li class="main-bg-5" data-style="main-bg-5" title="Background 5"> <img
                          src="/miranda/img/customizer/bodybg/bg-5.jpg" alt=""></li>
                  <li class="main-bg-6" data-style="main-bg-6" title="Background 6"> <img
                          src="/miranda/img/customizer/bodybg/bg-6.jpg" alt=""></li>
                  <li class="main-bg-7" data-style="main-bg-7" title="Background 7"> <img
                          src="/miranda/img/customizer/bodybg/bg-7.jpg" alt=""></li>
                  <li class="main-bg-8" data-style="main-bg-8" title="Background 8"> <img
                          src="/miranda/img/customizer/bodybg/bg-8.jpg" alt=""></li>
                  <li class="main-bg-9" data-style="main-bg-9" title="Background 9"> <img
                          src="/miranda/img/customizer/bodybg/bg-9.jpg" alt=""></li>
                  <li class="main-bg-10" data-style="main-bg-10" title="Background 10"> <img
                          src="/miranda/img/customizer/bodybg/bg-10.jpg" alt=""></li>
                  <li class="main-bg-11" data-style="main-bg-11" title="Background 11"> <img
                          src="/miranda/img/customizer/bodybg/bg-11.jpg" alt=""></li>
                  <li class="main-bg-12" data-style="main-bg-12" title="Background 12"> <img
                          src="/miranda/img/customizer/bodybg/bg-12.jpg" alt=""></li>
              </ul>
              <ul class="resetAll">
                  <li><a class="button button-border button-reset" href="index-2.html#">Reset All</a></li>
              </ul>
          </div>
      </div> --}}
      <!-- style-customizer End
      ================================-->

      <!-- Map js code here -->
      <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj9b_nyz33KEaocu6ZOXRgqwwUZkDVEAw"></script> -->

      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5DgtOXdGEIDFUDkT9jK_EfN-UJIElU_0&libraries=places"></script>
      <!-- <script src="/miranda/js/map.js"></script> -->
      <!-- All jquery file included here -->
      <script src="/miranda/js/vendor/jquery-1.12.0.min.js"></script>
      <script src="/miranda/js/bootstrap.min.js"></script>
      <script src="/miranda/js/jquery.nivo.slider.pack.js"></script>
      <script src="/miranda/js/waypoints.min.js"></script>
      <script src="/miranda/js/jquery.counterup.min.js"></script>
      <script src="/miranda/js/ajax-mail.js"></script>
      <script src="/miranda/js/owl.carousel.min.js"></script>
      <script src="/miranda/js/jquery.magnific-popup.js"></script>
      <script src="/miranda/js/style-customizer.js"></script>
      <script src="/miranda/js/plugins.js"></script>
      <script src="/miranda/js/main.js"></script>
      {{-- Axios --}}
      <script type="text/javascript" src="{{ URL::asset('/admin/plugins/axios/axios.js') }}"></script>
      {{-- Custom functions --}}
      <script type="text/javascript" src="{{ URL::asset('/admin/panel/js/base.js') }}"></script>
      @yield('plugins-js')
      <script type="text/javascript">
        $('#menufeatures').on('click', function(E){
          E.preventDefault();
          $('#feature-bar').toggleClass('features-view');
        })
      </script>
      <script src="/miranda/js/catalog.js"></script>
  </body>
</html>
