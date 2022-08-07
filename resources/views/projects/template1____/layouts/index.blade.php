<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Metas -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="LionCoders" />
    <!-- Links -->
    <link rel="icon" type="/antofagasta/images/png" href="home-v1.html#" />
    <!-- google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <!-- Plugins CSS -->
    <link href="/antofagasta/css/plugin.css" rel="stylesheet" />
    <!-- style CSS -->
    <link href="/antofagasta/css/style.css" rel="stylesheet" />
    <!-- Document Title -->
    <title>SarchHolm - Real Estate HTML Template</title>
</head>

<body>
    <!--Preloader starts-->
    <div class="preloader js-preloader">
        <img src="/antofagasta/images/preloader.gif" alt="...">
    </div>
    <!--Preloader ends-->
    <!--Page Wrapper starts-->
    <div class="page-wrapper">
        <!--header starts-->
        @include('template1.layouts.sections.header')
        <!--content starts-->
        @yield('content')
        <!-- Scroll to top starts-->
        <span class="scrolltotop"><i class="lnr lnr-arrow-up"></i></span>
        <!-- Scroll to top ends-->
    </div>
    <!--Page Wrapper ends-->
    <!--Footer Starts-->
    @include('template1.layouts.sections.footer')

    <!--login Modal starts-->
    <div class="modal fade" id="user-login-popup">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="lnr lnr-cross"></i></span></button>
                </div>
                <div class="modal-body">
                    <!--User Login section starts-->
                    <div class="user-login-section">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="ui-list nav nav-tabs mb-30" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="home-v1.html#login" role="tab" aria-selected="true">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="home-v1.html#register" role="tab" aria-selected="false">Register</a>
                                        </li>
                                    </ul>
                                    <div class="login-wrapper">
                                        <div class="ui-dash tab-content">
                                            <div class="tab-pane fade show active" id="login" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <form id="login-form" action="home-v1.html#" method="post">
                                                            <div class="form-group">
                                                                <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="email" value="" required="">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                                            </div>
                                                            <div class="row mt-20">
                                                                <div class="col-md-6 col-12 text-left">
                                                                    <div class="res-box">
                                                                        <input id="check-l" type="checkbox" name="check">
                                                                        <label for="check-l">Remember me</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12 text-right">
                                                                    <div class="res-box sm-left">
                                                                        <a href="home-v1.html#" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="res-box text-center mt-30">
                                                                <button type="submit" class="btn v8"><span class="lnr lnr-exit"></span> Log In</button>
                                                            </div>
                                                        </form>
                                                        <div class="social-profile-login  text-left mt-20">
                                                            <h5>or Login with</h5>
                                                            <ul class="social-btn">
                                                                <li class="bg-fb"><a href="home-v1.html#"><i class="fab fa-facebook-f"></i></a></li>
                                                                <li class="bg-tt"><a href="home-v1.html#"><i class="fab fa-twitter"></i></a></li>
                                                                <li class="bg-ig"><a href="home-v1.html#"><i class="fab fa-instagram"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="signup-wrapper">
                                                            <img src="/antofagasta/images/others/login-1.png" alt="...">
                                                            <p>Welcome Back! Please Login to your Account for latest property listings.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="register" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <form id="register-form" action="home-v1.html#" method="post">
                                                            <div class="form-group">
                                                                <input type="text" name="user_name" id="user_name" tabindex="1" class="form-control" placeholder="Username" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" name="user_password" id="user_password" tabindex="2" class="form-control" placeholder="Password">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                                            </div>
                                                            <div class="res-box text-left">
                                                                <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                                                <label for="remember">I've read and accept terms &amp; conditions</label>
                                                            </div>
                                                            <div class="res-box text-center mt-30">
                                                                <button type="submit" class="btn v8"><i class="lnr lnr-enter"></i>Sign Up</button>
                                                            </div>
                                                        </form>
                                                        <div class="social-profile-login  text-left mt-20">
                                                            <h5>or Sign Up with</h5>
                                                            <ul class="social-btn">
                                                                <li class="bg-fb"><a href="home-v1.html#"><i class="fab fa-facebook-f"></i></a></li>
                                                                <li class="bg-tt"><a href="home-v1.html#"><i class="fab fa-twitter"></i></a></li>
                                                                <li class="bg-ig"><a href="home-v1.html#"><i class="fab fa-instagram"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="signup-wrapper">
                                                            <img src="/antofagasta/images/others/login-1.png" alt="...">
                                                            <p>Create an account to find the best Property for you.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--User login section ends-->
                </div>
            </div>
        </div>
    </div>
    <!--login Modal ends-->
    <!--Scripts starts-->
    <!--plugin js-->
    <script src="/antofagasta/js/plugin.js"></script>
    <!--google maps-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_8C7p0Ws2gUu7wo0b6pK9Qu7LuzX2iWY&amp;libraries=places&amp;callback=initAutocomplete"></script>
    <!--Main js-->
    <script src="/antofagasta/js/main.js"></script>
    @yield('plugins-js')
    <!--Scripts ends-->
</body>

</html>
