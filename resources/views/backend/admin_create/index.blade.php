@extends('backend.layouts.master')

@section('title')
Create Admin |Admin |Dashboard
@endsection

@section('sub_title','Create Admin')

@section('content')
   

    <div class="row">
        <div class="col-lg-8">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                <div class="d-flex justity-content-between">
                    <h5 class="card-title">Total Admin List </h5>
                    <i class="fa fa-plus-circle ms-auto text-success" data-bs-toggle="tooltip" title="Add Post" style="font-size: 26px;"></i>
                </div>
                    {{-- <table class="table table-striped table-hover datatable"> --}}
                <div class="table-responsive">
                    <table id="user-datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="useradmin">
                            @foreach ($data['rows'] as $users)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $users->name }}</td>
                                    <td><a href="#" class="text-primary">{{ Str::limit($users->email, 15) }}</a>
                                    </td>
                                    <td>
                                        @if ($users->user_role == 0)
                                            User
                                        @elseif($users->user_role == 1)
                                            Admin
                                        @endif
                                    </td>
                                    <td class="d-sm-flex align-items-center">
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#view-{{ $users->id }}"><i
                                                class="fa fa-eye fs-17 p-3 text-info"></i></a>
                                        <a href="{{route('admin-create.edit',$users->id)}}"><i
                                                class="fa fa-edit fs-17 p-3 text-primary"></i></a>
                                        {{-- <span
                                            class="badge bg-{{ $users->is_banned == '0' ? 'success' : 'danger' }}"><a href="#" class="text-light">{{ $users->is_banned == '0' ? 'Unban' : 'Banned' }}</a></span> --}}
                                            {{-- <a href="#" data-id="{{$users->id}}" class="is_ban"><button class="badge bg-{{ $users->is_banned == '0' ? 'success' : 'danger' }}">{{ $users->is_banned == '0' ? 'Unban' : 'Banned' }}</button></a> --}}
                                            <div class="main-toggle-group d-sm-flex align-items-center"> 
                                                <div class="toggle is_ban toggle-md toggle-{{ $users->is_banned == '0' ? 'success' : 'primary'}} my-1 {{ $users->is_banned == '0' ? 'on' : 'off' }}" data-id="{{$users->id}}">
                                                     <span></span>
                                                </div>
                                            </div>
                                             
                                            <a href="#" ><i class="fa fa-trash fs-17 p-3 text-danger destroy-confirm" data-id="{{$users->id}}"></i></a>
                                            

                                           
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- //View Details --}}
                </div>
                 
                </div>
                 {{-- //View Details --}}
                 @foreach ($data['rows'] as $user)
                 <div class="modal fade" id="view-{{ $user->id }}" tabindex="-1"
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


                                     <!-- Floating Labels Form -->
                                     <form class="row g-3">
                                         <div class="col-md-6">
                                             <div class="form-floating">
                                                 <input type="text" value="{{ isset($user) ? $user->name : '' }}"
                                                     class="form-control" id="floatingName" placeholder="Your Name"
                                                     readonly>
                                                 <label for="floatingName">Your Name</label>
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="form-floating">
                                                 <input type="text"
                                                     value="{{ isset($user) ? $user->username : '' }}"
                                                     class="form-control" id="floatingName" placeholder="Your Name"
                                                     readonly>
                                                 <label for="floatingName">Your Username</label>
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="form-floating">
                                                 <input type="email"
                                                     value="{{ isset($user) ? $user->email : '' }}"
                                                     class="form-control" id="floatingEmail" placeholder="Your Email"
                                                     readonly>
                                                 <label for="floatingEmail">Your Email</label>
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="form-floating">
                                                 <input type="text" value="{{ $user->profile?->phone }}"
                                                     class="form-control" id="floatingPassword"
                                                     placeholder="Password" readonly>
                                                 <label for="floatingPassword">Phone</label>
                                             </div>
                                         </div>
 

                                         <div class="col-md-6">
                                             <div class="mb-3">
                                                 <label for="">User Role</label>
                                                 @if ($user->user_role == '2')
                                                     <span class="badge bg-primary rounded-pill">Super Admin</span>
                                                 @elseif ($user->user_role == '1')
                                                     <span class="badge bg-success rounded-pill">Admin</span>
                                                 @elseif ($user->user_role == '0')
                                                     <span class="badge bg-success rounded-pill">User</span>
                                                 @endif

                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="mb-3">
                                                 <label for="">Is Banned</label>
                                                 @if ($user->is_banned == '0')
                                                     <span class="badge bg-success rounded-pill">Unban</span>
                                                 @elseif ($user->is_banned == '1')
                                                     <span class="badge bg-danger rounded-pill">Banned</span>
                                                 @endif

                                             </div>
                                         </div>

                                         <div class="col-lg-8">
                                            <div class="form-floating">
                                                
                                                    <textarea class="form-control" rows="3" style="height: 120px">{{ $user->profile?->info }}</textarea>
                                                <label for="floatingPassword">Info</label>
                                            </div>
                                         </div>
                                         <div class="col-md-4">
                                             <div class="form-floating">
                                                 @if (isset($user->profile->image))
                                                     <img src="{{ image_path($user->profile->image) }}" width="120"
                                                         class="img-thumbnail">
                                                 @else
                                                     <img src="{{ asset('dummy_image.jpg') }}" width="120"
                                                         class="img-thumbnail">
                                                 @endif
                                                 {{-- <input type="text" value="{{ isset($user) ? $user->username : '' }}"
                                                 class="form-control" id="floatingName" placeholder="Your Name"
                                                 readonly>
                                             <label for="floatingName">Your Username</label> --}}
                                             </div>
                                         </div>
                                         <!-- End floating Labels Form -->
 

                                     </form>
                                 </div>

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
                    <h5 class="card-title"><i class="fa fa-user-plus text-success fs-6"></i> {{isset($data['user']) ? 'Update' : 'Create' }}   Admin</h5>

                    <!-- Floating Labels Form -->
                    @if(isset($data['user']))
                        <form action="{{ route('admin-create.update',$data['user']->id) }}" method="POST" class="row g-3 main_form">
                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin-create.store') }}" method="POST" class="row g-3 main_form">
                        @csrf
                    @endif
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="name" value="{{ isset($data['user']) ? $data['user']->name : ''}}" class="form-control" id="floatingName"
                                    placeholder="Your Name">
                                {{-- <span class="text-danger">{{ $errors->first('name') }}</span> --}}
                                <label for="floatingName">Full Name</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="username" value="{{ isset($data['user']) ? $data['user']->username : ''}}" class="form-control"   
                                    placeholder="Username">
                                {{-- <span class="text-danger">{{ $errors->first('username') }}</span> --}}
                                <label for="floatingUser">Username</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="email" name="email" value="{{ isset($data['user']) ? $data['user']->email : ''}}" class="form-control email" id="floatingEmail"
                                    placeholder="Your Email">
                                {{-- <span class="text-danger">{{ $errors->first('email') }}</span> --}}
                                <label for="floatingEmail"> Email</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="password" value="12345" class="form-control password"
                                    id="floatingPassword" placeholder="12345" readonly>
                                <label for="floatingPassword">Default Password</label>
                            </div>
                        </div>

                        <div class="text-center">
                            @if(isset($data['user']))
                            <button type="submit" class="btn btn-success"><i class="fa fa-pencil-square" data-bs-toggle="tooltip" title="" style="font-size: 16px;" ></i> Update</button>
                            @else
                            {{-- <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle" data-bs-toggle="tooltip" title="" style="font-size: 16px;" ></i> Create</button> --}}
                            <button type="submit" class="btn btn-info"><i class="fa fa-plus-circle fs-6"></i> Create</button>
                            @endif
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- End floating Labels Form -->

                </div>
            </div>

        </div>

    </div>
@endsection

@push('js')
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend/assets/js/general.js') }}"></script> --}}

    <script>
        $(document).ready(function(){

            $('.is_ban').on('click',function(){
                
                let user_id = $(this).attr('data-id'); 

                $.ajax({
                    url:"{{route('admin_banned')}}",
                    data:{user_id:user_id},
                    success:function(resp){
                        successAlert(resp.success_message);
                        // location.reload();
                    }
                })
            });

            $('.destroy-confirm').on('click',function(){
                let admin_id = $(this).attr('data-id');
                let that = $(this);
                
                $.ajax({
                    url:"{{route('admin_destroy')}}",
                    data:{admin_id:admin_id},
                    success:function(resp){
                        successAlert(resp.success_message); 
                        that.parents('tr').remove();
                        $('.updateqty').text(resp.update_qty);
                    },
                    error: function(err){
                        errorAlert('error');
                    }
                })
            })
        })
    </script>

        <!-- INTERNAL Data tables js-->
		<script src="{{asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
		<script src="{{asset('backend/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>

		<!-- USERLIST JS-->
		<script src="{{asset('backend/assets/js/userlist.js')}}"></script>
@endpush
