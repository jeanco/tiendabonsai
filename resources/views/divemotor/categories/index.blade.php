@extends('divemotor.layouts.index')
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row mb-3 mt-3">
    <div class="col-12 align-self-center text-center font-bold" style="font-size: 24px;">Categorías</div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="card">
    <div class="card-body">
      <div class="row">
          <div class="col-3">
                <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" data-toggle="pill" href="#bus" role="tab" style="display: table;     height: 80px;   width: 100%;">
                      <div style="display: table-cell; vertical-align: middle;">
                        <img src="/images/categoria1.png" alt="" style="width: 50px">&emsp;
                        <span class="hidden-xs-down">Buses</span>
                      </div>
                    </a>
                    <a class="nav-link" data-toggle="pill" href="#truck" role="tab" style="display: table;     height: 80px;    width: 100%;">
                      <div style="display: table-cell; vertical-align: middle;">
                        <img src="/images/categoria2.png" alt="" style="width: 50px">&emsp;
                        <span class="hidden-xs-down">Camiones</span>
                      </div>
                    </a>
                </div>
          </div>
          <div class="col-9">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="bus" role="tabpanel">
                        <div class="row justify-content-center">
                          <div class="col-md-6 col-xs-12">
                            <a href="{{ URL::to('/dive-catalogo') }}">
                              <div class="card">
                                  <div class="box bg-dev1 text-center">
                                      <h1 class="font-light text-white">Turismo</h1>
                                      <div class="p-3">
                                        <img src="/images/subcat1.png" alt="" style="height: 150px;">
                                      </div>
                                  </div>
                              </div>
                            </a>
                          </div>
                          <div class="col-md-6 col-xs-12">
                            <a href="{{ URL::to('/dive-catalogo') }}">
                              <div class="card">
                                  <div class="box bg-dev1 text-center">
                                      <h1 class="font-light text-white">Interprovincial</h1>
                                      <div class="p-3">
                                        <img src="/images/subcat2.png" alt="" style="height: 150px;">
                                      </div>
                                  </div>
                              </div>
                            </a>
                          </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="truck" role="tabpanel">
                        <div class="row justify-content-center">
                          <div class="col-md-6 col-xs-12">
                            <a href="{{ URL::to('/dive-catalogo') }}">
                              <div class="card">
                                  <div class="box bg-dev1 text-center">
                                      <h1 class="font-light text-white">Minero</h1>
                                      <div class="p-3">
                                        <img src="/images/subcat1.png" alt="" style="height: 150px;">
                                      </div>
                                  </div>
                              </div>
                            </a>
                          </div>
                          <div class="col-md-6 col-xs-12">
                            <a href="{{ URL::to('/dive-catalogo') }}">
                              <div class="card">
                                  <div class="box bg-dev1 text-center">
                                      <h1 class="font-light text-white">Civil</h1>
                                      <div class="p-3">
                                        <img src="/images/subcat2.png" alt="" style="height: 150px;">
                                      </div>
                                  </div>
                              </div>
                            </a>
                          </div>
                        </div>
                    </div>
                </div>
          </div>
      </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
@stop

@section('plugins-css')
@stop
@section('plugins-js')
@stop
