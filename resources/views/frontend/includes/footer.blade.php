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

                              @if (isset(setting()?->address))
                                  <li><span class="fa-li"><i
                                              class="fa-solid fa-location-dot"></i></span><span>{{ setting()->address ?? '' }}</span></a>
                                  </li>
                              @else
                                  <li><span class="fa-li"><i class="fa-solid fa-location-dot"></i></span><span>Near
                                          Swoyambu Stupa, Nagarjuna-5,
                                          Kathmandu</span></a>
                                  </li>
                              @endisset

                              @if (isset(setting()?->phone))
                                  <li><span class="fa-li"><i
                                              class="fa-solid fa-phone"></i></span><span>{{ setting()->phone ?? '' }}</span></a>
                                  </li>
                              @else
                                  <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span><span>+01-4950132
                                      </span></li>
                              @endisset

                              @if (isset(setting()?->mobile))
                                  <li><span class="fa-li"><i
                                              class="fa-solid fa-mobile"></i></span><span>{{ setting()->mobile ?? '' }}</span></a>
                                  </li>
                              @else
                                  <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span><span>
                                          9851357036</span></li>
                              @endisset

                              @if (isset(setting()?->email))
                                  <li><span class="fa-li"><i
                                              class="fa-solid fa-envelope"></i></span><span>{{ setting()->email ?? '' }}</span></a>
                                  </li>
                              @else
                                  <li><span class="fa-li"><i
                                              class="fa-solid fa-envelope"></i></span><span>kalyankarisewasamiti@gmail.com</span>
                                  </li>
                              @endisset

          </ul>
      </div>
      <div class="social-icons d-flex justify-content-start">
          <ul class="d-flex">

              @isset(setting()?->facebook)
                  <li><a href="{{ setting()?->facebook }}"> <i class="fa-brands fa-facebook-f"></i></a></li>
              @endisset
              @isset(setting()?->instagram)
                  <li><a href="{{ setting()?->instagram }}"> <i class="fa-brands fa-instagram"></i></a></li>
              @endisset
              @isset(setting()?->twitter)
                  <li><a href="{{ setting()?->twitter }}"> <i class="fa-brands fa-x-twitter"></i></a></li>
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
  <div class="col-md-3 col-lg-3 mb-3">
      <div class="footer__title">
          <span>Quick Links</span>
      </div>
      <div class="footer__links">
          <ul>
              <li><a href="{{ route('frontend.introduction') }}" target="_blank">Introduction</a></li>
              <li><a href="{{ route('frontend.download') }}" target="_blank">Download</a>
              </li>

              <li><a href="{{ route('frontend.notices') }}" target="_blank">News And Events</a></li>
              <li><a href="{{ route('frontend.contact') }}" target="_blank">Contact Us</a></li>
              <li><a href="{{ route('login') }}" target="_blank">Login</a></li>
          </ul>
      </div>
  </div>

  <div class="col-md-3 col-lg-3">
      <div class="footer__title mb-3">
          <span>Chairperson</span>
      </div>
      <div class="justify-content-center align-items-center gap-2 d-flex flex-wrap">
          @forelse (chairpersons() as $chairperson)
              <img src="{{ asset('storage/' . $chairperson->image) }}" class="img-thumbnail p-0"
                  width="90px" alt="{{ $chairperson->title }}">
          @empty
          @endforelse
      </div>
  </div>

  <div class="col-md-3 col-lg-3">
      <div class="footer__title mb-3">
          <span>Thakali Head</span>
      </div>
      <div class="justify-content-center align-items-center gap-2 d-flex flex-wrap">
          @forelse (thakalis() as $thakali)
              <img src="{{ asset('storage/' . $thakali->image) }}" class="img-thumbnail p-0"
                  width="90px" alt="{{ $thakali->title }}">
          @empty
          @endforelse
      </div>
  </div>
  {{-- <div class="col-md-3 col-lg-3">
      <div class="map">
          @if (setting()?->google_map)
              <iframe src="{{ setting()?->google_map ?? '' }}" width="100%" height="280"
                  style="border:0;" allowfullscreen="" loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"></iframe>
          @else
              
          @endif
      </div>
  </div> --}}
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
