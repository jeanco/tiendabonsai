@extends('antofagasta.layouts.index')
@section('content')
<!--Register page inner start-->
<div class="register-page-inner ptb-100 bg-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <div class="register-page-form">
                    <div class="account-title">
                        <h5>Iniciar Sesión</h5>
                    </div>
                    <form action="login.html#">
                        <div class="username">
                            <input type="text" placeholder="Usuario">
                        </div>
                        <div class="password">
                            <input type="password" placeholder="Contraseña">
                        </div>
                        <div class="agree-text">
                            <p>
                                <label>
                                    <input type="checkbox"> <span>Recordar</span>
                                </label>
                            </p>
                        </div>
                        <div class="lost-password">
                            <p><a href="#">Olvidaste tu Contraseña?</a></p>
                        </div>
                        <div class="login">
                            <button type="button">Iniciar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Register page inner end-->
@stop
@section('plugins-js')
<script></script>
@stop
