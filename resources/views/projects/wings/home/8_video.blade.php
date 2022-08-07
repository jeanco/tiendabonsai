<div class="section-full bg-white content-inner-1 bg-img-fix overlay-black-dark dlab-blog-cat-list" >
  <div class="container">

    <div class="m-b30 text-center head-1 text-white">
      <h3 class="h3 text-uppercase m-t0">GENERAMOS CONFIANZA</h3>
      <!-- <ul class="nav theme-tabs m-t20">
        <li role="presentation" class="active"><a data-toggle="tab"  aria-controls="expert-reviews"  href="/wings/plugins/imagegallery/img/loading.gif#expert-reviews">EXPERT REVIEWS</a></li>
        <li role="presentation" ><a data-toggle="tab"  aria-controls="featured-stories" href="/wings/plugins/imagegallery/img/loading.gif#featured-stories">FEATURED STORIES</a></li>
        <li role="presentation" ><a data-toggle="tab"  aria-controls="videos" href="/wings/plugins/imagegallery/img/loading.gif#videos">VIDEOS</a></li>
      </ul> -->
    </div>

    <div class="section-content ">
      <div class="clearfix">
        <div class="">
          <div class="tab-content">
            <div id="expert-reviews"  class="tab-pane active clearfix">
              <div id="reviews" class="carousel slide blog-stories mycarousel" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <!-- ////// -->
                  @foreach ($video_codes_array as $key => $code)
                <div class="item {{ ($key == 0) ? 'active' : '' }}">
                      <div class="dlab-media">
                        <a href="JavaScript:Void(0);">
                        <iframe src="https://www.youtube.com/embed/{{ $code }}" allowfullscreen="true"></iframe>
                        </a>
                      </div>
                    </div>
                  @endforeach
                  {{-- <div class="item active">
                    <div class="dlab-media">
                      <a href="JavaScript:Void(0);">
                        <iframe src="https://www.youtube.com/embed/jHlLc8yluDo" allowfullscreen="true"></iframe>
                      </a>
                    </div>
                  </div>
                  <!-- ///// -->
                  <div class="item">
                    <div class="dlab-media">
                      <a href="JavaScript:Void(0);">
                        <iframe src="https://www.youtube.com/embed/SutiJhr0kuc" allowfullscreen="true"></iframe>
                      </a>
                    </div>
                  </div>
                  <!-- ///// -->
                  <div class="item">
                    <div class="dlab-media">
                      <a href="JavaScript:Void(0);">
                        <iframe src="https://www.youtube.com/embed/Uc-3As4SgCY" allowfullscreen="true"></iframe>
                      </a>
                    </div>
                  </div> --}}
                  <!-- ///// -->
                </div>

                <!-- <ul class="nav nav-pills nav-justified blog-nav-list">
                  <li data-target="#reviews" data-slide-to="0" class="active">
                    <a class="media">
                      <div class="media-left">
                        <img class="media-object" src="/wings/images/our-work/work1/thumb2.jpg" alt="">
                      </div>
                      <div class="media-body p-l15">
                        <h4 class="dlab-title">Porche Release New Model</h4>
                      </div>
                    </a>
                  </li>
                  <li data-target="#reviews" data-slide-to="1">
                    <a class="media">
                      <div class="media-left">
                        <img class="media-object" src="/wings/images/our-work/work1/thumb1.jpg" alt="">
                      </div>
                      <div class="media-body p-l15">
                        <h4 class="dlab-title">Porche Release New Model</h4>
                      </div>
                    </a>
                  </li>
                  <li data-target="#reviews" data-slide-to="2">
                    <a class="media">
                      <div class="media-left">
                        <img class="media-object" src="/wings/images/our-work/work1/thumb3.jpg" alt="">
                      </div>
                      <div class="media-body p-l15">
                        <h4 class="dlab-title">Porche Release New Model</h4>
                      </div>
                    </a>
                  </li>
                </ul> -->
              </div><!-- End Carousel -->
            </div>
            <div id="featured-stories"  class="tab-pane clearfix fade">
              <div id="featured" class="carousel slide blog-stories mycarousel" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    <div class="dlab-media">
                      <a href="/wings/plugins/imagegallery/img/loading.gif#"><img src="/wings/images/our-work/work1/pic1.jpg" alt=""></a>
                    </div>
                    <div class="carousel-caption">
                      <h4 class="dlab-tilte"><a href="/wings/plugins/imagegallery/img/loading.gif#">Lorem Ipsum is simply dummy text of the printing and typesetting dustry. Lorem Ipsum has been the industry..</a></h4>
                    </div>
                  </div>
                  <div class="item ">
                    <div class="dlab-media">
                      <a href="/wings/plugins/imagegallery/img/loading.gif#"><img src="/wings/images/our-work/work1/pic2.jpg" alt=""></a>
                    </div>
                    <div class="carousel-caption">
                      <h4 class="dlab-tilte"><a href="/wings/plugins/imagegallery/img/loading.gif#">Lorem Ipsum is simply dummy text of the printing and typesetting dustry. Lorem Ipsum has been the industry..</a></h4>
                    </div>
                  </div>
                  <div class="item">
                    <div class="dlab-media">
                      <a href="/wings/plugins/imagegallery/img/loading.gif#"><img src="/wings/images/our-work/work1/pic3.jpg" alt=""></a>
                    </div>
                    <div class="carousel-caption">
                      <h4 class="dlab-tilte"><a href="/wings/plugins/imagegallery/img/loading.gif#">Lorem Ipsum is simply dummy text of the printing and typesetting dustry. Lorem Ipsum has been the industry..</a></h4>
                    </div>
                  </div>
                </div>
                <ul class="nav nav-pills nav-justified blog-nav-list">
                  <li data-target="#featured" data-slide-to="1" >
                    <a class="media">
                      <div class="media-left">
                        <img class="media-object" src="/wings/images/our-work/work1/thumb1.jpg" alt="">
                      </div>
                      <div class="media-body p-l15">
                        <h4 class="dlab-title">Porche Release New Model</h4>
                      </div>
                    </a>
                  </li>
                  <li data-target="#featured" data-slide-to="0" >
                    <a class="media">
                      <div class="media-left">
                        <img class="media-object" src="/wings/images/our-work/work1/thumb2.jpg" alt="">
                      </div>
                      <div class="media-body p-l15">
                        <h4 class="dlab-title">Porche Release New Model</h4>
                      </div>
                    </a>
                  </li>
                  <li data-target="#featured" data-slide-to="2">
                    <a class="media">
                      <div class="media-left">
                        <img class="media-object" src="/wings/images/our-work/work1/thumb3.jpg" alt="">
                      </div>
                      <div class="media-body p-l15">
                        <h4 class="dlab-title">Porche Release New Model</h4>
                      </div>
                    </a>
                  </li>
                </ul>
              </div><!-- End Carousel -->
            </div>
            <div id="videos"  class="tab-pane clearfix fade">
              <div id="video" class="carousel slide blog-stories mycarousel" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    <div class="dlab-media">
                      <a href="/wings/plugins/imagegallery/img/loading.gif#"><img src="/wings/images/our-work/work1/pic3.jpg" alt=""></a>
                    </div>
                    <div class="carousel-caption">
                      <h4 class="dlab-tilte"><a href="/wings/plugins/imagegallery/img/loading.gif#">Lorem Ipsum is simply dummy text of the printing and typesetting dustry. Lorem Ipsum has been the industry..</a></h4>
                    </div>
                  </div>
                  <div class="item ">
                    <div class="dlab-media">
                      <a href="/wings/plugins/imagegallery/img/loading.gif#"><img src="/wings/images/our-work/work1/pic2.jpg" alt=""></a>
                    </div>
                    <div class="carousel-caption">
                      <h4 class="dlab-tilte"><a href="/wings/plugins/imagegallery/img/loading.gif#">Lorem Ipsum is simply dummy text of the printing and typesetting dustry. Lorem Ipsum has been the industry..</a></h4>
                    </div>
                  </div>
                  <div class="item">
                    <div class="dlab-media">
                      <a href="/wings/plugins/imagegallery/img/loading.gif#"><img src="/wings/images/our-work/work1/pic1.jpg" alt=""></a>
                    </div>
                    <div class="carousel-caption">
                      <h4 class="dlab-tilte"><a href="/wings/plugins/imagegallery/img/loading.gif#">Lorem Ipsum is simply dummy text of the printing and typesetting dustry. Lorem Ipsum has been the industry..</a></h4>
                    </div>
                  </div>
                </div>
                <ul class="nav nav-pills nav-justified blog-nav-list">
                  <li data-target="#video" data-slide-to="2" class="active">
                    <a class="media">
                      <div class="media-left">
                        <img class="media-object" src="/wings/images/our-work/work1/thumb3.jpg" alt="">
                      </div>
                      <div class="media-body p-l15">
                        <h4 class="dlab-title">Porche Release New Model</h4>
                      </div>
                    </a>
                  </li>
                  <li data-target="#video" data-slide-to="0" >
                    <a class="media">
                      <div class="media-left">
                        <img class="media-object" src="/wings/images/our-work/work1/thumb2.jpg" alt="">
                      </div>
                      <div class="media-body p-l15">
                        <h4 class="dlab-title">Porche Release New Model</h4>
                      </div>
                    </a>
                  </li>
                  <li data-target="#video" data-slide-to="1">
                    <a class="media">
                      <div class="media-left">
                        <img class="media-object" src="/wings/images/our-work/work1/thumb1.jpg" alt="">
                      </div>
                      <div class="media-body p-l15">
                        <h4 class="dlab-title">Porche Release New Model</h4>
                      </div>
                    </a>
                  </li>
                </ul>
              </div><!-- End Carousel -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
