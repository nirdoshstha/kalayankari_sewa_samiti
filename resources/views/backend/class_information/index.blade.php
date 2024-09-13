@extends('backend.layouts.master',['page' => 'List'])

@section('title')
{{$panel ?? ''}}
@endsection

@section('sub_title', $panel ?? '')

@push('css')
@endpush
@section('content')
   

    <div class="row">
        <div class="col-lg-7">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                <div class="d-flex justity-content-between">
                    <h5 class="card-title">Total {{$panel ?? ''}} List </h5>
                    <i class="fa fa-plus-circle ms-auto text-success" data-bs-toggle="modal" data-bs-target="#largemodal" title="Add Post" style="font-size: 26px;"></i>
                     
                </div>
                    
                         
                <div class="table-responsive">
                    <table id="user-datatable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10%">#</th>
                                <th style="width: 30%">Title</th>
                                <th style="width: 10%">Cover</th>

                                <th style="width: 10%">Rank</th> 
                                <th style="width: 40%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['classinformations'] as $classinformation)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $classinformation->title }}</td>
                                    <td>
                                        @if($classinformation->image)
                                        <img src="{{asset('storage/'.$classinformation->image)}}" class="img-thumbnail p-0 m-0" width="auto">
                                        @else
                                        <img src="{{asset('dummy_image.jpg')}}" class="img-thumbnail p-0 m-0" width="auto">
                                        @endif
                                    </td>
                                    <td class="text-center">{{$classinformation->rank}} </td>
                                     
                                    <td class="d-flex align-items-center text-center border-0">
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#view-{{ $classinformation->id }}"><i
                                                class="fa fa-eye fs-17 px-3 my-4 text-info"></i></a>
                                        <a href="{{route($base_route.'edit',$classinformation->id)}}"><i
                                                class="fa fa-edit fs-17 px-3 my-4 text-primary"></i></a>
                                        
                                            <div class="main-toggle-group d-sm-flex align-items-center"> 
                                                <div class="toggle show_hide toggle-md toggle-{{ $classinformation->status == '0' ? 'success' : ''}} my-1 {{ $classinformation->status == '0' ? 'on' : 'off' }}" data-id="{{$classinformation->id}}">
                                                     <span></span>
                                                </div>
                                            </div>
                                             
                                            
                                                <form action="{{ route($base_route . 'destroy', $classinformation->id) }}"
                                                    method="POST" class="main_form" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                            <a href="#" ><i class="fa fa-trash fs-17 px-3 my-4 text-danger delete-confirm" data-id="{{$classinformation->id}}"></i></a>
                                                </form>

                                           
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- //View Details --}}
                </div>
                 
                </div>
                 {{-- //View Post Details --}}
                 @foreach ($data['classinformations'] as $classinformation)
                 <div class="modal fade" id="view-{{ $classinformation->id }}" tabindex="-1"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <span>View Details</span>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal"
                                     aria-label="Close"><i class="fa fa-close"></i></button>
                                     
                             </div>
                             <div class="modal-body">

                                 <div class="card-body">

                                    <div class="form-group">
                                        <div class="row row-sm">
                                            <div class="col-md-4">
                                                <label for="email" class="form-label">Class Name</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{$classinformation->title}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row row-sm">
                                            <div class="col-md-4">
                                                <label for="email" class="form-label">Image</label>
                                            </div>
                                            <div class="col-md-8">
                                                
                                            <img src="{{asset('storage/'.$classinformation->image)}}" width="100px">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row row-sm"> 
                                            <div class="col-md-12">
                                                
                                           {!! $classinformation->description !!}
                                            </div>
                                        </div>
                                    </div>
                                     
                                    <hr>

                                    
                                 </div>

                             </div>


                         </div>
                     </div>
                 </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-5"> 
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        @if($data['classinformation'])
                        <i class="fa fa-edit text-danger fs-5"></i>
                        @else
                        <i class="fa fa-plus text-success fs-5"></i>
                        @endif
                         {{isset($data['classinformation']) ? 'Update' : 'Create' }} Page {{$panel ?? ''}}</h5>
                    <div class="panel panel-primary">
                        <div class="tab-menu-heading border-bottom-0">
                            <div class="tabs-menu ">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs">
                                    <li ><a href="#tab1" class="me-1 text-default active my-1" data-bs-toggle="tab">Home</a></li>
                                    <li><a href="#tab2" data-bs-toggle="tab" class="me-1 text-default my-1">Description</a></li> 
                                    <li><a href="#tab4" data-bs-toggle="tab" class="me-1 text-default my-1">SEO</a></li> 
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body">
                            @if(isset($data['classinformation']))
                            <form action="{{ route($base_route.'update',$data['classinformation']->id) }}" method="POST" class="row g-3 main_form">
                            @csrf
                            @method('PUT') 
                            <input type="hidden" name="type" value="page">
                            
                        @else
                            <form action="{{ route($base_route.'store') }}" method="POST" class="row g-3 main_form">
                            @csrf
                            <input type="hidden" name="type" value="page">
                        @endif 
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1"> 
                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating">
                                            <input type="text" name="title" value="{{ isset($data['classinformation']) ? $data['classinformation']->title : old('title')}}" class="form-control" id="title"
                                                placeholder="Title">
                                                
                                            
                                            <label for="floatingName">Title</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating">
                                            <input type="text" name="sub_title" value="{{ isset($data['classinformation']) ? $data['classinformation']->sub_title : old('sub_title')}}" class="form-control"   
                                                placeholder="Subtitle">
                                           
                                            <label for="floatingUser">Subtitle</label>
                                        </div>
                                    </div> 
                                    <div class="col-md-12 mb-3 image">
                                        <label for="formFile3" class="form-label">Banner</label>
                                        <div class="form-group">                     
                                            <div class="image dropify-wrapper">
                                                @if(!empty($data['classinformation']->image))
                                                    <img src="{{ asset('storage/' . $data['classinformation']->image) }}" alt=""
                                                        class="previewImage">
                                                @else
                                                    <img src="{{ asset('dummy_image.jpg') }}" alt="" class="previewImage">
                                                @endif
                                            </div>
                                            <input name="image" class="form-control file-input custom-file-input mt-3" type="file" id="formFile3">
                        
                                        </div>
                                    </div>                                                         
                                </div>
                                <div class="tab-pane mb-3" id="tab2">
                                     
                                         
                                           <textarea name="description" class="form-control"  id="editor" style="height: 290px;">{{isset($data['classinformation']) ? $data['classinformation']->description : old('description')}}</textarea>
                                            
                                            {{-- <label for="floatingName">Description</label> --}}
                                         
                                     
                                </div>
                                
                                <div class="tab-pane" id="tab4">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating">
                                            <input type="text" name="seo_title" value="{{ isset($data['classinformation']) ? $data['classinformation']->seo_title : ''}}" class="form-control" id="floatingName"
                                                placeholder="Seo Title">
                                            
                                            <label for="floatingName">Seo Title</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating">
                                            <input type="text" name="seo_keyword" value="{{ isset($data['classinformation']) ? $data['classinformation']->seo_keyword : ''}}" class="form-control"   
                                                placeholder="Seo Keyword">
                                           
                                            <label for="floatingUser">Seo Keyword</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating">
                                            <input  name="seo_description" value="{{ isset($data['classinformation']) ? $data['classinformation']->seo_description : ''}}" class="form-control"   
                                                placeholder="Seo Description"> 
                                           
                                            <label for="floatingUser">Seo Description</label>
                                        </div>
                                    </div>
                                </div>
                                 <div class="text-center py-3">
                                        @if(isset($data['classinformation']))
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-pencil-square" data-bs-toggle="tooltip" title="" style="font-size: 16px;" ></i> Update</button>
                                        @else
                                        
                                        <button type="submit" class="btn btn-info"><i class="fa fa-plus-circle fs-6"></i> Create</button>
                                        @endif
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                                     
                                
                            </div>
                        </form> 
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <!-- Add PostModal -->
		<div class="modal fade"  id="largemodal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg " role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" >Add {{$panel ?? ''}}</h5>
						<button  class="btn-close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body"> 
                            <form action="{{ route($base_route.'store') }}" method="POST" class="row g-3 main_form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="type" value="post">
    
                                <!--For Multiple Images Step 1-->
                                <div class="other_image">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="title" class="form-control title" value="" id="floatingName" placeholder="Class Information Name">
                                        <label for="floatingName">Class Information Name</label>
                                    </div>
                                </div>
    
                                <div class="col-md-3">
                                    <label for="" class="form-label">Image</label>
                                        <div class="form-group">       
                                            <input name="image" class="form-control mt-3" type="file"> 
                                        </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="form-label">Rank</label>
                                        <div class="form-group">       
                                            <input name="rank" class="form-control mt-3" type="number"> 
                                        </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-floating">
                                         <textarea name="description" id="editor2" class="form-control"   
                                                placeholder="Description"> </textarea> 
                                    </div>
                                </div>
    
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info"><i class="fa fa-plus-circle fs-6"></i> Create</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- End floating Labels Form -->
    
                            
                             
					</div>
					 
				</div>
			</div>
		</div>
    </div>
@endsection

@push('js') 
<script>
    $(document).ready(function(){

        $('.show_hide').on('click',function(){
            
            let classinformation_id = $(this).attr('data-id'); 

            $.ajax({
                url:"{{route('class_information.status')}}",
                data:{classinformation_id:classinformation_id},
                success:function(resp){
                    // toastr.success(resp.success_message);
                        successAlert(resp.success_message);
                    // location.reload();
                    window.location.href = res.url;
                },
                error: function(err){
                    errorAlert('error');
                }
            })
        });

            
    })
</script>

<!-- INTERNAL Summernote Editor js -->
{{-- <script src="{{asset('backend/assets/plugins/summernote-editor/summernote1.js')}}"></script>
<script src="{{asset('backend/assets/js/summernote.js')}}"></script> --}}

<script src="{{ asset('ckeditor/build/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor2'))
        .catch(error => {
            console.error(error);
        });
</script>
{{-- <script>
    for (let i = 0; i < {{ $data['classinformations']->count() }}; i++) {
        ClassicEditor
            .create(document.querySelector('#editor' + i))
            .catch(error => {
                console.error(error);
            });
    }
</script> --}}

@endpush