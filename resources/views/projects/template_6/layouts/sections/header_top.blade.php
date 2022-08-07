<style type="text/css">
	.headerstrip-wrapper {
  height: 50px;
  position: relative;
}

.headerstrip-wrapper .headerstrip__banner-dismiss {
  width: 12px;
  height: 12px;
  background: none;
  border: none;
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  padding: 0;
  position: absolute;
  font: inherit;
  height: 100%;
  line-height: 0;
  cursor: pointer;
  outline: inherit;
  opacity: 0.4;
  padding: 0 16px;
  color: white;
  text-decoration: none;
  -webkit-transition: all 100ms ease;
  -moz-transition: all 100ms ease;
  -o-transition: all 100ms ease;
  transition: all 100ms ease;
  right: 0;
  top: 0;
  z-index: 2;
}

.headerstrip-wrapper .headerstrip__banner-dismiss:hover {
  -webkit-transform: scale(1.3);
  transform: scale(1.3);
}

.headerstrip-wrapper .headerstrip__banner-dismiss svg {
  fill: #000000;
}

.headerstrip {
  display: block;
  height: 50px;
  font-family: -apple-system, BlinkMacSystemFont, “Segoe UI”, Roboto, Oxygen-Sans, Ubuntu, Cantarell, “Helvetica Neue”,sans-serif;
  font-size: 14px;
  position: relative;
  text-decoration: none;
  z-index: 1;
}

.headerstrip .headerstrip-content-background {
  background-color: #fff;
  opacity: 1;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  /*background: #2930b4;
  background: -webkit-linear-gradient(left, #2930b4, #2a9eb0);
  background: linear-gradient(to right, #2930b4, #2a9eb0);
  background-repeat: repeat-x;*/

  background-image: url({{$secction_promotions[0]->image}});
  /*background-repeat: round;*/
  background-size: cover;
    background-position: center;
}



      @media (max-width: 767px) {

    .headerstrip .headerstrip-content-background {
      background-image: url({{$secction_promotions[0]->image_thumb}});
    }



}

/*@media (min-width: 768px) {


    .header_desktop{

        display: block;
    }


    .header_movil{

        display: none;
    }
}*/



.headerstrip .headerstrip-canvas {
  height: 50px;
  margin: auto auto;
}

.headerstrip .headerstrip-content {
  display: flex;
  align-items: center;
  justify-content: center;
  background-size: contain;
  background-repeat: no-repeat;
  background-size: 1000px 50px;
  width: 100%;
  height: 50px;
  max-width: 1408px;
  padding-left: 16px;
  padding-right: 16px;
  margin: 0 auto;
}

.headerstrip .headerstrip-text {
  color: #FFFFFF;
  text-decoration: none;
  padding-right: 24px;
  font-weight: 200;
  letter-spacing: 0.8px;
  position: relative;
}

.headerstrip .headerstrip-text strong {
  font-weight: 600;
}

.headerstrip .headerstrip-cta-container {
  display: flex;
}

.headerstrip .headerstrip-cta {
  position: relative;
  background-color: #FC9F97;
  padding: 5px 30px;
  color: #2d2d2d;
  font-weight: 600;
  border-radius: 4px;
  text-decoration: none;
  display: block;
  text-align: center;
  min-width: 100px;
}

.headerstrip .headerstrip-cta-mobile {
  color: #FFFFFF;
  text-decoration: underline;
  padding-left: 5px;
}

.headerstrip .headerstrip-cta-mobile:hover {
  color: #FFFFFF;
}


.headerstrip .is-hidden-desktop .headerstrip-content {
  text-align: center;
}

.headerstrip .is-hidden-desktop .headerstrip-text {
  position: relative;
  padding-right: 24px;
}

.headerstrip .is-hidden-desktop .headerstrip__banner-dismiss {
  margin-left: 0;
}

.headerstrip .headerstrip__dismiss-icon {
  width: 12px;
  height: 12px;
  fill: #FFFFFF;
  display: inline-block;
}

@media (max-width: 1024px) {
  .headerstrip .is-hidden-tablet-and-below {
    display: none !important;
  }
}

@media (min-width: 1025px) {
  .headerstrip .is-hidden-desktop {
    display: none !important
  }
}
</style>


@if(count($secction_promotions)>0)


	<div class="banner-root">
<div class="banner-container">
<div class="headerstrip-wrapper">

  <button title="dismiss" type="button" class="js-banner__dismiss headerstrip__banner-dismiss">
    <svg class="headerstrip__dismiss-icon" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">

      <path d="M19.8 2.4c.3.3.3.8 0 1.1l-6 6c-.3.3-.3.8 0 1.1l6 6c.3.3.3.8 0 1.1l-2.2 2.2c-.3.3-.8.3-1.1 0l-6-6c-.3-.3-.8-.3-1.1 0l-6 6c-.3.3-.8.3-1.1 0L.1 17.7c-.3-.3-.3-.8 0-1.1l6-6c.3-.3.3-.8 0-1.1l-6-6c-.3-.3-.3-.8 0-1.1L2.3.2c.3-.3.8-.3 1.1 0l6 6c.3.3.8.3 1.1 0l6-6c.3-.3.8-.3 1.1 0l2.2 2.2z"></path>
    </svg>
  </button>

  <a class="headerstrip js-banner__link" href="{{ $secction_promotions[0]->link }}">

    <div class="headerstrip-content-background"></div>
    {{-- responsive --}}
    <div class="headerstrip-canvas is-hidden-desktop">

      <div class="headerstrip-content">
        <div class="headerstrip-text">
          {!! isset( $secction_promotions[0]->title) ? $secction_promotions[0]->title:  ''  !!}
        </div>
      </div>

    </div>
    {{-- NO responsive --}}
    <div class="headerstrip-canvas is-hidden-tablet-and-below">
      <div class="headerstrip-content">

        <div class="headerstrip-text">
          <!--strong>Codeslide!</strong> Unlimited plugin, WordPress &amp; web template downloads!-->
          {!! isset( $secction_promotions[0]->title) ? $secction_promotions[0]->title:  ''  !!}
        </div>

        {{--<span class="js-banner__link headerstrip-cta" href="#">From $0.00/m</span>--}}

      </div>
    </div>
  </a>

</div>
</div>
</div>


		@else
		@endif



<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script>
var closeButtons = $('.headerstrip__banner-dismiss');
closeButtons.on('click', function() {
  $(this).parent().hide();
});
</script>