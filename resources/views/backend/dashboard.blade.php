@extends('backend.layouts.master')

@section('title')
    Admin | Dashboard
@endsection

@section('sub_title', 'Dashboard')

@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            {{-- <div class="card custom-card">
			<div class="card-body">
				<div class="table-responsive">
					<div id="user-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="user-datatable_length"><label><select name="user-datatable_length" aria-controls="user-datatable" class="form-select form-select-sm select2"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="col-sm-12 col-md-6"><div id="user-datatable_filter" class="dataTables_filter"><label><input type="search" class="form-control form-control-sm" placeholder="Search..." aria-controls="user-datatable"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="user-datatable" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="user-datatable_info">
						<thead>
							<tr role="row"><th class="wd-2 sorting sorting_asc" tabindex="0" aria-controls="user-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="
									Photo
								: activate to sort column descending" style="width: 46.875px;">
									Photo
								</th><th class="sorting" tabindex="0" aria-controls="user-datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 195.413px;">Name</th><th class="sorting" tabindex="0" aria-controls="user-datatable" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 176.3px;">Role</th><th class="sorting" tabindex="0" aria-controls="user-datatable" rowspan="1" colspan="1" aria-label="Last Active: activate to sort column ascending" style="width: 84.875px;">Last Active</th><th class="sorting" tabindex="0" aria-controls="user-datatable" rowspan="1" colspan="1" aria-label="Country: activate to sort column ascending" style="width: 64.275px;">Phone</th><th class="sorting" tabindex="0" aria-controls="user-datatable" rowspan="1" colspan="1" aria-label="Verification: activate to sort column ascending" style="width: 90.025px;">Verification</th><th class="sorting" tabindex="0" aria-controls="user-datatable" rowspan="1" colspan="1" aria-label="Joined Date: activate to sort column ascending" style="width: 94.4px;">Joined Date</th><th class="sorting" tabindex="0" aria-controls="user-datatable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51.8375px;">Action</th></tr>
						</thead>
						<tbody>
							@foreach ($data['users'] as $user)
								<tr class="odd">						
									<td class="text-center sorting_1">
										<div class="avatar avatar-md rounded-circle">
											@if (isset($user->profile->image))
											<img alt="avatar" class="rounded-circle" src="{{image_path($user->profile?->image)}}">
											@else
											<img alt="avatar" class="rounded-circle" src="{{asset('dummy_image.jpg')}}">

											@endif
										</div>
									</td>
									<td>
										<p class="tx-14 font-weight-semibold text-dark mb-1">{{$user->name}}</p>
										<p class="tx-13 text-muted mb-0">{{$user->email}}</p>
									</td>
									<td>
										<span class="text-muted tx-13">
											@if ($user->user_role == '1')
											Admin
										@elseif($user->user_role=='0')
										User
								
										@endif</span>
									</td>
									<td>
										<span class="badge bg-light text-muted tx-13">{{auth()->user()->updated_at}}</span>
									</td>
									<td>
										<span class="text-muted tx-13">{{$user->profile?->phone}}</span>
									</td>
									<td>
										<span class="badge font-weight-semibold bg-success-transparent text-success tx-11">Verified</span>
									</td>
									<td>
										<span class="text-muted tx-13">{{auth()->user()->created_at->format('Y-m-d')}}</span>
									</td>
									<td><a href="#" class="btn btn-icon btn-primary-light me-2" data-bs-toggle="tooltip" title="" data-bs-original-title="Edit">
										<i class="fe fe-edit"></i>
									</a></td>
								</tr>	
							@endforeach
						</tbody>
					</table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="user-datatable_info" role="status" aria-live="polite">Showing 1 to 14 of 14 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="user-datatable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="user-datatable_previous"><a href="#" aria-controls="user-datatable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="user-datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="user-datatable_next"><a href="#" aria-controls="user-datatable" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
				</div>
			</div>
		</div> --}}
        </div>
    </div>
@endsection

@push('js')
@endpush
