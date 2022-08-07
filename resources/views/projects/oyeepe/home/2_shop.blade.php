<div class="row">
  @foreach($products as $key => $product)
  <div class="col-md-3 col-sm-4 col-xs-6" style="margin-bottom: 10px;">
    <div class="product-item ver2 shop-border">
      <div class="prod-item-img bd-style-2" style="border-bottom: 0px;">
        <a href="/productos/{{ $product->slug }}">
          <img src="{{ ($product->photo != '') ? $product->photo->resource_thumb : '' }}" alt="images" class="img-responsive" style="       background: #ffffff; border-radius: 5px;width: 100%; height: 200px; object-fit: cover; "></a>
        <div class="button" style="padding: 0px 0px 10px 10px;">
          @if($product->category_id != 3)
            <a href="" class="addcart add_to_cart" data-index="{{ $product->id }}">Agregar</a>
            <a href="#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
          @else
            <a href="" class="addcart save_coupon" data-index="{{ $product->id }}">Agregar Cupón</a>
          @endif
        </div>
      </div>
      <div class="prod-info" style="padding-left: 10px;     height: 125px;">
        <h3><a href="/productos/{{ $product->slug }}" style="color: #555;">{{ $product->name }}</a></h3>
        <div class="ratingstar sm">
          <span class="number" style="margin-left: 0px; color: #505050;">stock (12)</span>
        </div>
        <div class="prod-price">
          @if($product->promotion_available == 0)
          <span class="price black" style="color: #555;">S/.{{ $product->price }}</span>
          @else
          <span class="price black" style="color: #555;">S/.{{ $product->price_promotion }}</span><br>
          <span style="color: #505050; text-decoration:line-through; font-size: 10px;">S/.{{ $product->price }}</span>
          @endif

        </div>
      </div>
    </div>
  </div>
  @endforeach
  <div class="col-md-12" style="    text-align: center;">
     <div class="product-pagination" style="padding: 35px;">
    {{ $products->appends(request()->except('page'))->links() }}
  </div>
  </div>

</div>
<br>
<!--filter: brightness(70%);-->
