<!--News Section-->
<section class="news-section">
  <div class="auto-container">
      <!--Sec Title-->
        <div class="sec-title centered">
          <h2>Noticias y Novedades</h2>
        </div>
        <div class="row clearfix">

          <!--News Block-->
          @foreach($posts as $post)
          <div class="news-block col-md-4 col-sm-6 col-xs-12">
            <div class="inner-box">
                <div class="image">
                    <div class="blog_date bg_4">{{ $post['created_at']->format('d') }} <br> {{ substr(ucfirst(\Date::parse($post['created_at'])->format('F')),0,3) }}</div>
                    <div style="    background-image: url({{ $post['image'] ? $post['image']['resource_thumb'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }});
    height: 250px;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;"></div>
                    <a class="overlay-link" href="/blog/{{ $post['slug'] }}"><span class="icon fa fa-link"></span></a>
                </div>
                <div class="lower-box">
                    <div class="content">
                        <div class="author">{{ $post['tag']['name'] }}</div>
                        <h3 style="line-height: 1.2;"><a href="/blog/{{ $post['slug'] }}">{{ $post['title'] }}</a></h3>
                        <div class="text" style="line-height: 1.2;">{{ substr(strip_tags($post['content']), 0, 100) }}...</div>
                    </div>
                </div>
            </div>
          </div>
          @endforeach

          {{--
          <!--News Block-->
          <div class="news-block col-md-4 col-sm-6 col-xs-12">
            <div class="inner-box">
                <div class="image">
                    <div class="blog_date bg_4">25 <br> Nov</div>
                    <img src="/template_8/images/resource/news-2.jpg" alt="" />
                    <a class="overlay-link" href="/blog-perfil"><span class="icon fa fa-link"></span></a>
                </div>
                <div class="lower-box">
                    <div class="content">
                        <div class="author">Evento</div>
                        <h3 style="line-height: 1.2;"><a href="/blog-perfil">Presentacion oficial de la nueva linea de sedans Hyundai</a></h3>
                        <div class="text" style="line-height: 1.2;">Invitamos a todo el publico a asistir a la gran presentación de la nueva línea de autos de Hyundai.</div>
                    </div>
                </div>
            </div>
          </div>

          <!--News Block-->
          <div class="news-block col-md-4 col-sm-6 col-xs-12">
            <div class="inner-box">
                <div class="image">
                    <div class="blog_date bg_4">01 <br> DEC</div>
                    <img src="/template_8/images/resource/news-3.jpg" alt="" />
                    <a class="overlay-link" href="/blog-perfil"><span class="icon fa fa-link"></span></a>
                </div>
                <div class="lower-box">
                    <div class="content">
                        <div class="author">Noticias</div>
                        <h3 style="line-height: 1.2;"><a href="/blog-perfil">¿Qué cubre el SOAT en caso de un accidente de tránsito?</a></h3>
                        <div class="text" style="line-height: 1.2;">La cobertura del SOAT sirve no solo para el conductor, también a las personas que fueron afectadas en el accidente.</div>
                    </div>
                </div>
            </div>
          </div>
          --}}
        </div>
    </div>
</section>
<!--End News Section-->
