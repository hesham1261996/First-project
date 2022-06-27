@extends('layouts.user_layout')
@section('content')
    <div class="container">
        <div class="quiz-container">
            <h2>{{\Str::limit($course->title ,30)}} : {{$quiz->name}} Quiz</h2>
            @if (session('status'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="quiz-questions">
                <form action="/courses/{{$quiz->course->slug}}/quizzs/{{$quiz->name}}" method="POST" autocomplete="off">
                    @csrf
                    @foreach ($quiz->questions as $question)
                        <div class="form-group">
                            <label for="answer">{{$question->title}} (<span>{{$question->score}} points</span>)</label>
                            @if ($question->type == "checkbox")
                                <?php $answers= explode(',' , $question->answers) ?>
                                @foreach ($answers as $answer)
                                <div class="radio">
                                    <label ><input type="radio" name="answer{{$question->id}}" value="{{$answer}}" >{{$answer}}</label>
                                </div>
                                @endforeach

                            @else

                            <input type="text" name="answer{{$question->id}}" placeholder="your answer" class="form-control">
                            <hr>
                            @endif

                        </div>

                        @endforeach
                        <input type="submit" value="submit" name="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>

@endsection