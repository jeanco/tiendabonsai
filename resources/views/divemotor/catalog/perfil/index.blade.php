@extends('divemotor.layouts.index')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <!-- Gallery -->
                    <div class="product-gallery">
                      <!-- Imagen Grande -->
                      <div class="product-photo-main">
                        <div class="swiper-container">
                          <div class="swiper-wrapper">
                            @foreach ($product->images as $image)
                            <div class="swiper-slide">
                                <div class="swiper-zoom-container">
                                <img src="{{ $image['resource'] }}">
                                  {{-- <img src="/divemotor/assets/images/big/img5.png"> --}}
                                </div>
                              </div>
                            @endforeach
                          </div>
                          <div class="swiper-pagination"></div>
                        </div>
                      </div>
                      <!-- Imagen Miniatura -->
                      <div class="product-photos-side">
                        <div class="swiper-container">
                          <div class="swiper-wrapper">
                            @foreach ($product->images as $image_thumb)
                              <div class="swiper-slide">
                                  <div class="swiper-zoom-container">
                                  <img src="{{ $image_thumb->resource_thumb }}">
                                  </div>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Fin de Gallery -->
                  </div>

                  <div class="col-md-6 col-xs-12">
                    <div class="text-right"><a href="/catalogo"><i class="fas fa-angle-left"></i>&nbsp;Volver al catálogo</a></div>
                    <div class="mb-4 text-themecolor font-bold" style="font-size: 20px;">{{ $product->name }}</div>
                    <p>{!! $product->description !!}</p>
                    <div class="mb-3">
                      <span style="font-size: 20px;">Precio:</span>&nbsp;<span class="font-bold" style="font-size: 20px;">$ {{ $product->price }}</span>&emsp;
                      <span style="font-size: 17px; font-weight: 400;">Incl. IGV</span> <br>
                    <span style="font-size: 18px;">Garantía:</span>&nbsp;<span class="font-bold" style="font-size: 18px;">{{ $product->warranty }}</span> <br>
                      <span style="font-size: 18px;">Tiempo de entrega:</span>&nbsp;<span class="font-bold" style="font-size: 18px;">{{ $product->delivery_time }}</span> <br>
                      <span style="font-size: 18px;">Tiempo de instalación:</span>&nbsp;<span class="font-bold" style="font-size: 18px;">{{ $product->installation_time }}</span>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-sm-5 col-xs-12 mb-2">
                      <a href="{{ $product->brochure }}" class="btn btn-info btn-block text-left"><i class="fas fa-file-upload"></i>&nbsp;&nbsp;Brochure</a>
                      </div>
                      <div class="col-lg-3 col-sm-5 col-xs-12 mb-2">
                        <a href="{{ $product->pdf }}" class="btn btn-info btn-block text-left"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;Ficha Técnica</a>
                      </div>
                      @if ($product->link != '')
                        <div class="col-lg-3 col-sm-5 col-xs-12 mb-2">
                          <a href="" class="btn btn-info btn-block text-left see-youtube-video" data-youtube_code="{{ (isset(explode('=', $product->link)[1])) ? explode('=', $product->link)[1] : '' }}" data-toggle="modal" data-target="#video-modal"><i class="fab fa-youtube-square"></i>&nbsp;&nbsp;Ver Video</a>
                        </div>
                      @endif

                      @if(!in_array($product->id, (isset($_COOKIE['cart'])) ? explode(',', $_COOKIE['cart']) : []))
                      <div class="col-lg-3 col-sm-5 col-xs-12 mb-2">
                        <a href="javascript:void(0)" data-index="{{ $product->id }}" class="btn btn-success btn-block text-left cart__add-product-perfil"><i class="fas fa-check"></i>&nbsp;&nbsp;Seleccionar</a>
                      </div>
                      @else
                      <div class="col-lg-3 col-sm-5 col-xs-12 mb-2">
                        <a href="javascript:void(0)" data-index="{{ $product->id }}" class="btn btn-danger btn-block text-left cart__remove-product-perfil"><i class="fas fa-ban"></i>&nbsp;&nbsp;No seleccionar</a>
                      </div>
                      @endif
                    </div>
                  </div>

                </div>

                <div class="product-gallery-full-screen">
                  <div class="swiper-container gallery-top">
                    <div class="swiper-wrapper">
                      <!-- /// -->
                      @foreach ($product->images as $image_thumb)
                      <div class="swiper-slide">
                          <div class="swiper-zoom-container">
                              <img src="{{ $image_thumb->resource_thumb }}" draggable="false" ondragstart="return false;">
                          </div>
                      </div>
                      @endforeach
                      <!-- /// -->
                    </div>
                    <div class="swiper-button-next swiper-button-white">
                      <svg fill="#FFFFFF" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                      </svg>
                    </div>
                    <div class="swiper-button-prev swiper-button-white">
                      <svg fill="#FFFFFF" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none"/>
                        <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
                      </svg>
                    </div>
                    <div class="gallery-nav">
                      <div class="swiper-pagination"></div>
                      <ul class="gallery-menu">
                        <li class="zoom">
                          <svg class="zoom-icon-zoom-in" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                            <path d="M0 0h24v24H0V0z" fill="none"/>
                            <path d="M12 10h-2v2H9v-2H7V9h2V7h1v2h2v1z"/>
                          </svg>
                          <svg class="zoom-icon-zoom-out" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0V0z" fill="none"/>
                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14zM7 9h5v1H7z"/>
                          </svg>
                        </li>
                        <li class="fullscreen">
                          <svg class="fs-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/>
                          </svg>
                          <svg class="fs-icon-exit" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M5 16h3v3h2v-5H5v2zm3-8H5v2h5V5H8v3zm6 11h2v-3h3v-2h-5v5zm2-11V5h-2v5h5V8h-3z"/>
                          </svg>
                        </li>
                        <li class="close">
                          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                            <path d="M0 0h24v24H0z" fill="none"/>
                          </svg>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="pt-5">
            			<div class="container">
                    <div class="section-head">
                      <h3 class="h4 text-uppercase">Productos relacionados</h3>
                    </div>
                    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="12000">
                        <div class="carousel-inner row w-100 mx-auto flex-nowrap" role="listbox">

                          @foreach ($interests as $key => $interest)

                          @if($key==0)
                            <div class="carousel-item col-md-3 active">
                                <img class="img-fluid mx-auto d-block" src="{{ $interest['imageThumbUrl'] }}" alt="slide 1">
                                <div class="text-center mt-2 font-bold">
                                  <a href="/productos/{{ $interest['slug'] }}">{{ $interest['name'] }}</a>
                                </div>
                            </div>
                          @else
                          <div class="carousel-item col-md-3">
                              <img class="img-fluid mx-auto d-block" src="{{ $interest['imageThumbUrl'] }}" alt="slide 1">
                              <div class="text-center mt-2 font-bold">
                                <a href="/productos/{{ $interest['slug'] }}">{{ $interest['name'] }}</a>
                              </div>
                          </div>
                          @endif
                          @endforeach

                            <!-- <div class="carousel-item col-md-3">
                                <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=2" alt="slide 2">
                            </div>
                            <div class="carousel-item col-md-3">
                                <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=3" alt="slide 3">
                            </div>
                            <div class="carousel-item col-md-3">
                                <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=4" alt="slide 4">
                            </div>
                            <div class="carousel-item col-md-3">
                                <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=5" alt="slide 5">
                            </div>
                            <div class="carousel-item col-md-3">
                                <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=6" alt="slide 6">
                            </div>
                            <div class="carousel-item col-md-3">
                                <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=7" alt="slide 7">
                            </div>
                            <div class="carousel-item col-md-3">
                                <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=8" alt="slide 7">
                            </div> -->
                        </div>
                        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                            <i class="fa fa-chevron-left fa-lg text-muted"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                            <i class="fa fa-chevron-right fa-lg text-muted"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
            			</div>
            		</div>

            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
@include('divemotor.catalog.perfil.1_video')
@stop

@section('plugins-css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.0/css/swiper.min.css" rel="stylesheet" type="text/css" />
<style type="text/css">

    .swiper-container,
    .swiper-container * {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    }
    .swiper-container .swiper-no-swiping .swiper-button-prev,
    .swiper-container .swiper-no-swiping .swiper-button-next {
    opacity: 0;
    }
    .swiper-button-next.swiper-button-disabled,
    .swiper-button-prev.swiper-button-disabled {
    opacity: .1;
    }
    .product-gallery .product-photos-side,
    .product-gallery .product-photo-main {
    position: relative;
    }
    .product-gallery .product-photo-main {
    margin-bottom: 30px;
    }
    .product-gallery .product-photos-side .swiper-container {
    height: 70px;
    }
    .product-gallery .product-photo-main .swiper-container {
    height: 320px;
    }
    .product-gallery .product-photos-side .swiper-slide {
    width: 70px;
    opacity: .4;
    transition: 225ms opacity ease-in-out;
    }
    .product-gallery .product-photos-side .swiper-slide.swiper-slide-active {
    opacity: 1;
    }
    .product-gallery .swiper-container {
    position: static;
    width: 100%;
    }
    .product-gallery .swiper-slide {
    cursor: pointer;
    text-align: center;
    }
    .product-gallery img {
    max-height: 100%;
    max-width: 100%;
    }
    /* full screen product gallery */
    .product-gallery-full-screen {
    position: fixed;
    background: #000;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    width: 100vw;
    opacity: 0;
    pointer-events: none;
    overflow-y: auto;
    z-index: 999999;
    transition: 350ms opacity ease-in-out;
    }
    .product-gallery-full-screen.opened {
    opacity: 1;
    overflow-y: scroll;
    pointer-events: auto;
    }
    .product-gallery-full-screen .swiper-container {
    position: absolute;
    margin: auto;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    }
    .product-gallery-full-screen .swiper-slide {
    overflow: hidden;
    }
    .product-gallery-full-screen .swiper-slide img,
    .product-photos-side .swiper-slide img {
    max-height: 100%;
    max-width: 100%;
    }
    .product-gallery-full-screen .swiper-slide img {
    cursor: zoom-in;
    transition: 350ms -webkit-transform ease-in-out, 350ms transform ease-in-out;
    }
    .product-gallery-full-screen .swiper-button-prev,
    .product-gallery-full-screen .swiper-button-next {
    background: rgba(0, 0, 0, .4);
    color: #aaa;
    transition:
      250ms opacity ease-in-out,
      150ms color ease-in-out;
    }
    body:not(:hover) .product-gallery-full-screen .swiper-button-prev,
    body:not(:hover) .product-gallery-full-screen .swiper-button-next {
    opacity: 0;
    transition-delay: 1000ms;
    }
    body:hover .product-gallery-full-screen .swiper-button-prev,
    body:hover .product-gallery-full-screen .swiper-button-next {
    transition-delay: 0ms;
    }
    .product-gallery-full-screen .swiper-button-prev:hover,
    .product-gallery-full-screen .swiper-button-next:hover {
    color: #fff;
    }
    .product-gallery-full-screen .swiper-button-prev svg,
    .product-gallery-full-screen .swiper-button-next svg {
    position: absolute;
    fill: currentColor;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    }
    .gallery-nav {
    position: absolute;
    background: rgba(0, 0, 0, 1);
    color: #aaa;
    padding: 10px 15px;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1;
    transition:
      250ms opacity ease-in-out;
    }
    body:not(:hover) .gallery-nav {
    opacity: 0;
    transition-delay: 1000ms;
    }
    body:hover .gallery-nav {
    opacity: .65;
    transition-delay: 0ms;
    }
    .gallery-nav ul,
    .gallery-nav li {
    list-style: none;
    }
    .gallery-nav ul {
    float: right;
    }
    .gallery-nav li {
    float: left;
    color: #aaa;
    cursor: pointer;
    margin-left: 15px;
    transition: 150ms color ease-in-out;
    }
    .gallery-nav li:hover {
    color: #fff;
    }
    .gallery-nav svg {
    display: block;
    fill: currentColor;
    height: 24px;
    width: 24px;
    }
    .gallery-nav .zoom.zoom-out svg.zoom-icon-zoom-in {
    display: none;
    }
    .gallery-nav .zoom svg.zoom-icon-zoom-out {
    display: none;
    }
    .gallery-nav .zoom.zoom-out svg.zoom-icon-zoom-out {
    display: block;
    }
    .gallery-nav .fullscreen.leavefs svg.fs-icon {
    display: none;
    }
    .gallery-nav .fullscreen svg.fs-icon-exit {
    display: none;
    }
    .gallery-nav .fullscreen.leavefs svg.fs-icon-exit {
    display: block;
    }
    .gallery-nav .swiper-pagination {
    position: static;
    float: left;
    width: auto;
    line-height: 24px;
    }
    @media (max-width: 1025px) {
    article {
      display: none;
    }
    .container {
      padding: 0;
    }
    }
</style>
<style type="text/css">
@media (min-width: 768px) {

    /* show 4 items */
    .carousel-inner .active,
    .carousel-inner .active + .carousel-item,
    .carousel-inner .active + .carousel-item + .carousel-item,
    .carousel-inner .active + .carousel-item + .carousel-item + .carousel-item  {
        display: block;
    }
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item,
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item,
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item + .carousel-item {
        transition: none;
    }
    .carousel-inner .carousel-item-next,
    .carousel-inner .carousel-item-prev {
      position: relative;
      transform: translate3d(0, 0, 0);
    }
    /* last visible item + 1 */
    .carousel-inner .active.carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: absolute;
        top: 0;
        right: -25%;
        z-index: -1;
        display: block;
        visibility: visible;
    }
    /* left or forward direction */
    .active.carousel-item-left + .carousel-item-next.carousel-item-left,
    .carousel-item-next.carousel-item-left + .carousel-item,
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item,
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item,
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }
    /* farthest right hidden item must be abso position for animations */
    .carousel-inner .carousel-item-next.carousel-item-left {
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        display: block;
        visibility: visible;
    }
    .carousel-inner .carousel-item-prev.carousel-item-right {
        position: absolute;
        top: 0;
        left: -25%;
        z-index: -1;
        display: block;
        visibility: visible;
    }
    /* right or prev direction */
    .active.carousel-item-right + .carousel-item-prev.carousel-item-right,
    .carousel-item-prev.carousel-item-right + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        display: block;
        visibility: visible;
    }
}
</style>
@stop
@section('plugins-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.0/js/swiper.min.js"></script>
<script src="/divemotor/js/cart_perfil.js"></script>
<script src="/divemotor/js/profile_product.js"></script>
<script type="text/javascript">
$(document).ready(function() {
// --- VARIABLES ---
var swiperSide = new Swiper('.product-photos-side .swiper-container', {
  direction: 'horizontal',
  centeredSlides: true,
  spaceBetween: 30,
  slidesPerView: 'auto',
  touchRatio: 0.2,
  slideToClickedSlide: true,
})
var swiperProduct = new Swiper('.product-photo-main .swiper-container', {
  direction: 'horizontal',
  pagination: '.swiper-pagination',
  paginationClickable: true,
  // keyboardControl: true,
})
var galleryTop = new Swiper('.product-gallery-full-screen .gallery-top', {
  nextButton: '.swiper-button-next',
  prevButton: '.swiper-button-prev',
  pagination: '.swiper-pagination',
  paginationType: 'fraction',
  spaceBetween: 10,
  keyboardControl: true,
  noSwiping: true,
  zoom: true,
})
swiperSide.params.control = swiperProduct || galleryTop;
swiperProduct.params.control = swiperSide || galleryTop;
galleryTop.params.control = swiperProduct || swiperSide;

var galleryOpen = false,
    fullscreen = false,
    fsTrigger = $('.gallery-nav .fullscreen')[0],
    fsGallery = $('.product-gallery-full-screen')[0],
    fsFunction = fsGallery.requestFullscreen;
// browser support check
if (!fsFunction) {
  ['webkitRequestFullScreen',
    'mozRequestFullscreen',
    'msRequestFullScreen'
  ].forEach(function(req) {
    fsFunction = fsFunction || fsGallery[req];
  });
}

// --- FUNCTIONS ---
function openImageGallery(slide) {
  galleryOpen = true;
  var galleryX = $('.product-photo-main').offset().left,
    galleryY = $('.product-photo-main').offset().top,
    galleryHeight = $('.product-photo-main').height(),
    galleryWidth = $('.product-photo-main').width(),
    activeIndex = slide.index(),
    indexes = $('.product-photo-main').find('.swiper-slide').length;
  $('body').css('overflow', 'hidden');
  $('.main, .product-gallery-full-screen').css('overflow-y', 'scroll');
  $('.product-gallery-full-screen').addClass('opened');
  galleryTop.activeIndex = activeIndex;
  galleryTop.onResize();
}

function goFs() {
  fullscreen = true;
  $('.product-gallery-full-screen').css('overflow-y', 'auto');
  $('.fullscreen').addClass('leavefs');
  fsFunction.call(fsGallery);
}

function leaveFs() {
  fullscreen = false;
  $('.product-gallery-full-screen').css('overflow-y', 'scroll');
  $('.fullscreen').removeClass('leavefs');
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.mozCancelFullScreen) {
    document.mozCancelFullScreen();
  } else if (document.webkitExitFullscreen) {
    document.webkitExitFullscreen();
  }
}

function closeImageGallery() {
  // if(zoomed) {
  //   zoom($('.product-gallery-full-screen .swiper-slide-active img'));
  // }
  $('body').css('overflow', 'auto');
  $('.main, .product-gallery-full-screen').css('overflow-y', 'auto');
  galleryOpen = false;
  leaveFs();
  $('.product-gallery-full-screen').removeClass('opened');
}

// --- EVENTS ---
// open the large image gallery
$('.product-photo-main .swiper-slide').on('click touch', function() {
  var slide = $(this);
  openImageGallery(slide);
});
// close the large image gallery
$('.gallery-nav .close').on('click touch', function() {
  closeImageGallery();
});
// zoom in / out
$('.zoom').on('click touch', function() {
  // zoom
});
// fullscreen toggle
$(fsTrigger).on('click touch', function() {
  if (fullscreen) {
    leaveFs();
  } else {
    goFs();
  }
});

// keyboard controls
$(document).on('keydown', function(e) {
  e.preventDefault();
  var code = e.keyCode || e.which;
  // open the large image gallery
  if (code == 13 && !galleryOpen) {
    var slide = $('.product-photo-main .swiper-slide.swiper-slide-active');
    openImageGallery(slide);
  }
  // close the large image gallery
  if (code == 27 && galleryOpen) {
    closeImageGallery();
  }
  if (code == 122) {
    if(galleryOpen) {
      if (fullscreen) {
        leaveFs();
      } else {
        goFs();
      }
    }
  }
});

$(window).on('resize', function() {
  galleryTop.onResize();
  swiperSide.onResize();
  swiperProduct.onResize();
});
});
</script>
<script type="text/javascript">
$('#carouselExample').on('slide.bs.carousel', function (e) {

    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 4;
    var totalItems = $('.carousel-item').length;
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('.carousel-item').eq(i).appendTo('.carousel-inner');
            }
            else {
                $('.carousel-item').eq(0).appendTo('.carousel-inner');
            }
        }
    }
});
</script>
@stop
