@extends('miranda.layouts.index')
@section('content')
<!--Register page inner start-->
<div class="register-page-inner ptb-100 bg-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-xs-12">
                <div class="register-page-form">
                    <div class="account-title">
                        <h5>Crear Cuenta</h5>
                    </div>
                    <form action="register.html#">
                        <div class="username">
                            <input type="text" placeholder="Usuario">
                        </div>
                        <div class="email">
                            <input type="text" placeholder="Email">
                        </div>
                        <div class="password">
                            <input type="password" placeholder="Contraseña">
                        </div>
                        <div class="password">
                            <input type="password" placeholder="Confirmar contraseña">
                        </div>
                         <div class="agree-text">
                            <p>
                                <label>
                                    <input type="checkbox"> <span>Acepto los Términos</span>
                                </label>
                            </p>
                        </div>
                        <div class="register">
                            <button type="button">Registrar</button>
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
