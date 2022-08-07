<div class="topbar-mobile hidden-lg hidden-md">
        <div class="active-mobile" style="display: none;">
            <div class="language-popup dropdown">
                <a id="label" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="icon"><i class="ion-ios-world-outline" aria-hidden="true"></i></span>
                    <span>English</span>
                    <span class="ion-chevron-down"></span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="label">
                    <li><a href="#">English</a></li>
                    <li><a href="#">Español</a></li>
                </ul>
            </div>
        </div>
        <div class="right-nav">
            <div class="active-mobile">
                <div class="header_user_info popup-over e-scale hidden-lg hidden-md dropdown">
                    <div data-toggle="dropdown" class="popup-title dropdown-toggle" title="Account">
                        <i class="ion-android-person"></i><span> Noveltie</span>
                    </div>
                    <ul class="links dropdown-menu list-unstyled">
                        <li>
                            <a id="customer_login_link" href="#" title="Sign in"><i class="ion-log-in"></i> Iniciar Sesión</a>
                        </li>
                        <li>
                            <a id="customer_register_link" href="#" title="Register"><i class="ion-ios-personadd"></i> Crear Cuenta</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="active-mobile search-popup pull-right">
                <div class="search-popup dropdown" data-toggle="modal" data-target="#myModal">
                    <i class="ion-search fa-3a"></i>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
</div>
<div class="top-nav hidden-xs hidden-sm" style="    background: #3c3c3c;">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="right-nav">
                        <ul>
                            <!-- <li><a href="#"><i class="ion-ios-heart fa-1a" aria-hidden="true"></i>Interés</a></li>
                            <li><a href="#"><i class="ion-arrow-swap fa-1a" aria-hidden="true"></i>comparar</a></li> -->
                            <li><a href="/registro"><i class="fa fa-user-plus fa-1a" aria-hidden="true"></i>Registrarse</a></li>
                            @if(!Auth::check())
                            <li><a href="/acceder"><i class="fa fa-sign-in-alt fa-1a" aria-hidden="true"></i>Iniciar Sesión</a></li>
                            @else
                            <li><a href="/miperfil/{{ Auth::user()->id }}"><i class="fa fa-columns fa-1a" aria-hidden="true"></i>Mi panel</a></li>
                            <li><a href="/logout"><i class="fa fa-sign-out-alt fa-1a" aria-hidden="true"></i>Salir</a></li>
                            @endif
                        </ul>
                        <span class="fa fa-whatsapp" style="color: #ffffff;"> {{ $company_main->phone }}</span>
                    </div>
                </div>
            </div>
        </div>
</div>
