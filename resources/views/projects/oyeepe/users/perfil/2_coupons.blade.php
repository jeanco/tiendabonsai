<!--div class="text-right">
  <a href="javascript:void(0);" data-toggle="tab" class="btn btn-black" style="width: 320px;"><span style="font-size: 18px;">Nuevo Cupón</span></a>
</div-->
<br>
<div class="row">
  @foreach($user_cupons as $i => $cupon)
  <div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 10px;">
      <div class="product-item ver2">
          <div class="prod-item-img bd-style-2  shop-border">
              <a href="#"><img src="{{ $cupon['image'] }}" alt="images" class="img-responsive" style="border-radius: 5px;"></a>
          </div>
          <div style="padding: 10px 3px;">
            <span style="font-size: 12px;">{{ $cupon['item'] }}</span><br>
            <span style="font-size: 9px;">stock (12)</span><br>

            @if($cupon['promotion_available'] == 1)
              <span style="font-size: 15px; font-weight: bold;">S/{{ $cupon['price_promotional'] }}</span><br>
              <span style="color: #ff6600; text-decoration:line-through; font-size: 12px;">S/{{ $cupon['price'] }}</span><br>
            @else
              <span style="font-size: 15px; font-weight: bold;">S/{{ $cupon['price'] }}</span><br>
            @endif
            <a href="/mi-cupon/{{ $cupon['id'] }}" target="_blank" class="btn btn-coupons btn-block">ver mi cupón</a>

            @if($cupon['status'] == 3)
              <a href="#" class="btn btn-coupons btn-block" disabled=true>Cupon anulado</a>
            @else
              <a href="#" class="btn btn-coupons btn-block" disabled=true>{{ $cupon['days_remaining'] }}</a>
            @endif
            <!-- Quedan N dias -->
          </div>
      </div>
  </div>
  @endforeach
</div>
<br>
