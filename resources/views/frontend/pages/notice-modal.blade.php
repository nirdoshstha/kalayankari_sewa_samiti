<div class="modal-notice">
                                    <div class="notice-img">
                                        <img src="{{asset('storage/'.$notice->image)}}" width="100%" height="100%" alt="">
                                    </div>
                                    <div class="notice-desc w-100 ps-3">
                                        <h1 class="notice-title">{{$notice->title}}</h1>
                                        <span class="date mb-4"><i class="fa-solid fa-calendar-days"></i> {{$notice->created_at->format('Y-m-d')}}</span>
                                        <p> {{$notice->description}}</p>
                                    </div>
                                </div>