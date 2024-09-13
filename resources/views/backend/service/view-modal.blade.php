<div class="card-body">
                                    <div class="form-group">
                                        <div class="row row-sm">
                                            <div class="col-md-4">
                                                <label for="email" class="form-label fw-semibold fw-semibold">Parent Name</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{ucwords($service->parentId->title ?? 'Null')}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row row-sm">
                                            <div class="col-md-4">
                                                <label for="email" class="form-label fw-semibold">Title</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{$service->title}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row row-sm">
                                            <div class="col-md-4">
                                                <label for="email" class="form-label fw-semibold">Subtitle</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{$service->sub_title}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row row-sm">
                                            <div class="col-md-4">
                                                <p class="fw-semibold">Design </p>
                                            </div>
                                            <div class="col-md-2">
                                                <h5><span class="badge bg-primary">{{$service->design}}</span></h5>
                                            </div>

                                            <div class="col-md-2 ">
                                                <p for="email" class="form-p fw-semibold float-end">Rank </p>
                                            </div>
                                            <div class="col-md-2">
                                                <h5><span class="badge bg-danger rounded">{{$service->rank}}</span></h5>
                                            </div>                                    
                                        </div>
                                    </div>
                                     

                                    <div class="form-group">
                                        <div class="row row-sm">
                                            <div class="col-md-4">
                                                <label for="email" class="form-label fw-semibold">Image</label>
                                            </div>
                                            <div class="col-md-8">
                                                @if (isset($service->image))
                                                     <img src="{{ image_path($service->image) }}" width="80"
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
                                            <label for="email" class="form-label fw-semibold">Description</label>
                                            <p>{!! $service->description !!}</p> 
                                        </div>  
                                        <hr>

                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-4">
                                                    <p class="fw-semibold">Created By</p>
                                                </div>
                                                <div class="col-md-8">
                                                     <p>{{$service->createdBy?->name}} ({{$service->created_at->format('Y-m-d')}})</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-4">
                                                    <p class="fw-semibold">Upadted By</p>
                                                </div>
                                                <div class="col-md-8">
                                                     <p>{{$service->updatedBy?->name}} ({{$service->updated_at->format('Y-m-d')}})</p>
                                                </div>
                                            </div>
                                        </div>
    
                                 </div>