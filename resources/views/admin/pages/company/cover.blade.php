<div class="col-md-12 u-px0">
  <div class="col-md-8">
    <div class="tab-wrapper row u-px3">
      <h3 class="text-center u-tertiary">Portada</h3>
      <div class="col-md-12 ">
        <label class="control-label col-md-12">
          <i class="glyphicon glyphicon-file"></i>Título y Subtítulo de Portada:
        </label>
    		{!! Form::open(array('id' => 'form-company-slogan', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
      		<input type="hidden" name="_method" value="PUT" />

          <div class="col-md-6 u-mb3">
  	        <textarea rows="3" class="form-control" id="company_title_slogan" name="title_slogan" placeholder="Escribe el Título"></textarea>
          </div>

          <div class="col-md-6 u-mb3">
  	        <textarea rows="3" class="form-control" id="company_subtitle_slogan" name="subtitle_slogan" placeholder="Escribe el Subtítulo"></textarea>
          </div>
	      {!! Form::close() !!}
      </div>

	  <div class="col-md-12 text-right u-mb5">
  		<div class="col-md-12">
  		  <button type="button" class="btn btn-success" id="company-slogan-save">
  			<i class="glyphicon glyphicon-floppy-disk u-mr2"></i>Guardar
  		  </button>
  		</div>
	  </div>

      <div class="u-mb3 col-md-12">
        <label class="control-label col-md-12">
          <i class="glyphicon glyphicon-camera"></i>Fotos de Portada:
        </label>
        <div class="col-md-12">
  				{!! Form::open(['route'=> 'upload', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
     	    	{!! Form::close() !!}
        </div>
      </div>

      <div class="col-md-12 u-mb3">
        <ul class="owl-carousel owl-carousel--image owl-carousel--category o-wrapper u-relative" id="company_carousel">
    		@foreach($imagesCompany as $key => $image)
    			<li class="item item__photo">
    			  <img src="{{$image->resource}}" width="100%"/>
    			  <div class="item__controls">
    				<button type="button" class="btn btn-primary company_delete_cover" data-index="{{$image->id}}" title="Eliminar">
    				  <i class="glyphicon glyphicon-trash"></i>
    				</button>
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

      <div class="col-md-12 u-mb4">
        <button data-target="#add-video" data-toggle="modal" class="dropzone" id="company_add_video">
          <i class="glyphicon glyphicon-play mrm"></i>
          <label for="">Añadir Video</label>
  	    </button>
      </div>

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
        @endfor --!!}
      </ul>
    </div>
  </div>
</div>
