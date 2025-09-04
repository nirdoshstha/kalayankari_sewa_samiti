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
                        <h5 class="card-title">Total {{ $panel ?? '' }} List </h5>
                        <i class="fa fa-plus-circle ms-auto text-success" data-bs-toggle="modal" data-bs-target="#largemodal"
                            title="Add Post" style="font-size: 26px;"></i>

                    </div>


                    <div class="table-responsive">
                        <table id="user-datatable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10%">#</th>
                                    <th style="width: 25%">Title</th>
                                    <th style="width: 25%">File</th>
                                    <th style="width: 10%">Rank</th>
                                    <th style="width: 30%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['downloads'] as $download)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $download->title }}</td>
                                        <td>
                                            @isset($download->image)
                                                @php
                                                    $extension = explode('.', $download->image)[1];
                                                @endphp
                                            @endisset
                                            @isset($download->image)
                                                @if ($extension == 'pdf')
                                                    <a href="{{ asset('storage/' . $download->image) }}" target="_blank">
                                                        <img src="{{ asset('pdf-img.png') }}" alt=""
                                                            class="previewImage" width="40px" height="40">
                                                    </a>
                                                @elseif($extension == 'docx' || $extension == 'doc')
                                                    <a href="{{ asset('storage/' . $download->image) }}" target="_blank">
                                                        <img src="{{ asset('word-img.png') }}" alt=""
                                                            class="previewImage" width="40px" height="40">
                                                    </a>
                                                @elseif($extension == 'xls' || $extension == 'xlsx')
                                                    <a href="{{ asset('storage/' . $download->image) }}" target="_blank">
                                                        <img src="{{ asset('excel-img.png') }}" alt=""
                                                            class="previewImage" width="40px" height="40">
                                                    </a>
                                                @else
                                                    <a href="{{ asset('storage/' . $download->image) }}" target="_blank">
                                                        <img src="{{ asset('storage/' . $download->image) }}" alt=""
                                                            class="previewImage" height="40px" height="40">
                                                    </a>
                                                @endif
                                            @endisset
                                        </td>
                                        <td>{{ $download->rank }}</td>

                                        <td class="d-sm-flex align-items-center py-3">
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#view-{{ $download->id }}"><i
                                                    class="fa fa-eye fs-17 px-3 text-info"></i></a>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#edit-{{ $download->id }}"><i
                                                    class="fa fa-edit fs-17 px-3 text-info"></i></a>

                                            <div class="main-toggle-group d-sm-flex align-items-center">
                                                <div class="toggle show_hide toggle-md toggle-{{ $download->status == '0' ? 'success' : '' }} my-1 {{ $download->status == '0' ? 'on' : 'off' }}"
                                                    data-id="{{ $download->id }}">
                                                    <span></span>
                                                </div>
                                            </div>


                                            <form action="{{ route($base_route . 'destroy', $download->id) }}"
                                                method="POST" class="main_form" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#"><i
                                                        class="fa fa-trash fs-17 px-3 text-danger delete-confirm"
                                                        data-id="{{ $download->id }}"></i></a>
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
                {{-- //View Modal Details --}}
                @foreach ($data['downloads'] as $download)
                    <div class="modal fade" id="view-{{ $download->id }}" tabindex="-1"
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
                                                    <p>{{ $download->title }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-4">
                                                    <label for="email" class="form-label">Subtitle</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>{{ $download->sub_title }}</p>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-4">
                                                    <label for="email" class="form-label">Rank</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>{{ $download->rank }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-4">
                                                    <label for="email" class="form-label">Cover</label>
                                                </div>
                                                <div class="col-md-8">
                                                    @isset($download->image)
                                                        @php
                                                            $extension = explode('.', $download->image)[1];
                                                        @endphp
                                                    @endisset
                                                    @isset($download->image)
                                                        @if ($extension == 'pdf')
                                                            <a href="{{ asset('storage/' . $download->image) }}"
                                                                target="_blank">
                                                                <img src="{{ asset('pdf-img.png') }}" alt=""
                                                                    class="previewImage" width="40px" height="40">
                                                            </a>
                                                        @elseif($extension == 'docx' || $extension == 'doc')
                                                            <a href="{{ asset('storage/' . $download->image) }}"
                                                                target="_blank">
                                                                <img src="{{ asset('word-img.png') }}" alt=""
                                                                    class="previewImage" width="40px" height="40">
                                                            </a>
                                                        @elseif($extension == 'xls' || $extension == 'xlsx')
                                                            <a href="{{ asset('storage/' . $download->image) }}"
                                                                target="_blank">
                                                                <img src="{{ asset('excel-img.png') }}" alt=""
                                                                    class="previewImage" width="40px" height="40">
                                                            </a>
                                                        @else
                                                            <a href="{{ asset('storage/' . $download->image) }}"
                                                                target="_blank">
                                                                <img src="{{ asset('storage/' . $download->image) }}"
                                                                    alt="" class="previewImage" height="40px"
                                                                    height="40">
                                                            </a>
                                                        @endif
                                                    @endisset
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
                                                    <p>{{ $download->createdBy?->name }}
                                                        ({{ $download->created_at->format('Y-m-d') }})</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-4">
                                                    <p>Upadted By</p>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>{{ $download->updatedBy?->name }}
                                                        ({{ $download->updated_at->format('Y-m-d') }})</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- //Edit download Modal Details --}}
                @foreach ($data['downloads'] as $download)
                    <div class="modal fade" id="edit-{{ $download->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span>Edit Details</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"><i class="fa fa-close"></i></button>

                                </div>
                                <div class="modal-body">
                                    <form action="{{ route($base_route . 'update', $download->id) }}" method="POST"
                                        class="row g-3 main_form" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="type" value="post">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="text" name="title" class="form-control title"
                                                    value="{{ isset($download) ? $download->title : '' }}"
                                                    id="floatingName" placeholder="Name">
                                                <label for="floatingName">Title</label>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="sub_title" class="form-control title"
                                                    value="{{ isset($download) ? $download->sub_title : '' }}"
                                                    id="floatingName" placeholder="Subtitle">
                                                <label for="floatingName">Subtitle</label>
                                            </div>
                                        </div> --}}

                                        <div class="col-md-6">
                                            <label class="form-label">File</label>

                                            <div class="d-flex justify-content-between">
                                                <input name="image" class="form-control" type="file"><span
                                                    class="p-2"></span>
                                                @if (isset($download->image))
                                                    @isset($download->image)
                                                        @php
                                                            $extension = explode('.', $download->image)[1];
                                                        @endphp
                                                    @endisset
                                                    @isset($download->image)
                                                        @if ($extension == 'pdf')
                                                            <a href="{{ asset('storage/' . $download->image) }}"
                                                                target="_blank">
                                                                <img src="{{ asset('pdf-img.png') }}" alt=""
                                                                    class="previewImage" width="40px" height="40">
                                                            </a>
                                                        @elseif($extension == 'docx' || $extension == 'doc')
                                                            <a href="{{ asset('storage/' . $download->image) }}"
                                                                target="_blank">
                                                                <img src="{{ asset('word-img.png') }}" alt=""
                                                                    class="previewImage" width="40px" height="40">
                                                            </a>
                                                        @elseif($extension == 'xls' || $extension == 'xlsx')
                                                            <a href="{{ asset('storage/' . $download->image) }}"
                                                                target="_blank">
                                                                <img src="{{ asset('excel-img.png') }}" alt=""
                                                                    class="previewImage" width="40px" height="40">
                                                            </a>
                                                        @else
                                                            <a href="{{ asset('storage/' . $download->image) }}"
                                                                target="_blank">
                                                                <img src="{{ asset('storage/' . $download->image) }}"
                                                                    alt="" class="previewImage" height="40px"
                                                                    height="40">
                                                            </a>
                                                        @endif
                                                    @endisset
                                                @else
                                                    <input name="image" class="form-control p-4" type="file"><span
                                                        class="p-2"></span>
                                                    <img src="{{ asset('dummy_image.jpg') }}" width="50"
                                                        class="img-thumbnail">
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="rank" class="form-control title"
                                                    value="{{ isset($download) ? $download->rank : '' }}"
                                                    id="floatingName" placeholder="Rank">
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
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        @if ($data['download'])
                            <i class="fa fa-edit text-danger fs-5"></i>
                        @else
                            <i class="fa fa-plus text-success fs-5"></i>
                        @endif
                        {{ isset($data['download']) ? 'Update' : 'Create' }} Page {{ $panel ?? '' }}
                    </h5>
                    <div class="panel panel-primary">
                        <div class="tab-menu-heading border-bottom-0">
                            <div class="tabs-menu ">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs">
                                    <li><a href="#tab1" class="me-1 text-default active my-1"
                                            data-bs-toggle="tab">Home</a></li>
                                    <li><a href="#tab2" data-bs-toggle="tab"
                                            class="me-1 text-default my-1">Description</a></li>
                                    <li><a href="#tab4" data-bs-toggle="tab" class="me-1 text-default my-1">SEO</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body">
                            @if (isset($data['download']))
                                <form action="{{ route($base_route . 'update', $data['download']->id) }}" method="POST"
                                    class="row g-3 main_form">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="type" value="page">
                                @else
                                    <form action="{{ route($base_route . 'store') }}" method="POST"
                                        class="row g-3 main_form">
                                        @csrf
                                        <input type="hidden" name="type" value="page">
                            @endif
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating">
                                            <input type="text" name="title"
                                                value="{{ isset($data['download']) ? $data['download']->title : old('title') }}"
                                                class="form-control" id="title" placeholder="Title">


                                            <label for="floatingName">Title</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating">
                                            <input type="text" name="sub_title"
                                                value="{{ isset($data['download']) ? $data['download']->sub_title : old('sub_title') }}"
                                                class="form-control" placeholder="Subtitle">

                                            <label for="floatingUser">Subtitle</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3 image">
                                        <label for="formFile3" class="form-label">Banner</label>
                                        <div class="form-group">
                                            <div class="image dropify-wrapper">
                                                @if (!empty($data['download']->image))
                                                    <img src="{{ asset('storage/' . $data['download']->image) }}"
                                                        alt="" class="previewImage">
                                                @else
                                                    <img src="{{ asset('dummy_image.jpg') }}" alt=""
                                                        class="previewImage">
                                                @endif
                                            </div>
                                            <input name="image" class="form-control file-input custom-file-input mt-3"
                                                type="file" id="formFile3">

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane mb-3" id="tab2">
                                    <textarea name="description" class="form-control" id="summernote" style="height: 290px;">{{ isset($data['download']) ? $data['download']->description : old('description') }}</textarea>
                                    {{-- <label for="floatingName">Description</label> --}}
                                </div>

                                <div class="tab-pane" id="tab4">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating">
                                            <input type="text" name="seo_title"
                                                value="{{ isset($data['download']) ? $data['download']->seo_title : '' }}"
                                                class="form-control" id="floatingName" placeholder="Seo Title">

                                            <label for="floatingName">Seo Title</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating">
                                            <input type="text" name="seo_keyword"
                                                value="{{ isset($data['download']) ? $data['download']->seo_keyword : '' }}"
                                                class="form-control" placeholder="Seo Keyword">

                                            <label for="floatingUser">Seo Keyword</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating">
                                            <textarea name="seo_description" value="" class="form-control" placeholder="Seo Description">{{ isset($data['download']) ? $data['download']->seo_description : '' }}</textarea>

                                            <label for="floatingUser">Seo Description</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center py-3">
                                    @if (isset($data['download']))
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-pencil-square"
                                                data-bs-toggle="tooltip" title="" style="font-size: 16px;"></i>
                                            Update</button>
                                    @else
                                        <button type="submit" class="btn btn-info"><i
                                                class="fa fa-plus-circle fs-6"></i> Create</button>
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
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="title" class="form-control title" value=""
                                        id="floatingName" placeholder="Download Name">
                                    <label for="floatingName">Title</label>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="sub_title" class="form-control title" value="" id="floatingName" placeholder="Download Name">
                                        <label for="floatingName">Subtitle</label>
                                    </div>
                                </div> --}}

                            <div class="col-md-6">
                                {{-- <label for="" class="form-label">File</label> --}}
                                <div class="form-group">
                                    <input name="image" class="form-control py-4" type="file">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" name="rank" class="form-control rank" value=""
                                        id="floatingName" placeholder="Download Name">
                                    <label for="floatingName">Rank</label>
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

                let download_id = $(this).attr('data-id');

                $.ajax({
                    url: "{{ route('download.status') }}",
                    data: {
                        download_id: download_id
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
