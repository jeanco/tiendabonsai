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
    color: #ec8300;
    background-color: #fff;
  }

  .find-home-item>input {
    border: 1px solid #adadad;
    border-radius: 10px;
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
                                <div class="slide1-text" style="text-align: center;">
                                    <div class="middle-text">
                                        <div class="title-1 wow fadeUp" data-wow-duration="0.9s" data-wow-delay="0s">
                                            <h3>{{ $cover->subtitle }}</h3>
                                        </div>
                                        <div class="title-2 wow fadeUp" data-wow-duration="1.9s" data-wow-delay="0.1s">
                                            <h1>{!! $cover->title !!}</h1>
                                        </div>
                                        <div class="desc wow fadeUp" data-wow-duration="1.2s" data-wow-delay="0.2s">
                                            <p>{{ $cover->content }}</p>
                                        </div>
                                        <div class="wow fadeUp" data-wow-duration="1.3s" data-wow-delay=".5s">
                                            <a href="#" class="btn btn-contact">Contáctenos</a>
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
</div>
<!--slider section end-->

<!--Find home area start-->
<div class="find-home" style="padding: 40px 0px 10px 0px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="find-home-title">
                    <h3>Busca aquí la propiedad</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="index.html#" class="form-row gutter-30">
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="find-home-item custom-select mb-40">
                            <select class="selectpicker" id="home_category" title="Modalidad" data-hide-disabled="true" data-live-search="true">
                              @foreach($categories as $key => $category)
                                  <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="find-home-item custom-select">
                            <select class="selectpicker" id="home_subcategory" title="Tipo de Inmueble" data-hide-disabled="true" data-live-search="true">
                              @foreach($first_attributes as $k => $attribute)
                                  <option value="{{ $attribute['id'] }}">{{ $attribute['name'] }}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="find-home-item mb-40">
                            <input type="text" name="max-area" placeholder="Buscar" id="home_text-to-search">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="find-home-item">
                            <button type="submit" id="home__search">BUSCAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Find home area end-->
