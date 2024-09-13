@include('frontend.includes.breadcrumb') 

<div class="intro-section section-margin">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="slide-menu">
                    <ul class="d-flex flex-column">
                    @foreach ($data['left_side_navbar'] as $page ) 
                        <li><a href="{{route('frontend.our_services',$page->slug)}}" class="sidebar-item {{Request::is($page->slug) ? 'active' :''}}"> <span> <i class="fa-solid fa-play">
                        </i> {{$page->title}} </span></a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="intro-desc-wrapper">
                    <div class="intro-img">
                    @if($data['service']?->image)
                        <img src="{{asset('storage/'.$data['service']->image)}}" width="100%" height="100%" alt="">
                    @endif
                    </div>
                    <div class="intro-content">
                        <div class="intro-title text-center">
                            <h2>{{$data['service']->title ?? '' }}</h2>
                        </div>
                        <p>{!! $data['service']->description ?? '' !!}</p>
                    </div>

                </div>
            </div>
        </div>
  @include('frontend.includes.alumni')
    </div>
</div>
