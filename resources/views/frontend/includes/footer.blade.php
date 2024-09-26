  

 <footer>
        <div class="footer-section pt-5 pb-3">
            <div class="container">
                <div class="row g-4 g-lg-5">
                    <div class="col-md-3 col-lg-3 mb-3">
                        <div class="footer__title">
                            <span>Contact Us</span>
                        </div>
                        <div class="school-address">
                            <ul class="fa-ul ms-4">
                            @if(isset(setting()?->address))
                                 <li><span class="fa-li"><i class="fa-solid fa-location-dot"></i></span><span>{{setting()->address ?? ''}}</span></a>
                                </li>
                                @else
                                 <li><span class="fa-li"><i class="fa-solid fa-location-dot"></i></span><span>Maitidevi,
                                        Seto Pul , Kathmandu</span></a>
                                </li>
                            @endisset
                               
                            @if(isset(setting()?->phone))
                                 <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span><span>{{setting()->phone ?? ''}}</span></a>
                                </li>
                                @else
                                 <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span><span>+977-9801234567
                                    </span></li>
                            @endisset

                            @if(isset(setting()?->mobile))
                                 <li><span class="fa-li"><i class="fa-solid fa-mobile"></i></span><span>{{setting()->mobile ?? ''}}</span></a>
                                </li>
                                @else
                                <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span><span>
                                        01-4312345 / 4537537</span></li>
                            @endisset

                            @if(isset(setting()?->email))
                                 <li><span class="fa-li"><i class="fa-solid fa-envelope"></i></span><span>{{setting()->email ?? ''}}</span></a>
                                </li>
                            @else
                            <li><span class="fa-li"><i
                                        class="fa-solid fa-envelope"></i></span><span>info@mail.com</span></li>
                            @endisset
                                             
                            </ul>
                        </div>
                        <div class="social-icons d-flex justify-content-start">
                            <ul class="d-flex">
                                 
                                @isset(setting()?->facebook)
                                    <li><a href="{{setting()?->facebook }}"> <i class="fa-brands fa-facebook-f"></i></a></li>
                                @endisset
                                @isset(setting()?->instagram)
                                    <li><a href="{{setting()?->instagram }}"> <i class="fa-brands fa-instagram"></i></a></li>
                                @endisset
                                @isset(setting()?->twitter)
                                    <li><a href="{{setting()?->twitter }}"> <i class="fa-brands fa-x-twitter"></i></a></li>
                                @endisset
                                     @isset(setting()?->youtube)
                                    <li><a href="{{setting()?->youtube }}"> <i class="fa-brands fa-youtube"></i></a></li>
                                @endisset

                                @isset(setting()?->linkedin)
                                    <li><a href="{{setting()?->linkedin }}"> <i class="fa-brands fa-linkedin-in"></i></a></li>
                                @endisset
                                     
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2 mb-3">
                        <div class="footer__title">
                            <span>Quick Links</span>
                        </div>
                        <div class="footer__links">
                            <ul>
                                <li><a href="{{url('school-life')}}">School Life</a></li>
                                <li><a href="{{route('frontend.admission_form')}}">Admission Form</a></li>
                                <li><a href="{{route('frontend.blog')}}">Blog</a></li>
                                <li><a href="{{route('frontend.notices')}}">Notices</a></li>
                                <li><a href="{{route('frontend.contact')}}">Contact Us</a></li>
                                <li><a href="{{route('login')}}">Login</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 mb-3">
                        <div class="footer__title">
                            <span>Brochure</span>
                        </div>
                        <div class="mb-3">
                        @if(setting()?->image)
                            <a href="{{asset('storage/'.setting()?->image)}}" target="_blank">
                                <img src="{{asset('frontend/assets/image/book.png')}}" width="100%" height="100%" alt="Brochure Download">
                            </a>
                        @else
                        <a href="#" target="_blank">
                                <img src="{{asset('frontend/assets/image/book.png')}}" width="100%" height="100%" alt="Brochure Download">
                            </a>
                        @endif
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-5">
                        <div class="map">
                        @if(setting()?->google_map) 
                            <iframe
                                src="{{ setting()?->google_map ?? ''}}"
                                width="100%" height="280" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>  
                        @else 
                        {{-- <iframe
                                src="{{ setting()->google_map ?? ''}}"
                                width="100%" height="280" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>   --}}
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14129.731766265131!2d85.34084!3d27.703916!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb199ec18003b1%3A0xb5bd3702e70173fa!2sAllstar%20Technology!5e0!3m2!1sen!2snp!4v1726155064195!5m2!1sen!2snp" 
                                width="100%" height="280" style="border:0;" allowfullscreen="" loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright text-center py-2">
            <div class="container">
                <div class="content">

                    <h6 class="m-0"><span>{{ date('Y') }}</span> © All rights reserved | Designed by <a
                            href="https://allstar.com.np/" target="_blank">All
                            Star
                            Technology</a></h6>
                </div>
            </div>
        </div>
    </footer>