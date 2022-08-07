<html lang="en"><head>
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--meta name="theme-color" content="#327d00" /-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="{{ $company_main->name_company }}" />
    <title>{{ $company_main->name_company }}</title>
    <meta name="theme-color" content="#004180">
    <meta name="description" content="">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap">

    <link href="/admin/bootstrap-4.4/css/bootstrap.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background: #ffffff;
                color: #636b6f;
                font-family: 'Montserrat', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .subtitle {
                font-size: 40px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-align: center;
                /*text-transform: uppercase;*/
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .color_1 {color: #eb3136;}
            .btn_suscribete {
              background-color: #fdc010;
              color: #eb3136;
              font-weight: 800;
              font-size: 25px;
              transition: all 0.5s ease;
            }
            .btn_suscribete:hover {
              background-color: #fdc010;
              color: #eb3136;
              transform: translateY(-5px);
            }

            .img_super {width: 400px;}
            @media (max-width: 500px) {
              .img_super {width: 90%;}
            }

        </style>

        {!!$company['facebook_pixel']!!}
        {!!$company['google_analytics']!!}
    </head>
    <body style="background-image: url(/template_11/img/fondo_c.jpg); background-position: center; background-size: cover;">

      <div class="page-wrapper">
        <div class="container">
          <div class="row justify-content-md-center align-items-center" style="min-height: 100vh;">
            <div class="col-md-10">
              <div class="mb-5 text-center">
                <img src="/template_11/img/LOGO_MARKET.png" alt="" style="width: 200px;">
              </div>
              <div class="mb-4 text-center color_1" style="font-size: 24px; font-weight: 800;">¡ P R O N T O !</div>
              <div class="mb-5 text-center">
                <img src="/template_11/img/supermercado.png" class="img_super" alt="">
              </div>
              <div class="mb-5 text-center">
                <a href="https://bit.ly/3dvILDZ" target="_blank" class="btn btn_suscribete px-5">¡SUSCRÍBETE!</a>
              </div>
              <div class="text-center" style="line-height: 1.2; font-size: 15px; font-weight: 600; color: #1a1a1a;">
                Y ADQUIERE TU CÓDIGO DE DESCUENTO<br>
                PARA CANJEARLO EN NUESTRA<br>
                CAMPAÑA DE LANZAMIENTO
              </div>
            </div>
          </div>
        </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    </body>
</html>
