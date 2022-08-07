<!DOCTYPE html>
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

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background: #ffffff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
                <!--div class="top-right">
                    Estamos trabajando para brindarte un mejor servicio ...
                </div-->

            <div class="content">
                <div class="row text-center">
               <img src="{{ $company_main->logotype }}" alt="Afipe ERP" width="200px">
            </div>

            

                <!-- <div class="subtitle m-b-md">
                    Agregando valor tecnológico
                </div> -->
                 <br>


                
               <div class="row text-center">
               <!--img src="https://dl.dropboxusercontent.com/s/7ug4pf1gv4wuyfh/PAGINA%20EN%20CONSTRUCCION.png?dl=0" alt="Afipe ERP" width="280px"-->
               <h1>ERROR 404</h1>
            </div>

            <div class="links" style="color: #ffffff">
                 <br> <br> <br>
                 
                    <a  href="#" style="color: {{ $company_main->color_primary }}">Esta página no existe o temporalemente esta en mantenimiento.<br> Gracias por su comprención.</a>
                    <br><br><br>
                    <a href="/" class="btn_3" style="background: #402d7a;
    height: auto!important;
    line-height: normal!important;
    padding: 6px 18px;
    margin-top: 15px;
    border-radius: 25px;
    color: #fff!important;
    font-family: TemplateFont-bold, sans-serif;
}

">Ir a Inicio</a>

                </div>
            </div>
        </div>
    

</body></html>

</html>