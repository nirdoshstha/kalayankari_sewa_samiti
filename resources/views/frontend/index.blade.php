@extends('frontend.layouts.master')

@section('title')
    Kalayankari Sewa Samiti
@endsection

@section('seo_keyword')
    {{ $data['about']->seo_keyword ?? '' }}
@endsection

@section('seo_description')
    {{ $data['about']->seo_description ?? '' }}
@endsection

@section('content')


    <section class="homepage-content-wrapper">
        @if ($data['introduction']->status == 1)
            <div class="about-section">
                <div class="container">
                    <div class="row align-items-end g-4 g-md-5">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="about-img">
                                <img src="{{ asset('storage/' . $data['introduction']->image) }}" width="100%" height="100%"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-8 ">
                            <div class="about-desc">
                                <h2 class="title-label">{{ $data['introduction']->title ?? '' }}</h2>
                                <h1>{{ $data['introduction']->title ?? '' }}</h1>
                                <p> {!! $data['introduction']->description ?? '' !!}</p>
                                <a href="#" class="btn-read">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            {{-- <div class="about-section">
                <div class="container">
                    <div class="row align-items-end g-4 g-md-5">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="about-img">
                                <img src="{{ asset('frontend/assets/image/about.jpg') }}" width="100%" height="100%"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-8 ">
                            <div class="about-desc">
                                <h2 class="title-label">About Us</h2>
                                <h1>Welcome to Kalayankari sewa</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam ullam vitae iusto
                                    maiores autem similique adipisci culpa voluptatem dolorem hic? Fugiat similique
                                    alias voluptatum temporibus ipsum laborum est officia, placeat voluptatem minima
                                    expedita adipisci reprehenderit ipsa ipsam hic unde inventore dignissimos ut nemo
                                    enim doloribus?</p>
                                <p class="mb-4 mb-lg-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis
                                    aliquam
                                    obcaecati
                                    officiis maxime quidem distinctio quis illum labore atque repellat!</p>
                                <a href="#" class="btn-read">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        @endif



        {{-- Chairpersons  --}}
        @if ($data['chairperson']->status_home === 1)
            <div class="container">
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
                                <div class="swiper testi bg-light">
                                    <div class="swiper-wrapper">
                                        @forelse ($data['chairpersons'] as $objective)
                                            <div class="col-12 col-md-6 col-lg-3 swiper-slide">
                                                <div class="team-card mb-4">
                                                    <div class="team-image">
                                                        <img src="{{ asset('storage/' . $objective->image) }}"
                                                            width="100%" height="100%" alt="">
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
                </div>
        @endif

        {{-- Thakali Head  --}}
        @if ($data['thakali']->status_home === 1)
            <div class="my-5">
                @if (!is_null($data['thakali']))
                    <div class="container">
                        <div class="col-12 col-md-6 col-lg-12 ">
                            <div class="about-desc text-center">
                                {{-- <h2 class="title-label">Former Chirpersons</h2> --}}
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
                            <div class="swiper testi bg-light">
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
            </div>
        @endif
    @endsection

    @push('js')
    @endpush
