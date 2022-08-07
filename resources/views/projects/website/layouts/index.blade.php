<!DOCTYPE html>
<html dir="ltr" lang="es">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ $company_main->name_company }}</title>
    <link rel="stylesheet" href="/website/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="/website/css/font-awesome.css"> -->
    <link rel="stylesheet" href="/website/css/ionicons.min.css">
    <link rel="stylesheet" href="/website/css/slick.css">
    <link rel="stylesheet" href="/website/css/slick-theme.css">
    <link rel="stylesheet" href="/website/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/website/css/style.css">
    <link rel="stylesheet" href="/website/css/bootstrap-slider.css">
    <link rel="stylesheet" href="/website/pluging/materialize/css/materialize.css">
    <link rel="stylesheet" href="/website/pluging/animationcss/animation.css">
    <link rel="stylesheet" href="/admin/bootstrap-4.4/css/bootstrap-grid.css">
    <link rel="stylesheet" href="/admin/css/website.css">
    {{-- growl alert --}}
    <link href="{{ URL::asset('admin/plugins/growl/jquery.growl.css') }}" rel="stylesheet">
    {{-- Sweet Alert --}}
    <link href="{{ URL::asset('admin/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/plugins/sweet-alert-v2/sweetalert2.min.css') }}" rel="stylesheet">
    <!--ejemplos: https://sweetalert2.github.io/#download-->
  

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5e2ae82e1e.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/website/js/jquery.js"></script>
    <script type="text/javascript">
        $(function(){
           $.scrollUp({
        scrollName: 'scrollUp',      // Element ID
        scrollDistance: 300,         // Distance from top/bottom before showing element (px)
        scrollFrom: 'top',           // 'top' or 'bottom'
        scrollSpeed: 300,            // Speed back to top (ms)
        easingType: 'linear',        // Scroll to top easing (see http://easings.net/)
        animation: 'fade',           // Fade, slide, none
        animationSpeed: 200,         // Animation speed (ms)
        scrollTrigger: false,        // Set a custom triggering element. Can be an HTML string or jQuery object
        scrollTarget: 0,         // Set a custom target element for scrolling to. Can be element or number
        scrollText: 'Volver Arriba', // Text for element, can contain HTML
        scrollTitle: false,          // Set a custom <a> title if required.
        scrollImg: false,            // Set true to use image
        activeOverlay: false,        // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        zIndex: 2147483647           // Z-Index for the overlay
    });
        });
    </script>

    <style type="text/css">

        #scrollUp {
          bottom: 20px;
          right: 20px;
          padding: 10px 20px;
          background: #555;
          color: #fff;
        }

        @media (max-width: 767px){
          .nav-none {display: none;}
        }
        @media (min-width: 769px){
          .nav-view {display: none;}
        }
    </style>



</head>

<body class="ir-arriba">
<div class="windows8">
  <div class="wBall" id="wBall_1">
    <div class="wInnerBall"></div>
  </div>
  <div class="wBall" id="wBall_2">
    <div class="wInnerBall"></div>
  </div>
  <div class="wBall" id="wBall_3">
    <div class="wInnerBall"></div>
  </div>
  <div class="wBall" id="wBall_4">
    <div class="wInnerBall"></div>
  </div>
  <div class="wBall" id="wBall_5">
    <div class="wInnerBall"></div>
  </div>
</div>
  <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="display: none;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">SEARCH HERE</h4>
                </div>
                <div class="modal-body">
                    <label  style="margin-top: 20px;">Buscar:</label>
                    <div class="input-group">
                      <form method="get" class="searchform" action="http://landing.engotheme.com/search" role="search">
                            <input type="hidden" name="type" value="product">
                            <input type="text" name="q" class="form-control control-search">
                            <span class="input-group-btn">
                              <button class="btn btn-default button_search" type="button"><i data-toggle="dropdown" class="ion-ios-search"></i></button>
                            </span>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!--BEGIN TOPBAR--> <!--INICIAAAAA EL MENU PRINCIPAL-->
        @include('website.layouts.sections.header')
        <!--END TOPBAR--> <!--TERMINAAAAA EL MENU PRINCIPAL-->
        <!--BEGIN PAGE WRAPPER--> <!--EMPIEZA EL CONTENIDO-->
<!--         <div id="circulo" style="position:relative; left:50%; padding-top: 150px; padding-bottom: 150px;">
            <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue-only">
              <div class="circle-clipper left">
                <div class="circle"></div>
              </div><div class="gap-patch">
                <div class="circle"></div>
              </div><div class="circle-clipper right">
                <div class="circle"></div>
              </div>
            </div>
          </div>
        </div> -->

        <div class="" id="contenidox">
            @yield('content')
        </div>

        <!--ETERMINA EL CONTENIDO-->
        <!--BEGIN FOOTER-->
        @include('website.layouts.sections.footer')
        <!--END FOOTER-->
        <script type="text/javascript" src="{{ URL::asset('/website/js/bootstrap.js') }}"></script>

        {{-- Axios --}}
        <script type="text/javascript" src="{{ URL::asset('/admin/plugins/axios/axios.js') }}"></script>
        {{-- Custom functions --}}
        <script type="text/javascript" src="{{ URL::asset('/admin/panel/js/base.js') }}"></script>

        <script type="text/javascript" src="{{ URL::asset('/website/js/owl.carousel.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('/website/js/slick.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('http://maps.googleapis.com/maps/api/js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('/website/js/main.js') }}"></script>
        

        <script type="text/javascript" src="{{ URL::asset('/website/js/jquery.scrollUp.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('/website/pluging/notification/bootstrap-notify.js') }}"></script>
        {{--<script type="text/javascript" src="{{ URL::asset('/website/pluging/materialize/js/materialize.js') }}"></script> --}}
        {{-- growl alert --}}
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/growl/jquery.growl.js') }}"></script>
    {{-- Sweet alert --}}
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/sweet-alert-v2/sweetalert2.min.js') }}"></script>
        @yield('pulgins-js')

        <script src="/js/cart.js"></script>

        <script type="text/javascript">
            fill_cart();

            function fill_cart(){
                let _products = localStorage.getItem('cart');
                let _productsSplitted = _products.split(',');
                getElement(`#cart-header_quantity`).innerHTML = _productsSplitted.length;
                axios.get(`/api/products/cart-lite?ids=${localStorage.getItem("cart")}`)
                    .then((response) => {
                        let _subTotal = 0;
                        response.data.forEach((product) => {
                            _subTotal += product.price * product.quantity;
                        });
                        getElement(`#cart-header_total`).innerHTML = `S/${_subTotal}`;
                    });
            }

            
        </script> 


    </body>
</html>
