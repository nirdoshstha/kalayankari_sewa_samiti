@extends('frontend.layouts.master')

@section('title')
    News And Events
@endsection

@section('content')
    @if (!is_null($data['notice']))
        <div class="breadcrumb-banner"
            style="background-image: url('{{ asset('storage/' . $data['notice']->image) }}');background-position: center; background-repeat: no-repeat; background-size: cover;">
            <div class="container">
                <div class="banner-desc d-flex flex-column justify-content-center align-items-center">
                    <div class="page-title">
                        <h1>{{ $data['notice']->title ?? 'News and events' }}</h1>
                    </div>
                    <div class="breadcrumb">
                        <ul class="d-flex justify-content-center align-items-center flex-wrap">
                            <li><a href="index.html">Home</a></li>
                            <li><span>{{ $data['notice']->title ?? 'News and events' }}</span></li>
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
                        <h1>{{ $data['notice']->title ?? 'News and events' }}</h1>
                    </div>
                    <div class="breadcrumb">
                        <ul class="d-flex justify-content-center align-items-center flex-wrap">
                            <li><a href="index.html">Home</a></li>
                            <li><span>{{ $data['notice']->title ?? 'News and events' }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <section class="homepage-content-wrapper">
        <div class="team-section section-margin">
            <div class="container">
                <div class="main-title">
                    <h2>News And Events</h2>
                </div>
                <div class="row">
                    @forelse ($data['notices'] as $news)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="team-card mb-4">
                                <div class="team-image">
                                    <img src="{{ asset('storage/' . $news->image) }}" width="100%" height="100%"
                                        alt="">
                                </div>
                                <div class="news-desc d-flex flex-column">
                                    <h5>{{ $news->title }}</h5>
                                    <span class="date" style="font-size: 12px"><i class="fa-solid fa-calendar-days"></i>
                                        {{ $news->created_at->format('Y-m-d') }}</span>
                                    <a href="#" class="link mt-2 notice_view" data-id="{{ $news->id }}"
                                        data-bs-toggle="modal" data-bs-target="#noticeModal">Read More <i
                                            class="fa-solid fa-angles-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @empty
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="team-card mb-4">
                                    <div class="team-image">
                                        <img src="{{ asset('frontend/assets/image/team1.jpg') }}" width="100%"
                                            height="100%" alt="">
                                    </div>
                                    <div class="team-desc">
                                        <h4>Team Name</h4>
                                        <span>principal</span>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    @endforelse
                </div>
            </div>
        </div>

        {{-- <div class="row">
                    <div class="swiper awardSlider px-1">
                        <div class="swiper-wrapper">
                            @forelse ($data['notices'] as $news)
                                <div class="swiper-slide">
                                    
                                        <div class="team-card mb-4">
                                            <div class="team-image">
                                                <img src="{{ asset('storage/' . $news->image) }}" width="100%"
                                                    height="100%" alt="">
                                            </div>
                                            <div class="news-desc d-flex flex-column">
                                                <h5>{{ $news->title }}</h5>
                                                <span class="date" style="font-size: 12px"><i
                                                        class="fa-solid fa-calendar-days"></i>
                                                    {{ $news->created_at->format('Y-m-d') }}</span>
                                                <a href="#" class="link mt-2 notice_view"
                                                    data-id="{{ $news->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#noticeModal">Read More <i
                                                        class="fa-solid fa-angles-right"></i></a>
                                            </div>
                                        </div>
                                    
                                </div>
                            @empty
                                @for ($i = 1; $i <= 4; $i++)
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <div class="team-card mb-4">
                                            <div class="team-image">
                                                <img src="{{ asset('frontend/assets/image/team1.jpg') }}" width="100%"
                                                    height="100%" alt="">
                                            </div>
                                            <div class="team-desc">
                                                <h4>Team Name</h4>
                                                <span>principal</span>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            @endforelse
                        </div>
                    </div>

                </div> --}}

        </div>
        <!-- Modal -->
        <div class="modal fade" id="noticeModal" tabindex="-1" aria-labelledby="noticeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="noticeModalLabel"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body notice_div">

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.notice_view').on('click', function() {
                let notice_id = $(this).attr('data-id');

                $.ajax({
                    url: "{{ route('frontend.notice_modal_view') }}",
                    data: {
                        notice_id: notice_id
                    },
                    success: function(resp) {
                        $('.notice_div').html(resp);
                    }
                })
            })
        })
    </script>
@endpush
