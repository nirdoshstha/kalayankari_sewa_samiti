@extends('frontend.layouts.master')

@section('title')
    {{ $data['introduction']->title ?? 'Introduction' }}
@endsection

@section('seo_keyword')
    {{ $data['introduction']->seo_keyword ?? '' }}
@endsection

@section('seo_description')
    {{ $data['introduction']->seo_description ?? '' }}
@endsection

@section('content')
    @if (!is_null($data['introduction']) && !is_null($data['introduction']->image))
        <div class="breadcrumb-banner"
            style="background-image: url('{{ asset('storage/' . $data['introduction']->banner) }}');background-position: center; background-repeat: no-repeat; background-size: cover;">
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

    <section class="homepage-content-wrapper">
        @if (!is_null($data['introduction']))
            <div class="about-section">
                <div class="container">
                    <div class="row align-items-center g-4 g-md-5">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="about-img mt-5">
                                <img src="{{ asset('storage/' . $data['introduction']->image) }}" width="100%"
                                    height="100%" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-8">
                            <div class="about-desc">
                                <h2 class="title-label">{{ $data['introduction']->title ?? '' }}</h2>
                                <p> {!! $data['introduction']->description ?? '' !!}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="about-section">
                <div class="container">
                    <div class="row align-items-end g-4 g-md-5">
                    </div>
                </div>
            </div>
        @endif

        @if (!is_null($data['objective']))
            <div class="container mt-5">
                <div class="row align-items-center g-4 g-md-5">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="about-desc">
                            <h2 class="title-label">{{ $data['objective']->title ?? '' }}</h2>
                            {!! $data['objective']->description ?? '' !!}
                        </div>
                    </div>

                </div>
            </div>
        @else
            <div class="about-section">
                <div class="container">
                    <div class="row align-items-end g-4 g-md-5">
                    </div>
                </div>
            </div>
        @endif

        {{-- Objectives  --}}
        <div class="team-section py-5">
            <div class="container">
                <div class="row">

                    @forelse ($data['objectives'] as $objective)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="team-card mb-4">
                                <div class="team-image">
                                    <img src="{{ asset('storage/' . $objective->image) }}" width="100%" height="100%"
                                        alt="">
                                </div>
                                <div class="news-desc d-flex flex-column text-center">
                                    <h6>{{ $objective->title }}</h6>
                                    <span class="date" style="font-size: 12px">From :
                                        {{ $objective->start_date }} To :
                                        {{ $objective->end_date }} </span>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Chairpersons  --}}
        <div class="my-5">
            @if (!is_null($data['chairperson']))
                <div class="container">
                    <div class="col-12 col-md-6 col-lg-12 ">
                        <div class="about-desc text-center">
                            {{-- <h2 class="title-label">Former Chirpersons</h2> --}}
                            <h2 class="title-label">{{ $data['chairperson']->title ?? '' }}</h2>
                            <p> {!! $data['chairperson']->description ?? '' !!} </p>
                        </div>
                        {{-- --}}
                    </div>
                </div>
            @endif
            <div class="team-section py-5">
                <div class="container">
                    <div class="row">

                        @forelse ($data['chairpersons'] as $chairperson)
                            {{-- <div class="col-12 col-md-6 col-lg-3 swiper-slide">  no need to slider --}}
                            <div class="col-12 col-md-6 col-lg-3 swiper-slides ">

                                <div class="team-card mb-4">
                                    <div class="team-image">
                                        <img src="{{ asset('storage/' . $chairperson->image) }}" width="100%"
                                            height="100%" alt="">
                                    </div>
                                    <div class="news-desc d-flex flex-column text-center">
                                        <h6>{{ $chairperson->title }}</h6>
                                        <span class="date" style="font-size: 12px">From :
                                            {{ $chairperson->start_date }} To :
                                            {{ $chairperson->end_date }} </span>
                                    </div>
                                </div>
                            </div>

                        @empty
                        @endforelse
                        <div class="d-flex justify-content-center align-items-center">
                            {{ $data['chairpersons']->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Thakali Head  --}}
        <div class="my-5">
            @if (!is_null($data['thakali']))
                <div class="container">
                    <div class="col-12 col-md-6 col-lg-12 ">
                        <div class="about-desc text-center">
                            <h2 class="title-label">{{ $data['thakali']->title ?? '' }}</h2>
                            <p> {!! $data['thakali']->description ?? '' !!} </p>
                        </div>
                        {{-- --}}
                    </div>
                </div>
            @endif
            <div class="team-section py-5">
                <div class="container">
                    <div class="row">

                        @forelse ($data['thakalis'] as $thakali)
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="team-card mb-4">
                                    <div class="team-image">
                                        <img src="{{ asset('storage/' . $thakali->image) }}" width="100%" height="100%"
                                            alt="">
                                    </div>
                                    <div class="news-desc d-flex flex-column text-center">
                                        <h6>{{ $thakali->title }}</h6>
                                        <span class="date" style="font-size: 12px">From :
                                            {{ $thakali->start_date }} To :
                                            {{ $thakali->end_date }} </span>

                                    </div>

                                </div>

                            </div>
                        @empty
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
        {{-- <div class="my-5">
            @if (!is_null($data['thakali']))
                <div class="container">
                    <div class="col-12 col-md-6 col-lg-12 ">
                        <div class="about-desc text-center"> 
                            <h2 class="title-label">{{ $data['thakali']->title ?? '' }}</h2>
                            <p> {!! $data['thakali']->description ?? '' !!} </p>
                        </div> 
                    </div>
                </div>
            @endif
            <div class="team-section py-5">
                <div class="container">
                    <div class="row">
                        <div class="swiper testi">
                            <div class="swiper-wrapper">
                                @forelse ($data['thakalis'] as $thakali)
                                    <div class="col-12 col-md-6 col-lg-3 swiper-slide">
                                        <div class="team-card mb-4">
                                            <div class="team-image">
                                                <img src="{{ asset('storage/' . $thakali->image) }}" width="100%"
                                                    height="100%" alt="">
                                            </div>
                                            <div class="news-desc d-flex flex-column text-center">
                                                <h6>{{ $thakali->title }}</h6>
                                                <span class="date" style="font-size: 12px">From :
                                                    {{ $thakali->start_date }} To :
                                                    {{ $thakali->end_date }} </span>

                                            </div>

                                        </div>

                                    </div>
                                @empty
                                    @for ($i = 1; $i <= 4; $i++)
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <div class="team-card">
                                                <div class="team-image">
                                                    <img src="{{ asset('frontend/assets/image/team1.jpg') }}"
                                                        width="100%" height="100%" alt="">
                                                </div>
                                                <div class="team-desc">
                                                    <h4>Team Name</h4>
                                                    <span>From : </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                @endforelse
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

    </section>
@endsection
