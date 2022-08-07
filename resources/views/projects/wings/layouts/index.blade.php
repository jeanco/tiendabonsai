<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="" />
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-color" content="#333" />
    <!-- Favicons Icon -->
    <link rel="icon" href="/wings/images/favicon.ico" type="image/x-icon" />
    <!-- Page Title Here -->
    <title>Wings</title>
    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="/wings/css/plugins.css">
    <link rel="stylesheet" type="text/css" href="/wings/css/style.css">
    <link rel="stylesheet" type="text/css" href="/wings/css/templete.min.css">
    <link rel="stylesheet" type="text/css" href="/wings/css/magnific-popup.css">
    <link class="skin" rel="stylesheet" type="text/css" href="/wings/css/skin/skin-1.css">
    <!-- Revolution Slider Css -->
    <link rel="stylesheet" type="text/css" href="/wings/plugins/revolution/v5.4.3/css/settings.css">
    <link rel="stylesheet" type="text/css" href="/wings/plugins/revolution/v5.4.3/css/layers.css">
    <!-- Revolution Navigation Style -->
    <link rel="stylesheet" type="text/css" href="/wings/plugins/revolution/v5.4.3/css/navigation.css">
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900|Open+Sans:300,400,600,700,800|Raleway:100,200,300,400,500,600,700,800,900|Poppins:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- Font themify para los iconos -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css">
    <!-- Custom css -->
    <link rel="stylesheet" type="text/css" href="/wings/css/newstyles.css">
    <!-- Otros css -->
    @yield('plugins-css')
  </head>
  <body id="bg">
    <div class="page-wraper">
        <div id="loading-area"></div>
        <!--Header section -->
        @include('wings.layouts.sections.header')
        <!--Page content -->
        @yield('content')
        <!--Footer section -->
        @include('wings.layouts.sections.footer')
    </div>
    <!-- JavaScript  files ========================================= -->
    <script src="/wings/js/jquery.min.js"></script>
    <!-- jquery.min js -->
    <script src="/wings/js/wow.js"></script>
    <!-- wow.min js -->
    <script  src="/wings/js/bootstrap.min.js"></script>
    <!-- bootstrap.min js -->
    <script  src="/wings/js/bootstrap-select.min.js"></script>
    <!-- Form js -->
    <script  src="/wings/js/jquery.bootstrap-touchspin.js"></script>
    <!-- Form js -->
    <script  src="/wings/js/magnific-popup.js"></script>
    <!-- magnific-popup js -->
    <script  src="/wings/js/waypoints-min.js"></script>
    <!-- waypoints js -->
    <script  src="/wings/js/counterup.min.js"></script>
    <!-- counterup js -->
    <script src="/wings/js/imagesloaded.js"></script>
    <!-- masonry  -->
    <script src="/wings/js/masonry-3.1.4.js"></script>
    <!-- masonry  -->
    <script src="/wings/js/masonry.filter.js"></script>
    <!-- masonry  -->
    <script  src="/wings/js/owl.carousel.js"></script>
    <!-- OWL  Slider  -->
    <script  src="/wings/js/owl.linked.js"></script>
    <!-- OWL  Slider  -->
    <script  src="/wings/js/dz.carousel.js"></script>
    <!-- sortcode fuctions  -->
    <script  src="/wings/js/dz.ajax.js"></script>
    <!-- rangeslider fuctions -->
    <script src="/wings/plugins/rangeslider/rangeslider.js" ></script>

    <!-- contact-us js -->
    <!-- revolution JS FILES -->
    <script src="/wings/js/custom.js"></script>
    <script src="/wings/plugins/revolution/v5.4.3/js/jquery.themepunch.tools.min.js"></script>
    <script src="/wings/plugins/revolution/v5.4.3/js/jquery.themepunch.revolution.min.js"></script>
    <!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="/wings/plugins/revolution/v5.4.3/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="/wings/plugins/revolution/v5.4.3/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="/wings/plugins/revolution/v5.4.3/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="/wings/plugins/revolution/v5.4.3/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="/wings/plugins/revolution/v5.4.3/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="/wings/plugins/revolution/v5.4.3/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="/wings/plugins/revolution/v5.4.3/js/extensions/revolution.extension.video.min.js"></script>
    <script src="/wings/plugins/revolution/v5.4.3/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="/wings/js/rev.slider.js"></script>
    <script src="/wings/js/modernizr.custom.js"></script>
    <script src="/wings/js/jquery.hoverdir.js"></script>
    <!-- custom fuctions  -->
    <script src="/admin/panel/js/base.js"></script>
    <script src="/admin/plugins/axios/axios.js"></script>
    <script src="/wings/js/fill_cart.js"></script>
    <script src="/website/js/subscribe.js"></script>
    <script src="/wings/js/home.js"></script>
    <script>
    jQuery(document).ready(function() {
    	'use strict';
    	dz_rev_slider_1();
    });	/*ready*/
    </script>
    <!-- Other JS -->
    @yield('plugins-js')

    <script type="text/javascript">
    (function () {
        var options = {
            facebook: "107665874202246", // Facebook page ID
            whatsapp: "{{ $company['cel'] }}", // WhatsApp number
            call: "{{ $company['cel'] }}", // Call phone number
            call_to_action: "¡Hola! ¿Quiéres que te ayudemos?", // Call to action
            button_color: "#129BF4", // Color of button
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
  </body>
</html>
