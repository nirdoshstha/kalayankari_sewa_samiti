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

                    </ul>
                </li>







                <li class="slide @if (\Route::is('introduction.index*')) is-expanded @endif">
                    <a class="side-menu__item @if (\Route::is('introduction.index*')) active @endif" data-bs-toggle="slide"
                        href="#">
                        <i class="fa fa-mortar-board fs-6"></i>
                        <span class="side-menu__label mx-2">About Us</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu @if (\Route::is('introduction.index*')) active @endif">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Utilities</a></li>
                        <li>
                            <a href="{{ route('introduction.index') }}"
                                class="slide-item @if (\Route::is('introduction.index*')) active @endif">
                                <i class="fa fa-list-alt fs-6  mx-2"></i>Introduction
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('objective.index') }}"
                                class="slide-item @if (\Route::is('objective.index*')) active @endif">
                                <i class="fa fa-list-alt fs-6  mx-2"></i>Objectives
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('chairperson.index') }}"
                                class="slide-item @if (\Route::is('chairperson.index*')) active @endif">
                                <i class="fa fa-list-alt fs-6  mx-2"></i>Chairpersons ({{ countChairperson() ?? '0' }})
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('thakali.index') }}"
                                class="slide-item @if (\Route::is('thakali.index*')) active @endif">
                                <i class="fa fa-list-alt fs-6  mx-2"></i>Thakali Head ({{ countThakali() ?? '0' }})
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="slide">
                    <a href="{{ route('organization.index') }}"
                        class="side-menu__item has-link @if (\Route::is('organization.index*')) active @endif">
                        <i class="fa fa-list-alt fs-6"></i>
                        <span class="side-menu__label mx-2">Organization Structure</span>
                    </a>
                </li>





                <li class="slide">
                    <a href="{{ route('notice.index') }}"
                        class="side-menu__item has-link @if (\Route::is('notice.index*')) active @endif">
                        <i class="fa fa-list-alt fs-6"></i>
                        <span class="side-menu__label mx-2">News And Events ({{ countNotice() ?? '0' }})</span>
                    </a>
                </li>

                <li class="slide">
                    <a class="side-menu__item has-link @if (\Route::is('download.index*')) active @endif"
                        data-bs-toggle="slide" href="{{ route('download.index') }}">
                        <i class="fa fa-download fs-6"></i>
                        <span class="side-menu__label mx-2">Download ({{ countDownload() ?? '0' }})</span>
                    </a>
                </li>

                <li class="slide">
                    <a class="side-menu__item has-link @if (\Route::is('contact.index*')) active @endif"
                        data-bs-toggle="slide" href="{{ route('contact.index') }}">
                        <i class="fa fa-file-image-o fs-6"></i>
                        <span class="side-menu__label mx-2">Contact Us ({{ contactusCount() ?? '0' }})</span>
                    </a>
                </li>

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
