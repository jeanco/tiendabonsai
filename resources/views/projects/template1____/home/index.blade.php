@extends('template1.layouts.index')
@section('content')
<!--Hero section starts-->
<div class="hero v2 section-padding" style="background-image: url(/antofagasta/images/header/hero_1.jpg)">
    <div class="overlay op-2"></div>
    <!--Listing filter starts-->
    <div class="container pos-abs">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="header-text v1">
                    <h1>Let us guide you home</h1>
                </div>
            </div>
            <div class="col-md-12">
                <form class="hero__form v2 filter listing-filter bg-cb">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-sm-12">
                            <div class="input-search">
                                <input type="text" name="place-event" id="place-event" placeholder="Enter Property, Location, Landmark ...">
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-sm-12 pl-0">
                            <select class="hero__form-input  custom-select">
                                <option>Select Area</option>
                                <option>New York</option>
                                <option>California</option>
                                <option>Washington</option>
                                <option>New Jersey</option>
                                <option>Los angeles</option>
                                <option>Florida</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-sm-12 pl-0">
                            <select class="hero__form-input  custom-select">
                                <option>Select City</option>
                                <option>New York</option>
                                <option>California</option>
                                <option>Washington</option>
                                <option>New Jersey</option>
                                <option>Los angeles</option>
                                <option>Florida</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-sm-12 pl-0">
                            <div class="submit_btn">
                                <button class="btn v3" type="submit">Search</button>
                            </div>
                            <div class="dropdown-filter"><span>Advanced Search </span></div>
                        </div>
                        <div class="explore__form-checkbox-list full-filter">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 py-1 pr-30">
                                    <select class="hero__form-input  custom-select mb-20">
                                        <option>Property Status</option>
                                        <option>Any</option>
                                        <option>For Rent</option>
                                        <option>For Sale</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0 ">
                                    <select class="hero__form-input  custom-select  mb-20">
                                        <option>Property Type</option>
                                        <option>Residential</option>
                                        <option>Commercial</option>
                                        <option>Land</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 py-1 pl-0">
                                    <select class="hero__form-input  custom-select  mb-20">
                                        <option>Max rooms</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 py-1 pr-30 ">
                                    <select class="hero__form-input  custom-select  mb-20">
                                        <option>Bed</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0">
                                    <select class="hero__form-input  custom-select  mb-20">
                                        <option>Bath</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 py-1 pl-0">
                                    <select class="hero__form-input  custom-select  mb-20">
                                        <option>Agents</option>
                                        <option>Bob Haris</option>
                                        <option>Ross buttler</option>
                                        <option>Andrew Saimons</option>
                                        <option>Steve Austin</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 py-1 pr-30">
                                    <select class="hero__form-input  custom-select  mb-20">
                                        <option>Agencies</option>
                                        <option>Onyx Equities</option>
                                        <option>OVG Real Estate</option>
                                        <option>Oxford Properties*</option>
                                        <option>Cortland</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 py-1 pr-30 pl-0">
                                    <div class="filter-sub-area style1">
                                        <div class="filter-title mb-10">
                                            <p>Price : <span><input type="text" id="amount_two"></span></p>
                                        </div>
                                        <div id="slider-range_two" class="price-range mb-30">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 py-1  pl-0">
                                    <div class="filter-sub-area style1">
                                        <div class="filter-title  mb-10">
                                            <p>Area : <span><input type="text" id="amount_one"></span></p>
                                        </div>
                                        <div id="slider-range_one" class="price-range mb-30">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-8 col-sm-12 py-1 pr-30">
                                    <div class="filter-checkbox">
                                        <p>Sort By Features</p>
                                        <ul>
                                            <li>
                                                <input id="check-a" type="checkbox" name="check">
                                                <label for="check-a">Air Condition</label>
                                            </li>
                                            <li>
                                                <input id="check-b" type="checkbox" name="check">
                                                <label for="check-b">Swimming Pool</label>
                                            </li>
                                            <li>
                                                <input id="check-c" type="checkbox" name="check">
                                                <label for="check-c">Laundry Room</label>
                                            </li>
                                            <li>
                                                <input id="check-d" type="checkbox" name="check">
                                                <label for="check-d">Free Wifi</label>
                                            </li>
                                            <li>
                                                <input id="check-e" type="checkbox" name="check">
                                                <label for="check-e">Window Covering</label>
                                            </li>
                                            <li>
                                                <input id="check-f" type="checkbox" name="check">
                                                <label for="check-f">Central Heating </label>
                                            </li>
                                            <li>
                                                <input id="check-g" type="checkbox" name="check">
                                                <label for="check-g">24 hour security</label>
                                            </li>
                                            <li>
                                                <input id="check-h" type="checkbox" name="check">
                                                <label for="check-h">Lawn</label>
                                            </li>
                                            <li>
                                                <input id="check-i" type="checkbox" name="check">
                                                <label for="check-i">Gym</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-4 py-1 pr-30 pl-0 ">
                                    <div class="filter-checkbox">
                                        <p>Sort By Ratings</p>
                                        <div>
                                            <input id="check-w" type="checkbox" name="check">
                                            <label for="check-w">
                                            </label>
                                            <div class="list-ratings">
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <input id="check-x" type="checkbox" name="check">
                                            <label for="check-x">
                                            </label>
                                            <div class="list-ratings">
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star-half-alt"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <input id="check-y" type="checkbox" name="check">
                                            <label for="check-y">
                                            </label>
                                            <div class="list-ratings">
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star-half-alt"></span>
                                                <span class="fas fa-star-half-alt"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <input id="check-z" type="checkbox" name="check">
                                            <label for="check-z">
                                            </label>
                                            <div class="list-ratings">
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star-half-alt"></span>
                                                <span class="fas fa-star-half-alt"></span>
                                                <span class="fas fa-star-half-alt"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Listing filter ends-->
</div>
<!--Hero section ends-->
<!--Popular City starts-->
<div class="container pt-130">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title v1">
                <p>Browse popular properties around the world</p>
                <h2>Find Properties in Your city</h2>
            </div>
        </div>
    </div>
</div>
<div class="property-place pb-60 hideme" style="background-image: url(/antofagasta/images/bg/map-bg-1.png)">
    <div class="container">
        <div class="row">
            <div class="swiper-container popular-place-wrap v1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide single-place-wrap">
                        <div class="single-place-image">
                            <a href="http://demo.lion-coders.com/html/sarchholm-real-estate-template/location-left-sidebar.html"><img src="/antofagasta/images/places/place_5.jpg" alt="place-image"></a>
                            <a class="single-place-title" href="http://demo.lion-coders.com/html/sarchholm-real-estate-template/location-left-sidebar.html">Miami</a>
                        </div>
                        <div class="single-place-content">
                            <h3><span>80</span>Apartments for sale</h3>
                            <a href="grid-fullwidth-map.html">See all Listings <i class="lnr lnr-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide single-place-wrap">
                        <div class="single-place-image">
                            <a href="http://demo.lion-coders.com/html/sarchholm-real-estate-template/location-left-sidebar.html"><img src="/antofagasta/images/places/place_1.jpg" alt="place-image"></a>
                            <a class="single-place-title" href="http://demo.lion-coders.com/html/sarchholm-real-estate-template/location-left-sidebar.html">Dubai</a>
                        </div>
                        <div class="single-place-content">
                            <h3><span>115</span>Property Listings</h3>
                            <a href="grid-fullwidth-map.html">See all Listings <i class="lnr lnr-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide single-place-wrap">
                        <div class="single-place-image">
                            <a href="http://demo.lion-coders.com/html/sarchholm-real-estate-template/location-left-sidebar.html"><img src="/antofagasta/images/places/place_4.jpg" alt="place-image"></a>
                            <a class="single-place-title" href="http://demo.lion-coders.com/html/sarchholm-real-estate-template/location-left-sidebar.html">New york</a>
                        </div>
                        <div class="single-place-content">
                            <h3><span>50</span>Luxury Apartment</h3>
                            <a href="grid-fullwidth-map.html">See all Listings <i class="lnr lnr-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide single-place-wrap">
                        <div class="single-place-image">
                            <a href="http://demo.lion-coders.com/html/sarchholm-real-estate-template/location-left-sidebar.html"><img src="/antofagasta/images/places/place_16.jpg" alt="place-image"></a>
                            <a class="single-place-title" href="http://demo.lion-coders.com/html/sarchholm-real-estate-template/location-left-sidebar.html">Prague</a>
                        </div>
                        <div class="single-place-content">
                            <h3><span>50</span>Luxury Apartment</h3>
                            <a href="grid-fullwidth-map.html">See all Listings <i class="lnr lnr-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide single-place-wrap">
                        <div class="single-place-image">
                            <a href="http://demo.lion-coders.com/html/sarchholm-real-estate-template/location-left-sidebar.html"><img src="/antofagasta/images/places/place_2.jpg" alt="place-image"></a>
                            <a class="single-place-title" href="http://demo.lion-coders.com/html/sarchholm-real-estate-template/location-left-sidebar.html">Havana</a>
                        </div>
                        <div class="single-place-content">
                            <h3><span>30</span>Luxury villa</h3>
                            <a href="grid-fullwidth-map.html">See all Listings <i class="lnr lnr-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide single-place-wrap">
                        <div class="single-place-image">
                            <a href="http://demo.lion-coders.com/html/sarchholm-real-estate-template/location-left-sidebar.html"><img src="/antofagasta/images/places/place_6.jpg" alt="place-image"></a>
                            <a class="single-place-title" href="http://demo.lion-coders.com/html/sarchholm-real-estate-template/location-left-sidebar.html">Oklahoma</a>
                        </div>
                        <div class="single-place-content">
                            <h3><span>145</span>Property Listings</h3>
                            <a href="grid-fullwidth-map.html">See all Listings <i class="lnr lnr-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="slider-btn v2 popular-next"><i class="lnr lnr-arrow-right"></i></div>
                <div class="slider-btn v2 popular-prev"><i class="lnr lnr-arrow-left"></i></div>
            </div>
        </div>
    </div>
</div>
<!--Popular City ends-->
<!--Featured Property starts-->
<div class="featured-property-section pt-130 mt-1">
    <div class="container-fluid no-pad-lr">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title v1">
                    <p>Check out some of our</p>
                    <h2>Featured Property</h2>
                </div>
            </div>
        </div>
        <div class="featured-property-wrap v1 swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="featured-property-item bg-h" style="background-image: url(/antofagasta/images/featured/featured_5.jpg);">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-md-12">
                                    <div class="featured-property-info">
                                        <div class="property-title-box">
                                            <h4><a href="single-listing-one.html">Luxury Villa in Birmingham</a></h4>
                                            <div class="property-location">
                                                <i class="fa fa-map-marker-alt"></i>
                                                <p>159 Dudley Rd, Birmingham, UK</p>
                                            </div>
                                            <ul class="property-feature">
                                                <li> <i class="fas fa-bed"></i>
                                                    <span>5 Bedrooms</span>
                                                </li>
                                                <li> <i class="fas fa-bath"></i>
                                                    <span>4 Bath</span>
                                                </li>
                                                <li> <i class="fas fa-arrows-alt"></i>
                                                    <span>3000 sq ft</span>
                                                </li>
                                                <li> <i class="fas fa-car"></i>
                                                    <span>2 Garage</span>
                                                </li>
                                            </ul>
                                            <div class="trending-bottom">
                                                <div class="trend-left float-left">
                                                    <ul class="product-rating">
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star-half-alt"></i></li>
                                                        <li><i class="fas fa-star-half-alt"></i></li>
                                                    </ul>
                                                </div>
                                                <a class="trend-right float-right">
                                                    <div class="trend-open">
                                                        <p><span class="per_sale">starts from</span>$21000</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="featured-property-item bg-h" style="background-image: url(/antofagasta/images/featured/featured_6.jpg);">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-md-12">
                                    <div class="featured-property-info">
                                        <div class="property-title-box">
                                            <h4><a href="single-listing-one.html">Apartment in Cecil Lake</a></h4>
                                            <div class="property-location">
                                                <i class="fa fa-map-marker-alt"></i>
                                                <p>4210 Khale Street, Florence, USA</p>
                                            </div>
                                            <ul class="property-feature">
                                                <li> <i class="fas fa-bed"></i>
                                                    <span>3 Bedrooms</span>
                                                </li>
                                                <li> <i class="fas fa-bath"></i>
                                                    <span>2 Bath</span>
                                                </li>
                                                <li> <i class="fas fa-arrows-alt"></i>
                                                    <span>1600 sq ft</span>
                                                </li>
                                                <li> <i class="fas fa-car"></i>
                                                    <span>1 Garage</span>
                                                </li>
                                            </ul>
                                            <div class="trending-bottom">
                                                <div class="trend-left float-left">
                                                    <ul class="product-rating">
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star-half-alt"></i></li>
                                                        <li><i class="fas fa-star-half-alt"></i></li>
                                                    </ul>
                                                </div>
                                                <a class="trend-right float-right">
                                                    <div class="trend-open">
                                                        <p><span class="per_sale">starts from</span>$9000</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="featured-property-item bg-h" style="background-image: url(/antofagasta/images/featured/featured_3.jpg);">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-md-12">
                                    <div class="featured-property-info">
                            <div class="property-title-box">
                                <h4><a href="single-listing-one.html">Villa on Sunbury</a></h4>
                                <div class="property-location">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <p>
                                        39 Casey Ave, Sunbury, VIC 3429
                                    </p>
                                </div>
                                <ul class="property-feature">
                                    <li> <i class="fas fa-bed"></i>
                                        <span>5 Bedrooms</span>
                                    </li>
                                    <li> <i class="fas fa-bath"></i>
                                        <span>4 Bath</span>
                                    </li>
                                    <li> <i class="fas fa-arrows-alt"></i>
                                        <span>2048 sq ft</span>
                                    </li>
                                    <li> <i class="fas fa-car"></i>
                                        <span>2 Garage</span>
                                    </li>
                                </ul>
                                <div class="trending-bottom">
                                    <div class="trend-left float-left">
                                        <ul class="product-rating">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                        </ul>
                                    </div>
                                    <a class="trend-right float-right">
                                        <div class="trend-open">
                                            <p><span class="per_sale">starts from</span>$9200</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--Slider Arrows-->
            <div class="slider-btn v2 featured-prev"><i class="lnr lnr-arrow-left"></i></div>
            <div class="slider-btn v2 featured-next"><i class="lnr lnr-arrow-right"></i></div>
        </div>
    </div>
</div>
<!--Featured Property ends-->
<!--Trending events starts-->
<div class="trending-places pt-130">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title v1">
                    <p>Find rental properties anywhere</p>
                    <h2>Discover Popular Properties</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <ul class="nav nav-tabs list-details-tab">
                    <li class="nav-item active">
                        <a data-toggle="tab" href="home-v1.html#all_property">All Property</a>
                    </li>
                    <li class="nav-item ">
                        <a data-toggle="tab" href="home-v1.html#for_sale">For Sale</a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="tab" href="home-v1.html#for_rent">For Rent</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="tab-content mt-30">
                    <div class="tab-pane fade show active" id="all_property">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="single-property-box">
                                    <div class="property-item">
                                        <a class="property-img" href="single-listing-two.html"><img src="/antofagasta/images/property/property_1.jpg" alt="#">
                                        </a>
                                        <ul class="feature_text">
                                            <li class="feature_cb"><span> Featured</span></li>
                                            <li class="feature_or"><span>For Sale</span></li>
                                        </ul>
                                        <div class="property-author-wrap">
                                            <a href="home-v1.html#" class="property-author">
                                                <img src="/antofagasta/images/agents/agent_min_1.jpg" alt="...">
                                                <span>Tony Stark</span>
                                            </a>
                                            <ul class="save-btn">
                                                <li data-toggle="tooltip" data-placement="top" title="Photos"><a href="http://demo.lion-coders.com/html/sarchholm-real-estate-template/.photo-gallery" class="btn-gallery"><i class="lnr lnr-camera"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="home-v1.html#"><i class="lnr lnr-heart"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="home-v1.html#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                            </ul>
                                            <div class="hidden photo-gallery">
                                                <a href="/antofagasta/images/single-listing/property_view_1.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_2.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_3.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_4.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_5.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_6.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_7.jpg"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="property-title-box">
                                        <h4><a href="single-listing-one.html">Villa on Hartford</a></h4>
                                        <div class="property-location">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <p>2854 Meadow View Drive, Hartford, USA</p>
                                        </div>
                                        <ul class="property-feature">
                                            <li> <i class="fas fa-bed"></i>
                                                <span>4 Bedrooms</span>
                                            </li>
                                            <li> <i class="fas fa-bath"></i>
                                                <span>3 Bath</span>
                                            </li>
                                            <li> <i class="fas fa-arrows-alt"></i>
                                                <span>2142 sq ft</span>
                                            </li>
                                            <li> <i class="fas fa-car"></i>
                                                <span>2 Garage</span>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                            </div>
                                            <a class="trend-right float-right">
                                                <div class="trend-open">
                                                    <p><span class="per_sale">starts from</span>$25000</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="single-property-box">
                                    <div class="property-item">
                                        <a class="property-img" href="single-listing-two.html"><img src="/antofagasta/images/property/property_3.jpg" alt="#"></a>
                                        <ul class="feature_text">
                                            <li class="feature_or"><span>For Rent</span></li>
                                        </ul>
                                        <div class="property-author-wrap">
                                            <a href="home-v1.html#" class="property-author">
                                                <img src="/antofagasta/images/agents/agency_2.jpg" alt="...">
                                                <span>Zilion Properties</span>
                                            </a>
                                            <ul class="save-btn">
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="home-v1.html#"><i class="lnr lnr-heart"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="home-v1.html#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="property-title-box">
                                        <h4><a href="single-listing-one.html">Family home in Glasgow</a></h4>
                                        <div class="property-location">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <p>60 High St, Glasgow, London</p>
                                        </div>
                                        <ul class="property-feature">
                                            <li> <i class="fas fa-bed"></i>
                                                <span>3 Bedrooms</span>
                                            </li>
                                            <li> <i class="fas fa-bath"></i>
                                                <span>3 Bath</span>
                                            </li>
                                            <li> <i class="fas fa-arrows-alt"></i>
                                                <span>1982 sq ft</span>
                                            </li>
                                            <li> <i class="fas fa-car"></i>
                                                <span>1 Garage</span>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                            </div>
                                            <a class="trend-right float-right">
                                                <div class="trend-open">
                                                    <p>$7500<span class="per_month">month</span> </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="single-property-box">
                                    <div class="property-item">
                                        <a class="property-img" href="single-listing-two.html"><img src="/antofagasta/images/property/property_6.jpg" alt="#"></a>
                                        <ul class="feature_text">
                                            <li class="feature_cb"><span> New</span></li>
                                            <li class="feature_or"><span>For Sale</span></li>
                                        </ul>
                                        <div class="property-author-wrap">
                                            <a href="home-v1.html#" class="property-author">
                                                <img src="/antofagasta/images/agents/agent_min_2.jpg" alt="...">
                                                <span>Bob Haris</span>
                                            </a>
                                            <ul class="save-btn">
                                                <li data-toggle="tooltip" data-placement="top" title="Video"><a href="https://www.youtube.com/watch?v=v_ATnE02qFs" class="property-yt"><i class="fas fa-play"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="home-v1.html#"><i class="lnr lnr-heart"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="home-v1.html#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="property-title-box">
                                        <h4><a href="single-listing-one.html">Apartment in Cecil Lake</a></h4>
                                        <div class="property-location">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <p>131 midlas , Cecil Lake, BC</p>
                                        </div>
                                        <ul class="property-feature">
                                            <li> <i class="fas fa-bed"></i>
                                                <span>3 Bedrooms</span>
                                            </li>
                                            <li> <i class="fas fa-bath"></i>
                                                <span>2 Bath</span>
                                            </li>
                                            <li> <i class="fas fa-arrows-alt"></i>
                                                <span>1600 sq ft</span>
                                            </li>
                                            <li> <i class="fas fa-car"></i>
                                                <span>1 Garage</span>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                            </div>
                                            <a class="trend-right float-right">
                                                <div class="trend-open">
                                                    <p><span class="per_sale">starts from</span>$9000</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="for_sale">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="single-property-box">
                                    <div class="property-item">
                                        <a class="property-img" href="single-listing-two.html"><img src="/antofagasta/images/property/property_4.jpg" alt="#"></a>
                                        <ul class="feature_text">
                                            <li class="feature_cb"><span> Featured</span></li>
                                            <li class="feature_or"><span>For Sale</span></li>
                                        </ul>
                                        <div class="property-author-wrap">
                                            <a href="home-v1.html#" class="property-author">
                                                <img src="/antofagasta/images/agents/agency_4.jpg" alt="...">
                                                <span>Hexa Properties</span>
                                            </a>
                                            <ul class="save-btn">
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="home-v1.html#"><i class="lnr lnr-heart"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="home-v1.html#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="property-title-box">
                                        <h4><a href="single-listing-one.html">Office Space in Thatcham</a></h4>
                                        <div class="property-location">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <p>Colthrop Lane, Thatcham, London</p>
                                        </div>
                                        <ul class="property-feature">
                                            <li> <i class="fas fa-home"></i>
                                                <span>6 Rooms</span>
                                            </li>
                                            <li> <i class="fas fa-bath"></i>
                                                <span>2 Bath</span>
                                            </li>
                                            <li> <i class="fas fa-arrows-alt"></i>
                                                <span>1400 sq ft</span>
                                            </li>
                                            <li> <i class="fas fa-car"></i>
                                                <span>1 Garage</span>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                            </div>
                                            <a class="trend-right float-right">
                                                <div class="trend-open">
                                                    <p><span class="per_sale">starts from</span>$12000</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="single-property-box">
                                    <div class="property-item">
                                        <a class="property-img" href="single-listing-two.html"><img src="/antofagasta/images/property/property_5.jpg" alt="#">
                                        </a>
                                        <ul class="feature_text">
                                            <li class="feature_or"><span>For Sale</span></li>
                                        </ul>
                                        <div class="property-author-wrap">
                                            <a href="home-v1.html#" class="property-author">
                                                <img src="/antofagasta/images/agents/agency_3.jpg" alt="...">
                                                <span>Seaside Properties</span>
                                            </a>
                                            <ul class="save-btn">
                                                <li data-toggle="tooltip" data-placement="top" title="Photos"><a href="http://demo.lion-coders.com/html/sarchholm-real-estate-template/.photo-gallery" class="btn-gallery"><i class="lnr lnr-camera"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="home-v1.html#"><i class="lnr lnr-heart"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="home-v1.html#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                            </ul>
                                            <div class="hidden photo-gallery">
                                                <a href="/antofagasta/images/single-listing/property_view_1.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_2.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_3.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_4.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_5.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_6.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_7.jpg"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="property-title-box">
                                        <h4><a href="single-listing-one.html">Luxury Villa in Birmingham</a></h4>
                                        <div class="property-location">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <p>159 Dudley Rd, Birmingham, UK</p>
                                        </div>
                                        <ul class="property-feature">
                                            <li> <i class="fas fa-bed"></i>
                                                <span>5 Bedrooms</span>
                                            </li>
                                            <li> <i class="fas fa-bath"></i>
                                                <span>4 Bath</span>
                                            </li>
                                            <li> <i class="fas fa-arrows-alt"></i>
                                                <span>3000 sq ft</span>
                                            </li>
                                            <li> <i class="fas fa-car"></i>
                                                <span>2 Garage</span>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                            </div>
                                            <a class="trend-right float-right">
                                                <div class="trend-open">
                                                    <p><span class="per_sale">starts from</span>$21000</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="single-property-box">
                                    <div class="property-item">
                                        <a class="property-img" href="single-listing-two.html"><img src="/antofagasta/images/property/property_1.jpg" alt="#"></a>
                                        <ul class="feature_text">
                                            <li class="feature_cb"><span> Featured</span></li>
                                            <li class="feature_or"><span>For Sale</span></li>
                                        </ul>
                                        <div class="property-author-wrap">
                                            <a href="home-v1.html#" class="property-author">
                                                <img src="/antofagasta/images/agents/agent_min_1.jpg" alt="...">
                                                <span>Tony Stark</span>
                                            </a>
                                            <ul class="save-btn">
                                                <li data-toggle="tooltip" data-placement="top" title="Photos"><a href="http://demo.lion-coders.com/html/sarchholm-real-estate-template/.photo-gallery" class="btn-gallery"><i class="lnr lnr-camera"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="home-v1.html#"><i class="lnr lnr-heart"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="home-v1.html#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                            </ul>
                                            <div class="hidden photo-gallery">
                                                <a href="/antofagasta/images/single-listing/property_view_1.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_2.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_3.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_4.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_5.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_6.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_7.jpg"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="property-title-box">
                                        <h4><a href="single-listing-one.html">Villa on Hartford</a></h4>
                                        <div class="property-location">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <p>2854 Meadow View Drive, Hartford, USA</p>
                                        </div>
                                        <ul class="property-feature">
                                            <li> <i class="fas fa-bed"></i>
                                                <span>4 Bedrooms</span>
                                            </li>
                                            <li> <i class="fas fa-bath"></i>
                                                <span>3 Bath</span>
                                            </li>
                                            <li> <i class="fas fa-arrows-alt"></i>
                                                <span>2142 sq ft</span>
                                            </li>
                                            <li> <i class="fas fa-car"></i>
                                                <span>2 Garage</span>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                            </div>
                                            <a class="trend-right float-right">
                                                <div class="trend-open">
                                                    <p><span class="per_sale">starts from</span>$25000</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="for_rent">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="single-property-box">
                                    <div class="property-item">
                                        <a class="property-img" href="single-listing-two.html"><img src="/antofagasta/images/property/property_7.jpg" alt="#"> </a>
                                        <ul class="feature_text">
                                            <li class="feature_cb"><span> Featured</span></li>
                                            <li class="feature_or"><span>For Rent</span></li>
                                        </ul>
                                        <div class="property-author-wrap">
                                            <a href="home-v1.html#" class="property-author">
                                                <img src="/antofagasta/images/agents/agency_1.jpg" alt="...">
                                                <span>Carmen Properties</span>
                                            </a>
                                            <ul class="save-btn">
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="home-v1.html#"><i class="lnr lnr-heart"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="home-v1.html#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="property-title-box">
                                        <h4><a href="single-listing-one.html">Villa on Sunbury</a></h4>
                                        <div class="property-location">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <p>39 Casey Ave, Sunbury, VIC 3429</p>
                                        </div>
                                        <ul class="property-feature">
                                            <li> <i class="fas fa-bed"></i>
                                                <span>5 Bedrooms</span>
                                            </li>
                                            <li> <i class="fas fa-bath"></i>
                                                <span>4 Bath</span>
                                            </li>
                                            <li> <i class="fas fa-arrows-alt"></i>
                                                <span>2048 sq ft</span>
                                            </li>
                                            <li> <i class="fas fa-car"></i>
                                                <span>2 Garage</span>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                            </div>
                                            <a class="trend-right float-right">
                                                <div class="trend-open">
                                                    <p>$9200<span class="per_month">month</span> </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="single-property-box">
                                    <div class="property-item">
                                        <a class="property-img" href="single-listing-two.html"><img src="/antofagasta/images/property/property_8.jpg" alt="#"> </a>
                                        <ul class="feature_text">
                                            <li class="feature_cb"><span> Featured</span></li>
                                            <li class="feature_or"><span>For Rent</span></li>
                                        </ul>
                                        <div class="property-author-wrap">
                                            <a href="home-v1.html#" class="property-author">
                                                <img src="/antofagasta/images/agents/agent_min_1.jpg" alt="...">
                                                <span>Tony Stark</span>
                                            </a>
                                            <ul class="save-btn">
                                                <li data-toggle="tooltip" data-placement="top" title="Photos"><a href="http://demo.lion-coders.com/html/sarchholm-real-estate-template/.photo-gallery" class="btn-gallery"><i class="lnr lnr-camera"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="home-v1.html#"><i class="lnr lnr-heart"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="home-v1.html#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                            </ul>
                                            <div class="hidden photo-gallery">
                                                <a href="/antofagasta/images/single-listing/property_view_1.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_2.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_3.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_4.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_5.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_6.jpg"></a>
                                                <a href="/antofagasta/images/single-listing/property_view_7.jpg"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="property-title-box">
                                        <h4><a href="single-listing-one.html">Comfortable Family Apartment</a></h4>
                                        <div class="property-location">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <p>4210 Khale Street, Florence, USA</p>
                                        </div>
                                        <ul class="property-feature">
                                            <li> <i class="fas fa-bed"></i>
                                                <span>2 Bedrooms</span>
                                            </li>
                                            <li> <i class="fas fa-bath"></i>
                                                <span>2 Bath</span>
                                            </li>
                                            <li> <i class="fas fa-arrows-alt"></i>
                                                <span>1500 sq ft</span>
                                            </li>
                                            <li> <i class="fas fa-car"></i>
                                                <span>1 Garage</span>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                            </div>
                                            <a class="trend-right float-right">
                                                <div class="trend-open">
                                                    <p>$7500<span class="per_month">month</span> </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="single-property-box">
                                    <div class="property-item">
                                        <a class="property-img" href="single-listing-two.html"><img src="/antofagasta/images/property/property_3.jpg" alt="#"> </a>
                                        <ul class="feature_text">
                                            <li class="feature_or"><span>For Rent</span></li>
                                        </ul>
                                        <div class="property-author-wrap">
                                            <a href="home-v1.html#" class="property-author">
                                                <img src="/antofagasta/images/agents/agency_2.jpg" alt="...">
                                                <span>Zilion Properties</span>
                                            </a>
                                            <ul class="save-btn">
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="home-v1.html#"><i class="lnr lnr-heart"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="home-v1.html#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="property-title-box">
                                        <h4><a href="single-listing-one.html">Family home in Glasgow</a></h4>
                                        <div class="property-location">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <p>60 High St, Glasgow, London</p>
                                        </div>
                                        <ul class="property-feature">
                                            <li> <i class="fas fa-bed"></i>
                                                <span>3 Bedrooms</span>
                                            </li>
                                            <li> <i class="fas fa-bath"></i>
                                                <span>3 Bath</span>
                                            </li>
                                            <li> <i class="fas fa-arrows-alt"></i>
                                                <span>1982 sq ft</span>
                                            </li>
                                            <li> <i class="fas fa-car"></i>
                                                <span>1 Garage</span>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                            </div>
                                            <a class="trend-right float-right">
                                                <div class="trend-open">
                                                    <p>$7500<span class="per_month">month</span> </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center mt-1">
                <a href="tab-fullwidth.html" class="btn v9">Browse More</a>
            </div>
        </div>
    </div>
</div>
<!--Trending events ends-->
<!--Value Calculator starts-->
<div class="value-calculator-section py-80 mt-140 v1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="value-img bg-h" style="background-image: url(/antofagasta/images/property/property_val.jpg)">
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="value-content-wrap">
                    <div class="section-title v2">
                        <p>Get a property Valuation</p>
                        <h2>How much is my property worth?</h2>
                    </div>
                    <div class="value-content">
                        <p>The first step in selling your property is to get a valuation from local experts. They will inspect your home and take into account its unique features, the area and market conditions before providing you with the most accurate valuation.</p>
                        <div class="value-input-wrap">
                            <form action="home-v1.html#">
                                <input type="text" placeholder="Enter Your Property Address...">
                                <button type="submit">Price My Property</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Value Calculator ends-->
<!--Trending events starts-->
<div class="trending-places pb-130 mt-140">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title v2">
                    <p>Browse some of our</p>
                    <h2>Recent Properties</h2>
                </div>
            </div>
            <div class="swiper-container trending-place-wrap">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="single-property-box">
                            <div class="property-item">
                                <a class="property-img" href="single-listing-two.html"><img src="/antofagasta/images/property/property_8.jpg" alt="#"> </a>
                                <ul class="feature_text">
                                    <li class="feature_cb"><span>New</span></li>
                                    <li class="feature_or"><span>For Rent</span></li>
                                </ul>
                                <div class="property-author-wrap">
                                    <a href="home-v1.html#" class="property-author">
                                        <img src="/antofagasta/images/agents/agent_min_1.jpg" alt="...">
                                        <span>Tony Stark</span>
                                    </a>
                                    <ul class="save-btn">
                                        <li data-toggle="tooltip" data-placement="top" title="Photos"><a href="http://demo.lion-coders.com/html/sarchholm-real-estate-template/.photo-gallery" class="btn-gallery"><i class="lnr lnr-camera"></i></a></li>
                                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="home-v1.html#"><i class="lnr lnr-heart"></i></a></li>
                                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="home-v1.html#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                    </ul>
                                    <div class="hidden photo-gallery">
                                        <a href="/antofagasta/images/single-listing/property_view_1.jpg"></a>
                                        <a href="/antofagasta/images/single-listing/property_view_2.jpg"></a>
                                        <a href="/antofagasta/images/single-listing/property_view_3.jpg"></a>
                                        <a href="/antofagasta/images/single-listing/property_view_4.jpg"></a>
                                        <a href="/antofagasta/images/single-listing/property_view_5.jpg"></a>
                                        <a href="/antofagasta/images/single-listing/property_view_6.jpg"></a>
                                        <a href="/antofagasta/images/single-listing/property_view_7.jpg"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="property-title-box">
                                <h4><a href="single-listing-one.html">Comfortable Family Apartment</a></h4>
                                <div class="property-location">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <p>4210 Khale Street, Florence, USA</p>
                                </div>
                                <ul class="property-feature">
                                    <li> <i class="fas fa-bed"></i>
                                        <span>2 Bedrooms</span>
                                    </li>
                                    <li> <i class="fas fa-bath"></i>
                                        <span>2 Bath</span>
                                    </li>
                                    <li> <i class="fas fa-arrows-alt"></i>
                                        <span>1500 sq ft</span>
                                    </li>
                                    <li> <i class="fas fa-car"></i>
                                        <span>1 Garage</span>
                                    </li>
                                </ul>
                                <div class="trending-bottom">
                                    <div class="trend-left float-left">
                                        <ul class="product-rating">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                        </ul>
                                    </div>
                                    <a class="trend-right float-right">
                                        <div class="trend-open">
                                            <p>$7500<span class="per_month">month</span> </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-property-box">
                            <div class="property-item">
                                <a class="property-img" href="single-listing-two.html"><img src="/antofagasta/images/property/property_7.jpg" alt="#"> </a>
                                <ul class="feature_text">
                                    <li class="feature_cb"><span>New</span></li>
                                    <li class="feature_or"><span>For Rent</span></li>
                                </ul>
                                <div class="property-author-wrap">
                                    <a href="home-v1.html#" class="property-author">
                                        <img src="/antofagasta/images/agents/agency_1.jpg" alt="...">
                                        <span>Carmen Properties</span>
                                    </a>
                                    <ul class="save-btn">
                                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="home-v1.html#"><i class="lnr lnr-heart"></i></a></li>
                                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="home-v1.html#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="property-title-box">
                                <h4><a href="single-listing-one.html">Villa on Sunbury</a></h4>
                                <div class="property-location">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <p>39 Casey Ave, Sunbury, VIC 3429</p>
                                </div>
                                <ul class="property-feature">
                                    <li> <i class="fas fa-bed"></i>
                                        <span>5 Bedrooms</span>
                                    </li>
                                    <li> <i class="fas fa-bath"></i>
                                        <span>4 Bath</span>
                                    </li>
                                    <li> <i class="fas fa-arrows-alt"></i>
                                        <span>2048 sq ft</span>
                                    </li>
                                    <li> <i class="fas fa-car"></i>
                                        <span>2 Garage</span>
                                    </li>
                                </ul>
                                <div class="trending-bottom">
                                    <div class="trend-left float-left">
                                        <ul class="product-rating">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                        </ul>
                                    </div>
                                    <a class="trend-right float-right">
                                        <div class="trend-open">
                                            <p>$9200<span class="per_month">month</span> </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-property-box">
                            <div class="property-item">
                                <a class="property-img" href="single-listing-two.html"><img src="/antofagasta/images/property/property_9.jpg" alt="#"> </a>
                                <ul class="feature_text">
                                    <li class="feature_cb"><span>New</span></li>
                                    <li class="feature_or"><span>For Sale</span></li>
                                </ul>
                                <div class="property-author-wrap">
                                    <a href="home-v1.html#" class="property-author">
                                        <img src="/antofagasta/images/agents/agent_min_3.jpg" alt="...">
                                        <span>Jim Carry</span>
                                    </a>
                                    <ul class="save-btn">
                                        <li data-toggle="tooltip" data-placement="top" title="Video"><a href="https://www.youtube.com/watch?v=v_ATnE02qFs" class="property-yt"><i class="fas fa-play"></i></a></li>
                                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="home-v1.html#"><i class="lnr lnr-heart"></i></a></li>
                                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="home-v1.html#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="property-title-box">
                                <h4><a href="single-listing-one.html">Luxury Condo in Mariwood</a></h4>
                                <div class="property-location">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <p>164 Mariwood Rd , Campbell River, BC</p>
                                </div>
                                <ul class="property-feature">
                                    <li> <i class="fas fa-bed"></i>
                                        <span>6 Bedrooms</span>
                                    </li>
                                    <li> <i class="fas fa-bath"></i>
                                        <span>5 Bath</span>
                                    </li>
                                    <li> <i class="fas fa-arrows-alt"></i>
                                        <span>2400 sq ft</span>
                                    </li>
                                    <li> <i class="fas fa-car"></i>
                                        <span>2 Garage</span>
                                    </li>
                                </ul>
                                <div class="trending-bottom">
                                    <div class="trend-left float-left">
                                        <ul class="product-rating">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                        </ul>
                                    </div>
                                    <a class="trend-right float-right">
                                        <div class="trend-open">
                                            <p><span class="per_sale">starts from</span>$75000</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-property-box">
                            <div class="property-item">
                                <a class="property-img" href="single-listing-two.html"><img src="/antofagasta/images/property/property_1.jpg" alt="#"> </a>
                                <ul class="feature_text">
                                    <li class="feature_cb"><span>New</span></li>
                                    <li class="feature_or"><span>For Sale</span></li>
                                </ul>
                                <div class="property-author-wrap">
                                    <a href="home-v1.html#" class="property-author">
                                        <img src="/antofagasta/images/agents/agent_min_1.jpg" alt="...">
                                        <span>Tony Stark</span>
                                    </a>
                                    <ul class="save-btn">
                                        <li data-toggle="tooltip" data-placement="top" title="Photos"><a href="http://demo.lion-coders.com/html/sarchholm-real-estate-template/.photo-gallery" class="btn-gallery"><i class="lnr lnr-camera"></i></a></li>
                                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="home-v1.html#"><i class="lnr lnr-heart"></i></a></li>
                                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="home-v1.html#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                    </ul>
                                    <div class="hidden photo-gallery">
                                        <a href="/antofagasta/images/single-listing/property_view_1.jpg"></a>
                                        <a href="/antofagasta/images/single-listing/property_view_2.jpg"></a>
                                        <a href="/antofagasta/images/single-listing/property_view_3.jpg"></a>
                                        <a href="/antofagasta/images/single-listing/property_view_4.jpg"></a>
                                        <a href="/antofagasta/images/single-listing/property_view_5.jpg"></a>
                                        <a href="/antofagasta/images/single-listing/property_view_6.jpg"></a>
                                        <a href="/antofagasta/images/single-listing/property_view_7.jpg"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="property-title-box">
                                <h4><a href="single-listing-one.html">Villa on Hartford</a></h4>
                                <div class="property-location">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <p>2854 Meadow View Drive, Hartford, USA</p>
                                </div>
                                <ul class="property-feature">
                                    <li> <i class="fas fa-bed"></i>
                                        <span>4 Bedrooms</span>
                                    </li>
                                    <li> <i class="fas fa-bath"></i>
                                        <span>3 Bath</span>
                                    </li>
                                    <li> <i class="fas fa-arrows-alt"></i>
                                        <span>2142 sq ft</span>
                                    </li>
                                    <li> <i class="fas fa-car"></i>
                                        <span>2 Garage</span>
                                    </li>
                                </ul>
                                <div class="trending-bottom">
                                    <div class="trend-left float-left">
                                        <ul class="product-rating">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                        </ul>
                                    </div>
                                    <a class="trend-right float-right">
                                        <div class="trend-open">
                                            <p><span class="per_sale">starts from</span>$25000</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-property-box">
                            <div class="property-item">
                                <a class="property-img" href="single-listing-two.html"><img src="/antofagasta/images/property/property_2.jpg" alt="#"> </a>
                                <ul class="feature_text">
                                    <li class="feature_cb"><span>New</span></li>
                                    <li class="feature_or"><span>For Rent</span></li>
                                </ul>
                                <div class="property-author-wrap">
                                    <a href="home-v1.html#" class="property-author">
                                        <img src="/antofagasta/images/agents/agent_min_2.jpg" alt="...">
                                        <span>Bob haris</span>
                                    </a>
                                    <ul class="save-btn">
                                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="home-v1.html#"><i class="lnr lnr-heart"></i></a></li>
                                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="home-v1.html#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="property-title-box">
                                <h4><a href="single-listing-one.html">Bay view Apartment</a></h4>
                                <div class="property-location">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <p>1797 Hillcrest Lane, Boulevard, CA</p>
                                </div>
                                <ul class="property-feature">
                                    <li> <i class="fas fa-bed"></i>
                                        <span>3 Bedrooms</span>
                                    </li>
                                    <li> <i class="fas fa-bath"></i>
                                        <span>2 Bath</span>
                                    </li>
                                    <li> <i class="fas fa-arrows-alt"></i>
                                        <span>1400 sq ft</span>
                                    </li>
                                    <li> <i class="fas fa-car"></i>
                                        <span>1 Garage</span>
                                    </li>
                                </ul>
                                <div class="trending-bottom">
                                    <div class="trend-left float-left">
                                        <ul class="product-rating">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                        </ul>
                                    </div>
                                    <a class="trend-right float-right">
                                        <div class="trend-open">
                                            <p>$4000<span class="per_month">month</span> </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-property-box">
                            <div class="property-item">
                                <a class="property-img" href="single-listing-two.html"><img src="/antofagasta/images/property/property_4.jpg" alt="#"> </a>
                                <ul class="feature_text">
                                    <li class="feature_cb"><span>New</span></li>
                                    <li class="feature_or"><span>For Sale</span></li>
                                </ul>
                                <div class="property-author-wrap">
                                    <a href="home-v1.html#" class="property-author">
                                        <img src="/antofagasta/images/agents/agency_4.jpg" alt="...">
                                        <span>Hexa Properties</span>
                                    </a>
                                    <ul class="save-btn">
                                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="home-v1.html#"><i class="lnr lnr-heart"></i></a></li>
                                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="home-v1.html#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="property-title-box">
                                <h4><a href="single-listing-one.html">Office Space in Thatcham</a></h4>
                                <div class="property-location">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <p>Colthrop Lane, Thatcham, London</p>
                                </div>
                                <ul class="property-feature">
                                    <li> <i class="fas fa-home"></i>
                                        <span>6 Rooms</span>
                                    </li>
                                    <li> <i class="fas fa-bath"></i>
                                        <span>2 Bath</span>
                                    </li>
                                    <li> <i class="fas fa-arrows-alt"></i>
                                        <span>1400 sq ft</span>
                                    </li>
                                    <li> <i class="fas fa-car"></i>
                                        <span>1 Garage</span>
                                    </li>
                                </ul>
                                <div class="trending-bottom">
                                    <div class="trend-left float-left">
                                        <ul class="product-rating">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                        </ul>
                                    </div>
                                    <a class="trend-right float-right">
                                        <div class="trend-open">
                                            <p><span class="per_sale">starts from</span>$12000</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-property-box">
                            <div class="property-item">
                                <a class="property-img" href="single-listing-two.html"><img src="/antofagasta/images/property/property_5.jpg" alt="#"> </a>
                                <ul class="feature_text">
                                    <li class="feature_cb"><span>New</span></li>
                                    <li class="feature_or"><span>For Sale</span></li>
                                </ul>
                                <div class="property-author-wrap">
                                    <a href="home-v1.html#" class="property-author">
                                        <img src="/antofagasta/images/agents/agency_3.jpg" alt="...">
                                        <span>Seaside Properties</span>
                                    </a>
                                    <ul class="save-btn">
                                        <li data-toggle="tooltip" data-placement="top" title="Photos"><a href="http://demo.lion-coders.com/html/sarchholm-real-estate-template/.photo-gallery" class="btn-gallery"><i class="lnr lnr-camera"></i></a></li>
                                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="home-v1.html#"><i class="lnr lnr-heart"></i></a></li>
                                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="home-v1.html#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                    </ul>
                                    <div class="hidden photo-gallery">
                                        <a href="/antofagasta/images/single-listing/property_view_1.jpg"></a>
                                        <a href="/antofagasta/images/single-listing/property_view_2.jpg"></a>
                                        <a href="/antofagasta/images/single-listing/property_view_3.jpg"></a>
                                        <a href="/antofagasta/images/single-listing/property_view_4.jpg"></a>
                                        <a href="/antofagasta/images/single-listing/property_view_5.jpg"></a>
                                        <a href="/antofagasta/images/single-listing/property_view_6.jpg"></a>
                                        <a href="/antofagasta/images/single-listing/property_view_7.jpg"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="property-title-box">
                                <h4><a href="single-listing-one.html">Luxury Villa in Birmingham</a></h4>
                                <div class="property-location">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <p>159 Dudley Rd, Birmingham, UK</p>
                                </div>
                                <ul class="property-feature">
                                    <li> <i class="fas fa-bed"></i>
                                        <span>5 Bedrooms</span>
                                    </li>
                                    <li> <i class="fas fa-bath"></i>
                                        <span>4 Bath</span>
                                    </li>
                                    <li> <i class="fas fa-arrows-alt"></i>
                                        <span>3000 sq ft</span>
                                    </li>
                                    <li> <i class="fas fa-car"></i>
                                        <span>2 Garage</span>
                                    </li>
                                </ul>
                                <div class="trending-bottom">
                                    <div class="trend-left float-left">
                                        <ul class="product-rating">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                        </ul>
                                    </div>
                                    <a class="trend-right float-right">
                                        <div class="trend-open">
                                            <p><span class="per_sale">starts from</span>$21000</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="trending-pagination"></div>
        </div>
    </div>
</div>
<!--Trending events ends-->
<!--Promo Section starts-->
<div class="promo-section mt-50 v2">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-12">
                <div class="promo-desc">
                    <div class="section-title v2">
                        <p>Lorem ipsum dolor sit.</p>
                        <h2>Why choose us</h2>
                    </div>
                    <div class="promo-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod libero amet, laborum qui nulla quae alias tempora. Placeat voluptatem eum numquam quas distinctio obcaecati quaerat, repudiandae qui! Quia, omnis, doloribus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod libero amet, laborum qui nulla quae alias tempora. </p>
                    </div>
                    <div class="row pt-5">
                        <div class="col-sm-4 col-12">
                            <div class="counter-text v2">
                                <i class="lnr lnr-apartment"></i>
                                <h6 class="counter-value" data-from="0" data-to="10" data-speed="1500">
                                </h6>
                                <p>Years of experience</p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="counter-text v2">
                                <i class="lnr lnr-thumbs-up"></i>
                                <h6 class="counter-value" data-from="0" data-to="585" data-speed="1000">
                                </h6>
                                <p> Happy Customers</p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="counter-text v2">
                                <i class="lnr lnr-user"></i>
                                <h6 class="counter-value" data-from="0" data-to="100" data-speed="1500">
                                </h6>
                                <p>Real estate Agent</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="promo-content-wrap">
                            <div class="promo-content">
                                <img src="/antofagasta/images/category/pin.png" alt="...">
                                <h4>Personalized Service.</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquid cumque</p>
                            </div>
                            <div class="promo-content">
                                <img src="/antofagasta/images/category/rent.png" alt="...">
                                <h4>Financing made easy.</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquid cumque.</p>
                            </div>
                            <div class="promo-content">
                                <img src="/antofagasta/images/category/customer_support.png" alt="...">
                                <h4>24/7 support.</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquid cumque.</p>
                            </div>
                            <div class="promo-content">
                                <img src="/antofagasta/images/category/deal.png" alt="...">
                                <h4>Trusted by thousands.</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquid cumque.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Promo Section ends-->
<!--Testimonial Section start-->
<div class="hero-client-section mt-140 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <div class="section-title v1">
                    <p>Lorem ipsum dolor.</p>
                    <h2>Hear from our clients</h2>
                </div>
            </div>
            <div class="col-md-12 mb-70">
                <div class="testimonial-wrapper swiper-container ">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="single-testimonial-item">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="testimonial-video" style="background-image: url(/antofagasta/images/testimonial/testimonial-2.jpg)">
                                            <div class="overlay op-2"></div>
                                            <div class="testimonial-btn">
                                                <a href="https://www.youtube.com/watch?v=EFB33r7u4tY" class="property-yt hvr-ripple-out"><i class="fas fa-play"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial-quote">
                                        <h4>Smith &amp; Sarah Williamson</h4>
                                        <span>North Carolina, USA</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, dignissimos, delectus? Molestias a deleniti quam quas, ex, expedita necessitatibus quis</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="single-testimonial-item">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="testimonial-video" style="background-image: url(/antofagasta/images/testimonial/testimonial-5.jpg)">
                                        </div>
                                    </div>
                                    <div class="testimonial-quote">
                                        <h4>Bob &amp; Ana Franklin </h4>
                                        <span>North Carolina, USA</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, dignissimos, delectus? Molestias a deleniti quam quas, ex, expedita necessitatibus quis</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="single-testimonial-item">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="testimonial-video" style="background-image: url(/antofagasta/images/testimonial/testimonial-7.jpg)">
                                            <div class="overlay op-3"></div>
                                            <div class="testimonial-btn">
                                                <a href="https://www.youtube.com/watch?v=EFB33r7u4tY" class="property-yt hvr-ripple-out"><i class="fas fa-play"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial-quote">
                                        <h4>Jhon &amp; Ketty Doe</h4>
                                        <span>North Carolina, USA</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, dignissimos, delectus? Molestias a deleniti quam quas, ex, expedita necessitatibus quis</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="client-btn-wrap">
                    <div class="client-prev"><i class="lnr lnr-arrow-left"></i></div>
                    <div class="client-next"><i class="lnr lnr-arrow-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Testimonial Section ends-->
<!--Call to action starts-->
<div class="call-to-action bg-fixed bg-h mt-4 consult-form v1" style="background-image: url(/antofagasta/images/bg/call-to-action-bg.jpg)">
    <div class="overlay op-9"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-12 text-center">
                <div class="action-title sm-center">
                    <h2>Get a Free Consultation</h2>
                    <p>With no pressure to commit and no money collected until we sell your home, why not schedule your free consultation and let our expert knowledge and resources help you realize your goal of buying or selling a home.</p>
                </div>
            </div>
        </div>
        <div class="row consult-form">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="form-group">
                    <input type="text" class="form-control filter-input" placeholder="Your name">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="form-group">
                    <input type="text" class="form-control filter-input" placeholder="Your mail">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="form-group">
                    <input type="text" class="form-control filter-input" placeholder="Your phone number">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="form-group">
                    <select class="listing-input hero__form-input  custom-select">
                        <option>Select your city</option>
                        <option>NewYork</option>
                        <option>Milan</option>
                        <option>Florida</option>
                        <option>Miami</option>
                        <option>Havana</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="form-group">
                    <select class="listing-input hero__form-input  custom-select">
                        <option>Buy a property</option>
                        <option>Rent a property</option>
                        <option>Others </option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <a href="home-v1.html#" class="btn v8">Send Message</a>
            </div>
        </div>
    </div>
</div>
<!--Call to action ends-->
<!--Team section starts-->
<div class="team-section mt-130 pb-100">
    <div class="container">
        <div class="row mt-30">
            <div class="col-md-8 offset-md-2 text-center">
                <div class="section-title v1">
                    <p>Ready to serve you the best</p>
                    <h2>Meet our Agents</h2>
                </div>
            </div>
            <div class="col-md-12">
                <div class="team-wrapper swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="single-team-member v2">
                                <a href="single-agent.html"><img src="/antofagasta/images/agents/agent_1.jpg" alt="Image"></a>
                                <div class="single-team-info">
                                    <h4><a href="single-agent.html">Tony Stark</a></h4>
                                    <span>Real Estate Agent</span>
                                    <div class="contact-info">
                                        <div class="icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="text"><a href="tel:44078767595">+44 765 342 312</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="single-team-member v2">
                                <a href="single-agent.html">
                                    <img src="/antofagasta/images/agents/agent_2.jpg" alt="Image">
                                </a>
                                <div class="single-team-info">
                                    <h4><a href="single-agent.html">Bob Haris</a></h4>
                                    <span>Sales Executive</span>
                                    <div class="contact-info">
                                        <div class="icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="text"><a href="tel:44078767595">+44 078 767 595</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="single-team-member v2">
                                <a href="single-agent.html"><img src="/antofagasta/images/agents/agent_3.jpg" alt="Image"></a>
                                <div class="single-team-info">
                                    <h4><a href="single-agent.html">Jim Karry</a></h4>
                                    <span>Real Estate Broker</span>
                                    <div class="contact-info">
                                        <div class="icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="text"><a href="tel:44055847538">+44 055 847 538</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="single-team-member v2">
                                <a href="single-agent.html"><img src="/antofagasta/images/agents/agent_4.jpg" alt="Image"></a>
                                <div class="single-team-info">
                                    <h4><a href="single-agent.html">Alfred Jhon</a></h4>
                                    <span>Sales Executive</span>
                                    <div class="contact-info">
                                        <div class="icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="text"><a href="tel:44055847538">+44 078 767 598</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="single-team-member v2">
                                <a href="single-agent.html"><img src="/antofagasta/images/agents/agent_8.jpg" alt="Image"></a>
                                <div class="single-team-info">
                                    <h4><a href="single-agent.html">Boris Baker</a></h4>
                                    <span>Real Estate Agent</span>
                                    <div class="contact-info">
                                        <div class="icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="text"><a href="tel:44321445 678">+44 321 445 678</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-btn v2 team_next"><i class="lnr lnr-arrow-right"></i></div>
                    <div class="slider-btn v2 team_prev"><i class="lnr lnr-arrow-left"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Team section starts-->
@stop
@section('plugins-js')
<script></script>
@stop
