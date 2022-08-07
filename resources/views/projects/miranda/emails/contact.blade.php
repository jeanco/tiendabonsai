<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <article style="color: #828286; display: block; font-size: 18px; margin: 0 auto; max-width: 650px; text-align: center" class="email">
    <img style="display: inline-block; margin-bottom: 2em" class="email__logo" src="http://" alt="">
    <span style="font-size: 2em; font-weight: 300" class="email__title">¡Hola!</span>
    <p>Tienes <strong style="color: #f00" class="primary">1 mensaje</strong></p>
    <hr>
    <p style="margin-bottom: 0" class="mb0"><strong>De</strong></p>
    <p style="margin-top: 0" class="mt0">{{$name }}</p>
    <p style="margin-bottom: 0" class="mb0"><strong>Mensaje</strong></p>
    <p style="margin-top: 0" class="mt0">{{ $msg }}</p>
    <p style="margin-bottom: 0" class="mb0"><strong>Contacto</strong></p>
    <p style="margin: 0" class="m0">{{ $cellphone }}</p>
    <hr>
    <footer style="font-size: 0.9em" class="footer">
      <p style="font-size: 1.3em; text-transform: uppercase;text-transform: uppercase; font-weight: 600" class="email__sub-title footer__title">- Comunícate pronto -</p>
    </footer>
  </article>
</body>
</html>
