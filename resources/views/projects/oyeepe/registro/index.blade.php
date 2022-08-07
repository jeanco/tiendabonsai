@extends('oyeepe.layouts.index')
@section('content')
<!-- Slide Section -->
@include('oyeepe.home.1_slide')

<!-- Contenido -->
<div class="content-margin" style="margin-bottom: 50px;">
  @include('oyeepe.registro.1_empresa')
  @include('oyeepe.registro.2_representante')
</div>
@stop
@section('pulgins-js')
<script src="/website/js/register.js"></script>
@stop
