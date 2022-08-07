<header class="c-header">
  @php
    $user_logged = Auth::user();
    $company = \App\Company::find($user_logged->company_id);
    $projects = \App\Project::all();
  @endphp
  <a href="{{ route('dashboard')}}" class="c-header__logo">
    <img class="c-header__logo-image hidden-xs hidden-sm" src="{{$company->logotype}}"  />
    <img class="c-header__logo-image hidden-md hidden-lg" src="{{$company->logotype_thumb}}" />
  </a>

  <nav class="c-header__nav">
    <ul class="u-flex--header nav nav-tabs ul-edit">
      <li class="c-header__link"><a href="{{ route('company')}}">La Empresa</a></li>

      @if(in_array('ver-modulo-en-la-barra-superior', $permissions_array))
      {{--<li class="c-header__link"><a href="{{ route('product-grid')}}">Productos</a></li>--}}
      <li class="c-header__link"><a href="{{ route('products-list')}}">Productos Lista</a></li>
      @endif

      

      {{-- <li class="c-header__link"><a href="{{ route('inventory')}}">Inventario</a></li>--}}

      @if(in_array('ver-modulo-de-pedidos', $permissions_array))
      <li class="c-header__link"><a href="{{ route('orders')}}">Pedidos</a></li>
      @endif

      {{--<li class="c-header__link"><a href="{{ route('orders-list')}}">Pedidos Lista</a></li>--}}

      @if(in_array('ver-modulo-de-suscripciones', $permissions_array))
      <li class="c-header__link"><a href="{{ route('subscriptions')}}">Suscripciones</a></li>
      @endif

      <li class="c-header__link" style="display: none;"><a href="{{ route('quotation')}}">Cotización</a></li>

    </ul>

    @if(in_array('ver-modulo-de-plantillas', $permissions_array))
    <li class="dropdown c-header__user">
        <button type="button" data-toggle="dropdown" data-hover="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
          @foreach($projects as $i => $project)
         @if($project->status == 1)
          <span class="hidden-xs hidden-sm">{{ $project->name }}</span>
          @endif
          @endforeach
          <span class="caret"></span>
        </button>

        <ul class="dropdown-menu dropdown-user pull-right">
          @foreach($projects as $i => $project)
          <li class="{{ $project->status == 1 ? 'active' : '' }} project_click" data-index='{{ $project->id }}'  ><a href="#"  >{{ $project->name }}</a></li>
          @endforeach
        </ul>
      </li>
    @endif

    <ul class="u-flex--header u-pl0">
      @if(in_array('ver-boton-mi-tienda', $permissions_array))
        <li class="c-header__link " >
            <a href="/preview" target="_blank">Ver mi tienda</a>
        </li>
      @endif


      <li class="dropdown c-header__user">
        <button type="button" data-toggle="dropdown" data-hover="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
          <figure>
            <img src="{{Auth::user()->user_image_thumb}}" id="img-user-photo">
          </figure>
          <span class="hidden-xs hidden-sm">{{Auth::user()->first_name}}</span>
          <span class="caret"></span>
        </button>

        <ul class="dropdown-menu dropdown-user pull-right">
          @if(in_array('editar-permisos', $permissions_array))
          <li><a href="/admin/permisos?index={{Auth::user()->id}}">Configurar mis permisos</a></li>
          @endif
          <li><a href="#" id="user_editar_perfil" data-index='{{Auth::id()}}'>Editar Perfil</a></li>
	        {{-- <li><a href="#" id="user_editar_perfil" data-index="{{Auth::user()->id}}">Editar Perfil</a></li> --}}

          <li><a href="#" id="user_editar_password">Cambiar contraseña</a></li>
          <li><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
        </ul>
      </li>
    </ul>
  </nav>
</header>
