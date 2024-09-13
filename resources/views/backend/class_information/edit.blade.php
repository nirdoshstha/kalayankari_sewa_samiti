@extends('backend.layouts.master',['page' => 'Edit'])

 
@section('title','Edit'.' '.$panel) 

@section('sub_title',  'Edit' );

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route($base_route . 'update',$data['classinformation']->id) }}" method="POST"
            enctype="multipart/form-data" class="main_form">
            @csrf
            @method('PUT')
            <input type="hidden" name="type" value="post">
             <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" name="title" class="form-control title"
                            value="{{ $data['classinformation']->title ?? '' }}" id="floatingName" placeholder="Class Name">
                        <label for="floatingName">Class Name</label>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class=""> 
                        <div class="d-flex justify-content-center align-items-center">  
                            <input name="image" class="file-input custom-file-input" type="file" id="formFile3"> 
                            @if($data['classinformation']->image)
                            <img src="{{asset('storage/'.$data['classinformation']->image)}}" class="img-thumbnail p-0 m-0" width="60px">
                            @else
                            <img src="{{asset('dummy_image.jpg')}}" class="img-thumbnail p-0 m-0" width="60px">
                            @endif
                            </div>
                            
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-floating">
                        <input type="text" name="rank" class="form-control rank"
                            value="{{ $data['classinformation']->rank ?? '' }}" id="floatingName" placeholder="Rank">
                        <label for="floatingName">Rank</label>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-12 "> 
                        <textarea name="description" class="form-control" rows="3" id="editor"  placeholder="Description">
                        {!! $data['classinformation']->description ?? '' !!}
                        </textarea>
                        
                </div>
                <div class="text-center">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            </div>

            
        </form><!-- End floating Labels Form -->

       

        


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
 

@endpush
