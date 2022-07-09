@extends('layouts.user_layout')

@section('content')
    <div class="container">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
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
        <div class="enroll-form">
            @if (count(auth()->user()->courses()->where('slug' , $course->slug )->get()) > 0 )
                <div class="alert alert-success">Already Enrolled</div>
            @else
            <form action="/courses/{{$course->slug}}" method="POST">
                @csrf
                <input type="submit" value="Enroll" class="btn btn-default btn-enroll">
            </form>
            @endif

        </div>
        <div class="clearfix"></div>
        {{-- get video --}}
        <div class="videos">
            <h3>Course videos</h3>
            <div class="row">
                <div class="col-sm-12">
                    @if(count($course->videos) > 0 )
                        @if (count((auth()->user()->courses()->where('slug' , $course->slug )->get())) > 0)
                            @foreach ($course->videos as $video)
                                <div class="video">
                                    <a href="{{$video->link}}"data-toggle="modal" data-target="#show-video"><i class="fab fa-youtube"></i>{{$video->title}}</a>
                                </div>
                            @endforeach
                        @else
                            @foreach ($course->videos as $video)
                            <div class="video disabled">
                                <a href="{{$video->link}}"data-toggle="modal" data-target="#show-video"><i class="fab fa-youtube"></i>{{$video->title}}</a>
                            </div>
                            @endforeach
                        @endif
                    @else
                        <div class="alert alert-secondary"> this course dose not include video</div>
                    @endif
                </div>
            </div>
        </div>
        <hr>
        @if (count((auth()->user()->courses()->where('slug' , $course->slug )->get())) > 0)
        <div class="quizzs">
            <h3>Course quizzs</h3>
            <div class="row">
                <div class="col-sm-12">
                    @if(count($course->Quizzes) > 0 )
                        
                    @foreach ($course->Quizzes as $quiz)
                        <div class="quiz">
                            <a target="_blank" href="/courses/{{$course->slug}}/quizzs/{{$quiz->name}}"></i>{{$quiz->name}}</a>
                        </div>
                    @endforeach
                    @else
                        <div class="alert alert-secondary"> this course dose not include quiz</div>
                    @endif
                </div>
            </div>
        </div>
        @endif
    
    </div>


<!-- Modal -->
@if (count((auth()->user()->courses()->where('slug' , $course->slug )->get())) > 0)
<div class="modal fade" id="show-video" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">video preview</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <iframe width="470" height="315" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
    </div>
</div>
@endif



@endsection