<div class="message-section">
            <div class="message-wrapper">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-3">
                            <div class="author-image">
                            @if($data['service']->image)
                                <img src="{{asset('storage/'.$data['service']->image)}}" width="100%" height="100%" alt="">
                            @endif
                            </div>
                        </div>
                        <div class="col-12 col-lg-9">
                            <div
                                class="aurthor-holder d-flex flex-column align-items-center justify-content-center text-center">
                                <h1>{{$data['service']->title ?? ''}}</h1>
                                <h3>{{$data['service']->sub_title ?? ''}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="message-content section-margin">
                <div class="container">
                    <p>{!! $data['service']->description ?? '' !!}</p>
                </div>
            </div>
        </div>