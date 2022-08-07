<aside class="col-lg-12" id="sidebar_fixed" >

	                <div class="filter_col">
	                    <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
	                    <div class="filter_type version_2">
	                       <!--h3 style="font-size: 20px; padding-bottom: 15px;"><a href="#filter_1" data-toggle="collapse" class="opened" style="color: #444; font-weight: 700;">Categorías</a></h3-->
           	        	<input type="hidden" id="etiquette" value="{{ $etiquette_id }}">
           	        	<div class="row" style="border-bottom: 2px solid var(--main-bg-color-primario);">
           	        		 <ul class="nav">
           	        		 	@foreach($categories as $key => $category)
						      <li class="nav-item menu_x">
						       @if($key == 0)
							<a href="#filter_{{$key+1}}" style="padding: 0px 20px 0px 20px;" data-toggle="collapse" class="catalog-category__change opened collapsed" aria-expanded="false"  data-slug={{ $category['slug'] }}>{{ $category['name'] }}</a>
							@else
							<a href="#filter_{{$key+1}}" style="padding: 0px 20px 0px 20px" data-toggle="collapse" class="catalog-category__change collapsed" aria-expanded="false"  data-slug={{ $category['slug'] }}>{{ $category['name'] }}</a>
							@endif
						      </li>
						      @endforeach
						    </ul>

						{{--@foreach($categories as $key => $category)
						
							<div class="col-md-2">
								<div class="filter_type">


							@if($key == 0)
							<h4 style=""><a href="#filter_{{$key+1}}" data-toggle="collapse" class="catalog-category__change opened collapsed" aria-expanded="false"  data-slug={{ $category['slug'] }}>{{ $category['name'] }}</a></h4>
							@else
							<h4 style=""><a href="#filter_{{$key+1}}" data-toggle="collapse" class="catalog-category__change collapsed" aria-expanded="false"  data-slug={{ $category['slug'] }}>{{ $category['name'] }}</a></h4>
							@endif		
							

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
							</div>
							
						
						
						@endforeach--}}
						</div>
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
						{{--<div id="table_category-attribute">
							@include('template_1.catalog.attribute_filter')
						</div>

	                    <!-- /filter_type -->
	                    <div class="buttons">
	                       <a href="/catalogo" class="btn_1 gray">Limpiar filtros</a>
	                    </div>--}}
	                </div>
	                <!--div class="banner_menu">
													<a href="">
														<img src="template_1/img/banner_horizontal.png" data-src="template_1/img/banner_horizontal.png" width="400" height="550" alt="" class="img-fluid lazy loaded" data-was-processed="true">
													</a>
												</div-->

	            </aside>


