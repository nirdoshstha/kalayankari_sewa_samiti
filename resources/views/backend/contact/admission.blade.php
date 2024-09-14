@extends('backend.layouts.master')

@section('title')
Admission
@endsection

@section('content')
 <div class="col-lg-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                <div class="py-2">
                    <h5 class="card-title"> Admission List </h5> 
                </div>
                    
                         
                <div class="table-responsive">
                    <table id="user-datatable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th style="width: 15%">Name</th>
                                <th style="width: 15%">Image</th>
                                <th style="width: 15%">Email</th> 
                                <th style="width: 15%">Phone</th> 
                                <th style="width: 10%">Class</th>  
                                <th style="width: 15%">Address</th>  
                                <th style="width: 10%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['admissions'] as $admission)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $admission->name }}</td>
                                    <td><img src="{{asset('storage/'.$admission->image)}}" width="50px"></td>

                                    <td>{{ $admission->email }}</td> 
                                    <td> {{$admission->phone}}</td>
                                    <td> {{$admission->subject}}</td>

                                    <td> {{$admission->address}}</td>

                                     
                                    <td class="d-sm-flex align-items-center py-2">
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#view-{{ $admission->id }}"><i
                                                class="fa fa-eye fs-17 px-3 text-info"></i></a> 
                                            
                                                <form action="{{ route('admission.delete', $admission->id) }}"
                                                    method="POST" class="main_form" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                            <a href="#" ><i class="fa fa-trash fs-17 px-3 text-danger delete-confirm" data-id="{{$admission->id}}"></i></a>
                                                </form>

                                           
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
                 
                </div>
                 {{-- //View Modal Details --}}
                 @foreach ($data['admissions'] as $admission)
                 <div class="modal fade" id="view-{{ $admission->id }}" tabindex="-1"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <span>View Admission Details</span>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal"
                                     aria-label="Close"><i class="fa fa-close"></i></button>
                                     
                             </div>
                             <div class="modal-body">

                               <div class="card">
                    <div class="card-body p-5">
                       
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="school__details text-center mb-4">
                                        <h2 class="mb-0"> Care English Boarding School </h2>
                                        <p class="mb-0">{{setting()?->address ?? ''}}</p>
                                        <p class="mb-0"> {{setting()?->email ?? ''}} </p>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 input-image">
                                    <div class="photo-upload">
                                        <div class="img-holder form-group d-flex justify-content-center mb-1">
                                            <img src="{{asset('storage/'.$admission->image)}}" alt="" width="100%" height="100%">
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <hr> 
                            <div class="form-header mb-2">
                                <span>STUDENT'S INFORMATION</span>
                            </div>
                            <div class="mb-2">
                                <label for="text-form" class="form-label mb-0">Name of the Applicant (Full Name) 
                                <input type="text" name="name" value="{{$admission->name ?? ''}}" class="form-control" id="text-form"
                                    aria-describedby="emailHelp" readonly>
                                
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-2">
                                        <label for="select-form1" class="form-label mb-0">Applied for Grade <span
                                                class="text-danger">*</span></label>
                                         
                                            <input value="{{$admission->grade ?? ''}}" class="form-control" readonly>
 
                                        <span class="text-danger">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-2">
                                        <label for="text-form1" class="form-label mb-0">Current Grade <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control"  value="{{$admission->current_grade ?? ''}}" readonly>
                                         
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <div class="mb-2">
                                        <label for="select-form2" class="form-label mb-0">Gender:</label>
                                         <input type="text" class="form-control"  value="{{$admission->gender ?? ''}}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-2">
                                        <label for="select-form2" class="form-label mb-0">Nationality:</label>
                                         <input type="text" class="form-control"  value="{{$admission->nationality ?? ''}}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-2">
                                        <label for="text-form3" class="form-label mb-0">Email:</label>
                                        <input type="text" class="form-control"  value="{{$admission->email ?? ''}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <div class="mb-2">
                                        <label for="date-form1" class="form-label mb-0">Date of birth(BS):</label>
                                        <div class="icon-Wrapper">
                                             <input type="text" class="form-control"  value="{{$admission->dob_bs ?? ''}}" readonly>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-2">
                                        <label for="date-form22" class="form-label mb-0">Date of birth(AD):</label>
                                         <input type="text" class="form-control"  value="{{$admission->dob_ad ?? ''}}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-2">
                                        <label for="age-form" class="form-label mb-0">Age:</label>
                                         <input type="text" class="form-control"  value="{{$admission->age ?? ''}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <div class="mb-2">
                                        <label for="text-form6" class="form-label mb-0">Address <span
                                                class="text-danger">*</span></label>
                                         <input type="text" class="form-control"  value="{{$admission->address ?? ''}}" readonly>
                                        <span class="text-danger">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-2">
                                        <label for="text-form7" class="form-label mb-0">Phone <span
                                                class="text-danger">*</span></label>
                                         <input type="text" class="form-control"  value="{{$admission->phone ?? ''}}" readonly>
                                        <span class="text-danger">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-header mb-2">
                                <span>FATHER'S INFORMATION</span>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <div class="mb-2">
                                        <label for="text-form8" class="form-label mb-0">Father's Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control"  value="{{$admission->father_name ?? ''}}" readonly>
                                        <span class="text-danger">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-2">
                                        <label for="text-form9" class="form-label mb-0">Mobile No.:</label>
                                         <input type="text" class="form-control"  value="{{$admission->father_mobile ?? ''}}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-2">
                                        <label for="text-form10" class="form-label mb-0">Email:</label>
                                        <input type="text" class="form-control"  value="{{$admission->father_email ?? ''}}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-2">
                                        <label for="text-form12" class="form-label mb-0">Occupation:</label>
                                         <input type="text" class="form-control"  value="{{$admission->father_occupation ?? ''}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-header mb-2">
                                <span>MOTHER'S INFORMATION</span>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <div class="mb-2">
                                        <label for="text-form13" class="form-label mb-0">Mother's Name <span
                                                class="text-danger">*</span></label>
                                         <input type="text" class="form-control"  value="{{$admission->mother_name ?? ''}}" readonly>
                                        <span class="text-danger">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-2">
                                        <label for="text-form14" class="form-label mb-0">Mobile No.:</label>
                                         <input type="text" class="form-control"  value="{{$admission->mother_mobile ?? ''}}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-2">
                                        <label for="text-form15" class="form-label mb-0">Email:</label>
                                         <input type="text" class="form-control"  value="{{$admission->mother_email ?? ''}}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-2">
                                        <label for="text-form16" class="form-label mb-0">Occupation:</label>
                                         <input type="text" class="form-control"  value="{{$admission->mother_occupation ?? ''}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-header mb-2">
                                <span>LOCAL GUARDIAN'S INFORMATION</span>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <div class="mb-2">
                                        <label for="text-form17" class="form-label mb-0">Local Guardian:</label>
                                         <input type="text" class="form-control"  value="{{$admission->guardian ?? ''}}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-2">
                                        <label for="text-form18" class="form-label mb-0">Mobile No.:</label>
                                        <input type="text" class="form-control"  value="{{$admission->guardian_mobile ?? ''}}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-2">
                                        <label for="text-form19" class="form-label mb-0">Email:</label>
                                         <input type="text" class="form-control"  value="{{$admission->guardian_email ?? ''}}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-2">
                                        <label for="select-form3" class="form-label mb-0">Occupation:</label>
                                         <input type="text" class="form-control"  value="{{$admission->guardian_occupation ?? ''}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-header mb-2">
                                <span>PREVIOUS SCHOOL'S INFORMATION</span>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <div class="mb-2">
                                        <label for="text-form20" class="form-label mb-0">School Name:</label>
                                         <input type="text" class="form-control"  value="{{$admission->previous_school_name ?? ''}}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-2">
                                        <label for="text-form21" class="form-label mb-0">Address:</label>
                                        <input type="text" class="form-control"  value="{{$admission->previous_school_address ?? ''}}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-2">
                                        <label for="text-form22" class="form-label mb-0">Grade:</label>
                                         <input type="text" class="form-control"  value="{{$admission->previous_school_grade ?? ''}}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <textarea name="description" class="form-control" rows="3">{!! $admission->description ?? '' !!}</textarea>
                                </div>

                            </div>
                            
                    </div>
                </div>

                             </div>


                         </div>
                     </div>
                 </div>
                @endforeach

               
            </div>
        </div>
@endsection

@push('js')
<!-- INTERNAL Data tables js-->
		<script src="{{asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
		<script src="{{asset('backend/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>

		<!-- USERLIST JS-->
		<script src="{{asset('backend/assets/js/userlist.js')}}"></script>
@endpush