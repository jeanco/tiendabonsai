@extends('oyeepe.layouts.index')
@section('content')
<!-- Slide Section -->

<!-- Contenido -->
<div class="content-margin" style="margin-bottom: 50px;">
  @include('oyeepe.empresa.register.1_empresa')
  @include('oyeepe.empresa.register.2_representante')
</div>
@stop
@section('pulgins-js')
<script src="/website/js/register.js"></script>
@stop
