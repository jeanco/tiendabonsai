@extends('wings.layouts.index')
@section('content')
<!-- Content -->
<div class="page-content">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle" style="background-origin: content-box;background-image:url( {{ isset( $gallery_company[7]->resource) ? $gallery_company[7]->resource:  ''  }});">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Contáctenos</h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="/">Inicio</a></li>
                <li>Contacto</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <!-- contact area -->
    <!-- contact area -->
    <div class="section-full content-inner bg-white contact-style-1">
      <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 m-b30">
                  <div class="icon-bx-wraper bx-style-1 p-a30 center">
                    <div class="icon-xl text-primary m-b20"> <a href="JavaScript:Void(0);" class="icon-cell"><i class="fa fa-map-marker"></i></a> </div>
                    <div class="icon-content" style="height: 80px;">
                      <h5 class="dlab-tilte text-uppercase">Dirección</h5>
                      <p>{{ $company->address }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6 m-b30">
                  <div class="icon-bx-wraper bx-style-1 p-a30 center">
                    <div class="icon-xl text-primary m-b20"> <a href="JavaScript:Void(0);" class="icon-cell"><i class="fa fa-envelope"></i></a> </div>
                    <div class="icon-content" style="height: 80px;">
                      <h5 class="dlab-tilte text-uppercase">Email</h5>
                    <p>{{ $company->email }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6 m-b30">
                  <div class="icon-bx-wraper bx-style-1 p-a30 center">
                    <div class="icon-xl text-primary m-b20"> <a href="JavaScript:Void(0);" class="icon-cell"><i class="fa fa-phone"></i></a> </div>
                    <div class="icon-content" style="height: 80px;">
                      <h5 class="dlab-tilte text-uppercase">Teléfono</h5>
                      <p>{{ $company->phone }}</p> <br/>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6 m-b30">
                  <div class="icon-bx-wraper bx-style-1 p-a30 center">
                    <div class="icon-xl text-primary m-b20"> <a href="JavaScript:Void(0);" class="icon-cell"><i class="fa fa-fax"></i></a> </div>
                    <div class="icon-content" style="height: 80px;">
                      <h5 class="dlab-tilte text-uppercase">Celular</h5>
                      <p>{{ $company->cel }}</p>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row">
                <!-- Left part start -->
                <div class="col-md-6">
                    <div class="p-a30 bg-gray clearfix m-b30 ">
                      <h2>Registrate para recibir información</h2>
                      <div class="dzFormMsg"></div>
                      <form>
                        <input type="hidden" value="Contact" name="dzToDo" >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="" type="text" required class="form-control" id="contact_name" placeholder="Nombre Completo">
                                            <div id="contact-error-name" class="mensaje-error text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="" type="email" class="form-control" id="contact_email" required  placeholder="Email" >
                                            <div id="contact-error-email" class="mensaje-error text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="" type="text" required class="form-control" id="contact_cellphone" placeholder="Celular">
                                            <div id="contact-error-cellphone" class="mensaje-error text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="" type="text" required class="form-control" id="contact_subject" placeholder="Asunto">
                                            <div id="contact-error-subject" class="mensaje-error text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea name="" rows="4" class="form-control" id="contact_msg" required placeholder="Déjanos tu consulta..."></textarea>
                                            <div id="contact-error-msg" class="mensaje-error text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button name="" type="button" value="Submit" class="site-button" id="contact__send"> <span>Enviar</span> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Left part END -->
      <!-- right part start -->
                <div class="col-md-6">
                    {{--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d227748.3825624477!2d75.65046970649679!3d26.88544791796718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396c4adf4c57e281%3A0xce1c63a0cf22e09!2sJaipur%2C+Rajasthan!5e0!3m2!1sen!2sin!4v1500819483219" style="border:0; width:100%; height:450px;" allowfullscreen></iframe>--}}
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3792.815780492028!2d-70.29920348544324!3d-18.080080988117434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6f39eaf49489191d!2sZOFRATACNA!5e0!3m2!1ses!2spe!4v1581442037946!5m2!1ses!2spe" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <!-- right part END -->
            </div>
        </div>
    </div>
    <!-- contact area  END -->
    <!-- contact area  END -->
</div>
<!-- Content END-->
@stop
@section('plugins-css')
@stop
@section('plugins-js')
    <script type="text/javascript" src="website/js/contact.js"></script>
@stop
