<!DOCTYPE html>
<html dir="ltr" lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Testing :V</title>
        <link rel="stylesheet" href="/website/css/bootstrap.css">
        <link rel="stylesheet" href="/website/css/font-awesome.css">
        <link rel="stylesheet" href="/website/css/ionicons.min.css">
        <link rel="stylesheet" href="/website/css/slick.css">
        <link rel="stylesheet" href="/website/css/slick-theme.css">
        <link rel="stylesheet" href="/website/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/website/css/style.css">
        <link rel="stylesheet" href="/website/css/oyeepe.css">
        <link rel="stylesheet" href="/website/css/bootstrap-slider.css">
        <link rel="stylesheet" href="/website/pluging/materialize/css/materialize.css">
        <link rel="stylesheet" href="/admin/css/website.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <script type="text/javascript" src="/website/js/jquery.js"></script>
        <script type="text/javascript">
        </script>
    </head>
    <body class="">
        <form>
            <div>
                <label>
                    <span>Correo Electrónico</span>
                    <input type="text" size="50" data-culqi="card[email]" id="card[email]">
                </label>
            </div>
            <div>
                <label>
                    <span>Número de tarjeta</span>
                    <input type="text" size="20" data-culqi="card[number]" id="card[number]">
                </label>
            </div>
            <div>
                <label>
                    <span>CVV</span>
                    <input type="text" size="4" data-culqi="card[cvv]" id="card[cvv]">
                </label>
            </div>
            <div>
                <label>
                    <span>Fecha expiración (MM/YYYY)</span>
                    <input size="2" data-culqi="card[exp_month]" id="card[exp_month]">
                    <span>/</span>
                    <input size="4" data-culqi="card[exp_year]" id="card[exp_year]">
                </label>
            </div>
        </form>
        <button id="btn_pagar">Pagar</button>
        {{-- Axios --}}
        <script type="text/javascript" src="{{ URL::asset('/admin/plugins/axios/axios.js') }}"></script>
        {{-- Custom functions --}}
        <script type="text/javascript" src="{{ URL::asset('/admin/panel/js/base.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('/website/js/bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('/website/js/owl.carousel.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('/website/js/slick.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('https://maps.googleapis.com/maps/api/js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('/website/js/main.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('/website/js/jquery.scrollUp.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('/website/pluging/notification/bootstrap-notify.js') }}"></script>
        {{--<script type="text/javascript" src="{{ URL::asset('/website/pluging/materialize/js/materialize.js') }}"></script> --}}
        @yield('pulgins-js')
        <script type="text/javascript">
        window.addEventListener('load',()=>{
        //setTimeout(carga, 2000);
        carga();
        function carga(){
        document.getElementById('circulo').className = 'hide';
        document.getElementById('contenidox').className = 'center';
        }
        })
        </script>
        <script src="https://checkout.culqi.com/v2"></script>
        <script>
        Culqi.publicKey = 'pk_test_yv85Xy5wMKbc0SU1';
        Culqi.init();
        </script>
        <script>
        $('#btn_pagar').on('click', function(e) {
        // Crea el objeto Token con Culqi JS
        Culqi.createToken();
        e.preventDefault();
        });
        function culqi() {
            if (Culqi.token) { // ¡Objeto Token creado exitosamente!
            var token = Culqi.token.id;
            alert('Se ha creado un token:' + token);

            axios.post(`/testing/culqi-charge`, {
                'token_example': token
            })
            .then((risposta) => {
                console.log(risposta.data);
            })
            .catch((error) => {

            });


            //En esta linea de codigo debemos enviar el "Culqi.token.id"
            //hacia tu servidor con Ajax
            } else { // ¡Hubo algún problema!
            // Mostramos JSON de objeto error en consola
            console.log(Culqi.error);
            alert(Culqi.error.user_message);
            }
        };
        </script>
    </body>
</html>