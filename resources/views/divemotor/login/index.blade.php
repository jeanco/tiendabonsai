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
    <!-- page css -->
    <link href="/divemotor/dist/css/pages/login-register-lock.css" rel="stylesheet">
    <link href="/divemotor/assets/node_modules/prism/prism.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/divemotor/dist/css/style.min.css" rel="stylesheet">
</head>

<body class="horizontal-nav ">
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
    <section id="wrapper" class="login-register login-sidebar pt-0 pb-0">
        <div class="row">
          <div class="col-md-4 col-xs-12">
            <div class="login-box card" style="right: auto; width: 100%; background: #0f1a23;">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="my_form_login" method="POST" action="/login-from-landing-divemotor">
                        {{ csrf_field() }}
                        <a href="javascript:void(0)" class="text-center db">
                          <img src="/divemotor/assets/images/logo-blanco.png" alt="Home"  style="padding-top: 100px; text-align: center; display: flex; margin: 0 auto; width: 250px; margin-bottom: 52px;" />
                        </a>
                        <h4 class="text-center">La mejor forma de brindar seguridad</h4>
                        <div class="form-group m-t-40">
                            <div class="col-xs-12">
                                <input name="username" class="form-control login username-field" id="username" type="text" required="" placeholder="Documento de identidad" style="padding: 10px">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input name="password" class="form-control login password-field" id="password" type="password" required="" placeholder="Contraseña" style="padding: 10px">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input field login-checkbox" id="remember" name="remember">
                                    <label class="custom-control-label" for="remember">Recordar contraseña</label>
                                    <!-- <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <a href="#" onclick="document.getElementById('my_form_login').submit()" class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit" style="background-color: #253b58; ">Ingresar</a>
                            </div>
                        </div>

                        <div class="text-center">
                          <img src="https://dl.dropboxusercontent.com/s/3n9tkauetvph078/1525266310-1525266310.png?dl=0" alt="" width="150">
                        </div>
                        <!--div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                                <div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="twit"></i> </a> </div>
                            </div>
                        </div -->
                        <!--div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                Don't have an account? <a href="pages-register2.html" class="text-primary m-l-5"><b>Sign Up</b></a>
                            </div>
                        </div-->
                    </form>
                    <form class="form-horizontal" id="recoverform" action="index.html">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
          <div class="col-md-8 col-xs-12">
            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($campaigns as $key => $campaign)
                        <li data-target="#carouselExampleIndicators2" data-slide-to="{{ $key }}" class="{{ ($key==0) ? 'active' : '' }}"></li>
                    @endforeach
                    {{-- <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators2" data-slide-to="3"></li> --}}
                </ol>
                <div class="carousel-inner" role="listbox">
                    @foreach ($campaigns as $key => $campaign)

                        @if ($key == 0)
                        <div class="carousel-item active">
                        <img class="img-responsive alto" src="{{ $campaign->image }}" alt="A slide" style="width: 100%;">
                            </div>
                        @else
                        <div class="carousel-item">
                            <img class="img-responsive alto" src="{{ $campaign->image }}" alt="A slide">
                        </div>
                        @endif
                        {{-- <div class="carousel-item active">
                        <img class="img-responsive alto" src="/divemotor/assets/images/big/img3.png" alt="First slide" style="width: 100%;">
                        </div> --}}
                    @endforeach

                    {{-- <div class="carousel-item">
                        <img class="img-responsive alto" src="/divemotor/assets/images/big/img4.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="img-responsive alto" src="/divemotor/assets/images/big/img4.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="img-responsive alto" src="/divemotor/assets/images/big/img5.png" alt="Third slide">
                    </div> --}}
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
          </div>
        </div>


    </section>
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
    <!--Custom JavaScript -->
    <script type="text/javascript">
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
          var height = $(window).height();
          $('.alto').height(height);
    });
    </script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/divemotor/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="/divemotor/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/divemotor/dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="/divemotor/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="/divemotor/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="/divemotor/dist/js/custom.min.js"></script>
    <script src="/divemotor/assets/node_modules/prism/prism.js"></script>
</body>

</html>
