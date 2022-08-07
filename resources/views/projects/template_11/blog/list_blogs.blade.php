<div class="widget search_blog d-block d-sm-block d-md-block d-lg-none">
    <div class="form-group">
        <input type="text" name="search" id="search" class="form-control" placeholder="Search..">
        <button type="submit"><i class="ti-search"></i><span class="sr-only">Search</span></button>
    </div>
</div>
<!-- /widget -->

<div class="row">
    @foreach ($blogs as $key => $blog)
    <div class="col-md-6">
        <article class="blog">
            <figure>
                <a href="/blog/{{ $blog['slug'] }}"><img src="{{ ($blog['image'] != null) ? $blog['image']['resource'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="">
                    <div class="preview"><span>Leer Más</span></div>
                </a>
            </figure>
            <div class="post_info">
                <small>{{ $blog['tag']['name'] }} - {{ $blog['created_at']->format('d') }} {{ substr(ucfirst(\Date::parse($blog['created_at'])->format('F')),0,3) }}. {{ $blog['created_at']->format('Y') }}</small>
                <h2><a href="/blog/{{ $blog['slug'] }}">{{ $blog['title'] }}</a></h2>
                <p>{{ substr(strip_tags($blog['content']), 0, 100) }}...</p>
                <ul>
                    <li>
                    <div class="thumb"><img src="{{ ($blog['user']['user_image_thumb']) ? $blog['user']['user_image_thumb'] : '/template_11/img/avatar.jpg' }}" alt=""></div> {{ $blog['user']['first_name'] }}
                    </li>
                    <li><!--i class="ti-comment"></i>20--></li>
                </ul>
            </div>
        </article>
        <!-- /article -->
    </div>
    @endforeach

    {{-- 
    <!-- /col -->
    <div class="col-md-6">
        <article class="blog">
            <figure>
                <a href="blog-post.html"><img src="/template_11/img/blog-2.jpg" alt="">
                    <div class="preview"><span>Read more</span></div>
                </a>
            </figure>
            <div class="post_info">
                <small>Category - 20 Nov. 2017</small>
                <h2><a href="blog-post.html">At usu sale dolorum offendit</a></h2>
                <p>Quodsi sanctus pro eu, ne audire scripserit quo. Vel an enim offendit salutandi, in eos quod omnes epicurei, ex veri qualisque scriptorem mei.</p>
                <ul>
                    <li>
                        <div class="thumb"><img src="/template_11/img/avatar.jpg" alt=""></div> Admin
                    </li>
                    <li><i class="ti-comment"></i>20</li>
                </ul>
            </div>
        </article>
        <!-- /article -->
    </div>
    <!-- /col -->
    <div class="col-md-6">
        <article class="blog">
            <figure>
                <a href="blog-post.html"><img src="/template_11/img/blog-3.jpg" alt="">
                    <div class="preview"><span>Read more</span></div>
                </a>
            </figure>
            <div class="post_info">
                <small>Category - 20 Nov. 2017</small>
                <h2><a href="blog-post.html">Iusto nominavi petentium in</a></h2>
                <p>Quodsi sanctus pro eu, ne audire scripserit quo. Vel an enim offendit salutandi, in eos quod omnes epicurei, ex veri qualisque scriptorem mei.</p>
                <ul>
                    <li>
                        <div class="thumb"><img src="/template_11/img/avatar.jpg" alt=""></div> Admin
                    </li>
                    <li><i class="ti-comment"></i>20</li>
                </ul>
            </div>
        </article>
        <!-- /article -->
    </div>
    <!-- /col -->
    <div class="col-md-6">
        <article class="blog">
            <figure>
                <a href="blog-post.html"><img src="/template_11/img/blog-4.jpg" alt="">
                    <div class="preview"><span>Read more</span></div>
                </a>
            </figure>
            <div class="post_info">
                <small>Category - 20 Nov. 2017</small>
                <h2><a href="blog-post.html">Assueverit concludaturque quo</a></h2>
                <p>Quodsi sanctus pro eu, ne audire scripserit quo. Vel an enim offendit salutandi, in eos quod omnes epicurei, ex veri qualisque scriptorem mei.</p>
                <ul>
                    <li>
                        <div class="thumb"><img src="/template_11/img/avatar.jpg" alt=""></div> Admin
                    </li>
                    <li><i class="ti-comment"></i>20</li>
                </ul>
            </div>
        </article>
        <!-- /article -->
    </div>
    <!-- /col -->
    <div class="col-md-6">
        <article class="blog">
            <figure>
                <a href="blog-post.html"><img src="/template_11/img/blog-5.jpg" alt="">
                    <div class="preview"><span>Read more</span></div>
                </a>
            </figure>
            <div class="post_info">
                <small>Category - 20 Nov. 2017</small>
                <h2><a href="blog-post.html">Nec nihil menandri appellantur</a></h2>
                <p>Quodsi sanctus pro eu, ne audire scripserit quo. Vel an enim offendit salutandi, in eos quod omnes epicurei, ex veri qualisque scriptorem mei.</p>
                <ul>
                    <li>
                        <div class="thumb"><img src="/template_11/img/avatar.jpg" alt=""></div> Admin
                    </li>
                    <li><i class="ti-comment"></i>20</li>
                </ul>
            </div>
        </article>
        <!-- /article -->
    </div>
    <!-- /col -->
    <div class="col-md-6">
        <article class="blog">
            <figure>
                <a href="blog-post.html"><img src="/template_11/img/blog-6.jpg" alt="">
                    <div class="preview"><span>Read more</span></div>
                </a>
            </figure>
            <div class="post_info">
                <small>Category - 20 Nov. 2017</small>
                <h2><a href="blog-post.html">Te congue everti his salutandi</a></h2>
                <p>Quodsi sanctus pro eu, ne audire scripserit quo. Vel an enim offendit salutandi, in eos quod omnes epicurei, ex veri qualisque scriptorem mei.</p>
                <ul>
                    <li>
                        <div class="thumb"><img src="/template_11/img/avatar.jpg" alt=""></div> Admin
                    </li>
                    <li><i class="ti-comment"></i>20</li>
                </ul>
            </div>
        </article>
        <!-- /article -->
    </div>
    --}}
    <!-- /col -->
</div>
<!-- /row -->

<div class="pagination__wrapper no_border add_bottom_30">
    <ul class="pagination">
        {{ $blogs->appends(request()->except('page'))->links() }}

        {{-- 
        <li><a href="blog.html#0" class="prev" title="previous page">&#10094;</a></li>
        <li>
            <a href="blog.html#0" class="active">1</a>
        </li>
        <li>
            <a href="blog.html#0">2</a>
        </li>
        <li>
            <a href="blog.html#0">3</a>
        </li>
        <li>
            <a href="blog.html#0">4</a>
        </li>
        <li><a href="blog.html#0" class="next" title="next page">&#10095;</a></li>
        --}}
    </ul>
</div>