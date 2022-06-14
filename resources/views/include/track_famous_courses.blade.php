<div class="container">
    <div class="famous-courses">
        <?php $i = 0 ;  ?>
        @foreach ($tracks as $track)


            <h4>last <a href="">{{$track->name}} </a> courses</h4>

            <div class="row">
                @foreach ($track->courses()->limit(4)->get() as $course)
                    
                
                    <div class="col-sm-3">
                        <div class="course">
                            @if ($course->photo)
                                <a href=""><img src="/images/{{$course->photo->filename}}"></a>
                            @else
                                <a href=""><img src="/images/defoulte.jpg"></a>
                            @endif
                            <h6><a href="#">{{\Str::limit($course->title , 20)}}</a></h6>
                            <span style="margin-left: 10px" class="{{$course->status == 0 ?'text-success' : 'text-danger' }} " >{{$course->status == 0 ? "FREE" : "PAID" }}</span>
                            <span style="float: right; margin-left: -15px" ><strong>{{count($course->users)}}</strong> users</span>
                        </div>
                    </div>
                
                @endforeach


            </div>
            @if ($i == 1 )
                    
            <div class="famous-tracks">
                <h4>famous topic for you</h4>
                <div class="tracks">
                    <ul class="list-unstyled">
                    @foreach($famous_track as $track)
                        <li><a class="btn track-name" href="#">{{$track->name}}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
            @endif
            @if ($i == 2 )
            <div class="recommended-courses ">
                <h4>Recommended courses for you</h4>
                <div class="courses">
                    
                    @foreach($recommended_courss as $course)
                        <div class="course">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="course-image">
                                        @if ($course->photo)
                                            <a href="#"><img  src="/images/{{$course->photo->filename}}" alt=""></a>
                                        @else
                                            <img src="/images/defoulte.jpg" alt="">
                                        @endif
                                    </div>        
                                </div>
                                <div class="col-sm">
                                    <div class="course-details">
                                        <a href="#"><p class="course-title">{{\Str::limit($course->title,60)}}</p></a>
                                        <span style="margin-left: 10px" class="{{$course->status == 0 ?'text-success' : 'text-danger' }} " >{{$course->status == 0 ? "FREE" : "PAID" }}</span>
                                        <span style="  margin-left: 15%" ><strong>{{count($course->users)}}</strong> users</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    @endforeach
                    </ul>
                </div>
            </div>
            @endif
            <?php $i++ ;  ?>
        @endforeach    
    </div>
</div>