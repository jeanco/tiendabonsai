<div class="widget-blog-collection">
  <div class="row top-row-blog-page" id="table_data_blog">
    @foreach($other_blogs as $key => $blog)
    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="blog-item-ver2">
        <div class="blog-item img" >
          <a href="/blog/{{ $blog['slug'] }}"><img src="{{ ($blog['image'] != '') ? $blog['image']['resource_thumb'] : '' }}" alt="images"   class="galeria__img"></a>
        </div>
        <div class="blog-info" style="height: 100px;">
          <h3><a href="/blog/{{ $blog['slug'] }}" title="">{{ $blog['title'] }}</a></h3>
          <p class="blog-description">{!! substr($blog['content'], 0, 100) !!}...</p>
          <a href="/blog/{{ $blog['slug'] }}" class="readmore">Seguir leyendo</a>
        </div>
      </div>
    </div>
    @endforeach
    <div class="blog-pagination">
      @if(count($other_blogs))
      {{ $other_blogs->appends(request()->except('page'))->links() }}
      @endif
    </div>
  </div>
  {{--style="min-height: 300px; background: #969696;"--}}
</div>