@extends('oyeepe.layouts.index')
@section('content')
<!-- Slide Section -->

<!-- Contenido -->
<div class="content-margin" style="margin-bottom: 50px;">
    <div class="text-center" style="font: bold 24px 'Poppins', sans-serif; margin-bottom: 20px;">Iniciar Sesión</div>
    @if (session()->has('data'))
    <p class="login-box-msg text-danger text-center">Nombre de usuario y/o Contraseña Incorrectas</p>
    @endif
    {!! Form::open(['class' => 'c-login__form ', 'url' => '/login-from-landing', 'method' => 'POST', 'role' => 'form']) !!}
    {{ csrf_field() }}
    <div class="content-margin">
        <div class="row" style="display: flex; margin-bottom: 10px;">
            <div class="col-md-2 col-sm-12" style="align-items: center; display: flex;">Usuario</div>
            <div class="col-md-10 col-sm-12">
                <input type="text" name="username" class="form-control" value="" placeholder="Ingrese su DNI o número de Celular">
            </div>
        </div>
        <div class="row" style="display: flex; margin-bottom: 10px;">
            <div class="col-md-2 col-sm-12" style="align-items: center; display: flex;">Contraseña</div>
            <div class="col-md-10 col-sm-12">
                <input type="password" name="password" class="form-control" value="">
            </div>
        </div>
        <br>
        <center>
        <!-- <a href="/" class="btn btn-primary" style="width: 200px;">INICIAR SESIÓN</a> -->
        <button type="submit" class="btn btn-primary" style="width: 200px;">INICIAR SESIÓN</button>
        </center>
        <hr>
        <center><a href="/registro" class="btn btn-shop1" style="width: 200px;">Crear Nueva Cuenta</a></center>
    </div>
    {!! Form::close() !!}
</div>
@stop
@section('pulgins-js')
<script></script>
@stop
