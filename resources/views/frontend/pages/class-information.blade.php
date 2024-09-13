@extends('frontend.layouts.master')
@section('title')
Class Information
@endsection

@section('seo_keyword'){{$data['class-info']->seo_keyword ?? ''}}@endsection 

@section('seo_description'){{$data['class-info']->seo_description ?? ''}}@endsection

@section('content')
@if(!is_null($data['class-info']))
        <div class="breadcrumb-banner"
            style="background-image: url('{{asset('storage/'.$data['class-info']->image)}}');background-position: center; background-repeat: no-repeat; background-size: cover;">
            <div class="container">
                <div class="banner-desc d-flex flex-column justify-content-center align-items-center">
                    <div class="page-title">
                        <h1>Academics</h1>
                    </div>
                    <div class="breadcrumb">
                        <ul class="d-flex justify-content-center align-items-center flex-wrap">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="#">Academics</a></li>
                            <li><span>Class Information</span></li>
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
                        <h1>Academics</h1>
                    </div>
                    <div class="breadcrumb">
                        <ul class="d-flex justify-content-center align-items-center flex-wrap">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="#">Academics</a></li>
                            <li><span>Class Information</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endif
        <div class="academics-section section-margin">
            <div class="container">
                <div class="academics-wrapper">
                @foreach ($data['classes-info'] as $class )
                    @if($loop->iteration %2==0) 
                            <div class="academics-item --right mb-4 mb-md-0">
                                    <div class="row g-0 flex-md-row-reverse">
                                        <div class="col-md-6">
                                            <div class="academics-img">
                                                <img src="{{asset('storage/'.$class->image)}}" width="100%" height="100%" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="academics-desc">
                                                <h3>{{$loop->iteration}}. {{$class->title}}</h3>
                                                 {!! $class->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                   
                    @else 
                        <div class="academics-item --left mb-4 mb-md-0">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <div class="academics-img">
                                        <img src="{{asset('storage/'.$class->image)}}" width="100%" height="100%" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="academics-desc">
                                        <h3>{{$loop->iteration}}. {{$class->title}}</h3>
                                                 {!! $class->description !!}
                                    </div>
                                </div>
                            </div>
                    </div>
                    
                    @endif
                @endforeach
                   
                   
                     
                </div>
            </div>
        </div>
@endsection
