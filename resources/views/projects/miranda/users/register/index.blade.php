@extends('miranda.layouts.index')
@section('content')
<!--Register page inner start-->
<div class="register-page-inner ptb-100 bg-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-xs-12">
                     <div class="breadcrumbs-title text-center">
                        <h3 style="color: black;">Registrate y publica tu propio inmobiliario</h3>
                    </div>
                <div class="register-page-form">
                    <div class="account-title">
                        <h5>Crear mi cuenta</h5>
                    </div>
                    <form action="register.html#">
                       
                            <label><span>DNI como Usuario</span></label>    
                            <input id="register_user_dni" type="text" placeholder="Digite su DNI como Usuario">
                            <div id="register-dni-error" class="mensaje-error text-danger"></div>
                            <label><span>Nombres</span></label>    
                            <input id="register_user-first-name" type="text" placeholder="Digite su Nombre completo">
                            <div id="register-user-first-name-error" class="mensaje-error text-danger"></div>
                            <label><span>Apellidos</span></label>    
                            <input id="register_user-last-name" type="text" placeholder="Digite sus Apellidos completos">
                            <div id="register-user-last-name-error" class="mensaje-error text-danger"></div>
                            <label><span>Celular</span></label>    
                            <input id="register_user-cel" type="number" placeholder="Digite su celular whatsapp">
                            <div id="register-user-cel-error" class="mensaje-error text-danger"></div>
                            <label><span>Email</span></label>  
                            <input id="register_user-email" type="email" placeholder="Ejm: miemail@gmail.com">
                            <div id="register-user-email-error" class="mensaje-error text-danger"></div>
                            <label><span>Contraseña</span></label> 
                            <input id="register_user-password" type="password" placeholder="*************">
                            <div id="register-user-password-error" class="mensaje-error text-danger"></div>
                            <label><span>Comfirme su contraseña</span></label> 
                            <input id="register_user-password-confirmation" type="password" placeholder="*************">
                            <div id="register-user-password-error" class="mensaje-error text-danger"></div>




                         <div class="agree-text">
                            <p>
                                <label>
                                    <input type="checkbox"> <span>Acepto los Términos</span>
                                </label>
                            </p>
                        </div>
                        <div class="register">
                            <button type="button" id="register-user__save">Registrar</button>
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
<script src="/miranda/js/register_user.js"></script>
@stop
