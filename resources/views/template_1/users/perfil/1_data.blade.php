<form id="profile_form">
  <input type="hidden" name="_method" value="PUT" />
  {{ csrf_field() }}

  <div style="font: bold 20px 'Poppins', sans-serif; margin-bottom: 15px; color: #ff6600">Datos Personales</div>
  <input type="hidden" name="customer_id" id="profile_id" value="{{ $customer['id'] }}">
  <input type="hidden" name="user_id" value={{ $user_id }}>
  <div class="row">
    <div class="col-md-6">
    <div class="form-group">
      <span style="font-size: 15px;">DNI</span>
      <input type="text" name="identity_document" class="form-control" id="profile_ruc" value="{{ $customer['identity_document'] }}">
      <div id="profile-identity_document-error" class="mensaje-error text-danger"></div>
    </div>
    <div class="form-group">
       <span style="font-size: 15px;">Nombre</span>
    <input type="text" name="first_name" class="form-control" id="profile_first-name" value="{{ $customer['first_name'] }}">
    <div id="profile-first_name-error" class="mensaje-error text-danger"></div>
    </div>
    <div class="form-group">
       <span style="font-size: 15px;">Numero de Celular</span>
    <input type="text" name="cel_whatsapp" class="form-control" id="profile_cel-whatsapp" value="{{ $customer['cel_whatsapp'] }}">
    <div id="profile-cel_whatsapp-error" class="mensaje-error text-danger"></div>
    </div>
    <div class="form-group">
      <span style="font-size: 15px;">Sexo</span>
    <select name="gender" class="form-control" id="profile_gender">
        <option value="1" {{ ($customer['user']['gender'] == 1) ? 'selected' : '' }}>Masculino</option>
        <option value="2" {{ ($customer['user']['gender'] == 2) ? 'selected' : '' }}>Femenino</option>
        <option value="3" {{ ($customer['user']['gender'] == 3) ? 'selected' : '' }}>Otros</option>
    </select>
    </div>
   

  </div>

  <div class="col-md-6">
    <div class="form-group">
       <span style="font-size: 15px;">Correo Electrónico</span>
    <input type="text" name="email" class="form-control" id="profile_email" value="{{ $customer['email'] }}">
    <div id="profile-email-error" class="mensaje-error text-danger"></div>
    </div>
   <div class="form-group">
       <span style="font-size: 15px;">Apellido</span>
    <input type="text" name="last_name" class="form-control" id="profile_last-name" value="{{ $customer['last_name'] }}">
    <div id="profile-last_name-error" class="mensaje-error text-danger"></div>
    </div>
    <div class="form-group">
       <span style="font-size: 15px;">Fecha de Nacimiento</span>
    <input type="text" name="birthday" class="form-control datepicker" id="profile_birthday" value="{{ $customer['birthday'] }}">
    <div id="profile-birthday-error" class="mensaje-error text-danger"></div>
    </div>
     <div class="form-group" style=" display: none;">
       <span style="font-size: 15px;">Dirección</span>
    <input type="text" name="address" class="form-control" id="profile_address" value="{{ $customer['address'] }}">
    <div id="profile-address-error" class="mensaje-error text-danger"></div>
    </div>
    
  </div>
  </div>
  

  <div style="font: bold 20px 'Poppins', sans-serif; margin-bottom: 15px; color: #ff6600">Datos de Envío</div>



  <div class="row">
    <div class="col-md-6">
    <div class="form-group">
    @if(count($customer['alternative_direction']))
      <input type="hidden" name="" id="profile_city-id" value="{{ $customer['alternative_direction']['city_id'] }}">
      <input type="hidden" name="" id="profile_province-id" value="{{ $customer['alternative_direction']['province_id'] }}">
      <input type="hidden" name="" id="profile_district-id" value="{{ $customer['alternative_direction']['district_id'] }}">
    @else
      <input type="hidden" id="profile_city-id" value="0">
      <!-- <input type="hidden" name="" id="profile_city-id" value="{{ $customer['alternative_direction']['city_id'] }}">
      <input type="hidden" name="" id="profile_province-id" value="{{ $customer['alternative_direction']['province_id'] }}">
      <input type="hidden" name="" id="profile_district-id" value="{{ $customer['alternative_direction']['district_id'] }}"> -->
    @endif

    <span style="font-size: 15px;">País</span>
    <select name="country_id" id="profile_country" class="form-control">
        <!-- <option value="">Seleccione País</option> -->
        @foreach($countries as $k => $country)
          @if($customer['alternative_direction']['country_id'] == $country['id'])
            <option value="{{ $country['id'] }}" selected="selected">{{ $country['name'] }}</option>
          @else
            <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
          @endif
        @endforeach
    </select>
    <div id="profile-country_id-error" class="mensaje-error text-danger"></div>
    </div>
    <div class="form-group">
       <span style="font-size: 15px;">Provincia</span>
    <select name="province_id" id="profile_province" class="form-control">
      <option value="">Seleccione Provincia</option>
    </select>
    <div id="profile-province_id-error" class="mensaje-error text-danger"></div>
    </div>
    <div class="form-group">
       <span style="font-size: 15px;">Dirección de envío</span>
    <input type="text" name="address_envio" class="form-control" id="profile_address_envio" value="{{ $customer['alternative_direction']['address'] }}">
    <div id="profile-address_envio-error" class="mensaje-error text-danger"></div>
    </div>


  </div>

  <div class="col-md-6">
    <div class="form-group">
       <span style="font-size: 15px;">Departamento</span>
        <select name="city_id" id="profile_city" class="form-control">
          <option value="">Seleccione Departamento</option>
        </select>
        <div id="profile-city_id-error" class="mensaje-error text-danger"></div>
    </div>
   <div class="form-group">
       <span style="font-size: 15px;">Distrito</span>
    <select name="district_id" id="profile_district" class="form-control">
      <option value="">Seleccione Distrito</option>
    </select>
    <div id="profile-district_id-error" class="mensaje-error text-danger"></div>
    </div>
  
   
  </div>
  </div>



  <div style="margin-bottom: 5px; display: none;">
    <span style="font-size: 15px;">DNI</span>
    <input type="text" name="identity_document_envio" class="form-control" id="profile_ruc_envio" value="{{ $customer['alternative_direction']['identity_document'] }}">
    <div id="profile-identity_document_envio-error" class="mensaje-error text-danger"></div>
  </div>
  <div style="margin-bottom: 5px; display: none;">
    <span style="font-size: 15px;">Nombre</span>
    <input type="text" name="first_name_envio" class="form-control" id="profile_first-name_envio" value="{{ $customer['alternative_direction']['first_name'] }}">
    <div id="profile-first_name_envio-error" class="mensaje-error text-danger"></div>
  </div>
  <div style="margin-bottom: 5px; display: none;">
    <span style="font-size: 15px;">Apellido</span>
    <input type="text" name="last_name_envio" class="form-control" id="profile_last-name_envio" value="{{ $customer['alternative_direction']['last_name'] }}">
    <div id="profile-last_name_envio-error" class="mensaje-error text-danger"></div>
  </div>
  <div style="margin-bottom: 5px; display: none;">
    <span style="font-size: 15px;">Número de Celular</span>
    <input type="text" name="cel_envio" class="form-control" id="profile_cel-whatsapp_envio" value="{{ $customer['alternative_direction']['cel'] }}">
    <div id="profile-cel_envio-error" class="mensaje-error text-danger"></div>
  </div>
  <div style="font: bold 20px 'Poppins', sans-serif; margin-bottom: 15px; color: #ff6600">Cambiar mi contraseña</div>

  <div style="margin-bottom: 5px; display: none;">
    <span style="font-size: 15px;">Nombre de Usuario</span>
    <input type="text" name="username" class="form-control" id="profile_username" value="{{ $customer['user']['username'] }}">
    <div id="profile-username-error" class="mensaje-error text-danger"></div>
  </div>
  <div style="margin-bottom: 5px;">
   
  </div>
  <div style="margin-bottom: 5px;">
    
  </div>
  <div style="margin-bottom: 5px;">
    <span style="font-size: 15px;">Contraseña</span>
    <input type="text" name="password" class="form-control" id="profile_password" value="">
    <div id="profile-password-error" class="mensaje-error text-danger"></div>
  </div>
  <div style="margin-bottom: 20px;">
    <span style="font-size: 15px;">Confirmar Contraseña</span>
    <input type="text" name="password_confirmation" class="form-control" id="profile_password-verification" value="">
    <div id="profile-password_confirmation-error" class="mensaje-error text-danger"></div>
  </div>

  <center><a href="" data-toggle="tab" class="btn btn-black" id="profile__update" style="width: 320px; margin-bottom: 20px;"><span style="font-size: 18px;">Guardar</span></a></center>
  </form>
