<div class="shop-single-item-img">
    <div class="main-img">
        @foreach($product['images'] as $key => $image)
        <div class="main-img-item">
            <a href="" onclick="return false;"><img src="{{ $image['resource'] }}" alt="images" class="img-responsive"></a>
        </div>
        @endforeach
    </div>
    <ul class="multiple-img-list">
        @foreach($product['images'] as $key => $image)
        <li>
            <div class="product-col">
                <div class="img">
                    <a href="" onclick="return false;"><img src="{{ $image['resource'] }}" alt="images" class="img-responsive"></a>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
