<!-- Slider -->
<div class="main-slider style-two default-banner ">
  <div class="tp-banner-container ">
    <div class="tp-banner" style="height: 700px;" >
      <div id="dz_rev_slider_4_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="news-gallery36" data-source="gallery" style="margin:0px auto;background-color:#ffffff;padding:0px;margin-top:0px;margin-bottom:0px;  padding-top: 85px ">
        <!-- START REVOLUTION SLIDER 5.3.0.2 fullwidth mode -->
        <div id="dz_rev_slider_4" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.3.3">
          <ul class="x">
            <!-- SLIDE 1 -->

            @foreach ($covers as $key =>  $cover)
          <li data-index="rs-{{ $key }}" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="revolution/assets/100x50_3176d-road-bg.jpg"  data-rotate="0"  data-savepresentation="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                <!-- MAIN IMAGE -->
             {{--<img src="{{ $cover['image'] }}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina style="height: 600px; background-repeat: repeat !important; background-size: auto !important;">--}}
            
                <img class=" rev-slidebg " src="{{ $cover['image'] }}"  alt=""  data-bgposition="center center" data-bgfit="contain" data-bgrepeat="repeat"  data-no-retina data-padding-top="25px"  style="height: 600px; margin-top: 25px;">
      
                 <style type="text/css">
                   @media only screen and (max-width: 768px) {
                        .defaultimg  { 
                       
                          /*background-size: cover !important; */
                              height: 160px !important;
                       
                      }

                      .tp-banner,
                        .fullwidthbanner-container {
                            height: 300px !important;
                            padding-top: 75px !important;
                        }
                        
                      }
                 </style> 
          
             
              

             
                <!-- LAYERS -->
                <!-- LAYER NR. 1 -->
             {{-- <div class="tp-caption   tp-resizeme" id="slide-2957-layer-{{ $key }}" data-x="550" data-y="300" data-voffset="130" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="x:50px;opacity:0;s:1500;e:Power3.easeOut;" data-transform_out="opacity:0;s:300;" data-start="1200" data-responsive_offset="on" style="z-index: 11;">
                <img src="{{ $cover['image'] }}" alt="" data-ww="auto" data-hh="auto" data-no-retina>
                </div>--}}
            </li>
            @endforeach

{{--
            <li data-index="rs-6" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="revolution/assets/100x50_3176d-road-bg.jpg"  data-rotate="0"  data-savepresentation="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                <!-- MAIN IMAGE -->
                <img src="/wings/images/main-slider/slide1.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                <!-- LAYERS -->
                <!-- LAYER NR. 1 -->
                <div class="tp-caption   tp-resizeme" id="slide-2957-layer-5" data-x="502" data-y="center" data-voffset="130" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="x:50px;opacity:0;s:1500;e:Power3.easeOut;" data-transform_out="opacity:0;s:300;" data-start="1200" data-responsive_offset="on" style="z-index: 11;">
                    <img src="/wings/img/slide1.png" alt="" data-ww="auto" data-hh="auto" data-no-retina>
                </div>
            </li> --}}
            <!-- END SLIDE 1 -->
            <!-- SLIDE 2 -->
            {{-- <li data-index="rs-5" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="revolution/assets/100x50_3176d-road-bg.jpg"  data-rotate="0"  data-savepresentation="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                <!-- MAIN IMAGE -->
                <img src="/wings/images/main-slider/slide2.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                <!-- LAYERS -->
                <!-- LAYER NR. 1 -->
                <div class="tp-caption tp-resizeme" id="slide-2957-layer-4" data-x="502" data-y="center" data-voffset="130" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="x:50px;opacity:0;s:1500;e:Power3.easeOut;" data-transform_out="opacity:0;s:300;" data-start="1200" data-responsive_offset="on" style="z-index: 11;">
                    <img src="/wings/images/bus_frontal.png" alt="" data-ww="auto" data-hh="auto" data-no-retina>
                </div>
            </li> --}}
            <!-- END SLIDE 2 -->
          </ul>
          <div class="tp-bannertimer tp-bottom bg-primary" style="height: 5px; "></div>
        </div>
      </div>
      <!-- END REVOLUTION SLIDER -->
    </div>
  </div>

  
  
  <!-- SEARCH Form -->
 <div class="form-slide" style="bottom: 12%;">
    <div class="container-header">
      <form class="search-car" action="new-car-search-result-list.html" method="post">
      <div class="form-head">
        <h2>Busca lo que necesitas</h2>
      </div>
      <!-- TABS -->
      <div class="form-find-area">
          <ul class="nav theme-tabs">
            <li role="presentation" class="active"><a data-toggle="tab"  aria-controls="new-car"  href="/wings/plugins/imagegallery/img/loading.gif#new-car">AUTOMOVILES</a></li>
            <li role="presentation" ><a data-toggle="tab"  aria-controls="popular" href="/wings/plugins/imagegallery/img/loading.gif#used-car">REPUESTOS</a></li>
          </ul>
          <div class="tab-content">
            <!-- NEW CAR -->
            <div id="new-car"  class="tab-pane active clearfix">
              <ul class="nav text-center check-nav">
                <!-- <li>
                  input id="radio1" type="radio" name="new_search" checked="checked" value="budget"/>
                  <label for="radio1">Por Marca</label>
                </li>
                <li>
                  <input id="radio2" type="radio" name="new_search" value="brand"/>
                  <label for="radio2">Por presupuesto</label>
                </li> -->
              </ul>

              <div  id="budgetDiv" class="new_form_div">
                <div class="input-group">
                  <select class="form-control" style="font-size: 18px;">
                    <option value="">Selecciona Categoría</option>
                    @foreach ($category->subcategories as $subcategory)
                      <option id="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="input-group">
                  <select class="form-control" style="font-size: 18px;">
                    <option>Selecciona Marca</option>
                    <option>Asiastar</option>
                    <option>Dongfeng</option>
                    <option>Sachs</option>
                  </select>
                </div>
              </div>

              <div  id="brandDiv" class="new_form_div" style="display: none;">
                <div class="input-group">
                  <select class="form-control" atyle="font-size: 18px;">
                    <option>Por Presupuesto</option>
                    <option>1000 - 10000 USD</option>
                    <option>11000 - 20000 USD</option>
                    <option>21000 - 30000 USD</option>
                    <option>31000 - 40000 USD</option>
                    <option>41000 - 50000 USD</option>
                    <option>Mayor de 50000 USD</option>
                  </select>
                </div>
                <div class="input-group">
                  <select class="form-control" style="font-size: 18px;">
                    <option>Todos los tipos</option>
                    <option>Hatchback</option>
                    <option>Sedans</option>
                    <option>MUV</option>
                    <option>Pickup</option>
                    <option>Station Wagon</option>
                  </select>
                </div>
              </div>

              <div class="input-group">
                <button class="site-button button-lg btn-block" type="submit">BUSCAR</button>
              </div>
              <!--div class="input-group text-center">
                <a class="site-button-link" href="new-car-search.html">BUSQUEDA AVANZADA <i class="fa fa-angle-right"></i></a>
              </div-->
            </div>
            <!-- USED CAR -->
            <div id="used-car"  class="tab-pane clearfix">
              <ul class="nav text-center check-nav">
                <!--li>
                  <input id="radio3" type="radio" name="used_search" checked="checked" value="used_budget"/>
                  <label for="radio3">Por Presupuesto</label>
                </li>
                <li>
                  <input id="radio4" type="radio" name="used_search" value="used_model"/>
                  <label for="radio4">Por Modelo</label>
                </li-->
              </ul>
              <div id="used_budgetDiv" class="used_form_div">
                <div class="input-group">
                  <select class="form-control" style="font-size: 18px;">
                    <option value="">Selecciona Tipo</option>
                    @foreach ($spare_parts->subcategories as $subcategory)
                      <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="input-group">
                  <select class="form-control" style="font-size: 18px;">
                    <option>Selecciona Marca</option>
                    <option>Asiastar</option>
                    <option>Dongfeng</option>
                    <option>Sachs</option>
                  </select>
                </div>
              </div>

              <div  id="used_modelDiv" class="used_form_div" style="display: none;">
                <div class="input-group">
                  <select class="form-control" style="font-size: 18px;">
                    <option>Selecciona Tipo</option>
                    <option>Hatchback</option>
                    <option>Sedans</option>
                    <option>MUV</option>
                    <option>Pickup</option>
                    <option>Station Wagon</option>
                  </select>
                </div>
                <div class="input-group">
                  <select class="form-control" style="font-size: 18px;">
                    <option>Selecciona Ciudad</option>
                    <option>Tacna</option>
                    <option>Arequipa</option>
                    <option>Lima</option>
                  </select>
                </div>
              </div>

              <div class="input-group">
                <button class="site-button button-lg btn-block" type="submit" onclick="window.location.href='sed-car-search.html'">BUSCAR</button>
              </div>
              <!-- <div class="input-group text-center">
                <a class="site-button-link" href="new-car-search.html">BUSQUEDA AVANZADA <i class="fa fa-angle-right"></i></a>
              </div> -->
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- SEARCH Form END -->
</div>



<!-- Slider END -->
<div class="form-slide-responsive" >
<div  style="padding-bottom: 30px; padding-top: 20px;" >
<div class="form-content-section">
    <div class="container">
      <form class="search-car" action="new-car-search-result-list.html" method="post" style="-webkit-box-shadow: 1px 9px 21px -2px rgba(0,0,0,0.75);
-moz-box-shadow: 1px 9px 21px -2px rgba(0,0,0,0.75);
box-shadow: 1px 9px 21px -2px rgba(0,0,0,0.75); margin:10px auto;
        display:block; ">
      <div class="form-head">
        <h2>Busca lo que necesitas</h2>
      </div>
      <!-- TABS -->
      <div class="form-find-area">
          <ul class="nav theme-tabs">
            <li role="presentation" class="active"><a data-toggle="tab"  aria-controls="new-car"  href="/wings/plugins/imagegallery/img/loading.gif#new-car">AUTOMOVILES</a></li>
            <li role="presentation" ><a data-toggle="tab"  aria-controls="popular" href="/wings/plugins/imagegallery/img/loading.gif#used-car">REPUESTOS</a></li>
          </ul>
          <div class="tab-content">
            <!-- NEW CAR -->
            <div id="new-car"  class="tab-pane active clearfix">
              <ul class="nav text-center check-nav">
                <!-- <li>
                  input id="radio1" type="radio" name="new_search" checked="checked" value="budget"/>
                  <label for="radio1">Por Marca</label>
                </li>
                <li>
                  <input id="radio2" type="radio" name="new_search" value="brand"/>
                  <label for="radio2">Por presupuesto</label>
                </li> -->
              </ul>

              <div  id="budgetDiv" class="new_form_div">
                <div class="input-group">
                  <select class="form-control">
                    <option value="">Selecciona Categoría</option>
                    @foreach ($category->subcategories as $subcategory)
                      <option id="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="input-group">
                  <select class="form-control">
                    <option>Selecciona Marca</option>
                    <option>Asiastar</option>
                    <option>Dongfeng</option>
                    <option>Sachs</option>
                  </select>
                </div>
              </div>

              <div  id="brandDiv" class="new_form_div" style="display: none;">
                <div class="input-group">
                  <select class="form-control">
                    <option>Por Presupuesto</option>
                    <option>1000 - 10000 USD</option>
                    <option>11000 - 20000 USD</option>
                    <option>21000 - 30000 USD</option>
                    <option>31000 - 40000 USD</option>
                    <option>41000 - 50000 USD</option>
                    <option>Mayor de 50000 USD</option>
                  </select>
                </div>
                <div class="input-group">
                  <select class="form-control">
                    <option>Todos los tipos</option>
                    <option>Hatchback</option>
                    <option>Sedans</option>
                    <option>MUV</option>
                    <option>Pickup</option>
                    <option>Station Wagon</option>
                  </select>
                </div>
              </div>

              <div class="input-group">
                <button class="site-button button-lg btn-block" type="submit">BUSCAR</button>
              </div>
              <!--div class="input-group text-center">
                <a class="site-button-link" href="new-car-search.html">BUSQUEDA AVANZADA <i class="fa fa-angle-right"></i></a>
              </div-->
            </div>
            <!-- USED CAR -->
            <div id="used-car"  class="tab-pane clearfix">
              <ul class="nav text-center check-nav">
                <!--li>
                  <input id="radio3" type="radio" name="used_search" checked="checked" value="used_budget"/>
                  <label for="radio3">Por Presupuesto</label>
                </li>
                <li>
                  <input id="radio4" type="radio" name="used_search" value="used_model"/>
                  <label for="radio4">Por Modelo</label>
                </li-->
              </ul>
              <div id="used_budgetDiv" class="used_form_div">
                <div class="input-group">
                  <select class="form-control">
                    <option value="">Selecciona Tipo</option>
                    @foreach ($spare_parts->subcategories as $subcategory)
                      <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="input-group">
                  <select class="form-control">
                    <option>Selecciona Marca</option>
                    <option>Asiastar</option>
                    <option>Dongfeng</option>
                    <option>Sachs</option>
                  </select>
                </div>
              </div>

              <div  id="used_modelDiv" class="used_form_div" style="display: none;">
                <div class="input-group">
                  <select class="form-control">
                    <option>Selecciona Tipo</option>
                    <option>Hatchback</option>
                    <option>Sedans</option>
                    <option>MUV</option>
                    <option>Pickup</option>
                    <option>Station Wagon</option>
                  </select>
                </div>
                <div class="input-group">
                  <select class="form-control">
                    <option>Selecciona Ciudad</option>
                    <option>Tacna</option>
                    <option>Arequipa</option>
                    <option>Lima</option>
                  </select>
                </div>
              </div>

              <div class="input-group">
                <button class="site-button button-lg btn-block" type="submit" onclick="window.location.href='sed-car-search.html'">BUSCAR</button>
              </div>
              <!-- <div class="input-group text-center">
                <a class="site-button-link" href="new-car-search.html">BUSQUEDA AVANZADA <i class="fa fa-angle-right"></i></a>
              </div> -->
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>
  </div>
