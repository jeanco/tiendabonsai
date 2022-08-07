@extends('admin.layouts.index')

@section('content')
  <div class="tab-content">
    <div id="tab-company" class="tab-pane fade ">
      @include('admin.pages.company.index')
    </div>

    <div id="tab-item" class="tab-pane fade in active">
      @include('admin.pages.items')
    </div>
  </div>
@endsection


@section('scripts')

{{-- Plugins --}}

{{-- Select2 --}}
<script type="text/javascript" src="{{ URL::asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>

{{-- Dropzone --}}
<script type="text/javascript" src="{{ URL::asset('admin/plugins/dropzone/dropzone.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Dropzone/my-dropzone.js') }}"></script>

{{-- Jquery BlockUI --}}
<script type="text/javascript" src="http://malsup.github.io/jquery.blockUI.js"></script>

{{-- Funciones generales --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/custom-app.js') }}"></script>

{{-- Company --}}
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


{{-- Categorias --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Categories/actions.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Categories/scripts/loadCategories.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Categories/scripts/loadFirstCategory.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Categories/scripts/loadGridProducts.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Categories/scripts/getCategoryToEdit.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Categories/scripts/saveCategory.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Categories/scripts/updateCategory.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Categories/scripts/deleteCategory.js') }}"></script>

{{-- Subcategories --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Categories/scripts/loadFirstSubcategory.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Subcategories/actions.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Subcategories/scripts/getSubcategoryToEdit.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Subcategories/scripts/saveSubcategory.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Subcategories/scripts/updateSubcategory.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Subcategories/scripts/deleteSubcategory.js') }}"></script>


{{-- Accounts --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Accounts/actions.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Accounts/scripts/saveAccount.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Accounts/scripts/updateAccount.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Accounts/scripts/loadGridAccounts.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Accounts/scripts/getAccountToEdit.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Accounts/scripts/deleteAccount.js') }}"></script>


{{-- Users --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Users/actions.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Users/scripts/userProfileEdit.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Users/scripts/userProfileSave.js') }}"></script>


{{-- Services --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Services/scripts/loadGridServices.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Services/actions.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Services/scripts/getServiceToEdit.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Services/scripts/saveService.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Services/scripts/updateService.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Services/scripts/deleteService.js') }}"></script>

{{-- Ajax --}}
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/ajax.js') }}"></script>

@stop
