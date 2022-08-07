<!-- Support Area Start Here -->
<div class="support-area bdr-top">
    <div class="container">
        <div class="d-flex flex-wrap text-center">
            <div class="support-area bdr-top">
                <div class="container">
                    <div class="d-flex flex-wrap text-center">
                            @foreach($values as $key => $value)
                            <div class="single-support">
                                    <div class="support-icon">
                                        <img src="{{ $value['image_thumb'] }}" alt="images" class="img-reponsive" style="width: 170px; height: 130px;">
                                    </div>
                                    <div class="support-desc">
                                        <h6>{{ $value['title'] }}</h6>
                                    <span>{{ $value['description'] }}</span>
                                    </div>
                            </div>
                            @endforeach
                    </div>
                </div>
                    <!-- Container End -->
            </div>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Support Area End Here -->
<!-- Footer Area Start Here -->
        <footer class="off-white-bg2 pt-95 bdr-top pt-sm-55" style="background: #065692;">
            <!-- Footer Top Start -->
            <div class="footer-top">
                <div class="container">
                    <!-- Signup Newsletter Start -->
                    <div class="row mb-60">
                         <div class="col-xl-7 col-lg-7 ml-auto mr-auto col-md-9">
                            <div class="news-desc text-center mb-30">
                                 <h3>Regístrese para recibir Novedades</h3>
                                 <p>Enterate aquí primero. Registrate ahora.</p>
                             </div>

                                 <form>
                                   <div class="row">
                                     <div class="col-md-4"><input id="subscription_name" class="form-control" type="text" placeholder="Nombre" /></div>
                                     <div class="col-md-3"><input id="subscription_cellphone" class="form-control" type="text" placeholder="Celular" /></div>
                                     <div class="col-md-3"><input id="subscription_email" class="form-control" placeholder="Email" name="email" type="text"></div>
                                     <div class="col-md-2"><a id="subscription__save" href="#" class="customer-btn" style="margin-top: 0px;">Suscribete!</a></div>
                                   </div>
                                 </form>

                         </div>
                    </div>
                    <!-- Signup-Newsletter End -->
                    <div class="row">
                        <!-- Single Footer Start -->
                        <div class="col-md-4 col-sm-12">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Información</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="{{ URL::to('/nosotros') }}">Nosotros</a></li>
                                        <li><a href="{{ URL::to('/catalogo') }}">Catálogo</a></li>
                                        <li><a href="{{ URL::to('/contacto') }}">Contacto</a></li>
                                        <li><a href="{{ URL::to('/blog') }}">Blog</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-md-4 col-sm-12">
                            <!--div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Extras</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="{{ URL::to('/blog') }}">Blog</a></li>
                                    </ul>
                                </div>
                            </div-->
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-md-4 col-sm-12"> 
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Contactanos</h3>
                                <div class="footer-content">
                                    <ul class="footer-list address-content">
                                        <li style="color: #dadada;"><i class="lnr lnr-map-marker"></i> {{ $company_main->address }}</li>
                                        <li style="color: #dadada;"><i class="lnr lnr-envelope"></i> {{ $company_main->email }}</li>
                                        <li style="color: #dadada;"><i class="lnr lnr-phone-handset"></i> {{ $company_main->phone }}</li>
                                    </ul>
                                    <!--div class="payment mt-25 bdr-top pt-30">
                                        <a href="index.html#"><img class="img" src="/yekatex/img/payment/1.png" alt="payment-image"></a>
                                    </div-->
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Top End -->
            <!-- Footer Middle Start -->
            <div class="footer-middle text-center">
                <div class="container">
                    <div class="footer-middle-content pt-20 pb-30">
                            <ul class="social-footer">
                                <li><a href="{{ $company_main['facebook'] }}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ $company_main['twitter'] }}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $company_main['youtube'] }}"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a href="{{ $company_main['linkedin'] }}"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                    </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Middle End -->
            <!-- Footer Bottom Start -->
            <div class="footer-bottom pb-30">
                <div class="container">

                     <div class="copyright-text text-center">
                        <p>Copyright © 2019 <a target="_blank" href="index.html#">Noveltie</a> Derechos Reservados.</p>
                     </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Bottom End -->
        </footer>
        <!-- Footer Area End Here -->
        <!-- Quick View Content Start -->
        <div class="main-product-thumbnail quick-thumb-content">
            <div class="container">
                <!-- The Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <!-- Main Thumbnail Image Start -->
                                    <div class="col-lg-5 col-md-6 col-sm-5">
                                        <!-- Thumbnail Large Image start -->
                                        <div class="tab-content">
                                            <div id="thumb1" class="tab-pane fade show active">
                                                <a data-fancybox="images" href="img/products/35.jpg"><img src="img/products/35.jpg" alt="product-view"></a>
                                            </div>
                                            <div id="thumb2" class="tab-pane fade">
                                                <a data-fancybox="images" href="img/products/13.jpg"><img src="img/products/13.jpg" alt="product-view"></a>
                                            </div>
                                            <div id="thumb3" class="tab-pane fade">
                                                <a data-fancybox="images" href="img/products/15.jpg"><img src="img/products/15.jpg" alt="product-view"></a>
                                            </div>
                                            <div id="thumb4" class="tab-pane fade">
                                                <a data-fancybox="images" href="img/products/4.jpg"><img src="img/products/4.jpg" alt="product-view"></a>
                                            </div>
                                            <div id="thumb5" class="tab-pane fade">
                                                <a data-fancybox="images" href="img/products/5.jpg"><img src="img/products/5.jpg" alt="product-view"></a>
                                            </div>
                                        </div>
                                        <!-- Thumbnail Large Image End -->
                                        <!-- Thumbnail Image End -->
                                        <div class="product-thumbnail mt-20">
                                            <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">
                                                <a class="active" data-toggle="tab" href="index.html#thumb1"><img src="img/products/35.jpg" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="index.html#thumb2"><img src="img/products/13.jpg" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="index.html#thumb3"><img src="img/products/15.jpg" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="index.html#thumb4"><img src="img/products/4.jpg" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="index.html#thumb5"><img src="img/products/5.jpg" alt="product-thumbnail"></a>
                                            </div>
                                        </div>
                                        <!-- Thumbnail image end -->
                                    </div>
                                    <!-- Main Thumbnail Image End -->
                                    <!-- Thumbnail Description Start -->
                                    <div class="col-lg-7 col-md-6 col-sm-7">
                                        <div class="thubnail-desc fix mt-sm-40">
                                            <h3 class="product-header">Printed Summer Dress</h3>
                                            <div class="pro-price mtb-30">
                                                <p class="d-flex align-items-center"><span class="prev-price">16.51</span><span class="price">$15.19</span><span class="saving-price">save 8%</span></p>
                                            </div>
                                            <p class="mb-20 pro-desc-details">Long printed dress with thin adjustable straps. V-neckline and wiring under the bust with ruffles at the bottom of the dress.</p>
                                            <div class="product-size mb-20 clearfix">
                                                <label>Size</label>
                                                <select class="">
                                                    <option>S</option>
                                                    <option>M</option>
                                                    <option>L</option>
                                                </select>
                                            </div>
                                            <div class="color mb-20">
                                                <label>color</label>
                                                <ul class="color-list">
                                                    <li>
                                                        <a class="orange active" href="index.html#"></a>
                                                    </li>
                                                    <li>
                                                        <a class="paste" href="index.html#"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="box-quantity d-flex">
                                                <form action="index.html#">
                                                    <input class="quantity mr-40" type="number" min="1" value="1">
                                                </form>
                                                <a class="add-cart" href="cart.html">add to cart</a>
                                            </div>
                                            <div class="pro-ref mt-15">
                                                <p><span class="in-stock"><i class="ion-checkmark-round"></i> IN STOCK</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Thumbnail Description End -->
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="custom-footer">
                                <div class="socila-sharing">
                                    <ul class="d-flex">
                                        <li>share</li>
                                        <li><a href="{{ $company_main->facebook }}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="{{ $company_main->twitter }}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="{{ $company_main->facebook }}"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a></li>
                                        <li><a href="{{ $company_main->facebook }}"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quick View Content End -->
