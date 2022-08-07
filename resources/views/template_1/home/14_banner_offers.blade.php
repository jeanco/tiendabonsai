<div class="container margin_60_35 add_bottom_30">
  @php
    $index = 0;
  @endphp
  @for($i=0;$i<$catalog_rows; $i++)
    @if($i%2 == 0)
      <div class="row mb-4">
        @if(isset($catalogs[$index]))
        <div class="col-md-8">
          <a href="{{ $catalogs[$index]->link }}" target="_blank" class="sm_none"><img src="{{ $catalogs[$index]->image_desktop }}" alt="" style="width: 100%; min-height: 400px;"></a>
          <a href="{{ $catalogs[$index]->link }}" target="_blank" class="md_none"><img src="{{ $catalogs[$index]->image_movil }}" alt="" style="width: 100%; min-height: 400px;"></a>
        </div>
        @endif
        @if(isset($catalogs[$index+1]))
        <div class="col-md-4">
          <a href="{{ $catalogs[$index]->link }}" target="_blank"><img src="{{ $catalogs[$index+1]->image_desktop }}" alt="" style="width: 100%; min-height: 400px;"></a>
        </div>
        @endif
        @php
          $index += 2;
        @endphp
      </div>
    @else
    <div class="row">
      @if(isset($catalogs[$index]))
      <div class="col-md-4">
        <a href="{{ $catalogs[$index]->link }}" target="_blank"><img src="{{ $catalogs[$index]->image_desktop }}" alt="" style="width: 100%; min-height: 400px;"></a>
      </div>
      @endif
      @if(isset($catalogs[$index+1]))
      <div class="col-md-8">
        <a href="{{ $catalogs[$index]->link }}" target="_blank" class="sm_none"><img src="{{ $catalogs[$index+1]->image_desktop }}" alt="" style="width: 100%; min-height: 400px;"></a>
        <a href="{{ $catalogs[$index]->link }}" target="_blank" class="md_none"><img src="{{ $catalogs[$index+1]->image_movil }}" alt="" style="width: 100%; min-height: 400px;"></a>
      </div>
      @endif
        @php
          $index += 2;
        @endphp
    </div>
    @endif
  @endfor
</div>
