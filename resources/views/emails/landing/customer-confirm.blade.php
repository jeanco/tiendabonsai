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
    <span style="font-size: 2em; font-weight: 300" class="email__title">¡Hola {{ $customer['first_name'].' '.$customer['last_name'] }}!</span>
    <p style="margin-bottom: 2rem" class="mb4">Esta es la lista de productos que elegiste</p>
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
		<span>Información Adicional</span>
    </p>
    <hr>
	<p>
		{{$order['message']}}
	</p>
    <hr>
    <footer style="font-size: 0.9em;padding-top: 1rem;padding-bottom: 1rem" class="footer pt3 pb3">
      <span style="font-size: 1.3em; text-transform: uppercase" class="email__sub-title">{{$company['name']}}</span>
      <p style="margin: 0" class="m0">RUC: ????????????''</p>
      <p style="margin: 0" class="m0">Cel: {{$company['cel']}}</p>
      <p style="margin: 0" class="m0">Teléfono: {{$company['phone']}}</p>
      <p style="margin: 0" class="m0">Correo: {{$company['email']}}</p>
      <p style="margin: 0" class="m0">Direccion: {{$company['address']}}</p>
    </footer>
    <hr>
	@if(count($accounts))
	    <p style=";font-size: 1.3em; text-transform: uppercase;margin-bottom: 1rem" class="email__sub-title mb3">- Cuentas para realizar depósitos -</p>
		@foreach($accounts as $key => $account)
			<ul style=";margin: 0;padding: 0" class="m0 p0">
			  <li style=";list-style: none; margin-bottom: .25rem" class="check-item">
				<p style=";margin: 0">{{ $account['account_name'] }}</p>
				<div>
				  <img style=";max-height: 30px; vertical-align: middle" src="{{$account['bank_image_thumb']}}">
				  <span style=";font-weight: 700">{{ $account['account_number'] }}</span>
				</div>
			  </li>
			</ul>
		@endforeach
	@endif
    <hr>
  </article>
</body>
</html>
