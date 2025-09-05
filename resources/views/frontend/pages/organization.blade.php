@extends('frontend.layouts.master')

@section('title')
    {{ $data['organization']->title ?? 'Organization Structure' }}
@endsection

@section('seo_keyword')
    {{ $data['organization']->seo_keyword ?? '' }}
@endsection

@section('seo_description')
    {{ $data['organization']->seo_description ?? '' }}
@endsection

@section('content')
    @if (!is_null($data['organization']) && !is_null($data['organization']->image))
        <div class="breadcrumb-banner"
            style="background-image: url('{{ asset('storage/' . $data['organization']->image) }}');background-position: center; background-repeat: no-repeat; background-size: cover;">
            <div class="container">
                <div class="banner-desc d-flex flex-column justify-content-center align-items-center">
                    <div class="page-title">
                        <h1>@yield('title')</h1>
                    </div>
                    <div class="breadcrumb">
                        <ul class="d-flex justify-content-center align-items-center flex-wrap">
                            <li><a href="index.html">Home</a></li>
                            <li><span>@yield('title')</span></li>
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
                        <h1>@yield('title')</h1>
                    </div>
                    <div class="breadcrumb">
                        <ul class="d-flex justify-content-center align-items-center flex-wrap">
                            <li><a href="{{ route('frontend.index') }}">Home</a></li>
                            <li><span>@yield('title')</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif


    {{-- Thakali Head  --}}
    <section class="homepage-content-wrapper">
        <div class="my-5">
            @if (!is_null($data['organization']))
                <div class="container">
                    <div class="col-12 col-md-6 col-lg-12 ">
                        <div class="about-desc text-center">
                            <h2 class="title-label">{{ $data['organization']->title ?? '' }}</h2>
                            <p> {!! $data['organization']->description ?? '' !!} </p>
                        </div>

                    </div>
                </div>
            @endif
            <div class="team-section py-5">
                <div class="container">
                    @forelse ($data['organizations'] as $organization)
                        <div class="col-12 col-md-6 col-lg-12 ">
                            <div class="about-desc text-center mt-5">
                                <h2 class="title-label">{{ $organization->title ?? '' }}</h2>
                                <p> {!! $organization->description ?? '' !!} </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="swiper testi">
                                <div class="swiper-wrapper">

                                    @foreach ($organization?->posts->where('status', 0) as $organizations)
                                        <div class="col-12 col-md-6 col-lg-3 swiper-slide py-3">
                                            <div class="team-card mb-4">
                                                <div class="team-image">
                                                    <img src="{{ asset('storage/' . $organizations->image) }}"
                                                        width="100%" height="100%" alt="">
                                                </div>
                                                <div class="news-desc d-flex flex-column text-center">
                                                    <h6>{{ $organizations->title }}</h6>
                                                    <span class="date" style="font-size: 12px">From :
                                                        {{ $organizations->start_date }} To :
                                                        {{ $organizations->end_date }} </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"> </div>
                            </div>
                        </div>
                    @empty
                    @endforelse



                </div>
            </div>
        </div>
    </section>
@endsection
