<div class="col-lg-4 col-md-8 col-12 order-lg-1">
    <div class="sidebar right-side">
        <div class="aside-title"><h5>Busca a tu medida</h5></div>
        <div class="mb-2">
            <select class="select-catalog" id="product-perfil_categories">
                <option value="">Tipo de Operación</option>
                @foreach($categories as $key => $category)
                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <select class="select-catalog" id="product-perfil_subcategories">
                <option>Departamento</option>
                <option>Hoteles</option>
                <option>areas</option>
            </select>
        </div>
        <div class="find-home-item mb-3">
            <input type="text" name="min-area" placeholder="Buscar por distrito" style="border-radius: 10px; padding-left: 15px;" id="product-perfil_text-to-search">
        </div>
        <div class="mb-4">
            <div class="find-home-item">
                <button type="button" style="border-radius: 10px;" id="product-perfil__search">BUSCAR</button>
            </div>
        </div>

        <div class="contact-form text-center">
            <div class="text-uppercase font-weight-bold" style="font-size: 20px;">Enviar mensaje</div>
            <div class="mb-4" style="font-size: 16px;">Miranda a su servicio</div>
            <div class="mb-2"><input class="contact-input form-control" id="product-perfil-contact-name" type="text" placeholder="Ingrese su Nombre">
            <div id="product-perfil-contact-name-error" class="mensaje-error text-danger"></div>
        </div>
        <div class="mb-2"><input class="contact-input form-control" id="product-perfil-contact-cel" type="text" placeholder="Ingrese su Número Celular">
        <div id="product-perfil-contact-cel-error" class="mensaje-error text-danger"></div>
    </div>
    <div class="mb-3"><textarea class="contact-input form-control" id="product-perfil-contact-message" rows="5" placeholder="Ingrese el mensaje" value="">Hola. Estoy interesado en el Proyecto {{ $product['name'] }} ubicado en {{ $product['address'] }} .Muchas gracias.</textarea>
        <div id="product-perfil-contact-message-error" class="mensaje-error text-danger"></div>
    </div>
    <div class="text-right">
        <button type="button" class="btn btn-contact" id="product-perfil-contact__send">ENVIAR</button>
    </div>
</div>
<br>
{{-- <div class="aside-title"><h5>Filtros</h5></div>
<div class="mb-2">
    <select class="select-catalog">
        <option>Tipo de  Inmueble</option>
        <option>Departamento</option>
        <option>Terreno</option>
    </select>
</div> --}}
<br>
<!--  -->
{{-- <aside class="single-side-box search-property">
    <div class="find_home-box">
        <div class="find_home-box-inner">
            <form action="properties-sidebar.html#">
                <div class="find-home-cagtegory">
                    <!--  -->
                    <div class="row find-home_bottom">
                        <div class="col-12">
                            <div class="find-home-item">
                                <!-- shop-filter -->
                                <div class="shop-filter">
                                    <div class="price_filter">
                                        <div class="price_slider_amount">
                                            <input type="submit" value="Rango de precio" />
                                            <input type="text" id="amount" name="price"
                                            placeholder="Añadir precio" />
                                        </div>
                                        <div id="slider-range"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</aside> --}}
<aside class="single-side-box feature">
    @foreach($categories_with_products as $u => $category)
    <div class="aside-title">
        <h5>{{ $category['name'] }} Destacados</h5>
    </div>
    <div class="feature-property">
        <div class="row">
            @foreach($category['products'] as $c => $product)
            <div class="col-md-6 col-6">
                <div class="single-property">
                    <div class="property-img">
                        <a href="/catalogo/{{ $product['slug'] }}">
                            <img src="{{ ($product['photo'] != null) ? $product['photo']['resource_thumb'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" class="feature__img">
                        </a>
                    </div>
                    <div class="property-desc text-center">
                        <div class="property-desc-top">
                            <div style="height: 65px;">
                                <h6><a href="/catalogo/{{ $product['slug'] }}" style="font-size: 12px;">{{ $product['name'] }}</a></h6>
                            </div>
                            <h4 class="price">S/{{ $product['price'] }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</aside>
</div>
</div>
<script type="text/javascript">
$(`#home_category`).on('change', function(e){
let _categoryId = e.target.value;
axios.get(`/api/categories/${_categoryId}/subcategories-published`)
.then((risposta) => {
let _subcategories = risposta.data;
fillSelectWithOutFirstOption(getElement(`#home_subcategory`), _subcategories, null);
$(`#home_subcategory`).selectpicker('refresh');
// charge_attributes();
// $(`#home_subcategory`).html(``);
});
});
</script>
