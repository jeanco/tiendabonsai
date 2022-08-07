<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--meta name="theme-color" content="#327d00" /-->



     <meta property="og:url" content="{{ $company_main->url }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $company_main->name_company }}" />
    <meta property="og:description" content="{{ $company_main->meta_keywords }}" />
    <meta property="og:image" content="{{ $company_main->logotype }}" />
    <!--meta property="og:image" content="{{ $company_main->logotype }}" /-->
    

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="{{ $company_main->name_company }}" />
    <meta name="description" content="{{ $company_main->meta_keywords }}">
    <meta name="theme-color" content="{{ $company_main->color_primary }}" />
    <title>{{ $company_main->business_name }}</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ $company_main->logotype }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="/template_9/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="/template_9/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="/template_9/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="/template_9/img/apple-touch-icon-144x144-precomposed.png">

    <link href="{{ URL::asset('admin/plugins/growl/jquery.growl.css') }}" rel="stylesheet">

    {{-- Datepicker --}}
    <link href="{{ URL::asset('admin/plugins/datepicker/datepicker3.css') }}" rel="stylesheet">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Asap&display=swap" rel="stylesheet">

   	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" as="fetch" crossorigin="anonymous">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script>
    !function(e,n,t){"use strict";var o="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap",r="__3perf_googleFonts_c2536";function c(e){(n.head||n.body).appendChild(e)}function a(){var e=n.createElement("link");e.href=o,e.rel="stylesheet",c(e)}function f(e){if(!n.getElementById(r)){var t=n.createElement("style");t.id=r,c(t)}n.getElementById(r).innerHTML=e}e.FontFace&&e.FontFace.prototype.hasOwnProperty("display")?(t[r]&&f(t[r]),fetch(o).then(function(e){return e.text()}).then(function(e){return e.replace(/@font-face {/g,"@font-face{font-display:swap;")}).then(function(e){return t[r]=e}).then(f).catch(a)):a()}(window,document,localStorage);
    </script>


    <!-- BASE CSS -->
    <link href="/template_9/css/bootstrap.custom.min.css" rel="stylesheet">

    {{-- Sweet Alert --}}
    <link href="{{ URL::asset('admin/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/plugins/sweet-alert-v2/sweetalert2.min.css') }}" rel="stylesheet">


    <style type="text/css">
        /*background-color: var(--main-bg-color-banner);*/
         :root {
          --main-bg-color-header-promotion: #e44d51;

          --main-bg-color-header-menu: {{ $company_main->color_header_menu }};
          --main-bg-color-font-menu: {{ $company_main->color_font }};
          --main-bg-color-font-menu-over: {{ $company_main->color_font_hover }};


          --main-bg-color-primario: {{ $company_main->color_primary }};
          --main-bg-color-secundario: {{ $company_main->color_secondary }};
          --main-bg-color-terciario: {{ $company_main->color_tertiary }};
          --main-bg-color-cuarto: {{ $company_main->color_header_promotion }};

          --main-bg-color-header-font: {{ $company_main->color_header_menu }};
        }

        a.disabled {
            pointer-events: none;
        }



        @media (max-width: 767px) {
 

    .header_desktop{

        display: none;
    }


    .header_movil{

        display: block;
    }


 
}

@media (min-width: 768px) {


    .header_desktop{

        display: block;
    }


    .header_movil{

        display: none;
    }
}


    </style>



    <link href="/template_9/css/style.css" rel="stylesheet">
    <link href="/template_9/css/new_style.css" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="/template_9/css/home_1.css" rel="stylesheet">


    <!-- Getbutton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            facebook: "{{ $company_main['facebook_id'] }}", // Facebook page ID
            whatsapp: "{{ $company_main['cel'] }}", // WhatsApp number
            call: "{{ $company_main['phone'] }}", // Call phone number
            //call_to_action: "¡Hola! ¿Quieres que te ayudemos?", // Call to action
            button_color: "#DE001A", // Color of button
            position: "right", // Position may be 'right' or 'left'
            order: "whatsapp,facebook", // Order of buttons
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /Getbutton.io widget -->


    @yield('plugins-css')

</head>

<body>

	<div id="page">
    @include('template_9.layouts.sections.header_top')    
	{{--@include('template_9.layouts.sections.header')--}}
    @include('template_9.layouts.sections.header')
    @include('template_9.layouts.sections.header_responsive')


		<!--Page content -->
        @yield('content')

	<!-- /main -->

	  <!--Footer section -->
        @include('template_9.layouts.sections.footer')

	</div>
	<!-- page -->

	<div id="toTop"></div><!-- Back to top button -->

    @if(!isset($place_id_selected))
  <div class="popup_wrapper" id="subscription_modal_ventana">
        <div class="popup_content newsletter">
            <span class="popup_close_suscription subscription_modal" id="popup-subscription__close">Cerrar</span>
            <div class="row no-gutters">
            <div class="col-md-5 d-none d-md-flex align-items-center justify-content-center">
                <figure>
                    {{--<img src="{{ isset( $gallery_company[6]->resource) ? $gallery_company[6]->resource:  ''  }}" alt="">--}}
                    <img src="https://wongfood.vtexassets.com/arquivos/300920-BH-comidalista-v1.png?v=637371942447700000">
                </figure>
            </div>
            <div class="col-md-7">
                <div class="content">
                    <div class="wrapper">
                    <img src="{{ $company_main->logotype }}" alt="" height="35">
                    <h3>Bienvenido a {{ $company_main->business_name }}</h3>
                    <p>¿Dónde te encuentras ahora?</p>
                     <div class="row">
                        @foreach($places as $key => $place)
                        
                            <div class="col-md-6">
                                <form action="/api/template_9/set-place-no-ajax", method="POST" id="place_form">
                            {{ csrf_field() }}
                            <input type="hidden" name="place_id" value="{{ $place['id'] }}">
                                <button type="submit" class="btn_1 mt-2 mb-4"  style="width: 150px;">{{ $place['name'] }}</button>
                                 </form>
                            </div>
                       
                        @endforeach
                         
                     </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
    @endif

	<!-- COMMON SCRIPTS -->
    <script src="/template_9/js/common_scripts.min.js"></script>
    <script type="text/javascript">
        
        var _0x3533 = ['append', 'image', 'slideToggle', 'a.show-submenu', 'mfp-figure\x20mfp-with-anim', '#forgot_pw', '.opacity-mask', 'mouseover', '.dropdown-menu', '.btn_add_to_cart\x20a', 'val', 'visible', '.main-menu', 'replace', 'text', 'addClass', 'toggleClass', 'ul:first', 'load\x20resize', 'my-mfp-zoom-in', '.Sticky', 'magnificPopup', '.magnific-gallery', 'fadeOut', '.top_panel', 'resize', 'hover', 'a.cart_bt,\x20a.access_link', 'a.cart_bt,a.access_link', 'fast', '.categories', '%DD\x20%H:%M:%S', 'show', 'footer.revealed', 'data', 'a.btn_close_top_panel', '.menu\x20ul:first', 'hide', 'css', '<img src="{{ $company_main->logotype }}" alt="" style="height: 45px; padding: 5px 0px 5px 0px;">', 'mmenu', 'next', 'a.open_close', 'click', '#toTop', 'preventDefault', 'removeClass', 'jQuery', '>\x20span\x20a', 'mouseout', '.carousel_centered', 'countdown', 'bottom', '.numbers-row', '.prod_pics', 'expanded', 'init', '#menu', 'disable', 'layer-is-visible', 'parent', 'pagedim-black', '.color', 'a.btn_search_mob', 'stop', 'removeAttr', '.products_carousel', 'scrollTop', '.lazy', 'show_normal', 'dropdown', 'delay', 'data-effect', '#page', '#forgot', 'scroll', 'data-opacity-mask', 'strftime', 'a[href=\x22#\x22]', 'collapse', '.menu\x20ul\x20>\x20li', 
            '<a\x20href=\x22#0\x22>{{ $company_main->name_company }}\x20\x20©\x202020\x20</a>', '.tooltip-1', '<button\x20title=\x22%title%\x22\x20type=\x22button\x22\x20class=\x22mfp-close\x22></button>', 'active', 'each', 'html', '#sign-in', 'html,\x20body', 'sticky_element', 'bind', 'tooltip', 'opened', 'markup', '.custom-select-form\x20select', 'animate', 'fadeIn', '.button_inc', 'mfp-figure', '[data-countdown]', '<i\x20class=\x27ti-angle-left\x27></i>', 'auto', '.dropdown-cart,\x20.dropdown-access', 'owlCarousel', 'show_mega', '.layer', 'find', 'input', '.popup_wrapper', 'width', 'a.show-submenu-mega', '.menu\x20ul\x20li\x20li', 'data-toggle', '#brands', 'attr', 'mainClass', 'menu', 'has'];
    </script>
    <script src="/template_9/js/main.js"></script>
    <script src="/admin/plugins/axios/axios.js"></script>


	<!-- SPECIFIC SCRIPTS -->
    <script src="/template_9/js/carousel-home.min.js"></script>

	<script src="/template_9/js/custom-app.js"></script>
	<script src="/template_9/js/fill_cart.js"></script>
    <script src="/template_9/js/add_to_cart.js"></script>


     {{-- Sweet alert --}}
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/sweet-alert-v2/sweetalert2.min.js') }}"></script>

    {{-- Jquery BlockUI --}}
    <script type="text/javascript" src="https://malsup.github.io/jquery.blockUI.js"></script>
    {{-- growl alert --}}
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/growl/jquery.growl.js') }}"></script>

    {{-- Datepicker --}}
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/datepicker/locales/bootstrap-datepicker.es.js') }}"></script>



    <script>

        $(`#search_product`).on('keyup', function(e){
            if (e.keyCode == 13) {
                window.location.replace(`/catalogo?q=${e.target.value}`);
            }
        });
        $(`#search_button`).on('click', function(e){
                value =$("#search_product").val();
                alert(value);
                window.location.replace(`/catalogo?q=${value}`);
        });

        $(`#search_product_mobile`).on('click', function(e){
            value = $("#value_search").val()
            window.location.replace(`/catalogo?q=${value}`);
        });


         $(`#subscription_modal_ventana`).on('click', function(e){
            $(".popup_wrapper").fadeOut(300);
        });



        


       

         $(document).ready(function(){

        /* Preloader */
   /* $(window).on('load', function() {
        var preloaderFadeOutTime = 500;
        function hidePreloader() {
            var preloader = $('.spinner-wrapper');
            setTimeout(function() {
                preloader.fadeOut(preloaderFadeOutTime);
            }, 500);
        }
        hidePreloader();
    });*/


      $("#nav_category").owlCarousel({
            dots: false,
            autoWidth:true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:2,
                    nav:true
                },
                576:{
                    items:4,
                    nav:true
                },
                768:{
                    items:6,
                    nav:true
                },
                992:{
                    items:8,
                    nav:true
                },
                1200:{
                    items:10,
                    nav:true
                }
            }
      });
    });

    $(`#place_select`).on('change', function(){
        $(`#place_form`).submit();
    });

    </script>



    @yield('plugins-js')

</body>
</html>
