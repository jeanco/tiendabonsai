<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!--meta property="og:locale" content="es_ES" />

    <meta property="fb:app_id" content="" />

    <meta property="og:site_name" content="{{ $company_main->name_company }}" /-->

    <meta property="og:url" content="{{ $company_main->url }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $company_main->name_company }}" />
    <meta property="og:description" content="{{ $company_main->meta_keywords }}" />
    <meta property="og:image" content="{{ $company_main->url }}/template_2/img/logo_facebook.png" />
    <!--meta property="og:image" content="{{ $company_main->logotype }}" /-->




    <!--meta name="theme-color" content="#327d00" /-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="{{ $company_main->name_company }}" />
    <meta name="description" content="{{ $company_main->meta_keywords }}">
    <meta name="theme-color" content="#DE001A" />
    <title>{{ $company_main->business_name }}</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="/template_2/img/logo-hoja.ico" type="image/x-icon">

    <!--link rel="apple-touch-icon" type="image/x-icon" href="/template_2/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="/template_2/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="/template_2/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="/template_2/img/apple-touch-icon-144x144-precomposed.png"-->

    <link href="{{ URL::asset('admin/plugins/growl/jquery.growl.css') }}" rel="stylesheet">

    <!-- GOOGLE WEB FONT -->
    <!--link href="https://fonts.googleapis.com/css2?family=Asap&display=swap" rel="stylesheet"-->


   	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <!--link rel="preload" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" as="fetch" crossorigin="anonymous"-->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2&display=swap" rel="stylesheet">
    <script>
    !function(e,n,t){"use strict";var o="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap",r="__3perf_googleFonts_c2536";function c(e){(n.head||n.body).appendChild(e)}function a(){var e=n.createElement("link");e.href=o,e.rel="stylesheet",c(e)}function f(e){if(!n.getElementById(r)){var t=n.createElement("style");t.id=r,c(t)}n.getElementById(r).innerHTML=e}e.FontFace&&e.FontFace.prototype.hasOwnProperty("display")?(t[r]&&f(t[r]),fetch(o).then(function(e){return e.text()}).then(function(e){return e.replace(/@font-face {/g,"@font-face{font-display:swap;")}).then(function(e){return t[r]=e}).then(f).catch(a)):a()}(window,document,localStorage);
    </script>


    <!-- BASE CSS -->
    <link href="/template_2/css/bootstrap.custom.min.css" rel="stylesheet">

    {{-- Sweet Alert --}}
    <link href="{{ URL::asset('admin/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/plugins/sweet-alert-v2/sweetalert2.min.css') }}" rel="stylesheet">




    <style type="text/css">
        /*background-color: var(--main-bg-color-banner);*/
        :root {
          --main-bg-color-header-promotion: {{ $company_main->color_header_promotion }};

          --main-bg-color-header-menu: {{ $company_main->color_header_menu }};
          --main-bg-color-font-menu: {{ $company_main->color_font }};
          --main-bg-color-font-menu-over: {{ $company_main->color_font_hover }};


          --main-bg-color-primario: {{ $company_main->color_primary }};
          --main-bg-color-secundario: {{ $company_main->color_secondary }};
          --main-bg-color-terciario: {{ $company_main->color_tertiary }};

          --main-bg-color-header-font: #fff;

        }

        a.disabled {
            pointer-events: none;
        }



        @media (max-width: 992px) {
    .header_desktop{

        display: none;
    }

   .header_movil{

        display: block;
    }

}

@media (min-width: 992px) {

    .header_desktop{

        display: block;
    }

    .header_movil{

        display: none;
    }
}


 @media (max-width: 600px) {
    .header_desktop_video{

        display: none;
    }

}

@media (min-width: 600px) {

    .header_desktop_video{

        display: block;
    }
}


    </style>



    <link href="/template_2/css/style.css" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="/template_2/css/home_1.css" rel="stylesheet">
    <link href="/template_2/css/new_styles.css" rel="stylesheet">


    <!-- Getbutton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            facebook: "{{ $company_main['facebook_id'] }}", // Facebook page ID
            whatsapp: "{{ $company_main['cel'] }}", // WhatsApp number
            //call: "{{ $company_main['phone'] }}", // Call phone number
            call_to_action: "¡Hola! ¿Quieres que te ayudemos?", // Call to action
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

     {!!$company['facebook_pixel']!!}
    @yield('plugins-css')

</head>

<body>

	<div id="page">
    {{--@include('template_2.layouts.sections.header_top')--}}
	@include('template_2.layouts.sections.header')
    @include('template_2.layouts.sections.header_responsive')


		<!--Page content -->
        @yield('content')

	<!-- /main -->

	  <!--Footer section -->
        @include('template_2.layouts.sections.footer')

	</div>
	<!-- page -->

	<div id="toTop"></div><!-- Back to top button -->




    <!-- Modal Payments Method-->
    <div class="modal fade" id="payments_method" tabindex="-1" role="dialog" aria-labelledby="payments_method_title" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="payments_method_title">Términos y Condiciones</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>{!! $company_main->terms_and_conditions !!}</p>
          </div>
        </div>
      </div>
    </div>

	<!-- COMMON SCRIPTS -->
    <script src="/template_2/js/common_scripts.min.js"></script>
    <script src="/template_2/js/main.js"></script>
    <script src="/admin/plugins/axios/axios.js"></script>


	<!-- SPECIFIC SCRIPTS -->
    <script src="/template_2/js/carousel-home.min.js"></script>

	<script src="/template_2/js/custom-app.js"></script>
	<script src="/template_2/js/fill_cart.js"></script>
    <script src="/template_2/js/add_to_cart.js"></script>


     {{-- Sweet alert --}}
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/sweet-alert-v2/sweetalert2.min.js') }}"></script>

    {{-- Jquery BlockUI --}}
    <script type="text/javascript" src="https://malsup.github.io/jquery.blockUI.js"></script>
    {{-- growl alert --}}
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/growl/jquery.growl.js') }}"></script>



    <script>

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

    @yield('plugins-js')

</body>
</html>
