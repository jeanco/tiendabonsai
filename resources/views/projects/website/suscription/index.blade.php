@extends('website.layouts.index')

@section('content')


<section class="slide">
    <div class="container">
        <div class="row">
            <div class="col-md-3" style="padding-left: 0px; padding-right: 0px;"></div>
            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0px; padding-right: 0px;">
                <div class="row top-row">
                @include('website.home.1_banner')
        
                </div>
            </div>
        </div>
    </div>
    <div class="sub-banner"></div>
</section>

<section>
    <div class="container" style="padding-top: 0px;">
    <div class="row">
        <div class="col-md-4"></div>
    <div class="col-md-4 col-xs-12" style="margin-bottom: 15px;">
                        <h3 style="margin: 0px 0px 15px 0px;">Subscribase</h3>
                        <form action="#" class="news-letter-form">
                          <div style="margin-bottom: 10px;">
                            <input type="text" name="" class="form-control" id="subscription_name" placeholder="Escriba su nombre">
                            <div id="subscription-error-name" class="text-error"></div>
                          </div>
                          <div style="margin-bottom: 10px;">
                            <input type="text" name="" class="form-control" id="subscription_cellphone" placeholder="Escriba su número">
                          </div>
                          <div style="margin-bottom: 10px;">
                            <input type="text" name="" class="form-control" id="subscription_email" placeholder="Escriba su correo">
                            <div id="subscription-error-email" class="text-error"></div>
                          </div>
                          <button type="button" class="btnsub" id="subscription__save" style="position: relative; right: unset; top: unset;">Enviar</button>
                        </form>
                       
                    </div>
                    <div class="col-md-4"></div>
</div>
    </div>
   

</section>



@stop

@section('pulgins-js')
<script type="text/javascript" src="/website/js/home.js"></script>
<script type="text/javascript" src="/website/js/menu.js"></script>
<script type="text/javascript" src="{{ URL::asset('/website/js/featured_products.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/website/js/subscribe.js') }}"></script>
@stop
