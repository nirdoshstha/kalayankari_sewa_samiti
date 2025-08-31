@extends('frontend.layouts.master')

@section('title')
    {{ $data['download']->title ?? 'Download' }}
@endsection

@section('seo_keyword')
    {{ $data['download']->seo_keyword ?? '' }}
@endsection

@section('seo_description')
    {{ $data['download']->seo_description ?? '' }}
@endsection

@section('content')
    @if (!is_null($data['download']) && !is_null($data['download']->image))
        <div class="breadcrumb-banner"
            style="background-image: url('{{ asset('storage/' . $data['download']->image) }}');background-position: center; background-repeat: no-repeat; background-size: cover;">
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

    <div class="album-section section-margin">
        <div class="container">
            <div class="album-wrapper">
                <div class="row">
                    <div class="col-8 mb-4 mx-auto">
                        <h2 class="mb-3">{{ $data['download']->title ?? '' }}</h2>
                        <p>{!! $data['download']->description ?? '' !!}</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Download Item</th>
                                </tr>
                            </thead>
                            <tbody>


                                @forelse ($data['downloads'] as $download)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $download->title }}</td>
                                        <td>{{ date('d M, Y', strtotime($download->date)) }}</td>
                                        <td><a href="{{ asset('storage/' . $download->image) }}" target="_blank"
                                                class="" download> <i class="fa-solid fa-download"></i>
                                                Download</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4"><span class="text-danger">No Items found</span></td>
                                    </tr>
                                @endforelse



                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-4 ">

                            {{ $data['downloads']->links() }}
                        </div>


                    </div>
                </div>
            </div>
        @endsection
