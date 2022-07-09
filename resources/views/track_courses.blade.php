@extends('layouts.user_layout')

@section('content')
    
    <div class="container track-courses">
        <h2>{{$track->name}} Courses</h2>
        <div class="course">
            <div class="row">
                @foreach ($courses as $course)
                <div class="col-sm-3">
                    <div class="course">
                        @if ($course->photo)
                            <a href="/courses/{{$course->slug}}"><img src="/images/{{$course->photo->filename}}"></a>
                        @else
                            <a href="/courses/{{$course->slug}}"><img src="/images/defoulte.jpg"></a>
                        @endif
                        <h6><a href="/courses/{{$course->slug}}">{{\Str::limit($course->title , 20)}}</a></h6>
                        <span style="margin-left: 10px" class="{{$course->status == 0 ?'text-success' : 'text-danger' }} " >{{$course->status == 0 ? "FREE" : "PAID" }}</span>
                        <span style="float: right; margin-left: -15px" ><strong>{{count($course->users)}}</strong> users</span>
                    </div>
                </div>
            
            @endforeach
            </div>
        </div>
    </div>
@endsection