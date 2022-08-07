<!--Latest blog start-->
<div class="latest-blog ptb-130">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <h3>Nuestras Novedades</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($posts as $k => $blog)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-blog wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1s">
                    <div class="blog-thubmnail">
                        <a href="/blog/{{ $blog['slug'] }}">
                            <img src="{{ ($blog->image != null) ? $blog->image->resource : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" style="height: 250px; width: 100%;">
                        </a>
                        <div class="blog-post">
                            <span class="post-day" style="width: 75px; color: #fff; background: #ff9b2e; font-weight: 700;">
                                {{ \Carbon\Carbon::parse($blog->created_at)->format('d') }}
                            </span>
                            <span class="post-month" style="width: 75px; color: #fff; background: #ff9b2e; font-weight: 600;">
                               {{ ucfirst(Date::parse($blog->created_at)->format('F')) }}
                            </span>
                        </div>
                    </div>
                    <div class="blog-desc" style="background: #ececec;">
                        <div style="height: 160px;">
                          <h6><a href="/blog/{{ $blog['slug'] }}" style="font-weight: 700;">{{ $blog->title }}</a></h6>
                          <div style="font-weight: 600;">{!! substr(strip_tags($blog->content), 0, 100) !!}...</div><br>
                        </div>
                        <div class="bolg-continue">
                            <a href="/blog/{{ $blog->slug }}">Continuar leyendo</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
<!--             <div class="col-lg-4 col-md-6 col-12">
                <div class="single-blog wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.2s">
                    <div class="blog-thubmnail">
                        <a href="article.html">
                            <img src="/miranda/img/blog/2.jpg" alt="">
                        </a>
                        <div class="blog-post">
                            <span class="post-day">
                                20
                            </span>
                            <span class="post-month">
                                March
                            </span>
                        </div>
                    </div>
                    <div class="blog-desc">
                        <h6><a href="article.html">New Duplex Villa design with Latest Altra Concept</a></h6>
                        <p class="post-content">Haven the best theme for elit, sed do eiusmod tempor dolor sit
                            amet, conse ctetur adipiscing elit, sed do eismod tempor incididunt </p>
                        <div class="bolg-continue">
                            <a href="article.html">Continure Reading ></a>
                        </div>
                    </div>
                </div>
            </div> -->
<!--             <div class="col-lg-4 col-md-6 col-12">
                <div class="single-blog wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1.3s">
                    <div class="blog-thubmnail">
                        <a href="article.html">
                            <img src="/miranda/img/blog/3.jpg" alt="">
                        </a>
                        <div class="blog-post">
                            <span class="post-day">
                                20
                            </span>
                            <span class="post-month">
                                March
                            </span>
                        </div>
                    </div>
                    <div class="blog-desc">
                        <h6><a href="article.html">New Duplex Villa design with Latest Altra Concept</a></h6>
                        <p class="post-content">Haven the best theme for elit, sed do eiusmod tempor dolor sit
                            amet, conse ctetur adipiscing elit, sed do eismod tempor incididunt </p>
                        <div class="bolg-continue">
                            <a href="article.html">Continure Reading ></a>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<!--Latest blog end-->
