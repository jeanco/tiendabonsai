<!--End Sec Title-->
<div class="row clearfix">
  <!--Car Block 1 -->
  @foreach ($products as $product)

    @php
      $image = 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';

      if(count($product['other_photo'])){
        $image = $product['other_photo']['resource_thumb'];
      }

      if(count($product['main_photo'])){
        $image = $product['main_photo']['resource_thumb'];
      }
    @endphp

  <div class="car-block col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="inner-box">
        <div class="image">
            <div class="ribbon_model bg_4">Nuevo</div>
            <a href="/catalogo/{{ $product['slug'] }}"><img src="{{ $image }}" alt="" /></a>
        </div>
        <h3><a href="/catalogo/{{ $product['slug'] }}">{{ $product['name'] }}</a></h3>
        <div class="lower-box">
            <ul class="car-info">
                @foreach($product->attributes as $attribute)
                  <img src="{{ $attribute->category_attribute->icon }}" alt="" style="width:20px!important;">
                  <span>{{ $attribute->name }}</span>
                @endforeach
                {{--

                <li><span class="fa fa-road icon"></span>Diesel</li>
                <li><span class="icon fa fa-car"></span>{{ $product['subcategory']['name'] }}</li>
                <li><span class="icon fa fa-clock-o"></span>2014</li>
                --}}
            </ul>
        </div>
    </div>
  </div>
  @endforeach
  {{--
  <!--Car Block 2 -->
  <div class="car-block col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="inner-box">
        <div class="image">
            <div class="ribbon_model bg_4">Nuevo</div>
            <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-2.png" alt="" /></a>
        </div>
        <h3><a href="/catalogo/perfil">Audi A8 3.0 TDI S12</a></h3>
        <div class="lower-box">
            <ul class="car-info">
                <li><span class="fa fa-road icon"></span>Petrol</li>
                <li><span class="icon fa fa-car"></span>Sedan</li>
                <li><span class="icon fa fa-clock-o"></span>2008</li>
            </ul>
        </div>
    </div>
  </div>
  <!--Car Block 3 -->
  <div class="car-block col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="inner-box">
        <div class="image">
            <div class="ribbon_model bg_4">Nuevo</div>
            <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-3.png" alt="" /></a>
        </div>
        <h3><a href="/catalogo/perfil">Ford Fiesta Hatchback</a></h3>
        <div class="lower-box">
            <ul class="car-info">
                <li><span class="fa fa-road icon"></span>Diesel</li>
                <li><span class="icon fa fa-car"></span>Hatchback</li>
                <li><span class="icon fa fa-clock-o"></span>2005</li>
            </ul>
        </div>
    </div>
  </div>
  <!--Car Block 4 -->
  <div class="car-block col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="inner-box">
        <div class="image">
            <div class="ribbon_model bg_4">Nuevo</div>
            <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-4.png" alt="" /></a>
        </div>
        <h3><a href="/catalogo/perfil">Audi A8 3.0 TDI S12</a></h3>
        <div class="lower-box">
            <ul class="car-info">
                <li><span class="fa fa-road icon"></span>Petrol</li>
                <li><span class="icon fa fa-car"></span>Sedan</li>
                <li><span class="icon fa fa-clock-o"></span>2008</li>
            </ul>
        </div>
    </div>
  </div>
  <!--Car Block 5 -->
  <div class="car-block col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="inner-box">
        <div class="image">
            <div class="ribbon_model bg_4">Nuevo</div>
            <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-5.png" alt="" /></a>
        </div>
        <h3><a href="/catalogo/perfil">Caterham 7 Superlight</a></h3>
        <div class="lower-box">
            <ul class="car-info">
                <li><span class="fa fa-road icon"></span>Diesel</li>
                <li><span class="icon fa fa-car"></span>Sedan</li>
                <li><span class="icon fa fa-clock-o"></span>2010</li>
            </ul>
        </div>
    </div>
  </div>
  <!--Car Block 6 -->
  <div class="car-block col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="inner-box">
        <div class="image">
            <div class="ribbon_model bg_5">Nuevo</div>
            <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-6.png" alt="" /></a>
        </div>
        <h3><a href="/catalogo/perfil">Mercedes Benz c Class</a></h3>
        <div class="lower-box">
            <ul class="car-info">
                <li><span class="fa fa-road icon"></span>Diesel</li>
                <li><span class="icon fa fa-car"></span>Sedan</li>
                <li><span class="icon fa fa-clock-o"></span>2014</li>
            </ul>
        </div>
    </div>
  </div>
  <!--Car Block 7 -->
  <div class="car-block col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="inner-box">
        <div class="image">
            <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-7.png" alt="" /></a>
        </div>
        <h3><a href="/catalogo/perfil">ferrari F12 Novitec</a></h3>
        <div class="lower-box">
            <ul class="car-info">
                <li><span class="fa fa-road icon"></span>Diesel</li>
                <li><span class="icon fa fa-car"></span>Sedan</li>
                <li><span class="icon fa fa-clock-o"></span>2002</li>
            </ul>
        </div>
    </div>
  </div>
  <!--Car Block 8 -->
  <div class="car-block col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="inner-box">
        <div class="image">
            <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-8.png" alt="" /></a>
        </div>
        <h3><a href="/catalogo/perfil">Hyundai Grand i10 Sedán</a></h3>
        <div class="lower-box">
            <ul class="car-info">
                <li><span class="fa fa-road icon"></span>Petrol</li>
                <li><span class="icon fa fa-car"></span>Sedan</li>
                <li><span class="icon fa fa-clock-o"></span>2014</li>
            </ul>
        </div>
    </div>
  </div>
  <!--Car Block 9 -->
  <div class="car-block col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="inner-box">
        <div class="image">
            <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-9.png" alt="" /></a>
        </div>
        <h3><a href="/catalogo/perfil">Hyundai Accent</a></h3>
        <div class="lower-box">
            <ul class="car-info">
                <li><span class="fa fa-road icon"></span>Diesel</li>
                <li><span class="icon fa fa-car"></span>Sedan</li>
                <li><span class="icon fa fa-clock-o"></span>2008</li>
            </ul>
        </div>
    </div>
  </div>
  <!--Car Block 10 -->
  <div class="car-block col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="inner-box">
        <div class="image">
            <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-10.png" alt="" /></a>
        </div>
        <h3><a href="/catalogo/perfil">Hyundai Elantra</a></h3>
        <div class="lower-box">
            <ul class="car-info">
                <li><span class="fa fa-road icon"></span>Petrol</li>
                <li><span class="icon fa fa-car"></span>Sedan</li>
                <li><span class="icon fa fa-clock-o"></span>2016</li>
            </ul>
        </div>
    </div>
  </div>
  <!--Car Block 11 -->
  <div class="car-block col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="inner-box">
        <div class="image">
            <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-11.png" alt="" /></a>
        </div>
        <h3><a href="/catalogo/perfil">Hyundai Verna</a></h3>
        <div class="lower-box">
            <ul class="car-info">
                <li><span class="fa fa-road icon"></span>Diesel</li>
                <li><span class="icon fa fa-car"></span>Sedan</li>
                <li><span class="icon fa fa-clock-o"></span>2010</li>
            </ul>
        </div>
    </div>
  </div>
  <!--Car Block 12 -->
  <div class="car-block col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="inner-box">
        <div class="image">
            <div class="ribbon_model bg_5">Nuevo</div>
            <a href="/catalogo/perfil"><img src="/template_8/images/resource/car-12.png" alt="" /></a>
        </div>
        <h3><a href="/catalogo/perfil">Hyundai Ioniq</a></h3>
        <div class="lower-box">
            <ul class="car-info">
                <li><span class="fa fa-road icon"></span>Diesel</li>
                <li><span class="icon fa fa-car"></span>Sedan</li>
                <li><span class="icon fa fa-clock-o"></span>2018</li>
            </ul>
        </div>
    </div>
  </div>
  --}}
</div>
<!--Styled Pagination-->
<div class="styled-pagination text-center">
    {{ $products->appends(request()->except('page'))->links() }}
    {{--
    <ul class="clearfix">
        <li><a href="#"><span class="fa fa-caret-left"></span></a></li>
        <li><a href="#" class="active">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#"><span class="fa fa-caret-right"></span></a></li>
    </ul>
    --}}
</div>
  <!--End Styled Pagination-->
