<!-- Side bar start -->
<div class="col-md-3 col-sm-4 blog-sticky-right">
    <aside  class="side-bar">
        <!-- <div class="widget">
            <h4 class="widget-title">Buscar Blog</h4>
            <div class="search-bx">
                <form role="search" method="post">
                    <div class="input-group">
                        <input name="text" type="text" class="form-control" placeholder="Escriba el título">
                        <span class="input-group-btn">
                        <button type="submit" class="site-button"><i class="fa fa-search"></i></button>
                        </span> </div>
                </form>
            </div>
        </div> -->

        <div class="widget widget_categories">
            <h4 class="widget-title">Categorías</h4>
            <ul>
                @foreach($tags as $x => $tag)
                    <li><a href="" class="tag__change" data-tag_slug={{ $tag['slug'] }} data-tag_id={{ $tag['id'] }}>{{ $tag['name'] }}</a> ({{ count($tag['posts']) }})</li>
                @endforeach
            </ul>
        </div>
    </aside>
</div>
<!-- Side bar END -->
