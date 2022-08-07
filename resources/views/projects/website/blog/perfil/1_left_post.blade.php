<div class="blog-slide">
    <a href="blog-single-v1.html#"><img src="{{ ($blog['image'] != '') ? $blog['image']['resource'] : '' }}" alt="images" class="img-responsive"></a>
    <div class="blog-slide-title">
        <div class="text">
            <h2><a href="blog-single-v1.html#" title="">{{ $blog['title'] }}</a></h2>
        </div>
        <div class="tag">
            <ul>
                <li><a href="blog-single-v1.html#"><i class="fa fa-pencil-square-o fa-3" aria-hidden="true"></i>{{$blog['user']['first_name']}} {{$blog['user']['last_name']}}</a></li>
            </ul>
        </div>
    </div>
    <div class="blog-slide-content">
        <div class="text-2">
            <p>{!! $blog['content'] !!}</p>
        </div>
        <div class="blog-connect-social">
            <a href="blog-single-v1.html#" class="blog-share-text pull-left"></a>
            <div class="blog-connect-social-group pull-right">
                <ul>
                    <li><a href="blog-single-v1.html#" title=""><i class="ion-social-facebook fa-3" aria-hidden="true"></i></a></li>
                    <li><a href="blog-single-v1.html#" title=""><i class="ion-social-twitter fa-3" aria-hidden="true"></i></a></li>
                    <li><a href="blog-single-v1.html#" title=""><i class="ion-social-googleplus fa-3" aria-hidden="true"></i></a></li>
                    <li><a href="blog-single-v1.html#" title=""><i class="ion-social-linkedin fa-3" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="blog-navigation">
    <div class="blog-navigation-links">
        <div class="row">
            <div class="blog-navigation-prev col-md-6">
                @if(count($prev_post))
                    <div class="post-item">
                        <div class="post-item-img">
                            <a href="/blog/{{ $prev_post['slug'] }}"><img style=" width: 400px; height: 130px; object-fit: cover;" src="{{ ($prev_post['image'] != '') ? $prev_post['image']['resource_thumb'] : '' }}" alt="images" class="img-responsive"></a>
                        </div>
                        <div class="post-item-content">
                        <div class="post-item-link">
                                <a href="/blog/{{ $prev_post['slug'] }}" class="btn-prev">Anterior</a>
                            </div>
                            <h3><a href="/blog/{{ $prev_post['slug'] }}">{{ $prev_post['title'] }}</a></h3>

                        </div>
                    </div>
                @endif
            </div>
            <div class="blog-navigation-next col-md-6">
                @if(count($next_post))
                <div class="post-item">
                    <div class="post-item-content">
                    <div class="post-item-link">
                            <a href="/blog/{{ $next_post['slug'] }}" class="btn-next">Siguiente</a>
                        </div>
                        <h3><a href="/blog/{{ $next_post['slug'] }}">{{ $next_post['title'] }}</a></h3>

                    </div>
                    <div class="post-item-img">
                        <a href="/blog/{{ $next_post['slug'] }}"><img style=" width: 250px; height: 130px; object-fit: cover;" src="{{ ($next_post['image'] != '') ? $next_post['image']['resource_thumb'] : '' }}" alt="images" class="img-responsive"></a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
