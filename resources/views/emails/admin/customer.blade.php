<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <article style="color: #828286; display: block; font-size: 18px; margin: 0 auto; max-width: 650px; text-align: center" class="email">
    <img style="display: inline-block; margin-bottom: 2em" class="email__logo" src="{{$company['logotype']}}" alt="{{$company['name']}}">
	<br>
	<span style="font-size: 2em; font-weight: 300" class="email__title">¡Hola!</span>
    <p style="margin-bottom: 2rem" class="mb4">Tienes <strong style="color: #f00" class="primary">nuevo pedido</strong> de tu <a style="color: #0074d9; text-decoration: none" class="link" href="">plataforma web</a> para atender</p>
    <table style="border-collapse: collapse; border-spacing: 0; width: 100%" class="table">
      <thead style="border-top: 1px dashed #828286; border-bottom: 1px dashed #828286" class="table__t">
        <tr>
          <th style="padding-bottom: 1rem; padding-top: 1rem" class="py3">Producto</th>
          <th style="padding-bottom: 1rem; padding-top: 1rem" class="py3">Precio unit.</th>
          <th style="padding-bottom: 1rem; padding-top: 1rem" class="py3">Cantidad</th>
          <th style="padding-bottom: 1rem; padding-top: 1rem" class="py3">Subtotal</th>
        </tr>
      </thead>
      <tbody style="border-top: 1px dashed #828286; border-bottom: 1px dashed #828286" class="table__t">
		 @foreach($products as $key => $product)
			 <tr>
				 <td style="padding-top: 1rem" class="pt3">{{$product['productName']}}</td>
				 <td style="padding-top: 1rem" class="pt3">{{$product['productPrice']}}</td>
				 <td style="padding-top: 1rem" class="pt3">{{$product['productQuantity']}}</td>
				 <td style="padding-top: 1rem" class="pt3">{{$product['productQuantity']*$product['productPrice']}}</td>
			</tr>
		 @endforeach
      </tbody>
    </table>
    <p style="margin-bottom: 0" class="mb0">TOTAL</p>
    <p style="font-size: 2em; font-weight: 300;color: #f00;margin-top: 0;margin-bottom: 1rem" class="email__title primary mt0 mb3"><strong>s./{{ $order['total'] }}</strong></p>
    <hr>
    <p style="margin: .6em 0; align-items: center; display: flex; flex-direction: row; flex-wrap: wrap; justify-content: space-around" class="email__detail">
      <span>Fecha de pedido: {{ explode(' ',$order['created_at'])[0] }}</span>
      <span>Hora: {{ explode(' ',$order['created_at'])[1] }}</span>
    </p>
    <hr>
    <p style="undefined;margin-top: 1rem; margin-bottom: 1rem" class="email__sub-title my3">Datos del comprador</p>
    <table style="border-collapse: collapse; border-spacing: 0; width: 100%;text-align: left" class="table left-align">
      <tbody style="border-top: 1px dashed #828286; border-bottom: 1px dashed #828286" class="table__t">
        <tr>
          <th style="padding-top: 1rem" class="pt3">Correo:  </th>
          <td style="padding-top: 1rem" class="pt3">{{$customer['email']}}</td>
        </tr>
        <tr>
          <th>De: </th>
          <td>{{$customer['first_name'].' '.$customer['last_name']}}</td>
        </tr>
		<tr>
		  <th>Celular: </th>
		  <td>{{$customer['cel']}}</td>
		</tr>
        <tr>
          <th>Ciudad: </th>
          <td>{{$customer['city']}}</td>
        </tr>
        <tr>
          <th>Pais: </th>
          <td>{{$customer['country']}}</td>
        </tr>
        <tr>
          <th style="padding-bottom: 1rem" class="pb3">Mensaje: </th>
          <td style="padding-bottom: 1rem" class="pb3">{{ $order['description'] }}</td>
        </tr>
      </tbody>
    </table>
  </article>
</body>
</html>
