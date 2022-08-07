<!-- left part start -->
    <div class="row">
        <div class="p-lr15 clearfix ">
            {{-- <div class="filter-bar clearfix m-b30 p-lr15">
                <select class="pull-left max-w200">
                      <option>Ordenar por Defecto</option>
                      <option>Precio Mayor a Menor</option>
                      <option>Precio Menor a Mayor </option>
                      <option>Por Nombre: A a Z </option>
                      <option>Por Nombre: Z a A </option>
                </select>
                <ul class="nav theme-tabs pull-right">
                      <li>8 resultados Mostrados</li>
                </ul>
            </div> --}}
        </div>
        <!-- blog grid  -->
        <div class="dlab-blog-grid-3">
              <!-- Item 1 -->
              @foreach ($products as $key =>  $product)
                <div class="post card-container col-lg-4 col-md-6 col-sm-6 col-xs-12">
                  <div class="dlab-feed-list m-b30">
                    <div class="dlab-media" style="height: 180px;">
                    <a href="/repuestos/{{ $product->slug }}"><img src="{{ ($product->photo != null) ? $product->photo->resource_thumb : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" style=""></a>
                    </div>
                    <div class="dlab-info">
                      <h4 class="dlab-title" style="font-size: 15px"><a href="/repuestos/{{ $product->slug }}">{{ $product->name }}</a></h4>
                      <div class="dlab-separator bg-black"></div>
                      <p class="dlab-price"><span class="text-primary">S/. {{ $product->price }}</span></p>
                    </div>
                    <div class="icon-box-btn text-center">
                    <button type="button" class="btn btn-info add_to_cart" data-index="{{ $product->id }}">Agregar al Carrito</button>
                    </div>
                  </div>
                </div>
              @endforeach

              <!-- Fin de Item 1 -->
              <!-- Item 2 -->
              {{-- <div class="post card-container col-lg-4 col-md-6 col-sm-6 col-xs-12">
                  <div class="dlab-feed-list m-b30">
                    <div class="dlab-media">
                      <a href="/win-perfil-repuesto"><img src="https://wingsautomoviles.com/wp-content/uploads/2019/06/Bitmap2.png" alt="" style="height: 136px;"></a>
                    </div>
                    <div class="dlab-info">
                      <h4 class="dlab-title" style="font-size: 15px"><a href="/win-perfil-repuesto">Sistema Freno De Disco </a></h4>
                      <div class="dlab-separator bg-black"></div>
                      <p class="dlab-price"><span class="text-primary">S/. 870</span></p>
                    </div>
                    <div class="icon-box-btn text-center">
                      <button type="button" class="btn btn-info">Agregar al Carrito</button>
                    </div>
                  </div>
              </div>
              <!-- Fin de Item 2 -->
              <!-- Item 3 -->
              <div class="post card-container col-lg-4 col-md-6 col-sm-6 col-xs-12">
                  <div class="dlab-feed-list m-b30">
                    <div class="dlab-media">
                      <a href="/win-perfil-repuesto"><img src="https://wingsautomoviles.com/wp-content/uploads/2019/06/Bitmap3.png" alt="" style="height: 136px;"></a>
                    </div>
                    <div class="dlab-info">
                      <h4 class="dlab-title" style="font-size: 15px"><a href="/win-perfil-repuesto">Tubo De Escape Cromado </a></h4>
                      <div class="dlab-separator bg-black"></div>
                      <p class="dlab-price"><span class="text-primary">S/. 450</span></p>
                    </div>
                    <div class="icon-box-btn text-center">
                      <button type="button" class="btn btn-info">Agregar al Carrito</button>
                    </div>
                  </div>
              </div>
              <!-- Fin de Item 3 -->
              <!-- Item 4 -->
              <div class="post card-container col-lg-4 col-md-6 col-sm-6 col-xs-12">
                  <div class="dlab-feed-list m-b30">
                    <div class="dlab-media">
                      <a href="/win-perfil-repuesto"><img src="https://wingsautomoviles.com/wp-content/uploads/2019/06/Bitmap4-1.png" alt="" style="height: 136px;"></a>
                    </div>
                    <div class="dlab-info">
                      <h4 class="dlab-title" style="font-size: 15px"><a href="/win-perfil-repuesto">Cubre Camioneta XL </a></h4>
                      <div class="dlab-separator bg-black"></div>
                      <p class="dlab-price"><span class="text-primary">S/. 200</span></p>
                    </div>
                    <div class="icon-box-btn text-center">
                      <button type="button" class="btn btn-info">Agregar al Carrito</button>
                    </div>
                  </div>
              </div>
              <!-- Fin de Item 4 -->
              <!-- Item 5 -->
              <div class="post card-container col-lg-4 col-md-6 col-sm-6 col-xs-12">
                  <div class="dlab-feed-list m-b30">
                    <div class="dlab-media">
                      <a href="/win-perfil-repuesto"><img src="https://promart.vteximg.com.br/arquivos/ids/252648-700-700/65021.jpg?v=636698733722430000" alt="" style="height: 136px;"></a>
                    </div>
                    <div class="dlab-info">
                      <h4 class="dlab-title" style="font-size: 15px"><a href="/win-perfil-repuesto">Cobertor para auto </a></h4>
                      <div class="dlab-separator bg-black"></div>
                      <p class="dlab-price"><span class="text-primary">S/. 120</span></p>
                    </div>
                    <div class="icon-box-btn text-center">
                      <button type="button" class="btn btn-info">Agregar al Carrito</button>
                    </div>
                  </div>
              </div> --}}
              <!-- Fin de Item 5 -->
        </div>
        <!-- blog grid END -->
        <!-- Pagination  -->
        <div class="pagination-bx col-lg-12  ">
              <ul class="pagination">
                    {{ $products->appends(request()->except('page'))->links() }}
                    {{-- <li class="previous"><a href="JavaScript:Void(0);"><i class="fa fa-angle-double-left"></i></a></li>
                    <li class="active"><a href="JavaScript:Void(0);">1</a></li>
                    <li><a href="JavaScript:Void(0);">2</a></li>
                    <li><a href="JavaScript:Void(0);">3</a></li>
                    <li class="next"><a href="JavaScript:Void(0);"><i class="fa fa-angle-double-right"></i></a></li> --}}
              </ul>
        </div>
        <!-- Pagination END -->
    </div>
<!-- left part END -->
