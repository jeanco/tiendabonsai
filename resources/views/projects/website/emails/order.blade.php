<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Plataforma | {{ App\Company::first()->name_company }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> {{-- Select2 --}}


  <style type="text/css">


html{
    font-family:sans-serif;
    -webkit-text-size-adjust:100%;
    -ms-text-size-adjust:100%
}
body{
    margin:0
}
article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary{
    display:block
}
audio,canvas,progress,video{
    display:inline-block;
    vertical-align:baseline
}
audio:not([controls]){
    display:none;
    height:0
}
[hidden],template{
    display:none
}
a{
    background-color:transparent
}
a:active,a:hover{
    outline:0
}
abbr[title]{
    border-bottom:1px dotted
}
b,strong{
    font-weight:700
}
dfn{
    font-style:italic
}
h1{
    margin:.67em 0;
    font-size:2em
}
mark{
    color:#000;
    background:#ff0
}
small{
    font-size:80%
}
sub,sup{
    position:relative;
    font-size:75%;
    line-height:0;
    vertical-align:baseline
}
sup{
    top:-.5em
}
sub{
    bottom:-.25em
}
img{
    border:0
}
svg:not(:root){
    overflow:hidden
}
figure{
    margin:1em 40px
}
hr{
    height:0;
    -webkit-box-sizing:content-box;
    -moz-box-sizing:content-box;
    box-sizing:content-box
}
pre{
    overflow:auto
}
code,kbd,pre,samp{
    font-family:monospace,monospace;
    font-size:1em
}
button,input,optgroup,select,textarea{
    margin:0;
    font:inherit;
    color:inherit
}
button{
    overflow:visible
}
button,select{
    text-transform:none
}
button,html input[type=button],input[type=reset],input[type=submit]{
    -webkit-appearance:button;
    cursor:pointer
}
button[disabled],html input[disabled]{
    cursor:default
}
button::-moz-focus-inner,input::-moz-focus-inner{
    padding:0;
    border:0
}
input{
    line-height:normal
}
input[type=checkbox],input[type=radio]{
    -webkit-box-sizing:border-box;
    -moz-box-sizing:border-box;
    box-sizing:border-box;
    padding:0
}
input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{
    height:auto
}
input[type=search]{
    -webkit-box-sizing:content-box;
    -moz-box-sizing:content-box;
    box-sizing:content-box;
    -webkit-appearance:textfield
}
input[type=search]::-webkit-search-cancel-button,input[type=search]::-webkit-search-decoration{
    -webkit-appearance:none
}
fieldset{
    padding:.35em .625em .75em;
    margin:0 2px;
    border:1px solid silver
}
legend{
    padding:0;
    border:0
}
textarea{
    overflow:auto
}
optgroup{
    font-weight:700
}
table{
    border-spacing:0;
    border-collapse:collapse
}
td,th{
    padding:0
}
/*! Source: https://github.com/h5bp/html5-boilerplate/blob/master/src/css/main.css */
@media print{
    *,:after,:before{
        color:#000!important;
        text-shadow:none!important;
        background:0 0!important;
        -webkit-box-shadow:none!important;
        box-shadow:none!important
    }
    a,a:visited{
        text-decoration:underline
    }
    a[href]:after{
        content:" (" attr(href) ")"
    }
    abbr[title]:after{
        content:" (" attr(title) ")"
    }
    a[href^="javascript:"]:after,a[href^="#"]:after{
        content:""
    }
    blockquote,pre{
        border:1px solid #999;
        page-break-inside:avoid
    }
    thead{
        display:table-header-group
    }
    img,tr{
        page-break-inside:avoid
    }
    img{
        max-width:100%!important
    }
    h2,h3,p{
        orphans:3;
        widows:3
    }
    h2,h3{
        page-break-after:avoid
    }
    .navbar{
        display:none
    }
    .btn>.caret,.dropup>.btn>.caret{
        border-top-color:#000!important
    }
    .label{
        border:1px solid #000
    }
    .table{
        border-collapse:collapse!important
    }
    .table td,.table th{
        background-color:#fff!important
    }
    .table-bordered td,.table-bordered th{
        border:1px solid #ddd!important
    }
}
@font-face{
    font-family:'Glyphicons Halflings';
    src:url(../fonts/glyphicons-halflings-regular.eot);
    src:url(../fonts/glyphicons-halflings-regular.eot?#iefix) format('embedded-opentype'),url(../fonts/glyphicons-halflings-regular.woff2) format('woff2'),url(../fonts/glyphicons-halflings-regular.woff) format('woff'),url(../fonts/glyphicons-halflings-regular.ttf) format('truetype'),url(../fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular) format('svg')
}
.glyphicon{
    position:relative;
    top:1px;
    display:inline-block;
    font-family:'Glyphicons Halflings';
    font-style:normal;
    font-weight:400;
    line-height:1;
    -webkit-font-smoothing:antialiased;
    -moz-osx-font-smoothing:grayscale
}
html{
    font-size:10px;
    -webkit-tap-highlight-color:rgba(0,0,0,0)
}
body{
    font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size:14px;
    line-height:1.42857143;
    color:#333;
    background-color:#fff
}
button,input,select,textarea{
    font-family:inherit;
    font-size:inherit;
    line-height:inherit
}
a{
    color:#337ab7;
    text-decoration:none
}
a:focus,a:hover{
    color:#23527c;
    text-decoration:underline
}
a:focus{
    outline:5px auto -webkit-focus-ring-color;
    outline-offset:-2px
}
figure{
    margin:0
}
img{
    vertical-align:middle
}
.carousel-inner>.item>a>img,.carousel-inner>.item>img,.img-responsive,.thumbnail a>img,.thumbnail>img{
    display:block;
    max-width:100%;
    height:auto
}
.img-rounded{
    border-radius:6px
}
.img-thumbnail{
    display:inline-block;
    max-width:100%;
    height:auto;
    padding:4px;
    line-height:1.42857143;
    background-color:#fff;
    border:1px solid #ddd;
    border-radius:4px;
    -webkit-transition:all .2s ease-in-out;
    -o-transition:all .2s ease-in-out;
    transition:all .2s ease-in-out
}
.img-circle{
    border-radius:50%
}
hr{
    margin-top:20px;
    margin-bottom:20px;
    border:0;
    border-top:1px solid #eee
}
.sr-only{
    position:absolute;
    width:1px;
    height:1px;
    padding:0;
    margin:-1px;
    overflow:hidden;
    clip:rect(0,0,0,0);
    border:0
}
.sr-only-focusable:active,.sr-only-focusable:focus{
    position:static;
    width:auto;
    height:auto;
    margin:0;
    overflow:visible;
    clip:auto
}
[role=button]{
    cursor:pointer
}
.h1,.h2,.h3,.h4,.h5,.h6,h1,h2,h3,h4,h5,h6{
    font-family:inherit;
    font-weight:500;
    line-height:1.1;
    color:inherit
}
.h1 .small,.h1 small,.h2 .small,.h2 small,.h3 .small,.h3 small,.h4 .small,.h4 small,.h5 .small,.h5 small,.h6 .small,.h6 small,h1 .small,h1 small,h2 .small,h2 small,h3 .small,h3 small,h4 .small,h4 small,h5 .small,h5 small,h6 .small,h6 small{
    font-weight:400;
    line-height:1;
    color:#777
}
.h1,.h2,.h3,h1,h2,h3{
    margin-top:20px;
    margin-bottom:10px
}
.h1 .small,.h1 small,.h2 .small,.h2 small,.h3 .small,.h3 small,h1 .small,h1 small,h2 .small,h2 small,h3 .small,h3 small{
    font-size:65%
}
.h4,.h5,.h6,h4,h5,h6{
    margin-top:10px;
    margin-bottom:10px
}
.h4 .small,.h4 small,.h5 .small,.h5 small,.h6 .small,.h6 small,h4 .small,h4 small,h5 .small,h5 small,h6 .small,h6 small{
    font-size:75%
}
.h1,h1{
    font-size:36px
}
.h2,h2{
    font-size:30px
}
.h3,h3{
    font-size:24px
}
.h4,h4{
    font-size:18px
}
.h5,h5{
    font-size:14px
}
.h6,h6{
    font-size:12px
}
p{
    margin:0 0 10px
}
.lead{
    margin-bottom:20px;
    font-size:16px;
    font-weight:300;
    line-height:1.4
}
@media (min-width:768px){
    .lead{
        font-size:21px
    }
}
.small,small{
    font-size:85%
}
.mark,mark{
    padding:.2em;
    background-color:#fcf8e3
}
.text-left{
    text-align:left
}
.text-right{
    text-align:right
}
.text-center{
    text-align:center
}
.text-justify{
    text-align:justify
}
.text-nowrap{
    white-space:nowrap
}
.text-lowercase{
    text-transform:lowercase
}
.text-uppercase{
    text-transform:uppercase
}
.text-capitalize{
    text-transform:capitalize
}
.text-muted{
    color:#777
}
.text-primary{
    color:#337ab7
}
a.text-primary:focus,a.text-primary:hover{
    color:#286090
}

.page-header{
    padding-bottom:9px;
    margin:40px 0 20px;
    border-bottom:1px solid #eee
}
ol,ul{
    margin-top:0;
    margin-bottom:10px
}
ol ol,ol ul,ul ol,ul ul{
    margin-bottom:0
}
.list-unstyled{
    padding-left:0;
    list-style:none
}
.list-inline{
    padding-left:0;
    margin-left:-5px;
    list-style:none
}
.list-inline>li{
    display:inline-block;
    padding-right:5px;
    padding-left:5px
}
dl{
    margin-top:0;
    margin-bottom:20px
}
dd,dt{
    line-height:1.42857143
}
dt{
    font-weight:700
}
dd{
    margin-left:0
}
@media (min-width:768px){
    .dl-horizontal dt{
        float:left;
        width:160px;
        overflow:hidden;
        clear:left;
        text-align:right;
        text-overflow:ellipsis;
        white-space:nowrap
    }
    .dl-horizontal dd{
        margin-left:180px
    }
}
abbr[data-original-title],abbr[title]{
    cursor:help;
    border-bottom:1px dotted #777
}
.initialism{
    font-size:90%;
    text-transform:uppercase
}
blockquote{
    padding:10px 20px;
    margin:0 0 20px;
    font-size:17.5px;
    border-left:5px solid #eee
}
blockquote ol:last-child,blockquote p:last-child,blockquote ul:last-child{
    margin-bottom:0
}
blockquote .small,blockquote footer,blockquote small{
    display:block;
    font-size:80%;
    line-height:1.42857143;
    color:#777
}
blockquote .small:before,blockquote footer:before,blockquote small:before{
    content:'\2014 \00A0'
}
.blockquote-reverse,blockquote.pull-right{
    padding-right:15px;
    padding-left:0;
    text-align:right;
    border-right:5px solid #eee;
    border-left:0
}
.blockquote-reverse .small:before,.blockquote-reverse footer:before,.blockquote-reverse small:before,blockquote.pull-right .small:before,blockquote.pull-right footer:before,blockquote.pull-right small:before{
    content:''
}
.blockquote-reverse .small:after,.blockquote-reverse footer:after,.blockquote-reverse small:after,blockquote.pull-right .small:after,blockquote.pull-right footer:after,blockquote.pull-right small:after{
    content:'\00A0 \2014'
}
address{
    margin-bottom:20px;
    font-style:normal;
    line-height:1.42857143
}
code,kbd,pre,samp{
    font-family:Menlo,Monaco,Consolas,"Courier New",monospace
}
code{
    padding:2px 4px;
    font-size:90%;
    color:#c7254e;
    background-color:#f9f2f4;
    border-radius:4px
}
kbd{
    padding:2px 4px;
    font-size:90%;
    color:#fff;
    background-color:#333;
    border-radius:3px;
    -webkit-box-shadow:inset 0 -1px 0 rgba(0,0,0,.25);
    box-shadow:inset 0 -1px 0 rgba(0,0,0,.25)
}
kbd kbd{
    padding:0;
    font-size:100%;
    font-weight:700;
    -webkit-box-shadow:none;
    box-shadow:none
}
pre{
    display:block;
    padding:9.5px;
    margin:0 0 10px;
    font-size:13px;
    line-height:1.42857143;
    color:#333;
    word-break:break-all;
    word-wrap:break-word;
    background-color:#f5f5f5;
    border:1px solid #ccc;
    border-radius:4px
}
pre code{
    padding:0;
    font-size:inherit;
    color:inherit;
    white-space:pre-wrap;
    background-color:transparent;
    border-radius:0
}
.pre-scrollable{
    max-height:340px;
    overflow-y:scroll
}
.container{
    padding-right:15px;
    padding-left:15px;
    margin-right:auto;
    margin-left:auto
}
@media (min-width:768px){
    .container{
        width:750px
    }
}
@media (min-width:992px){
    .container{
        width:970px
    }
}
@media (min-width:1200px){
    .container{
        width:1170px
    }
}
.container-fluid{
    padding-right:15px;
    padding-left:15px;
    margin-right:auto;
    margin-left:auto
}
.row{
    margin-right:-15px;
    margin-left:-15px
}
.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9{
    position:relative;
    min-height:1px;
    padding-right:15px;
    padding-left:15px
}
.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9{
    float:left
}
.col-xs-12{
    width:100%
}
.col-xs-11{
    width:91.66666667%
}
.col-xs-10{
    width:83.33333333%
}
.col-xs-9{
    width:75%
}
.col-xs-8{
    width:66.66666667%
}
.col-xs-7{
    width:58.33333333%
}
.col-xs-6{
    width:50%
}
.col-xs-5{
    width:41.66666667%
}
.col-xs-4{
    width:33.33333333%
}
.col-xs-3{
    width:25%
}
.col-xs-2{
    width:16.66666667%
}
.col-xs-1{
    width:8.33333333%
}
.col-xs-pull-12{
    right:100%
}
.col-xs-pull-11{
    right:91.66666667%
}
.col-xs-pull-10{
    right:83.33333333%
}
.col-xs-pull-9{
    right:75%
}
.col-xs-pull-8{
    right:66.66666667%
}
.col-xs-pull-7{
    right:58.33333333%
}
.col-xs-pull-6{
    right:50%
}
.col-xs-pull-5{
    right:41.66666667%
}
.col-xs-pull-4{
    right:33.33333333%
}
.col-xs-pull-3{
    right:25%
}
.col-xs-pull-2{
    right:16.66666667%
}
.col-xs-pull-1{
    right:8.33333333%
}
.col-xs-pull-0{
    right:auto
}
.col-xs-push-12{
    left:100%
}
.col-xs-push-11{
    left:91.66666667%
}
.col-xs-push-10{
    left:83.33333333%
}
.col-xs-push-9{
    left:75%
}
.col-xs-push-8{
    left:66.66666667%
}
.col-xs-push-7{
    left:58.33333333%
}
.col-xs-push-6{
    left:50%
}
.col-xs-push-5{
    left:41.66666667%
}
.col-xs-push-4{
    left:33.33333333%
}
.col-xs-push-3{
    left:25%
}
.col-xs-push-2{
    left:16.66666667%
}
.col-xs-push-1{
    left:8.33333333%
}
.col-xs-push-0{
    left:auto
}
.col-xs-offset-12{
    margin-left:100%
}
.col-xs-offset-11{
    margin-left:91.66666667%
}
.col-xs-offset-10{
    margin-left:83.33333333%
}
.col-xs-offset-9{
    margin-left:75%
}
.col-xs-offset-8{
    margin-left:66.66666667%
}
.col-xs-offset-7{
    margin-left:58.33333333%
}
.col-xs-offset-6{
    margin-left:50%
}
.col-xs-offset-5{
    margin-left:41.66666667%
}
.col-xs-offset-4{
    margin-left:33.33333333%
}
.col-xs-offset-3{
    margin-left:25%
}
.col-xs-offset-2{
    margin-left:16.66666667%
}
.col-xs-offset-1{
    margin-left:8.33333333%
}
.col-xs-offset-0{
    margin-left:0
}
@media (min-width:992px){
    .col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9{
        float:left
    }
    .col-md-12{
        width:100%
    }
    .col-md-11{
        width:91.66666667%
    }
    .col-md-10{
        width:83.33333333%
    }
    .col-md-9{
        width:75%
    }
    .col-md-8{
        width:66.66666667%
    }
    .col-md-7{
        width:58.33333333%
    }
    .col-md-6{
        width:50%
    }
    .col-md-5{
        width:41.66666667%
    }
    .col-md-4{
        width:33.33333333%
    }
    .col-md-3{
        width:25%
    }
    .col-md-2{
        width:16.66666667%
    }
    .col-md-1{
        width:8.33333333%
    }
    .col-md-pull-12{
        right:100%
    }
    .col-md-pull-11{
        right:91.66666667%
    }
    .col-md-pull-10{
        right:83.33333333%
    }
    .col-md-pull-9{
        right:75%
    }
    .col-md-pull-8{
        right:66.66666667%
    }
    .col-md-pull-7{
        right:58.33333333%
    }
    .col-md-pull-6{
        right:50%
    }
    .col-md-pull-5{
        right:41.66666667%
    }
    .col-md-pull-4{
        right:33.33333333%
    }
    .col-md-pull-3{
        right:25%
    }
    .col-md-pull-2{
        right:16.66666667%
    }
    .col-md-pull-1{
        right:8.33333333%
    }
    .col-md-pull-0{
        right:auto
    }
    .col-md-push-12{
        left:100%
    }
    .col-md-push-11{
        left:91.66666667%
    }
    .col-md-push-10{
        left:83.33333333%
    }
    .col-md-push-9{
        left:75%
    }
    .col-md-push-8{
        left:66.66666667%
    }
    .col-md-push-7{
        left:58.33333333%
    }
    .col-md-push-6{
        left:50%
    }
    .col-md-push-5{
        left:41.66666667%
    }
    .col-md-push-4{
        left:33.33333333%
    }
    .col-md-push-3{
        left:25%
    }
    .col-md-push-2{
        left:16.66666667%
    }
    .col-md-push-1{
        left:8.33333333%
    }
    .col-md-push-0{
        left:auto
    }
    .col-md-offset-12{
        margin-left:100%
    }
    .col-md-offset-11{
        margin-left:91.66666667%
    }
    .col-md-offset-10{
        margin-left:83.33333333%
    }
    .col-md-offset-9{
        margin-left:75%
    }
    .col-md-offset-8{
        margin-left:66.66666667%
    }
    .col-md-offset-7{
        margin-left:58.33333333%
    }
    .col-md-offset-6{
        margin-left:50%
    }
    .col-md-offset-5{
        margin-left:41.66666667%
    }
    .col-md-offset-4{
        margin-left:33.33333333%
    }
    .col-md-offset-3{
        margin-left:25%
    }
    .col-md-offset-2{
        margin-left:16.66666667%
    }
    .col-md-offset-1{
        margin-left:8.33333333%
    }
    .col-md-offset-0{
        margin-left:0
    }
}




.btn{
    display:inline-block;
    padding:6px 12px;
    margin-bottom:0;
    font-size:14px;
    font-weight:400;
    line-height:1.42857143;
    text-align:center;
    white-space:nowrap;
    vertical-align:middle;
    -ms-touch-action:manipulation;
    touch-action:manipulation;
    cursor:pointer;
    -webkit-user-select:none;
    -moz-user-select:none;
    -ms-user-select:none;
    user-select:none;
    background-image:none;
    border:1px solid transparent;
    border-radius:4px
}


/*# sourceMappingURL=bootstrap.min.css.map */

  </style>







    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.0/css/all.css">
    <style>
    .swiper-container {
    width: 100%;
    height: 100%;
    }
    .swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
    /* Center slide text vertically */
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
    }
    .text-white{color: #fff;}
    .banner-title{color: #fff; text-align: center; font-size: 22px; font-weight: bold;}
    .title-content{text-align: center; font-size: 19px; font-weight: bold;}
    </style>
    {{-- Estilos generales --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/panel/css/custom-app.css') }}" /> @yield('styles')
    <link rel="stylesheet" href="{{asset('admin/css/main.css')}}">
  </head>
  <body style="background-color: #fff;">
    <br>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6" style="background-color: #c9c9c9; padding: 0px;">
        <!-- Encabezado -->
        <div style="background-color: #339e89; padding: 20px 0px;">
          <table width="100%">
            <tr>
              
              <td class="banner-title">Gracias por Confiar en<br>nuestro servicio</td>
            </tr>
          </table>
        </div>
        <!-- Contenido -->
        <div style="padding: 15px;">
          <div class="title-content">Informe de Pedido</div><br>
          {{-- <div class="text-center">Su pedido se ha registrado como pendiente,<br>la fecha de entrega es el 2019-11-20 (año/mes/dia).</div><br> --}}
          <div class="text-center"><a href="{{-- $document_link --}}" class="btn btn-primary btn-lg">Ver detalle del pedido</a></div><br>
        @php
          $total_quantity = 0;
          $total_original = 0;
          $total_final = 0;
          $total_igv = 0;
          $total_discount = 0;
        @endphp

          <div class="title-content">La orden:</div><br>
         {{-- <table style="border-collapse:collapse;border-spacing:0;width:90%;margin:0 auto" >
      <thead style="border-top:1px dashed #828286;border-bottom:1px dashed #828286" >
      <tr>
        <th style="padding-bottom:1rem;padding-top:1rem" >Empresa</th>
        <th style="padding-bottom:1rem;padding-top:1rem" >Producto</th>
        <th style="padding-bottom:1rem;padding-top:1rem" >Cantidad</th>
        <th style="padding-bottom:1rem;padding-top:1rem" >Precio Unit.</th>
        <th style="padding-bottom:1rem;padding-top:1rem" >Dscto.</th>
        <th style="padding-bottom:1rem;padding-top:1rem" >P. Total</th>
      </tr>
      </thead>
            <tbody style="border-top:1px dashed #828286;border-bottom:1px dashed #828286;     font-size: 12px;">
              @foreach($orders as $key => $order)
              
                    @if(isset($order->total_igv))
                    $total_igv += $order['total_igv']
                    @endif

                @foreach($order['products'] as $i => $product)
                  @php
                    $total_quantity += $product['quantity'];
                    $total_original += $product['discount']*$product['quantity'];
                    $total_final += $product['price']*$product['quantity'];
                    $total_discount += $product['discount'] - $product['price'];
                  @endphp

                  @if($i == 0)
                  <tr style="border-bottom: 1px dashed #828286;">
                    <td rowspan="{{ count($order['products']) + 1 }}" style="padding-top:1rem">{{ $order['company_name'] }}</td>
                    <td style="padding-top:1rem">{{ $product['name'] }}</td>
                    <td style="padding-top:1rem" >{{ $product['quantity'] }}</td>
                    <td style="padding-top:1rem" >{{ $product['discount'] }}</td>
                    <td style="padding-top:1rem" >{{ round($product['discount'] - $product['price'], 2) }}</td>
                    <td style="padding-top:1rem" >{{ $product['price']*$product['quantity'] }}</td>
                  </tr>
                  @else
                  <tr style="border-bottom: 1px dashed #828286;">
                    <td style="padding-top:1rem">{{ $product['name'] }}</td>
                    <td style="padding-top:1rem">{{ $product['quantity'] }}</td>
                    <td style="padding-top:1rem">{{ $product['discount'] }}</td>
                    <td style="padding-top:1rem">{{ $product['discount'] - $product['price'] }}</td>
                    <td style="padding-top:1rem">{{ $product['price']*$product['quantity'] }}</td>
                  </tr>
                  @endif
                @endforeach
                  <tr style="border-bottom: 1px dashed #828286;">
                    <td colspan="4" style="padding-top:1rem; text-align: right;"><b> Total:&nbsp; </b></td>
                    <td style="padding-top:1rem">{{ $order['total'] }}</td>
                  </tr>
                @endforeach
              <!-- /////////////////////Totales/////////////////// -->
              <tr style="border-bottom: 1px dashed #828286; border-top: 1px  dashed #828286;">
                <td colspan="3" style="padding-top:1rem; text-align: right;"><b>CANTIDAD TOTAL:</b></td>
                <td style="padding-top:1rem">{{ $total_quantity }}</td>
                <td style="padding-top:1rem"><b>SUB TOTAL:</b></td>
                <td style="padding-top:1rem">{{ $total_original }}</td>
              </tr>
              <tr style="border-bottom: 1px dashed #828286;">
                <td colspan="5" style="padding-top:1rem; text-align: right;"><b>IGV:</b></td>
                <td style="padding-top:1rem">{{ $total_discount }}</td>
              </tr>

              <tr style="border-bottom: 1px dashed #828286;">
                    <td colspan="5" style="padding-top:1rem; text-align: right;"><b>IGV:</b></td>
                    <td style="padding-top:1rem">{{ $total_igv }}</td>
               </tr>

              <tr style="border-bottom: 1px dashed #828286;">
                <td colspan="5" style="padding-top:1rem; text-align: right;"><b>TOTAL:</b></td>
                <td style="padding-top:1rem"><strong style="color:purple">S/ {{ $total_final + $total_igv }}</strong></td>
              </tr>
            </tbody>
          </table>--}}




          <div class="text-center" style="font-size: 11px; padding: 40px 0px;">Gracias por confiar en nuestra empresa.</div>
          <div class="text-center">
            <a href="#" class="btn btn-primary"><i class="fab fa-facebook fa-2x"></i></a>
            <a href="#" class="btn btn-primary"><i class="fab fa-twitter-square fa-2x"></i></a>
          </div>
        </div>
        <!-- Pie de banner -->
        <div class="text-center text-white" style="background-color: #339e89; padding: 20px 0px;">
          {{-- $company_main_name --}} - Todos los derechos reservados - Tacna - Perú
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>

  </body>
</html>