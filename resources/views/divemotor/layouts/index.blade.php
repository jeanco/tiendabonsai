<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/miranda/img/apple-touch-icon.png">
    <title>Divemotor</title>
    <!-- Popup CSS -->
    <link href="/divemotor/assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/divemotor/dist/css/style.min.css" rel="stylesheet">
    <!-- page css -->
    <link href="/divemotor/dist/css/pages/user-card.css" rel="stylesheet">
    <link href="/divemotor/dist/css/pages/tab-page.css" rel="stylesheet">
    <link href="/divemotor/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/divemotor/assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/divemotor/assets/node_modules/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="/divemotor/assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="/divemotor/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="/divemotor/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="/divemotor/assets/node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="/divemotor/dist/css/pages/error-pages.css" rel="stylesheet">
    <!-- DataTables -->
    <link href="{{ URL::asset('admin/plugins/growl/jquery.growl.css') }}" rel="stylesheet"> {{-- Owl Carousel --}}
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css"> -->
    <!-- Other css -->
    <link rel="stylesheet" href="/divemotor/dist/css/newstyles.css">
    <!-- Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    @yield('plugins-css')
</head>

<body class="horizontal-nav fixed-layout skin-red text-dark">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Divemotor</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        @include('divemotor.layouts.sections.header')
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" style="background: #e6e6e6;">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        @include('divemotor.layouts.sections.footer')
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="/divemotor/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/divemotor/assets/node_modules/popper/popper.min.js"></script>
    <script src="/divemotor/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/divemotor/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="/divemotor/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/divemotor/dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="/divemotor/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="/divemotor/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!-- Datatable -->
    <!-- <script src="/divemotor/assets/node_modules/datatables/jquery.dataTables.min.js"></script> -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <!--Custom JavaScript -->
    {{-- Moment.js --}}
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/moment/moment.js') }}"></script>

    {{-- Axios --}}
    <script type="text/javascript" src="{{ URL::asset('/admin/plugins/axios/axios.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/admin/panel/js/base.js') }}"></script>
    <script src="/divemotor/dist/js/custom.min.js"></script>
    <script src="/divemotor/assets/node_modules/switchery/dist/switchery.min.js"></script>
    <script src="/divemotor/assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/divemotor/assets/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="/divemotor/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="/divemotor/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
    <script src="/divemotor/assets/node_modules/multiselect/js/jquery.multi-select.js" type="text/javascript"></script>

    <script type="text/javascript" src="{{ URL::asset('admin/plugins/growl/jquery.growl.js') }}"></script>
    <script>



    jQuery(document).ready(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ti-plus',
            verticaldownclass: 'ti-minus'
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }
        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();
        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });
        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });
        // For multiselect
        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });
        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });
        $(".ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            // templateResult: formatRepo, // omitted for brevity, see the source of this page
            //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });
    });
    </script>
    <!-- Magnific popup JavaScript -->
    <script src="/divemotor/assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="/divemotor/assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>

    <!-- Other JS -->

    @yield('plugins-js')
</body>

</html>
