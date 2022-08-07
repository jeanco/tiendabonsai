@foreach($category_attributes as $key => $category_attribute)
    <div class="filter_type version_2">
        <h4><a href="#filter_1_{{$key+1}}" data-toggle="collapse" class="opened">{{ $category_attribute['name'] }}</a></h4>

        <div class="collapse show" id="filter_1_{{$key+1}}">
            <ul>
                @foreach($category_attribute['attributes_relationship'] as $i => $attribute)
                <li>
                    <label class="container_check">{{ $attribute['name'] }} <small></small>
                        <input type="checkbox" data-index={{ $attribute['id'] }} class="catalog-attribute__change">
                        <span class="checkmark"></span>
                    </label>
                </li>
                @endforeach
                {{--
                <li>
                    <label class="container_check">Red <small>12</small>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </li>
                <li>
                    <label class="container_check">Orange <small>17</small>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </li>
                <li>
                    <label class="container_check">Black <small>43</small>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </li>
                --}}
            </ul>
        </div>
    </div>
@endforeach
<!-- /filter_type -->
{{--
<div class="filter_type version_2">
    <h4><a href="#filter_3" data-toggle="collapse" class="closed">Brands</a></h4>
    <div class="collapse" id="filter_3">
        <ul>
            <li>
                <label class="container_check">Adidas <small>11</small>
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </li>
            <li>
                <label class="container_check">Nike <small>08</small>
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </li>
            <li>
                <label class="container_check">Vans <small>05</small>
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </li>
            <li>
                <label class="container_check">Puma <small>18</small>
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </li>
        </ul>
    </div>
</div>
<!-- /filter_type -->
<div class="filter_type version_2">
    <h4><a href="#filter_4" data-toggle="collapse" class="closed">Price</a></h4>
    <div class="collapse" id="filter_4">
        <ul>
            <li>
                <label class="container_check">$0 — $50<small>11</small>
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </li>
            <li>
                <label class="container_check">$50 — $100<small>08</small>
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </li>
            <li>
                <label class="container_check">$100 — $150<small>05</small>
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </li>
            <li>
                <label class="container_check">$150 — $200<small>18</small>
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </li>
        </ul>
    </div>
</div>
--}}