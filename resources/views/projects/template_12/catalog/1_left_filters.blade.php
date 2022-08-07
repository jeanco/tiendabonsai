<aside class="col-lg-3" id="sidebar_fixed">

	                <div class="filter_col">
	                    <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
	                    <div class="filter_type version_2">
	                       <h3><a href="#filter_1" data-toggle="collapse" class="opened">Categorías</a></h3>
           	        	<input type="hidden" id="etiquette" value="{{ $etiquette_id }}">

						@foreach($categories as $key => $category)

						<div class="filter_type">
							<h4><a href="#filter_{{$key+1}}" data-toggle="collapse" class="catalog-category__change opened collapsed" aria-expanded="false"  data-slug={{ $category['slug'] }}>{{ $category['name'] }}</a></h4>
							<div class="collapse" id="filter_{{$key+1}}" style="">
								<ul class="child-menu-ul">
									@foreach($category['subcategories'] as $k => $subcategory)
								    <li>
								        <a href="#" class="catalog-subcategory__change" data-slug={{ $subcategory['slug'] }}>{{ $subcategory['name'] }}
								        </a>
								    </li>
								    @endforeach
								</ul>
							</div>
							<!-- /filter_type -->
						</div>
						@endforeach

	                    </div>

	                    {{--<div class="filter_type version_2">

							<div class="nice-nav" style="margin-bottom: 50px;">
								<div class="clear"></div>
								<ul>
								  @foreach($categories as $key => $category)
								  <li class="child-menu">
									<a href="#" class="catalog-category__change"  data-slug={{ $category['slug'] }}>
										<span class="toggle-button">{{ $category['name'] }}</span>
										<span class="fa fa-angle-right toggle-right child-button"></span>
									</a>
									<ul class="child-menu-ul">
									  @foreach($category['subcategories'] as $k => $subcategory)
										<li>
											<a href="#" class="catalog-subcategory__change" data-slug={{ $subcategory['slug'] }}>
												{{ $subcategory['name'] }}
											</a>
										</li>
									  @endforeach
									</ul>
								  </li>
								  @endforeach
								</ul>
							  </div>

	                    </div>--}}
						<!-- /filter_type -->
						<div id="table_category-attribute">
							@include('template_12.catalog.attribute_filter')
						</div>

	                    <!-- /filter_type -->
	                    <div class="buttons">
	                       <a href="/catalogo" class="btn_1 gray">Limpiar filtros</a>
	                    </div>
	                </div>
	            </aside>
