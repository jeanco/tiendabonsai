<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte</title>
	<link href="{{ URL::asset('admin/panel/css/genericreport.css') }}" rel="stylesheet">
</head>
<body>
    <main>
        <header class="clearfix">
            <div id="logo">
                <img src="{{ $company->logotype }}" width="150">
            </div>

            <h1>Orden de pedido - {{ $order->code }}</h1>

            <div id="company" class="clearfix">
                <div>{{ $company->name_company }}</div>
                <div>{{ strip_tags($company->title_slogan) }}</div>
                <div>{{ $company->email }}</div>
                <div>{{ $company->cel }}</div>
                <div>{{ $company->address }}</div>
            </div>

            <div id="project">
                {{-- <div>
                    <span>Operación</span>
                    @if ($order->order_type == 0)
                        {{"Cotización"}}
                    @elseif ($order->order_type == 1)
                        {{"Venta"}}
                    @elseif ($order->order_type == 2)
                        {{"Compra"}}
                    @elseif ($order->order_type == 3)
                        {{"Gasto"}}
                    @elseif ($order->order_type == 5)
                        {{"Anulado"}}
                    @elseif ($order->order_type == 6)
                        {{"Pedido"}}
                    @elseif ($order->order_type == 7)
                        {{"Ajuste de Caja"}}
                    @endif
                </div> --}}
                <div><span>Cliente</span> {{ $customer->first_name }} {{ $customer->last_name }}</div>
                <div><span>E-mail</span> {{ $customer->email }}</div>
                <div><span>Célular</span> {{ $customer->cel_whatsapp }}</div>

                <div>
                    <span>Registrado</span>
                    {{-- @if ($order->order_type == 1)
                        {{ $order->date }}
                    @else --}}
                        {{ $order->created_at->format('Y-d-m') }}
                    {{-- @endif --}}
                </div>
                {{-- @if ($order->order_type == 6)
                    <div>
                        <span>Entrega</span>
                        {{ $order->date }}
                    </div>
                @endif --}}
            </div>

        </header>

        <div id="table-container">
            <table class="table" width="100%">
                <thead>
                    <tr>
                        <th width="34%" align="center" valign="middle">
                            Nombre del Producto
                        </th>
                        {{-- <th width="12%" align="center" valign="middle">
                            Color
                        </th> --}}
                        {{-- <th width="12%" align="center" valign="middle">
                            Talla
                        </th> --}}
                        <th width="12%" align="center" valign="middle">
                            Precio
                        </th>
                        <th width="13%" align="center" valign="middle">
                            Cantidad
                        </th>
                        <th width="17%" align="center" valign="middle">
                            Subtotal
                        </th>
                    </tr>
                </thead>
                <tbody>

                    {{-- @foreach($products as $id => $product) --}}
                        <?php $itemsQuantity = 0;?>
                        @foreach ($orderDetails as $key => $detail)
							<?php $itemsQuantity = $itemsQuantity + $detail->productQuantity; ?>
                            {{-- @if ($detail->producto == $product->producto) --}}
                                {{-- @if ($count == 0) --}}
                                    <tr style="background-color: #C1CED9; width: 100%; height: 3px"></tr>
                                    <tr>
                                        <td align="center" valign="middle">{{ $detail->productName }}</td>
                                        {{-- <td align="center" valign="middle">{{ $detail->color }}</td> --}}
                                        {{-- <td align="center" valign="middle">{{ $detail->talla }}</td> --}}
                                        <td align="center" valign="middle">S/.{{ $detail->productPrice }}</td>
                                        <td align="center" valign="middle">{{ $detail->productQuantity }}</td>
                                        <td align="center" valign="middle">S/.{{ $detail->productPrice * $detail->productQuantity}}</td>
                                    </tr>
                                    {{-- <?php $count = 1;?> --}}
                                {{-- @else
                                    <tr>
                                        <td align="center" valign="middle">{{ $detail->color }}</td>
                                        <td align="center" valign="middle">{{ $detail->talla }}</td>
                                        <td align="center" valign="middle">{{ $detail->precio }}</td>
                                        <td align="center" valign="middle">{{ $detail->cantidad }}</td>
                                        <td align="center" valign="middle">{{ $detail->cantidad * $detail->precio}}</td>
                                    </tr>
                                @endif
                            @endif --}}
                        @endforeach
						<tr>
							<td align="center" valign="middle" class="grand total">TOTAL</td>
							<td align="center" valign="middle" class="grand total"></td>
							<td align="center" valign="middle" class="grand total">{{$itemsQuantity}}</td>
							<td align="center" valign="middle" class="grand total">S/.{{ $order->price }}</td>
						</tr>
                    {{-- @endforeach --}}
                    {{-- <tr>
                        <td colspan="5" class="grand total"> TOTAL</td>
                        <td class="grand total  ">S/.{{ $order->price }}</td>
                    </tr> --}}
                </tbody>
				{{-- <tfoot>
					<tr>
						<td class="grand total">TOTAL</td>
						<td class="grand total"></td>
						<td class="grand total">{{$itemsQuantity}}</td>
						<td class="grand total">S/.{{ $order->price }}</td>
					</tr>
				</tfoot> --}}
            </table>
        </div>

        <div id="notices">
            <div class="title">Nota:</div>
            <div class="notice">Para cualquier consulta, escribanos a: {{ $company->email }}</div>
        </div>

    </main>
    <footer>
        {{ $company->name_company }}, {{ $company->cel }}, {{ $company->address }}.
    </footer>
</body>
</html>
