<!-- left part start -->
    <div class="row">
        <!-- blog grid  -->
        <div id="masonry" class="dlab-blog-grid-2">

            @foreach($blogs as $key => $blog)
            <div class="post card-container col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="blog-post blog-grid date-style-2">
                    <div class="dlab-post-media dlab-img-effect zoom-slow"> <a href="/blog/{{ $blog['slug'] }}"><img src="{{ ($blog['image'] != null) ? $blog['image']['resource'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" style="height: 238px;"></a> </div>
                    <div class="dlab-post-info">
                        <div class="dlab-post-title ">
                            <h3 class="post-title"><a href="/blog/{{ $blog['slug'] }}">{{ $blog['title'] }}</a></h3>
                        </div>
                        <div class="dlab-post-meta ">
                            <ul>
                            <li class="post-date"> <i class="fa fa-calendar"></i><strong>{{ $blog['created_at']->format('d') }} {{ substr(\Date::parse($blog['created_at'])->format('F'),0 ,3) }}</strong> <span> {{ $blog['created_at']->format('Y') }}</span> </li>
                            <li class="post-author"><i class="glyphicon glyphicon-triangle-right"></i>{{ $blog['tag']['name'] }}</li>
                            </ul>
                        </div>
                        <div class="dlab-post-text">
                            {{ substr(strip_tags($blog['content']), 0, 100) }}...
                        </div>
                        <div class="dlab-post-readmore"> <a href="/blog/{{ $blog['slug'] }}" title="Leer Más" rel="bookmark" class="site-button-link">Leer Más&nbsp;<i class="fa fa-angle-double-right"></i></a> </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- blog grid END -->
        <!-- Pagination start -->
        <div class="pagination-bx col-lg-12 clearfix ">
            {{ $blogs->appends(request()->except('page'))->links() }}
            {{-- <ul class="pagination">
                <li class="previous"><a href="/blog-perfil"><i class="fa fa-angle-double-left"></i></a></li>
                <li class="active"><a href="/blog-perfil">1</a></li>
                <li><a href="/blog-perfil">2</a></li>
                <li><a href="/blog-perfil">3</a></li>
                <li class="next"><a href="/blog-perfil"><i class="fa fa-angle-double-right"></i></a></li>
            </ul> --}}
        </div>
        <!-- Pagination END -->
    </div>
<!-- left part start -->
