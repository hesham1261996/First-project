@extends('layouts.user_layout')
@section('content')
    <div class="container">
        <div class="search-courses">
            <h2><?php echo count($courses);  ?> courses mach your request</h2>
            <div class="row">
                <div class="col-sm-8">
                    @foreach ($courses as $course)
                        <div class="course">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="course-image">
                                            @if ($course->photo)
                                                <a href="/courses/{{$course->slug}}"><img src="/images/{{$course->photo->filename}}" alt=""></a>
                                            @else
                                                <a href="/courses/{{$course->slug}}"><img src="/images/defoulte.jpg" alt=""></a>
                                            @endif
                                    </div>  
                                </div>
                                <div class="col-sm-8">
                                    <div class="course-info">
                                        <h5><a href="/courses/{{$course->slug}}">{{\Str::limit($course->title , 30)}}</a></h5>
                                        <p>{{\Str::limit($course->description , 100 )}}</p>
                                        <h5 class="track-row">
                                            <a href="/tracks/{{$course->track->name}}">{{$course->track->name}}</a>
                                            <span style="float: right; margine-right: 10px ;">
                                                @if ($course->status == 0 )
                                                    <span class="free-badge">FREA</span>
                                                @else
                                                    <span class="piad-badge">PAID</span>
                                                @endif
                                                <span>{{count($course->users)}}</span>
                                                <span>user enrolled</span>
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection