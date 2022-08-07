<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Orden de Pedido</title>
</head>

<body>
  <article style="color: #828286; display: block; font-size: 18px; margin: 0 auto; max-width: 650px;" class="email">
    <div style="text-align: center;">
      <img style="display: inline-block; margin-bottom: 1em; max-height: 200px;" class="email__logo" src="{{ $company['logotype_thumb'] }}"
        alt="Kamasa">
      <span style="font-size: 2em; font-weight: 300; display: block;" class="email__title">¡Hola!</span>
    </div>
    <p style="margin-bottom: 1rem" class="mb4">Tu Orden fue registrada, te atenderemos dentro de 48 Horas.</p>
    <p style="margin-bottom: 1rem" class="mb4">ORDEN DE PEDIDO:
      <b>{{ $code }}</b>
    </p>
    <p style="margin-bottom: 1rem" class="mb4">Fecha:
      <b>{{ $date }}</b>
    </p>
    <table style="border-collapse: collapse; border-spacing: 0; width: 100%; text-align: center" class="table">
      <thead style="border-top: 1px dashed #828286; border-bottom: 1px dashed #828286" class="table__t">
        <tr>
          <th style="padding-bottom: 1rem; padding-top: 1rem" class="py3">Cantidad</th>
          <th style="padding-bottom: 1rem; padding-top: 1rem" class="py3">Producto</th>
          <th style="padding-bottom: 1rem; padding-top: 1rem" class="py3">Precio U.</th>
          <th style="padding-bottom: 1rem; padding-top: 1rem" class="py3">Descuento</th>
          <th style="padding-bottom: 1rem; padding-top: 1rem" class="py3">SubTotal</th>
        </tr>
      </thead>
      <tbody style="border-top: 1px dashed #828286; border-bottom: 1px dashed #828286" class="table__t">
        @foreach($products as $key => $product)
        <tr>
          <td style="padding-top: 1rem" class="pt3">{{ $product['quantity'] }}</td>
          <td style="padding-top: 1rem" class="pt3">{{ $product['name'] }}</td>
          <td style="padding-top: 1rem" class="pt3">{{ $product['price'] }}</td>
          @if($product['discount'] == 0)
          <td style="padding-top: 1rem;" class="pt3">S/ {{ $product['discount'] }}</td>
          @else
          <td style="padding-top: 1rem; color: red;" class="pt3">S/-{{ $product['discount'] }}</td>
          @endif

          <td style="padding-top: 1rem" class="pt3">S/ {{ $product['total'] }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <p style="margin-bottom: 0" class="mb0">Total
      <b>({{ $quantity }} u.): </b>
      <strong style="font-size: 2em; font-weight: 300;color: #f00;margin-top: 0;margin-bottom: 1rem" class="email__title primary mt0 mb3">S/ {{ $total }}</strong>
    </p>
    <p class="u-fz-h2 u-right-align" style="color:red; font-size:16px">
      *Para Envíos en Tacna, debe adicionar S/ 20.00 Soles.
    </p>
    <br>
    <hr>
    <p style="font-size: 1.3em; text-transform: uppercase;margin: 0; text-align:center;" class="email__sub-title m0">Gracias por realizar tu pedido</p>
    <p style="font-size: 0.98em; text-transform: uppercase;margin: 0; text-align: center;" class="email__sub-sub-title m0">- Nuestros asesores de venta se pondrán en contacto dentro de las próximas 48 horas. -</p>
    <hr>
    <footer style="font-size: 0.9em;padding-top: 1rem;padding-bottom: 1rem; text-align:center;" class="footer pt3 pb3">
      <span style="font-size: 1.3em; text-transform: uppercase" class="email__sub-title">{{ $company['name'] }}</span>
      <p style="margin: 0" class="m0">RUC: {{ $company['ruc'] }}</p>
      <p style="margin: 0" class="m0">Cel: {{ $company['cel'] }}</p>
      <p style="margin: 0" class="m0">Teléfono: {{ $company['phone'] }}</p>
      <p style="margin: 0" class="m0">Correo: {{ $company['email'] }}</p>
      <p style="margin: 0" class="m0">Direccion: {{ $company['address'] }}</p>
    </footer>
    <hr>

    <p style=";font-size: 1.3em; text-transform: uppercase;margin-bottom: 1rem" class="email__sub-title mb3">Forma de pago seleccionado:</p>
    <ul style=";margin: 0;padding: 0" class="m0 p0">
      <li style=";list-style: none; margin-bottom: .25rem" class="check-item">
        <span style="font-size: 1em; text-transform: uppercase" class="email__sub-title">{{ $payment_way_selected['type'] }}</span>
        <div>
          <img style=";max-height: 30px; vertical-align: middle" src="{{ $payment_way_selected['logo'] }}">
        </div>
        <p style="margin: 0" class="m0">{{ $payment_way_selected['description'] }}</p>
        <p style="margin: 0" class="m0">{{ $payment_way_selected['instructions'] }}</p>
        <p style="margin: 0" class="m0">{{ $payment_way_selected['owner_name'] }}</p>
        <p style="margin: 0" class="m0">{{ $payment_way_selected['owner_document'] }}</p>
      </li>
    </ul>

    @if($is_separated)
    <p style="margin-bottom: 1rem" class="mb4">Esta orden está separada</p>
    <p style="margin-bottom: 1rem" class="mb4">El adelando es el 10%: {{ $have_to_pay }}</p>
    @endif
    <hr>
    <p style=";font-size: 1.3em; text-transform: uppercase;margin-bottom: 1rem" class="email__sub-title mb3">Otras formas de pago:</p>

    <ul style=";margin: 0;padding: 0" class="m0 p0">
      @foreach($payment_ways as $key => $payment_way)
      <li style=";list-style: none; margin-bottom: .25rem" class="check-item">
        <span style="font-size: 1em; text-transform: uppercase" class="email__sub-title">{{ $payment_way['type'] }}</span>
        <div>
          <img style=";max-height: 30px; vertical-align: middle" src="{{ $payment_way['logo'] }}" alt="Realiza tu pago">
        </div>
        <p style="margin: 0" class="m0">{{ $payment_way['description'] }}</p>
        <p style="margin: 0" class="m0">{{ $payment_way['instructions'] }}</p>
        <p style="margin: 0" class="m0">{{ $payment_way['owner_name'] }}</p>
        <p style="margin: 0" class="m0">{{ $payment_way['owner_document'] }}</p>
      </li>
      <br>
      @endforeach
    </ul>
    <br>
  </article>
</body>

</html>
