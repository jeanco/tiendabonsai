
@if(count($posts) > 0)
		<div class="container margin_60_35">
			<div class="main_title">
				<h2 style="font-weight: bold; padding-top: 20px">Últimas publicaciones en {{ $company_main->business_name }}</h2>
				<!--span>Blog</span>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p-->
			</div>
			<div class="row">
				@foreach ($posts as $post)
				<div class="col-lg-4">
					<a class="box_news" href="/blog/{{ $post['slug'] }}">
						<figure>
						<img src="{{ $post['image'] ? $post['image']['resource'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" data-src="{{ $post['image'] ? $post['image']['resource'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" width="400" height="266" class="lazy">
						<figcaption><strong>{{date('d', strtotime($post->date))}}</strong>{{ ucfirst(substr(Date::parse($post['date'])->format('F'), 0, 3)) }}</figcaption>
						</figure>
						<ul>
						<li>Por {{ $post['user']['first_name'] }} {{-- $post['user']['last_name'] --}}</li>
						<li>{{date('d/m/Y', strtotime($post->date))}}</li>
						</ul>
						<h4>{{ $post['title'] }}</h4>
						<p>{{ substr(strip_tags($post['content']), 0, 100) }}...</p>
					</a>
				</div>
				@endforeach

				
				<!-- /box_news -->
				{{--
				<div class="col-lg-6">
					<a class="box_news" href="blog.html">
						<figure>
							<img src="/template_2/img/blog-thumb-placeholder.jpg" data-src="/template_2/img/blog-2.jpg" alt="" width="400" height="266" class="lazy">
							<figcaption><strong>28</strong>Dec</figcaption>
						</figure>
						<ul>
							<li>By Jhon Doe</li>
							<li>20.11.2017</li>
						</ul>
						<h4>Duo eius postea suscipit ad</h4>
						<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
					</a>
				</div>
				<!-- /box_news -->
				<div class="col-lg-6">
					<a class="box_news" href="blog.html">
						<figure>
							<img src="/template_2/img/blog-thumb-placeholder.jpg" data-src="/template_2/img/blog-3.jpg" alt="" width="400" height="266" class="lazy">
							<figcaption><strong>28</strong>Dec</figcaption>
						</figure>
						<ul>
							<li>By Luca Robinson</li>
							<li>20.11.2017</li>
						</ul>
						<h4>Elitr mandamus cu has</h4>
						<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
					</a>
				</div>
				<!-- /box_news -->
				<div class="col-lg-6">
					<a class="box_news" href="blog.html">
						<figure>
							<img src="/template_2/img/blog-thumb-placeholder.jpg" data-src="/template_2/img/blog-4.jpg" alt="" width="400" height="266" class="lazy">
							<figcaption><strong>28</strong>Dec</figcaption>
						</figure>
						<ul>
							<li>By Paula Rodrigez</li>
							<li>20.11.2017</li>
						</ul>
						<h4>Id est adhuc ignota delenit</h4>
						<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
					</a>
				</div>
				--}}
				<!-- /box_news -->
			</div>
			<div class=" row">
					<div class="col-md-4">
					</div>
					<div class="col-md-4 text-center">
						<a href="/blog"><span class="btn_1">Ver Más</span></a>
					</div>
					<div class="col-md-4">
					</div>
				</div>
			<!-- /row -->
		</div>
		<!-- /container -->
@endif
