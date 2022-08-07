<div class="brand" style="background-color: #eaeaea;">
    <div class="container">
        <div class="owl-carousel owl-theme js-owl-brand">
            @foreach($company_categories as $key => $category)
                @foreach($category['companies'] as $key => $company)
                    <div class="item">
                        <a href="/{{ $company['slug_company'] }}"><img src="{{ $company['logotype_thumb'] }}" alt="images" width="150px"></a>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
