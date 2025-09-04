  <header id="nav-bar" class="{{ Route::is('frontend.index') ? '' : 'Psticky' }}">
      <div class="top-header">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-md-6">
                      <div class="left__side-header d-flex">
                          <a href="#" class="me-4 " type="button" id="dropdownMenuButton1"
                              data-bs-toggle="dropdown" aria-expanded="false">
                              <div class="phone__class d-flex align-items-center">
                                  <div class="icon__holder">
                                      <i class="fa-solid fa-phone"></i>
                                  </div>
                                  <div class="inquiry">
                                      <p class="mb-0">For Inquiry</p>
                                  </div>
                              </div>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              @isset(setting()?->phone)
                                  <li><a class="dropdown-item pt-0 text-dark" href="tel: {{ setting()?->phone }}">
                                          <i class="fa-solid fa-phone text-success"></i>&nbsp;
                                          {{ setting()?->phone ?? '' }}</a>
                                  </li>
                              @endisset

                              @isset(setting()?->viber)
                                  <li><a class="dropdown-item pt-0 text-dark" href="tel: {{ setting()?->viber ?? '' }}">
                                          <i class="fa-brands fa-viber"></i>&nbsp; {{ setting()?->viber ?? '' }}</a>
                                  </li>
                              @endisset

                              @isset(setting()?->whatsapp)
                                  <li><a class="dropdown-item pt-0 text-dark" href="tel: {{ setting()?->whatsapp ?? '' }}">
                                          <i class="fa-brands fa-whatsapp"></i>&nbsp; {{ setting()?->whatsapp ?? '' }}</a>
                                  </li>
                              @endisset

                          </ul>
                          @isset(setting()?->mobile)
                              <a href="mailto: {{ setting()?->email ?? '' }}">
                                  <div class="phone__class d-flex align-items-center">
                                      <div class="icon__holder">
                                          <i class="fa-solid fa-envelope"></i>
                                      </div>
                                      <div class="inquiry">
                                          <p class="mb-0">{{ setting()?->email ?? '' }}</p>
                                      </div>
                                  </div>
                              </a>
                          @endisset
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="d-flex justify-content-end">
                          <div class="right__side-header">
                              <ul class="d-flex">
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
                                      <li><a href="{{ setting()?->youtube }}"> <i class="fa-brands fa-youtube"></i></a>
                                      </li>
                                  @endisset

                                  @isset(setting()?->linkedin)
                                      <li><a href="{{ setting()?->linkedin }}"> <i
                                                  class="fa-brands fa-linkedin-in"></i></a></li>
                                  @endisset


                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <nav class="{{ Route::is('frontend.index') ? 'navbar' : 'navbar scrolled' }}">
          <div class="container">
              <div class="logo">
                  <a href="{{ route('frontend.index') }}">
                      @isset(setting()?->logo)
                          <img src="{{ asset('storage/' . setting()->logo) }}" width="47%" height="47%"
                              alt="Logo">
                      @else
                          <img src="{{ asset('frontend/assets/image/logo-07.png') }}" width="100%" height="100%"
                              alt="Logo">
                      @endisset
                  </a>
              </div>
              <div class="sitenavigation d-flex">
                  <span class="menu-icon">
                      <a href="#" class="menu example5"><span></span></a>
                      <div id="hamburger">
                          <span></span>
                          <span></span>
                          <span></span>
                      </div>
                  </span>
                  <ul>

                      <li><a href="{{ route('frontend.introduction') }}" class="navbar__links">Introduction</a></li>
                      <li><a href="{{ route('frontend.organization') }}" class="navbar__links">Organization
                              Structure</a>
                      </li>


                      <li><a href="{{ route('frontend.notices') }}" class="navbar__links">News And Events</a></li>

                      <li class="nav-dropdown"><a href="{{ route('frontend.download') }}"
                              class="navbar__links">Resources </a>

                      </li>

                  </ul>
                  <div class="contact_details">
                      <a class="btn btn-nav" href="{{ route('frontend.contact') }}"> <span>Contact Us</span> </a>
                  </div>
              </div>
          </div>
          <!-- </div> -->
      </nav>
  </header>
