@extends('frontend.layouts.master')

@section('title') Care School @endsection 

@section('seo_keyword'){{$data['about']->seo_keyword ?? ''}}@endsection 

@section('seo_description'){{$data['about']->seo_description ?? ''}}@endsection

@section('content')  
        <section class="homepage-content-wrapper">
            @if(!is_null($data['introduction']))
                <div class="about-section">
                    <div class="container">
                        <div class="row align-items-end g-4 g-md-5">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="about-img">
                                    <img src="{{asset('storage/'.$data['introduction']?->parentId?->image )}}" width="100%" height="100%" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8 ">
                                <div class="about-desc">
                                    <h2 class="title-label">{{$data['introduction']?->parentId?->title ?? ''}}</h2>
                                    <h1>{{$data['introduction']->title ?? ''}}</h1>
                                    <p> {!! $data['introduction']->description ?? '' !!}</p>
                                    <a href="{{route('frontend.our_services',$data['introduction']->slug)}}" class="btn-read">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="about-section">
                <div class="container">
                    <div class="row align-items-end g-4 g-md-5">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="about-img">
                                <img src="{{asset('frontend/assets/image/about.jpg')}}" width="100%" height="100%" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-8 ">
                            <div class="about-desc">
                                <h2 class="title-label">About Us</h2>
                                <h1>Welcome to Care School</h1>
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
            </div>
            @endif

            @include('frontend.includes.alumni')

        
            <div class="college-award-section section-margin primary-bg">
                <div class="container">
                    <div class="main-title">
                        <h2>School Awards</h2>
                    </div>
                    <!-- Swiper -->
                    <div class="swiper awardSlider px-1">
                        <div class="swiper-wrapper">
                        @forelse ( $data['awards'] as $award )
                             <div class="swiper-slide">
                                <div class="award-card">
                                    <div class="card-img">
                                        <img src="{{asset('storage/'.$award->image)}}" alt="">
                                    </div>
                                    <div class="card-desc">
                                        <h4>{{$award->title}}</h4>
                                        <p>{!! $award->description !!}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="swiper-slide">
                                <div class="award-card">
                                    <div class="card-img">
                                        <img src="{{asset('frontend/assets/image/award-1.png')}}" alt="">
                                    </div>
                                    <div class="card-desc">
                                        <h4>College Award</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam veritatis
                                            quis quam quidem enim quia eligendi debitis minus aut, consequatur optio
                                            dolor nobis molestias ipsum!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="award-card">
                                    <div class="card-img">
                                        <img src="{{asset('frontend/assets/image/award-2.png')}}" alt="">
                                    </div>
                                    <div class="card-desc">
                                        <h4>College Award</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam veritatis
                                            quis quam quidem enim quia eligendi debitis minus aut, consequatur optio
                                            dolor nobis molestias ipsum!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="award-card">
                                    <div class="card-img">
                                        <img src="{{asset('frontend/assets/image/award-3.png')}}" alt="">
                                    </div>
                                    <div class="card-desc">
                                        <h4>College Award</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam veritatis
                                            quis quam quidem enim quia eligendi debitis minus aut, consequatur optio
                                            dolor nobis molestias ipsum!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="award-card">
                                    <div class="card-img">
                                        <img src="{{asset('frontend/assets/image/award-4.png')}}" alt="">
                                    </div>
                                    <div class="card-desc">
                                        <h4>College Award</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam veritatis
                                            quis quam quidem enim quia eligendi debitis minus aut, consequatur optio
                                            dolor nobis molestias ipsum!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="award-card">
                                    <div class="card-img">
                                        <img src="{{asset('frontend/assets/image/award-1.png')}}" alt="">
                                    </div>
                                    <div class="card-desc">
                                        <h4>College Award</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam veritatis
                                            quis quam quidem enim quia eligendi debitis minus aut, consequatur optio
                                            dolor nobis molestias ipsum!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="award-card">
                                    <div class="card-img">
                                        <img src="{{asset('frontend/assets/image/award-3.png')}}" alt="">
                                    </div>
                                    <div class="card-desc">
                                        <h4>College Award</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam veritatis
                                            quis quam quidem enim quia eligendi debitis minus aut, consequatur optio
                                            dolor nobis molestias ipsum!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                           
                            
                        </div>
                    </div>
                </div>
            </div>
         

            <div class="team-section section-margin">
                <div class="container">
                    <div class="main-title">
                        <h2>Team Members</h2>
                    </div>
                    <div class="row">
                    @forelse (teams() as $team )
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="team-card mb-4">
                                <div class="team-image">
                                    <img src="{{asset('storage/'.$team->image)}}" width="100%" height="100%" alt="">
                                </div>
                                <div class="team-desc">
                                    <h4>{{$team->title}}</h4>
                                    <span>{{$team->sub_title}}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                    @for($i=1; $i<=4; $i++)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="team-card mb-4">
                                <div class="team-image">
                                    <img src="{{asset('frontend/assets/image/team1.jpg')}}" width="100%" height="100%" alt="">
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


            <div class="news-and-blog-section section-margin primary-bg">
                <div class="container">
                    <div class="main-title">
                        <h2>Notice <span>&</span> Video</h2>
                    </div>
                    <div class="row g-4 g-md-5">
                        <div class="col-md-6">
                            <div class="news-section mb-3">
                                <div class="title-wrapper d-flex align-items-center justify-content-between mb-3">
                                    <h3 class="mb-0">Notice</h3>
                                    <a href="{{route('frontend.notices')}}">View All <i class="fa-solid fa-angles-right"></i></a>
                                </div>

                                <div class="news-card-list d-flex flex-column">
                                    <ul>
                                    @forelse (notices() as $notice )
                                        <li>
                                            <a href="#" class="notice_view" data-id="{{$notice->id}}" data-bs-toggle="modal" data-bs-target="#noticeModal">
                                                <div
                                                    class="news-card d-flex align-items-start flex-column flex-lg-row align-items-lg-center">
                                                    <div class="news-img mb-3 mb-lg-0">
                                                        <img src="{{asset('storage/'.$notice->image)}}" width="100%" height="100%"
                                                            alt="">
                                                    </div>
                                                    <div class="news-desc d-flex flex-column">
                                                        <h4>{{$notice->title}}</h4>
                                                        <span class="date"><i class="fa-solid fa-calendar-days"></i> {{$notice->created_at->format('Y-m-d')}}</span>
                                                        <a href="#" class="link mt-2">Read More <i
                                                                class="fa-solid fa-angles-right"></i></a>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @empty
                                    @for($i=1; $i<=3; $i++)
                                        <li>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#noticeModal">
                                                <div
                                                    class="news-card d-flex align-items-start flex-column flex-lg-row align-items-lg-center">
                                                    <div class="news-img mb-3 mb-lg-0">
                                                        <img src="{{asset('frontend/assets/image/news2.png')}}" width="100%" height="100%"
                                                            alt="">
                                                    </div>
                                                    <div class="news-desc d-flex flex-column">
                                                        <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                            Facere, sequi!
                                                        </h4>
                                                        <span class="date"><i class="fa-solid fa-calendar-days"></i> Nov
                                                            06,
                                                            2023</span>
                                                        <a href="#" class="link mt-2">Read More <i
                                                                class="fa-solid fa-angles-right"></i></a>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endfor
                                    @endforelse 

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="blog-section mb-3">
                                <div class="title-wrapper d-flex align-items-center justify-content-between mb-3">
                                    <h3 class="mb-0">Latest Video</h3>
                                    <a href="{{route('frontend.video')}}" target="_blank">View All <i class="fa-solid fa-angles-right"></i></a>
                                </div>
                                <div class="blog-card d-flex flex-column">
                                    <iframe width="100%" height="210"
                                        src="{{video()?->video_link ?? 'https://www.youtube.com/embed/5kGBxzIkyXc?si=YE8JpRePHvqWNlRr'}}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                    <div class="blog-desc mt-2 mb-2">
                                        <h5>{{video()?->title ?? 'Care English School'}}</h5>
                                        <p>{{video()?->description ?? 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae beatae architecto commodi odit rem corrupti consectetur. Suscipit impedit recusandae atque.

Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, iste! Ea alias voluptatibus quae tempore, incidunt sed'}}</p>
                                    </div>
                                    <a href="{{route('frontend.video')}}" class="link" target="_blank">Read More <i class="fa-solid fa-angles-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="noticeModal" tabindex="-1" aria-labelledby="noticeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="noticeModalLabel"></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body notice_div">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <section class="testimonial-section section-margin">
                <div class="container">
                    <div class="wow fadeInDown" data-wow-delay="0.3s"
                        style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                        <div class="main-title">
                            <h2>What Our Guardians Says</h2>
                        </div>
                    </div>
                    <div class="swiper px-3 testi wow fadeInUp" data-wow-delay="0.3s"
                        style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                        <div class="swiper-wrapper">
                        @forelse (testimonials() as $testimonial )
                            <div class="swiper-slide">
                                <div class="testi-details">
                                    <h1><i class="fa-solid fa-quote-left"></i></h1>
                                    <p> {!! $testimonial->description !!}</p>
                                    <div class="testi_photo">
                                        <img src="{{asset('storage/'.$testimonial->image)}}" alt="">
                                        <p>{{ $testimonial->title}}</p>
                                        <span>{{$testimonial->sub_title}}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @for($i=1; $i<=4; $i++)
                            <div class="swiper-slide">
                                <div class="testi-details">
                                    <h1><i class="fa-solid fa-quote-left"></i></h1>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, dicta eveniet
                                        laborum fugiat excepturi illo, voluptatibus quibusdam cupiditate harum
                                        repudiandae
                                        maxime dolor commodi error earum facilis expedita, distinctio inventore iusto.
                                    </p>
                                    <div class="testi_photo">
                                        <img src="{{asset('frontend/assets/image/team1.jpg')}}" alt="">
                                        <p>Lorem, ipsum.</p>
                                        <span>Alumni</span>
                                    </div>
                                </div>
                            </div>
                        @endfor
                        @endforelse
                            
                            
                        </div>
                    </div>
                </div>
            </section>

        </section>
@endsection

@push('js')

<script>
$(document).ready(function(){
    $('.notice_view').on('click',function(){
        let notice_id = $(this).attr('data-id');
        
        $.ajax({
            url:"{{route('frontend.notice_modal_view')}}",
            data:{notice_id:notice_id},
            success:function(resp){
                $('.notice_div').html(resp);
            }
        })
    })
})
</script>
    
@endpush
