<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('dashboard.index') }}">
                <img src="{{ asset('backend/assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo"
                    alt="logo">
                <img src="{{ asset('backend/assets/images/brand/logo-1.png') }}" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="{{ asset('backend/assets/images/brand/logo-2.png') }}" class="header-brand-img light-logo"
                    alt="logo">
                @if (setting())
                    <img src="{{ asset('storage/' . setting()->logo) }}" class="header-brand-img light-logo1"
                        alt="logo">
                @endif
            </a><!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg>
            </div>
            <ul class="side-menu">
                <li>
                    <h3>Menu</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('dashboard.index') }}">
                        <i class="fa fa-home fs-5"></i>
                        <span class="side-menu__label mx-2">Dashboard</span>
                    </a>
                </li>

                <li class="slide @if (\Route::is('slider.index*', 'award.index*', 'team.index*', 'notice.index*', 'testimonial.index*')) is-expanded @endif">
                    <a class="side-menu__item @if (\Route::is('slider.index*', 'award.index*', 'team.index*', 'notice.index*', 'testimonial.index*')) active @endif" data-bs-toggle="slide"
                        href="#">
                        <i class="fa fa-file-image-o fs-6"></i>
                        <span class="side-menu__label mx-2">Home</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Utilities</a></li>
                        <li><a href="{{ route('slider.index') }}"
                                class="slide-item @if (\Route::is('slider.index*')) active @endif"><i
                                    class="fa fa-file-image-o fs-6  mx-2"></i>Slider</a></li>
                        <li><a href="{{ route('award.index') }}"
                                class="slide-item @if (\Route::is('award.index*')) active @endif"><i
                                    class="fa fa-trophy fs-6  mx-2"></i>School Award</a></li>
                        <li><a href="{{ route('team.index') }}"
                                class="slide-item @if (\Route::is('team.index*')) active @endif"><i
                                    class="fa fa-group fs-6  mx-2"></i>Team Member</a></li>
                        <li><a href="{{ route('notice.index') }}"
                                class="slide-item @if (\Route::is('notice.index*')) active @endif"><i
                                    class="fa fa-list-alt fs-6  mx-2"></i>Notice</a></li>
                        <li><a href="{{ route('testimonial.index') }}"
                                class="slide-item  @if (\Route::is('testimonial.index*')) active @endif"><i
                                    class="fa fa-file-video-o fs-6  mx-2"></i>Testimonial</a></li>
                        <li><a href="{{ route('modal.index') }}"
                                class="slide-item  @if (\Route::is('modal.index*')) active @endif"><i
                                    class="fa fa-file-video-o fs-6  mx-2"></i>Popup Modal</a></li>

                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item has-link @if (\Route::is('service.index*')) active @endif"
                        data-bs-toggle="slide" href="{{ route('service.index') }}">
                        <i class="fa fa-file-o fs-6"></i>
                        <span class="side-menu__label mx-2">Create Page</span>
                    </a>
                </li>


                <li class="slide">
                    <a class="side-menu__item has-link @if (\Route::is('facility.index*')) active @endif"
                        data-bs-toggle="slide" href="{{ route('facility.index') }}">
                        <i class="fa fa-clipboard fs-6"></i>
                        <span class="side-menu__label mx-2">Facility</span>
                    </a>
                </li>

                <li class="slide @if (\Route::is('class-information.index*')) is-expanded @endif">
                    <a class="side-menu__item @if (\Route::is('class-information.index*')) active @endif" data-bs-toggle="slide"
                        href="#">
                        <i class="fa fa-mortar-board fs-6"></i>
                        <span class="side-menu__label mx-2">Academy</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu @if (\Route::is('class-information.index*')) active @endif">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Utilities</a></li>
                        <li><a href="{{ route('class-information.index') }}"
                                class="slide-item @if (\Route::is('class-information.index*')) active @endif"><i
                                    class="fa fa-list-alt fs-6  mx-2"></i>Class Information</a></li>

                    </ul>
                </li>


                <li class="slide @if (\Route::is('album.index*', 'video.index*')) is-expanded @endif">
                    <a class="side-menu__item @if (\Route::is('album.index*', 'video.index*')) active @endif" data-bs-toggle="slide"
                        href="#">
                        <i class="fa fa-file-image-o fs-6"></i>
                        <span class="side-menu__label mx-2">Gallery</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu @if (\Route::is('album.index*', 'video.index*')) active @endif">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Utilities</a></li>
                        <li><a href="{{ route('album.index') }}"
                                class="slide-item @if (\Route::is('album.index*')) active @endif"><i
                                    class="fa fa-file-image-o fs-6  mx-2"></i>Album</a></li>
                        <li><a href="{{ route('video.index') }}"
                                class="slide-item @if (\Route::is('video.index*')) active @endif"><i
                                    class="fa fa-file-video-o fs-6  mx-2"></i>Video</a></li>

                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item has-link @if (\Route::is('download.index*')) active @endif"
                        data-bs-toggle="slide" href="{{ route('download.index') }}">
                        <i class="fa fa-download fs-6"></i>
                        <span class="side-menu__label mx-2">Download</span>
                    </a>
                </li>

                <li class="slide">
                    <a class="side-menu__item has-link @if (\Route::is('blog.index*')) active @endif"
                        data-bs-toggle="slide" href="{{ route('blog.index') }}">
                        <i class="fa fa-clipboard fs-6"></i>
                        <span class="side-menu__label mx-2">Blog</span>
                    </a>
                </li>

                <li class="slide @if (\Route::is('contact.index*', 'admission.index*', 'apply.index*')) is-expanded @endif">
                    <a class="side-menu__item @if (\Route::is('contact.index*', 'admission.index*', 'apply.index*')) active @endif"
                        data-bs-toggle="slide" href="#">
                        <i class="fa fa-file-image-o fs-6"></i>
                        <span class="side-menu__label mx-2">Contact Us</span><i
                            class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu @if (\Route::is('contact.index*', 'contact.index*', 'admission.index*')) active @endif">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Utilities</a></li>
                        <li><a href="{{ route('contact.index') }}"
                                class="slide-item @if (\Route::is('contact.index*')) active @endif"><i
                                    class="fa fa-file-image-o fs-6  mx-2"></i>Contact</a></li>
                        <li><a href="{{ route('apply.index') }}"
                                class="slide-item @if (\Route::is('apply.index*')) active @endif"><i
                                    class="fa fa-file-video-o fs-6  mx-2"></i>Apply</a></li>
                        <li><a href="{{ route('admission.index') }}"
                                class="slide-item @if (\Route::is('admission.index*')) active @endif"><i
                                    class="fa fa-file-video-o fs-6  mx-2"></i>Admission</a></li>

                    </ul>
                </li>

            </ul>

            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </div>
</div>
