<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--meta name="theme-color" content="#327d00" /-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="{{ $company_main->name_company }}" />
    <meta name="description" content="{{ $company_main->description_company }}">
    <title>{{ $company_main->business_name }}</title>
    <meta name="theme-color" content="#004180">

    <!-- Favicons-->
    <link href="/template_6/img/kamasa_ico.png" type="images/x-icon" rel="shortcut icon">

    <!-- GOOGLE WEB FONT -->


   	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" as="fetch" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap" rel="stylesheet">

    <link href="{{ URL::asset('admin/plugins/growl/jquery.growl.css') }}" rel="stylesheet">
    <!-- BASE CSS -->
    <link href="/template_6/css/bootstrap.custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    {{-- Datepicker --}}
    <link href="{{ URL::asset('admin/plugins/datepicker/datepicker3.css') }}" rel="stylesheet">

    {{-- Sweet Alert --}}
    <link href="{{ URL::asset('admin/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/plugins/sweet-alert-v2/sweetalert2.min.css') }}" rel="stylesheet">

    {{-- Select2 --}}
    <link href="{{ URL::asset('admin/plugins/select2/select2-madmin.css') }}" rel="stylesheet">


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

    </style>



    <link href="/template_6/css/style.css" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="/template_6/css/home_1.css" rel="stylesheet">
    <link href="/template_6/css/new_style.css" rel="stylesheet">


    <!-- Getbutton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            facebook: "{{ $company_main['facebook_id'] }}", // Facebook page ID
            whatsapp: "{{ $company_main['cel'] }}", // WhatsApp number
            call: "{{ $company_main['phone'] }}", // Call phone number
            call_to_action: "¡Hola! ¿Quieres que te ayudemos?", // Call to action
            button_color: "{{ $company_main->color_primary }}", // Color of button
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

<body class="scroll_edit">

	<div id="page">

     @include('template_6.layouts.sections.header_top')
	 @include('template_6.layouts.sections.header')
     @include('template_6.layouts.sections.header2')





		<!--Page content -->
        @yield('content')

	<!-- /main -->

	  <!--Footer section -->
        @include('template_6.layouts.sections.footer')

	</div>
	<!-- page -->

	<div id="toTop"></div><!-- Back to top button -->
    @if(count($notices)>0)
    <div class="popup_wrapper" id="popup_notices">
        <div class="popup_content newsletter">
            <span class="popup_close" id="popup-notice__close">Cerrar</span>
            @foreach($notices as $k => $notice)
            <div class="row no-gutters">
                <div class="col-md-12">
                     <a href="{{ $notice['link'] }}"><img src="{{ $notice['image'] }}" alt="" width="100%"></a>
                    {{--<div class="content">
                        <div class="wrapper">
                        <img src="{{ $company_main->logotype }}" alt="" height="35">
                        <!--h3>{{ $notice['title'] }}</h3-->

                        <!--p>Aqui va la descripción del anuncio</p-->
                        </div>
                    </div>--}}
                </div>
                {{--<div class="col-md-12">
                    <div class="content">
                        <div class="wrapper">
                        <img src="{{ $notice['image'] }}" alt="" height="35">
                        <h3>{{ $notice['title'] }}</h3>
                        <!--p>Aqui va la descripción del anuncio</p-->
                        </div>
                    </div>
                </div>
                <div class="col-md-12 d-none d-md-flex align-items-center justify-content-center">
                    <figure><img src="{{ $notice['image'] }}" alt=""></figure>
                </div>--}}

            </div>
            @endforeach
        </div>
    </div>
    @endif


    <div class="popup_wrapper" id="subscription_modal_ventana">
        <div class="popup_content newsletter">
            <span class="popup_close_suscription subscription_modal" id="popup-subscription__close">Cerrar</span>
            <div class="row no-gutters">
            <div class="col-md-5 d-none d-md-flex align-items-center justify-content-center">
                <figure><img src="{{ isset( $gallery_company[6]->resource) ? $gallery_company[6]->resource:  ''  }}" alt=""></figure>
            </div>
            <div class="col-md-7">
                <div class="content">
                    <div class="wrapper">
                    <img src="{{ $company_main->logotype }}" alt="" height="35">
                    <h3>Regístrate para recibir más novedades</h3>
                    <p>Aquí podras dejar tus datos para recibir nuestras ofertas, descuentos y noticias de nuestra empresa.</p>
                     <form action="modal-newsletter.html#">
                        <div class="form-group">
                            <input type="text" class="form-control" id="subscription_name" placeholder="Ingresa tu Nombres y Apellidos">
                            <div class="mensaje-error" id="subscription-error-name"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="subscription_email" placeholder="Ingresa tu Email">
                            <div class="mensaje-error" id="subscription-error-email"></div>

                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subscription_cellphone" placeholder="Ingresa tu Celular">
                            <div class="mensaje-error" id="subscription-error-cellphone"></div>
                        </div>

                        <button type="button" class="btn_1 mt-2 mb-4" id="subscription__save">Suscribirme</button>
                          <!--div class="form-group">
                                <label class="container_check d-inline">No mostrar este PopUp nuevamente<input type="checkbox" id="subscription_checkbox">
                                  <span class="checkmark"></span>
                                </label>
                           </div-->
                     </form>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>

	<!-- COMMON SCRIPTS -->
    <script src="/template_6/js/common_scripts.min.js"></script>
    <script src="/template_6/js/main.js"></script>
    <script src="/admin/plugins/axios/axios.js"></script>


	<!-- SPECIFIC SCRIPTS -->
    <script src="/template_6/js/carousel-home.min.js"></script>

  	<script src="/template_6/js/custom-app.js"></script>
  	<script src="/template_6/js/fill_cart.js"></script>
    <script src="/template_6/js/add_to_cart.js"></script>

     {{-- Sweet alert --}}
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/sweet-alert-v2/sweetalert2.min.js') }}"></script>

    {{-- Jquery BlockUI --}}
    <script type="text/javascript" src="https://malsup.github.io/jquery.blockUI.js"></script>
    {{-- growl alert --}}
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/growl/jquery.growl.js') }}"></script>

    <script>
        var notice_popup = localStorage.getItem('notice_popup');
        if (!notice_popup) {
            //$(`#popup_notices`).fadeIn(300);
            console.log(100)
            notice_popup = localStorage.setItem('notice_popup', 1);
            setTimeout(function(){
                $(`#popup_notices`).fadeIn(300);
            }, 2000);
        } else {

        }



         $(`.subscription_modal`).on('click', function(e){
            /*$(`#subscription_modal`).hide();*/
            $(`#subscription_modal_ventana`).fadeOut(300);
        });


        var subscription_popup = localStorage.getItem('subscription_popup');
        if (subscription_popup == undefined || subscription_popup == "true") {

        } else {
            $(`.popup_wrapper`).hide();
        }

        $(`#search_product`).on('keyup', function(e){
            if (e.keyCode == 13) {
                window.location.replace(`/catalogo?q=${e.target.value}`);
            }
        });
        $(`#search_product_mobile`).on('click', function(e){
            value = $("#value_search").val()
            window.location.replace(`/catalogo?q=${value}`);
        });
    </script>
    <!-- Menu de categorias - Carousel-->
    <script type="text/javascript">
    // Barra desktop
    $(document).ready(function(){
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
    // Barra movil
    $(document).ready(function(){
      $("#nav_category2").owlCarousel({
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
    </script>
    <!-- Menu de rutas -->
    <!-- <script type="text/javascript">
      var button = document.getElementById('routes_icon'); // Assumes element with id='button'
      button.onclick = function() {
        var div = document.getElementById('menu_routes');
        if (div.style.display !== 'none') {
            div.style.display = 'none';
        }
        else {
            div.style.display = 'block';
        }
      };
    </script> -->

    {{-- Suscriptions  --}}
    <script type="text/javascript" src="{{ URL::asset('template_6/js/subscriptions.js') }}"></script>

    {{-- Datepicker --}}
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/datepicker/locales/bootstrap-datepicker.es.js') }}"></script>

    {{-- Moment.js --}}
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/moment/moment.js') }}"></script>

    {{-- select2 --}}
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/select2/select2.js') }}"></script>

    @yield('plugins-js')



</body>
</html>
