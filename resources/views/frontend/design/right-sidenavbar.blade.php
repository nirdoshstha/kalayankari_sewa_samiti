 <div class="col-lg-3 col-md-12 mb-3"> 
                    <section class="information-section section-padding">
                        <div class="sidebar">
                            <div class="sidebar__items">
                                <ul> 
                                     
                                        
                                    @foreach($data['service']->where('parent_id',$data['service']->parentId?->id)->where('status','0')->orderBy('rank','asc')->get() as $category)
                                    <li class="side__links {{Request::is($category->slug) ? 'active' :''}}">
                                        <a href="{{$category->slug}}"><i><i class="fa fa-arrow-right"></i> {{$category->title}}</a>
                                    </li>
                                @endforeach
                                    
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>