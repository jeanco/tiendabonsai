<div class="widget search_blog d-block d-sm-block d-md-block d-lg-none">
    <div class="form-group">
        <input type="text" name="search" id="search" class="form-control" placeholder="Search..">
        <button type="submit"><i class="ti-search"></i><span class="sr-only">Search</span></button>
    </div>
</div>
<!-- /widget -->
@php
  
    $n = 6;
    $number_page = $page-1;
    $cant = count($catalogs);

    $products = [];

    for($i=0; $i < $cant ; $i++){

        $products[$i]=$i; 

    }



            $m = $cant/$n;
            $m = round($m, 0, PHP_ROUND_HALF_UP);

    $paginate = [];

    $sumador = 0;

    for ($j = 0; $j < $m; $j++) {

          for ($k = 0; $k < $n; $k++) {

            $aux = $k +$sumador;

            if($aux == $cant){
                break;
            }

            $paginate[$j][$k] = $aux;


            
          }
          $sumador = $sumador+$n;
        }

        $final = count($paginate[$number_page])-1;
    


    $inicio = $paginate[$number_page][0];
    $fin = $paginate[$number_page][$final];





  
@endphp

<div class="row">
    
    @for($j=$inicio; $j <= $fin ; $j++)
    <div class="col-md-2">
        <article class="blog">
            <figure>
                <a href="{{ $catalogs[$j]->link}}"  target="_blank"><img src="{{$catalogs[$j]->image_desktop}}" alt="" style="width: 100% !important;">
                    <div class="preview"><span>Ver el libro</span></div>
                </a>
            </figure>
            <div class="post_info">
               
                <h2><a href="{{ $catalogs[$j]->link}}" target="_blank">{{ $catalogs[$j]->title}}</a></h2>
               
                
            </div>
        </article>
        <!-- /article -->
    </div>
    @endfor


    <!-- /col -->
</div>

<div class="pagination__wrapper no_border add_bottom_30">
    <ul class="pagination">
       
        @php

            $n = $count_catalogs/6;
            $n = round($n, 0, PHP_ROUND_HALF_UP);


        @endphp

        <!--li><a href="blog.html#0" class="prev" title="previous page">&#10094;</a></li-->
        @for($i=1; $i <= $n ; $i++)


            @if($page == $i)
            <li>
            <a href="/libros?page={{$i}}" class="active">{{$i}}</a>
            </li>
            @else
            <li>
            <a href="/libros?page={{$i}}">{{$i}}</a>
            </li>
            @endif
            

        @endfor
        <!--li><a href="blog.html#0" class="next" title="next page">&#10095;</a></li-->
        
     
      
    </ul>
</div>
<!-- /row -->

