@extends('frontend.layouts.master')

@section('title')
Facility
@endsection

@section('seo_keyword'){{$data['facility']->seo_keyword ?? ''}}@endsection 

@section('seo_description'){{$data['facility']->seo_description ?? ''}}@endsection

@section('content')
@if(!is_null($data['facility']))
        <div class="breadcrumb-banner"
                style="background-image: url('{{asset('storage/'.$data['facility']->image)}}');background-position: center; background-repeat: no-repeat; background-size: cover;">
                <div class="container">
                    <div class="banner-desc d-flex flex-column justify-content-center align-items-center">
                        <div class="page-title">
                            <h1>Facilities</h1>
                        </div>
                        <div class="breadcrumb">
                            <ul class="d-flex justify-content-center align-items-center flex-wrap">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Facilities</span></li>
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
                            <h1>Facilities</h1>
                        </div>
                        <div class="breadcrumb">
                            <ul class="d-flex justify-content-center align-items-center flex-wrap">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Facilities</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
@endif
        <div class="facilities-wrapper">
            <div class="container">
                @forelse ($data['facilities'] as $facility )
                    @if($loop->iteration %2 ==0)
                        <div class="facility-inner-right">
                            <div class="row">
                                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                                    <div class="swiper leftSwiper mt-0 mt-lg-5">
                                        <div class="swiper-wrapper">
                                        @foreach ($facility->images as $image )
                                            <div class="swiper-slide">
                                                <img src="{{image_path($image->url)}}" width="100%" height="100%" alt="">
                                            </div>
                                        @endforeach 
                                        </div>
                                    </div>
                                    <div class="action-btn">
                                        <div class="swiper-prev"><i class="fa-solid fa-angle-left"></i></div>
                                        <div class="swiper-next"><i class="fa-solid fa-angle-right"></i></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                    <div class="facility-inner">
                                    </div>
                                    <div class="facility-desc">
                                        <h2>{{$facility->title}}</h2>
                                        <p> {!! $facility->description !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @else 
                        <div class="facility-inner-left">
                            <div class="row flex-column-reverse flex-lg-row">
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                    <div class="facility-inner">
                                    </div>
                                    <div class="facility-desc">
                                         <h2>{{$facility->title}}</h2>
                                        <p> {!! $facility->description !!}</p>
                                    </div>
                                </div>

                                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                                    <div class="swiper leftSwiper mt-0 mt-lg-5">
                                        <div class="swiper-wrapper">
                                             @foreach ($facility->images as $image )
                                                <div class="swiper-slide">
                                                    <img src="{{image_path($image->url)}}" width="100%" height="100%" alt="">
                                                </div>
                                            @endforeach 
                                             
                                        </div>
                                    </div>
                                    <div class="action-btn">
                                        <div class="swiper-prev"><i class="fa-solid fa-angle-left"></i></div>
                                        <div class="swiper-next"><i class="fa-solid fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @empty
                    <div class="facilities-wrapper">
            <div class="container">
                <div class="facility-inner-left">
                    <div class="row flex-column-reverse flex-lg-row">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="facility-inner">
                            </div>
                            <div class="facility-desc">
                                <h2>Auditorium</h2>
                                <p>
                                    The auditorium is a versatile space for celebrations, assembly, award ceremonies,
                                    sports, and drama. The well-equipped auditorium has high-quality lighting and sound
                                    system with a seating capacity of 500 .</p>
                            </div>
                        </div>

                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                            <div class="swiper leftSwiper mt-0 mt-lg-5">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{asset('frontend/assets/image/facility-1.jpg')}}" width="100%" height="100%" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('frontend/assets/image/facility-2.jpg')}}" width="100%" height="100%" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('frontend/assets/image/facility-3.jpg')}}" width="100%" height="100%" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('frontend/assets/image/facility-4.jpg')}}" width="100%" height="100%" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="action-btn">
                                <div class="swiper-prev"><i class="fa-solid fa-angle-left"></i></div>
                                <div class="swiper-next"><i class="fa-solid fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="facility-inner-right">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                            <div class="swiper leftSwiper mt-0 mt-lg-5">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{asset('frontend/assets/image/facility-1.jpg')}}" width="100%" height="100%" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('frontend/assets/image/facility-2.jpg')}}" width="100%" height="100%" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('frontend/assets/image/facility-3.jpg')}}" width="100%" height="100%" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('frontend/assets/image/facility-4.jpg')}}" width="100%" height="100%" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="action-btn">
                                <div class="swiper-prev"><i class="fa-solid fa-angle-left"></i></div>
                                <div class="swiper-next"><i class="fa-solid fa-angle-right"></i></div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="facility-inner">
                            </div>
                            <div class="facility-desc">
                                <h2>Auditorium</h2>
                                <p>
                                    The auditorium is a versatile space for celebrations, assembly, award ceremonies,
                                    sports, and drama. The well-equipped auditorium has high-quality lighting and sound
                                    system with a seating capacity of 500 .</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                @endforelse
            </div>
        </div>
@endsection

@push('js')
<script>
        var swiper = new Swiper(".leftSwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-next',
                prevEl: '.swiper-prev'
            },
            breakpoints: {
                1200: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
            },
        });
    </script>
@endpush