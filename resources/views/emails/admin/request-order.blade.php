<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Orden de Pedido recibida</title>
</head>
<body>
  <article style="color: #828286; display: block; font-size: 18px; margin: 0 auto; max-width: 650px; text-align: center" class="email">
    <img style="display: inline-block; margin-bottom: 1em" class="email__logo" src="{{$logo}}" alt="Logo"><br>
    <span style="font-size: 2em; font-weight: 300" class="email__title">¡Orden de Pedido registrado!</span>
    <p>Se ha registrado la Orden<strong style="color: #f00" class="primary"> {{ $code }}</strong> de {{ $name }}</p>
    <hr>
    <p style="margin-bottom: 0" class="mb0">Ingresa a <a href="http://www.kamasa.pe/admin/pedidos">http://www.kamasa.pe/plataforma</a> para ver el detalle de la orden</p>
    <hr>
    <footer style="font-size: 0.9em" class="footer">

    </footer>
  </article>
</body>
</html>
