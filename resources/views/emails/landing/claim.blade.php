<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mensaje de reclamo</title>
</head>
<body>
  <article style="color: #828286; display: block; font-size: 18px; margin: 0 auto; max-width: 650px; text-align: center" class="email">
    <img style="display: inline-block; margin-bottom: 2em" class="email__logo" src="{{$company['logotype']}}" alt="{{ $company['name'] }}">
    <span style="font-size: 2em; font-weight: 300" class="email__title">¡Hola!</span>
    <p style="margin-bottom: 2rem" class="mb4">Tienes <strong style="color: #f00" class="primary">un nuevo reclamo</strong> que atender:</p>

    <hr>
    <p style="undefined;margin-top: 1rem; margin-bottom: 1rem" class="email__sub-title my3">Datos Registrados:</p>
    <table style="border-collapse: collapse; border-spacing: 0; width: 100%;text-align: left" class="table left-align">
      <tbody style="border-top: 1px dashed #828286; border-bottom: 1px dashed #828286" class="table__t">
        <tr>
          <th>Tipo de reclamación: </th>
          <td>{{ $claim_option }}</td>
        </tr>
        <tr>
          <th style="padding-top: 1rem" class="pt3">Nombres:  </th>
          <td style="padding-top: 1rem" class="pt3">{{ $person['name'] }}</td>
        </tr>
        <tr>          <th>Teléfono o Celular: </th>
          <td>{{ $person['phone'] }}</td>
        </tr>
        <tr>
          <th>Otro Teléfono: </th>
          <td>{{ $person['other_phone'] }}</td>
        </tr>
        {{--
        <tr>
          <th>Nombre legal: </th>
          <td>{{ $person['legal_name'] }}</td>
        </tr>
        --}}
        <tr>
          <th>Dirección: </th>
          <td> {{ $person['address'] }} </td>
        </tr>
        <tr>
          <th>Referencia: </th>
          <td> {{ $person['reference'] }} </td>
        </tr>
        <tr>
          <th>Distrito: </th>
          <td>{{ $person['district'] }}</td>
        </tr>
        <tr>
          <th>Provincia: </th>
          <td>{{ $person['province'] }}</td>
        </tr>
        <tr>
          <th>Region: </th>
          <td>{{ $person['region'] }}</td>
        </tr>
        <tr>
          <th>Tipo de Documento: </th>
          <td>{{ $person['type_document'] }}</td>
        </tr>
        <tr>
          <th>Documento: </th>
          <td>{{ $person['document'] }}</td>
        </tr>
        <tr>
          <th>Email: </th>
          <td>{{ $person['email'] }}</td>
        </tr>
        <tr>
          <th>Monto objeto del reclamo: </th>
          <td>{{ $amount }}</td>
        </tr>
        <tr>
          <th>Bien contratado: </th>
          <td>{{ $item_contracted }}</td>
        </tr>
        <tr>
          <th>Descripción del bien contratado: </th>
          <td>{{ $item_description }}</td>
        </tr>
        <tr>
          <th>Comprobante de Pago: </th>
          <td>{{ $payment_voucher }}</td>
        </tr>
        <tr>
          <th>Detalles de reclamación: </th>
          <td>{{ $details }}</td>
        </tr>
        <tr>
          <th>Pedido del consumidor: </th>
          <td>{{ $order }}</td>
        </tr>
        <tr>
          <th>Acciones adoptadas por el proveedor: </th>
          <td>{{ $about_provider }}</td>
        </tr>
      </tbody>
    </table>
  </article>
</body>
</html>
