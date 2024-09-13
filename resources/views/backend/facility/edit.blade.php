@extends('backend.layouts.master',['page' => 'Edit'])

 
@section('title','Edit'.' '.$panel) 

@section('sub_title',  'Edit' );

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route($base_route . 'update',$data['facility']->id) }}" method="POST"
            enctype="multipart/form-data" class="row g-3 main_form">
            @csrf
            @method('PUT')
            <input type="hidden" name="type" value="post">
            <div class="other_image">
            </div>
            <div class="col-md-8">
                <div class="form-floating">
                    <input type="text" name="title" class="form-control title"
                        value="{{ $data['facility']->title ?? '' }}" id="floatingName" placeholder="Album Name">
                    <label for="floatingName">Album Name</label>
                </div>
            </div>
            
            <div class="col-md-4 image pt-3">
                <div class="d-flex justify-content-center">
                    <div class="image p-2">
                    @if ($data['facility']->image)
                        <img src="{{ asset('storage/'.$data['facility']->image) }}" class="previewImage" width="70">
                    @else
                        <img src="{{ asset('dummy_image.jpg') }}" class="previewImage" height="70px;">
                    @endif
                    </div>  
                        <input name="image" class="file-input custom-file-input mt-5" type="file" id="formFile3">
                         
                </div>
            </div>

            <div class="col-md-12"> 
                    <textarea name="description" class="form-control" rows="3" id="editor"  placeholder="Description">
                    {!! $data['facility']->description ?? '' !!}
                    </textarea>
                    
            </div>

            
            <div class="text-center">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form><!-- End floating Labels Form -->

        {{-- multiple image step 2 --}}
        <form action="{{ route('admin.upload') }}" method="get" enctype="multipart/form-data">
            <div class="col-md-12 col-lg-12">
                <div class="form-group">
                    <label class="form-label" for="separated-input">Other Multiple Images</label>
                    <input id="demo" type="file" name="files"
                        accept=" image/jpeg, image/png, text/html, application/zip, text/css, text/js"
                        multiple />
                </div>
            </div>
        </form>

        {{-- multiple image edit show delete 9th step --}}
        <div class="row p-3">
            <div class="col-md-12 d-flex align-content-start flex-wrap">
                @isset($data['facility']->images)
                    @foreach ($data['facility']->images as $image)
                        <div class="image p-2">
                            <img src="{{ image_path($image->url) }}" alt="" height="50px">
                        </div>
                        <div class="icon ">


                            <a href="{{ route('admin.delete.image', $image->id) }}">
                                <i class="fa fa-trash fs-6 p-1 text-danger"></i>
                            </a>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>


    </div>
</div>
@endsection

@push('js') 
<script src="{{ asset('ckeditor/build/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>

<script src="{{ asset('backend/assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
<script>
    $(function() {
        var token;

        $('#demo').FancyFileUpload({


            params: {


                action: 'fileuploader',
                _token: '{{ csrf_token() }}'
            },
            maxfilesize: 1000000,

            continueupload: function(e, data) {
                var ts = Math.round(new Date().getTime() / 1000);


                // Alternatively, just call data.abort() or return false here to terminate the upload but leave the UI elements alone.
                if (token.expires < ts) data.ff_info.RemoveFile();
            },
            uploadcompleted: function(e, data) {


                $('.other_image').append(
                    `<input type="hidden" name="other_image[]" value="${data.result.image_id}">`
                );
                // console.log(e);
                // data.ff_info.RemoveFile();
            }
        });

    });
</script>

@endpush
