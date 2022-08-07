
    <!--div class="filter-block bd">
        <div class="row">
            <div class="col-md-5">
                <div class="box box-view">
                    <span>Mostrar 1–12 de 40 resultados</span>
                    <div class="button-view">
                        <span class="col"><i class="ion-ios-keypad fa-3a"></i></span>
                        <span class="list"><i class="icon-grid-4"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-7 margin-top3">
                <div class="box show pull-left">
                    <span>Mostrar</span>
                    <button class="dropdown-toggle" type="button" data-toggle="dropdown">12
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="filter_per_page" data-value=12 href="">12</a></li>
                        <li><a class="filter_per_page" data-value=24 href="">24</a></li>
                        <li><a class="filter_per_page" data-value=36 href="">36</a></li>
                    </ul>
                    <span>Por página</span>
                </div>
                <div class="box sort pull-right">
                    <span>Ordenar por:</span>
                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" id="menu2">
                    <span class="dropdown-label">Relevancia</span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu2">
                        <li><a href="" class="ordered_by" data-value="relevance" title="">Relevancia</a></li>
                        <li><a href="" class="ordered_by" data-value="min_price" title="">Precio menor</a></li>
                        <li><a href="" class="ordered_by" data-value="max_price" title="">Precio mayor</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div-->
    <div class="filter-block bd">
        <div class="row">
            <div class="col-md-12">
            <div class="product-pagination">
        {{ $products->appends(request()->except('page'))->links() }}
    </div>
            </div>
        </div>
    </div>
                
    
    <div class="product-list grid_full grid_sidebar grid-uniform">
        @foreach ($products as $product)
        <div class="product-list-item sombra-box">
                @if($product->promotion_available == 1)
                    <div class="label pink" style="position: absolute;">Promoción</div>
                @endif
            <div class="product-item-img box-catalog-img">
                <a href="/productos/{{ $product->slug }}">
                <img src="{{ ($product->photo != '') ? $product->photo->resource_thumb : '' }}" alt="images" class="img-responsive img-catalog" style="height: 150px; border-radius: 9px 9px 0px 0px;"></a>
                <div class="label label-2 red label-top-20">Hot</div>
            </div>
            <div class="product-item-info"  style="margin: 10px;">
                <h4 class="title-space" style="margin-top: 10px;"><a href="/productos/{{ $product->slug }}" title="" style="font-size: 12px;">{{ $product->name }}</a></h4>
                <div class="prod-price">
                    @if($product->promotion_available == 0)
                        <span class="price black">S/.{{ $product->price }}</span>
                    @else
                        <span class="price black">S/.{{ $product->price_promotion }}</span>
                        <span class="price old">S/.{{ $product->price }}</span>
                    @endif
                </div>
                <div class="button-ver2 text-center">
                    <a href="" class="addcart-ver2 add_to_cart notification_cart ok" data-index="{{ $product->id }}"  title="Add to cart"><span class="icon"></span>AGREGAR</a>
                    {{--<a href="/productos/{{ $product->slug }}" class="quickview" title="quick view"><i class="ion-eye fa-4" aria-hidden="true"></i></a>
                    <a href="#" class="wishlist ver_click" title="wishlist"><i class="ion-heart fa-4" aria-hidden="true"></i></a>--}}
                </div>
            </div>
        </div>
        @endforeach
    </div>

                <!-- <a href="#"  class="shoppingCard" style="    margin: 30px;
                position: fixed;
                right: 0px;
                bottom: 280px;
                z-index: 5;">
                      <div   class="carrito animElem elmActive">
                        <div class="mango"></div>
                        <div class="cesta"></div>
                        <div class="ruedas"></div>
                      </div>
                      <div  class=" check animElem"></div>
                    </a> -->
    <div class="product-pagination">
        {{ $products->appends(request()->except('page'))->links() }}
    </div>


<script type="text/javascript">
var aux = 0;
$(document).ready(function(){
  $(".shoppingCard").click(function(e){
    e.preventDefault();
    $(this).find(".check, .carrito").toggleClass("elmActive");
  });


});




$(".ok").click(function() {
    //add_cart_notification();
       console.log(aux);


        if (aux==0){
            $(".shoppingCard").click();
       const element =  document.querySelector('.shoppingCard ')
        /*element.classList.add('animated', 'bounceOut','delay-1s')*/
            aux=1;
        }else{
            console.log('entro');
          /*  $.growl.notice({ message: "Se ha confirmado la orden." });*/

        // mostrar_carrito();
        Swal.fire({

          position: 'center',
         // icon: 'success',
          title: '¡Se a agregado a su carrito!',
          showConfirmButton: false,
          timer: 1500,
          /*showClass: {
            popup: 'animated fadeInDown faster'
          },*/
           imageUrl: 'https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/dab60938212491.5968c68fa9113.gif',  
          imageAlt: 'Custom image',
          imageWidth: 250,
           // imageHeight: 200,
        })
        }



        





  });

function mostrar_carrito(){

                 $(".shoppingCard").removeClass("animated");
                 $(".shoppingCard").removeClass("bounceOut");
                 $(".shoppingCard").removeClass("delay-0.5s");
                $(".shoppingCard").click();
                setTimeout(function() {
                $(".shoppingCard").click();
                const element =  document.querySelector('.shoppingCard ')
                 /*element.classList.add('animated', 'bounceOut','delay-0.5s')*/

                  }, 500);

}



var bandera = 1;
$(document).on('click', '.notification_cart', function() {
        //add_cart_notification();
       //console.log("JEAN PASO POR AQUI");
       //$(".shoppingCard").click();

       if (bandera == 1) {
        $('body, html').animate({
            scrollTop: '0px'
        }, 250);

        const element =  document.querySelector('.photo-cart ')
        element.classList.add('animated', 'bounce','delay-0s')
        bandera = 0;
       }else{

       }




});


function add_cart_notification (){


$.notify({
    // options
    icon: 'glyphicon glyphicon-warning-sign',
    title: 'Bootstrap notify',
    message: 'Turning standard Bootstrap alerts into "notify" like notifications',
    url: 'https://github.com/mouse0270/bootstrap-notify',
    target: '_blank'
},{
    // settings
    element: 'body',
    position: null,
    type: "info",
    allow_dismiss: true,
    newest_on_top: false,
    showProgressbar: false,
    placement: {
        from: "top",
        align: "right"
    },
    offset: 20,
    spacing: 10,
    z_index: 1031,
    delay: 5000,
    timer: 1000,
    url_target: '_blank',
    mouse_over: null,
    animate: {
        enter: 'animated fadeInDown',
        exit: 'animated fadeOutUp'
    },
    onShow: null,
    onShown: null,
    onClose: null,
    onClosed: null,
    icon_type: 'class',
    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
        '<span data-notify="icon"></span> ' +
        '<span data-notify="title">{1}</span> ' +
        '<span data-notify="message">{2}</span>' +
        '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
        '</div>' +
        '<a href="{3}" target="{4}" data-notify="url"></a>' +
    '</div>'
});


}

</script>
