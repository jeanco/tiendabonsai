<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('/catalogo') }}">
                <!-- Logo icon -->
                <b>
                    <!-- Dark Logo icon -->
                    <img src="/divemotor/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="/divemotor/assets/images/logo-blanco.png" alt="homepage" width="130px" class="light-logo" />
                </b>
                <!--End Logo icon -->
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto">
                <!-- This is  -->
                <li class="nav-item d-sm-none"> <a class="nav-link nav-toggler waves-effect waves-light" href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="pages-blank.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-shopping-cart"></i>
                        <div class="notify d-none">
                            <span class="heartbit"></span>
                            <span class="point"></span>
                        </div>
                    </a>
                    <div class="dropdown-menu mailbox animated bounceInDown">
                        <span class="with-arrow"><span class="bg-primary"></span></span>
                        <ul>
                            <li>
                                <div class="drop-title bg-primary text-white">
                                    <h4 class="m-b-0 m-t-5">4 Items</h4>
                                    <span class="font-light">Agregados</span>
                                </div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <!-- Message -->
                                    <a href="javascript:void(0)">
                                        <div class="user-img"> <img src="/images/item1.jpg" alt="user" class="img-circle"> </div>
                                        <div class="mail-contnet">
                                            <h5>Xiaomi Redmi Note 7 4GB/64GB</h5>
                                            <span class="mail-desc">x 1&emsp;S/. 670</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)">
                                        <div class="user-img"> <img src="/images/item2.jpg" alt="user" class="img-circle"> </div>
                                        <div class="mail-contnet">
                                            <h5>ASUS Gaming Laptop i7 ROG 17.5"</h5>
                                            <span class="mail-desc">x 1&emsp;S/. 3500</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center m-b-5" href="{{ URL::to('/dive-carrito') }}"> <strong>Realizar cotización</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                <!-- ============================================================== -->
                <!-- End Comment -->
                <!-- ============================================================== -->
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item">
                  <a class="nav-link btn btn-info" href="{{ URL::to('/orden') }}" style="border-radius: 0px;"><i class="ti-receipt"></i> <span class="hidden-xs-down" style="font-size: 16px;">Generar cotización</span> </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link waves-effect waves-dark" href="{{ URL::to('/mi-cotizacion') }}"><i class="ti-layout-width-default"></i> <span class="hidden-xs-down" style="font-size: 16px;">Mis cotizaciones</span> </a>
                </li>
                <!-- Otros menus -->
                <li class="nav-item">
                  <a class="nav-link waves-effect waves-dark" href="{{ URL::to('/preguntas') }}"><i class="ti-help-alt"></i> <span class="hidden-xs-down" style="font-size: 16px;">Preguntas frecuentes</span> </a>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="pages-blank.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ Auth::user()->user_image_thumb }}" alt="user" class="img-circle" width="30"></a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <span class="with-arrow"><span class="bg-primary"></span></span>
                        <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                            <div class=""><img src="{{ Auth::user()->user_image_thumb }}" alt="user" class="img-circle" width="60"></div>
                            <div class="m-l-10">
                            <h4 class="m-b-0">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4>
                                <p class=" m-b-0">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ URL::to('/dive-perfil') }}"><i class="ti-user m-r-5 m-l-5"></i> Mi cuenta</a>
                        <a class="dropdown-item" href="/logout"><i class="fa fa-power-off m-r-5 m-l-5"></i> Cerrar sesión</a>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
{{-- @include('divemotor.layouts.sections.navbar') --}}
