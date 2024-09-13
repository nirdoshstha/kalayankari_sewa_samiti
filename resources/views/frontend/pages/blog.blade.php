@extends('frontend.layouts.master')

@section('title')
Blog
@endsection

@section('content')
    @if(!empty($data['blog']->image))
        <div class="breadcrumb-banner"
            style="background-image: url('{{asset('storage/'.$data['blog']->image)}}');background-position: center; background-repeat: no-repeat; background-size: cover;">
            <div class="container">
                <div class="banner-desc d-flex flex-column justify-content-center align-items-center">
                    <div class="page-title">
                        <h1>Blog</h1>
                    </div>
                    <div class="breadcrumb">
                        <ul class="d-flex justify-content-center align-items-center flex-wrap">
                            <li><a href="#">Home</a></li>
                            <li><span>Blog</span></li>
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
                        <h1>Blog</h1>
                    </div>
                    <div class="breadcrumb">
                        <ul class="d-flex justify-content-center align-items-center flex-wrap">
                            <li><a href="index.html">Home</a></li>
                            <li><span>Blog</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
        <div class="blog-section section-margin">
            <div class="container">
                <div class="blog-wrapper">
                    <div class="row">
                    @forelse ($data['blogs'] as $blog )
                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <a href="{{route('frontend.blog_single_page',$blog->slug)}}">
                                <div class="blog-card">
                                    <div class="blog-img">
                                        <img src="{{asset('storage/'.$blog->image)}}" width="100%" height="100%" alt="">
                                    </div>
                                    <div class="blog-desc">
                                        <h4>{{ Str::limit($blog->title,30) }}</h4>
                                        <p> {!! Str::limit($blog->description,100) !!}</p>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-read">Read More</button>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <a href="blog-single.html">
                                <div class="blog-card">
                                    <div class="blog-img">
                                        <img src="assets/image/facility-1.jpg" width="100%" height="100%" alt="">
                                    </div>
                                    <div class="blog-desc">
                                        <h4>Lorem ipsum dolor sit amet.</h4>
                                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius quidem sunt
                                            placeat ducimus. Illo similique
                                        </p>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-read">Read More</button>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforelse
                        
                        
                    </div>
                </div>
            </div>
        </div>
@endsection
