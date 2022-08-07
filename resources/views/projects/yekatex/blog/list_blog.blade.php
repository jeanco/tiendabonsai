<div class="row">
  <!-- Single Blog Start -->
  @foreach($blogs as $key => $blog)
  <div class="col-lg-6 col-sm-12">
    <div class="single-latest-blog" style="height: 300px;">
      <div class="blog-img">
        <a href="/perfil-blog/{{ $blog['slug'] }}"><img src="{{ ($blog['image'] != null) ? $blog['image']['resource'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="blog-image"></a>
      </div>
      <div class="blog-desc">
        <h4><a href="/perfil-blog/{{ $blog['slug'] }}">{{ $blog['title'] }}</a></h4>
        <ul class="meta-box d-flex">
          <li><a href="blog.html#">Por {{ $blog['user']['first_name'] }} {{ $blog['user']['last_name'] }}</a></li>
        </ul>
        {{ substr(strip_tags($blog['content']), 0, 100) }}...
        <a  class="readmore" href="/perfil-blog/{{ $blog['slug'] }}">Leer Más</a>
      </div>
      <div class="blog-date">
        <span>{{ $blog['created_at']->format('d') }}</span>
        {{ substr(ucfirst(\Date::parse($blog['created_at'])->format('F')),0,3) }}
      </div>
    </div>
  </div>
  @endforeach
</div>
<!-- Row End -->
<div class="row">
  <div class="col-sm-12">
    <div class="pro-pagination">
      <ul class="blog-pagination">
        {{ $blogs->appends(request()->except('page'))->links() }}
      </ul>
      <div class="product-pagination">
        <span class="grid-item-list">Showing 1 to 12 of 51 (5 Pages)</span>
      </div>
    </div>
    <!-- Product Pagination Info -->
  </div>
</div>
