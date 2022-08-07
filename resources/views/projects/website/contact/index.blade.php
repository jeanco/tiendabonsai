@extends('website.layouts.index')

@section('content')


<section class="contact-us">
        <div class="container">
            <div class="heading-sub">
                <h3 class="pull-left">contactos</h3>
                <div class="clearfix"></div>
            </div>
            <div class="contact-info-heading" style="margin-top: 1px;">
                <div class="row">
                    <div class="col-md-4 contact-column-inner">
                        <div class="contact-box">
                            <div class="contact-box-icon"><i class="ion-ios-location icon-contact"></i></div>
                            <div class="contact-box-information">{{ $company_main->address }}</div>
                        </div>
                    </div>
                    <div class="col-md-4 contact-column-inner">
                        <div class="contact-box">
                            <div class="contact-box-icon"><i class="ion-ios-telephone icon-contact"></i></div>
                            <div class="contact-box-information">{{ $company_main->phone }}</div>
                        </div>
                    </div>
                    <div class="col-md-4 contact-column-inner">
                        <div class="contact-box">
                            <div class="contact-box-icon"><i class="ion-email icon-contact"></i></div>
                            <div class="contact-box-information">{{ $company_main->email }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-info-content">
                <div class="row">
                    <div class="col-md-6">
                        <form action="contact_us.html#" class="contact-form">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <strong>Nombres</strong>
                                        <input type="text" class="form-control" id="contact_name" value="">
                                        <div id="contact-error-name" class="mensaje-error text-danger"></div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <strong>Email *</strong>
                                        <input type="text" class="form-control" id="contact_email" value="">
                                        <div id="contact-error-email" class="mensaje-error text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <strong>Celular</strong>
                                        <input type="text" name="" class="form-control" id="contact_cellphone" value="">
                                        <div id="contact-error-cellphone" class="mensaje-error text-danger"></div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <strong>Asunto</strong>
                                        <input type="text" class="form-control" id="contact_subject" value="">
                                        <div id="contact-error-subject" class="mensaje-error text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <strong>Mensaje</strong>
                                        <textarea name="note" id="contact_msg" rows="3" tabindex="2" class="form-control"></textarea>
                                        <div id="contact-error-msg" class="mensaje-error text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-send-message" id="contact__send">Enviar  mensaje</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div id="googlemap1" style="height: 370px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('pulgins-js')

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMfhtZN7ZukEAEQcgR_GszRE4x338Bu9M&callback=initMap" type="text/javascript"></script>
<script type="text/javascript" src="website/js/contact.js"></script>
<script type="text/javascript">
  $(".windows8").hide();
</script>
<script>
    function initMap() {

        // Create a new StyledMapType object, passing it an array of styles,
        // and the name to be displayed on the map type control.
        var map = new google.maps.Map(document.getElementById('googlemap1'), {
            center: { lat: 21.02765390610467, lng: 105.76363360000005 },
            zoom: 15,
            styles: [{
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#212121"
                    }]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#757575"
                    }]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "color": "#212121"
                    }]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#757575"
                    }]
                },
                {
                    "featureType": "administrative.country",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#9e9e9e"
                    }]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "administrative.locality",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#bdbdbd"
                    }]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#757575"
                    }]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#181818"
                    }]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#616161"
                    }]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "color": "#1b1b1b"
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#2c2c2c"
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#8a8a8a"
                    }]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#373737"
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#3c3c3c"
                    }]
                },
                {
                    "featureType": "road.highway.controlled_access",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#4e4e4e"
                    }]
                },
                {
                    "featureType": "road.local",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#616161"
                    }]
                },
                {
                    "featureType": "transit",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#757575"
                    }]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#000000"
                    }]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#3d3d3d"
                    }]
                }
            ]
        });
    }
    </script>


@stop
