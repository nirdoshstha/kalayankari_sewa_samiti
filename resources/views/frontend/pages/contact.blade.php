@extends('frontend.layouts.master')

@section('title')
    Contact Us
@endsection

@section('content')
    @if (!empty($data['contact']->subject))
        <div class="breadcrumb-banner"
            style="background-image: url('{{ asset('storage/' . $data['contact']->subject) }}');background-position: center; background-repeat: no-repeat; background-size: cover;">
            <div class="container">
                <div class="banner-desc d-flex flex-column justify-content-center align-items-center">
                    <div class="page-title">
                        <h1>Contact Us</h1>
                    </div>
                    <div class="breadcrumb">
                        <ul class="d-flex justify-content-center align-items-center flex-wrap">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="album.html">Contact</a></li>
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
                        <h1>Contact Us</h1>
                    </div>
                    <div class="breadcrumb">
                        <ul class="d-flex justify-content-center align-items-center flex-wrap">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="album.html">Album</a></li>
                            <li><span>Gallery</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="contact-section section-margin">
        <div class="container">
            <div class="contact-wrapper">
                <div class="row g-0">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-12">
                        <div class="contact-info p-4 d-flex flex-column justify-content-center">
                            <h1 class="contact-title">Contact Information</h1>
                            <ul>
                                <li><span><i class="fa-solid fa-location-dot"></i></span>{{ setting()?->address ?? '' }}
                                </li>
                                <li><span><i class="fa-solid fa-envelope"></i></span>{{ setting()->phone ?? '' }}
                                </li>
                                <li><span><i class="fa-solid fa-mobile-screen"></i></span>{{ setting()->mobile ?? '' }}
                                </li>
                                <li class="mb-0"><span><i
                                            class="fa-solid fa-phone"></i></span>{{ setting()->email ?? '' }}
                                </li>
                            </ul>
                            <div class="social-icons w-100">
                                <ul class="d-flex flex-wrap justify-content-center">
                                    @isset(setting()?->facebook)
                                        <li><a href="{{ setting()?->facebook }}"> <i class="fa-brands fa-facebook-f"></i></a>
                                        </li>
                                    @endisset
                                    @isset(setting()?->instagram)
                                        <li><a href="{{ setting()?->instagram }}"> <i class="fa-brands fa-instagram"></i></a>
                                        </li>
                                    @endisset
                                    @isset(setting()?->twitter)
                                        <li><a href="{{ setting()?->twitter }}"> <i class="fa-brands fa-x-twitter"></i></a>
                                        </li>
                                    @endisset
                                    @isset(setting()?->youtube)
                                        <li><a href="{{ setting()?->youtube }}"> <i class="fa-brands fa-youtube"></i></a></li>
                                    @endisset

                                    @isset(setting()?->linkedin)
                                        <li><a href="{{ setting()?->linkedin }}"> <i class="fa-brands fa-linkedin-in"></i></a>
                                        </li>
                                    @endisset
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 col-md-6 col-12">
                        <div class="contact-form p-4">
                            {{-- <h1 class="contact-title">Get in Touch with us</h1> --}}
                            <div class="map">
                                @if (setting()?->google_map)
                                    <iframe src="{{ setting()?->google_map ?? '' }}" width="820" height="380"
                                        style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                @else
                                    {{-- <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14129.731766265131!2d85.34084!3d27.703916!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb199ec18003b1%3A0xb5bd3702e70173fa!2sAllstar%20Technology!5e0!3m2!1sen!2snp!4v1726155064195!5m2!1sen!2snp"
                                    width="1280" height="380" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                                @endif
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    @endsection

    @push('js')
    @endpush
