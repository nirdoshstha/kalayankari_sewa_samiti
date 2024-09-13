@extends('frontend.layouts.master')

@section('title'){{$data['album']->title ?? ''}}@endsection

@section('seo_keyword'){{$data['album']->seo_keyword ?? ''}}@endsection 

@section('seo_description'){{$data['album']->seo_description ?? ''}} @endsection

@push('css')
<link rel="stylesheet" href="{{asset('frontend/lightbox2-2.11.3/dist/css/lightbox.min.css')}}">

@endpush

@section('content') 
@if(!is_null($data['album']))
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
                            <li><span>{{ $data['album']->title ?? ''}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@else
        <div class="breadcrumb-banner"
            style="background-image: url('{{asset('frontend/assets/image/page-header.jpg')}}');background-position: center; background-repeat: no-repeat; background-size: cover;">
            <div class="container">
                <div class="banner-desc d-flex flex-column justify-content-center align-items-center">
                    <div class="page-title">
                        <h1>Gallery</h1>
                    </div>
                    <div class="breadcrumb">
                        <ul class="d-flex justify-content-center align-items-center flex-wrap">
                            <li><a href="index.html">Home</a></li>
                            <li><span>{{ $data['album']->title ?? ''}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> 
@endif

    <div class="album-section section-margin">
            <div class="container">
                <div class="album-wrapper">
                    <div class="row">
                    @foreach ( $data['albums'] as $album ) 
                        <div class="col-md-3 mb-4">
                            <a href="{{route('frontend.album_images',$album->slug)}}">
                                <div class="album-item">
                                    <img src="{{asset('storage/'.$album->image)}}" width="100%" height="100%" alt="Image 1">
                                    <span class="text-holder">{{ $album->title }}</span>
                                </div>
                            </a>
                        </div>   
                    @endforeach
                        
                    </div>
                </div>
            </div>
    </div>
@endsection

@push('js')
<script type="text/javascript" src="{{asset('frontend/lightbox2-2.11.3/dist/js/lightbox.min.js')}}"></script>
@endpush