<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" data-bs-scroll="true"
        aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-body">
            <div class="inquiry-form">
                <div class="counselling-img mb-3">
                    <img src="{{asset('frontend/assets/image/ads.jpg')}}" width="100%" height="100%" alt="">
                </div>
                <div class="text-center">
                    <h5 class="mb-4">Apply Now</h5>
                    <div class="image__line d-flex justify-content-center">
                        <img src="{{asset('frontend/assets/image/line2.png')}}" width="100%" height="100%" alt="">
                    </div>
                </div>
                   <form action="{{ route('frontend.send_message') }}" method="POST" class="main_form" id="contactUSForm" >
                    @csrf
                    <input type="hidden" name="type" value="apply">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <input type="text" name="name" class="form-control" id="input1" placeholder="Name">
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        </div>
                        <div class="col-6 mb-3">
                            <input type="email" name="email" class="form-control" id="input2" placeholder="Email">
                        </div>
                        <div class="col-6 mb-3">
                            <input type="text" name="phone" class="form-control" id="input3" placeholder="Phone">
                        </div>
                        <div class="col-12 mb-3">
                            <input type="text" name="address" class="form-control" id="input4" placeholder="Address">
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text" name="school_name" class="form-control" id="input5" placeholder="Previous School Name">
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text" name="subject" class="form-control" id="input7" placeholder="Class">
                    </div>
                    <div class="col-12 mb-3">
                        <textarea name="message" class="form-control" id="input6" rows="3" placeholder="Message"></textarea>
                    </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-sent px-5"><span>submit</span></button>
                <button type="reset" class="btn btn-danger px-5" data-bs-dismiss="offcanvas"
                    aria-label="Close"><span>close</span></button>
            </div>
            </form>
        </div>
    </div>