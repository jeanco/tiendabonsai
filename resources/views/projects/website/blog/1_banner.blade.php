<div class="blog-item-img-ver1">
    <a href="/blog/{{ $last_blog['slug'] }}" class="images"><img src="{{ $last_blog['image']['resource'] }}" alt="images" class="img-responsive" style="width: 100%; height: 300px; object-fit: cover;"></a>
    <span class="label-blog">Última</span>
    <div class="text">
        <h2><a href="blog-v1.html#" title="">{{ $last_blog['title'] }}</a></h2>
        <p>Publicado por: {{ $last_blog['user']['first_name'] }} {{ $last_blog['user']['last_name'] }}</p>
    </div>
</div>
