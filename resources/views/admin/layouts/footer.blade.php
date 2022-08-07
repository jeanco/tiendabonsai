<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>FrenchCompany</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.11/css/dataTables.bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/all.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}" >
    <link href="{{ asset('admin/css/style-responsive.css')}}" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!-- Notificaciones Animadas-->
    <link rel="stylesheet"  href="{{ URL::asset('assets/vendors/jquery-toastr/toastr.min.css') }}">
  </head>
  <body>
    @include('admin.layouts.header')
    <div id="wrapper " style="height: auto !important">
      @include('admin.layouts.sidebar')
      <div id="page-wrapper">
        <div class="page-content">
          <div class="panel">
            <div class="row">
              @yield('content')
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="footer">
      <div class="copyright">{{ strftime("%Y") }} Copyright © Ysamar</div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.4.1/jquery-migrate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.7/jquery.slimscroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.11/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-hover-dropdown/2.2.1/bootstrap-hover-dropdown.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.es.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/i18n/defaults-es_CL.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.responsive-tabs/1.6.0/jquery.responsiveTabs.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.5.2/metisMenu.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script src="{{ asset('admin/js/jquery.menu.js')}}"></script>
    <script src="{{ asset('admin/js/main.js')}}"></script>
    @yield('script')
    <!--Notificaciones Animadas-->
    <script src="{{ URL::asset('assets/vendors/jquery-toastr/toastr.min.js') }}"></script>
  </body>
</html>
