<!-- Latest News -->
<div class="section-full bg-white content-inner-1">
<div class="container">
<div class="section-head text-center head-1">
  <h3 class="h3 text-uppercase">Noticias</h3>
  <div class="dlab-separator bg-white" style="background-color: #333333; width: 6%"></div>
</div>
<div class="row">
  <div class="blog-carousel owl-carousel col-md-12">
    @foreach ($posts_wings as $key =>  $post)
    <div class="item">
        <div class="ow-blog-post date-style-2 dlab-latest-blog">
        <div class="ow-post-media dlab-img-effect zoom-slow"> <img src="{{ ($post->image != null) ? $post->image->resource_thumb : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" style="height: 183px"> </div>
          <div class="ow-post-meta">
            <ul>
            <li><span>{{ $post->created_at->format('d-m-Y') }}</span></li>
              <li><i class="fa fa-calendar"></i></li>
            </ul>
          </div>
          <div class="ow-post-info ">
            <div class="ow-post-title">
            <h4 class="post-title"> <a href="/win-perfil-blog" title="Video post">{{ $post->title }}</a> </h4>
            </div>
            <div class="ow-post-text">
              <p>{!! substr(strip_tags($post->content), 0, 100) !!}...</p>
            </div>
            <div class="ow-post-readmore ">
              <a href="/win-perfil-blog" rel="bookmark" class="site-button-link"> Leer Más <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
        </div>
    </div>
    @endforeach
    {{-- <div class="item">
      <div class="ow-blog-post date-style-2 dlab-latest-blog">
        <div class="ow-post-media dlab-img-effect zoom-slow"> <img src="/wings/img/blog1.jpg" alt="" style="height: 183px"> </div>
        <div class="ow-post-meta">
          <ul>
            <li><span>27-01-2020</span></li>
            <li><i class="fa fa-calendar"></i></li>
          </ul>
        </div>
        <div class="ow-post-info ">
          <div class="ow-post-title">
            <h4 class="post-title"> <a href="/win-perfil-blog" title="Video post">Nuevas tecnologías de buses</a> </h4>
          </div>
          <div class="ow-post-text">
            <p>Entérate de la nueva tecnología que se utilizan en nuestros buses y los beneficios que presentan estos cambios...</p>
          </div>
          <div class="ow-post-readmore ">
            <a href="/win-perfil-blog" rel="bookmark" class="site-button-link"> Leer Más <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="ow-blog-post date-style-2 dlab-latest-blog">
        <div class="ow-post-media dlab-img-effect zoom-slow"> <img src="/wings/img/blog2.jpg" alt="" style="height: 183px"> </div>
        <div class="ow-post-meta">
          <ul>
            <li><span>28-01-2019</span></li>
            <li><i class="fa fa-calendar"></i></li>
          </ul>
        </div>
        <div class="ow-post-info ">
          <div class="ow-post-title">
            <h4 class="post-title"> <a href="/win-perfil-blog" title="Video post">Llegaron los nuevos City Bus</a> </h4>
          </div>
          <div class="ow-post-text">
            <p>Ya llegaron a nuestras oficinas las nuevas unidades de City Bus. Conoce los modelos con que contamos para esta...</p>
          </div>
          <div class="ow-post-readmore ">
            <a href="/win-perfil-blog" rel="bookmark" class="site-button-link"> Leer Más <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="ow-blog-post date-style-2 dlab-latest-blog">
        <div class="ow-post-media dlab-img-effect zoom-slow"> <img src="/wings/img/blog3.png" alt="" style="height: 183px"> </div>
        <div class="ow-post-meta">
          <ul>
            <li><span>29-01-2019</span></li>
            <li><i class="fa fa-calendar"></i></li>
          </ul>
        </div>
        <div class="ow-post-info ">
          <div class="ow-post-title">
            <h4 class="post-title"> <a href="/win-perfil-blog" title="Video post">Novedades de ASIASTAR</a> </h4>
          </div>
          <div class="ow-post-text">
            <p>ASISASTAR, nuestra marca exclusiva, trae su nueva linea de buses para servicio urbano y de turismo. Con una...</p>
          </div>
          <div class="ow-post-readmore ">
            <a href="/win-perfil-blog" rel="bookmark" class="site-button-link"> Leer Más <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
      </div>
    </div> --}}
  </div>
</div>
</div>
</div>
<!-- Latest News END-->
