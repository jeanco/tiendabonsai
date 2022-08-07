<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Orden de Pedido</title>
</head>

<body>
  <article style="color: black; display: block; font-size: 18px; margin: 0 auto; max-width: 650px; text-align: " class="email">
    <img style="display: inline-block; margin-bottom: 1em" class="email__logo" src="" alt="">
    <span style="font-size: 2em; font-weight: 300" class="email__title">¡Hola!</span>
    <p style="margin-bottom: 2rem" class="mb4">Tienes una solicitud</p>
    <table style="border-collapse: collapse; border-spacing: 0; width: 100%" class="table">
      <thead style="border-top: 1px dashed #828286; border-bottom: 1px dashed #828286" class="table__t">
        <tr>
          <th style="padding-bottom: 1rem; padding-top: 1rem" class="py3">Datos de la Novia</th>
          <th style="padding-bottom: 1rem; padding-top: 1rem" class="py3">Datos del Novio</th>
        </tr>
      </thead>
      <tbody style="border-top: 1px dashed #828286; border-bottom: 1px dashed #828286" class="table__t">
        <tr>
          <td style="padding-top: 1rem" class="pt3">
            <b>Nombres y apellidos:</b> {{ $boyfriend['full_name'] }}</td>
          <td style="padding-top: 1rem" class="pt3">
            <b>Nombres y apellidos:</b> {{ $girlfriend['full_name'] }}</td>
        </tr>

        <tr>
          <td style="padding-top: 1rem" class="pt3">
            <b>DNI:</b> {{ $boyfriend['identity_document'] }}</td>
          <td style="padding-top: 1rem" class="pt3">
            <b>DNI::</b> {{ $girlfriend['identity_document'] }}</td>
        </tr>
        <tr>
          <td style="padding-top: 1rem" class="pt3">
            <b>Celular:</b> {{ $boyfriend['cellphone'] }}</td>
          <td style="padding-top: 1rem" class="pt3">
            <b>Celular</b> {{ $girlfriend['cellphone'] }}</td>
        </tr>
        <tr>
          <td style="padding-top: 1rem" class="pt3">
            <b>Correo Electónico:</b> {{ $boyfriend['email'] }}</td>
          <td style="padding-top: 1rem" class="pt3">
            <b>Correo Electónico:</b> {{ $girlfriend['email'] }}</td>
        </tr>
        <tr>
          <td style="padding-top: 1rem" class="pt3">
            <b>Fecha de nacimiento:</b> {{ $boyfriend['birthday'] }}</td>
          <td style="padding-top: 1rem" class="pt3">
            <b>Fecha de nacimiento:</b> {{ $girlfriend['birthday'] }}</td>
        </tr>
        <tr>
          <td style="padding-top: 1rem" class="pt3">
            <b>Dirección:</b> {{ $boyfriend['address'] }}</td>
          <td style="padding-top: 1rem" class="pt3">
            <b>Dirección:</b> {{ $girlfriend['address'] }}</td>
        </tr>
      </tbody>
    </table>

    <p style="margin-bottom: 0" class="mb0">Dirección del lugar de la boda:</p>
    <p style="font-size: 2em; font-weight: 300;color: #f00;margin-top: 0;margin-bottom: 1rem" class="email__title primary mt0 mb3">
    <strong>{{ $address }}</strong>
    </p>
    <p style="margin-bottom: 0" class="mb0">Hora de la boda:</p>
    <p style="font-size: 2em; font-weight: 300;color: #f00;margin-top: 0;margin-bottom: 1rem" class="email__title primary mt0 mb3">
    <strong>{{ $hour }}</strong>
    </p>
    <p style="margin-bottom: 0" class="mb0">Fecha de la boda</p>
    <p style="font-size: 2em; font-weight: 300;color: #f00;margin-top: 0;margin-bottom: 1rem" class="email__title primary mt0 mb3">
    <strong>{{ $date }}</strong>
    </p>
  </article>
</body>

</html>
