

@extends('template_10.layouts.index')
@section('content')

	<main class="bg_gray">
		<div class="container">
            <div class="row justify-content-center">
				<div class="col-md-10">
					<div id="confirm">
						<div class="icon icon--order-success svg add_bottom_15">
							<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
								<g fill="none" stroke="#8EC343" stroke-width="2">
									<circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
									<path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
								</g>
							</svg>
						</div>

				<div class="display-table text-center">
        <div class="display-table-cell">
          <div class="container pt-0 pb-0">
            <div class="row">
              <div class="col-md-12 col-md-offset-2">
                <h2 class="font-weight-600 text-theme-colored2 font-50 mb-0" style="color: #1d509d !important;">{{ $customer['identity_document'] }} - {{ $customer['first_name'] }} {{ $customer['last_name'] }}</h2>

                <div class="row">
                  <div class="col-md-3">
                    @if($customer['certificate_one'])
                        <p class="font-14"><a href="https://docs.google.com/viewerng/viewer?url={{ $customer['certificate_one'] }}" target="_blank">Enlace del Certificado</a></p>

                        <iframe src="https://docs.google.com/viewer?url={{ $customer['certificate_one'] }}&embedded=true" width="100%" height="300" style="border: none;"></iframe>
                    @endif
                  </div>
                   <div class="col-md-3">
                    @if($customer['certificate_two'])
                        <p class="font-14"><a href="https://docs.google.com/viewerng/viewer?url={{ $customer['certificate_two'] }}" target="_blank">Enlace del Certificado</a></p>

                        <iframe src="https://docs.google.com/viewer?url={{ $customer['certificate_two'] }}&embedded=true" width="100%" height="300" style="border: none;"></iframe>
                    @endif
                  </div>
                   <div class="col-md-3">
                    @if($customer['certificate_three'])
                        <p class="font-14"><a href="https://docs.google.com/viewerng/viewer?url={{ $customer['certificate_three'] }}" target="_blank">Enlace del Certificado</a></p>

                        <iframe src="https://docs.google.com/viewer?url={{ $customer['certificate_three'] }}&embedded=true" width="100%" height="300" style="border: none;"></iframe>
                    @endif
                  </div>
                   <div class="col-md-3">
                    @if($customer['certificate_four'])
                        <p class="font-14"><a href="https://docs.google.com/viewerng/viewer?url={{ $customer['certificate_four'] }}" target="_blank">Enlace del Certificado</a></p>

                        <iframe src="https://docs.google.com/viewer?url={{ $customer['certificate_four'] }}&embedded=true" width="100%" height="300" style="border: none;"></iframe>
                    @endif
                  </div>
                  <div class="col-md-3">
                    @if($customer['certificate_five'])
                        <p class="font-14"><a href="https://docs.google.com/viewerng/viewer?url={{ $customer['certificate_five'] }}" target="_blank">Enlace del Certificado</a></p>

                        <iframe src="https://docs.google.com/viewer?url={{ $customer['certificate_five'] }}&embedded=true" width="100%" height="300" style="border: none;"></iframe>
                    @endif
                  </div>
                  <div class="col-md-3">
                    @if($customer['certificate_six'])
                        <p class="font-14"><a href="https://docs.google.com/viewerng/viewer?url={{ $customer['certificate_six'] }}" target="_blank">Enlace del Certificado</a></p>

                        <iframe src="https://docs.google.com/viewer?url={{ $customer['certificate_six'] }}&embedded=true" width="100%" height="300" style="border: none;"></iframe>
                    @endif
                  </div>
                  <div class="col-md-3">
                    @if($customer['certificate_seven'])
                        <p class="font-14"><a href="https://docs.google.com/viewerng/viewer?url={{ $customer['certificate_seven'] }}" target="_blank">Enlace del Certificado</a></p>

                        <iframe src="https://docs.google.com/viewer?url={{ $customer['certificate_seven'] }}&embedded=true" width="100%" height="300" style="border: none;"></iframe>
                    @endif
                  </div>
                  <div class="col-md-3">
                    @if($customer['certificate_eight'])
                        <p class="font-14"><a href="https://docs.google.com/viewerng/viewer?url={{ $customer['certificate_eight'] }}" target="_blank">Enlace del Certificado</a></p>

                        <iframe src="https://docs.google.com/viewer?url={{ $customer['certificate_eight'] }}&embedded=true" width="100%" height="300" style="border: none;"></iframe>
                    @endif
                  </div>
                  <div class="col-md-3">
                    @if($customer['certificate_nine'])
                        <p class="font-14"><a href="https://docs.google.com/viewerng/viewer?url={{ $customer['certificate_nine'] }}" target="_blank">Enlace del Certificado</a></p>

                        <iframe src="https://docs.google.com/viewer?url={{ $customer['certificate_nine'] }}&embedded=true" width="100%" height="300" style="border: none;"></iframe>
                    @endif
                  </div>
                  <div class="col-md-3">
                    @if($customer['certificate_ten'])
                        <p class="font-14"><a href="https://docs.google.com/viewerng/viewer?url={{ $customer['certificate_ten'] }}" target="_blank">Enlace del Certificado</a></p>

                        <iframe src="https://docs.google.com/viewer?url={{ $customer['certificate_ten'] }}&embedded=true" width="100%" height="300" style="border: none;"></iframe>
                    @endif
                  </div>
                </div>
               
             	

            
              <br><br>
                      <div class="btn_add_to_cartx"><a href="/consultar-certificados" class="btn_1"  style="width: 100%; margin: 10px 0 10px 0; display: inline;    padding: 10px 18px;">Buscar más</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>


				
						

					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->

	</main>
	<!--/main-->

@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_10/css/checkout.css" rel="stylesheet">


@stop
@section('plugins-js')


@stop



