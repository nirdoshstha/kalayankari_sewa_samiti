@extends('backend.layouts.master')

@section('title')
 Profile | Admin| Dashboard
@endsection

@section('sub_title', 'Profile')

@section('content')
<div class="card">
<div class="card-body">
         
      <form action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data" class="main_form">
            @csrf
        <div class="row align-items-center">
        
            <div class="col-lg-12 col-md-12 col-xl-6 image">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="image profile-img-main rounded">
                        @if(isset($data['user_profile']->image))
                        <img src="{{asset(image_path($data['user_profile']->image))}}" alt="img" class="m-0 p-1 rounded hrem-6 previewImage">
                        @else
                        <img src="{{asset('backend/assets/images/faces/6.jpg')}}" alt="img" class="m-0 p-1 rounded hrem-6 previewImage">
                        @endif
                        
                    </div>
                    <div class="ms-4">
                        <div class="d-flex justify-content-between">
                        <h4>{{auth()->user()?->name ?? ''}} <a href="mail-inbox.html" class="btn btn-secondary btn-sm"><i class="fa fa-user"></i>
                            @if(auth()->user()?->user_role=='1')
                            Admin
                            @elseif(auth()->user()?->user_role=='2')
                            SuperAdmin
                            
                            @endif</a></h4> 
                    
                        </div>
                        {{-- <p class="text-muted mb-2">Member Since: {{auth()->user()->created_at->format('Y-m-d')}}</p>  --}}
                        <p class="text-muted mb-2">Member Since: {{auth()->user()->created_at->format('Y-m-d')}}</p> 
                    </p> 

                        <input type="file" class="custom-file-input" name="image" style="width: 95px;" >
                        <button type="submit" class="btn btn-info"><i class="fa fa-refresh"></i> Update</button>
                    </div>
                </div>
            </div>
        
            <div class="col-lg-12 col-md-12 col-xl-6">
                <div class="d-md-flex flex-wrap justify-content-lg-end">
                    <div class="media m-4">
                        <div class="media-icon bg-primary me-3 mt-1">
                            <i class="fe fe-phone fs-20 text-white"></i>
                        </div>
                        <div class="media-body">
                            <span class="text-muted">Mobile</span>
                            <div class="fw-semibold fs-14">
                                {{auth()->user()?->profile?->phone }}
                            </div>
                        </div>
                    </div>
                    <div class="media m-4">
                        <div class="media-icon bg-info me-3 mt-1">
                            <i class="fe fe-mail  fs-20 text-white"></i>
                        </div>
                        <div class="media-body">
                            <span class="text-muted">Email</span>
                            <div class="fw-semibold fs-14">
                               {{auth()->user()?->email}}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="media m-3">
                        <div class="media-icon bg-warning me-3 mt-1">
                            <i class="fe fe-wifi fs-20 text-white"></i>
                        </div>
                        <div class="media-body">
                            <span class="text-muted">Following</span>
                            <div class="fw-semibold fs-25">
                                2,876
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div> 
    </form>
</div>
</div>
<div class="card border-0">
    <form action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data" class="main_form">
        @csrf
        <div class="row card-body">
            <div class="col-lg-6">
                <p class="mb-4 text-17">Personal Info</p>
        <div class="form-group">
            <div class="row row-sm">
                <div class="col-md-3">
                    <label for="email" class="form-label">Username</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="username" class="form-control" value="{{auth()->user()?->username ?? ''}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row row-sm">
                <div class="col-md-3">
                    <label for="email" class="form-label">Name</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{auth()->user()?->name ?? ''}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row row-sm">
                <div class="col-md-3">
                    <label for="email" class="form-label">Email</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{auth()->user()?->email ?? ''}}" readonly>
                </div>
            </div>
        </div>
        <div class="form-group ">
            <div class="row row-sm">
                <div class="col-md-3">
                    <label for="website" class="form-label">Phone</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="phone" class="form-control" id="website" placeholder="+9771" value="{{$data['user_profile']->phone ?? ''}}">
                </div>
            </div>
        </div>
        <div class="form-group ">
            <div class="row row-sm">
                <div class="col-md-3">
                    <label for="phoneNumber" class="form-label">Mobile</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="mobile" class="form-control" id="phoneNumber" placeholder="+9771" value="{{$data['user_profile']->mobile ?? ''}}">
                </div>
            </div>
        </div>
        <div class="form-group ">
            <div class="row row-sm">
                <div class="col-md-3">
                    <label for="address" class="form-label">Address</label>
                </div>
                <div class="col-md-9">
                    <textarea name="address" class="form-control" id="address"  rows="2" placeholder="Address">{{ $data['user_profile']->address ?? ''}} </textarea>
                </div>
            </div>
        </div>
        <div class="form-group ">
            <div class="row row-sm">
                <div class="col-md-3">
                    <label for="biographicalInfo" class="form-label">Biographic Info</label>
                </div>
                <div class="col-md-9">
                    <textarea class="form-control" name="info" id="biographicalInfo" rows="4" placeholder="">{{$data['user_profile']->info ?? ''}} </textarea>
                </div>
            </div>
        </div>
            </div>
            <div class="col-lg-6">
                <p class="mb-4 text-17">Social Info</p>
        
                <div class="form-group ">
                    <div class="row row-sm">
                        <div class="col-md-3">
                            <label for="facebook" class="form-label">Facebook</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="facebook" class="form-control" id="facebook" placeholder="https://www.facebook.com/abc" value="{{$data['user_profile']->facebook ?? ''}}">
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="row row-sm">
                        <div class="col-md-3">
                            <label for="twitter" class="form-label">Twitter</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="twitter" class="form-control" id="twitter" placeholder="https://www.twitter.com/abc" value="{{$data['user_profile']->twitter ?? ''}}">
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="row row-sm">
                        <div class="col-md-3">
                            <label for="youtube" class="form-label">Youtube </label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="youtube" class="form-control" id="youtube" placeholder="https://www.youtube.com/abc" value="{{$data['user_profile']->youtube ?? ''}}">
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="row row-sm">
                        <div class="col-md-3">
                            <label for="linkedin" class="form-label">Linkedin</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="linkedin" class="form-control" id="linkedin" placeholder="https://www.linkedin.com/abc" value="{{$data['user_profile']->linkedin ?? ''}}">
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="row row-sm">
                        <div class="col-md-3">
                            <label for="instagram" class="form-label">Instagram</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="instagram" class="form-control" id="instagram" placeholder="https://www.instagram.com/ab" value="{{$data['user_profile']->instagram ?? ''}}">
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="row row-sm">
                        <div class="col-md-3">
                            <label for="viber" class="form-label">Viber</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="viber" class="form-control" id="viber" placeholder="9800000000" value="{{$data['user_profile']->viber ?? ''}}">
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="row row-sm">
                        <div class="col-md-3">
                            <label for="whatsapp" class="form-label">Whatsapp</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="whatsapp" class="form-control" id="whatsapp" placeholder="https://www.whatsapp.com/abc" value="{{$data['user_profile']->whatsapp ?? ''}}">
                        </div>
                    </div>
                </div> 
               
                <div class="form-group ">
                    <div class="row row-sm">
                        <div class="col-md-3">
                            <label for="biographicalInfo" class="form-label"> </label>
                        </div>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-info px-5 py-2" style="margin-top: 60px;">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
       
    </form>
</div>
<div class="card border-0">
       
        <div class="form-group mb-0">
            <div class="row card-body"> 
                <p class="mb-4 text-17">Change Password</p>
        
                <div class="col-md-3">
                    <label class="form-label"> </label>
                </div>
                
                    <div class="col-md-9">

                    <form action="{{route('user.password_changed')}}" method="POST" enctype="multipart/form-data" class="main_form">
                    @csrf
                    <input type="hidden" name="user_id" value="{{auth()->user()?->id}}">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label for="old_password" class="form-label">Old Password</label>
                                <input type="password" name="old_password" class="form-control" id="old_password" value="">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="text" name="new_password" class="form-control" id="Newpassword" value="">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label for="confirm_password" class="form-label">Confirm New Password</label>
                                <input type="text" name="confirm_password" class="form-control" id="confirm_password"  value="">
                            </div>
                        </div>   
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger px-5 py-2">Change Password</button>
                            </div>
                        </div>
                     </form>
                    </div>
               
            </div>
        </div>
</div>
@endsection