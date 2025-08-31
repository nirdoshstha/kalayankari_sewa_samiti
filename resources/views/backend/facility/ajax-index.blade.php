@extends('backend.layouts.master')

@section('title')
    Ajax Test
@endsection


@section('content')
    <div class="row">

        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    <div class="panel panel-primary">
                        <div class="tab-menu-heading border-bottom-0">
                            <div class="tabs-menu ">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs">
                                    <li><a href="#tab1" class="me-1 text-default active my-1" data-bs-toggle="tab">Home</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body">

                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <div class="col-md-12 mb-5">
                                        <div class="form-floating">

                                            <select name="facility" class="form-select facility">
                                                <option> Please Select</option>
                                                @foreach ($data['facilities'] as $facility)
                                                    <option value="{{ $facility->id }}" class="form-control facility">
                                                        {{ $facility->title }}
                                                    </option>
                                                @endforeach

                                            </select>

                                            <label for="title">Title</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Slug</th>
                                                    <th scope="col">Description</th>
                                                </tr>
                                            </thead>

                                            <tbody class="ajax_get_data">
                                            </tbody>

                                        </table>
                                    </div>
                                </div>

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
    <script>
        $(document).ready(function() { 
            $(document).on('change', '.facility', function() {

                let id = $(this).val();
                // alert(id);

                $.ajax({
                    url: "{{ route('ajax.get_single_data') }}",
                    data: {
                        id: id
                    },
                    success: function(resp) {
                        $('.ajax_get_data').html(resp);
                    },
                    error: function(error) {
                        console.log(error);
                    }

                });


            });
        })
    </script>
@endpush
