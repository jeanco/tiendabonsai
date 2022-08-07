@extends('yekatex.layouts.index')
@section('content')
<section class="checkout-page">
    <div class="container">
        <section class="error">
            <div class="container">
                <div class="error-content" style="padding-top: 0px;">
                    <div class="error-img text-center" style="padding-bottom: 40px;">
                        <a href=""><img src="/images/cart.png" alt="images" class="img-responsive" style="width: 130px;"></a>
                    </div>
                    <div class="error-text text-center">
                        <h2>Su carrito está Vacio!</h2>
                        <p>Debe agregar items al carrito para Comprar</p>
                    </div>
                    <div class="error-form text-center">
                        <form action="#" method="POST" class="form-inline">
                            <a href="{{ URL::to('/catalogo') }}" type="submit" style="font-weight: 700; font-size: 20px;"><u>VOLVER AL CATÁLOGO</u></a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</section>
@stop
@section('pulgins-js')
@stop
