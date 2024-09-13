@extends('frontend.layouts.master')

@section('title'){{$data['album']->title ?? ''}}@endsection

@section('seo_keyword'){{$data['album_seo']->seo_keyword ?? ''}}@endsection 

@section('seo_description'){{$data['album_seo']->seo_description ?? ''}} @endsection

@push('css')
<link rel="stylesheet" href="{{asset('frontend/assets/lightbox2-2.11.3/dist/css/lightbox.min.css')}}">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> 

@endpush

@section('content') 
<!-- Page Header Start --> 

  <div class="breadcrumb-banner"
            style="background-image: url('{{asset('storage/'.$data['album']->image)}}');background-position: center; background-repeat: no-repeat; background-size: cover;">
            <div class="container">
                <div class="banner-desc d-flex flex-column justify-content-center align-items-center">
                    <div class="page-title">
                        <h1>Gallery</h1>
                    </div>
                    <div class="breadcrumb">
                        <ul class="d-flex justify-content-center align-items-center flex-wrap">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="album.html">Album</a></li>
                            <li><span>Gallery</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="gallery-section section-margin">
            <div class="container">
                <div class="gallery-wrapper">
                    <div class="row">
                    @foreach ($data['album']->images as $album )
                        
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="gallery__image wow fadeInLeft" data-wow-delay="0.1s"
                                style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                                <a class="example-image-link" href="{{image_path($album->url)}}"
                                    data-lightbox="example-set">
                                    <img src="{{image_path($album->url)}}" width="100%" height="100%">
                                </a> 
                            </div>
                        </div>
                    @endforeach
                        
                    </div>
                </div>
            </div>
        </div>

@endsection

@push('js') 
<script type="text/javascript" src="{{asset('frontend/assets/lightbox2-2.11.3/dist/js/lightbox.min.js')}}"></script>
 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> 
@endpush