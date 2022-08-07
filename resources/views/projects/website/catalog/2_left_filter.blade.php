<style type="text/css">
.pad-15 {
padding: 15px;
}
.clear {
clear: both;
}
.clear:after, .clear:before{
content: " ";
display: table;
}
.header {
min-height: 55px;
background: #273135;
border-bottom: 1px solid #273135;
}
a.toggle-nav {
top: 12px;
right: 15px;
position: absolute;
color: #fff;
line-height: 25px;
font-size: 22px;
background: #DE5939;
padding: 3px 5px;
border-radius: 1px;
transform: rotate(90deg);
}
.header > .left-head {
width: 250px;
display: block;
background:#20282B;
position:relative;
}
.header > .left-head .logo img{
max-width:150px;
width:100%;
}
.header > .left-head .logo{
padding:10px 0px 10px 15px;
}
.nice-nav {
width: 250px;
/* background: #DE5939; */
transition:all 0.4s ease-in-out 0s;
float:left;
}
.nice-nav.open {
margin-left: -250px;
display: block;
}
.nice-nav > .user-info {
padding: 10px 15px;
color: #fff;
border-bottom: 1px solid #ddd;
min-height: 41px;
}
.nice-nav .user-info .user-name,
.nice-nav .user-info img{
float:left;
}
.nice-nav> .user-info > .user-name {
padding: 0px 10px;
}
.user-info > .user-name h5 {
text-transform: uppercase;
font-size: 16px;
}
.user-info > .user-name span {
font-size: 80%;
color: #555;
font-style: italic;
}
.nice-nav li.child-menu span.toggle-right {
text-align: right;
float: right;
display: inline-block;
position: absolute;
right: 0;
padding: 15px;
top: 0;
/* background: #DE5939; */
bottom: 0;
}
.nice-nav ul li a {
padding: 6px;
/* background: #FA7252; */
border-bottom: 1px solid #ddd;
display: block;
color: #333;
position: relative;
text-transform: uppercase;
/*font: 700 16px/36px "Poppins", sans-serif;*/
}
.nice-nav ul li.child-menu ul {
/* background: #aaa; */
display: none;
}
.nice-nav ul li.child-menu ul li a {
/* background: #273135; */
padding: 5px 20px;
color: #767676;
/*font: 13px/32px "Open Sans", sans-serif;*/
text-transform: lowercase;
font-weight: 400;
}
.nice-nav ul li.child-menu ul li a:hover {
color: #6bce04;
}
/*note*/
/*Logo Form Freepic*/
</style>
<div class="col-md-3 col-xs-12">
  <div class="nice-nav" style="margin-bottom: 50px;">
    <div class="clear"></div>
    <ul>
      @foreach($categories as $key => $category)
      <li class="child-menu">
        <a href="javascript:void(0);" data-slug={{ $category['slug'] }}><span class="toggle-button">{{ $category['name'] }}</span><span class="fa fa-angle-right toggle-right child-button"></span></a>
        <ul class="child-menu-ul">
          @foreach($category['subcategories'] as $k => $subcategory)
          <li><a href="#" class="catalog-subcategory__change_" data-slug={{ $subcategory['slug'] }}>{{ $subcategory['name'] }}</a></li>
          @endforeach
        </ul>
      </li>
      @endforeach
    </ul>
  </div>
  <div class="filter-block">
    {{--<div class="filter-block-shop filter-price">
      <div class="block-title">
        <h3>FILTRAR POR PRECIO</h3>
      </div>
      <span class="filter-button">
        <a href="shop-list-v2.html#" id="remove_filters">quitar filtros</a>
      </span>
      <div class="block-content">
        <div class="price-range-holder">
          <input type="hidden" name="" id="min_price_" value={{\App\PriceRange::first()->start}}>
          <input type="hidden" name="" id="max_price_" value="{{ \App\PriceRange::first()->end}}">
          <input type="text" class="price-slider" id="price-slider_" value="">
          <span class="min-max">
            Price: {{\App\PriceRange::first()->start}} - {{\App\PriceRange::first()->end}}
          </span>
          <span class="filter-button">
            <a href="shop-list-v2.html#" id="filter_by_price">Filter</a>
          </span>
        </div>
      </div>
    </div> --}}
    {{--
    <div class="filter-block-shop filter-cate">
      <div class="block-title">
        <h3>Categorías</h3>
      </div>
      <div class="body-part"></div>
    </div>
    <div class="filter-block-shop filter-cate">
      <div class="block-title">
        <h3>Categorías</h3>
      </div>
      <div class="block-content">
        <ul>
          @foreach($categories as $key => $category)
          <li class="">
            <a href="" data-slug={{ $category['slug'] }} class="catalog-category__change">{{ $category['name'] }}</a>
            <span class="number">--</span>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
    --}}
    {{--
    <!-- All atributes -->
    <div id="table_category-attribute">
      @foreach($category_attributes as $key => $category_attribute)
      <div class="filter-block-shop">
        <div class="block-title">
          <h3>{{ $category_attribute['name'] }}</h3>
        </div>
        <div class="block-content">
          <form>
            @foreach($category_attribute['attributes_relationship'] as $i => $attribute)
            <div class="checkbox">
              <label>
                <input type="checkbox" data-slug={{ $attribute['slug'] }} value="" class="catalog-brand__change">{{ $attribute['name'] }}</label>
              </div>
              @endforeach
            </form>
          </div>
        </div>
        @endforeach
    </div>
    --}}

    @include('website.catalog.category_attribute_filter')

      {{--
      <div class="filter-block-shop filter-color filter-cate-color">
        <div class="block-title">
          <h3>Color</h3>
        </div>
        <div class="block-content">
          <ul>
            @foreach($colors as $key => $color)
            <li><a href="" data-slug={{ $color['slug'] }} value="" class="catalog-color__change"><i class=""></i>{{ $color['name'] }} </a></li>
            @endforeach
          </ul>
        </div>
      </div> --}}
    </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function() {
  //menu left toggle
  $('.toggle-nav').click(function() {
  // alert('done');
  $this = $(this);
  $nav = $('.nice-nav');
  //$nav.fadeToggle("fast", function() {
  //  $nav.slideLeft('250');
  //  });
  $nav.toggleClass('open');
  });
  $('.body-part').click(function(){
  $nav.addClass('open');
  });
  //  $nav.addClass('open');
  //drop down menu
  $submenu = $('.child-menu-ul');
  $('.child-menu .toggle-button').on('click', function(e) {
  e.preventDefault();
  $this = $(this);
  $parent = $this.parent().next();
  // $parent.addClass('active');
  $tar = $('.child-menu-ul');
  if (!$parent.hasClass('active')) {
  $tar.removeClass('active').slideUp('fast');
  $parent.addClass('active').slideDown('fast');
  } else {
  $parent.removeClass('active').slideUp('fast');
  }
  });
  });
  </script>
