<div class="blog-sidebar-page">
    <div class="row">
        @foreach($blogs as $key => $blog)
        <div class="col-md-6 col-12">
            <div class="single-blog mb-60">
                <div class="blog-thubmnail">
                    <a href="/blog/{{ $blog['slug'] }}">
                        <img src="{{ ($blog['image'] != null) ? $blog['image']['resource'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" class="galeria__img">
                    </a>
                    <div class="blog-post">
                        <span class="post-day" style="width: 75px; color: #fff; background: #ff9b2e; font-weight: 700;">
                            {{ $blog['created_at']->format('d') }}
                        </span>
                        <span class="post-month" style="width: 75px; color: #fff; background: #ff9b2e; font-weight: 700;">
                            {{ ucfirst(\Date::parse($blog['created_at'])->format('F')) }}
                        </span>
                    </div>
                </div>
                <div class="blog-desc" style="background: #ececec;">
                    <div style="height: 160px;">
                      <h6><a href="/blog/{{ $blog['slug'] }}" style="font-weight: 700;">{{ $blog['title'] }}</a></h6>
                      <p class="post-content">{!! substr($blog['content'], 0, 100) !!}...</p>
                    </div>
                    <div class="bolg-continue">
                        <a href="/blog/{{ $blog['slug'] }}">Continuar leyendo  ></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!--pagination start-->
<div class="row">
    <div class="col-md-12">
        <div class="pagination">
            <div class="pagination-inner text-center">
                {{ $blogs->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>
</div>
