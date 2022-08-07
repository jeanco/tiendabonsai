<!--Main Slider-->
<section class="main-slider">

    <div class="rev_slider_wrapper fullwidthbanner-container"  id="rev_slider_one_wrapper" data-source="gallery">
        <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
            <ul>
                @foreach($banners as $banner)
                <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1687" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="{{ $banner['image_thumb'] }}" data-title="Slide Title" data-transition="parallaxvertical">
                  <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{ $banner['image'] }}">
                  <a href="{{ $banner['link'] }}" target="{{ $banner['is_blank'] ? '_blank' : '' }}" class="link_banner">{{ $banner['link_text'] }}</a>

                  <!-- <div class="tp-caption"
                  data-paddingbottom="[0,0,0,0]"
                  data-paddingleft="[0,0,0,0]"
                  data-paddingright="[0,0,0,0]"
                  data-paddingtop="[0,0,0,0]"
                  data-responsive_offset="on"
                  data-type="text"
                  data-height="none"
                  data-width="['600','600','500','420']"
                  data-whitespace="normal"
                  data-hoffset="['15','15','15','15']"
                  data-voffset="['-20','-20','-20','-20']"
                  data-x="['right','right','right','right']"
                  data-y="['middle','middle','middle','middle']"
                  data-textalign="['top','top','top','top']"
                  data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                      <div class="slider-content">
                        <h2>ENCUENTRA<br> TU MEJOR AUTO</h2>
                          <div class="text">Elije tu mejor modelo, no esperes Más</div>
                          <a href="index.html#" class="theme-btn btn-style-one">VER MÁS</a>
                      </div>
                  </div> -->
                </li>
                @endforeach
                {{--
                <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1688" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="images/main-slider/image-2.jpg" data-title="Slide Title" data-transition="parallaxvertical">
                  <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="/template_8/images/main-slider/image-2.jpg">
                  <a href="#" class="link_banner"></a>

                  <!-- <div class="tp-caption"
                  data-paddingbottom="[0,0,0,0]"
                  data-paddingleft="[0,0,0,0]"
                  data-paddingright="[0,0,0,0]"
                  data-paddingtop="[0,0,0,0]"
                  data-responsive_offset="on"
                  data-type="text"
                  data-height="none"
                  data-width="['600','600','500','420']"
                  data-whitespace="normal"
                  data-hoffset="['15','15','15','15']"
                  data-voffset="['-20','-20','-20','-20']"
                  data-x="['right','right','right','right']"
                  data-y="['middle','middle','middle','middle']"
                  data-textalign="['top','top','top','top']"
                  data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                    <div class="slider-content">
                        <h2>ENCUENTRA<br> TU MEJOR AUTO</h2>
                          <div class="text">Elije tu mejor modelo, no esperes Más</div>
                          <a href="index.html#" class="theme-btn btn-style-one">VER MÁS</a>
                    </div>
                  </div> -->

                </li>
                --}}
            </ul>

        </div>
    </div>
</section>
<!--End Main Slider-->
