@extends('frontend.layouts.master')

@section('title') 
Video Gallery
@endsection

@section('seo_keyword'){{$data['video']->seo_keyword ?? ''}}@endsection 

@section('seo_description'){{$data['video']->seo_description ?? ''}}@endsection

@push('css')
<link rel="stylesheet" href="{{asset('frontend/lightbox2-2.11.3/dist/css/lightbox.min.css')}}">

@endpush

@section('content') 
<!-- Page Header Start -->
{{-- @if(!is_null($data['video']))
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style=" background: linear-gradient(rgba(136, 180, 78, .7), rgba(117, 184, 28, 0.7)), url('{{asset('storage/'.$data['video']->image)}}') center center no-repeat; background-size: cover;">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">{{$data['video']->title ?? ''}}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item" style="text-shadow: 1px 1px rgb(15, 15, 15);"><a href="{{route('frontend.index')}}">Home</a></li> 
                    <li class="breadcrumb-item" aria-current="page" style="text-shadow: 1px 1px #1e1e1e; color:#0be400">{{$data['video']->title ?? ''}}</li>
                </ol>
            </nav>
        </div>
    </div> 

    @else
        <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style=" background: linear-gradient(rgba(136, 180, 78, .7), rgba(117, 184, 28, 0.7)), url('{{asset('frontend/img/slide-1.jpg')}}') center center no-repeat; background-size: cover;">
            <div class="container text-center py-5">
                <h1 class="display-2 text-dark mb-4 animated slideInDown">Video</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item" style="text-shadow: 1px 1px rgb(15, 15, 15);"><a href="{{route('frontend.index')}}">Home</a></li>
                        <li class="breadcrumb-item" style="text-shadow: 1px 1px rgb(15, 15, 15);"><a href="#"> Gallery</a></li>
                        <li class="breadcrumb-item" aria-current="page" style="text-shadow: 1px 1px #1e1e1e; color:#0be400">Video</li>
                    </ol>
                </nav>
            </div>
        </div> 
        
    @endif --}}
<!-- Page Header End -->

 @if(!is_null($data['video']))
        <div class="breadcrumb-banner"
            style="background-image: url('{{asset('storage/'.$data['video']->image)}}');background-position: center; background-repeat: no-repeat; background-size: cover;">
            <div class="container">
                <div class="banner-desc d-flex flex-column justify-content-center align-items-center">
                    <div class="page-title">
                        <h1>Gallery</h1>
                    </div>
                    <div class="breadcrumb">
                        <ul class="d-flex justify-content-center align-items-center flex-wrap">
                            <li><a href="index.html">Home</a></li>
                            <li><span>Video</span></li>
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
                            <li><span>Video</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endif

        <div class="video-section section-margin">
            <div class="container">
                <div class="video-wrapper">
                    <div class="row">
                    @foreach ($data['videos'] as $video ) 
                        <div class="col-md-4 mb-4">
                            <div class="video-item">
                                <iframe width="100%" height="255"
                                    src="{{$video->video_link}}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                            <div class="video-title">
                                <span>{{$video->title}}</span>
                            </div>
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