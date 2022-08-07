<div style="font: bold 20px 'Poppins', sans-serif; margin-bottom: 15px; color: var(--main-bg-color-font-menu);">Lista de Pedidos</div>
<div class="table-responsive">
    <table class="table shop_table" width="100%">
        <thead>
            <tr>
                <th style="padding: 6px; font-weight: 700;">#</th>
                <th style="padding: 6px; font-weight: 700;">CÓDIGO</th>
                <th style="padding: 6px; font-weight: 700;">FECHA</th>
                <th style="padding: 6px; font-weight: 700;">ESTADO</th>
                <th style="padding: 6px; font-weight: 700;">CANTIDAD</th>
                <th style="padding: 6px; font-weight: 700;">TOTAL</th>
                <th style="padding: 6px; font-weight: 700;">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
          @foreach($user_orders as $i => $order)
          <tr>
             <td>{{ $i+1 }}</td>
             <td>{{ $order['code'] }}</td>
             <td>{{ $order['date'] }}</td>
             <td>{{ $order['status_text'] }}</td>
             <td class="">{{ $order['quantity'] }}</td>
             <td class="">S/. {{ $order['total'] }}</td>
             <td>
               <a href="/pdf-pedido/{{ $order['uuid'] }}" target="_blank" class="btn-clear">

                 <i class="far fa-eye fa-2x"></i>
               </a>
             </td>
          </tr>
          @endforeach
        </tbody>
    </table>
    {{-- 
    <table class="table shop_table" width="100%">
        <thead>
            <tr>
                <th style="padding: 6px; font-weight: 700;">#</th>
                <th style="padding: 6px; font-weight: 700;">CÓDIGO</th>
                <th style="padding: 6px; font-weight: 700;">FECHA</th>
                <th style="padding: 6px; font-weight: 700;">DESCRIPCION</th>
                <th style="padding: 6px; font-weight: 700;">CANTIDAD</th>
                <th style="padding: 6px; font-weight: 700;">TOTAL</th>
                <th style="padding: 6px; font-weight: 700;">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
          @foreach($user_orders as $i => $order)
          <tr>
             <td>{{ $i+1 }}</td>
             <td>{{ $order['code'] }}</td>
             <td>{{ $order['date'] }}</td>
             <td>{{ $order['description'] }}</td>
             <td class="text-right">{{ $order['quantity'] }}</td>
             <td class="text-right">s/. {{ number_format($order['total'], 2, '.', '') }}</td>
             <td>
               <a href="/pdf-pedido/{{ $order['uuid'] }}" target="_blank" class="btn-clear">

                 <i class="far fa-eye fa-2x"></i>
               </a>
             </td>
          </tr>
          @endforeach
        </tbody>
    </table>
    --}}
</div>
