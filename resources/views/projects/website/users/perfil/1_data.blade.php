  <div style="font: bold 20px 'Poppins', sans-serif; margin-bottom: 15px; color: #ff6600">Datos Personales</div>
  <input type="hidden" name="" id="profile_id" value="{{ $customer['user_id'] }}">
  <div style="margin-bottom: 5px;">
    <span style="font-size: 15px;">DNI</span>
    <input type="text" class="form-control" id="profile_ruc" value="{{ $customer['identity_document'] }}">
  </div>
  <div style="margin-bottom: 5px;">
    <span style="font-size: 15px;">Nombre</span>
    <input type="text" class="form-control" id="profile_first-name" value="{{ $customer['first_name'] }}">
  </div>
  <div style="margin-bottom: 5px;">
    <span style="font-size: 15px;">Apellido</span>
    <input type="text" class="form-control" id="profile_last-name" value="{{ $customer['last_name'] }}">
  </div>
  <div style="margin-bottom: 5px;">
    <span style="font-size: 15px;">Numero de Celular</span>
    <input type="text" class="form-control" id="profile_cel-whatsapp" value="{{ $customer['cel_whatsapp'] }}">
  </div>
  <div style="margin-bottom: 5px;">
    <span style="font-size: 15px;">Correo Electrónico</span>
    <input type="text" class="form-control" id="profile_email" value="{{ $customer['email'] }}">
  </div>
  <div style="margin-bottom: 5px;">
    <span style="font-size: 15px;">Dirección</span>
    <input type="text" class="form-control" id="profile_address" value="{{ $customer['address'] }}">
  </div>
  <div style="margin-bottom: 5px;">
    <input type="hidden" name="" id="profile_city-id" value="{{ ($customer['city_id'] == 0) ? null : $customer['city_id'] }}">
    <span style="font-size: 15px;">País</span>
    <select name="CountryType" id="profile_country" class="form-control">
        <option value="">Seleccione País</option>
        @foreach($countries as $k => $country)
          @if($customer['country_id'] == $country['id'])
            <option value="{{ $country['id'] }}" selected="selected">{{ $country['name'] }}</option>
          @else
            <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
          @endif
        @endforeach
    </select>
  </div>
  <div style="margin-bottom: 20px;">
    <span style="font-size: 15px;">Ciudad</span>
    <select name="CountryType" id="profile_city" class="form-control">
      <option value="">Seleccione Ciudad</option>
    </select>
  </div>

  <div style="font: bold 20px 'Poppins', sans-serif; margin-bottom: 15px; color: #ff6600">Datos de Usuario</div>

  <div style="margin-bottom: 5px;">
    <span style="font-size: 15px;">Nombre de Usuario</span>
    <input type="text" class="form-control" id="profile_username" value="{{ $customer['user']['username'] }}">
  </div>
  <div style="margin-bottom: 5px;">
    <span style="font-size: 15px;">Fecha de Nacimiento</span>

    <input type="date" name="" class="form-control" id="profile_birthday" value="{{ $customer['user']['birthday'] }}">
  </div>
  <div style="margin-bottom: 5px;">
    <span style="font-size: 15px;">Sexo</span>
    <select class="form-control" id="profile_gender">
        <option value="1" {{ ($customer['user']['gender'] == 1) ? 'selected' : '' }}>Masculino</option>
        <option value="2" {{ ($customer['user']['gender'] == 2) ? 'selected' : '' }}>Femenino</option>
        <option value="3" {{ ($customer['user']['gender'] == 3) ? 'selected' : '' }}>Otros</option>
    </select>
  </div>
  <div style="margin-bottom: 5px;">
    <span style="font-size: 15px;">Contraseña</span>
    <input type="text" name="" class="form-control" id="profile_password" value="">
    <div id="profile-password-error" class="mensaje-error text-danger"></div>
  </div>
  <div style="margin-bottom: 20px;">
    <span style="font-size: 15px;">Repetir Contraseña</span>
    <input type="text" name="" class="form-control" id="profile_password-verification" value="">
    <div id="profile-password-confirmation-error" class="mensaje-error text-danger"></div>
  </div>

  <center><a href="" data-toggle="tab" class="btn btn-black" id="profile__update" style="width: 320px; margin-bottom: 20px;"><span style="font-size: 18px;">Editar</span></a></center>
