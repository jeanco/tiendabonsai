    <div class="row">
        <!-- blog grid  -->
        <div class="dlab-blog-grid-3">
            <div class="col-md-12">
                <!-- Item 1 -->
                @foreach ($products as $key =>  $product)
                <div class="blog-post blog-md clearfix date-style-2 list-view m-b30">
                    <div class="dlab-post-media dlab-img-effect zoom-slow">
                    <a href="/productos/{{ $product->slug }}"><img src="{{ ($product->photo != null) ? $product->photo->resource_thumb : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt=""></a>
                    </div>
                    <div class="dlab-post-info">
                      <div class="dlab-post-title ">
                      <h3 class="post-title"><a href="/productos/{{ $product->slug }}">{{ $product->name }}</a></h3>
                      </div>
                      <div class="dlab-post-text">
                        {!! substr(strip_tags($product->description), 0, 100) !!}...
                      </div>
                      <div class="dlab-post-readmore">
                      @if ($product->price != 0)
                        <h2 class="m-a0 pull-left m-r15 open-sans">$ {{ $product->price }}</h2>
                      @endif
                        <a href="/productos/{{ $product->slug }}" title="Detalles" rel="bookmark" class="site-button">Detalles</a>
                        <a href="/win-cotizador" target="_blank" title="Cotizar" rel="bookmark" class="site-button">Cotizar</a>
                      </div>
                      <div class="dlab-post-tags">
                        <div class="post-tags">
                          <a href="JavaScript:Void(0);">Ciudad</a>
                        </div>
                      </div>
                    </div>
                </div>
                @endforeach
                <!-- End Item 1 -->
                <!-- Item 2 -->
                {{-- <div class="blog-post blog-md clearfix date-style-2 list-view m-b30">
                    <div class="dlab-post-media dlab-img-effect zoom-slow">
                      <a href="/win-perfil-auto"><img src="https://wingsautomoviles.com/wp-content/uploads/2019/07/LEFT-MINIVAN.jpg" alt=""></a>
                    </div>
                    <div class="dlab-post-info">
                      <div class="dlab-post-title ">
                        <h3 class="post-title"><a href="/win-perfil-auto">WINGS SUPER MINIVÁN CHVERE</a></h3>
                      </div>
                      <div class="dlab-post-text">
                        <p>Encuentre todo lo que necesitas para mantener tu unidad a salvo...</p>
                      </div>
                      <div class="dlab-post-readmore">
                        <h2 class="m-a0 pull-left m-r15 open-sans">USD $20.000</h2>
                        <a href="/win-perfil-auto" title="Detalles" rel="bookmark" class="site-button">Detalles</a>
                        <a href="/win-cotizador" title="Cotizar" rel="bookmark" class="site-button">Cotizar</a>
                      </div>
                      <div class="dlab-post-tags">
                        <div class="post-tags">
                          <a href="JavaScript:Void(0);">Combis</a>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- End Item 2 -->
                <!-- Item 3 -->
                <div class="blog-post blog-md clearfix date-style-2 list-view m-b30">
                    <div class="dlab-post-media dlab-img-effect zoom-slow">
                      <a href="/win-perfil-auto"><img src="https://wingsautomoviles.com/wp-content/uploads/2019/07/201206013301414110.jpg.jpg" alt=""></a>
                    </div>
                    <div class="dlab-post-info">
                      <div class="dlab-post-title ">
                        <h3 class="post-title"><a href="/win-perfil-auto">TOUR BUS 10</a></h3>
                      </div>
                      <div class="dlab-post-text">
                        <p>Nº1 en el mercado, perfecto para viajes...</p>
                      </div>
                      <div class="dlab-post-readmore">
                        <h2 class="m-a0 pull-left m-r15 open-sans">USD $21.000</h2>
                        <a href="/win-perfil-auto" title="Detalles" rel="bookmark" class="site-button">Detalles</a>
                        <a href="/win-cotizador" title="Cotizar" rel="bookmark" class="site-button">Cotizar</a>
                      </div>
                      <div class="dlab-post-tags">
                        <div class="post-tags">
                          <a href="JavaScript:Void(0);">Turismo</a>
                        </div>
                      </div>
                    </div>
                </div> --}}
                <!-- End Item 3 -->
                <!-- Item 4 -->
                <!-- End Item 4 -->
            </div>
        </div>
        <!-- blog grid END -->
        <!-- Pagination  -->
        <div class="pagination-bx col-lg-12 clearfix ">
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
