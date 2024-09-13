@extends('backend.layouts.master')

@section('title')
 Setting
@endsection

@section('sub_title','Setting')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Setting</h3>
                </div>
                <div class="card-body border-0">
                    @isset($setting)
                    <form action="{{route('setting.update',$setting)}}" method="POST" enctype="multipart/form-data" class="main_form">
                        @csrf
                        @method('PUT')
                    @else
                    <form action="{{route('setting.store')}}" method="POST" enctype="multipart/form-data" class="main_form">
                        @csrf
                    @endisset
                        
                        <p class="mb-4 text-17 fw-bold">Contact Info</p>
                        <div class="form-group">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="email" class="form-label">Email</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="email" class="form-control" id="email" placeholder="info@abc.com" value="{{$setting ? $setting->email: old('email')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="phoneNumber" class="form-label">Phone</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="phone" class="form-control" id="phoneNumber" placeholder="+97714310000" value="{{$setting ? $setting->phone: old('phone')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="website" class="form-label">Mobile</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="mobile" class="form-control" id="website" placeholder="+9779801000000" value="{{$setting ? $setting->mobile: old('mobile')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="address" class="form-label">Address</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="address" id="address" name="example-textarea-input" rows="2" placeholder="San Francisco, CA">{{$setting ? $setting->address: old('address')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <p class="mb-4 text-17 fw-bold">Social Info</p>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="facebook" class="form-label">Facebook</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="facebook" class="form-control" id="facebook" placeholder="https://www.facebook.com/abc" value="{{$setting ? $setting->facebook: old('facebook')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="twitter" class="form-label">Twitter</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="twitter" class="form-control" id="twitter" placeholder="twitter.com/abc" value="{{$setting ? $setting->twitter: old('twitter')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="youtube" class="form-label">Youtube</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="youtube" class="form-control" id="youtube" placeholder="youtube.com/abc" value="{{$setting ? $setting->youtube: old('youtube')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="linkedin" class="form-label">Linkedin</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="linkedin" class="form-control" id="linkedin" placeholder="linkedin.com/abc" value="{{$setting ? $setting->linkedin: old('linkedin')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="instagram" class="form-label">Instagram</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="instagram" class="form-control" id="instagram" placeholder="instagram.com/abc" value="{{$setting ? $setting->instagram: old('instagram')}}">
                                </div>
                            </div>
                        </div> 
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="viber" class="form-label">Viber</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="viber" class="form-control" id="viber" placeholder="+977980100000" value="{{$setting ? $setting->viber: old('viber')}}">
                                </div>
                            </div>
                        </div> 
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="viber" class="form-label">Whatsapp</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="whatsapp" class="form-control" id="viber" placeholder="whatsapp" value="{{$setting ? $setting->whatsapp: old('whatsapp')}}">
                                </div>
                            </div>
                        </div> 
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="biographicalInfo" class="form-label">Awarded Info</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="general_info" id="biographicalInfo" rows="4" placeholder=""> {{$setting ? $setting->general_info: old('general_info')}}</textarea>
                                </div>
                            </div>
                        </div>
                         <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="biographicalInfo" class="form-label"></label>
                                </div>
                                <div class="col-md-3">
                                    <label for="biographicalInfo" class="form-label">Established Year</label>

                                    <input type="text" name="years" class="form-control" id="viber" placeholder="" value="{{$setting ? $setting->years: old('years')}}">
                                </div>
                                   <div class="col-md-3">
                                    <label for="biographicalInfo" class="form-label">Happy Parents</label>
                                    <input type="text" name="happy_parents" class="form-control" id="viber" placeholder="" value="{{$setting ? $setting->happy_parents: old('happy_parents')}}">
                                </div>
                                   <div class="col-md-3">
                                    <label for="biographicalInfo" class="form-label">Alumni</label>

                                    <input type="text" name="alumni" class="form-control" id="viber" placeholder="" value="{{$setting ? $setting->alumni: old('alumni')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="biographicalInfo" class="form-label">Google Map</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="google_map" id="biographicalInfo" rows="4" placeholder="Google map"> {{$setting ? $setting->google_map : old('google_map')}} </textarea>
                                </div>
                            </div>
                        </div> 
                                <div class="row ">
                                    <div class="col-md-3">
                                        <label for="biographicalInfo" class="form-label">Upload Image</label>
                                    </div>
                                    <div class="col-md-9 d-flex justity-content-between"> 
                                        <div class="col-sm-12 col-md-4">
                                            <div class="col-sm-12 col-md-12 col-lg-12 image">
                                                <label for="formFile" class="form-label">Logo</label>
                                                <div class="form-group">                     
                                                    <div class="image dropify-wrapper">
                                                        @if(isset($setting->logo))
                                                            <img src="{{ asset('storage/' . $setting->logo) }}" alt=""
                                                                class="previewImage">
                                                        @else
                                                            <img src="{{ asset('dummy_image.jpg') }}" alt="" class="previewImage">
                                                        @endif
                                                    </div>
                                                    <input name="logo" class="form-control file-input custom-file-input mt-3" type="file" id="formFile">
                                
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-4">
                                            <div class="col-sm-12 col-md-12 col-lg-12 image">
                                                <label for="formFile2" class="form-label">Fav Icon</label>
                                                <div class="form-group">                     
                                                    <div class="image dropify-wrapper">
                                                        @if (isset($setting->logo))
                                                            <img src="{{ asset('storage/' . $setting->fav_icon) }}" alt=""
                                                                class="previewImage">
                                                        @else
                                                            <img src="{{ asset('dummy_image.jpg') }}" alt="" class="previewImage">
                                                        @endif
                                                    </div>
                                                    <input name="fav_icon" class="form-control file-input custom-file-input mt-3" type="file" id="formFile2">
                                
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-4">
                                            <div class="col-sm-12 col-md-12 col-lg-12 image">
                                                <label for="formFile3" class="form-label"> Brochure</label>
                                                <div class="form-group">                     
                                                    <div class="image dropify-wrapper">
                                                        @if(!empty($setting->image))
                                                            <img src="{{ asset('storage/' . $setting->image) }}" alt=""
                                                                class="previewImage">
                                                                @isset($setting->image)
                                                            @php
                                                                $extension = explode('.', $setting->image)[1];
                                                            @endphp
                                                            @endisset
                                                            @isset($setting->image)
                                                                @if ($extension == 'pdf')
                                                                    <a href="{{ asset('storage/' . $setting->image) }}" target="_blank">
                                                                        <img src="{{ asset('pdf-img.png') }}" alt=""
                                                                            class="previewImage" width="200px" >
                                                                    </a>
                                                                @elseif($extension == 'docx' || $extension == 'doc')
                                                                    <a href="{{ asset('storage/' . $setting->image) }}" target="_blank">
                                                                        <img src="{{ asset('word-img.png') }}" alt=""
                                                                            class="previewImage" width="200px" >
                                                                    </a>
                                                                    @elseif($extension == 'xls' || $extension == 'xlsx')
                                                                    <a href="{{ asset('storage/' . $setting->image) }}" target="_blank">
                                                                        <img src="{{ asset('excel-img.png') }}" alt=""
                                                                            class="previewImage" width="200px" >
                                                                    </a>
                                                                @else
                                                                    <a href="{{ asset('storage/' . $setting->image) }}" target="_blank">
                                                                        <img src="{{ asset('storage/' . $setting->image) }}" alt=""
                                                                            class="previewImage" height="200px" >
                                                                    </a>
                                                                @endif
                                                            @endisset
                                                        @else
                                                            <img src="{{ asset('dummy_image.jpg') }}" alt="" class="previewImage">
                                                        @endif
                                                    </div>
                                                    <input name="image" class="form-control file-input custom-file-input mt-3" type="file" id="formFile3">
                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
 
                                </div> 
                                @if($setting)
                                <button type="submit"  class="btn btn-success mt-5 mb-3 px-5 float-end">update</button>
                                @else
                                <button type="submit"  class="btn btn-info mt-5 mb-3 px-5 float-end">Submit</button>
                                @endif
                      </form>
                </div>
                 
            </div>
        </div>
       
         
    </div>
@endsection




@push('js')
<!--Internal Fileuploads js-->
<script src="{{asset('backend/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{asset('backend/assets/plugins/fileuploads/js/file-upload.js')}}"></script>


@endpush