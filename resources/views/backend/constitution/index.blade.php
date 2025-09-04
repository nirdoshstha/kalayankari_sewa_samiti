@extends('backend.layouts.master', ['page' => 'List'])

@section('title')
    {{ $panel ?? '' }}
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
                        <h5 class="card-title">{{ $panel ?? '' }} List </h5>
                        <i class="fa fa-plus-circle ms-auto text-success" data-bs-toggle="modal" data-bs-target="#largemodal"
                            title="Add Post" style="font-size: 26px;"></i>
                    </div>

                    <div class="table-responsive">
                        <table id="user-datatable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10%">#</th>
                                    <th style="width: 35%">Title</th>
                                    <th style="width: 25%">Image</th>
                                    <th style="width: 30%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['constitutions'] as $constitution)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $constitution->title }}</td>
                                        <td>
                                            @if ($constitution->image)
                                                <img src="{{ asset('storage/' . $constitution->image) }}"
                                                    class="img-thumbnail" width="50" />
                                            @else
                                                <img src="{{ asset('dummy_image.jpg') }}" class="img-thumbnail"
                                                    width="50" />
                                            @endif
                                        </td>

                                        <td class="d-sm-flex align-items-center py-4">
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#view-{{ $constitution->id }}"><i
                                                    class="fa fa-eye fs-17 px-3 text-info"></i></a>
                                            <a href="{{ route($base_route . 'edit', $constitution->id) }}"><i
                                                    class="fa fa-edit fs-17 px-3 text-info"></i></a>

                                            <div class="main-toggle-group d-sm-flex align-items-center">
                                                <div class="toggle show_hide toggle-md toggle-{{ $constitution->status == '0' ? 'success' : '' }} my-1 {{ $constitution->status == '0' ? 'on' : 'off' }}"
                                                    data-id="{{ $constitution->id }}">
                                                    <span></span>
                                                </div>
                                            </div>


                                            <form action="{{ route($base_route . 'destroy', $constitution->id) }}"
                                                method="POST" class="main_form" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#"><i
                                                        class="fa fa-trash fs-17 px-3 text-danger delete-confirm"
                                                        data-id="{{ $constitution->id }}"></i></a>
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
                {{-- //View Modal Details --}}
                @foreach ($data['constitutions'] as $constitution)
                    <div class="modal fade" id="view-{{ $constitution->id }}" tabindex="-1"
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
                                                    <p>{{ $constitution->title }}</p>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-4">
                                                    <label for="email" class="form-label">Cover</label>
                                                </div>
                                                <div class="col-md-8">
                                                    @if (isset($constitution->image))
                                                        <img src="{{ image_path($constitution->image) }}" width="80"
                                                            class="img-thumbnail">
                                                    @else
                                                        <img src="{{ asset('dummy_image.jpg') }}" width="80"
                                                            class="img-thumbnail">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="col-md-12">
                                            <label for="email" class="form-label">Description</label>
                                            <p>{!! $constitution->description !!}</p>
                                        </div>
                                        <hr>

                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-4">
                                                    <p>Created By</p>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>{{ $constitution->createdBy?->name }}
                                                        ({{ $constitution->created_at->format('Y-m-d') }})
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
                                                    <p>{{ $constitution->updatedBy?->name }}
                                                        ({{ $constitution->updated_at->format('Y-m-d') }})
                                                    </p>
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
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Create {{ $panel ?? '' }}
                    </h5>
                    <div class="panel panel-primary">
                        
                        <div class="panel-body tabs-menu-body">
                            @if (isset($data['constitution']))
                                <form action="{{ route($base_route . 'update', $data['constitution']->id) }}"
                                    method="POST" class="row g-3 main_form">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="type" value="post">
                                @else
                                    <form action="{{ route($base_route . 'store') }}" method="POST"
                                        class="row g-3 main_form">
                                        @csrf
                                        <input type="hidden" name="type" value="post">
                            @endif
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating">
                                            <input type="text" name="title"
                                                value="{{ isset($data['constitution']) ? $data['constitution']->title : old('title') }}"
                                                class="form-control" id="title" placeholder="Title">


                                            <label for="floatingName">Title</label>
                                        </div>
                                    </div>
                                    <textarea name="description" class="form-control" id="summernote" style="height: 290px;">{{ isset($data['constitution']) ? $data['constitution']->description : old('description') }}</textarea>

                                </div>



                                <div class="text-center py-3">
                                    @if (isset($data['constitution']))
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-pencil-square"
                                                data-bs-toggle="tooltip" title="" style="font-size: 16px;"></i>
                                            Update</button>
                                    @else
                                        <button type="submit" class="btn btn-info"><i
                                                class="fa fa-plus-circle fs-6"></i>
                                            Create</button>
                                    @endif

                                </div>


                            </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                        <form action="{{ route($base_route . 'store') }}" method="POST" class="row g-3 main_form"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="post">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="title" class="form-control title" value=""
                                        id="floatingName" placeholder="Title">
                                    <label for="floatingName">Title</label>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <label for="" class="form-label">Image</label>
                                <div class="form-group">
                                    <input name="image" class="form-control mt-3" type="file">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <textarea name="description" class="form-control" style="height: 100px;"></textarea>
                                    <label for="floatingName">Description</label>
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

                let constitution_id = $(this).attr('data-id');

                $.ajax({
                    url: "{{ route('constitution.status') }}",
                    data: {
                        constitution_id: constitution_id
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

    {{-- <!-- INTERNAL Summernote Editor js -->
    <script src="{{ asset('backend/assets/plugins/summernote-editor/summernote1.js') }}"></script>
    <script src="{{ asset('backend/assets/js/summernote.js') }}"></script> --}}

    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

    <script>
        $('#summernote').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']], // ✅ font family
                ['fontsize', ['fontsize']], // ✅ font size
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            fontNames: ['Arial', 'Courier New', 'Times New Roman', 'Verdana', 'Roboto',
                'Poppins'
            ], // ✅ add your fonts
            fontSizes: ['8', '10', '12', '14', '16', '18', '20', '22', '24', '36', '48'] // ✅ custom sizes
        });
    </script> --}}
@endpush
