
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding-right: 0px; padding-left: 0px;">
                        <div class="single-item js-banner">
                            @foreach($offers as $key => $offer)

                            <div class="slide-img">
                                <div class="container">
                                    <div class="row row-no-padding">
                                        <div class="col-md-6">
                                            <div class="instagram-item">
                                                <a  href="{{ (isset($offer[0]['itemSlug'])) ? '/productos/'.$offer[0]['itemSlug'] : '#'}}"><img style="width: 100%; height: 400px; object-fit: cover; filter: brightness(70%);" src="{{ (isset($offer[0]['imageThumbUrl'])) ? $offer[0]['imageThumbUrl'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png'}}" alt="images" class="img-responsive" style="width: 100%">

                                                <div class="instagram-content-text">
                                                    <h3>Shop Instagram</h3>
                                                </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="instagram-item">
                                                <a href="{{ (isset($offer[1]['itemSlug'])) ? '/productos/'.$offer[1]['itemSlug'] : '#'}}"><img style="width: 100%; height: 200px; object-fit: cover; filter: brightness(70%);"  src="{{ (isset($offer[1]['imageThumbUrl'])) ? $offer[1]['imageThumbUrl'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png'}}" alt="images" class="img-responsive" style="width: 100%"></a>
                                            </div>
                                            <div class="instagram-item">
                                                <a href="{{ (isset($offer[2]['itemSlug'])) ? '/productos/'.$offer[2]['itemSlug'] : '#'}}"><img style="width: 100%; height: 200px; object-fit: cover; filter: brightness(70%);"  src="{{ (isset($offer[2]['imageThumbUrl'])) ? $offer[2]['imageThumbUrl'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png'}}" alt="images" class="img-responsive" style="width: 100%"></a>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                
               {{-- <div class="row">

                    @foreach($offers as $offer)
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="sub-banner">
                            <a href="#"><img src="{{ $offer['imageThumbUrl'] }}" alt="images" class="img-reponsive"></a>
                        </div>
                    </div>
                    @endforeach

                </div> --}}