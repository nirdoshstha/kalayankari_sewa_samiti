@extends('backend.layouts.master', ['page' => 'List'])

@section('title')
    {{ $panel ?? '' }}
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
                        <h5 class="card-title">{{ $panel ?? '' }} List </h5>
                        <i class="fa fa-plus-circle ms-auto text-success" data-bs-toggle="modal" data-bs-target="#largemodal"
                            title="Add Post" style="font-size: 26px;"></i>

                    </div>


                    <div class="table-responsive">
                        <table id="user-datatable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 20%">Category</th>
                                    <th style="width: 25%">Name</th>
                                    <th style="width: 15%">Image</th>
                                    <th style="width: 15%">Status</th>
                                    <th style="width: 20%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['organization_posts'] as $organization_post)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $organization_post->category?->title }}</td>
                                        <td>{{ $organization_post->title }}</td>
                                        <td><img src="{{ asset('storage/' . $organization_post->image) }}"
                                                class="img-thumbnail" width="40" /></td>
                                        <td>
                                            <div class="main-toggle-group d-sm-flex align-items-center">
                                                <div class="toggle show_hide toggle-md toggle-{{ $organization_post->status == '0' ? 'success' : '' }} my-1 {{ $organization_post->status == '0' ? 'on' : 'off' }}"
                                                    data-id="{{ $organization_post->id }}">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </td>


                                        <td class="d-sm-flex align-items-center py-4">
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#view-{{ $organization_post->id }}"><i
                                                    class="fa fa-eye fs-17 px-3 text-info"></i></a>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#edit-{{ $organization_post->id }}"><i
                                                    class="fa fa-edit fs-17 px-3 text-info"></i></a>


                                            <form action="{{ route($base_route . 'destroy', $organization_post->id) }}"
                                                method="POST" class="main_form" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#"><i
                                                        class="fa fa-trash fs-17 px-3 text-danger delete-confirm"
                                                        data-id="{{ $organization_post->id }}"></i></a>
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{$data['organization_posts']->links()}} --}}
                    </div>

                </div>
                {{-- //View Modal Details --}}
                @foreach ($data['organization_posts'] as $organization_post)
                    <div class="modal fade" id="view-{{ $organization_post->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span>View Details</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                            class="fa fa-close"></i></button>

                                </div>
                                <div class="modal-body">

                                    <div class="card-body">

                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-4">
                                                    <label for="email" class="form-label">Title</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>{{ $organization_post->title }}</p>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-4">
                                                    <label for="email" class="form-label">Rank</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>{{ $organization_post->rank }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-4">
                                                    <label for="email" class="form-label">Start Date</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>{{ $organization_post->start_date }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-4">
                                                    <label for="email" class="form-label">End Date</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>{{ $organization_post->end_date }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-4">
                                                    <label for="email" class="form-label">Cover</label>
                                                </div>
                                                <div class="col-md-8">
                                                    @if (isset($organization_post->image))
                                                        <img src="{{ image_path($organization_post->image) }}"
                                                            width="80" class="img-thumbnail">
                                                    @else
                                                        <img src="{{ asset('dummy_image.jpg') }}" width="80"
                                                            class="img-thumbnail">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <hr>


                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-4">
                                                    <p>Created By</p>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>{{ $organization_post->createdBy?->name }}
                                                        ({{ $organization_post->created_at->format('Y-m-d') }})
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-4">
                                                    <p>Upadted By</p>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>{{ $organization_post->updatedBy?->name }}
                                                        ({{ $organization_post->updated_at->format('Y-m-d') }})</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- //Edit organization_post Modal Details --}}
                @foreach ($data['organization_posts'] as $organization_post)
                    <div class="modal fade" id="edit-{{ $organization_post->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span>Edit Details</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"><i class="fa fa-close"></i></button>

                                </div>
                                <div class="modal-body">
                                    <form action="{{ route($base_route . 'update', $organization_post->id) }}"
                                        method="POST" class="row g-3 main_form" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="type" value="post">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="title" class="form-control title"
                                                    value="{{ isset($organization_post) ? $organization_post->title : '' }}"
                                                    id="floatingName" placeholder="Album Name">
                                                <label for="floatingName">Title</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="date" name="start_date" class="form-control title"
                                                    value="{{ isset($organization_post) ? $organization_post->start_date : '' }}"
                                                    id="floatingName" placeholder="Sub Title">
                                                <label for="floatingName">Start Date</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="date" name="end_date" class="form-control title"
                                                    value="{{ isset($organization_post) ? $organization_post->end_date : '' }}"
                                                    id="floatingName" placeholder="Sub Title">
                                                <label for="floatingName">End Date</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="" class="form-label">Image</label>
                                            <div class="form-group">
                                                <div class="d-flex justify-content-between">
                                                    @if (isset($organization_post->image))
                                                        <input name="image" class="form-control p-4" type="file">
                                                        <span class="p-2"></span>
                                                        <img src="{{ asset('storage/' . $organization_post->image) }}"
                                                            width="50" class="img-thumbnail">
                                                    @else
                                                        <input name="image" class="form-control p-4"
                                                            type="file"><span class="p-2"></span>
                                                        <img src="{{ asset('dummy_image.jpg') }}" width="50"
                                                            class="img-thumbnail">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="rank" class="form-control title"
                                                    value="{{ isset($organization_post) ? $organization_post->rank : '' }}"
                                                    id="floatingName" placeholder="Album Name">
                                                <label for="floatingName">Rank</label>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-edit fs-6"></i>
                                                Update</button>
                                        </div>
                                    </form><!-- End floating Labels Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



        <!-- Add PostModal -->
        <div class="modal fade" id="largemodal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add {{ $panel ?? '' }}</h5>
                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route($base_route . 'store') }}" method="POST" class="main_form"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="post">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                    <select name="category_id" class="form-control" id="category">
                                        <option value="">--Select Category--</option>
                                        @foreach ($data['organizations_cat'] as $organization)
                                            <option value="{{ $organization->id }}">{{ $organization->title }}
                                            </option>
                                        @endforeach
                                        <label for="title">Category</label>
                                    </select>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 col-lg-6">
                                    <div class="form-floating">
                                        <input type="text" name="title" class="form-control title" id="title"
                                            placeholder="Title">
                                        <label for="title">Title</label>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 col-lg-6">
                                    <div class="form-floating">
                                        <input type="number" name="rank" class="form-control title" id="rank"
                                            placeholder="Rank">
                                        <label for="rank">Rank</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" name="designation" class="form-control title"
                                            id="title" placeholder="Designation">
                                        <label for="title">Designation</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="date" name="start_date" class="form-control title"
                                            id="startdate" placeholder="Sub Title">
                                        <label for="startdate">Start Date</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="date" name="end_date" class="form-control title" id="enddate"
                                            placeholder="Sub Title">
                                        <label for="enddate">End Date</label>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" class="form-label">Image</label>
                                    <div class="form-group">
                                        <input name="image" class="form-control mt-3" type="file">
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-info"><i class="fa fa-plus-circle fs-6"></i>
                                    Create</button>
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
        $(document).ready(function() {

            $('.show_hide').on('click', function() {

                let organization_post_id = $(this).attr('data-id');

                $.ajax({
                    url: "{{ route('organization_post.status') }}",
                    data: {
                        organization_post_id: organization_post_id
                    },
                    success: function(resp) {
                        // toastr.success(resp.success_message);
                        successAlert(resp.success_message);
                        // location.reload();
                        window.location.href = res.url;
                    },
                    error: function(err) {
                        errorAlert('error');
                    }
                })
            });


        })
    </script>

    <!-- INTERNAL Summernote Editor js -->
    <script src="{{ asset('backend/assets/plugins/summernote-editor/summernote1.js') }}"></script>
    <script src="{{ asset('backend/assets/js/summernote.js') }}"></script>
@endpush
