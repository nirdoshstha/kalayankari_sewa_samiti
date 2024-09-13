@include('frontend.includes.breadcrumb')

<div class="school-life-section section-margin">
            <div class="container">
                <div class="school-life-wrapper p-3">
                    <div class="school-life-img mb-4">
                    @if($data['service']->image)
                        <img src="{{asset('storage/'.$data['service']->image)}}" width="100%" height="100%" alt="">
                    @endif
                    </div>
                    <div class="school-life-desc">
                        <h2 class="school-title">{{ $data['service']->title}}</h2>
                        <p> {!! $data['service']->description !!}</p>
                    </div>
                </div>
            </div>
        </div>