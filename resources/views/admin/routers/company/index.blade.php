<style type="text/css">

  .nav>li>a {
    position: relative;
    display: block;
    padding: 10px 12px !important;
}
</style>
@extends('admin.layouts.index') @section('content')
<div class="col-md-12 u-px0 u-bg-white u-shadow-bottom">

  <ul class="col-md-12 nav nav-tabs ul-edit u-pr0">

    @if(in_array('ver-modulo-de-configuracion', $permissions_array))
    <!--li>
      <a  class="click_menu" href="#tab-setting" id="setting_button" data-toggle="tab">Configuración</a>
    </li-->
    @endif

    @if(in_array('ver-modulo-de-portadas', $permissions_array))
        <li>
          <a  class="click_menu" href="#tab-campaigns" data-toggle="tab">Portadas</a>
        </li>
    @endif


    @if(in_array('ver-modulo-datos-generales', $permissions_array))
    <!--li class="active">
      <a href="#tab-info" data-toggle="tab">Mi Empresa</a>
    </li-->
    <li class="active">

          <a href=""  data-toggle="dropdown" data-hover="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">Mi Empresa</a>

        <ul class="dropdown-menu dropdown-user pull-right">
          <li class="company_menu active">
            <a href="#tab-info" data-toggle="tab">Datos generales</a>
          </li>
          @if(in_array('ver-modulo-de-fotos-y-videos', $permissions_array))
          <li class="gallery_menu">
            <a href="#tab-cover" data-toggle="tab">Galería</a>
          </li>
          @endif
          <li class="agreetments_menu">
          <!--a   href="#tab-agreetments" data-toggle="tab">Aliados</a-->
        </li>
        @if(in_array('ver-modulo-de-beneficios', $permissions_array))
          <li class="values_menu">
            <!--a   href="#tab-values" data-toggle="tab">Valores Corporativos</a-->
          </li>
          @endif

        </ul>
      </li>
    @endif


    @if(in_array('ver-modulo-de-usuarios', $permissions_array))
    <li>
      <a  class="click_menu" href="#tab-users" data-toggle="tab">Usuarios</a>
    </li>
    @endif

    @if(in_array('ver-modulo-de-clientes', $permissions_array))
    <li>
      <a  class="click_menu" href="#tab-customers" data-toggle="tab">Clientes</a>
    </li>
    @endif

    <li>
      <!--a  class="click_menu" href="#tab-coupons" data-toggle="tab">Cupones</a-->
    </li>

    @if(in_array('ver-modulo-de-cuenta', $permissions_array))
    <li>
      <!--a  class="click_menu" href="#tab-account" data-toggle="tab">Cuentas</a-->
    </li>
    @endif

    @if(in_array('ver-modulo-de-servicios', $permissions_array))
    <li>
      <a  class="click_menu" href="#tab-services" data-toggle="tab">Servicios</a>
    </li>
    @endif

    @if(in_array('ver-modulo-de-blog', $permissions_array))
    <li>
      <a  class="click_menu" href="#tab-news" data-toggle="tab">Blog</a>
    </li>
    @endif

    @if(in_array('ver-modulo-de-catalogo', $permissions_array))
    <li>
      <a  class="click_menu" href="#tab-catalogs" data-toggle="tab">Libros</a>
    </li>
    @endif

    <li style="display:none">
      <a href="#tab-notices" data-toggle="tab">Comunicados</a>
    </li>

   {{--@if(in_array('ver-modulo-de-fotos-y-videos', $permissions_array))
    <li>
      <a  class="click_menu" href="#tab-cover" data-toggle="tab">Galería</a>
    </li>
    @endif--}}

    @if(in_array('ver-modulo-de-tiendas', $permissions_array))
    <li>
      <!--a  class="click_menu" href="#tab-stores" data-toggle="tab">Tiendas</a-->
    </li>
    @endif

    <li style="display:none">
        <a  class="click_menu" href="#tab-testimonies" data-toggle="tab">Testimonios</a>
    </li>

    <li style="display:none">
        <a  class="click_menu" href="#tab-staff" data-toggle="tab">Staff</a>
    </li>

    <li style="display:none">
      <a  class="click_menu" href="#tab-gallery" data-toggle="tab">Galería</a>
    </li>
  </ul>
</div>

<div class="tab-content u-px0">
  <div id="tab-cover" class="tab-pane">
    @include('admin.routers.company.cover')
  </div>

  <div id="tab-users" class="tab-pane fade">
    @include('admin.routers.company.users')
  </div>

  @if(in_array('ver-modulo-datos-generales', $permissions_array))
  <div id="tab-info" class="tab-pane fade fade in active">
    @include('admin.routers.company.info')
  </div>
  @endif

  <div id="tab-services" class="tab-pane fade ">
    @include('admin.routers.company.services')
  </div>

  <div id="tab-customers" class="tab-pane fade">
    @include('admin.routers.company.customers')
  </div>

  <div id="tab-coupons" class="tab-pane fade">
    @include('admin.routers.company.coupons')
  </div>

  <div id="tab-news" class="tab-pane fade ">
    @include('admin.routers.company.news')
  </div>

  <div id="tab-account" class="tab-pane fade ">
    @include('admin.routers.company.account')
  </div>

  <div id="tab-values" class="tab-pane fade ">
    @include('admin.routers.company.values')
  </div>

  <div id="tab-campaigns" class="tab-pane fade ">
    @include('admin.routers.company.campaigns')
  </div>

  <div id="tab-catalogs" class="tab-pane fade ">
    @include('admin.routers.company.catalogs')
  </div>

  @if(in_array('ver-modulo-de-tiendas', $permissions_array))
  <div id="tab-stores" class="tab-pane fade ">
    @include('admin.routers.company.stores')
  </div>
  @endif

  <div id="tab-testimonies" class="tab-pane fade ">
      @include('admin.routers.company.testimonies')
  </div>

  <div id="tab-staff" class="tab-pane fade ">
      @include('admin.routers.company.staff')
  </div>


  @if(in_array('ver-modulo-de-configuracion', $permissions_array))
  <div id="tab-setting" class="tab-pane fade ">
    @include('admin.routers.company.setting')
  </div>
  @endif

  <div id="tab-notices" class="tab-pane fade ">
    @include('admin.routers.company.notices')
  </div>

  <div id="tab-agreetments" class="tab-pane fade ">
    @include('admin.routers.company.agreetments')
  </div>

  <div id="tab-gallery" class="tab-pane fade ">
    @include('admin.routers.company.gallery')
  </div>

</div>
@include('admin.modals.company.stores')
@include('admin.modals.company.news.new_category')
@include('admin.modals.company.news.new_etiquette')
@include('admin.modals.company.news.new_place')
@include('admin.modals.company.news.new_logistic')
@include('admin.modals.company.news.new_detail_costo')
@include('admin.modals.company.news.new_agreetments')
@include('admin.modals.company.news.new_gallery')

@include('admin.modals.company.news.new_attribute')
@include('admin.modals.company.news.new_company_category')
@include('admin.modals.company.video')
@include('admin.modals.company.account')
@include('admin.modals.company.services')
@include('admin.modals.company.news')
@include('admin.modals.company.news.news_images')
@include('admin.modals.company.customer')
@include('admin.modals.company.news.new_coupons')
@include('admin.modals.company.user')
@include('admin.modals.company.value')
@include('admin.modals.company.campaign')
@include('admin.modals.company.catalog')
@include('admin.modals.company.testimony')
@include('admin.modals.company.staff')

@include('admin.modals.company.notice')

@endsection

@section('scripts') {{-- Company --}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5DgtOXdGEIDFUDkT9jK_EfN-UJIElU_0&libraries=places"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.min.js"></script>

<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Company/actions.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Company/scripts/loadCompany.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Company/scripts/loadCompanyVideos.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Company/scripts/loadCompanyImages.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Company/scripts/saveCompanyInfo.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Company/scripts/saveCompanySlogan.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Company/scripts/saveCompanyVideo.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Company/scripts/getVideoToEdit.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Company/scripts/updateCompanyVideo.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Company/scripts/deleteCover.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Company/scripts/deleteVideo.js') }}"></script>

{{-- Services --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Services/scripts/loadGridServices.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Services/actions.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Services/scripts/getServiceToEdit.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Services/scripts/saveService.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Services/scripts/updateService.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Services/scripts/deleteService.js') }}"></script>

{{-- Accounts --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Accounts/accounts.js') }}"></script>

{{-- Campaigns --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/campaigns.js') }}"></script>

{{-- Posts --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Posts/posts.js') }}"></script>

{{-- Users --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Users/scripts/loadGridUsers.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Users/scripts/deleteUser.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Users/scripts/getUserToEdit.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Users/scripts/saveUser.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Users/scripts/updateUser.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Users/scripts/suspendUser.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Users/scripts/activateUser.js') }}"></script>

{{-- Values --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Values/actions.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Values/scripts/loadGridValues.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Values/scripts/getValueToEdit.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Values/scripts/saveValue.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Values/scripts/updateValue.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Values/scripts/deleteValue.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Values/scripts/updateStatusPublishedValue.js') }}"></script>

{{-- Catalogs --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/catalogs.js') }}"></script>

{{-- Category-attributes --}}
<script type="text/javascript" src="{{ URL::asset('website/js/settings.js') }}"></script>

{{-- New Customers features --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/customers.js') }}"></script>

{{-- Stores --}}
<script type="text/javascript" src="{{ URL::asset('website/js/stores.js') }}"></script>

{{-- Testimonios --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Testimonies/actions.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Testimonies/scripts/loadGridTestimonies.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Testimonies/scripts/getTestimonyToEdit.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Testimonies/scripts/saveTestimony.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Testimonies/scripts/updateTestimony.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Testimonies/scripts/changePublishTestimony.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Testimonies/scripts/deleteTestimony.js') }}"></script>

{{-- Staff --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/staff.js') }}"></script>

{{-- Places --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/setting_places.js') }}"></script>

{{-- Logistics --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/setting_logistics.js') }}"></script>

{{-- Costs --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/setting_costs.js') }}"></script>

{{-- Coupons --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/coupons.js') }}"></script>

{{-- Agreetments --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Agreetments/scripts/loadGridAgreetments.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Agreetments/actions.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Agreetments/scripts/getAgreetmentToEdit.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Agreetments/scripts/saveAgreetment.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Agreetments/scripts/updateAgreetment.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Agreetments/scripts/deleteAgreetment.js') }}"></script>

{{-- Gallery --}}

<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Gallery/scripts/galleries.js') }}"></script>

{{-- Notices --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/notices.js') }}"></script>

{{-- Etiquettes --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/etiquettes.js') }}"></script>

<script>
  startNotices();
</script>

<script type="text/javascript">

$('.company_menu').on('click', function () {
$('.gallery_menu').removeClass('active');
$('.agreetments_menu').removeClass('active');
$('.values_menu').removeClass('active');


});

$('.gallery_menu').on('click', function () {
$('.company_menu').removeClass('active');
$('.agreetments_menu').removeClass('active');
$('.values_menu').removeClass('active');
});

$('.agreetments_menu').on('click', function () {
$('.company_menu').removeClass('active');
$('.gallery_menu').removeClass('active');
$('.values_menu').removeClass('active');
});

$('.values_menu').on('click', function () {
$('.company_menu').removeClass('active');
$('.gallery_menu').removeClass('active');
$('.agreetments_menu').removeClass('active');
});


$('.click_menu').on('click', function () {
$('.company_menu').removeClass('active');
$('.gallery_menu').removeClass('active');
$('.values_menu').removeClass('active');
$('.agreetments_menu').removeClass('active');
});

</script>
@endsection

@section('styles')
@endsection
