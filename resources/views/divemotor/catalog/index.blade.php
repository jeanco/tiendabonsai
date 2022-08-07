@extends('divemotor.layouts.index')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-md-3 col-xs-12">
        <div class="mt-4 mb-4 text-themecolor font-bold" style="font-size: 20px;">Selecciona tu Categoría</div>
        <div class="card">
            <div class="card-body">
                <!--  -->
                <div class="accordion" id="accordionExample">
                  @foreach ($categories as $key =>  $category)
                    <div class="card" style="margin-bottom: 0px;">
                      <div class="card-header" id="head{{ $category['id'] }}">

                          <button class="btn btn-cat collapsed btn-block" type="button" data-toggle="collapse" data-target="#menu{{ $category['id'] }}" aria-expanded="false" aria-controls="menu{{ $category['id'] }}">
                            <i class="fas fa-angle-down"></i>&emsp;{{ $category['name'] }}
                          </button>

                      </div>
                      <div id="menu{{ $category['id'] }}" class="collapse" aria-labelledby="head{{ $category['id'] }}" data-parent="#accordionExample">
                        <div class="card-body" style="padding: 5px 0px;">
                          <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            @foreach ($category['subcategories'] as $k =>  $subcategory)
                              <a class="catalog-subcategory__change-divemotor nav-link btn-subcat" data-toggle="pill" data-subcategory_name={{$subcategory['name']}} data-category_name={{ $category['name'] }} data-subcategory_slug={{ $subcategory['slug']  }} data-category_slug={{ $category['slug'] }} href="javascript:void(0)">
                                <i class="fas fa-angle-right"></i>&emsp;{{ $subcategory['name'] }}
                              </a>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
                <!--  -->
                <div class="mt-4 mb-4 input-group">
                  <select name="" id="home-search_category" class="d-none">
                    <option data-slug="" value="" selected=selected></option>
                  </select>

                  <input type="text" class="form-control" id="home-search_text" placeholder="Buscar producto..." aria-label="" aria-describedby="basic-addon1">
                  <div class="input-group-append">
                      <button class="btn btn-info" id="home-search__go" type="button"><i class="fas fa-search"></i></button>
                  </div>
                </div>



            </div>
        </div>
    </div>
    <div class="col-md-9 col-xs-12">
        <div class="row mb-4 mt-4 align-items-center">
            <div class="col-md-9 col-xs-12 text-center text-themecolor font-bold" style="font-size: 20px;">Soluciones de seguridad Vehicular</div>
            <div class="col-md-3 col-xs-12 font-light text-right">
              <a href="#" id="catalog_category-name">-</a>&nbsp;/&nbsp;<a href="#" id="catalog_subcategory-name">-</a>
            </div>
        </div>
        <!-- ============================================================== -->
        <div class="" id="table_data">
            @include('divemotor.catalog.3_right_catalog')
        </div>

      {{-- <H1>{{ isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : '' }}</H1> --}}

        <!-- ============================================================== -->
        {{-- <div class="card card-catalog">
            <div class="card-body">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-4 col-xs-12 el-element-overlay">
                      <div class="el-card-item" style="padding-bottom: 0px;">
                          <div class="el-card-avatar el-overlay-1" style="margin-bottom: 0px; border-radius: 15px;">
                              <a href="/catalogo-perfil"><img src="/divemotor/assets/images/big/img3.png" alt="user" style="width: 100%; border-radius: 15px;"/></a>
                              <div class="el-overlay" style="border-radius: 15px;">
                                  <div class="row align-items-center" style="height: 100%;">
                                    <div class="col-12 text-center"><button type="button" class="btn btn-sm btn-success">Elegir Producto</button></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-5 col-xs-12">
                      <a href="/catalogo-perfil"><h4 class="card-title">Soluciones para buses y microbuses interprovinciales</h4></a>

                      <div class="text-justify">
                        Lorem ipsum dolor sit amet. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                      </div>
                    </div>
                    <div class="col-md-2 col-xs-12">
                      <a href="javascript:void(0)" class="btn btn-info btn-block text-left"><i class="fas fa-file-upload fa-lg"></i>&emsp;Brochure</a>
                      <a href="javascript:void(0)" class="btn btn-info btn-block text-left"><i class="fas fa-file-alt fa-lg"></i>&emsp;Ficha Técnica</a>
                      <a href="javascript:void(0)" class="btn btn-info btn-block text-left" data-toggle="modal" data-target="#video-modal"><i class="fab fa-youtube-square fa-lg"></i>&emsp;Ver Video</a>
                      <hr>
                      Compartir:&emsp;
                      <button class="btn btn-facebook btn-circle" type="button">  <i class="fab fa-facebook-f"></i>  </button>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- ============================================================== -->
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
@include('divemotor.catalog.perfil.1_video')
@stop

@section('plugins-css')
<style type="text/css">
.nav-side-menu {
  background: #fff;
  overflow: auto;
  font-size: 18px;
  font-weight: 400;
  color: #1b1b1b;
}
.nav-side-menu ul,
.nav-side-menu li {
  list-style: none;
  padding: 0px;
  margin: 0px;
  line-height: 35px;
  cursor: pointer;
}
.nav-side-menu ul .active,
.nav-side-menu li .active {
  /* border-left: 1px solid #74777c; */
  background: #255378;
}

.nav-side-menu ul .sub-menu li.active,
.nav-side-menu li .sub-menu li.active {
  /* color: #d19b3d; */
  background-color: #009efb;
}
.nav-side-menu ul .sub-menu li.active a,
.nav-side-menu li .sub-menu li.active a {
  color: #fff;
}
.nav-side-menu ul .sub-menu li,
.nav-side-menu li .sub-menu li {
  background-color: #f3f5f6;
  border: none;
  line-height: 28px;
  /* border-bottom:1px solid #b2ddf7; */
}
.nav-side-menu ul .sub-menu li:hover,
.nav-side-menu li .sub-menu li:hover {
  background-color: #009efb;
}
.nav-side-menu ul .sub-menu li:before,
.nav-side-menu li .sub-menu li:before {
  font-family: FontAwesome;
  content: "\f105";
  display: inline-block;
  padding-left: 10px;
  padding-right: 10px;
  vertical-align: middle;
}
.nav-side-menu li {
  padding-left: 0px;
  /* border-left: 1px solid #FFF;
  border-bottom: 1px solid #f6f6f6; */
  border-radius: 10px;
  padding: 10px;
}
.nav-side-menu li:hover {
  background:#949494;
}
.nav-side-menu li a {
  text-decoration: none;
  color: #515151;
  /* padding: 15px 10px 15px 20px; */
}
.nav-side-menu li.active a {
  color: #fff;
}
.nav-side-menu li:hover a {
  color: #fff;
}
.nav-side-menu li a i {
  padding-left: 10px;
  width: 20px;
  padding-right: 30px;
}
.nav-side-menu li:hover {
  /* border-left: 1px solid #FFF;
  background-color: #333; */
  -webkit-transition: all 0.3s ease;
  -moz-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  -ms-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
@media (max-width: 767px) {
  .nav-side-menu {
    position: relative;
    width: 100%;
    margin-bottom: 10px;
  }
  .nav-side-menu .toggle-btn {
    display: block;
    cursor: pointer;
    position: absolute;
    right: 10px;
    top: 10px;
    z-index: 10 !important;
    padding: 3px;
    background-color: #ffffff;
    color: #000;
    width: 40px;
    text-align: center;
  }
  .brand {
    text-align: left !important;
    font-size: 22px;
    padding-left: 20px;
    line-height: 50px !important;
  }
}
@media (min-width: 767px) {
  .nav-side-menu .menu-list .menu-content {display: block;}
}
.sidebar-footer {
    background: #fbfbfb;
    position: fixed;
    width: 100%;
    bottom: 0;
    padding: 10px 0px 10px 0px;
    transition: all .6s ease 0s;
}
.sidebar-footer a {
  color: rgba(0, 0, 0, 0.4);
  transition: 0.3s;
  text-decoration: none;
}
.sidebar-footer a:hover {
  color: #333;
  transition: 0.3s;
}
.sidebar-footer span {
  padding-left: 1px;
  font-size: 12px;
  color: rgba(0, 0, 0, 0.8);
}
.sidebar-footer--aboutdev {font-size: 11px !important;}
.sidebar-footer--aboutdev-bullet {
  color: rgba(0, 0, 0, 0.2) !important;
  font-size: 9px !important;
  padding-left: 3px;
  padding-right: 3px;
}
[class^=ti-] {line-height: unset;}
</style>
@stop
@section('plugins-js')
  <script src="/website/js/catalog.js"></script>
  <script src="/divemotor/js/cart.js"></script>
  <script src="/divemotor/js/accordion.js"></script>
  <script src="divemotor/js/catalog.js"></script>
@stop
