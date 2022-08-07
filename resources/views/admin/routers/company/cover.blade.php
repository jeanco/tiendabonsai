<div class="col-md-12 u-px0">
  <div class="col-md-8">
    <div class="tab-wrapper row u-px3">
      <h3 class="text-center u-tertiary">Galería de Imágenes</h3>
      <div class="u-mb3 col-md-12">
        <label class="control-label col-md-12">
          <i class="glyphicon glyphicon-camera"></i>Fotos para todas las secciones de la empresa.
        </label>
        <h4 style="font-weight: bold;">Páginas</h4>
        <ul>
          <li style="list-style:none;">1. Foto Nosotros</li>
          <!--li style="list-style:none;">1. Banner de Cita (1500px x 230px)</li>
          <li style="list-style:none;">1. Banner de Normativa (1500px x 230px)</li>
          <li style="list-style:none;">1. Banner de Contacto (1350px x 500px)</li-->
        </ul>
         <!--h4 style="font-weight: bold;">Página Contacto</h4>
        <ul>
          <li style="list-style:none;">6. Banner de contacto (1200px x 444px)</li>
        </ul>
        <h4 style="font-weight: bold;">Página Suscríbete</h4>
        <ul>
          <li style="list-style:none;">7. Imagen Banner (1200px x 444px)</li>
        </ul-->
         <!-- (1350x350): -->
        @if(in_array('agregar-fotos', $permissions_array))
        <div class="col-md-12">
  				{!! Form::open(['route'=> 'upload', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
    	    {!! Form::close() !!}
        </div>
        @endif
      </div>

      <div class="col-md-12 u-mb3">
        <ul class="owl-carousel owl-carousel--image owl-carousel--category o-wrapper u-relative" id="company_carousel">
    		@foreach($imagesCompany as $key => $image)
    			<li class="item item__photo">
    			  <img src="{{$image->resource_thumb}}" width="100%"/>
    			  <div class="item__controls">
              @if(in_array('eliminar-fotos', $permissions_array))
    				  <button type="button" class="btn btn-primary company_delete_cover" data-index="{{$image->id}}" title="Eliminar">
    				    <i class="glyphicon glyphicon-trash"></i>
              </button>
              @endif
    			  </div>
    			</li>
    		@endforeach
        </ul>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="tab-wrapper row u-p3">
      <h3 class="text-center u-tertiary">Videos</h3>
      <label class="control-label col-md-12">
        <i class="glyphicon glyphicon-facetime-video"></i>Conjunto de Vídeos:
      </label>

      @if(in_array('agregar-videos', $permissions_array))
      <div class="col-md-12 u-mb4">
        <button data-target="#add-video" data-toggle="modal" class="dropzone" id="company_add_video">
          <i class="glyphicon glyphicon-play mrm"></i>
          <label for="">Añadir Video</label>
  	    </button>
      </div>
      @endif

      <input type="hidden" id="cover_delete-photo" value={{ in_array('eliminar-fotos', $permissions_array) }}>
      <input type="hidden" id="cover_edit-video" value={{ in_array('editar-videos', $permissions_array) }}>
      <input type="hidden" id="cover_delete-video" value={{ in_array('eliminar-videos', $permissions_array) }}>

      <ul class="col-md-12 u-px3" id="company_videos">
        {{-- @for($i=0; $i < 4 ; $i++)
          <div class="col-lg-12 col-sm-6 u-px1">
            <li class="item-video">
              <iframe width="100%" height="130" src="https://www.youtube-nocookie.com/embed/_TUTJ0klnKk?rel=0" frameborder="0" allowfullscreen></iframe>
              <div class="item__controls">
                <button type="button" class="btn bg-secondary" data-target="#add-video" data-toggle="modal" title="Editar">
                  <i class="glyphicon glyphicon-pencil"></i>
                </button>
                <button type="button" class="btn btn-danger" title="Eliminar">
                  <i class="glyphicon glyphicon-trash"></i>
                </button>
              </div>
            </li>
          </div>
        @endfor --}}
      </ul>
    </div>
  </div>
</div>
