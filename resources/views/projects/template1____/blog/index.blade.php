@extends('template1.layouts.index')
@section('content')
<!--Breadcrumb section starts-->
<div class="breadcrumb-section bg-h" style="background-image: url(/antofagasta/images/breadcrumb/breadcrumb_1.jpg)">
    <div class="overlay op-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <div class="breadcrumb-menu">
                    <h2>News Right sidebar</h2>
                    <span><a href="home-v1.html">Home</a></span>
                    <span>News Right sidebar</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumb section ends-->
<!--Blog section starts-->

 <!--Blog section starts-->
<div class="blog-area">
    <div class="container">
        <div class="row">
            <!--Blog post starts-->
            <div class="col-xl-8 order-xl-12 order-xl-2 order-2">
                <div class="blog-section style1 pt-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="card single-blog-item v1">
                                    <img src="/antofagasta/images/blog/news_2.jpg" alt="...">
                                    <div class="card-body">
                                        <a href="news-right-sidebar.html#" class="blog-cat">Apartment</a>
                                        <h4 class="card-title"><a href="{{ URL::to('/nuevo/perfil-blog') }}">The most inspiring interior design for your home</a></h4>
                                    </div>
                                    <div class="bottom-content">
                                        <p>By<a href="news-right-sidebar.html#">Louis Fonsi</a><span class="date">Feb 20th , 2019</span> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="card single-blog-item v1">
                                    <img src="/antofagasta/images/blog/news_3.jpg" alt="...">
                                    <div class="card-body">
                                        <a href="news-right-sidebar.html#" class="blog-cat">Real estate</a>
                                        <h4 class="card-title"><a href="{{ URL::to('/nuevo/perfil-blog') }}"> 7 Simple secrets to totally rocking your Real Estate </a></h4>
                                    </div>
                                    <div class="bottom-content">
                                        <p>By<a href="news-right-sidebar.html#">Tony stark</a><span class="date">Mar 21st, 2019</span> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                               <div class="card single-blog-item v1">
                                    <img src="/antofagasta/images/blog/news_1.jpg" alt="...">
                                    <div class="card-body">
                                        <a href="news-right-sidebar.html#" class="blog-cat">Real estate</a>
                                        <h4 class="card-title"><a href="{{ URL::to('/nuevo/perfil-blog') }}">10 benifits of rental that may change your perspective</a></h4>
                                    </div>
                                    <div class="bottom-content">
                                        <p>By<a href="news-right-sidebar.html#">Bob Haris</a><span class="date">Sep 28th , 2018</span> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <div class="card single-blog-item v1">
                                    <img src="/antofagasta/images/blog/news_4.jpg" alt="...">
                                    <div class="card-body">
                                        <a href="news-right-sidebar.html#" class="blog-cat">Business</a>
                                        <h4 class="card-title"><a href="{{ URL::to('/nuevo/perfil-blog') }}">10 things to know before buying real estate property</a></h4>
                                    </div>
                                    <div class="bottom-content">
                                        <p>By<a href="news-right-sidebar.html#">Jim Kerry</a><span class="date">June 28th , 2019</span> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--pagination starts-->
                        <div class="post-nav nav-res pt-20 pb-60">
                            <div class="row">
                                <div class="col-md-8 offset-md-2  col-xs-12 ">
                                    <div class="page-num text-center">
                                        <ul>
                                            <li class="active"><a href="news-right-sidebar.html#">1</a></li>
                                            <li><a href="news-right-sidebar.html#">2</a></li>
                                            <li><a href="news-right-sidebar.html#">3</a></li>
                                            <li><a href="news-right-sidebar.html#">4</a></li>
                                            <li><a href="news-right-sidebar.html#"><i class="lnr lnr-chevron-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--pagination ends-->
                    </div>
                </div>
            </div>
            <!--Blog post ends-->
            <!-- Sidebar starts-->
            <div class="col-xl-4 order-xl-12 order-xl-1 order-1">
                <div class="sidebar">
                    <div class="sidebar-right">
                        <div class="widget search">
                            <form>
                                <input type="text" class="form-control" placeholder="Search">
                                <button type="submit" class="search-button"><i class="lnr lnr-magnifier"></i></button>
                            </form>
                        </div>
                        <div class="widget categories">
                            <h3 class="widget-title">Popular Topic</h3>
                            <ul class="icon">
                                <li><a href="news-right-sidebar.html#">Modern Living</a><span>(4)</span></li>
                                <li><a href="news-right-sidebar.html#">Real Estate</a><span>(15)</span></li>
                                <li><a href="news-right-sidebar.html#">Interior Design</a> <span>(5)</span></li>
                                <li><a href="news-right-sidebar.html#">Home Furniture</a><span>(7)</span></li>
                            </ul>
                        </div>
                        <div class="widget recent">
                            <h3 class="widget-title">Recent Post</h3>
                            <ul class="post-list">
                                <li class="row recent-list">
                                    <div class="col-lg-5 col-4">
                                        <div class="entry-img">
                                            <img src="/antofagasta/images/blog/news_9.jpg" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-8 no-pad-left">
                                        <div class="entry-text">
                                            <h4 class="entry-title"><a href="{{ URL::to('/nuevo/perfil-blog') }}">The Most luxurious way to spend your vacation</a></h4>
                                            <div class="property-location">
                                                <p>Aug 5th, 2019</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="row recent-list">
                                    <div class="col-lg-5 col-4">
                                        <div class="entry-img">
                                            <img src="/antofagasta/images/blog/news_2.jpg" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-8 no-pad-left">
                                        <div class="entry-text">
                                            <h4 class="entry-title"><a href="{{ URL::to('/nuevo/perfil-blog') }}">Best interior design idea for your home.</a></h4>
                                            <div class="property-location">
                                                <p>Jul 25th, 2019</p>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li class="row recent-list">
                                    <div class="col-lg-5 col-4">
                                        <div class="entry-img">
                                            <img src="/antofagasta/images/property/property_2.jpg" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-8 no-pad-left">
                                        <div class="entry-text">
                                            <h4 class="entry-title"><a href="{{ URL::to('/nuevo/perfil-blog') }}">Why you should rent Harfold Villas</a></h4>
                                            <div class="property-location">
                                                <p>Aug 3rd, 2019</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="widget">
                            <h3 class="widget-title">Tags</h3>
                            <ul class="list-tags">
                                <li><a href="news-right-sidebar.html#" class="btn v2">Villa</a></li>
                                <li><a href="news-right-sidebar.html#" class="btn v2">Apartment</a></li>
                                <li><a href="news-right-sidebar.html#" class="btn v2">Condo</a></li>
                                <li><a href="news-right-sidebar.html#" class="btn v2">Interior</a></li>
                                <li><a href="news-right-sidebar.html#" class="btn v2">Family home</a></li>
                                <li><a href="news-right-sidebar.html#" class="btn v2">Luxury villa</a></li>
                                <li><a href="news-right-sidebar.html#" class="btn v2">Real estate</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Sidebar ends -->
        </div>
    </div>
</div>
<!--Blog section ends-->
@stop
@section('plugins-js')
<script></script>
@stop
