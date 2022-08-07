<style type="text/css">
  .btn-light {
    background-color: #ffffff00;
    border-radius: 10px;
    height: 40px;
  }
  .show>.btn-light.dropdown-toggle {
    background-color: #ffffff00;
  }
  .btn-light:hover {
    background-color: #ffffff00;
  }
  .btn-contact{
    background-color: #ffffff00;
    border-radius: 10px;
    color: #fff;
    border: 1px solid #fff;
    padding: 10px;
    font-size: 20px;
    font-weight: 600;
    text-transform: uppercase;
  }
  .btn-contact:hover {
    background-color: #fff;
  }
</style>
<!--slider section start-->
<div class="slider-area">
    <div class="slider-container overlay home-2">
        <!-- Slider Image -->
        <div id="mainSlider" class="nivoSlider slider-image">
            @foreach($covers as $key => $cover)
            <img src="{{ $cover->image }}" alt="" title="#htmlcaption{{$key}}" />
            @endforeach
            <!-- <img src="/miranda/img/slider/1.jpg" alt="" title="#htmlcaption2" /> -->
            <!-- <img src="/miranda/img/slider/2.jpg" alt="" title="#htmlcaption3" /> -->
        </div>
        <!-- Slider Caption 1 -->
        @foreach($covers as $key => $cover)
        <div id="htmlcaption{{$key}}" class="nivo-html-caption slider-caption-1">
            <div class="display-table">
                <div class="display-tablecell">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="slide1-text">
                                    <div class="middle-text">
                                        <!-- <div class="title-1 wow fadeUp" data-wow-duration="0.9s" data-wow-delay="0s">
                                            <h3>{{ $cover->subtitle }}</h3>
                                        </div> -->
                                        <div class="title-2 wow fadeUp" data-wow-duration="1.9s" data-wow-delay="0.1s">
                                            <h1>{!! $cover->title !!}</h1>
                                        </div>
                                        <!-- <div class="desc wow fadeUp" data-wow-duration="1.2s" data-wow-delay="0.2s">
                                            <p>{{ $cover->content }}</p> <p>{{ strip_tags($cover->title) }}</p>
                                        </div> -->
                                        <div class="wow fadeUp" data-wow-duration="1.3s" data-wow-delay=".5s">
                                            <a href="#" class="btn btn-contact">Contáctanos</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!--Find home area start-->
    <div class="finde-home-postion">
        <div class="container">
            <div class="find-home-box postion">
                <div class="find-home-box-inner">
                    <div class="find-home-title" style="color: #fff; font-size: 18px; font-weight: 500;">
                        <span class="font-weight-bold">ENCUENTRA MÁS INMUEBLES</span>
                        <!--span style="color: #55d400; font-weight: 700;">6,000</span--> 
                    </div><br>
                    <form action="#">
                        <div class="find-home-cagtegory">
                            <div class="find-home-item mb-3">
                                <select class="selectpicker" id="home_category" title="Venta" data-hide-disabled="true" data-live-search="true">
                                  @foreach($categories as $key => $category)
                                      <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="find-home-item mb-3">
                                <select class="selectpicker" id="home_subcategory" title="Departamento" data-hide-disabled="true" data-live-search="true">
                                  @foreach($first_attributes as $k => $attribute)
                                      <option value="{{ $attribute['id'] }}">{{ $attribute['name'] }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="find-home-item mb-3">
                                <input type="text" name="min-area" placeholder="Buscar por distrito" style="border-radius: 10px; padding-left: 15px;" id="home_text-to-search">
                            </div>
                            <div class="find-home-item">
                                <button type="" style="border-radius: 10px;" id="home__search">BUSCAR</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Find home area end-->
</div>
<!--slider section end-->
