@extends('frontend.layouts.master')

@section('title')
    Blog Single
@endsection

@section('content')
    @if (!is_null($data['blog']))
        <div class="breadcrumb-banner"
            style="background-image: url('{{ asset('storage/' . $data['blog']->image) }}');background-position: center; background-repeat: no-repeat; background-size: cover;">
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
    @else
        <div class="breadcrumb-banner"
            style="background-image: url('{{ asset('frontend/assets/image/page-header.jpg') }}');background-position: center; background-repeat: no-repeat; background-size: cover;">
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
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-12 mb-4">
                    <div class="single-blog-wrapper p-3">
                        <div class="blog-title mb-3">
                            <h1>{{ $data['blog_single']->title ?? '' }}</h1>
                        </div>
                        <span class="date"><i class="fa-solid fa-calendar-days mx-2"></i> Published on :
                            {{ $data['blog_single']->created_at->format('Y-m-d H:i:s') }}</span>
                        <div class="blog-img my-4">
                            <img src="{{ asset('storage/' . $data['blog_single']->image) }}" width="100%" height="100%"
                                alt="">
                        </div>
                        <div class="blog-desc">
                            <p>{!! $data['blog_single']->description !!} </p>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-12 mb-4">
                    <div class="side-blogs">
                        <div class="title">
                            <h3>Relatable Blogs</h3>
                        </div>
                        <div class="blog-list">
                            <ul>
                                @forelse ($data['blogs'] as $blog)
                                    <li>
                                        <a href="{{ $blog->slug }}">
                                            <div class="blog-item">
                                                <div class="blog-img">
                                                    <img src="{{ asset('storage/' . $blog->image) }}" width="100%"
                                                        height="100%" alt="">
                                                </div>
                                                <div class="blog-desc">
                                                    <h5>{{ $blog->title }}</h5>
                                                    <span class="date"><i
                                                            class="fa-solid fa-calendar-days me-2"></i>{{ $blog->created_at->format('Y-m-d H:i:s') }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @empty
                                    {{-- <li>
                                        <a href="#">
                                            <div class="blog-item">
                                                <div class="blog-img">
                                                    <img src="assets/image/3.jfif" width="100%" height="100%" alt="">
                                                </div>
                                                <div class="blog-desc">
                                                    <h5>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</h5>
                                                    <span class="date"><i class="fa-solid fa-calendar-days me-2"></i>
                                                        July
                                                        3,
                                                        2024</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li> --}}
                                @endforelse

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
