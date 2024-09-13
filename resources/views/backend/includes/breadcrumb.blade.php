<div class="page-header">
    <div>
        <h1 class="page-title">Dashboard</h1>
        <span class="text-danger"><h3>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
            </h3></span>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            @if(isset($base_route))
                    @if(Route::has($base_route . 'index'))
                        <li class="breadcrumb-item"><a href="{{ route($base_route . 'index') }}"> {{$panel}}</a>
                        </li>
                    <li class="breadcrumb-item active">{{ $page ?? '' }} {{ $panel ?? '' }}</li>
                    {{-- <li class="breadcrumb-item active">@yield('sub_title')</li> --}}

                    @endif
                @endif
        </ol>
    </div>
</div>