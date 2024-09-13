<form action="{{ route($base_route.'update',$service->id) }}" method="POST" class="row g-3 main_form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                     
                                    <div class="col-md-4"> 
                                        <label for="floatingName">Parent Id</label> 
                                        <div class="form-group py-3"> 
                                            <select name="parent_id" class="form-select select2 text-dark"> 
                                                <option value="{{$service->parentId?->id ?? ''}}"> {{$service->parentId?->title ?? 'NULL'}}</option>  
                                                 
                                                    @foreach($data['categories'] as $category) 
                                                        <option value="{{$category->id}}" class="parent_id" style="font-size: 14px">{{$category->title}}</option> 
                                                    @endforeach 
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" name="title" class="form-control title" value="{{isset($service) ? $service->title : ''}}" id="floatingTitle">
                                            <label for="floatingTitle"> Title</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" name="sub_title" class="form-control title" value="{{isset($service) ? $service->sub_title : ''}}" id="floatingSubtitle">
                                            <label for="floatingSubtitle"> Subtitle</label>
                                        </div>
                                    </div>
        
                                    <div class="col-md-4">
                                        <label for="" class="form-label fw-semibold">Image</label>
                                            <div class="form-group">
                                                <div class="d-flex justify-content-between">
                                                    @if(isset($service->image))     
                                                    <input name="image" class="form-control p-4" type="file"> <span class="p-2"></span>
                                                    <img src="{{asset('storage/'.$service->image)}}" width="50" class="img-thumbnail">  
                                                    @else
                                                    <input name="image" class="form-control p-4" type="file"><span class="p-2"></span>
                                                    <img src="{{asset('dummy_image.jpg')}}" width="50" class="img-thumbnail">  
                                                    @endif
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            
                                            <label for="floatingName"> Design</label>
                                            <div class="form-group"> 
                                                <select name="design" class="form-control select2 form-select select2-hidden-accessible text-dark"> 
                                                    <option value="{{isset($service) ? $service->design : ''}}" selected>{{isset($service) ? ucfirst(trans($service->design)) : ''}}</option>
                                                    
                                                    
                                                    <option value="about">About</option>  
                                                    <option value="message">Message</option>
                                                    <option value="school-life">School Life</option>
                                                    <option value="default">Default</option>
        
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" name="rank" class="form-control title" value="{{isset($service) ? $service->rank : ''}}" id="floatingName">
                                            <label for="floatingName"> Rank</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <textarea name="description" class="form-control" id="editor" style="height: 100px;">{{isset($service) ? $service->description : ''}}</textarea>
                                            {{-- <label for="floatingName"> Description</label> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-4"> 
                                        <input type="text" name="seo_title" class="form-control" value="{{isset($service) ? $service->seo_title : ''}}"  placeholder="Seo Title">
                                         
                                </div>
                                <div class="col-md-4"> 
                                        <input type="text" name="seo_keyword" class="form-control" value="{{isset($service) ? $service->seo_keyword : ''}}"  placeholder="Seo Keyword">
                                         
                                </div>
                                <div class="col-md-4"> 
                                        <input type="text" name="seo_description" class="form-control" value="{{isset($service) ? $service->seo_description : ''}}"  placeholder="Seo Description">
                                         
                                </div>
        
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-read"><i class="fa fa-edit fs-6"></i> Update</button> 
                                    </div>
                                </form><!-- End floating Labels Form -->