@extends('backend.layouts.master')

@section('title')
    Modal | Dashboard
@endsection

@section('sub_title', $panel ?? '');

@section('content')

    {{-- Post Add --}}
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <span>Add {{ $panel }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route($base_route . 'store') }}" method="POST" enctype="multipart/form-data"
                        id="main_form" class="row main_form">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="title" class="form-control title" value=""
                                    id="floatingName" placeholder="Title">
                                <label for="floatingName">Title</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 image">
                            <label for="formFile" class="form-label">Cover Image</label>
                            <div class="form-group d-flex justify-content-between">
                                <input name="image" class="form-control file-input custom-file-input" type="file"
                                    id="formFile" required>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6 image">
                            <label for="formFile" class="form-label">File Upload</label>
                            <div class="form-group d-flex justify-content-between">
                                <input name="file" class="form-control file-input custom-file-input" type="file"
                                    id="formFile">
                            </div>
                        </div>

                        <div class="text-center py-2">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- End floating Labels Form -->
                </div>

            </div>
        </div>
    </div>


    {{-- Post View  --}}
    @foreach ($data['posts'] as $modal)
        <div class="modal fade" id="viewPost-{{ $modal->id }}" tabindex="-1" aria-labelledby="viewPostLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <span>View {{ $panel }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fa fa-close"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                    value="{{ $modal->title ?? '' }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">File</label>
                            <div class="col-sm-6">
                                @isset($modal->file)
                                    @php
                                        $extension = explode('.', $modal->file)[1];
                                    @endphp
                                @endisset
                                @isset($modal->file)
                                    @if ($extension == 'pdf')
                                        <a href="{{ asset('storage/' . $modal->file) }}" target="_blank">
                                            <img src="{{ asset('pdf-img.png') }}" alt="" class="previewImage"
                                                width="40px">
                                        </a>
                                    @elseif($extension == 'docx' || $extension == 'doc')
                                        <a href="{{ asset('storage/' . $modal->file) }}" target="_blank">
                                            <img src="{{ asset('word-img.png') }}" alt="" class="previewImage"
                                                width="40px">
                                        </a>
                                    @else
                                        <a href="{{ asset('storage/' . $modal->file) }}" target="_blank">
                                            <img src="{{ asset('storage/' . $modal->file) }}" alt=""
                                                class="img-thumbnail" height="40px">
                                        </a>
                                    @endif
                                @endisset
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Cover Image</label>
                            <div class="col-sm-6">
                                @isset($modal->image)
                                    <img src="{{ asset('storage/' . $modal->image) }}" alt="" class="img-thumbnail"
                                        width="50">
                                @else
                                    <img src="{{ asset('no-image.png') }}" alt="" class="img-thumbnail"
                                        height="50">
                                @endisset

                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Created by</label>
                            <div class="col-sm-4 mt-2">
                                {{ $modal->createdBy?->name ?? '' }}
                            </div>
                            <label for="inputPassword" class="col-sm-2 col-form-label">Created by</label>
                            <div class="col-sm-4 mt-2">
                                {{ $modal->createdBy?->name ?? '' }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endforeach


    {{-- Post Edit --}}
    @foreach ($data['posts'] as $modal)
        <div class="modal fade" id="editPost-{{ $modal->id }}" tabindex="-1" aria-labelledby="postModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <span>Edit {{ $panel }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fa fa-close"></i></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route($base_route . 'update', $modal->id) }}" method="POST"
                            enctype="multipart/form-data" id="main_form" class="row g-3 main_form">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="title" class="form-control title"
                                        value="{{ $modal->title }}" id="floatingName" placeholder="Title">
                                    <label for="floatingName">Title</label>
                                </div>
                            </div>


                            <div class="col-sm-6 col-md-6 col-lg-6 image">
                                <label for="formFile" class="form-label">Cover Image</label>
                                <div class="form-group d-flex justify-content-between">

                                    <input name="image" class="form-control file-input custom-file-input"
                                        type="file" id="formFile">

                                    <div class="image">
                                        @isset($modal->image)
                                            <img src="{{ asset('storage/' . $modal->image) }}" alt=""
                                                class="previewImage" width="70px" height="40px">
                                        @else
                                            <img src="{{ asset('no-image.png') }}" alt="" class="previewImage"
                                                height="50px">
                                        @endisset

                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 image">
                                <label for="formFile" class="form-label">File Upload</label>
                                <div class="form-group d-flex justify-content-between">

                                    <input name="file" class="form-control file-input custom-file-input"
                                        type="file" id="formFile">

                                    <div class="file">
                                        @isset($modal->file)
                                            @php
                                                $extension = explode('.', $modal->file)[1];
                                            @endphp
                                        @endisset
                                        @isset($modal->file)
                                            @if ($extension == 'pdf')
                                                <a href="{{ asset('storage/' . $modal->file) }}" target="_blank">
                                                    <img src="{{ asset('pdf-img.png') }}" alt=""
                                                        class="previewImage" width="40px">
                                                </a>
                                            @elseif($extension == 'docx' || $extension == 'doc')
                                                <a href="{{ asset('storage/' . $modal->file) }}" target="_blank">
                                                    <img src="{{ asset('word-img.png') }}" alt=""
                                                        class="previewImage" width="40px">
                                                </a>
                                            @else
                                                <a href="{{ asset('storage/' . $modal->file) }}" target="_blank">
                                                    <img src="{{ asset('storage/' . $modal->file) }}" alt=""
                                                        class="previewImage" height="40px">
                                                </a>
                                            @endif
                                        @endisset

                                    </div>

                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form><!-- End floating Labels Form -->


                    </div>

                </div>
            </div>
        </div>
    @endforeach


    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="card-body">
                <div class="d-flex justity-content-between">
                    <h5 class="card-title">Total {{ $panel ?? '' }} List </h5>
                    <i class="fa fa-plus-circle ms-auto text-success" data-bs-toggle="modal" data-bs-target="#postModal"
                        title="Add Post" style="font-size: 26px;"></i>

                </div>
                <div class="table-responsive">
                    <table id="user-datatable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th style="width: 25%">Title</th>
                                <th style="width: 25%">Cover</th>
                                <th style="width: 25%">Files</th>
                                <th style="width: 20%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['posts'] as $modal)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $modal->title }}</td>
                                    <td>
                                        @if ($modal->image)
                                            <img src="{{ asset('storage/' . $modal->image) }}"
                                                class="img-thumbnail p-0 m-0" width="50">
                                        @else
                                            <img src="{{ asset('dummy_image.jpg') }}" class="img-thumbnail p-0 m-0"
                                                width="50">
                                        @endif
                                    </td>

                                    <td>
                                        @isset($modal->file)
                                            @php
                                                $extension = explode('.', $modal->file)[1];
                                            @endphp
                                        @endisset
                                        @isset($modal->file)
                                            @if ($extension == 'pdf')
                                                <a href="{{ asset('storage/' . $modal->file) }}" target="_blank">
                                                    <img src="{{ asset('pdf-img.png') }}" alt="" class=""
                                                        width="40px">
                                                </a>
                                            @elseif($extension == 'docx' || $extension == 'doc')
                                                <a href="{{ asset('storage/' . $modal->file) }}" target="_blank">
                                                    <img src="{{ asset('word-img.png') }}" alt="" class=""
                                                        width="40px">
                                                </a>
                                            @else
                                                <a href="{{ asset('storage/' . $modal->file) }}" target="_blank">
                                                    <img src="{{ asset('storage/' . $modal->file) }}" alt=""
                                                        class="" height="40px">
                                                </a>
                                            @endif
                                        @endisset
                                    </td>


                                    <td class="d-sm-flex align-items-center py-2">
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#viewPost-{{ $modal->id }}"><i
                                                class="fa fa-eye fs-17 px-3 text-info"></i></a>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#editPost-{{ $modal->id }}"><i
                                                class="fa fa-edit fs-17 px-3 text-info"></i></a>

                                        <div class="main-toggle-group d-sm-flex align-items-center">
                                            <div class="toggle show_hide toggle-md toggle-{{ $modal->status == '0' ? 'success' : '' }} my-1 {{ $modal->status == '0' ? 'on' : 'off' }}"
                                                data-id="{{ $modal->id }}">
                                                <span></span>
                                            </div>
                                        </div>


                                        <form action="{{ route($base_route . 'destroy', $modal->id) }}" method="POST"
                                            class="main_form" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#"><i
                                                    class="fa fa-trash fs-19 px-3 mt-3 text-danger delete-confirm"
                                                    data-id="{{ $modal->id }}"></i></a>
                                        </form>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.show_hide').click(function() {
                let id = $(this).attr('data-id');
                $.ajax({
                    url: "{{ route('modal.status') }}",
                    data: {
                        id: id
                    },
                    success: function(res) {
                        // toastr.success(res.success_message);
                        successAlert(res.success_message)
                    }
                })
            });

        });
    </script>
@endpush
