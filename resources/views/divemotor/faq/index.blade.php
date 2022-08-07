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
              <section class="faq">
                <!-- Menu de preguntas -->
                <div class="row">
                  <div class="col-md-3 col-xs-12">
                    <ul class="categories" style="list-style-type: none; padding-inline-start: 0px;">
                      @foreach ($tags as $key => $value)
                        <li><a class="{{ ($key == 0) ? 'selected' : '' }}" href="#basics{{ $key }}">{{ $value->name}}</a></li>
                      @endforeach
                      {{-- <li><a class="selected" href="#basics1">Categoria 1</a></li> --}}
                      {{-- <li><a class="" href="#basics2">Categoria 2</a></li> --}}
                  	</ul>
                  </div>
                  <div class="col-md-9 col-xs-12">
                    <!-- ================= -->
                    <!-- Contenidos -->
                    <div class="faq-items">
                    {{--@foreach ($tags as $key => $value)
                        <!-- Contenido 1 -->
                        <ul id="basics{{ $value }}" class="faq-group" style="list-style-type: none;">
                          <li class="faq-title"><h2>{{ $value->name}}</h2></li>
                          @foreach ($blogs as $key => $blog)
                            <li>
                              <a class="trigger" href="javascript:void(0)">{{ $blog['title'] }}</a>
                              <div class="faq-content">
                                <p>{{ substr(strip_tags($blog['content']), 0) }}</p>
                              </div> <!-- faq-content -->
                            </li>
                          @endforeach

                        </ul>
                        <!-- Fin de Contenido 1 -->
                      @endforeach --}}
                      @foreach ($tags as $i =>  $tag)
                      <ul id="basics{{ $i }}" class="faq-group" style="list-style-type: none;">
                        <li class="faq-title"><h2>{{ $tag->name }}</h2></li>
                          @foreach ($tag->posts as $post)
                          <li>
                          <a class="trigger" href="javascript:void(0)">{{ $post->title }}</a>
                            <div class="faq-content">
                            <p>{!! $post->content !!}</p>
                            </div> <!-- faq-content -->
                          </li>
                          @endforeach
{{--
                          <li>
                            <a class="trigger" href="javascript:void(0)">h,dhklhgf</a>
                            <div class="faq-content">
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum ad, delectus vel reprehenderit nemo natus dolore qui quasi incidunt autem. Maxime quam tenetur dolores ut facilis eveniet quidem quaerat qui?</p>
                            </div> <!-- faq-content -->
                          </li>

                          <li>
                            <a class="trigger" href="javascript:void(0)">h,dhklhgf</a>
                            <div class="faq-content">
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum ad, delectus vel reprehenderit nemo natus dolore qui quasi incidunt autem. Maxime quam tenetur dolores ut facilis eveniet quidem quaerat qui?</p>
                            </div> <!-- faq-content -->
                          </li>

                          <li>
                            <a class="trigger" href="javascript:void(0)">h,dhklhgf</a>
                            <div class="faq-content">
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum ad, delectus vel reprehenderit nemo natus dolore qui quasi incidunt autem. Maxime quam tenetur dolores ut facilis eveniet quidem quaerat qui?</p>
                            </div> <!-- faq-content -->
                          </li>

                          <li>
                            <a class="trigger" href="javascript:void(0)">h,dhklhgf</a>
                            <div class="faq-content">
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum ad, delectus vel reprehenderit nemo natus dolore qui quasi incidunt autem. Maxime quam tenetur dolores ut facilis eveniet quidem quaerat qui?</p>
                            </div> <!-- faq-content -->
                          </li>

                          <li>
                            <a class="trigger" href="javascript:void(0)">h,dhklhgf</a>
                            <div class="faq-content">
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum ad, delectus vel reprehenderit nemo natus dolore qui quasi incidunt autem. Maxime quam tenetur dolores ut facilis eveniet quidem quaerat qui?</p>
                            </div> <!-- faq-content -->
                          </li> --}}
                        </ul>
                      @endforeach


                      {{-- <ul id="basics1" class="faq-group" style="list-style-type: none;">
                          <li class="faq-title"><h2>Categoria 2</h2></li>
                          <li>
                            <a class="trigger" href="javascript:void(0)">h,dhklhgf</a>
                            <div class="faq-content">
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum ad, delectus vel reprehenderit nemo natus dolore qui quasi incidunt autem. Maxime quam tenetur dolores ut facilis eveniet quidem quaerat qui?</p>
                            </div> <!-- faq-content -->
                          </li>

                          <li>
                            <a class="trigger" href="javascript:void(0)">h,dhklhgf</a>
                            <div class="faq-content">
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum ad, delectus vel reprehenderit nemo natus dolore qui quasi incidunt autem. Maxime quam tenetur dolores ut facilis eveniet quidem quaerat qui?</p>
                            </div> <!-- faq-content -->
                          </li>

                          <li>
                            <a class="trigger" href="javascript:void(0)">h,dhklhgf</a>
                            <div class="faq-content">
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum ad, delectus vel reprehenderit nemo natus dolore qui quasi incidunt autem. Maxime quam tenetur dolores ut facilis eveniet quidem quaerat qui?</p>
                            </div> <!-- faq-content -->
                          </li>

                          <li>
                            <a class="trigger" href="javascript:void(0)">h,dhklhgf</a>
                            <div class="faq-content">
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum ad, delectus vel reprehenderit nemo natus dolore qui quasi incidunt autem. Maxime quam tenetur dolores ut facilis eveniet quidem quaerat qui?</p>
                            </div> <!-- faq-content -->
                          </li>

                          <li>
                            <a class="trigger" href="javascript:void(0)">h,dhklhgf</a>
                            <div class="faq-content">
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum ad, delectus vel reprehenderit nemo natus dolore qui quasi incidunt autem. Maxime quam tenetur dolores ut facilis eveniet quidem quaerat qui?</p>
                            </div> <!-- faq-content -->
                          </li>

                          <li>
                            <a class="trigger" href="javascript:void(0)">h,dhklhgf</a>
                            <div class="faq-content">
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum ad, delectus vel reprehenderit nemo natus dolore qui quasi incidunt autem. Maxime quam tenetur dolores ut facilis eveniet quidem quaerat qui?</p>
                            </div> <!-- faq-content -->
                          </li>
                      </ul> --}}
                    </div>
                    <!-- ========== -->
                    <a href="javascript:void(0)" class="cd-close-panel"><i class="fas fa-times"></i></a>
                  </div>
                </div>


              </section>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
@stop

@section('plugins-css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
@stop
@section('plugins-js')
<script type="text/javascript">
jQuery(document).ready(function($){

var MqM= 768,
  MqL = 1024;

var faqsSections = $('.faq-group'),
  faqTrigger = $('.trigger'),
  faqsContainer = $('.faq-items'),
  faqsCategoriesContainer = $('.categories'),
  faqsCategories = faqsCategoriesContainer.find('a'),
  closeFaqsContainer = $('.cd-close-panel');

//select a faq section
faqsCategories.on('click', function(event){
  event.preventDefault();
  var selectedHref = $(this).attr('href'),
    target= $(selectedHref);
  if( $(window).width() < MqM) {
    faqsContainer.scrollTop(0).addClass('slide-in').children('ul').removeClass('selected').end().children(selectedHref).addClass('selected');
    closeFaqsContainer.addClass('move-left');
    $('body').addClass('cd-overlay');
  } else {
        $('body,html').animate({ 'scrollTop': target.offset().top - 19}, 200);
  }
});

//close faq lateral panel - mobile only
$('body').bind('click touchstart', function(event){
  if( $(event.target).is('body.cd-overlay') || $(event.target).is('.cd-close-panel')) {
    closePanel(event);
  }
});
faqsContainer.on('swiperight', function(event){
  closePanel(event);
});


faqTrigger.on('click', function(event){
  event.preventDefault();
  $(this).next('.faq-content').slideToggle(200).end().parent('li').toggleClass('content-visible');
});

$(window).on('scroll', function(){
  if ( $(window).width() > MqL ) {
    (!window.requestAnimationFrame) ? updateCategory() : window.requestAnimationFrame(updateCategory);
  }
});

$(window).on('resize', function(){
  if($(window).width() <= MqL) {
    faqsCategoriesContainer.removeClass('is-fixed').css({
      '-moz-transform': 'translateY(0)',
        '-webkit-transform': 'translateY(0)',
      '-ms-transform': 'translateY(0)',
      '-o-transform': 'translateY(0)',
      'transform': 'translateY(0)',
    });
  }
  if( faqsCategoriesContainer.hasClass('is-fixed') ) {
    faqsCategoriesContainer.css({
      'left': faqsContainer.offset().left,
    });
  }
});

function closePanel(e) {
  e.preventDefault();
  faqsContainer.removeClass('slide-in').find('li').show();
  closeFaqsContainer.removeClass('move-left');
  $('body').removeClass('cd-overlay');
}

function updateCategory(){
  updateCategoryPosition();
  updateSelectedCategory();
}

function updateCategoryPosition() {
  var top = $('.faq').offset().top,
    height = jQuery('.faq').height() - jQuery('.categories').height(),
    margin = 20;
  if( top - margin <= $(window).scrollTop() && top - margin + height > $(window).scrollTop() ) {
    var leftValue = faqsCategoriesContainer.offset().left,
      widthValue = faqsCategoriesContainer.width();
    faqsCategoriesContainer.addClass('is-fixed').css({
      'left': leftValue,
      'top': margin,
      '-moz-transform': 'translateZ(0)',
        '-webkit-transform': 'translateZ(0)',
      '-ms-transform': 'translateZ(0)',
      '-o-transform': 'translateZ(0)',
      'transform': 'translateZ(0)',
    });
  } else if( top - margin + height <= $(window).scrollTop()) {
    var delta = top - margin + height - $(window).scrollTop();
    faqsCategoriesContainer.css({
      'width' : 'auto%',
      '-moz-transform': 'translateZ(0) translateY('+delta+'px)',
        '-webkit-transform': 'translateZ(0) translateY('+delta+'px)',
      '-ms-transform': 'translateZ(0) translateY('+delta+'px)',
      '-o-transform': 'translateZ(0) translateY('+delta+'px)',
      'transform': 'translateZ(0) translateY('+delta+'px)',
    });
  } else {
    faqsCategoriesContainer.removeClass('is-fixed').css({
      'left': 0,
      'top': 0,
    });
  }
}

function updateSelectedCategory() {
  faqsSections.each(function(){
    var actual = $(this),
      margin = parseInt($('.faq-title').eq(1).css('marginTop').replace('px', '')),
      activeCategory = $('.categories a[href="#'+actual.attr('id')+'"]'),
      topSection = (activeCategory.parent('li').is(':first-child')) ? 0 : Math.round(actual.offset().top);

    if ( ( topSection - 20 <= $(window).scrollTop() ) && ( Math.round(actual.offset().top) + actual.height() + margin - 20 > $(window).scrollTop() ) ) {
      activeCategory.addClass('selected');
    }else {
      activeCategory.removeClass('selected');
    }
  });
}
});
</script>
@stop
