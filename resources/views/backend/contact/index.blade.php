@extends('backend.layouts.master',['page' => 'List'])

@section('title')
{{$panel ?? ''}}
@endsection

@section('sub_title', $panel ?? '')

@push('css')
@endpush
@section('content')
   

    <div class="row">
        <div class="col-lg-8">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                <div class="d-flex justity-content-between">
                    <h5 class="card-title">Total {{$panel ?? ''}} List </h5> 
                </div>
                    
                         
                <div class="table-responsive">
                    <table id="user-datatable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10%">#</th>
                                <th style="width: 25%">Name</th>
                                <th style="width: 30%">Email</th> 
                                <th style="width: 25%">Subject</th> 
                                <th style="width: 15%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['contacts'] as $contact)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>

                                    <td> {{$contact->subject}}</td>
                                     
                                    <td class="d-sm-flex align-items-center py-2">
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#view-{{ $contact->id }}"><i
                                                class="fa fa-eye fs-17 px-3 text-info"></i></a> 
                                            
                                                <form action="{{ route($base_route . 'destroy', $contact->id) }}"
                                                    method="POST" class="main_form" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                            <a href="#" ><i class="fa fa-trash fs-17 px-3 text-danger delete-confirm" data-id="{{$contact->id}}"></i></a>
                                                </form>

                                           
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
                 
                </div>
                 {{-- //View Modal Details --}}
                 @foreach ($data['contacts'] as $contact)
                 <div class="modal fade" id="view-{{ $contact->id }}" tabindex="-1"
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
                                                <label for="email" class="form-label">Name</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{$contact->name}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @isset($contact->email)
                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-4">
                                                    <label for="email" class="form-label">Email</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>{{$contact->email}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                    <div class="form-group">
                                        <div class="row row-sm">
                                            <div class="col-md-4">
                                                <label for="email" class="form-label">Subject</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{$contact->subject}}</p>
                                            </div>
                                        </div>
                                    </div> 
                                     
                                    <hr> 
                                        <div class="col-md-12"> 
                                            <label for="email" class="form-label">Message</label>
                                            <p>{{$contact->message}}</p> 
                                        </div>  
                                        <hr> 
                                 </div>

                             </div>


                         </div>
                     </div>
                 </div>
                @endforeach

                {{-- //Edit contact Modal Details --}}
                @foreach ($data['contacts'] as $contact)
                <div class="modal fade" id="edit-{{ $contact->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <span>Edit Details</span>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"><i class="fa fa-close"></i></button>
                                    
                            </div>
                            <div class="modal-body"> 
                                <form action="{{ route($base_route.'update',$contact->id) }}" method="POST" class="row g-3 main_form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="type" value="post"> 
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" name="title" class="form-control title" value="{{isset($contact) ? $contact->title : ''}}" id="floatingName" placeholder="Album Name">
                                            <label for="floatingName">Title</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" name="sub_title" class="form-control title" value="{{isset($contact) ? $contact->sub_title : ''}}" id="floatingName" placeholder="Album Name">
                                            <label for="floatingName">Subtitle</label>
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Image</label>
                                            <div class="form-group">
                                                <div class="d-flex justify-content-between">
                                                    @if(isset($contact->image))     
                                                    <input name="image" class="form-control p-4" type="file"> <span class="p-2"></span>
                                                    <img src="{{asset('storage/'.$contact->image)}}" width="50" class="img-thumbnail">  
                                                    @else
                                                    <input name="image" class="form-control p-4" type="file"><span class="p-2"></span>
                                                    <img src="{{asset('dummy_image.jpg')}}" width="50" class="img-thumbnail">  
                                                    @endif
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" name="rank" class="form-control title" value="{{isset($contact) ? $contact->rank : ''}}" id="floatingName" placeholder="Album Name">
                                            <label for="floatingName">Rank</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <textarea name="description" class="form-control" style="height: 100px;">{{isset($contact) ? $contact->description : ''}}</textarea>
                                            <label for="floatingName">Description</label>
                                        </div>
                                    </div>
        
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-edit fs-6"></i> Update</button> 
                                    </div>
                                </form><!-- End floating Labels Form -->
                        </div>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </div>
        <div class="col-lg-4"> 
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        @if($data['contact'])
                        <i class="fa fa-edit text-danger fs-5"></i>
                        @else
                        <i class="fa fa-plus text-success fs-5"></i>
                        @endif
                         {{isset($data['contact']) ? 'Update' : 'Create' }} Page {{$panel ?? ''}}</h5>
                    <div class="panel panel-primary">
                        <div class="tab-menu-heading border-bottom-0">
                            <div class="tabs-menu ">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs">
                                    <li ><a href="#tab1" class="me-1 text-default active my-1" data-bs-toggle="tab">Home</a></li>
                                    <li><a href="#tab2" data-bs-toggle="tab" class="me-1 text-default my-1">Description</a></li>  
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body">
                            @if(isset($data['contact']))
                            <form action="{{ route($base_route.'update',$data['contact']->id) }}" method="POST" class="row g-3 main_form">
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
                                            <input type="text" name="name" value="{{ isset($data['contact']) ? $data['contact']->name : old('name')}}" class="form-control" id="title"
                                                placeholder="Title">
                                                
                                            
                                            <label for="floatingName">Title</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 mb-3 image">
                                        <label for="formFile3" class="form-label">Banner</label>
                                        <div class="form-group">                     
                                            <div class="image dropify-wrapper">
                                                @if(!empty($data['contact']->subject))
                                                    <img src="{{ asset('storage/' . $data['contact']->subject) }}" alt=""
                                                        class="previewImage">
                                                @else
                                                    <img src="{{ asset('dummy_image.jpg') }}" alt="" class="previewImage">
                                                @endif
                                            </div>
                                            <input name="subject" class="form-control file-input custom-file-input mt-3" type="file" id="formFile3">
                        
                                        </div>
                                    </div>                                                         
                                </div>
                                <div class="tab-pane mb-3" id="tab2">
                                     
                                         
                                           <textarea name="message" class="form-control"  id="summernote" style="height: 290px;">{{isset($data['contact']) ? $data['contact']->message : old('message')}}</textarea>
                                            
                                            {{-- <label for="floatingName">Description</label> --}}
                                         
                                     
                                </div>
                                
                                <div class="tab-pane" id="tab4">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating">
                                            <input type="text" name="seo_title" value="{{ isset($data['contact']) ? $data['contact']->seo_title : ''}}" class="form-control" id="floatingName"
                                                placeholder="Seo Title">
                                            
                                            <label for="floatingName">Seo Title</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating">
                                            <input type="text" name="seo_keyword" value="{{ isset($data['contact']) ? $data['contact']->seo_keyword : ''}}" class="form-control"   
                                                placeholder="Seo Keyword">
                                           
                                            <label for="floatingUser">Seo Keyword</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating">
                                            <textarea  name="seo_description" value="" class="form-control"   
                                                placeholder="Seo Description">{{ isset($data['contact']) ? $data['contact']->seo_description : ''}}</textarea>
                                           
                                            <label for="floatingUser">Seo Description</label>
                                        </div>
                                    </div>
                                </div>
                                 <div class="text-center py-3">
                                        @if(isset($data['contact']))
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
        
        
    </div>
@endsection

@push('js')
   

<!-- INTERNAL Summernote Editor js -->
<script src="{{asset('backend/assets/plugins/summernote-editor/summernote1.js')}}"></script>
<script src="{{asset('backend/assets/js/summernote.js')}}"></script>

<!-- INTERNAL Data tables js-->
		<script src="{{asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
		<script src="{{asset('backend/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>

		<!-- USERLIST JS-->
		<script src="{{asset('backend/assets/js/userlist.js')}}"></script>

@endpush