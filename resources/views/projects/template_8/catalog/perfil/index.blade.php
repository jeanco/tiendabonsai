@extends('template_8.layouts.index')
@section('content')
<!--Page Title-->
{{--<section class="page-title" style="background-image:url( {{ isset( $gallery_company[2]->resource) ? $gallery_company[2]->resource:  ''  }});">
    <div class="auto-container">
        <h1>{{ $product['name'] }}</h1>
    </div>
</section>--}}
<!--End Page Title-->
<!--Inventory Section-->
<section class="inventory-section inventory-single">
  <div class="auto-container">
    <div class="row">
      <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
          <div class="mb-1 ">
              <h2>{{ $product['name'] }}</h2>
             
          </div>
        </div>
     

        <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-3">
          <div class="form-group" style="    text-align: right;">
                    <a href="/catalogo"><button type="reset" class="reset-all"><span class="fa fa-undo"></span>Volver a ShowRoom</button></a> 
                </div>
        </div>
    </div>
      <div class="row clearfix">
        
        <!--Column-->
        <div class="column col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <!--Inventory Details-->
            <div class="inventory-details">

                <!--Product Carousel-->
                <div class="product-carousel-outer">
                    <div class="big-image-outer">
                        <!--Product image Carousel-->
                        <ul class="prod-thumbs-carousel  owl-theme owl-carousel">
                          @foreach($product['images'] as $key => $image)

                          
                          @if($key == 0)

                          @else
                       
                         
                          {{--<li><figure class="image"><img src="{{ $image['resource'] }}" alt=""><a class="lightbox-image fancy-btn" data-fancybox-group="example-gallery" href="{{ $image['resource'] }}" title="{{ $product['name'] }}"><span class="fa fa-search-plus"></span></a></figure></li>--}}
                          

                          <li><figure class="image"><img src="{{ $image['resource'] }}" alt=""></figure></li>
                       
                          @endif
                        
                          @endforeach

                          @if($product['link'])
                            <li><figure class="image"><img src="https://img.youtube.com/vi/{{ explode('=', $product['link'])[1] }}/0.jpg" alt=""><a class="lightbox-image fancy-btn" data-fancybox-group="example-gallery" href="{{ $product['link'] }}" title="{{ $product['name'] }}"><span class="fa fa-search-plus"></span></a></figure></li>
                          @endif


                         <!--          _previewImage = _type == 1 ? statement.image_thumb : `https://img.youtube.com/vi/${statement.link.split(`=`)[1]}/0.jpg`;
 -->
                            {{--

                            <li><figure class="image"><img src="/template_8/images/hyundai/hyundai-02.jpg" alt=""><a class="lightbox-image fancy-btn" data-fancybox-group="example-gallery" href="/template_8/images/hyundai/hyundai-02.jpg" title="Image Title Here"><span class="fa fa-search-plus"></span></a></figure></li>
                            <li><figure class="image"><img src="/template_8/images/hyundai/hyundai-03.jpg" alt=""><a class="lightbox-image fancy-btn" data-fancybox-group="example-gallery" href="https://www.youtube.com/watch?v=gzDHy39yNww" title="Image Title Here"><span class="fa fa-play"></span></a></figure></li>
                            <li><figure class="image"><img src="/template_8/images/hyundai/hyundai-04.jpg" alt=""><a class="lightbox-image fancy-btn" data-fancybox-group="example-gallery" href="/template_8/images/hyundai/hyundai-04.jpg" title="Image Title Here"><span class="fa fa-search-plus"></span></a></figure></li>
                            <li><figure class="image"><img src="/template_8/images/hyundai/hyundai-05.jpg" alt=""><a class="lightbox-image fancy-btn" data-fancybox-group="example-gallery" href="/template_8/images/hyundai/hyundai-05.jpg" title="Image Title Here"><span class="fa fa-search-plus"></span></a></figure></li>
                            <li><figure class="image"><img src="/template_8/images/hyundai/hyundai-06.jpg" alt=""><a class="lightbox-image fancy-btn" data-fancybox-group="example-gallery" href="/template_8/images/hyundai/hyundai-06.jpg" title="Image Title Here"><span class="fa fa-search-plus"></span></a></figure></li>
                            <li><figure class="image"><img src="/template_8/images/hyundai/hyundai-07.jpg" alt=""><a class="lightbox-image fancy-btn" data-fancybox-group="example-gallery" href="/template_8/images/hyundai/hyundai-07.jpg" title="Image Title Here"><span class="fa fa-search-plus"></span></a></figure></li>
                            <li><figure class="image"><img src="/template_8/images/hyundai/hyundai-08.jpg" alt=""><a class="lightbox-image fancy-btn" data-fancybox-group="example-gallery" href="https://www.youtube.com/watch?v=gzDHy39yNww" title="Image Title Here"><span class="fa fa-play"></span></a></figure></li>
                            <li><figure class="image"><img src="/template_8/images/hyundai/hyundai-09.jpg" alt=""><a class="lightbox-image fancy-btn" data-fancybox-group="example-gallery" href="/template_8/images/hyundai/hyundai-09.jpg" title="Image Title Here"><span class="fa fa-search-plus"></span></a></figure></li>
                            <li><figure class="image"><img src="/template_8/images/hyundai/hyundai-10.jpg" alt=""><a class="lightbox-image fancy-btn" data-fancybox-group="example-gallery" href="/template_8/images/hyundai/hyundai-10.jpg" title="Image Title Here"><span class="fa fa-search-plus"></span></a></figure></li>
                            --}}
                        </ul>
                    </div>


                    <div class="row">
                        <div class="col-md-9">
                           <!--Product Thumbs Carousel-->
                    <div class="prod-image-carousel owl-theme owl-carousel">

                      @foreach($product['images'] as $key => $image)

                       
                        @if($key == 0)

                        @else
                       
                        
                        {{--<div class="thumb-item" style="    width: 100%;"><figure class="thumb-box"><img src="{{ $image['resource_thumb'] }}" alt=""></figure></div>--}}

                        <div class="thumb-item" style="    width: 100%;"><figure class="thumb-box"><img src="{{ $image['resource_thumb'] }}" alt=""><a class="lightbox-image fancy-btn" data-fancybox-group="example-gallery" href="{{ $image['resource'] }}" title="{{ $product['name'] }}"><span class="fa fa-search-plus"></span></a></figure></div>
                       
                        @endif
                       
                      @endforeach

                      @if($product['link'])
                        <div class="thumb-item"><figure class="thumb-box"><img src="https://img.youtube.com/vi/{{ explode('=', $product['link'])[1] }}/0.jpg" alt=""></figure></div>
                      @endif
                      
                      

                        {{--
                        <div class="thumb-item"><figure class="thumb-box"><img src="/template_8/images/hyundai/hyundai-02.jpg" alt=""></figure></div>
                        <div class="thumb-item"><figure class="thumb-box"><img src="/template_8/images/hyundai/hyundai-03.jpg" alt=""><div class="video-icon"><span class="fa fa-play"></span></div></figure></div>
                        <div class="thumb-item"><figure class="thumb-box"><img src="/template_8/images/hyundai/hyundai-04.jpg" alt=""></figure></div>
                        <div class="thumb-item"><figure class="thumb-box"><img src="/template_8/images/hyundai/hyundai-05.jpg" alt=""></figure></div>
                        <div class="thumb-item"><figure class="thumb-box"><img src="/template_8/images/hyundai/hyundai-06.jpg" alt=""></figure></div>
                        <div class="thumb-item"><figure class="thumb-box"><img src="/template_8/images/hyundai/hyundai-07.jpg" alt=""></figure></div>
                        <div class="thumb-item"><figure class="thumb-box"><img src="/template_8/images/hyundai/hyundai-08.jpg" alt=""><div class="video-icon"><span class="fa fa-play"></span></div></figure></div>
                        <div class="thumb-item"><figure class="thumb-box"><img src="/template_8/images/hyundai/hyundai-09.jpg" alt=""></figure></div>
                        <div class="thumb-item"><figure class="thumb-box"><img src="/template_8/images/hyundai/hyundai-10.jpg" alt=""></figure></div>
                        --}}
                    </div>
                        </div>
                         <div class="col-md-3">
                          <a href="{{ $product['pdf'] }}" target="_blank" >
                 <button type="button" class="theme-btn btn-style-one add-to-cart" style="width: 100%;height: 83%;"><span class="fa fa-file-pdf-o"></span> Descargar Ficha Técnica</button>
            </a>
                          
                        </div>
                        
                      </div>
                   



                </div><!--End Product Carousel-->

                <!--Vehicle Details-->
                <div class="vehicle-details">
                    

                    
                    <div class="images">
                      <div class="row clearfix">
                          <div class="image-column col-md-9 col-sm-4 col-xs-12">
                              <div class="text-description">
                        {{--<h2>{{ $product['name'] }}</h2>--}}
                        <input type="hidden" id="product_id" value="{{ $product['id'] }}">
                        <div class="text">
                            {!! $product['description'] !!}
                            {{--
                            <p>Ahora más amplio, cómodo y con seguridad reforzada. Con estabilidad a alta velocidad y estructura de carrocería altamente optimizada, Tucson presenta ingeniería innovadora en sus líneas, que entregan una experiencia Premium como ningún otro.<br>
                              Diseño fluido refinado, Atrevido y sofisticado. Su físico esculpido define la Escultura Fluida 2.0.
                            </p>
                            --}}
                        </div>
                    </div>

                                 <div class="form-group">
                    <a href="/cotizar-modelo" class="theme-btn btn-style-one product_quotation">Cotizar Auto</a>
                </div>
                            </div>
                            

                            <div class="image-column col-md-3 col-sm-8 col-xs-12">
                                <div class="listing-outer clearfix pt-0">
                                      <div class="">
                                          <h2>Color</h2>
                                          <div class="widget-content">
                                              <div class="single-item-carousel owl-carousel owl-dots">

                                                      @foreach($gallery_color[0]->contents as $key => $colors)
                                                                            
                                                         
                                                  <div class="offer-block px-5">
                                                      <p style="line-height: 1.2; text-align: center;">
                                                       <figure class="image"><img src="{{ $colors->resource }}" alt=""></figure>
                                                      </p>
                                                  </div>
                                                
                                                          
                                                      @endforeach

                                                    
                                               
                                                 
                                                  

                                              </div>
                                               <div class="owl-controls"> 
   
                                               <div class="owl-dots"> 
                                                <div class="owl-dot active"><span></span></div> 
                                                <div class="owl-dot"><span></span></div> 
                                                <div class="owl-dot"><span></span></div> 
                                               </div> 
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                   <div class="mb-3">
              
              
                <a href="">Compartir</a>
                  <a href="#" class="mr-3 share-fb"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
                  <a href="#" class="mr-3 share-twitter"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>
                  <a href="whatsapp://send?text={{ $product->name }}%20http://{{$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']}}" data-action="share/whatsapp/share" class="mr-3"><i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i></a>
              </div>


                            </div>

                          
                           
                        </div>
                    </div>
                    
                </div>

                <!--Details Panel Box-->
                {{--<div class="details-panel-box">

                    <div class="panel-header">
                      <div class="panel-btn clearfix">
                        <h4><strong>Detalles</strong> de {{ $product['name'] }}</h4>
                        <div class="arrow"><span class="fa fa-angle-down"></span></div>
                      </div>
                    </div>
                    <div class="panel-content">
                      <div class="content-box">
                          <div class="listing-outer clearfix">
                              {!! $product['specifications'] !!}
<!--
                              <div class="list-column">
                                  <ul class="list-style-seven">
                                        <li class="clearfix"><span class="ttl">Tipo</span><span class="dtl">SUV</span></li>
                                        <li class="clearfix"><span class="ttl">Motor</span><span class="dtl">Diesel</span></li>
                                        <li class="clearfix"><span class="ttl">Año</span><span class="dtl">2018</span></li>
                                    </ul>
                                </div>
                                <div class="list-column">
                                  <ul class="list-style-seven">
                                        <li class="clearfix"><span class="ttl">Transmisión</span><span class="dtl">Semi Automático</span></li>
                                        <li class="clearfix"><span class="ttl">Cilindrada</span><span class="dtl">1.8</span></li>
                                        <li class="clearfix"><span class="ttl">Color</span><span class="dtl">Metalico</span></li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>

                </div>--}}

                <!--Details Panel Box-->
                <div class="details-panel-box tech-details">
                    <div class="panel-header">
                      <div class="panel-btn clearfix">
                        <h4><strong>Características</strong></h4>
                        <div class="arrow"><span class="fa fa-angle-down"></span></div>
                      </div>
                    </div>
                    <div class="panel-content">
                      <div class="content-box tabs-box inventory-tabs clearfix">
                          <div class="tab-buttons-outer">
                              <ul class="tab-buttons clearfix">
                                @foreach($gallery_types as $key => $type)
                                  @if(count($type['contents']))
                                  <li class="tab-btn {{ $key == 0 ? 'active-btn' : '' }}" data-tab="#{{ $type['slug'] }}">{{ $type['name'] }}</li>
                                  @endif                                  
                                @endforeach
                                {{--
                                <li class="tab-btn " data-tab="#tab-one">Diseño</li>
                                  <li class="tab-btn" data-tab="#tab-two">Capacidad</li>
                                  <li class="tab-btn" data-tab="#tab-three">Comodidad</li>
                                  <li class="tab-btn" data-tab="#tab-four">Seguridad</li>
                                --}}
                              </ul>
                            </div>

                            <!--Tabs Content-->
                            <div class="tabs-content">
                              <!--Tab / Active Tab-->
                              @foreach($gallery_types as $key => $type)
                              <div class="tab {{ $key == 0 ? 'active-tab' : '' }}" id="{{ $type['slug'] }}">
                                  <div class="listing-outer clearfix pt-0">
                                      <div class="footer-widget offer-widget">
                                          <h2 class="p-4"></h2>
                                          <div class="widget-content">
                                              <div class="single-item-carousel owl-carousel owl-dots">
                                                  @foreach($type['contents'] as $content)
                                                  <div class="offer-block px-5">
                                                      <p style="line-height: 1.2; text-align: center;">
                                                        <img src="{{ $content['resource'] }}" alt="">
                                                          {!! $content['content']  !!}
                                                          
                                                      </p>
                                                  </div>
                                                  @endforeach
                                                  

                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div><!--End Tab-->
                              @endforeach
                              {{--
                              <div class="tab active-tab" id="tab-one">
                                  <div class="listing-outer clearfix pt-0">
                                      <div class="footer-widget offer-widget">
      									                  <h2 class="p-4"></h2>
                                          <div class="widget-content">
                                              <div class="single-item-carousel owl-carousel owl-dots">
                                              	  <div class="offer-block px-5">
                                                      <p style="line-height: 1.2; text-align: center;">
                                                          <b>Ahora más amplio, cómodo y con seguridad reforzada</b><br><br>
                                                          Con estabilidad a alta velocidad y estructura de carrocería altamente optimizada, Tucson presenta ingeniería innovadora en sus líneas, que entregan una experiencia Premium como ningún otro.<br><br>
                                                          <img src="https://gildemeister-retail.pe/modelos/newtucson/images/galeria2.jpg" alt="">
                                                      </p>
                                                  </div>
                                                  <div class="offer-block px-5">
                                                      <p style="line-height: 1.2; text-align: center;">
                                                          <b>Comodidad</b><br><br>
                                                          Con Hyundai SmartSense, nuestro innovador sistema de asistencia de manejo avanzado, incluye la más moderna tecnología de seguridad activa, hecha para brindarle al usuario mayor seguridad y paz mental.<br><br>
                                                          <img src="https://gildemeister-retail.pe/modelos/newtucson/images/galeria1.jpg" alt="">
                                                      </p>
                                                  </div>
                                                  <div class="offer-block px-5">
                                                      <p style="line-height: 1.2; text-align: center;">
                                                          <b>Reflexivas características interiores que te permiten concentrarte</b><br><br>
                                                          El asiento del conductor en Tucson tiene una línea sin complicaciones de las tecnologías más esenciales y de vanguardia que le permiten mantenerse enfocado en su misión. El espacioso interior también es lo suficientemente grande para acomodar todas las herramientas que necesita para lograr sus ganancias.<br><br>
                                                          <img src="https://gildemeister-retail.pe/modelos/newtucson/images/interiores1.jpg" alt="">
                                                      </p>
                                                  </div>
                                                  <div class="offer-block px-5">
                                                      <p style="line-height: 1.2; text-align: center;">
                                                          <b>Sé tan atrevido como quieras; estás a salvo con Tucson</b><br><br>
                                                          Las tecnologías de conducción avanzada aplicadas al nuevo Tucson se basan en medidas de seguridad rigurosas en las que siempre se puede confiar.<br><br>
                                                          <img src="https://gildemeister-retail.pe/modelos/newtucson/images/seguridad1.jpg" alt="">
                                                      </p>
                                                  </div>
                                                  <div class="offer-block px-5">
                                                      <p style="line-height: 1.2; text-align: center;">
                                                          <b>Comodidad del cliente</b><br><br>
                                                          <br>Dominio impecable de los materiales y las formas para lograr la perfección y el lujo, por encima de su clase.<br>
                                                          <img src="https://hyundai.pe/wp-content/uploads/2019/05/comodidad-2.jpg" alt="">
                                                      </p>
                                                  </div>
                                                  <div class="offer-block px-5">
                                                      <p style="line-height: 1.2; text-align: center;">
                                                          <b>Moldura lateral</b><br><br>
                                                          El Tucson lleva el diseño al siguiente nivel con una estilizada y aguda línea lateral que mejora su carácter fuerte y veloz.<br><br>
                                                          <img src="https://hyundai.pe/wp-content/uploads/2019/07/all-new-tucson-moldura-lateral.jpg" alt="">
                                                      </p>
                                                  </div>

                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div><!--End Tab-->
                                <!--Tab-->
                              <div class="tab" id="tab-two">
                                    <div class="listing-outer clearfix pt-0">
                                        <div class="row align-items-center">
                                            <div class="col-md-8 pt-2">
                                                <p style="line-height: 1.2; text-align: center;">
                                                    <b>AGREGUE COMBUSTIBLE A LA PASIÓN. LUEGO MANEJE</b><br><br>
                                                    Los motores de gasolina y diesel se combinan con transmisiones de alto rendimiento para maximizar la eficiencia del combustible y la durabilidad. La conducción receptiva y potente le dará el impulso adicional que necesita para completar su desafío.
                                                </p>
                                            </div>
                                            <div class="col-md-4 pt-2">
                                                <img src="https://gildemeister-retail.pe/modelos/newtucson/images/performance1.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-4 pt-2">
                                                <img src="https://gildemeister-retail.pe/modelos/newtucson/images/performance2.jpg" alt="">
                                            </div>
                                            <div class="col-md-8 pt-2">
                                                <p style="line-height: 1.2; text-align: center;">
                                                    <b>TRANSMISIÓN DE 8 VELOCIDADES + RETROCESO</b><br><br>
                                                    La transmisión de doble embrague y de 8 velocidades (DCT) de Hyundai provee una excepcional economía de combustible y bajas emisiones de CO2 mientras se incrementa increíblemente el desempeño en la aceleración. Sólo disponible con ciertos tipos de motores.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--End Tab-->
                                <!--Tab-->
                              <div class="tab" id="tab-three">
                                    <div class="listing-outer clearfix pt-0">
                                        <div class="row">
                                            <div class="col-md-6 pt-2">
                                                <p style="line-height: 1.2; text-align: center;">
                                                    <img src="/template_8/images/hyundai/hyundai-05.jpg" alt=""><br><br>
                                                    El asiento del conductor en Tucson tiene una línea sin complicaciones de las tecnologías más esenciales y de vanguardia que le permiten mantenerse enfocado en su misión.
                                                </p>
                                            </div>
                                            <div class="col-md-6 pt-2">
                                                <p style="line-height: 1.2; text-align: center;">
                                                    <img src="/template_8/images/hyundai/hyundai-06.jpg" alt=""><br><br>
                                                    El espacioso interior también es lo suficientemente grande para acomodar todas las herramientas que necesita para lograr sus ganancias.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--End Tab-->
                                <!--Tab-->
                                <div class="tab" id="tab-four">
                                    <div class="listing-outer clearfix">
                                        <p style="line-height: 1.2; text-align: center;">
                                            <span style="font-weight: 700;">Diseño aerodinámico</span><br><br>
                                            Con una estabilidad de alta velocidad y una estructura de carrocería altamente optimizada, el Tucson aporta una ingeniería innovadora a su elegante diseño de última generación que ofrece una experiencia premium como ninguna otra. Gracias al vórtice mejorado, el mayor coeficiente de resistencia y las características avanzadas, puede disfrutar en todo momento del confort y la confianza en carretera.<br><br>
                                            <img src="https://hyundai.pe/wp-content/uploads/2019/05/tucson-tl-fl-design-side-accordion-main-original.jpg" alt="">
                                        </p>
                                    </div>
                                </div><!--End Tab-->
                              --}}
                            </div><!--End Tabs Content-->

                        </div>
                    </div>
                </div>

                <!--Details Panel Box-->
                {{--<div class="details-panel-box extra-features">
                    <div class="panel-header">
                      <div class="panel-btn clearfix">
                        <h4><strong>Características</strong></h4>
                        <div class="arrow"><span class="fa fa-angle-down"></span></div>
                      </div>
                    </div>
                    <div class="panel-content">
                      <div class="content-box">
                            <div class="listing-outer clearfix">
                              {!! $product['features'] !!}

                            </div>
                        </div>
                    </div>
                </div>--}}

                <!--Offer Box-->
                {{--<div class="offer-box">
                  <div class="row clearfix">
                      <!--Offer Column-->
                        <div class="offer-column col-md-7 col-sm-12 col-xs-12">
                          <div class="inner-box">
                              <h3>Garantía</h3>
                              {!! $product['warranty']  !!}
                              
                            </div>
                        </div>
                        <!--Offer Banner-->
                        <div class="offer-banner col-md-5 col-sm-6 col-xs-12">
                          <div class="inner-box">
                                <figure class="image"><img src="{{ $product['main_photo']['resource'] }}" alt=""></figure>
                                <div class="upper-info">
                                  <h3>{{ $product['name'] }}</h3>
                                    <div class="link"><a href="/cotizar-modelo" target="_blank" class="theme-btn btn-style-one product_quotation">Cotizar</a></div>
                                </div>
                                <div class="limit">* JM Automotriz</div>
                          </div>
                        </div>
                    </div>
                </div>--}}

            </div>
        </div>
        <!--Form Column-->
         {{--<div class="brochures-widget mb-2">
            <div class="default-sidebar-title mb-3"><h2>Información</h2></div>
            <a href="{{ $product['pdf'] }}" class="btn_features btn-block py-3">
                <span class="fa fa-file-pdf-o"></span> Ficha Técnica
            </a>
          </div>
          <!--Cars Form-->
          <div class="cars-form mb-5">
              <form method="" action="">
                <ul class="list-style-eight">
                    <li class="clearfix"><span class="ttl">Marca:</span><span class="dtl">{{ $product['category']['name'] }}</span></li>
                    <li class="clearfix"><span class="ttl">Tipo:</span><span class="dtl">{{ $product['subcategory']['name'] }}</span></li>
                    @foreach($product['own_attributes'] as $attribute)
                      <li class="clearfix"><span class="ttl">{{ $attribute['category_attribute']['name'] }}:</span><span class="dtl">{{ $attribute['name'] }}</span></li>
                    @endforeach
                    
                </ul>
                
                
              </form>
          </div>--}}
          <div class="row">
            <div class="col-md-12">
               <div class="default-sidebar-title mb-1"><h2>Relacionados</h2></div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
                @foreach ($related_products as $related_product)
        <div class="form-column col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <!--Brochures Widget-->
         
          
          <div class="brochures-widget pt-4 mb-5">
              

              
                @php
                  $image = 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';

                  if(count($related_product['other_photo'])){
                    $image = $related_product['other_photo']['resource'];
                  }

                  if(count($related_product['main_photo'])){
                    $image = $related_product['main_photo']['resource'];
                  }
                @endphp

              <div class="my-3" style="display: flex; align-items: center;">
                  <figure class="author-thumb img-circle mr-4"><img class="img-circle" src="{{ $image }}" alt="" style="max-width: 100px;"></figure>
                  <a href="/catalogo/{{ $related_product['slug'] }}">
                    <span style="font-weight: 700; font-size: 18px">{{ $related_product['name'] }}</span><br>
                    <span>{{ $related_product['category']['name'] }}</span>
                  </a>
              </div>
             
            
          </div>
        </div>
         @endforeach
            </div>
          </div>
         
         
      </div>
  </div>
</section>
@stop
@section('plugins-css')
<style type="text/css">
  
  .prod-thumbs-carousel .owl-prev,
 .prod-thumbs-carousel .owl-next {
 /* position: absolute;
  top: 100%;
  transform: translateY(-50%);*/
  background: rgb(255 255 255 / 0%) !important;
  font-size: 100px !important;
}

.prod-thumbs-carousel .owl-prev {
  left: -2rem;

  position: absolute;
    /*top: -400px !important;*/
    height: 100%;
    z-index: 2;
    color: #040404;
}

.prod-thumbs-carousel .owl-prev span{

    padding-left: 20px !important;
   

}

.prod-thumbs-carousel .owl-next {
  right: -2rem;
  /*top: -400px !important;*/
  
}

.prod-thumbs-carousel .owl-next span{

    left: -15px !important;
   

}

.prod-thumbs-carousel .owl-next span:before, .prod-thumbs-carousel .owl-prev span:before {
  background: #2323235c;
    padding: 5px;
}


.prod-thumbs-carousel .inventory-details .product-carousel-outer .prod-thumbs-carousel .owl-prev {
    left: -80px;
}

.prod-thumbs-carousel .inventory-details .product-carousel-outer .prod-thumbs-carousel .owl-next {
    right: -65px;
}



.single-item-carousel .owl-prev {
  position: absolute;
    top: 50%;
    left: 0px;
    font-size: 60px;
}

.single-item-carousel .owl-next {
  position: absolute;
    top: 50%;
    right: 0px;
    font-size: 60px;
}

</style>
@stop
@section('plugins-js')
  <script src="/template_8/js/product.js"></script>
  <script type="text/javascript">
    const ARTICLE_URL = encodeURIComponent(window.location.href);
    
    $('.share-fb').click(function(){
      open_window('http://www.facebook.com/sharer/sharer.php?u='+ARTICLE_URL, 'facebook_share');
    });

    $('.share-twitter').click(function(){
      open_window('http://twitter.com/share?url='+ARTICLE_URL, 'twitter_share');
    });

    function open_window(url, name){
      window.open(url, name, 'height=320, width=640, toolbar=no, menubar=no, scrollbars=yes, resizable=yes, location=no, directories=no, status=no');
    }

  </script>

@stop
