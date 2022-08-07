<section class="popular-cars-section">
    	<div class="auto-container">
        	<!--Sec Title-->
 
    		<div class="sec-title">
            	<h2>HYUNDAI</h2>
            </div>

    		<!--End Sec Title-->
            <div class="row clearfix">
            	<!--Car Block-->

            		@foreach ($category_autos->subcategories as $subcategory)
                  <div class="car-block col-lg-3 col-md-4 col-sm-6 col-xs-12">
                	<div class="inner-box">
                    	<div class="image">
                        	<a href="/catalogo?category={{ $category_autos->slug }}&subcategoria={{ $subcategory->slug }}"><img src="{{ $subcategory->icon_white }}" alt=""></a>
                            <div class="price">Ver más</div>
                        </div>

                        <h3><a href="/catalogo?category={{ $category_autos->slug }}&subcategoria={{ $subcategory->slug }}">{{ $subcategory->name }}</a></h3>
                      
                    </div>
                </div>
                @endforeach
                
       
            </div>
            

        </div>
    </section>