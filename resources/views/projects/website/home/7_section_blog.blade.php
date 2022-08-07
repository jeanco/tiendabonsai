<section class="our-blog" style="background-color: #eaeaea;">
        <div class="container">
            <div class="heading-v1 v2 top30">
                <h3 class="title v2 pull-left">Novedades</h3>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                @foreach($posts as $key => $post)
                <div class="col-md-4">
                    <div class="blog-item">
                        <div class="blog-item-img box-catalog-img">
                            <a href="/blog/{{ $post['slug'] }}"><img src="{{ ($post['image'] != null) ? $post['image']['resource'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="images" class="img-responsive" style="height: 190px"></a>
                        </div>
                        <div class="blog-item-detail">
                            <h3><a href="/blog/{{ $post['slug'] }}" title="">{{$post['title']}}</a></h3>
                            <p>{!! substr($post['content'], 0, 250) !!}...</p>
                            <a href="/blog/{{ $post['slug'] }}" class="readmore">Continuar leyendo</a>
                        </div>
                    </div>
                </div>
                @endforeach()
            </div>
        </div>
</section>
