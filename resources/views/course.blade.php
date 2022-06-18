@extends('layouts.user_layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="course-herder">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>{{$course->title}}</h2>
                        <p>{{$course->description}}</p>
                        <strong>Track: </strong><a href="/tracks/{{$course->track->name}}">{{$course->track->name}}</a>
                        @if ($course->status == 1)
                            <div class="text-dangeer paid">PAID</div>
                        @else
                            <div class="text-success free">FREE</div>
                        @endif
                        <strong>Users : </strong><span> {{count($course->users)}} </span><br>
                        <strong> Date add : </strong><span>{{$course->created_at}}</span>

                    </div>
                    <div class="col-sm">

                        @if ($course->photo)
                            <img class="course-image" src="/images/{{$course->photo->filename}}" alt="">
                        @else
                            <img class="course-image" src="/images/defoulte.jpg" alt="">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- get video --}}
        <div class="videos">
            <h3>Course videos</h3>
            <div class="row">
                <div class="col-sm-12">
                    @if(count($course->videos) > 0 )
                        @foreach ($course->videos as $video)
                            <div class="video">
                                <a href=""><i class="fab fa-youtube"></i>{{$video->title}}</a>
                            </div>
                        @endforeach
                        
                    @else
                        <div class="alert alert-secondary"> this course dose not include video</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection