@foreach($category_attributes as $category_attribute)
<div class="form-group">
    <label>{{ $category_attribute['name'] }}:</label>
    <select class="custom-select-box catalog-attribute__change">
        <option value="">Todos</option>
        @foreach($category_attribute['attributes_relationship'] as $i => $attribute)
        <option value="{{ $attribute['id'] }}">{{ $attribute['name'] }}</option>
        @endforeach
        {{--
        <option>Grand i10</option>
        <option>i20 active</option>
        <option>Santa Fe</option>
        --}}
    </select>
</div>
@endforeach

{{--
<div class="form-group">
    <label>Año:</label>
    <select class="custom-select-box attribute-filter-by">
        <option>Todos</option>
        <option>2012-2013</option>
        <option>2013-2014</option>
        <option>2014-2015</option>
        <option>2015-2016</option>
        <option>2016-2017</option>
    </select>
</div>

<div class="form-group">
    <label>Motor:</label>
    <select class="custom-select-box attribute-filter-by">
        <option>Todos</option>
        <option>Petrol</option>
        <option>GLP</option>
        <option>Diesel</option>
        <option>Eléctrico</option>
    </select>
</div>

<!-- <div class="row clearfix">
  <div class="form-group inner-group col-md-6 col-sm-6 col-xs-12">
        <label>Min Price:</label>
        <select class="custom-select-box">
            <option>$300000</option>
            <option>$400000</option>
            <option>$500000</option>
            <option>$600000</option>
            <option>$700000</option>
        </select>
    </div>
    <div class="form-group inner-group col-md-6 col-sm-6 col-xs-12">
        <label>Max Price:</label>
        <select class="custom-select-box">
            <option>$400000</option>
            <option>$500000</option>
            <option>$600000</option>
            <option>$700000</option>
            <option>$800000</option>
        </select>
    </div>
</div> -->

<div class="form-group">
    <label>Transmisión:</label>
    <select class="custom-select-box attribute-filter-by">
        <option>Todos</option>
        <option>Semi Automático</option>
        <option>Automático</option>
        <option>Mecánico</option>
    </select>
</div>

<div class="form-group">
    <label>Color:</label>
    <select class="custom-select-box attribute-filter-by">
        <option>Todos</option>
        <option>Rojo</option>
        <option>Azul</option>
        <option>Negro</option>
        <option>Blanco</option>
    </select>
</div>
--}}