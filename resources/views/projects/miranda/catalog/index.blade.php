@extends('miranda.layouts.index')
@section('content')
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
height: 100%;
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
padding: 12px;
/* background: #FA7252; */
border-bottom: 1px solid #ddd;
display: block;
color: #333;
position: relative;
text-transform: uppercase;
font: 700 16px/36px "Poppins", sans-serif;
}
.nice-nav ul li.child-menu ul {
/* background: #aaa; */
display: none;
}
.nice-nav ul li.child-menu ul li a {
/* background: #273135; */
padding: 10px 20px;
color: #767676;
font: 13px/32px "Open Sans", sans-serif;
text-transform: lowercase;
font-weight: 400;
}
.nice-nav ul li.child-menu ul li a:hover {
color: #6bce04;
}

.property-desc-top h4.price {
    top: 38%;
}

/*Logo Form Freepic*/
/*Logo Form Freepic*/
</style>
  <!--Breadcrumbs start-->
  <div class="breadcrumbs overlay-black">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="breadcrumbs-inner">
                      <div class="breadcrumbs-title text-center" >
                        <h1>Todo lo inmobiliarios en un solo lugar</h1>
                      </div>
                      <div class="breadcrumbs-menu sm-none"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--Breadcrumbs end-->

  <!--Feature property section-->
  <div class="feature-property pt-50">
      <div class="container">
          <div class="row">
            <!--List catalog section -->
            <!-- <div id="table_data_product"> -->
            <div class="col-lg-8 col-12 order-lg-2" id="table_data_product">
              @include('miranda.catalog.1_list')
            </div>
            <!--Feature catalog section -->
            <div class="col-lg-4 col-md-6 col-12 order-lg-1 sm-none">
              @include('miranda.catalog.2_feature')
            </div>
          </div>
      </div>
  </div>
  <!--Feature property section end-->
  @include('miranda.catalog.3_contact')
  {{--@include('miranda.catalog.4_contact')--}}
@stop
@section('css')
<link rel="stylesheet" href="/website/css/bootstrap-slider.css">
@stop
@section('plugins-js')
@stop
