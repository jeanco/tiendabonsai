@extends('oyeepe.layouts.index')
@section('content')
<!-- Slide Section -->
@include('oyeepe.home.1_slide')

<!-- Contenido -->
<div class="content-margin">
  @include('oyeepe.pedidos.1_registro')
</div>
@stop
@section('pulgins-js')
<script src="/website/js/users.js"></script>
@stop
