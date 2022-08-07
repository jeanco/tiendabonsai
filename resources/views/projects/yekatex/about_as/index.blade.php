@extends('yekatex.layouts.index')
@section('content')

<!-- About Us Start Here -->
<div class="about-us pt-100 pt-sm-60">
    <div class="container">
        <div class="row mb-30">
            <div class="col-lg-6">
                <div class="sidebar-img mb-all-30">
                    <img src="{{ (isset($company['photos'][0])) ? $company['photos'][0]['resource'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png'}}" alt="single-blog-img">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-desc">
                    <h3 class="mb-10 about-title">{{ $company['name_company'] }}</h3>
                    <p style="text-align: justify;">{!! $company['description_company'] !!}</p>
                </div>
            </div>
        </div>
        <div class="row mb-30">
            <div class="col-lg-6">
                <div class="about-desc">
                    <h3 class="mb-10 about-title">Misión</h3>
                    <p style="text-align: justify;">{!! $company['mission'] !!}</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="sidebar-img mb-all-30">
                    <img src="{{ (isset($company['photos'][1])) ? $company['photos'][1]['resource'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png'}}" alt="single-blog-img">
                </div>
            </div>
        </div>
        <div class="row mb-30">
            <div class="col-lg-6">
                <div class="sidebar-img mb-all-30">
                    <img src="{{ (isset($company['photos'][2])) ? $company['photos'][2]['resource'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png'}}" alt="single-blog-img">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-desc">
                    <h3 class="mb-10 about-title">Visión</h3>
                    <p style="text-align: justify;">{!! $company['vision'] !!}</p>
                </div>
            </div>
        </div>
    </div>
<!-- Container End -->
</div>
<!-- About Us End Here -->

<!-- Support Area End Here -->
@stop
@section('plugins-js')
<script></script>
@stop
