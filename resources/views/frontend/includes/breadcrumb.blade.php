
    @if(!is_null($data['service']))
        <div class="breadcrumb-banner"
            style="background-image: url('{{isset($data['service']?->parentId?->image) ? asset('storage/'.$data['service']?->parentId?->image)
            : ($data['service']->image ? asset('storage/'.$data['service']->image) : '/frontend/assets/image/page-header.jpg') }}');background-position: center; background-repeat: no-repeat; background-size: cover;">
              
                

            <div class="container">
                <div class="banner-desc d-flex flex-column justify-content-center align-items-center">
                    <div class="page-title">
                        <h1>{{$data['service']->title ?? ''}}</h1>
                    </div>
                    <div class="breadcrumb">
                        <ul class="d-flex justify-content-center align-items-center flex-wrap">
                            <li><a href="index.html">Home</a></li>
                            @if($data['service']->parentId)
                            <li><a href="#">{{$data['service']->parentId?->title ?? ''}}</a></li>
                            @endif
                            <li><span>{{$data['service']->title ?? ''}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        @endif