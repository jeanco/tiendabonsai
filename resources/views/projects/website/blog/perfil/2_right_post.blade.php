<aside class="sidebar sidebar-right">
                        <div class="search-v2">
                            <form action="blog-single-v1.html#" method="get" accept-charset="utf-8" class="search-form-2">
                                <input type="text" class="form-control" name="s" placeholder="Buscar publicación...">
                                <button type="submit" class="search-icon"></button>
                            </form>
                        </div>
                        <div class="post-category">
                            <h2>Categorías</h2>
                            <ul>
                                @foreach($tags as $key => $tag)
                                    <li><a href="www.google.com.pe" data-index={{ $tag['id'] }}>{{ $tag['name'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="recent-post">
                            <h2>Nuevas Publicaciones</h2>
                            <div class="post-item-list">
                                @foreach($recent_blogs as $key => $recent_blog)
                                <div class="post-item">
                                    <div class="post-item-img">
                                        <a href="/blog/{{ $recent_blog['slug'] }}"><img style=" width: 250px; height: 90px; object-fit: cover;" src="{{ ($recent_blog['image'] != '') ? $recent_blog['image']['resource_thumb'] : '' }}" alt="images" class="img-reponsive"></a>
                                    </div>
                                    <div class="post-item-text">
                                        <h3 class="title">
                                            <a href="/blog/{{ $recent_blog['slug'] }}" title="">{{ $recent_blog['title'] }}</a>
                                        </h3>
                                        <div class="tags">
                                            <span class="date">{{ $recent_blog['created_at']->format('d') }} {{ ucfirst(Date::parse($recent_blog['created_at'])->format('F')) }}, {{ $recent_blog['created_at']->format('Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>


                    </aside>
