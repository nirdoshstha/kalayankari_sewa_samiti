@extends('backend.layouts.master',['page' => 'List'])

@section('title')
{{$panel ?? ''}}
@endsection

@section('sub_title', $panel ?? '')

@push('css')
@endpush
@section('content')
   

    <div class="row">
        <div class="col-lg-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                <div class="d-flex justity-content-between">
                    <h5 class="card-title">{{$panel ?? ''}} List </h5>
                    <i class="fa fa-plus-square ms-auto text-primary" data-bs-toggle="modal" data-bs-target="#add-category" title="Add Post" style="font-size: 26px;"></i>                
                </div>
                                      
                <div class="table-responsive">  
                        <table id="user-datatable" class="table table-bordered">
                            @foreach ($data['categories'] as $category) 
                                
                                    @if($category->subCategories->count()) 
                                        <tr>
                                        <td class="d-sm-flex justify-content-between" style="background:#f7f8f9">
                                        <div class="mx-2 my-1"><span class="fw-bold">{{$category->title}}</span> ({{$category->subCategories()->count()}})</div>
                                       
                                        <div class="d-sm-flex align-items-center py-0">
                                         
                                            <a href="#" data-id="{{$category->id}}" data-bs-toggle="modal"
                                                data-bs-target="#view" class="mx-1 my-1 view_service"> <i
                                                class="fa fa-eye fs-17 px-3 my-1 text-info"></i></a>
                                            <a href="#" data-id="{{$category->id}}" data-bs-toggle="modal" class="mx-1 my-1 edit-service"
                                            data-bs-target="#edit"><i class="fa fa-edit fs-17 px-3 my-1 text-primary"></i></a>
                                            
                                            <div class="main-toggle-group"> 
                                                <div class="toggle show_hide toggle-md toggle-{{ $category->status == '0' ? 'success' : ''}} my-1 {{ $category->status == '0' ? 'on' : 'off' }}" data-id="{{$category->id}}">
                                                    <span></span>
                                                </div>
                                            </div>
                                            
                                             <form action="{{ route($base_route . 'destroy', $category->id) }}"
                                                    method="POST" class="main_form" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                               
                                            <a href="#" class="mx-1 my-0"><i class="fa fa-trash fs-19 px-4 text-danger delete-confirm"></i></a>
                                                </form>
                                        </div>
                                        
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <table>
                                            <thead>
                                    <tr class="text-center">
                                        <th style="width: 5%">#</th>
                                        <th style="width: 20%">Title</th>
                                        <th style="width: 10%">Image</th> 
                                        <th style="width: 45%">Description</th> 

                                        <th style="width: 20%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                                @foreach ($category->subCategories as $subcategory) 
                                                    <tr> 
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td class="px-2">{{ $subcategory->title }}</td>
                                                        <td class="text-center py-2">
                                                        @if($subcategory->image)
                                                            <img src="{{asset('storage/'.$subcategory->image)}}" width="60px;" class="img-thumbnail">
                                                        @else
                                                            <img src="{{asset('dummy_image.jpg')}}" width="60px;" class="img-thumbnail">
                                                        @endif
                                                        </td>
                                                        <td class="px-2">{!! Str::limit($subcategory->description,140) !!}
                                                        
                                                        <td class="d-sm-flex align-items-center py-3">
                                                            <a href="#" data-bs-toggle="modal" data-id="{{$subcategory->id}}"
                                                                data-bs-target="#view" class="mx-2 my-2 view_service"><i
                                                class="fa fa-eye fs-17 px-3 my-2 text-info"></i></a>
                                                            <a href="#" data-id="{{$subcategory->id}}" data-bs-toggle="modal"
                                                            data-bs-target="#edit" class="edit-service"><i
                                                class="fa fa-edit fs-17 px-3 my-2 text-primary"></i></a>
                                                            
                                                                <div class="main-toggle-group d-sm-flex align-items-center"> 
                                                                    <div class="toggle show_hide toggle-md toggle-{{ $subcategory->status == '0' ? 'success' : ''}} my-1 {{ $subcategory->status == '0' ? 'on' : 'off' }}" data-id="{{$subcategory->id}}">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                                    <form action="{{ route($base_route . 'destroy', $subcategory->id) }}"
                                                                        method="POST" class="main_form" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('DELETE')
                                                               <a href="#" class="mx-2 my-2"><i class="fa fa-trash fs-19 px-3 text-danger delete-confirm" data-id="{{$subcategory->id}}"></i></a>
                                                                    </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                            </td>
                                        </tr> 
                                    @else 
                                        <tr>
                                        <td class="d-sm-flex justify-content-between" style="background:#f7f8f9">
                                        <div class="mx-2 my-1"><span class="fw-bold">{{$category->title}}</span> ({{$category->subCategories()->count()}})</div>
                                       
                                        <div class="d-sm-flex align-items-center py-0">
                                         
                                            <a href="#" data-id="{{$category->id}}" data-bs-toggle="modal"
                                                data-bs-target="#view" class="mx-1 my-1 view_service"> <i
                                                class="fa fa-eye fs-17 px-3 my-1 text-info"></i></a>
                                            <a href="#" data-id="{{$category->id}}" data-bs-toggle="modal" class="mx-1 my-1 edit-service"
                                            data-bs-target="#edit"><i class="fa fa-edit fs-17 px-3 my-1 text-primary"></i></a>
                                            
                                            <div class="main-toggle-group"> 
                                                <div class="toggle show_hide toggle-md toggle-{{ $category->status == '0' ? 'success' : ''}} my-1 {{ $category->status == '0' ? 'on' : 'off' }}" data-id="{{$category->id}}">
                                                    <span></span>
                                                </div>
                                            </div>
                                            
                                             <form action="{{ route($base_route . 'destroy', $category->id) }}"
                                                    method="POST" class="main_form" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                               
                                            <a href="#" class="mx-1 my-1"><i class="fa fa-trash fs-19 px-4 text-danger delete-confirm"></i></a>
                                                </form>
                                        </div>
                                        
                                        </td>
                                        </tr>
                                        
                                    @endif
                            @endforeach
                        </table> 
                </div>
                </div>

                 {{-- //View Modal Details --}} 
                 <div class="modal fade" id="view" tabindex="-1"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <span>View Details</span>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal"
                                     aria-label="Close"><i class="fa fa-close"></i></button>                               
                             </div>
                             <div class="modal-body view_div"> 
                                    <!--view div ajax from here -->
                             </div>
                         </div>
                     </div>
                 </div> 

                {{-- //Edit Video Modal Details --}} 
                <div class="modal fade" id="edit" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <span>Edit Details</span>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"><i class="fa fa-close"></i></button>
                                    
                            </div>
                            <div class="modal-body edit_div"> 
                                
                        </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
         
         
        
        <!-- Add Category Post Modal -->
		<div class="modal fade"  id="add-category" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg " role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" >Add {{$panel ?? ''}}</h5>
						<button  class="btn-close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
                    <div class="card">
                        <div class="card-body"> 
                                
                                <form action="{{ route($base_route.'store') }}" method="POST" class="main_form" enctype="multipart/form-data">
                                    @csrf
                                <div class="row g-4">
                                
                                    <div class="col-md-4">
                                        <select name="parent_id" class="parent_id form-select text-dark"> 
                                            <option value="" id="choose" style="font-size: 14px">Please Choose Parent</option>
                                            
                                            @foreach($data['categories'] as $category)
                                                <option value="{{$category->id}}" class="parent_id" style="font-size: 14px">{{$category->title}} ({{$category->subCategories->count()}})</option> 
                                                    {{-- @foreach($category->subCategories as $subCategory)
                                                        <option value="{{$subCategory->id}}" style="font-size: 12px">---{{$subCategory->title}}</option>
                                                    @endforeach --}}
                                                
                                            @endforeach 
                                        </select>
                                    </div> 
                                    {{-- <div class="col-md-4">  
                                        <input type="text" name="parent_id"  class="form-control mb-1" placeholder="Create Parent Name"> 
                                    </div> --}}
                                    <div class="col-md-4"> 
                                            <input type="text" name="title" id="title" class="form-control" value=""  placeholder="Title"> 
                                    </div>
                                    <div class="col-md-4"> 
                                            <input type="text" name="sub_title" class="form-control" value=""  placeholder="Sub Title"> 
                                    </div>

                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <select name="design" class="form-control select2 form-select select2-hidden-accessible text-dark"> 
                                                {{-- <option value="" selected>Please Choose Design</option>  --}}
                                                <option value="default" selected>(Default) Pls Choose Design</option>
                                                <option value="about">About</option>   
                                                <option value="message">Message</option>
                                                <option value="school-life">School Life</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">  
                                            <input name="image" class="form-control" type="file">  
                                    </div>

                                    <div class="col-md-4"> 
                                            <input type="number" name="rank" class="form-control" value=""  placeholder="Rank"> 
                                    </div>
        
                                    <div class="col-md-4"> 
                                            <input type="text" name="seo_title" class="form-control" value=""  placeholder="Seo Title">
                                            
                                    </div>
                                    <div class="col-md-4"> 
                                            <input type="text" name="seo_keyword" class="form-control" value=""  placeholder="Seo Keyword">
                                            
                                    </div>
                                    <div class="col-md-4"> 
                                            <input type="text" name="seo_description" class="form-control" value=""  placeholder="Seo Description">
                                            
                                    </div>
                                    <div class="col-md-12 py-5"> 
                                            <textarea name="description" id="editor" class="form-control" style="height: 50px;"></textarea>
                                    </div>
                                    {{-- <div class="col-md-12"> 
                                        <textarea name="description" id="editor{{$index}}" class="form-control" style="height: 50px;"></textarea>
                                </div> --}}
                                    
        
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-read"><i class="fa fa-plus-circle fs-6"></i> Create</button>
                                        {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
                                    </div>
                                </div>
                                </form><!-- End floating Labels Form -->
        
                                
                            
                        </div>
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
            
            let service_id = $(this).attr('data-id'); 

            $.ajax({
                url:"{{route('service.status')}}",
                data:{service_id:service_id},
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

        $('.destroy-data').on('click',function(){
                let service_id = $(this).data('id'); 
                let that = $(this);
                let url = "{{route('service.destroy',':id')}}";
                url = url.replace(':id', service_id)
                
                $.ajax({
                    data: {
                        _token: "{{ csrf_token()}}",
                    },
                    url: url,
                    method: 'DELETE',             
                    success:function(resp){
                        successAlert(resp.success_message); 
                        //  that.parents('li').remove(); 
                        // $(this).closest("span").remove();

                        if(resp.reload==true){
                        window.location.href = resp.url;
                    }
                    },
                    error: function(err){                        
                        errorAlert(err.responseJSON.error_message);
                    }
                })
        });

        $('.view_service').on('click',function(){
            let view_id = $(this).attr('data-id');
            
            $.ajax({
                url:"{{route('service.get_view_data')}}",
                data:{view_id:view_id},
                type:'GET',
                success:function(resp){
                    $('.view_div').html(resp); 
                },
                error:function(err){

                }
            })
        });


        $('.edit-service').on('click',function(){
            let edit_id = $(this).attr('data-id');
            
            $.ajax({
                url:"{{route('service.get_edit_data')}}",
                data:{edit_id:edit_id},
                success:function(resp){
                    $('.edit_div').html(resp);
                     ClassicEditor
                    .create(document.querySelector('#editor'))
                    .catch(error => {
                        console.error(error);
                    });
                },
                error:function(err){

                }
            })
        })

         


            
    })
</script>

<!-- INTERNAL Summernote Editor js -->
{{-- <script src="{{asset('backend/assets/plugins/summernote-editor/summernote1.js')}}"></script>
<script src="{{asset('backend/assets/js/summernote.js')}}"></script> --}}
<!-- SELECT2 JS -->
<script src="{{asset('backend/assets/plugins/select2/select2.full.min.js')}}"></script>
<!-- Internal Treeview js -->
<script src="{{asset('backend/assets/plugins/treeview/treeview.js')}}"></script> 

<script>
    ClassicEditor
        .create(document.querySelector('#summernote2'))
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    $(document).ready(function(){
        $('#banner').hide();
    $('.page_post').click(function(){
            if($(this).val()==0){
                $('#banner').show();
            }
            else{
                $('#banner').hide();
            }
    });
    });
</script>

<script>
    $(document).ready(function(){
        $('#parent_id').on('change',function(){
            let parent = $(this).val();
            alert(parent);
            $('#title').val(parent);
        });
    })
</script>

<script src="{{ asset('ckeditor/build/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    for (let i = 0; i < {{ $data['services']->count() }}; i++) {
        ClassicEditor
            .create(document.querySelector('#editor' + i))
            .catch(error => {
                console.error(error);
            });
    }
</script>

@endpush