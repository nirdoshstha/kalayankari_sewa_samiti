@extends('frontend.layouts.master')

@section('title')
Contact Us
@endsection

@section('content')

    @if(!empty($data['contact']->subject))
        <div class="breadcrumb-banner"
            style="background-image: url('{{asset('storage/'.$data['contact']->subject)}}');background-position: center; background-repeat: no-repeat; background-size: cover;">
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
            style="background-image: url('{{asset('frontend/assets/image/page-header.jpg')}}');background-position: center; background-repeat: no-repeat; background-size: cover;">
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
                        <div class="col-xl-8 col-lg-7 col-md-6 col-12">
                            <div class="contact-form p-4">
                                <h1 class="contact-title">Get in Touch with us</h1>
                                <form action="{{ route('frontend.send_message') }}" method="POST" class="main_form" id="contactUSForm" >
                                    @csrf
                                   
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="name" value="{{old('name')}}" class="form-control" id="floatingInput1"
                                                    placeholder="Full Name">
                                                <label for="floatingInput1">Full Name</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-floating mb-3">
                                                <input type="email" name="email" value="{{old('email')}}" class="form-control" id="floatingInput2"
                                                    placeholder="name@example.com">
                                                <label for="floatingInput2">Email address</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="subject" value="{{old('subject')}}" class="form-control" id="floatingInput2"
                                                    placeholder="subject">
                                                <label for="floatingInput2">Subject</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-4">
                                                <textarea class="form-control" name="message" value="{{old('message')}}" placeholder="Leave a comment here"
                                                    id="floatingTextarea2" style="height: 100px"></textarea>
                                                <label for="floatingTextarea2">Message</label> 
                                                
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                           
                                         
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                        @endif

                                            <button type="submit" class="btn btn-nav ms-auto" href="#" data-bs-toggle="offcanvas" >
                                                <span>Submit <i class="fa-solid fa-paper-plane ms-2"></i></span> </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-6 col-12">
                            <div class="contact-info p-4 d-flex flex-column justify-content-center">
                                <h1 class="contact-title">Contact Information</h1>
                                <ul>
                                    <li><span><i class="fa-solid fa-location-dot"></i></span>Bijay Chowk,
                                        Gaushala, Kathmandu 9, Nepal</li>
                                    <li><span><i class="fa-solid fa-envelope"></i></span>+977 1 4113525
                                    </li>
                                    <li><span><i class="fa-solid fa-mobile-screen"></i></span>+977 981234567
                                    </li>
                                    <li class="mb-0"><span><i class="fa-solid fa-phone"></i></span>cebs2080@gmail.com
                                    </li>
                                </ul>
                                <div class="social-icons w-100">
                                    <ul class="d-flex flex-wrap justify-content-center">
                                        <li><a href="#"> <i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="#"> <i class="fa-brands fa-instagram"></i></a></li>
                                        <li><a href="#"> <i class="fa-brands fa-x-twitter"></i></a></li>
                                        <li><a href="#"> <i class="fa-brands fa-youtube"></i></a></li>
                                        <li><a href="#"> <i class="fa-brands fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('js')

@endpush
