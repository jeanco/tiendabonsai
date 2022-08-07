<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Orden de Pedido</title>
</head>
<body>
  <article style="color: #828286; display: block; font-size: 18px; margin: 0 auto; max-width: 650px; text-align: center" class="email">
    <img style="display: inline-block; margin-bottom: 1em" class="email__logo" src="{{ $logo }}" alt="{{ $companyName }}">
    <span style="font-size: 2em; font-weight: 300" class="email__title">¡Hola {{ $name }}!</span>
    <p style="margin-bottom: 2rem" class="mb4">Tu orden fue registrada con el código <strong style="color: #f00" class="primary"> {{ $code }}</strong></p>
    <hr>
    <p style="font-size: 1.3em; text-transform: uppercase;margin: 0" class="email__sub-title m0">Gracias por realizar tu pedido</p>
    <p style="font-size: 0.98em; text-transform: uppercase;margin: 0" class="email__sub-sub-title m0">- Nuestros asesores de venta se pondrán en contacto. -</p>
    <hr>
  </article>
</body>
</html>
