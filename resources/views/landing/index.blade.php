<!DOCTYPE html>
<html lang='es'>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta name="description" content="{{ $head->description }}"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <meta name=theme-color content=#004180> --}}
    {{-- <link rel=manifest href=/manifest.json> --}}
    <meta name="twitter:card" content="summary">

    <meta property="og:locale" content="es_PE" />
    <meta property="og:type" content="website" />
    {{-- <meta property="fb:app_id" content="app_id" /> App Id--}}
    <meta property="og:description" content="{{ $head->description }}" />
    <meta property="og:image" content="{{ $head->imageUrl }}" />
    <meta property="og:title" content="{{ $head->title }}" />
    <meta property="og:site_name" content="{{ $head->companyName }}" />
    <meta property="og:url" content="{{ $head->url }}" />

    <meta name="twitter:site" content="{{ '@'.$head->twitterPage }}">
    <title>{{ $head->companyName }}</title>

    <link rel="stylesheet" href="{{ asset('fonts/base/stylesheet.css') }}"/>
    <link rel="stylesheet" href="{{ asset('fonts/icons/style.css') }}"/>

    @if(env('APP_ENV') !== 'local')
      <link rel="stylesheet" href="{{ asset('static/css/app.css') }}"/>
    @endif
    <script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit&hl=es" async defer></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-146690578-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-146690578-1');
    </script>
  </head>

  <body>
    <div id="fb-root"></div>
    <div id="root"></div>
    <script>
      window.API_URL = '{{ url('/api') }}';
    </script>

    @if(env('APP_ENV') === 'local')
      <script src="http://192.168.1.118:8080/app.js"></script>
    @else
      <script src="{{ asset('static/js/manifest.js') }}"></script>
      <script src="{{ asset('static/js/vendor.js') }}"></script>
      <script src="{{ asset('static/js/app.js') }}"></script>
    @endif

    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v4.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your customer chat code -->
    <div class="fb-customerchat"
      attribution=setup_tool
      page_id="167100430668220"
      theme_color="#6699cc"
      logged_in_greeting="Hola, ¿En qué podemos ayudarte hoy?"
      logged_out_greeting="Hola, ¿En qué podemos ayudarte hoy?">
    </div>
  </body>
</html>
